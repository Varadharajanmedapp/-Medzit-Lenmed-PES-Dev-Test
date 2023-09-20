<style>
  .otp{
    display:none;
  }

</style>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
      <header class="panel-heading" >
      <div class="col-md-6 d-flex">
      <i ><img alt="" src="uploads/appointments-main.png"  style="    height: 40px;"  ></i> <?php echo lang('appointments'); ?>
      </div>
        <div class="clearfix no-print col-md-6 pull-right">
          <a data-toggle="modal" href="#myModal">
            <div class="btn-group pull-right">
              <button id="" class="btn green btn-xs">
                <i class="fa fa-plus-circle"></i>  <?php echo lang('add_appointment'); ?> 
              </button>
            </div>
          </a>
        </div>
      </header>
      <div class="">
        <div class="tab-content">
          <div id="all" class="tab-pane active">
            <div class="">
              <div class="panel-body">
                <div class="adv-table editable-table ">

                  <div class="space15"></div>
                  <table class="table table-striped table-hover table-bordered" id="editable-sample5" style="width: 100%; border-collapse: separate !important; border-spacing:0 1em !important;">
                    <thead  >
                      <tr style="width:1px !important;">
                        <th style="width:0px !important;"> <?php echo lang('id'); ?></th>
                        <th style="width:0px !important;"> <?php echo lang('patient'); ?></th>
                        <th style="width:50px !important;"> <?php echo lang('doctor'); ?></th>
                        <th style="width:100px !important;"> <?php echo lang('department'); ?></th>
                        <th style="width:0px !important;"> <?php echo lang('type'); ?></th>
                        <th style="width:0px !important;"> <?php echo lang('consult_type'); ?></th>
                        <th style="width:100px !important;"> <?php echo lang('patient_query'); ?></th>
                        <th style="width:100px !important;"> <?php echo lang('date-time'); ?></th>
                        <th style="width:80px !important;"> <?php echo lang('remarks'); ?></th>
                        <th style="width:0px !important;"> <?php echo lang('status'); ?></th>
                        <th style="width:200px !important;"> <?php echo lang('options'); ?></th>
                      </tr>
                    </thead>
                    <tbody style="font-size:smaller !important;" >

                      <style>
                        .img_url{
                          height:20px;
                          width:20px;
                          background-size: contain; 
                          max-height:20px;
                          border-radius: 100px;
                        }

                      </style>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- page end-->
  </section>
</section>
<!--main content end-->
<!-- Add Appointment Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop='static' data-keyboard='false' style="display: none;">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">  <?php echo lang('add_appointment'); ?></h4>
      </div>
      <div class="modal-body row">
        <form role="form" action="appointment/addNew" method="post" class="clearfix" multiple enctype="multipart/form-data">
          <div class="col-md-6 panel">
            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?><sup>*</sup></label> 
            <select class="form-control m-bot15 pos_select" id="pos_select" name="patient" value=''> 
            </select>
          </div>
          <div class="pos_client clearfix col-md-6">
            <div class="payment pad_bot pull-right">
              <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label> 
              <input type="text" class="form-control pay_in" name="p_name" value='' placeholder="">
            </div>
            <div class="payment pad_bot pull-right">
              <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
              <input type="text" class="form-control pay_in" name="p_email" value='' placeholder="">
            </div>
            <div class="payment pad_bot pull-right">
              <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
              <input type="text" class="form-control pay_in" name="p_phone" value='' placeholder="">
            </div>
            <div class="payment pad_bot pull-right">
              <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label> 
              <input type="text" class="form-control pay_in" name="p_age" value='' placeholder="">
            </div> 
            <div class="payment pad_bot"> 
              <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
              <select class="form-control" name="p_gender" value=''>

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
    </div>
    <div class="col-md-6 panel">
      <label for="exampleInputEmail1"> <?php echo lang('consult_type'); ?><sup>*</sup></label> 
      <select class="form-control m-bot15 consult_type" id="consult_type" name="consult_type"> 
        <option value="Walk-In"> Walk-In </option>  
        <option value="Video Conferencing"> Video Conferencing </option>  
      </select>
    </div>
    <div class="col-md-6 panel">
      <label for="exampleInputEmail1"> <?php echo lang('department'); ?><sup>*</sup></label> 
      <select class="form-control m-bot15 department" id="department" name="department"> 
        <option>Select Department</option>
        <?php foreach ($departments as $department) { ?>
          <option value="<?php echo $department->name; ?>"> <?php echo $department->name; ?> </option>  
        <?php } ?>
      </select>
    </div>
    <div class="col-md-6 panel">
      <label for="exampleInputEmail1"> <?php echo lang('medical_procedures'); ?><sup>*</sup></label> 
  <select class="form-control m-bot15 specialist" id="specialist" name="specialist"> 
    <option>Select Medical Procedure</option>
