<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Home_model extends CI_model {

  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function getNotification() {
    
    $view        = $this->input->post('view');
    $hospital_id = $this->session->userdata('hospital_id');
    $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

    if(isset($view)){
      if($view != '') {
        $status = array(
            'status' => 1
        );
        $this->db->where('status', 0);
        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->group_end();
        $this->db->update('notification', $status);
      
      }

      $this->db->limit(10);
      $this->db->order_by('id', 'desc');
      $this->db->group_start();
      $this->db->where('find_in_set("'.$hospital_id.'", access)');
      $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
      $this->db->group_end();
      $query = $this->db->get('notification');
      $results = $query->result();
      $output = '';
      if(count($results) > 0) {
       foreach ($results as $result) {
         $output .= '
         <li>
          <a href="'.$result->url.'">
          <strong>'.$result->subject.'</strong><br />
          <small><em>'.$result->text.'</em></small>
          </a>
         </li>';
       }
     } else {
       $output .= '<li><a href="javascript:void();" class="text-bold text-italic">No Noti Found</a></li>';
     }
     $this->db->where('status', 0);
     $this->db->group_start();
      $this->db->where('find_in_set("'.$hospital_id.'", access)');
      $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
      $this->db->group_end();
     $query = $this->db->get('notification');
     $results = $query->result();
     $data = array(
      'notification' => $output,
      'unseen_notification'  => count($results)
    );
    echo json_encode($data);
  }
}
 public function getSum($field, $table) {
  $this->db->select_sum($field);
  $query = $this->db->get($table);
  return $query->result();
}
function updateHospital($id, $data) {
  $this->db->where('id', $id);
  $this->db->update('hospital', $data);
  return true;
}

}
