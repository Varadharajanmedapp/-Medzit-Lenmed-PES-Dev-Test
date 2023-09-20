<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Department extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('department_model');
        

        if (!$this->ion_auth->in_group('admin')) {
            redirect('home/permission');
        }
    }

    public function index() {
        $data['departments'] = $this->department_model->getDepartment();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('department', $data);
        $this->load->view('home/footer'); // just the header file
    }

    public function addNewView() {
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new');
        $this->load->view('home/footer'); // just the header file
    }

    public function addNew() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $amount = $this->input->post('amount');

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        // Validating Name Field
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[2]|max_length[100]|xss_clean');
        // Validating Password Field    
        // Validating Email Field
        $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[2]|max_length[1000]|xss_clean');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|min_length[2]|max_length[10]|xss_clean');
        // Validating Address Field   
        if ($this->form_validation->run() == FALSE) {
            if (!empty($id)) {
                $data = array();
                $data['department'] = $this->department_model->getDepartmentById($id);
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the footer file
            } else {
                $data['setval'] = 'setval';
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('add_new', $data);
                $this->load->view('home/footer'); // just the header file
            }
        } else {
            //$error = array('error' => $this->upload->display_errors());
            $data = array();
            $data = array(
                'name' => $name,
                'description' => $description,
                'amount' => $amount
            );
            if (empty($id)) {     // Adding New department
                $this->department_model->insertDepartment($data);
                $this->session->set_flashdata('feedback', lang('added'));
            } else { // Updating department
                $this->department_model->updateDepartment($id, $data);
                $this->session->set_flashdata('feedback', lang('updated'));
            }
            // Loading View
            redirect('department');
        }
    }

    function getDepartment() {
        $data['departments'] = $this->department_model->getDepartment();
  
        $this->load->view('department', $data);
    }

    function editDepartment() {
        $data = array();
        $id = $this->input->get('id');
        $data['department'] = $this->department_model->getDepartmentById($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_new', $data);
        $this->load->view('home/footer'); // just the footer file
    }

    function editDepartmentByJason() {
        $id = $this->input->get('id');
        $data['department'] = $this->department_model->getDepartmentById($id);
        echo json_encode($data);
    }

    function delete() {
        $id = $this->input->get('id');
        $this->department_model->delete($id);
        $this->session->set_flashdata('feedback', lang('deleted'));
        redirect('department');
    }
    
  public function specialist() {
    $data['all_specialist'] = $this->department_model->get_specialist();
     $this->load->view('home/dashboard'); // just the header file
    $this->load->view('specialist', $data);
    $this->load->view('home/footer'); // just the header file
  }

  public function add_specialist() {
    $data['all_specialist'] = $this->department_model->get_specialist();
    if($this->input->method() === 'post') {
        $this->session->set_flashdata('add_specialist', '');      
        $admin_post['title']    = $this->security->xss_clean($this->input->post('title'));
        $admin_post['department']    = $this->security->xss_clean($this->input->post('department'));

        // $admin_post['image']  = $this->security->xss_clean($this->input->post('image'));
        $admin_post['status']  = 'Active';
        $config = [
          'upload_path'   => "./uploads/specialist_icons",
          'allowed_types' => "gif|jpg|png|jpeg",
          'file_name'     => time(),
          'overwrite'     => TRUE
        ];
        if (!is_dir($config['upload_path'])) {
          mkdir($config['upload_path'], 0777, TRUE);
        }
        $this->upload->initialize($config);
        $pic = $this->upload->do_upload('img_url');
        $image = $this->upload->data();
        if (!empty($pic)) {
          $admin_post['image'] = base_url()."uploads/specialist_icons/".$image['file_name'];;
        }
        $this->load->library('form_validation');
		    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $this->form_validation->set_rules('title', 'title','trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['departments'] = $this->department_model->getDepartment();
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_specialist',$data);       
            $this->load->view('home/footer'); // just the header file
        } else {
        if($this->department_model->add_specialist($admin_post) == TRUE) {
          $this->load->library('form_validation');
		      $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->session->set_flashdata('success_msg', 'Specialist saved successfully!');
            redirect('department/specialist',$data); 
        } else {
            $data['departments'] = $this->department_model->getDepartment();
            $this->session->set_flashdata('add_specialist','Something went wrong in database');
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_specialist',$data);       
            $this->load->view('home/footer'); // just the header file
          }
      } 
   } else {
    $data['departments'] = $this->department_model->getDepartment();
      $this->load->view('home/dashboard'); // just the header file
      $this->load->view('add_specialist',$data);       
      $this->load->view('home/footer'); // just the header file
    } 
  }



   public function edit_specialist($id) {
    $data['all_specialist']   = $this->department_model->get_specialist();
    $data['specialist']       = $this->department_model->get_specialist($id);
    if($this->input->method() === 'post') {
        $this->session->set_flashdata('edit_specialist', '');
        $admin_post['title'] = $this->input->post('title');
        $files = $_FILES;
        $_FILES['userfile']['name']     = $files['userfile']['name']['myfile'];
        $_FILES['userfile']['type']     = $files['userfile']['type']['myfile'];
        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name']['myfile'];
        $_FILES['userfile']['error']    = $files['userfile']['error']['myfile'];
        $_FILES['userfile']['size']     = $files['userfile']['size']['myfile'];    
        $config = [
            'upload_path'   => "./uploads/specialist",
            'allowed_types' => "gif|jpg|png|jpeg", 
            'file_name'     => time(),
            'overwrite'     => TRUE
        ];
        if (!is_dir($config['upload_path'])) {
          mkdir($config['upload_path'], 0777, TRUE);
        }
        $this->upload->initialize($config);
        $pic = $this->upload->do_upload('img_url');
        $dataInfo = $this->upload->data();
        if($pic) {
          $admin_post['image'] = base_url()."uploads/specialist/".$dataInfo['file_name'];
        }

        $admin_post['title']  = $this->security->xss_clean($this->input->post('title'));
        $admin_post['status']       = $this->security->xss_clean($this->input->post('status'));

        $this->form_validation->set_rules('title', 'title','trim|required');
        // $this->form_validation->set_rules('status', 'status','trim|required');
        $this->form_validation->set_rules('img_url', 'images','trim');
        if ($this->form_validation->run() == FALSE) {
          $data['departments'] = $this->department_model->getDepartment();
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('edit_specialist',$data);       
            $this->load->view('home/footer'); // just the header file      
        } else {
            if($this->department_model->update_specialist($id,$admin_post) == TRUE) {
              // var_dump('expression');die;
                $this->session->set_flashdata('success_msg', 'Specialist updated successfully!');
                redirect('department/specialist',$page_data); 
            } else {
                $this->session->set_flashdata('edit_specialist','Something went wrong in database');
                $data['departments'] = $this->department_model->getDepartment();
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('edit_specialist',$data);       
                $this->load->view('home/footer'); // just the header file
            }
        } 
    } else {
      $data['departments'] = $this->department_model->getDepartment();
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('edit_specialist',$data);       
        $this->load->view('home/footer'); // just the header file 
    } 
  }

  public function delete_specialist($id) { 
    $this->department_model->delete_specialist($id);
    redirect(base_url()."department/specialist");
    exit();     
  }
  public function details_specialist($id) {
    $data['specialist'] = $this->department_model->get_specialist($id);
    $this->load->view('home/dashboard'); // just the header file
    $this->load->view('specialist_details', $data);
    $this->load->view('home/footer'); // just the footer file
  }

  public function med_procedures() {
    $data['all_specialist'] = $this->department_model->get_specialist();
    $data['departments'] = $this->department_model->getDepartment();
    $this->load->view('home/dashboard'); // just the header file
    $this->load->view('med_procedures', $data);
    $this->load->view('home/footer'); // just the header file
  }

  public function get_med_procedure_list() {
    $requestData = $_REQUEST;
    $start = $requestData['start'];
    $limit = $requestData['length'];
    $search = $this->input->post('search')['value'];

    if ($limit == -1) {
        if (!empty($search)) {
            $data['scan_types'] = $this->department_model->get_scan_types_BySearch($search);
        } else {
            $data['scan_types'] = $this->department_model->get_med_procedure();
        }
    } else {
        if (!empty($search)) {
            $data['scan_types'] = $this->department_model->getScantypesByLimitBySearch($limit, $start, $search);
        } else {
            $data['scan_types'] = $this->department_model->getScantypesByLimit($limit, $start);
        }
    }
    $i = 0;
 
    foreach ($data['scan_types'] as $scan_type) {
        $i = $i + 1;
        $option2 = '<a class="btn btn-info btn-xs btn_width delete_button"  " href="department/delete_type?id=' . $scan_type->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><img alt="" src="uploads/trash-bttn-icon.png" style="height:20px;"> ' . lang('delete') . '</a>';
        $info[] = array(
          $i,
          $scan_type->scan_type,
          $scan_type->category,
          $scan_type->amount,
          $option2
        );
  }
    if (!empty($data['scan_types'])) {
        $output = array(
          "draw" => intval($requestData['draw']),
				"recordsTotal" => $this->db->where('hospital_id',$this->session->userdata('hospital_id'))->get('scan_types')->num_rows(),
				"recordsFiltered" => $this->db->where('hospital_id',$this->session->userdata('hospital_id'))->get('scan_types')->num_rows(),
				"data" => $info
        );
    } else {
      $output = array(
          // "draw" => 1, scan_types
          "recordsTotal" => 0,
          "recordsFiltered" => 0,
          "data" => []
      );
    }
    echo json_encode($output);
  }


  public function add_new_scan_types() {
    $id = $this->input->post('id');
    $scan_type = $this->input->post('scan_type');
    $category = $this->input->post('category');
    $amount = $this->input->post('amount');
    $description = $this->input->post('description');
    
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    // Validating Scan type Field
    $this->form_validation->set_rules('scan_type', 'Scan type', 'trim|required|min_length[1]|max_length[100]|xss_clean');
    // Validating Amount Field   
    $this->form_validation->set_rules('amount', 'Amount', 'trim|required|min_length[1]|max_length[500]|xss_clean');
    // Validating Department Field   
    $this->form_validation->set_rules('description', 'Description', 'trim|min_length[1]|max_length[500]|xss_clean');

      if ($this->form_validation->run() == FALSE) {
          if (!empty($id)) {
              $data = array();
              $data['departments'] = $this->department_model->getDepartment();
              $this->load->view('home/dashboard'); // just the header file
              $this->load->view('add_new_scans', $data);
              $this->load->view('home/footer'); // just the footer file
          } else {
              $data = array();
              $data['setval'] = 'setval';
              $data['departments'] = $this->department_model->getDepartment();    
              // var_dump($data{'departments'});die;
              // $data['specialists'] = $this->department_model->getspecilaist();
              // var_dump($data['specialists']);die;
              $this->load->view('home/dashboard'); // just the header file
              $this->load->view('add_new_scans', $data); 
              $this->load->view('home/footer'); // just the header file
          }
      } else {
          $data = array();
          $data = array(
              'scan_type' => $scan_type,
              'amount' => $amount,
              'category' => $category,
              'description' => $description,
          );
        }
      $result = $this->department_model->insert_scan_type($data);
      if ($result) {
        $this->session->set_flashdata('feedback', lang('added'));
        redirect('department/med_procedures');
        // Loading View
      }
    }
 public function delete_type() {
  $id = $this->input->get('id');
  $this->department_model->delete_scan_type($id);
  $this->session->set_flashdata('feedback', lang('deleted'));
  redirect('department/med_procedures');
  }
}

/* End of file department.php */
/* Location: ./application/modules/department/controllers/department.php */