<!--                 <?php //foreach ($specialists as $specialist) { ?>
          <option value="<?php //echo $specialist->scan_type; ?>"> <?php //echo $specialist->scan_type; ?> </option>  
        <?php //} ?>  -->
      </select>
    </div>
    <div class="col-md-6 panel">
      <label for="exampleInputEmail1"> <?php echo lang('consult_fee'); ?></label> 
      <input type="text" class="form-control" id="consult_fee" name="consult_fee" placeholder="" readonly>
    </div>

    <div class="col-md-6 panel">
      <label for="exampleInputEmail1"> <?php echo lang('procedure_fee'); ?></label> 
      <input type="text" class="form-control" id="procedure_fee" name="procedure_fee"   placeholder="" readonly>
    </div>

    <div class="col-md-6 panel">
      <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?><sup>*</sup></label> 
      <select class="form-control m-bot15" id="adoctorss" name="doctor" value=''>  
      </select>
    </div>
    
    <div class="col-md-6 panel">
      <label for="exampleInputEmail1"> <?php echo lang('date'); ?><sup>*</sup></label>
      <input type="text" class="form-control default-date-picker" id="date" name="date" placeholder="" readonly>
    </div>

    <div class="col-md-6 panel"></div>

    <div class="col-md-6 panel">
      <label for="exampleInputEmail1">Available Slots<sup>*</sup></label>
      <select class="form-control m-bot15" name="time_slot" id="aslots" value=''> 
      </select>
    </div>
    <div class="col-md-6 panel">
      <label for="exampleInputEmail1"> <?php echo lang('sub_total'); ?></label>
      <input type="text" class="form-control" name="sub_total" id="sub_total"  placeholder="">
    </div>

    <div class="col-md-6 panel"></div>
    
    <div class="col-md-6 panel">
      <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label> 
      <select class="form-control m-bot15" name="status" value=''> 
        <option value="Pending Confirmation"> <?php echo lang('pending_confirmation'); ?> </option>
        <option value="Confirmed"> <?php echo lang('confirmed'); ?> </option>
        <option value="Treated" > <?php echo lang('treated'); ?> </option>
        <option value="Cancelled" > <?php echo lang('cancelled'); ?> </option>
      </select>
    </div>
    
    <div class="col-md-6 panel">
      <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
      <input type="text" class="form-control" name="remarks" id="exampleInputEmail1"  placeholder="">
    </div>

    <div class="col-md-6 panel"></div>

    <div class="col-md-6 panel">
      <label for="exampleInputEmail1"> <?php echo "Patient Query" ?><sup>*</sup></label>
      <input type="text" class="form-control" name="patient_query" id="exampleInputEmail1"  placeholder="">
    </div>

      <div class="preview-container form-group last col-md-6">
        <div class="form-group">
            <label for="files"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
            <div>
            <span class="btn btn-white btn-file">
                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select'); ?> <?php echo lang('image'); ?></span>
                <!-- <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('Change'); ?></span> -->
                <input type="file" class="default" name="img_url[]" accept="image/*,video/*" multiple id="files" onchange="checkVideoDuration()">
            </span>
            </div>                      
        </div>
        <a href="#" id="media-preview-link" class="fileupload-new thumbnail dept-add-spec-fileupload1" data-toggle="modal" data-target="#media-popup-modal">
            <img  src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+media" alt="Media Preview" id="media-preview">
        </a>
      </div>
<!-- <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label> 
  <select class="form-control m-bot15" name="status" value=''> 
    <option value="Pending Confirmation" <?php
    ?> > <?php echo lang('pending_confirmation'); ?> </option>
    <option value="Confirmed" <?php
    ?> > <?php echo lang('confirmed'); ?> </option>
    <option value="Treated" <?php
    ?> > <?php echo lang('treated'); ?> </option>
    <option value="Cancelled" <?php
    ?> > <?php echo lang('cancelled'); ?> </option>
  </select> -->
    <div class="col-md-12 panel test">
      <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button>
    </div>
  </div>
  <!-- <div class="col-md-6 panel">
    <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
    <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
  </div> -->
      <!--  <div class="col-md-6 panel">
            <label> <?php echo lang('send_sms'); ?>  </label> <br>
            <input type="checkbox" name="sms" class="" value="sms">  <?php echo lang('yes'); ?>
          </div>-->
          
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- Add Appointment Modal-->

  <div class="modal fade" tabindex="-1" role="dialog" id="cmodal">
    <div class="modal-dialog modal-lg" role="document" style="width: 80%;">
      <div class="modal-content">
<!--
<div class="modal-header">
    <h5 class="modal-title"><?php echo lang('patient') . " " . lang('history'); ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>-->
      <div id='medical_history'>
        <div class="col-md-12">

        </div> 
      </div>
      <div class="modal-footer">
        <div class="col-md-12">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- Edit Event Modal-->
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog ">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">  <?php echo lang('edit_appointment'); ?></h4>
          </div>
          <div class="modal-body row">
            <form role="form" id="editAppointmentForm" action="appointment/addNew" class="clearfix" method="post" enctype="multipart/form-data">
              <div class="col-md-6 panel">
                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?><sup>*</sup></label> 
                <select class="form-control m-bot15  pos_select patient" id="pos_select" name="patient" value=''> 

                </select>
              </div>
              <div class="pos_client clearfix col-md-6">
                <div class="payment pad_bot pull-right">
                  <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label> 
                  <input type="text" class="form-control pay_in" name="p_name" value='' placeholder="">
                </div>
                <div class="payment pad_bot pull-right">
                  <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
                  <input type="text" class="form-control pay_in" name="p_email" value='' placeholder="">
                </div>
                <div class="payment pad_bot pull-right">
                  <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
                  <input type="text" class="form-control pay_in" name="p_phone" value='' placeholder="">
                </div>
                <div class="payment pad_bot pull-right">
                  <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label> 
                  <input type="text" class="form-control pay_in" name="p_age" value='' placeholder="">
                </div> 
                <div class="payment pad_bot"> 
                  <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
                  <select class="form-control" name="p_gender" value=''>

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
        </div>

        <div class="col-md-6 panel">
          <label for="exampleInputEmail1"> <?php echo lang('consult_type'); ?><sup>*</sup></label> 
          <select class="form-control m-bot15 consult_type" id="consult_type" name="consult_type"> 
            <option value="Walk-In"> Walk-In </option>  
            <option value="Video Conferencing"> Video Conferencing </option>  
          </select>
        </div>

        <div class="col-md-6 panel">
          <label for="exampleInputEmail1"> <?php echo lang('department'); ?><sup>*</sup></label> 
          <select class="form-control m-bot15 department" id="department_edit" name="department"> 
            <?php foreach ($departments as $department) { ?>
              <option value="<?php echo $department->name; ?>"> <?php echo $department->name; ?> </option>  
            <?php } ?>
          </select>
        </div>
        <div class="col-md-6 panel">
          <label for="exampleInputEmail1"> <?php echo lang('medical_procedures'); ?><sup>*</sup></label> 
          <select class="form-control m-bot15 specialist" id="specialist_edit" name="specialist"> 
            <?php foreach ($specialists as $specialist) { ?>
              <option value="<?php echo $specialist->scan_type; ?>"> <?php echo $specialist->scan_type; ?> </option>  
            <?php } ?>
          </select>
        </div>

        <div class="col-md-6 panel">
          <label for="exampleInputEmail1"> <?php echo lang('consult_fee'); ?><sup>*</sup></label> 
          <input type="text" class="form-control" id="consult_fee_edit" name="consult_fee" value='' placeholder="">
        </div>

        <div class="col-md-6 panel">
          <label for="exampleInputEmail1"> <?php echo lang('procedure_fee'); ?></label> 
          <input type="text" class="form-control" id="procedure_fee_edit" name="procedure_fee" value='' placeholder="">
        </div>

        <div class="col-md-6 panel"> 
            <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?><sup>*</sup></label> 
            <select class="form-control m-bot15 doctor" id="adoctorss" name="doctor" value=''>  
            </select>
            </div> 

        <div class="col-md-6 panel">
          <label for="date1"> <?php echo lang('date'); ?><sup>*</sup></label>
          <input type="text" class="form-control" id="date1" readonly="" name="date"  value='' placeholder="">
        </div>

        <div class="col-md-12 panel"></div>

            <div class="col-md-6 panel">
              <label for="exampleInputEmail1">Available Slots<sup>*</sup></label>
              <select class="form-control m-bot15" name="time_slot" id="aslots1" value=''> 
              </select>
            </div>
        
        <div class="col-md-6 panel">
          <label for="exampleInputEmail1"> <?php echo lang('sub_total'); ?></label> 
          <input type="text" class="form-control" id="sub_total_edit" name="sub_total" value='' placeholder="">
        </div>

        <div class="col-md-12 panel"></div>

            <div class="col-md-6 panel">
              <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label> 
              <select class="form-control m-bot15 status" name="status" value=''>
                <option value="Pending Confirmation" <?php
              ?> > <?php echo lang('pending_confirmation'); ?> </option>
              <option value="Confirmed" <?php
            ?> > <?php echo lang('confirmed'); ?> </option>
            <option value="Treated" <?php
          ?> > <?php echo lang('treated'); ?> </option>
          <option value="Cancelled" <?php
        ?> > <?php echo lang('cancelled'); ?> </option>
      </select>
    </div>
    <div class="col-md-6 panel">
      <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
      <input type="text" class="form-control" name="remarks" id="exampleInputEmail1" value='' placeholder="">
    </div>

    <div class="col-md-6 panel">
      <label for="attachment"> <?php echo lang('patient'); ?> <?php echo lang('attachments'); ?></label> 
      <figure>
        <div class="fileupload-new thumbnail" style="width: 200px; height: 100%; min-height: 150px;">
          <img data-enlargable src="attachment" class="img">
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
          <symbol id="close" viewBox="0 0 18 18">
            <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFFFFF" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507
              S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0
              l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507
              c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0
              s0.292,0.773,0,1.068l-2.505,2.528L12.49e1,11.491z"/>
          </symbol>
        </svg>
      </figure>
    </div>
    <div class="col-md-6 panel  otp">
      <label for="exampleInputEmail1"> <?php echo lang('verification_code'); ?></label> 
      <input type="text" class="form-control" name="otp" value='' placeholder="">
      <span class="error_msg" style="color: red; display: none;"></span>
    </div>
    <!--    <div class="col-md-6 panel">
            <label> <?php echo lang('send_sms'); ?> ? </label> <br>
            <input type="checkbox" name="sms" class="" value="sms">  <?php echo lang('yes'); ?>
          </div> -->
          <input type="hidden" name="id" id="appointment_id" value=''>
          <div class="col-md-12 panel">
            <a href="javascript:void(0);" class="btn btn-info pull-right edit_status" ><?php echo lang('submit'); ?></a>
            <!-- <button type="submit" name="submit" class="btn btn-info pull-right"> <?php echo lang('submit'); ?></button> -->
          </div>
        </form>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal end-->
