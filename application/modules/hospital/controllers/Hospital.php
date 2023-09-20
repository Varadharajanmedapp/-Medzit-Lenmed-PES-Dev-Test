<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Hospital extends MX_Controller {

  function __construct() {
    parent::__construct();

    $this->load->model('hospital_model');
    $this->load->model('settings/settings_model');
    $this->load->model('doctor/doctor_model');
    $this->load->model('hospital/package_model');
    $this->load->model('donor/donor_model');
    $this->load->model('pgateway/pgateway_model');
    $this->load->model('patient/patient_model');
    $this->load->model('sms/sms_model');
    $this->load->model('email/email_model');
    if (!$this->ion_auth->in_group('superadmin')) {
      redirect('home/permission');
    }
  }

  public function index() {
    $data['hospitals'] = $this->hospital_model->getHospital();
    $data['packages'] = $this->package_model->getPackage();
    $this->load->view('home/dashboard'); 
    $this->load->view('hospital', $data);
    $this->load->view('home/footer'); 
  }

  public function addNewView() {
    $data['packages'] = $this->package_model->getPackage();
    $data['available_languages'] = $this->config->item('available_languages');
    $this->load->view('home/dashboard'); 
    $this->load->view('add_new', $data);
    $this->load->view('home/footer'); 
  }

  public function addNew() {
    $id        = $this->input->post('id');
    $name      = $this->input->post('name');
    $password  = $this->input->post('password');
    $email     = $this->input->post('email');
    $address   = $this->input->post('address'); 
    $phone     = $this->input->post('phone');
    $package   = $this->input->post('package');
    $category   = $this->input->post('category');
    $language  = $this->input->post('language');
    $latitude  = $this->input->post('latitude');
    $longitude = $this->input->post('longitude');
    $description = $this->input->post('description');


    if (!empty($package)) {
      $module = $this->package_model->getPackageById($package)->module;
      $p_limit = $this->package_model->getPackageById($package)->p_limit;
      $d_limit = $this->package_model->getPackageById($package)->d_limit;
    } else {
      $p_limit = $this->input->post('p_limit');
      $d_limit = $this->input->post('d_limit');
      $module = $this->input->post('module');
      if (!empty($module)) {
        $module = implode(',', $module);
      }
    }

    $language_array = array('english', 'arabic', 'spanish', 'french', 'italian', 'portuguese');

    if (!in_array($language, $language_array)) {
      $language = 'english';
    }

    if (FALSE) {
      if (!empty($id)) {
        redirect("hospital/editHospital?id=$id");
      } else {
        $data['packages'] = $this->package_model->getPackage();
        $this->load->view('home/dashboard'); 
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); 
      }
    } else {
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
        'upload_path' => "./uploads/hospital",
        'allowed_types' => "*",
        'overwrite' => False
      );
      if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, TRUE);
      }

      $this->load->library('Upload', $config);
      $this->upload->initialize($config);
      $image = $this->upload->do_upload('img_url');

      if ($image) {
        $path = $this->upload->data();
        $img_url = base_url()."uploads/hospital/" . $path['file_name'];
        $data['img_url']  = $img_url;             
      }

      $data['name']       = $name;
      $data['email']      = $email;
      $data['address']    = $address;
      $data['phone']      = $phone;
      $data['package']    = $package;
      $data['p_limit']    = $p_limit;
      $data['category']    = $category;
      $data['d_limit']    = $d_limit;
      $data['module']     = $module;
      $data['location']   = $latitude.','.$longitude;
      $data['latitude']   = $latitude;
      $data['longitude']  = $longitude;  
      $data['description']  = $description;  

      $username = $this->input->post('name');

            if (empty($id)) {     
                // Adding New Hospital
                // if ($this->ion_auth->email_check($email)) {
                //     $this->session->set_flashdata('feedback', lang('payment_failed_no_gateway_selected'));
                //     redirect('hospital/addNewView');
                // } else
                 // {

              $dfg = 11;
              $this->ion_auth->register($username, $password, $email, $dfg);
              $ion_user_id = $this->db->get_where('users', array('email' => $email))->row()->id;
              $this->hospital_model->insertHospital($data);
              $submit_request = array(
                'name'=>$name,
                'email'=>$email,
                'address'=>$address,
                'phone'=>$phone,
                'other'=>"",
                'package'=>$package,
                'language'=>$language,
                'remarks'=>"",
                'transaction_id'=>"",
                'status'=>"Pending"
              );
              $this->hospital_model->submit_request($submit_request);
              $hospital_user_id = $this->db->get_where('hospital', array('email' => $email))->row()->id;
              $id_info = array('ion_user_id' => $ion_user_id);
              $this->hospital_model->updateHospital($hospital_user_id, $id_info);
              $hospital_settings_data = array();
              $hospital_settings_data = array('hospital_id' => $hospital_user_id,
                'title' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'language' => $language,
                'system_vendor' => 'Medapps - PES',
                'discount' => 'flat',
                'sms_gateway' => 'Twilio',
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
                'sender' => 'Sender Number',
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
                        'hospital_id' => $hospital_user_id
                      );

              $this->pgateway_model->addPaymentGatewaySettings($data_pgateway_stripe);

              $data_pgateway_payumoney = array(
                        'name' => 'Paystack', // Sandbox / testing mode option.
                        'public_key' => 'Public key', // PayPal API username of the API caller
                        'secret' => 'secret', // PayPal API password of the API caller
                        'status' => 'test',
                        'hospital_id' => $hospital_user_id
                      );

              $this->pgateway_model->addPaymentGatewaySettings($data_pgateway_payumoney);



              $data_email_settings = array(
                        'admin_email' => 'Admin Email', // Sandbox / testing mode option.
                        'hospital_id' => $hospital_user_id
                      );

              $this->email_model->addEmailSettings($data_email_settings);

              $this->hospital_model->createAutoSmsTemplate($hospital_user_id);
              $this->hospital_model->createAutoEmailTemplate($hospital_user_id);

              $this->session->set_flashdata('feedback', lang('new_hospital_created'));
              redirect('hospital');
                // }
            } else { // Updating Hospital
              $ion_user_id = $this->db->get_where('hospital', array('id' => $id))->row()->ion_user_id;
              if (empty($password)) {
                $password = $this->db->get_where('users', array('id' => $ion_user_id))->row()->password;
              } else {
                $password = $this->ion_auth_model->hash_password($password);
              }
              $this->hospital_model->updateIonUser($username, $email, $password, $ion_user_id);
              $this->hospital_model->updateHospital($id, $data);

              $hospital_settings_data = array();
              $hospital_settings_data = array(
                'language' => $language
              );
              $this->settings_model->updateHospitalSettings($id, $hospital_settings_data);


              $this->session->set_flashdata('feedback', lang('updated'));
              redirect('hospital/editHospital?id=' . $id);
            }
            // Loading View
          }
        }

        function getHospital() {
          $data['hospitals'] = $this->hospital_model->getHospital();
          $this->load->view('hospital', $data);
        }

        function activate() {
          $hospital_id = $this->input->get('hospital_id');
          $redirect = $this->input->get('redirect');
          $data = array('active' => 1);
          $this->hospital_model->activate($hospital_id, $data);
          $this->session->set_flashdata('feedback', lang('activated'));
          if ($redirect == 'deactive') {
            redirect('hospital/disable');
          } elseif ($redirect == 'active') {
            redirect('hospital/active');
          } else {
            redirect('hospital');
          }

        }

        function deactivate() {
          $hospital_id = $this->input->get('hospital_id');
          $redirect = $this->input->get('redirect');
          $data = array('active' => 0);
          $this->hospital_model->deactivate($hospital_id, $data);
          $this->session->set_flashdata('feedback', lang('deactivated'));
          if ($redirect == 'deactive') {
            redirect('hospital/disable');
          } elseif ($redirect == 'active') {
            redirect('hospital/active');
          } else {
            redirect('hospital');
          }
        }

        function editHospital() {
          $data = array();
          $id = $this->input->get('id');
          $data['packages'] = $this->package_model->getPackage();
          $data['hospital'] = $this->hospital_model->getHospitalById($id);
          $data['available_languages'] = $this->config->item('available_languages');
          $this->load->view('home/dashboard'); 
          $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
      }

      function editHospitalByJason() {
        $id = $this->input->get('id');
        $data['hospital'] = $this->hospital_model->getHospitalById($id);
        $data['settings'] = $this->settings_model->getSettingsByHId($id);
        echo json_encode($data);
      }

      function delete() {
        $data = array();
        $id = $this->input->get('id');
        $user_data = $this->db->get_where('hospital', array('id' => $id))->row();
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->hospital_model->delete($id);
        redirect('hospital');
      }

      public function active() {
        $data['hospitals'] = $this->hospital_model->getHospital();
        $data['packages'] = $this->package_model->getPackage();
        $this->load->view('home/dashboard'); 
        $this->load->view('active_hospital', $data);
        $this->load->view('home/footer'); 
      }

      public function disable() {
        $data['hospitals'] = $this->hospital_model->getHospital();
        $data['packages'] = $this->package_model->getPackage();
        $this->load->view('home/dashboard'); 
        $this->load->view('disable_hospital', $data);
        $this->load->view('home/footer'); 
      }

      public function users() {
        $data['users'] = $this->hospital_model->getUsers();
        $data['groups'] = $this->donor_model->getBloodGroup();
        $this->load->view('home/dashboard'); 
        $this->load->view('users', $data);
        $this->load->view('home/footer'); 
      }
      public function deletePatient() {
        $data = array();
        $id = $this->input->get('id');

        $patient_hospital_id = $this->patient_model->getPatientById($id)->hospital_id;
        if ($patient_hospital_id != $this->session->userdata('hospital_id') && !$this->ion_auth->in_group(array('superadmin'))) {
          redirect('home/permission');
        }

        $user_data = $this->db->get_where('patient', array('id' => $id))->row();
        $path = $user_data->img_url;

        if (!empty($path)) {
          unlink($path);
        }
        $ion_user_id = $user_data->ion_user_id;
        $this->db->where('id', $ion_user_id);
        $this->db->delete('users');
        $this->patient_model->delete($id);
        $this->session->set_flashdata('feedback', lang('patient_deleted_notify'));
        redirect('hospital/users');
      }
    }

    /* End of file hospital.php */
    /* Location: ./application/modules/hospital/controllers/hospital.php */
