<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {
	
	public function index()
	{
    	$this->load->view('aboutus'); 
	}
	public function aboutus()
	{
    	$this->load->view('aboutus'); 
	}

}
