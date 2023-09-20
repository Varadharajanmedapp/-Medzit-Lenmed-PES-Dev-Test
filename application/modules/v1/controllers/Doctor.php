<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/MY_REST_Controller.php';
require  'vendor/autoload.php';
use \Firebase\JWT\JWT;

class Doctor extends MY_REST_Controller {

  function __construct() {    
    parent::__construct();
      $this->load->model('doctor_model');
      $this->load->model('user_model');
    $this->auth();    
  }

 /**
  * Register for the user of Medapps
  *
  */
  public function register_doctor_post() {
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
    $config = [
      [
        'field' => 'name',
        'label' => 'Name',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your name',
        ]
      ],
      [
        'field' => 'mobile',
        'label' => 'Mobile Number',
        'rules' => 'trim|numeric|required|max_length[15]|min_length[10]|unique[doctor.phone]',
        'errors' => [
          'required' => 'Please enter your mobile',
          'min_length' => 'Please enter your valid mobile number',
          'max_length' => 'Please enter your valid mobile number',
          'unique'=>'%s already exist',
          'numeric' => '%s must contain only numbers'
        ]
      ],
      [
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'trim|valid_email|unique[doctor.email]',
        'errors' => [
          'valid_email'=>'Please enter your valid email',
          'unique'=>'%s already exist'
        ]
      ],
      [
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'trim|required',
        'errors' => [
        'required' => 'Please enter your password',
      ]
    ],
    [
        'field' => 'govt_id',
        'label' => 'Govt ID ',
        'rules' => 'trim|required',
        'errors' => [
        'required' => 'Please enter your Govt Id',
      ]
    ],
     [
        'field' => 'department',
        'label' => 'department',
        'rules' => 'trim|required',
        'errors' => [
        'required' => 'Please enter your department',
      ]
    ],
     [
        'field' => 'specialist',
        'label' => 'specialist',
        'rules' => 'trim|required',
        'errors' => [
        'required' => 'Please enter your specialist',
      ]
    ],
    [
        'field' => 'profile',
        'label' => 'profile',
        'rules' => 'trim|required',
        'errors' => [
        'required' => 'Please enter your profile',
      ]
    ],
    [
        'field' => 'profile_img',
        'label' => 'profile_img',
        'rules' => 'trim|required',
        'errors' => [
        'required' => 'Please enter your profile image',
      ]
    ],
    [
        'field' => 'location',
        'label' => 'location',
        'rules' => 'trim|required',
        'errors' => [
        'required' => 'Please enter your location',
      ]
    ],
    [
        'field' => 'address',
        'label' => 'address',
        'rules' => 'trim|required',
        'errors' => [
        'required' => 'Please enter your address',
      ]
    ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Unknown App Version',
          'numeric' => '%s must contain only numbers'
        ]  
      ],
      [
        'field' => 'app_platform',
        'label' => 'App Platform',
        'rules' => 'trim|required|in_list[ios,android]',
        'errors' => [
          'required' => 'Unknown App Platform',
          'numeric' => '%s must contain only numbers',
          'in_list' => '%s must be ios or android'
        ]
      ]
    ];
      $this->form_validation->set_rules($config);
      if ($this->form_validation->run() === FALSE) {
        $data = $this->form_validation->error_array();
      if(isset($data['name']))  {
        $errorinfo = $data['name'];
      }
      if(isset($data['mobile'])) {
        $errorinfo = $data['mobile'];
      }
      if(isset($data['email'])) {
        $errorinfo = $data['email'];
      }
      if(isset($data['govt_id'])) {
        $errorinfo = $data['govt_id'];
      }
      if(isset($data['password'])) {
        $errorinfo = $data['password'];
      }
      if(isset($data['department'])) {
        $errorinfo = $data['department'];
      }
      if(isset($data['specialist'])) {
        $errorinfo = $data['specialist'];
      }
      if(isset($data['profile'])) {
        $errorinfo = $data['profile'];
      }
      if(isset($data['profile_img'])) {
        $errorinfo = $data['profile_img'];
      }
      if(isset($data['location'])) {
        $errorinfo = $data['location'];
      }
      if(isset($data['address'])) {
        $errorinfo = $data['address'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      $results = array('status' => "false",'message' => $errorinfo,'data' => (object)array());
      return $this->response($results);
    }
     else {
      try {
        $results = $this->doctor_model->register_doctor();
        return $this->response($results);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => (object)array());
        return $this->response($results);
      }
    }
  }

   /**
   * login the doctors in Medapps app based on mobile number
   *
   * @param string $mobile doctors's mobile number (please specify either mobile number or email doctors_id)
   * @param string $password doctors entered password for accessing account
   * @param string $app_version application version
   * @param string $app_platform application platform (ios/android)
   *
   * @return array Array of the logged in doctors data
   */
  public function doctor_login_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
      $config = [
        [
          'field' => 'mobile',
          'label' => 'Mobile',
          'rules' => 'trim|required|numeric',
          'errors' => [
            'required' => 'Please enter your mobile',
            'numeric' => '%s must contain only numbers'
          ],  
        ],
        [
          'field' => 'password',
          'label' => 'Password',
          'rules' => 'trim|required',
          'errors' => [
            'required' => 'Please enter your password',
          ],
        ],
        [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Unknown App Version',
          'numeric' => '%s must contain only numbers'
        ]  
      ],
      [
        'field' => 'app_platform',
        'label' => 'App Platform',
        'rules' => 'trim|required|in_list[ios,android]',
        'errors' => [
          'required' => 'Unknown App Platform',
          'numeric' => '%s must contain only numbers',
          'in_list' => '%s must be ios or android'
        ]
      ]
      ];
    
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array(); 
      if(isset($data['mobile'])) {
        $errorinfo = $data['mobile'];
      }
      if(isset($data['password'])) {
        $errorinfo = $data['password'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      $results = array('status' => "false",'message' => $errorinfo,'data' =>(object)array());
      return $this->response($results);
    }
    else {
      try {
        $results = $this->doctor_model->doctor_login();
        return $this->response($results);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      } 
    }
  }

  /**
  * on board view for the app_user of Med apps
  *
  */
  public function on_board_get() {
    $sess_id = $this->input->get_request_header('Sess-Id');
    try {
      $on_board_view = $this->user_model->on_board_get();
      $response = array('status' => "true",'message' => 'On board details','data' => base64_encode(encrypt_data($sess_id,json_encode($on_board_view))));
      return $this->response($response);
    }
    catch( Exception $e ) {
      log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
      $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
      return $this->response($results);
    }  
  } 
  /**
  * on board view for the app_user of Med apps
  *
  */
  public function terms_conditions_get() {
    $sess_id = $this->input->get_request_header('Sess-Id');        
    try {
      $terms_condition = $this->user_model->terms_condition();
      $response = array('status' => "true",'message' => 'Terms & Conditions','data' => base64_encode(encrypt_data($sess_id,json_encode($terms_condition))));
      return $this->response($response);
    }
    catch( Exception $e ) {
      log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
      $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
      return $this->response($results);
    }  
  }  
  /**
  * Nearest hospital for the Med apps
  *
  */
  public function nearest_hospital_get() { 
    try {
      $location = $this->input->get('location'); 
      if($location) {
        $results = $this->user_model->nearest_hospital($location);
        $response = array('status' => "true",'message' => 'Nearest hospital','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
      } else {
        $response = array('status' => "false",'message' => 'Please give a location','data' =>array());
      }
      return $this->response($response);
    }
    catch( Exception $e ) {
      log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
      $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
      return $this->response($results);
    }  
  }
  public function doctor_appointment_post() {
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
    $config = [
       [
        'field' => 'doctor_id',
        'label' => 'Doctor Id',
        'rules' => 'trim|required',
        'errors' => [
        'required' => 'Please enter the Doctor Id',
        ]
      ],
      [
        'field' => 'status',
        'label' => 'status',
        'rules' => 'trim|in_list[Pending Confirmation,Confirmed,Treated,Cancelled]',
        'errors' => [
        'in_list' => '%s must be Pending Confirmation/Confirmed/Treated/Cancelled'
        ]
      ], 
      [
      'field' => 'app_version',
      'label' => 'App Version',
      'rules' => 'trim|required',
      'errors' => [
      'required' => 'Unknown App Version',
      'numeric'=>'App Version not valid',
      ]  
      ],
      [
      'field' => 'app_platform', 
      'label' => 'App Platform',
      'rules' => 'trim|required|in_list[ios,android]',
      'errors' => [
      'required' => 'Unknown App Platform',
      'numeric'=>'App Platform not valid',
      'in_list' => '%s must be ios or android'
      ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if($this->form_validation->run() === FALSE){
      $data = $this->form_validation->error_array(); 
      if(isset($data['status'])) {
        $errorinfo = $data['status'];
      }
      if(isset($data['doctor_id'])) {
        $errorinfo = $data['doctor_id'];
      }
      if(isset($data['channel_name'])) {
        $errorinfo = $data['channel_name'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      } 
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }
      $results = array('status' => "false",'message' => $errorinfo,'data' => (object)array());
      return $this->response($results);
    }

    else{
      $id = $this->input->post('doctor_id');

      $check_doctor = $this->doctor_model->get_doctor($id);
      if ($check_doctor) {
        $status = $this->input->post('status');
        $appointment = $this->doctor_model->doctor_appointments($id,$status);
        if(!empty($appointment)){
          foreach ($appointment as &$doctor ) {
            $patient_token = $this->user_model->get_app_patient($doctor->patient_id);
            $doctor->date = date("m/d/Y", $doctor->date); 
            $doctor->doctor_image = $check_doctor['img_url'];
            $doctor->patient_img = $patient_token['img_url'];
            $doctor->notification_token = $patient_token['token'];
            $doctor->notification_token = isset($doctor->notification_token)?$doctor->notification_token:"";
          }
          $results = array('status' => "true",'message'=>'Appointment List','data' =>base64_encode(encrypt_data($sess_id,json_encode($appointment))));
          return $this->response($results);
        } else{
          $results = array('status' => "false",'message'=>'No result found','data' =>(object)array());
          return $this->response($results);
        }
      } else{
        $results = array('status' => "false",'message'=>'Doctor Not found','data' =>(object)array());
        return $this->response($results);
      }
    }
  }
  
  public function get_doctors_by_department_post() {
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    //$_POST  = (array) json_decode($this->input->raw_input_stream);
    $this->form_validation->set_data($_POST);
    $config = [
      [
        'field' => 'hospital_id',
        'label' => 'Hospital Id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter the Hospital Id',
        ]
      ],
      [
        'field' => 'department',
        'label' => 'Department',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter the Department',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Unknown App Version',
          'numeric'=>'App Version not valid',
        ]  
      ],
      [
        'field' => 'app_platform', 
        'label' => 'App Platform',
        'rules' => 'trim|required|in_list[ios,android]',
        'errors' => [
          'required' => 'Unknown App Platform',
          'numeric'=>'App Platform not valid',
          'in_list' => '%s must be ios or android'
        ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if($this->form_validation->run() === FALSE){
      $data = $this->form_validation->error_array(); 
      if(isset($data['department'])) {
        $errorinfo = $data['department'];
      }
      if(isset($data['hospital_id'])) {
        $errorinfo = $data['hospital_id'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      } 
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }
      $results = array('status' => "false",'message' => $errorinfo,'data' => (object)array());
      return $this->response($results);
    } else {
      $hospital_id = $this->input->post('hospital_id');
      $department = $this->input->post('department');

      //$doctors= $this->doctor_model->get_doctors_by_department($hospital_id,$department);

      $doctors['doctors'] = $this->doctor_model->get_doctors_by_department($hospital_id,$department);
     $doctors['weekoff'] = $this->doctor_model->get_doctors_weekoff($hospital_id,$department);
      if ($doctors) {
        $results = array('status' => "true",'message'=>'Doctors List','data' =>base64_encode(encrypt_data($sess_id,json_encode($doctors))));
       // $results = array('status' => "true",'message'=>'Doctors List','data' =>json_encode($doctors));
        return $this->response($results);
      } else{
        $results = array('status' => "false",'message'=>'No result found','data' =>(object)array());
        return $this->response($results);
      }
    }
  }

  public function get_doctors_schedule_post() {
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
    $config = [
      [
        'field' => 'doctor_id',
        'label' => 'Doctor Id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter the Doctor Id',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Unknown App Version',
          'numeric'=>'App Version not valid',
        ]  
      ],
      [
        'field' => 'app_platform', 
        'label' => 'App Platform',
        'rules' => 'trim|required|in_list[ios,android]',
        'errors' => [
          'required' => 'Unknown App Platform',
          'numeric'=>'App Platform not valid',
          'in_list' => '%s must be ios or android'
        ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if($this->form_validation->run() === FALSE){
      $data = $this->form_validation->error_array(); 
      if(isset($data['doctor_id'])) {
        $errorinfo = $data['doctor_id'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      } 
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }
      $results = array('status' => "false",'message' => $errorinfo,'data' => (object)array());
      return $this->response($results);
    } else {
      $doctor_id = $this->input->post('doctor_id');
      $date = strtotime($this->input->post('date'));
      $this->load->model('schedule/schedule_model');
      $slots_list = $this->doctor_model->getAvailableSlotByDoctorByDate($date, $doctor_id);
      if ($slots_list) {
        $results = array('status' => "true",'message'=>'Doctors schedule time list','data' =>base64_encode(encrypt_data($sess_id,json_encode($slots_list))));
        return $this->response($results);
      } else{
        $results = array('status' => "false",'message'=>'No result found','data' =>(object)array());
        return $this->response($results);
      }
    }
  }
  public function banners_get() { 
    $sess_id = $this->input->get_request_header('Sess-Id');       
    try {
      $banner_details = $this->user_model->banners_get('doctor');
      foreach ($banner_details as &$detail) {
       $detail['image'] = base_url().$detail['image'];
      }

      $response = array('status' => "true",'message' => 'Banner details','data' => base64_encode(encrypt_data($sess_id,json_encode($banner_details))));
      return $this->response($response);
    }
    catch( Exception $e ) {
      log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
      $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
      return $this->response($results);
    }  
  }
  public function doctor_status_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
    $config = [
      [
        'field' => 'doctor_id',
        'label' => 'doctor_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Doctors id',
        ]
      ],
      [
        'field' => 'appointment_id',
        'label' => 'appointment id',
        'rules' => 'trim|required',       
         'errors' => [
          'required' => 'Please enter Appointment id',
        ]
      ],
      [
        'field' => 'status',
        'label' => 'status',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please Select status',
        ]
      ],
      [
        'field' => 'otp',
        'label' => 'otp',
        'rules' => 'trim',
        'errors' => [
          'required' => 'Please enter otp',
        ]
      ],
      [
        'field' => 'channel_name',
        'label' => 'Channel name',
        'rules' => 'trim',
        'errors' => [
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Unknown App Version',
          'numeric' => '%s must contain only numbers'
        ]  
      ],
      [
        'field' => 'app_platform',
        'label' => 'App Platform',
        'rules' => 'trim|required|in_list[ios,android]',
        'errors' => [
          'required' => 'Unknown App Platform',
          'numeric' => '%s must contain only numbers',
          'in_list' => '%s must be ios or android'
        ]
      ]
    ];
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array();
      if(isset($data['doctor_id']))  {
        $errorinfo = $data['doctor_id'];
      }
      if(isset($data['appointment_id']))  {
        $errorinfo = $data['appointment_id'];
      }
       if(isset($data['otp']))  {
        $errorinfo = $data['otp'];
      }
      if(isset($data['status']))  {
        $errorinfo = $data['status'];
      }
      if(isset($data['channel_name']))  {
        $errorinfo = $data['channel_name'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      $results = array('status' => "false",'message' => $errorinfo,'data' => (object)array());
      return $this->response($results);
    }
    else {
      try {
        $id = $this->input->post('doctor_id');
        $appointment_id = $this->input->post('appointment_id');
        $data['doctor_id'] = $id;
        $data['appointment_id'] = $appointment_id;
        $data['status']   = $this->input->post('status');
        $data['remarks']   = $this->input->post('remarks');
        $data['otp']      = $this->input->post('otp');
        $data['channel_name'] = $this->input->post('channel_name');
        $get_img = $this->user_model->getDoctor_fees($data['doctor_id']);
        $results = $this->doctor_model->doctor_appointment_status($data);
        if ($results != "Please enter valid otp") {
          $results->date = date("m/d/Y", $results->date);
          $results->img_url = $get_img['img_url'];
          $response = array('status' => "true",'message' => 'Appointment '.$data['status'],'data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
        }else{
         $response = array('status' => "false",'message' => base64_encode(encrypt_data($sess_id,json_encode($results))),'data' => (object)array());
        }
        return $this->response($response);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => (object)array());
        return $this->response($results);
      }
    }  
  }

public function payment_history_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
    $config = [
      [
        'field' => 'doctor_id',
        'label' => 'doctor_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please choose a Doctor',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Unknown App Version',
          'numeric' => '%s must contain only numbers'
        ]  
      ],
      [
        'field' => 'app_platform',
        'label' => 'App Platform',
        'rules' => 'trim|required|in_list[ios,android]',
        'errors' => [
          'required' => 'Unknown App Platform',
          'numeric' => '%s must contain only numbers',
          'in_list' => '%s must be ios or android'
        ]
      ]
    ];
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array();
      if(isset($data['doctor_id']))  {
        $errorinfo = $data['doctor_id'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      $results = array('status' => "false",'message' => $errorinfo,'data' => (object)array());
      return $this->response($results);
    }
    else {
      try {
        $doctor_payment_history = $this->doctor_model->doctor_payment_history($this->input->post('doctor_id'));
        $response = array('status' => "true",'message' => 'Transaction history','data' => base64_encode(encrypt_data($sess_id,json_encode($doctor_payment_history))));
        return $this->response($response);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => (object)array());
        return $this->response($results);
      }
    }  
  }


  /**
  * get the existing doctor or not of given mobile no
  *
  * @param string $mobileNo Doctor's Mobile number
  * @param string $app_version application version
  * @param string $app_platform application platform (ios/android)
  *
  * @return object Existing user status
  */
  public function existing_doctor_post() {            
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'mobileNo',
        'label' => 'MobileNo',
        'rules' => 'trim|required|max_length[15]|min_length[6]',
        'errors' => [
          'required' => 'Please enter your mobile number',
          'min_length' => 'Please enter your valid mobile number',
          'max_length' => 'Please enter your valid mobile number',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
            'required' => 'Unknown App Version',
            'numeric'=>'App Version not valid',
        ]  
      ],
    [
        'field' => 'app_platform',
        'label' => 'App Platform',
        'rules' => 'trim|required|in_list[ios,android]',
        'errors' => [
            'required' => 'Unknown App Platform',
            'numeric'=>'App Platform not valid',
            'in_list' => '%s must be ios or android'
        ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array(); 
      if(isset($data['mobileNo'])) {
        $errorinfo = $data['mobileNo'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }    
      $results = array('status' => "false",'message' => $errorinfo );
      return $this->response($results);
    }
    else {
      try {
        $mobileNo = $this->input->post('mobileNo');
        $details = $this->doctor_model->check_mobile($mobileNo);
      if ($details) {
       $response = array('status' => "true",'message' => 'This User already exist');
        return $this->response($response);
      }else {
       $response = array('status' => "false",'message' => 'This User was not found');
        return $this->response($response);
      }
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      } 
    }
  }

  /**
  * Doctor add the prescription of patient 
  *
  * @param string $doctor_id Doctors's Id
  * @param string $patient_id Patient Id
  * @param string $appointment_id Appointment's Id
  * @param string $description Description
  * @param string $$report_img Report Image of patient
  * @param string $app_version application version
  * @param string $app_platform application platform (ios/android)
  *
  * @return object of Doctors Prescription
  */ 

  public function doctor_prescription_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
    $config = [
      [
        'field' => 'doctor_id',
        'label' => 'doctor_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Doctors id',
        ]
      ],
      [
        'field' => 'patient_id',
        'label' => 'patient_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Patient id',
        ]
      ],
      [
        'field' => 'appointment_id',
        'label' => 'appointment id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Appointment id',
        ]
      ],
      [
        'field' => 'description',
        'label' => 'appointment id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Description ',
        ]
      ],
      [
        'field' => 'report_img',
        'label' => 'Report img',
        'rules' => 'trim',
        'errors' => [
          // 'required' => 'Please Select your Report img',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Unknown App Version',
          'numeric' => '%s must contain only numbers'
        ]  
      ],
      [
        'field' => 'app_platform',
        'label' => 'App Platform',
        'rules' => 'trim|required|in_list[ios,android]',
        'errors' => [
          'required' => 'Unknown App Platform',
          'numeric' => '%s must contain only numbers',
          'in_list' => '%s must be ios or android'
        ]
      ]
    ];
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array();
      if(isset($data['doctor_id']))  {
        $errorinfo = $data['doctor_id'];
      }
      if(isset($data['patient_id']))  {
        $errorinfo = $data['patient_id'];
      }
      if(isset($data['description']))  {
        $errorinfo = $data['description'];
      }
       if(isset($data['appointment_id']))  {
        $errorinfo = $data['appointment_id'];
      }
      if(isset($data['report_img']))  {
        $errorinfo = $data['report_img'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      $results = array('status' => "false",'message' => $errorinfo,'data' => (object)array());
      return $this->response($results);
    }
    else {
      try {
      $doc_id = $this->input->post('doctor_id');
      $report_id = $this->input->post('report_id');
      $patient_id = $this->input->post('patient_id');
      $appointment_id = $this->input->post('appointment_id');
      $report_img = $this->input->post('report_img');
      $check_report = $this->doctor_model->get_appointment_check($doc_id,$patient_id,$appointment_id);
      if ($check_report) {
        $data['date']  = $check_report['date'];
        $data['report_id'] = $report_id;
        $data['patient'] = $patient_id;
        $data['doctor'] = $doc_id;
        $data['appointment_id'] = $appointment_id;
        $data['report_img'] = $report_img;
        $data['description'] = $this->input->post('description');
        $data['patientname']  = $check_report['patientname'];
        $data['doctorname']  = $check_report['doctorname'];
        $data['hospital_id']  = $check_report['hospital_id'];
        if($report_img != "") {
          define("DOCTOR_IMAGES_DIRECTORY",ASSETS_DIRECTORY. DIRECTORY_SEPARATOR .'images/doctor_report/');
          if (!file_exists(DOCTOR_IMAGES_DIRECTORY)) {
            mkdir(DOCTOR_IMAGES_DIRECTORY, 0777, true);
          }
          $image    = base64_decode($report_img);  
          $filename = date('YmdHis').'.'.'png';
          $srcfile  = DOCTOR_IMAGES_DIRECTORY.$filename;
          file_put_contents($srcfile, $image);

          $data['report_img'] = base_url()."assets/images/doctor_report/".$filename;
        }

        $results = $this->doctor_model->doctor_report($data);
        $response = array('status' => "true",'message' => 'Report Submitted Sucessfully','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
        return $this->response($response);
       } 
       else{
         $results = array('status' => "false",'message'=>'Dcotor/ patient are mismatch ','data' =>(object)array());
        return $this->response($results);
       }
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => (object)array());
        return $this->response($results);
      }
    }  
  }

  public function doctor_form_post() {            
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'doctor_id',
        'label' => 'doctor_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Doctor ID',
          // 'numeric'=>'Enter valid Frame ID',
        ]
      ],
      [
        'field' => 'gallery',
        'label' => 'Gallery',
        'allowed_types'=>'jpg|png|gif',
        'rules' =>'required',
        'errors' => [
          'required' => 'Please select Gallery',
          'allowed_types' => 'Please enter a valid Gallery',
            ]
          ],
       [
        'field' => 'fees',
        'label' => 'fees',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Doctor Fees',
          // 'numeric'=>'App Platform not valid',
        ]
      ],
      [
        'field' => 'video_link',
        'label' => 'video_link',
        'rules' => 'trim',
        'errors' => [
          // 'required' => 'Please enter your Video Link',
          // 'numeric'=>'App Platform not valid',
        ]
      ],
      [
        'field' => 'description',
        'label' => 'Description',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Description',
          // 'numeric'=>'App Platform not valid',
        ]
      ],
      [
        'field' => 'schedule_time',
        'label' => 'Schedule Time',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Schedule Time',
          // 'numeric'=>'App Platform not valid',
        ]
      ],
      [
        'field' => 'cover_image',
        'label' => 'Cover Image',
        'allowed_types'=>'jpg|png|gif',
        'rules' =>'required',
        'errors' => [
          'required' => 'Please select Cover Image',
          'allowed_types' => 'Please enter a valid Cover Image',
            ]
          ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
            'required' => 'Unknown App Version',
            'numeric'=>'App Version not valid',
        ]  
      ],
    [
      'field' => 'app_platform',
      'label' => 'App Platform',
      'rules' => 'trim|required|in_list[ios,android]',
      'errors' => [
          'required' => 'Unknown App Platform',
          'numeric'=>'App Platform not valid',
          'in_list' => '%s must be ios or android'
      ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array(); 
      if(isset($data['doctor_id'])) {
        $errorinfo = $data['doctor_id'];
      }
      if(isset($data['gallery'])) {
        $errorinfo = $data['gallery'];
      }
      if(isset($data['fees'])) {
        $errorinfo = $data['fees'];
      } 
      if(isset($data['video_link'])) {
        $errorinfo = $data['video_link'];
      } 
      if(isset($data['schedule_time'])) {
        $errorinfo = $data['schedule_time'];
      }
      if(isset($data['description'])) {
        $errorinfo = $data['description'];
      } 
       if(isset($data['cover_image'])) {
        $errorinfo = $data['cover_image'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }    
      $results = array('status' => "false",'message' => $errorinfo );
      
      return $this->response($results);
    }
    else {
      try {
        $id = $this->input->post('doctor_id');
        $check_id  = $this->doctor_model->get_doctor($id);
        if ($check_id) {
          $response = $this->doctor_model->update_doctor($id);
        }
        else {
          $response = array('status' => "false",'message' => 'No user Found','data' =>(object)array());
        }
        return $this->response($response);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      } 
    }
  }  
  public function update_specialist_post() {            
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'doctor_id',
        'label' => 'doctor_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Doctor ID',
          // 'numeric'=>'Enter valid Frame ID',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
            'required' => 'Unknown App Version',
            'numeric'=>'App Version not valid',
        ]  
      ],
    [
      'field' => 'app_platform',
      'label' => 'App Platform',
      'rules' => 'trim|required|in_list[ios,android]',
      'errors' => [
          'required' => 'Unknown App Platform',
          'numeric'=>'App Platform not valid',
          'in_list' => '%s must be ios or android'
      ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array(); 
      if(isset($data['doctor_id'])) {
        $errorinfo = $data['doctor_id'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }    
      $results = array('status' => "false",'message' => base64_encode(encrypt_data($sess_id,json_encode($errorinfo ))));
      
      return $this->response($results);
    }
    else {
      try {
        $id = $this->input->post('doctor_id');
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['address'] = $this->input->post('address');
        $data['phone'] = $this->input->post('phone');
        $data['department'] = $this->input->post('department');
        $data['specialist'] = $this->input->post('specialist');
        $check_id  = $this->doctor_model->get_doctor($id);
        if ($check_id) {
          $response = $this->doctor_model->update_specialist($id,$data);
        }
        else {
          $response = array('status' => "false",'message' => 'No user Found','data' =>(object)array());
        }
        return $this->response($response);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      } 
    }
  }  
  public function view_doctor_post() {            
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'doctor_id',
        'label' => 'doctor_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Doctor ID',
          // 'numeric'=>'Enter valid Frame ID',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
            'required' => 'Unknown App Version',
            'numeric'=>'App Version not valid',
        ]  
      ],
    [
      'field' => 'app_platform',
      'label' => 'App Platform',
      'rules' => 'trim|required|in_list[ios,android]',
      'errors' => [
          'required' => 'Unknown App Platform',
          'numeric'=>'App Platform not valid',
          'in_list' => '%s must be ios or android'
      ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array(); 
      if(isset($data['doctor_id'])) {
        $errorinfo = $data['doctor_id'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }    
      $results = array('status' => "false",'message' => $errorinfo );
      
      return $this->response($results);
    }
    else {
      try {
        $id = $this->input->post('doctor_id');
        $check_id  = $this->doctor_model->get_doctor($id);
        // var_dump($check_id);die();
        if($check_id) {
          $appointment = $this->doctor_model->doctor_appointment($id);
          $pending = $this->doctor_model->doctor_pending($id);
          $completed = $this->doctor_model->doctor_treated($id);
          $patient = $this->doctor_model->patient_count($id);
          $details = $this->doctor_model->doctor_details($id);
          $data['all_appointments']        = count($appointment);
          $data['new_appointments']        = count($pending);
          $data['completed_appointments']  = count($completed);
          $data['patient']                 = count($patient);
          $data['doctor_details']          = $details;
        $response = array('status' => "true",'message' => 'Doctor Reports','data' => base64_encode(encrypt_data($sess_id,json_encode($data))));
      } else {
        $response = array('status' => "false",'message' => 'No user Found','data' =>(object)array());
      }
      return $this->response($response);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      } 
    }
  }

  public function get_patients_post() {            
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'doctor_id',
        'label' => 'doctor_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Doctor ID',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
            'required' => 'Unknown App Version',
            'numeric'=>'App Version not valid',
        ]  
      ],
    [
      'field' => 'app_platform',
      'label' => 'App Platform',
      'rules' => 'trim|required|in_list[ios,android]',
      'errors' => [
          'required' => 'Unknown App Platform',
          'numeric'=>'App Platform not valid',
          'in_list' => '%s must be ios or android'
      ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array(); 
      if(isset($data['doctor_id'])) {
        $errorinfo = $data['doctor_id'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }    
      $results = array('status' => "false",'message' => $errorinfo );
      
      return $this->response($results);
    }
    else {
      try {
        $id = $this->input->post('doctor_id');
        $check_id  = $this->doctor_model->get_doctor($id);
        if($check_id) {
          $data['patient'] = $this->doctor_model->get_my_patients($id);
          $response = array('status' => "true",'message' => 'Patients List','data' => base64_encode(encrypt_data($sess_id,json_encode($data))));
        } else {
          $response = array('status' => "false",'message' => 'No doctors Found','data' =>(object)array());
        }
        return $this->response($response);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      } 
    }
  }


  
  /**
  * Doctor add the prescription of patient in doctor app 
  *
  * @param string $doctor_id Doctors's Id
  * @param string $patient_id Patient Id
  * @param string $appointment_id Appointment's Id
  * @param string $description Description
  * @param string $$report_img Report Image of patient
  * @param string $app_version application version
  * @param string $app_platform application platform (ios/android)
  *
  * @return object of Doctors Prescription
  */ 

  public function doctor_add_prescription_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
    $config = [
      [
        'field' => 'doctor_id',
        'label' => 'doctor_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Doctors id',
        ]
      ],
      [
        'field' => 'patient_id',
        'label' => 'patient_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Patient id',
        ]
      ],
      [
        'field' => 'appointment_id',
        'label' => 'appointment id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Appointment id',
        ]
      ],
      [
        'field' => 'description',
        'label' => 'appointment id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Description ',
        ]
      ],
      [
        'field' => 'report_img',
        'label' => 'Report img',
        'rules' => 'trim',
        'errors' => [
          // 'required' => 'Please Select your Report img',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Unknown App Version',
          'numeric' => '%s must contain only numbers'
        ]  
      ],
      [
        'field' => 'app_platform',
        'label' => 'App Platform',
        'rules' => 'trim|required|in_list[ios,android]',
        'errors' => [
          'required' => 'Unknown App Platform',
          'numeric' => '%s must contain only numbers',
          'in_list' => '%s must be ios or android'
        ]
      ]
    ];
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array();
      if(isset($data['doctor_id']))  {
        $errorinfo = $data['doctor_id'];
      }
      if(isset($data['patient_id']))  {
        $errorinfo = $data['patient_id'];
      }
      if(isset($data['description']))  {
        $errorinfo = $data['description'];
      }
       if(isset($data['appointment_id']))  {
        $errorinfo = $data['appointment_id'];
      }
      if(isset($data['report_img']))  {
        $errorinfo = $data['report_img'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      $results = array('status' => "false",'message' => $errorinfo,'data' => (object)array());
      return $this->response($results);
    }
    else {
      try {
      $doc_id = $this->input->post('doctor_id');
      $patient_id = $this->input->post('patient_id');
      $appointment_id = $this->input->post('appointment_id');
      $report_img = $this->input->post('report_img');
      $check_report = $this->doctor_model->get_appointment_check($doc_id,$patient_id,$appointment_id);
      if ($check_report) {
        $data['date']  = $check_report['date'];
        $data['patient'] = $patient_id;
        $data['doctor'] = $doc_id;
        $data['symptom'] = $this->input->post('symptom');
        $data['note'] = $this->input->post('note');
        $data['advice'] = $this->input->post('advice');
        $data['report_id'] = $this->input->post('report_id');
        $data['appointment_id'] = $appointment_id;
        $data['description'] = $this->input->post('description');
        $data['patientname']  = $check_report['patientname'];
        $data['doctorname']  = $check_report['doctorname'];
        $data['hospital_id']  = $check_report['hospital_id'];
        $medicine = $this->input->post('medicine');
        $dosage = (array)$this->input->post('dosage');
        $frequency = (array)$this->input->post('frequency');
        $days = (array)$this->input->post('days');
        $instruction = (array)$this->input->post('instruction');
        $report = array();

        if (!empty($medicine)) {
          foreach ($medicine as $key => $value) {
            $report[$value] = array(
                'dosage' => $dosage[$key],
                'frequency' => $frequency[$key],
                'days' => $days[$key],
                'instruction' => $instruction[$key],
            );
          }

          foreach ($report as $key1 => $value1) {
              $final[] = $key1 . '***' . implode('***', $value1);
          }

          $final_report = implode('###', $final);
        } else {
            $final_report = '';
        }
        $data['medicine'] = $final_report;
        if($report_img != "") {
          define("DOCTOR_IMAGES_DIRECTORY",ASSETS_DIRECTORY. DIRECTORY_SEPARATOR .'images/doctor_report/');
          if (!file_exists(DOCTOR_IMAGES_DIRECTORY)) {
            mkdir(DOCTOR_IMAGES_DIRECTORY, 0777, true);
          }
          $image    = base64_decode($report_img);  
          $filename = date('YmdHis').'.'.'png';
          $srcfile  = DOCTOR_IMAGES_DIRECTORY.$filename;
          file_put_contents($srcfile, $image);

          $data['report_img'] = base_url()."assets/images/doctor_report/".$filename;
        }

        $results = $this->doctor_model->doctor_report($data);
        $response = array('status' => "true",'message' => 'Report Submitted Sucessfully','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
        return $this->response($response);
       } 
       else{
         $results = array('status' => "false",'message'=>'Dcotor/ patient are mismatch ','data' =>(object)array());
        return $this->response($results);
       }
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => (object)array());
        return $this->response($results);
      }
    }  
  }
  public function get_medicine_list_post() {
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'doctor_id',
        'label' => 'doctor_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Doctor ID',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
            'required' => 'Unknown App Version',
            'numeric'=>'App Version not valid',
        ]  
      ],
    [
      'field' => 'app_platform',
      'label' => 'App Platform',
      'rules' => 'trim|required|in_list[ios,android]',
      'errors' => [
          'required' => 'Unknown App Platform',
          'numeric'=>'App Platform not valid',
          'in_list' => '%s must be ios or android'
      ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array(); 
      if(isset($data['report_id'])) {
        $errorinfo = $data['report_id'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }    
      $results = array('status' => "false",'message' => $errorinfo );
      
      return $this->response($results);
    }
    else {
      $doctor_id = $this->input->post('doctor_id');
      $searchTerm = $this->input->post('searchTerm');
      $results = $this->doctor_model->getMedicineInfo($doctor_id,$searchTerm);
      $response = array('status' => "true",'message' => 'medicine list','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
      return $this->response($response);
    }
  }
  public function doctor_view_prescription_post() {            
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'report_id',
        'label' => 'report_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Report ID',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
            'required' => 'Unknown App Version',
            'numeric'=>'App Version not valid',
        ]  
      ],
    [
      'field' => 'app_platform',
      'label' => 'App Platform',
      'rules' => 'trim|required|in_list[ios,android]',
      'errors' => [
          'required' => 'Unknown App Platform',
          'numeric'=>'App Platform not valid',
          'in_list' => '%s must be ios or android'
      ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array(); 
      if(isset($data['report_id'])) {
        $errorinfo = $data['report_id'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }    
      $results = array('status' => "false",'message' => $errorinfo );
      
      return $this->response($results);
    }
    else {
      try {
        $report_id = $this->input->post('report_id');
        $doctor_id = $this->input->post('doctor_id');
        $data['prescription'] = $this->doctor_model->view_prescription($doctor_id,$report_id);
        if(!empty($data['prescription'])){
          foreach($data['prescription'] as &$prescription){
            $medicines = explode('###', $prescription->medicine);
            foreach ($medicines as &$value) {
              $single_medicine = explode('***', $value);
              $single_medicine[0] = $this->user_model->getMedicineById($single_medicine[0])->name;
              $value = implode('***',$single_medicine);
            }
            $prescription->medicine = implode('###',$medicines);
          }
          $response = array('status' => "true",'message' => 'Prescription List','data' => base64_encode(encrypt_data($sess_id,json_encode($data))));
        } else {
          $response = array('status' => "false",'message' => 'No prescription Found','data' =>(object)array());
        }
        return $this->response($response);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      } 
    }
  }
  public function view_doctor_form_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'doctor_id',
        'label' => 'doctor_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Doctor ID',
          // 'numeric'=>'Enter valid Frame ID',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
            'required' => 'Unknown App Version',
            'numeric'=>'App Version not valid',
        ]  
      ],
    [
      'field' => 'app_platform',
      'label' => 'App Platform',
      'rules' => 'trim|required|in_list[ios,android]',
      'errors' => [
          'required' => 'Unknown App Platform',
          'numeric'=>'App Platform not valid',
          'in_list' => '%s must be ios or android'
      ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array(); 
      if(isset($data['doctor_id'])) {
        $errorinfo = $data['doctor_id'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }    
      $results = array('status' => "false",'message' => $errorinfo );
      
      return $this->response($results);
    }
    else {
      try {
        $id = $this->input->post('doctor_id');
        $check_id  = $this->doctor_model->get_doctor($id);
        if($check_id) {
          $details = $this->doctor_model->doctor_form($id);
            if($details['gallery'] != "") {
              $details['gallery'] = unserialize($details['gallery']);
            }else{
              $details['gallery'] = (object)array();}
            if($details['video_url'] != "") {
              $details['video_url'] = unserialize($details['video_url']);
            }else{
              $details['video_url'] = (object)array();
            }
            if($details['hospital_id']!='app_doctor'){
              $hospital = $this->user_model->get_hospital_details($details['hospital_id']); 
              $details['cover_image']  = $hospital['img_url'];
            }
        $response = array('status' => "true",'message' => 'Doctor Reports','data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
      } else {
        $response = array('status' => "false",'message' => 'No user Found','data' =>(object)array());
      }
      return $this->response($response);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      } 
    }
  }  
  public function doctor_forgot_password_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
      $config = [
        [
          'field' => 'mobile',
          'label' => 'Mobile',
          'rules' => 'trim|required|numeric',
          'errors' => [
            'required' => 'Please enter your mobile',
            'numeric' => '%s must contain only numbers'
          ],  
        ],
        [
          'field' => 'password',
          'label' => 'Password',
          'rules' => 'trim|required',
          'errors' => [
            'required' => 'Please enter your password',
          ],
        ],
        [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Unknown App Version',
          'numeric' => '%s must contain only numbers'
        ]  
      ],
      [
        'field' => 'app_platform',
        'label' => 'App Platform',
        'rules' => 'trim|required|in_list[ios,android]',
        'errors' => [
          'required' => 'Unknown App Platform',
          'numeric' => '%s must contain only numbers',
          'in_list' => '%s must be ios or android'
        ]
      ]
      ];
    
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array(); 
      if(isset($data['mobile'])) {
        $errorinfo = $data['mobile'];
      }
      if(isset($data['password'])) {
        $errorinfo = $data['password'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      $results = array('status' => "false",'message' => $errorinfo,'data' =>(object)array());
      return $this->response($results);
    }
    else {
      try {
        $mobile = $this->input->post('mobile');
        $check_doctor = $this->doctor_model->check_mobile($mobile);
        $id = $check_doctor['id'];
      if ($check_doctor) {
      $password =  hash('sha512', $this->input->post('password'));
      $forgot = $this->doctor_model->doc_forgot_pass($id,$mobile,$password);
        $results = array('status' => "true",'message'=>'Password updated successfully','data' =>base64_encode(encrypt_data($sess_id,json_encode($forgot))));
         return $this->response($results);
       } 
       else{
         $results = array('status' => "false",'message'=>'Mobile Not found','data' =>(object)array());
        return $this->response($results);
       }
     }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      } 
    }
  }

  /**
  * get the report of given appointment id
  *
  * @param string $patient_id patient Id
  * @param string $app_version application version
  * @param string $app_platform application platform (ios/android)
  *
  * @return array Array of the Doctor's report 
  */
  public function Report_post() {            
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'patient_id',
        'label' => 'patient_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Patient ID',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
            'required' => 'Unknown App Version',
            'numeric'=>'App Version not valid',
        ]  
      ],
    [
        'field' => 'app_platform',
        'label' => 'App Platform',
        'rules' => 'trim|required|in_list[ios,android]',
        'errors' => [
            'required' => 'Unknown App Platform',
            'numeric'=>'App Platform not valid',
            'in_list' => '%s must be ios or android'
        ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array(); 
      if(isset($data['patient_id'])) {
        $errorinfo = $data['patient_id'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }    
      $results = array('status' => "false",'message' => $errorinfo );
      return $this->response($results);
    }
    else {
      try {
        $patientId = $this->input->post('patient_id');
        $details = $this->doctor_model->getReport($patientId);
        if($details) {
        $response = array('status' => "true",'message' => 'Doctor Report Details','data'=> base64_encode(encrypt_data($sess_id,json_encode($details))));
        return $this->response($response);
        }else {
          $response = array('status' => "false",'message' => 'Report not Found');
          return $this->response($response);
        }
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      } 
    }
  }
  public function doctor_view_prescriptions_post() {            
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'patient_id',
        'label' => 'patient_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Patient ID',
        ]
      ],
      [
        'field' => 'appointment_id',
        'label' => 'appointment_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Appointment ID',
        ]
      ],
      [
        'field' => 'app_version',
        'label' => 'App Version',
        'rules' => 'trim|required',
        'errors' => [
            'required' => 'Unknown App Version',
            'numeric'=>'App Version not valid',
        ]  
      ],
    [
        'field' => 'app_platform',
        'label' => 'App Platform',
        'rules' => 'trim|required|in_list[ios,android]',
        'errors' => [
            'required' => 'Unknown App Platform',
            'numeric'=>'App Platform not valid',
            'in_list' => '%s must be ios or android'
        ]  
      ]
    ];
    $this->form_validation->set_data($_POST);
    $this->form_validation->set_rules($config);
    if ($this->form_validation->run() === FALSE) {
      $data = $this->form_validation->error_array(); 
      if(isset($data['appointment_id'])) {
        $errorinfo = $data['appointment_id'];
      }
      if(isset($data['patient_id'])) {
        $errorinfo = $data['patient_id'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }    
      $results = array('status' => "false",'message' => $errorinfo );
      return $this->response($results);
    }
    else { 
      try {
        $response = array();
        $patientId = $this->input->post('patient_id');
        $appointId = $this->input->post('appointment_id');
        $appointment = $this->doctor_model->get_appointment_by_id($appointId);

        $prescriptions = $this->doctor_model->view_doctor_prescription($patientId,$appointId);
        $pres = array();
        if($prescriptions || $appointment) {
          foreach ($prescriptions as &$prescription ) {

            $report_id = $prescription->report_id;
            $doctor_id = $prescription->doctor_id;

            $all_prescriptions = $this->doctor_model->view_prescription($doctor_id,$report_id);
            if(!empty($all_prescriptions)){
              foreach($all_prescriptions as &$all_prescription){
                $medicines = explode('###', $all_prescription->medicine);
                foreach ($medicines as &$value) {
                  $single_medicine = explode('***', $value);
                  $single_medicine[0] = $this->user_model->getMedicineById($single_medicine[0])->name;
                  $value = implode('***',$single_medicine);
                }
                $all_prescription->medicine = implode('###',$medicines);
                $all_prescription->created_at = date("m/d/Y", $all_prescription->date);
                $pres[] = $all_prescription;
              }
            }
            $prescription = $all_prescriptions;
          }
          $all_pres['appointment'] = $appointment;
          $all_pres['prescriptions'] = $pres;
          $response = array('status' => "true",'message' => 'Doctor Prescription Details','data'=>base64_encode(encrypt_data($sess_id,json_encode($all_pres))));
          return $this->response($response);
        }else {
          $response = array('status' => "false",'message' => 'Prescription Not Found','data'=>(object)array());
          return $this->response($response);
        }
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      } 
    }
  }

  public function doctor_status_on_off_post() {  
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
      $this->form_validation->set_data($_POST);
      $config = [
        [
          'field' => 'doctor_id',
          'label' => 'doctor_id',
          'rules' => 'trim|required',
          'errors' => [
            'required' => 'Please enter doctor_id',
          ]
        ],
      [
        'field' => 'status',
        'label' => 'status',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please select status',
       ]
      ],
        [
          'field' => 'app_version',
          'label' => 'App Version',
          'rules' => 'trim|required',
          'errors' => [
            'required' => 'Unknown App Version',
            'numeric' => '%s must contain only numbers'
          ]  
        ],
        [
          'field' => 'app_platform',
          'label' => 'App Platform',
          'rules' => 'trim|required|in_list[ios,android]',
          'errors' => [
            'required' => 'Unknown App Platform',
            'numeric' => '%s must contain only numbers',
            'in_list' => '%s must be ios or android'
          ]
        ]
      ];
      $this->form_validation->set_rules($config);
      if ($this->form_validation->run() === FALSE) {
        $data = $this->form_validation->error_array();
        if(isset($data['doctor_id']))  {
          $errorinfo = $data['doctor_id'];
        }
        if(isset($data['status']))  {
          $errorinfo = $data['status'];
        }
        if(isset($data['app_version'])) {
          $errorinfo = $data['app_version'];
        }
        if(isset($data['app_platform'])) {
          $errorinfo = $data['app_platform'];
        }
        $results = array('status' => "false",'message' => $errorinfo,'data' => (object)array());
        return $this->response($results);
      }
      else {
        try {
          $doctor_id = $this->input->post('doctor_id');
          $check_doctor = $this->doctor_model->get_doctor($doctor_id);
          if($check_doctor) {
            $data['id'] = $doctor_id;
            $data['is_online'] = $this->input->post('status');
            $result = $this->doctor_model->doctor_status($data);

           $response = array('status' => "true",'message' => 'Status updated','data' => base64_encode(encrypt_data($sess_id,json_encode($result))));
           return $this->response($response);
         }
         else{
          $response = array('status' => "false",'message' => 'Doctor Not found','data' => (object)array());
          return $this->response($response);
        }
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => (object)array());
        return $this->response($results);
      }
    }  
  } 
}
  
