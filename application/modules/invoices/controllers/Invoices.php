<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Invoices extends MX_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('invoice_model');
    $this->load->model('finance/pharmacy_model');
    $this->load->model('settings/settings_model');    
  }
  public function index() {
    if (!$this->ion_auth->in_group(array('admin', 'superadmin'))) {
      redirect('home/permission');
    }

    $data['patients'] = $this->invoice_model->getPatient();
    $data['doctors'] = $this->invoice_model->getDoctor();
    $data['settings'] = $this->settings_model->getSettings();
    $this->load->view('home/dashboard', $data); 
    $this->load->view('appointment', $data);
    $this->load->view('home/footer');
    // $this->load->view('appointment_invoice');
    // $this->load->view('myInvoice');
    // $this->load->view('invoice');
    // $this->load->view('patient_payments');
    // $this->load->view('payment');
    // $this->load->view('home/footer');
  }

  public function plan($id) {
    if (!$this->ion_auth->in_group(array('admin', 'superadmin'))) {
      redirect('home/permission');
    }
    $data['currency'] = $this->settings_model->getSettings()->currency;
    $data['invoice'] = $this->invoice_model->getPatientById($id);
    $this->load->view('home/dashboard');
    $this->load->view('plan_invoice',$data);
    $this->load->view('home/footer');  
  }

  public function appointment($id) {
    if (!$this->ion_auth->in_group(array('admin', 'superadmin'))) {
      redirect('home/permission');
    }
    $data['currency'] = $this->settings_model->getSettings()->currency;
    $data['appointment'] = $this->invoice_model->getAppointmentById($id);
    $data['patient'] = $this->invoice_model->getPatientById($data['appointment']->patient);
    $data['doctor'] = $this->invoice_model->getDoctorById($data['appointment']->doctor);
    $data['hospital'] = $this->invoice_model->getHospitalById($data['appointment']->hospital_id);
    $this->load->view('home/dashboard');
    $this->load->view('appointment_invoice',$data);
    $this->load->view('home/footer');  
  }

  function getAppoinmentList() {
    $requestData = $_REQUEST;
    $start = $requestData['start'];
    $limit = $requestData['length'];
    $search = $this->input->post('search')['value'];
    if ($this->ion_auth->in_group(array('Doctor'))) {
        $doctor_ion_id = $this->ion_auth->get_user_id();
        $doctor = $this->db->get_where('doctor', array('ion_user_id' => $doctor_ion_id))->row()->id;
        if ($limit == -1) {
            if (!empty($search)) {
                $data['appointments'] = $this->invoice_model->getAppointmentListBySearchByDoctor($doctor, $search);
            } else {
                $data['appointments'] = $this->invoice_model->getAppointmentListByDoctor($doctor);
            }
        } else {
            if (!empty($search)) {
                $data['appointments'] = $this->invoice_model->getAppointmentListByLimitBySearchByDoctor($doctor, $limit, $start, $search);
            } else {
                $data['appointments'] = $this->invoice_model->getAppointmentListByLimitByDoctor($doctor, $limit, $start);
            }
        }
    } else {
        if ($limit == -1) {
            if (!empty($search)) {
                $data['appointments'] = $this->invoice_model->getAppointmentBysearch($search);
            } else {
                $data['appointments'] = $this->invoice_model->getAppointment();
            }
        } else {
            if (!empty($search)) {
                $data['appointments'] = $this->invoice_model->getAppointmentByLimitBySearch($limit, $start, $search);
            } else {
                $data['appointments'] = $this->invoice_model->getAppointmentByLimit($limit, $start);
            }
        }
    }

    //  $data['patients'] = $this->patient_model->getVisitor();
    $i = 0;
    foreach ($data['appointments'] as $appointment) {
        $i = $i + 1;
        $option2 = '<a class="btn btn-info btn-xs btn_width" style="padding: 2px 5px 2px 5px;" href="invoices/appointment/' . $appointment->id . '" ><i class="fa fa-money-check"> </i></a>';
        $patientdetails = $this->invoice_model->getPatientById($appointment->patient);
        if (!empty($patientdetails)) {
            $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $patientdetails->name . '</a>';
        } else {
            $patientname = ' <a type="button" class="history" data-toggle = "modal" data-id="' . $appointment->patient . '"> ' . $appointment->patientname . '</a>';
        }
        $doctordetails = $this->invoice_model->getDoctorById($appointment->doctor);
        if (!empty($doctordetails)) {
            $doctorname = $doctordetails->name;
        } else {
            $doctorname = $appointment->doctorname;
        }


        if ($this->ion_auth->in_group(array('Doctor'))) {
            if ($appointment->status == 'Confirmed') {
                if ($appointment->status == 'Confirmed') {
                    $options7 = '<a class="btn btn-info btn-xs btn_width detailsbutton" title="' . lang('start_live') . '" style="color: #fff;" href="meeting/instantLive?id=' . $appointment->id . '" target="_blank" onclick="return confirm(\'Are you sure you want to start a live meeting with this patient? SMS and Email will be sent to the Patient.\');"><i class="fa fa-headphones"></i> ' . lang('live') . '</a>';
                } else {
                    $options7 = '';
                }
            } else {
                $options7 = '';
            }
        } else {
            $options7 = '';
        }


        $info[] = array(
            $appointment->id,
            $patientname,
            $doctorname,
            date('d-m-Y', $appointment->date) . '<br>' . $appointment->s_time . '-' . $appointment->e_time,
            $appointment->remarks,
            $appointment->status,
            $option2 . ' ' . $options7
        );
    }

    if (!empty($data['appointments'])) {
        $output = array(
            "draw" => intval($requestData['draw']),
            "recordsTotal" => $this->db->get('appointment')->num_rows(),
            "recordsFiltered" => $this->db->get('appointment')->num_rows(),
            "data" => $info
        );
    } else {
        $output = array(
            // "draw" => 1,
            "recordsTotal" => 0,
            "recordsFiltered" => 0,
            "data" => []
        );
    }

    echo json_encode($output);
  }
}
/* End of file invoice.php */
/* Location: ./application/modules/invoice/controllers/invoice.php */    