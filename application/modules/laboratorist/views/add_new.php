
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php
                if (!empty($laboratorist->id))
                    echo lang('edit_laboratorist');
                else
                    echo lang('add_new_laboratorist');
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
                                    <form role="form" action="laboratorist/addNew" method="post" enctype="multipart/form-data" class="nurse-form-addnew">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('name'); ?><sup>*</sup></label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('name');
                                            }
                                            if (!empty($laboratorist->name)) {
                                                echo $laboratorist->name;
                                            }
                                            ?>' placeholder="">
                                        </div>
                                        <div class="form-group">
                                         <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('email'); ?><sup>*</sup></label>
                                            <input type="text" class="form-control" name="email" id="email" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('email');
                                            }
                                            if (!empty($laboratorist->email)) {
                                                echo $laboratorist->email;
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
                                            <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('address'); ?><sup>*</sup></label>
                                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('address');
                                            }
                                            if (!empty($laboratorist->address)) {
                                                echo $laboratorist->address;
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
                                            if (!empty($laboratorist->phone)) {
                                                echo $laboratorist->phone;
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
                                            <label for="exampleInputEmail1">Image</label>
                                            <input type="file" name="img_url">
                                        </div>
                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($laboratorist->id)) {
                                            echo $laboratorist->id;
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
        url: "<?php echo base_url().'laboratorist/user_verification';?>", 
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
        url: "<?php echo base_url().'laboratorist/user_verification';?>", 
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