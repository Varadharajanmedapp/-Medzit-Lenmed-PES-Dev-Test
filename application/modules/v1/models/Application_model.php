<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use \Firebase\JWT\JWT;
/*
* The Application Model which contain the functionalities generally required for whole app
* Written by: Rajesh k
*/

class Application_Model extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->helper("url");
  }

  /**
    This Function is used only for Authorization Api 
  */
  public function get_user($q) {
    return $this->db->get_where('m_user',$q);
  }

  public function auth() {
    $u = $this->input->post('username'); 
    $p =   hash('sha512',$this->input->post('password'));
    $q = array('username' => $u);
    $kunci = $this->config->item('thekey');
    $invalidLogin = ['status' => 'Invalid Login'];
    $val = $this->get_user($q)->row(); 
    if($this->get_user($q)->num_rows() == 0){
      $results = array('status'=>"false",'message'=>'Invalid login','data'=>array());
      return $results;
    }
    $match = $val->password; 
    if($p == $match) {  
      $token['id'] = $val->id;  
      $token['username'] = $u;
      $date = new DateTime();
      $token['iat'] = $date->getTimestamp();
      $token['exp'] = $date->getTimestamp() + 60*60*5;
      $output = JWT::encode($token,$kunci );
      return $output;
    }
    else {
      $results = array('status'=>"false",'message'=>'Invalid login','data'=>array());
      return $results;
    }
  }  

  /**
  * Check device is blocked or not
  *
  * @param object $device User device name
  *
  * @return string status message
  **/
  public function device_block_status($device) {
    // $blocked_devices = array('MOTOG5');
    $blocked_devices = array();
    if(in_array($device,$blocked_devices)) {
      return true;
    }
    else {
      return false;
    }
  }
  /**
  * get splash images from database
  *
  *
  * @return object splash images
  **/
  public function get_splash_screen() {
    $this->db->reset_query();
    $this->db->order_by("modified_at", "desc");
    $userData = $this->db->get('splash');
    if($userData->num_rows() > 0) {
      return $userData->result();
    }
    else {
      return array();
    }
  }
  /**
  * get user plan details from database
  *
  *
  * @return object user plan details
  **/
  public function get_user_details($id) {
    $this->db->select('plan,plan_amount,plan_expiry');
    $this->db->from('patient');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function add_user_session($encryption_key,$iv) {
    $user_info['encryption_key']  = $encryption_key;
    $user_info['iv']  = $iv;
    $this->db->insert('sessions', $user_info);
    return $this->db->insert_id();
  }
  public function get_user_session($id) {
    $this->db->select('*');
    $this->db->from('sessions');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row_array();
  }
}
