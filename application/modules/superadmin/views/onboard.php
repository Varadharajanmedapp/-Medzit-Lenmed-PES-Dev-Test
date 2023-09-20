<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="">
            <header class="panel-heading">
                <div class="col-md-6">
                <?php echo "Login Banner List";?>
                </div>
                <div class="col-md-6 no-print pull-right"> 
                    <a href="<?php echo base_url()."superadmin/addOnboard";?>">
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
                                    <th>Slogans</th>
                                    <th>Status</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>

                                <style>
                                .img_url{
                                  height:30px;
                                  width:30px;
                                  background-size: contain; 
                                  max-height:30px;
                                  border-radius: 100px;
                                }
                                </style>  
                                <?php foreach($all_onboard as  $onboard) { ?> 
                                   <tr>
                                        <td><?php echo $onboard->id; ?></td>
                                        <td><?php echo $onboard->title; ?></td>
                                        <td><img class="img_url" src="<?php echo $onboard->images;?>"></td>
                                        <td><?php echo $onboard->slogans; ?></td>
                                        <td><?php echo $onboard->status; ?></td>
                                        <td>
                                            <a type="button" class="btn editbutton" href="<?php echo base_url().'superadmin/editOnboard/'.$onboard->id; ?>"><i class="fa fa-edit"> </i> Edit </a>
                                            <a class="btn detailsbutton" style="color: #fff;" href="<?php echo base_url().'superadmin/detailsOnboard/'.$onboard->id; ?>"><i class="fa fa-info"></i> Info </a>
                                            <a class="btn dlt-btn delete_button" title="' . lang('delete') . '" href="<?php echo base_url().'superadmin/deleteOnboard/'.$onboard->id; ?>" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-trash"></i>Delete</a>   
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
