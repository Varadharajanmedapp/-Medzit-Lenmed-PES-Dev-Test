<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">

            <header class="panel-heading">
            <div class="col-md-6">
                <?php echo lang('patient'); ?> <?php echo lang('database'); ?>
                </div>
                <div class="col-md-6 no-print pull-right"> 
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right" >
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_new'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header>
            <div class="panel-body">
                <div class="col-lg-12">
                    <?php echo validation_errors(); ?>
                    <?php 
                        $message = $this->session->flashdata('feedback'); 
                        if (!empty($message)) { ?>
                    <code class="flashmessage flash-message1" > 
                        <?php echo $message; ?></code>
                    <?php } ?>
                </div>
                <div class="adv-table editable-table ">

                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                              <th>Patient ID</th>
                              <th>Name</th>
                              <th>Phone</th>
                              <th>Options</th>
                              
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

                        <?php foreach($users as $key => $order) { ?> 
                           <tr>
                          <td><?php echo $order->id; ?></td>
                          <td><?php echo $order->name; ?></td>
                          <td><?php echo $order->phone; ?></td>

                          <td>
                          <a type="button" class="btn editbutton" data-toggle = "modal" href="#myModal2" data-id="<?php echo $order->id; ?>"><i class="fa fa-edit"> </i> Edit </a>
            
                            <a class="btn detailsbutton detailsbutton1"  href="patient/patientDetails?id=<?php echo $order->id; ?>"><i class="fa fa-info"></i> Info </a>
                            <a class="btn dlt-btn delete_button" title="<?php lang('delete');?>" href="hospital/deletePatient?id=<?php echo $order->id; ?>" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i>Delete</a>
                            <?php if ($order->plan!='') { ?>
                            <a class="btn detailsbutton detailsbutton1"  href="invoices/plan/<?php echo $order->id; ?>"><i class="fa fa-info"></i> Invoice </a>
                            <?php } ?>
                            </td>
                          </tr>
                          <?php }?>
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

<!-- Add Patient Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop='static' data-keyboard='false' style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('register_new_patient'); ?></h4>
            </div>
            <div class="modal-body row">
                <form role="form" action="patient/addNew" class="clearfix" method="post" enctype="multipart/form-data">

                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>


                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="enter your mail" autocomplete="new-email">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"></label>
                        <button type="button" class="btn btn-info otp_btn" id="email_otp">Generate OTP</button>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">E-mail OTP</label>
                        <input type="text" class="form-control" name="email_verification" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"></label>
                       <button type="button" class="btn btn-info otp_btn" id="phone_otp">Generate OTP</button>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Phone OTP</label>
                        <input type="text" class="form-control" name="phone_verification" id="exampleInputEmail1" value='' placeholder="">
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
                        <select class="form-control m-bot15" id="doctorchoose1" name="doctor" value=''>

                        </select>
                    </div>
                    <div class="form-group last col-md-6">
                    <label class="control-label"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail dept-add-spec-fileupload1">
                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail dept-add-spec-fileupload" ></div>
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
                                            <div style="text-align:center;" class="col-md-12">
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


                    <section class="col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                    </section>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Patient Modal-->

<!-- Edit Patient Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop='static' data-keyboard='false' style="display: none;">
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
                        <select class="form-control m-bot15" id="doctorchoose" name="doctor" value=''>

                        </select>
                    </div>
                    <div class="form-group last col-md-6">
                    <label class="control-label"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail dept-add-spec-fileupload1" >
                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="img" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail dept-add-spec-fileupload" ></div>
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
<!-- Edit Patient Modal-->

<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop='static' data-keyboard='false' style="display: none;">
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('patient'); ?>  <?php echo lang('info'); ?></h4>
            </div>
            <div class="modal-body row">
                <form role="form" id="editPatientForm" action="patient/addNew" class="clearfix" method="post" enctype="multipart/form-data">

                    <div class="form-group last col-md-4">
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail dept-add-spec-fileupload1">
                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="img1" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail dept-add-spec-fileupload" ></div>
                            </div>
                            <div class="col-md-12">
                                <label for="exampleInputEmail1"><?php echo lang('patient_id'); ?>: <span class="patientIdClass"></span></label>
                            </div>
                        </div>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                        <div class="nameClass"></div>
                    </div>


                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                        <div class="emailClass"></div>
                    </div>

                    <div class="form-group col-md-4">
                        <label><?php echo lang('age'); ?></label>
                        <div class="ageClass"></div>     
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                        <div class="addressClass"></div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('gender'); ?></label>
                        <div class="genderClass"></div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                        <div class="phoneClass"></div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"><?php echo lang('blood_group'); ?></label>
                        <div class="bloodgroupClass"></div>
                    </div>

                    <div class="form-group col-md-4">
                        <label><?php echo lang('birth_date'); ?></label>
                        <div class="birthdateClass"></div>     
                    </div>
                    <div class="form-group col-md-4">    
                    </div>
                    <div class="form-group col-md-4">    
                    </div>
                    <div class="form-group col-md-4">    
                        <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                        <div class="doctorClass"></div>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>
