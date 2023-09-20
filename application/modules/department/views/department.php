<!--sidebar end-->
<!-- new GUI css -->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

<!--main content start-->


<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
            <div class="col-md-6 d-flex">
            <img alt="" src="uploads/dashboaard-main.png" class="dash-board-mainicon">
            
                <?php echo lang('list_of_departments') ?>
                </div>
                <div class="col-md-6 no-print pull-right"> 
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_new'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header> 
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15 "></div>
                    <table class="table table-striped table-hover table-bordered table-row1" id="editable-sample" >
                        <thead>
                            <tr>
                                <th> <?php echo lang('name') ?></th>
                                <th> <?php echo lang('description') ?></th>
                                <th> <?php echo lang('amount') ?></th>
                                <th class="no-print"> <?php echo lang('options') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($departments as $department) { ?>
                                <tr class="">
                                    <td><?php echo $department->name; ?></td>
                                    <td><?php echo $department->description; ?></td>
                                    <td><?php echo $department->amount; ?></td>
                                    <td class="no-print">
                                        <button type="button" class="btn btn-info btn-xs btn_width editbutton"  data-toggle="modal" title="<?php echo lang('edit'); ?>" data-id="<?php echo $department->id; ?>"><img alt="" src="uploads/edit-bttn-icon.png" class="department-edit-butt" >Edit </button>   
                                        <a class="btn btn-info btn-xs btn_width delete_button" title="<?php echo lang('delete'); ?>" href="department/delete?id=<?php echo $department->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><img alt="" src="uploads/trash-bttn-icon.png" class="department-trash-butt">Delete </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
                            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
<!-- Add Department Modal-->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> <?php echo lang('add_department') ?></h4>
            </div> 
            <div class="modal-body">
                <form role="form" action="department/addNew" class="clearfix" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('department') ?> <?php echo lang('name') ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label class=""> <?php echo lang('description') ?></label>
                        <div class="">
                            <textarea class="ckeditor form-control" name="description" value="" rows="10">  </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=""> <?php echo lang('amount') ?></label>
                        <div class="">
                        <input type="text" class="form-control" name="amount" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button pull-right"> <?php echo lang('submit') ?></button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Department Modal-->

<!-- Edit Department Modal-->
<div class="modal fade" id="myModal2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">   <?php echo lang('edit_department') ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="departmentEditForm" class="clearfix" action="department/addNew" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('department') ?> <?php echo lang('name') ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label class=""> <?php echo lang('description') ?></label>
                        <div class="">
                            <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="10">  </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('amount') ?></label>
                        <input type="text" class="form-control" name="amount" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="p_id" value=''>

                    <section class="">
                        <button type="submit" name="submit" class="btn btn-info submit_button pull-right"> <?php echo lang('submit') ?></button>
                    </section>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    $(".editbutton").click(function (e) {
        e.preventDefault(e);
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');
        $.ajax({
            url: 'department/editDepartmentByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function (response) {
            // Populate the form fields with the data returned from server
            $('#departmentEditForm').find('[name="id"]').val(response.department.id).end()
            $('#departmentEditForm').find('[name="name"]').val(response.department.name).end()
            $('#departmentEditForm').find('[name="amount"]').val(response.department.amount).end()
            CKEDITOR.instances['editor'].setData(response.department.description)
            $('#myModal2').modal('show');
        });
    });
});
</script>
<script>
    $(document).ready(function () {
        var table = $('#editable-sample').DataTable({
            "columns": [
            { "width": "20%" },
            { "width": "20%" },
            { "width": "20%" },
            { "width": "10%" },
            ],
            responsive: true,
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
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'csvHtml5',
        filename: 'Department',
        title: 'Department',
        text: 'CSV',
        exportOptions: {
          columns: [0, 1, 2]
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
