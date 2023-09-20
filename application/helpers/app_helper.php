<?php
if(!defined('BASEPATH')) 
  exit('No direct script access allowed');

if(! function_exists('has_access')) {
	function has_access($table,$id,$user) {
		$CI =& get_instance();
    $CI->load->database();
    $db = $CI->db;
    $db->from($table);
    $db->group_start();
    $db->where("find_in_set($user, access)");
    $db->where('id',$id);
    $db->group_end();
    $count = $db->count_all_results();		
		return $count;
	}
}
if(! function_exists('add_access')) {
  function add_access($table,$id,$user) {
    $CI =& get_instance();
    $CI->load->database();
    $db = $CI->db;
    
    $db->select('access');
    $db->where('id', $id );
    $query = $db->get($table);
    $row = $query->row();
    $access = isset($row->access) ? explode(',', $row->access) : array();
    if (($key = array_search($user, $access)) === false) {
      array_push($access,$user);
      $db->set('access', implode(',', $access))->where('id', $id )->update($table); 
    }

  }
}
if(! function_exists('remove_access')) {
  function remove_access($table,$id,$user) {
    $CI =& get_instance();
    $CI->load->database();
    $db = $CI->db;
    
    $db->select('access');
    $db->where('id', $id );
    $query = $db->get($table);
    $row = $query->row();

    $access = isset($row->access) ? explode(',', $row->access) : array();
    if (($key = array_search($user, $access)) !== false) {
      unset($access[$key]);
    }
    $db->set('access', implode(',',$access))->where('id', $id )->update($table); 
  }
}
if(! function_exists('add_notification')) {
  function add_notification($data) {
    $CI =& get_instance();
    $CI->load->database();
    $db = $CI->db;
      
    $db->insert('notification', $data);
  }
}
if(! function_exists('decrypt_data')) {
  function decrypt_data($id,$encrypted_data) {
    $CI =& get_instance();
    $db = $CI->db;
    $db->select('*');
    $db->where('id', $id );
    $query = $db->get('sessions');
    $row = $query->row();
    $cipher = "aes-128-cbc";

    $encryption_key = $row->encryption_key;
    $iv = $row->iv;
    $decrypted_data = openssl_decrypt(base64_decode($encrypted_data), $cipher, $encryption_key, OPENSSL_RAW_DATA, $iv); 
    return $decrypted_data; 
  }
}
if(! function_exists('encrypt_data')) {
  function encrypt_data($id,$data) {
    $CI =& get_instance();
    $db = $CI->db;
    $db->select('*');
    $db->where('id', $id );
    $query = $db->get('sessions');
    $row = $query->row();
    $cipher = "aes-128-cbc";
    $encryption_key = $row->encryption_key;
    $iv = $row->iv;
    $encrypted_data = openssl_encrypt($data,$cipher,$encryption_key,OPENSSL_RAW_DATA,$iv); 
    return $encrypted_data; 
  }
}

function generate_key() {
    $str="abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $input_length = strlen($str);
    $random_string = '';
    for($i = 0; $i < 16; $i++) {
        $random_character = $str[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}
