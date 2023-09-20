<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/MY_REST_Controller.php';
require  'vendor/autoload.php';
use \Firebase\JWT\JWT;

class User extends MY_REST_Controller {


  function __construct() {    
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('doctor_model');
    $this->auth();    
  }

 /**
  * Register for the user of Medapps
  *
  */
 public function check_email_post() {
  $sess_id = $this->input->get_request_header('Sess-Id');
  $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
  $this->form_validation->set_data($_POST);
  $config = [
    [
      'field' => 'user_email',
      'label' => 'Email',
      'rules' => 'trim|valid_email|unique[patient.email]',
      'errors' => [
        'valid_email'=>'Please enter your valid email',
        'unique'=>'%s already exist'
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
    if(isset($data['user_email'])) {
      $errorinfo = $data['user_email'];
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
      $results = array('status' => "true",'message' => 'Email address not found.','data' => (object)array());
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
  * Register for the user of Medapps
  *
  */
 public function register_user_post() {
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
      'rules' => 'trim|numeric|required|max_length[15]|min_length[10]|unique[patient.phone]',
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
      'rules' => 'trim|valid_email|unique[patient.email]',
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
    if(isset($data['password'])) {
      $errorinfo = $data['password'];
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
      $mobile = $this->input->post('mobile');
      $check_mobile = $this->user_model->check_mobile($mobile);
      $results = $this->user_model->register();
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
   * login the user in Medapps app based on mobile number
   *
   * @param string $mobile User's mobile number (please specify either mobile number or email user_id)
   * @param string $password user entered password for accessing account
   * @param string $app_version application version
   * @param string $app_platform application platform (ios/android)
   *
   * @return array Array of the logged in user data
   */
   public function login_post() { 
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
      $results = array('status' => "false",'message' => $errorinfo,'data' =>(object)array());
      return $this->response($results);
    }
    else {
      try {
        $results = $this->user_model->login();
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
    $sess_id = $this->input->get_request_header('Sess-Id'); 
    $data = array();
    try {
      $location = $this->input->get('location'); 

      if($location) {
        $results = $this->user_model->nearest_hospital($location);

        foreach ($results as $hospital ) {
          if($hospital['gallery'] != "") {
            $doc_gallery['gallery'] = unserialize($hospital['gallery']);}
            else{
              $doc_gallery['gallery'] = (object)array();
            }
            if($hospital['video_url'] != "") {
              $doc_gallery['video_url'] = unserialize($hospital['video_url']);}
              else{
                $doc_gallery['video_url'] = (object)array();
                unset($hospital['gallery']);
                unset($hospital['video_url']);
              }
              $app_user[] =array_merge($hospital,$doc_gallery);
            }
            $fre_view = $this->user_model->get_fre_hospital();
            $categories[0] = array( 'name'=>'Tommy Heart Specialist','url'=>base_url()."assets/images/category/1.jpg");
            $categories[1] = array( 'name'=>'Shan scan center','url'=>base_url()."assets/images/category/2.jpg");
            $categories[2] = array( 'name'=>'Rajesh Nursing home','url'=>base_url()."assets/images/category/3.jpg");
            $categories[3] = array( 'name'=>'Sam Scans','url'=>base_url()."assets/images/category/4.jpg");
            $categories[4] = array( 'name'=>'Heart surgical','url'=>base_url()."assets/images/category/1.png");
            $categories[5] = array( 'name'=>'Qscans Lab','url'=>base_url()."assets/images/category/5.jpg");

            $data['nearest_hospital'] = isset($app_user)?$app_user:array();
            $data['categories'] = $categories;
            $data['frequently_viewed'] = $fre_view;
            $response = array('status' => "true",'message' => 'Nearest hospital','data' => base64_encode(encrypt_data($sess_id,json_encode($data))));
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

  /**
  * Doctors list of Selected location hospital for the Med apps
  *
  * @param string id of selected hospital
  * @param string $app_version application version
  * @param string $app_platform application platform (ios/android)
  *
  * @return array Array of the doctors list of selected hospital
  */
  public function nearest_doctors_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
    $config = [
      [
        'field' => 'location',
        'label' => 'location',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter location',
        ]
      ],
      [
        'field' => 'specialist',
        'label' => 'specialist',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter specialist',
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
      if(isset($data['location']))  {
        $errorinfo = $data['location'];
      }
      if(isset($data['specialist']))  {
        $errorinfo = $data['specialist'];
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
        $results = array();
        $app_user = array();
        $web = array();
        $doc_gallery = array();
        $spc = $this->input->post('specialist');

        $location = $this->input->post('location');
        $results = $this->user_model->nearest_doctors($spc,$location);
        if($results) { 
          foreach ($results as $hospital ) {
            // var_dump($hospital);die;
            if ($hospital->hospital_id == 'app_doctor') {

              $doc_details = $this->user_model->getDoctor($hospital->id);
              // var_dump($doc_details);die;
              if($doc_details['gallery'] != "" && $doc_details['gallery']) {
                $doc_gallery['gallery'] = unserialize($doc_details['gallery']);
              } else {
                $doc_gallery['gallery'] = (object)array();
              }
              if($doc_details['video_url'] != "") {
                $doc_gallery['video_url'] = unserialize($doc_details['video_url']);}
                else{
                  $doc_gallery['video_url'] = (object)array(); 
                  unset($doc_details['gallery']);
                  unset($doc_details['video_url']);
                }
                $app_user[] =array_merge($doc_details,$doc_gallery);
              }
                // else{ 
                //   $doc_details = $this->user_model->get_hospital_details($hospital->hospital_id);
                //   $hos_detail['doctor_id'] = $hospital->id;
                //   $hos_detail['doctor_name'] = $hospital->name;
                //   $hos_detail['specialist'] = $hospital->specialist;
                //   $hos_detail['notification_token'] = $hospital->notification_token;
                //   // $hos_detail['notification_token'] = $doc_details['notification_token'];
                //   if($doc_details['gallery'] != "") {
                //     $hos_detail['gallery'] = unserialize($doc_details['gallery']);
                //   }
                //   else{
                //     $hos_detail['gallery'] = (object)array();
                //   }
                //   if($doc_details['video_url'] != "") {
                //     $hos_detail['video_url'] = unserialize($doc_details['video_url']);}
                //     else {
                //       $hos_detail['video_url'] = (object)array();
                //     }
                //     unset($doc_details['gallery']);
                //     unset($doc_details['video_url']);
                //     $details = $doc_details;
                //     $web[] = array_merge($hos_detail,$details);
                //   }
                }  
                // $res_data  = array_merge($app_user,$web);
                foreach ($app_user as &$app_code) {
                  if($app_code['gallery']==false){
                    $app_code['gallery'] = (object)array();
                  }
                }
                $response = array('status' => "true",'message' => 'Doctors details','data' => base64_encode(encrypt_data($sess_id,json_encode($app_user))));
                return $this->response($response);
              }
              else{
                $response = array('status' => "false",'message' => 'Doctor Not found','data' => array());
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

  /**
  * Patient Appointment for the Med apps
  *
  * @param string patient name of med apps
  * @param string Doctor's name of med apps
  * @param string date of appointment in med apps
  * @param string available slots of patient in med apps
  * @param string appointment status of patient in med apps
  * @param string $app_version application version
  * @param string $app_platform application platform (ios/android)
  *
  * @return array Array of the patient appointment data in med apps
  */
  public function patient_appoint_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
    $config = [
      [
        'field' => 'patient_id',
        'label' => 'Patient_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter patient_id',
        ]
      ],
      [
        'field' => 'patient_name',
        'label' => 'Patient name',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter patient_name',
        ]
      ],
      [
        'field' => 'doctor_id',
        'label' => 'doctor_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Doctors id',
        ]
      ],
      [
        'field' => 'doctor_name',
        'label' => 'doctor_name',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Doctors id',
        ]
      ],
      [
        'field' => 'hospital_id',
        'label' => 'hospital_id',
        'rules' => 'trim',
        'errors' => [
          // 'required' => 'Please enter Doctors id',
        ]
      ],
      [
        'field' => 'consult_type',
        'label' => 'Consultation type',
        'rules' => 'trim',
        'errors' => [
          'required' => 'Please enter Doctors id',
        ]
      ],
      [
        'field' => 'date',
        'label' => 'Date',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Date',
        ]
      ],
      [
        'field' => 'time_slot',
        'label' => 'Time Slot',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Time Slot',
        ]
      ],
      [
        'field' => 'attachment',
        'label' => 'Attachment',
        'rules' => 'trim',
        'errors' => [
          // 'required' => 'Please select Attachment',
        ]
      ],
      [
        'field' => 'description',
        'label' => 'Description',
        'rules' => 'trim',
        'errors' => [
          // 'required' => 'Please select Attachment',
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
      if(isset($data['patient_id']))  {
        $errorinfo = $data['patient_id'];
      }
      if(isset($data['doctor_id']))  {
        $errorinfo = $data['doctor_id'];
      }
      if(isset($data['doctor_name']))  {
        $errorinfo = $data['doctor_name'];
      }
      if(isset($data['hospital_id']))  {
        $errorinfo = $data['hospital_id'];
      }
      if(isset($data['consult_type']))  {
        $errorinfo = $data['consult_type'];
      }
      if(isset($data['date']))  {
        $errorinfo = $data['date'];
      }
      if(isset($data['time_slot']))  {
        $errorinfo = $data['time_slot'];
      }
      if(isset($data['attachment']))  {
        $errorinfo = $data['attachment'];
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
        $id = $this->input->post('patient_id');
        $check_patient = $this->user_model->get_patient($id);
        $data = array();
        if ($check_patient) {
          $data['patient'] = $this->input->post('patient_id');
          $data['doctor'] = $this->input->post('doctor_id');
          $check_doctor = $this->doctor_model->get_doctor($data['doctor']);
          if ($check_doctor) {
            $doctor_fees = $this->user_model->getDoctor_fees($data['doctor']);
            $data['patientname'] = $this->input->post('patient_name');
            $data['doctorname'] = $this->input->post('doctor_name');
            if (!empty($this->input->post('hospital_id'))) {
              $data['hospital_id'] = $this->input->post('hospital_id');
            }
            else{
              $data['hospital_id'] = 'app_doctor';
            }
            $data['consult_type'] = $this->input->post('consult_type');
            $date = $this->input->post('date');
            $data['date'] = strtotime($date);

            $data['time_slot'] = $this->input->post('time_slot');
            $data['add_date'] = date('m/d/y');
            $data['registration_time'] = time();
            $data['status'] = 'payment_pending';
            $data['user_type'] = 'app_patient';

            $attachment = $this->input->post('attachment');
            if($attachment != "") {
              define("USER_ATTACHMENT",ASSETS_DIRECTORY. DIRECTORY_SEPARATOR .'images/user_attachments/');
              if (!file_exists(USER_ATTACHMENT)) {
                mkdir(USER_ATTACHMENT, 0777, true);
              }
              $image    = base64_decode($attachment);  
              $filename = date('YmdHis').'.'.'png';
              $srcfile  = USER_ATTACHMENT.$filename;
              file_put_contents($srcfile, $image);
              $attach['attachment_image'] = base_url()."assets/images/user_attachments/".$filename;
              $data['attachment_image'] = base_url()."assets/images/user_attachments/".$filename;
            }

            $data['patient_query'] = $this->input->post('description');
            $attach['patient_description'] = $this->input->post('description');
            $attach['description'] = $this->input->post('description');
            $results = $this->user_model->appointment($data,$attach);
            $results['date'] = date("m/d/Y", $results['date']);
            $results['amount'] = $doctor_fees['fees'];
            $results['specialist'] = $doctor_fees['department'];
          } else {
           $results = array('status' => "false",'message'=>'Doctor  Not found','data' =>(object)array());
           return $this->response($results);
         }
         $response = array('status' => "true",'message' => 'Appointment Booked','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
         return $this->response($response);
       } 
       else{
         $results = array('status' => "false",'message'=>'Patient Not found','data' =>(object)array());
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
  public function department_post() {    
      $sess_id = $this->input->get_request_header('Sess-Id');
      $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
      $this->form_validation->set_data($_POST);
      $config = [
        [
          'field' => 'hospital_id',
          'label' => 'hospital_id',
          'rules' => 'trim|required',
          'errors' => [
            'required' => 'Please enter hospital_id',
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
        if(isset($data['hospital_id']))  {
          $errorinfo = $data['hospital_id'];
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
          $hospital_id = $this->input->post('hospital_id');
          $results = $this->user_model->hospital_department($hospital_id);
          if($results) { 
           $response = array('status' => "true",'message' => 'Scan types','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
           return $this->response($response);
         }
         else{
          $response = array('status' => "false",'message' => 'Hospital Not found','data' => (object)array());
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

  public function specialist_get() {
    $sess_id = $this->input->get_request_header('Sess-Id');        
    try {
      $department = $this->user_model->get_specialist();
      $department[] = array('title'=>'All Specialities','image'=>base_url().'/uploads/specialist_icons/more.png');
      $response = array('status' => "true",'message' => 'Specialists','data' => base64_encode(encrypt_data($sess_id,json_encode($department))));
      return $this->response($response);
      // }
    }
    catch( Exception $e ) {
      log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
      $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
      return $this->response($results);
    }  
  }  

  public function appointment_list_post() {
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
    $config = [
     [
      'field' => 'patient_id',
      'label' => 'patient id',
      'rules' => 'trim|required',
      'errors' => [
        'required' => 'Please enter the patient_id',
      ]
    ],
    [
      'field' => 'date',
      'label' => 'date',
      'rules' => 'trim',
      'errors' => [
      // 'required' => 'Please enter the Date',
      ]
    ], 
    [
      'field' => 'status',
      'label' => 'status',
      'rules' => 'trim',
      'errors' => [
      // 'required' => 'Please enter the Date',
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
    if(isset($data['date'])) {
      $errorinfo = $data['date'];
    }
    if(isset($data['status'])) {
      $errorinfo = $data['status'];
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
    $results = array('status' => "false",'message' => $errorinfo,'data' => (object)array());
    return $this->response($results);
  }
  else{
    $id = $this->input->post('patient_id');
    $check_patient = $this->user_model->get_patient($id);
    if ($check_patient) {
      $date = $this->input->post('date');
      $appointment = $this->user_model->appointment_details($id,$date);

      if(!empty($appointment)){
        foreach ($appointment as &$doctor ) {
          $doctor->date = date("m/d/Y", $doctor->date);
          $get_fees = $this->user_model->getDoctor_fees($doctor->doctor_id);
          $get_img = $this->user_model->get_app_patient($doctor->patient_id);
          if (!empty($doctor ->doctorname)) {
            if ($doctor->hospital_id != 'app_doctor') {
              $hospital_name = $this->user_model->get_hospital_details($doctor->hospital_id); 
              $doctor->hospital_name = $hospital_name['hospital_name']; 
              $doctor->address = $hospital_name['address'];
            } else {
              $doctor->address = $get_fees['address'];
            }
            $doctor->fees = isset($doctor->amount)?$doctor->amount:$get_fees['fees'];
            $doctor->img_url = $get_fees['img_url'];
            $doctor->specialist = $get_fees['department'];
            $doctor->patient_img = $get_img['img_url'];
            $doctor->notification_token = $get_fees['token'];
            $doctor->patient_img = isset($doctor->patient_img)?$doctor->patient_img:"";
            $doctor->specialist = isset($doctor->specialist)?$doctor->specialist:"";
          } else {
            $doctor->fees       = $doctor->amount;
            $doctor->specialist = $get_fees['department'];
            $doctor->address = $get_fees['address'];
            $hospital_name       = $this->user_model->get_hospital_details($doctor->hospital_id);
            $doctor->address = $hospital_name['address']; 
            $doctor->doctorname  = $hospital_name['hospital_name'];
            $doctor->hospital_name  = $hospital_name['hospital_name'];
            $doctor->img_url     = $hospital_name['img_url'];
            $doctor->patient_img = $get_img['img_url'];
            $doctor->notification_token = $get_fees['token'];
            $doctor->notification_token = isset($doctor->notification_token)?$doctor->notification_token:"";
            $doctor->specialist = isset($doctor->specialist)?$doctor->specialist:"";
           
            $doctor->patient_img = isset($doctor->patient_img)?$doctor->patient_img:"";
          }
          unset($doctor->amount);
          unset($doctor->department);
        $doctor->patient_phone = $get_img['phone'];
        $doctor->patient_address = $get_img['address'];
      }

        $results = array('status' => "true",'message'=>'Appointment List','data' =>base64_encode(encrypt_data($sess_id,json_encode($appointment))));
        return $this->response($results);
     } else {
      $results = array('status' => "false",'message'=>' ','data' =>array());
      return $this->response($results);
    }
  } 
  else{
   $results = array('status' => "false",'message'=>'Patient Not found','data' =>array());
   return $this->response($results);
 }
}
}
  /**
  * Make an appointment for scan center  appointment
  *
  * @param string patient_id of Patient Id
  * @param string hospital_id of hospital Id
  * @param string scan_type of Patient Scan type
  * @param string fees of Patient fees
  * @param string created_at of Created date
  * @param string $app_version application version
  * @param string $app_platform application platform (ios/android)
  *
  * @return array Array of the doctors list of selected hospital
  */
  public function makeAppointment_post(){ 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
    $config = [
      [
        'field' => 'patient_id',
        'label' => 'patient_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter patient id',
        ]
      ],
      [
        'field' => 'hospital_id',
        'label' => 'hospital_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Hospital id',
        ]
      ],
      [
        'field' => 'department',
        'label' => 'Department',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please Select Department',
        ]
      ],
      [
        'field' => 'fees',
        'label' => 'fees',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter the Fees',
        ]
      ],
      [
        'field' => 'date',
        'label' => 'date',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Enter the appointment date',
        ]
      ],
      [
        'field' => 'attachment',
        'label' => 'Attachment',
        'rules' => 'trim',
        'errors' => [
          // 'required' => 'Please select Attachment',
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
      if(isset($data['patient_id']))  {
        $errorinfo = $data['patient_id'];
      }
      if(isset($data['hospital_id']))  {
        $errorinfo = $data['hospital_id'];
      }
      if(isset($data['department']))  {
        $errorinfo = $data['department'];
      }
      if(isset($data['fees']))  {
        $errorinfo = $data['fees'];
      }
      if(isset($data['date']))  {
        $errorinfo = $data['date'];
      }
      if(isset($data['attachment']))  {
        $errorinfo = $data['attachment'];
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
    try {
      $patientId = $this->input->post('patient_id');
      $hospitalId = $this->input->post('hospital_id');
      $check_patient = $this->user_model->check_patient($patientId);
      if($check_patient) {
        $data['patient'] = $patientId; 
        $data['hospital_id'] = $hospitalId;  
        $data['type'] = $this->input->post('scan_type');
        $data['department'] = $this->input->post('department');
        $data['doctor'] = $this->input->post('doctor');
        $data['consult_type'] = $this->input->post('consult_type');
        $data['patient_query'] = $this->input->post('patient_query');
        $data['amount'] = $this->input->post('fees');
        $data['procedure_fee'] = $this->input->post('procedure_fee');
        $data['consult_fee'] = $this->input->post('consult_fee');
        $data['status'] = "payment_pending";
        $data['patientname'] = $check_patient['name'];  
        $data['time_slot']=$this->input->post('time');
        $data['doctorname']=$this->input->post('doctor_name');
        $date = $this->input->post('date');
        $data['date'] = strtotime($date);
      // $data['department'] = 'Radiology'; // Stattic data

        $attachment = $this->input->post('attachment');
        if($attachment != "") {
          define("USER_ATTACHMENT",ASSETS_DIRECTORY. DIRECTORY_SEPARATOR .'images/user_attachments/');
          if (!file_exists(USER_ATTACHMENT)) {
            mkdir(USER_ATTACHMENT, 0777, true);
          }
          $image    = base64_decode($attachment);  
          $filename = date('YmdHis').'.'.'png';
          $srcfile  = USER_ATTACHMENT.$filename;
          file_put_contents($srcfile, $image);
          $data['attachment_image'] = base_url()."assets/images/user_attachments/".$filename;
        }
      log_message('error', $data); 
      $results = $this->user_model->scan_appointment($data);
      $results['date'] = date("m/d/Y", $results['date']);
      $results['specialist'] = $data['department'];

      // $results['specialist'] = $results['department'];
      // unset($results['department']);
      $response = array('status' => "true",'message' => 'Appointment Booked','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
      return $this->response($response);
    }
    else{ 
      $response = array('status' => "false",'message' => 'Patient Not Found');
      return $this->response($response);
    }
  }
  catch( Exception $e ) {
    log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
    $results = array('status' => "false",'message' => $e->getMessage(),'data' => (object)array());
    return $this->response($results);
  }
}

  /**
  * get the user existing or not of given mobile no
  *
  * @param string $mobileNo User's Mobile number
  * @param string $app_version application version
  * @param string $app_platform application platform (ios/android)
  *
  * @return object Existing user status
  */
  public function existing_user_post() {            
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
        $details = $this->user_model->check_mobile($mobileNo);
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
  * get the doctor's report of given patient id
  *
  * @param string $patient_id patient Id
  * @param string $app_version application version
  * @param string $app_platform application platform (ios/android)
  *
  * @return array Array of the Scan's report 
  */
  public function scan_report_post() {            
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
        $patientId = $this->input->post('patient_id');
        $details = $this->user_model->get_scan_report($patientId);
        if($details) {
          foreach ($details as &$doctor ) {
          }
          $doctor->date = date("m/d/Y", $doctor->date);
          $response = array('status' => "true",'message' => 'Doctor Report Details','data'=>base64_encode(encrypt_data($sess_id,json_encode($details))));
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

  /**
  * get the doctor's prescription of given patient id
  *
  * @param string $patient_id patient Id
  * @param string $appointment_id Appointment Id
  * @param string $app_version application version
  * @param string $app_platform application platform (ios/android)
  *
  * @return array Array of the Doctor's Prescription 
  */
  public function doctorPrescription_post() {            
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
        $patientId = $this->input->post('patient_id');
        $appointId = $this->input->post('appointment_id');
        $details = $this->user_model->getReport($patientId,$appointId);
        if($details) {
          foreach ($details as &$doctor ) {
            $doctor->created_at = date("m/d/Y", $doctor->created_at);
          }
          $response = array('status' => "true",'message' => 'Doctor Prescription Details','data'=>base64_encode(encrypt_data($sess_id,json_encode($details))));
          return $this->response($response);
        }else {
          $response = array('status' => "false",'message' => 'Prescription not Found');
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
  public function patient_transcation_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->form_validation->set_data($_POST);
    $config = [
      [
        'field' => 'patient_id',
        'label' => 'patient_id',
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
        'field' => 'transcation_id',
        'label' => 'Transaction ID',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please Select your Transaction Id',
        ]
      ],
      [
        'field' => 'amount',
        'label' => 'Amount',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please Select your Fees Amount',
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
      if(isset($data['patient_id']))  {
        $errorinfo = $data['patient_id'];
      }
      if(isset($data['patient_id']))  {
        $errorinfo = $data['patient_id'];
      }
      if(isset($data['appointment_id']))  {
        $errorinfo = $data['appointment_id'];
      }
      if(isset($data['amount']))  {
        $errorinfo = $data['amount'];
      }
      if(isset($data['transcation_id']))  {
        $errorinfo = $data['transcation_id'];
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
        $patient_id = $this->input->post('patient_id');
        $appointment_id = $this->input->post('appointment_id');
        $check_report = $this->user_model->get_appointment_check($patient_id,$appointment_id);
        if ($check_report) {
          $data['patient_id'] = $patient_id;
          $data['appointment_id'] = $appointment_id;
          $data['transcation_id'] = $this->input->post('transcation_id');
          $data['amount'] = $this->input->post('amount');
          $data['payment_type'] = $this->input->post('payment_type');
          $data['payment_date'] = date('Y-m-d H:i:s');
          $data['status'] = 'Pending Confirmation';

          $results = $this->user_model->transcation_details($data);

          $payment['patient']     = $patient_id;
          $payment['remarks']     = $this->input->post('transcation_id');
          $payment['amount']      = $this->input->post('amount');
          $payment['status']      = 'paid';
          $payment['paid_from']   = 'PHP';
          $payment['date']        = strtotime(date('m/d/Y'));
          $payment['doctor']      = $check_report['doctor'];
          $payment['hospital_id'] = $check_report['hospital_id'];
          $pay_status = $this->user_model->update_payment($payment);
          $log_data["appointment_id"] = $data['appointment_id'];
          $log_data["hospital_id"] = $check_report['hospital_id'];
          $log_data["patient_id"] = $data['patient_id'];
          $log_data["doctor_id"] = $check_report['doctor'];
          $log_data["status"] = $data['status'];
          $this->user_model->patient_history_log($log_data);
          $response = array('status' => "true",'message' => 'Payment Sucessfully','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
          return $this->response($response);
        } 
        else{
         $results = array('status' => "false",'message'=>'Patient/appointment id are mismatch ','data' =>(object)array());
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
public function cart_status_post() { 
  $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
  $this->form_validation->set_data($_POST);
  $config = [
    [
      'field' => 'patient_id',
      'label' => 'patient_id',
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
    if(isset($data['patient_id']))  {
      $errorinfo = $data['patient_id'];
    }
    if(isset($data['appointment_id']))  {
      $errorinfo = $data['appointment_id'];
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
      $patient_id = $this->input->post('patient_id');
      $appointment_id = $this->input->post('appointment_id');
      $check_report = $this->user_model->get_appointment_check($patient_id,$appointment_id);
      if ($check_report) {
        $data['patient_id'] = $patient_id;
        $data['appointment_id'] = $appointment_id;
        $data['status'] = 'Deleted';
        $results = $this->user_model->cart_status_delete($data);
        $response = array('status' => "true",'message' => 'Delete Sucessfully','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
        return $this->response($response);
      } 
      else{
       $results = array('status' => "false",'message'=>'Appointment not found ','data' =>(object)array());
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
public function user_forgot_password_post() { 
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
      $check_user = $this->user_model->check_mobile($mobile);
      $id = $check_user['id'];
      if ($check_user) {
        $password =  hash('sha512', $this->input->post('password'));
        $forgot = $this->user_model->user_forgot_pass($id,$mobile,$password);
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
/*About */
public function aboutus_get() { 
  $sess_id = $this->input->get_request_header('Sess-Id');  
  try {

    $response[0] = array( 'name'=>'About us','url'=>"https://digitalhospital.id/"); 
    $response[1] = array( 'name'=>'Terms of Use','url'=> "https://digitalhospital.id/tnc/");
    $response[2] = array( 'name'=>'Privacy Policy','url'=> "https://digitalhospital.id/privacy/");
    $response[3] = array( 'name'=>'Community Policy','url'=> "https://digitalhospital.id/medzit/");
    $response[4] = array( 'name'=>'Help and Support','url'=> "https://digitalhospital.id/contact/");
    $response[5] = array( 'name'=>'Website','url'=>'https://digitalhospital.id/medzit/');
    $data = array('status'=>"true",'Settings'=>base64_encode(encrypt_data($sess_id,json_encode($response))));
    return $this->response($data);
  }

  catch( Exception $e ) {
   log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
    $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
    return $this->response($results);
  }  
}
   /**
   * view the over all patient details in Medapps app based on patient Id
   *
   * @param string $patient_id Patient Id
   * @param string $app_version application version
   * @param string $app_platform application platform (ios/android)
   *
   * @return array Array of the Patient details
   */
   public function patientDetails_post(){ 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'patient_id',
        'label' => 'patient_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Patient Id',
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
        $checkPatient  = $this->user_model->get_app_patient($patientId);
        if($checkPatient) {
          $data  = $this->user_model->getPatient_detials($patientId);

          $response = array('status' => "true",'message' => 'Patient Reports','data' => base64_encode(encrypt_data($sess_id,json_encode($data))));
        }else {
          $response = array('status' => "false",'message' => 'No patient Found','data' =>(object)array());
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

  public function edit_patient_post(){ 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'patient_id',
        'label' => 'Patient Id',
        'rules' => 'trim|required|numeric',
        'errors' => [
          'required' => 'Please enter  Patient Id',
          'numeric' => 'Please enter a valid Patient Id'
        ]
      ],
      [
        'field' => 'user_name',
        'label' => 'user name',
        'rules' => 'trim',
        'errors' => [
          'required' => 'Please enter your User name',
          // 'alpha_numeric_spaces' => 'Please enter a valid nick  name'
        ]
      ],
      [
        'field' => 'dob',
        'label' => 'DOB',
        'rules' => 'trim',
        'errors' => [
         'required' => 'Please enter your DOB',
       ]
     ],
     [
      'field' => 'img_url',
      'label' => 'Image Link',
      'allowed_types'=>'jpg|png|gif',        
      'errors' => [
        'allowed_types' => 'Please enter a valid image',
      ]
    ],
    [
      'field' => 'gender',
      'label' => 'Gender',
      'rules' => 'trim',
      'errors' => [
        'required' => 'Please enter your gender',
      ]
    ],
    [
      'field' => 'age',
      'label' => 'Age',
      'rules' => 'trim',
      'errors' => [
       'required' => 'Please enter your age',
     ]
   ],

   [
    'field' => 'blood_group',
    'label' => 'Blood group',
    'rules' => 'trim',
    'errors' => [
     'required' => 'Please enter your Blood group',
   ]
 ],
 [
  'field' => 'address',
  'label' => 'Address',
  'rules' => 'trim',
  'errors' => [
   'required' => 'Please enter your Address',
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
  $errorinfo = null;
  if(isset($data['patient_id'])) {
    $errorinfo = $data['patient_id'];
  } 
  if(isset($data['user_name'])) {
    $errorinfo = $data['user_name'];
  }
  if(isset($data['img_url'])) {
    $errorinfo = $data['img_url'];
  }
  if(isset($data['gender'])) {
    $errorinfo = $data['gender'];
  }
  if(isset($data['dob'])) {
    $errorinfo = $data['dob'];
  }
  if(isset($data['address'])) {
    $errorinfo = $data['address'];
  }
  if(isset($data['blood_group'])) {
    $errorinfo = $data['blood_group'];
  }
  if(isset($data['age'])) {
    $errorinfo = $data['age'];
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
    $id = $this->input->post('patient_id');
    $check_id = $this->user_model->get_app_patient($id);
    if ($check_id) {
      $results = $this->user_model->edit_account();

      $results['dob'] = date("m/d/Y", $results['birthdate']);
      unset($results['birthdate']);
      $result = array('status' => "true",'message'=>'Updated successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
      return $this->response($result);
    }
    else {
     $response = array('status' => "false",'message' => 'No user found','data' =>(object)array());
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

  public function view_patient_post(){ 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'patient_id',
        'label' => 'patient_id',
        'rules' => 'trim|required',
        'errors' => [
        'required' => 'Please enter your Patient Id',
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
        $patient_id = $this->input->post('patient_id');
        $checkPatient  = $this->user_model->get_app_patient($patient_id);
        if($checkPatient) {
          $data  = $this->user_model->view_patient($patient_id);
          $data['date_of_birth']=  date("m/d/Y", $data['birthdate']);
          unset($data['birthdate']);
          $response = array('status' => "true",'message' => 'Patient Details','data' => base64_encode(encrypt_data($sess_id,json_encode($data))));
        }else {
          $response = array('status' => "false",'message' => 'No patient Found','data' =>(object)array());
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
   * Get the scan types in medapps
   * @param $hospital_id Hospital id
   * @param $department Hospital departments
   *
   * @return object of scan types of medapps 
   */
  public function scantypes_post() {
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
      'field' => 'hospital_id',
      'label' => 'hospital_id',
      'rules' => 'trim|required',
      'errors' => [
      'required' => 'Please enter the hospital Id',
        ]
      ],
      [
      'field' => 'department',
      'label' => 'department',
      'rules' => 'trim|required',
      'errors' => [
      'required' => 'Please enter the department',
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
    if(isset($data['hospital_id'])) {
      $errorinfo = $data['hospital_id'];
    }
    if(isset($data['department'])) {
      $errorinfo = $data['department'];
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
        $department = $this->user_model->get_scantypes();
        $response = array('status' => "true",'message' => 'Scan_types','data' => base64_encode(encrypt_data($sess_id,json_encode($department))));
        return $this->response($response);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      }  
    }
  }
  public function hospital_depart_post() {    
      $sess_id = $this->input->get_request_header('Sess-Id');
      $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
      $this->form_validation->set_data($_POST);
      $config = [
        [
          'field' => 'hospital_id',
          'label' => 'hospital_id',
          'rules' => 'trim|required',
          'errors' => [
            'required' => 'Please enter hospital_id',
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
        if(isset($data['hospital_id']))  {
          $errorinfo = $data['hospital_id'];
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
          $hospital_id = $this->input->post('hospital_id');
          $results = $this->user_model->hospital_depart($hospital_id);
          if($results) { 
           $response = array('status' => "true",'message' => 'Scan types','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
           return $this->response($response);
         }
         else{
          $response = array('status' => "false",'message' => 'Hospital Not found','data' => (object)array());
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

  public function covid_vaccine_post() {  
      $sess_id = $this->input->get_request_header('Sess-Id');
      $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
      $this->form_validation->set_data($_POST);
      $config = [
        [
          'field' => 'user_id',
          'label' => 'user_id',
          'rules' => 'trim|required',
          'errors' => [
            'required' => 'Please enter user_id',
          ]
        ],
        [
          'field' => 'attachment',
          'label' => 'Attachment',
          'rules' => 'trim|required',
          'errors' => [
            'required' => 'Please select Attachment',
        ]
      ],
      [
          'field' => 'vaccine_status',
          'label' => 'vaccine_status',
          'rules' => 'trim|required',
          'errors' => [
            'required' => 'Please select vaccine_status',
        ]
      ],
      [
        'field' => 'vaccine_type',
        'label' => 'vaccine_type',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please select Vaccine Type',
      ]
      ], 
      [
        'field' => 'date',
        'label' => 'Date',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please Select your Date',
        ]
      ],
      [
        'field' => 'time',
        'label' => 'Time',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please Select your Time',
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
        if(isset($data['user_id']))  {
          $errorinfo = $data['user_id'];
        }
        if(isset($data['vaccine_status']))  {
          $errorinfo = $data['vaccine_status'];
        }
        if(isset($data['attachment']))  {
          $errorinfo = $data['attachment'];
        }
        if(isset($data['vaccine_type']))  {
          $errorinfo = $data['vaccine_type'];
        }
        if(isset($data['date']))  {
          $errorinfo = $data['date'];
        }
         if(isset($data['time']))  {
          $errorinfo = $data['time'];
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
          $user_id = $this->input->post('user_id');
          $results = $this->user_model->get_app_patient($user_id);
          if($results) { 
            $data['user_id'] = $user_id;
            $data['vaccine_status'] = $this->input->post('vaccine_status');
            $data['vaccine_type'] = $this->input->post('vaccine_type');
            $data['date'] = $this->input->post('date');
            $data['time'] = $this->input->post('time');

             $attachment = $this->input->post('attachment');
            if($attachment != "") {
              define("USER_ATTACHMENT",ASSETS_DIRECTORY. DIRECTORY_SEPARATOR .'images/covid_vaccine_images/');
              if (!file_exists(USER_ATTACHMENT)) {
                mkdir(USER_ATTACHMENT, 0777, true);
              }
              $image    = base64_decode($attachment);  
              $filename = date('YmdHis').'.'.'png';
              $srcfile  = USER_ATTACHMENT.$filename;
              file_put_contents($srcfile, $image);
              $data['vaccinated_image'] = base_url()."assets/images/covid_vaccine_images/".$filename;
            }
           $res_data = $this->user_model->covid_vaccine_insert($data);

           $response = array('status' => "true",'message' => 'Information saved successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($res_data))));
           return $this->response($response);
         }
         else{
          $response = array('status' => "false",'message' => 'User Not found','data' => (object)array());
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

  
  /**
  //  * Get the covid vaccine user medapps
  //  * @param $user_id
  //  *
  //  * @return object of vaccinated user of medapps 
  //  */
  public function covid_user_get($user_id) {
    $sess_id = $this->input->get_request_header('Sess-Id'); 
    try {
      $check_patient = $this->user_model->get_app_patient($user_id);
      if ($check_patient) {
        $data = $this->user_model->get_covid_user($user_id);

        $response = array('status' => "true",'message' => 'vaccinated list','data' => base64_encode(encrypt_data($sess_id,json_encode($data))));
        return $this->response($response);
      }
      else{
        $response = array('status' => "true",'message' => 'User not found','data' => array());
        return $this->response($response);
      }
    }
    catch( Exception $e ) {
      log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
      $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
      return $this->response($results);
    }  
  }  

  public function delete_covid_vaccine_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'id',
        'label' => 'id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your ID',
          // 'numeric'=>'Enter valid Frame ID',
        ]
      ],
      [
        'field' => 'user_id',
        'label' => 'user_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your User ID',
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
      if(isset($data['id'])) {
        $errorinfo = $data['id'];
      }
      if(isset($data['user_id'])) {
        $errorinfo = $data['user_id'];
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
        $user_id      = $this->input->post('user_id');
        $id      = $this->input->post('id');
        $check_user  = $this->user_model->get_app_patient($user_id);
        $check_covid_id  = $this->user_model->get_covid_id($id);
        $data['status'] = 'delete';
        $data['id'] = $this->input->post('id');
        if($check_user) {
          if ($check_covid_id) {
            $details = $this->user_model->delete_covid_vaccine($data);
            $response = array('status' => "true",'message' => 'Deleted successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
          }
          else{
          $response = array('status' => "false",'message' => 'Please enter correct ID','data' =>(object)array());
          }
        }else {
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

  public function wishlist_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'user_id',
        'label' => 'user_id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your User ID',
          // 'numeric'=>'Enter valid Frame ID',
        ]
      ],
      [
        'field' => 'doctor_id',
        'label' => 'doctor_id',
        'rules' => 'trim',
        'errors' => [
          // 'required' => 'Please enter your Doctor ID',
          // 'numeric'=>'Enter valid Frame ID',
        ]
      ],
      [
        'field' => 'hospital_id',
        'label' => 'hospital_id',
        'rules' => 'trim',
        'errors' => [
          // 'required' => 'Please enter your H/**/ospital ID',
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
      if(isset($data['user_id'])) {
        $errorinfo = $data['user_id'];
      }
      if(isset($data['doctor_id'])) {
        $errorinfo = $data['doctor_id'];
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
      $results = array('status' => "false",'message' => $errorinfo );
      
      return $this->response($results);
    }
    else {
      try {
        $data['user_id']      = $this->input->post('user_id');
        $check_user            = $this->user_model->get_app_patient($data['user_id']);
        $data['doctor_id']    = $this->input->post('doctor_id');
        $check_doctor          = $this->doctor_model->get_doctor($data['doctor_id']);
        $data['hospital_id']  = $this->input->post('hospital_id');
        $check_hospital        = $this->user_model->get_hospital_details($data['hospital_id']);
        $data['status']       = 'added';

        if($check_user) {
        if ($check_doctor || $check_hospital) {
          if($check_doctor){
            $get_user = $this->user_model->check_wishlist_user($data);
            if ($get_user) {
            $response = array('status' => "true",'message' => 'Already this item in wishlist','data' =>(object)array());
            }
            else{
              $details = $this->user_model->wishlist_insert($data);
            $response = array('status' => "true",'message' => 'Wishlist added','data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
            }
          }
          else{
            $get_hospital_id = $this->user_model->check_wishlist_hos($data);
            if ($get_hospital_id) {
              $response = array('status' => "true",'message' => 'Already this item in wishlist','data' =>(object)array());
            }
            else{
              $details = $this->user_model->wishlist_insert($data);
              $response = array('status' => "true",'message' => 'Wishlist added','data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
            }
          }
        }
        else{
          $response = array('status' => "false",'message' => 'Please Check Doctor/Hospital ID','data' =>(object)array());
        }
        }else {
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
  public function wishlist_delete_post() { 
  $sess_id = $this->input->get_request_header('Sess-Id');
  $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
  $this->form_validation->set_data($_POST);
  $config = [
    [
      'field' => 'id',
      'label' => 'id',
      'rules' => 'trim|required',
      'errors' => [
        'required' => 'Please enter ID',
      ]
    ],
    [
      'field' => 'user_id',
      'label' => 'user_id id',
      'rules' => 'trim|required',
      'errors' => [
        'required' => 'Please enter User id',
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
    if(isset($data['id']))  {
      $errorinfo = $data['id'];
    }
    if(isset($data['user_id']))  {
      $errorinfo = $data['user_id'];
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
      $data['wishlist_id']  = $this->input->post('id');
      $data['patient_id']   = $this->input->post('user_id');
      $check_user  = $this->user_model->get_app_patient($data['patient_id']);
      $check_wishlist_id  = $this->user_model->get_wishlist($data['wishlist_id']);
      $data['status'] = 'deleted';
        if(isset($check_user)) {
          if (isset($check_wishlist_id)) {
            $details = $this->user_model->delete_wishlist($data);
            $response = array('status' => "true",'message' => 'Deleted successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
          }
          else{
          $response = array('status' => "false",'message' => 'Please enter Wishlist ID','data' =>(object)array());
          }
        }else {
          $response = array('status' => "false",'message' => 'No user Found','data' =>(object)array());
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

  /**
  //  * Get the Wishlist user medapps
  //  * @param $user_id
  //  *
  //  * @return object of Wishlist user of medapps 
  //  */
  public function wishlist_user_get($user_id) {
    $sess_id = $this->input->get_request_header('Sess-Id'); 
    $app_doctor= array();
    $hospital= array();

    try {
      $check_patient = $this->user_model->get_app_patient($user_id);
      if ($check_patient) {
        $data = $this->user_model->get_wishlist_user($user_id);
        foreach ($data as &$doctor ) {
          if (!empty($doctor ->doctor_id)) {
            $doc_details = $this->user_model->getDoctor($doctor->doctor_id);
              if($doc_details['gallery'] != "") {
                $doc_gallery['gallery'] = unserialize($doc_details['gallery']);}
              else{
                $doc_gallery['gallery'] = (object)array();
              }
              if($doc_details['video_url'] != "") {
                $doc_gallery['video_url'] = unserialize($doc_details['video_url']);}
              else{
                $doc_gallery['video_url'] = (object)array();
                unset($doc_details['gallery']);
                unset($doc_details['video_url']);
              }
            $doc_gallery['wishlist_id'] = $doctor->id;
            $app_doctor[] =array_merge($doc_details,$doc_gallery);
          }
          else{
            $hos_detail = $this->user_model->get_hospital_details($doctor->hospital_id);
            if($hos_detail['gallery'] != "") {
              $doc_gallery['gallery'] = unserialize($hos_detail['gallery']);}
            else{
              $doc_gallery['gallery'] = (object)array();
            }
            if($hos_detail['video_url'] != "") {
              $doc_gallery['video_url'] = unserialize($hos_detail['video_url']);}
              else{
                $doc_gallery['video_url'] = (object)array();
                unset($hos_detail['gallery']);
                unset($hos_detail['video_url']);
              }
              $doc_gallery['wishlist_id'] = $doctor->id;
              if(isset($doc_gallery)){
                $hospital[] =array_merge($hos_detail,$doc_gallery);
              }
            }
          }
        $res_data  = array_merge($app_doctor,$hospital);
        $response = array('status' => "true",'message' => 'Wishlist list','data' => base64_encode(encrypt_data($sess_id,json_encode($res_data))));
        return $this->response($response);
      }
      else{
        $response = array('status' => "false",'message' => 'User not found','data' => array());
        return $this->response($response);
      }
    }
    catch( Exception $e ) {
      log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
      $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
      return $this->response($results);
    }  
  }  

  public function add_patient_summary_post() {
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'patient_id',
        'label' => 'patient Id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Patient ID',
          // 'numeric'=>'Enter valid Frame ID',
        ]
      ],
      [
        'field' => 'attachment',
        'label' => 'Attachment',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Attachment',
          // 'numeric'=>'Enter valid Frame ID',
        ]
      ],
      [
        'field' => 'summary',
        'label' => 'Summary',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your Summary',
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
      if(isset($data['patient_id'])) {
        $errorinfo = $data['patient_id'];
      }
      if(isset($data['attachment'])) {
        $errorinfo = $data['attachment'];
      }
      if(isset($data['summary'])) {
        $errorinfo = $data['summary'];
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
    else {
      try {
        $data['patient_id']      = $this->input->post('patient_id');
        $check_user             = $this->user_model->get_app_patient($data['patient_id']);
        $data['summary']      = $this->input->post('summary');

         $attachment = $this->input->post('attachment');
          if($attachment != "") {
            define("USER_ATTACHMENT",ASSETS_DIRECTORY. DIRECTORY_SEPARATOR .'images/patient_summary/');
            if (!file_exists(USER_ATTACHMENT)) {
              mkdir(USER_ATTACHMENT, 0777, true);
            }
            $image    = base64_decode($attachment);  
            $filename = date('YmdHis').'.'.'png';
            $srcfile  = USER_ATTACHMENT.$filename;
            file_put_contents($srcfile, $image);
            $data['attachment'] = $filename;
          }
        if($check_user) {
          $details = $this->user_model->patient_summary($data);
          $details->attachment = base_url().'assets/images/patient_summary/'.$details->attachment; 
          $response = array('status' => "true",'message' => 'Patient summary added','data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
        }else {
          $response = array('status' => "false",'message' => 'Patient Not Found','data' =>(object)array());
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
  public function edit_patient_summary_post(){ 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'summary_id',
        'label' => 'Summary Id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter  Summary Id',
          'numeric' => 'Please enter a valid Summary Id'
        ]
      ],
      [
        'field' => 'patient_id',
        'label' => 'Patient Id',
        'rules' => 'trim|required|numeric',
        'errors' => [
          'required' => 'Please enter  Patient Id',
          'numeric' => 'Please enter a valid Patient Id'
        ]
      ],
     [
      'field' => 'attachment',
      'label' => 'Attachment',
      'rules' => 'trim|required',        
      'errors' => [
        'required' => 'Please select Attachment',
      ]
    ],
    [
      'field' => 'summary',
      'label' => 'Summary',
      'rules' => 'trim|required',        
      'errors' => [
        'required' => 'Please select Summary',
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
    $errorinfo = null;
    if(isset($data['summary_id'])) {
      $errorinfo = $data['summary_id'];
    }
    if(isset($data['patient_id'])) {
      $errorinfo = $data['patient_id'];
    } 
    if(isset($data['attachment'])) {
      $errorinfo = $data['attachment'];
    }
    if(isset($data['summary'])) {
      $errorinfo = $data['summary'];
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
      $patient_id = $this->input->post('patient_id');
      $check_patient = $this->user_model->get_app_patient($patient_id);
      $id         = $this->input->post('summary_id');
      $check_summary = $this->user_model->get_patient_summary($id);
      if ($check_patient && $check_summary) {
        $results = $this->user_model->edit_patient_summary();
        $results->attachment = base_url().'assets/images/patient_summary/'.$results->attachment; 
        $result = array('status' => "true",'message'=>'Update successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
        return $this->response($result);
      }
      else {
       $response = array('status' => "false",'message' => 'Please check Patient id / Summary id','data' =>(object)array());
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
   public function my_health_phr_post() {
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    //$_POST  = (array) json_decode($this->input->raw_input_stream);
    $config = [
      // [
      //   'field' => 'patient_id',
      //   'label' => 'patient Id',
      //   'rules' => 'trim|required',
      //   'errors' => [
      //     'required' => 'Please enter your Patient ID',
      //     // 'numeric'=>'Enter valid Frame ID',
      //   ]
      // ],
      [
        'field' => 'type',
        'label' => 'Type',
        'rules' => 'trim|required|in_list[prescription,patient_summary,diagnostics,clinical_images,specialist_opinion,remarks,lab_report,scan_report]',
        'errors' => [
          'required' => 'Please enter your Type',
          'in_list' => '%s Unknown type'
          //prescription or patient_summary or diagnostics or clinical_images or specialist_opinion or lab_report 
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
      // if(isset($data['patient_id'])) {
      //   $errorinfo = $data['patient_id'];
      // }
      if(isset($data['type'])) {
        $errorinfo = $data['type'];
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
      else {
      try {
        $data['patient_id']      = $this->input->post('patient_id');
        $data['appointment_id']      = $this->input->post('appointment_id');
        // $check_user             = $this->user_model->get_app_patient($data['patient_id']);
        $data['type']      = $this->input->post('type');
        if(true) {
          if($data['type'] == 'prescription'){
            $details = $this->user_model->get_prescription_phr($data);
            if ($details) {
              foreach ($details as &$detail) {
                $detail->date =  date("m/d/Y", $detail->date);
                $medicine = $detail->medicine;
                $medicine = explode('###', $medicine);
                foreach ($medicine as $key => $value) {
                  $single_medicine = explode('***', $value); 
                  $detail->med_name[$key]['medicine'] = $this->user_model->getMedicineById($single_medicine[0])->name;
                  $detail->med_name[$key]['instruction'] = $single_medicine[3] . ' - ' . $single_medicine[4];
                  $detail->med_name[$key]['frequency'] = $single_medicine[2];
                }
              }
            $response = array('status' => "true",'message' => 'Prescription data (Patient ID)  = '.$data['patient'],'data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
            }else{
            $response = array('status' => "false",'message' => 'Prescription data (Patient ID)  = '.$data['patient'],'data' => array());
            }
           }elseif ($data['type'] == 'patient_summary') {
              $details = $this->user_model->get_patient_summary_phr($data);
              if ($details) {
                foreach ($details as &$detail) {
                $detail->attachment = base_url(). 'assets/images/patient_summary/'.$detail->attachment;
              }
                $response = array('status' => "true",'message' => 'Patient Summary (Patient ID)  = '.$data['patient_id'],'data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
              }else{
                $response = array('status' => "false",'message' => 'Patient Summary (Patient ID)  = '.$data['patient_id'],'data' => array());
              }
            }elseif ($data['type'] == 'diagnostics') {
              $details = $this->user_model->get_diagnostics_phr($data);
              if ($details) {
                foreach ($details as &$detail) {
                 $detail->date =  date("m/d/Y", $detail->date);
                }
                 $response = array('status' => "true",'message' => 'Diagnostics data (Patient ID)  = '.$data['patient_id'],'data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
              }else{
                $response = array('status' => "false",'message' => 'Diagnostics data (Patient ID)  = '.$data['patient_id'],'data' => array());
              }
            }elseif ($data['type'] == 'clinical_images') {
              $details = $this->user_model->get_clinical_images_phr($data);
              if ($details) {
                foreach ($details as &$detail) {
                  $detail->date =  date("m/d/Y", $detail->date);
                }
                 $response = array('status' => "true",'message' => 'Clinical Images data (Patient ID)  = '.$data['patient_id'],'data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
              }else{
                $response = array('status' => "false",'message' => 'Clinical Images data (Patient ID)  = '.$data['patient_id'],'data' => array());
              }

            }elseif ($data['type'] == 'specialist_opinion') {
              $details = $this->user_model->get_specialist_opinion_phr($data);
              if ($details) {
                foreach ($details as &$detail) {
                  $detail->date =  date("m/d/Y", $detail->date);
                 }
                 $response = array('status' => "true",'message' => 'Specialist Opinion data (Patient ID)  = '.$data['patient_id'],'data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
              }else{
                $response = array('status' => "false",'message' => 'Specialist Opinion data (Patient ID)  = '.$data['patient_id'],'data' => array());
              }

            }elseif ($data['type'] == 'remarks') {
              $web = array();
              $details = array();

              $appointment = $this->user_model->get_appointment($data);
              foreach ($appointment as $appoint) {
                if ($appoint->hospital_id == 'app_doctor') {
                  $details = $this->user_model->get_app_doctor_remark_phr($data);
                }else{
                  $details = $this->user_model->get_remarks_phr($data);
                }
                $web = array_merge($details,$web);
              }
              // foreach ($web as &$detail) {
              //   $detail = (array)$detail;
              // }
              // $details = array_unique($web,SORT_REGULAR);
              if ($details) {
                foreach ($details as &$detail) {
                  $detail->date =  date("m/d/Y", $detail->date);
                  $detail->remarks =  $detail->remarks?$detail->remarks:'';
                }
                $response = array('status' => "true",'message' => 'Remarks data (Patient ID)  = '.$data['patient_id'],'data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
              }else{
                $response = array('status' => "false",'message' => 'Remarks data (Patient ID)  = '.$data['patient_id'],'data' => array());
              }
            
            }elseif ($data['type'] == 'lab_report') {
              $details = $this->user_model->get_lab_reports_phr($data);
              if ($details) {
                foreach ($details as &$detail) {
                  $detail->date =  date("m/d/Y", $detail->date);
               }
                 $response = array('status' => "true",'message' => 'Lab Report data (Patient ID)  = '.$data['patient_id'],'data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
              }else{
                $response = array('status' => "false",'message' => 'Lab Report data (Patient ID)  = '.$data['patient_id'],'data' => array());
              }
            }elseif ($data['type'] == 'scan_report') {
              $details = $this->user_model->get_scan_report_phr($data);
              if ($details) {
                foreach ($details as &$detail) {
                  $detail->date =  date("m/d/Y", $detail->date);
               }
                 $response = array('status' => "true",'message' => 'Scan Report data (Patient ID)  = '.$data['patient_id'],'data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
               // $response = array('status' => "true",'message' => 'Scan Report data (Patient ID)  = '.$data['patient_id'],'data' => json_encode($details));
              }else{
                $response = array('status' => "false",'message' => 'Lab Report data (Patient ID)  = '.$data['patient_id'],'data' => array());
              }
            }
        }else {
          $response = array('status' => "false",'message' => 'Patient Not Found','data' =>array());
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
  * Banner view for the app_user of Med apps
  *
  */
  public function banners_get() {
    $sess_id = $this->input->get_request_header('Sess-Id');        
    try {
      $banner_details = $this->user_model->banners_get('patient');
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
  public function get_appointment_post(){ 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $this->load->model('invoices/invoice_model');
    $this->load->model('settings/settings_model');   
    $data['currency'] = $this->settings_model->getSettings()->currency;
    $data['appointment'] = $this->invoice_model->getAppointmentById($_POST['id']);
    $data['patient'] = $this->invoice_model->getPatientById($data['appointment']->patient);
    $data['doctor'] = $this->invoice_model->getDoctorById($data['appointment']->doctor);
    $data['hospital'] = $this->invoice_model->getHospitalById($data['appointment']->hospital_id);
    $data['log_data'] = $this->user_model->get_history_log($_POST['id']);
    $bed_details = $this->user_model->get_bed_allotment($data['appointment']->patient,$data['appointment']->hospital_id);
    if(count($bed_details)){
      $data['log_data'][] = array('status' => 'admitted','time_stamp' => $bed_details[0]->a_time);
      $data['log_data'][] = array('status' => 'discharged','time_stamp' => $bed_details[0]->d_time);
    }
    if($data['hospital'])
      $data['hospital']->bed = $this->user_model->get_bed_allotment($data['appointment']->patient,$data['appointment']->hospital_id);
    $response = array('status' => "true",'message' => 'Appointment details','data' => base64_encode(encrypt_data($sess_id,json_encode($data))));
    return $this->response($response);
  }
  public function update_plan_post(){ 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'user_id',
        'label' => 'User Id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter  user Id',
        ]
      ],
      [
        'field' => 'plan',
        'label' => 'Plan',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your plan',
        ]
      ],
      [
        'field' => 'plan_amount',
        'label' => 'Plan Amount',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter  Plan Amount',
        ]
      ],
      [
        'field' => 'transcation_id',
        'label' => 'Transcation ID',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter Transcation ID',
        ]
      ],
      [
        'field' => 'transcation_status',
        'label' => 'Transcation Status',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter  Transcation Status',
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
    $errorinfo = null;
    if(isset($data['user_id'])) {
      $errorinfo = $data['user_id'];
    }
    if(isset($data['plan'])) {
      $errorinfo = $data['plan'];
    }
    if(isset($data['plan_amount'])) {
      $errorinfo = $data['plan_amount'];
    } 
    if(isset($data['transcation_id'])) {
      $errorinfo = $data['transcation_id'];
    } 
    if(isset($data['transcation_status'])) {
      $errorinfo = $data['transcation_status'];
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
      $plan['user_id']        = $this->input->post('user_id');
      $plan['plan']           = $this->input->post('plan');
      $plan['plan_amount']    = $this->input->post('plan_amount');
      if('basic'==$plan['plan']){
        $plan['plan_expiry'] = date('Y-m-d',strtotime('+3 month'));
      }else if('premium'==$plan['plan']){
        $plan['plan_expiry'] = date('Y-m-d',strtotime('+1 year'));
      }else{
        $response = array('status' => "true",'message' => 'You have selected an invalid plan.','data' =>array());
        return $this->response($response);
      }
      $check_plan = $this->user_model->get_plan_details($plan['user_id']);
      
      $payment['patient']        = $this->input->post('user_id');
      $payment['doctor']         = $this->input->post('doctor');
      $payment['hospital_id']    = $this->input->post('hospital_id');
      $payment['amount']    = $this->input->post('plan_amount');
      $payment['remarks']    = $this->input->post('transcation_id');
      $payment['paid_from']   = 'PHP';
      $payment['status']    = $this->input->post('transcation_status');
      $pay_status = $this->user_model->update_payment($payment);
      if ($check_plan['plan'] == '' && $payment['status']=='success' && $plan['plan']!='success' ) {
        $results = $this->user_model->update_plan($plan);
        $result = array('status' => "true",'message'=>'Plan Updated successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
        return $this->response($result);
      } else if(empty($check_plan)){
        $check_plan = new stdClass;
        $response = array('status' => "false",'message' => 'No user found for this id','data' =>$check_plan);
        return $this->response($response);
      } else {
       $response = array('status' => "true",'message' => 'You already having plan','data' =>$check_plan);
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
}

