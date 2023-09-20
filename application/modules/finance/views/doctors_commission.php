
<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                 <?php echo lang('doctors_commission'); ?>
            </header>
            <div class="space15"></div> 
            <div class="col-md-12">
                <div class="col-md-7">
                    <section class="panel-body">
                        <form role="form" action="finance/doctorsCommission" class="clearfix" method="post" enctype="multipart/form-data">
                            <div class="form-group">

                                <!--     <label class="control-label col-md-3">Date Range</label> -->
                                <div class="col-md-6">
                                    <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy">
                                        <input type="text" class="form-control dpd1" name="date_from" value="<?php
                                        if (!empty($from)) {
                                            echo $from;
                                        }
                                        ?>" placeholder="<?php echo lang('date_from'); ?>">
                                        <span class="input-group-addon">To</span>
                                        <input type="text" class="form-control dpd2" name="date_to" value="<?php
                                        if (!empty($to)) {
                                            echo $to;
                                        }
                                        ?>" placeholder="<?php echo lang('date_to'); ?>">
                                    </div>
                                    <div class="row"></div>
                                    <span class="help-block"></span> 
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="submit" class="btn btn-info range_submit"><?php echo lang('submit'); ?></button>
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
                        <button class="export" onclick="javascript:window.print();"><?php echo lang('print'); ?></button>     
                    </div>
                    <div class="space15">
                        <?php
                        if (!empty($from) && !empty($to)) {
                            echo "From $from To $to";
                        }
                        ?> 
                    </div>

                    <table class="table table-striped table-hover table-bordered table-row1" id="editable-sample">
                        <thead>
                            <tr class="doc_option_row1" >
                                <th><?php echo lang('doctor_id'); ?></th>
                                <th><?php echo lang('doctor'); ?></th>
                                <th><?php echo lang('commission'); ?></th>
                                <th><?php echo lang('total'); ?></th>
                                <th><?php echo lang('options'); ?></th>
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
                            .doc_option_row{
                                box-shadow: 0px 0px 4px 0px grey !important;
                            }
                            .doc_option_row1{
                                box-shadow: 0px 0px 4px 0px grey !important;
                            }

                        </style>

                        <?php foreach ($doctors as $doctor) { ?>

                            <tr class="doc_option_row">
                                <td><?php echo $doctor->id; ?></td>
                                <td><?php echo $doctor->name; ?></td>
                                <td><?php echo $settings->currency; ?>
                                    <?php
                                    foreach ($payments as $payment) {
                                        if ($payment->doctor == $doctor->id) {    
                                                $doctor_amount[] = $payment->doctor_amount;            
                                        }
                                    }
                                    if (!empty($doctor_amount)) {
                                        $doctor_total = array_sum($doctor_amount);
                                        echo $doctor_total;
                                    } else {
                                        $doctor_total = 0;
                                        echo $doctor_total;
                                    }
                                    ?>
                                </td>
                                <td><?php echo $settings->currency; ?>
                                    <?php

                                    $doctor_gross = $doctor_total;
                                    if (!empty($doctor_gross)) {
                                        echo $doctor_gross;
                                    } else {
                                        echo'0';
                                    }
                                    ?>
                                </td>
                                 <td> <a class="btn btn-info btn-xs invoicebutton" href="finance/docComDetails?id=<?php echo $doctor->id; ?>"><i class="fa fa-file-text"></i> <?php echo lang('details'); ?> </a></td>
                            </tr>
                            <?php $doctor_amount = NULL; ?>
                            <?php $doctor_gross = NULL; ?>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    var table = $('#editable-sample').DataTable({
        
        responsive: true,

        dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1],
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
        },

    });

    table.buttons().container()
            .appendTo('.custom_buttons');
});
</script>
