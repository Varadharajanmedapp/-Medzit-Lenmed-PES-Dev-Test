<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">
            <header class="panel-heading">
                <?php echo lang('speciality'); ?> <?php echo lang('database'); ?>
                <div class="col-md-4 no-print pull-right"> 
                    <a href="<?php echo base_url()."superadmin/add_specialist";?>">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_new'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header>

            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>

                                <style>
                                .img_url{
                                  height:20px;
                                  width:20px;
                                  background-size: contain; 
                                  max-height:20px;
                                  border-radius: 100px;
                                }
                                </style>  
                                <?php foreach($all_specialist as  $specialist) { ?> 
                                   <tr>
                                        <td><?php echo $specialist->id; ?></td>
                                        <td><?php echo $specialist->title; ?></td>
                                         <td > <img src="<?php echo $specialist->image; ?>" style="width: 100px;" alt="" /></td>
                                        <td><?php echo $specialist->status; ?></td>
                                        <td>
                                            <a type="button" class="btn editbutton" href="<?php echo base_url().'superadmin/edit_specialist/'.$specialist->id; ?>"><i class="fa fa-edit"> </i> Edit </a>
                                            <a class="btn detailsbutton" style="color: #fff;" href="<?php echo base_url().'superadmin/details_specialist/'.$specialist->id; ?>"><i class="fa fa-info"></i> Info </a>
                                              <a class="btn btn-info btn-xs btn_width delete_button dlt-btn" title="<?php echo lang('delete'); ?>" href="<?php echo base_url().'superadmin/delete_specialist/'.$specialist->id; ?>" onclick="return confirm('Are you sure you want to delete this Users ?');"><i class="fa fa-trash"></i>Delete </a>

                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
