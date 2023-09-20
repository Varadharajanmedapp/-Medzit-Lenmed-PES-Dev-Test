<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <i class="fa fa-gear"></i> Edit Terms and Conditions
            </header>


            <style>

                form {
                    border: 0px solid #ccc; 
                    padding: 0px;
                }

                .panel-default > .panel-heading {
                    background-color: #f1f1f1 !important;
                }

                .panel-default>.panel-heading+.panel-collapse .panel-body {
                    border-top-color: #ddd;
                    background: #f9f9f9;
                }

            </style>


            <div class="panel-body">
                <div class="clearfix">
                    <div class="col-lg-12">
                        <section class="panel">
                            <div class="panel-body">
                                <?php echo validation_errors(); ?>
                                <form role="form" action="<?php base_url().uri_string()?>" method="post" enctype="multipart/form-data">
                                    <div class="panel-group m-bot20" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('title'); ?></label>
                                                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='<?php echo $terms->title; ?>' placeholder="system name">
                                                </div>
                                                <div class="form-group">
                                                    <div class=""> 
                                                        <label for="exampleInputEmail1"><?php echo lang('description'); ?></label>
                                                        <textarea class="form-control" rows="5"placeholder="Description" id="description" name="description" style="background: #fff;"><?php echo $terms->description; ?></textarea>
                                                    </div>
                                                </div>   
                                                <div class="form-group">
                                                    <label for="inputstatus">Status</label>
                                                    <select class="form-control" placeholder="status" id="status" name="status" type="text" autocomplete="off">
                                                        <option <?php echo $terms->status==''?'selected':''; ?> value="">Please select a status</option>
                                                        <option <?php echo $terms->status=='Active'?'selected':''; ?> value="Active">Active</option>
                                                        <option <?php echo $terms->status=='In Active'?'selected':''; ?> value="In Active">In Active</option>
                                                    </select>
                                                </div>
                                                <div class="form-group last col-md-6">
                                                <label class="control-label"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
                                                    <div class="">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="fileupload-new thumbnail dept-add-spec-fileupload1" >
                                                                <?php if (!empty($terms->image)) { ?>
                                                                    <img src="<?php echo $terms->image; ?>" alt="" />   
                                                                <?php } else { ?> 
                                                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                                <?php } ?>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- page end-->
</section>
</section>
<!--main content end-->
<!--footer start-->