<!-- media preview modal-->
<div class="modal fade" id="media-popup-modal" tabindex="-1" role="dialog" aria-labelledby="media-popup-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="">
                <!-- <h5 class="modal-title" id="media-popup-label">Media Preview</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Slider for media content -->
                <div class="media-slider">
                    <!-- Media items will be dynamically added here -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>

.gallery {
  position: relative;
  z-index: 2;
  padding: 10px;
  flex-flow: row wrap;
  justify-content: space-between;
  transition: all 0.5s ease-in-out;
  transform: translateZ(0);
}
.gallery.pop {
  filter: blur(10px);
}
.gallery figure {
  flex-basis: 33.333%;
  padding: 10px;
  overflow: hidden;
  cursor: pointer;
}
.gallery figure img {
  width: 100%;
  transition: all 0.3s ease-in-out;
}
.gallery figure figcaption {
  display: none;
}

.popup {
  position: fixed;
  z-index: 2;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background: darkgrey;
  opacity: 0;
  transition: opacity 0.5s ease-in-out 0.2s;

}
.popup.pop {
  opacity: 1;
  transition: opacity 0.2s ease-in-out 0s;
}
.popup.pop figure {
  margin-top: 0;
  opacity: 1;
}
.popup figure {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  transform-origin: 0 0;
  margin-top: 30px;
  opacity: 0;
  -webkit-animation: poppy 500ms linear both;
          animation: poppy 500ms linear both;
   display: contents;       
}
.popup figure img {
  position: relative;
  z-index: 2;
  height: 100%;
  margin: 0 auto; 
  padding: 50px; 
  width: 100%;
  max-width: fit-content;
  
}
.popup figure figcaption {
  position: absolute;
  bottom: 50px;
  background: linear-gradient(180deg, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.78));
  z-index: 2;
  width: 100%;
  padding: 100px 20px 20px 20px;
  color: #fff;
  font-family: "Open Sans", sans-serif;
  font-size: 32px;
}
.popup figure figcaption small {
  font-size: 11px;
  display: block;
  text-transform: uppercase;
  margin-top: 12px;
  text-indent: 3px;
  opacity: 0.7;
  letter-spacing: 1px;
}
.popup figure .shadow {
  position: relative;
  z-index: 1;
  top: -96px;
  margin: 0 auto;
  background-position: center bottom;
  background-repeat: no-repeat;
  width: 98%;
  height: 50px;
  opacity: 0.9;
  filter: blur(16px) contrast(1.5);
  transform: scale(0.95, -0.7);
  transform-origin: center bottom;
}
.popup .close {
  position: absolute;
  z-index: 3;
  top: 10px;
  right: 10px;
  width: 25px;
  height: 25px;
  cursor: pointer;
  background: url(#close);
  border-radius: 25px;
  background: rgba(0, 0, 0, 0.1);
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
}
.popup .close svg {
  width: 100%;
  height: 100%;
}
@media (max-width:991px){
  .popup figure .shadow{
    height: 45px;
    width: 100%;
  }
}
@media (max-width:767px) {
  .popup figure .shadow{
    height: 40px;
    width: 78%;
  }
  .popup figure img{
    height: auto;
  }
}

@-webkit-keyframes poppy {
  0% {
    transform: matrix3d(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  3.4% {
    transform: matrix3d(0.316, 0, 0, 0, 0, 0.407, 0, 0, 0, 0, 1, 0, -94.672, -91.573, 0, 1);
  }
  4.3% {
    transform: matrix3d(0.408, 0, 0, 0, 0, 0.54, 0, 0, 0, 0, 1, 0, -122.527, -121.509, 0, 1);
  }
  4.7% {
    transform: matrix3d(0.45, 0, 0, 0, 0, 0.599, 0, 0, 0, 0, 1, 0, -134.908, -134.843, 0, 1);
  }
  6.81% {
    transform: matrix3d(0.659, 0, 0, 0, 0, 0.893, 0, 0, 0, 0, 1, 0, -197.77, -200.879, 0, 1);
  }
  8.61% {
    transform: matrix3d(0.82, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, -245.972, -246.757, 0, 1);
  }
  9.41% {
    transform: matrix3d(0.883, 0, 0, 0, 0, 1.168, 0, 0, 0, 0, 1, 0, -265.038, -262.804, 0, 1);
  }
  10.21% {
    transform: matrix3d(0.942, 0, 0, 0, 0, 1.226, 0, 0, 0, 0, 1, 0, -282.462, -275.93, 0, 1);
  }
  12.91% {
    transform: matrix3d(1.094, 0, 0, 0, 0, 1.328, 0, 0, 0, 0, 1, 0, -328.332, -298.813, 0, 1);
  }
  13.61% {
    transform: matrix3d(1.123, 0, 0, 0, 0, 1.332, 0, 0, 0, 0, 1, 0, -336.934, -299.783, 0, 1);
  }
  14.11% {
    transform: matrix3d(1.141, 0, 0, 0, 0, 1.331, 0, 0, 0, 0, 1, 0, -342.273, -299.395, 0, 1);
  }
  17.22% {
    transform: matrix3d(1.205, 0, 0, 0, 0, 1.252, 0, 0, 0, 0, 1, 0, -361.606, -281.592, 0, 1);
  }
  17.52% {
    transform: matrix3d(1.208, 0, 0, 0, 0, 1.239, 0, 0, 0, 0, 1, 0, -362.348, -278.88, 0, 1);
  }
  18.72% {
    transform: matrix3d(1.212, 0, 0, 0, 0, 1.187, 0, 0, 0, 0, 1, 0, -363.633, -267.15, 0, 1);
  }
  21.32% {
    transform: matrix3d(1.196, 0, 0, 0, 0, 1.069, 0, 0, 0, 0, 1, 0, -358.864, -240.617, 0, 1);
  }
  24.32% {
    transform: matrix3d(1.151, 0, 0, 0, 0, 0.96, 0, 0, 0, 0, 1, 0, -345.164, -216.073, 0, 1);
  }
  25.23% {
    transform: matrix3d(1.134, 0, 0, 0, 0, 0.938, 0, 0, 0, 0, 1, 0, -340.193, -210.948, 0, 1);
  }
  28.33% {
    transform: matrix3d(1.075, 0, 0, 0, 0, 0.898, 0, 0, 0, 0, 1, 0, -322.647, -202.048, 0, 1);
  }
  29.03% {
    transform: matrix3d(1.063, 0, 0, 0, 0, 0.897, 0, 0, 0, 0, 1, 0, -318.884, -201.771, 0, 1);
  }
  29.93% {
    transform: matrix3d(1.048, 0, 0, 0, 0, 0.899, 0, 0, 0, 0, 1, 0, -314.277, -202.202, 0, 1);
  }
  35.54% {
    transform: matrix3d(0.979, 0, 0, 0, 0, 0.962, 0, 0, 0, 0, 1, 0, -293.828, -216.499, 0, 1);
  }
  36.74% {
    transform: matrix3d(0.972, 0, 0, 0, 0, 0.979, 0, 0, 0, 0, 1, 0, -291.489, -220.242, 0, 1);
  }
  39.44% {
    transform: matrix3d(0.962, 0, 0, 0, 0, 1.01, 0, 0, 0, 0, 1, 0, -288.62, -227.228, 0, 1);
  }
  41.04% {
    transform: matrix3d(0.961, 0, 0, 0, 0, 1.022, 0, 0, 0, 0, 1, 0, -288.247, -229.999, 0, 1);
  }
  44.44% {
    transform: matrix3d(0.966, 0, 0, 0, 0, 1.032, 0, 0, 0, 0, 1, 0, -289.763, -232.215, 0, 1);
  }
  52.15% {
    transform: matrix3d(0.991, 0, 0, 0, 0, 1.006, 0, 0, 0, 0, 1, 0, -297.363, -226.449, 0, 1);
  }
  59.86% {
    transform: matrix3d(1.006, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, -301.813, -222.759, 0, 1);
  }
  61.66% {
    transform: matrix3d(1.007, 0, 0, 0, 0, 0.991, 0, 0, 0, 0, 1, 0, -302.102, -222.926, 0, 1);
  }
  63.26% {
    transform: matrix3d(1.007, 0, 0, 0, 0, 0.992, 0, 0, 0, 0, 1, 0, -302.171, -223.276, 0, 1);
  }
  75.28% {
    transform: matrix3d(1.001, 0, 0, 0, 0, 1.003, 0, 0, 0, 0, 1, 0, -300.341, -225.696, 0, 1);
  }
  83.98% {
    transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.61, -225.049, 0, 1);
  }
  85.49% {
    transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.599, -224.94, 0, 1);
  }
  90.69% {
    transform: matrix3d(0.999, 0, 0, 0, 0, 0.999, 0, 0, 0, 0, 1, 0, -299.705, -224.784, 0, 1);
  }
  100% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, -225, 0, 1);
  }
}

