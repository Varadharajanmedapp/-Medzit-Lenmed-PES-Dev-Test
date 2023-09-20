
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel col-md-6 row">
            <header class="panel-heading">
            <div class="col-md-6">
              <i><img alt="" src="uploads/add-main.png"  style="height: 40px;"  ></i>
              <?php
                if (!empty($appointment->id))
                    echo lang('edit_appointment');
                else
                    echo lang('add_appointment');
                ?>
            </div>    
            </header>


            <style>
                .panel{
                    background: transparent;
                }

                .payment_label {
                    margin-left: -2%;
                }


            </style>


            <div class="panel-body">
                <div class="adv-table editable-table">
                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('feedback'); ?>
                  </div>
                </div>
                <form role="form" action="appointment/addNew" method="post" class="clearfix" enctype="multipart/form-data">
                        <div class="col-md-6 panel">
                          <label for="exampleInputEmail1"> <?php echo lang('patient'); ?><sup>*</sup></label> 
                          <select class="form-control  pos_select" id="pos_select" name="patient" value=''> 
                          </select>
                        </div>
                        
                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('consult_type'); ?><sup>*</sup></label> 
                    <select class="form-control  consult_type" id="consult_type" name="consult_type"> 
                      <option value="Walk-In"> Walk-In </option>  
                      <option value="Video Conferencing"> Video Conferencing </option>  
                    </select>
                  </div>

                  <div class="col-md-6 panel"></div>
                 
                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('department'); ?><sup>*</sup></label> 
                    <select class="form-control m-bot15-- department" id="department" name="department"> 
                    <option value="">Select Department</option>
                      <?php foreach ($departments as $department) { ?>
                        <option value="<?php echo $department->name; ?>"> <?php echo $department->name; ?> </option>  
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('medical_procedures'); ?><sup>*</sup></label> 
                <select class="form-control m-bot15-- specialist" id="specialist" name="specialist"> 
                <option value="">Select Medical procedure</option>
                <!-- <?php //foreach ($specialists as $specialist) { ?>
                        <option value="<?php //echo $specialist->scan_type; ?>"> <?php //echo $specialist->scan_type; ?> </option>  
                      <?php //} ?>  -->
                    </select>
                  </div>

                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('consult_fee'); ?></label> 
                    <input type="text" class="form-control" id="consult_fee" name="consult_fee"   placeholder="" >
                  </div>

                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('procedure_fee'); ?></label> 
                    <input type="text" class="form-control" id="procedure_fee" name="procedure_fee"   placeholder="">
                  </div>

                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1">  <?php echo lang('doctor'); ?><sup>*</sup></label> 
                    <select class="form-control m-bot15--" id="adoctorss" name="doctor" value=''>  
                    </select>
                  </div>

                        
                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('date'); ?><sup>*</sup></label>
                    <input type="text" class="form-control default-date-picker" id="date" readonly="" name="date" id="exampleInputEmail1" value='' placeholder="">
                  </div>

              
                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1">Available Slots<sup>*</sup></label>
                    <select class="form-control m-bot15--" name="time_slot" id="aslots" value=''> 
                    </select>
                  </div>  
                  
                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('sub_total'); ?></label>
                    <input type="text" class="form-control" name="sub_total" id="sub_total"  placeholder="">
                  </div>
                  <div class="col-md-6 panel">
                    <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label> 
                    <select class="form-control " name="status" value=''> 
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
                    <!-- <div class="pos_client clearfix col-md-6">
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
          
            <label for="exampleInputEmail1"> <?php echo lang('appointment'); ?> <?php echo lang('status'); ?></label> 
            <select class="form-control " name="status" value=''> 
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

      </section>
      <!-- page end-->
  </section>
</section>
<!--main content end-->
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
<!-- script start -->
<script src="common/js/codearistos.min.js"></script>

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


<?php if (!empty($appointment->id)) { ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#adoctors").change(function () {
                // Get the record's ID via attribute  
                var id = $('#appointment_id').val();
                var date = $('#date').val();
                var doctorr = $('#adoctors').val();
                $('#aslots').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
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
            var id = $('#appointment_id').val();
            var date = $('#date').val();
            var doctorr = $('#adoctors').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var slots = response.aslots;
                $.each(slots, function (key, value) {
                    $('#aslots').append($('<option>').text(value).val(value)).end();
                });

                $("#aslots").val(response.current_value)
                        .find("option[value=" + response.current_value + "]").attr('selected', true);

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
            var id = $('#appointment_id').val();
            var date = $('#date').val();
            var doctorr = $('#adoctors').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByAppointmentIdByJason?date=' + date + '&doctor=' + doctorr + '&appointment_id=' + id,
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

<?php } else { ?> 

    <script type="text/javascript">
        $(document).ready(function () {
            $("#adoctors").change(function () {
                // Get the record's ID via attribute  
                var id = $('#appointment_id').val();
                var date = $('#date').val();
                var doctorr = $('#adoctors').val();
                $('#aslots').find('option').remove();
                // $('#default').trigger("reset");
                $.ajax({
                    url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + date + '&doctor=' + doctorr,
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
            var id = $('#appointment_id').val();
            var date = $('#date').val();
            var doctorr = $('#adoctors').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + date + '&doctor=' + doctorr,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                var slots = response.aslots;
                $.each(slots, function (key, value) {
                    $('#aslots').append($('<option>').text(value).val(value)).end();
                });

                $("#aslots").val(response.current_value)
                        .find("option[value=" + response.current_value + "]").attr('selected', true);

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
            var id = $('#appointment_id').val();
            var date = $('#date').val();
            var doctorr = $('#adoctors').val();
            $('#aslots').find('option').remove();
            // $('#default').trigger("reset");
            $.ajax({
                url: 'schedule/getAvailableSlotByDoctorByDateByJason?date=' + date + '&doctor=' + doctorr,
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

<?php } ?>

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

    });
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






