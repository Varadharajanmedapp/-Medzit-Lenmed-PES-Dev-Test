<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
            <div class="col-md-6">
            <i ><img alt="" src="uploads/listofdoctor-main.png" class="doc-list-doc-img" ></i><?php echo lang('doctors'); ?>   
            </div> 
                <div class="col-md-6 no-print pull-right"> 
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_new'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered table-row1" id="editable-sample" >
                        <thead>
                            <tr>
                                <th><?php echo lang('doctor'); ?> <?php echo lang('id'); ?></th>
                                <th><?php echo lang('name'); ?></th>
                                <th><?php echo lang('email'); ?></th>
                                <th><?php echo lang('phone'); ?></th>
                                <th><?php echo lang('department'); ?></th>
                                <th><?php echo lang('specialist'); ?></th>
                                <!-- <th><?php //echo lang('profile'); ?></th> -->
                                <th class="no-print"><?php echo lang('options'); ?></th>
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

<!-- Add Accountant Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop='static' data-keyboard='false' style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('add_new_doctor'); ?></h4>
            </div>
            <div class="modal-body row">
                <form role="form" action="doctor/addNew" class="clearfix" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-otp">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?><sup>*</sup></label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="" autocomplete="off">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"></label>
                       <button type="button" class="btn btn-info otp_btn" id="email_otp">Generate OTP</button>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">E-mail OTP<sup>*</sup></label>
                        <input type="text" class="form-control" name="email_verification" id="exampleInputEmail1" placeholder="">
                    </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?><sup>*</sup></label>
                        <div class="input-group">
                        <input type="password" class="form-control password" name="password"  id="password" id="exampleInputEmail1" placeholder="********" autocomplete="new-password">
                        <span class="input-group-addon" id="basic-addon2"> <span class="eye_icon" ><i class="fa fa-eye-slash eye" aria-hidden="true"></i></span></span>
                    </div>
                    </div>
                
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-otp">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="phone" id="phone" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"></label>
                       <button type="button" class="btn btn-info otp_btn" id="phone_otp">Generate OTP</button>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Phone OTP</label>
                        <input type="text" class="form-control" name="phone_verification" id="exampleInputEmail1"  placeholder="">
                    </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('department'); ?><sup>*</sup></label>
                        <select class="form-control m-bot15 js-example-basic-single" id="department" name="department" value=''>
                            <option>Select Department</option>
                            <?php foreach ($departments as $department) { ?>
                                <option value="<?php echo $department->name; ?>"> <?php echo $department->name; ?> </option>
                            <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('specialist'); ?><sup>*</sup></label>
                        <select class="form-control m-bot15 js-example-basic-single" id="specialist" name="specialist">
                            <option>Select Specialist</option>
                        <?php foreach ($specialists as $specialist) { ?>
                        <option value="<?php echo $specialist->title; ?>"><?php echo $specialist->title; ?></option>
                        <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group last col-md-6">
                    <label class="control-label"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail dept-add-spec-fileupload1" >
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
                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Accountant Modal-->

<!-- Edit Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> <?php echo lang('edit_doctor'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editDoctorForm" class="clearfix" action="doctor/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="email" id="email_edit" value='' placeholder="" autocomplete="username">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"></label>
                       <button class="form-control btn btn-info otp_btn" id="email_otp_edit">Generate OTP</button>
                    </div>
                    <div class="form-group otp col-md-3">
                        <label for="exampleInputEmail1">E-mail OTP<sup>*</sup></label>
                        <input type="text" class="form-control" name="email_verification" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?><sup>*</sup></label>
                        <div class="input-group">
                        <input type="password" class="form-control password" name="password"  id="password" id="exampleInputEmail1" placeholder="********" autocomplete="new-password">
                        <span class="input-group-addon" id="basic-addon2"> <span class="eye_icon" ><i class="fa fa-eye-slash eye" aria-hidden="true"></i></span></span>
                    </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="phone" id="phone_edit" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"></label>
                       <button class="form-control btn btn-info otp_btn text-start" id="phone_otp_edit">Generate OTP</button>
                    </div>
                    <div class="form-group otp col-md-3">
                        <label for="exampleInputEmail1">Phone OTP<sup>*</sup></label>
                        <input type="text" class="form-control" name="phone_verification" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('department'); ?><sup>*</sup></label>
                        <select class="form-control m-bot15 js-example-basic-single department" id="department_edit" name="department" value=''>
                            <option value=""></option>
                            <?php foreach ($departments as $department) { ?>
                                <option value="<?php echo $department->name; ?>" <?php
                                if (!empty($doctor->department)) {
                                    if ($department->name == $doctor->department) {
                                        echo 'selected';
                                    }
                                }
                                ?> > <?php echo $department->name; ?> </option>
                                    <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('specialist'); ?><sup>*</sup></label>
                        <select class="form-control m-bot15 js-example-basic-single specialist" id="specialist_edit" name="specialist" value=''>
                            <option value=""></option>
                            <?php foreach ($specialists as $specialist) { ?>
                                <option value="<?php echo $specialist->title; ?>" <?php
                                if (!empty($doctor->specialist)) {
                                    if ($specialist->title == $doctor->specialist) {
                                        echo 'selected';
                                    }
                                }
                                ?> > <?php echo $specialist->title; ?> </option>
                                    <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='' placeholder="">
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

                    <input type="hidden" name="id" value=''>
                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->

<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop='static' data-keyboard='false' style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> <?php echo lang('doctor'); ?> <?php echo lang('info'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editDoctorForm" class="clearfix" action="doctor/addNew" method="post" enctype="multipart/form-data">

                    <div class="form-group last col-md-6">
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail dept-add-spec-fileupload1">
                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="img1" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail dept-add-spec-fileupload" ></div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                        <div class="nameClass"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                        <div class="emailClass"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                        <div class="addressClass"></div>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                        <div class="phoneClass"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('department'); ?></label>
                        <div class="departmentClass"></div>
                    </div>
                    <!-- <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php // echo lang('profile'); ?></label>
                        <div class="profileClass"></div>
                    </div> -->
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('specialist'); ?></label>
                        <div class="specialistClass"></div>
                    </div>


                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".table").on("click", ".editbutton", function () {
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $("#img").attr("src", "uploads/cardiology-patient-icon-vector-6244713.jpg");
            $('#editDoctorForm').trigger("reset");
            $.ajax({
                url: 'doctor/editDoctorByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#editDoctorForm').find('[name="id"]').val(response.doctor.id).end()
                $('#editDoctorForm').find('[name="name"]').val(response.doctor.name).end()
                $('#editDoctorForm').find('[name="password"]').val(response.doctor.password).end()
                $('#editDoctorForm').find('[name="email"]').val(response.doctor.email).end()
                $('#editDoctorForm').find('[name="address"]').val(response.doctor.address).end()
                $('#editDoctorForm').find('[name="phone"]').val(response.doctor.phone).end()
                $('#editDoctorForm').find('[name="department"]').val(response.doctor.department).end()
                $('#editDoctorForm').find('[name="profile"]').val(response.doctor.profile).end()
                // $('#editDoctorForm').find('[name="profile"]').val(response.doctor.profile).end()

                if (typeof response.doctor.img_url !== 'undefined' && response.doctor.img_url != '') {
                    $("#img").attr("src", response.doctor.img_url);
                }

                $('.js-example-basic-single.department').val(response.doctor.department).trigger('change');

                $('#myModal2').modal('show');

            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".table").on("click", ".inffo", function () {
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');

            $("#img1").attr("src", "uploads/cardiology-patient-icon-vector-6244713.jpg");
            $('.nameClass').html("").end()
            $('.emailClass').html("").end()
            $('.addressClass').html("").end()
            $('.phoneClass').html("").end()
            $('.departmentClass').html("").end()
            // $('.profileClass').html("").end()
            $('.specialistClass').html("").end()
            $.ajax({
                url: 'doctor/editDoctorByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#editDoctorForm').find('[name="id"]').val(response.doctor.id).end()
                $('.nameClass').append(response.doctor.name).end()
                $('.emailClass').append(response.doctor.email).end()
                $('.addressClass').append(response.doctor.address).end()
                $('.phoneClass').append(response.doctor.phone).end()
                $('.departmentClass').append(response.doctor.department).end()
                // $('.profileClass').append(response.doctor.profile).end()
                $('.specialistClass').append(response.doctor.specialist).end()

                if (typeof response.doctor.img_url !== 'undefined' && response.doctor.img_url != '') {
                    $("#img1").attr("src", response.doctor.img_url);
                }

                $('#infoModal').modal('show');

            });
        });
    });
</script>
<script>
    $(document).ready(function () {
  var table = $('#editable-sample').DataTable({
    responsive: true,
    "processing": true,
    "serverSide": true,
    "searchable": true,
    "ajax": {
      url: "doctor/getDoctor", // Added the URL for retrieving doctor data
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
        title: 'Doctor',
        text: 'Copy',
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'excelHtml5',
        filename: 'Doctor',
        title: 'Doctor',
        text: 'Excel',
        customize: function (xlsx) {
          // Add any customizations for Excel export if needed
        },
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'csvHtml5',
        filename: 'Doctor',
        title: 'Doctor',
        text: 'CSV',
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'pdfHtml5',
        filename: 'Doctor',
        title: 'Doctor',
        text: 'PDF',
        customize: function (pdf) {
          // Add any customizations for PDF export if needed
        },
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'print',
        exportOptions: {
          columns: [0, 1, 2],
        }
      },
    ],
    aLengthMenu: [
      [5, 25, 50, 100, -1], // Changed 10 to 5 to start with 5 records per page
      [5, 25, 50, 100, "All"]
    ],
    iDisplayLength: -1, // Display all records on a single page (no pagination)
    "order": [[0, "desc"]],
    "language": {
      "lengthMenu": "_MENU_",
      search: "_INPUT_",
      // It seems to be dynamically loading a language JSON file based on the PHP variable $this->language.
      // Ensure that the correct language file path is being generated.
      "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
    }
  });

  // Append the buttons container to a specific element with class 'custom_buttons'
  table.buttons().container().appendTo('.custom_buttons');
});

</script>

<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });


</script>
<script>
      $(function(){
  
  $('.eye').click(function(){
       
        if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('.password').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('.password').attr('type','password');
        }
    });
});
</script>



