<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php
                if (!empty($receptionist->id))
                    echo lang('edit_receptionist');
                else
                    echo lang('add_receptionist');
                ?>
            </header>
            <div class="panel-body col-md-7">
                <div class="adv-table editable-table ">
                    <div class="clearfix">

                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6">
                                            <?php echo validation_errors(); ?>
                                        </div>
                                        <div class="col-lg-3"></div>
                                    </div>
                                    <form role="form" action="receptionist/addNew" method="post" enctype="multipart/form-data" class="nurse-form-addnew">
                                        <div class="form-group">


                                            <label for="exampleInputEmail1"> <?php echo lang('name'); ?><sup>*</sup></label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('name');
                                            }
                                            if (!empty($receptionist->name)) {
                                                echo $receptionist->name;
                                            }
                                            ?>' placeholder="">

                                        </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('email'); ?><sup>*</sup></label>
                                            <input type="email" class="form-control" name="email" id="email" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('email');
                                            }
                                            if (!empty($receptionist->email)) {
                                                echo $receptionist->email;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1"></label>
                                        <button type="button" class="btn btn-info otp_btn" id="email_otp">Generate OTP</button>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">E-mail OTP<sup>*</sup></label>
                                            <input type="text" class="form-control" name="email_verification" id="exampleInputEmail1" value='' placeholder="">
                                        </div>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('password'); ?><sup>*</sup></label>
                                        <div class="input-group">
                                        <input type="password" class="form-control password" name="password"  id="password"  placeholder="********">
                                        <span class="input-group-addon" id="basic-addon2"> <span class="eye_icon" ><i class="fa fa-eye-slash eye" aria-hidden="true"></i></span></span>
                                        </div></div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('address'); ?><sup>*</sup></label>
                                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('address');
                                            }
                                            if (!empty($receptionist->address)) {
                                                echo $receptionist->address;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-6">   
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('phone'); ?><sup>*</sup></label>
                                            <input type="text" class="form-control" name="phone" id="phone" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('phone');
                                            }
                                            if (!empty($receptionist->phone)) {
                                                echo $receptionist->phone;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        </div>
                                <div class="col-md-6">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1"></label>
                                <button type="button" class="btn btn-info otp_btn" id="phone_otp">Generate OTP</button>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Phone OTP<sup>*</sup></label>
                                    <input type="text" class="form-control" name="phone_verification" id="exampleInputEmail1" value='' placeholder="">
                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> <?php echo lang('image'); ?></label>
                                            <input type="file" name="img_url">
                                        </div>

                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($receptionist->id)) {
                                            echo $receptionist->id;
                                        }
                                        ?>'>


                                        <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                                    </form>

                                </div>
                            </section>
                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".editbutton").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $('#editReceptionistForm').trigger("reset");
            $('#myModal2').modal('show');
            $.ajax({
                url: 'receptionist/editReceptionistByJason?id=' + iid,
                method: 'GET',
                data: '',
                dataType: 'json',
            }).success(function (response) {
                // Populate the form fields with the data returned from server
                $('#editReceptionistForm').find('[name="id"]').val(response.receptionist.id).end()
                $('#editReceptionistForm').find('[name="name"]').val(response.receptionist.name).end()
                $('#editReceptionistForm').find('[name="password"]').val(response.receptionist.password).end()
                $('#editReceptionistForm').find('[name="email"]').val(response.receptionist.email).end()
                $('#editReceptionistForm').find('[name="address"]').val(response.receptionist.address).end()
                $('#editReceptionistForm').find('[name="phone"]').val(response.receptionist.phone).end()
            });
        });
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
    $(".otp_btn").on("click",function(event){
        event.preventDefault();
    });
    $("#email_otp").on("click", function() {
      var email = $("#email").val(); 
      $.ajax({
        type: "POST",
        url: "<?php echo base_url().'receptionist/user_verification';?>", 
        data: { user_credential: email },
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
      var phone = $("#phone").val(); 
      $.ajax({
        type: "POST",
        url: "<?php echo base_url().'receptionist/user_verification';?>", 
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