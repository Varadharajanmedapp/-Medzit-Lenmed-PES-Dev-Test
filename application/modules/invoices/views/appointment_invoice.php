<style type="text/css">
  body{
    margin-top:10px;
    background:#eee;    
  }
  .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
.table-bordered {
    border: 1px solid #ddd;
}
.table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
</style>
<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="row col-md-7">
            <header class="panel-heading text-center" style="color: #000 !important;">
               Appointment Invoice
            </header>
            <div class="panel-body sec-panel-body-bg">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                      <div class="col-md-10">
      <!-- col-lg-12 start here -->
      <div class="panel panel-default plain" id="dash_0">
        <!-- Start .panel -->
        <div class="panel-body p30">
          <div class="row sec-panel-body-bg">
            <!-- Start .row -->
            <div class="col-lg-6">
              <!-- col-lg-6 start here <?php echo $hospital->img_url; ?>-->
              <!-- <div class="invoice-logo"><img width="100%" src="https://dhmedzit.com/uploads/Logo_-_Digital_Hospital_Landscape.png" alt="Invoice logo"></div> -->
               <div class="invoice-logo"><img width:100%  src="uploads/Medzit-logo-2.png" alt="Invoice logo" class="Invoice-logo-img"></div>
               <!-- <img alt="" src="uploads/dashboaard-main.png"  -->
            </div>
            <!-- col-lg-6 end here -->
            <div class="col-lg-6">
              <!-- col-lg-6 start here -->
              <div class="invoice-from in-voice-from-text" >
                <ul class="list-unstyled text-right">
                  <li><?php echo $hospital->name; ?></li>
                  <?php foreach (explode(',', $hospital->address) as $address) { ?>
                  <li><?php echo $address; ?></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <!-- col-lg-6 end here -->
            <div class="col-lg-12">
              <!-- col-lg-12 start here -->
              <div class="invoice-details mt25">
                <div class="well">
                  <ul class="list-unstyled mb0">
                    <li><strong>Invoice</strong> #<?php echo $appointment->id; ?></li>
                    <li><strong>Status:</strong> <span class="label label-success"><?php echo $appointment->status=='payment_pending'?'UNPAID':'PAID'; ?></span></li>
                    <li><strong>Transaction ID:</strong> #<?php echo $appointment->transcation_id; ?></li>
                    <!-- <li><strong>Transaction Type:</strong> #<?php echo $appointment->payment_type; ?></li> -->
                    <li><strong>Transaction Type:</strong> #<?php echo $currency.' '.$appointment->amount; ?></li>

                    <li><strong>Date:</strong> #<?php echo explode(" ", $appointment->s_time . '   ' . $appointment->e_time)[0]; ?></li>
                    <li><strong>Time:</strong> #<?php echo end(explode(" ", $appointment->s_time)); ?></li>
                  </ul>
                </div>
              </div>
              <div class="invoice-to mt25">
                <ul class="list-unstyled">
                  <li><strong>Invoiced To</strong></li>
                  <li>Name    : <?php echo $patient->name; ?></li>
                  <li>Address : <?php echo $patient->address; ?></li>
                  <li>Phone   : <?php echo $patient->phone; ?></li>
                </ul>
              </div>
              <div class="invoice-items">
                <div class="table-responsive table-responsive1"  tabindex="0">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th class="per70 text-center">S.No</th>
                        <th class="per70 text-center">Appointment ID</th>
                        <th class="per70 text-center">Date</th>
                        <th class="per70 text-center">Procedure Type</th>
                        <th class="per25 text-center form-group-col">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
                        <td class="text-center">1</td>
                        <td class="text-center"><?php echo $appointment->id; ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', $appointment->date) . '<br>' . $appointment->s_time . '-' . $appointment->e_time; ?></td>
                        <td class="text-center"><?php echo $appointment->department; ?> - <?php echo $appointment->type; ?> </td>
                        <td class="text-center form-group-col" ><?php echo $currency.' '.$appointment->amount; ?></td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="3"></th>
                        <th class="text-right">Sub Total:</th>
                        <th class="text-center"><?php echo $currency.' '.$appointment->amount; ?></th>
                      </tr>
                      <tr>
                        <th colspan="3"></th>
                        <th class="text-right">Total:</th>
                        <th class="text-center"><?php echo $currency.' '.$appointment->amount; ?></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <div class="invoice-footer mt25">
                <!-- <p class="text-center">Generated on Monday, October 08th, 2015 <a href="#" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print</a></p> -->
              </div>
            </div>
            <!-- col-lg-12 end here -->
          </div>
          <!-- End .row -->
        </div>
      </div>
      <!-- End .panel -->
    </div>
    <!-- col-lg-12 end here -->
                    </div>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->

