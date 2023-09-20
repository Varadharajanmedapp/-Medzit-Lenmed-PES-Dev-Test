d<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <div class="col-md-6">
            <i><img alt="" src="uploads/payments--procedures-main.png"  class="doc-list-doc-img"></i><?php echo lang('payment_procedures'); ?>
</div> 
            <div class="col-md-6 no-print pull-right"> 
                    <a href="finance/addPaymentCategoryView">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('create_payment_procedure'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table "> 
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered table-row1" id="editable-sample" >
                        <thead>
                            <tr>
                                <th><?php echo lang('category'); ?> <?php echo lang('name'); ?></th>
                                <th><?php echo lang('description'); ?></th>
                                <th><?php echo lang('category'); ?> <?php echo lang('price'); ?> ( <?php echo $settings->currency; ?> )</th>
                                <th><?php echo lang('doctors_commission'); ?></th>
                                <th><?php echo lang('type'); ?></th>
                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                    <th class="no-print"><?php echo lang('options'); ?></th>
                                <?php } ?>
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

                            .wrapper {
                                margin-top: 42px !important;
                            }

                        </style>

                        <?php foreach ($categories as $category) { ?>
                            <tr class="">
                                <td><?php echo $category->category; ?></td>   
                                <td> <?php echo $category->description; ?></td>
                                <td> <?php echo $category->c_price; ?></td>
                                <td> <?php echo $category->d_commission; ?> %</td>
                                <td> <?php
                                    if ($category->type == 'diagnostic') {
                                        echo lang('diagnostic_test');
                                    } else {
                                        echo lang('others');
                                    }
                                    ?>
                                </td>
                                <?php if ($this->ion_auth->in_group(array('admin', 'Accountant'))) { ?>
                                    <td class="no-print">
                                        <a class="btn btn-info btn-xs editbutton"  title="<?php echo lang('edit'); ?>" href="finance/editPaymentCategory?id=<?php echo $category->id; ?>"><img alt="" src="uploads/edit-bttn-icon.png" class="schedule-del-but"> Edit</a>
                                        <a class="btn btn-info btn-xs delete_button" title="<?php echo lang('delete'); ?>" href="finance/deletePaymentCategory?id=<?php echo $category->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><img alt="" src="uploads/trash-bttn-icon.png" class="schedule-del-but"> Delete</a>
                                    </td>
                                <?php } ?>
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
                                                        'copyHtml5',
                                                        'excelHtml5',
                                                        'csvHtml5',
                                                        'pdfHtml5',
                                                        {
                                                            extend: 'print',
                                                            exportOptions: {
                                                                columns: [0, 1, 2, 3, 4],
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
