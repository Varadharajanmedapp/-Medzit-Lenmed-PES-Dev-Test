<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Department_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertDepartment($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('department', $data2);
    }

    // function getSpecialist() {
    //     // $this->db->where('hospital_id', $this->session->userdata(''));
    //     $query = $this->db->get('specialist');
    //     return $query->result();
    // }
    // function getDepartment() {
    //     $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    //     $query = $this->db->get('department');
    //     return $query->result();
    // }
    function getspecilaist() {
      $this->db->where('hospital_id', $this->session->userdata('hospital_id')); 
        $query = $this->db->get('specialist');
        return $query->result();
    }
    function getDepartment() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('department');
        return $query->result();
    }

    function getDepartmentById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('department');
        return $query->row();
    }

    function updateDepartment($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('department', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('department');
    }
    public function get_specialist($id=null) {
    $this->db->select('*');
    $this->db->from('specialist');
    if(!is_null($id)) {
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->row();
    } else {
      $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
      $query = $this->db->get();
      return $query->result();
    }
  }

  public function add_specialist($data) {
    $data['hospital_id'] = $this->session->userdata('hospital_id');
    return $this->db->insert('specialist',$data);
  }

  function update_specialist($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('specialist', $data);
       if($this->db->affected_rows()) {
        return TRUE;
    } else {
        return FALSE;
    }
    }
    function get_hos_location() {
        $this->db->where('id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('hospital');
        return $query->row_array();
    }

  public function delete_specialist($id) {
    $this->db->where('id', $id);
    $this->db->delete('specialist');
    if($this->db->affected_rows()) {
        return TRUE;
    } else {
        return FALSE;
    }
  }
  public function get_med_procedure() {
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->order_by('scan_type', 'ASC');
    $query = $this->db->get('scan_types');
    return $query->result();
  }

  public function get_scan_types_BySearch($search) {
  $this->db->order_by('id', 'desc');
  $query = $this->db->select('*')
          ->from('scan_types')
          ->where('hospital_id', $this->session->userdata('hospital_id'))
          ->where("(id LIKE '%" . $search . "%' OR category LIKE '%" . $search . "%' OR scan_type LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
          ->get();
  return $query->result();
  }

  public function getScantypesByLimitBySearch($limit, $start, $search) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')
            ->from('scan_types')
            ->where('hospital_id', $this->session->userdata('hospital_id'))
            ->where("(id LIKE '%" . $search . "%' OR category LIKE '%" . $search . "%' OR scan_type LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
            ->get();
    return $query->result();
  }
  public function getScantypesByLimit($limit, $start) {
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->get('scan_types');
    return $query->result();
  }

  public function insert_scan_type($data) {
    $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
    $data2 = array_merge($data, $data1);
    $query =  $this->db->insert('scan_types', $data2);
    return $query;
  }
  public function delete_scan_type($id) {
    $this->db->where('id', $id);
    $this->db->delete('scan_types');
  }




}