@keyframes poppy {
  0% {
    transform: matrix3d(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  3.4% {
    transform: matrix3d(0.316, 0, 0, 0, 0, 0.407, 0, 0, 0, 0, 1, 0, -94.672, -91.573, 0, 1);
  }
  4.3% {
    transform: matrix3d(0.408, 0, 0, 0, 0, 0.54, 0, 0, 0, 0, 1, 0, -122.527, -121.509, 0, 1);
  }
  4.7% {
    transform: matrix3d(0.45, 0, 0, 0, 0, 0.599, 0, 0, 0, 0, 1, 0, -134.908, -134.843, 0, 1);
  }
  6.81% {
    transform: matrix3d(0.659, 0, 0, 0, 0, 0.893, 0, 0, 0, 0, 1, 0, -197.77, -200.879, 0, 1);
  }
  8.61% {
    transform: matrix3d(0.82, 0, 0, 0, 0, 1.097, 0, 0, 0, 0, 1, 0, -245.972, -246.757, 0, 1);
  }
  9.41% {
    transform: matrix3d(0.883, 0, 0, 0, 0, 1.168, 0, 0, 0, 0, 1, 0, -265.038, -262.804, 0, 1);
  }
  10.21% {
    transform: matrix3d(0.942, 0, 0, 0, 0, 1.226, 0, 0, 0, 0, 1, 0, -282.462, -275.93, 0, 1);
  }
  12.91% {
    transform: matrix3d(1.094, 0, 0, 0, 0, 1.328, 0, 0, 0, 0, 1, 0, -328.332, -298.813, 0, 1);
  }
  13.61% {
    transform: matrix3d(1.123, 0, 0, 0, 0, 1.332, 0, 0, 0, 0, 1, 0, -336.934, -299.783, 0, 1);
  }
  14.11% {
    transform: matrix3d(1.141, 0, 0, 0, 0, 1.331, 0, 0, 0, 0, 1, 0, -342.273, -299.395, 0, 1);
  }
  17.22% {
    transform: matrix3d(1.205, 0, 0, 0, 0, 1.252, 0, 0, 0, 0, 1, 0, -361.606, -281.592, 0, 1);
  }
  17.52% {
    transform: matrix3d(1.208, 0, 0, 0, 0, 1.239, 0, 0, 0, 0, 1, 0, -362.348, -278.88, 0, 1);
  }
  18.72% {
    transform: matrix3d(1.212, 0, 0, 0, 0, 1.187, 0, 0, 0, 0, 1, 0, -363.633, -267.15, 0, 1);
  }
  21.32% {
    transform: matrix3d(1.196, 0, 0, 0, 0, 1.069, 0, 0, 0, 0, 1, 0, -358.864, -240.617, 0, 1);
  }
  24.32% {
    transform: matrix3d(1.151, 0, 0, 0, 0, 0.96, 0, 0, 0, 0, 1, 0, -345.164, -216.073, 0, 1);
  }
  25.23% {
    transform: matrix3d(1.134, 0, 0, 0, 0, 0.938, 0, 0, 0, 0, 1, 0, -340.193, -210.948, 0, 1);
  }
  28.33% {
    transform: matrix3d(1.075, 0, 0, 0, 0, 0.898, 0, 0, 0, 0, 1, 0, -322.647, -202.048, 0, 1);
  }
  29.03% {
    transform: matrix3d(1.063, 0, 0, 0, 0, 0.897, 0, 0, 0, 0, 1, 0, -318.884, -201.771, 0, 1);
  }
  29.93% {
    transform: matrix3d(1.048, 0, 0, 0, 0, 0.899, 0, 0, 0, 0, 1, 0, -314.277, -202.202, 0, 1);
  }
  35.54% {
    transform: matrix3d(0.979, 0, 0, 0, 0, 0.962, 0, 0, 0, 0, 1, 0, -293.828, -216.499, 0, 1);
  }
  36.74% {
    transform: matrix3d(0.972, 0, 0, 0, 0, 0.979, 0, 0, 0, 0, 1, 0, -291.489, -220.242, 0, 1);
  }
  39.44% {
    transform: matrix3d(0.962, 0, 0, 0, 0, 1.01, 0, 0, 0, 0, 1, 0, -288.62, -227.228, 0, 1);
  }
  41.04% {
    transform: matrix3d(0.961, 0, 0, 0, 0, 1.022, 0, 0, 0, 0, 1, 0, -288.247, -229.999, 0, 1);
  }
  44.44% {
    transform: matrix3d(0.966, 0, 0, 0, 0, 1.032, 0, 0, 0, 0, 1, 0, -289.763, -232.215, 0, 1);
  }
  52.15% {
    transform: matrix3d(0.991, 0, 0, 0, 0, 1.006, 0, 0, 0, 0, 1, 0, -297.363, -226.449, 0, 1);
  }
  59.86% {
    transform: matrix3d(1.006, 0, 0, 0, 0, 0.99, 0, 0, 0, 0, 1, 0, -301.813, -222.759, 0, 1);
  }
  61.66% {
    transform: matrix3d(1.007, 0, 0, 0, 0, 0.991, 0, 0, 0, 0, 1, 0, -302.102, -222.926, 0, 1);
  }
  63.26% {
    transform: matrix3d(1.007, 0, 0, 0, 0, 0.992, 0, 0, 0, 0, 1, 0, -302.171, -223.276, 0, 1);
  }
  75.28% {
    transform: matrix3d(1.001, 0, 0, 0, 0, 1.003, 0, 0, 0, 0, 1, 0, -300.341, -225.696, 0, 1);
  }
  83.98% {
    transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.61, -225.049, 0, 1);
  }
  85.49% {
    transform: matrix3d(0.999, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -299.599, -224.94, 0, 1);
  }
  90.69% {
    transform: matrix3d(0.999, 0, 0, 0, 0, 0.999, 0, 0, 0, 0, 1, 0, -299.705, -224.784, 0, 1);
  }
  100% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, -225, 0, 1);
  }
}
</style>
<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $(".table").on("click", ".editbutton", function () {
// e.preventDefault(e);
// Get the record's ID via attribute  
var iid = $(this).attr('data-id');
var id = $(this).attr('data-id');

$('#editAppointmentForm').trigger("reset");
$('#myModal2').modal('show');
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
    $('#editAppointmentForm').find('[name="doctor"]').val(response.appointment.doctor).end()
    $('#editAppointmentForm').find('[name="date"]').val(da).end()
    $('#editAppointmentForm').find('[name="status"]').val(response.appointment.status).end()
    $('#editAppointmentForm').find('[name="remarks"]').val(response.appointment.remarks).end()

    $('#editAppointmentForm').find('[name="department"]').val(response.appointment.department).end()
    $('#editAppointmentForm').find('[name="specialist"]').val(response.appointment.type).end()
    $('#editAppointmentForm').find('[name="consult_type"]').val(response.appointment.consult_type).end()
    $('#editAppointmentForm').find('[name="consult_fee"]').val(response.appointment.consult_fee).end()
    $('#editAppointmentForm').find('[name="procedure_fee"]').val(response.appointment.procedure_fee).end()
    $('#editAppointmentForm').find('[name="sub_total"]').val(response.appointment.amount).end()
    var files =response.appointment.attachment_image;
    console.log(files);
    var img = files.split(",");

    $('#editAppointmentForm').find('img').attr('src',img[0])

    var option = new Option(response.patient.name + '-' + response.patient.id, response.patient.id, true, true);
    $('#editAppointmentForm').find('[name="patient"]').append(option).trigger('change');
    var option1 = new Option(response.doctor.name + '-' + response.doctor.id, response.doctor.id, true, true);
    $('#editAppointmentForm').find('[name="doctor"]').append(option1).trigger('change');



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
                    $(".table").on("click", ".history", function () {

            //e.preventDefault(e);
            // Get the record's ID via attribute   
            var iid = $(this).attr('data-id');
            //var id = $(this).attr('data-id');
            console.log(iid);
            $('#editAppointmentForm').trigger("reset");
            $.ajax({
              url: 'patient/getMedicalHistoryByjason?id=' + iid,
              method: 'GET',
              data: '',
              dataType: 'json',
            }).success(function (response) {
              $('#medical_history').html("");
              $('#medical_history').append(response.view);

            });
            $('#cmodal').modal('show');
          });
                  });
                </script>

                <script>
                  $(document).ready(function () {
                    $('.pos_client').hide();
                    $(document.body).on('change', '#pos_select', function () {

                      var v = $("select.pos_select option:selected").val()
                      if (v == 'add_new') {
                        $('.pos_client').show();
                      } else {
                        $('.pos_client').hide();
                      }
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
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      $.fn.dataTable
      .tables({visible: true, api: true})
      .columns.adjust()
      .responsive.recalc();
    });
  });
