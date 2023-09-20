<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Remarks extends MX_Controller {

  function __construct() {
    parent::__construct();

    $this->load->model('remarks_model');

    if (!$this->ion_auth->in_group('superadmin')) {
      redirect('home/permission');
    }
  }

  public function index() {

    $data['remarks'] = $this->remarks_model->getRemarks();
    $this->load->view('home/dashboard');
    $this->load->view('remarks', $data);
    $this->load->view('home/footer');
  }
}

/* End of file remarks.php */
/* Location: ./application/modules/remarks/controllers/remarks.php */
