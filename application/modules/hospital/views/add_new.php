
<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="col-md-7 row">
            <header class="panel-heading">
            <div class="hospital_add-new">
                <?php
                if (!empty($hospital->id)) {
                    echo lang('edit_hospital');
                } else {
                    echo lang('add_new_hospital');
                }
                ?>
                <h4 class="hospital-addnew-h4">(Scan centers,Diagnostic centers,Hospitals,Primary Healthcare,Government Medical centers)</h4>
                </div>
            </header>
            <div class="panel-body mbot30">
                <div class="adv-table editable-table ">
                    <div class="col-lg-12">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <?php echo validation_errors(); ?>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                    <form role="form" action="hospital/addNew" method="post" enctype="multipart/form-data">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('title'); ?></label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='<?php
                                if (!empty($hospital->name)) {
                                    echo $hospital->name;
                                }
                                ?>' placeholder="" required>
                                <div>
                                    <p class="padp-close error_msg" id="name_error_msg"></p>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                                <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                                if (!empty($hospital->email)) {
                                    echo $hospital->email;
                                }
                                ?>' placeholder="" required>
                                <div>
                                    <p class="padp-close error_msg" id="email_error_msg"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                                <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********" required>
                                <div>
                                    <p class="padp-close error_msg" id="password_error_msg"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                                <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='<?php
                                if (!empty($hospital->address)) {
                                    echo $hospital->address;
                                }
                                ?>' placeholder="" required>
                                <div>
                                    <p class="padp-close error_msg" id="address_error_msg"></p>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('latitude'); ?></label>
                                <input type="text" class="form-control" name="latitude" id="exampleInputEmail1" value='<?php
                                if (!empty($hospital->latitude)) {
                                    echo $hospital->latitude;
                                }
                                ?>' placeholder="" required>
                                <div>
                                    <p class="padp-close error_msg" id="latitude_error_msg"></p>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('longitude'); ?></label>
                                <input type="text" class="form-control" name="longitude" id="exampleInputEmail1" value='<?php
                                if (!empty($hospital->longitude)) {
                                    echo $hospital->longitude;
                                }
                                ?>' placeholder="" required>
                                <div>
                                    <p class="padp-close error_msg" id="longitude_error_msg"></p>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                                <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
                                if (!empty($hospital->phone)) {
                                    echo $hospital->phone;
                                }
                                ?>' placeholder="" maxlength="16" required>
                                <div>
                                    <p class="padp-close error_msg" id="phone_error_msg"></p>
                                </div>
                            </div>
