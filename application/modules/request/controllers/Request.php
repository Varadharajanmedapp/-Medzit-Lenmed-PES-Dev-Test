<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Request extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('request_model');
        $this->load->model('hospital/package_model');
        $this->load->model('donor/donor_model');
        $this->load->model('pgateway/pgateway_model');
        $this->load->model('sms/sms_model');
        $this->load->model('email/email_model');
        $this->load->model('patient/patient_model');
        $this->load->model('package_model');
        $this->load->library('form_validation');
        $this->db->where('hospital_id', 'superadmin');
        $language = $this->db->get('settings')->row()->language;
        $this->lang->load('system_syntax', $language);
    }

    public function index() {
        if (!$this->ion_auth->in_group('superadmin')) {
            redirect('home/permission');
        }
        $data['requests'] = $this->request_model->getRequest();
        $data['packages'] = $this->package_model->getPackage();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('request', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        //if (!$this->ion_auth->in_group('superadmin')) {
          //  redirect('home/permission');
        //}
        //$data['packages'] = $this->package_model->getPackage();
        //$this->load->view('home/dashboard'); // just the header file
       // $this->load->view('add_new', $data);
        //$this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $phone_otp = $this->input->post('phone_verification');
		$email_otp = $this->input->post('email_verification');
        $package = $this->input->post('package');
        $language = $this->input->post('language');
        $category = $this->input->post('category');
        $status = 'Pending';


        $language_array = array('english', 'arabic', 'spanish', 'french', 'italian', 'portuguese','Bahasa Indonesia');

        if (!in_array($language, $language_array)) {
            $language = 'english';
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Address Field
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Email Field
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[1]|max_length[50]|xss_clean');
        // Validating Status Field           
        $this->form_validation->set_rules('status', 'Status', 'trim|min_length[1]|max_length[50]|xss_clean');
        // Validating Language Field           
        $this->form_validation->set_rules('language', 'Language', 'trim|required|min_length[1]|max_length[50]|xss_clean');

        if ($this->form_validation->run() == FALSE ||!($this->session->tempdata('user_mail')==$email && $this->session->tempdata('mail_otp')==$email_otp && $this->session->tempdata('user_phone')==$phone && $this->session->tempdata('phone_otp')==$phone_otp)) {
			$this->session->unset_tempdata('mail_otp');
			$this->session->unset_tempdata('user_mail');
			$this->session->unset_tempdata('phone_otp');
			$this->session->unset_tempdata('user_phone');
            if (!empty($id)) {
                redirect("request/editRequest?id=$id");
            } else {
                $data['packages'] = $this->package_model->getPackage();
              
                $this->load->view('add_new', $data);
                
            }
        } else {
			$this->session->unset_tempdata('mail_otp');
			$this->session->unset_tempdata('user_mail');
			$this->session->unset_tempdata('phone_otp');
			$this->session->unset_tempdata('user_phone');
            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'package' => $package,
                'language' => $language,
                'category' => $category,
                'status' => $status,
            );
            $this->session->set_userdata($data);
            if (empty($id)) {     // Adding New Request               
                $this->request_model->insertRequest($data);
                $this->session->set_flashdata('feedback', lang('new_request_created'));
            } else { 
                $this->request_model->updateRequest($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            // Loading View
            redirect('auth/login');
        }
    }
    public function payment() {
        $transaction_id = $this->input->post('payment_id');
        $request_id = $this->input->post('request_id');
        $data['transaction_id'] = $transaction_id;
        $this->request_model->updateRequest($request_id, $data);
        $this->load->view('payment_success');            
    }
    public function add_request() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $phone_otp = $this->input->post('phone_verification');
		$email_otp = $this->input->post('email_verification');
        $package = $this->input->post('package');
        $language = $this->input->post('language');
        $category = $this->input->post('category');
        $status = 'Pending';


        $language_array = array('english', 'arabic', 'spanish', 'french', 'italian', 'portuguese','Bahasa Indonesia');

        if (!in_array($language, $language_array)) {
            $language = 'english';
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Address Field
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Email Field
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[1]|max_length[100]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[1]|max_length[50]|xss_clean');
        // Validating Status Field           
        $this->form_validation->set_rules('status', 'Status', 'trim|min_length[1]|max_length[50]|xss_clean');
        // Validating Language Field           
        $this->form_validation->set_rules('language', 'Language', 'trim|required|min_length[1]|max_length[50]|xss_clean');


        if ($this->form_validation->run() == FALSE||!($this->session->tempdata('user_mail')==$email && $this->session->tempdata('mail_otp')==$email_otp && $this->session->tempdata('user_phone')==$phone && $this->session->tempdata('phone_otp')==$phone_otp)) {
			$this->session->unset_tempdata('mail_otp');
			$this->session->unset_tempdata('user_mail');
			$this->session->unset_tempdata('phone_otp');
			$this->session->unset_tempdata('user_phone');
            $this->session->set_flashdata('feedback', "Invalid data. Try Again!.");
            redirect('request/addnew');
        }else{
			$this->session->unset_tempdata('mail_otp');
			$this->session->unset_tempdata('user_mail');
			$this->session->unset_tempdata('phone_otp');
			$this->session->unset_tempdata('user_phone');
            $data = array();
            $data = array(
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'package' => $package,
                'language' => $language,
                'category' => $category,
                'status' => $status
            );
            //echo $this->request_model->insertRequest($data);
            $this->request_model->insertRequest($data);
            $this->session->set_flashdata('feedback', lang('new_request_created'));
            redirect('request/addnew');
        }

        
    }

    function getRequest() {
        $data['requests'] = $this->request_model->getRequest();
        $this->load->view('request', $data);
    }

    function activate() {
        $request_id = $this->input->get('request_id');
        $data = array('active' => 1);
        $this->request_model->activate($request_id, $data);
        $this->session->set_flashdata('feedback', 'Activated');
        redirect('request');
    }

    function deactivate() {
        $request_id = $this->input->get('request_id');
        $data = array('active' => 0);
        $this->request_model->deactivate($request_id, $data);
        $this->session->set_flashdata('feedback', 'Deactivated');
        redirect('request');
    }

    function approve() {
        $id = $this->input->get('id');
        $request = $this->request_model->getRequestById($id);
        $name = $request->name;
        $email = $request->email;
        $address = $request->address;
        $phone = $request->phone;
        $package = $request->package;
        $language = $request->language;

        if (!empty($package)) {
            $module = $this->package_model->getPackageById($package)->module;
            $p_limit = $this->package_model->getPackageById($package)->p_limit;
            $d_limit = $this->package_model->getPackageById($package)->d_limit;
        } else {
            $default_package = $this->package_model->getDefaultPackage();
            $module = $default_package->module;
            $p_limit = $default_package->p_limit;
            $d_limit = $default_package->d_limit;
        }

        $language_array = array('english', 'arabic', 'spanish', 'french', 'italian', 'portuguese');

        if (!in_array($language, $language_array)) {
            $language = 'english';
        }

        //$error = array('error' => $this->upload->display_errors());
        $data = array();
        $data = array(
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'phone' => $phone,
            'package' => $package,
            'p_limit' => $p_limit,
            'd_limit' => $d_limit,
            'module' => $module
        );

        $username = $name;
        $password = '12345';

        // Adding New Hospital
        if ($this->ion_auth->email_check($email)) {
            $this->session->set_flashdata('feedback', lang('this_email_address_is_already_registered'));
            redirect('hospital/addNewView');
        } else {
            $dfg = 11;
            $this->ion_auth->register($username, $password, $email, $dfg);
            $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
            $this->hospital_model->insertHospital($data);
            $hospital_user_id = $this->db->get_where('hospital', array('email' => $email))->row()->id;
            $id_info = array('ion_user_id' => $ion_user_id);
            $this->hospital_model->updateHospital($hospital_user_id, $id_info);

            $data1 = array('status' => 'Approved');
            $this->request_model->updateRequest($id, $data1);

            $hospital_settings_data = array();
            $hospital_settings_data = array('hospital_id' => $hospital_user_id,
                'title' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'language' => $language,
                'system_vendor' => 'Code Aristos | Hospital management System',
                'discount' => 'flat',
                'currency' => '$'
            );
            $this->settings_model->insertSettings($hospital_settings_data);
            $hospital_blood_bank = array();
            $hospital_blood_bank = array('A+' => '0 Bags', 'A-' => '0 Bags', 'B+' => '0 Bags', 'B-' => '0 Bags', 'AB+' => '0 Bags', 'AB-' => '0 Bags', 'O+' => '0 Bags', 'O-' => '0 Bags');
            foreach ($hospital_blood_bank as $key => $value) {
                $data_bb = array('group' => $key, 'status' => $value, 'hospital_id' => $hospital_user_id);
                $this->donor_model->insertBloodBank($data_bb);
                $data_bb = NULL;
            }

            $data_sms_clickatell = array();
            $data_sms_clickatell = array(
                'name' => 'Clickatell',
                'username' => 'Your ClickAtell Username',
                'password' => 'Your ClickAtell Password',
                'api_id' => 'Your ClickAtell Api Id',
                'user' => $this->ion_auth->get_user_id(),
                'hospital_id' => $hospital_user_id
            );

            $this->sms_model->addSmsSettings($data_sms_clickatell);

            $data_sms_msg91 = array(
                'name' => 'MSG91',
                'username' => 'Your MSG91 Username',
                'api_id' => 'Your MSG91 API ID',
                'authkey' => 'Your MSG91 Auth Key',
                'user' => $this->ion_auth->get_user_id(),
                'hospital_id' => $hospital_user_id
            );

            $this->sms_model->addSmsSettings($data_sms_msg91);



            $data_sms_twilio = array(
                'name' => 'Twilio',
                'sid' => 'SID Number',
                'token' => 'Token Number',
                'sendernumber' => 'Sender Number',
                'user' => $this->ion_auth->get_user_id(),
                'hospital_id' => $hospital_user_id
            );

            $this->sms_model->addSmsSettings($data_sms_twilio);




            $data_pgateway_paypal = array(
                'name' => 'PayPal', // Sandbox / testing mode option.
                'APIUsername' => 'PayPal API Username', // PayPal API username of the API caller
                'APIPassword' => 'PayPal API Password', // PayPal API password of the API caller
                'APISignature' => 'PayPal API Signature', // PayPal API signature of the API caller
                'status' => 'test',
                'hospital_id' => $hospital_user_id
            );

            $this->pgateway_model->addPaymentGatewaySettings($data_pgateway_paypal);

            $data_pgateway_payumoney = array(
                'name' => 'Pay U Money', // Sandbox / testing mode option.
                'merchant_key' => 'Merchant key', // PayPal API username of the API caller
                'salt' => 'Salt', // PayPal API password of the API caller
                'status' => 'test',
                'hospital_id' => $hospital_user_id
            );

            $this->pgateway_model->addPaymentGatewaySettings($data_pgateway_payumoney);



            $data_pgateway_stripe = array(
                'name' => 'Stripe', // Sandbox / testing mode option.
                'secret' => 'Secret', // Sandbox / testing mode option.
                'publish' => 'Publish', // PayPal API username of the API caller
                'status' => 'test',
                'hospital_id' => $hospital_user_id
            );
            
            $this->pgateway_model->addPaymentGatewaySettings($data_pgateway_stripe);


            $data_email_settings = array(
                'admin_email' => 'Admin Email', // Sandbox / testing mode option.
                'hospital_id' => $hospital_user_id
            );

            $this->email_model->addEmailSettings($data_email_settings);


            $this->hospital_model->createAutoSmsTemplate($hospital_user_id);
            $this->hospital_model->createAutoEmailTemplate($hospital_user_id);


            $this->session->set_flashdata('feedback', lang('new_hospital_created'));
        }

        redirect('request');
    }

    function editRequest() {
        $data = array();
        $id = $this->input->get('id');
        $data['packages'] = $this->package_model->getPackage();
        $data['request'] = $this->request_model->getRequestById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editRequestByJason() {
        $id = $this->input->get('id');
        $data['request'] = $this->request_model->getRequestById($id);
        $data['settings'] = $this->settings_model->getSettingsByHId($id);
        echo json_encode($data);
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('request', array('id' => $id))->row();
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->request_model->delete($id);
        redirect('request');
    }
    public function user_verification() {
		$user_credential = $this->input->post('user_credential');
		$otp = rand(1000,9999);
		
		if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $user_credential)) {
			$this->session->set_tempdata('mail_otp', $otp);
			$this->session->set_tempdata('user_mail', $user_credential);
			$this->load->model('email/email_model');
			$send_mail = $this->email_model->send_verification_email($user_credential, $otp);
			echo $send_mail ? "sent successfully" : "failed";
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
 public function addNew_patient() {
    	    $this->load->model('donor/donor_model');
            $data['groups'] = $this->donor_model->getBloodGroup();
           //$data['packages'] = $this->package_model->getPackage();
            $this->load->view('add_patient', $data);
            $this->load->view('home/footer');
        }
    public function addNew_patients()
	{
        $this->load->model('patient/patient_model');
		$this->load->model('donor/donor_model');
		$this->load->model('appointment/appointment_model');
		$this->load->model('sms/sms_model');
		$this->load->module('sms');
		$this->load->model('doctor/doctor_model');

		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$password = $this->input->post('password');
		$sms = $this->input->post('sms');
		$doctor = $this->input->post('doctor');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$phone_otp = $this->input->post('phone_verification');
		$email_otp = $this->input->post('email_verification');
		$sex = $this->input->post('sex');
		$birthdate = $this->input->post('birthdate');
		$bloodgroup = $this->input->post('bloodgroup');
		$patient_id = $this->input->post('p_id');
		if (empty($patient_id)) {
			$patient_id = rand(10000, 1000000);
		}
		if ((empty($id))) {
			$add_date = date('m/d/y');
			$registration_time = time();
		} else {
			$add_date = $this->patient_model->getPatientById($id)->add_date;
			$registration_time = $this->patient_model->getPatientById($id)->registration_time;
		}


		$email = $this->input->post('email');
		if (empty($email)) {
			$email = $name . '@' . $phone . '.com';
		}

		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		// Validating Name Field 
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[1]|max_length[100]|xss_clean');
		// Validating Email Field
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[1]|max_length[100]|xss_clean');
		// Validating Email OTP Field
		$this->form_validation->set_rules('email_verification', 'Email OTP', 'trim|required|min_length[1]|max_length[100]|xss_clean');
		// Validating Password Field  
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[1]|max_length[100]|xss_clean');
		// Validating Address Field 
		$this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[1]|max_length[100]|xss_clean');
		// Validating Phone Field     
		$this->form_validation->set_rules('phone', 'Phone with the country code', 'trim|required|min_length[1]|max_length[100]|xss_clean');
		// Validating Phone Field
		$this->form_validation->set_rules('phone_verification', 'Phone OTP', 'trim|required|min_length[1]|max_length[100]|xss_clean');
		// Validating sex Field
		$this->form_validation->set_rules('sex', 'Gender', 'trim|required|min_length[1]|max_length[100]|xss_clean');
		 // Validating Address Field   
        $this->form_validation->set_rules('birthdate', 'Birth Date', 'trim|required|min_length[2]|max_length[500]|xss_clean');
		// Validating Phone Field           
        $this->form_validation->set_rules('bloodgroup', 'Blood Group', 'trim|required|min_length[1]|max_length[10]|xss_clean');
		

		if ($this->form_validation->run() == FALSE || !($this->session->tempdata('user_mail')==$email && $this->session->tempdata('mail_otp')==(int)$email_otp && $this->session->tempdata('user_phone')==$phone && $this->session->tempdata('phone_otp')==(int)$phone_otp)) {
			$this->session->unset_tempdata('mail_otp');
			$this->session->unset_tempdata('user_mail');
			$this->session->unset_tempdata('phone_otp');
			$this->session->unset_tempdata('user_phone');
			if (!empty($id)) {
				$this->session->set_flashdata('feedback', lang('validation_error'));
				redirect("patient/editPatient?id=$id");
			} else {
				$data = array();
				$data['setval'] = 'setval';
				$data['doctors'] = $this->doctor_model->getDoctor();
				 $data['groups'] = $this->donor_model->getBloodGroup();
				$this->load->view('request/add_patient',$data); // just the header file
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
				'overwrite' => False,
				'max_size' => "10000000",
				// Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "10000",
				'max_width' => "10000"
			);

			$this->load->library('Upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('img_url')) {
				$path = $this->upload->data();
				$img_url = base_url() . "uploads/" . $path['file_name'];
				$data = array();
				$data = array(
					'patient_id' => $patient_id,
					'img_url' => $img_url,
					'name' => $name,
					'email' => $email,
					'address' => $address,
					'doctor' => $doctor,
					'phone' => $phone,
					'sex' => $sex,
					'birthdate' => $birthdate,
					'bloodgroup' => $bloodgroup,
					'add_date' => $add_date,
					'registration_time' => $registration_time
				);
			} else {
				$error = array('error' => $this->upload->display_errors());
				$data = array();
				$data = array(
					'patient_id' => $patient_id,
					'name' => $name,
					'email' => $email,
					'doctor' => $doctor,
					'address' => $address,
					'phone' => $phone,
					'sex' => $sex,
					'birthdate' => $birthdate,
					'bloodgroup' => $bloodgroup,
					'add_date' => $add_date,
					'registration_time' => $registration_time
				);
			}
			$username = $this->input->post('name');
			if (empty($id)) { // Adding New Patient
				if ($this->ion_auth->email_check($email)) {
					$this->session->set_flashdata('feedback', lang('this_email_address_is_already_registered'));
					redirect('patient/addNewView');
				}
				 else {
					$dfg = 5;
					$this->ion_auth->register($username, $password, $email, $dfg);
					$ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
					$this->patient_model->insertPatient($data); 
					$patient_user_id = $this->db->get_where('patient', array('email' => $email))->row()->id;
					$id_info = array('ion_user_id' => $ion_user_id);
					$this->patient_model->updatePatient($patient_user_id, $id_info);
					$this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
					//sms
					$sms_head ="MedZit profile created!";
					$google_play_link = "https://bit.ly/3GSJ4pz";
					$sms_body = "Your profile has been generated with MedZit. Please reset your password for your first login. Click the link to download the MedZit mobile app {$google_play_link} or find us on the app store!";
					$sms_data = ['phone' => $phone, 'text' => $sms_head." \n" . $sms_body];
					$this->appointment_model->sendSMS($sms_data);
					$set['settings'] = $this->settings_model->getSettings();
					$autosms = $this->sms_model->getAutoSmsByType('patient');
					$message = $autosms->message;
					$to = $phone;
					$name1 = explode(' ', $name);
					if (!isset($name1[1])) {
					    $name1[1] = null;
					}
					$data1 = array(
					    'firstname' => $name1[0],
					    'lastname' => $name1[1],
					    'name' => $name,
					    'doctor' => $doctor,
					    'company' => $set['settings']->system_vendor
					);
					// if (!empty($sms)) {
					// $this->sms->sendSmsDuringPatientRegistration($patient_user_id);
					// if ($autosms->status == 'Active') {
					//     $messageprint = $this->parser->parse_string($message, $data1);
					//     $data2[] = array($to => $messageprint);
					//     $this->sms->sendSms($to, $message, $data2);
					// }
					//  }	
					$autoemail = $this->email_model->getAutoEmailByType('patient');
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
					$this->session->set_flashdata('feedback', lang('added'));
				}
			
			} else {
				$ion_user_id = $this->db->get_where('patient', array('id' => $id))->row()->ion_user_id;
				if (empty($password)) {
					$password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
				} else {
					$password = $this->ion_auth_model->hash_password($password);
				}
				$this->patient_model->updateIonUser($username, $email, $password, $ion_user_id);
				$this->patient_model->updatePatient($id, $data);
				$this->session->set_flashdata('feedback', lang('updated'));
			}
			// Loading View
			if (!empty($redirect)) {
				redirect($redirect);
			}
			 else {
				redirect('patient');
			}
		}
	}
}
/* End of file request.php */
/* Location: ./application/modules/request/controllers/request.php */
