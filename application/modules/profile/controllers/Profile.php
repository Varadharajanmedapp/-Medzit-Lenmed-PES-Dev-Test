<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('profile_model');
        $this->load->model('hoispital/hospital_model');
    }

    public function index() {
        $data = array();
        $id = $this->ion_auth->get_user_id();
        $data['profile'] = $this->profile_model->getProfileById($id);
        $group_id = $this->profile_model->getUsersGroups($id)->row()->group_id;
        $group_name = $this->profile_model->getGroups($group_id)->row()->name;
        $group_name = strtolower($group_name);
        $data['user_sign'] = $this->profile_model->getUserSign($id,$group_name);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('profile', $data);
        $this->load->view('home/footer'); // just the footer file
    }

        public function addNew() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $config = [
            'upload_path'   => "./uploads/user_signatures",
            'allowed_types' => "gif|jpg|png|jpeg",
            'max_size' => 1048,
            'file_name'     => $name."_sign"
          ];
          if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
          }
          $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('signature_file')) {
            $error = array('error' => $this->upload->display_errors());
        }
        else {
        $upload_data = $this->upload->data();
        $user_sign = $upload_data['file_name'];

        $cropped_image_data = $this->input->post('cropped_image_data');

        $cropped_image_data = str_replace('data:image/jpeg;base64,', '', $cropped_image_data);
        $cropped_image_data = base64_decode($cropped_image_data);

        $cropped_image_filename = $name."_cropped_sign.jpg";

        $cropped_image_path = "./uploads/user_signatures/" . $cropped_image_filename;

 
        file_put_contents($cropped_image_path, $cropped_image_data);

     
        $data = array(
            'name' => $name,
            'email' => $email,
            'user_sign' => $cropped_image_filename, 
        );

            
        }
        $data['profile'] = $this->profile_model->getProfileById($id);
        if ($data['profile']->email != $email) {
            if ($this->ion_auth->email_check($email)) {
                $this->session->set_flashdata('feedback', lang('this_email_address_is_already_registered'));
                redirect('profile');
            }
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        // Validating Password Field
        if (!empty($password)) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        }
        // Validating Email Field
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[100]|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data = array();
            $id = $this->ion_auth->get_user_id();
            $data['profile'] = $this->profile_model->getProfileById($id);
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('profile', $data);
            $this->load->view('home/footer'); // just the footer file
        } else {
            $data = array();
            $data = array(
                'name' => $name,
                'email' => $email,
                'user_sign'=>$cropped_image_filename,
            );
            $username = $this->input->post('name');
            $ion_user_id = $this->ion_auth->get_user_id();
            $group_id = $this->profile_model->getUsersGroups($ion_user_id)->row()->group_id;
            $group_name = $this->profile_model->getGroups($group_id)->row()->name;
            $group_name = strtolower($group_name);
            if (empty($password)) {
                $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
            } else {
                $password = $this->ion_auth_model->hash_password($password);
            }
            $this->profile_model->updateIonUser($username, $email, $password, $ion_user_id);
            if (!$this->ion_auth->in_group(array('superadmin'))) {
                if ($this->ion_auth->in_group(array('admin'))) {
                    $this->hospital_model->updateHospitalByIonId($ion_user_id, $data);
                } else {   
                   $this->profile_model->updateProfile($ion_user_id, $data, $group_name);
                }
            }
            $this->session->set_flashdata('feedback', lang('updated'));

            // Loading View
            redirect('profile');
        }
    }

}

/* End of file profile.php */
/* Location: ./application/modules/profile/controllers/profile.php */