<!-- <div class="col-md-12 lab pad_bot"> -->
    <div class="form-group">

                                <label for="exampleInputEmail1"> <?php echo lang('description'); ?></label>
                                <textarea class="form-control" id="editor" name="description" rows="10" required><?php
                                        if (!empty($setval)) {
                                            echo set_value('description');
                                        }elseif (!empty($hospital->description)) {
                                            echo $hospital->description;
                                        }
                                ?></textarea>
                                <div>
                                    <p class="padp-close error_msg" id="description_error_msg"></p>
                                </div>
                            </div>
                            <?php
                            if (!empty($hospital->id)) {
                                $this->db->where('hospital_id', $hospital->id);
                                $settings = $this->db->get('settings')->row();
                            }
                            ?>

                            <div class="form-group"> 

                                <label for="exampleInputEmail1"> <?php echo lang('language'); ?></label>

                                <select class="form-control m-bot15" name="language" value='' required>
                                    <?php foreach ($available_languages as $key => $value) { ?>
                                        <option value="<?php echo $key; ?>" <?php
                                        if (!empty($settings->language)) {
                                            if ($settings->language == $key) {
                                                echo 'selected';
                                            }
                                        }
                                        ?>><?php echo lang($key); ?> 
                                        </option>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="form-group"> 

                                <label for="exampleInputEmail1"> <?php echo lang('category'); ?></label>

                                <select class="form-control m-bot15" name="category" required>
                                    <option value="hospitals"<?php
                                    if (!empty($hospital->category)) {
                                        if ($hospital->category == 'hospitals') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('hospitals'); ?></option>
                                    <option value="labs_category"<?php
                                    if (!empty($hospital->category)) {
                                        if ($hospital->category == 'labs_category') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('labs_category'); ?></option>
                                    <option value="diagnostic_centres"<?php
                                    if (!empty($hospital->category)) {
                                        if ($hospital->category == 'diagnostic_centres') {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('diagnostic_centres'); ?></option>
                                </select>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleInputEmail1"><?php echo lang('package'); ?></label>
                                <select class="form-control m-bot15 pos_select" id="pos_select" name="package" value='' required>
                                    <option value=""> - - - </option>
                                    <option value="" <?php
                                    if (!empty($hospital->id)) {
                                        if (empty($hospital->package)) {
                                            echo 'selected';
                                        }
                                    }
                                    ?>><?php echo lang('select_manually'); ?></option>
                                            <?php foreach ($packages as $package) { ?>
                                        <option value="<?php echo $package->id; ?>" <?php
                                        if (!empty($setval)) {
                                            if ($package->name == set_value('package')) {
                                                echo 'selected';
                                            }
                                        }
                                        if (!empty($hospital->package)) {
                                            if ($package->id == $hospital->package) {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo $package->name; ?> </option>
                                            <?php } ?> 
                                </select>
                            </div>

                            <div class="form-group pos_client">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('limit'); ?></label>
                                <input type="text" class="form-control" name="p_limit" id="exampleInputEmail1" value='<?php
                                if (!empty($hospital->p_limit)) {
                                    echo $hospital->p_limit;
                                } else {
                                    echo '1000';
                                }
                                ?>' placeholder="Example: 1000" required>
                            </div>

                            <div class="form-group pos_client">
                                <label for="exampleInputEmail1"><?php echo lang('doctor'); ?> <?php echo lang('limit'); ?></label>
                                <input type="text" class="form-control" name="d_limit" id="exampleInputEmail1" value='<?php
                                if (!empty($hospital->d_limit)) {
                                    echo $hospital->d_limit;
                                } else {
                                    echo '500';
                                }
                                ?>' placeholder="Example: 1000" required>
                            </div>

                            <div class="form-group pos_client"> 
                                <label for="exampleInputEmail1"> <?php echo lang('module_permission'); ?></label>
                                <br>
                                <input type='checkbox' value = "accountant" name="module[]"

                                       <?php
                                       if (!empty($hospital->id)) {
                                           $modules = $this->hospital_model->getHospitalById($hospital->id)->module;
                                           $modules1 = explode(',', $modules);
                                           if (in_array('accountant', $modules1)) {
                                               echo 'checked';
                                           }
                                       } else {
                                           echo 'checked';
                                       }
                                       ?>
                                       required> <?php echo lang('accountant'); ?>

                                <br>
                                <input type='checkbox' value = "appointment" name="module[]"  <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('appointment', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('appointment'); ?>                              


                                <br>
                                <input type='checkbox' value = "lab" name="module[]"  <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('lab', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('lab_tests'); ?>
                                <br>
                                <input type='checkbox' value = "bed" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('bed', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('bed'); ?>

                                <br>
                                <input type='checkbox' value = "department" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('department', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('department'); ?>

                                <br>
                                <input type='checkbox' value = "doctor" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('doctor', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('doctor'); ?>

                                <br>
                                <input type='checkbox' value = "donor" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('donor', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('donor'); ?>

                                <br>
                                <input type='checkbox' value = "finance" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('finance', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('financial_activities'); ?>

                                <br>
                                <input type='checkbox' value = "pharmacy" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('pharmacy', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('pharmacy'); ?>

                                <br>
                                <input type='checkbox' value = "laboratorist" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('laboratorist', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('laboratorist'); ?>

                                <br>
                                <input type='checkbox' value = "medicine" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('medicine', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('medicine'); ?>

                                <br>
                                <input type='checkbox' value = "nurse" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('nurse', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('nurse'); ?>

                                <br>
                                <input type='checkbox' value = "patient" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('patient', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required="" > <?php echo lang('patient'); ?>

                                <br>
                                <input type='checkbox' value = "pharmacist" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('pharmacist', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('pharmacist'); ?>

                                <br>
                                <input type='checkbox' value = "prescription" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('prescription', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('prescription'); ?>

                                <br>
                                <input type='checkbox' value = "receptionist" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('receptionist', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('receptionist'); ?>

                                <br>
                                <input type='checkbox' value = "report" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('report', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('report'); ?>


                                <br>
                                <input type='checkbox' value = "notice" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('notice', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('notice'); ?>


                                <br>
                                <input type='checkbox' value = "email" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('email', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('email'); ?>

                                <br>
                                <input type='checkbox' value = "sms" name="module[]" <?php
                                if (!empty($hospital->id)) {
                                    if (in_array('sms', $modules1)) {
                                        echo 'checked';
                                    }
                                } else {
                                    echo 'checked';
                                }
                                ?> required> <?php echo lang('sms'); ?>


                            </div>

                        </div>

                        <input type="hidden" name="id" value='<?php
                        if (!empty($hospital->id)) {
                            echo $hospital->id;
                        }
                        ?>' required>
                        <div class="form-group last col-md-6">
                        <label class="control-label"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail dept-add-spec-fileupload1">
                                    <?php   if (!empty($hospital->img_url)) { ?>
                                        <img src="<?php echo $hospital->img_url; ?>" alt="" />   
                                    <?php } else { ?> 
                                        <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    <?php } ?>
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
                        <div class="panel col-md-12">
                            <button name="submit" class="btn btn-info pull-right" id="submt-btn"><?php echo lang('submit'); ?></button>
                        </div>
                    </form>


                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
<script src="common/js/codearistos.min.js"></script>
<script>
    $(document).ready(function () {
<?php
if (!empty($hospital->id)) {
    if (empty($hospital->package)) {
        ?>
                $('.pos_client').show();
    <?php } else { ?>
                $('.pos_client').hide();
        <?php
    }
} else {
    ?>
            $('.pos_client').hide();
<?php } ?>
        $(document.body).on('change', '#pos_select', function () {

            var v = $("select.pos_select option:selected").val()
            if (v == '') {
                $('.pos_client').show();
            } else {
                $('.pos_client').hide();
            }
        });

    });

    /*  validation */
$(document).ready(function() {
  $('#submt-btn').on('click', function() {

    // Clear previous warning messages
    $('.error_msg').text('');

    // Validate the form inputs
    var name = $('input[name="name"]').val().trim();
    var email = $('input[name="email"]').val().trim();
    var password = $('input[name="password"]').val().trim();
    var address = $('input[name="address"]').val().trim();
    var latitude = $('input[name="latitude"]').val().trim();
    var longitude = $('input[name="longitude"]').val().trim();
    var phone = $('input[name="phone"]').val().trim();
    var description = $('textarea[name="description"]').val().trim();

    if (name === '') {
      $('#name_error_msg').text('Please enter a name.');
      return false;
      window.location.href = '#name_error_msg';
    }

    if (email === '') {
      $('#email_error_msg').text('Please enter an email.');
      return false;
      window.location.href = '#email_error_msg';
    }

    if (password === '') {
      $('#password_error_msg').text('Please enter an password.');
      return false;
      window.location.href = '#password_error_msg';
    }

     if (address.length < 10) {
      $('#address_error_msg').text('Please enter an address minimum length of 10 characters is required .');
      return false;
      window.location.href = '#address_error_msg';
    }

     if (latitude === '') {
      $('#latitude_error_msg').text('Please enter an latitude.');
      return false;
      window.location.href = '#latitude_error_msg';
    }

     if (longitude === '') {
      $('#longitude_error_msg').text('Please enter an longitude.');
      return false;
      window.location.href = '#longitude_error_msg';
    }
     if (phone === '') {
      $('#phone_error_msg').text('Please enter an phone.');
      return false;
      window.location.href = '#phone_error_msg';
    }
     var phonePattern = /^[\d()+-]{15,}$/;
    if (phone === '') {
      $('#phone_error_msg').text('Please enter a phone number.');
      return false;
    } else if (!phonePattern.test(phone)) {
      $('#phone_error_msg').text('Please enter a valid phone number. A minimum length of 16 characters is required');
      return false;
      window.location.href = '#phone_error_msg';
    }
    
    if (description.length < 10) {
      $('#description_error_msg').text('Please enter an description minimum length of 10 characters is required .');
      return false;
      window.location.href = '#description_error_msg';
    }


  });
});

</script>
