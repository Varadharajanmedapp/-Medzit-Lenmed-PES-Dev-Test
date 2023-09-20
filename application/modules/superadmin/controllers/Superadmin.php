<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Superadmin extends MX_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('superadmin_model');
        if (!$this->ion_auth->in_group(array('superadmin'))) {
            redirect('home/permission');
        }
    }

  public function index() {
    $data['all_onboard'] = $this->superadmin_model->getOnboard();
    $this->load->view('home/dashboard'); // just the header file
    $this->load->view('onboard', $data);
    $this->load->view('home/footer'); // just the header file
  }

  public function onBoard() {
    $data['all_onboard'] = $this->superadmin_model->getOnboard();
    $this->load->view('home/dashboard'); // just the header file
    $this->load->view('onboard', $data);
    $this->load->view('home/footer'); // just the header file
  }

  public function addOnboard() {
    $data['all_onboard'] = $this->superadmin_model->getOnboard();
    if($this->input->method() === 'post') {
        $this->session->set_flashdata('add_onboard', '');      
        $admin_post['title']    = $this->security->xss_clean($this->input->post('title'));
        $admin_post['slogans']  = $this->security->xss_clean($this->input->post('slogan'));
        $admin_post['status']  = 'Active';
        $config = [
          'upload_path'   => "./uploads/onboard",
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
          $admin_post['images'] = base_url()."uploads/onboard/".$image['file_name'];;
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('title', 'title','trim|required');
        $this->form_validation->set_rules('slogan', 'slogan','trim|required');
        $this->form_validation->set_rules('img_url', 'images','trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_onboard',$data);       
            $this->load->view('home/footer'); // just the header file
        } else {
        if($this->superadmin_model->addOnboard($admin_post) == TRUE) {
            $this->session->set_flashdata('success_msg', 'Onboard saved successfully!');
            redirect('superadmin/onboard',$data); 
        } else {
            $this->session->set_flashdata('add_onboard','Something went wrong in database');
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_onboard',$data);       
            $this->load->view('home/footer'); // just the header file
          }
      } 
   } else {
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_onboard',$data);        
        $this->load->view('home/footer'); // just the header file
    } 
  }

  public function editOnboard($id) {
    $data['all_onboard']   = $this->superadmin_model->getOnboard();
    $data['onboard']       = $this->superadmin_model->getOnboard($id);
    if($this->input->method() === 'post') {
        $this->session->set_flashdata('edit_onboard', '');
        $admin_post['title'] = $this->input->post('title');
        $files = $_FILES;
        $_FILES['userfile']['name']     = $files['userfile']['name']['myfile'];
        $_FILES['userfile']['type']     = $files['userfile']['type']['myfile'];
        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name']['myfile'];
        $_FILES['userfile']['error']    = $files['userfile']['error']['myfile'];
        $_FILES['userfile']['size']     = $files['userfile']['size']['myfile'];    
        $config = [
            'upload_path'   => "./uploads/onboard",
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
            $admin_post['images'] = base_url()."uploads/onboard/".$dataInfo['file_name'];
        }
        $admin_post['slogans']  = $this->security->xss_clean($this->input->post('slogan'));
        $admin_post['status']       = $this->security->xss_clean($this->input->post('status'));
        $this->form_validation->set_rules('title', 'title','trim|required');
        $this->form_validation->set_rules('slogan', 'slogan','trim|required');
        $this->form_validation->set_rules('img_url', 'images','trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('edit_onboard',$data);       
            $this->load->view('home/footer'); // just the header file      
        } else {
            if($this->superadmin_model->updateOnboard($id,$admin_post) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Onboard updated successfully!');
                redirect('superadmin/onBoard',$page_data); 
            } else {
                $this->session->set_flashdata('edit_onboard','Something went wrong in database');
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('edit_onboard',$data);       
                $this->load->view('home/footer'); // just the header file
            }
        } 
    } else {
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('edit_onboard',$data);       
        $this->load->view('home/footer'); // just the header file 
    } 
  }

    function detailsOnboard($id) {

        $data['onboard'] = $this->superadmin_model->getOnboard($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('details_onboard', $data);
        $this->load->view('home/footer'); // just the footer file
    }
   
  function deleteOnboard($id) { 
    $this->superadmin_model->deleteOnboard($id);
    redirect(base_url()."superadmin/onboard");
    exit();     
  }

  public function termsCondition() {
    $data['all_terms'] = $this->superadmin_model->getTerms();
    $this->load->view('home/dashboard'); // just the header file
    $this->load->view('terms', $data);
    $this->load->view('home/footer'); // just the header file
  }

  public function addTerms() {
    $data['all_terms'] = $this->superadmin_model->getTerms();
    if($this->input->method() === 'post') {
        $this->session->set_flashdata('add_onboard', '');      
        $admin_post['title']        = $this->security->xss_clean($this->input->post('title'));
        $admin_post['description']  = $this->security->xss_clean($this->input->post('description'));
        $admin_post['status']  = 'Active';
        $config = [
          'upload_path'   => "./uploads/terms",
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
          $admin_post['image'] = base_url()."uploads/terms/".$image['file_name'];;
        }
        $this->form_validation->set_rules('title', 'title','trim|required');
        $this->form_validation->set_rules('description', 'description','trim|required');
        $this->form_validation->set_rules('img_url', 'images','trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_terms',$data);       
            $this->load->view('home/footer'); // just the header file
        } else {
        if($this->superadmin_model->addTerms($admin_post) == TRUE) {
            $this->session->set_flashdata('success_msg', 'Termas and condition saved successfully!');
            redirect('superadmin/termsCondition',$data); 
        } else {
            $this->session->set_flashdata('add_terms','Something went wrong in database');
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_terms',$data);       
            $this->load->view('home/footer'); // just the header file
          }
        } 
    } else {
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('add_terms',$data);       
        $this->load->view('home/footer'); // just the header file
    } 
  }

    function editTerms($id) {

        $data['all_terms']  = $this->superadmin_model->getTerms();
        $data['terms']      = $this->superadmin_model->getTerms($id);
        if($this->input->method() === 'post') {
            $this->session->set_flashdata('edit_onboard', '');
            $admin_post['title'] = $this->input->post('title');
            $files = $_FILES;
            $_FILES['userfile']['name']     = $files['userfile']['name']['myfile'];
            $_FILES['userfile']['type']     = $files['userfile']['type']['myfile'];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name']['myfile'];
            $_FILES['userfile']['error']    = $files['userfile']['error']['myfile'];
            $_FILES['userfile']['size']     = $files['userfile']['size']['myfile'];    
            $config = [
                'upload_path'   => "./uploads/onboard",
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
                $admin_post['image'] = "./uploads/onboard/".$dataInfo['file_name'];
            }
            $admin_post['description']  = $this->security->xss_clean($this->input->post('description'));
            $admin_post['status']       = $this->security->xss_clean($this->input->post('status'));
          
            $this->form_validation->set_rules('title', 'title','trim|required');
            $this->form_validation->set_rules('description', 'description','trim|required');
            $this->form_validation->set_rules('img_url', 'images','trim');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('edit_terms',$data);       
                $this->load->view('home/footer'); // just the header file      
            } else {

                if($this->superadmin_model->updateTerms($id,$admin_post) == TRUE) {
                    $this->session->set_flashdata('success_msg', 'Terms and condition updated successfully!');
                    redirect('superadmin/termsCondition',$page_data); 
                } else {
                    $this->session->set_flashdata('edit_terms','Something went wrong in database');
                    $this->load->view('home/dashboard'); // just the header file
                    $this->load->view('edit_terms',$data);       
                    $this->load->view('home/footer'); // just the header file
                }
            } 
        } else {
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('edit_terms',$data);       
            $this->load->view('home/footer'); // just the header file 
        } 
    }

    function detailsTerms($id) {

        $data['terms'] = $this->superadmin_model->getTerms($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('details_terms', $data);
        $this->load->view('home/footer'); // just the footer file
    }
    
    function deleteTerms($id) {
        
        $this->superadmin_model->deleteTerms($id);
        redirect(base_url().'superadmin/termsCondition'); 
        exit();     
    }
    
    public function appUser() {

      $data['all_appuser'] = $this->superadmin_model->getAppuser();
      $this->load->view('home/dashboard'); // just the header file
      $this->load->view('app_user', $data);
      $this->load->view('home/footer'); // just the header file
    }

    function editAppuser($id) {
        $data['all_appuser'] = $this->superadmin_model->getAppuser();
        $data['appuser']     = $this->superadmin_model->getAppuser($id);
        if($this->input->method() === 'post') {
            $this->session->set_flashdata('edit_appuser', '');
            $admin_post['user_name'] = $this->input->post('name');
            $files = $_FILES;
            $_FILES['userfile']['name']     = $files['userfile']['name']['myfile'];
            $_FILES['userfile']['type']     = $files['userfile']['type']['myfile'];
            $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name']['myfile'];
            $_FILES['userfile']['error']    = $files['userfile']['error']['myfile'];
            $_FILES['userfile']['size']     = $files['userfile']['size']['myfile'];    
            $config = [
  
                'upload_path'   => "./uploads/appuser",
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
                $admin_post['img_url'] = base_url()."uploads/appuser/".$dataInfo['file_name'];
            }
            $admin_post['mobile']   = $this->security->xss_clean($this->input->post('phone'));
            $admin_post['email']    = $this->security->xss_clean($this->input->post('email'));
           
            $this->form_validation->set_rules('name', 'name','trim|required');
            $this->form_validation->set_rules('phone', 'phone','trim|required|min_length[10]|max_length[12]');
            $this->form_validation->set_rules('img_url', 'images','trim');
            $this->form_validation->set_rules('email', 'email','trim|required|valid_email');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('edit_appuser',$data);       
                $this->load->view('home/footer'); // just the header file      
            } else {

                if($this->superadmin_model->updateAppuser($id,$admin_post) == TRUE) {
                    $this->session->set_flashdata('success_msg', 'Appuser updated successfully!');
                    redirect('superadmin/appUser',$page_data); 
                } else {
                    $this->session->set_flashdata('edit_appuser','Something went wrong in database');
                    $this->load->view('home/dashboard'); // just the header file
                    $this->load->view('edit_appuser',$data);       
                    $this->load->view('home/footer'); // just the header file
                }
            } 
        } else {
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('edit_appuser',$data);       
            $this->load->view('home/footer'); // just the header file 
        } 
    }

    function detailsAppuser($id) {

        $data['appuser'] = $this->superadmin_model->getAppuser($id);
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('details_appuser', $data);
        $this->load->view('home/footer'); // just the footer file
    }
    
    function deleteAppuser($id) {
        
        $this->superadmin_model->deleteAppuser($id);
        redirect(base_url().'superadmin/appUser'); 
        exit();     
    }
    public function appDoctor() {
      $data['all_appdoctor'] = $this->superadmin_model->getAppdoctor();
      $this->load->view('home/dashboard'); // just the header file
      $this->load->view('app_doctor', $data);
      $this->load->view('home/footer'); // just the header file
    }
    public function editAppdoctor($id) {

      $data['all_appdoctor'] = $this->superadmin_model->getAppdoctor();
      $data['appdoctor']     = $this->superadmin_model->getAppdoctor($id);
      if($this->input->method() === 'post') {
          $this->session->set_flashdata('edit_appdoctor', '');
          $admin_post['name'] = $this->input->post('name');
          $files = $_FILES;
          $_FILES['userfile']['name']     = $files['userfile']['name']['myfile'];
          $_FILES['userfile']['type']     = $files['userfile']['type']['myfile'];
          $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name']['myfile'];
          $_FILES['userfile']['error']    = $files['userfile']['error']['myfile'];
          $_FILES['userfile']['size']     = $files['userfile']['size']['myfile'];    
          $config = [
              'upload_path'   => "./uploads/appdoctor",
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
              $admin_post['img_url'] = base_url()."uploads/appdoctor/".$dataInfo['file_name'];
          }
          $admin_post['phone']   = $this->security->xss_clean($this->input->post('phone'));
          $admin_post['email']    = $this->security->xss_clean($this->input->post('email'));
          // $admin_post['profile']    = $this->security->xss_clean($this->input->post('profile'));
         
          $this->form_validation->set_rules('name', 'name','trim|required');
          $this->form_validation->set_rules('phone', 'phone','trim|required|min_length[10]|max_length[12]');
          $this->form_validation->set_rules('img_url', 'images','trim');
          $this->form_validation->set_rules('email', 'email','trim|required|valid_email');

          if ($this->form_validation->run() == FALSE) {
              $this->load->view('home/dashboard'); // just the header file
              $this->load->view('edit_appdoctor',$data);       
              $this->load->view('home/footer'); // just the header file      
          } else {

              if($this->superadmin_model->updateAppdoctor($id,$admin_post) == TRUE) {
                  $this->session->set_flashdata('success_msg', 'Appdoctor updated successfully!');
                  redirect('superadmin/appDoctor',$page_data); 
              } else {
                  $this->session->set_flashdata('edit_appdoctor','Something went wrong in database');
                  $this->load->view('home/dashboard'); // just the header file
                  $this->load->view('edit_appdoctor',$data);       
                  $this->load->view('home/footer'); // just the header file
              }
          } 
      } else {
          $this->load->view('home/dashboard'); // just the header file
          $this->load->view('edit_appdoctor',$data);       
          $this->load->view('home/footer'); // just the header file 
      } 
    }
  function detailsAppdoctor($id) {
    $data['appdoctor'] = $this->superadmin_model->getAppdoctor($id);
    $this->load->view('home/dashboard'); // just the header file
    $this->load->view('details_appdoctor', $data);
    $this->load->view('home/footer'); // just the footer file
  }

  function deleteAppdoctor($id) {
    // var_dump('expression');die;
    $this->superadmin_model->deleteAppdoctor($id);
    redirect(base_url().'superadmin/appDoctor'); 
    exit();     
  }

  public function specialist() {
    $data['all_specialist'] = $this->superadmin_model->get_specialist();
    $this->load->view('home/dashboard'); // just the header file
    $this->load->view('specialist', $data);
    $this->load->view('home/footer'); // just the header file
  }

  public function add_specialist() {
    $data['all_specialist'] = $this->superadmin_model->get_specialist();
    if($this->input->method() === 'post') {
        $this->session->set_flashdata('add_specialist', '');      
        $admin_post['title']    = $this->security->xss_clean($this->input->post('title'));
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
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_specialist',$data);       
            $this->load->view('home/footer'); // just the header file
        } else {
        if($this->superadmin_model->add_specialist($admin_post) == TRUE) {
            $this->session->set_flashdata('success_msg', 'Specialist saved successfully!');
            redirect('superadmin/specialist',$data); 
        } else {
            $this->session->set_flashdata('add_specialist','Something went wrong in database');
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('add_specialist',$data);       
            $this->load->view('home/footer'); // just the header file
          }
      } 
   } else {
      $this->load->view('home/dashboard'); // just the header file
      $this->load->view('add_specialist',$data);       
      $this->load->view('home/footer'); // just the header file
    } 
  }

  public function edit_specialist($id) {
    $data['all_specialist']   = $this->superadmin_model->get_specialist();
    $data['specialist']       = $this->superadmin_model->get_specialist($id);

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
        // var_dump($admin_post);die;


        $this->form_validation->set_rules('title', 'title','trim|required');
        // $this->form_validation->set_rules('status', 'status','trim|required');
        $this->form_validation->set_rules('img_url', 'images','trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('edit_specialist',$data);       
            $this->load->view('home/footer'); // just the header file      
        } else {

            if($this->superadmin_model->update_specialist($id,$admin_post) == TRUE) {
              // var_dump('expression');die;
                $this->session->set_flashdata('success_msg', 'Specialist updated successfully!');
                redirect('superadmin/specialist',$page_data); 
            } else {
               // var_dump('dsds');die;
                $this->session->set_flashdata('edit_specialist','Something went wrong in database');
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('edit_specialist',$data);       
                $this->load->view('home/footer'); // just the header file
            }
        } 
    } else {
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('edit_specialist',$data);       
        $this->load->view('home/footer'); // just the header file 
    } 
  }

  public function delete_specialist($id) { 
    $this->superadmin_model->delete_specialist($id);
    redirect(base_url()."superadmin/specialist");
    exit();     
  }
  public function details_specialist($id) {
    $data['specialist'] = $this->superadmin_model->get_specialist($id);
    $this->load->view('home/dashboard'); // just the header file
    $this->load->view('specialist_details', $data);
    $this->load->view('home/footer'); // just the footer file
  }

   public function banners() {
    $data['all_banners'] = $this->superadmin_model->get_banners();
    $this->load->view('home/dashboard'); // just the header file
    $this->load->view('banners', $data);
    $this->load->view('home/footer'); // just the header file
  }

   public function get_banner_list() {
    $requestData = $_REQUEST;
    $start = $requestData['start'];
    $limit = $requestData['length'];
    $search = $this->input->post('search')['value'];

        if (!empty($search)) {
            $data['banners'] = $this->superadmin_model->get_banners_BySearch($search);
        } else {
            $data['banners'] = $this->superadmin_model->get_banners();
        } 
    $i = 0;
    foreach ($data['banners'] as $banner) {
        $i = $i + 1;
        // $options1 = '<a type="button" class="btn btn-info btn-xs btn_width editbutton" title="' . lang('edit') . '" data-toggle="modal" data-id="' . $doctor->id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';
        $options1 = '<a class="btn btn-info btn-xs btn_width editbutton" href="superadmin/edit_banner?id=' . $banner->id . '"><i class="fa fa-edit"> </i> ' . lang('edit') . '</a>';

        $options2 = '<a class="btn btn-info btn-xs btn_width delete_button" href="superadmin/delete_banner?id=' . $banner->id . '" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"> </i> ' . lang('delete') . '</a>';
        $image = "<img src='$banner->image'style='width: 100px;'>";
        $info[] = array(
          $i,
          $banner->title,
          $banner->category,
          $banner->url,
          $image,
          $banner->status,
          $options1 . ' ' . $options2
        );
    }
    if (!empty($data['banners'])) {
        $output = array(
          "draw" => intval($requestData['draw']),
          "recordsTotal" => $this->db->get('banners')->num_rows(),
          "recordsFiltered" => $this->db->get('banners')->num_rows(),
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

  public function add_banner() {
    $data['all_specialist'] = $this->superadmin_model->get_banners();
    if($this->input->method() === 'post') {
      $this->session->set_flashdata('add_specialist', '');      
      $admin_post['title']   = $this->security->xss_clean($this->input->post('title'));
      $admin_post['url']     = $this->security->xss_clean($this->input->post('url'));
      $admin_post['category']= $this->security->xss_clean($this->input->post('category'));
      $admin_post['status']  = 'Active';
      $config = [
        'upload_path'   => "./uploads/banner_images",
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
        $admin_post['image'] = "uploads/banner_images/".$image['file_name'];;
      }
      $this->load->library('form_validation');
      $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
      $this->form_validation->set_rules('title', 'title','trim|required');
      if ($this->form_validation->run() == FALSE) {
          $this->load->view('home/dashboard'); // just the header file
          $this->load->view('add_banner',$data);       
          $this->load->view('home/footer'); // just the header file
      } else {
      if($this->superadmin_model->add_banner($admin_post) == TRUE) {
          $this->session->set_flashdata('success_msg', 'Specialist saved successfully!');
          redirect('superadmin/banners',$data); 
      } else {
          $this->session->set_flashdata('add_banner','Something went wrong in database');
          $this->load->view('home/dashboard'); // just the header file
          $this->load->view('add_banner',$data);       
          $this->load->view('home/footer'); // just the header file
        }
      } 
    } else {
      $this->load->view('home/dashboard'); // just the header file
      $this->load->view('add_banner',$data);       
      $this->load->view('home/footer'); // just the header file
    } 
  }

  public function edit_banner() {
    $id = $this->input->get('id');
    $data['all_banners']   = $this->superadmin_model->get_banners();
    $data['banner']       = $this->superadmin_model->get_banners($id);
    if($this->input->method() === 'post') {
        $this->session->set_flashdata('edit_banner', '');

        $admin_post['title'] = $this->input->post('title');
        $admin_post['url'] = $this->input->post('url');
        $admin_post['category'] = $this->input->post('category');
        // var_dump($admin_post['img_url']);die;

        $files = $_FILES;
        $_FILES['userfile']['name']     = $files['userfile']['name']['myfile'];
        $_FILES['userfile']['type']     = $files['userfile']['type']['myfile'];
        $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name']['myfile'];
        $_FILES['userfile']['error']    = $files['userfile']['error']['myfile'];
        $_FILES['userfile']['size']     = $files['userfile']['size']['myfile'];    
        $config = [
            'upload_path'   => "./uploads/banner_images",
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
            $admin_post['image'] = "uploads/banner_images/".$dataInfo['file_name'];
        }
        $admin_post['status']       = $this->security->xss_clean($this->input->post('status'));
        $this->form_validation->set_rules('title', 'title','trim|required');
        // $this->form_validation->set_rules('img_url', 'images','trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/dashboard'); // just the header file
            $this->load->view('edit_banner',$data);       
            $this->load->view('home/footer'); // just the header file      
        } else {
          // var_dump($admin_post);die;
            if($this->superadmin_model->update_banner($id,$admin_post) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Onboard updated successfully!');
                redirect('superadmin/banners',$page_data); 
            } else {
                $this->session->set_flashdata('edit_banner','Something went wrong in database');
                $this->load->view('home/dashboard'); // just the header file
                $this->load->view('edit_banner',$data);       
                $this->load->view('home/footer'); // just the header file
            }
        } 
    } else {
        $this->load->view('home/dashboard'); // just the header file
        $this->load->view('edit_banner',$data);       
        $this->load->view('home/footer'); // just the header file 
    } 
  }
  public function delete_banner() {
    $id = $this->input->get('id');
    $this->superadmin_model->delete_banner($id);
    $this->session->set_flashdata('feedback', lang('deleted'));
    redirect('superadmin/banners');
  }
}