<script>
 $(document).ready(function(){
   $("#department").change(function(){
      var department = $(this).val();
    console.log(department); 
        if(department!=""){
        $.ajax({
            url:"<?=base_url('doctor/get_specialist')?>",
            method:"post",
            dataType: 'json',
            data:{department:department},
            success:function(data){
        html = '<option value="">Select Sepcialist</option>';
        $.each(data, function (key, val) 
        {
        /* console.log(val); */
        html += '<option value="'+val.title+'">'+val.title+'</option>';
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
 $(document).ready(function(){
  $("#department_edit").change(function(){
    var department = $(this).val();
 console.log(department); 
    if(department!=""){
    $.ajax({
            url:"<?=base_url('doctor/get_specialist')?>",
            method:"post",
            dataType: 'json',
            data:{department:department},
            success:function(data){
        html = '<option value="">Select Sepcialist</option>';
        $.each(data, function (key, val) 
        {
        /* console.log(val); */
        html += '<option value="'+val.title+'">'+val.title+'</option>';
    });
         $("#specialist_edit").html(html);
             }
          })
        }
        else{
        $("#specialist").html('<option value="">Select Specialist</option>');
          }
     });
 });
 $(document).ready(function() {
    $("#email_otp, #email_otp_edit").on("click", function() {
      var email = $("#email").val(); // Fixed missing quotes around #email
      if(email=="")
        {
            email=$("#email_edit").val();
        }
      $.ajax({
        type: "POST",
        url: "<?php echo base_url().'doctor/user_verification';?>", // Fixed missing quotes around the URL
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

    $("#phone_otp, #phone_otp_edit").on("click", function() {
      var phone = $("#phone").val(); // Fixed missing quotes around #email
      if(phone=="")
        {
            phone=$("#phone_edit").val();
        }
      $.ajax({
        type: "POST",
        url: "<?php echo base_url().'doctor/user_verification';?>", 
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