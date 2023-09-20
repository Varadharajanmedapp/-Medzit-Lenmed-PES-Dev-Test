<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
            <div class="col-md-6">
            <i ><img alt="" src="uploads/treatment-history-main.png"  style="height: 40px;"  ></i><i class=""></i>   <?php  echo lang('treatment_history'); ?></div>
            </header>
            <div class="space15"></div>
            <div class="col-md-12">
                <div class="col-md-7 panel-body">
                    <section>
                        <form role="form" class="f_report" action="appointment/treatmentReport" method="post" enctype="multipart/form-data">
                            <div class="form-group">

                                <!--     <label class="control-label col-md-3">Date Range</label> -->
                                <div class="col-md-6">
                                    <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy">
                                        <input type="text" class="form-control dpd1" name="date_from" value="<?php
                                        if (!empty($from)) {
                                            echo $from;
                                        }
                                        ?>" placeholder=" <?php  echo lang('date_from'); ?>">
                                        <span class="input-group-addon"><?php  echo lang('to'); ?></span>
                                        <input type="text" class="form-control dpd2" name="date_to" value="<?php
                                        if (!empty($to)) {
                                            echo $to;
                                        }
                                        ?>" placeholder=" <?php  echo lang('date_to'); ?>">
                                    </div>
                                    <div class="row"></div>
                                    <span class="help-block"></span> 
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="submit" class="btn btn-info range_submit"> <?php  echo lang('submit'); ?></button>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="col-md-5">
                </div>
            </div>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <button class="export" onclick="javascript:window.print();">Print</button>     
                    </div>
                    <div class="space15">
                        <?php
                        if (!empty($from) && !empty($to)) {
                            echo "From $from To $to";
                        }
                        ?> 
                    </div>

                    <table class="table table-striped table-hover table-bordered" id="editable-sample" style="border-collapse: separate !important; border-spacing:0 1em !important;">
                        <thead>
                            <tr class="treatment-table" >
                                <th> <?php  echo lang('doctor_id'); ?></th>
                                <th> <?php  echo lang('doctor'); ?></th>
                                <th> <?php  echo lang('number_of_patient_treated'); ?></th>
                                <th> <?php  echo lang('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        <style>

                            .img_url{
                                height:20px;
                                width:20px;
                                background-size: contain; 
                                max-height:20px;
                                border-radius: 100px;
                            }
                            .option_th{
                                width:18%;
                            }

                        </style>

                        <?php foreach ($doctors as $doctor) { ?>

                            <tr class="treatment-table" >
                                <td><?php echo $doctor->id; ?></td>
                                <td><?php echo $doctor->name; ?></td>
                                <td>
                                    <?php
                                    foreach ($appointments as $appointment) {
                                        if ($appointment->doctor == $doctor->id) {
                                         //   if ($payment->status == 'paid'|| $payment->status == 'paid-last') {
                                                $appointment_number[] = 1;
                                         //   }
                                        }
                                    }
                                    if (!empty($appointment_number)) {
                                        $appointment_total = array_sum($appointment_number);
                                        echo $appointment_total;
                                    } else {
                                        $appointment_total = 0;
                                        echo $appointment_total;
                                    }
                                    ?>
                                </td>
                                 <td> <a class="btn btn-info btn-xs btn_width add_payment_button" style="width: 100px;background: #2AA9d8;" href="appointment/getAppointmentByDoctorId?id=<?php echo $doctor->id; ?>"><i class="fas fa-money-bill-alt"></i>  <?php  echo lang('details'); ?></a></td>
                               
                               
                            </tr>
                            <?php $appointment_number = NULL; ?>
                            <?php $appointment_total = NULL; ?>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<script src="common/js/codearistos.min.js"></script>
<script>
$(document).ready(function () {
        var table = $('#editable-sample').DataTable({
            "columns": [
            { "width": "20%" },
            { "width": "20%" },
            { "width": "20%" },
            { "width": "20%" },
            ],
            responsive: true,

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
     buttons: [
      {
        extend: 'copyHtml5',
        title: 'treatment',
        text: 'Copy',
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'excelHtml5',
        filename: 'treatment',
        title: 'treatment',
        text: 'Excel',
        customize: function (xlsx) {
        },
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'csvHtml5',
        filename: 'treatment',
        title: 'treatment',
        text: 'CSV',
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'pdfHtml5',
        filename: 'treatment',
        title: 'treatment',
        text: 'PDF',
        customize: function (pdf) {
        },
        exportOptions: {
          columns: [0, 1, 2]
        }
      },    
            {
              extend: 'print',
              exportOptions: {
                columns: [0, 1, 2],
              }
            },
            ],

            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: -1,
            "order": [[0, "desc"]],

            "language": {
                "lengthMenu": "_MENU_",
                search: "_INPUT_",
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
            }
        });
        table.buttons().container().appendTo('.custom_buttons');
    });
</script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
</script>

