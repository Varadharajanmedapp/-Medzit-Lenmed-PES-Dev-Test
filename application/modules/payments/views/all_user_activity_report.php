
<!--sidebar end-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('activities_by'); ?> <strong class="payment_activity"  ><?php echo lang('all_users'); ?></strong> (<?php echo lang('today'); ?>)
            </header>
            <div class="panel-body">
                <header class="panel-heading">
                    <?php echo lang('today'); ?> <?php echo lang('report'); ?>
                </header>
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th class="option_th today-report-w" ><?php echo lang('user'); ?> <?php echo lang('name'); ?></th>
                                <th class="option_th today-report-w" ><?php echo lang('bill_amount'); ?></th>
                                <th class="option_th today-report-w" ><?php echo lang('payment_received'); ?></th>
                                <th class="option_th today-report-w" ><?php echo lang('due_amount'); ?></th>
                                <th class="option_th no-print today-report-w" ><?php echo lang('options'); ?></th>
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
                                width:33%;
                            }
                            .clearfix{
                                margin-bottom: 50px;
                            }
                        </style>
                        <?php foreach ($accountants as $accountant) { ?>
                            <tr class="">
                                <td><?php echo $accountant->name; ?></td>
                                <td><?php echo $settings->currency; ?><?php
                                    $total = array();
                                    $ot_total = array();

                                    $accountant_ion_user_id = $accountant->ion_user_id;
                                    foreach ($payments as $payment) {
                                        if ($payment->user == $accountant_ion_user_id) {
                                            $total[] = $payment->gross_total;
                                        }
                                    }
                                    foreach ($ot_payments as $ot_payment) {
                                        if ($ot_payment->user == $accountant_ion_user_id) {
                                            $ot_total[] = $ot_payment->gross_total;
                                        }
                                    }

                                    $total = array_sum($total);
                                    if (empty($total)) {
                                        $total = 0;
                                    }

                                    $ot_total = array_sum($ot_total);
                                    if (empty($ot_total)) {
                                        $ot_total = 0;
                                    }

                                    echo $bill_total = $total + $ot_total;
                                    ?>
                                </td>
                                <td><?php echo $settings->currency; ?><?php
                                    $deposit_total = array();
                                    foreach ($deposits as $deposit) {
                                        if ($deposit->user == $accountant_ion_user_id) {
                                            $deposit_total[] = $deposit->deposited_amount;
                                        }
                                    }

                                    $deposit_total = array_sum($deposit_total);
                                    if (empty($deposit_total)) {
                                        $deposit_total = 0;
                                    }
                                    echo $deposit_total;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $bill_total - $deposit_total; ?>
                                </td>
                                <td class="no-print">
                                    <a class="btn btn-info btn-xs btn_width add_payment_button appoinment-tab-width3" href="finance/allUserActivityReport?user=<?php echo $accountant_ion_user_id; ?>"><i class="fa fa-info"></i> Details</a>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($receptionists as $receptionist) { ?>
                            <tr class="">
                                <td><?php echo $receptionist->name; ?></td>
                                <td><?php echo $settings->currency; ?><?php
                                    $total_receptionist = array();
                                    $ot_total_receptionist = array();

                                    $receptionist_ion_user_id = $receptionist->ion_user_id;
                                    foreach ($payments as $payment1) {
                                        if ($payment1->user == $receptionist_ion_user_id) {
                                            $total_receptionist[] = $payment1->gross_total;
                                        }
                                    }
                                    foreach ($ot_payments as $ot_payment1) {
                                        if ($ot_payment1->user == $receptionist_ion_user_id) {
                                            $ot_total_receptionist[] = $ot_payment1->gross_total;
                                        }
                                    }

                                    $total_receptionist = array_sum($total_receptionist);
                                    if (empty($total_receptionist)) {
                                        $total_receptionist = 0;
                                    }

                                    $ot_total_receptionist = array_sum($ot_total_receptionist);
                                    if (empty($ot_total_receptionist)) {
                                        $ot_total_receptionist = 0;
                                    }

                                    echo $bill_total_receptionist = $total_receptionist + $ot_total_receptionist;
                                    ?>
                                </td>
                                <td><?php echo $settings->currency; ?><?php
                                    $deposit_total_receptionist = array();
                                    foreach ($deposits as $deposit) {
                                        if ($deposit->user == $receptionist_ion_user_id) {
                                            $deposit_total_receptionist[] = $deposit->deposited_amount;
                                        }
                                    }

                                    $deposit_total_receptionist = array_sum($deposit_total_receptionist);
                                    if (empty($deposit_total_receptionist)) {
                                        $deposit_total_receptionist = 0;
                                    }
                                    echo $deposit_total_receptionist;
                                    ?>
                                </td>
                                <td>
                                    <?php echo $bill_total_receptionist - $deposit_total_receptionist; ?>
                                </td>
                                <td class="no-print">
                                    <a class="btn btn-info btn-xs btn_width add_payment_button appoinment-tab-width3"  href="finance/allUserActivityReport?user=<?php echo $receptionist_ion_user_id; ?>"><i class="fa fa-info"></i> Details</a>
                                </td>
                            </tr>
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
<!--footer start-->

<script src="common/js/codearistos.min.js"></script>

<script>
    $(document).ready(function () {
        var table = $('#editable-sample').DataTable({
            responsive: true,

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                {
                extend: 'copyHtml5',
                title: " Payment - PES ",
                exportOptions: {
                        columns: [0,1,2,3,4],
                    }
                },
                {
                extend: 'excelHtml5',
                title: " Payment - PES ",
                customize: function (xlsx) {
                  },
                exportOptions: {
                        columns: [0,1,2,3,4],
                    }
                },
                {
                extend: 'csvHtml5',
                title: " Payment - PES ",
                customize: function (csv) {
                  },
                exportOptions: {
                        columns: [0,1,2,3,4],
                    }
                },
                {
                extend: 'pdfHtml5',
                title: " Payment - PES ",
                exportOptions: {
                        columns: [0,1,2,3,4],
                    }
                },
                {
                extend: 'print',
                title: " Payment - PES ",
                exportOptions: {
                    columns: [0,1,2,3,4],
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

<script>
    $(document).ready(function () {
        $('#editable-samplee').DataTable();
    });
</script>




