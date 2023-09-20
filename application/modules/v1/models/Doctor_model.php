<?php

class Doctor_model extends CI_Model {
  public function __construct(){
    parent::__construct();
    $this->load->model('user_model');
  }
  public function check_mobile($mobile) {
    if($mobile != '') {
      $this->db->select('*');
      $this->db->from('doctor');
      $this->db->where('phone', $mobile);
      $query = $this->db->get();
      return $query->row_array();
    }
    return array();
  }
  public function get_doctor($id) {
    if($id != '') {
      $this->db->select('*');
      $this->db->from('doctor');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->row_array();
    }
    return array();
  }
  public function get_appointment($id,$appointment_id) {
    $this->db->select('*');
    $this->db->from('appointment');
    if (strpos($id, 'hos_') !== false) {
      $this->db->or_where('doctor', end(explode("hos_",$id)));
    }else{
      $this->db->where('doctor', $id);
    }
    $this->db->where('id', $appointment_id);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function get_appointments($date,$doctor_id) {
    $doctor = $this->get_doctor($doctor_id);
    $this->db->select('*');
    $this->db->where('date', $date);
    $this->db->where('hospital_id', $doctor['hospital_id']);
    return $this->db->get('appointment')->result();
  }
  
  public function get_doctors_by_department($hospital_id,$department) {

    $this->db->select('*');
    $this->db->from('doctor');
    $this->db->where('department', $department);
    $this->db->where('hospital_id', $hospital_id);
    $query = $this->db->get();
    
    return $query->result();
  }


  function get_doctors_weekoff($hospital_id,$department){
    $this->db->select('*');
    $this->db->from('doctor');
    $this->db->where('department', $department);
    $this->db->where('hospital_id', $hospital_id);
    $query = $this->db->get();


      $weekoff = array();
      

      foreach ($query->result() as $doc) {
        $this->db->select('weekday');
        $this->db->from('time_slot');
        $this->db->where('doctor', $doc->id);
        $this->db->group_by('weekday');
        $query1 = $this->db->get();

        $week = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
        
        $strDay='';
         $temp=$week;
        foreach($query1->result() as $wDay){
        
          for($i=0;$i<count($temp);$i++){
              if(strcasecmp($temp[$i],$wDay->weekday)==0){
                //if($strDay==''){ $strDay.=$week[$i]; }else{ $strDay.=','.$week[$i]; }
                unset($temp[$i]);
              }
          }
        }


        $dayArr=array(
            'id'=>$doc->id,
            'weekoff'=>implode(",",$temp),
          );

        array_push($weekoff,$dayArr);

      }

      return $weekoff;
    
  }

  /**
  *  Register Doctor  for the user account of Med apps
  *
  */
  public function register_doctor() {   
    $results  = array();
    $user_info = array();
    $user_info['phone']     = $this->input->post('mobile');
    $user_info['password']   = hash('sha512', $this->input->post('password'));
    $user_info['name']  = $this->input->post('name');
    $user_info['email']  = $this->input->post('email');
    $user_info['govt_id']  = $this->input->post('govt_id');
    $user_info['address']  = $this->input->post('address');
    $user_info['department']  = $this->input->post('department');
    $user_info['specialist']  = $this->input->post('specialist');
    $user_info['location']  = $this->input->post('location');
    $lat_long = explode(',', $user_info['location']);
    $user_info['latitude'] = $lat_long[0];
    $user_info['longitude'] = $lat_long[1];
    $user_info['profile']  = $this->input->post('profile');
    $img_url  = $this->input->post('profile_img');
    if($img_url != "") {
      define("DOCTOR_IMAGES_DIRECTORY",ASSETS_DIRECTORY. DIRECTORY_SEPARATOR .'images'. DIRECTORY_SEPARATOR .'doctor_images'. DIRECTORY_SEPARATOR);
      if (!file_exists(DOCTOR_IMAGES_DIRECTORY)) {
        mkdir(DOCTOR_IMAGES_DIRECTORY, 0777, true);
      }
      $image    = base64_decode($img_url);  
      $filename = date('YmdHis').'.'.'png';
      $srcfile  = DOCTOR_IMAGES_DIRECTORY.$filename;
      file_put_contents($srcfile, $image);

      $user_info['img_url'] = base_url()."assets/images/doctor_images/".$filename;
    }

    $user_info['hospital_id']  = 'app_doctor';
    $user_info['status']  = 'active';
    $check_mobile  = $this->check_mobile($user_info['phone']); 
    if(empty($check_mobile)) {     
      $new_data   = $this->db->insert('doctor', $user_info);
      $insert_id  = $this->db->insert_id();
      $this->db->where('id',intval($insert_id));
      $user_info['doctor_id'] = $insert_id;
      unset($user_info['password']);
      unset($user_info['hospital_id']);
      unset($user_info['email']);
      $sess_id = $this->input->get_request_header('Sess-Id');
      $data = array('status' => "true",'message' => 'Registered Successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($user_info))));
    } else {
      $data = array('status' => "false",'message' => 'Doctor already exits','data' => (object)array());
    } 
    return $data;
  }
  /**
  * User login  for the user account of Med apps
  *
  */
  public function doctor_login() {
    $results  = array();
    $user_info = array();
    $login_mobile    = $this->input->post('mobile');
    $userPassword   = hash( 'sha512', $this->input->post('password') );
    if($login_mobile !='') {
      $check_mobile = $this->check_mobile($login_mobile);
    }
    if(!empty($check_mobile)) {
      $password = $check_mobile['password'];
      if($password == $userPassword) {     
        $user_info['id'] = (string)$check_mobile['id'];
        $user_info['name']    = $check_mobile['name'];
        $user_info['email']   = $check_mobile['email'];
        $user_info['phone']  = $check_mobile['phone'];
        $user_info['hospital_id']  = $check_mobile['hospital_id'];
        $user_info['specialist']  = $check_mobile['specialist'];
        if($check_mobile['hospital_id']!='app_doctor'){
          $hospital = $this->user_model->get_hospital_details($check_mobile['hospital_id']); 
          $user_info['img_url']  = $hospital['img_url'];
        }else{
          $user_info['img_url']  = $check_mobile['img_url'];
        }
        $sess_id = $this->input->get_request_header('Sess-Id');
        $results = array('status' => "true",'message' => 'Logged successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($user_info))));
        return $results;
      }
      else {
        $results = array('status' => "false",'message' => 'Incorrect Mobile or Password','data' => (object)array());
        return $results;
      }
    }
    else {
      $results = array('status' => "false" ,'message' => 'Incorrect Mobile or Password','data' => (object)array());
      return $results;
    }
  } 
  public function search_appointment($id,$date=null) {
    $this->db->select('id,patientname,doctorname,hospital_id,date,unique_id,status');
    $this->db->from('appointment');
    $this->db->where('unique_id',$id);
    $query = $this->db->get();
    return $query->row();
  }
  public function doctor_appointments($id,$status=null) {
    $this->db->select('id as appointment_id,patient as patient_id,patientname,doctorname,hospital_id,date,time_slot as time,unique_id,amount,status,consult_type,channel_name');
    $this->db->from('appointment');
    $this->db->order_by("id", "desc");
    $patientname = $this->input->post('patientname');
    if (!empty($patientname)) {
      $this->db->like('patientname',$patientname);
    }
    if (!empty($status)) {
      $this->db->where('status',$status);
    } else {
      $this->db->where('STATUS !=' , 'payment_pending');
    }  
    $this->db->where('doctor',$id);
    $query = $this->db->get();
    return $query->result();  
  }
  public function doctor_appointment_status($data) {
    $this->db->reset_query();
    if($data['status'] == 'Confirmed'){
      $this->db->set('unique_id',rand(100000, 999999));
    }elseif ($data['status']== 'Treated') {
      $this->db->where('unique_id',$data['otp']);
      $result = $this->db->get('appointment')->row();
      if (isset($result)) {
        $this->db->update('appointment');
      } else {
        return 'Please enter valid otp';
      }
    }
    $this->db->where('id', $data['appointment_id']);
    $this->db->set('status', $data['status']);
    if (strpos($data['doctor_id'], 'hos_') !== false) {
      $this->db->set('hospital_id', end(explode("hos_",$data['doctor_id'])));
      $log_data["hospital_id"] = end(explode("hos_",$data['doctor_id']));
    }else{
      $this->db->set('doctor', $data['doctor_id']);
      $log_data["doctor_id"] = $data['doctor_id'];
    }
    
    if ($data['channel_name']) {
      $this->db->set('channel_name', $data['channel_name']);
    }
    if (!empty($data['remarks'])) {
      $this->db->set('remarks', $data['remarks']);
    }
    $this->db->update('appointment');
    $log_data["appointment_id"] = $data['appointment_id'];
    $log_data["status"] = $data['status'];
    $this->user_model->patient_history_log($log_data);
    $this->db->reset_query();
    $this->db->select('id as appointment_id,patient as patient_id,patientname,amount,doctor as doctor_id,unique_id as otp,status as appointment_status,channel_name,remarks,consult_type,date');
    $this->db->where('id',$data['appointment_id']);
    $query = $this->db->get('appointment');
    return $query->row();
  }
  // public function doctor_appointment_status($data) {
  //   $this->db->reset_query();
  //   if($data['status'] == 'Seen'){
  //   $this->db->where('id', $data['appointment_id']);
  //   $this->db->set('status', $data['status']);
  //   $this->db->set('unique_id',rand(10000, 1000000));
  //   $this->db->update('appointment');
  //   $this->db->select('id as appointment_id,doctor as doctor_id,unique_id as otp,status as appointment_status');
  //   $this->db->where('id',$data['appointment_id']);
  //   $query = $this->db->get('appointment');
  //   return $query->row();
  // }elseif ($data['status']== 'Advised') {
  //    $this->db->select('id as appointment_id,doctor as doctor_id,unique_id as otp,status as appointment_status');
  //   $this->db->where('id',$data['appointment_id']);
  //    $query = $this->db->get('appointment')->row();
  //    if ($query->otp == $data['otp']) {
  //     $this->db->where('id', $data['appointment_id']);
  //     $this->db->set('status', $data['status']);
  //     $this->db->update('appointment');
  //     return $query;
  //    }
  //     else{
  //      return 'Please Enter valid otp';
  //     }
  //   }
  //    elseif ($data['status'] == 'Resheduled') {
  //     $this->db->where('id', $data['appointment_id']);
  //     $this->db->set('status', $data['status']);
  //     $this->db->update('appointment');
  //     $this->db->select('id as appointment_id,doctor as doctor_id,status as appointment_status');
  //    $this->db->where('id',$data['appointment_id']);
  //    $query = $this->db->get('appointment');
  //    return $query->row();
  //   }
  // }

  /*
  * doctor's transaction history
  */
  // Doctor name, today, month wise Jan to december, appointment I'd,date,address,amount,status
  public function doctor_payment_history($doc_id) {
    $this->db->select('a.id as appointment_id,
      a.add_date, 
      a.doctor as doctor_id, 
      a.hospital_id, 
      a.doctorname as doctor_name,
      a.amount,
      a.status,
      p.address'); 
    $this->db->from('appointment a');
    $this->db->join('patient p', 'a.patient = p.id');
    $this->db->where('a.doctor', $doc_id);
    $this->db->where('a.status!=', 'payment_pending');
    $this->db->order_by("a.id", "desc"); 
    $this->db->limit("10"); 
    $query = $this->db->get();
    $doctor_payment_history = $query->result();
    $this->db->reset_query();

    //today
    $this->db->select_sum('amount');
    $this->db->from('appointment a');
    $this->db->where('a.doctor', $doc_id);
    $this->db->where('a.status!=', 'payment_pending');
    $this->db->where('a.add_date=', date('m/d/y'));
    $query = $this->db->get();
    $today = $query->row();
    $this->db->reset_query();

    //last month 1
    $this->db->select_sum('amount');
    $this->db->from('appointment a');
    $this->db->where('a.doctor', $doc_id);
    $this->db->where('a.status!=', 'payment_pending');
    $first_date = date('m/d/y', strtotime('first day of -1 month'));
    $last_date = date('m/d/y', strtotime('last day of -1 month'));
    $this->db->where('a.add_date BETWEEN "'.$first_date.'" AND "'.$last_date.'" ');
    $query = $this->db->get();
    $month_1 = $query->row();
    $this->db->reset_query();

    //last month 2
    $this->db->select_sum('amount');
    $this->db->from('appointment a');
    $this->db->where('a.doctor', $doc_id);
    $this->db->where('a.status!=', 'payment_pending');
    $first_date = date('m/d/y', strtotime('first day of -2 month'));
    $last_date = date('m/d/y', strtotime('last day of -2 month'));
    $this->db->where('a.add_date BETWEEN "'.$first_date.'" AND "'.$last_date.'" ');
    $query = $this->db->get();
    $month_2 = $query->row();
    $this->db->reset_query();
    
    //last month 3
    $this->db->select_sum('amount');
    $this->db->from('appointment a');
    $this->db->where('a.doctor', $doc_id);
    $this->db->where('a.status!=', 'payment_pending');
    $first_date = date('m/d/y', strtotime('first day of -3 month'));
    $last_date = date('m/d/y', strtotime('last day of -3 month'));
    $this->db->where('a.add_date BETWEEN "'.$first_date.'" AND "'.$last_date.'" ');
    $query = $this->db->get();
    $month_3 = $query->row();
    $this->db->reset_query();

    //last month 4
    $this->db->select_sum('amount');
    $this->db->from('appointment a');
    $this->db->where('a.doctor', $doc_id);
    $this->db->where('a.status!=', 'payment_pending');
    $first_date = date('m/d/y', strtotime('first day of -4 month'));
    $last_date = date('m/d/y', strtotime('last day of -4 month'));
    $this->db->where('a.add_date BETWEEN "'.$first_date.'" AND "'.$last_date.'" ');
    $query = $this->db->get();
    $month_4 = $query->row();
    foreach ($doctor_payment_history as &$payment_history) {
      $payment_history->address = $payment_history->address?$payment_history->address:'';
    }
    return array( 'recent' => $doctor_payment_history, 
                  'today' => array('amount'=>$today->amount?$today->amount:0),
                  'month_1' => array('month_title' => date('M', strtotime('first day of -1 month')),'amount'=>$month_1->amount?$month_1->amount:0),
                  'month_2' => array('month_title' => date('M', strtotime('first day of -2 month')),'amount'=>$month_2->amount?$month_2->amount:0),
                  'month_3' => array('month_title' => date('M', strtotime('first day of -3 month')),'amount'=>$month_3->amount?$month_3->amount:0),
                  'month_4' => array('month_title' => date('M', strtotime('first day of -4 month')),'amount'=>$month_4->amount?$month_4->amount:0 ));

  }
  /*
  * doctors check appointment of given patient
  */
  public function get_appointment_check($doc_id,$patient_id,$appointment_id) {
    $this->db->select('*');
    $this->db->from('appointment');
    $this->db->where('doctor', $doc_id);
    $this->db->where('patient', $patient_id);
    $this->db->where('id', $appointment_id);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function get_appointment_by_id($appointment_id) {
    $this->db->select('*');
    $this->db->from('appointment');
    $this->db->where('id', $appointment_id);
    $query = $this->db->get();
    return $query->row_array();
  }
  public function update_doctor($id) {
    $data['id'] = $id;
    $data['fees'] = $this->input->post('fees');
    $data['name'] = $this->input->post('name');
    $data['email'] = $this->input->post('email');
    $data['address'] = $this->input->post('address');
    $data['phone'] = $this->input->post('phone');
    $data['specialist'] = $this->input->post('specialist');
    $data['department'] = $this->input->post('department');
    $data['schedule_time'] = $this->input->post('schedule_time');
    $link = explode(',',$this->input->post('video_link'));
    $i = 0;
    foreach ($link as $value) {
      $video['video_'.$i] = $value;
      $i++;
    }
    $data['video_url'] = serialize($video);
    $gallery = $this->input->post('gallery');
    if($gallery != ""){
      define("DOCTOR_GALLERY_DIRECTORY",ASSETS_DIRECTORY. DIRECTORY_SEPARATOR .'images/doctor_gallery_images/');
      if (!file_exists(DOCTOR_GALLERY_DIRECTORY)) {
        mkdir(DOCTOR_GALLERY_DIRECTORY, 0777, true);
      }
      $split_image = explode(',',$gallery);
      $new_picture = [];
      for ($i=0; $i < count($split_image); $i++) {
        if (!empty($split_image[$i]))
        {
          $image[$i] = base64_decode($split_image[$i]); 
          $filename[$i] = time().$i .'.'.'png';
          $srcfile[$i] = DOCTOR_GALLERY_DIRECTORY.$filename[$i];
          file_put_contents($srcfile[$i], $image[$i]);
          $picture[] =  base_url()."assets/images/doctor_gallery_images/".$filename[$i];
          foreach ($picture as $value) {
            $new_picture['image_'.$i] = $value;
          }
        } 
      }
    } 
    $cover = $this->input->post('cover_image');
    if($cover != "") {
        define("DOCTOR_IMAGES_DIRECTORY",ASSETS_DIRECTORY. DIRECTORY_SEPARATOR .'images/cover_images/');
        if (!file_exists(DOCTOR_IMAGES_DIRECTORY)) {
          mkdir(DOCTOR_IMAGES_DIRECTORY, 0777, true);
        }
        $image    = base64_decode($cover);  
        $filename = date('YmdHis').'.'.'png';
        $srcfile  = DOCTOR_IMAGES_DIRECTORY.$filename;
        file_put_contents($srcfile, $image);

        $data['cover_image'] = base_url()."assets/images/cover_images/".$filename;
      }
    if($gallery != "") {
      $data['gallery']  = serialize($new_picture);                
    }
    $this->db->where('id', $id);
    $new_data = $this->db->update('doctor', $data);
    if($new_data) {
      $val = $this->get_doctor($id);
      if($val) {
        if($val['gallery'] != "") {
          unset($data['gallery']);
          unset($data['video_url']);
          $details['doctor'] = $data;
          $details['gallery'] = unserialize($val['gallery']);
          $details['video_url'] = unserialize($val['video_url']);
        } 
        else{
          unset($data['gallery']);
          unset($data['video_url']);
          $details['doctor'] = $data;
          $details['gallery'] = (object)array();
          $details['video_url'] = (object)array();
        }
        $sess_id = $this->input->get_request_header('Sess-Id');
        $respo = array('status' => "true",'message' => 'Doctor Details updated successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($details))));
      } else {
        $respo = array('status'=>"false",'message'=>$this->db->_error_message(),'data'=>(object)array());
      }
      return $respo;
    }
  }
  public function update_specialist($id,$data) {
    $this->db->where('id', $id);
    $new_data = $this->db->update('doctor', $data);
    if($new_data) {
      $sess_id = $this->input->get_request_header('Sess-Id');
      $respo = array('status' => "true",'message' => 'Doctor Details updated successfully','data' => base64_encode(encrypt_data($sess_id,json_encode($data))));
    } else {
      $respo = array('status'=>"false",'message'=>$this->db->_error_message(),'data'=>(object)array());
    }
    return $respo;
  } 
  public function doctor_pending($id) {
    $this->db->select('id');
    $this->db->where('doctor',$id);
    $this->db->where('status','Pending Confirmation');
    $this->db->from('appointment');
    $query = $this->db->get();
    return $query->result();
  }
  public function doctor_treated($id) {
    $this->db->select('id');
    $this->db->where('doctor',$id);
    $this->db->where('status','Treated');
    $this->db->from('appointment');
    $query = $this->db->get();
    return $query->result();
  }
  public function patient_count($id) {
    $this->db->select('id,patient,doctor');
    $this->db->where('doctor',$id);
    $this->db->from('appointment');
    $query = $this->db->get();
    return $query->result();
  }
  public function doctor_appointment($id) {
    $this->db->select('id');
    $this->db->where('doctor',$id);
    $this->db->from('appointment');
    $query = $this->db->get();
    return $query->result();
  }
  public function doctor_details($id) {
    if($id != '') {
      $this->db->select('name,department,specialist,email,phone,img_url,address,schedule_time');
      $this->db->from('doctor');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->row_array();
    }
    return array();
  }
  public function doctor_form($id) {
    if($id != '') {
      $this->db->select('id,name,department,specialist,email,phone,img_url,address,fees,description,hospital_id,cover_image,schedule_time,video_url,gallery');
      $this->db->from('doctor');
      $this->db->where('id', $id);
      $query = $this->db->get();
      return $query->row_array();
    }
    return array();
  }
  public function doc_forgot_pass($id,$mobile,$password) {
    $this->db->reset_query();
    $this->db->where('id', $id);
    $this->db->set('password', $password);
    $this->db->update('doctor');
    $this->db->select('id,phone');
    $this->db->where('id',$id);
    $query = $this->db->get('doctor');
    return $query->row();
  }

  /*Get the report of given appoint_id*/
  public function getReport($patient_id) {
    $this->db->select('*');
    $this->db->from('report');
    $this->db->where('patient',$patient_id);
    $query = $this->db->get();
    return $query->result();
  }
 /*
  * doctors report submit of given patient
  */
  public function doctor_report($data) {
    if(!empty($data['report_id'])){
      $this->db->where('id', $data['report_id']);
      unset($data['report_id']);
      $this->db->update('prescription', $data);
    }else{
      unset($data['report_id']);
      $this->db->insert('prescription', $data);
      $data['report_id'] = $this->db->insert_id();
    }
    return $data;
  }
  public function view_prescription($doctor_id,$report_id) {
    if($doctor_id){
      $hospital  = $this->get_doctor($doctor_id);
      $this->db->where('hospital_id', $hospital["hospital_id"]);
    }
    $this->db->select('*');
    $this->db->from('prescription');
    $this->db->where('id',$report_id);
    $query = $this->db->get();
    return $query->result();
  }
  function getMedicineInfo($doctor_id,$searchTerm) {
    $hospital  = $this->get_doctor($doctor_id);
    if (!empty($searchTerm)) {
      $this->db->select('*');
      $this->db->where('hospital_id', $hospital["hospital_id"]);
      $this->db->where("id LIKE '%" . $searchTerm . "%' OR name LIKE '%" . $searchTerm . "%'");
      $fetched_records = $this->db->get('medicine');
      $users = $fetched_records->result_array();
    } else {
      $this->db->select('*');
      $this->db->where('hospital_id', $hospital["hospital_id"]);
      $this->db->limit(10);
      $fetched_records = $this->db->get('medicine');
      $users = $fetched_records->result_array();
    }
    $data = array();
    foreach ($users as $user) {
        $data[] = array("id" => $user['id'] . '*' . $user['name'], "text" => $user['name']);
    }
    return $data;
  }
  /*Get the Doctor's prescription of given patient id*/
  public function view_doctor_prescriptionbyid($id) {
    $this->db->select('id as report_id,doctor as doctor_id,patient as patient_id,appointment_id,attachment_image,report_img,description,date as created_at');
    $this->db->from('prescription');
    $this->db->where('id',$id);
    $query = $this->db->get();
    return $query->result();
  }
  public function view_doctor_prescription($patientId,$appointId) {
    $this->db->select('id as report_id,doctor as doctor_id,patient as patient_id,appointment_id,attachment_image,report_img,description,date as created_at');
    $this->db->from('prescription');
    $this->db->where('patient',$patientId);
    $this->db->where('appointment_id',$appointId);
    $query = $this->db->get();
    return $query->result();
  }
  public function get_my_patients($id) {
    $hospital  = $this->get_doctor($id);
    $this->db->select('*');
    $this->db->select('a.id as appointment_id,a.add_date,a.hospital_id,p.address'); 
    $this->db->from('appointment a');
    $this->db->join('patient p', 'a.patient = p.id');
    $this->db->order_by("p.id", "desc");
    // $this->db->group_start();
    // $this->db->where('find_in_set("'.$hospital["hospital_id"].'", a.access)');
    // $this->db->or_where('find_in_set("hos_'.$hospital["hospital_id"].'", a.access)');
    // $this->db->or_where('find_in_set("'.$hospital["hospital_id"].'", p.access)');
    // $this->db->or_where('find_in_set("hos_'.$hospital["hospital_id"].'", p.access)');
    // $this->db->or_where('a.hospital_id', $hospital["hospital_id"]);
    $this->db->or_where('a.doctor', $id);
    // $this->db->group_end();
    $this->db->group_by("a.patient");
    $query = $this->db->get();
    return $query->result();
  }

  /*Update Doctor's status of offline or online */
  public function doctor_status($data) {
    $this->db->reset_query();
    $this->db->where('id', $data['id']);
    $this->db->set('is_online', $data['is_online']);
    $this->db->update('doctor');
    return array('id'=>$data['id'],'is_online'=>$data['is_online']);
  }
  /* Update notification token for doctor table*/
  public function doctor_notification_token($data) {
    $this->db->where('id', $data['id']);
    $this->db->set('token', $data['token']);
    $this->db->update('doctor');
    $this->db->select('id as doctor_id,name,email,phone,token');
    $this->db->where('id',$data['id']);
    $query = $this->db->get('doctor');
    return $query->row();
  }


  function getAvailableSlotByDoctorByDate($date, $doctor) {

    $weekday = strftime("%A", $date);

    $this->db->where('date', $date);
    $this->db->where('doctor', $doctor);
    $holiday = $this->db->get('holidays')->result();

    if (empty($holiday)) {
      $query = $this->get_appointments($date,$doctor);
      $this->db->where('doctor', $doctor);
      $this->db->where('weekday', $weekday);
      $this->db->order_by('s_time_key', 'asc');
      $query1 = $this->db->get('time_slot')->result();

      $availableSlot = array();
      $bookedTimeSlot = array();
      foreach ($query as $bookedTime) {
        if ($bookedTime->status != 'Cancelled') {
          $bookedTimeSlot[] = $bookedTime->time_slot;
        }
      }
      foreach ($query1 as $timeslot) {
        $ts = $timeslot->s_time . ' To ' . $timeslot->e_time;
        if(!in_array($ts, $bookedTimeSlot))
          $availableSlot[] = $ts;
      }
    } else {
      $availableSlot = array();
    }
    return $availableSlot;
  }
}