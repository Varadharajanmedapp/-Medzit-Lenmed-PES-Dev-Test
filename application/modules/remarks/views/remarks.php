<!--sidebar end-->
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->
    <section class="panel">
      <header class="panel-heading">
        <?php echo lang('remarks'); ?>
      </header>
      <div class="panel-body">
        <div class="adv-table editable-table ">
          <div class="space15"></div>
          <table class="table table-striped table-hover table-bordered" id="editable-sample">
            <thead>
              <tr>
                <th><?php echo lang('serial_number'); ?></th>
                <th><?php echo lang('remark'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($remarks as $remark) { ?>
                <tr>
                  <td> <?php echo $i++; ?></td>
                  <td><?php echo $remark->remarks; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- page end-->
  </section>
</section>
<!--main content end-->