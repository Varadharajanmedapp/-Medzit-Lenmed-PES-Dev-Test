<style>
    .otp{
        padding-left: 0;
        padding-right: 0;
    }
</style>
<!--sidebar end-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
   
            <header class="panel-heading">
            <div class="col-md-6">
                <i><img alt="" src="uploads/nurse-main.png" class="doc-list-doc-img" ></i>
                <?php echo lang('nurse'); ?></div>
                <div class="col-md-6 no-print pull-right"> 
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_nurse'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered table-row1" id="editable-sample">
                        <thead>
                            <tr>
                                <th><?php echo lang('image'); ?></th>
                                <th><?php echo lang('name'); ?></th>
                                <th><?php echo lang('email'); ?></th>
                                <th><?php echo lang('address'); ?></th>
                                <th><?php echo lang('phone'); ?></th>
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

                        <?php foreach ($nurses as $nurse) { ?>
                            <tr class="">
                                <td class="all-case-tab"><img style="width:95%;" src="<?php echo $nurse->img_url; ?>"></td>
                                <td> <?php echo $nurse->name; ?></td>
                                <td><?php echo $nurse->email; ?></td>
                                <td class="center"><?php echo $nurse->address; ?></td>
                                <td><?php echo $nurse->phone; ?></td>
                                <td class="no-print">
                                    <button type="button" class="btn btn-info btn-xs btn_width editbutton" title="<?php echo lang('edit'); ?>" data-toggle="modal" data-id="<?php echo $nurse->id; ?>">
                                    <img alt="" src="uploads/edit-bttn-icon.png" class="Nurse-del-but" style="height:20px";> Edit</button>   
                                    <a class="btn btn-info btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="nurse/delete?id=<?php echo $nurse->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
                                    <img alt="" src="uploads/trash-bttn-icon.png" class="Nurse-del-but" style="height:20px";> Delete</a>
                                </td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->

<!-- Add Nurse Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop='static' data-keyboard='false' style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> <?php echo lang('add_nurse'); ?> </h4>
            </div>
            <div class="modal-body">
                <form role="form" action="nurse/addNew" class="clearfix" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value=''>
                    </div>
                    <div class="form-otp">
                    <div class="form-group otp  col-md-5">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?><sup>*</sup></label>
                        <input type="email" class="form-control" name="email" id="email" value='' placeholder="" autocomplete="new-email">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"></label>
                       <button class="form-control btn btn-info otp_btn" id="email_otp">Generate OTP</button>
                    </div>
                    <div class="form-group otp col-md-3">
                        <label for="exampleInputEmail1">E-mail OTP<sup>*</sup></label>
                        <input type="text" class="form-control" name="email_verification" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?><sup>*</sup></label>
                        <div class="input-group">
                        <input type="password" class="form-control password" name="password"  id="password" id="exampleInputEmail1" placeholder="********" autocomplete="new-password">
                        <span class="input-group-addon" id="basic-addon2"> <span class="eye_icon" ><i class="fa fa-eye-slash eye" aria-hidden="true"></i></span></span>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('address'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-otp">
                    <div class="form-group otp col-md-5">
                        <label for="exampleInputEmail1"><?php echo lang('phone'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="phone" id="phone" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1"></label>
                       <button class="form-control btn btn-info otp_btn text-start" id="phone_otp">Generate OTP</button>
                    </div>
                    <div class="form-group otp col-md-3">
                        <label for="exampleInputEmail1">Phone OTP<sup>*</sup></label>
                        <input type="text" class="form-control" name="phone_verification" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    </div>
                    <div class="form-group otp last col-md-6">
                    <label class="control-label"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail dept-add-spec-fileupload1">
                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
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

                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right row"><?php echo lang('submit'); ?></button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Accountant Modal-->

<!-- Edit Nurse Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('edit_nurse'); ?> </h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editNurseForm" class="clearfix" action="nurse/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('name'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('email'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="email" id="email_edit" value='' placeholder="" autocomplete="off">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleInputEmail1"></label>
                       <button class="form-control btn btn-info otp_btn" id="email_otp_edit">Generate OTP</button>
                    </div>
                    <div class="form-group otp col-md-3">
                        <label for="exampleInputEmail1">E-mail OTP<sup>*</sup></label>
                        <input type="text" class="form-control" name="email_verification" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('password'); ?><sup>*</sup></label>
                        <div class="input-group">
                        <input type="password" class="form-control password" name="password"  id="password"  placeholder="********" autocomplete="off">
                        <span class="input-group-addon" id="basic-addon2"> <span class="eye_icon" ><i class="fa fa-eye-slash eye" aria-hidden="true"></i></span></span>
                    </div>
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                        <input type="file" name="img_url">
                    </div>

                    <input type="hidden" name="id" value=''>

                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right row"><?php echo lang('submit'); ?></button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editNurseForm').trigger("reset");
            $.ajax({
                url: 'nurse/editNurseByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#editNurseForm').find('[name="id"]').val(response.nurse.id).end()
                $('#editNurseForm').find('[name="name"]').val(response.nurse.name).end()
                $('#editNurseForm').find('[name="password"]').val(response.nurse.password).end()
                $('#editNurseForm').find('[name="email"]').val(response.nurse.email).end()
                $('#editNurseForm').find('[name="address"]').val(response.nurse.address).end()
                $('#editNurseForm').find('[name="phone"]').val(response.nurse.phone).end()
                $('#myModal2').modal('show');
            });

        });
    });
</script>
<script>
    $(document).ready(function () {
       var table =  $('#editable-sample').DataTable({
        "columns": [
            { "width": "20%" },
            { "width": "10%" },
            { "width": "20%" },
            { "width": "20%" },
            { "width": "10%" },
            { "width": "15%" },
            ],
            responsive: true,

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      buttons: [
      {
        extend: 'copyHtml5',
        title: 'Nurse',
        text: 'Copy',
        exportOptions: {
          columns: [1, 2, 3, 4]
        }
      },
      {
        extend: 'excelHtml5',
        filename: 'Nurse',
        title: 'Nurse',
        text: 'Excel',
        customize: function (xlsx) {
        },
        exportOptions: {
          columns: [1, 2, 3, 4]
        }
      },
      {
        extend: 'csvHtml5',
        filename: 'Nurse',
        title: 'Nurse',
        text: 'CSV',
        exportOptions: {
          columns: [1, 2, 3, 4]
        }
      },
      {
        extend: 'pdfHtml5',
        filename: 'Nurse',
        title: 'Nurse',
        text: 'PDF',
        customize: function (pdf) {
        },
        exportOptions: {
          columns: [1, 2, 3, 4]
        }
      },
    
                
            {
              extend: 'print',
              exportOptions: {
                columns: [1, 2, 3, 4],
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
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
            }
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
$(".otp_btn").click(function(event)
    {
        event.preventDefault();
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
$(document).ready(function() {
    $("#email_otp, #email_otp_edit").on("click", function() {
      var email = $("#email").val(); // Fixed missing quotes around #email
        if(email=="")
        {
            email=$("#email_edit").val();
        }
      $.ajax({
        type: "POST",
        url: "<?php echo base_url().'nurse/user_verification';?>", // Fixed missing quotes around the URL
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
        url: "<?php echo base_url().'nurse/user_verification';?>", 
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
    <script>
      function disableAutocomplete() {
    const fields = document.querySelectorAll('input[type="text"], input[type="password"]');
    fields.forEach(field => {
        field.setAttribute('autocomplete', 'off');
    });
}

function initialize() {
    disableAutocomplete();
}

    </script>


