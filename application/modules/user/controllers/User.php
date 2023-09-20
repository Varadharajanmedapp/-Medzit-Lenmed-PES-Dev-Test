<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class User extends MX_Controller {

  function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view('aboutus');
  }
  public function aboutus() {
    $this->load->view('aboutus');
  }
	public function user_verification() {
		$user_credential = $this->input->post('user_credential');
		$otp = rand(1000,9999);
		
		if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $user_credential)) {
			$this->session->set_flashdata('mail_otp', $otp);
			$this->session->set_flashdata('user_mail', $user_credential);
			$this->load->model('email/email_model');
			$send_mail = $this->email_model->send_verification_email($user_credential, $otp);
			/* $send_mail = true; */
			echo $send_mail ? "success" : "failed";
		} else {
			$this->session->set_flashdata('phone_otp', $otp);
			$this->session->set_flashdata('user_phone', $user_credential);
			$this->load->model('appointment/appointment_model');
			$message = "The OTP for verifying your account with Medzit is " . $otp;
			$data = ['phone' => $user_credential, 'text' => $message];
			$send_sms = $this->appointment_model->sendSMS($data);
			echo $send_sms ? "success" : "failed";
		}		
	}

}
/* End of file User.php */
/* Location: ./application/modules/user/controllers/User.php */