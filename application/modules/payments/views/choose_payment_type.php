<!--sidebar end-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo $patient->name; ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <?php echo $this->session->flashdata('feedback'); ?>
                                    <div class="col-lg-12">
                                        <div class="col-lg-3"></div>
                                        <a href="finance/addPaymentByPatientView?id=<?php echo $patient->id;?>&type=gen">
                                            <div class="col-lg-3">
                                                <div class="flat-carousal">
                                                    <div id="owl-demo" class="owl-carousel owl-theme owl-theme1" >
                                                       <?php echo lang('add_general_payment'); ?> <i class="fa fa-arrow-circle-o-right fa-arrow1"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="finance/addPaymentByPatientView?id=<?php echo $patient->id;?>&type=ot">
                                            <div class="col-lg-3">
                                                <div class="flat-carousal">
                                                    <div id="owl-demo" class="owl-carousel owl-theme owl-theme1" >
                                                        <?php echo lang('add_ot_payment'); ?> <i class="fa fa-arrow-circle-o-right fa-arrow1"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-lg-3"></div>
                                    </div>





                                </div>
                        </div>
                        </section>
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
