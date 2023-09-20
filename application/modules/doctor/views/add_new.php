<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel col-md-6 row">
            <header class="panel-heading">
                <?php
                if (!empty($doctor->id))
                    echo lang('edit_doctor');
                else
                    echo lang('add_doctor');
                ?>
            </header> 
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="panel-body">
                <div class="adv-table editable-table">
                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('feedback'); ?>
                  </div>
                </div>
                        <form role="form" action="doctor/addNew" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('name'); ?><sup>*</sup></label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                if (!empty($setval)) {
                                    echo set_value('name');
                                }
                                if (!empty($doctor->name)) {
                                    echo $doctor->name;
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
                                if (!empty($doctor->email)) {
                                    echo $doctor->email;
                                }
                                ?>' placeholder="" autocomplete="new-username">
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
                                <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********" autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('address'); ?><sup>*</sup></label>
                                <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                if (!empty($setval)) {
                                    echo set_value('address');
                                }
                                if (!empty($doctor->address)) {
                                    echo $doctor->address;
                                }
                                ?>' placeholder="">
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">                           
                                    <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('phone'); ?><sup>*</sup></label>
                                <input type="phone" class="form-control" name="phone" id="phone" value='<?php
                                if (!empty($setval)) {
                                    echo set_value('phone');
                                }
                                if (!empty($doctor->phone)) {
                                    echo $doctor->phone;
                                }
                                ?>' placeholder="">
                            </div></div>
                                <div class="col-md-6">
                                <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"></label>
                       <button type="button" class="btn btn-info otp_btn" id="phone_otp">Generate OTP</button>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Phone OTP</label>
                        <input type="text" class="form-control" name="phone_verification" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                                </div>
                            </div>
 
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('department'); ?><sup>*</sup></label>
                                <select class="form-control m-bot15" name="department" value="" placeholder="Select Department">
                                <option value=""></option>
                                    <?php foreach ($departments as $department) { ?>
                                        <option value="<?php echo $department->name; ?>" <?php
                                        if (!empty($setval)) {
                                            if ($department->name == set_value('department')) {
                                                echo 'selected';
                                            }
                                        }
                                        if (!empty($doctor->department)) {
                                            if ($department->name == $doctor->department) {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo $department->name; ?> </option>
                                            <?php } ?> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('specialist'); ?><sup>*</sup></label>
                                <select class="form-control m-bot15" name="specialist">
                                <option value=""></option>
                                    <?php foreach ($specialists as $specialist) { ?>
                                        <option value="<?php echo $specialist->title; ?>" <?php
                                        if (!empty($setval)) {
                                            if ($specialist->title == set_value('specialist')) {
                                                echo 'selected';
                                            }
                                        }
                                        if (!empty($doctor->specialist)) {
                                            if ($specialist->title == $doctor->specialist) {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo $specialist->title; ?> </option>
                                            <?php } ?> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('profile'); ?><sup>*</sup></label>
                                <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='<?php
                                if (!empty($setval)) {
                                    echo set_value('profile');
                                }
                                if (!empty($doctor->profile)) {
                                    echo $doctor->profile;
                                }
                                ?>' placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                                <input type="file" name="img_url">
                            </div>
                            <input type="hidden" name="id" value='<?php
                            if (!empty($doctor->id)) {
                                echo $doctor->id;
                            }
                            ?>'>
                            <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                        </form>
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
        url: "<?php echo base_url().'doctor/user_verification';?>", 
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