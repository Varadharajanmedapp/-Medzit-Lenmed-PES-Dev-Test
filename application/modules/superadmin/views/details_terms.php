<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <section class="">
            <!-- page start-->
            <div class="row">
                <aside class="profile-nav col-lg-3">
                    <section class="panel">
                        <div class="user-heading round">
                            <a>
                                <img src="<?php echo $terms->image; ?>" alt="">
                            </a>
                            <h1><?php echo $terms->title ?></h1>
                        </div>
                    </section>
                </aside>

                <style>

                    .bio-row {
                        width: 50%;
                        float: none;
                        margin-bottom: 10px;
                        padding: 15px;
                        border: 2px solid #f1f1f1;
                    }

                    .bio-graph-info {
                        color: #89817e;
                        padding: 23px;
                    }

                </style>

                <aside class="profile-info col-lg-9">
                    <section class="panel">
                        <div class="bio-graphonboardheading">
                            <?php echo lang('terms_condition'); ?>
                        </div>
                        <div class="bio-graph-info">
                            <h1>Terms and Condition Details</h1>
                            <div class="row">
                                <div class="bio-row">
                                    <p><span><?php echo lang('title'); ?> </span>: <?php echo $terms->title; ?></p>
                                </div>

                                <div class="bio-row">
                                    <p><span><?php echo lang('description'); ?> </span>: <?php echo $terms->description; ?></p>
                                </div>  
                                <div class="bio-row">
                                    <p><span><?php echo lang('status'); ?> </span>: <?php echo $terms->status; ?></p>
                                </div>
                                <a href="<?php echo base_url().'superadmin/termsCondition'; ?>" class="btn btn-info" role="button" aria-pressed="true"><?php echo lang('back'); ?></a>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
