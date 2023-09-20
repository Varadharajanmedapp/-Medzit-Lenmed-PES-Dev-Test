
<!--sidebar end-->


<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">


<section id="main-content">

    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">
            <header class="panel-heading">
                <div class="col-md-6 d-flex">
                    <?php echo lang('specialist'); ?> <?php echo lang('list'); ?>
                </div>
                <div class="col-md-6 no-print pull-right"> 
                    <a href="<?php echo base_url()."department/add_specialist";?>">
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
                    <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered table-row1" id="editable-sample">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Department</th>
                                    <th>Image</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($all_specialist as  $specialist) {?> 
                                   
                                   <tr class="specialist-table" >
                                        <td><?php echo $specialist->id; ?></td>
                                        <td><?php echo $specialist->title; ?></td>
                                        <td><?php echo $specialist->department; ?></td>

                                        <td><img src="<?php echo $specialist->image; ?>";?></td>
                                        <td>
                                            <a type="button" class="btn editbutton" href="<?php echo base_url().'department/edit_specialist/'.$specialist->id; ?>"><img alt="" src="uploads/edit-bttn-icon.png" class="department-edit-butt" > Edit </a>
                                            <a class="btn detailsbutton detailsbutton1" href="<?php echo base_url().'department/details_specialist/'.$specialist->id; ?>"> <img alt="" src="uploads/info-icon-w.png" class="department-info-butt" >  Info </a>
                                            <a class="btn delete_button delete_button1" title=" <?php echo lang('delete'); ?>" href="<?php echo base_url().'department/delete_specialist/'.$specialist->id; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><img alt="" src="uploads/trash-bttn-icon.png" class="department-trash-butt">Delete</a>
                                        </td>
                                    </tr>
                                <?php }?>
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
<script src="common/js/codearistos.min.js"></script>
<script>
$(document).ready(function () {
        var table = $('#editable-sample').DataTable({
            "columns": [
            { "width": "20%" },
            { "width": "20%" },
            { "width": "20%" },
            { "width": "20%" },
            { "width": "18%" },
            ],
            responsive: true,

            dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-5'i><'col-sm-7'p>>",
     buttons: [
      {
        extend: 'copyHtml5',
        title: 'specialist',
        text: 'Copy',
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'excelHtml5',
        filename: 'specialist',
        title: 'specialist',
        text: 'Excel',
        customize: function (xlsx) {
        },
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'csvHtml5',
        filename: 'specialist',
        title: 'specialist',
        text: 'CSV',
        exportOptions: {
          columns: [0, 1, 2]
        }
      },
      {
        extend: 'pdfHtml5',
        filename: 'specialist',
        title: 'specialist',
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