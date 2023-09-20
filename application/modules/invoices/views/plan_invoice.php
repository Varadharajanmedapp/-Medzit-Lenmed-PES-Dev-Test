<style type="text/css">
  body{
    margin-top:10px;
    background:#eee;    
  }
  .table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    border-collapse: collapse;
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
            <header class="panel-heading text-center">
               Patient plan Invoice
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                      <div class="col-md-10">
      <!-- col-lg-12 start here -->
      <div class="panel panel-default plain" id="dash_0">
        <!-- Start .panel -->
        <div class="panel-body p30">
          <div class="row">
            <!-- Start .row -->
            <div class="col-lg-6">
              <!-- col-lg-6 start here -->
              <div class="invoice-logo"><img width="100%" src="uploads/medappdynamics.png" alt="Invoice logo"></div>
            </div>
            <!-- col-lg-6 end here -->
            <div class="col-lg-6">
              <!-- col-lg-6 start here -->
              <div class="invoice-from">
                <ul class="list-unstyled text-right">
                  <li>MedZit</li>
                  <li>11 East Coast Road</li>
                  <li>Kanathur</li>
                  <li>Chennai 603112</li>
                  <li>INDIA</li>
                </ul>
              </div>
            </div>
            <!-- col-lg-6 end here -->
            <div class="col-lg-12">
              <!-- col-lg-12 start here -->
              <div class="invoice-details mt25">
                <div class="well">
                  <ul class="list-unstyled mb0">
                    <li><strong>Invoice</strong> #<?php echo $invoice->id; ?></li>
                    <!-- <li><strong>Invoice Date:</strong> Monday, October 10th, 2015</li> -->
                    <!-- <li><strong>Due Date:</strong> Thursday, December 1th, 2015</li> -->
                    <li><strong>Status:</strong> <span class="label label-success"><?php echo $invoice->plan==''?'UNPAID':'PAID'; ?></span></li>
                  </ul>
                </div>
              </div>
              <div class="invoice-to mt25">
                <ul class="list-unstyled">
                  <li><strong>Invoiced To</strong></li>
                  <li>Name    : <?php echo $invoice->name; ?></li>
                  <li>Address : <?php echo $invoice->address; ?></li>
                  <li>Phone   : <?php echo $invoice->phone; ?></li>
                </ul>
              </div>
              <div class="invoice-items">
                <div class="table-responsive table-responsive1" tabindex="0">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th class="per70 text-center">Description</th>
                        <th class="per70 text-center">Plan Expiry</th>
                        <th class="per5 text-center">Qty</th>
                        <th class="per25 text-center form-group-col" >Total</th>
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
                        <td><?php echo $invoice->plan; ?></td>
                        <td class="text-center"><?php echo $invoice->plan_expiry; ?></td>
                        <td class="text-center">1</td>
                        <td class="text-center form-group-col" ><?php echo $currency.' '.$invoice->plan_amount; ?></td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="2"></th>
                        <th class="text-right">Sub Total:</th>
                        <th class="text-center"><?php echo $currency.' '.$invoice->plan_amount; ?></th>
                      </tr>
                      <tr>
                        <th colspan="2"></th>
                        <th class="text-right">Total:</th>
                        <th class="text-center"><?php echo $currency.' '.$invoice->plan_amount; ?></th>
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

