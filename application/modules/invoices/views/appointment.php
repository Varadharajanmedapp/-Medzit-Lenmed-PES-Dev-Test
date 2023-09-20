<style>
  .otp{
    display:none;
  }
</style>
<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
      <header class="panel-heading">
        <?php echo lang('appointments'); ?> Invoice
      </header>

      <!-- <div class="col-md-12">
        <header class="panel-heading tab-bg-dark-navy-blueee row">
          <ul class="nav nav-tabs col-md-8">
            <li class="active">
              <a data-toggle="tab" href="#all"><?php echo lang('all'); ?></a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#pending"><?php echo lang('pending_confirmation'); ?></a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#confirmed"><?php echo lang('confirmed'); ?></a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#treated"><?php echo lang('treated'); ?></a>
            </li>
            <li class="">
              <a data-toggle="tab" href="#cancelled"><?php echo lang('cancelled'); ?></a>
            </li> -->
                        <!-- <li class="">
                            <a data-toggle="tab" href="#requested"><?php //echo lang('requested'); ?></a>
                          </li> -->
                        <!-- </ul>

                        <div class="pull-right col-md-4"><div class="pull-right custom_buttonss"></div></div>

                      </header>
                    </div> -->


                    <div class="">
                      <div class="tab-content">
                        <div id="all" class="tab-pane active">
                          <div class="">
                            <div class="panel-body">
                              <div class="adv-table editable-table ">

                                <div class="space15"></div>
                                <table class="table table-striped table-hover table-bordered table-row2" id="editable-sample5" >
                                  <thead>
                                    <tr>
                                      <th> <?php echo lang('id'); ?></th>
                                      <th> <?php echo lang('patient'); ?></th>
                                      <th> <?php echo lang('doctor'); ?></th>
                                      <th> <?php echo lang('date-time'); ?></th>
                                      <th> <?php echo lang('remarks'); ?></th>
                                      <th> <?php echo lang('status'); ?></th>
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
                                    </style>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
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
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
          $.fn.dataTable
          .tables({visible: true, api: true})
          .columns.adjust()
          .responsive.recalc();
        });
      });
    </script>


    <script>


      $(document).ready(function () {
        var table = $('#editable-sample5').DataTable({
          responsive: true,
            "processing": true,
            "serverSide": true,
            "searchable": true,
            "ajax": {
              url: "invoices/getAppoinmentList",
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
                columns: [0, 1, 2, 3, 4, 5],
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
              "url": "common/assets/DataTables/languages/english.json"
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
    <script>
      $(document).on("click", ".edit_status", function () {
        // e.preventDefault(e);
        // Get the record's ID via attribute  
        // var de =$('#editAppointmentForm').find('[name="date"]').val() * 1000;
        // console.log(de);
            // var d = new Date(de);
            // var date = d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
            var id = $('#appointment_id').val();
            var status = $('#editAppointmentForm').find('[name="status"]').val();
            var patient = $('#editAppointmentForm').find('[name="patient"]').val();
            var doctor = $('#editAppointmentForm').find('[name="doctor"]').val();
            var remarks = $('#editAppointmentForm').find('[name="remarks"]').val();
            var verify_code = $('#editAppointmentForm').find('[name="otp"]').val();
            console.log(status);
            $(".error_msg").text("").hide();
            $.ajax({
              url: 'invoices/hospital_otp',
              type: 'POST',
              data: {
                id : id,
                status : status,
                patient_id : patient,
                doctor_id : doctor,
                remarks : remarks,
                verify_code : verify_code
              },
            // dataType: 'json',
          }).success(function (response) {
            if (response == 'success') {
              window.location.href = 'appointment';
            }
            else if (response == 'invalid_otp') {
              $(".error_msg").text("Please enter a valid OTP").show();
            }
            else if(response == 'otp_empty'){
              $(".error_msg").text("Please enter your OTP").show();
            }
          });
        }); 

      $(document).on('change', '.status', function () {
        var v = $("select.status").val()
        if (v == 'Treated') {
          $('.otp').show();
        } else {
          $('.otp').hide();
        }
      });


    </script>