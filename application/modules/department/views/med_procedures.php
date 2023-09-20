
<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <div class="col-md-6 d-flex">
                 <?php echo lang('medical_procedures'); ?> <?php echo lang('list'); ?>
                </div>
                <div class="clearfix no-print col-md-6 pull-right"> 
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_new_procedures'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header>
            <style>
                /*    .editable-table .search_form{
                        border: 0px solid #ccc !important;
                        padding: 0px !important;
                        background: none !important;
                        float: right;
                        margin-right: 14px !important;
                    }
    
    
                    .editable-table .search_form input{
                        padding: 6px !important;
                        width: 250px !important;
                        background: #fff !important;
                        border-radius: none !important;
                    }
    
                    .editable-table .search_row{
                        margin-bottom: 20px !important;
                    }
    
                    .panel-body {
                        padding: 15px 0px 15px 0px;
                    }*/

            </style>

            <div class="panel-body"> 
                <div class="adv-table editable-table">
                    <div class="space15"> 
                    </div>
                    <table class="table table-striped table-hover table-bordered table-row1" id="editable-sample1">
                        <thead>
                            <tr>
                                <th> <?php echo lang('id'); ?></th>
                                <th> <?php echo lang('clinical_procedure_type'); ?></th>
                                <th> <?php echo lang('department'); ?></th>
                                <th> <?php echo lang('amount'); ?></th>
                                <th> <?php echo lang('options'); ?></th>
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

                            .load{
                                float: right !important;
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

<!-- Add Accountant Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('add_new_procedures'); ?></h4>
            </div>
            <div class="modal-body row">
                <form role="form" action="department/add_new_scan_types" class="clearfix" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('clinical_procedure_type'); ?></label>
                        <input type="text" class="form-control" name="scan_type" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    
                     <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('department'); ?></label>
                        <select class="form-control m-bot15 js-example-basic-single" name="category" value=''>
                            <?php foreach ($departments as $department) { ?>
                                <option value="<?php echo $department->name; ?>"> <?php echo $department->name; ?> </option>
                            <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('amount'); ?></label>
                        <input type="text" class="form-control" name="amount" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div></div>

                    <div class="form-group col-md-12">
                      <label for="exampleInputEmail1"><?php echo lang('description'); ?></label>
                      <textarea class="ckeditor form-control" id="editor" name="description" value="" rows="5"></textarea>

                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Accountant Modal-->

<script src="common/js/codearistos.min.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#editable-sample1').DataTable({
            "columns": [
            { "width": "7%" },
            { "width": "20%" },
            { "width": "20%" },
            { "width": "10%" },
            { "width": "8%" },
            ],
            responsive: true,
            //   dom: 'lfrBtip',

            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
                url: "department/get_med_procedure_list",
                type: 'POST',
            },
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [
      {
        extend: 'copyHtml5',
        title: 'Department',
        text: 'Copy',
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'excelHtml5',
        filename: 'Department',
        title: 'Department',
        text: 'Excel',
        customize: function (xlsx) {
        },
        exportOptions: {
          columns: [0, 1, 2, 3]
        }
      },
      {
        extend: 'csvHtml5',
        filename: 'Department',
        title: 'Department',
        text: 'CSV',
        exportOptions: {
          columns: [0, 1, 2, 3]
        }
      },
      {
        extend: 'pdfHtml5',
        filename: 'Department',
        title: 'Department',
        text: 'PDF',
        customize: function (pdf) {
        },
        exportOptions: {
          columns: [0, 1, 2, 3]
        }
      },
    
                
            {
              extend: 'print',
              exportOptions: {
                columns: [0, 1, 2, 3],
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
            },
        });
        table.buttons().container().appendTo('.custom_buttons');
    });
</script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>

