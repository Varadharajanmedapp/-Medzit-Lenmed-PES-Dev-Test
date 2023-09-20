<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
use Twilio\Rest\Client;
class Appointment_model extends CI_model {

  function __construct() {
    parent::__construct();
    $this->load->database();
  }
  function patient_history_log($data) {
    $this->db->insert('patient_history_log', $data);
    return true;
  }
  public function get_departments() { 
    $this->db->select('id,name,amount');
    $this->db->from('department');
    $this->db->where('hospital_id',$this->session->userdata('hospital_id'));
    $query = $this->db->get()->result();
    return $query;
  }
  public function get_specialist() {
    $this->db->select('title,image');
    $this->db->where('hospital_id',$this->session->userdata('hospital_id'));
    $this->db->where('status','Active');
    $this->db->from('specialist');
    $this->db->group_by('title');
    $query = $this->db->get();
    return $query->result();
  }
  function insertAppointment($data) {
    $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
    $data2 = array_merge($data, $data1);
    $this->db->insert('appointment', $data2);
  }
  public function sendSMS($data) {
    // Your Account SID and Auth Token from twilio.com/console
    $sid = 'AC9e31cfb793074c1a82cc7d8f430ddc1e';
    $token = '73a7f0f8bcfd0e0d2296a1d7ab75d466';
    $client = new Client($sid, $token);
    
    try {
      $result = $client->messages->create(
      // the number you'd like to send the message to
      $data['phone'],
      array(
        // A Twilio phone number you purchased at twilio.com/console
        "from" => "(878)999-9822",
        // the body of the text message you'd like to send
        'body' => $data['text']
      )
      
    );

    
      return $result;
    } catch (Exception $e) {
       return false;   
    }
    

  }
  function getAppointment() {
    $hospital_id = $this->session->userdata('hospital_id');
    $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

    $this->db->order_by('id', 'desc');
    $this->db->group_start();
    $this->db->where('find_in_set("'.$hospital_id.'", access)');
    $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
    $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->group_end();
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getAppointmentBySearch($search) {
    $hospital_id = $this->session->userdata('hospital_id');
    $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

    $this->db->order_by('id', 'desc');
    $query = $this->db->select('*')->from('appointment');
    $this->db->group_start();
    $this->db->where('find_in_set("'.$hospital_id.'", access)');
    $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
    $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->group_end();

    $this->db->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getAppointmentByLimit($limit, $start) {
    $hospital_id = $this->session->userdata('hospital_id');
    $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

    $this->db->group_start();
    $this->db->where('find_in_set("'.$hospital_id.'", access)');
    $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
    $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->group_end();

    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    $result = $query->result();
    return $query->result();
  }

  function getAppointmentByLimitBySearch($limit, $start, $search) {
    $hospital_id = $this->session->userdata('hospital_id');
    $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $this->db->group_start();
    $this->db->where('find_in_set("'.$hospital_id.'", access)');
    $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
    $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->group_end();
    
    $this->db->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE);
    $query = $this->db->select('*')->from('appointment');
    
    return $query->get()->result();
    }

  function getAppointmentForCalendar() {
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->order_by('id', 'asc');
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getAppointmentByDoctor($doctor) {
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->order_by('id', 'desc');
    if(!is_null($doctor))
    $this->db->where('doctor', $doctor);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getAppointmentRequest() {
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->order_by('id', 'desc');
    // $this->db->where('request', 'Yes');
    $this->db->where('status', 'Pending Confirmation');
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getAppointmentRequestByDoctor($doctor) {
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    // $this->db->where('request', 'Yes');
    $this->db->where('status', 'Pending Confirmation');
    $this->db->where('doctor', $doctor);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getAppointmentByPatient($patient) {
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->order_by('id', 'desc');
    $this->db->where('patient', $patient);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getAppointmentByStatus($status) {
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->order_by('id', 'desc');
    $this->db->where('status', $status);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getAppointmentByStatusByDoctor($status, $doctor) {
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->order_by('id', 'desc');
    $this->db->where('status', $status);
    $this->db->where('doctor', $doctor);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getAppointmentById($id) {
    $hospital_id = $this->session->userdata('hospital_id');
    $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');
    $this->db->group_start();
    $this->db->where('find_in_set("'.$hospital_id.'", access)');
    $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
    $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->group_end();
    $this->db->where('id', $id);
    $query = $this->db->get('appointment');
    return $query->row();
  }

  function getPrescriptionByAppointmentId($id) {
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('appointment_id', $id);
    $query = $this->db->get('prescription');
    return $query->row();
  }

  function getAppointmentByDate($date_from, $date_to) {
    $this->db->select('*');
    $this->db->from('appointment');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('date >=', $date_from);
    $this->db->where('date <=', $date_to);
    $query = $this->db->get();
    return $query->result();
  }

  function getAppointmentByDoctorByToday($doctor_id) {
    $today = strtotime(date('Y-m-d'));
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('doctor', $doctor_id);
    $this->db->where('date', $today);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function updateAppointment($id, $data) {
    $this->db->where('id', $id);
    $this->db->update('appointment', $data);
  }

  function delete($id) {
    $this->db->where('id', $id);
    $this->db->delete('appointment');
  }

  function updateIonUser($username, $email, $password, $ion_user_id) {
    $uptade_ion_user = array(
      'username' => $username,
      'email' => $email,
      'password' => $password
    );
    $this->db->where('id', $ion_user_id);
    $this->db->update('users', $uptade_ion_user);
  }

  function getRequestAppointment() {
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->order_by('id', 'desc');
    $this->db->where('status', 'Pending Confirmation');
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getRequestAppointmentBySearch($search) {
    $this->db->order_by('id', 'desc');
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('hospital_id', $this->session->userdata('hospital_id'))
    ->where('status', 'Pending Confirmation')
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getRequestAppointmentByLimit($limit, $start) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Pending Confirmation');
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getRequestAppointmentByLimitBySearch($limit, $start, $search) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('hospital_id', $this->session->userdata('hospital_id'))
    ->where('status', 'Pending Confirmation')
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getPendingAppointment() {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'payment_pending');
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getPendingAppointmentBySearch($search) {
    $this->db->order_by('id', 'desc');
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('hospital_id', $this->session->userdata('hospital_id'))
    ->where('status', 'payment_pending')
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getPendingAppointmentByLimit($limit, $start) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'payment_pending');
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getPendingAppointmentByLimitBySearch($limit, $start, $search) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('hospital_id', $this->session->userdata('hospital_id'))
    ->where('status', 'payment_pending')
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getConfirmedAppointment() {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Confirmed');
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getConfirmedAppointmentBySearch($search) {
    $this->db->order_by('id', 'desc');
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('hospital_id', $this->session->userdata('hospital_id'))
    ->where('status', 'Confirmed')
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getConfirmedAppointmentByLimit($limit, $start) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Confirmed');
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getConfirmedAppointmentByLimitBySearch($limit, $start, $search) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('hospital_id', $this->session->userdata('hospital_id'))
    ->where('status', 'Confirmed')
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getTreatedAppointment() {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Treated');
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getTreatedAppointmentBySearch($search) {
    $this->db->order_by('id', 'desc');
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('hospital_id', $this->session->userdata('hospital_id'))
    ->where('status', 'Treated')
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getTreatedAppointmentByLimit($limit, $start) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Treated');
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getTreatedAppointmentByLimitBySearch($limit, $start, $search) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('hospital_id', $this->session->userdata('hospital_id'))
    ->where('status', 'Treated')
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getCancelledAppointment() {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Cancelled');
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getCancelledAppointmentBySearch($search) {
    $this->db->order_by('id', 'desc');
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('hospital_id', $this->session->userdata('hospital_id'))
    ->where('status', 'Cancelled')
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getCancelledAppointmentByLimit($limit, $start) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Cancelled');
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getCancelledAppointmentByLimitBySearch($limit, $start, $search) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('hospital_id', $this->session->userdata('hospital_id'))
    ->where('status', 'Cancelled')
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getAppointmentListByDoctor($doctor) {
    $hospital_id = $this->session->userdata('hospital_id');
    $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');
    $this->db->group_start();
    $this->db->where('find_in_set("'.$hospital_id.'", access)');
    $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
    $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->group_end();
    $this->db->where('doctor', $doctor);
    $this->db->order_by('id', 'desc');
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getAppointmentListBySearchByDoctor($doctor, $search) {
    $this->db->order_by('id', 'desc');
    $hospital_id = $this->session->userdata('hospital_id');
    $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');
    $query = $this->db->select('*')->from('appointment');
    $this->db->group_start();
    $this->db->where('find_in_set("'.$hospital_id.'", access)');
    $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
    $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->group_end();
    $this->db->where('doctor', $doctor)
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getAppointmentListByLimitByDoctor($doctor, $limit, $start) {
    $hospital_id = $this->session->userdata('hospital_id');
    $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

    $this->db->group_start();
    $this->db->where('find_in_set("'.$hospital_id.'", access)');
    $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
    $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->group_end();

    $this->db->where('doctor', $doctor);
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getAppointmentListByLimitBySearchByDoctor($doctor, $limit, $start, $search) {
    $hospital_id = $this->session->userdata('hospital_id');
    $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')->from('appointment');
    $this->db->group_start();
    $this->db->where('find_in_set("'.$hospital_id.'", access)');
    $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
    $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->group_end();
    $this->db->where('doctor', $doctor)
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getRequestAppointmentByDoctor($doctor) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Pending Confirmation');
    $this->db->where('doctor', $doctor);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getRequestAppointmentBySearchByDoctor($doctor, $search) {
    $this->db->order_by('id', 'desc');
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('status', 'Pending Confirmation')
    ->where('doctor', $doctor)
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getRequestAppointmentByLimitByDoctor($doctor, $limit, $start) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Pending Confirmation');
    $this->db->where('doctor', $doctor);
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getRequestAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search) {

    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('status', 'Pending Confirmation')
    ->where('doctor', $doctor)
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getCancelledAppointmentByDoctor($doctor) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Cancelled');
    $this->db->where('doctor', $doctor);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getCancelledAppointmentBySearchByDoctor($doctor, $search) {
    $this->db->order_by('id', 'desc');
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('status', 'Cancelled')
    ->where('doctor', $doctor)
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getCancelledAppointmentByLimitByDoctor($doctor, $limit, $start) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Cancelled');
    $this->db->where('doctor', $doctor);
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getCancelledAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search) {

    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('status', 'Cancelled')
    ->where('doctor', $doctor)
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getPendingAppointmentByDoctor($doctor) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'payment_pending');
    $this->db->where('doctor', $doctor);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getPendingAppointmentBySearchByDoctor($doctor, $search) {
    $this->db->order_by('id', 'desc');
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('status', 'payment_pending')
    ->where('doctor', $doctor)
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getPendingAppointmentByLimitByDoctor($doctor, $limit, $start) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'payment_pending');
    $this->db->where('doctor', $doctor);
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getPendingAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('status', 'payment_pending')
    ->where('doctor', $doctor)
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getTreatedAppointmentByDoctor($doctor) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Treated');
    $this->db->where('doctor', $doctor);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getTreatedAppointmentBySearchByDoctor($doctor, $search) {
    $this->db->order_by('id', 'desc');
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('status', 'Treated')
    ->where('doctor', $doctor)
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getTreatedAppointmentByLimitByDoctor($doctor, $limit, $start) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Treated');
    $this->db->where('doctor', $doctor);
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getTreatedAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('status', 'Treated')
    ->where('doctor', $doctor)
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getConfirmedAppointmentByDoctor($doctor) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Confirmed');
    $this->db->where('doctor', $doctor);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getConfirmedAppointmentBySearchByDoctor($doctor, $search) {
    $this->db->order_by('id', 'desc');
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('status', 'Confirmed')
    ->where('doctor', $doctor)
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  function getConfirmedAppointmentByLimitByDoctor($doctor, $limit, $start) {
    $this->db->order_by('id', 'desc');
    $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
    $this->db->where('status', 'Confirmed');
    $this->db->where('doctor', $doctor);
    $this->db->limit($limit, $start);
    $query = $this->db->get('appointment');
    return $query->result();
  }

  function getConfirmedAppointmentByLimitBySearchByDoctor($doctor, $limit, $start, $search) {
    $this->db->order_by('id', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->select('*')
    ->from('appointment')
    ->where('status', 'Confirmed')
    ->where('doctor', $doctor)
    ->where("(id LIKE '%" . $search . "%' OR patientname LIKE '%" . $search . "%' OR doctorname LIKE '%" . $search . "%')", NULL, FALSE)
    ->get();
    return $query->result();
  }

  public function doctor_appointment_status($data,$id) {
    $this->db->where('id', $id);
    $query = $this->db->get('appointment');
    $doctor = $query->row()->doctor;
    $hospital_id = $query->row()->hospital_id;
    if($data['status'] == 'Confirmed'){
      $notifi_data['text'] = "Appointment ".$id." was confirmed by the hospital";
      $notifi_data['subject'] = "Appointment confirmed";
    }else if($data['status'] == 'Treated'){
      $notifi_data['text'] = "Appointment ".$id." was treated";
      $notifi_data['subject'] = "Appointment treated";
    }else{
      $notifi_data['text'] = "Appointment ".$id." was updated";
      $notifi_data['subject'] = "Appointment updated";
    }
    $notifi_data['url'] = base_url().'appointment';
    $notifi_data['status'] = 0;
    $notifi_data['access'] = 'hos_'.$hospital_id.",".$doctor;
    add_notification($notifi_data);
    $this->db->reset_query();
    $log_data["appointment_id"] = $id;
    $log_data["status"] = $data['status'];
    $log_data["patient_id"] = $data['patient'];
    if (strpos($data['doctor_id'], 'hos_') !== false) {
      $log_data["hospital_id"] = end(explode("hos_",$data['doctor_id']));
    } else {
      $log_data["doctor_id"] = $data['doctor_id'];
    }
    if($data['status'] == 'Confirmed'){
      $data['channel_name']=!empty($data['channel_name'])?$data['channel_name']:'MEDZIT_'.$id.'_VID';
      if($data['channel_name']){
        $this->db->set('channel_name', $data['channel_name']); 
      }
      $this->db->where('id', $id);
      $this->db->set('status', $data['status']); 
      $this->db->set('time_slot', $data['time_slot']); 
      if (strpos($data['doctor_id'], 'hos_') !== false) {
        $this->db->set('doctor', '');
        $this->db->set('doctorname', '');
        $this->db->set('hospital_id', end(explode("hos_",$data['doctor_id'])));
      } else {
        $this->db->set('doctor', $data['doctor_id']);
        $this->db->set('doctorname', $data['doctor_name']);
      }
      $this->db->set('remarks', $data['remarks']);
      $this->db->set('unique_id',rand(100000, 999999));

      $this->db->update('appointment');
      $this->db->reset_query();
      $this->db->where('id', $id);
      $query = $this->db->get('appointment');
      $date = date('d-m-Y', $query->row()->date).' '.$data['time_slot'];
      // $url = "https://api.oval         .com/api/v2/SendSMS?ApiKey=lkRaw3enwcfvA/FIzdtiMQo7YR9h5AHwCXpX4UKgJNo=&ClientId=83450a2c-0c20-4f50-b1d7-53f5f748b35e&SenderId=DigitalNews&Message=".urlencode("Your appointment on ".$date." with ".$data['doctor_name']." is confirmed. Please mention the OTP number upon arrival. You can click this link to access all your information in MEDAPP mobile app: “https://bit.ly/2Z9V7gC”")."&MobileNumbers=".$data['patient_phone']."&Is_Unicode=true&Is_Flash=false"; 
      // $ch = curl_init($url);
      // curl_setopt($ch, CURLOPT_POST, false);
      // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // $result = curl_exec($ch);
      // curl_close($ch);
      $data = ['phone' => $data['patient_phone'], 'text' => "Your appointment on ".$date." with ".$data['doctor_name']." is confirmed. Please mention the OTP number upon arrival. You can click this link to access all your information in MEDAPP mobile app: “https://bit.ly/2Z9V7gC”"];
      $this->sendSMS($data);
      echo "success";
      $this->patient_history_log($log_data);
      add_access('appointment',$id,$doctor);
      add_access('appointment',$id,$hospital_id);
      return true;
    }elseif ($data['status']== 'Treated') {
      if (!empty($data['otp'])) {
        $this->db->where('id',$id);
        $this->db->set('time_slot', $data['time_slot']); 
        $query = $this->db->get('appointment')->row();
        if ($query->unique_id == $data['otp']) {
          $this->db->where('id', $id);
          $this->db->set('status', $data['status']);
          $this->db->update('appointment');
          $this->patient_history_log($log_data);
          add_access('appointment',$id,$doctor);
          add_access('appointment',$id,$hospital_id);
          echo "success";
          return true;
        }else{
          echo "invalid_otp";
          return true;
        }
      }else{
        echo "otp_empty";
        return true;
      }
    }else{
      $this->db->where('id', $id);
      $this->db->set('status', $data['status']);
      $this->db->set('time_slot', $data['time_slot']); 
      if (strpos($data['doctor_id'], 'hos_') !== false) {
        $this->db->set('doctor', '');
        $this->db->set('doctorname', '');
        $this->db->set('hospital_id', end(explode("hos_",$data['doctor_id'])));
      } else {
        $this->db->set('doctor', $data['doctor_id']);
        $this->db->set('doctorname', $data['doctor_name']);
      }
      $this->db->set('remarks', $data['remarks']);
      $this->db->update('appointment');
      echo "success";
      $this->patient_history_log($log_data);
      add_access('appointment',$id,$doctor);
      add_access('appointment',$id,$hospital_id);
      return true;
    }
  }

function getDoctor($doctor_id) {
  $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
  $this->db->where('id', $doctor_id);
  $query = $this->db->get('doctor');
  return $query->row();
}
function get_patient($patient_id) {
    // $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
  $this->db->where('id', $patient_id);
  $query = $this->db->get('patient');
  return $query->row();
}

public function getSpecialistFromDepartment($department) { 
  $this->db->where('category',$department);
  $this->db->select('*');
  $this->db->from('scan_types');
  $this->db->where('hospital_id',$this->session->userdata('hospital_id'));
  $query = $this->db->get()->result();
  return $query;
}

public function doctorFromDepartment($department) { 
  $this->db->select('name');
  $this->db->where('department',$department);
  $this->db->where('hospital_id',$this->session->userdata('hospital_id'));
  $this->db->from('doctor');
  $query = $this->db->get()->result();
  return $query;
}

public function consultFee($department)
{
$this->db->select("amount");
$this->db->where('name',$department);
$this->db->where('hospital_id',$this->session->userdata('hospital_id'));
$this->db->from('department');
  $query = $this->db->get()->row();
  return $query;
}
public function procedureFee($medpro)
{
  $this->db->where('scan_type',$medpro);
  $this->db->select('amount');
  $this->db->from('scan_types');
  $this->db->where('hospital_id',$this->session->userdata('hospital_id'));
  $query = $this->db->get()->row();
  return $query;
}
}