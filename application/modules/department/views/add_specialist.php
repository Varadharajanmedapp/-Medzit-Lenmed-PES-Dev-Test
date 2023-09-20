<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
             <?php echo lang('add_specialist'); ?>
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
                                    <form role="form" action="department/add_specialist" method="post" enctype="multipart/form-data" autocomplete="off" class="add-specialist1">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo lang('department'); ?></label>
                                        <select class="form-control m-bot15 js-example-basic-single" name="department">
                                        <?php foreach ($departments as $department) { ?>
                                        <option value="<?php echo $department->name; ?>"> <?php echo $department->name; ?> </option>
                                        <?php } ?> 
                                    </select>
                                    </div>

                                        <div class="form-group">
                                            <div class=""> 
                                                <label for="exampleInputEmail1"><?php echo "Title" ?></label>
                                                <input class="form-control" placeholder="Specialty Name" id="title" name="title" type="text" value="<?php echo set_value('title'); ?>" autocomplete="off"> 
                                            </div>
                                        </div>
                                        <div class="form-group last ">
                                        <label class="control-label"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
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
                                                        <span id="rmv_btn" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo lang('Remove'); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <section class="dept-add-spec-submit" >
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
