<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- invoice start-->
    <section class="col-md-6">
      <style>
        th{text-align: center;}
        td{text-align: center;}
        tr.total{color: green;}
        .control-label{width: 100px;}
        h1{margin-top: 5px;}
        .print_width{
          width: 50%;
          float: left;
        } 
        ul.amounts li {
          padding: 0px !important;
        }
        .invoice-list {
          margin-bottom: 10px;
        }
        .panel{
          border: 0px solid #5c5c47;
          background: #fff !important;
          height: 100%;
          margin: 20px 5px 5px 5px;
          border-radius: 0px !important;
          color: #777;

        }
        .table.main{
          margin-top: -50px;
        }
        .control-label{
          margin-bottom: 0px;
        }
        tr.total td{
          color: green !important;
        }
        .theadd th{
          background: #edfafa !important;
        }
        td{
          font-size: 12px;
          padding: 5px;
          font-weight: bold;
        }
        .details{
          font-weight: bold;
        }
        hr{
          border-bottom: 2px solid green !important;
        }
        .corporate-id {
          margin-bottom: 5px;
        }
        .adv-table table tr td {
          padding: 5px 10px;
        }
        .btn{
          margin: 10px 10px 10px 0px;
        }
        @media print {
          h1{
            margin-top: 5px;
          }
          #main-content{
            padding-top: 0px;
          }
          .print_width{
            width: 50%;
            float: left;
          } 
          ul.amounts li {
            padding: 0px !important;
          }
          .invoice-list {
            margin-bottom: 10px;
          }
          .wrapper{
            margin-top: 0px;
          }
          .wrapper{
            padding: 0px 0px !important;
            background: #fff !important;
          }
          .wrapper{
            border: 2px solid #777;
          }
          .panel{
            border: 0px solid #777;
            background: #fff !important;
            padding: 0px 0px;
            margin: 5px 5px 5px 5px;
            border-radius: 0px !important;
            color: #777;
          }
          .table.main{
            margin-top: -50px;
          }
          .control-label{
            margin-bottom: 0px;
          }
          tr.total td{
            color: green !important;
          }
          .theadd th{
            background: #edfafa !important;
          }
          td{
            font-size: 12px;
            padding: 5px;
            font-weight: bold;
          }
          .details{
            font-weight: bold;
          }
          hr{
            border-bottom: 2px solid green !important;
          }
          .corporate-id {
            margin-bottom: 5px;
          }
          .adv-table table tr td {
            padding: 5px 10px;
          }
          .site-min-height {
            min-height: 950px;
          }
        }
      </style>
      <div class="panel panel-primary" id="lab">
        <div class="panel-body invoice-panel-col-md-5" >
          <div class="row invoice-list">
            <div class="text-center corporate-id">
              <h3><?php echo $settings->title ?></h3>
              <h4><?php echo $settings->address ?></h4>
              <h4>Tel: <?php echo $settings->phone ?></h4>
              <img alt="" src="<?php echo $this->settings_model->getHospital_img_id()->img_url; ?>" width="200" height="100">
              <h4 class="text-center1">
                <?php echo lang('lab_report') ?>
                <hr class="hr-lab_report" >
              </h4>
            </div>
            <div class="col-md-12">
              <div class="col-md-6 pull-left row col-md-6-row1">
                <div class="col-md-12 row details" >
                  <p>
                    <?php $patient_info = $this->db->get_where('patient', array('id' => $lab->patient))->row(); ?>
                    <label class="control-label"><?php echo lang('patient'); ?> <?php echo lang('name'); ?> </label>
                    <span class="patient_info_text"> : 
                      <?php
                      if (!empty($patient_info)) {
                        echo $patient_info->name . ' <br>';
                      }
                      ?>
                    </span>
                  </p>
                </div>
                <div class="col-md-12 row details" >
                  <p>
                    <label class="control-label"><?php echo lang('patient_id'); ?>  </label>
                    <span class="patient_info_text"> : 
                      <?php
                      if (!empty($patient_info)) {
                        echo $patient_info->id . ' <br>';
                      }
                      ?>
                    </span>
                  </p>
                </div>
                <div class="col-md-12 row details" >
                  <p>
                    <label class="control-label"> <?php echo lang('address'); ?> </label>
                    <span class="patient_info_text"> : 
                      <?php
                      if (!empty($patient_info)) {
                        echo $patient_info->address . ' <br>';
                      }
                      ?>
                    </span>
                  </p>
                </div>
                <div class="col-md-12 row details" >
                  <p>
                    <label class="control-label"><?php echo lang('phone'); ?>  </label>
                    <span class="patient_info_text"> : 
                      <?php
                      if (!empty($patient_info)) {
                        echo $patient_info->phone . ' <br>';
                      }
                      ?>
                    </span>
                  </p>
                </div>
              </div>
              <div class="col-md-6 pull-right col-md-6-row1" >
                <div class="col-md-12 row details" >
                  <p>
                    <label class="control-label"> <?php echo lang('lab'); ?> <?php echo lang('report'); ?> <?php echo lang('id'); ?>  </label>
                    <span class="patient_info_text"> : 
                      <?php
                      if (!empty($lab->id)) {
                        echo $lab->id;
                      }
                      ?>
                    </span>
                  </p>
                </div>
                <div class="col-md-12 row details">
                  <p>
                    <label class="control-label"><?php echo lang('date'); ?>  </label>
                    <span class="patient_info_text"> : 
                      <?php
                      if (!empty($lab->date)) {
                        echo date('d-m-Y', $lab->date) . ' <br>';
                      }
                      ?>
                    </span>
                  </p>
                </div>
                <div class="col-md-12 row details">
                  <p>
                    <label class="control-label"><?php echo lang('doctor'); ?>  </label>
                    <span class="patient_info_text"> : 
                      <?php
                      if (!empty($lab->doctor)) {
                        $doctor_details = $this->doctor_model->getDoctorById($lab->doctor);
                        if (!empty($doctor_details)) {
                          echo $doctor_details->name. '<br>';
                        }
                      }
                      ?>
                    </span>
                  </p>
                </div>
              </div>
            </div>
            <br>
          </div> 
          <div class="col-md-12 panel-body">
            <?php
            if (!empty($lab->report)) {
              echo $lab->report;
            }
            ?>
          </div>
        </div>
      </div>
    </section>
    <!-- invoice end-->
  </section>
</section>
<!--main content end-->
<!--footer start-->
<script src="common/js/codearistos.min.js"></script>
<script>
  $(document).ready(function () {
    $(".flashmessage").delay(3000).fadeOut(100);
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script>
  $( document ).ready(function() {
    var pdf = new jsPDF('p', 'pt', 'letter');
    pdf.addHTML($('#lab'), function () {
      var pdffile = btoa(pdf.output());
      ajax_url = "lab/pdf_report/"+"<?php echo $action."/".$action_id;?>";
      $.ajax({
        method: "POST",
        url: ajax_url,
        data: {data: pdffile},
      }).done(function(data){
        window.location.href = "<?php echo base_url(); ?>lab/scan_report";
     });
    });
  });
</script>