</script>
    <script>
      $(document).ready(function () {
        var table = $('#editable-sample5').DataTable({
          
            //   dom: 'lfrBtip',
             responsive: true,
            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
              url: "appointment/getAppoinmentList",
              type: 'POST',
            },
            scroller: {
              loadingIndicator: true
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
      {
        extend: 'copyHtml5',
        filename: 'appointments',
        title: 'Appointments',
        text: 'Copy',
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 8, 9]
        }
      },
      {
        extend: 'excelHtml5',
        filename: 'appointments',
        title: 'Appointments',
        text: 'Excel',
        customize: function (xlsx) {
        },
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 8, 9]
        }
      },
      {
        extend: 'csvHtml5',
        filename: 'appointments',
        title: 'Appointments',
        text: 'CSV',
        customize: function (csv) {
        },
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 8, 9]
        }
      },
      {
        extend: 'pdfHtml5',
        filename: 'appointments',
        title: 'Appointments',
        text: 'PDF',
        customize: function (pdf) {
        },
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 8, 9]
        }
      },
    
                
            {
              extend: 'print',
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5],
              }
            },
            ],
            title: 'Custom Title',
            aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [[0, "desc"]],
            "language": {
              "lengthMenu": "_MENU_",
              search: "_INPUT_",
              searchPlaceholder: "Search...",
              "url": "common/assets/DataTables/languages/english.json"
            },
          });
        table.buttons().container().appendTo('.custom_buttons');
      });
    </script>
    <script>


      $(document).ready(function () {
        var table = $('#editable-sample6').DataTable({
          
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
              url: "appointment/getRequestedAppointmentList",
              type: 'POST',
            },
            scroller: {
              loadingIndicator: true
            },
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
                columns: [0, 1, 2, 3, 4, 5],
              }
            },
            ],
            aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,
            "order": [[0, "desc"]],
            "language": {
              "lengthMenu": "_MENU_",
              search: "_INPUT_",
              searchPlaceholder: "Search...",
              "url": "common/assets/DataTables/languages/english.json"
            },
          });
        table.buttons().container().appendTo('.custom_buttons');
      });
    </script>
    <script>


      $(document).ready(function () {
        var table = $('#editable-sample1').DataTable({
          
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
              url: "appointment/getPendingAppoinmentList",
              type: 'POST',
            },
            scroller: {
              loadingIndicator: true
            },
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
                columns: [0, 1, 2, 3, 4, 5],
              }
            },
            ],
            aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
            ],
            
            iDisplayLength: 100,
            "order": [[0, "desc"]],
            "language": {
              "lengthMenu": "_MENU_",
              search: "_INPUT_",
              searchPlaceholder: "Search...",
              "url": "common/assets/DataTables/languages/english.json"
            },
          });
        table.buttons().container().appendTo('.custom_buttons');
      });
    </script>
    <script>


      $(document).ready(function () {
        var table = $('#editable-sample2').DataTable({
          
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
              url: "appointment/getConfirmedAppoinmentList",
              type: 'POST',
            },
            scroller: {
              loadingIndicator: true
            },
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
                columns: [0, 1, 2, 3, 4, 5],
              }
            },
            ],
            aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
            ],
            
            iDisplayLength: 100,
            "order": [[0, "desc"]],
            "language": {
              "lengthMenu": "_MENU_",
              search: "_INPUT_",
              searchPlaceholder: "Search...",
              "url": "common/assets/DataTables/languages/english.json"
            },
          });
        table.buttons().container().appendTo('.custom_buttons');
      });
    </script>

    <script>


      $(document).ready(function () {
        var table = $('#editable-sample3').DataTable({
          
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
              url: "appointment/getTreatedAppoinmentList",
              type: 'POST',
            },
            scroller: {
              loadingIndicator: true
            },
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
                columns: [0, 1, 2, 3, 4, 5],
              }
            },
            ],
            aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
            ],
            
            iDisplayLength: 100,
            "order": [[0, "desc"]],
            "language": {
              "lengthMenu": "_MENU_",
              search: "_INPUT_",
              searchPlaceholder: "Search...",
              "url": "common/assets/DataTables/languages/english.json"
            },
          });
        table.buttons().container().appendTo('.custom_buttons');
      });
    </script>

    <script>


      $(document).ready(function () {
        var table = $('#editable-sample4').DataTable({
          
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
              url: "appointment/getCancelledAppoinmentList",
              type: 'POST',
            },
            scroller: {
              loadingIndicator: true
            },
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
                columns: [0, 1, 2, 3, 4, 5],
              }
            },
            ],
            aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"]
            ],
        
            iDisplayLength: 100,
            "order": [[0, "desc"]],
            "language": {
              "lengthMenu": "_MENU_",
              search: "_INPUT_",
              searchPlaceholder: "Search...",
              "url": "common/assets/DataTables/languages/english.json"
            },
          });
        table.buttons().container().appendTo('.custom_buttons');
      });
    </script>
    <script>
      $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
      });
    </script>
    <script>
      $(document).ready(function () {
        $("#pos_select").select2({
          placeholder: '<?php echo lang('select_patient'); ?>',
          allowClear: true,
          ajax: {
            url: 'patient/getPatientinfoWithAddNewOption',
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
        $(".patient").select2({
          placeholder: '<?php echo lang('select_patient'); ?>',
          allowClear: true,
          ajax: {
            url: 'patient/getPatientinfo',
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

      $(document).on("click", ".edit_status", function () {
        // e.preventDefault(e);
        // Get the record's ID via attribute  
        // var de =$('#editAppointmentForm').find('[name="date"]').val() * 1000;
        // console.log(de);
            // var d = new Date(de);
            // var date = d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
            var id = $('#appointment_id').val();
            var status = $('#editAppointmentForm').find('[name="status"]').val();
            var patient = $('#editAppointmentForm').find('[name="patient"]').val();
            var doctor = $('#editAppointmentForm').find('[name="doctor"]').val();
            var remarks = $('#editAppointmentForm').find('[name="remarks"]').val();
            var verify_code = $('#editAppointmentForm').find('[name="otp"]').val();
            var time_slot = $('#editAppointmentForm').find('[name="time_slot"]').val();

            var department = $('#editAppointmentForm').find('[name="department"]').val();
            var type = $('#editAppointmentForm').find('[name="specialist"]').val();
            var consult_type = $('#editAppointmentForm').find('[name="consult_type"]').val();
            var consult_fee = $('#editAppointmentForm').find('[name="consult_fee"]').val();
            var procedure_fee = $('#editAppointmentForm').find('[name="procedure_fee"]').val();
           


            $(".error_msg").text("").hide();
            $.ajax({
              url: 'appointment/hospital_otp',
              type: 'POST',
              data: {
                id : id,
                status : status,
                patient_id : patient,
                doctor_id : doctor,
                remarks : remarks,
                time_slot : time_slot,

                consult_fee : consult_fee,
                department : department,
                type : type,
                consult_type : consult_type,
                procedure_fee : procedure_fee,
               


                verify_code : verify_code
              },
            // dataType: 'json',
          }).success(function (response) {
            if (response == 'success') {
              window.location.href = 'appointment';
            }
            else if (response == 'invalid_otp') {
              $(".error_msg").text("Please enter a valid OTP").show();
            }
            else if(response == 'otp_empty'){
              $(".error_msg").text("Please enter your OTP").show();
            }
          });
        }); 

      $(document).on('change', '.status', function () {
        var v = $("select.status").val()
        if (v == 'Treated') {
          $('.otp').show();
        } else {
          $('.otp').hide();
        }
      });


    </script>


<script>
	$(document).ready(function(){
		$("#department").change(function(){
			var department = $(this).val();
			if(department!=""){
				$.ajax({
					url:"<?=base_url('appointment/specialistFromDepartment')?>",
					method:"post",
          dataType: 'json',
					data:{department:department},
					success:function(data){
          html = '<option value="">Select Medical Procedure</option>';
          
        $.each(data, function (key, val) 
        {
        html += '<option value="'+val.scan_type+'">'+val.scan_type+'</option>';
        });
					$("#specialist").html(html);
					}
				});
		    }
      else{
				$("#specialist").html('<option value="">Select Specialist</option>');
			}
		});
	});
</script>

<!-- get doctor based on department-->
<script>
	$(document).ready(function(){
		$("#department").change(function(){
			var department = $(this).val();
			if(department!=""){
				$.ajax({
					url:"<?=base_url('appointment/doctorFromDepartment')?>",
					method:"post",
          dataType: 'json',
					data:{department:department},
					success:function(data){
          html = '<option value="">Select Doctor</option>';
          
        $.each(data, function (key, val) 
        {
          console.log(val.name);
        html += '<option value="'+val.name+'">'+val.name+'</option>'; 
        });
					$("#adoctorss").html(html);
					}
				});
		    }
      else{
				$("#adoctorss").html('<option value="">Select Doctor</option>');
			}
		});
	});
</script>

<script>
	$(document).ready(function(){
		$("#department_edit").change(function(){
			var department = $(this).val();
     
			if(department!=""){
				$.ajax({
					url:"<?=base_url('appointment/specialistFromDepartment')?>",
					method:"post",
          dataType: 'json',
					data:{department:department},
					success:function(data){
          html = '<option value="">Select Medical Procedure</option>';
          
          $.each(data, function (key, val) {
        html += '<option value="'+val.scan_type+'">'+val.scan_type+'</option>';
    });
						$("#specialist_edit").html(html);
					}
				});
			}else{
				$("#specialist_edit").html('<option value="">Select Specialist</option>');
			}
		});
	});
	
</script> 

<script>
	$(document).ready(function(){
		$("#department").change(function(){
			var department = $(this).val();
     
			if(department!=""){
				$.ajax({
					url:"<?=base_url('appointment/getConsultFee')?>",
					method:"post",
          dataType: 'json',
					data:{department:department},
					success:function(data){
          value = '';
          
          $.each(data, function (key, val) {
       console.log("This: "+val); 
        value += val;
    });
						$("#consult_fee").val(value);
            
            var consult_fee = $("#consult_fee").val();
            /* var procedure_fee = $("#procedure_fee").val(); */
            var procedure_fee = document.getElementById("procedure_fee");
            procedure_fee.value = 0.00;
            var pro_fee = parseFloat(procedure_fee.value);
      
            var sub_total = parseFloat(consult_fee)+parseFloat(pro_fee);
            $("#sub_total").val(sub_total);
					}
				});
			}else{
				$("#consult_fee").val();
			}
		});
	});

  $(document).ready(function(){
		$("#specialist").change(function(){
			var medical_procedure = $(this).val();
     
			if(medical_procedure!=""){
				$.ajax({
					url:"<?=base_url('appointment/getProcedurefee')?>",
					method:"post",
          dataType: 'json',
					data:{medical_procedure:medical_procedure},
					success:function(data){
          value = '';
          
          $.each(data, function (key, val) {
          value += val;
    });
						$("#procedure_fee").val(value);
            var consult_fee = $("#consult_fee").val();
            var procedure_fee = $("#procedure_fee").val();
            var sub_total = parseFloat(consult_fee)+parseFloat(procedure_fee);
            $("#sub_total").val(sub_total);
					}
				});
			}else{
				$("#procedure_fee").val();
			}
		});
	});
  
  $(document).ready(function(){
		$("#department_edit").change(function(){
			var department = $(this).val();
     
			if(department!=""){
				$.ajax({
					url:"<?=base_url('appointment/getConsultFee')?>",
					method:"post",
          dataType: 'json',
					data:{department:department},
					success:function(data){
          value = '';
          
          $.each(data, function (key, val) {
          value += val;
    });
						$("#consult_fee_edit").val(value);
            
            var consult_fee = $("#consult_fee_edit").val();
            /* var procedure_fee = $("#procedure_fee").val(); */
            var procedure_fee = document.getElementById("procedure_fee_edit");
            procedure_fee.value = 0.00;
            var pro_fee = parseFloat(procedure_fee.value);
      
            var sub_total = parseFloat(consult_fee)+parseFloat(pro_fee);
            $("#sub_total_edit").val(sub_total);
					}
				});
			}else{
				$("#consult_fee_edit").val();
			}
		});
	});

  $(document).ready(function(){
		$("#specialist_edit").change(function(){
			var medical_procedure = $(this).val();
     
			if(medical_procedure!=""){
				$.ajax({
					url:"<?=base_url('appointment/getProcedurefee')?>",
					method:"post",
          dataType: 'json',
					data:{medical_procedure:medical_procedure},
					success:function(data){
          value = '';
          $.each(data, function (key, val) {
        value += val;
    });
						$("#procedure_fee_edit").val(value);
            var consult_fee = $("#consult_fee_edit").val();
            var procedure_fee = $("#procedure_fee_edit").val();
            var sub_total = parseFloat(consult_fee)+parseFloat(procedure_fee);
            $("#sub_total_edit").val(sub_total);
					}
				});
			}else{
				$("#procedure_fee_edit").val();
			}
		});
	});
	</script> 
 <script>
    $(document).ready(function() {
        
        var slickSlider;
        var warningPopupDisplayed = false; 

        $("#media-preview-link").click(function(e) {
            e.preventDefault();
            var files = $("#files")[0].files;

            if (files && files.length > 0 && files.length <= 8) { 
                var validFiles = [];
                var videoCount = 0; 

                
                var validVideoDuration = true; 

                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var mediaTag = '';

                    if (file.type.startsWith('image/')) {
                        
                        mediaTag = '<div><img src="' + URL.createObjectURL(file) + '" alt="Image"></div>';
                    } else if (file.type.startsWith('video/')) {
                        videoCount++; 

                        var video = document.createElement('video');
                        video.preload = 'metadata';
                        video.onloadedmetadata = function() {
                            if (video.duration <= 60) { 
                                validFiles.push(file);
                            } else {
                                validVideoDuration = false;
                                var alertMessage = 'Video duration must be exactly 60 seconds or less.';
                                alert(alertMessage);

                                setTimeout(function() {
                                    $('#media-popup-modal').modal('hide');
                                }, 1); 
                            }

                           
                            if (validFiles.length === files.length) {
                                handleValidFiles(validFiles, validVideoDuration);
                            }
                        };

                        video.src = URL.createObjectURL(file);

                        // Display video
                        mediaTag = '<div><video controls width="200" height="150">';
                        mediaTag += '<source src="' + URL.createObjectURL(file) + '" type="' + file.type + '">';
                        mediaTag += 'Your browser does not support the video tag.';
                        mediaTag += '</video></div>';
                    }

                    if (mediaTag !== '') {
                        validFiles.push(mediaTag);
                    }
                }

               
                if (videoCount > 1) {
                    alert('You can upload only one video file.');
                    $('#media-popup-modal').modal('hide').css('display', 'none');

                    return;
                }

            
                if (!validVideoDuration) {
                    return; 
                }

             
                if (validFiles.length > 0) {
                    var $mediaSlider = $(".media-slider");


                    if (slickSlider) {
                        slickSlider.slick('unslick');
                    }

                    $mediaSlider.empty();

                    for (var i = 0; i < validFiles.length; i++) {
                        var file = validFiles[i];
                        $mediaSlider.append(file);
                    }

                   
                    setTimeout(function() {
                        $("#media-popup-modal").modal("show");

                       
                        setTimeout(function() {
                            slickSlider = $('.media-slider').slick({
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: true,
                                prevArrow: '<button type="button" class="slick-prev custom-prev-button">&#9664;</button>',
                                nextArrow: '<button type="button" class="slick-next custom-next-button">&#9654;</button>'
                            });
                        }, 200);
                    }, 100);
                } else {
                    alert('No valid media files selected.');
                }
            } else if (files.length > 8) {

                warningPopupDisplayed = true;
                alert('You can upload a maximum of 8 files.');
                setTimeout(function() {
                    $('#media-popup-modal').modal('hide');
                }, 1);
            } else {
                alert('No media files selected.');
                setTimeout(function() {
                    $('#media-popup-modal').modal('hide');
                }, 50);
            }
        });


        $('#media-popup-modal').on('hidden.bs.modal', function() {
            if (slickSlider && !warningPopupDisplayed) {
                slickSlider.slick('unslick');
            }

            // Reset the warning popup flag
            warningPopupDisplayed = false;
        });
    });
</script>

<!-- Add this script to your view -->
<script>
$(document).ready(function() {
    // When the file input value changes
    $('#files').on('change', function() {
        // Get the selected file
        var file = this.files[0];
        
        // Check if a file is selected
        if (file) {
            // Create a URL for the selected file
            var fileURL = URL.createObjectURL(file);

            // Update the src attribute of the media preview element
            $('#media-preview').attr('src', fileURL);
            
            // Check if the selected file is a video
            if (file.type.startsWith('video/')) {
                // If it's a video, try to get the poster image from the video
                var video = document.createElement('video');
                video.src = fileURL;
                video.addEventListener('loadedmetadata', function() {
                    // Use the video's poster as the thumbnail
                    var posterURL = video.getAttribute('poster');
                    if (posterURL) {
                        $('#media-preview').attr('src', posterURL);
                    }
                });
            }
        } else {
            // If no file is selected, reset the src attribute to your placeholder image
            $('#media-preview').attr('src', '/path-to-your-placeholder-image.jpg');
        }
    });
});
</script>

