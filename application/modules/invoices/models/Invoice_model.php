<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Invoice_model extends CI_model {

  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  function getPatient() {
    $this->db->order_by('id', 'desc');
    $query = $this->db->get('patient');
    return $query->result();
  }
  function getPatientById($id) {
    $this->db->where('id', $id);
    return $this->db->get('patient')->row();
  }
  function getDoctor() {
    $query = $this->db->get('doctor');
    return $query->result();
  }
  function getDoctorById($id) {
    $this->db->where('id', $id);
    return $this->db->get('doctor')->row();
  }
  function getHospitalById($id) {
    $this->db->where('id', $id);
    return $this->db->get('hospital')->row();
  }
  function getAppointmentListByDoctor($doctor) {
    $this->db->where('doctor', $doctor);
    $this->db->where('amount!=', '');
    $this->db->order_by('id', 'desc');
    $query = $this->db->get('appointment');
    return $query->result();
  }
  function getAppointmentById($id) {
    $this->db->where('id', $id);
    return $this->db->get('appointment')->row();
  }

  function getAppointmentListBySearchByDoctor($doctor, $search) {
    $this->db->order_by('id', 'desc');
    $this->db->select('*');
    $this->db->from('appointment');
    // if (!$this->ion_auth->in_group(array('superadmin'))) {
    //   $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    // }
    $this->db->where('doctor', $doctor);
    $this->db->where('amount!=', '');
    $this->db->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE);
    $query = $this->db->get();
    return $query->result();
  }
  function getAppointmentListByLimitBySearchByDoctor($doctor, $limit, $start, $search) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')
            ->from('appointment')
            ->where('doctor', $doctor)
            ->where('amount!=', '')
            ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
            ->get();
    return $query->result();
  }
  function getAppointmentListByLimitByDoctor($doctor, $limit, $start) {
    $this->db->where('doctor', $doctor);
    $this->db->where('amount!=', '');
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    return $query->result();
  }
  function getAppointmentBySearch($search) {
    $this->db->order_by('id', 'desc');
    if (!$this->ion_auth->in_group(array('superadmin'))) {
      $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    }
    $query = $this->db->select('*')
            ->from('appointment')
            ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
            ->get();
    return $query->result();
  }
  function getAppointment() {
    $this->db->order_by('id', 'desc');
    if (!$this->ion_auth->in_group(array('superadmin'))) {
      $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    }
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getAppointmentByLimitBySearch($limit, $start, $search) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $this->db->where('amount!=', '');
    if (!$this->ion_auth->in_group(array('superadmin'))) {
      $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    }
    $query = $this->db->select('*')
            ->from('appointment')
            ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
            ->get();
    return $query->result();
  }
  function getAppointmentByLimit($limit, $start) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    if (!$this->ion_auth->in_group(array('superadmin'))) {
      $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    }
    $this->db->where('amount!=', '');
    $query = $this->db->get('appointment');
    return $query->result();
  }
}