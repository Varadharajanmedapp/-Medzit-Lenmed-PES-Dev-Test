<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">
            <header class="panel-heading">
                <?php echo lang('app_doctor'); ?> <?php echo lang('database'); ?>
              
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
                                    <th>Department</th>
                                    <th>Profile</th>
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
                                <?php foreach($all_appdoctor as  $doctor) { ?> 
                                   <tr>
                                        <td><?php echo $doctor->id; ?></td>
                                        <td><?php echo $doctor->name; ?></td>
                                        <td><?php echo $doctor->phone; ?></td>
                                        <td><?php echo $doctor->email; ?></td>
                                        <td><?php echo $doctor->department; ?></td>
                                        <td><?php echo $doctor->profile; ?></td>
                                        <td><?php echo $doctor->status; ?></td>
                                        <td>
                                           <!--  <a type="button" class="btn editbutton" href="<?php //echo base_url().'superadmin/editAppdoctor/'.$doctor->id; ?>"><i class="fa fa-edit"> </i> Edit </a> -->
                                            <a class="btn detailsbutton" style="color: #fff;" href="<?php echo base_url().'superadmin/detailsAppdoctor/'.$doctor->id; ?>"><i class="fa fa-info"></i> Info </a>
                                            <a class="btn btn-info btn-xs btn_width dlt-btn delete_button" title="<?php echo lang('delete'); ?>" href="<?php echo base_url().'superadmin/deleteAppdoctor/'.$doctor->id; ?>" onclick="return confirm('Are you sure you want to delete this Users ?');"><i class="fa fa-trash"></i>Delete </a>    
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
