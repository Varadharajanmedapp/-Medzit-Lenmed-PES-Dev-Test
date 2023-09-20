<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                <?php echo lang('add_new_procedures'); ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">           
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <?php echo validation_errors(); ?>
                                    <form role="form" action="department/add_new_scan_types" method="post" autocomplete="off">
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"><?php echo lang('clinical_procedure_type'); ?></label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="scan_type" id="exampleInputEmail1" value='<?php
                                                if (!empty($setval)) {
                                                    echo set_value('scan_type');
                                                }
                                                if (!empty($department->scan_type)) {
                                                    echo $department->scan_type;
                                                }
                                                ?>' placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-6">
                                            </div>
                                        </div>

                                  <div class="form-group col-md-12">
                                <label for="exampleInputEmail1" class="control-label col-md-3"><?php echo lang('department'); ?></label>
                                         <div class="col-md-6">
                                <select class="form-control m-bot15" name="department" value=''>
                                    <?php foreach ($departments as $department) { ?>
                                        <option value="<?php echo $department->name; ?>" <?php
                                        if (!empty($setval)) {
                                            if ($department->name == set_value('department')) {
                                                echo 'selected';
                                            }
                                        }
                                        if (!empty($doctor->department)) {
                                            if ($department->name == $doctor->department) {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo $department->name; ?> </option>
                                            <?php } ?> 
                                </select>
                            </div>
                                        </div>
                                         <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-6">
                                            </div>
                                        </div>

                                          <div class="form-group col-md-12">
                                         <label class="control-label col-md-3"><?php echo lang('amount'); ?></label>
                                        <div class="col-md-6">
                                                <input type="text" class="form-control" name="amount" id="exampleInputEmail1" value='<?php
                                                if (!empty($setval)) {
                                                    echo set_value('amount');
                                                }
                                                if (!empty($department->amount)) {
                                                    echo $department->amount;
                                                }
                                                ?>' placeholder="">
                                            </div>
                                        </div>
                                         <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-6">
                                            </div>
                                        </div>


                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-3"><?php echo lang('description'); ?></label>
                                            <div class="col-md-6">
                                                <textarea class="ckeditor form-control" name="description" value="" rows="10"><?php
                                                    if (!empty($setval)) {
                                                        echo set_value('description');
                                                    }
                                                    if (!empty($department->description)) {
                                                        echo $department->description;
                                                    }
                                                    ?></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value='<?php
                                        if (!empty($department->id)) {
                                            echo $department->id;
                                        }
                                        ?>'>
                                        <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
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
