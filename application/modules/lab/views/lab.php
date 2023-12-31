
<!--sidebar end-->
<!--main content start-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">
<section id="main-content">
  <section class="wrapper site-min-height">
    <!-- page start-->



    <section class="col-md-5 no-print">
      <header class="panel-heading no-print">
        <?php
        if (!empty($lab_single->id))
          echo lang('edit_lab_report');
        else
          echo lang('add_lab_report');
        ?>
      </header>
      <div class="no-print">
        <div class="adv-table editable-table ">
          <div class="clearfix">
            <style> 
              .lab{
                padding-top: 10px;
                padding-bottom: 20px;
                border: none;

              }
              .pad_bot{
                padding-bottom: 5px;
              }  

              form{
                background: #ffffff;
                padding: 20px 0px;
              }

              .modal-body form{
                background: #fff;
                padding: 21px;
              }

              .remove{
                float: right;
                margin-top: -45px;
                margin-right: 42%;
                margin-bottom: 41px;
                width: 94px;
                height: 29px;
              }

              .remove1 span{
                width: 33%;
                height: 50px !important;
                padding: 10px

              }

              .qfloww {
                padding: 10px 0px;
                height: 370px;
                background: #f1f2f9;
                overflow: auto;
              }

              .remove1 {
                background: #5A9599;
                color: #fff;
                padding: 5px;
              }


              .span2{
                padding: 6px 12px;
                font-size: 14px;
                font-weight: 400;
                line-height: 1;
                color: #555;
                text-align: center;
                background-color: #eee;
                border: 1px solid #ccc
              }

            </style>

            <form role="form" id="editLabForm" class="clearfix" action="lab/addLab" method="post" enctype="multipart/form-data">

              <div class="">
                  <div class="col-md-6 lab pad_bot">
                    <label for="exampleInputEmail1"> <?php echo lang('appointment_id'); ?></label> 
                    <select class="form-control pos_appointment" id="pos_appointment" name="appointment" value=''>  
                    <?php if (!empty($lab_single->doctor)) { ?>
                      <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - <?php echo $doctors->id; ?></option>  
                    <?php } ?>
                    </select>
                  </div>

              <div class="col-md-6 lab pad_bot">
                <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                <select class="form-control m-bot15 pos_select" id="pos_select" name="patient" value=''> 
                 <?php if (!empty($lab_single->patient)) { ?>
                  <option value="<?php echo $patients->id; ?>" selected="selected"><?php echo $patients->name; ?> - <?php echo $patients->id; ?></option>  
                <?php } ?>
              </select>
            </div> 
            <div class="col-md-6 lab pad_bot">
            <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
            <input type="text" class="form-control pay_in default-date-picker" name="date" value='<?php
            if (!empty($lab_single->date)) {
              echo date('d-m-Y', $lab_single->date);
              } else {
                echo date('d-m-Y');
              }
            ?>' placeholder="">
          </div>

            <div class="pos_client">
              <div class="col-md-8 lab pad_bot">
                <div class="col-md-3 lab_label"> 
                  <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                </div>
                <div class="col-md-9"> 
                  <input type="text" class="form-control pay_in" name="p_name" value='<?php
                  if (!empty($lab_single->p_name)) {
                    echo $lab_single->p_name;
                  }
                ?>' placeholder="">
              </div>
            </div>
            <div class="col-md-8 lab pad_bot">
              <div class="col-md-3 lab_label"> 
                <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('email'); ?></label>
              </div>
              <div class="col-md-9"> 
                <input type="text" class="form-control pay_in" name="p_email" value='<?php
                if (!empty($lab_single->p_email)) {
                  echo $lab_single->p_email;
                }
              ?>' placeholder="">
            </div>
          </div>
          <div class="col-md-8 lab pad_bot">
            <div class="col-md-3 lab_label"> 
              <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('phone'); ?></label>
            </div>
            <div class="col-md-9"> 
              <input type="text" class="form-control pay_in" name="p_phone" value='<?php
              if (!empty($lab_single->p_phone)) {
                echo $lab_single->p_phone;
              }
            ?>' placeholder="">
          </div>
        </div>
        <div class="col-md-8 lab pad_bot">
          <div class="col-md-3 lab_label"> 
            <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('age'); ?></label>
          </div>
          <div class="col-md-9"> 
            <input type="text" class="form-control pay_in" name="p_age" value='<?php
            if (!empty($lab_single->p_age)) {
              echo $lab_single->p_age;
            }
          ?>' placeholder="">
        </div>
      </div> 
      <div class="col-md-8 lab pad_bot">
        <div class="col-md-3 lab_label"> 
          <label for="exampleInputEmail1"> <?php echo lang('patient'); ?> <?php echo lang('gender'); ?></label>
        </div>
        <div class="col-md-9"> 
          <select class="form-control m-bot15" name="p_gender" value=''>

            <option value="Male" <?php
            if (!empty($patient->sex)) {
              if ($patient->sex == 'Male') {
                echo 'selected';
              }
            }
          ?> > Male </option>   
          <option value="Female" <?php
          if (!empty($patient->sex)) {
            if ($patient->sex == 'Female') {
              echo 'selected';
            }
          }
        ?> > Female </option>
        <option value="Others" <?php
        if (!empty($patient->sex)) {
          if ($patient->sex == 'Others') {
            echo 'selected';
          }
        }
      ?> > Others </option>
    </select>
  </div>
