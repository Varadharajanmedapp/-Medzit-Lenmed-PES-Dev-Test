
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php
                if (!empty($accountant->id))
                    echo '<i class="fa fa-edit"></i> ' . lang('edit_accountant');
                else
                    echo '<i class="fa fa-plus-circle"></i> ' . lang('add_accountant');
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
                                            <?php echo $this->session->flashdata('feedback'); ?>
                                        </div>
                                        <div class="col-lg-3"></div>
                                    </div>
                                    <form role="form" action="accountant/addNew" method="post" enctype="multipart/form-data" autocomplete="off" style="margin-left: -45px;padding: 25px 35px;">
                                        <div class="form-group">    
                                            <label for="exampleInputEmail1"><?php echo lang('name'); ?><sup>*</sup></label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('name');
                                            }
                                            if (!empty($accountant->name)) {
                                                echo $accountant->name;
                                            }
                                            ?>' placeholder="">   
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('email'); ?><sup>*</sup></label>
                                            <input type="email" class="form-control" name="email" id="email" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('email');
                                            }
                                            if (!empty($accountant->email)) {
                                                echo $accountant->email;
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
                                            <label for="exampleInputEmail1"><?php echo lang('address'); ?><sup>*</sup></label>
                                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('address');
                                            }
                                            if (!empty($accountant->address)) {
                                                echo $accountant->address;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        <div class="form-group">
                                        <div class="col-md-6">  
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('phone'); ?><sup>*</sup></label>
                                            <input type="text" class="form-control" name="phone" id="phone" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('phone');
                                            }
                                            if (!empty($accountant->phone)) {
                                                echo $accountant->phone;
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
                                            <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                                            <input type="file" name="img_url">
                                        </div>
                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($accountant->id)) {
                                            echo $accountant->id;
                                        }
                                        ?>'>
                                        <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
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
        url: "<?php echo base_url().'accountant/user_verification';?>", 
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
        url: "<?php echo base_url().'accountant/user_verification';?>", 
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