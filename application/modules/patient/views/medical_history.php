

<!--sidebar end-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <section class="col-md-3">
      <header class="panel-heading clearfix">
        <div class="">
          <?php echo lang('patient'); ?> <?php echo lang('info'); ?> 
        </div>

      </header> 




      <aside class="profile-nav">
        <section class="med-profile-nav">
          <div class="user-heading round">
            <?php if (!empty($patient->img_url)) { ?>
              <a href="#">
                <img src="<?php echo $patient->img_url; ?>" alt="">
              </a>
            <?php } ?>
            <h1> <?php echo $patient->name; ?> </h1>
            <p> <?php echo $patient->email; ?> </p>
            <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
              <button type="button" class="btn btn-info btn-xs btn_width editPatient" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $patient->id; ?>"><i class="fa fa-edit"> </i> <?php echo lang('edit'); ?></button>  
            <?php } ?>
          </div>

          <ul class="nav nav-pills nav-stacked">
            <!--  <li class="active"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?><span class="label pull-right r-activity"><?php echo $patient->name; ?></span></li> -->
            <li>  <?php echo lang('patient_id'); ?> <span class="label pull-right r-activity"><?php echo $patient->id; ?></span></li>
            <li>  <?php echo lang('gender'); ?><span class="label pull-right r-activity"><?php echo $patient->sex; ?></span></li>
            <li>  <?php echo lang('birth_date'); ?><span class="label pull-right r-activity"><?php echo $patient->birthdate; ?></span></li>
            <li>  <?php echo lang('phone'); ?><span class="label pull-right r-activity"><?php echo $patient->phone; ?></span></li>
            <li>  <?php echo lang('email'); ?><span class="label pull-right r-activity"><?php echo $patient->email; ?></span></li>
            <li class="li-col-address">  <?php echo lang('address'); ?><span class="pull-right li-col-address"><?php echo $patient->address; ?></span></li>

          </ul>

        </section>
      </aside>


    </section>





    <section class="col-md-9">
      <header class="panel-heading clearfix">
        <div class="col-md-7">
          <?php echo lang('history'); ?> | <?php echo $patient->name; ?>
        </div>

      </header>

      <section class="panel-body">   
        <header class="panel-heading tab-bg-dark-navy-blueee history-panel-heading">
          <ul class="nav nav-tabs tab-history"> 
            <li class="active">
              <a data-toggle="tab" href="#appointments"><?php echo lang('appointments'); ?></a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#vital_signs"><?php echo lang('vital_signs'); ?></a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#home"><?php echo lang('case_history'); ?></a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#about"><?php echo lang('prescription'); ?></a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#lab"><?php echo lang('lab'); ?></a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#profile"><?php echo lang('documents'); ?></a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#contact"><?php echo lang('bed'); ?></a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#emergency"><?php echo lang('emergency'); ?></a> 
            </li>
            <li class="">
              <a data-toggle="tab" href="#timeline"><?php echo lang('timeline'); ?></a> 
            </li>
          </ul>
        </header>
        <div class="panel history-panel-heading">
          <div class="tab-content med-profile-nav">
            <div id="appointments" class="tab-pane active">
              <div class="">
                <?php if (!$this->ion_auth->in_group('Patient')) { ?>
<!--                   <div class=" no-print">
                    <a class="btn btn-info btn_width btn-xs btn-xs-margin" data-toggle="modal" href="#addAppointmentModal"> 
                      <i class="fa fa-plus-circle"> </i> <?php //echo lang('add_new'); ?> 
                    </a>
                  </div> -->
                <?php } else { ?>
                  <div class=" no-print" >
                    <a class="btn btn-info btn_width btn-xs" data-toggle="modal" href="#addAppointmentModal" >
                      <i class="fa fa-plus-circle"> </i> <?php echo lang('request_a_appointment'); ?> 
                    </a>
                  </div>
                <?php } ?>
                <div class="adv-table editable-table ">
                  <table class="table table-striped table-hover table-bordered" id="">
                    <thead>
                      <tr>
                        <th><?php echo lang('date'); ?></th>
                        <th><?php echo lang('time_slot'); ?></th>
                        <th><?php echo lang('doctor'); ?></th>
                        <th><?php echo lang('status'); ?></th>
                        <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                          <th class="no-print"><?php echo lang('options'); ?></th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($appointments as $appointment) { ?>
                        <tr class="">

                          <td><?php echo date('d-m-Y', $appointment->date); ?></td>
                          <td><?php echo $appointment->time_slot; ?></td>
                          <td>
                            <?php
                            $doctor_details = $this->doctor_model->getDoctorById($appointment->doctor);
                            if (!empty($doctor_details)) {
                              $appointment_doctor = $doctor_details->name;
                            } else {
                              $appointment_doctor = '';
                            }
                            echo $appointment_doctor;
                            ?>
                          </td>
                          <td><?php echo $appointment->status; ?></td>
                          <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                            <td class="no-print">
                              <button type="button" class="btn btn-info btn-xs btn_width editAppointmentButton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $appointment->id; ?>"><i class="fa fa-edit"></i> </button>   
                              <a class="btn btn-info btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="appointment/delete?id=<?php echo $appointment->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                            </td>
                          <?php } ?>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        
            <div id="vital_signs" class="tab-pane"> <div class="">
              <?php if ($this->ion_auth->in_group(array('Doctor','admin'))) { ?>
                <div class=" no-print">
                <a class="btn btn-info btn_width btn-xs" data-toggle="modal" href="#addVitalSignsModel">
                    <i class="fa fa-plus-circle"> </i> <?php echo "Add new vitals"; ?> 
                  </a>
                </div>
              <?php } ?>
              <div class="adv-table editable-table adv-table1" >
                <table class="table table-striped table-hover table-bordered table-responsive tab-vitals"  id="">
                  <thead>
                    <tr>
                      <th><?php echo lang('date'); ?></th>
                      <th><?php echo "Weight(kg)"; ?></th>
                      <th><?php echo "Height(cm)"; ?></th>
                      <th><?php echo "BMI"; ?></th>
                      <th><?php echo "Heart Rate(bpm)"; ?></th>
                      <th><?php echo "Blood Pressure(mmHg)"; ?></th>
                      <th><?php echo "Temperature(°c)"; ?></th>
                      <th><?php echo "Oxygen Saturation(%)"; ?></th>
                      <th><?php echo "Respiratory Rate (RR)"; ?></th>
                  

                      <th class="no-print"><?php echo lang('options'); ?></th>
                    </tr>
                  </thead>
                  <tbody>
      
                   <?php foreach ($vital_signs as $vital_sign)
                   
                   { ?>
                    <tr>
                      <td><?php echo $vital_sign->date; ?></td>
                      <td><?php echo $vital_sign->weight; ?></td>
                      <td><?php echo $vital_sign->height; ?></td>
                      <td><?php echo round($vital_sign->bmi, 2); ?></td>
                      <td><?php echo $vital_sign->heart_rate; ?></td>
                      <td><?php echo $vital_sign->blood_pressure; ?></td>
                      <td><?php echo $vital_sign->body_temperature; ?></td>
                      <td><?php echo $vital_sign->oxygen_saturation; ?></td>
                      <td><?php echo $vital_sign->respiratory_rate; ?></td>
                      
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


            <div id="home" class="tab-pane">
              <div class="">

                <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                  <div class=" no-print">
                    <a class="btn btn-info btn_width btn-xs" data-toggle="modal" href="#myModal">
                      <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?> 
                    </a>
                  </div>
                <?php } ?>

                <div class="adv-table editable-table ">


                  <table class="table table-striped table-hover table-bordered" id="">
                    <thead>
                      <tr>
                        <th><?php echo lang('date'); ?></th>
                        <th><?php echo lang('title'); ?></th>
                        <th><?php echo lang('description'); ?></th>
                        <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                          <th class="no-print"><?php echo lang('options'); ?></th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($medical_histories as $medical_history) { ?>
                        <tr class="">

                          <td><?php echo date('d-m-Y', $medical_history->date); ?></td>
                          <td><?php echo $medical_history->title; ?></td>
                          <td><?php echo $medical_history->description; ?></td>
                          <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                            <td class="no-print">
                              <button type="button" class="btn btn-info btn-xs btn_width editbutton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $medical_history->id; ?>"><i class="fa fa-edit"></i> </button>   
                              <a class="btn btn-info btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="patient/deleteCaseHistory?id=<?php echo $medical_history->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> </a>
                            </td>
                          <?php } ?>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>




                                    <!--
                                                                        <form role="form" action="patient/addMedicalHistory" class="clearfix" method="post" enctype="multipart/form-data">
                                                                            <div class="form-group col-md-12">
                                                                                <label class=""> <?php echo lang('case'); ?> <?php echo lang('history'); ?></label>
                                                                                <div class="">
                                                                                    <textarea class="ckeditor form-control" name="description" id="description" value="" rows="100" cols="50">      
                                    <?php foreach ($medical_histories as $medical_history) { ?>         
                                                                                                                                                                                                <td><?php echo $medical_history->description; ?></td>
                                    <?php } ?>
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                    
                                                                            <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                                                                            <input type="hidden" name="id" value='<?php echo $medical_history->id ?>'>
                                                                            <div class="form-group col-md-12">
                                                                                <button type="submit" name="submit" class="btn btn-info submit_button pull-right"><?php echo lang('save'); ?></button>
                                                                            </div>
                                                                        </form>
                                    
                                                                      -->



                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                <div id="about" class="tab-pane"> <div class="">
                                                                  <?php if ($this->ion_auth->in_group(array('Doctor','admin'))) { ?>
                                                                    <div class=" no-print">
                                                                      <a class="btn btn-info btn_width btn-xs" href="prescription/addPrescriptionView">
                                                                        <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?> 
                                                                      </a>
                                                                    </div>
                                                                  <?php } ?>
                                                                  <div class="adv-table editable-table ">
                                                                    <table class="table table-striped table-hover table-bordered" id="">
                                                                      <thead>
                                                                        <tr>

                                                                          <th><?php echo lang('date'); ?></th>
                                                                          <th><?php echo lang('doctor'); ?></th>
                                                                          <th><?php echo lang('medicine'); ?></th>
                                                                          <th class="no-print"><?php echo lang('options'); ?></th>
                                                                        </tr>
                                                                      </thead>
                                                                      <tbody>
                                                                        <?php foreach ($prescriptions as $prescription) { ?>
                                                                          <tr class="">
                                                                            <td><?php echo date('m/d/Y', $prescription->date); ?></td>
                                                                            <td>
                                                                              <?php
                                                                              $doctor_details = $this->doctor_model->getDoctorById($prescription->doctor);
                                                                              if (!empty($doctor_details)) {
                                                                                $prescription_doctor = $doctor_details->name;
                                                                              } else {
                                                                                $prescription_doctor = '';
                                                                              }
                                                                              echo $prescription_doctor;
                                                                              ?>

                                                                            </td>
                                                                            <td>

                                                                              <?php
                                                                              if (!empty($prescription->medicine)) {
                                                                                $medicine = explode('###', $prescription->medicine);

                                                                                foreach ($medicine as $key => $value) {
                                                                                  $medicine_id = explode('***', $value);
                                                                                  $medicine_details = $this->medicine_model->getMedicineById($medicine_id[0]);
                                                                                  if (!empty($medicine_details)) {
                                                                                    $medicine_name_with_dosage = $medicine_details->name . ' -' . $medicine_id[1];
                                                                                    $medicine_name_with_dosage = $medicine_name_with_dosage . ' | ' . $medicine_id[3] . '<br>';
                                                                                    rtrim($medicine_name_with_dosage, ',');
                                                                                    echo '<p>' . $medicine_name_with_dosage . '</p>';
                                                                                  }
                                                                                }
                                                                              }
                                                                              ?>


                                                                            </td>
                                                                            <td class="no-print">
                                                                              <a class="btn-xs green" href="prescription/viewPrescription?id=<?php echo $prescription->id; ?>"><i class="fa fa-eye"> <?php echo lang('view'); ?> </i></a> 
                                                                              <?php
                                                                              if ($this->ion_auth->in_group('Doctor')) {
                                                                                $current_user = $this->ion_auth->get_user_id();
                                                                                $doctor_table_id = $this->doctor_model->getDoctorByIonUserId($current_user)->id;
                                                                                if ($prescription->doctor == $doctor_table_id) {
                                                                                  ?>
                                                                                  <a type="button" class="btn-info btn-xs btn_width" data-toggle="modal" href="prescription/editPrescription?id=<?php echo $prescription->id; ?>"><i class="fa fa-edit"></i> <?php echo lang('edit'); ?></a>   
                                                                                  <a class="btn-info btn-xs btn_width delete_button" href="prescription/delete?id=<?php echo $prescription->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i> <?php echo lang('delete'); ?></a>
                                                                                  <?php
                                                                                }
                                                                              }
                                                                              ?>
                                                                              <a class="btn-xs invoicebutton" title="<?php echo lang('print'); ?>" style="color: #fff;" href="prescription/viewPrescriptionPrint?id=<?php echo $prescription->id; ?>"target="_blank"> <i class="fa fa-print"></i> <?php echo lang('print'); ?></a>
                                                                            </td>
                                                                          </tr>
                                                                        <?php } ?>
                                                                      </tbody>
                                                                    </table>
                                                                  </div>
                                                                </div>
                                                              </div>

                                                              <div id="lab" class="tab-pane"> <div class="">
                                                                <?php if ($this->ion_auth->in_group(array('Doctor','admin'))) { ?>
                                                                    <div class="no-print">
                                                                      <a class="btn btn-info btn_width btn-xs" href="lab/">
                                                                        <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?> 
                                                                      </a>
                                                                    </div>
                                                                  <?php } ?>
                                                                <div class="adv-table editable-table ">
                                                                  <table class="table table-striped table-hover table-bordered" id="">
                                                                    <thead>
                                                                      <tr>
                                                                        <th><?php echo lang('id'); ?></th>
                                                                        <th><?php echo lang('date'); ?></th>
                                                                        <th><?php echo lang('doctor'); ?></th>
                                                                        <th class="no-print"><?php echo lang('options'); ?></th>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                      <?php foreach ($labs as $lab) { ?>
                                                                        <tr class="">
                                                                          <td><?php echo $lab->id; ?></td>
                                                                          <td><?php echo date('m/d/Y', $lab->date); ?></td>
                                                                          <td>
                                                                            <?php
                                                                            $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
                                                                            if (!empty($doctor_details)) {
                                                                              $lab_doctor = $doctor_details->name;
                                                                            } else {
                                                                              $lab_doctor = '';
                                                                            }
                                                                            echo $lab_doctor;
                                                                            ?>
                                                                          </td>
                                                                          <td class="no-print">
                                                                            <a class="btn btn-info btn-xs btn_width" href="lab/invoice?id=<?php echo $lab->id; ?>"><i class="fa fa-eye"> <?php echo lang('report'); ?> </i></a>   
                                                                          </td>
                                                                        </tr>
                                                                      <?php } ?>
                                                                    </tbody>
                                                                  </table>
                                                                </div>
                                                              </div>
                                                            </div>



                                                            <div id="profile" class="tab-pane"> <div class="">
                                                              <div class=" no-print">
                                                                <a class="btn btn-info btn_width btn-xs" data-toggle="modal" href="#myModal1">
                                                                  <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?> 
                                                                </a>
                                                              </div>
                                                              <div class="adv-table editable-table ">
                                                                <div class="">
                                                            
                                                                  <?php foreach ($patient_materials as $patient_material) { ?>
                                                                    <div class="panel col-md-3 addnew-panel-col-md-3">
                                                                      <div class="post-info">
                                                                        <a class="example-image-link" href="<?php echo $patient_material->url; ?>" data-lightbox="example-1">
                                                                        <?php $pdf_match = "/.pdf/i";
                                                                            if(preg_match($pdf_match,$patient_material->url)==1){ ?>
                                                                              <a href="<?php echo $patient_material->url ;?>" target="blank"> <img class="example-image" src="<?php echo base_url().'assets/images/pdf_icon.png';?>" alt="Download PDF" height="100" width="100"/></a>
                                                                            <?php }
                                                                            else{ ?>
                                                                               <img class="example-image" src="<?php echo $patient_material->url; ?>" alt="Image-1" height="100" width="100"/>
                                                                              
                                                                           <?php }?>
                                                                        </div>
                                                                        <div class="post-info">
                                                                          
                                                                          <?php
                                                                          if (!empty($patient_material->title)) {
                                                                            echo $patient_material->title;
                                                                          }
                                                                          ?>

                                                                        </div>
                                                                        <p></p>
                                                                        <div class="post-info">

                                                                          <a class="btn btn-info btn-xs btn_width" href="<?php echo $patient_material->url; ?>" download> <?php echo lang('download'); ?> </a>
                                                                          <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                                                            <a class="btn btn-info btn-xs btn_width" title="<?php echo lang('delete'); ?>" href="patient/deletePatientMaterial?id=<?php echo $patient_material->id; ?>"onclick="return confirm('Are you sure you want to delete this item?');"> X </a>
                                                                          <?php } ?>

                                                                        </div>

                                                                        <hr>

                                                                      </div>
                                                                    <?php } ?>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div id="contact" class="tab-pane"> 
                                                              <div class="">
                                                                <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                                                                  <div class=" no-print">
                                                                    <a class="btn btn-info btn_width btn-xs" data-toggle="modal" href="#myModa3">
                                                                      <i class="fa fa-plus-circle"> </i> <?php echo lang('add_new'); ?> 
                                                                    </a>
                                                                  </div>
                                                                <?php } ?>
                                                                <div class="adv-table editable-table ">
                                                                  <table class="table table-striped table-hover table-bordered" id="">
                                                                    <thead>
                                                                      <tr>
                                                                        <th><?php echo lang('bed_id'); ?></th>
                                                                        <th><?php echo lang('alloted_time'); ?></th>
                                                                        <th><?php echo lang('discharge_time'); ?></th>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                      <style>

                                                                        .img_url{
                                                                          height:20px;
                                                                          width:20px;
                                                                          background-size: contain; 
                                                                          max-height:20px;
                                                                          border-radius: 100px;
                                                                        }

                                                                      </style>

                                                                      <?php foreach ($beds as $bed) { ?>
                                                                        <tr class="">
                                                                          <td><?php echo $bed->bed_id; ?></td>            
                                                                          <td><?php echo $bed->a_time; ?></td>
                                                                          <td><?php echo $bed->d_time; ?></td>
                                                                        </tr>
                                                                      <?php } ?>
                                                                    </tbody>
                                                                  </table>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div id="emergency" class="tab-pane"> 
                                                              <div class="">
                                                                <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                                                                  <div class=" no-print">
                                                                    <a class="btn btn-info btn_width btn-xs" data-toggle="modal" data-target="#emergency_modal" >
                                                                      <i class="fa fa-plus-circle"> </i> <?php echo lang('edit'); ?> 
                                                                    </a>
                                                                  </div>
                                                                <?php } ?>
                                                                <div class="adv-table editable-table ">
                                                                  <table class="table table-striped table-hover table-bordered" id="">
                                                                    <tbody>
                                                                      <tr class="">
                                                                        <td><?php echo lang('name'); ?></td>            
                                                                        <td><?php echo $patient->name; ?></td>            
                                                                      </tr>
                                                                      <tr class="">
                                                                        <td><?php echo lang('email'); ?></td>            
                                                                        <td><?php echo $patient->email; ?></td>         
                                                                      </tr>
                                                                      <tr class="">
                                                                        <td><?php echo lang('phone'); ?></td>            
                                                                        <td><?php echo $patient->phone; ?></td>           
                                                                      </tr>
                                                                      <tr class="">
                                                                        <td><?php echo lang('sex'); ?></td>            
                                                                        <td><?php echo $patient->sex; ?></td>           
                                                                      </tr>
                                                                      <tr class="">
                                                                        <td><?php echo lang('birth_date'); ?></td>
                                                                        <td><?php echo $patient->birthdate; ?></td>
                                                                      </tr>
                                                                      <tr class="">
                                                                        <td>Blood group</td>
                                                                        <td><?php echo $patient->bloodgroup; ?></td>
                                                                      </tr>
                                                                      <tr class="">
                                                                        <td>Person responsible(party) for bill</td>
                                                                        <td><?php echo $patient->insure_name1; ?></td>
                                                                      </tr>
                                                                      <tr class="">
                                                                        <td>Address</td>
                                                                        <td><?php echo $patient->insure_address1; ?></td>
                                                                      </tr>
                                                                      <tr class="">
                                                                        <td>Occupation</td>
                                                                        <td><?php echo $patient->insure_occupation1; ?></td>
                                                                      </tr>
                                                                      <tr class="">
                                                                        <td>Employer address</td>
                                                                        <td><?php echo $patient->insure_employer_address; ?></td>
                                                                      </tr>
                                                                      <tr class="">
                                                                        <td>Employer phone no</td>
                                                                        <td><?php echo $patient->insure_employer_phone; ?></td>
                                                                      </tr>
                                                                      <tr class="">
                                                                        <td>Patient’s relationship to subscriber</td>
                                                                        <td><?php echo $patient->insure_relationship; ?></td>
                                                                      </tr>
                                                                      <tr class="">
                                                                        <td>IN CASE OF EMERGENCY</td>
                                                                        <td><?php echo $patient->insure_emergency_contact; ?></td>
                                                                      </tr>
                                                                    </tbody>
                                                                  </table>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div id="timeline" class="tab-pane"> 
                                                              <div class="">
                                                                <div class="">
                                                                  <section class="panel ">
                                                                    <header class="panel-heading">
                                                                      Timeline
                                                                    </header>
                                        <!--
                                        <div class=" profile-activity" >
                                            <h5 class="pull-right">12 August 2013</h5>
                                            <div class="activity terques">
                                                <span>
                                                    <i class="fa fa-shopping-cart"></i>
                                                </span>
                                                <div class="activity-desk">
                                                    <div class="panel">
                                                        <div class="">
                                                            <div class="arrow"></div>
                                                            <i class=" fa fa-clock-o"></i>
                                                            <h4>10:45 AM</h4>
                                                            <p>Purchased new equipments for zonal office setup and stationaries.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      -->

                                      <?php
                                      if (!empty($timeline)) {
                                        krsort($timeline);
                                        foreach ($timeline as $key => $value) {
                                          echo $value;
                                        }
                                      }
                                      ?>

                                    </section>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </section>

                      </section>



                    </section>
                    <!-- page end-->
                  </section>
                </section>
                <!--main content end-->
                <!--footer start-->




                <!-- Add Patient Material Modal-->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">   <?php echo lang('add'); ?> <?php echo lang('files'); ?></h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" action="patient/addPatientMaterial" class="clearfix row" method="post" enctype="multipart/form-data">

                          <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"> <?php echo lang('title'); ?></label>
                            <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"> <?php echo lang('file'); ?></label>
                            <input type="file" name="img_url">
                          </div>

                          <input type="hidden" name="patient" value='<?php echo $patient->id; ?>'>

                          <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
                          </div>
                        </form>

                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>
                <!-- Add Patient Modal-->


                <!-- Add Medical History Modal-->
                <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">  <?php echo lang('add_case'); ?></h4>
                      </div> 
                      <div class="modal-body">
                        <form role="form" action="patient/addMedicalHistory" class="clearfix row" method="post" enctype="multipart/form-data">
                          <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                            <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="" readonly="">
                          </div>
                          <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo lang('title'); ?></label>
                            <input type="text" class="form-control form-control-inline input-medium" name="title" id="exampleInputEmail1" value='' placeholder="">
                          </div>
                          <div class="form-group col-md-12">
                            <label class=""><?php echo lang('description'); ?></label>
                            <div class="">
                              <textarea class="ckeditor form-control" name="description" value="" rows="10"></textarea>
                            </div>
                          </div>

                          <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                          <input type="hidden" name="id" value=''>
                          <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-info submit_button pull-right">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>

                <!-- Add Medical History Modal-->

                <!-- Edit Medical History Modal-->
                <div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">  <?php echo lang('edit_case'); ?></h4>
                      </div>
                      <div class="modal-body">
                        <form role="form" id="medical_historyEditForm" class="clearfix row" action="patient/addMedicalHistory" method="post" enctype="multipart/form-data">
                          <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                            <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="" readonly="">
                          </div>
                          <div class="form-group col-md-12">
                            <label for="exampleInputEmail1"><?php echo lang('title'); ?></label>
                            <input type="text" class="form-control form-control-inline input-medium" name="title" id="exampleInputEmail1" value='' placeholder="">
                          </div>
                          <div class="form-group col-md-12">
                            <label class=""><?php echo lang('description'); ?></label>
                            <div class="">
                              <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="10"></textarea>
                            </div>
                          </div>
                          <input type="hidden" name="patient_id" value='<?php echo $patient->id; ?>'>
                          <input type="hidden" name="id" value=''>
                          <div class="form-group col-md-12">
                            <button type="submit" name="submit" class="btn btn-info submit_button pull-right">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>

                <?php
                $current_user = $this->ion_auth->get_user_id();
                if ($this->ion_auth->in_group('Doctor')) {
                  $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
                }
                ?>


                <!-- Add Appointment Modal-->
                <div class="modal fade" id="addAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">   <?php echo lang('add_appointment'); ?></h4>
                      </div>
                      <div class="modal-body">
                    <form role="form" action="appointment/addNew" class="clearfix row" method="post" enctype="multipart/form-data">
                          <div class="col-md-4 panel">
                            <label for="exampleInputEmail1">  <?php echo lang('patient'); ?></label>
                            <select class="form-control m-bot15 js-example-basic-single pos_select" id="pos_select" name="patient" value=''> 
                              <option value="">Select .....</option>
                              <option value="<?php echo $patient->id; ?>"><?php echo $patient->name; ?> </option>
                            </select>
                          </div>
                          <div class="col-md-4 panel">
                            <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?></label>
                            <select class="form-control m-bot15" id="adoctors" name="doctor" value=''>  

                            </select>
                          </div>

                          <div class="col-md-4 panel">
                            <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                            <input type="text" class="form-control default-date-picker" id="date" readonly="" name="date" id="exampleInputEmail1" value='' placeholder="">
                          </div>

                          <div class="col-md-6 panel">
                            <label class=""><?php echo lang('available_slots'); ?></label> 
                            <select class="form-control m-bot15" name="time_slot" id="aslots" value=''> 

                            </select>
                          </div>

                          <div class="col-md-6 panel"> 
                            <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                            <select class="form-control m-bot15" name="status" value=''>

                              <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                                <option value="Pending Confirmation" <?php
                              ?> > <?php echo lang('pending_confirmation'); ?> </option>
                              <option value="Confirmed" <?php
                            ?> > <?php echo lang('confirmed'); ?> </option>
                            <option value="Treated" <?php
                          ?> > <?php echo lang('treated'); ?> </option>
                          <option value="Cancelled" <?php ?> > <?php echo lang('cancelled'); ?> </option>
                        <?php } else { ?>
                          <option value="Requested" <?php ?> > <?php echo lang('requested'); ?> </option> 
                        <?php } ?>
                      </select>
                    </div>

                    <div class="col-md-8 panel">
                      <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                      <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
                    </div>




                    <div class="col-md-5 panel">
                      <input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?><br>
                    </div>

                    <input type="hidden" name="redirect" value='patient/medicalHistory?id=<?php echo $patient->id; ?>'>

                    <input type="hidden" name="request" value='<?php
                    if ($this->ion_auth->in_group(array('Patient'))) {
                      echo 'Yes';
                    }
                  ?>'>

                  <div class="col-md-12 panel">
                    <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
                  </div>

                </form>

              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
        <!-- Add Appointment Modal-->

                  <!-- Add vital signs-->
                  <div class="modal fade" id="addVitalSignsModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog modal-lg"  >
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">   <?php echo "Add Vital Signs"; ?></h4>
                      </div>
                      <div class="modal-body">
                    <form role="form" action="patient/addVitalsigns" class="clearfix row" method="post" enctype="multipart/form-data">
         
                    <div class="form-group col-md-6">
                            <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                            <input type="text" class="form-control default-date-picker" id="date" readonly="" name="date"   placeholder="">
                          </div>

                       
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo "Height (Cm):"; ?></label>
                        <input type="text" class="form-control" name="height" id="height" value='' placeholder="">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo "Weight (Kg):"; ?></label>
                        <input type="text" class="form-control" name="weight" id="weight" value='' placeholder="">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo "BMI:"; ?></label>
                        <input type="text" class="form-control" name="bmi" id="bmi"  placeholder="">
                    </div>
                    <div class="form-group col-md-2">
                    <br>
                        <button class="btn btn-info" id="bmi_btn">Calculate BMI</button>
                    </div>
   
                    <div class="form-group col-md-6">
                        <label for="heart_rate"><?php echo "Heart Rate (bpm):"; ?></label>
                        <input type="text" class="form-control" name="heart_rate" id="heart_rate" value='' placeholder="">
                    </div>
             

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo "Blood Pressure (mmHg):"; ?></label>
                        <input type="text" class="form-control" name="blood_pressure" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo "Body Temperature (°c):"; ?></label>
                        <input type="text" class="form-control" name="body_temperature" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo "Oxygen Saturation (SpO2):"; ?></label>
                        <input type="text" class="form-control" name="oxygen_saturation" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo "Respiratory Rate (RR):"; ?></label>
                        <input type="text" class="form-control" name="respiratory_rate" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="col-md-6 panel" style="display: none;">
                    <input type="text" value="<?php echo  $patient->id;?>" name="patient_id" hidden>
                          </div>
                  <div class="col-md-12 panel">
                    <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
                  </div>

                </form>

              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>







        <!-- Edit Event Modal-->
        <div class="modal fade" id="editAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">   <?php echo lang('edit_appointment'); ?></h4>
              </div>
              <div class="modal-body">
                <form role="form" id="editAppointmentForm" class="clearfix row" action="appointment/addNew" method="post" enctype="multipart/form-data">
                  <div class="col-md-4 panel"> 
                    <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label>
                    <select class="form-control m-bot15 js-example-basic-single pos_select patient" id="pos_select" name="patient" value=''> 
                      <option value="">Select .....</option>
                      <option value="<?php echo $patient->id; ?>"><?php echo $patient->name; ?> </option>
                    </select>
                  </div>

                  <div class="col-md-4 panel">
                    <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?></label> 
                    <select class="form-control m-bot15 doctor" id="adoctors1" name="doctor" value=''>  

                    </select>
                  </div>


                  <div class="col-md-4 panel"> 
                    <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                    <input type="text" class="form-control default-date-picker" readonly="" id="date1" name="date" id="exampleInputEmail1" value='' placeholder="">
                  </div>

                  <div class="col-md-6 panel">
                    <label class=""><?php echo lang('available_slots'); ?></label> 
                    <select class="form-control m-bot15" name="time_slot" id="aslots1" value=''> 

                    </select>
                  </div>

                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label>
                    <select class="form-control m-bot15" name="status" value=''>
                      <?php if (!$this->ion_auth->in_group('Patient')) { ?>
                        <option value="Pending Confirmation" <?php ?> > <?php echo lang('pending_confirmation'); ?> </option>
                        <option value="Confirmed" <?php
                      ?> > <?php echo lang('confirmed'); ?> </option>
                      <option value="Treated" <?php
                    ?> > <?php echo lang('treated'); ?> </option>
                    <option value="Cancelled" <?php ?> > <?php echo lang('cancelled'); ?> </option>
                  <?php } else { ?>
                    <option value="Requested" <?php ?> > <?php echo lang('requested'); ?> </option> 
                  <?php } ?>
                </select>
              </div>

              <div class="col-md-8 panel">
                <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
              </div>




              <div class="col-md-6 panel">
                <input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?><br>
              </div>



              <input type="hidden" name="redirect" value='patient/medicalHistory?id=<?php echo $patient->id; ?>'>>
              <input type="hidden" name="id" id="appointment_id" value=''>

              <div class="col-md-12 panel">
                <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
              </div>

            </form>

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    <!-- Edit Event Modal-->




    <!-- Edit Patient Modal-->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">  <?php echo lang('edit_patient'); ?></h4>
          </div>
          <div class="modal-body row">
            <form role="form" id="editPatientForm" action="patient/addNew" class="clearfix" method="post" enctype="multipart/form-data">

              <div class="form-group col-md-6">
                <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
              </div>

              <div class="form-group col-md-6">
                <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
              </div>

              <div class="form-group col-md-6">
                <label for="exampleInputEmail1"><?php echo lang('change'); ?><?php echo lang('password'); ?></label>
                <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
              </div>



              <div class="form-group col-md-6">
                <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1"><?php echo lang('sex'); ?></label>
                <select class="form-control m-bot15" name="sex" value=''>

                  <option value="Male" <?php
                  if (!empty($patient->sex)) {
                    if ($patient->sex == 'Male') {
                      echo 'selected';
                    }
                  }
                ?> > Male </option>
                <option value="Female" <?php
                if (!empty($patient->sex)) {
                  if ($patient->sex == 'Female') {
                    echo 'selected';
                  }
                }
              ?> > Female </option>
              <option value="Others" <?php
              if (!empty($patient->sex)) {
                if ($patient->sex == 'Others') {
                  echo 'selected';
                }
              }
            ?> > Others </option>
          </select>
        </div>

        <div class="form-group col-md-6">
          <label><?php echo lang('birth_date'); ?></label>
          <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="birthdate" value="" placeholder="" readonly="">      
        </div>


        <div class="form-group col-md-6">
          <label for="exampleInputEmail1"><?php echo lang('blood_group'); ?></label>
          <select class="form-control m-bot15" name="bloodgroup" value=''>
            <?php foreach ($groups as $group) { ?>
              <option value="<?php echo $group->group; ?>" <?php
              if (!empty($patient->bloodgroup)) {
                if ($group->group == $patient->bloodgroup) {
                  echo 'selected';
                }
              }
            ?> > <?php echo $group->group; ?> </option>
          <?php } ?> 
        </select>
      </div>

      <div class="form-group col-md-6">    
        <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
        <select class="form-control js-example-basic-single doctor"  name="doctor" value=''> 
          <option value=""> </option>
          <?php foreach ($doctors as $doctor) { ?>                                        
            <option value="<?php echo $doctor->id; ?>"><?php echo $doctor->name; ?> </option>
          <?php } ?> 
        </select>
      </div>



      <div class="form-group last col-md-6">
      <label class="control-label"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
        <div class="">
          <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail dept-add-spec-fileupload1">
              <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="img" alt="" />
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail dept-add-spec-fileupload"></div>
            <div>
              <span class="btn btn-white btn-file">
                  <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select'); ?> <?php echo lang('image'); ?></span>
                  <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('Change'); ?></span>
                  <input type="file" class="default" name="img_url"/>
              </span>
              <a href="#" id="rmv_btn" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo lang('Remove'); ?></a>
          </div>
          </div>

        </div>
      </div>


                    <!--
                    
                    <div class="form-group last col-md-6">
                        <div style="text-align:center;">
                            <video id="video" width="200" height="200" autoplay></video>
                            <div class="snap" id="snap">Capture Photo</div>
                            <canvas id="canvas" width="200" height="200"></canvas>
                            Right click on the captured image and save. Then select the saved image from the left side's Select Image button.
                        </div>
                    </div>
                    
                  -->








                  <div class="form-group col-md-6">
                    <input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?><br>
                  </div>

                  <input type="hidden" name="redirect" value='patient/medicalHistory?id=<?php echo $patient->id; ?>'>>

                  <input type="hidden" name="id" value=''>
                  <input type="hidden" name="p_id" value='<?php
                  if (!empty($patient->patient_id)) {
                    echo $patient->patient_id;
                  }
                ?>'>







                <section class="col-md-12">
                  <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                </section>

              </form>

            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
      </div>
  <div class="modal fade" id="emergency_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title"> <?php echo "Edit Emergency Info"; ?></h4>
         </div>
         <div class="modal-body">
                                 <div class="">
                                    <?php echo validation_errors(); ?>
                                 </div>
                              <form role="form" action="patient/addNewER" method="post" enctype="multipart/form-data" class="patient-form-add-new">
                                 <div class="col-md-6">
                                    <h5>PATIENT INFORMATION</h5>
                                    <div class="form-group">
                                       <div class=""> 
                                          <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                                       </div>
                                       <div class="">
                                          <select class="form-control m-bot15 js-example-basic-single" name="doctor" value=''>
                                             <?php foreach ($doctors as $doctor) { ?>
                                             <option value="<?php echo $doctor->id; ?>" <?php
                                                if (!empty($patient->doctor)) {
                                                  if ($patient->doctor == $doctor->id) {
                                                    echo 'selected';
                                                  }
                                                }
                                                ?> ><?php echo $doctor->name; ?> </option>
                                             <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                                       <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                          if (!empty($setval)) {
                                            echo set_value('name');
                                          }
                                          if (!empty($patient->name)) {
                                            echo $patient->name;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                          if (!empty($patient->email)) {
                                            echo $patient->email;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                    <div class="form-group">        
                                       <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                                       <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                                       <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                          if (!empty($setval)) {
                                            echo set_value('address');
                                          }
                                          if (!empty($patient->address)) {
                                            echo $patient->address;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                                       <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                          if (!empty($setval)) {
                                            echo set_value('phone');
                                          }
                                          if (!empty($patient->phone)) {
                                            echo $patient->phone;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputEmail1"><?php echo lang('sex'); ?></label>
                                       <select class="form-control m-bot15" name="sex" value=''>
                                          <option value="Male" <?php
                                             if (!empty($setval)) {
                                               if (set_value('sex') == 'Male') {
                                                 echo 'selected';
                                               }
                                             }
                                             if (!empty($patient->sex)) {
                                               if ($patient->sex == 'Male') {
                                                 echo 'selected';
                                               }
                                             }
                                             ?> > Male </option>
                                          <option value="Female" <?php
                                             if (!empty($setval)) {
                                               if (set_value('sex') == 'Female') {
                                                 echo 'selected';
                                               }
                                             }
                                             if (!empty($patient->sex)) {
                                               if ($patient->sex == 'Female') {
                                                 echo 'selected';
                                               }
                                             }
                                             ?> > Female </option>
                                          <option value="Others" <?php
                                             if (!empty($setval)) {
                                               if (set_value('sex') == 'Others') {
                                                 echo 'selected';
                                               }
                                             }
                                             if (!empty($patient->sex)) {
                                               if ($patient->sex == 'Others') {
                                                 echo 'selected';
                                               }
                                             }
                                             ?> > <?php echo lang('others'); ?> </option>
                                       </select>
                                    </div>
                                    <div class="form-group">
                                       <label><?php echo lang('birth_date'); ?></label>
                                       <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="birthdate" value="<?php
                                          if (!empty($setval)) {
                                            echo set_value('birthdate');
                                          }
                                          if (!empty($patient->birthdate)) {
                                            echo $patient->birthdate;
                                          }
                                          ?>" placeholder="">      
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputEmail1"><?php echo lang('blood_group'); ?></label>
                                       <select class="form-control m-bot15" name="bloodgroup" value=''>
                                          <?php foreach ($groups as $group) { ?>
                                          <option value="<?php echo $group->group; ?>" <?php
                                             if (!empty($setval)) {
                                               if ($group->group == set_value('bloodgroup')) {
                                                 echo 'selected';
                                               }
                                             }
                                             if (!empty($patient->bloodgroup)) {
                                               if ($group->group == $patient->bloodgroup) {
                                                 echo 'selected';
                                               }
                                             }
                                             ?> > <?php echo $group->group; ?> </option>
                                          <?php } ?> 
                                       </select>
                                    </div>
                                    <div class="form-group">
                                       <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                                       <input type="file" name="img_url">
                                    </div>
                                    <input type="hidden" name="id" value='<?php
                                       if (!empty($patient->id)) {
                                         echo $patient->id;
                                       }
                                       ?>'>
                                    <input type="hidden" name="p_id" value='<?php
                                       if (!empty($patient->patient_id)) {
                                         echo $patient->patient_id;
                                       }
                                       ?>'>
                                 </div>
                                 <div class="col-md-6">
                                    <h5>INSURANCE INFORMATION</h5>
                                    <div class="form-group">
                                       <label for="insure_name1">Person responsible(party) for bill</label>
                                       <input type="text" class="form-control" name="insure_name1" id="insure_name1" value='<?php
                                          if (!empty($setval)) {
                                            echo set_value('insure_name1');
                                          }
                                          if (!empty($patient->insure_name1)) {
                                            echo $patient->insure_name1;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                       <label for="insure_dob1">Birth date</label>
                                       <input type="text" class="form-control" name="insure_dob1" id="insure_dob1" value='<?php
                                          if (!empty($setval)) {
                                            echo set_value('insure_dob1');
                                          }
                                          if (!empty($patient->insure_dob1)) {
                                            echo $patient->insure_dob1;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                       <label for="insure_address1">Address</label>
                                       <input type="text" class="form-control" name="insure_address1" id="insure_address1" value='<?php
                                          if (!empty($setval)) {
                                            echo set_value('insure_address1');
                                          }
                                          if (!empty($patient->insure_address1)) {
                                            echo $patient->insure_address1;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                       <label for="insure_phone1">Phone</label>
                                       <input type="text" class="form-control" name="insure_phone1" id="insure_phone1" value='<?php
                                          if (!empty($setval)) {
                                            echo set_value('insure_phone1');
                                          }
                                          if (!empty($patient->insure_phone1)) {
                                            echo $patient->insure_phone1;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                       <label for="insure_occupation1">Occupation</label>
                                       <input type="text" class="form-control" name="insure_occupation1" id="insure_occupation1" value='<?php
                                          if (!empty($setval)) {
                                            echo set_value('insure_occupation1');
                                          }
                                          if (!empty($patient->insure_occupation1)) {
                                            echo $patient->insure_occupation1;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                       <label for="insure_employer_address">Employer address</label>
                                       <input type="text" class="form-control" name="insure_employer_address" id="insure_employer_address" value='<?php
                                          if (!empty($setval)) {
                                            echo set_value('insure_employer_address');
                                          }
                                          if (!empty($patient->insure_employer_address)) {
                                            echo $patient->insure_employer_address;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                       <label for="insure_employer_phone">Employer phone no</label>
                                       <input type="text" class="form-control" name="insure_employer_phone" id="insure_employer_phone" value='<?php
                                          if (!empty($setval)) {
                                            echo set_value('insure_employer_phone');
                                          }
                                          if (!empty($patient->insure_employer_phone)) {
                                            echo $patient->insure_employer_phone;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                       <label for="insure_relationship">Patient’s relationship to subscriber</label>
                                       <input type="text" class="form-control" name="insure_relationship" id="insure_relationship" value='<?php
                                          if (!empty($setval)) {
                                            echo set_value('insure_relationship');
                                          }
                                          if (!empty($patient->insure_relationship)) {
                                            echo $patient->insure_relationship;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                    <div class="form-group">
                                       <label for="insure_emergency_contact">IN CASE OF EMERGENCY</label>
                                       <input type="text" class="form-control" name="insure_emergency_contact" id="insure_emergency_contact" value='<?php
                                          if (!empty($setval)) {
                                            echo set_value('insure_emergency_contact');
                                          }
                                          if (!empty($patient->insure_emergency_contact)) {
                                            echo $patient->insure_emergency_contact;
                                          }
                                          ?>' placeholder="">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <section class="">
                                       <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                    </section>
                                 </div>
                              </form>
                          </div>
                    </div>
                </div>
          </div>
      <!-- Edit Patient Modal-->


      <style>


        thead {
          background: #f1f1f1; 
          border-bottom: 1px solid #ddd; 
        }

        .btn_width{
          margin-bottom: 20px;
        }

        .tab-content{
          padding: 20px 0px;
        }

        .cke_editable {
          min-height: 1000px;
        }




      </style>


      <script src="common/js/codearistos.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function () {
          $(".editbutton").click(function (e) {
            e.preventDefault(e);
                                                            // Get the record's ID via attribute  
                                                            var iid = $(this).attr('data-id');
                                                            $('#myModal2').modal('show');
                                                            $.ajax({
                                                              url: 'patient/editMedicalHistoryByJason?id=' + iid,
                                                              method: 'GET',
                                                              data: '',
                                                              dataType: 'json',
                                                            }).success(function (response) {
                                                                // Populate the form fields with the data returned from server
                                                                var date = new Date(response.medical_history.date * 1000);
                                                                var de = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();

                                                                $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).end()
                                                                $('#medical_historyEditForm').find('[name="date"]').val(de).end()
                                                                $('#medical_historyEditForm').find('[name="title"]').val(response.medical_history.title).end()
                                                                CKEDITOR.instances['editor'].setData(response.medical_history.description)
                                                              });
                                                          });
        });
      </script>


      <script type="text/javascript">
        $(document).ready(function () {
          $(".editPrescription").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#myModal5').modal('show');
            $.ajax({
              url: 'prescription/editPrescriptionByJason?id=' + iid,
              method: 'GET',
              data: '',
              dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#prescriptionEditForm').find('[name="id"]').val(response.prescription.id).end()
                $('#prescriptionEditForm').find('[name="patient"]').val(response.prescription.patient).end()
                $('#prescriptionEditForm').find('[name="doctor"]').val(response.prescription.doctor).end()

                CKEDITOR.instances['editor1'].setData(response.prescription.symptom)
                CKEDITOR.instances['editor2'].setData(response.prescription.medicine)
                CKEDITOR.instances['editor3'].setData(response.prescription.note)
              });
          });
        });
      </script>


      <script type="text/javascript">
        $(document).ready(function () {
          $(".editAppointmentButton").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            var id = $(this).attr('data-id');

            $('#editAppointmentForm').trigger("reset");
            $('#editAppointmentModal').modal('show');
            $.ajax({
              url: 'appointment/editAppointmentByJason?id=' + iid,
              method: 'GET',
              data: '',
              dataType: 'json',
            }).success(function (response) {
              var de = response.appointment.date * 1000;
              var d = new Date(de);
              var da = d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
                // Populate the form fields with the data returned from server
                $('#editAppointmentForm').find('[name="id"]').val(response.appointment.id).end()
                $('#editAppointmentForm').find('[name="patient"]').val(response.appointment.patient).end()
                //  $('#editAppointmentForm').find('[name="doctor"]').val(response.appointment.doctor).end()
                $('#editAppointmentForm').find('[name="date"]').val(da).end()
                $('#editAppointmentForm').find('[name="status"]').val(response.appointment.status).end()
                $('#editAppointmentForm').find('[name="remarks"]').val(response.appointment.remarks).end()
                var option1 = new Option(response.doctor.name + '-' + response.doctor.id, response.doctor.id, true, true);
                $('#editAppointmentForm').find('[name="doctor"]').append(option1).trigger('change');
                // $('.js-example-basic-single.doctor').val(response.appointment.doctor).trigger('change');
                $('.js-example-basic-single.patient').val(response.appointment.patient).trigger('change');




                var date = $('#date1').val();
                var doctorr = $('#adoctors1').val();
                var appointment_id = $('#appointment_id').val();
                // $('#default').trigger("reset");
                $.ajax({
                  url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + appointment_id,
                  method: 'GET',
                  data: '',
                  dataType: 'json',
                }).success(function (response) {
                  $('#aslots1').find('option').remove();
                  var slots = response.aslots;
                  $.each(slots, function (key, value) {
                    $('#aslots1').append($('<option>').text(value).val(value)).end();
                  });

                  $("#aslots1").val(response.current_value)
                  .find("option[value=" + response.current_value + "]").attr('selected', true);
                    //  $('#aslots1 option[value=' + response.current_value + ']').attr("selected", "selected");
                    //   $("#default-step-1 .button-next").trigger("click");
                    if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
                      $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                    }
                    // Populate the form fields with the data returned from server
                    //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
                  });
              });
          });
        });
      </script>












      <script type="text/javascript">
        $(document).ready(function () {
          $("#adoctors").change(function () {
            // Get the record's ID via attribute  
            var iid = $('#date').val();
            var doctorr = $('#adoctors').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
              url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
              method: 'GET',
              data: '',
              dataType: 'json',
            }).success(function (response) {
              var slots = response.aslots;
              $.each(slots, function (key, value) {
                $('#aslots').append($('<option>').text(value).val(value)).end();
              });
                //   $("#default-step-1 .button-next").trigger("click");
                if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
                  $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                }
                // Populate the form fields with the data returned from server
                //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
              });
          });

        });

        $(document).ready(function () {
          var iid = $('#date').val();
          var doctorr = $('#adoctors').val();
          $('#aslots').find('option').remove();
        // $('#default').trigger("reset");
        $.ajax({
          url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
          method: 'GET',
          data: '',
          dataType: 'json',
        }).success(function (response) {
          var slots = response.aslots;
          $.each(slots, function (key, value) {
            $('#aslots').append($('<option>').text(value).val(value)).end();
          });
            //   $("#default-step-1 .button-next").trigger("click");
            if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
              $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
            }
            // Populate the form fields with the data returned from server
            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
          });

      });




        $(document).ready(function () {
          $('#date').datepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
          })
                //Listen for the change even on the input
                .change(dateChanged)
                .on('changeDate', dateChanged);
              });

        function dateChanged() {
        // Get the record's ID via attribute  
        var iid = $('#date').val();
        var doctorr = $('#adoctors').val();
        $('#aslots').find('option').remove();
        // $('#default').trigger("reset");
        $.ajax({
          url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + iid + '&doctor=' + doctorr,
          method: 'GET',
          data: '',
          dataType: 'json',
        }).success(function (response) {
          var slots = response.aslots;
          $.each(slots, function (key, value) {
            $('#aslots').append($('<option>').text(value).val(value)).end();
          });
            //   $("#default-step-1 .button-next").trigger("click");
            if ($('#aslots').has('option').length == 0) {                    //if it is blank. 
              $('#aslots').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
            }


            // Populate the form fields with the data returned from server
            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
          });

      }




    </script>












    <script type="text/javascript">
      $(document).ready(function () {
        $("#adoctors1").change(function () {
            // Get the record's ID via attribute 
            var id = $('#appointment_id').val();
            var date = $('#date1').val();
            var doctorr = $('#adoctors1').val();
            $('#aslots1').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
              url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
              method: 'GET',
              data: '',
              dataType: 'json',
            }).success(function (response) {
              var slots = response.aslots;
              $.each(slots, function (key, value) {
                $('#aslots1').append($('<option>').text(value).val(value)).end();
              });
                //   $("#default-step-1 .button-next").trigger("click");
                if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
                  $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
                }
                // Populate the form fields with the data returned from server
                //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
              });
          });
      });

      $(document).ready(function () {
        var id = $('#appointment_id').val();
        var date = $('#date1').val();
        var doctorr = $('#adoctors1').val();
        $('#aslots1').find('option').remove();
        // $('#default').trigger("reset");
        $.ajax({
          url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
          method: 'GET',
          data: '',
          dataType: 'json',
        }).success(function (response) {
          var slots = response.aslots;
          $.each(slots, function (key, value) {
            $('#aslots1').append($('<option>').text(value).val(value)).end();
          });
            //   $("#default-step-1 .button-next").trigger("click");
            if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
              $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
            }
            // Populate the form fields with the data returned from server
            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
          });

      });




      $(document).ready(function () {
        $('#date1').datepicker({
          format: "dd-mm-yyyy",
          autoclose: true,
        })
                //Listen for the change even on the input
                .change(dateChanged1)
                .on('changeDate', dateChanged1);
              });

      function dateChanged1() {
        // Get the record's ID via attribute  
        var id = $('#appointment_id').val();
        var iid = $('#date1').val();
        var doctorr = $('#adoctors1').val();
        $('#aslots1').find('option').remove();
        // $('#default').trigger("reset");
        $.ajax({
          url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + iid + '&doctor=' + doctorr + '&appointment_id=' + id,
          method: 'GET',
          data: '',
          dataType: 'json',
        }).success(function (response) {
          var slots = response.aslots;
          $.each(slots, function (key, value) {
            $('#aslots1').append($('<option>').text(value).val(value)).end();
          });
            //   $("#default-step-1 .button-next").trigger("click");
            if ($('#aslots1').has('option').length == 0) {                    //if it is blank. 
              $('#aslots1').append($('<option>').text('No Further Time Slots').val('Not Selected')).end();
            }


            // Populate the form fields with the data returned from server
            //  $('#default').find('[name="staff"]').val(response.appointment.staff).end()
          });

      }




    </script>

    <script>
      $(document).ready(function () {
        $('#editable-sample').DataTable({
          responsive: true,
          dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
          "<'row'<'col-sm-12'tr>>" +
          "<'row'<'col-sm-5'i><'col-sm-7'p>>",
          buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5',
          {
            extend: 'print',
            exportOptions: {
              columns: [0, 1],
            }
          },
          ],
          aLengthMenu: [
          [10, 25, 50, 100, -1],
          [10, 25, 50, 100, "All"]
          ],
          iDisplayLength: -1,
          "order": [[0, "desc"]],
          "language": {
            "lengthMenu": "_MENU_ records per page",
          }


        });
      });
    </script>



    <script type="text/javascript">

      $(document).ready(function () {
        $(".editPatient").click(function () {
            //    e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editPatientForm').trigger("reset");
            $.ajax({
              url: 'patient/editPatientByJason?id=' + iid,
              method: 'GET',
              data: '',
              dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server

                $('#editPatientForm').find('[name="id"]').val(response.patient.id).end()
                $('#editPatientForm').find('[name="name"]').val(response.patient.name).end()
                $('#editPatientForm').find('[name="password"]').val(response.patient.password).end()
                $('#editPatientForm').find('[name="email"]').val(response.patient.email).end()
                $('#editPatientForm').find('[name="address"]').val(response.patient.address).end()
                $('#editPatientForm').find('[name="phone"]').val(response.patient.phone).end()
                $('#editPatientForm').find('[name="sex"]').val(response.patient.sex).end()
                $('#editPatientForm').find('[name="birthdate"]').val(response.patient.birthdate).end()
                $('#editPatientForm').find('[name="bloodgroup"]').val(response.patient.bloodgroup).end()
                $('#editPatientForm').find('[name="p_id"]').val(response.patient.patient_id).end()

                if (typeof response.patient.img_url !== 'undefined' && response.patient.img_url != '') {
                  $("#img").attr("src", response.patient.img_url);
                }


                $('.js-example-basic-single.doctor').val(response.patient.doctor).trigger('change');
                $('#infoModal').modal('show');
              });
          });
      });
    </script>

    <script>
      $(document).ready(function () {


        $("#adoctors").select2({
          placeholder: '<?php echo lang('select_doctor'); ?>',
          allowClear: true,
          ajax: {
            url: 'doctor/getDoctorInfo',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return {
                        searchTerm: params.term // search term
                      };
                    },
                    processResults: function (response) {
                      return {
                        results: response
                      };
                    },
                    cache: true
                  }

                });
        $("#adoctors1").select2({
          placeholder: '<?php echo lang('select_doctor'); ?>',
          allowClear: true,
          ajax: {
            url: 'doctor/getDoctorInfo',
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return {
                        searchTerm: params.term // search term
                      };
                    },
                    processResults: function (response) {
                      return {
                        results: response
                      };
                    },
                    cache: true
                  }

                });

      });
    </script>
    <script>
      $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
      });

      $("#bmi_btn").on('click',function(e)
      {
        e.preventDefault();
        var height = $("#height").val();
        var weight = $("#weight").val();
        var m = parseFloat(height/100); 
        var bmi = parseFloat(weight)/m**2;
        document.getElementById("bmi").value = bmi;
      })
    </script>






