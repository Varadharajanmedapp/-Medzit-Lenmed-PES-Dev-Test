<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Remarks_model extends CI_model {

  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  function getRemarks() {
    $this->db->select('remarks');
    $this->db->group_by('remarks'); 
    $this->db->where('remarks!=',''); 
    $query = $this->db->get('appointment');
    return $query->result();
  }
}