</div>
</div>

<div class="col-md-6 lab pad_bot">
  <label for="exampleInputEmail1"> <?php echo lang('refd_by_doctor'); ?></label> 
  <select class="form-control m-bot15  add_doctor" id="add_doctor" name="doctor" value=''>  
    <?php if (!empty($lab_single->doctor)) { ?>
      <option value="<?php echo $doctors->id; ?>" selected="selected"><?php echo $doctors->name; ?> - <?php echo $doctors->id; ?></option>  
    <?php } ?>
  </select>
</div>

<div class="col-md-6 lab pad_bot" style="display: none;">
  <div class="form-group last col-md-12">
    <label class="control-label">Images Upload</label>
    <div class="">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail dept-add-spec-fileupload1" >
                <?php   if (!empty($lab_single->report_image)) { ?>
                    <img src="<?php echo $lab_single->report_image; ?>" alt="" />   
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
<div class="col-md-6 lab pad_bot">
<div class="form-group last col-md-12">
    <label class="control-label">Pdf Upload</label>
    <div class="">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" style='width: 100px;height: 100px;background: url("<?php echo base_url('/assets/images/pdf-icon.png');?>");background-size: contain;background-repeat: no-repeat;'>
                <?php if (!empty($lab_single->report_pdf)) { ?>
                    <a href="<?php echo $lab_single->report_pdf; ?>" download></a>
                <?php } else { ?> 
                    <a href="javascript:void(0);"></a>
                <?php } ?>
            </div>        
            <div class="fileupload-preview fileupload-exists thumbnail dept-add-spec-fileupload" ></div>
              <div>
                <span class="btn btn-white btn-file">
                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> <?php echo lang('select'); ?> Pdf</span>
                    <span class="fileupload-exists"><i class="fa fa-undo"></i> <?php echo lang('Change'); ?></span>
                    <input type="file" class="default" name="img_url"/>
                </span>
                <a href="#" id="rmv_btn" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i><?php echo lang('Remove'); ?></a>
              </div>
        </div>

    </div>
</div>
</div>
<div class="col-md-6 lab pad_bot" style="display:none;">
  <label for="exampleInputEmail1">
    <?php echo lang('template'); ?>
  </label>
  <select class="form-control m-bot15 js-example-basic-multiple template" id="template" name="template" value=''> 
    <option value="">Select .....</option>
    <?php foreach ($templates as $template) { ?>
      <option value="<?php echo $template->id; ?>"><?php echo $template->name; ?> </option>
    <?php } ?>
  </select>
</div>

<div class="pos_doctor">
  <div class="col-md-8 lab pad_bot">
    <div class="col-md-3 lab_label"> 
      <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('name'); ?></label>
    </div>
    <div class="col-md-9"> 
      <input type="text" class="form-control pay_in" name="d_name" value='<?php
      if (!empty($lab_single->p_name)) {
        echo $lab_single->p_name;
      }
    ?>' placeholder="">
  </div>
</div>
<div class="col-md-8 lab pad_bot">
  <div class="col-md-3 lab_label"> 
    <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('email'); ?></label>
  </div>
  <div class="col-md-9"> 
    <input type="text" class="form-control pay_in" name="d_email" value='<?php
    if (!empty($lab_single->p_email)) {
      echo $lab_single->p_email;
    }
  ?>' placeholder="">
</div>
</div>
<div class="col-md-8 lab pad_bot">
  <div class="col-md-3 lab_label"> 
    <label for="exampleInputEmail1"> <?php echo lang('doctor'); ?> <?php echo lang('phone'); ?></label>
  </div>
  <div class="col-md-9"> 
    <input type="text" class="form-control pay_in" name="d_phone" value='<?php
    if (!empty($lab_single->p_phone)) {
      echo $lab_single->p_phone;
    }
  ?>' placeholder="">
</div>
</div>
</div>

<div class="col-md-8 panel">
</div>



</div>









<div class="col-md-12 lab pad_bot">
  <label for="exampleInputEmail1"> <?php echo lang('report'); ?></label>
  <textarea class="ckeditor form-control" id="editor" name="report" value="" rows="10"><?php
  if (!empty($setval)) {
    echo set_value('report');
  }
  if (!empty($lab_single->report)) {
    echo $lab_single->report;
  }
  ?>
</textarea>
</div>

<input type="hidden" name="redirect" value="<?php
if (!empty($lab_single)) {
  echo 'lab?id=' . $lab_single->id;
  } else {
    echo 'lab';
  }
?>">

<input type="hidden" name="id" value='<?php
if (!empty($lab_single->id)) {
  echo $lab_single->id;
}
?>'>


<div class="col-md-12 lab"> 
  <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
</div>

</form>
</div>
</div>
</div>



</section>









<section class="col-md-7">
  <header class="panel-heading">
    <?php echo lang('lab_report'); ?>
    <div class="col-md-4 no-print pull-right"> 
      <a href="lab/addLabView">
        <div class="btn-group pull-right">
          <button id="" class="btn green btn-xs">
            <i class="fa fa-plus-circle"></i> <?php echo lang('add_lab_report'); ?>
          </button>
        </div>
      </a>
    </div>
  </header>
  <div class="panel-body">
    <div class="adv-table editable-table ">
      <div class="space15"></div>
      <table class="table table-striped table-hover table-bordered table-row1" id="editable-sample">
        <thead>
          <tr>
            <th><?php echo lang('report_id'); ?></th>
            <th><?php echo lang('patient'); ?></th>
            <th><?php echo lang('date'); ?></th>
            <th class=""><?php echo lang('options'); ?></th>
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
            .option_th{
              width:18%;
            }

          </style>

        </tbody>
      </table>
    </div>
  </div>
</section>
<!-- page end-->
</section>
</section>
<!--main content end-->
<!--footer start-->



<script src="common/js/codearistos.min.js"></script>
<script>
  $(document).ready(function () {
    $(".flashmessage").delay(3000).fadeOut(100);
  });
</script>


<script>
  $(document).ready(function () {
    var table = $('#editable-sample').DataTable({
      responsive: true,

      "processing": true,
      "serverSide": true,
      "searchable": true,
      "ajax": {
        url: "lab/getLab",
        type: 'POST',
      },
      scroller: {
        loadingIndicator: true
      },

      dom: "<'row'<'col-sm-3'l><'col-sm-5 text-center'B><'col-sm-4'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5',
      {
        extend: 'print',
        exportOptions: {
          columns: [0, 1, 2],
        }
      },
      ],

      aLengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"]
      ],
      iDisplayLength: 100,
      "order": [[0, "desc"]],

      "language": {
        "lengthMenu": "_MENU_",
        search: "_INPUT_",
        searchPlaceholder: "Search..."
      }
    });
    table.buttons().container().appendTo('.custom_buttons');
  });
