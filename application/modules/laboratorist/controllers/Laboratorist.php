<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laboratorist extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('laboratorist_model');

        if (!$this->ion_auth->in_group('admin')) {
            redirect('home/permission');
        }
    }

    public function index() {

        $data['laboratorists'] = $this->laboratorist_model->getLaboratorist();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('laboratorist', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new');
        $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phone = $this->input->post('phone');
		$phone_otp = $this->input->post('phone_verification');
		$email_otp = $this->input->post('email_verification');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Password Field
        if (empty($id)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        }
        // Validating Email Field
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Email OTP Field
        $this->form_validation->set_rules('email_verification', 'Email OTP', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Address Field   
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[5]|max_length[500]|xss_clean');
        // Validating Phone Field           
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|min_length[5]|max_length[50]|xss_clean');
         // Validating Phone OTP Field           
         $this->form_validation->set_rules('phone_verification', 'Phone OTP', 'trim|required|min_length[5]|max_length[50]|xss_clean');


        if ($this->form_validation->run() == FALSE || !($this->session->tempdata('user_mail')==$email && $this->session->tempdata('mail_otp')==$email_otp && $this->session->tempdata('user_phone')==$phone && $this->session->tempdata('phone_otp')==$phone_otp)) {
			$this->session->unset_tempdata('mail_otp');
			$this->session->unset_tempdata('user_mail');
			$this->session->unset_tempdata('phone_otp');
			$this->session->unset_tempdata('user_phone');
            if (!empty($id)) {
                $data = array();
                $data['laboratorist'] = $this->laboratorist_model->getLaboratoristById($id);
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the footer file
            } else {
                $data = array();
                $data['setval'] = 'setval';
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
                'overwrite' => False,
                'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "1768",
                'max_width' => "2024"
            );

            $this->load->library('Upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('img_url')) {
                $path = $this->upload->data();
                $img_url = "uploads/" . $path['file_name'];
                $data = array();
                $data = array(
                    'img_url' => $img_url,
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone
                );
            } else {
                //$error = array('error' => $this->upload->display_errors());
                $data = array();
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'address' => $address,
                    'phone' => $phone
                );
            }
            $username = $this->input->post('name');
            if (empty($id)) {     // Adding New laboratorist
                if ($this->ion_auth->email_check($email)) {
                    $this->session->set_flashdata('feedback', lang('this_email_address_is_already_registered'));
                    redirect('laboratorist/addNewView');
                } else {
                    $dfg = 8;
                    $this->ion_auth->register($username, $password, $email, $dfg);
                    $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
                    $this->laboratorist_model->insertLaboratorist($data);
                    $laboratorist_user_id = $this->db->get_where('laboratorist', array('email' => $email))->row()->id;
                    $id_info = array('ion_user_id' => $ion_user_id);
                    $this->laboratorist_model->updateLaboratorist($laboratorist_user_id, $id_info);
                    $this->hospital_model->addHospitalIdToIonUser($ion_user_id, $this->hospital_id);
                    $this->session->set_flashdata('feedback', lang('added'));
                }
            } else { // Updating laboratorist
                $ion_user_id = $this->db->get_where('laboratorist', array('id' => $id))->row()->ion_user_id;
                if (empty($password)) {
                    $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
                } else {
                    $password = $this->ion_auth_model->hash_password($password);
                }
                $this->laboratorist_model->updateIonUser($username, $email, $password, $ion_user_id);
                $this->laboratorist_model->updateLaboratorist($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            // Loading View
            redirect('laboratorist');
        }
    }

    function getLaboratorist() {
        $data['laboratorists'] = $this->laboratorist_model->getLaboratorist();
        $this->load->view('laboratorist', $data);
    }

    function editLboratorist() {
        $data = array();
        $id = $this->input->get('id');
        $data['laboratorist'] = $this->laboratorist_model->getLaboratoristById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editLaboratoristByJason() {
        $id = $this->input->get('id');
        $data['laboratorist'] = $this->laboratorist_model->getLaboratoristById($id);
        echo json_encode($data);
    }

    function delete() {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('laboratorist', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
            unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->laboratorist_model->delete($id);
        $this->session->set_flashdata('feedback', lang('deleted'));
        redirect('laboratorist');
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

/* End of file laboratorist.php */
/* Location: ./application/modules/laboratorist/controllers/laboratorist.php */