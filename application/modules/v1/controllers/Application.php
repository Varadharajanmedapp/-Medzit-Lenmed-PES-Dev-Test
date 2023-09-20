<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/MY_REST_Controller.php';
require  'vendor/autoload.php';

/**
 * This Application controller class contains the methods related to app control
 * like version check and splash screen
 *
 * @package         Med apps
 * @subpackage      API
 * @category        Controller
 * @author          Rajesh k
 * @link            #
 */
class Application extends MY_REST_Controller {
  function __construct()  {
    parent::__construct();
    $this->load->model('application_model');
    $this->load->model('user_model');
    $this->load->model('doctor_model');
    $this->load->helper('array');
    $this->load->library(array('session', 'form_validation'));
  }
  /**
   * Check app version
   *
   * @param string $app_version application version
   * @param string $app_platform application platform (ios/android)
   * @param object $device_name User device name
   *
   * @return string status message
   */
 
  public function version_check_post()  {
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
     //$_POST  = (array) json_decode($this->input->raw_input_stream);
    log_message('error', $this->input->raw_input_stream); 
    $config = [
      [
        'field' => 'user_id',
        'label' => 'User ID',
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
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }
      $data['new_ui']=true;
      $results = array('status' => "FALSE",'data' => array('message' => $_POST,'messageDetail'=> 'Invalid input','new_ui'=>true));
      log_message('error', json_encode($results)); 


      $response = array('status' => "true",'data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
      
      return $this->response($response);

    }else {
      $user_id      = $this->input->post('user_id');
      $app_version  = $this->input->post('app_version', TRUE);
      $app_platform = $this->input->post('app_platform', TRUE);
      $device_name  = $this->input->post('device_name', TRUE);
      $android_version = "1.0";
      $ios_version = "1.0";
      $android_force = "0";      // "no_update" => 0, "force" => 1, "optional" => 2 
      $ios_force = "0";       // "no_update" => 0, "force" => 1, "optional" => 2
      $blocked = FALSE;
      if($device_name != '') {
        $blocked = $this->application_model->device_block_status($device_name);
      }   
      $image_url = base_url().'/assets/img/terms_conditions.png';
      $logo = base_url().'/assets/img/terms_conditions.png';
      $app_store_url = 'PRODUCTION_WEBSITE_URL';
      $service_status = "true";
      $ios_fixed_version = "1.0";   //current version of ios app
      $android_fixed_version = "1.0";      //current version of android app
      if(!$blocked) { 
          if($app_platform == 'android') {
          $user_plan    = $this->application_model->get_user_details($user_id);
          $results['status'] = 'true';
          if($android_version == $app_version) {
            $results   = array('version' => $android_version,'new_ui'=>true, 'force' => "0", 'service_status' => $service_status, 'maintenance_image_url' => $image_url,'app_logo' => $logo, 'staging_webservice_url' =>' TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url,'plan'=>$user_plan['plan'],'plan_amount'=>$user_plan['plan_amount'],'plan_expiry'=>$user_plan['plan_expiry']);
          }
          else{
            $results   = array('version' => $android_version, 'new_ui'=>true,'force' => "0", 'service_status' => $service_status, 'maintenance_image_url' => $image_url,'app_logo' => $logo, 'staging_webservice_url' =>' TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url,'plan'=>$user_plan['plan'],'plan_amount'=>$user_plan['plan_amount'],'plan_expiry'=>$user_plan['plan_expiry']);;
          }
          $token = $this->application_model->auth();
          
          $response = array('status' => "true",'data' => base64_encode(encrypt_data($sess_id,json_encode($results))),'token'=>$token,'new_ui'=>true);
          
          //$response = array('status' => "true",'data' => json_encode($results),'token'=>$token);
          return $this->response($response);
        }else if($app_platform == 'ios') {
          if($ios_version == $app_version) {
          $user_plan    = $this->application_model->get_user_details($user_id);
          $results['status'] = 'true';
          $results['data']   = array('version' => $ios_version,'new_ui'=>true, 'force' => "0", 'service_status' => $service_status, 'maintenance_image_url' => $image_url, 'app_logo' => $logo, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url,'plan'=>$user_plan['plan'],'plan_amount'=>$user_plan['plan_amount'],'plan_expiry'=>$user_plan['plan_expiry']);
          }
          else { 
          $results['status'] = 'true';
          $results['data']   = array('version' => $ios_version,'new_ui'=>true, 'force' => $ios_force, 'service_status' => $service_status, 'maintenance_image_url' => $image_url,'app_logo' => $logo, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          $token = $this->application_model->auth();

          $response = array('status' => "true",'data' => base64_encode(encrypt_data($sess_id,json_encode($results))),'token'=>$token,'new_ui'=>true);
          return $this->response($response);
        }
      }else{
        if($app_platform == 'android') {
          if($android_fixed_version == $app_version) {
          //$results['status'] = 'true';
          $results   = array('version' => $android_fixed_version,'new_ui'=>true, 'force' => "0", 'service_status' => $service_status, 'maintenance_image_url' => $image_url,'app_logo' => $logo, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          else {
          $android_force = 1;
          //$results['status'] = 'true';
          $results   = array('version' => $android_fixed_version,'new_ui'=>true, 'force' => $android_force, 'service_status' => "FALSE", 'maintenance_image_url' => $image_url,'app_logo' => $logo, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash*/'app_store_url'=>$app_store_url);
          }
          $token = $this->application_model->auth();
           
          $response = array('status' => "true",'data' => base64_encode(encrypt_data($sess_id,json_encode($results))),'token'=>$token,'new_ui'=>true);
      
          return $this->response($response);
        }else if($app_platform == 'ios') {
          if($ios_fixed_version == $app_version) {
          $results['status'] = 'true';
          $results['data']   = array('version' => $ios_fixed_version,'new_ui'=>true, 'force' => "0", 'service_status' => $service_status, 'maintenance_image_url' => $image_url,'app_logo' => $logo, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          else { 
          $ios_force = 1;
          $results['status'] = 'true';
          $results['data']   = array('version' => $ios_fixed_version,'new_ui'=>true, 'force' => $ios_force, 'service_status' => "FALSE", 'maintenance_image_url' => $image_url, 'app_logo' => $logo, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), 'splash' => $splash,'app_store_url'=>$app_store_url);
          }
          $token = $this->application_model->auth();
          $response = array('status' => "true",'data' => base64_encode(encrypt_data($sess_id,json_encode($results))),'token'=>$token,'new_ui'=>true);
          return $this->response($response);
        }
      }

    }
  }   
  public function encript_key_post() { 
    $_POST    = (array) json_decode($this->input->raw_input_stream);
    $config = [
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
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }    
      $results = array('status' => "false",'message' => $errorinfo,'data'=>(object)array());
      return $this->response($results);
    }
    else {
      try {
        $encryption_key=generate_key();
        $iv=generate_key();
        $id = $this->application_model->add_user_session($encryption_key,$iv);
        $response = array('status' => "true",'message' => 'Encryption key','data' => $encryption_key,'iv' => $iv,'sess_id' => $id);
      
        return $this->response($response);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => $e->getMessage(),'data' => array());
        return $this->response($results);
      } 
    }
  }   

  public function notification_token_post() { 
    $sess_id = $this->input->get_request_header('Sess-Id');
    $_POST  = (array) json_decode( decrypt_data($sess_id,$this->input->raw_input_stream));
    $config = [
      [
        'field' => 'id',
        'label' => 'id',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your ID',
        ]
      ],
      [
        'field' => 'role',
        'label' => 'Role',
        'rules' => 'trim|required|in_list[user,doctor]',
        'errors' => [
          'required' => 'Please enter your Role',
          'in_list' => '%s must be user or doctor'
        ]
      ],
      [
        'field' => 'token',
        'label' => 'token',
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Please enter your token',
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
      if(isset($data['role'])) {
        $errorinfo = $data['role'];
      }
      if(isset($data['token'])) {
        $errorinfo = $data['token'];
      }
      if(isset($data['app_platform'])) {
        $errorinfo = $data['app_platform'];
      }
      if(isset($data['app_version'])) {
        $errorinfo = $data['app_version'];
      }    
      $response = array('status' => "true",'data' => base64_encode(encrypt_data($sess_id,json_encode($results))));
      
      return $this->response($response);
    }
    else {
      try {
        $data['id']      = $this->input->post('id');
        $data['role']      = $this->input->post('role');
        $data['token']      = $this->input->post('token');
        if ($data['role'] == 'user') {
          $check_user = $this->user_model->get_app_patient($data['id']);
          if ($check_user) {
            $user_token = $this->user_model->user_notification_token($data);
            $response = array('status' => "true",'message' => 'Token saved successfully','data' => $user_token);
          }else{
            $response = array('status' => "false",'message' => 'Patient Not Found','data' =>(object)array());
          }

        }else{
          $check_doctor = $this->doctor_model->get_doctor($data['id']);
          if ($check_doctor) {
            $doctor_token = $this->doctor_model->doctor_notification_token($data);
            $response = array('status' => "true",'message' => 'Token saved successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($doctor_token))));
          }
          else{
            $response = array('status' => "false",'message' => 'Doctor Not Found','data' =>(object)array());
          }
        }
        return $this->response($response);
      }
      catch( Exception $e ) {
        log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
        $results = array('status' => "false",'message' => base64_encode(encrypt_data($sess_id,json_encode($e->getMessage()))),'data' => array());
        return $this->response($results);
      } 
    }
  }
}