</script>





<script>
  $(document).ready(function () {
    $('.pos_client').hide();
    $(document.body).on('change', '#pos_select', function () {

      var v = $("select.pos_select option:selected").val()
      if (v == 'add_new') {
        $('.pos_client').show();
      } else {
        $('.pos_client').hide();
      }
    });

  });


</script>

<script>
  $(document).ready(function () {
    $('.pos_doctor').hide();
    $(document.body).on('change', '#add_doctor', function () {

      var v = $("select.add_doctor option:selected").val()
      if (v == 'add_new') {
        $('.pos_doctor').show();
      } else {
        $('.pos_doctor').hide();
      }
    });

  });


</script>



<script type="text/javascript">
  $(document).ready(function () {
    $(document.body).on('change', '#template', function () {
      var iid = $("select.template option:selected").val();
      $.ajax({
        url: 'lab/getTemplateByIdByJason?id=' + iid,
        method: 'GET',
        data: '',
        dataType: 'json',
      }).success(function (response) {
        var data = CKEDITOR.instances.editor.getData();
        if (response.template.template != null) {
          var data1 = data + response.template.template;
        } else {
          var data1 = data;
        }
        CKEDITOR.instances['editor'].setData(data1)
      });
    });
  });
</script>
<script>
  $(document).ready(function () {
    $("#pos_select").select2({
      placeholder: '<?php echo lang('select_patient'); ?>',
      allowClear: true,
      ajax: {
        url: 'patient/getPatientinfoWithAddNewOption',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
                        searchTerm: params.term // search term
                      };
                    },
                    processResults: function (response) {
                      return {
                        results: response
                      };
                    },
                    cache: true
                  }

                });

    $("#add_doctor").select2({
      placeholder: '<?php echo lang('select_doctor'); ?>',
      allowClear: true,
      ajax: {
        url: 'doctor/getDoctorWithAddNewOption',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
                        searchTerm: params.term // search term
                      };
                    },
                    processResults: function (response) {
                      return {
                        results: response
                      };
                    },
                    cache: true
                  }

                });


  $("#pos_appointment").select2({
            placeholder: '<?php echo lang('select_appointment'); ?>',
            // console.log('sample');
            allowClear: true,
            ajax: {
                url: 'doctor/getDocWithAddNewOption',
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });

        $("#pos_appointment").on('change', function(e) {
          var appointment_id = $(this).select2('data').find(item => item.element.selected).id;
          $.ajax({
            url: 'lab/getappoitment/'+appointment_id,
            type: "GET",
            success:function(data) {
              data = JSON.parse(data);
              $('select[name="doctor"]').empty();
              $('select[name="doctor"]').append('<option selected value="'+ data.doctor +'">'+ data.doctorname +'</option>');

              var a = new Date(data.date * 1000);
              var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
              var year = a.getFullYear();
              var month = months[a.getMonth()];
              var date = a.getDate();
              var time = date + ' ' + month + ' ' + year;
              $('#date_time').val(time);
              $('select[name="patient"]').empty();
              $('select[name="patient"]').append('<option selected value="'+ data.patient +'">'+ data.patientname +'</option>');
              $('input[name="type"]').val(data.type);
              
              // $('select[name="appointment"]').empty();
              // $.each(data, function(key, value) {
                // $('select[name="appointment"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
              // });
            }
          });
        });
     
  });
</script>
