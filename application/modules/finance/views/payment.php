d
<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
            <div class="col-md-6">
            <i ><img alt="" src="uploads/payments-main.png"  class="doc-list-doc-img" ></i><?php echo lang('payments'); ?>
            </div>
            <div class="col-md-6 clearfix no-print pull-right" >
                    <a href="finance/addPaymentView"> 
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs" >
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_payment'); ?>
                            </button>
                        </div>
                    </a> 
                </div>
            </header>
            <div class="payment_data">
            <div class="col-md-6 date_section">
            <div class="">            
            <div class="h5">Date Range</div> 
            <div class="col-md-4 panel">
            <label for="exampleInputEmail1"> <?php echo 'From' ?></label>
            <input type="text" class="form-control default-date-picker" id="from_date" readonly="" name="from_date" placeholder="From">    
            </div>
            <div class="col-md-4 panel">
            <label for="exampleInputEmail1"> <?php echo 'To' ?></label>
            <input type="text" class="form-control default-date-picker" id="to_date" readonly="" name="to_date" placeholder="To">    
            </div>
            <div class="col-md-4 panel">
            <label for="exampleInputEmail1"></label>
           <button class="btn green form-control" id="submit_btn">Submit</button>
            </div>
            </div>
            <div class="form-check col-md-6 check_form">
                <input type="checkbox" class="form-check-input check_type"  value="all" id="all">
                <label class="form-check-label" for="exampleCheck1">All</label>
                <input type="checkbox" class="form-check-input check_type" value="php" id="php">
                <label class="form-check-label" for="exampleCheck1">PHP</label>
                <input type="checkbox" class="form-check-input check_type" value="Walk-In" id="Walk-In">
                <label class="form-check-label" for="exampleCheck1">Walk-in</label>
            </div>
            </div>
            <div class="col-md-6 payment_data_section">
            <div class="payment_data_table patient_data">
            <div class="payment_row"><div class="p_row">Walk in</div><div class="p_row">:</div><div id="walk_in_total" class="p_row">0</div></div>
            <div class="payment_row"><div class="p_row">PHP</div><div class="p_row">:</div><div id="php_total" class="p_row">0</div></div>
            <div class="payment_row"><div class="p_row">All</div><div class="p_row">:</div><div id="all_total" class="p_row">0</div></div>
            </div>
            <div class="payment_data_table payments_data">
            <div class="payment_row"><div class="p_row">Sub Total</div><div class="p_row">:</div><div id="sub_total" class="p_row">0</div></div>
            <div class="payment_row"><div class="p_row">Discount</div><div class="p_row">:</div><div id="discount" class="p_row">0</div></div>
            <div class="payment_row"><div class="p_row">Grand Total</div><div class="p_row">:</div><div id="grand_total" class="p_row">0</div></div>
            </div>   
            </div>
           </div>

            <div class="panel-body">
                <div class="adv-table editable-table ">

                    <div class="space15"></div>
                    <table class="table table-striped table-hover table-bordered table-row1" id="editable-sample">
                        <thead>
                            <tr>
                                <th><?php echo lang('invoice_id'); ?></th>
                                <th><?php echo lang('patient'); ?></th>
                                <th><?php echo lang('doctor'); ?></th>
                                <th><?php echo lang('date'); ?></th>
                                <th><?php echo lang('sub_total'); ?></th>
                                <th><?php echo lang('discount'); ?></th>
                                <th><?php echo lang('grand_total'); ?></th>
                                <th><?php echo lang('paid'); ?> <?php echo lang('amount'); ?></th>
                                <th><?php echo lang('due'); ?></th>
                                <th><?php echo lang('payment_id'); ?></th>
                                <th class="option_th no-print"><?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody class="table-row" >

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
                url: "finance/getPayment",
                type: 'POST',
            },
            scroller: {
                loadingIndicator: true
            },
            dom: "<'row'<'col-md-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
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
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9],
                    }
                },
            ],

            aLengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            iDisplayLength: 100,

            "order": [[0, "desc"]],
           /*  "total" :[], */

            "language": {
                "lengthMenu": "_MENU_",
                 search: "_INPUT_",
                "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
            }
        });
        table.buttons().container().appendTo('.custom_buttons');     
    });
    $("#all").on('click', function()
    {
        $("#php").prop("checked", false);
        $("#walk_in").prop("checked", false);
    })
    $("#php").on('click', function()
    {
        $("#all").prop("checked", false);
        $("#walk_in").prop("checked", false);
    })
    $("#walk_in").on('click', function()
    {
        $("#all").prop("checked", false);
        $("#php").prop("checked", false);
    })
    $(document).ready(function() {
  $("#submit_btn").on('click', function() {
    var from_date = $('#from_date').val();
    var from_parts = from_date.split('-');
    var from = from_parts[2]+'-'+from_parts[1]+'-'+from_parts[0];
    var to_date = $('#to_date').val();
    var to_parts = to_date.split('-');
    var to = to_parts[2]+'-'+to_parts[1]+'-'+to_parts[0];
    var check_type = $(".check_type:checked").map(function() {
      return $(this).val();
    }).get().join(", ");
    console.log("dates: ",from,to, check_type);
    $.ajax({
      url: "<?=base_url().'finance/get_payment_details';?>",
      method: "post",
      dataType: 'json',
      data: {
        from_date: from,
        to_date: to,
        check_type: check_type
      },
      success: function(response) {
        var walk_in = 0;
        var php = 0;
        var all =0;
        var sub_total =0;
        var discount = 0;
        var grand_total = 0;

response.forEach(function(obj) {
  if (obj.hasOwnProperty('amount')) {
    var amount_t = parseInt(obj.amount);
    sub_total += amount_t;
  }});
  response.forEach(function(obj) {
  if (obj.hasOwnProperty('discount')) {
    var discount_t = parseInt(obj.discount);
    discount += discount_t;
  }});
  response.forEach(function(obj) {
  if (obj.hasOwnProperty('gross_total')) {
    var grand_total_t = parseInt(obj.gross_total);
    grand_total += grand_total_t;
  }});
  response.forEach(function(obj) {
  if (obj.hasOwnProperty('paid_from')) {
    if(obj.paid_from == "Walk-In"){
    var walk_in_total = 1;
    walk_in += walk_in_total;
  }
  if(obj.paid_from == "php"){
    var php_total = 1;
    php += php_total;
  }  
  all = php+walk_in;
}
});
    var grand_total = sub_total-discount;
        $("#walk_in_total").text(walk_in);
        $("#php_total").text(php);
        $("#all_total").text(all);
        $("#sub_total").text(sub_total);
        $("#discount").text(discount);
        $("#grand_total").text(grand_total);
  },
  error: function(xhr, status, error) {
    // Handle error
    console.log('AJAX error:', error);
  }

    });
  });
});

</script>

