<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <div class="col-md-6">
                    <i class="fa fa-package-o"></i>  <?php echo lang('all_packages'); ?>
                </div>
                <div class="col-md-6">    
                    <div class="clearfix no-print pull-right">
                        <a data-toggle="modal" href="hospital/package/addNewView">
                            <div class="btn-group">
                                <button id="" class="btn green">
                                    <i class="fa fa-plus-circle"></i>   <?php echo lang('add_new_package'); ?>
                                </button>
                            </div>
                        </a>
                    </div>
                </div>    
            </header>

            <style>
                .editbutton{
                    width: auto !important;
                }

                .delete_button{
                    width: auto !important;
                }

                .status{
                    background: #123412 !important;
                }

            </style>



            <div class="panel-body">
                <div class="adv-table editable-table">
                   
                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered" id="editable-sample">
                        <thead>
                            <tr>
                                <th> <?php echo lang('package'); ?> <?php echo lang('name'); ?></th>
                                <th> <?php echo lang('patient'); ?> <?php echo lang('limit'); ?></th>
                                <th> <?php echo lang('doctor'); ?> <?php echo lang('limit'); ?></th>
                                <th> <?php echo lang('permitted_modules'); ?></th>
                                <th> <?php echo lang('restricted_modules'); ?></th>
                                <th class="no-print"> <?php echo lang('options'); ?></th>
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

                        </style>

                        <?php
                        foreach ($packages as $package) {
                            ?>
                            <tr class="">
                                <td> <?php echo $package->name; ?></td>
                                <td><?php echo $package->p_limit; ?></td>
                                <td class="center"><?php echo $package->d_limit; ?></td>
                                <td class="center cen-ter1"><?php
                                    $modules = explode(',', $package->module);
                                    foreach ($modules as $key => $value) {
                                        echo $value . '<br>';
                                    }
                                    ?></td>
                                <td class="center cen-ter1" >
                                    <?php
                                    $all_modules = array('accountant', 'appointment', 'lab', 'bed', 'department', 'doctor', 'donor', 'finance', 'pharmacy', 'laboratorist', 'medicine', 'nurse', 'patient', 'pharmacist', 'prescription', 'receptionist', 'report', 'sms', 'notice', 'email');
                                    $restricted_modules = array_diff($all_modules, $modules);
                                    foreach ($restricted_modules as $key1 => $value1) {
                                        echo $value1 . '<br>';
                                    }
                                    ?>
                                </td>
                                <td class="no-print">
                                    <a type="button" class="btn btn-info btn-xs btn_width" data-toggle="" href="hospital/package/editPackage?id=<?php echo $package->id; ?>" data-id="<?php echo $package->id; ?>"><i class="fa fa-edit"></i></a>   
                                    <a class="btn btn-info btn-xs btn_width delete_button" href="hospital/package/delete?id=<?php echo $package->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

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






<!-- Add Event Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>  <?php echo lang('create_new_package'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="package/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('email'); ?></label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('password'); ?></label>
                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('address'); ?></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('phone'); ?></label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group"> 

                        <label for="exampleInputEmail1"> <?php echo lang('language'); ?></label>

                        <select class="form-control m-bot15" name="language" value=''>
                            <option value="english" <?php
                            if (!empty($settings->language)) {
                                if ($settings->language == 'english') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('english'); ?> 
                            </option>
                            <option value="spanish" <?php
                            if (!empty($settings->language)) {
                                if ($settings->language == 'spanish') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('spanish'); ?>
                            </option>
                            <option value="french" <?php
                            if (!empty($settings->language)) {
                                if ($settings->language == 'french') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('french'); ?>
                            </option>
                            <option value="italian" <?php
                            if (!empty($settings->language)) {
                                if ($settings->language == 'italian') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('italian'); ?>
                            </option>
                            <option value="portuguese" <?php
                            if (!empty($settings->language)) {
                                if ($settings->language == 'portuguese') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('portuguese'); ?>
                            </option>
                        </select>

                    </div>


                    <input type="hidden" name="id" value=''>

                    <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Event Modal-->

<!-- Edit Event Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i>  <?php echo lang('edit_package'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editPackageForm" action="package/addNew" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('name'); ?></label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('email'); ?></label>
                        <input type="text" class="form-control" name="email" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('password'); ?></label>
                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="********">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('address'); ?></label>
                        <input type="text" class="form-control" name="address" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <?php echo lang('phone'); ?></label>
                        <input type="text" class="form-control" name="phone" id="exampleInputEmail1" value='' placeholder="">
                    </div>

                    <div class="form-group"> 

                        <label for="exampleInputEmail1"> <?php echo lang('language'); ?></label>

                        <select class="form-control m-bot15" name="language" value=''>
                            <option value="english" <?php
                            if (!empty($settings->language)) {
                                if ($settings->language == 'english') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('english'); ?> 
                            </option>
                            <option value="spanish" <?php
                            if (!empty($settings->language)) {
                                if ($settings->language == 'spanish') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('spanish'); ?>
                            </option>
                            <option value="french" <?php
                            if (!empty($settings->language)) {
                                if ($settings->language == 'french') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('french'); ?>
                            </option>
                            <option value="italian" <?php
                            if (!empty($settings->language)) {
                                if ($settings->language == 'italian') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('italian'); ?>
                            </option>
                            <option value="portuguese" <?php
                            if (!empty($settings->language)) {
                                if ($settings->language == 'portuguese') {
                                    echo 'selected';
                                }
                            }
                            ?>><?php echo lang('portuguese'); ?>
                            </option>
                        </select>

                    </div>

                    <input type="hidden" name="id" value=''>

                    <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?></button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Edit Event Modal-->

<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".editbutton").click(function (e) {
                                            e.preventDefault(e);
                                            // Get the record's ID via attribute  
                                            var iid = $(this).attr('data-id');
                                            $('#editPackageForm').trigger("reset");
                                            $('#myModal2').modal('show');
                                            $.ajax({
                                                url: 'package/editPackageByJason?id=' + iid,
                                                method: 'GET',
                                                data: '',
                                                dataType: 'json',
                                            }).success(function (response) {
                                                // Populate the form fields with the data returned from server
                                                $('#editPackageForm').find('[name="id"]').val(response.package.id).end()
                                                //   $('#editEventForm').find('[name="p_id"]').val(response.client.client_id).end()
                                                $('#editPackageForm').find('[name="name"]').val(response.package.name).end()
                                                $('#editPackageForm').find('[name="password"]').val(response.package.password).end()
                                                $('#editPackageForm').find('[name="email"]').val(response.package.email).end()
                                                $('#editPackageForm').find('[name="address"]').val(response.package.address).end()
                                                $('#editPackageForm').find('[name="phone"]').val(response.package.phone).end()
                                                $('#editPackageForm').find('[name="language"]').val(response.settings.language).end()
                                            });
                                        });
                                    });
</script>


<script>
    $(document).ready(function () {
      var table =  $('#editable-sample').DataTable({
            "columns": [
            { "width": "10%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "20%" },
            { "width": "20%" },
            { "width": "8%" },
            ],
            responsive: true,

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                    buttons: [
    {
        extend: 'copyHtml5',
        title: 'All Plans & Modules',
        exportOptions: {
            columns: [0, 1, 2, 3, 4]
        },
        customizeData: function (data) {
            var table = data.getElementsByTagName('table')[0];
            var cells = table.getElementsByTagName('td');
            for (var i = 0; i < cells.length; i++) {
            cells[i].style.textAlign = 'center';
            cells[i].style.padding = '5px';
            }
        }
        },
      {
        extend: 'excelHtml5',
        filename: 'All Plans & Modules',
        title: 'All Plans & Modules',
        text: 'Excel',
        customize: function (xlsx) {
        },
        exportOptions: {
          columns: [0, 1, 2, 3, 4]
        }
      },
      {
        extend: 'csvHtml5',
        filename: 'All Plans & Modules',
        title: 'All Plans & Modules',
        text: 'CSV',
        customize: function (csv) {
        },
        exportOptions: {
          columns: [0, 1, 2, 3, 4]
        }
      },
      {
    extend: 'pdfHtml5',
    filename: 'All Plans & Modules',
    title: 'All Plans & Modules',
    text: 'PDF',
  customize: function (doc) {

    doc.content[1].table.heights = function () {
      return 40;
    };
    doc.content[1].table.body.forEach(function (row) {
      row.forEach(function (cell) {

        cell.text = cell.text.replace(/\n/g, "\n\n").replace(/ /g, "\n\n").replace(/\t/g, "\n\n");
        cell.lineHeight = 1.2;
        cell.preserveLeadingSpaces = true; 
      });
    });
  },
  exportOptions: {
    columns: [0, 1, 2, 3, 4]
  }
},
      {
        extend: 'print',
        text: 'Print',
        title: 'All Plans & Modules',
        exportOptions: {
            columns: [0, 1, 2, 3, 4]
  }
}
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
                searchPlaceholder: "Search...",  
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"

            },

        });

        table.buttons().container()
                .appendTo('.custom_buttons');
    });
</script>

<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>