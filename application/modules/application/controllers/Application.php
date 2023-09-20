<?php

defined('BASEPATH') OR exit('No direct script access allowed');
  require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

/**
 * This Application controller class contains the methods related to app control
 * like version check and splash screen
 *
 * @package         Medapps
 * @subpackage      API
 * @category        Controller
 * @author          Ragubathi
 * @link            #
 */
class Application extends MX_Controller {
  function __construct()  {
    parent::__construct();
    $this->load->model('api/application_model');
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
    var_dump('expression');die;
    $_POST  = (array) json_decode($this->input->raw_input_stream);
    log_message('error', $this->input->raw_input_stream); 
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
      $results = array('status' => "FALSE",'data' => array('message' => $errorinfo,'messageDetail'=> 'Invalid input'));
      log_message('error', json_encode($results)); 

      return $this->response($results);
    }
    else {
      $app_version  = $this->input->post('app_version', TRUE);
      $app_platform = $this->input->post('app_platform', TRUE);
      $device_name  = $this->input->post('device_name', TRUE);
      $android_version = "1.0";      //current version of android app
      $ios_version = "1.0";   //current version of ios app
      $android_force = "0";      // "no_update" => 0, "force" => 1, "optional" => 2 
      $ios_force = "0";       // "no_update" => 0, "force" => 1, "optional" => 2
      $blocked = FALSE;
      if($device_name != '') {
        $blocked = $this->application_model->device_block_status($device_name);
      }   
      $image_url = 'https://globytex.com/macs_dental/assets/images/userprofile/raj.jpg';
      $app_store_url = 'PRODUCTION_WEBSITE_URL';
      $service_status = "true";
      $ios_fixed_version = "1.0";   //current version of ios app
      $android_fixed_version = "1.0";      //current version of android app
      if(!$blocked) {     
        if($app_platform == 'android') {
          $results['status'] = 'true';
          if($android_version == $app_version) {
            $results['data']   = array('version' => $android_version, 'force' => "0", 'service_status' => $service_status, 'maintenance_image_url' => $image_url, 'staging_webservice_url' =>' TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          else{
            $results['data']   = array('version' => $android_version, 'force' => $android_force, 'service_status' => $service_status, 'maintenance_image_url' => $image_url, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          $data = $this->application_model->auth();
          $add_attributes = array_merge($results,$data);
          log_message('error', json_encode($add_attributes)); 
          return $this->response($add_attributes);
        }
        else if($app_platform == 'ios') {
          if($ios_version == $app_version) {
          $results['status'] = 'true';
          $results['data']   = array('version' => $ios_version, 'force' => "0", 'service_status' => $service_status, 'maintenance_image_url' => $image_url, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          else { 
          $results['status'] = 'true';
          $results['data']   = array('version' => $ios_version, 'force' => $ios_force, 'service_status' => $service_status, 'maintenance_image_url' => $image_url, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          $data = $this->application_model->auth();
          $add_attributes = array_merge($results,$data);
          log_message('error', json_encode($add_attributes)); 
          return $this->response($add_attributes);
        }
      }
      else {
        if($app_platform == 'android') {
          if($android_fixed_version == $app_version) {
          $results['status'] = 'true';
          $results['data']   = array('version' => $android_fixed_version, 'force' => "0", 'service_status' => $service_status, 'maintenance_image_url' => $image_url, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          else {
          $android_force = 1;
          $results['status'] = 'true';
          $results['data']   = array('version' => $android_fixed_version, 'force' => $android_force, 'service_status' => "FALSE", 'maintenance_image_url' => $image_url, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash*/'app_store_url'=>$app_store_url);
          }
          $data = $this->application_model->auth();
          $add_attributes = array_merge($results,$data);
          log_message('error', json_encode($add_attributes)); 
          return $this->response($add_attributes);
        }
        else if($app_platform == 'ios') {
          if($ios_fixed_version == $app_version) {
          $results['status'] = 'true';
          $results['data']   = array('version' => $ios_fixed_version, 'force' => "0", 'service_status' => $service_status, 'maintenance_image_url' => $image_url, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          else { 
          $ios_force = 1;
          $results['status'] = 'true';
          $results['data']   = array('version' => $ios_fixed_version, 'force' => $ios_force, 'service_status' => "FALSE", 'maintenance_image_url' => $image_url, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), 'splash' => $splash,'app_store_url'=>$app_store_url);
          }
          $data = $this->application_model->auth();
          $add_attributes = array_merge($results,$data);
          log_message('error', json_encode($add_attributes)); 
          return $this->response($add_attributes);
        }
      }
    }
  }   
}