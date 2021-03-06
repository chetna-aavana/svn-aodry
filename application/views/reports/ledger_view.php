<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layout/header');
?>
<style type="text/css">.cwhite{color: white!important;}</style>
<div class="content-wrapper">
    <section class="content-header">
        <h5>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('auth/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><a href="<?php echo base_url('balance_sheet'); ?>">Ledger List</a></li>
            </ol>
        </h5>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ledgers</h3>
                        <!-- <a class="btn btn-sm btn-info pull-right btn-flat" href="<?php echo base_url()?>report/all_reports">Back</a> -->
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <select class="form-control select2" id="select_financial_type">
                                    <option value="financial">Financial</option>
                                    <option value="calender">Calender</option>
                                </select>
                            </div>
                            <span id="finacial_year">
                                <div class="form-group col-sm-2">
                                    <select class="form-control select2" name="financial_years">
                                        <option value="">Select Financial Year*</option>
                                        <?php
                                        if ($financial_year) {
                                            foreach ($financial_year as $key => $value) {
                                                if ($value['from_date'] != '0000-00-00 00:00:00' && $value['from_date'] != '1970-01-01 01:00:00' && $value['to_date'] != '0000-00-00 00:00:00' && $value['to_date'] != '1970-01-01 01:00:00') {
                                                    $duration = date('m/Y', strtotime($value['from_date'])) . ' - ' . date('m/Y', strtotime($value['to_date']));
                                                    if ($duration != '01/1970 - 01/1970')
                                                        echo '<option value="' . $value['year_id'] . '" '.($financial_year_id == $value['year_id'] ? 'selected' : '').'>' . $duration . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </span>
                            <span id="select_date" class="filter" style="display: none;">
                                <div class="form-group col-sm-2">
                                    <div id="datepicker-popup1" class="input-group date">
                                        <input type="text" class="form-control datepicker" name="from_date" placeholder="From Date" autocomplete="off">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    </div>
                                </div>
                                <div class="form-group col-sm-2">
                                    <div id="datepicker-popup2" class="input-group date">
                                        <input type="text" class="form-control datepicker" name="to_date" placeholder="To Date" autocomplete="off">
                                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                    </div>
                                </div>
                            </span>
                            <div class="form-group col-sm-2">
                                <select class="form-control select2" name="report_ledger">
                                    <option value="">Select Ledger</option>
                                    <?php
                                    if (!empty($ledgers)) {
                                        foreach ($ledgers as $key => $value) {
                                            echo '<option value="' . $value['ledger_id'] . '" '.($ledger_id == $value['ledger_id'] ? 'selected' : '').'>' . $value['ledger_name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-2">
                                <button type="button" class="btn btn-primary tbl-btn search_reports" id="search_reports">Search
                                </button>
                                <button type="reset" class="btn btn-primary tbl-btn reset_filter" id="reset_filter"> Reset
                                </button>
                            </div>
                            <form method="post" action="<?php echo base_url() ?>Ledger_view/ExportReport" id="export_form">
                                <input type="hidden" name="ledger_id">
                                <input type="hidden" name="from_date">
                                <input type="hidden" name="to_date">
                                <input type="hidden" name="year_id">
                                <input type="hidden" name="type">
                            </form>
                            <div class="form-group col-sm-2" id="filter">
                                <div class="box-header box-body filter_body">
                                    <div class="btn-group">
                                        <span><a ref="excel" href='javascript:void(0);' class="btn btn-app download_sheet" data-placement="bottom" data-toggle="tooltip" data-original-title="Download XLS" download><i class="fa fa-file-excel-o" aria-hidden="true"></i></a> </span>
                                        <span><a ref="csv" href="javascript:void(0);" class="btn btn-app download_sheet" data-placement="bottom" data-toggle="tooltip" data-original-title="Download CSV" download><i class="fa fa-file-excel-o" aria-hidden="true"></i></a></span>
                                        <span><a ref="pdf" href="javascript:void(0);" class="btn btn-app download_sheet" data-placement="bottom" data-toggle="tooltip" data-original-title="Download PDF" download><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                            <table id="ledger_report" class="table table-bordered table-hover">
                                <div class="table-responsive table_section" style="display: none;">
                                    <div id="loader">
                                        <h1 class="ml8">
                                            <span class="letters-container"> 
                                                <span class="letters letters-left">
                                                    <img src="<?php echo base_url('assets/'); ?>images/loader-icon.png" width="40px">
                                                </span>
                                            </span>
                                            <span class="circle circle-white"></span>
                                            <span class="circle circle-dark"></span>
                                            <span class="circle circle-container">
                                                <span class="circle circle-dark-dashed"></span>
                                            </span>
                                        </h1>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>Voucher Date</th>
                                            <th>Voucher No</th>
                                            <th>Legder</th>
                                            <th>Amount DR</th>
                                            <th>Amount CR</th>
                                            <th id="closing">Closing Balance</th>
                                        </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
<style type="text/css">
    .table tr td.padding_30 {
        padding-left: 30px !important;
    }
    .table tr td.padding_60 {
        padding-left: 60px !important;
    }
    .table tr td.padding_90 {
        padding-left: 90px !important;
    }
    .table tr td.b_bottom {
        text-decoration: underline;
    }
    .table tr td.text-left {
        text-align: left;
    }
    #filter{
        display: block;
        float: right;
    }
    #filter .box-body{
        padding: 0;
        text-align: right;
    }
</style>
<?php $this->load->view('layout/footer'); ?>
<script type="text/javascript">
    var ledger_id = '<?=$ledger_id;?>';
    var last_search_id = 0;
    $("#finacial_year").show();
    $(document).ready(function () {        
        if(ledger_id != '' && ledger_id != 0){
            findReports();
        }
        $("#ledger_report").dataTable({
            // "processing": true,
            "ordering": false,
            "searching": false,
            "paging": false,
            "info": false,
                // 'language': {
                // 'loadingRecords': '&nbsp;',
                // 'processing': ' <h1 class="ml8"><span class="letters-container"> <span class="letters letters-left"><img src="<?php echo base_url('assets/'); ?>images/loader-icon.png" width="30px"></span></span><span class="circle circle-white"></span><span class="circle circle-dark"></span><span class="circle circle-container"><span class="circle circle-dark-dashed"></span></span></h1>'
                // },
            });
             // anime.timeline({loop:!0}).
             //    add({targets:".ml8 .circle-white",scale:[0,3],opacity:[1,0],easing:"easeInOutExpo",rotateZ:360,duration:8e3}),
             //    anime({targets:".ml8 .circle-dark-dashed",rotateZ:360,duration:8e3,easing:"linear",loop:!0}
             //    );
        $('#reset_filter').click(function () {
            $('[name=financial_years],[name=from_date],[name=to_date],[name=report_ledger]').val('').trigger('change');
            $('.ledger_row').hide();
        });
        $(document).on('click', '.fa-plus, .fa-minus', function () {
            var tr = $(this).closest('tr');
            /*$(this).toggleClass("fa-minus fa-plus");*/
            if($(this).hasClass('fa-plus')){
            $(this).removeClass('fa-plus');
            $(this).addClass('fa-minus');
            tr.nextUntil('tr.main_tr').show().end().addClass('shown');
        }else{
            tr.nextUntil('tr.main_tr').hide().end();
            tr.removeClass('shown');
            $(this).removeClass('fa-minus');
            //tr.nextUntil('tr.odd').hide().end().removeClass('shown');
            $(this).addClass('fa-plus');
        }
        });
        $(document).on('click', '.search_reports,.get_vouchers', function () {
            findReports();
        });
        $(document).on('click', '.download_sheet', function () {
            var ledger_id = $('[name=report_ledger]').val();
            var select_financial = $('#select_financial_type').val();
            var year_id = from_date = to_date = 0;
            if (select_financial != '') {
                if (select_financial == 'financial') {
                    year_id = $(document).find('[name=financial_years]').val();
                    if (year_id == 0 || year_id == '') {
                        /*alert("Select financial year first!");*/
                        alert_d.text = 'Select financial year first!';
                        PNotify.error(alert_d);

                        return false;
                    }
                } else {
                    from_date = $('[name=from_date]').val();
                    to_date = $('[name=to_date]').val();
                    if (from_date == '' || to_date == '') {
                        /*alert_d.text = 'Select financial year first';
                         PNotify.error(alert_d);            */
                        return false;
                    }
                }
            }
            if (ledger_id != '') {
                $('#export_form').find('[name=ledger_id]').val(ledger_id);
                $('#export_form').find('[name=from_date]').val(from_date);
                $('#export_form').find('[name=to_date]').val(to_date);
                $('#export_form').find('[name=year_id]').val(year_id);
                $('#export_form').removeAttr('target');
                if ($(this).attr('ref') == 'pdf') {
                    $('#export_form').attr('target', '_blank');
                }
                $('#export_form').find('[name=type]').val($(this).attr('ref'));
                $('#export_form').submit();
            } else {
                alert_d.text = 'Select required option!';
                PNotify.error(alert_d);
                /*alert('Select required option!');*/
                $('.table_section').hide();
            }
        })
        /*$(document).on('click', '.search_reports', function () {
            findReports();
        })*/
        $("#select_financial_type").change(function () {
            var select_item = $(this).val();
            if (select_item == "") {
                $("#select_date").hide();
                $("#finacial_year").hide();
            }
            if (select_item == "calender") {
                $("#select_date").show();
                $("#finacial_year").hide();
            }
            if (select_item == "financial") {
                $("#finacial_year").show();
                $("#select_date").hide();
            };
        });
    });
    function findReports() {
        var ledger_id = $('[name=report_ledger]').val();
        var select_financial = $('#select_financial_type').val();
        var year_id = from_date = to_date = 0;
        if (select_financial != '') {
            if (select_financial == 'financial') {
                year_id = $(document).find('[name=financial_years]').val();
                if (year_id == 0 || year_id == '' || year_id == null) {
                    //alert("Select financial year first!");
                    alert_d.text = 'Select financial year first!';
                    PNotify.error(alert_d);
                    /*alert('Select financial year first');*/
                    return false;
                }
            } else {
                from_date = $('[name=from_date]').val();
                to_date = $('[name=to_date]').val();
                if (from_date == '' || to_date == '' || from_date == '0' || to_date == '0' || from_date == null || to_date == '') {
                    //alert('select date duration first!');
                    alert_d.text = 'select date duration first';
                     PNotify.error(alert_d);
                    /*alert('select date duration first');*/
                    return false;
                }
            }
        }
        if (ledger_id != '') {
            $('.search_reports').attr('disabled', true);
           // $('.loader').addClass('.hide-loader').show();
            $.ajax({
                url: '<?= base_url(); ?>Ledger_view/getLedgerReports',
                type: 'post',
                dataType: 'json',
                data: {ledger_id: ledger_id, year_id: year_id, from_date: from_date, to_date: to_date},
                  beforeSend: function(){
                   // Show image container
                   $("#loader").show();
                },
                success: function (json) {
                    /*if(json.isBank == 0){
                        $('#closing').css("display","none");
                    }else{
                        $('#closing').css("display","");
                    }*/
                
                   // $('.loader').addClass('.hide-loader').hide();                  
                    $('.search_reports').attr('disabled', false);
                    $('#ledger_report tbody').html(json.html);
                    $("#loader").hide();
                    $('.table_section').show();
                }, 
                error: function () {
                    $("#loader").hide();
                   // $('.loader').addClass('.hide-loader').hide();
                    $('.search_reports').attr('disabled', false);               
                }
            });
        } else {
            /*alert("Select required option!");*/
            alert_d.text ='Select required option!';
            PNotify.error(alert_d);
            $('.table_section').hide();
            
        }
        anime.timeline({loop:!0}).add({targets:".ml8 .circle-white",scale:[0,3],opacity:[1,0],easing:"easeInOutExpo",rotateZ:360,duration:8e3}),anime({targets:".ml8 .circle-dark-dashed",rotateZ:360,duration:8e3,easing:"linear",loop:!0});
    }
      
    
</script>