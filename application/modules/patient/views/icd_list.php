<!--sidebar end-->
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <section>
      <header class="panel-heading">
        <?php echo lang('icd_list'); ?>
      </header>
      <div class="panel-body">

        <div class="adv-table editable-table ">

          <div class="space15"></div>
          <table class="table table-striped table-hover table-bordered" id="editable-sample">
            <thead>
              <tr>
                <th><?php echo lang('patient_id'); ?></th>   
                <th><?php echo lang('name'); ?></th>
                <th><?php echo lang('phone'); ?></th>
                <th><?php echo lang('icd'); ?></th>
              </tr>
            </thead>
            <tbody>
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
      "processing": true,
      "serverSide": true,
      "searchable": true,
      "ajax": {
        url: "patient/getPatients",
        type: 'POST',
      },
      scroller: {
        loadingIndicator: true
      },
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
            columns: [0, 1, 2],
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
        "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
      }
    });
  table.buttons().container().appendTo('.custom_buttons');
});
</script>