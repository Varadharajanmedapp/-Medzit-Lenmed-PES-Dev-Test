<!--sidebar end-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <div class="row">
        <div class="col-md-7">
        <section class="panel">
            <header class="panel-heading">
                <?php
                if (!empty($patient->id))
                    echo lang('edit_patient');
                else
                    echo lang('add_new_patient');
                ?>
            </header>
            <!-- <?php var_dump($departments);?> -->
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                            <section class="panel-body">
                            <div class="adv-table editable-table">
                    <?php echo validation_errors(); ?>
                  </div>
                                <div>
                                    <form role="form" action="patient/addNew" autocomplete="off" method="post" enctype="multipart/form-data">
                                        <div class="form-group">

                                            <div class=""> 
                                                <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                                            </div>
                                            <div class=""> 
                                                <select class="form-control m-bot15 js-example-basic-single" name="doctor" value=''> 
                                                   <option value=""></option>
                                                    <?php foreach ($doctors as $doctor) { ?>
                                                        <option value="<?php echo $doctor->id; ?>" <?php
                                                        if (!empty($patient->doctor)) {
                                                            if ($patient->doctor == $doctor->id) {
                                                                echo 'selected';
                                                            }
                                                        }
                                                        ?> ><?php echo $doctor->name; ?> </option>
                                                            <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('name'); ?><sup>*</sup></label>
                                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('name');
                                            }
                                            if (!empty($patient->name)) {
                                                echo $patient->name;
                                            }
                                            ?>' placeholder="">
                                        </div>

                                        <div class="form-group">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('email'); ?><sup>*</sup></label>
                                            <input type="email" class="form-control" autocomplete="username" name="email" id="email" value='<?php
                                            if (!empty($patient->email)) {
                                                echo $patient->email;
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
                                            <input type="password" class="form-control" autocomplete="new-password" name="password" id="exampleInputEmail1" placeholder="" autocomplete="new-password">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('address'); ?><sup>*</sup></label>
                                            <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                            if (!empty($setval)) {
                                                echo set_value('address');
                                            }
                                            if (!empty($patient->address)) {
                                                echo $patient->address;
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
                                            if (!empty($patient->phone)) {
                                                echo $patient->phone;
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
                                            <label for="exampleInputEmail1"><?php echo lang('sex'); ?><sup>*</sup></label>
                                            <select class="form-control m-bot15" name="sex" value='' required>
                                            <option value=""></option>
                                                <option value="" <?php
                                                if (!empty($patient->sex)) {
                                                    if ($patient->sex == 'Male') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > Male </option>
                                                <option value="Female" <?php
                                                if (!empty($setval)) {
                                                    if (set_value('sex') == 'Female') {
                                                        echo 'selected';
                                                    }
                                                }
                                                if (!empty($patient->sex)) {
                                                    if ($patient->sex == 'Female') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > Female </option>
                                                <option value="Others" <?php
                                                if (!empty($setval)) {
                                                    if (set_value('sex') == 'Others') {
                                                        echo 'selected';
                                                    }
                                                }
                                                if (!empty($patient->sex)) {
                                                    if ($patient->sex == 'Others') {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> > <?php echo lang('others'); ?> </option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label><?php echo lang('birth_date'); ?><sup>*</sup></label>
                                            <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="birthdate" value="<?php
                                            if (!empty($setval)) {
                                                echo set_value('birthdate');
                                            }
                                            if (!empty($patient->birthdate)) {
                                                echo $patient->birthdate;
                                            }
                                            ?>" placeholder="Select Birth Date">      
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('blood_group'); ?><sup>*</sup></label>
                                            
                                            <select class="form-control m-bot15" name="bloodgroup" value='' placeholder="Select blood group">
                                                <option value=""></option>
                                                <?php foreach ($groups as $group) { ?>
                                                    <option value="<?php echo $group->group; ?>" <?php
                                                    if (!empty($setval)) {
                                                        if ($group->group == set_value('bloodgroup')) {     
                                                            echo 'selected';
                                                        }
                                                    }
                                                    if (!empty($patient->bloodgroup)) {
                                                        if ($group->group == $patient->bloodgroup) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?> > <?php echo $group->group; ?> </option>
                                                        <?php } ?> 
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><?php echo lang('image'); ?></label>
                                            <input type="file" name="img_url">
                                        </div>

                                        <?php if (empty($id)) { ?>

                                            <div class="form-group form-group1">
                                                <div class="payment_label"> 
                                                </div>
                                                <div class="d-flex"> 
                                                    <input type="checkbox" name="sms" value="sms"> 
                                                    <div class="checkbox-txt"><?php echo lang('send_sms') ?></div></div>
                                                </div>
                                            </div>

                                        <?php } ?>

                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($patient->id)) {
                                            echo $patient->id;
                                        }
                                        ?>'>
                                        <input type="hidden" name="p_id" value='<?php
                                        if (!empty($patient->patient_id)) {
                                            echo $patient->patient_id;
                                        }
                                        ?>'>
                                        <section class="">
                                            <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                        </section>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
        </div>  
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
        url: "<?php echo base_url().'patient/user_verification';?>", 
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