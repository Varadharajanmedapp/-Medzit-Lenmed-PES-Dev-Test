<!DOCTYPE html>
<html lang="en" <?php
if (!$this->ion_auth->in_group(array('superadmin'))) {
  $this->db->where('hospital_id', $this->hospital_id);
  $settings_lang = $this->db->get('settings')->row()->language;
  if ($settings_lang == 'arabic') {
    ?>     
    dir="rtl"
  <?php } else { ?>
    dir="ltr"
    <?php
  }
} else {
  $this->db->where('hospital_id', 'superadmin');
  $settings_lang = $this->db->get('settings')->row()->language;
  if ($settings_lang == 'arabic') {
    ?>
    dir="rtl"     
  <?php } else { ?> 
    dir="ltr"
    <?php
  }
}
?>>
<head>
  <base href="<?php echo base_url(); ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Rizvi">
  <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Hms, Accounting">
  <link rel="shortcut icon" href="uploads/favicon.png">
  <title> <?php echo $this->router->fetch_class(); ?> | 
    <?php
    if ($this->ion_auth->in_group(array('superadmin'))) {
      $this->db->where('hospital_id', 'superadmin');
    } else {
      $this->db->where('hospital_id', $this->hospital_id);
    }
    ?>
    <?php
    echo $this->db->get('settings')->row()->system_vendor;
    ?>  
  </title>
  <link href="common/css/bootstrap.min.css" rel="stylesheet">
  <link href="common/css/bootstrap-reset.css" rel="stylesheet">
  <!--external css-->
  <link href="common/assets/fontawesome5pro/css/all.min.css" rel="stylesheet" />
  <link href="common/assets/DataTables/datatables.min.css" rel="stylesheet" />
  <!-- Css for annual plan design -->
  <link href="common/css/plans.css" rel="stylesheet"/>
  <link id="u-theme-google-font" rel="stylesheet" href="common/css/plans.css">
  <link id="u-page-google-font" rel="stylesheet" href="common/css/plans.min.css">
  <link rel="stylesheet" href="common/css/nicepage.css" media="screen">
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
  <!-- <link href="common/assets/font-awesome/css/font-awesome.css" rel="stylesheet" /> -->
  <!-- Custom styles for this template -->
  <link href="common/css/style.css" rel="stylesheet">
  <link href="common/css/style-responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="common/assets/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
  <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
  <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-timepicker/compiled/timepicker.css">
  <link rel="stylesheet" type="text/css" href="common/assets/jquery-multi-select/css/multi-select.css" />
  <link href="common/css/invoice-print.css" rel="stylesheet" media="print">
  <link href="common/assets/fullcalendar/fullcalendar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="common/assets/select2/css/select2.min.css"/>
  <link rel="stylesheet" type="text/css" href="common/css/lightbox.css"/>
  <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
  <link rel="stylesheet" type="text/css" href="common/assets/DataTables/DataTables-1.10.16/custom/css/datatable-responsive-cdn-version-1-0-7.css" />
  <!-- Google Fonts -->
  <style>
  @import url('https://fonts.googleapis.com/css?family=Ubuntu&display=swap');
</style>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
          <?php
          if (!$this->ion_auth->in_group(array('superadmin'))) {
            if ($settings_lang == 'arabic') {
              ?>
              <style>
              #main-content {
                margin-right: 211px;
                margin-left: 0px; 
              }

              body {
                background: #f1f1f1;

              }
            </style>

            <?php
          }
        } else {
          if ($settings_lang == 'arabic') {
            ?>
            <style>
            #main-content {
              margin-right: 211px;
              margin-left: 0px; 
            }

            body {
              background: #f1f1f1;

            }
          </style>

          <?php
        }
      }
      ?>
