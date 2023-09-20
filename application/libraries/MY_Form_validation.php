<?php 

class MY_Form_validation extends CI_Form_validation {
    public function __construct()
    {
        parent::__construct();
    }

 
    function unique($value, $params) {
 
        $CI =& get_instance();
        $database = $CI->load->database('default', TRUE);
        
        list($table, $field) = explode(".", $params, 2);
 
        $query = $database->select($field)->from($table)
            ->where($field, $value)->limit(1)->get();
        if ($query->row()) {
            return false;
        } else {
            return true;
        }
    }
    function edit_unique($value, $params) {
 
        $CI =& get_instance();
        $database = $CI->load->database('default', TRUE);
        
        list($table, $field) = explode(".", $params, 2);
        $query = $database->select($field)->from($table)
            ->where($field, $value)->where('id !=', $_POST['id'])->get();
        if ($query->row()) {
            return false;
        } else {
            return true;
        }
    }
}