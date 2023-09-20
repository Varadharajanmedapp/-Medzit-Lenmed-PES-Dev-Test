<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Support_model extends CI_model {
    function __construct() {
        parent::__construct();
       
    }

    function getSupport()

    {
        $this->load->database();
    }
    function getEmailSettings() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('email_settings');
        return $query->row();
    }
}