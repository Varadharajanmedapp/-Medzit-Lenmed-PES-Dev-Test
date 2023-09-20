<!--sidebar end-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
      <header class="panel-heading">
        <?php
        if (!empty($patient->id))
          echo lang('edit_patient');
        else
          echo lang('add_new_patient');
        ?>
      </header>
      <div class="panel-body col-md-7">
        <div class="adv-table editable-table ">
          <div class="clearfix">
            <div class="col-lg-12">
              <section class="panel">
                <div class="panel-body">
                  <div class="col-lg-12">
                      <?php echo validation_errors(); ?>
                  </div>
                  <form role="form" action="patient/addNewER" method="post" enctype="multipart/form-data" class="patient-form-add-new">
                  <div class="col-lg-6">
                    <h5>PATIENT INFORMATION</h5>
                    <div class="form-group">

                      <div class=""> 
                        <label for="exampleInputEmail1"><?php echo lang('doctor'); ?></label>
                      </div>
                      <div class=""> 
                        <select class="form-control m-bot15 js-example-basic-single" name="doctor" value=''> 
                          <option value="null">Select Doctor</option>
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
                    <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
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
                  <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                  <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='<?php
                  if (!empty($patient->email)) {
                    echo $patient->email;
                  }
                ?>' placeholder="" autocomplete="new-username">
              </div>

              <div class="form-group">        
                <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="" autocomplete="new-password">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
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
              <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
              <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='<?php
              if (!empty($setval)) {
                echo set_value('phone');
              }
              if (!empty($patient->phone)) {
                echo $patient->phone;
              }
            ?>' placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1"><?php echo lang('sex'); ?></label>
            <option>Select Gender</option>
            <select class="form-control m-bot15" name="sex" value='' required>
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
      <label><?php echo lang('birth_date'); ?></label>
      <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="birthdate" value="<?php
      if (!empty($setval)) {
        echo set_value('birthdate');
      }
      if (!empty($patient->birthdate)) {
        echo $patient->birthdate;
      }
    ?>" placeholder="">      
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo lang('blood_group'); ?></label>
    <select class="form-control m-bot15" name="bloodgroup" value=''>
       <option value="null">Select Blood Group</option>
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
</div>
<div class="col-lg-6">
  <h5>INSURANCE INFORMATION</h5>
  <div class="form-group">
    <label for="insure_name1">Person responsible(party) for bill</label>
    <input type="text" class="form-control" name="insure_name1" id="insure_name1" value='<?php
    if (!empty($setval)) {
      echo set_value('insure_name1');
    }
    if (!empty($patient->insure_name1)) {
      echo $patient->insure_name1;
    }
    ?>' placeholder="">
  </div>
  <div class="form-group">
    <label for="insure_dob1">Birth date</label>
    <input type="text" class="form-control" name="insure_dob1" id="insure_dob1" value='<?php
    if (!empty($setval)) {
      echo set_value('insure_dob1');
    }
    if (!empty($patient->insure_dob1)) {
      echo $patient->insure_dob1;
    }
    ?>' placeholder="">
  </div>
  <div class="form-group">
    <label for="insure_address1">Address</label>
    <input type="text" class="form-control" name="insure_address1" id="insure_address1" value='<?php
    if (!empty($setval)) {
      echo set_value('insure_address1');
    }
    if (!empty($patient->insure_address1)) {
      echo $patient->insure_address1;
    }
    ?>' placeholder="">
  </div>
  <div class="form-group">
    <label for="insure_phone1">Phone</label>
    <input type="text" class="form-control" name="insure_phone1" id="insure_phone1" value='<?php
    if (!empty($setval)) {
      echo set_value('insure_phone1');
    }
    if (!empty($patient->insure_phone1)) {
      echo $patient->insure_phone1;
    }
    ?>' placeholder="">
  </div>
  <div class="form-group">
    <label for="insure_occupation1">Occupation</label>
    <input type="text" class="form-control" name="insure_occupation1" id="insure_occupation1" value='<?php
    if (!empty($setval)) {
      echo set_value('insure_occupation1');
    }
    if (!empty($patient->insure_occupation1)) {
      echo $patient->insure_occupation1;
    }
    ?>' placeholder="">
  </div>
  <div class="form-group">
    <label for="insure_employer_address">Employer address</label>
    <input type="text" class="form-control" name="insure_employer_address" id="insure_employer_address" value='<?php
    if (!empty($setval)) {
      echo set_value('insure_employer_address');
    }
    if (!empty($patient->insure_employer_address)) {
      echo $patient->insure_employer_address;
    }
    ?>' placeholder="">
  </div>
  <div class="form-group">
    <label for="insure_employer_phone">Employer phone no</label>
    <input type="text" class="form-control" name="insure_employer_phone" id="insure_employer_phone" value='<?php
    if (!empty($setval)) {
      echo set_value('insure_employer_phone');
    }
    if (!empty($patient->insure_employer_phone)) {
      echo $patient->insure_employer_phone;
    }
    ?>' placeholder="">
  </div>
  <div class="form-group">
    <label for="insure_relationship">Patient’s relationship to subscriber</label>
    <input type="text" class="form-control" name="insure_relationship" id="insure_relationship" value='<?php
    if (!empty($setval)) {
      echo set_value('insure_relationship');
    }
    if (!empty($patient->insure_relationship)) {
      echo $patient->insure_relationship;
    }
    ?>' placeholder="">
  </div>
  <div class="form-group">
    <label for="insure_emergency_contact">IN CASE OF EMERGENCY</label>
    <input type="text" class="form-control" name="insure_emergency_contact" id="insure_emergency_contact" value='<?php
    if (!empty($setval)) {
      echo set_value('insure_emergency_contact');
    }
    if (!empty($patient->insure_emergency_contact)) {
      echo $patient->insure_emergency_contact;
    }
    ?>' placeholder="">
  </div>
</div>
<div class="col-lg-12">
<section class="">
  <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
</section>
</div>
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
