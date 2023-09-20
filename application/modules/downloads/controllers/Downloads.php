<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Downloads extends MX_Controller {
	// function __construct() {
 //        parent::__construct();
	// }
	
	public function index($filename)
	{
	    $this->load->helper('download');
		if( is_null($filename) && $this->uri->segment(2) ){     
        	$filename = $this->uri->segment(2); 
	    }
	    $data = file_get_contents(base_url('/assets/'.$filename));
	    force_download($filename, $data);
        $this->load->view('thanks', $data);
	}
}
