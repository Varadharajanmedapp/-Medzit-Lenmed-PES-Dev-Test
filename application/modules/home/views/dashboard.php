<!DOCTYPE html>
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

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
  <link rel="stylesheet" href="common/css/style-superadmin.css" type="text/css" media="all">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>



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

    </head>

    <body>
      <section id="container" class="">
        <!--header start-->
        <header class="header white-bg header-white-bg1" >

          <div class="sidebar-toggle-box">
         
            <div data-original-title="Toggle Navigation" data-placement="right" class=" fa-bars tooltips"> <img alt="" src="uploads/menu-icon.png" class="header-menu-icon" > </div>
          </div>
          <!--logo start-->
          <?php
          if (!$this->ion_auth->in_group(array('superadmin'))) {
            $hospital_id = $this->hospital_id ? $this->hospital_id : 1;
            $this->db->where('hospital_id', $hospital_id);
            $settings_title = $this->db->get('settings')->row()->title;
            ?>
              <a href="home" class="logo">

                <!-- <h2><center><img class="logo" alt="" src="uploads/logo.png"></center></h2> -->
                <div class="logo_title">
                  <?php echo $settings_title; ?>
                </div>
              </a>

          <?php } else { ?>

              <a href="" class="logo">

                <!-- <h2><center><img class="logo" alt="" src="uploads/logo.png"></center></h2> -->
                <img alt="" src="uploads/medappdynamics.png" class="medappdynamics-logo"></h2>

                          <!-- <strong>
                              Med
                              <span>
                                Apps
                              </span>
                            </strong> -->
                          </a>

                      <?php } ?>

                      <!--logo end-->
                      <div class="nav notify-row" id="top_menu">
                       <h4 class="title-text" >Welcome to Patient Engagement System (PES)</h4>

                       <!--  notification start -->
                       <?php /*<ul class="nav top-menu">
                        <!-- Bed Notification start -->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse'))) { ?> 
                        <?php if (in_array('bed', $this->modules)) { ?>
                        <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-procedures"></i>
                        <span class="badge bg-success">  
                        <?php
                        $this->db->where('hospital_id', $this->hospital_id);
                        $query = $this->db->get('bed')->result();
                        $available_bed = 0;
                        foreach ($query as $bed) {
                        $last_a_time = explode('-', $bed->last_a_time);
                        $last_d_time = explode('-', $bed->last_d_time);
                        if (!empty($last_d_time[1])) {
                        $last_d_h_am_pm = explode(' ', $last_d_time[1]);
                        $last_d_h = explode(':', $last_d_h_am_pm[1]);
                        if ($last_d_h_am_pm[2] == 'AM') {
                        $last_d_m = ($last_d_h[0] * 60 * 60) + ($last_d_h[1] * 60);
                        } else {
                        $last_d_m = (12 * 60 * 60) + ($last_d_h[0] * 60 * 60) + ($last_d_h[1] * 60);
                        }
                        $last_d_time_s = strtotime($last_d_time[0]) + $last_d_m;
                        if (time() > $last_d_time_s) {
                        $available_bed = $available_bed + 1;
                        }
                        } else {
                        $available_bed = $available_bed + 1;
                        }
                        }
                        echo $available_bed;
                        ?>
                        </span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li>
                        <p class="green">
                        <?php
                        if (!empty($query)) {
                        echo $available_bed;
                        } else {
                        $available_bed = 0;
                        echo $available_bed;
                        }
                        ?> 
                        <?php
                        if ($available_bed <= 1) {
                        echo lang('bed_is_available');
                        } else {
                        echo lang('beds_are_available');
                        }
                        ?>
                        </p>
                        </li>
                        <?php ?>
                        <li class="external">
                        <a href="bed/bedAllotment"><p class="green"><?php
                        if ($available_bed > 0) {
                        echo lang('add_a_allotment');
                        } else {
                        echo lang('no_bed_is_available_for_allotment');
                        }
                        ?></p></a>
                        </li>
                        </ul>
                        </li>
                        <?php } ?>
                        <?php } ?>
                        <!-- Bed notification end -->
                        <!-- Payment notification start-->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?> 
                        <?php if (in_array('finance', $this->modules)) { ?>
                        <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-money-check"></i>
                        <span class="badge bg-important"> 
                        <?php
                        $this->db->where('hospital_id', $this->hospital_id);
                        $query = $this->db->get('payment');
                        $query = $query->result();
                        foreach ($query as $payment) {
                        $payment_date = date('y/m/d', $payment->date);
                        if ($payment_date == date('y/m/d')) {
                        $payment_number[] = '1';
                        }
                        }
                        if (!empty($payment_number)) {
                        echo $payment_number = array_sum($payment_number);
                        } else {
                        $payment_number = 0;
                        echo $payment_number;
                        }
                        ?>        
                        </span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-red"></div>
                        <li>
                        <p class="red"> <?php
                        echo $payment_number . ' ';
                        if ($payment_number <= 1) {
                        echo lang('payment_today');
                        } else {
                        echo lang('payments_today');
                        }
                        ?></p>
                        </li>
                        <li>
                        <a href="finance/payment"><p class="green"> <?php echo lang('see_all_payments'); ?></p></a>
                        </li>
                        </ul>
                        </li>
                        <?php } ?>
                        <?php } ?>
                        <!-- payment notification end -->  
                        <!-- patient notification start-->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Nurse', 'Laboratorist'))) { ?> 
                        <?php if (in_array('patient', $this->modules)) { ?>
                        <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-user"></i>
                        <span class="badge bg-warning">   
                        <?php
                        $this->db->where('hospital_id', $this->hospital_id);
                        $this->db->where('add_date', date('m/d/y'));
                        $query = $this->db->get('patient');
                        $query = $query->result();
                        foreach ($query as $patient) {
                        $patient_number[] = '1';
                        }
                        if (!empty($patient_number)) {
                        echo $patient_number = array_sum($patient_number);
                        } else {
                        $patient_number = 0;
                        echo $patient_number;
                        }
                        ?>
                        </span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                        <p class="yellow"><?php
                        echo $patient_number . ' ';
                        if ($patient_number <= 1) {
                        echo lang('patient_registerred_today');
                        } else {
                        echo lang('patients_registerred_today');
                        }
                        ?> </p>
                        </li>    
                        <li>
                        <a href="patient"><p class="green"><?php echo lang('see_all_patients'); ?></p></a>
                        </li>
                        </ul>
                        </li>
                        <?php } ?>
                        <?php } ?>
                        <!-- patient notification end -->  
                        <!-- donor notification start-->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Laboratorist'))) { ?> 
                        <?php if (in_array('donor', $this->modules)) { ?>
                        <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-user"></i>
                        <span class="badge bg-success">       
                        <?php
                        $this->db->where('hospital_id', $this->hospital_id);
                        $this->db->where('add_date', date('m/d/y'));
                        $query = $this->db->get('donor');
                        $query = $query->result();
                        foreach ($query as $donor) {
                        $donor_number[] = '1';
                        }
                        if (!empty($donor_number)) {
                        echo $donor_number = array_sum($donor_number);
                        } else {
                        $donor_number = 0;
                        echo $donor_number;
                        }
                        ?>
                        </span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                        <p class="green"><?php
                        echo $donor_number . ' ';
                        if ($donor_number <= 1) {
                        echo lang('donor_registerred_today');
                        } else {
                        echo lang('donors_registerred_today');
                        }
                        ?> </p>
                        </li>
                        <li>
                        <a href="donor"><p class="green"><?php echo lang('see_all_donors'); ?></p></a>
                        </li>
                        </ul>
                        </li>
                        <?php } ?>
                        <?php } ?> 
                        <!-- donor notification end -->  
                        <!-- medicine notification start-->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist', 'Doctor'))) { ?> 
                        <?php if (in_array('medicine', $this->modules)) { ?>
                        <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-medkit"></i>
                        <span class="badge bg-success">                          
                        <?php
                        $this->db->where('hospital_id', $this->hospital_id);
                        $this->db->where('add_date', date('m/d/y'));
                        $query = $this->db->get('medicine');
                        $query = $query->result();
                        foreach ($query as $medicine) {
                        $medicine_number[] = '1';
                        }
                        if (!empty($medicine_number)) {
                        echo $medicine_number = array_sum($medicine_number);
                        } else {
                        $medicine_number = 0;
                        echo $medicine_number;
                        }
                        ?>
                        </span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                        <p class="yellow"><?php
                        echo $medicine_number . ' ';
                        if ($medicine_number <= 1) {
                        echo lang('medicine_registerred_today');
                        } else {
                        echo lang('medicines_registered_today');
                        }
                        ?> </p>
                        </li>
                        <li>
                        <a href="medicine"><p class="green"><?php echo lang('see_all_medicines'); ?></p></a>
                        </li>
                        </ul>
                        </li>
                        <?php } ?>
                        <?php } ?> 
                        <!-- medicine notification end -->  
                        <!-- report notification start-->
                        <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist', 'Nurse'))) { ?> 
                        <?php if (in_array('report', $this->modules)) { ?>
                        <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-notes-medical"></i>
                        <span class="badge bg-success">                         
                        <?php
                        $this->db->where('hospital_id', $this->hospital_id);
                        $this->db->where('add_date', date('m/d/y'));
                        $query = $this->db->get('report');
                        $query = $query->result();
                        foreach ($query as $report) {
                        $report_number[] = '1';
                        }
                        if (!empty($report_number)) {
                        echo $report_number = array_sum($report_number);
                        } else {
                        $report_number = 0;
                        echo $report_number;
                        }
                        ?>
                        </span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                        <p class="yellow"><?php
                        echo $report_number . ' ';
                        if ($report_number <= 1) {
                        echo lang('report_added_today');
                        } else {
                        echo lang('reports_added_today');
                        }
                        ?> </p>
                        </li>
                        <li>
                        <a href="report"><p class="green"><?php echo lang('see_all_reports'); ?></p></a>
                        </li>
                        </ul>
                        </li>
                        <?php } ?>
                        <?php } ?>
                        <?php if ($this->ion_auth->in_group('Patient')) { ?> 
                        <?php if (in_array('report', $this->modules)) { ?>
                        <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-notes-medical"></i>
                        <span class="badge bg-success">                         
                        <?php
                        $this->db->where('hospital_id', $this->hospital_id);
                        $query = $this->db->get('report');
                        $query = $query->result();
                        foreach ($query as $report) {
                        if ($this->ion_auth->user()->row()->id == explode('*', $report->patient)[1]) {
                        $report_number[] = '1';
                        }
                        }
                        if (!empty($report_number)) {
                        echo $report_number = array_sum($report_number);
                        } else {
                        $report_number = 0;
                        echo $report_number;
                        }
                        ?>
                        </span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                        <p class="yellow"><?php
                        echo $report_number . ' ';
                        if ($report_number <= 1) {
                        echo lang('report_is_available_for_you');
                        } else {
                        echo lang('reports_are_available_for_you');
                        }
                        ?> </p>
                        </li>
                        <li>
                        <a href="report/myreports"><p class="green"><?php echo lang('see_your_reports'); ?></p></a>
                        </li>
                        </ul>
                        </li>
                        <?php } ?>
                        <?php } ?>
                        <!-- report notification end -->
                        </ul>*/?>
      </div>
      <div class="top-nav ">
          <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle1" href="#" >
                <img alt="" src="uploads/clinic-icon.png" class="clinic-icon">
                <span class="username">
                  <?php
                  $username = $this->ion_auth->user()->row()->username;
                  if (!empty($username)) {
                    $username = explode(' ', $username);
                    $first_name = $username[0];
                    echo $first_name;
                  }
                  ?> 
                </span> 
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <?php if (!$this->ion_auth->in_group('admin')) { ?> 
                    <li ><a href=""><i class="fa fa-home"></i> <?php echo lang('dashboard'); ?></a></li>
                <?php } ?>
                <li><a href="profile"><i class=" fa fa-suitcase"></i><?php echo lang('profile'); ?></a></li>
                <?php if ($this->ion_auth->in_group('admin')) { ?> 
                    <li><a href="settings"><i class="fa fa-cog" ></i> <?php echo lang('settings'); ?></a></li>
                <?php } ?>

                <li><a><i class="fa fa-user"></i> <?php echo $this->ion_auth->get_users_groups()->row()->name ?></a></li>
                <li><a href="auth/logout"><i class="fa fa-key"></i> <?php echo lang('log_out'); ?></a></li>
              </ul>
            </li>
            <!-- user login dropdown end -->
          </ul>
          <ul class="nav navbar-nav navbar-right navbar1">
            <li class="dropdown">
             <a href="#" class="dropdown-toggle dropdown-noti-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count label-danger-count1" ></span> <span class="glyphicon glyphicon-bell"></span></a>
             <ul class="dropdown-menu dropdown-noti-menu"></ul>
            </li>
           </ul>
               <!-- <div class="nav pull-right top-menu"> <a href="home">
          <img alt="" src="uploads/medzit.png"  style="max-width: 100px;height: auto;-webkit-border-radius: 4px;padding: 6px; float: right;"></a></div>
          <?php /*
           $message = $this->session->flashdata('feedback');
           if (!empty($message)) {
           ?>
           <code class="flashmessage pull-right"> <?php echo $message; ?></code>
           <?php } */?> 
        </div>-->
      </header>
      <!--header end-->
      <!--sidebar start-->

      <!--sidebar start-->
      <aside>
        <div id="sidebar"  class="nav-collapse nav-collapse1">
        
          <!-- sidebar menu start-->
          <ul class="sidebar-menu sidebar-menu1" id="nav-accordion" >
            <li class="sub-menu sidebar-menu-li">
              <a href="home">
              <i ><img alt="" src="uploads/Dhasboard-icon.png" class="sidebar-menu-iconn"></i>
             
           <span><?php echo lang('dashboard'); ?></span>
              </a>
            </li>
            <?php if ($this->ion_auth->in_group('admin')) { ?>
                <?php if (in_array('department', $this->modules)) { ?>
                  
                    <li class="sub-menu sub-menu1">
                      <a href="department" >
                      <i> <img alt="" src="uploads/Departments-icon.png" class="sidebar-menu-iconn"></i> 
                        
                        <span ><?php echo lang('departments'); ?></span>
                        
                      </a>
                      <ul class="sub">

                        <li class="sub-menu2-icon"><a href="department"><i><img alt="" src="uploads/Department-icon.png" class="sidebar-menu-iconn"></i><?php echo lang('department'); ?></a></li>
                        <li class="sub-menu2-icon"><a href="department/specialist"><i><img alt="" src="uploads/Specialist-icon.png" class="sidebar-menu-iconn"></i><?php echo lang('specialist'); ?></a></li>
                        <li class="sub-menu2-icon"><a href="department/med_procedures"><i><img alt="" src="uploads/medical-Procedure-icon.png" class="sidebar-menu-iconn"></i><?php echo lang('medical_procedures'); ?></a></li>
                      </ul>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                <?php if (in_array('doctor', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1" >
                      <a href="javascript:;" >
                        <i><img alt="" src="uploads/Doctor-icon.png" class="sidebar-menu-iconn"></i>
                        <span><?php echo lang('doctor'); ?></span>
                      </a>
                      <ul class="sub">
                        <li  class="sub-menu2-icon"><a href="doctor" ><i><img alt="" src="uploads/List-of-Doctor-icon.png"></i><?php echo lang('list_of_doctors'); ?></a></li>
                        <li  class="sub-menu2-icon"><a href="appointment/treatmentReport"><i><img alt="" src="uploads/treatment-history-icon.png"></i><?php echo lang('treatment_history'); ?></a></li>
                      </ul> 
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist', 'Receptionist'))) { ?>
                <?php if (in_array('patient', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1" >
                      <a href="javascript:;" >
                        <i> <img alt="" src="uploads/Patient-icon22.png" class="sidebar-menu-iconn"></i> 
                        <span><?php echo lang('patient'); ?></span>
                      </a>
                      <ul class="sub"> 
                        <li class="sub-menu2-icon" ><a href="patient"><i><img alt="" src="uploads/patient-list-icon.png"></i><?php echo lang('patient_list'); ?></a></li>
                        <?php /* if ($this->ion_auth->in_group(array('admin'))) { /* ?>
                         <li><a href="patient/icd_list"><i class="fa fa-user"></i><?php echo lang('icd_list'); ?></a></li>
                         <?php } */?>

                        <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'Receptionist'))) { ?>
                            <li  class="sub-menu2-icon" ><a href="patient/patientPayments"><i><img alt="" src="uploads/Payments-icon.png" ></i><?php echo lang('payments'); ?></a></li>
                        <?php } ?>
                        <?php if (!$this->ion_auth->in_group(array('Accountant'))) { ?>
                            <li class="sub-menu2-icon"><a href="patient/documents"><i><img alt="" src="uploads/Document-icon.png" ></i><?php echo lang('documents'); ?></a></li>
                            <li class="sub-menu2-icon"><a href="patient/addNewER"><i><img alt="" src="uploads/Emergncy-room-icon.png" ></i><?php echo lang('new_er'); ?></a></li>
                        <?php } ?>
                      </ul>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist', 'Receptionist'))) { ?>
                <?php if (in_array('patient', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1" >
                      <a href="javascript:;" >
                        <i> <img alt="" src="uploads/case-manager-icon.png" class="sidebar-menu-iconn"></i> 
                        <span><?php echo lang('case'); ?> <?php echo lang('manager'); ?></span>
                      </a>
                      <ul class="sub"> 
                        <?php if (!$this->ion_auth->in_group(array('Accountant'))) { ?>
                            <li class="sub-menu2-icon"><a href="patient/case_referrals"><i class="fal fa-users-medical"></i><?php echo lang('case'); ?> <?php echo lang('referrals'); ?></a></li>
                            <li class="sub-menu2-icon"><a href="patient/caseList"><i><img alt="" src="uploads/treatment-history-icon.png" ></i><?php echo lang('case'); ?> <?php echo lang('history'); ?></a></li>                         
                        <?php } ?>
                      </ul>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if (false && $this->ion_auth->in_group(array('admin', 'Accountant', 'Doctor', 'superadmin'))) { ?>
                <?php //if (in_array('invoices', $this->modules)) { ?>
                  <li class="sub-menu sub-menu1">
                    <a href="javascript:;" >
                      <i class="fa fa-users-medical fa-users-medical1" ></i> 
                      <span><?php echo lang('invoice'); ?></span>
                    </a>s
                     <ul class="sub"> 
                      <li><a href="invoices"><i class="fa fa-user"></i><?php echo lang('patient_invoice_list'); ?></a></li>
                    </ul> 
                  </li>
                <?php //} ?>
            <?php } ?>


            <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Receptionist'))) { ?>
                <?php if (in_array('appointment', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1">
                      <a href="javascript:;" >
                        <i ><img alt="" src="uploads/Shedule-icon.png" class="sidebar-menu-iconn"></i> 
                        <span><?php echo lang('schedule'); ?></span>
                      </a>
                      <ul class="sub"> 
                        <li class="sub-menu2-icon"><a href="schedule"><i><img alt="" src="uploads/All-Shedule-icon.png"></i><?php echo lang('all'); ?>     <?php echo lang('schedule'); ?></a></li>
                        <li class="sub-menu2-icon"><a href="schedule/allHolidays"><i><img alt="" src="uploads/Holidays-icon.png" ></i><?php echo lang('holidays'); ?></a></li> 
                      </ul>
                    </li>
                <?php } ?>
            <?php } ?>

            <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                <?php if (in_array('appointment', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1" >
                      <a href="javascript:;" >
                        <i class="fa fa-clock fa-clock1" ></i> 
                        <span><?php echo lang('schedule'); ?></span>
                      </a>
                      <ul class="sub"> 
                        <li><a href="schedule/timeSchedule"><i class="fa fa-list-alt"></i><?php echo lang('all'); ?>     <?php echo lang('schedule'); ?></a></li>
                        <li><a href="schedule/holidays"><i class="fa fa-list-alt"></i><?php echo lang('holidays'); ?></a></li> 
                      </ul>
                    </li>
                <?php } ?>
            <?php } ?>

            <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist'))) { ?>
                <?php if (in_array('appointment', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1" >
                      <a href="javascript:;" >
                        <i><img alt="" src="uploads/Appointmentst-icon.png" class="sidebar-menu-iconn"></i> 
                        <span><?php echo lang('appointment'); ?></span>
                      </a>
                      <ul class="sub" > 
                        <li class="sub-menu2-icon"><a href="appointment"><i><img alt="" src="uploads/All-icon.png" ></i><?php echo lang('all'); ?></a></li>
                        <li class="sub-menu2-icon"><a href="appointment/addNewView"><i><img alt="" src="uploads/Add-icon.png" ></i><?php echo lang('add'); ?></a></li>
                        <li class="sub-menu2-icon"><a href="appointment/todays"><i><img alt="" src="uploads/Todays-icon.png"></i><?php echo lang('todays'); ?></a></li>
                        <li class="sub-menu2-icon"><a href="appointment/upcoming"><i><img alt="" src="uploads/Upcoming-icon.png" ></i><?php echo lang('upcoming'); ?></a></li>
                        <li class="sub-menu2-icon"><a href="appointment/calendar"><i><img alt="" src="uploads/Callender-icon.png" ></i><?php echo lang('calendar'); ?></a></li>
                        <li class="sub-menu2-icon"><a href="appointment/request"><i><img alt="" src="uploads/Request-icon.png" ></i><?php echo lang('request'); ?></a></li>
                      </ul>
                    </li>
                <?php } ?>
            <?php } ?>


            <?php if ($this->ion_auth->in_group(array(''))) { ?>
                <?php if (in_array('appointment', $this->modules)) { ?>
                    <li class="sub-menu">
                      <a href="javascript:;" >
                        <i class="fa fa-headphones"></i> 
                        <span><?php echo lang('live'); ?>     <?php echo lang('meetings'); ?></span>
                      </a>
                      <ul class="sub"> 
                        <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                            <li><a href="meeting/addNewView"><i class="fa fa-plus-circle"></i><?php echo lang('create'); ?>       <?php echo lang('meeting'); ?></a></li>
                        <?php } ?>
                        <li><a href="meeting"><i class="fa fa-video"></i><?php echo lang('live'); ?>     <?php echo lang('now'); ?></a></li>
                        <li><a href="meeting/upcoming"><i class="fa fa-list-alt"></i><?php echo lang('upcoming'); ?>     <?php echo lang('meetings'); ?></a></li>
                        <li><a href="meeting/previous"><i class="fa fa-list-alt"></i><?php echo lang('previous'); ?>     <?php echo lang('meetings'); ?></a></li>
                      </ul>
                    </li>
                <?php } ?>
            <?php } ?> 



            <?php if ($this->ion_auth->in_group(array(''))) { ?>
                <?php if (in_array('appointment', $this->modules)) { ?>
                    <li><a href="meeting"><i class="fa fa-headphones"></i><?php echo lang('join_live'); ?></a></li>
                <?php } ?>
            <?php } ?>

            <?php if ($this->ion_auth->in_group(array('Patient'))) { ?>
                <?php if (in_array('appointment', $this->modules)) { ?>
                    <li><a href="appointment/myTodays"><i class="fa fa-headphones"></i><?php echo lang('todays'); ?>     <?php echo lang('appointment'); ?></a></li>
                <?php } ?>
            <?php } ?>







            <?php if ($this->ion_auth->in_group('admin')) { ?>
                <li class="sub-menu sub-menu1">
                  <a href="javascript:;" >
                    <i><img alt="" src="uploads/HR-icon.png" class="sidebar-menu-iconn"></i>
                    <span><?php echo lang('human_resources'); ?></span>
                  </a>
                  <ul class="sub">
                    <?php if (in_array('medicine', $this->modules)) { ?>
                        <li class="sub-menu2-icon"><a href="nurse"><i><img alt="" src="uploads/Nurse-icon.png"></i><?php echo lang('nurse'); ?></a></li>
                    <?php } ?>
                    <?php if (in_array('medicine', $this->modules)) { ?>
                        <li class="sub-menu2-icon"><a href="pharmacist"><i><img alt="" src="uploads/Pharmacist-icon.png"></i><?php echo lang('pharmacist'); ?></a></li>
                    <?php } ?>
                    <?php if (in_array('medicine', $this->modules)) { ?>
                        <li class="sub-menu2-icon"><a href="laboratorist"><i><img alt="" src="uploads/Laboratariist-icon.png"></i><?php echo lang('laboratorist'); ?></a></li>
                    <?php } ?>
                    <?php if (in_array('medicine', $this->modules)) { ?>
                        <li class="sub-menu2-icon"><a href="accountant"><i><img alt="" src="uploads/Accountant-icon.png"></i><?php echo lang('accountant'); ?></a></li>
                    <?php } ?>
                    <?php if (in_array('medicine', $this->modules)) { ?>
                        <li class="sub-menu2-icon"><a href="receptionist"><i><img alt="" src="uploads/Recepnist-icon.png"></i><?php echo lang('receptionist'); ?></a></li>
                    <?php } ?>
                  </ul>
                </li>
            <?php } ?>
            <?php if ($this->ion_auth->in_group('admin')) { ?>
                <?php if (in_array('finance', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1">
                      <a href="javascript:;" >
                        <i><img alt="" src="uploads/Financial-Activts-icon.png" class="sidebar-menu-iconn"></i>
                        <span><?php echo lang('financial_activities'); ?></span>
                      </a>
                      <ul class="sub">
                        <li class="sub-menu2-icon"><a  href="finance/payment"><i><img alt="" src="uploads/Payments-icon.png"></i> <?php echo lang('payments'); ?></a></li>
                        <li class="sub-menu2-icon"><a href="invoices"><i><img alt="" src="uploads/Patient-invoice-icon.png"></i><?php echo lang('patient_invoice_list'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="finance/addPaymentView"><i><img alt="" src="uploads/Add-Payment_icon.png"></i><?php echo lang('add_payment'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="finance/paymentCategory"><i><img alt="" src="uploads/Payment-Procedures_icon.png"></i><?php echo lang('payment_procedures'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="finance/expense"><i><img alt="" src="uploads/Expence-icon.png"></i><?php echo lang('expense'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="finance/addExpenseView"><i><img alt="" src="uploads/Add-Expence-icon.png"></i><?php echo lang('add_expense'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="finance/expenseCategory"><i><img alt="" src="uploads/Expence-Catogery-icon.png"></i><?php echo lang('expense_categories'); ?> </a></li>
                      </ul>
                    </li> 
                <?php } ?>
            <?php } ?>

            <?php if ($this->ion_auth->in_group('Receptionist')) { ?>
                <?php if (in_array('appointment', $this->modules)) { ?>
                    <li>
                      <a href="appointment/calendar" >
                        <i class="fa fa-calendar"></i>
                        <span> <?php echo lang('calendar'); ?> </span>
                      </a>
                    </li>
                <?php } ?>
                <?php if (in_array('finance', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1">
                      <a href="javascript:;" >
                        <i class="fa fa-money-check fa-money-check1"></i>
                        <span><?php echo lang('financial_activities'); ?></span>
                      </a>
                      <ul class="sub">
                        <li><a  href="finance/payment"><i class="fa fa-money-check"></i> <?php echo lang('payments'); ?></a></li>
                        <li><a  href="finance/addPaymentView"><i class="fa fa-plus-circle"></i><?php echo lang('add_payment'); ?></a></li>
                      </ul>
                    </li> 
                <?php } ?>
            <?php } ?>



            <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                <?php if (in_array('prescription', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1">
                      <a href="prescription/all" >
                        <i><img alt="" src="uploads/Prescriptionn2-icon.png" class="sidebar-menu-iconn"></i>
                        <span> <?php echo lang('prescription'); ?> </span>
                      </a>
                    </li>
                <?php } ?>
            <?php } ?>

            <?php
            if ($this->ion_auth->in_group(array('Receptionist'))) {
              ?>
                <?php if (in_array('lab', $this->modules)) { ?>
                    <li>
                      <a href="lab/lab1">
                        <i class="fas fa-file-medical"></i>
                        <span><?php echo lang('lab_reports'); ?></span>
                      </a>
                    </li>
                <?php } ?>
                <?php
            }
            ?>

            <?php
            if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) {
              ?>
                <?php if (in_array('finance', $this->modules)) { ?>
                    <li>
                      <a href="finance/UserActivityReport">
                        <i class="fa fa-file-user"></i>
                        <span><?php echo lang('user_activity_report'); ?></span>
                      </a>
                    </li>
                <?php } ?>
                <?php
            }
            ?>








            <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                <?php if (in_array('prescription', $this->modules)) { ?>
                    <li>
                      <a href="prescription">
                        <i class="fa fa-prescription"></i>
                        <span><?php echo lang('prescription'); ?></span>
                      </a>
                    </li>
                <?php } ?>
            <?php } ?>



            <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist'))) { ?>
                <?php if (in_array('lab', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1" >
                      <a href="javascript:;" >
                        <i><img alt="" src="uploads/Patient-Report-icon.png" class="sidebar-menu-iconn"></i>
                        <span><?php echo lang('labs'); ?></span>
                      </a>
                      <ul class="sub">
                        <li class="sub-menu2-icon"><a  href="lab"><i><img alt="" src="uploads/Lab-report-icon.png"></i><?php echo lang('lab_reports'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="lab/scan_report"><i><img alt="" src="uploads/Scan-report-icon.png"></i><?php echo lang('scan_report'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="lab/template"><i><img alt="" src="uploads/Template-icon.png"></i><?php echo lang('template'); ?></a></li>
                      </ul>
                    </li>
                <?php } ?>
            <?php } ?>





            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                <?php if (in_array('medicine', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1">
                      <a href="javascript:;" >
                        <i><img alt="" src="uploads/Medicine-icon.png" class="sidebar-menu-iconn"></i>
                        <span><?php echo lang('medicine'); ?></span>
                      </a>
                      <ul class="sub">
                        <li class="sub-menu2-icon"><a  href="medicine"><i><img alt="" src="uploads/Medicine-list-icon.png"></i><?php echo lang('medicine_list'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="medicine/addMedicineView"><i><img alt="" src="uploads/Add-Medicine-icon.png"></i><?php echo lang('add_medicine'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="medicine/medicineCategory"><i><img alt="" src="uploads/Medicine-catagory-icon.png"></i><?php echo lang('medicine_category'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="medicine/addCategoryView"><i><img alt="" src="uploads/Add-catagory-icon.png"></i><?php echo lang('add_medicine_category'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="medicine/medicineStockAlert"><i ><img alt="" src="uploads/Medicine-Stock-icon.png"></i><?php echo lang('medicine_stock_alert'); ?></a></li>

                      </ul>
                    </li>
                <?php } ?>
            <?php } ?>








            <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                <?php if (in_array('pharmacy', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1">
                      <a href="javascript:;" >
                        <i><img alt="" src="uploads/Pharmacy-icon.png" class="sidebar-menu-iconn"></i>
                        <span><?php echo lang('pharmacy'); ?></span>
                      </a>
                      <ul class="sub">
                        <?php if (!$this->ion_auth->in_group(array('Pharmacist'))) { ?>
                            <li class="sub-menu2-icon"><a  href="finance/pharmacy/home"><i><img alt="" src="uploads/Dashboard-icon.png"></i> <?php echo lang('dashboard'); ?></a></li>
       
                            <?php } ?>
                        <li  class="sub-menu2-icon"><a  href="finance/pharmacy/payment"><i><img alt="" src="uploads/Sales-icon.png"></i> <?php echo lang('sales'); ?></a></li>
                        <li  class="sub-menu2-icon"><a  href="finance/pharmacy/addPaymentView"><i><img alt="" src="uploads/Add-new-Sales-icon.png"></i><?php echo lang('add_new_sale'); ?></a></li>
                        <li  class="sub-menu2-icon"><a  href="finance/pharmacy/expense"><i><img alt="" src="uploads/Expence-icon.png"></i><?php echo lang('expense'); ?></a></li>
                        <li  class="sub-menu2-icon"><a  href="finance/pharmacy/addExpenseView"><i><img alt="" src="uploads/Add-Expence-icon.png"></i><?php echo lang('add_expense'); ?></a></li>
                        <li  class="sub-menu2-icon"><a  href="finance/pharmacy/expenseCategory"><i><img alt="" src="uploads/Expence-Catogery-icon.png"></i><?php echo lang('expense_categories'); ?> </a></li>
                      </ul>
                    </li> 
                <?php } ?>
            <?php } ?>










            <?php if ($this->ion_auth->in_group(array('admin', 'Laboratorist'))) { ?>
                <?php if (in_array('donor', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1">
                      <a href="javascript:;" >
                        <i><img alt="" src="uploads/Doner-icon.png" class="sidebar-menu-iconn"></i>
                        <span><?php echo lang('donor') ?></span>
                      </a>
                      <ul class="sub">
                        <li ><a  href="donor"><i><img alt="" src="uploads/Doner-List-icon.png"></i><?php echo lang('donor_list'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="donor/addDonorView"><i><img alt="" src="uploads/Add-Doner-icon.png"></i><?php echo lang('add_donor'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="donor/bloodBank"><i><img alt="" src="uploads/Blood-Bank-icon.png"></i><?php echo lang('blood_bank'); ?></a></li>
                      </ul>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                <?php if (in_array('bed', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1">
                      <a href="javascript:;" >
                        <i><img alt="" src="uploads/Bed-icon.png" class="sidebar-menu-iconn"></i>
                        <span><?php echo lang('bed'); ?></span>
                      </a>
                      <ul class="sub">
                        <li class="sub-menu2-icon"><a  href="bed"><i><img alt="" src="uploads/Bed-List-icon.png"></i><?php echo lang('bed_list'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="bed/addBedView"><i><img alt="" src="uploads/Add-Bed-icon.png"></i><?php echo lang('add_bed'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="bed/bedCategory"><i><img alt="" src="uploads/Bed-Category-icon.png"></i><?php echo lang('bed_category'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="bed/bedAllotment"><i><img alt="" src="uploads/Bed-allotmetn-icon.png"></i><?php echo lang('bed_allotments'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="bed/addAllotmentView"><i><img alt="" src="uploads/Add-allotmetn-icon.png"></i><?php echo lang('add_allotment'); ?></a></li>
                      </ul>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Laboratorist', 'Doctor'))) { ?>

                <li class="sub-menu sub-menu1">
                  <a href="javascript:;" >
                    <i><img alt="" src="uploads/Report-icon.png" class="sidebar-menu-iconn"></i>
                    <span><?php echo lang('report'); ?></span>
                  </a>
                  <ul class="sub">
                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                        <?php if (in_array('finance', $this->modules)) { ?>
                            <li  class="sub-menu2-icon"><a  href="finance/financialReport"><i><img alt="" src="uploads/Financial-Report-icon.png"></i><?php echo lang('financial_report'); ?></a></li>
                            <li  class="sub-menu2-icon"> <a href="finance/AllUserActivityReport">  <i><img alt="" src="uploads/User-activity-Report-icon.png"></i>   <span><?php echo lang('user_activity_report'); ?></span> </a></li>
                        <?php } ?>
                    <?php } ?>

                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                        <?php if (in_array('finance', $this->modules)) { ?>
                            <li  class="sub-menu2-icon"><a  href="finance/doctorsCommission"><i><img alt="" src="uploads/Doc-Commison-icon.png"></i><?php echo lang('doctors_commission'); ?> </a></li>
                            <li  class="sub-menu2-icon"><a  href="finance/monthly"><i ><img alt="" src="uploads/Monthly-Sales-icon.png"></i> <?php echo lang('monthly_sales'); ?> </a></li>
                            <li  class="sub-menu2-icon"><a  href="finance/daily"><i><img alt="" src="uploads/daily-Sales-icon.png"></i> <?php echo lang('daily_sales'); ?> </a></li>
                            <li  class="sub-menu2-icon"><a  href="finance/monthlyExpense"><i><img alt="" src="uploads/Monthly-expenses-icon.png"></i> <?php echo lang('monthly_expense'); ?> </a></li>
                            <li class="sub-menu2-icon"><a  href="finance/dailyExpense"><i><img alt="" src="uploads/Daily-expenses-icon.png"></i> <?php echo lang('daily_expense'); ?> </a></li>                              
                        <?php } ?>
                    <?php } ?>

                    <?php if (in_array('report', $this->modules)) { ?>
                        <li class="sub-menu2-icon"><a  href="report/birth"><i><img alt="" src="uploads/Birth-Report-icon.png"></i><?php echo lang('birth_report'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="report/operation"><i><img alt="" src="uploads/Operation-Report-icon.png"></i><?php echo lang('operation_report'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="report/expire"><i><img alt="" src="uploads/Expire-Report-icon.png"></i><?php echo lang('expire_report'); ?></a></li>
                    <?php } ?>
                  </ul>
                </li>

            <?php } ?>


            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                <?php if (in_array('notice', $this->modules)) { ?>
                    <li class="sub-menu sub-menu1">
                      <a href="javascript:;" >
                        <i><img alt="" src="uploads/Notice-icon.png" class="sidebar-menu-iconn"></i>
                        <span><?php echo lang('notice'); ?></span>
                      </a>
                      <ul class="sub">
                        <li class="sub-menu2-icon"><a  href="notice"><i><img alt="" src="uploads/Notice2-icon.png"></i><?php echo lang('notice'); ?></a></li>
                        <li class="sub-menu2-icon"><a  href="notice/addNewView"><i><img alt="" src="uploads/Add-New-Notice-icon.png"></i><?php echo lang('add_new'); ?></a></li>
                      </ul>
                    </li> 
                <?php } ?>
            <?php } ?>

            <?php if (false && $this->ion_auth->in_group(array('admin'))) { ?>
                <?php if (in_array('email', $this->modules)) { ?>
                    <li class="sub-menu">
                      <a href="javascript:;" >
                        <i class="fa fa-mail-bulk"></i>
                        <span><?php echo lang('email'); ?></span>
                      </a>
                      <ul class="sub">
                        <li><a  href="email/autoEmailTemplate"><i class="fa fa-robot"></i><?php echo lang('autoemailtemplate'); ?></a></li>
                        <li><a  href="email/sendView"><i class="fa fa-location-arrow"></i><?php echo lang('new'); ?></a></li>
                        <li><a  href="email/sent"><i class="fa fa-list-alt"></i><?php echo lang('sent'); ?></a></li>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li><a  href="email/settings"><i class="fa fa-cogs"></i><?php echo lang('settings'); ?></a></li>
                        <?php } ?>
                      </ul>
                    </li> 
                <?php } ?>
            <?php } ?>

            <?php if (false && $this->ion_auth->in_group(array('admin'))) { ?>
                <?php if (in_array('sms', $this->modules)) { ?>
                    <li class="sub-menu">
                      <a href="javascript:;" >
                        <i class="fa fa-sms"></i>
                        <span><?php echo lang('sms'); ?></span>
                      </a>
                      <ul class="sub">
                        <li><a  href="sms/autoSMSTemplate"><i class="fa fa-robot"></i><?php echo lang('autosmstemplate'); ?></a></li>
                        <li><a  href="sms/sendView"><i class="fa fa-location-arrow"></i><?php echo lang('write_message'); ?></a></li>
                        <li><a  href="sms/sent"><i class="fa fa-list-alt"></i><?php echo lang('sent_messages'); ?></a></li>
                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                            <li><a  href="sms"><i class="fa fa-cogs"></i><?php echo lang('sms_settings'); ?></a></li>
                        <?php } ?>
                      </ul>
                    </li> 
                <?php } ?>
            <?php } ?>
            <?php if ($this->ion_auth->in_group(array('admin'))) { ?>



                <li class="sub-menu sub-menu1">
                  <a href="javascript:;" >
                    <i><img alt="" src="uploads/Setings-icon.png" class="sidebar-menu-iconn"></i>
                    <span><?php echo lang('settings'); ?></span>
                  </a>
                  <ul class="sub"> 
                    <li class="sub-menu2-icon"><a href="settings"><i><img alt="" src="uploads/System-Setings-icon.png"></i><?php echo lang('system_settings'); ?></a></li>
                    <?php /*<li><a href="pgateway"><i class="fa fa-credit-card"></i><?php echo lang('payment_gateway'); ?></a></li> */?>
                    <?php if ($this->ion_auth->in_group(array('admin', 'superadmin'))) { ?> 
                      <li class="sub-menu2-icon"><a href="import"><i><img alt="" src="uploads/Import-icon.png"></i> <?php echo lang('import'); ?></a></li>
                  <?php } ?>
                    <li ><a href="settings/language"><i><img alt="" src="uploads/Language-icon.png"></i><?php echo lang('language'); ?></a></li>
                  </ul>
                </li>





            <?php } ?>


                        <!--
                        <?php if ($this->ion_auth->in_group('Doctor')) { ?>
                              <?php if (in_array('appointment', $this->modules)) { ?>
                                        <li><a href="meeting/settings"><i class="fa fa-headphones"></i><?php echo lang('zoom'); ?>     <?php echo lang('settings'); ?></a></li>
                              <?php } ?>
                        <?php } ?>
                      -->







                      <?php if ($this->ion_auth->in_group('Accountant')) { ?>
                          <?php if (in_array('finance', $this->modules)) { ?>
                              <li class="sub-menu">
                                <a href="javascript:;" >
                                  <i class="fa fa-money-bill-alt"></i>
                                  <span><?php echo lang('payments'); ?></span>
                                </a>
                                <ul class="sub">
                                  <li>
                                    <a href="finance/payment" >
                                      <i class="fa fa-money-check"></i>
                                      <span> <?php echo lang('payments'); ?> </span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="finance/addPaymentView" >
                                      <i class="fa fa-plus-circle"></i>
                                      <span> <?php echo lang('add_payment'); ?> </span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="finance/paymentCategory" >
                                      <i class="fa fa-edit"></i>
                                      <span> <?php echo lang('payment_procedures'); ?> </span>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li>
                                <a href="finance/expense" >
                                  <i class="fa fa-money-check"></i>
                                  <span> <?php echo lang('expense'); ?> </span>
                                </a>
                              </li>
                              <li>
                                <a href="finance/addExpenseView" >
                                  <i class="fa fa-plus-circle"></i>
                                  <span> <?php echo lang('add_expense'); ?> </span>
                                </a>
                              </li>
                              <li>
                                <a href="finance/expenseCategory" >
                                  <i class="fa fa-edit"></i>
                                  <span> <?php echo lang('expense_categories'); ?> </span>
                                </a>
                              </li>
                              <li>
                                <a href="finance/doctorsCommission" >
                                  <i class="fa fa-edit"></i>
                                  <span> <?php echo lang('doctors_commission'); ?> </span>
                                </a>
                              </li>
                              <li>
                                <a href="finance/financialReport" >
                                  <i class="fa fa-book"></i>
                                  <span> <?php echo lang('financial_report'); ?> </span>
                                </a>
                              </li>
                          <?php } ?>
                      <?php } ?>

                      <?php if ($this->ion_auth->in_group('Pharmacist')) { ?>
                          <?php if (in_array('medicine', $this->modules)) { ?>
                              <li>
                                <a href="medicine" >
                                  <i class="fa fa-medkit"></i>
                                  <span> <?php echo lang('medicine_list'); ?> </span>
                                </a>
                              </li>
                              <li>
                                <a href="medicine/addMedicineView" >
                                  <i class="fa fa-plus-circle"></i>
                                  <span> <?php echo lang('add_medicine'); ?> </span>
                                </a>
                              </li>
                              <li>
                                <a href="medicine/medicineCategory" >
                                  <i class="fa fa-medkit"></i>
                                  <span> <?php echo lang('medicine_category'); ?> </span>
                                </a>
                              </li>
                              <li>
                                <a href="medicine/addCategoryView" >
                                  <i class="fa fa-plus-circle"></i>
                                  <span> <?php echo lang('add_medicine_category'); ?> </span>
                                </a>
                              </li>
                          <?php } ?>
                      <?php } ?>
                      <?php if ($this->ion_auth->in_group('Nurse')) { ?>
                          <?php if (in_array('bed', $this->modules)) { ?>
                              <li>
                                <a href="bed" >
                                  <i class="fa fa-procedures"></i>
                                  <span> <?php echo lang('bed_list'); ?> </span>
                                </a>
                              </li>
                              <li>
                                <a href="bed/bedCategory" >
                                  <i class="fa fa-edit"></i>
                                  <span> <?php echo lang('bed_category'); ?> </span>
                                </a>
                              </li>
                              <li>
                                <a href="bed/bedAllotment" >
                                  <i class="fa fa-plus-circle"></i>
                                  <span> <?php echo lang('bed_allotments'); ?> </span>
                                </a>
                              </li>
                          <?php } ?>
                          <?php if (in_array('donor', $this->modules)) { ?>
                              <li>s
                                <a href="donor" >
                                  <i class="fa fa-medkit"></i>
                                  <span> <?php echo lang('donor'); ?> </span>
                                </a>
                              </li>
                              <li>
                                <a href="donor/bloodBank" >
                                  <i class="fa fa-tint"></i>
                                  <span> <?php echo lang('blood_bank'); ?> </span>
                                </a>
                              </li>
                          <?php } ?>
                      <?php } ?>

                      <?php if ($this->ion_auth->in_group('Patient')) { ?>
                          <?php if (in_array('lab', $this->modules)) { ?>
                              <li >
                                <a href="lab/myLab" >
                                  <i class="fa fa-file-medical-alt"></i>
                                  <span> <?php echo lang('diagnosis'); ?>     <?php echo lang('reports'); ?> </span>
                                </a>
                              </li>
                          <?php } ?>
                          <?php if (in_array('appointment', $this->modules)) { ?>
                              <li>
                                <a href="patient/calendar" >
                                  <i class="fa fa-calendar"></i>
                                  <span> <?php echo lang('appointment'); ?>     <?php echo lang('calendar'); ?> </span>
                                </a>
                              </li>
                          <?php } ?>
                          <?php if (in_array('patient', $this->modules)) { ?>
                              <li>
                                <a href="patient/myCaseList" >
                                  <i class="fa fa-file-medical"></i>
                                  <span>  <?php echo lang('cases'); ?> </span>
                                </a>
                              </li>
                          <?php } ?>
                          <?php if (in_array('prescription', $this->modules)) { ?>
                              <li>
                                <a href="patient/myPrescription" >
                                  <i class="fa fa-prescription"></i>
                                  <span> <?php echo lang('prescription'); ?>  </span>
                                </a>
                              </li>
                          <?php } ?>
                          <?php if (in_array('patient', $this->modules)) { ?>
                              <li>
                                <a href="patient/myDocuments" >
                                  <i class="fa fa-file-upload"></i>
                                  <span> <?php echo lang('documents'); ?> </span>
                                </a>
                              </li>
                          <?php } ?>
                          <?php if (in_array('finance', $this->modules)) { ?>
                              <li>
                                <a href="patient/myPaymentHistory" >
                                  <i class="fa fa-money-bill-alt"></i>
                                  <span> <?php echo lang('payment'); ?> </span>      
                                </a>
                              </li>
                          <?php } ?>
                          <?php if (in_array('report', $this->modules)) { ?>
                              <li>
                                <a href="report/myreports" >
                                  <i class="fa fa-file-medical-alt"></i>
                                  <span> <?php echo lang('other'); ?>     <?php echo lang('reports'); ?> </span>
                                </a>
                              </li>
                          <?php } ?>
                          <?php if (in_array('donor', $this->modules)) { ?>
                              <li>
                                <a href="donor" >
                                  <i class="fa fa-user"></i>
                                  <span><?php echo lang('donor'); ?></span>
                                </a>
                              </li>
                          <?php } ?>
                      <?php } ?>

                      <?php if ($this->ion_auth->in_group('im')) { ?>
                          <li>
                            <a href="patient/addNewView" >
                              <i class="fa fa-user"></i>
                              <span> <?php echo lang('add_patient'); ?> </span>
                            </a>
                          </li>
                          <li>
                            <a href="finance/addPaymentView" >
                              <i class="fa fa-user"></i>
                              <span> <?php echo lang('add_payment'); ?>  </span>
                            </a>
                          </li>
                      <?php } ?>


                      <?php if (!$this->ion_auth->in_group(array('admin', 'Patient', 'superadmin'))) { ?>
                          <li class="sub-menu">
                            <a href="javascript:;" >
                              <i class="fa fa-mail-bulk"></i>
                              <span><?php echo lang('email'); ?></span>
                            </a>
                            <ul class="sub">
                              <li><a  href="email/sendView"><i class="fa fa-location-arrow"></i><?php echo lang('new'); ?></a></li>
                            </ul>
                          </li> 
                      <?php } ?> 



                      <?php if ($this->ion_auth->in_group('superadmin')) { ?>

                          <li class="sub-menu sub-menu1">
                            <a href="hospital">
                              <i class="fal fa-sitemap"></i>
                              <span><?php echo lang('all_hospitals'); ?></span>
                            </a>
                          </li>
                          <li class="sub-menu sub-menu1">
                            <a href="hospital/addNewView" class="superadmin-sidebar-menu">
                              <i class="fal fa-plus-circle"></i>
                              <span><?php echo lang('create_new_hospital'); ?></span>
                            </a>
                          </li>
                          <li class="sub-menu sub-menu1">
                           <a href="javascript:;" class="superadmin-sidebar-menu"> 
                            <i class="fal fa-users-medical"></i>
                            <span><?php echo lang('patient'); ?></span>
                          </a>
                          <ul class="sub"> 
                            <li><a href="hospital/users" ><i class="fal fa-user"></i><?php echo lang('patient_list'); ?></a></li>
                            <?php /*
                             <li><a href="patient/icd_list"><i class="fa fa-user"></i><?php echo lang('icd_list'); ?></a></li>
                             */?>
                              </ul>
                            </li>
                              <li class="sub-menu sub-menu1">
                                <a href="hospital/package" class="superadmin-sidebar-menu">
                                  <i class="fal fa-sitemap"></i>
                                  <span><?php echo lang('packages'); ?></span>
                                </a>
                              </li>
                              <li class="sub-menu sub-menu1">
                                <a href="hospital/package/addNewView" class="superadmin-sidebar-menu">
                                  <i class="fal fa-plus-circle"></i>
                                  <span class="add-new-pac-text"><?php echo lang('add_new_package'); ?></span>
                                </a>
                              </li>

                              <li class="sub-menu sub-menu1">
                                <a href="request" class="superadmin-sidebar-menu">
                                  <i class="fal fa-sitemap"></i>
                                  <span><?php echo lang('requests'); ?></span>
                                </a>
                              </li>


                             <!--  <li class="sub-menu">
                                <a href="javascript:;" >
                                  <i class="fa fa-cogs"></i>
                                  <span><?php //echo lang('website'); ?></span>
                                </a>
                                <ul class="sub">
                                  <li><a href="frontend" target="_blank" ><i class="fa fa-globe"></i><?php //echo lang('visit_site'); ?></a></li>
                                  <li><a href="frontend/settings"><i class="fa fa-cog"></i><?php //echo lang('website_settings'); ?></a></li>
                                  <li><a href="slide"><i class="fa fa-wrench"></i><?php //echo lang('slides'); ?></a></li>
                                  <li><a href="service"><i class="fa fa-smile"></i><?php //echo lang('services'); ?></a></li>
                                </ul>
                              </li> -->

                          <?php } ?>



                          <?php if ($this->ion_auth->in_group(array('superadmin'))) { ?>
                              <li class="sub-menu sub-menu1"><a href="remarks" class="superadmin-sidebar-menu"><i class="fal fa-notes-medical"></i>
                                    <span><?php echo lang('remarks'); ?></span></a></li>
                              <li class="sub-menu sub-menu1">
                                <a href="javascript:void(0);" class="superadmin-sidebar-menu" >
                                  <i class="fal fa-users-medical"></i> 
                                  <span><?php echo lang('payments'); ?></span>
                                </a>
                                <ul class="sub"> 
                                  <li><a href="payments"><i class="fal fa-cash-register"></i><?php echo lang('payments'); ?></a></li>
                                  <li><a href="payments/payment" class="superadmin-sidebar-menu"><i class="fal fa-money-check"></i><?php echo lang('payments'); ?> List</a></li>
                                </ul>
                              </li>
                              <li class="sub-menu sub-menu1"><a href="settings" class="superadmin-sidebar-menu"><i class="fal fa-cog"></i><?php echo lang('system_settings'); ?></a></li>

                              <li class="sub-menu sub-menu1"><a href="settings/language" class="superadmin-sidebar-menu"><i class="fal fa-language"></i><?php echo lang('language'); ?></a>
                              </li>

                              <li class="sub-menu sub-menu1">
                                <a href="superadmin/onboard" class="superadmin-sidebar-menu">
                                  <i class="fal fa-clipboard"></i>
                                  <span> <?php echo lang('Login Banner'); ?> </span>
                                </a>
                              </li>
                              <!-- <li class="sub-menu sub-menu1">
                                <a href="superadmin/termsCondition" class="superadmin-sidebar-menu">
                                  <i class="fal fa-gavel"></i>
                                  <span> <?php echo lang('terms_condition'); ?> </span>
                                </a>
                              </li> -->
                              <li class="sub-menu sub-menu1">
                                <a href="superadmin/appUser" class="superadmin-sidebar-menu">
                                  <i class="fal fa-user-circle"></i>
                                  <span> <?php echo lang('app_user'); ?> </span>
                                </a>
                              </li>
                              <li class="sub-menu sub-menu1">
                                <a href="superadmin/appDoctor" class="superadmin-sidebar-menu">
                                  <i class="fal fa-user-circle"></i>
                                  <span> <?php echo lang('app_doctor'); ?> </span>
                                </a>
                              </li>
                             <li class="sub-menu sub-menu1">
                                <a href="superadmin/specialist" class="superadmin-sidebar-menu">
                                  <i class="fal fa-briefcase-medical"></i>
                                  <span> <?php echo lang('speciality_list'); ?> </span>
                                </a>
                              </li>
                              <li class="sub-menu sub-menu1">
                                <a href="superadmin/banners" class="superadmin-sidebar-menu">
                                 <i class="fal fa-bullhorn" aria-hidden="true"></i>
                                  <span> <?php echo lang('banners'); ?> </span>
                                </a>
                              </li>
                          <?php } ?>

                          <li class="sub-menu sub-menu1">
                            <a href="profile" >
                              <i><img alt="" src="uploads/Profile-icon.png" class="sidebar-menu-iconn"></i>
                              <span> <?php echo lang('profile'); ?> </span>
                            </a>
                          </li>


                          <?php if ($this->ion_auth->in_group('admin')) { ?>

                              <li class="sub-menu sub-menu1 sub-menu3">
                                <a href="settings/subscription" >
                                  <i><img alt="" src="uploads/Subscriptions-icon.png" class="sidebar-menu-iconn"></i>
                                  <span> <?php echo lang('subscription'); ?> </span>
                                </a>
                              </li>

                          <?php } ?> 
                    
             
                         <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist', 'Receptionist'))) { ?>
                  
                          <li class="sub-menu sub-menu1 support-sub" >
                          <a href="support" class="support-sub1">
                          <i class="fas fa-user-headset fas fa-user-headset1" ></i>
                            <span>Support</span>
                          </a>
                          </li>
                          <?php } ?> 
                         
                          <!--multi level menu start-->

                          <!--multi level menu end-->

                        </ul>
                        <!-- sidebar menu end-->
                      </div>
                    </aside>
                    <!--sidebar end-->