<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $(document).on('click','.editbutton',function(e){
      e.preventDefault(e);
      // Get the record's ID via attribute  
      var iid = $(this).attr('data-id');
      $('#editPatientForm').trigger("reset");
      $.ajax({
          url: 'hospital/editHospitalByJason?id=' + iid,
          method: 'GET',
          data: '',
          dataType: 'json',
      }).success(function (response) {
          // Populate the form fields with the data returned from server
          $('#editPatientForm').find('[name="id"]').val(response.hospital.id).end()
          //   $('#editEventForm').find('[name="p_id"]').val(response.client.client_id).end()
          $('#editPatientForm').find('[name="name"]').val(response.hospital.name).end()
          $('#editPatientForm').find('[name="password"]').val(response.hospital.password).end()
          $('#editPatientForm').find('[name="email"]').val(response.hospital.email).end()
          $('#editPatientForm').find('[name="address"]').val(response.hospital.address).end()
          $('#editPatientForm').find('[name="phone"]').val(response.hospital.phone).end()
          $('#editPatientForm').find('[name="language"]').val(response.settings.language).end()
      });
  });
});
</script>

<script>
    $(document).ready(function () {
      var table =  $('#editable-sample').DataTable({
        "columns": [
        { "width": "10%" },
        { "width": "20%" },
        { "width": "20%" },
        { "width": "10%" },
        ],
            responsive: true,

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [
    {
        extend: 'copyHtml5',
        title: 'List of Patients',
        exportOptions: {
            columns: [0, 1, 2] // Specify the indices of the columns to include in the copy operation
        },
        customizeData: function (data) {
            var table = data.getElementsByTagName('table')[0];
            var cells = table.getElementsByTagName('td');
            for (var i = 0; i < cells.length; i++) {
            cells[i].style.textAlign = 'center';
            cells[i].style.padding = '5px';
            }
        }
        },
      {
        extend: 'excelHtml5',
        filename: 'List of Patients',
        title: 'List of Patients',
        text: 'Excel',
        customize: function (xlsx) {
        },
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'csvHtml5',
        filename: 'List of Patients',
        title: 'List of Patients',
        text: 'CSV',
        customize: function (csv) {
        },
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'pdfHtml5',
        filename: 'List of Patients',
        title: 'List of Patients',
        text: 'PDF',
        customize: function (pdf) {
        },
        exportOptions: {
          columns: [0, 1, 2]
        }
      },    
      {
  extend: 'print',
  text: 'Print',
  title: 'List of Patients',
  exportOptions: {
    columns: [0, 1, 2]
  }
}
            ],

            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: -1,
            "order": [[0, "desc"]],

            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                searchPlaceholder: "Search...",
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"

            },

        });

        table.buttons().container()
                .appendTo('.custom_buttons');
    });
</script>
<script>
    $(".otp_btn").click(function(event)
    {
        event.preventDefault();
    });
  $(document).ready(function() {
    $("#email_otp").on("click", function() {
      var email = $("#email").val(); // Fixed missing quotes around #email

      $.ajax({
        type: "POST",
        url: "<?php echo base_url().'patient/user_verification';?>", // Fixed missing quotes around the URL
        data: { user_credential: email }, // Changed user_credential to email to match the POST data key
        dataType: "json",
        success: function(res) {
            if(res=="success"){
                $("#email_otp").attr('disabled', true);
            }
            else{
                $("#email_otp").attr('disabled', false);
        }
      }});
    });

    $("#phone_otp").on("click", function() {
      var phone = $("#phone").val(); // Fixed missing quotes around #email

      $.ajax({
        type: "POST",
        url: "<?php echo base_url().'patient/user_verification';?>", 
        data: { user_credential: phone },
        dataType: "json",
        success: function(res) {
            console.log(res);
            if(res=="success"){
                $("#phone_otp").attr('disabled', true);
            }
            else{
                $("#phone_otp").attr('disabled', false);
        }
        }
      });
    });
  });

</script>