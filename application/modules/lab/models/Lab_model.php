<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lab_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertLab($data) {
        $this->load->model('appointment/appointment_model');
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('lab', $data2);
        $lab_id = $this->db->insert_id();
        $appoitment = $this->appointment_model->getAppointmentById($data['appointment']);
        foreach (explode(',', $appoitment->access) as $access_id) {
            add_access('lab',$lab_id,$access_id);
        }
        add_access('lab',$lab_id,$this->session->userdata('hospital_id'));
        return $lab_id;
    }
    function insertScan($data) {
        $this->load->model('appointment/appointment_model');
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('scan_report', $data2);
        $scan_id = $this->db->insert_id();
        $appoitment = $this->appointment_model->getAppointmentById($data['appointment']);
        foreach (explode(',', $appoitment->access) as $access_id) {
            add_access('scan_report',$scan_id,$access_id);
        }
        add_access('scan_report',$scan_id,$this->session->userdata('hospital_id'));
        return $scan_id;
    }

    function getLab() {
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();

        $this->db->order_by('id', 'desc');
        $query = $this->db->get('lab');
        return $query->result();
    }
    function getscan_report() {
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('scan_report');
        return $query->result();
    }
    function getappoitment($id=null) {
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');
        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        if(!is_null($id))
            $this->db->where('id', $id);
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getLabBySearch($search) {
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');
        $this->db->order_by('id', 'desc');
        $hospital_id = $this->session->userdata('hospital_id');
        $query = $this->db->select('*')->from('lab');
        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $this->db->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%'OR doctor_name LIKE '%" . $search . "%'OR date_string LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();

        return $query->result();
    }

    function getLabByLimit($limit, $start) {
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('lab');
        return $query->result();
    }
    function getScanByLimit($limit, $start) {
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('scan_report');
        return $query->result();
    }

    function getLabByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->select('*')->from('lab');
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $query = $this->db->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%'OR doctor_name LIKE '%" . $search . "%'OR date_string LIKE '%" . $search . "%')", NULL, FALSE)->get();

        return $query->result();
        
    }

    function getLabById($id) {
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $this->db->where('id', $id);
        $query = $this->db->get('lab');
        return $query->row();
    }
    function getscan_reportById($id) {
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $this->db->where('id', $id);
        $query = $this->db->get('scan_report');
        return $query->row();
    }

    function getLabByPatientId($id) {
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $this->db->order_by('id', 'desc');
        $this->db->where('patient', $id);
        $query = $this->db->get('lab');
        return $query->result();
    }

    function getLabByPatientIdByDate($id, $date_from, $date_to) {
        $this->db->order_by('id', 'desc');
        $this->db->where('patient', $id);
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get('lab');
        return $query->result();
    }

    function getLabByUserId($id) {
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $this->db->order_by('id', 'desc');
        $this->db->where('user', $id);
        $query = $this->db->get('lab');
        return $query->result();
    }

    function getOtLabByPatientId($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $this->db->where('patient', $id);
        $query = $this->db->get('ot_lab');
        return $query->result();
    }

    function getLabByPatientIdByStatus($id) {
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $this->db->where('patient', $id);
        $this->db->where('status', 'unpaid');
        $query = $this->db->get('lab');
        return $query->result();
    }

  
    function updateLab($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('lab', $data);
    }


    function insertLabCategory($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('lab_category', $data2);
    }

    function getLabCategory() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('lab_category');
        return $query->result();
    }

    function getLabCategoryById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('lab_category');
        return $query->row();
    }


    function updateLabCategory($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('lab_category', $data);
    }

    function deleteLab($id) {
        $this->db->where('id', $id);
        $this->db->delete('lab');
    }

    function delete_scan($id) {
        $this->db->where('id', $id);
        $this->db->delete('scan_report');
    }

    function deleteLabCategory($id) {
        $this->db->where('id', $id);
        $this->db->delete('lab_category');
    }

    function getLabByDoctor($doctor) {
        $this->db->select('*');
        $this->db->from('lab');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('doctor', $doctor);
        $query = $this->db->get();
        return $query->result();
    }

    function getLabByDate($date_from, $date_to) {
        $this->db->select('*');
        $this->db->from('lab');
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

    function getLabByDoctorDate($doctor, $date_from, $date_to) {
        $this->db->select('*');
        $this->db->from('lab');
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $this->db->where('doctor', $doctor);
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }

 
    function getLabByUserIdByDate($user, $date_from, $date_to) {
        $this->db->order_by('id', 'desc');
        $this->db->select('*');
        $this->db->from('lab');
        $hospital_id = $this->session->userdata('hospital_id');
        $hospital_id2 = 'hos_'.$this->session->userdata('hospital_id');

        $this->db->group_start();
        $this->db->where('find_in_set("'.$hospital_id.'", access)');
        $this->db->or_where('find_in_set("'.$hospital_id2.'", access)');
        $this->db->or_where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->group_end();
        $this->db->where('user', $user);
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $query = $this->db->get();
        return $query->result();
    }
    
     function insertTemplate($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('template', $data2);
    }

    function getTemplate() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('template');
        return $query->result();
    }
    
      function updateTemplate($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('template', $data);
    }
    
    function getTemplateById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('template');
        return $query->row();
    }
    
     function deletetemplate($id) {
        $this->db->where('id', $id);
        $this->db->delete('template');
    }

}
