<?php

class User_model extends CI_Model {
  public function __construct(){
    parent::__construct();
    $this->load->model('appointment/appointment_model');
  }

  public function check_mobile($mobile) {
    if($mobile != '') {
      $this->db->select('*');
      $this->db->from('patient');
      $this->db->where('phone', $mobile);
      $query = $this->db->get();
      return $query->row_array();
    }
    return array();
  }
  public function check_patient($patientId) {
    $this->db->select('*');
    $this->db->from('patient');
    $this->db->where('id', $patientId);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function get_patient($id) {
    if($id != '') {
      $this->db->select('*');
      $this->db->from('patient');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->row_array();
    }
    return array();
  }
  public function get_app_patient($id) {
    if($id != '') {
      $this->db->select('*');
      $this->db->from('patient');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->row_array();
    }
    return array();
  }

  /**
  *  Register user  for the user account of Med apps
  *
  */
  public function register() {   
    $patient_add['name'] = $this->input->post('name'); 
    $patient_add['phone'] = $this->input->post('mobile'); 
    $patient_add['password'] = hash('sha512', $this->input->post('password'));
    $patient_add['email'] = $this->input->post('email'); 
    $patient_add['hospital_id'] = 'app_patient';
    $patient_add['add_date'] = date('m/d/y');
    $patient_add['registration_time'] = time();
    $this->db->insert('patient', $patient_add);
    $patientid  = $this->db->insert_id();
    if($this->db->affected_rows() > 0){
      $patient_add['patient_id'] = $patientid;
      $sess_id = $this->input->get_request_header('Sess-Id');
      $data = array('status' => "true",'message' => 'Register Successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($patient_add))));
    } else {
      $data = array('status' => "false",'message' => 'Unable to add user. Please try again.','data' => (object)array());
    } 
    return $data;
  }
  /**
  * User login  for the user account of Med apps
  *
  */
  public function login() {
    $check_mobile = $this->check_mobile($this->input->post('mobile'));
    if(!empty($check_mobile) && $check_mobile['password'] == hash( 'sha512', $this->input->post('password') )) {
      $check_mobile['patient_id'] = $check_mobile['id'];
      if($check_mobile['how_added']=='new'){
        $check_mobile['password'] = 'new';
        $this->db->where('id',$check_mobile['id']);
        $this->db->set('how_added', "CMS");
        $this->db->update('patient');
      }else{
        $check_mobile['password']='';
      }
      $sess_id = $this->input->get_request_header('Sess-Id');
      $results = array('status' => "true",'message' => 'Login successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($check_mobile))));
      return $results;
    } else {
      $results = array('status' => "false" ,'message' => 'Invalid username/password.','data' => (object)array());
      return $results;
    }
  }
  /**
  * View on board  for the user of Med apps
  *
  */
  public function on_board_get() {
    $this->db->select('*');
    $this->db->from('on_board');
    $this->db->where('status','active');
    $query = $this->db->get();
    return $query->result();
  } 
  /**
  * View on board  for the user of Med apps
  *
  */
  public function terms_condition() {
    $this->db->select('*');
    $this->db->from('terms_conditions');
    $this->db->where('status','active');
    $query = $this->db->get();
    return $query->result();
  } 
  /**
  * Nearest hospital for the Med apps
  *
  */
  public function nearest_hospital($cus_loc) {
    $hospital = $this->getHospital();  
    foreach ($hospital as  $value) {
      $check_loc = $value['location'];
      if(!empty($check_loc)) {
        $location[] = $value['location'];   
        $id = $value['id'];    
      }
    }  
    $user_loc = explode(',', $cus_loc);
    $latitude1 = $user_loc[0]; 
    $longitude1 =$user_loc[1]; 
    $distance = $this->getNearestHospital($latitude1,$longitude1);
    return $distance;
  }
  public function get_hos_dept() {
    $this->db->select('name,hospital_id');
    $this->db->from('department');
    // $this->db->where('status','active');
    $query = $this->db->get();
    return $query->result();
  } 

  //Get Hospital details
  public function getHospital() {
    $this->db->where('active',1);
    $query = $this->db->get('hospital');
    return $query->result_array();
  }

  //Get Hospital details with location
  public function getHospitalLoc($loc) {
    $this->db->select('id,name,address,phone,location,img_url,gallery,video_url,description,is_online');
    $this->db->where('location',$loc);
    $this->db->where('active',1);
    $query = $this->db->get('hospital');
    return $query->row_array();
  }
  public function get_fre_hospital() {
     $this->db->select('id,name,,address,phone,location,img_url,gallery,video_url,is_online');
     $this->db->where('active',1);
    $query = $this->db->get('hospital');
    return $query->result_array();
  }


  public function check_hos_id($hos_id) {
    // var_dump($hos_id);die;
    foreach ($hos_id as $sam => $value) {
      $this->db->select('id,name');
      $this->db->from('hospital');
      $this->db->where('id', $value);
      // $this->db->where('active',1);
      $this->db->or_where('id', $value);
      $query[] = $this->db->get()->result();
    }
    return $query;
  }

 //Get doctors details for selected hospitals
  // public function doctors_list($spc) {
  //   var_dump($spc);die;
  //   $this->db->select('d.name as doctor_name,d.img_url as doctor doctor_image,d.address as doctor_address,d.department as doctor_specialist,h.name as hospital_name,h.address as hospital_address h.img_url as hospital_image'); 
  //   $this->db->where('d.department',$spc);
  //   $this->db->from('doctor d');
  //   $this->db->join('hospital h','d.hospital_id = h.id');
  //   $query = $this->db->get();
  //   return $query->result();

  //     $this->db->select('*');
  //   $this->db->where('audit_id', $auditId);
  //   $this->db->from('audit_data');
  //   $this->db->join('controls', 'controls.id = audit_data.control_id');
  //   $query = $this->db->get();
  //   return $query->result();
  // }
  // public function getDoctor() {
  //   $query = $this->db->get('doctor');
  //   return $query->result_array();
  // }
    public function getDoctor($id=null) {
    if(!is_null($id)) {
    $this->db->select('id as doctor_id,name as doctor_name,address,department as specialist,phone,location,img_url,fees,schedule_time,cover_image,description as doctor_description,gallery,video_url,is_online,token as notification_token');
      // $this->db->select('id as doctor_id,name as doctor_name,gallery,video_url');
    // $this->db->select('id as doctor_id,name as doctor_name,address,department as specialist,phone,location,img_url,fees,schedule_time,cover_image,description as doctor_description,gallery,video_url');
    $this->db->from('doctor');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->row_array();
    }
    else {
    $this->db->select('*');
    $this->db->from('doctor');
      $query = $this->db->get();
      return $query->result_array();
    }
  }

  //Get Doctor details with location and Speciality
  public function getDoctorLoc($spc,$loc) {
    $this->db->select('id,name,address,phone,location,img_url,hospital_id,department');
    $this->db->from('doctor');
    if ($spc == 'All Specialities') {
    $this->db->where('location',$loc);
    $query = $this->db->get();
    return $query->row();
    }
    $this->db->where('location',$loc);
    $this->db->where('specialist',$spc);
    $query = $this->db->get();
    return $query->row();
  }
    //Get Hospital details Base up on  Hospital ID
  public function get_hospital_details($hospital) {
    // $this->db->select('id as hospital_id,gallery,video_url');
    $this->db->select('id as hospital_id,name as hospital_name,address,description,phone,location,img_url,gallery,video_url,is_online');
    $this->db->where('id',$hospital);
    // $this->db->where('active',1);
    $query = $this->db->get('hospital');
    return $query->row_array();
  }

  //Get Hospital details Base up on  Hospital ID
  public function nearest_doctors($spec,$cus_loc) {
    $hospital = $this->getDoctor();

// var_dump($hospital);die;
    foreach ($hospital as  $value) {
      $check_loc = $value['location'];
      if(!empty($check_loc)) {
        $location[] = $value['location'];
        $id = $value['id'];    
      }
    }  
    $user_loc = explode(',', $cus_loc);
    $latitude1 = $user_loc[0]; 
    $longitude1 =$user_loc[1]; 
    $doctors = $this->get_nearest_doctor($latitude1,$longitude1);
      $result = array();
    foreach ($doctors as $doctor) {
      if(!empty($doctor) && ($spec=='All Specialities' || $doctor['specialist']==$spec)){
        $result[] =(object)$doctor;
      }
    }
     // var_dump($result);die;
    return $result;
  }

  /*
  *patient appointment details
  *
  */
  public function appointment($data,$attach) {
    $new_data = $this->db->insert('appointment', $data);
    $data['appointment_id'] = $this->db->insert_id();

    $this->db->reset_query();
    /*$attach['appointment_id'] = $data['appointment_id'];
    $attach['patient'] = $data['patient'];
    $attach['doctor'] = $data['doctor'];
    $attach['patientname'] = $data['patientname'];
    $attach['doctorname'] = $data['doctorname'];
    $attach['hospital_id'] = $data['hospital_id'];
    $attach['date'] = $data['date'];
    $new_data   = $this->db->insert('prescription', $attach);*/
    add_access('patient',$attach['patient'],$attach['doctor']);
    add_access('patient',$attach['patient'],$attach['hospital_id']);
    $log_data["appointment_id"] = $attach['appointment_id'];
    $log_data["hospital_id"] = $attach['hospital_id'];
    $log_data["doctor_id"] = $attach['doctor'];
    $log_data["patient_id"] = $attach['patient'];
    $log_data["status"] = $data['status'];
    $this->patient_history_log($log_data);
    $this->db->reset_query();
    $this->db->where('id',$data['patient']);
    $this->db->set('hospital_id', $data['hospital_id']);
    //sms 2
    if($data['hospital_id']=='app_doctor')
    {
      $this->db->where('id', $log_data["doctor_id"]);
      $this->db->form('doctor');
      $doctor = $this->db->get()->row();
      $data['doctor_phone'] = $doctor->phone;
      $data = ['phone' => $data['doctor_phone'], 'text' => "New Appointment ID ".$log_data["patient_id"]." has been assigned to you. Please login to your CMS to know the patient details and confirm your available slot."];
      $this->appointment_model->sendSMS($data);
    }
    $this->db->update('patient');

    return $data;

  }
  public function scan_appointment($data) {
    $new_data   = $this->db->insert('appointment', $data);
    $data['appointment_id'] = $this->db->insert_id();
    // $attach['appointment_id'] = $data['appointment_id'];
    // $attach['patient'] = $data['patient'];
    // $attach['hospital_id'] = $data['hospital_id'];
    // $attach['patient_description'] = $data['patient_query'];
    // $attach['attachment_image'] = $data['attachment_image'];
    // $attach['date'] = $data['date'];
    // $new_data   = $this->db->insert('prescription', $attach);
    $patientid = $data['patient'];
    $this->db->where('id',$patientid);
    $this->db->from('patient');
    $patient_exits = $this->db->get()->row();
    $this->db->reset_query();
    $this->db->where('id',$patientid);
    $query = $this->db->from('patient')->get()->row_array();
    $log_data["appointment_id"] = $data['appointment_id'];
    $log_data["hospital_id"] = $data['hospital_id'];
    $log_data["patient_id"] = $data['patient_id'];
    
    $log_data["status"] = $data['status'];
    $this->patient_history_log($log_data);
    $notifi_data['text'] = "New appointment was added for this hospital";
    $notifi_data['subject'] = "New OPD";
    $notifi_data['url'] = base_url().'appointment';
    $notifi_data['status'] = 0;
    $notifi_data['access'] = 'hos_'.$data['hospital_id'];
    //sms 
    $date = $data['add_date'];
    $doctor_no = $data['doctor'];
    $this->db->where('id',$doctor_no);
    $this->db->from('doctor');
    $doctor = $this->db->get()->row();
    $data['doctor_phone']=$doctor['phone'];
    $patient_name = $data['patient_name'];
    $data = ['phone' => $data['doctor_phone'], 'text' => "Patient ".$patient_name." scheduled a new appointment on ".$date." Please check your scheduled appointments on your SOP application."];
    $this->appointment_model->sendSMS($data);
    add_notification($notifi_data);
    add_access('appointment',$data['appointment_id'],$data['hospital_id']);
    add_access('patient',$data['patient'],$data['doctor']);
    add_access('patient',$data['patient'],$data['hospital_id']);
    if ($patient_exits) {
      $this->db->reset_query();
      $this->db->where('id',$patientid);
      $this->db->set('hospital_id', $data['hospital_id']);
      $this->db->update('patient');

      return $data;
    }else{
      $patient['patient_id'] = $query['id'];
      $patient['img_url'] = $query['img_url'];
      $patient['name'] = $query['name'];
      $patient['email'] = $query['email'];
      $patient['address'] = $query['address'];
      $patient['phone'] = $query['phone'];
      $patient['birthdate'] = $query['birthdate'];
      $patient['age'] = $query['age'];
      $patient['bloodgroup'] = $query['bloodgroup'];
      $patient['hospital_id'] = $data['hospital_id'];
      $this->db->insert('patient', $patient);
      return $data;
    }
  }
  public function get_department() {
    $this->db->select('department');
    $this->db->from('doctor');
    $this->db->group_by('department');
    $query = $this->db->get();
    return $query->result_array();
  } 

  public function get_specialist() {
    $this->db->select('title,image,status');
    $this->db->where('hospital_id',0);
    $this->db->where('status','Active');
    $this->db->from('specialist');
    $this->db->group_by('title');
    $query = $this->db->get();
    return $query->result_array();
  } 
  // // get scan types
  // public function get_scantypes($hospital_id,$scan_types=null) {
  //   if ($scan_types) {
  //     $this->db->select('*');
  //     $this->db->where('hospital_id',$hospital_id);
  //     $this->db->where('category',$scan_types);
  //     $this->db->from('scan_types');
  //     $this->db->group_by('category');
  //     $query = $this->db->get();
  //     return $query->result_array();
  //   }
  //   else{
  //     $this->db->select('*');
  //     $this->db->where('hospital_id',$hospital_id);
  //     $this->db->from('scan_types');
  //     $this->db->group_by('category');
  //     $query = $this->db->get();
  //     return $query->result_array();
  //   }
  // } 

  public function appointment_details($id,$date=null) {
    $status = $this->input->post('status');
    $this->db->select('id as appointment_id,patientname,doctor as doctor_id,doctorname,hospital_id,attachment_image,date,unique_id,status,consult_type,type,user_type,channel_name,amount,time_slot,department,procedure_fee,consult_fee,payment_type,payment_date,transcation_id,patient as patient_id,remarks,time_slot as time,amount as total,consult_type as procedure_name');
    $this->db->where('patient',$id);
    if (!empty($date)){
      $this->db->where('date',$date);
    }
    if (!empty($status)){
      $this->db->where('status',$status);
    }
    $this->db->order_by('id', 'DESC');
    $query = $this->db->get('appointment');
    return $query->result();
  }
/*Get the Doctor's prescription of given patient id*/
  public function getReport($patientId,$appointId) {
    $this->db->select('id as report_id,doctor as doctor_id,patient as patient_id,appointment_id,report_img,description,date as created_at');
    $this->db->from('prescription');
    $this->db->where('patient',$patientId);
    $this->db->where('appointment_id',$appointId);
    $query = $this->db->get();
    return $query->result();
  }
  /*Get the Doctor's report of given patient id*/
  public function get_scan_report($patient_id) {
    $appointment_id = $this->input->post('appointment_id');
    $this->db->select('*');
    $this->db->from('scan_report');
    $this->db->where('patient',$patient_id);
    $this->db->where('appoitment_id',$appointment_id);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_appointment_check($patient_id,$appointment_id) {
    $this->db->select('*');
    $this->db->from('appointment');
    $this->db->where('patient', $patient_id);
    $this->db->where('id', $appointment_id);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function transcation_details($data) {
    $this->db->where('id', $data['appointment_id']);
    $this->db->set('transcation_id', $data['transcation_id']);
    $this->db->set('amount', $data['amount']);
    $this->db->set('payment_type', $data['payment_type']);
    $this->db->set('payment_date', $data['payment_date']);
    $this->db->set('status', $data['status']);
    $this->db->update('appointment');
    $this->db->select('id as appointment_id,doctor as doctor_id,status as appointment_status');
    $this->db->where('id',$data['appointment_id']);
    $query = $this->db->get('appointment');
    return $query->row();
    // return true;
  }
  public function update_payment($data) {
    $this->db->insert('payment', $data);
    return true;
  }
  public function patient_history_log($data) {
    $this->db->insert('patient_history_log', $data);
    return true;
  }
  public function get_history_log($id) {
    $this->db->select('status,time_stamp');
    $this->db->from('patient_history_log');
    $this->db->where('appointment_id', $id);
    return $this->db->get()->result();
  }
  public function get_bed_allotment($id,$hospital_id) {
    $this->db->where('patient', $id);
    $this->db->where('hospital_id', $hospital_id);
    $query = $this->db->get('alloted_bed');
    return $query->result();
  }
  public function cart_status_delete($data) {
    $this->db->where('id', $data['appointment_id']);
    $this->db->set('status', $data['status']);
    $this->db->update('appointment');
    $this->db->select('id as appointment_id,status as appointment_status');
    $this->db->where('id',$data['appointment_id']);
    $query = $this->db->get('appointment');
    return $query->row();
  }
  public function user_forgot_pass($id,$mobile,$password) {
    $this->db->reset_query();
    $this->db->where('id', $id);
    $this->db->set('password', $password);
    $this->db->update('patient');
    $this->db->select('id,phone');
    $this->db->where('phone',$mobile);
    $query = $this->db->get('patient');
    return $query->row();
  }
  public function getDoctor_fees($id) {
    $this->db->select('id as doctor_id,fees,img_url,specialist,address,department,token'); 
    $this->db->from('doctor');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->row_array();
    }
  /*get the over all details of patient */
  public function getPatient_detials($id){
    $this->db->select('id,img_url,name,email,hospital_id');
    $this->db->from('patient');
    $this->db->where('id', $id);
    $patient_info = $this->db->get()->row_array();
    $this->db->reset_query();

    $this->db->select('id,patient,doctor,date,status,patientname,doctorname,hospital_id,type');
    $this->db->from('appointment');
    $this->db->where('patient', $id);
    $Appointment = $this->db->get()->result();
    foreach ($Appointment as &$appoitment) {
      $appoitment->date = date("m/d/Y", $appoitment->date);
    }

    $this->db->reset_query();

    $this->db->select('id,date,patient,doctor,appointment_id,description,report_img,patientname,doctorname,hospital_id');
    $this->db->from('prescription');
    $this->db->where('patient', $id);
    $Prescription = $this->db->get()->result();
    foreach ($Prescription as &$prescription ) {
      $prescription->date = date("m/d/Y", $prescription->date);
    }
    $this->db->reset_query();

    $this->db->select('id,category,patient,doctor,date,report,patient_name,patient_phone,patient_address,doctor_name, report_link,report_image, report_pdf,hospital_id');
    $this->db->from('scan_report');
    $this->db->where('patient', $id);
    $scanReport = $this->db->get()->result();


    foreach ($scanReport as &$doctor ) {
      $doctor->date = date("m/d/Y", $doctor->date);
    }
    $this->db->reset_query();
    
    $details = array('Patient_info'=>$patient_info,'Appointment' =>$Appointment ,'Prescription'=> $Prescription,'ScanReport'=>$scanReport);

    return $details;
  }

  /*****************************************************************
  ********************* Edit Account *****************************
  ******************************************************************/
  public function edit_account() {
    $results  = array();
    $user_info = array();
    $img_url = array();

    $id       = $this->input->post('patient_id');
    $img_url  = $this->input->post('img_url');
    $gender   = $this->input->post('gender');

    $gender=$this->input->post('gender');
    $user_info['name'] = $this->input->post('user_name');
    $user_info['address'] = $this->input->post('address');
    $user_info['age'] = $this->input->post('age');
    $user_info['bloodgroup'] = $this->input->post('blood_group');
    $user_info['sex'] = $gender;
    if($img_url != "") {
      define("USER_PROFILE_DIRECTORY",ASSETS_DIRECTORY. DIRECTORY_SEPARATOR .'images/userprofile/');
      if (!file_exists(USER_PROFILE_DIRECTORY)) {
        mkdir(USER_PROFILE_DIRECTORY, 0777, true);
      }
      $image    = base64_decode($img_url);
      $filename = date('YmdHis').'.'.'jpg';
      $srcfile  = USER_PROFILE_DIRECTORY.$filename;
      file_put_contents($srcfile, $image);
      $user_info['img_url'] = base_url()."assets/images/userprofile/".$filename;
    }
     $date = $this->input->post('dob');
     $user_info['birthdate'] = strtotime($date);
    $this->db->where('id', $id);
    $update = $this->db->update('patient', $user_info);

    return $user_info;
  }
  
  public function hospital_department($hos_id) { 
    $this->db->select('id,name,amount');
    $this->db->from('department');
    $this->db->where('hospital_id', $hos_id);
    $query = $this->db->get()->result();
    return $query;
  }
  public function view_patient($patient_id) {
    $this->db->select('id,name as user_name,img_url as profile_image,email,phone as mobile,birthdate,age,sex as gender,bloodgroup,address,');
    $this->db->from('patient');
    $this->db->where('id', $patient_id);
    $query = $this->db->get();
    return $query->row_array();
  }
  // get scan types
  public function get_scantypes() {
    $hospital_id = $this->input->post('hospital_id');
    $department  = $this->input->post('department');
    $this->db->select('id,scan_type as name,amount');
    $this->db->where('hospital_id',$hospital_id);
    $this->db->where('category',$department);
    $this->db->from('scan_types');
    $query = $this->db->get();
    return $query->result();
  } 
//particular department of hospital
  // public function hospital_depart($hos_id) { 
  //   $this->db->select('category');
  //   $this->db->from('department');
  //   $this->db->where('hospital_id', $hos_id);
  //   $this->db->group_by('category');
  //   return $query = $this->db->get()->result();
  // }    

  public function hospital_depart($hos_id) {
    $this->db->select('name as category');
    $this->db->from('department');
    $this->db->where('hospital_id',$hos_id);
    $query = $this->db->get();
    return $query->result();
  }
  public function covid_vaccine_insert($data) {
    $this->db->reset_query();
    $new_data   = $this->db->insert('covid_vaccine', $data);
    $insert_id = $this->db->insert_id();
    $this->db->from('covid_vaccine');
    $this->db->where('id', $insert_id);
    return $query = $this->db->get()->row();
  }

  /*Get the Doctor's report of given patient id*/
  public function get_covid_user($patient_id) {
    $this->db->select('*');
    $this->db->from('covid_vaccine');
    $this->db->where('status != ','delete');
    $this->db->where('user_id',$patient_id);
    $query = $this->db->get();
    return $query->result();
  }
  /*Delete the Doctor's report of given patient id*/
  public function delete_covid_vaccine($data) {
    $this->db->where('id', $data['id']);
    $this->db->set('status', $data['status']);
    $this->db->update('covid_vaccine');
    $this->db->select('id as covid_vaccine_id,status');
    $this->db->where('id',$data['id']);
    $query = $this->db->get('covid_vaccine');
    return $query->row();
  }
  public function get_covid_id($id) {
    $this->db->select('*');
    $this->db->from('covid_vaccine');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row_array();
  }

  public function get_wishlist($id) {
    $this->db->select('*');
    $this->db->from('wishlist');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row_array();
  }

 public function wishlist_insert($data) {
    $this->db->reset_query();
    $new_data   = $this->db->insert('wishlist', $data);
    $insert_id = $this->db->insert_id();
    $this->db->from('wishlist');
    $this->db->where('id', $insert_id);
    return $query = $this->db->get()->row();
  }

  /*Delete the User Wishlist of given patient id*/
  public function delete_wishlist($data) {
    $itm = [
            'status' => $data['status'],
        ];
    $this->db->where('id', $data['wishlist_id']);
    //$this->db->set('status', $data['status']);

    $this->db->update('wishlist',$itm);
    $this->db->select('id as wishlist_id,status');
    $this->db->where('id',$data['wishlist_id']);
    $query = $this->db->get('wishlist');
    return $query->row();
  }

  /*Get the User's wishlist of given patient id*/
  public function get_wishlist_user($patient_id) {
    $this->db->select('*');
    $this->db->from('wishlist');
    $this->db->where('status','added');
    $this->db->where('user_id',$patient_id);
    $query = $this->db->get();
    return $query->result();
  }

  public function getNearestHospital($latitude1, $longitude1) {
    // var_dump($latitude1);
    // var_dump($longitude1);die
    $DISTANCE_KILOMETERS = $this->input->get('distance');
    if($DISTANCE_KILOMETERS==0 || empty($DISTANCE_KILOMETERS))
      $DISTANCE_KILOMETERS = 20000;

    //  $query = $this->db->query("SELECT id,name,address,phone,category,location,img_url,gallery,video_url,description,is_online FROM (
    //  SELECT *, 
    //     ( ( ( acos( sin(( $latitude1 * pi() / 180)) * sin(( `latitude` * pi() / 180)) + cos(( $latitude1 * pi() /180 ))*
    //             cos(( `latitude` * pi() / 180)) * cos((( $longitude1 - `longitude`) * pi()/180)))) * 180/pi()) * 
    //             60 * 1.1515 * 1.609344)
    //  as distance FROM `hospital`
    // ) hospital
    // WHERE distance <= $DISTANCE_KILOMETERS
    // LIMIT 15");
    $query=$this->db->query("SELECT id,name,address,phone,category,location,img_url,gallery,video_url,description,is_online FROM ( SELECT *, ( ( ( acos( sin(( $latitude1 * pi() / 180)) * sin(( `latitude` * pi() / 180)) + cos(( $latitude1 * pi() /180 )) * cos(( `latitude` * pi() / 180)) * cos((( $longitude1 - `longitude`) * pi()/180))) ) * 180/pi() ) * 60 * 1.1515 * 1.609344 ) as distance FROM hospital ) hospital WHERE distance <= $DISTANCE_KILOMETERS LIMIT 50");
    $result = $query->result_array();
    return $result;
  }
  public function get_nearest_doctor($latitude1, $longitude1) {
    
    $DISTANCE_KILOMETERS = 36000;

     $query = $this->db->query("SELECT id,name,address,phone,location,img_url,department,hospital_id,specialist,token as notification_token FROM (
     SELECT *, 
        ( ( ( acos( sin(( $latitude1 * pi() / 180)) * sin(( `latitude` * pi() / 180)) + cos(( $latitude1 * pi() /180 ))*
                cos(( `latitude` * pi() / 180)) * cos((( $longitude1 - `longitude`) * pi()/180)))) * 180/pi()) * 
                60 * 1.1515 * 1.609344)
     as distance FROM `doctor`
    ) doctor
    WHERE distance <= $DISTANCE_KILOMETERS
    LIMIT 50;");
    $result = $query->result_array();
    return $result;
  }

  /*Get the User's wishlist of given patient id*/
  public function check_wishlist_user($data) {
    $this->db->select('*');
    $this->db->from('wishlist');
    $this->db->where('doctor_id',$data['doctor_id']);
    $this->db->where('user_id',$data['user_id']);
    $this->db->where('status',$data['status']);
    $query = $this->db->get();
    return $query->result();
  }
  /*Get the User's wishlist of given patient id*/
  public function check_wishlist_hos($data) {
    $this->db->select('*');
    $this->db->from('wishlist');
    $this->db->where('hospital_id',$data['hospital_id']);
    $this->db->where('user_id',$data['user_id']);
    $this->db->where('status',$data['status']);
    $query = $this->db->get();
    return $query->result();
  }

  /* Update notification token for app_patient table*/
  public function user_notification_token($data) {
    $this->db->where('id', $data['id']);
    $this->db->set('token', $data['token']);
    $this->db->update('patient');
    $this->db->select('id as patient_id,name,email,phone,token');
    $this->db->where('id',$data['id']);
    $query = $this->db->get('patient');
    return $query->row();
  }

  public function patient_summary($data) {
    $this->db->reset_query();
    $new_data   = $this->db->insert('patient_summary', $data);
    // var_dump($new_data);die;
    $insert_id = $this->db->insert_id();
    $this->db->from('patient_summary');
    $this->db->where('id', $insert_id);
    return $query = $this->db->get()->row();
  }

  public function edit_patient_summary() {
    $results  = array();
    $user_info = array();
    $img_url = array();

    $data['id']    = $this->input->post('summary_id');
    $data['patient_id']    = $this->input->post('patient_id');
    $data['summary']        = $this->input->post('summary');
    $data['attachment']        = $this->input->post('attachment');

    if($data['attachment'] != "") {
      define("PATIENT_SUMMARY_DIRECTORY",ASSETS_DIRECTORY. DIRECTORY_SEPARATOR .'images/patient_summary/');
      if (!file_exists(PATIENT_SUMMARY_DIRECTORY)) {
        mkdir(PATIENT_SUMMARY_DIRECTORY, 0777, true);
      }
      $image    = base64_decode($data['attachment']);
      $filename = date('YmdHis').'.'.'jpg';
      $srcfile  = PATIENT_SUMMARY_DIRECTORY.$filename;
      file_put_contents($srcfile, $image);
      $data['attachment'] = $filename;
    }
    $this->db->where('id', $data['id']);
    $update = $this->db->update('patient_summary', $data);

    $this->db->reset_query();
     $this->db->from('patient_summary');
    $this->db->where('id', $data['id']);
    return $query = $this->db->get()->row();
  }

   public function get_patient_summary($id) {

      $this->db->select('*');
      $this->db->from('patient_summary');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->row_array();
  } 
  function getMedicineById($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('medicine');
    return $query->row();
  }

  public function get_prescription_phr($data) {
    $this->db->select('a.id as prescription_id,a.date, a.doctor as doctor_id, a.appointment_id, a.description, a.note,a.advice,a.medicine,a.symptom,a.report_img, a.hospital_id, b.name as doctor_name,img_url as doctor_image,address as doctor_address,phone as doctor_mobile,attachment_image as attachment,department,specialist,fees,cover_image'); 
    $this->db->from('prescription a');
    if(!empty($data['patient_id']))
      $this->db->where('a.patient', $data['patient_id']);
    if(!empty($data['appointment_id']))
      $this->db->where('a.appointment_id', $data['appointment_id']);
    $this->db->join('doctor b', 'a.doctor = b.id');
    $this->db->order_by("a.id", "desc"); 
    $query = $this->db->get();
    return $query->result();
  } 
  public function get_patient_summary_phr($data) {
    $this->db->select('*');
    $this->db->from('patient_summary');
    $this->db->where('patient_id', $data['patient_id']);
    $query = $this->db->get();
    return $query->result();
  } 

    public function get_diagnostics_phr($data) {
    $this->db->select('s.appoitment_id,s.doctor as doctor_id,s.date,s.patient as  patient_id ,s.report_link as dicom_link,s.hospital_id,d.name as doctor_name,d.img_url as doctor_image,d.address as doctor_address,d.phone as doctor_mobile,d.department,d.specialist,d.fees,d.cover_image,h.name as hospital_name,h.address as hospital_address,h.phone as hospital_phone,h.img_url as hospital_image,h.description as hospital_description,h.is_online,h.active');
    $this->db->from('scan_report s');
    $this->db->where('s.patient', $data['patient_id']);
    $this->db->join('doctor d', 's.doctor = d.id'); 
    $this->db->join('hospital h', 's.hospital_id = h.id'); 
    $this->db->order_by("s.id", "desc"); 
    $query = $this->db->get();
    return $query->result();
  } 
  public function get_clinical_images_phr($data) {
    $this->db->select('s.appoitment_id,s.doctor as doctor_id,s.date,s.patient as  patient_id ,s.report_image as clinical_images,s.hospital_id,d.name as doctor_name,d.img_url as doctor_image,d.address as doctor_address,d.phone as doctor_mobile,d.department,d.specialist,d.fees,d.cover_image,h.name as hospital_name,h.address as hospital_address,h.phone as hospital_phone,h.img_url as hospital_image,h.description as hospital_description,h.is_online,h.active');
    $this->db->from('scan_report s');
    $this->db->where('s.patient', $data['patient_id']);
    $this->db->join('doctor d', 's.doctor = d.id'); 
    $this->db->join('hospital h', 's.hospital_id = h.id'); 
    $this->db->order_by("s.id", "desc"); 
    $query = $this->db->get();
    return $query->result();
  } 
  public function get_specialist_opinion_phr($data) {
    $this->db->select('s.appoitment_id,s.doctor as doctor_id,s.date,s.patient as  patient_id ,s.report  as specialist_opinion,s.hospital_id,d.name as doctor_name,d.img_url as doctor_image,d.address as doctor_address,d.phone as doctor_mobile,d.department,d.specialist,d.fees,d.cover_image,h.name as hospital_name,h.address as hospital_address,h.phone as hospital_phone,h.img_url as hospital_image,h.description as hospital_description,h.is_online,h.active');
    $this->db->from('scan_report s');
    $this->db->where('s.patient', $data['patient_id']);
    $this->db->join('doctor d', 's.doctor = d.id'); 
    $this->db->join('hospital h', 's.hospital_id = h.id'); 
    $this->db->order_by("s.id", "desc"); 
    $query = $this->db->get();
    return $query->result();
  }
   public function get_lab_reports_phr($data) {
    $this->db->select('s.appointment,s.doctor as doctor_id,s.date,s.patient as  patient_id ,s.report_pdf  as lab_report,s.hospital_id,d.name as doctor_name,d.img_url as doctor_image,d.address as doctor_address,d.phone as doctor_mobile,d.department,d.specialist,d.fees,d.cover_image,h.name as hospital_name,h.address as hospital_address,h.phone as hospital_phone,h.img_url as hospital_image,h.description as hospital_description,h.is_online,h.active');
    $this->db->from('lab s');
    $this->db->where('s.patient', $data['patient_id']);
    $this->db->join('doctor d', 's.doctor = d.id'); 
    $this->db->join('hospital h', 's.hospital_id = h.id'); 
    $this->db->order_by("s.id", "desc"); 
    $query = $this->db->get();
    return $query->result();
  } 

  public function get_scan_report_phr($data){
    $this->db->select('s.appoitment_id,s.doctor as doctor_id,s.date,s.patient as  patient_id ,s.report_pdf  as lab_report,s.hospital_id,d.name as doctor_name,d.img_url as doctor_image,d.address as doctor_address,d.phone as doctor_mobile,d.department,d.specialist,d.fees,d.cover_image,h.name as hospital_name,h.address as hospital_address,h.phone as hospital_phone,h.img_url as hospital_image,h.description as hospital_description,h.is_online,h.active');
    $this->db->from('scan_report s');
    $this->db->where('s.patient', $data['patient_id']);
    $this->db->where('s.category !=','Lab Report');
    $this->db->join('doctor d', 's.doctor = d.id'); 
    $this->db->join('hospital h', 's.hospital_id = h.id'); 
    $this->db->order_by("s.id", "desc"); 
    $query = $this->db->get();
    return $query->result();
  }

 public function get_app_doctor_remark_phr($data) {
    $this->db->select('a.id as appoitment_id,a.remarks,a.doctor as doctor_id,patient as patient_id,a.date,a.hospital_id,a.amount,a.type,a.department,d.name as doctor_name,d.img_url as doctor_image,d.address as doctor_address,d.phone as doctor_mobile,d.department,d.specialist,d.fees,d.cover_image');
    $this->db->from('appointment a');
    $this->db->where('a.patient', $data['patient_id']);
    $this->db->where('a.hospital_id', 'app_doctor');
    $this->db->join('doctor d', 'a.doctor = d.id'); 
    $this->db->order_by("a.id", "desc"); 

    $query = $this->db->get();
    return $query->result();
  } 

  public function get_appointment($data) {
    $this->db->select('*');
    $this->db->from('appointment');
    $this->db->where('patient', $data['patient_id']);
    $query = $this->db->get();
    return $query->result();
  } 
  public function get_remarks_phr($data) {

    $this->db->select('a.id as appoitment_id,a.remarks,a.doctor as doctor_id,patient as patient_id,a.date,a.hospital_id,a.amount,a.type,a.department,d.name as doctor_name,d.img_url as doctor_image,d.address as doctor_address,d.phone as doctor_mobile,d.department,d.specialist,d.fees,d.cover_image,h.name as hospital_name,h.address as hospital_address,h.phone as hospital_mobile,h.img_url as hospital_image,h.description as hospital_description,h.is_online as hospital_is_online');
    $this->db->from('appointment a');
    $this->db->where('a.patient', $data['patient_id']);
    $this->db->join('doctor d', 'a.doctor = d.id'); 
    $this->db->join('hospital h', 'a.hospital_id = h.id'); 
    $this->db->order_by("a.id", "desc"); 
    $query = $this->db->get();
    return $query->result();
  } 

  public function banners_get($category) {
    $this->db->select('*');
    $this->db->from('banners');
    $this->db->where('category',$category);
    $this->db->where('status','active');
    $query = $this->db->get();
    return $query->result_array();
  } 
  /**
  * check user plan details from database
  *
  *
  * @return object user plan details
  **/
  public function get_plan_details($id) {
    $this->db->select('plan,plan_amount,plan_expiry');
    $this->db->from('patient');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->row_array();
  }

  /*
  *update the plan on app_user table from the database
  *
  */
  public function update_plan($plan) {
    $this->db->where('id',$plan['user_id']);
    $this->db->set('plan', $plan['plan']);   
    $this->db->set('plan_amount', $plan['plan_amount']);   
    $this->db->set('plan_expiry', $plan['plan_expiry']);   
    $this->db->update('patient');
    $this->db->select('id,plan,plan_amount,plan_expiry');
    $this->db->where('id',$plan['user_id']);
    $query = $this->db->get('patient');
    return $query->row();
  } 
}