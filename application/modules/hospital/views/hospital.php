<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<link rel="stylesheet" href="common/css/style-superadmin.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <div class="col-md-6">
                    <i class="fa fa-hospital-o"></i>  <?php echo lang('all_hospitals'); ?>
                </div>    
                <div class="col-md-6 no-print pull-right">
                    <a data-toggle="modal" class="pull-right" href="hospital/addNewView">
                        <div class="btn-group">
                            <button id="" class="btn green">
                                <i class="fa fa-plus-circle"></i>   <?php echo lang('create_new_hospital'); ?>
                            </button>
                        </div>
                    </a>
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
                    <table class="table table-striped table-hover table-bordered superadmin-table-row1" id="editable-sample">
                        <thead>
                            <tr>
                                <th> <?php echo lang('id'); ?></th>
                                <th> <?php echo lang('title'); ?></th>
                                <th> <?php echo lang('email'); ?></th>
                                <th> <?php echo lang('address'); ?></th>
                                <th> <?php echo lang('phone'); ?></th>
                                <th> <?php echo lang('category'); ?></th>
                                <th> <?php echo lang('package'); ?></th>
                                <th> <?php echo lang('status'); ?></th>
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
                        foreach ($hospitals as $hospital) {
                            ?>
                            <tr class="">
                                <td> <?php echo $hospital->id; ?></td>
                                <td> <?php echo $hospital->name; ?></td>
                                <td><?php echo $hospital->email; ?></td>
                                <td class="center"><?php echo $hospital->address; ?></td>
                                <td><?php echo $hospital->phone; ?></td>
                                <td><?php echo lang($hospital->category); ?></td>
                                <td>
                                    <?php
                                    if (!empty($hospital->package)) {
                                        echo $this->package_model->getPackageById($hospital->package)->name;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $status = $this->db->get_where('users', array('id' => $hospital->ion_user_id))->row()->active;
                                    if ($status == '1') {
                                        ?>
                                        <button type="button" class="btn btn-info btn-xs btn_width" data-toggle="modal" data-id="<?php echo $hospital->id; ?>"><?php echo lang('active'); ?></button> 
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-xs delete_button" data-toggle="modal" data-id="<?php echo $hospital->id; ?>"><?php echo lang('disabled'); ?></button> 
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td class="no-print d-flex">
                                    <?php
                                    $status = $this->db->get_where('users', array('id' => $hospital->ion_user_id))->row()->active;
                                    if ($status == '1') {
                                        ?>
                                        <a href="hospital/deactivate?hospital_id=<?php echo $hospital->ion_user_id; ?>" type="button" class="btn btn-info btn-xs status" data-toggle="modal" data-id="<?php echo $hospital->id; ?>"><?php echo lang('disable'); ?></a>  

                                    <?php } else {
                                        ?>

                                        <a href="hospital/activate?hospital_id=<?php echo $hospital->ion_user_id; ?>" type="button" class="btn btn-info btn-xs status" data-toggle="modal" data-id="<?php echo $hospital->id; ?>"><?php echo lang('enable'); ?></a>  
                                        <?php
                                    }
                                    ?>
                                    <a type="button" class="btn btn-info btn-xs btn_width edit_bttn" data-toggle="" href="hospital/editHospital?id=<?php echo $hospital->id; ?>" data-id="<?php echo $hospital->id; ?>"><i class="fa fa-edit"></i></a>   
                                    <a class="btn btn-info btn-xs btn_width delete_button" href="hospital/delete?id=<?php echo $hospital->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>
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
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i>  <?php echo lang('create_new_hospital'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="hospital/addNew" method="post" enctype="multipart/form-data">
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
                    <div class="form-group last col-md-6">
                    <label class="control-label"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail dept-add-spec-fileupload1" >
                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="img" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail dept-add-spec-fileupload"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select'); ?> <?php echo lang('image'); ?></span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('Change'); ?></span>
                                        <input type="file" class="default" name="img_url"/>
                                    </span>
                                    <a href="#" id="rmv_btn" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo lang('Remove'); ?></a>
                                </div>
                            </div>

                        </div>
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
                <h4 class="modal-title"><i class="fa fa-edit"></i>  <?php echo lang('edit_hospital'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="editHospitalForm" action="hospital/addNew" method="post" enctype="multipart/form-data">
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
                    <div class="form-group last col-md-6">
                    <label class="control-label"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail dept-add-spec-fileupload1" >
                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="img" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail dept-add-spec-fileupload" ></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select'); ?> <?php echo lang('image'); ?></span>
                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('Change'); ?></span>
                                        <input type="file" class="default" name="img_url"/>
                                    </span>
                                    <a href="#" id="rmv_btn" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo lang('Remove'); ?></a>
                                </div>
                            </div>

                        </div>
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
                                            $("#img").attr("src", "uploads/cardiology-patient-icon-vector-6244713.jpg");
                                            $('#editHospitalForm').trigger("reset");
                                            $('#myModal2').modal('show');
                                            $.ajax({
                                                url: 'hospital/editHospitalByJason?id=' + iid,
                                                method: 'GET',
                                                data: '',
                                                dataType: 'json',
                                            }).success(function (response) {
                                                console.log(response);
                                                
                                                // Populate the form fields with the data returned from server
                                                $('#editHospitalForm').find('[name="id"]').val(response.hospital.id).end()
                                                //   $('#editEventForm').find('[name="p_id"]').val(response.client.client_id).end()
                                                $('#editHospitalForm').find('[name="name"]').val(response.hospital.name).end()
                                                $('#editHospitalForm').find('[name="password"]').val(response.hospital.password).end()
                                                $('#editHospitalForm').find('[name="email"]').val(response.hospital.email).end()
                                                $('#editHospitalForm').find('[name="address"]').val(response.hospital.address).end()
                                                $('#editHospitalForm').find('[name="phone"]').val(response.hospital.phone).end()
                                                $('#editHospitalForm').find('[name="language"]').val(response.settings.language).end()
                                                if (typeof response.hospital.img_url !== 'undefined' && response.hospital.img_url != '') {
                                                    $("#img").attr("src", response.hospital.img_url);
                                                }
                                            });
                                        });
                                    });
</script>


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
        title: 'List of Institutions',
        exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6] // Specify the indices of the columns to include in the copy operation
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
        filename: 'List_of_Institutions',
        title: 'List of Institutions',
        text: 'Excel',
        customize: function (xlsx) {
        },
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6]
        }
      },
      {
        extend: 'csvHtml5',
        filename: 'List_of_Institutions',
        title: 'List of Institutions',
        text: 'CSV',
        customize: function (csv) {
        },
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6]
        }
      },
      {
        extend: 'pdfHtml5',
        filename: 'List_of_Institutions',
        title: 'List of Institutions',
        text: 'PDF',
        customize: function (pdf) {
        },
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6]
        }
      },    
      {
  extend: 'print',
  text: 'Print',
  title: 'List of Institutions',
  exportOptions: {
    columns: [0, 1, 2, 3, 4, 5, 6]
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