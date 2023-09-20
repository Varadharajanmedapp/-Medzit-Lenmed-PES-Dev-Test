<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Application extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}
	//redirect if needed, otherwise display the user list

  /**
   * Check app version
   *
   * @param string $app_version application version
   * @param string $app_platform application platform (ios/android)
   * @param object $device_name User device name
   *
   * @return string status message
   */
 
  public function version_check()  {
    $this->load->helper('array');
    $this->load->library(array('session'));
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
      $image_url = 'https://globytex.com/multi_hos/common/img/terms_conditions.png';
      $app_store_url = 'PRODUCTION_WEBSITE_URL';
      $service_status = "true";
      $ios_fixed_version = "1.0";   //current version of ios app
      $android_fixed_version = "1.0";      //current version of android app
      if(!$blocked) {     
        if($app_platform == 'android') {
          $results['status'] = 'true';
          if($android_version == $app_version) {
            $results['data']   = array('version' => $android_version, 'force' => "0", 'service_status' => $service_status, 'terms_conditions_img' => $image_url, 'staging_webservice_url' =>' TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          else{
            $results['data']   = array('version' => $android_version, 'force' => $android_force, 'service_status' => $service_status, 'terms_conditions_img' => $image_url, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($results));
          return true;
        }
        else if($app_platform == 'ios') {
          if($ios_version == $app_version) {
          $results['status'] = 'true';
          $results['data']   = array('version' => $ios_version, 'force' => "0", 'service_status' => $service_status, 'terms_conditions_img' => $image_url, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          else { 
          $results['status'] = 'true';
          $results['data']   = array('version' => $ios_version, 'force' => $ios_force, 'service_status' => $service_status, 'maintenance_image_url' => $image_url, 'staging_webservice_url' => 'TESTING_WEBSERVICE_URL', 'live_webservice_url' => 'PRODUCTION_WEBSERVICE_URL', 'dev_webservice_url' => 'DEVELOPMENT_WEBSERVICE_URL', 'base_url' => base_url(), /*'splash' => $splash,*/'app_store_url'=>$app_store_url);
          }
          $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($results));
          return true;
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
          $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($results));
          return true;
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
          $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($results));
          return true;
        }
      }
    }
  }   

  

	// function index() {
	// 	if (!$this->ion_auth->logged_in()) {
	// 		//redirect them to the login page
	// 		redirect('auth/login', 'refresh');
	// 	}
	// /*	elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
	// 	{
	// 		//redirect them to the home page because they must be an administrator to view this
	// 		return show_error('You must be an administrator to view this page.');
	// 	}
 //        */        
	// 	else {
	// 		//set the flash data error message if there is one
	// 		$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
	// 		//list the users
	// 		$data['users'] = $this->ion_auth->users()->result();
	// 		foreach ($data['users'] as $k => $user) {
	// 			$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
	// 		}
	// 		// $this->_render_page('auth/index', $data);
 //       redirect('home', 'refresh');
	// 	}
	// }
}
