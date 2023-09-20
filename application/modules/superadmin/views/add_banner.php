<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
             <?php echo lang('add_banner'); ?>
            </header>
            <div class="panel-body col-md-7">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="col-lg-12">
                                            <?php echo validation_errors(); ?>                                   
                                    </div>
                                    <form role="form" action="superadmin/add_banner" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class=""> 
                                                <label for="exampleInputEmail1"><?php echo lang('banner_name'); ?></label>
                                                <input class="form-control" placeholder="Banner Title" id="title" name="title" type="text" value="<?php echo set_value('title'); ?>" autocomplete="off"> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <div> 
                                            <label for="category"><?php echo lang('category'); ?></label>
                                            <select class="form-control" id="category" name="category">
                                              <option disabled value="">Select Category</option>
                                              <option value="doctor">Doctor</option>
                                              <option value="patient">Patient</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <div class=""> 
                                                <label for="exampleInputEmail1"><?php echo lang('banner_url'); ?></label>
                                                <input class="form-control" placeholder="Banner Url" id="url" name="url" type="text" value="<?php echo set_value('url'); ?>" autocomplete="off"> 
                                            </div>
                                        </div>

                                        <div class="form-group last ">
                                            <label class="control-label">Banner Image</label>
                                            <div class="">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail dept-add-spec-fileupload1" >
                                                        <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" id="img" alt="" />
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
                                        <section class="super-admin-submit" >
                                            <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                        </section>
                                    </form>
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
