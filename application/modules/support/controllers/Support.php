<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Support extends MX_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->model('support_model');  
  }
 public function index() {
  
  $this->load->view('home/dashboard');
  $this->load->view('support');
  $this->load->view('home/footer');
        }

  public function send() {
    $email = $this->input->post('email');
    $body = $this->input->post('description');
    $this->load->model('email/email_model');
    $send_mail = $this->email_model->send_support_email($email,$body);
    echo $send_mail ? "success" : "failed";
    redirect('support');
  
}
}