<style class="u-style">.u-section-2 {
  background-image: none;
  padding:20px;
  margin-bottom:20px;
}
.u-section-2 .u-image-1 {
  height: 742px;
  margin-top: 0;
  margin-bottom: 0;
}
.u-section-2 .u-layout-wrap-1 {
  width: 1140px;
}
.u-section-2 .u-layout-cell-1 {
  min-height: 636px;
}
.u-section-2 .u-container-layout-1 {
  padding: 0 0 30px;
}
.u-section-2 .u-group-1 {
  min-height: 88px;
  margin-top: 0;
  margin-bottom: 0;
  height: auto;
}
.u-section-2 .u-container-layout-2 {
  padding-left: 30px;
  padding-right: 30px;
}
.u-section-2 .u-text-1 {
  text-transform: uppercase;
  letter-spacing: 2px;
  margin: 10px 0 0;
}
.u-section-2 .u-group-2 {
  min-height: 460px;
  width: 300px;
  margin: 22px auto 0;
}
.u-section-2 .u-container-layout-3 {
  padding: 30px 30px 0;
}
.u-section-2 .u-text-2 {
  font-weight: 700;
  font-size: 2.5rem;
  margin: 0;
}
.u-section-2 .u-text-3 {
  text-transform: uppercase;
  font-size: 1.125rem;
  letter-spacing: 1px;
  margin: 0 16px 0 0;
}
.u-section-2 .u-text-4 {
  line-height: 2.5;
  font-weight: 700;
  font-size: 1rem;
  margin: 42px 30px 0 0;
}
.u-section-2 .u-text-5 {
  line-height: 2.5;
  font-weight: 700;
  font-size: 1rem;
  margin: 0 30px 0 0;
}
.u-section-2 .u-btn-1 {
  background-image: none;
  border-style: none;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-weight: 700;
  margin: 30px auto 0 0;
  padding: 14px 53px 15px 52px;
}
.u-section-2 .u-layout-cell-2 {
  min-height: 636px;
}
.u-section-2 .u-container-layout-4 {
  padding: 0 0 30px;
}
.u-section-2 .u-group-3 {
  min-height: 88px;
  margin-top: 0;
  margin-bottom: 0;
  height: auto;
}
.u-section-2 .u-container-layout-5 {
  padding-left: 30px;
  padding-right: 30px;
}
.u-section-2 .u-text-6 {
  text-transform: uppercase;
  letter-spacing: 2px;
  margin: 10px 0 0;
}
.u-section-2 .u-group-4 {
  min-height: 456px;
  width: 300px;
  margin: 22px auto 0;
}
.u-section-2 .u-container-layout-6 {
  padding: 30px 30px 0;
}
.u-section-2 .u-text-7 {
  font-weight: 700;
  font-size: 2.5rem;
  margin: 0;
}
.u-section-2 .u-text-8 {
  text-transform: uppercase;
  font-size: 1.125rem;
  letter-spacing: 1px;
  margin: 0;
}
.u-section-2 .u-text-9 {
  line-height: 2.5;
  font-weight: 700;
  font-size: 1rem;
  margin: 42px 0 0;
}
.u-section-2 .u-text-10 {
  line-height: 2.5;
  font-weight: 700;
  font-size: 1rem;
  margin: 0;
}
.u-section-2 .u-btn-2 {
  background-image: none;
  border-style: none;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-weight: 700;
  margin: 30px 0 0;
  padding: 14px 53px 15px 52px;
}
.u-section-2 .u-layout-cell-3 {
  min-height: 636px;
}
.u-section-2 .u-container-layout-7 {
  padding: 0 0 30px;
}
.u-section-2 .u-group-5 {
  min-height: 88px;
  margin-top: 0;
  margin-bottom: 0;
  height: auto;
}
.u-section-2 .u-container-layout-8 {
  padding-left: 30px;
  padding-right: 30px;
}
.u-section-2 .u-text-11 {
  text-transform: uppercase;
  letter-spacing: 2px;
  margin: 10px 0 0;
}
.u-section-2 .u-group-6 {
  min-height: 456px;
  width: 300px;
  margin: 22px auto 0;
}
.u-section-2 .u-container-layout-9 {
  padding: 30px 30px 0;
}
.u-section-2 .u-text-12 {
  font-weight: 700;
  font-size: 4.5rem;
  margin: 0;
}
.u-section-2 .u-text-13 {
  text-transform: uppercase;
  font-size: 1.125rem;
  letter-spacing: 1px;
  margin: 0;
}
.u-section-2 .u-text-14 {
  line-height: 2.5;
  font-weight: 700;
  font-size: 1rem;
  margin: 42px 0 0;
}
.u-section-2 .u-btn-3 {
  background-image: none;
  border-style: none;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-weight: 700;
  margin: 30px 0 0;
  padding: 14px 53px 15px 52px;
}
.u-section-2 .u-text-15 {
  width: 479px;
  margin: 30px auto 60px;
}
.u-section-2 .u-btn-4 {
  border-style: none none solid;
  padding: 0;
}
.otp_btn{
  width: 100%;
}
@media (max-width: 1199px) {
  .u-section-2 {
    min-height: 1098px;
  }
  .u-section-2 .u-layout-wrap-1 {
    width: 940px;
  }
  .u-section-2 .u-layout-cell-1 {
    min-height: 524px;
  }
  .u-section-2 .u-group-1 {
    height: auto;
  }
  .u-section-2 .u-container-layout-2 {
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .u-section-2 .u-text-1 {
    font-size: 1.5rem;
  }
  .u-section-2 .u-group-2 {
    width: 293px;
  }
  .u-section-2 .u-container-layout-3 {
    padding-top: 20px;
  }
  .u-section-2 .u-text-3 {
    margin-right: 9px;
  }
  .u-section-2 .u-text-4 {
    margin-right: 23px;
  }
  .u-section-2 .u-text-5 {
    margin-right: 23px;
  }
  .u-section-2 .u-layout-cell-2 {
    min-height: 524px;
  }
  .u-section-2 .u-group-3 {
    height: auto;
  }
  .u-section-2 .u-container-layout-5 {
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .u-section-2 .u-text-6 {
    font-size: 1.5rem;
  }
  .u-section-2 .u-group-4 {
    width: 293px;
  }
  .u-section-2 .u-container-layout-6 {
    padding-top: 20px;
  }
  .u-section-2 .u-layout-cell-3 {
    min-height: 524px;
  }
  .u-section-2 .u-group-5 {
    height: auto;
  }
  .u-section-2 .u-container-layout-8 {
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .u-section-2 .u-text-11 {
    font-size: 1.5rem;
  }
  .u-section-2 .u-group-6 {
    width: 293px;
  }
  .u-section-2 .u-container-layout-9 {
    padding-top: 20px;
  }
}
@media (max-width: 991px) {
  .u-section-2 {
    min-height: 674px;
  }
  .u-section-2 .u-layout-wrap-1 {
    width: 720px;
  }
  .u-section-2 .u-layout-cell-1 {
    min-height: 100px;
  }
  .u-section-2 .u-container-layout-1 {
    padding-top: 0;
    padding-left: 0;
    padding-right: 0;
  }
  .u-section-2 .u-container-layout-2 {
    padding-left: 29px;
  }
  .u-section-2 .u-text-1 {
    width: auto;
    font-size: 1.25rem;
    margin-top: 0;
    margin-left: 1px;
    margin-right: 1px;
  }
  .u-section-2 .u-group-2 {
    width: 220px;
  }
  .u-section-2 .u-container-layout-3 {
    padding-left: 20px;
    padding-right: 20px;
  }
  .u-section-2 .u-text-3 {
    margin-right: 0;
  }
  .u-section-2 .u-text-4 {
    margin-right: 0;
  }
  .u-section-2 .u-text-5 {
    margin-right: 0;
  }
  .u-section-2 .u-btn-1 {
    margin-right: 0;
    padding-right: 24px;
    padding-left: 22px;
  }
  .u-section-2 .u-layout-cell-2 {
    min-height: 100px;
  }
  .u-section-2 .u-container-layout-4 {
    padding-top: 0;
    padding-left: 0;
    padding-right: 0;
  }
  .u-section-2 .u-text-6 {
    font-size: 1.125rem;
    margin-top: 0;
  }
  .u-section-2 .u-group-4 {
    width: 220px;
  }
  .u-section-2 .u-container-layout-6 {
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 0;
  }
  .u-section-2 .u-btn-2 {
    padding-right: 24px;
    padding-left: 22px;
  }
  .u-section-2 .u-layout-cell-3 {
    min-height: 100px;
  }
  .u-section-2 .u-container-layout-7 {
    padding-top: 0;
    padding-left: 0;
    padding-right: 0;
  }
  .u-section-2 .u-container-layout-8 {
    padding-right: 29px;
  }
  .u-section-2 .u-text-11 {
    width: auto;
    font-size: 1.25rem;
    margin-top: 0;
    margin-left: 1px;
    margin-right: 1px;
  }
  .u-section-2 .u-group-6 {
    width: 220px;
  }
  .u-section-2 .u-container-layout-9 {
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 0;
  }
  .u-section-2 .u-btn-3 {
    padding-right: 24px;
    padding-left: 22px;
  }
}
@media (max-width: 767px) {
  .u-section-2 {
    min-height: 2434px;
  }
  .u-section-2 .u-image-1 {
    height: 574px;
  }
  .u-section-2 .u-layout-wrap-1 {
    width: 540px;
    margin-top: -148px;
  }
  .u-section-2 .u-container-layout-2 {
    padding-left: 50px;
    padding-right: 50px;
  }
  .u-section-2 .u-text-1 {
    margin-right: 1px;
    margin-left: 1px;
  }
  .u-section-2 .u-group-2 {
    min-height: 471px;
    margin-right: initial;
    margin-left: initial;
    width: auto;
  }
  .u-section-2 .u-container-layout-3 {
    padding-right: 50px;
    padding-left: 50px;
  }
  .u-section-2 .u-text-2 {
    margin-right: 1px;
  }
  .u-section-2 .u-text-3 {
    margin-right: 1px;
  }
  .u-section-2 .u-text-4 {
    font-size: 1.125rem;
    margin-right: 1px;
  }
  .u-section-2 .u-text-5 {
    font-size: 1.125rem;
    margin-right: 1px;
  }
  .u-section-2 .u-btn-1 {
    margin-left: auto;
    margin-right: auto;
    padding-right: 148px;
    padding-left: 147px;
  }
  .u-section-2 .u-container-layout-5 {
    padding-left: 50px;
    padding-right: 50px;
  }
  .u-section-2 .u-group-4 {
    min-height: 471px;
    margin-right: initial;
    margin-left: initial;
    width: auto;
  }
  .u-section-2 .u-container-layout-6 {
    padding-left: 50px;
    padding-right: 50px;
  }
  .u-section-2 .u-text-9 {
    font-size: 1.125rem;
  }
  .u-section-2 .u-text-10 {
    font-size: 1.125rem;
  }
  .u-section-2 .u-btn-2 {
    margin-left: auto;
    margin-right: auto;
    padding-left: 147px;
    padding-right: 147px;
  }
  .u-section-2 .u-container-layout-8 {
    padding-left: 50px;
    padding-right: 50px;
  }
  .u-section-2 .u-text-11 {
    margin-right: 1px;
    margin-left: 1px;
  }
  .u-section-2 .u-group-6 {
    min-height: 471px;
    margin-right: initial;
    margin-left: initial;
    width: auto;
  }
  .u-section-2 .u-container-layout-9 {
    padding-left: 50px;
    padding-right: 50px;
  }
  .u-section-2 .u-text-14 {
    font-size: 1.125rem;
  }
  .u-section-2 .u-btn-3 {
    margin-left: auto;
    margin-right: auto;
    padding-right: 146px;
    padding-left: 145px;
  }
}
@media (max-width: 575px) {
  .u-section-2 {
    min-height: 2241px;
  }
  .u-section-2 .u-image-1 {
    height: 295px;
  }
  .u-section-2 .u-layout-wrap-1 {
    width: 340px;
    margin-top: -62px;
  }
  .u-section-2 .u-container-layout-2 {
    padding-left: 20px;
    padding-right: 20px;
  }
  .u-section-2 .u-text-1 {
    margin-right: 0;
    margin-left: 0;
  }
  .u-section-2 .u-container-layout-3 {
    padding-left: 20px;
    padding-right: 20px;
  }
  .u-section-2 .u-text-2 {
    font-size: 3.75rem;
    margin-right: 0;
  }
  .u-section-2 .u-text-3 {
    margin-right: 0;
  }
  .u-section-2 .u-text-4 {
    margin-right: 0;
  }
  .u-section-2 .u-text-5 {
    margin-right: 0;
  }
  .u-section-2 .u-btn-1 {
    margin-left: 0;
    margin-right: 0;
    padding-right: 83px;
    padding-left: 82px;
  }
  .u-section-2 .u-container-layout-5 {
    padding-left: 20px;
    padding-right: 20px;
  }
  .u-section-2 .u-container-layout-6 {
    padding-left: 20px;
    padding-right: 20px;
  }
  .u-section-2 .u-text-7 {
    font-size: 3.75rem;
  }
  .u-section-2 .u-btn-2 {
    padding-right: 83px;
    padding-left: 82px;
  }
  .u-section-2 .u-container-layout-8 {
    padding-left: 20px;
    padding-right: 20px;
  }
  .u-section-2 .u-text-11 {
    margin-right: 0;
    margin-left: 0;
  }
  .u-section-2 .u-container-layout-9 {
    padding-left: 20px;
    padding-right: 20px;
  }
  .u-section-2 .u-text-12 {
    font-size: 3.75rem;
  }
  .u-section-2 .u-btn-3 {
    padding-right: 83px;
    padding-left: 82px;
  }
  .u-section-2 .u-text-15 {
    width: 340px;
    margin-bottom: -228px;
  }
}</style>
 </head>
    <body>
      <section id="container">
        <section class="request-main-content" id="main-content" >
            <h4 class="request-h4-text">Register New Patient Here</h4>
      <div class="panel-body request-panel-body" >
        <div class="adv-table editable-table ">
          <div class="col-lg-12">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 request-col-lg-6" >
              <?php echo validation_errors(); ?>
              <?php echo $this->session->flashdata('feedback'); ?>
            </div>
            <div class="col-lg-3"></div>
          </div>
       <form role="form" action="request/addNew_patients" class="clearfix" method="post" enctype="multipart/form-data">
                <div class="form-group col-md-12">
                    <label for="exampleInputEmail1"><?php echo lang('name'); ?></label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1"><?php echo lang('email'); ?></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="enter your mail" autocomplete="new-email" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1"></label>
                    <button type="button" class="btn btn-info otp_btn" id="email_otp" required >Generate OTP</button>
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">E-mail OTP</label>
                    <input type="text" class="form-control" name="email_verification" id="exampleInputEmail1" value='' placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1"><?php echo lang('password'); ?></label>
                    <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1"><?php echo lang('address'); ?></label>
                    <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1"><?php echo lang('phone'); ?></label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1"></label>
                    <button type="button" class="btn btn-info otp_btn" id="phone_otp" required>Generate OTP</button>
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Phone OTP</label>
                    <input type="text" class="form-control" name="phone_verification" id="exampleInputEmail1" value='' placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1"><?php echo lang('sex'); ?></label>
                    <select class="form-control m-bot15" name="sex" value='' required>
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
                    <input class="form-control form-control-inline input-medium default-date-picker" type="text" name="birthdate" value="" placeholder="" readonly="" required>      
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
                <div class="form-group col-md-6">
                    <input type="checkbox" name="sms" value="sms"> <?php echo lang('send_sms') ?><br>
                </div>
                <section class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                </section>
      </form>
</div>
</div>
<!-- page end-->
</section>
</section>
<!--footer start-->
<script src="common/js/codearistos.min.js"></script>
<footer class="site-footer">
  <style>
  p.footer {
    font-weight: 93px;
    font-family: 'Open Sans';
    font-style: ;
    font-weight: 800;
    font-size: 14px;
    padding: 1px 0px 0px 198px;
  }
</style>
<div class="text-center"> 
  <!-- <p>Copyright © 2021 Medappdynamics Group. All rights reserved.</p> -->
  <p class="footer">MedZit & CMS are registered trademarks & copyright of Medappdynamics Pvt Ltd. All rights reserved. <br> Terms of Use | Privacy policy</p>
  <a href="<?php echo current_url() . '#'; ?>" class="go-top">
    <i class="fa fa-angle-up"></i>
  </a>
</div>
</footer>
<!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="common/js/jquery.js"></script>
<script src="common/js/bootstrap.min.js"></script>
<script src="common/js/jquery.scrollTo.min.js"></script>

<script src="common/js/moment.min.js"></script>

<!-- Toggole button Js -->
<script src="common/js/custom.js"></script>

<script class="u-script" type="text/javascript" src="common/js/jquery.nicescroll.js" defer=""></script>
<script type="text/javascript" src="common/assets/DataTables/datatables.min.js"></script>
<script src="common/js/respond.min.js" ></script>
<script type="text/javascript" src="common/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="common/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="common/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="common/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="common/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="common/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>
<script type="text/javascript" src="common/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="common/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script src="common/js/advanced-form-components.js"></script>
<script type="text/javascript" src="common/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script src="common/js/jquery.cookie.js"></script>
<!--common script for all pages--> 
<script src="common/js/lightbox.js"></script>
<script class="include" type="text/javascript" src="common/js/jquery.dcjqaccordion.2.7.js"></script>
<!--script for this page only-->
<script src="common/js/editable-table.js"></script>
<script src="common/assets/fullcalendar/fullcalendar.js"></script>

<script src="common/js/common-scripts.js"></script>

<!-- Annual Plans js  -->


<?php
$language = $this->db->get('settings')->row()->language;

if ($language == 'english') {
  $lang = 'en';
} elseif ($language == 'spanish') {
  $lang = 'es';
} elseif ($language == 'french') {
  $lang = 'fr';
} elseif ($language == 'portuguese') {
  $lang = 'pt';
} elseif ($language == 'arabic') {
  $lang = 'ar';
} elseif ($language == 'italian') {
  $lang = 'it';
}
?>
<script src='common/assets/fullcalendar/locale/<?php echo $lang; ?>.js'></script>
<script src="common/assets/DataTables/DataTables-1.10.16/custom/js/datatable-responsive-cdn-version-2-2-5.js"></script>
<script>
  $('.multi-select').multiSelect({
    selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder=' search...'>",
    selectionHeader: "<input type='text' class='search-input' autocomplete='off' placeholder=''>",
    afterInit: function (ms) {
      var that = this,
      $selectableSearch = that.$selectableUl.prev(),
      $selectionSearch = that.$selectionUl.prev(),
      selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
      selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

      that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
      .on('keydown', function (e) {
        if (e.which === 40) {
          that.$selectableUl.focus();
          return false;
        }
      });

      that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
      .on('keydown', function (e) {
        if (e.which == 40) {
          that.$selectionUl.focus();
          return false;
        }
      });
    },
    afterSelect: function () {
      this.qs1.cache();
      this.qs2.cache();
    },
    afterDeselect: function () {
      this.qs1.cache();
      this.qs2.cache();
    }
  });
</script>

<script>
  $('#my_multi_select3').multiSelect()
</script>

<script>
  $('.default-date-picker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true
  });
  $('#date').on('changeDate', function () {
    $('#date').datepicker('hide');
  });

  $('#date1').on('changeDate', function () {
    $('#date1').datepicker('hide');
  });
</script>
<script type="text/javascript">

  $(document).ready(function () {
    $('#calendar').fullCalendar({
      lang: 'en',
      events: 'appointment/getAppointmentByJason',
      header:
      {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay',
      },
            /*    timeFormat: {// for event elements
             'month': 'h:mm TT A {h:mm TT}', // default
             'week': 'h:mm TT A {h:mm TT}', // default
             'day': 'h:mm TT A {h:mm TT}'  // default
             },
             
             */
             timeFormat: 'h(:mm) A',
             eventRender: function (event, element) {
              element.find('.fc-time').html(element.find('.fc-time').text());
              element.find('.fc-title').html(element.find('.fc-title').text());

            },
            eventClick: function (event) {
              $('#medical_history').html("");
              if (event.id) {
                $.ajax({
                  url: 'patient/getMedicalHistoryByJason?id=' + event.id + '&from_where=calendar',
                  method: 'GET',
                  data: '',
                  dataType: 'json',
                }).success(function (response) {
                        // Populate the form fields with the data returned from server
                        $('#medical_history').html("");
                        $('#medical_history').append(response.view);
                      });
                    //alert(event.id);

                  }

                  $('#cmodal').modal('show');
                },

            /*   eventMouseover: function (calEvent, domEvent) {
             var layer = "<div id='events-layer' class='fc-transparent' style='position:absolute; width:100%; height:100%; top:-1px; text-align:right; z-index:100'>Description</div>";
             $(this).append(layer);
             },
             
             eventMouseout: function (calEvent, domEvent) {
             $(this).append(layer);
             },
             
             */

             slotDuration: '00:5:00',
             businessHours: false,
             slotEventOverlap: false,
             editable: false,
             selectable: false,
             lazyFetching: true,
             minTime: "6:00:00",
             maxTime: "24:00:00",
             defaultView: 'month',
             allDayDefault: false,
             displayEventEnd: true,
             timezone: false,

           });
  });

</script>
<script>
  $(document).ready(function () {
    $('.timepicker-default').timepicker({defaultTime: 'value'});

  });
</script>

<script type="text/javascript" src="common/assets/select2/js/select2.min.js"></script>


<script type="text/javascript">

  $(document).ready(function () {
    $(".js-example-basic-single").select2();

    $(".js-example-basic-multiple").select2();
  });

</script>
<script type="text/javascript">

  $(document).ready(function () {
    var windowH = $(window).height();
    var wrapperH = $('#container').height();
    if (windowH > wrapperH) {
      $('#sidebar').css('height', (windowH) + 'px');
    } else {
      $('#sidebar').css('height', (wrapperH) + 'px');
    }
    var windowSize = window.innerWidth;
    if (windowSize < 769) {
      $('#sidebar').removeAttr('style');
    }
  });
  function onElementHeightChange(elm, callback) {
    var lastHeight = elm.clientHeight, newHeight;
    (function run() {
      newHeight = elm.clientHeight;
      if (lastHeight != newHeight)
        callback();
      lastHeight = newHeight;
      if (elm.onElementHeightChangeTimer)
        clearTimeout(elm.onElementHeightChangeTimer);
      elm.onElementHeightChangeTimer = setTimeout(run, 200);
    })();
  }
  onElementHeightChange(document.body, function () {
    var windowH = $(window).height();
    var wrapperH = $('#container').height();
    if (windowH > wrapperH) {
      $('#sidebar').css('height', (windowH) + 'px');
    } else {
      $('#sidebar').css('height', (wrapperH) + 'px');
    }

    var windowSize = $(window).width();
    if (windowSize < 769) {
      $('#sidebar').removeAttr('style');
    }
  });
let width = screen.width;
  $(window).resize(function () {
    if (width == GetWidth()) {
      return;
    }
    width = GetWidth();
    if (width < 600) {
      $('#sidebar').hide();
    } else {
      $('#sidebar').show();
    }
  });

$(document).ready(function(){

 function load_unseen_notification(view = '')
 {
  $.ajax({
   url:"home/getNotification",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-noti-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }

 load_unseen_notification();

 $(document).on('click', '.dropdown-noti-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });

 setInterval(function(){ 
  load_unseen_notification();
 }, 5000);

});
</script>
<script>
  CKEDITOR.replace("description",
  {
    height: 400
  });
</script>
</body>
</html>
<script>
  $(document).ready(function () {
    <?php
    if (!empty($request->id)) {
      if (empty($request->package)) {
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

      var v = $("select.pos_select option:selected").val();
      var modules_html = '';
      var modules = $("select.pos_select option:selected").data('module');
      if(modules){
        modules = modules.split(',');
        var d_limit = $("select.pos_select option:selected").data('d_limit');
        var p_limit = $("select.pos_select option:selected").data('p_limit');
        modules_html += '<li style="margin-left: 1.8em;"><div class="u-list-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" id="svg-0cec"><path d="m202.6 478-202.6-186.6 70.5-76.6 121.5 111.9 239.4-292.7 80.6 65.9z" fill="currentColor"></path></svg></div>'+d_limit+' Doctors &nbsp;</li>';
        modules_html += '<li style="margin-left: 1.8em;"><div class="u-list-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" id="svg-0cec"><path d="m202.6 478-202.6-186.6 70.5-76.6 121.5 111.9 239.4-292.7 80.6 65.9z" fill="currentColor"></path></svg></div>'+p_limit+' Patients&nbsp;</li>';

        $.each(modules,function(index,value) {
          modules_html += '<li style="margin-left: 1.8em;"><div class="u-list-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" id="svg-0cec"><path d="m202.6 478-202.6-186.6 70.5-76.6 121.5 111.9 239.4-292.7 80.6 65.9z" fill="currentColor"></path></svg></div>'+value+'&nbsp;</li>';
        });
        $('.modules_list').html(modules_html);
      }

      if (v == '') {
        $('.pos_client').show();
      } else {
        $('.pos_client').hide();
      }
    });
  });
  $(document).ready(function() {
    $(".otp_btn").on("click",function(event){
        event.preventDefault();
    });
    $("#email_otp").on("click", function() {
      var email = $("#email").val(); // Fixed missing quotes around #email

      $.ajax({
        type: "POST",
        url: "<?php echo base_url().'request/user_verification';?>", // Fixed missing quotes around the URL
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
      var phone = $("#phone").val(); 
      $.ajax({
        type: "POST",
        url: "<?php echo base_url().'request/user_verification';?>", 
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