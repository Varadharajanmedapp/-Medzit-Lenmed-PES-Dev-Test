<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Donor_model extends CI_model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertDonor($data) {
        $data1 = array('hospital_id' => $this->session->userdata('hospital_id'));
        $data2 = array_merge($data, $data1);
        $this->db->insert('donor', $data2);
    }

    function getDonor() {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('donor');
        return $query->result();
    }
    function updateBankB($blood_bag,$group)
    {
        $this->db->select('*');
        $this->db->where("group", $group);
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $status = $this->db->get('bankb')->row();
        $id= $status->id;
        if(!(empty($id)))
        {
            $count = explode(" ",$status->status);
            $total =(int)$count[0]+$blood_bag;
            $data['status']= $total.' Bags';
            $this->db->where('id',$id);
            $this->db->update('bankb',$data);
        }
        else{
            $data['group']=$group;
            $data['status']=$blood_bag;
            $this->db->insert('bankb',$data);
        }
    }
    function getDonorById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('donor');
        return $query->row();
    }

    function updateDonor($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('donor', $data);
    }

    function deleteDonor($id) {
        $this->db->where('id', $id);
        $this->db->delete('donor');
    }

    function getBloodBank() {
        $this->db->select("*");
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $query = $this->db->get('bankb');
        $this->db->distinct();
        return $query->result();
    }
    function getBloodGroup() {
        $this->db->select("*");
        $this->db->distinct();
        $query = $this->db->get('bankb');
        return $query->result();
    }
    function getBloodBankById($id) {
        $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
        $this->db->where('id', $id);
        $query = $this->db->get('bankb');
        return $query->row();
    }

    function updateBloodBank($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('bankb', $data);
    }

    function insertBloodBank($data) {
        $this->db->insert('bankb', $data);
    }

}
