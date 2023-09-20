
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
            <div class="col-md-6">
            <i ><img alt="" src="uploads/upcoming-main.png"  style="height: 40px;"  ></i>  <?php echo lang('upcoming'); ?> <?php echo lang('appointments'); ?>
            </div>
                <div class="col-md-6 clearfix pull-right custom_buttons">
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i>   <?php echo lang('add_appointment'); ?> 
                            </button>
                        </div>
                    </a>

                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample1" style="border-collapse: separate !important; border-spacing:0 1em !important;" >
                        <thead>
                            <tr>
                                <th> <?php echo lang('id'); ?></th>
                                <th> <?php echo lang('patient'); ?></th>
                                <th> <?php echo lang('doctor'); ?></th>
                                <th> <?php echo lang('date-time'); ?></th>
                                <th> <?php echo lang('remarks'); ?></th>
                                <th> <?php echo lang('status'); ?></th>
                                <th> <?php echo lang('options'); ?></th>
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






                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

<div class="modal fade" tabindex="-1" role="dialog" id="cmodal">
    <div class="modal-dialog modal-lg" role="document" style="width: 80%;">
        <div class="modal-content">
            <!--
            <div class="modal-header">
                <h5 class="modal-title"><?php echo lang('patient') . " " . lang('history'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            -->
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



<!-- Add Appointment Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('add_appointment'); ?></h4>
            </div>
            <div class="modal-body row">
               <form role="form" action="appointment/addNew" method="post" class="clearfix" enctype="multipart/form-data">
               <div class="col-md-6 panel">
                          <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label> 
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
                    <label for="exampleInputEmail1"> <?php echo lang('consult_type'); ?></label> 
                    <select class="form-control m-bot15 consult_type" id="consult_type" name="consult_type"> 
                      <option value="Walk-In"> Walk-In </option>  
                      <option value="Video Conferencing"> Video Conferencing </option>  
                    </select>
                  </div>

                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('department'); ?></label> 
                    <select class="form-control m-bot15 department" id="department" name="department"> 
                      <option>Select Department</option>
                      <?php foreach ($departments as $department) { ?>
                        <option value="<?php echo $department->name; ?>"> <?php echo $department->name; ?> </option>  
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('medical_procedures'); ?></label> 
                <select class="form-control m-bot15 specialist" id="specialist" name="specialist"> 
                  <option>Select Medical Procedure</option>
<!--                 <?php //foreach ($specialists as $specialist) { ?>
                        <option value="<?php //echo $specialist->scan_type; ?>"> <?php //echo $specialist->scan_type; ?> </option>  
                      <?php //} ?>  -->
                    </select>
                  </div>

                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('consult_fee'); ?></label> 
                    <input type="text" class="form-control" id="consult_fee" name="consult_fee"   placeholder="">
                  </div>
                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('procedure_fee'); ?></label> 
                    <input type="text" class="form-control" id="procedure_fee" name="procedure_fee"   placeholder="" >
                  </div>

                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?></label> 
                    <select class="form-control m-bot15" id="adoctors" name="doctor" value=''>  

                    </select>
                  </div>
                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('date'); ?></label>
                    <input type="text" class="form-control default-date-picker" id="date" readonly="" name="date" id="exampleInputEmail1" value='' placeholder="">
                  </div>
                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1">Available Slots</label>
                    <select class="form-control m-bot15" name="time_slot" id="aslots" value=''> 

                    </select>
                  </div>
                  
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
                    <label for="exampleInputEmail1"> <?php echo lang('sub_total'); ?></label>
                    <input type="text" class="form-control" name="sub_total" id="sub_total"  placeholder="">
                  </div>

                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('remarks'); ?></label>
                    <input type="text" class="form-control" name="remarks" id="exampleInputEmail1"  placeholder="">
                  </div>
                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo "Patient Query" ?></label>
                    <input type="text" class="form-control" name="patient_query" id="exampleInputEmail1"  placeholder="">
                  </div>
                  <div class="form-group last col-md-6">
                  <label class="control-label"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no image" id="img" alt="" />
                                </div>
                                <div id="img_div" class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select'); ?> <?php echo lang('image'); ?></span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('Change'); ?></span>
                                        <input type="file" class="default" name="img_url"/>
                                    </span>
                                    <span id="rmv_btn" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo lang('Remove'); ?></span>
                                </div>
                            </div>

                        </div>
                    </div>
<!-- 
                    <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label> 
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
            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?></label> 
            <select class="form-control pos_select patient" id="pos_select" name="patient" value=''> 

            </select>
            </div>
            <div class="col-md-6 panel">
                <label for="exampleInputEmail1"> <?php echo lang('consult_type'); ?></label> 
                <select class="form-control consult_type" id="consult_type" name="consult_type"> 
                    <option value="Walk-In"> Walk-In </option>  
                    <option value="Video Conferencing"> Video Conferencing </option>  
                </select>
            </div>
             <div class="col-md-6 panel">
                <label for="exampleInputEmail1"> <?php echo lang('department'); ?></label> 
                <select class="form-control department" id="department_edit" name="department"> 
                    <?php foreach ($departments as $department) { ?>
                    <option value="<?php echo $department->name; ?>"> <?php echo $department->name; ?> </option>  
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6 panel">
                <label for="exampleInputEmail1"> <?php echo lang('medical_procedures'); ?></label> 
                <select class="form-control specialist" id="specialist_edit" name="specialist"> 
                    <?php foreach ($specialists as $specialist) { ?>
                    <option value="<?php echo $specialist->scan_type; ?>"> <?php echo $specialist->scan_type; ?> </option>  
                    <?php } ?>
                </select>
            </div>
             <div class="col-md-6 panel">
                <label for="exampleInputEmail1"> <?php echo lang('consult_fee'); ?></label> 
                <input type="text" class="form-control" id="consult_fee_edit" name="consult_fee" id="consult_fee" value='' placeholder="">
            </div>
            <div class="col-md-6 panel">
                <label for="exampleInputEmail1"> <?php echo lang('procedure_fee'); ?></label> 
                <input type="text" class="form-control" id="procedure_fee_edit" name="procedure_fee" id="procedure_fee" value='' placeholder="">
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
                    <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?></label> 
                    <select class="form-control doctor" id="adoctors1" name="doctor" value=''>  

                    </select>
                </div>
                <div class="col-md-6 panel">
                    <label for="date1"> <?php echo lang('date'); ?></label>
                    <input type="text" class="form-control" id="date1" readonly="" name="date"  value='' placeholder="">
                </div>
                <div class="col-md-6 panel">
                    <label for="exampleInputEmail1">Available Slots</label>
                    <select class="form-control" name="time_slot" id="aslots1" value=''> 
                    </select>
                </div>
                <div class="col-md-6 panel">
                <label for="exampleInputEmail1"> <?php echo lang('sub_total'); ?></label> 
                <input type="text" class="form-control" id="sub_total_edit" name="sub_total" value='' placeholder="">
                </div>
                    <div class="col-md-6 panel">


                    <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label> 
                    <select class="form-control status" name="status" value=''>
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
                <img src="attachment" class="img">
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

            <img src="attachment" class="img" style="width:100%;">

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
<!-- Edit Event Modal-->

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-location-arrow"></i> <?php echo lang('send_sms_to_patient'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="sendSmsToVolunteer" action="sms/appointmentReminder" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <p><?php echo lang('reminder_message'); ?></p>
                    </div>
                    <input type="hidden" id="id" value="" name="id">
                    <button type="submit" name="submit" class="btn btn-info submit_button"><?php echo lang('yes'); ?></button>
                    <button type="submit" name="submit" class="btn btn-info invoicebutton" data-dismiss="modal" aria-hidden="true"><?php echo lang('cancel'); ?></button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".table").on("click", ".editbutton", function () {
            //$(".editbutton").click(function (e) {
            //   e.preventDefault(e);
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





<script>


    $(document).ready(function () {
        var table = $('#editable-sample1').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "appointment/getUpcomingAppoinmentList",
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
                url:  'doctor/getDoctorInfo',
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
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
