<!--sidebar end-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="case_manager col-md-12">
            <header class="panel-heading">
            <div class="col-md-6">
                <i><img alt="" src="uploads/case-manager-main.png"  class="doc-list-doc-img" ></i> <?php echo lang('all'); ?> <?php echo lang('case'); ?>
            </div>
            <div class="col-md-6 no-print pull-right"> 
                    <a data-toggle="modal" href="#myModal">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('add_new'); ?>
                            </button>
                        </div>
                    </a>
                </div>
            </header> 
            <div class="panel-body"> 
                <div class="adv-table editable-table">
                    <table class="table table-striped table-hover table-bordered table-row1" id="editable-sample" >
                        <thead>
                            <tr>
                                <th class="all-case-tab"><?php echo lang('date'); ?></th>
                                <th class="all-case-tab1"><?php echo lang('patient'); ?></th>
                                <th class="all-case-tab1">Institutions</th>
                                <th class="all-case-tab1">Department</th>
                                <th class="all-case-tab1">Specialty</th>
                                <th class="all-case-tab1">Specialists</th>
                                <th class="all-case-tab1">Description</th>
                                <th class="all-case-tab1">Chronic Conditions</th>
                                <th class="all-case-tab1">Consultation</th>
                                <th class="all-case-tab1">Case Status</th>
                                <th class="all-case-tab1">Reason</th>
                                <th class="all-case-tab1">Referred By</th>
                                <th class="no-print all-case-tab"><?php echo lang('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
  
    <!-- page end-->
</section>
</section>
<!--main content end-->

<!-- Add Department Modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('add'); ?> <?php echo lang('case'); ?> </h4>
            </div> 
            <div class="modal-body row">
                <form role="form" action="patient/addMedicalHistory" class="clearfix" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                        <select class="form-control m-bot15" id="patientchoose" name="patient_id" value=''>

                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Institutions<sup>*</sup></label>
                        <input type="text" class="form-control" name="institutions" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('department'); ?><sup>*</sup></label>
                        <select class="form-control m-bot15 js-example-basic-single" id="department" name="department" value=''>
                            <option>Select Department</option>
                            <?php foreach ($departments as $department) { ?>
                                <option value="<?php echo $department->name; ?>"> <?php echo $department->name; ?> </option>
                            <?php } ?> 
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('specialist'); ?><sup>*</sup></label>
                        <select class="form-control m-bot15 js-example-basic-single" id="specialtydoctor" name="specialtydoctor">
                            <option>List of Hospital Doctors</option>
                        </select>
                    </div>
                    <!-- <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('profile'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="profile" id="exampleInputEmail1" value='' placeholder="">
                    </div> -->
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('Specialists'); ?><sup>*</sup></label>
                        <select class="form-control m-bot15 js-example-basic-single" id="specialist" name="specialist">
                            
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('description'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="description" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('chronic_conditions'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="chronic_conditions" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('consultation'); ?><sup>*</sup></label>
                        <select class="form-control m-bot15 js-example-basic-single" id="consultation" name="consultation">
                            <option>Select one</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('case'); ?> <?php echo lang('status'); ?><sup>*</sup></label>
                        <select class="form-control m-bot15 js-example-basic-single" id="case_status" name="case_status">
                            <option>Select One</option>
                            <option>pending</option>
                            <option>confirmed</option>
                            <option>rescheduled</option>
                            <option>canceled</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('reason'); ?><sup>*</sup></label>
                        <input type="text" class="form-control" name="reason" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('referred'); ?> By<sup>*</sup></label>
                        <input type="text" class="form-control" name="referred" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group last col-md-6">
                    <label class="control-label"><?php echo lang('image'); ?><?php echo lang('upload'); ?></label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail dept-add-spec-fileupload1" >
                                    <img src="//www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
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
                    <div class="form-group last col-md-6">
                        <label for="UploadSignature_image--"><?php echo lang('signature'); ?></label>
                        <div id="case_signature_preview" class="form-group">                            
                            <img src="./uploads/user_signatures/<?php echo $get_signature->user_sign;?>" class="sign_image--" id="--sign_image" alt="user sign" srcset="">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" name="submit" class="btn btn-info pull-right"><?php echo lang('submit'); ?></button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Add Department Modal-->

<!-- Edit Department Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">  <?php echo lang('edit_medical_history'); ?></h4>
            </div>
            <div class="modal-body row">
                <form role="form" id="medical_historyEditForm" class="clearfix" action="patient/addMedicalHistory" method="post" enctype="multipart/form-data">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('date'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                        <select class="form-control m-bot15 patient" id="patientchoose1" name="patient_id" value=''>

                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('title'); ?></label>
                        <input type="text" class="form-control form-control-inline input-medium" name="title" id="exampleInputEmail1" value='' placeholder="">
                    </div>
                    <div class="form-group col-md-12">
                        <label class=""><?php echo lang('description'); ?></label>
                        <div class="">
                            <textarea class="ckeditor form-control editor" id="editor" name="description" value="" rows="10"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value=''>
                    <input type="hidden" name="redirect" value='patient/caseList'>
                    <div class="col-md-12">
                        <button type="submit" name="submit" class="btn btn-info submit_button pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="caseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close no-print" data-dismiss="modal" aria-hidden="true">×</button>
              
                <h4 class="modal-title">  <?php echo lang('case'); ?> <?php echo lang('details'); ?></h4>
            </div>
            <div class="modal-body row" >
                <form role="form" id="medical_historyEditForm" class="clearfix" action="patient/addMedicalHistory" method="post" enctype="multipart/form-data">
                <div class=""id="print_div">    
                <div class="form-group col-md-12 row">
                        <div class="form-group col-md-6 case_date_block">
                            <label for="exampleInputEmail1"><?php echo lang('case'); ?> <?php echo lang('creation'); ?> <?php echo lang('date'); ?></label>
                            <div class="case_date" id="case_creation_date"></div>
                        </div>
                        <div class="form-group col-md-6 case_patient_block">
                            <label for="exampleInputEmail1"><?php echo lang('patient'); ?></label>
                            <div class="case_patient" id="case_patient"></div>
                            <div class="case_patient_id" id="case_patient_id"></div>
                        </div> 
                        <div>
                            <hr>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"><?php echo lang('title'); ?> </label>
                        <div class="case_title" id="institute_name"> </div>
                        <hr>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1"> <?php echo lang('details'); ?></label>
                        <div class="case_details" id="case_details"></div>
                        <hr>
                    </div>


                    <div class="panel col-md-12">
                        <h5 class="pull-right" id="address">
                            <?php echo $settings->title . '<br>' . $settings->address; ?>
                        </h5>
                    </div>

                    </div>
                    <div class="panel col-md-12 no-print">
                        <a class="btn btn-info invoice_button pull-right" id="print_btn" ><i class="fa fa-print"></i> <?php echo lang('print'); ?> </a>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<style>

    @media print {

        .modal-content{
            width: 100%;
        }


        .modal{
            overflow: hidden;
        }

        .case_date_block{
            width: 50%;
            float: left;
        }

        .case_patient_block{
            width: 50%;
            float: left;
        }

    }
</style>

<script>
    var print_btn = document.getElementById('print_btn');
    print_btn.onclick= function()
    {
        var case_creation_date = document.getElementById("case_creation_date").innerHTML;
        var case_patient = document.getElementById("case_patient").innerHTML;
        var case_patient_id = document.getElementById("case_patient_id").innerHTML;
        var institute_name = document.getElementById("institute_name").innerHTML;
        var case_details = document.getElementById("case_details").innerHTML;
        var address = document.getElementById("address").innerHTML;  
        var mywindow = window.open('', 'PRINT', 'height=3508,width=2480');
        mywindow.document.write('<html><head><title>' +"Case Detail"+ '</title>');
        mywindow.document.write('<style>*{font-family:open sans;}#heading{text-align:center; background-color:green; color:white; padding:1rem;}')
        mywindow.document.write('table{width:100%; line-height:2rem;}');
        mywindow.document.write('tr{width:100%;}');
        mywindow.document.write('th{text-align:left; font-weight-bold; font-size:125%;}');
        mywindow.document.write('td{text-align:left;} .content{font-size:110%; font-weight:bold;}');
        mywindow.document.write('</style>');  
        mywindow.document.write('</head><body>');
        mywindow.document.write('<h3 id="heading">Case Detail</h3>');
        mywindow.document.write('<div>');
        mywindow.document.write('<table><thead><tr><th><h4>Case Creation Date</h4>');
        mywindow.document.write('</th><th><h4>Patient</h4></th></tr></thead>');
        mywindow.document.write('<tbody><tr><td>'+case_creation_date+'</td><td>'+case_patient+'<br>'+case_patient_id+'</td></tr>');
        mywindow.document.write('</table>');
        mywindow.document.write('<hr>');
        mywindow.document.write('<h3>Name of Institute</h3>');
        mywindow.document.write('<span class="content">'+institute_name+'</span>');
        mywindow.document.write('<hr>');
        mywindow.document.write('<h3>Details</h3>');
        mywindow.document.write('<span class="content">'+case_details+'</span>');
        mywindow.document.write('<hr>');
        mywindow.document.write('<h3>'+address+'</h3>');
        mywindow.document.write('<hr>');
        mywindow.document.write('</div>')
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();

    }
</script>
<?php
$current_user = $this->ion_auth->get_user_id();
if ($this->ion_auth->in_group('Doctor')) {
    $doctor_id = $this->db->get_where('doctor', array('ion_user_id' => $current_user))->row()->id;
}
?>
<script src="common/js/codearistos.min.js"></script>
<script type="text/javascript">
$(".table").on("click", ".editbutton", function () {
    // Get the record's ID via attribute  
    var iid = $(this).attr('data-id');

    $.ajax({
        url: 'patient/editMedicalHistoryByJason?id=' + iid,
        method: 'GET',
        data: '',
        dataType: 'json',
    }).success(function (response) {
        // Populate the form fields with the data returned from server
        var de = response.medical_history.date * 1000;
        var d = new Date(de);
        var da = d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear();
        $('#medical_historyEditForm').find('[name="id"]').val(response.medical_history.id).end()
        $('#medical_historyEditForm').find('[name="date"]').val(da).end()
        //   $('#medical_historyEditForm').find('[name="patient"]').val(response.medical_history.patient_id).end()
        $('#medical_historyEditForm').find('[name="title"]').val(response.medical_history.title).end()
        CKEDITOR.instances['editor'].setData(response.medical_history.description)
        var option = new Option(response.patient.name + '-' + response.patient.id, response.patient.id, true, true);
        $('#medical_historyEditForm').find('[name="patient_id"]').append(option).trigger('change');
        //   $('.js-example-basic-single.patient').val(response.medical_history.patient_id).trigger('change');

        $('#myModal2').modal('show');

    });
});
</script>

<script type="text/javascript">
    $(".table").on("click", ".case", function () {
        // Get the record's ID via attribute  
        var iid = $(this).attr('data-id');

        $('.case_date').html("").end()
        $('.case_details').html("").end()
        $('.case_title').html("").end()
        $('.case_patient').html("").end()
        $('.case_patient_id').html("").end()
        $.ajax({
            url: 'patient/getCaseDetailsByJason?id=' + iid,
            method: 'GET',
            data: '',
            dataType: 'json',
        }).success(function (response) {
            // Populate the form fields with the data returned from server
            var de = response.case.date * 1000;
            var d = new Date(de);
            var monthNames = [
                "January", "February", "March",
                "April", "May", "June", "July",
                "August", "September", "October",
                "November", "December"
            ];
            var day = d.getDate();
            var monthIndex = d.getMonth();
            var year = d.getFullYear();
            var da = day + ' ' + monthNames[monthIndex] + ', ' + year;
            $('.case_date').append(da).end()
            $('.case_patient').append(response.patient.name).end()
            $('.case_patient_id').append('ID: ' + response.patient.id).end()
            $('.case_title').append(response.case.title).end()
            $('.case_details').append(response.case.description).end()
            $('#caseModal').modal('show');

        });
    });
</script>

<script>
$(document).ready(function () {
    var table = $('#editable-sample').DataTable({
        responsive: true,
        //   dom: 'lfrBtip',

        "processing": true,
        "serverSide": true,
        "searchable": true,
        "ajax": {
            url: "patient/getCaseList",
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
            "url": "common/assets/DataTables/languages/<?php echo $this->language; ?>.json"
        },
    });

    table.buttons().container()
            .appendTo('.custom_buttons');
});

</script>
<script>
    $(document).ready(function () {
        $("#patientchoose").select2({
            placeholder: '<?php echo lang('select_patient'); ?>',
            allowClear: true,
            ajax: {
                url: 'patient/getPatientinfo',
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
        $("#patientchoose1").select2({
            placeholder: '<?php echo lang('select_patient'); ?>',
            allowClear: true,
            ajax: {
                url: 'patient/getPatientinfo',
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
    });
    /*  */
    $(document).ready(function(){
   $("#department").change(function(){
      var department = $(this).val();
    console.log(department); 
        if(department!=""){
        $.ajax({
            url:"<?php echo base_url('patient/specialistFromDepartment')?>",
            method:"post",
            dataType: 'json',
            data:{department:department},
            success:function(data){
        html = '<option value="">Select Sepcialist</option>';
        $.each(data, function (key, val) 
        {
       /*  console.log(val.category);  */
        html += '<option value="'+val.category+'">'+val.category+'</option>';
     });
                      $("#specialist").html(html);
                   }
                 });
                }
          else{
                 $("#specialist").html('<option value="">Select Specialist</option>');
                      }
                  });
            });
</script>
<script>
     $(document).ready(function(){
   $("#department").change(function(){
      var department = $(this).val();
    console.log(department); 
        if(department!=""){
        $.ajax({
            url:"<?php echo base_url('patient/specialistDoctorFromDepartment')?>",
            method:"post",
            dataType: 'json',
            data:{department:department},
            success:function(data){
        html = '<option value="">List of Hospital Specialists</option>';
        $.each(data, function (key, val) 
        {
        console.log(val.name); 
        html += '<option value="'+val.name+'">'+val.name+'</option>';
     });
                      $("#specialtydoctor").html(html);
                   }
                 });
                }
          else{
                 $("#specialtydoctor").html('<option value="">Select Specialist</option>');
                      }
                  });
            }); 
</script>
<script>
    $(document).ready(function () {
        $(".flashmessage").delay(3000).fadeOut(100);
    });
</script>
