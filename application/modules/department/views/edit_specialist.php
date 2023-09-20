<!--sidebar end-->
<!--main content start-->
<section id="main-content">
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <div class="col-md-6">
                    <i class="fa fa-gear"></i> Edit Specialist
                </div>    
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
                    <div class="col-lg-7">
                        <section class="panel--">
                            <div class="panel-body--">
                                <?php echo validation_errors();  ?>
                                <form role="form" action="<?php base_url().uri_string()?>" method="post" enctype="multipart/form-data" autocomplete="off">
                                    <div class="panel-group m-bot20" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                            <div class="edit_spclst">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('specialist_title'); ?></label>
                                                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" value='<?php echo $specialist->title; ?>' placeholder="system name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo lang('department'); ?></label>
                                                    <select class="form-control m-bot15 pos_select" id="department" name="department" value=''> 
                                                    <option value="<?php echo $specialist->department;?>"> <?php echo $specialist->department;?></option>
                                                    <?php foreach($departments as $department) {?>
                                                    <option value="<?php echo $department->name;?>"> <?php echo $department->name;?></option>
                                                    <?php }?>
                                                    </select>
                                                      
                                                 
                                                <div class="form-group">
                                                    <label for="inputstatus">Status</label>
                                                    <select class="form-control" placeholder="status" id="status" name="status" type="text" autocomplete="off">
                                                        <option <?php echo $specialist->status==''?'selected':''; ?> value="">Please select a status</option>
                                                        <option <?php echo $specialist->status=='Active'?'selected':''; ?> value="Active">Active</option>
                                                        <option <?php echo $specialist->status=='In Active'?'selected':''; ?> value="In Active">In Active</option>
                                                    </select>
                                                </div> 
                                                </div>
                                                <div class="form-group last col-md-6--">
                                                    <label class="control-label">Image</label>
                                                    <div class="">
                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="fileupload-new thumbnail dept-add-spec-fileupload1" >
                                                                <?php   if (!empty($specialist->image)) { ?>
                                                                    <img src="<?php echo $specialist->image; ?>" alt="" />   
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
                                                                <span id="rmv_btn" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo lang('Remove'); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
