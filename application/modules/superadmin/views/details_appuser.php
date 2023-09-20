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
                                <img src="<?php echo $appuser->img_url; ?>" alt="">
                            </a>
                            <h1><?php echo $appuser->user_name ?></h1>
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
                            <?php echo lang('app_user'); ?>
                        </div>
                        <div class="bio-graph-info">
                            <h1>Application users Details</h1>
                            <div class="row">
                                <div class="bio-row">
                                    <p><span><?php echo lang('name'); ?> </span>: <?php echo $appuser->name; ?></p>
                                </div>

                                <div class="bio-row">
                                    <p><span><?php echo lang('phone'); ?> </span>: <?php echo $appuser->phone; ?></p>
                                </div>  
                                <div class="bio-row">
                                    <p><span><?php echo lang('email'); ?> </span>: <?php echo $appuser->email; ?></p>
                                </div>
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
