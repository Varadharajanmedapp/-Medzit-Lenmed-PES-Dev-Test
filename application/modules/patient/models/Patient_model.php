<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function patient_history_log($data) {
        $this->db->insert('patient_history_log', $data);
        return true;
      }
    function insertPatient($data) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
            $data = array_merge($data, $data1);
        }
        $this->db->insert('patient', $data);
    }

    function getPatient() {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient');
        return $query->result();
    }
    function getPatientappoitment() {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->or_where('user_type','app_patient');
        $this->db->order_by('id', 'desc');
        // $this->db->group_by('id');
        $query = $this->db->get('appointment');
        return $query->result();
    }

    function getLimit() {
        $current = $this->db->get_where('patient', array('hospital_id' => $this->session->userdata('hospital_id')))->num_rows();
        $limit = $this->db->get_where('hospital', array('id' => $this->session->userdata('hospital_id')))->row()->p_limit;
        if (!is_numeric($limit)) {
            $limit = 0;
        }
        return $limit - $current;
    }

    function getPatientBySearch($search) {
        $this->db->order_by('id', 'desc');
        $this->db->select('*');
        $this->db->from('patient');
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%')", NULL, FALSE);
        $query = $this->db->get();
        return $query->result();
    }

    function getPatientByLimit($limit, $start) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('patient');
        return $query->result();
    }

    function getPatientByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('patient');
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->where("(id LIKE '%" . $search . "%' OR name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR address LIKE '%" . $search . "%')", NULL, FALSE);
        $query = $this->db->get();
        return $query->result();
    }

    function getPatientById($id) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->where('id', $id);
        $query = $this->db->get('patient');
        return $query->row();
    }
   

    function getPatientByIonUserId($id) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->where('ion_user_id', $id);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function getPatientByEmail($email) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->where('email', $email);
        $query = $this->db->get('patient');
        return $query->row();
    }

    function updatePatient($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('patient', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('patient');
    }

    function insertMedicalHistory($data) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
            $data = array_merge($data, $data1);
        }
        $this->db->insert('medical_history', $data);
    }

    function getMedicalHistoryByPatientId($id) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->where('patient_id', $id);
        $query = $this->db->get('medical_history');
        return $query->result();
    }

    function getMedicalHistory() {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('medical_history');
        return $query->result();
    }

    function getMedicalHistoryBySearch($search) {
        $this->db->order_by('id', 'desc');
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $query = $this->db->select('*')
                ->from('medical_history')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        } else {
            $query = $this->db->select('*')
                ->from('medical_history')
                ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        }
        return $query->result();
    }

    function getMedicalHistoryByLimit($limit, $start) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('medical_history');
        return $query->result();
    }

    function getMedicalHistoryByLimitBySearch($limit, $start, $search) {
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $query = $this->db->select('*')
                    ->from('medical_history')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
        } else {

            $query = $this->db->select('*')
                ->from('medical_history')
                ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR description LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        }
        return $query->result();
    }

    function getMedicalHistoryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('medical_history');
        return $query->row();
    }

    function updateMedicalHistory($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('medical_history', $data);
    }

    function insertDiagnosticReport($data) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
            $data = array_merge($data, $data1);
        }
        $this->db->insert('diagnostic_report', $data);
    }

    function updateDiagnosticReport($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('diagnostic_report', $data);
    }

    function getDiagnosticReport() {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('diagnostic_report');
        return $query->result();
    }

    function getDiagnosticReportById($id) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->where('id', $id);
        $query = $this->db->get('diagnostic_report');
        return $query->row();
    }

    function getDiagnosticReportByInvoiceId($id) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->where('invoice', $id);
        $query = $this->db->get('diagnostic_report');
        return $query->row();
    }

    function getDiagnosticReportByPatientId($id) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->where('patient', $id);
        $query = $this->db->get('diagnostic_report');
        return $query->result();
    }

    function insertPatientMaterial($data) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
            $data = array_merge($data, $data1);
        }
        $this->db->insert('patient_material', $data);
    }

    function getPatientMaterial() {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('patient_material');
        return $query->result();
    }

    function getDocumentBySearch($search) {       
        $this->db->order_by('id', 'desc');
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $query = $this->db->select('*')
                ->from('patient_material')
                ->where('hospital_id', $this->session->userdata('hospital_id'))
                ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%"    . $search . "%' OR title LIKE '%"    . $search . "%')", NULL, FALSE)
                ->get();
        }else{
            $query = $this->db->select('*')
                ->from('patient_material')
                ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%"    . $search . "%' OR title LIKE '%"    . $search . "%')", NULL, FALSE)
                ->get();
        }
        return $query->result();            
    }

    function getDocumentByLimit($limit, $start) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get('patient_material');
        return $query->result();
    }

    function getDocumentByLimitBySearch($limit, $start, $search) {               
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $query = $this->db->select('*')
                    ->from('patient_material')
                    ->where('hospital_id', $this->session->userdata('hospital_id'))
                    ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR title LIKE '%" . $search . "%' OR datestring LIKE '%" . $search . "%')", NULL, FALSE)
                    ->get();
        }else{
            $query = $this->db->select('*')
                ->from('patient_material')
                ->where("(id LIKE '%" . $search . "%' OR patient_name LIKE '%" . $search . "%' OR patient_phone LIKE '%" . $search . "%' OR patient_address LIKE '%" . $search . "%' OR title LIKE '%" . $search . "%' OR datestring LIKE '%" . $search . "%')", NULL, FALSE)
                ->get();
        }
        return $query->result();       
    }

    function getPatientMaterialById($id) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->where('id', $id);
        $query = $this->db->get('patient_material');
        return $query->row();
    }

    function getPatientMaterialByPatientId($id) {
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        }
        $this->db->where('patient', $id);
        $query = $this->db->get('patient_material');
        return $query->result();
    }

    function deletePatientMaterial($id) {
        $this->db->where('id', $id);
        $this->db->delete('patient_material');
    }

    function deleteMedicalHistory($id) {
        $this->db->where('id', $id);
        $this->db->delete('medical_history');
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

    function getDueBalanceByPatientId($patient) {
        $query = $this->db->get_where('payment', array('patient' => $patient))->result();
        $deposits = $this->db->get_where('patient_deposit', array('patient' => $patient))->result();
        $balance = array();
        $deposit_balance = array();
        foreach ($query as $gross) {
            $balance[] = $gross->gross_total;
        }
        $balance = array_sum($balance);


        foreach ($deposits as $deposit) {
            $deposit_balance[] = $deposit->deposited_amount;
        }
        $deposit_balance = array_sum($deposit_balance);



        $bill_balance = $balance;

        return $due_balance = $bill_balance - $deposit_balance;
    }

    function getPatientInfo($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            if (!$this->ion_auth->in_group(array('superadmin'))) {
                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            }
            $this->db->where("name like '%" . $searchTerm . "%' OR id like '%" . $searchTerm . "%'");
            $fetched_records = $this->db->get('patient');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            if (!$this->ion_auth->in_group(array('superadmin'))) {
                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            }
            $this->db->limit(10);
            $fetched_records = $this->db->get('patient');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name'] . ' (' . lang('id') . ': ' . $user['id'] . ')');
        }
        return $data;
    }

    function getPatientinfoWithAddNewOption($searchTerm) {
        if (!empty($searchTerm)) {
            $this->db->select('*');
            if (!$this->ion_auth->in_group(array('superadmin'))) {
                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            }
            $this->db->where("name like '%" . $searchTerm . "%' OR id like '%" . $searchTerm . "%'");
            $fetched_records = $this->db->get('patient');
            $users = $fetched_records->result_array();
        } else {
            $this->db->select('*');
            if (!$this->ion_auth->in_group(array('superadmin'))) {
                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
            }
            $this->db->limit(10);
            $fetched_records = $this->db->get('patient');
            $users = $fetched_records->result_array();
        }
        // Initialize Array with fetched data
        $data = array();
        $data[] = array("id" => 'add_new', "text" => lang('add_new'));
        foreach ($users as $user) {
            $data[] = array("id" => $user['id'], "text" => $user['name'] . ' (' . lang('id') . ': ' . $user['id'] . ')');
        }
        return $data;
    }
    public function vitalSigns($data)
    {
        $this->db->insert('vital_signs', $data);
    }
    public function getVitalSignsData($id)
    {
    $this->db->select('*');
    $this->db->where('patient_id',$id);
    return $this->db->get('vital_signs')->result();
    }

    public function get_departments() { 
    $this->db->select('id,name,amount');
    $this->db->from('department');
    $this->db->where('hospital_id',$this->session->userdata('hospital_id'));
    $query = $this->db->get()->result();
    return $query;
  }

  public function get_signature()
  {
    $this->db->select('h.id, h.user_sign');
    $this->db->from('hospital h');
    $this->db->join('medical_history m','h.id = m.hospital_id');
    return $this->db->get()->row();
  }

}
