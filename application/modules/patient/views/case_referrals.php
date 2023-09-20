<!--sidebar end-->
<link rel="stylesheet" href="common/css/newGui.css" type="text/css" media="all">

<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="case_manager col-md-12">
            <header class="panel-heading">
            <div class="col-md-6">
                <i><img alt="" src="uploads/case-manager-main.png"  class="doc-list-doc-img" ></i> <?php echo lang('all'); ?> <?php echo lang('case'); ?> <?php echo lang('referrals'); ?>
            </div>
            <div class="col-md-6 no-print pull-right"> 
                    <a data-toggle="modal" href="#myModal2">
                        <div class="btn-group pull-right">
                            <button id="" class="btn green btn-xs">
                                <i class="fa fa-plus-circle"></i> <?php echo lang('referrals'); ?>
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
                                <th class="all-case-tab1"><?php echo lang('patient'); ?> ID</th>
                                <th class="all-case-tab1">Patient Name</th>
                                <th class="all-case-tab1">Case ID</th>
                                <th class="all-case-tab1">Referred By</th>
                                <th class="all-case-tab1">Referred to</th>
                                <th class="all-case-tab1">Specialty</th>
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

<!-- Edit Department Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><?php echo lang('view'); ?> <?php echo lang('referrals'); ?> <?php echo lang('case'); ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" id="medical_historyEditForm" class="clearfix" action="patient/addMedicalHistory" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group">
                    <div class ="col-md-3 p0">
                        <div class="referral_case_frm">
                            <label for="exampleInputEmail1"><?php echo lang('created'); ?> <?php echo lang('date'); ?></label>
                            <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 p0">
                            <div class="referral_case_frm">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?> ID</label>
                                <input type="text" class="form-control form-control-inline input-medium" name="patient_id" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 p0">
                            <div class="referral_case_frm">
                                <label for="exampleInputEmail1"><?php echo lang('patient'); ?> <?php echo lang('name'); ?></label>
                                <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="name" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 p0">
                            <div class="referral_case_frm">
                                <label for="exampleInputEmail1"><?php echo lang('payments'); ?> <?php echo lang('method'); ?></label>
                                <select class="form-control  patient" id="patientchoose1" name="patient_id" value=''>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-20">
                    <div class="form-group">
                    <div class ="col-md-3 p0">
                        <div class="referral_case_frm">
                            <label for="exampleInputEmail1"><?php echo lang('case'); ?> ID</label>
                            <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 p0">
                            <div class="referral_case_frm">
                                <label for="exampleInputEmail1"><?php echo lang('referred'); ?> By</label>
                                <input type="text" class="form-control form-control-inline input-medium" name="patient_id" id="exampleInputEmail1" value='' placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 p0">
                            <div class="referral_case_frm">
                            <img src="./uploads/exclamation-mark.png" alt="alert" />
                                <label for="exampleInputEmail1"><?php echo lang('view'); ?> GP <?php echo lang('profile'); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group">
                    <div class ="col-md-3 p0">
                        <div class="referral_case_textarea">
                            <label for="exampleInputEmail1"><?php echo lang('description'); ?></label>
                            <textarea class="form-control textarea_frmcntrl" id="" name="description" value="" rows="10"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 p0">
                            <div class="referral_case_textarea">
                                <label for="exampleInputEmail1"><?php echo lang('chronic_conditions'); ?></label>
                                <textarea class="form-control textarea_frmcntrl" id="" name="description" value="" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 p0">
                            <div class="referral_case_textarea">
                                <label for="exampleInputEmail1"><?php echo lang('case'); ?> <?php echo lang('attachments'); ?></label>
                                <textarea class="form-control textarea_frmcntrl" id="" name="description" value="" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3 p0">
                            <div class="referral_case_textarea">                           
                                <label for="exampleInputEmail1"><?php echo lang('view'); ?> <?php echo lang('referrals'); ?> <?php echo lang('letter'); ?></label>
                                <textarea class="form-control textarea_frmcntrl" id="" name="description" value="" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="form-group">
                            <div class ="col-md-4 p0">
                                <div class="referral_case_frm">
                                    <label for="exampleInputEmail1"><?php echo lang('referred'); ?> to</label>
                                    <input type="text" class="form-control form-control-inline input-medium" name="referred_to" id="exampleInputEmail1" value='' placeholder="">
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 p0">
                                    <div class="referral_case_frm">
                                        <label for="exampleInputEmail1"><?php echo lang('institutions'); ?></label>
                                        <input type="text" class="form-control form-control-inline input-medium" name="patient_id" id="exampleInputEmail1" value='' placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 p0">
                                    <div class="case_dropfrm">
                                    
                                        <select class="form-control">
                                        <option>Case Status</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                            <div class ="col-md-4 p0">
                                <div class="referral_case_frm">
                                    <label for="exampleInputEmail1"><?php echo lang('speciality'); ?></label>
                                    <input type="text" class="form-control form-control-inline input-medium" name="date" id="exampleInputEmail1" value='' placeholder="">
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 p0">
                                    <div class="referral_case_frm">
                                        <label for="exampleInputEmail1"><?php echo lang('schedule'); ?> <?php echo lang('date'); ?></label>
                                        <input type="text" class="form-control form-control-inline input-medium default-date-picker" name="date" id="exampleInputEmail1" value='' placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 p0">
                                    <div class="referral_case_frm">
                                        <label for="exampleInputEmail1"><?php echo lang('time'); ?></label>
                                        <input type="time" class="form-control form-control-inline input-medium" name="schedule_date" id="exampleInputEmail1" value='' placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                                <div class="feedback_box">
                                    <label for="exampleInputEmail1"><?php echo lang('feedback'); ?></label>
                                    <textarea class="form-control textarea_frmcntrl-02" id="" name="description" value="" rows="10"></textarea>
                                </div>
                        </div>
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
    </div><!-- end edit modal-dialog -->
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
        // "serverSide": true,
        "searchable": true,
        // "ajax": {
        //     url: "patient/",
        //     type: 'POST',
        // },
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
