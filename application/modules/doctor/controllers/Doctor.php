
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctor extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('doctor_model');

        $this->load->model('department/department_model');
        $this->load->model('appointment/appointment_model');
        $this->load->model('patient/patient_model');
        $this->load->model('prescription/prescription_model');
        $this->load->model('schedule/schedule_model');
        $this->load->module('patient');
        $this->load->module('sms');
        if (!$this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Receptionist', 'Nurse', 'Laboratorist', 'Patient'))) {
            redirect('home/permission');
        }
    }

    public function index() {

        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['departments'] = $this->department_model->getDepartment();
        $data['specialists'] = $this->department_model->getspecilaist();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('doctor', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        $data = array();
        $data['departments'] = $this->department_model->getDepartment();
        $data['specialists'] = $this->department_model->getspecilaist();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {

        $id = $this->input->post('id');
        
        if (empty($id)) {
            $limit = $this->doctor_model->getLimit();
            if ($limit <= 0) {
                $this->session->set_flashdata('feedback', lang('doctor_limit_exceed'));
                redirect('doctor');
            }
        }
        
        $hospital_location = $this->department_model->get_hos_location();

        
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
        $phone_otp = $this->input->post('phone_verification');
		$email_otp = $this->input->post('email_verification');
        $department = $this->input->post('department');
        $specialist = $this->input->post('specialist');
        $profile = $this->input->post('profile');
        
        $latitude = $hospital_location['latitude'];
        $longitude = $hospital_location['longitude'];

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Email Field
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[100]|xss_clean');

        $this->form_validation->set_rules('email_verification', 'Email OTP', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        
        // Validating Password Field
        if (empty($id)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        }
         // Validating Address Field   
         $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[1]|max_length[500]|xss_clean');
         
       // Validating Phone Field           
       $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[13]|max_length[15]|xss_clean');
        // Validating Department Field   
        $this->form_validation->set_rules('department', 'Department', 'trim|required|min_length[1]|max_length[500]|xss_clean');
          // Validating specialist Field   
        $this->form_validation->set_rules('specialist', 'Specialist', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('profile', 'Profile', 'trim|required|min_length[1]|max_length[50]|xss_clean');


        if ($this->form_validation->run() == FALSE|| !($this->session->tempdata('user_mail')==$email && $this->session->tempdata('mail_otp')==(int)$email_otp && $this->session->tempdata('user_phone')==$phone && $this->session->tempdata('phone_otp')==(int)$phone_otp)) {
			$this->session->unset_tempdata('mail_otp');
			$this->session->unset_tempdata('user_mail');
			$this->session->unset_tempdata('phone_otp');
			$this->session->unset_tempdata('user_phone');
            if (!empty($id)) {
                $data = array();
                $data['departments'] = $this->department_model->getDepartment();
                $data['specialists'] = $this->department_model->getspecilaist();
                $data['doctor'] = $this->doctor_model->getDoctorById($id);
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the footer file
            } else {
                $data = array();
                $data['setval'] = 'setval';
                $data['departments'] = $this->department_model->getDepartment();    
                $data['specialists'] = $this->department_model->getspecilaist();
                // var_dump($data['specialists']);die;
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the header file
            }
        } else {
			$this->session->unset_tempdata('mail_otp');
			$this->session->unset_tempdata('user_mail');
			$this->session->unset_tempdata('phone_otp');
			$this->session->unset_tempdata('user_phone');
            $file_name = $_FILES['img_url']['name'];
            $file_name_pieces = explode('_', $file_name);
            $new_file_name = '';
            $count = 1;
            foreach ($file_name_pieces as $piece) {
                if ($count !== 1) {
                    $piece = ucfirst($piece);
                }

                $new_file_name .= $piece;
                $count++;
            }
            $config = array(
                'file_name' => $new_file_name,
                'upload_path' => "./uploads/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf",
                'overwrite' => False
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = base_url()."uploads/" . $path['file_name'];
                $data = array();
                $data = array(
                    'img_url' => $img_url,
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'department' => $department,
                    'specialist' => $specialist,
                    'profile' => $profile,
                    'latitude'=>$latitude,
                    'longitude' => $longitude
                );
            } else {
                //$error = array('error' => $this->upload->display_errors());
                $data = array();
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone,
                    'department' => $department,
                    'specialist' => $specialist,
                    'profile' => $profile,
                    'latitude'=>$latitude,
                    'longitude' => $longitude
                );
            }
            $username = $this->input->post('name');
            if (empty($id)) {     // Adding New Doctor
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('feedback', lang('this_email_address_is_already_registered'));
                    redirect('doctor/addNewView');
                } else {
                    $dfg = 4;
                    $this->ion_auth->register($username, $password, $email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                    $data['password'] = hash('sha512', $this->input->post('password'));
                    $this->doctor_model->insertDoctor($data);
                    $doctor_user_id = $this->db->get_where('doctor', array('email' => $email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->doctor_model->updateDoctor($doctor_user_id, $id_info);
                    $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                    $sms_head= "MedZit SOP created!";
                    $sms_body = "Your doctor profile has been generated with MedZit. Please reset your password for your first login. Click the link to download the MedZit doctor app {$google_play_link} or find us on the app store!";
                    $sms_data = ['phone' => $phone, 'text' => $sms_head." \n" . $sms_body];
                    $this->appointment_model->sendSMS($sms_data);
                    //sms
                    // $set['settings'] = $this->settings_model->getSettings();
                    // $autosms = $this->sms_model->getAutoSmsByType('doctor');
                    // $message = $autosms->message;
                    // $to = $phone;
                    // $name1 = explode(' ', $name);
                    // if (!isset($name1[1])) {
                    //     $name1[1] = null;
                    // }
                    // $data1 = array(
                    //     'firstname' => $name1[0],
                    //     'lastname' => $name1[1],
                    //     'name' => $name,
                    //     'department' => $department,
                    //     'company' => $set['settings']->system_vendor
                    // );

                    // if ($autosms->status == 'Active') {
                    //     $messageprint = $this->parser->parse_string($message, $data1);
                    //     $data2[] = array($to => $messageprint);
                    //     $this->sms->sendSms($to, $message, $data2);
                    // }
                    //end
                    //email

                    $autoemail = $this->email_model->getAutoEmailByType('doctor');
                    if ($autoemail->status == 'Active') {
                        $emailSettings = $this->email_model->getEmailSettings();
                        $message1 = $autoemail->message;
                        $messageprint1 = $this->parser->parse_string($message1, $data1);
                        $this->email->from($emailSettings->admin_email);
                        $this->email->to($email);
                        $this->email->subject('Appointment confirmation');
                        $this->email->message($messageprint1);
                        $this->email->send();
                    }

                    //end


                    $this->session->set_flashdata('feedback', lang('added'));
                }
            } else { // Updating Doctor
                $ion_user_id = $this->db->get_where('doctor', array('id' => $id))->row()->ion_user_id;
                if (empty($password)) {
                    $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                } else {
                    $password = hash('sha512', $this->input->post('password'));
                }
                $data['password'] = $password;
                $this->doctor_model->updateIonUser($username, $email, $password, $ion_user_id);
                $this->doctor_model->updateDoctor($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            // Loading View
            redirect('doctor');
        }
    }

    function editDoctor() {
        $data = array();
        $data['departments'] = $this->department_model->getDepartment();
        $data['specialists'] = $this->department_model->getspecilaist();
        $id = $this->input->get('id');
        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function details() {

        $data = array();

        if ($this->ion_auth->in_group(array('Doctor'))) {
            $doctor_ion_id = $this->ion_auth->get_user_id();
            $id = $this->doctor_model->getDoctorByIonUserId($doctor_ion_id)->id;
        } else {
            redirect('home');
        }


        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        $data['todays_appointments'] = $this->appointment_model->getAppointmentByDoctorByToday($id);
        $data['appointments'] = $this->appointment_model->getAppointmentByDoctor($id);
        $data['patients'] = $this->patient_model->getPatient();
        $data['appointment_patients'] = $this->patient->getPatientByAppointmentByDctorId($id);
        $data['doctors'] = $this->doctor_model->getDoctor();
        $data['prescriptions'] = $this->prescription_model->getPrescriptionByDoctorId($id);
        $data['holidays'] = $this->schedule_model->getHolidaysByDoctor($id);
        $data['schedules'] = $this->schedule_model->getScheduleByDoctor($id);



        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('details', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editDoctorByJason() {
        $id = $this->input->get('id');
        $data['doctor'] = $this->doctor_model->getDoctorById($id);
        echo json_encode($data);
    }

    function delete() {

        if ($this->ion_auth->in_group(array('Patient'))) {
            redirect('home/permission');
        }

        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('doctor', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->doctor_model->delete($id);
        $this->session->set_flashdata('feedback', lang('deleted'));
        redirect('doctor');
    }

    function getDoctor() {
        $requestData = $_REQUEST;
        $start = $requestData['start'];
        $limit = $requestData['length'];
        $search = $this->input->post('search')['value'];

        if ($limit == -1) {
            if (!empty($search)) {
                $data['doctors'] = $this->doctor_model->getDoctorBysearch($search);
            } else {
                $data['doctors'] = $this->doctor_model->getDoctor();
            }
        } else {
            if (!empty($search)) {
                $data['doctors'] = $this->doctor_model->getDoctorByLimitBySearch($limit, $start, $search);
            } else {
                $data['doctors'] = $this->doctor_model->getDoctorByLimit($limit, $start);
            }
        }
        //  $data['doctors'] = $this->doctor_model->getDoctor();

        foreach ($data['doctors'] as $doctor) {
            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
                $options1 = '<a type="button" class="btn btn-info btn-xs btn_width editbutton" title="' . lang('edit') . '" data-toggle="modal" data-id="' . $doctor->id . '"><img alt="" src="uploads/edit-bttn-icon.png" style="height: 17px;margin-left:-5px;" > ' . lang('edit') . '</a>';
                //   $options1 = '<a class="btn btn-info btn-xs btn_width" title="' . lang('edit') . '" href="doctor/editDoctor?id='.$doctor->id.'"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
            }
            $options2 = '<a class="btn btn-info btn-xs detailsbutton" title="' . lang('appointments') . '"  href="appointment/getAppointmentByDoctorId?id=' . $doctor->id . '">  <img alt="" src="uploads/Appointment-icon.png" style="height:15px;" >  ' . lang('appointments') . '</a>';
            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
                $options3 = '<a class="btn btn-info btn-xs btn_width delete_button" style="border-bottom:0px" title="' . lang('delete') . '" href="doctor/delete?id=' . $doctor->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><img alt="" src="uploads/trash-bttn-icon.png" style="height:20px;"> ' . lang('delete') . '</a>';
            }



            if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Receptionist'))) {
                $options4 = '<a href="schedule/holidays?doctor=' . $doctor->id . '" class="btn btn-info btn-xs btn_width" data-toggle="modal" data-id="' . $doctor->id . '"><i class="fa fa-book"></i> ' . lang('holiday') . '</a>';
                $options5 = '<a href="schedule/timeSchedule?doctor=' . $doctor->id . '" class="btn btn-info btn-xs btn_width" data-toggle="modal" data-id="' . $doctor->id . '"><i class="fa fa-book"></i> ' . lang('time_schedule') . '</a>';
                $options6 = '<a type="button" class="btn btn-info btn-xs btn_width detailsbutton inffo" title="' . lang('info') . '" data-toggle="modal" data-id="' . $doctor->id . '"> <img alt="" src="uploads/info-icon-w.png" style="height:15px;" >  ' . lang('info') . '</a>';
            }

            $info[] = array(
                $doctor->id,
                $doctor->name,
                $doctor->email,
                $doctor->phone,
                $doctor->department,
                // $doctor->profile,
                $doctor->specialist,
                //  $options1 . ' ' . $options2 . ' ' . $options3,
                $options6 . ' ' . $options1 . ' ' . $options2 . ' ' . $options4 . ' ' . $options5 . ' ' . $options3,
                    //  $options2
            );
        }

        if (!empty($data['doctors'])) {
            $output = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" =>  $this->db->where('hospital_id',$this->session->userdata('hospital_id'))->get('doctor')->num_rows(),
                "recordsFiltered" => $this->db->where('hospital_id',$this->session->userdata('hospital_id'))->get('doctor')->num_rows(),
                "data" => $info
            );
 
        } else {
            $output = array(
                // "draw" => 1,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            );
        }

        echo json_encode($output);
    }

    public function getDoctorInfo() {
        $searchTerm = $this->input->post('searchTerm');
        $response = $this->doctor_model->getDoctorInfo($searchTerm);

        echo json_encode($response);
    }

    public function getDoctorWithAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->doctor_model->getDoctorWithAddNewOption($searchTerm);

        echo json_encode($response);
    }
    public function getDocWithAddNewOption() {
// Search term
        $searchTerm = $this->input->post('searchTerm');

// Get users
        $response = $this->doctor_model->getDocWithAddNewOption($searchTerm);

        echo json_encode($response);
    }

    public function get_specialist()
    {
        $department = $this->input->post('department'); 
        $response = $this->doctor_model->get_specialist_byDept($department);
        echo json_encode($response);

    }
    public function user_verification() {
		$user_credential = $this->input->post('user_credential');
		$otp = rand(1000,9999);
		
		if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $user_credential)) {
			$this->session->set_tempdata('mail_otp', $otp);
			$this->session->set_tempdata('user_mail', $user_credential);
			$this->load->model('email/email_model');
			$send_mail = $this->email_model->send_verification_email($user_credential, $otp);
			/* $send_mail = true; */
			echo $send_mail ? "success" : "failed";
		} else {
			$this->session->set_tempdata('phone_otp', $otp);
			$this->session->set_tempdata('user_phone', $user_credential);
			$this->load->model('appointment/appointment_model');
			$message = "The OTP for verifying your account with Medzit is " . $otp;
			$data = ['phone' => $user_credential, 'text' => $message];
			$send_sms = $this->appointment_model->sendSMS($data);
			echo $send_sms ? "success" : "failed";
		}		
	}
}



/* End of file doctor.php */
/* Location: ./application/modules/doctor/controllers/doctor.php */