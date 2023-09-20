<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">
            <header class="panel-heading">
                <?php echo lang('app_user'); ?> <?php echo lang('database'); ?>
               <!--  <div class="col-md-4 no-print pull-right"> 
                    <a href="<?php echo base_url()."superadmin/addAppuser";?>">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_new'); ?>
                            </button>
                        </div>
                    </a>
                </div> -->
            </header>

            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
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
                                <?php foreach($all_appuser as  $user) { ?> 
                                   <tr>
                                        <td><?php echo $user->id; ?></td>
                                        <td><?php echo $user->name; ?></td>
                                        <td><?php echo $user->phone; ?></td>
                                        <td><?php echo $user->email; ?></td>
                                        <td>
                                            <!-- <a type="button" class="btn editbutton" href="<?php// echo base_url().'superadmin/editAppuser/'.$user->id; ?>"><i class="fa fa-edit"> </i> Edit </a> -->
                                            <a class="btn detailsbutton" style="color: #fff;" href="<?php echo base_url().'superadmin/detailsAppuser/'.$user->id; ?>"><i class="fa fa-info"></i> Info </a>
                                            <!-- <a class="btn delete_button" title="' . lang('delete') . '" href="<?php echo base_url().'superadmin/deleteAppuser/'.$user->id; ?>" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i>Delete</a> -->
                                            <a class="btn btn-info btn-xs btn_width dlt-btn delete_button" title="<?php echo lang('delete'); ?>" href="<?php echo base_url().'superadmin/deleteAppuser/'.$user->id; ?>" onclick="return confirm('Are you sure you want to delete this Users ?');"><i class="fa fa-trash"></i>Delete </a>   
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
