<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Superadmin_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function addOnboard($data) {
        return $this->db->insert('on_board',$data);
    }

  function getOnboard($id=null) {
    $this->db->select('*');
    $this->db->from('on_board');
    if(!is_null($id)) {
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->row();
    } else {
      $query = $this->db->get();
      return $query->result();
    }
  }


    function updateOnboard($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('on_board', $data);
        if($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

  function deleteOnboard($id) {
    $this->db->where('id', $id);
    $this->db->delete('on_board');
    if($this->db->affected_rows()) {
        return TRUE;
    } else {
        return FALSE;
    }
  }

    function addTerms($data) {
        return $this->db->insert('terms_conditions',$data);
    }

    function getTerms($id=null) {
        $this->db->select('*');
        $this->db->from('terms_conditions');
        if(!is_null($id)) {
          $this->db->where('id', $id);
          $query = $this->db->get();
          return $query->row();
        } else {
          $query = $this->db->get();
          return $query->result();
        }
    }

    function updateTerms($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('terms_conditions', $data);
        if($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function deleteTerms($id) {
        $this->db->where('id', $id);
        $this->db->delete('terms_conditions');
        if($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getAppuser($id=null) {
        $this->db->select('*');
        $this->db->from('patient');
        if(!is_null($id)) {
          $this->db->where('id', $id);
          $this->db->where('hospital_id', 'app_patient');
          $query = $this->db->get();
          return $query->row();
        } else {
          $this->db->where('hospital_id', 'app_patient');
          $query = $this->db->get();
          return $query->result();
        }
    }

    function updateAppuser($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('patient', $data);
        if($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function deleteAppuser($id) {
        $this->db->where('id', $id);
        $this->db->delete('patient');
        if($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    function getAppdoctor($id=null) {
        $this->db->select('*');
        $this->db->from('doctor');
        if(!is_null($id)) {
          $this->db->where('id', $id);
          $this->db->where('hospital_id', 'app_doctor');
          $query = $this->db->get();
          return $query->row();
        } else {

          $this->db->where('hospital_id', 'app_doctor');
          $query = $this->db->get();
          return $query->result();
        }
    }
    function updateAppdoctor($id, $data) {
      $this->db->where('id', $id);
      $this->db->update('doctor', $data);
      if($this->db->affected_rows()) {
          return TRUE;
      } else {
          return FALSE;
    }
  }

  public function deleteAppdoctor($id) {
    $this->db->where('id', $id);
    $this->db->set('status', 'deleted');
    $this->db->update('doctor');
    // $this->db->delete('doctor');
    if($this->db->affected_rows()) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function get_specialist($id=null) {
    $this->db->select('*');
    $this->db->from('specialist');
      $this->db->where('hospital_id = ',' ');
    if(!is_null($id)) {
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->row();
    } else {
      $query = $this->db->get();
      return $query->result();
    }
  }
  public function add_specialist($data) {
    return $this->db->insert('specialist',$data);
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
   function update_specialist($id, $data) {
     $this->db->where('id', $id);
     $this->db->update('specialist', $data);
    if($this->db->affected_rows()) {
        return TRUE;
    } else {
        return FALSE;
    }
  }
    public function get_banners($id = null) {
    $this->db->select('*');
    $this->db->from('banners');
    if(!is_null($id)) {
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->row();
    } else {
      $query = $this->db->get();
      return $query->result();
    }
  }

  public function get_banners_BySearch($search) {
  $this->db->order_by('id', 'desc');
  $query = $this->db->select('*')
         ->from('banners')
          // ->where('hospital_id', $this->session->userdata('hospital_id'))
          ->where("(id LIKE '%" . $search . "%' OR category LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR e_date LIKE '%" . $search . "%'OR generic LIKE '%" . $search . "%'OR company LIKE '%" . $search . "%'OR effects LIKE '%" . $search . "%')", NULL, FALSE)
          ->get();
  return $query->result();
  }

  public function add_banner($data) {
    return $this->db->insert('banners',$data);
  }

  function update_banner($id, $data) {
    $this->db->where('id', $id);
    $this->db->update('banners', $data);
    if($this->db->affected_rows()) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
  public function delete_banner($id) {
    $this->db->where('id', $id);
    $this->db->delete('banners');
  }



}
