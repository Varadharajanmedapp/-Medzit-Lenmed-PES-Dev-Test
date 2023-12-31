
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
            <div class="col-md-6">
                <?php echo lang('payments'); ?>
                </div>
                <div class="col-md-6 clearfix no-print pull-right">
                    <a href="payments/addPaymentView"> 
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs mr-end">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_payment'); ?>
                            </button>
                        </div>
                    </a> 
                </div>
            </header>

            <div class="panel-body">
                <div class="adv-table editable-table ">

                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample" >
                        <thead>
                            <tr>
                                <th><?php echo lang('invoice_id'); ?></th>
                                <th><?php echo lang('patient'); ?></th>
                                <th><?php echo lang('doctor'); ?></th>
                                <th><?php echo lang('date'); ?></th>
                                <th><?php echo lang('sub_total'); ?></t>
                                <th><?php echo lang('discount'); ?></th>
                                <th><?php echo lang('grand_total'); ?></th>
                                <th><?php echo lang('paid'); ?> <?php echo lang('amount'); ?></th>
                                <th><?php echo lang('due'); ?></th>
                                <th><?php echo "Transaction ID"; ?></th>
                                <th class="option_th no-print"><?php echo lang('options'); ?></th>
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
        $(".flashmessage").delay(3000).fadeOut(100);
    });</script>



<script>


    $(document).ready(function () {
        var table = $('#editable-sample').DataTable({
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "payments/getPayment",
                type: 'POST',
            },
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-md-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            buttons: [
                {
                extend: 'copyHtml5',
                title: " Payment - PES ",
                exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9],
                    }
                },
                {
                extend: 'excelHtml5',
                title: " Payment - PES ",
                customize: function (xlsx) {
                  },
                exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9],
                    }
                },
                {
                extend: 'csvHtml5',
                title: " Payment - PES ",
                customize: function (csv) {
                  },
                exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9],
                    }
                },
                {
                extend: 'pdfHtml5',
                title: " Payment - PES ",
                exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9],
                    }
                },
                {
                extend: 'print',
                title: " Payment - PES ",
                exportOptions: {
                    columns: [0,1,2,3,4,5,6,7,8,9],
                }
                },
            ],

            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,

            "order": [[0, "desc"]],

            "language": {
                "lengthMenu": "_MENU_",
                 search: "_INPUT_",
                 searchPlaceholder: "Search...", 
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
            }
        });
        table.buttons().container().appendTo('.custom_buttons');     
    });
</script>
