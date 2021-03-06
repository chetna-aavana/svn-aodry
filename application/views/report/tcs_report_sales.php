<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layout/header');
?>
<style type="text/css">    
    .form-group {
        margin: 10px 5px;
    }
    .modal-footer button:nth-child(2) {
        display: inline-block;
    }
    .label-style{
        background: #ddd;
        color: #333;
        padding: 2px 10px;
        font-size: 11px;
        border-radius: 10px;
    }
    div.dataTables_wrapper div.dataTables_filter {
        float: right;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h5>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('auth/dashboard'); ?>"><i class="fa fa-dashboard"></i>DashBoard</a></li>
                <li><a href="<?php echo base_url('report/all_reports'); ?>">Report</a></li> <li class="active">TDS Report</li>
            </ol>
        </h5>
    </section>
    <section class="content">
        <div class="row">
            
            <?php
            if ($message = $this->session->flashdata('message')) {
                ?>
                <div class="col-sm-12">
                    <div class="alert alert-success">
                        <button class="close" data-dismiss="alert" type="button">×</button>
                        <?php echo $message; ?>
                        <div class="alerts-con"></div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            TCS Payable Reports (Sales)
                        </h3>
                        <div class="pull-right double-btn">
                            <button id="refresh_table" class="btn btn-sm btn-info">Refresh</button>
                        </div>    
                    </div>
                    <div class="box-body">
                        <!-- <div class="row" >
                             <div class="col-sm-3">
                                 <div class="form-group">
                                     <div class="input-group">
                                         <input type="text" name="from_date" value="" class="form-control datepicker" id="from_date" placeholder="From Date" autocomplete="off">
                                         <div class="input-group-addon">
                                             <i class="fa fa-calendar"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-3">
                                 <div class="form-group">
                                     <div class="input-group">
                                         <input type="text" name="to_date" value="" class="form-control datepicker" id="to_date" placeholder="To date" autocomplete="off">
                                         <div class="input-group-addon">
                                             <i class="fa fa-calendar"></i>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-sm-3">
                                 <button type="submit" class="btn btn-info btn-flat"  id="tds" name="submit">Get Report</button>
                             </div>
                         </div>-->
                         <div class="box-header" id="filters_applied">
                        </div>
                        <table id="list_datatable" class="table table-bordered table-striped table-hover table-responsive">
                            <thead>                                
                                <tr>
                                    <th>
                                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#date_coll_modal">Date of Collection &nbsp;&nbsp;<span class="fa fa-toggle-down"></span></a>
                                    </th>
                                    <th>
                                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#deductee_name_modal">Deductee Name &nbsp;&nbsp;<span class="fa fa-toggle-down"></span></a>
                                    </th>
                                    <th>
                                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#pan_modal">PAN &nbsp;&nbsp;<span class="fa fa-toggle-down"></span></a>
                                    </th>
                                    <th>
                                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#tcs_receivable_modal">TCS Payable u/s &nbsp;&nbsp;<span class="fa fa-toggle-down"></span></a>
                                    </th>
                                    <th>
                                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#rate_tax_modal">Rate of Tax &nbsp;&nbsp;<span class="fa fa-toggle-down"></span></a>
                                    </th>
                                    <th>
                                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#taxable_value_modal">Taxable Value &nbsp;&nbsp;<span class="fa fa-toggle-down"></span></a>
                                    </th>
                                    <th>
                                        <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#tcs_amt_modal">TCS Amount &nbsp;&nbsp;<span class="fa fa-toggle-down"></span></a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <table id="addition_table" class="mt-15 mb-25">                         
                            <thead>
                                <tr>
                                    <th>Sum Of Taxable Amount</th>
                                    <th>Sum Of TDS Amount</th>
                                </tr>
                            </thead>                            
                            <tbody>
                                <tr>
                                    <td id="total_list_record1"></td>
                                    <td id="total_list_record2"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="date_coll_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Date of Collection</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group date">
                                <input type="text" name="from_date" class="form-control datepicker" id="from_date" placeholder="From Date" autocomplete="off">
                                <div class="input-group-addon"> <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="input-group date">
                                <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="To Date" autocomplete="off">
                                <div class="input-group-addon"> <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default filter_search" data-dismiss="modal">Apply</button>
                <button type="button" class="btn btn-warning" id="reset-date">Reset</button>
                <!-- <button type="button" class="btn btn-default filter_search_rest" >Reset All</button> -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deductee_name_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please Select Deductee Name</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select class="select2" multiple="multiple"  id="filter_customer"  name="filter_customer">
                                <option value="">Select Deductee Name</option>
                                <?php
                                foreach ($customers as $key => $value) {
                                    ?>
                                    <option value="<?= $value->customer_id ?>"><?= $value->customer_name ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default filter_search" data-dismiss="modal">Apply</button>
                <button type="button" class="btn btn-warning" id="reset-customer" >Reset</button>
                <!-- <button type="button" class="btn btn-default filter_search_rest" >Reset All</button> -->
            </div>
        </div>      
    </div>
</div>
<div class="modal fade" id="pan_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please Select PAN</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select class="select2" multiple="multiple"  id="filter_pan"  name="filter_pan">
                                <option value="">Select PAN</option>
                                <?php
                                foreach ($customer_pan as $key => $value) {
                                    if ($value->customer_pan_number != '') {
                                        ?>
                                        <option value="<?= $value->customer_pan_number ?>"><?= $value->customer_pan_number ?></option>
                                        <?php
                                    }
                                }
                                ?>                               
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default filter_search" data-dismiss="modal">Apply</button>
                <button type="button" class="btn btn-warning" id="reset-pan" >Reset</button>
                <!-- <button type="button" class="btn btn-default filter_search_rest" >Reset All</button> -->
            </div>
        </div>      
    </div>
</div>
<div class="modal fade" id="tcs_receivable_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please Select TCS Payable u/s</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select class="select2" multiple="multiple"  id="filter_tcs_section"  name="filter_tcs_section">
                                <option value="">Please Select TCS Payable u/s</option>
                                <?php
                                foreach ($tcs_section as $key => $value) {
                                    if ($value->section_name != '') {
                                        $section = 'TCS payable u/s' . $value->section_name;
                                        ?>
                                        <option value="<?= $value->section_name ?>"><?= $section ?></option>
                                        <?php
                                    }
                                }
                                ?>  
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default filter_search" data-dismiss="modal">Apply</button>
                <button type="button" class="btn btn-warning" id="reset-section" >Reset</button>
                <!-- <button type="button" class="btn btn-default filter_search_rest" >Reset All</button> -->
            </div>
        </div>      
    </div>
</div>
<div class="modal fade" id="rate_tax_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please Select Rate of Tax</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select class="select2" multiple="multiple"  id="filter_tcs_percentage"  name="filter_tcs_percentage">
                                <option value="">Please Select Rate of Tax</option>
                                <?php
                                foreach ($tcs_percentage as $key => $value) {
                                    if ($value->sales_item_tds_percentage != '') {
                                        $percentage = (float)($value->sales_item_tds_percentage);
                                        ?>
                                        <option value="<?= $value->sales_item_tds_percentage ?>"><?= $percentage.'%' ?></option>
                                        <?php
                                    }
                                }
                                ?>  
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default filter_search" data-dismiss="modal">Apply</button>
                <button type="button" class="btn btn-warning" id="reset-percentage" >Reset</button>
                <!-- <button type="button" class="btn btn-default filter_search_rest" >Reset All</button> -->
            </div>
        </div>      
    </div>
</div>
<div class="modal fade" id="taxable_value_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please Enter Taxable Amount</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="number" name="from_taxable_amount" class="form-control" id="from_taxable_amount" placeholder="From" autocomplete="off" min="1">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="number" name="to_taxable_amount" class="form-control" id="to_taxable_amount" placeholder="To" autocomplete="off" min="1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default filter_search" data-dismiss="modal">Apply</button>
                <button type="button" class="btn btn-warning" id="reset-tcs-taxable" >Reset</button>
                <!-- <button type="button" class="btn btn-default filter_search_rest" >Reset All</button> -->
            </div>
        </div>      
    </div>
</div>

<div class="modal fade" id="tcs_amt_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please Enter TCS Amount</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="number" name="from_tcs_amount" class="form-control" id="from_tcs_amount" placeholder="From" autocomplete="off" min="1">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="number" name="to_tcs_amount" class="form-control" id="to_tcs_amount" placeholder="To" autocomplete="off" min="1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default filter_search" data-dismiss="modal">Apply</button>
                <button type="button" class="btn btn-warning" id="reset-tcs-amount" >Reset</button>
                <!-- <button type="button" class="btn btn-default filter_search_rest" >Reset All</button> -->
            </div>
        </div>      
    </div>
</div>
<?php
$this->load->view('layout/footer');
?>
<script>
    $(document).ready(function () {
        $("#reset-date").click(function () {
            $('#from_date').val('');
            $('#to_date').val('');
        });
        $("#reset-customer").click(function () {
            $("#deductee_name_modal .select2-selection__rendered").empty();
            $('#filter_customer option:selected').prop("selected", false);
        });
        $("#reset-pan").click(function () {
            $("#pan_modal .select2-selection__rendered").empty();
            $('#filter_pan option:selected').prop("selected", false);
        });
        $("#reset-section").click(function () {
            $("#tcs_receivable_modal .select2-selection__rendered").empty();
            $('#filter_tcs_section option:selected').prop("selected", false);
        });
        $("#reset-percentage").click(function () {
            $("#rate_tax_modal .select2-selection__rendered").empty();
            $('#filter_tcs_percentage option:selected').prop("selected", false);
        });
        $("#reset-tcs-taxable").click(function () {
            $('#from_taxable_amount').val('');
            $('#to_taxable_amount').val('');
        });
        $("#reset-tcs-amount").click(function () {
            $('#from_tcs_amount').val('');
            $('#to_tcs_amount').val('');
        });
        $('#refresh_table').on('click', function(){
            $("#list_datatable").dataTable().fnDestroy()
            generateOrderTable();
        });
        generateOrderTable();
        function resetall() {
            $('#from_date').val('');
            $('#to_date').val('');
            $('#filter_customer option:selected').prop("selected", false);
            $('#filter_pan option:selected').prop("selected", false);
            $('#filter_tcs_section option:selected').prop("selected", false);
            $('#filter_tcs_percentage option:selected').prop("selected", false);
            $('#from_taxable_amount').val('');
            $('#to_taxable_amount').val('');
            $('#from_tcs_amount').val('');
            $('#to_tcs_amount').val('');
            $('.select2-selection__rendered').empty();
            appendFilter();
            $("#list_datatable").dataTable().fnDestroy()
            generateOrderTable()
        }
        ;
        function generateOrderTable() {
            $("#list_datatable").dataTable({
                "processing": true,
                "serverSide": true,
                "scrollX": true,
                "ajax": {
                    "url": base_url + "report/tcs_report_sales",
                    "dataType": "json",
                    "type": "POST",
                    "data": {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>', 'filter_customer': $('#filter_customer').val(), 'filter_from_date': $('#from_date').val(), 'filter_to_date': $('#to_date').val(), 'filter_pan': $('#filter_pan').val(), 'filter_from_taxable_amount': $('#from_taxable_amount').val(), 'filter_to_taxable_amount': $('#to_taxable_amount').val(), 'filter_from_tcs_amount': $('#from_tcs_amount').val(), 'filter_to_tcs_amount': $('#to_tcs_amount').val(), 'filter_tcs_percentage': $('#filter_tcs_percentage').val(), 'filter_tcs_section': $('#filter_tcs_section').val()},
                    "dataSrc": function (result) {
                        var tfoot = parseFloat(result.total_list_record[0].tot_taxable_value).toFixed(2);
                        $('#total_list_record1').html(tfoot);
                        tfoot = parseFloat(result.total_list_record[0].tot_tds_amount).toFixed(2);
                        $('#total_list_record2').html(tfoot);
                        return result.data;
                    }
                },
                "columns": [
                    {"data": "sales_date"},
                    {"data": "customer"},
                    {"data": "pan_number"},
                    {"data": "payable_us"},
                    {"data": "rate_of_tax"},
                    {"data": "taxable_value"},
                    {"data": "amount"},
                ],
                "columnDefs": [{
                        "targets": "_all",
                        "orderable": false
                    }],
               dom: 'Bfrltip',
                buttons: [
                    {extend: 'csv', footer: true},
                    {extend: 'excel', footer: true},
                    {extend: 'pdfHtml5',
                        text: 'PDF',
                        filename: 'TCS Payable Reports(Sales)',
                        // orientation: 'landscape', //portrait
                        pageSize: 'A4', //A3 , A5 , A6 , legal , letter
                        exportOptions: {
                            columns: ':visible',
                            search: 'applied',
                            order: 'applied'
                        },
                        customize: function (doc) {
                            //Remove the title created by datatTables
                            doc.content.splice(0, 1);
                            //Create a date string that we use in the footer. Format is dd-mm-yyyy
                            var now = new Date();
                            var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                            // Logo converted to base64
                            // var logo = getBase64FromImageUrl('https://datatables.net/media/images/logo.png');
                            // The above call should work, but not when called from codepen.io
                            // So we use a online converter and paste the string in.
                            // Done on http://codebeautify.org/image-to-base64-converter
                            // It's a LONG string scroll down to see the rest of the code !!!
                            var logo = 'data:image/png;base64,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';
                            // var logo= 'http://localhost/PhpProject1/aodry-v4-1/assets/images/logo.png';
                            // A documentation reference can be found at
                            // https://github.com/bpampuch/pdfmake#getting-started
                            // Set page margins [left,top,right,bottom] or [horizontal,vertical]
                            // or one number for equal spread
                            // It's important to create enough space at the top for a header !!!
                            doc.pageMargins = [20, 60, 20, 30];
                            // Set the font size fot the entire document
                            doc.defaultStyle.fontSize = 7;
                            // Set the fontsize for the table header
                            doc.styles.tableHeader.fontSize = 7;
                            // Create a header object with 3 columns
                            // Left side: Logo
                            // Middle: brandname
                            // Right side: A document title
                            doc['header'] = (function () {
                                return {
                                    columns: [
                                        {
                                            image: logo,
                                            width: 90
                                        },
                                        {
                                            alignment: 'left',
                                            italics: true,
                                            text: '',
                                            fontSize: 18,
                                            margin: [10, 0]
                                        },
                                        {
                                            alignment: 'right',
                                            fontSize: 14,
                                            text: 'TDS Receivable Reports (Sales)'
                                        }
                                    ],
                                    margin: 20
                                }
                            });
                            // Create a footer object with 2 columns
                            // Left side: report creation date
                            // Right side: current page and total pages
                            doc['footer'] = (function (page, pages) {
                                return {
                                   columns: [
                                        {
                                            alignment: 'center',
                                            fontSize:10,
                                            text: ['Copyright © 2019 Aavana Corporate Solutions Pvt Ltd. All Rights Reserved']
                                        },                                     
                                    ]
                                }
                            });
                            // Change dataTable layout (Table styling)
                            // To use predefined layouts uncomment the line below and comment the custom lines below
                            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
                            var objLayout = {};
                            objLayout['hLineWidth'] = function (i) {
                                return .5;
                            };
                            objLayout['vLineWidth'] = function (i) {
                                return .5;
                            };
                            objLayout['hLineColor'] = function (i) {
                                return '#aaa';
                            };
                            objLayout['vLineColor'] = function (i) {
                                return '#aaa';
                            };
                            objLayout['paddingLeft'] = function (i) {
                                return 4;
                            };
                            objLayout['paddingRight'] = function (i) {
                                return 4;
                            };
                            doc.content[0].layout = objLayout;
                            /*doc.watermark = {text: 'Aavana Corporate Solutions PVT LTD', color: '#999999', opacity: 0.2};*/
                        }
                    },
                    {
                        text: 'Reset All',
                        action: function (e, dt, node, config) {
                            resetall();
                        }
                    }],
             'language': {
                'loadingRecords': '&nbsp;',
                'processing': ' <h1 class="ml8"><span class="letters-container"> <span class="letters letters-left"><img src="<?php echo base_url('assets/'); ?>images/loader-icon.png" width="30px"></span></span><span class="circle circle-white"></span><span class="circle circle-dark"></span><span class="circle circle-container"><span class="circle circle-dark-dashed"></span></span></h1>'
                },
            });
             anime.timeline({loop:!0}).add({targets:".ml8 .circle-white",scale:[0,3],opacity:[1,0],easing:"easeInOutExpo",rotateZ:360,duration:8e3}),anime({targets:".ml8 .circle-dark-dashed",rotateZ:360,duration:8e3,easing:"linear",loop:!0});
            $("#loader").hide();
        }
        $('.filter_search').click(function () {
            appendFilter();
        });
        function appendFilter() { //button filter event click

             $("#loader").show();
            var filter_invoice_date = "";
            var filter_customer = "";
            var filter_pan = "";
            var filter_tcs_section = "";
            var filter_tcs_percentage = "";
            var filter_taxable_amount = "";
            var filter_tcs_amount = "";

            var label = "";
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            if (from_date != "" || to_date != "") {
                filter_invoice_date = "<label id='lbl_invoice_date' class='label-style'><b> Date Of Collection : </b> FROM " + from_date + " TO " + to_date + '<i class="fa fa-times"></i></label>';
            }
            if (filter_invoice_date != '') {
                label += filter_invoice_date + " ";
            }
            $("#filter_customer option:selected").each(function(){
                var $this = $(this);
                if ($this.length) {
                    filter_customer += $this.text() + ", ";
                }
            });
            if (filter_customer != '') {
                label += "<label id='lbl_customer_name' class='label-style'><b> Deductee Name : </b> " + filter_customer.slice(0, -2) + '<i class="fa fa-times"></i></label>'+" ";
            }
            $("#filter_pan option:selected").each(function(){
                var $this = $(this);
                if ($this.length) {
                    filter_pan += $this.text() + ", ";
                }
            });
            if (filter_pan != '') {
                label += "<label id='lbl_pan' class='label-style'><b> PAN : </b> " + filter_pan.slice(0, -2) + '<i class="fa fa-times"></i></label>'+" ";
            }
            $("#filter_tcs_section option:selected").each(function(){
                var $this = $(this);
                if ($this.length) {
                    filter_tcs_section += $this.text() + ", ";
                }
            });
            if (filter_tcs_section != '') {
                label += "<label id='lbl_tcs_section' class='label-style'><b> TCS Payable U/S : </b> " + filter_tcs_section.slice(0, -2) + '<i class="fa fa-times"></i></label>'+" ";
            }
            $("#filter_tcs_percentage option:selected").each(function(){
                var $this = $(this);
                if ($this.length) {
                    filter_tcs_percentage += $this.text() + ", ";
                }
            });
            if (filter_tcs_percentage != '') {
                label += "<label id='lbl_tcs_percentage' class='label-style'><b> Rate Of Tax : </b> " + filter_tcs_percentage.slice(0, -2) + '<i class="fa fa-times"></i></label>'+" ";
            }
            var from_taxable_amount = $('#from_taxable_amount').val();
            var to_taxable_amount = $('#to_taxable_amount').val();
            if (from_taxable_amount != "" || to_taxable_amount != "") {
                filter_taxable_amount = "<label id='lbl_taxable_amount' class='label-style'><b> Taxable Amount : </b> FROM " + from_taxable_amount + " TO " + to_taxable_amount + '<i class="fa fa-times"></i></label>';
            }
            if (filter_taxable_amount != '') {
                label += filter_taxable_amount + " ";
            }
            var from_tcs_amount = $('#from_tcs_amount').val();
            var to_tcs_amount = $('#to_tcs_amount').val();
            if (from_tcs_amount != "" || to_tcs_amount != "") {
                filter_tcs_amount = "<label id='lbl_tds_amount' class='label-style'><b> TCS Amount : </b> FROM " + from_tcs_amount + " TO " + to_tcs_amount + '<i class="fa fa-times"></i></label>';
            }
            if (filter_tcs_amount != '') {
                label += filter_tcs_amount + " ";
            }
            if (label != "") {
                $('#filters_applied').html(label);
            } else {
                $('#filters_applied').html('<label></label>');
            }
            $("#list_datatable").dataTable().fnDestroy()
            generateOrderTable()
        }
        $(document).on('click',".fa-times",function(){
            $(this).parent('label').remove();
            var label1=$(this).parent('label').attr('id');
            console.log(label1);
            if(label1 == 'lbl_invoice_date'){
                $('#from_date').val('');
                $('#to_date').val('');
                $("#list_datatable").dataTable().fnDestroy()
                generateOrderTable();
            }
            if(label1 == 'lbl_customer_name'){
                $("#deductee_name_modal .select2-selection__rendered").empty();
                $('#filter_customer option:selected').prop("selected", false);
                $("#list_datatable").dataTable().fnDestroy()
                generateOrderTable();
            }
            if(label1 == 'lbl_pan'){
                $("#pan_modal .select2-selection__rendered").empty();
                $('#filter_pan option:selected').prop("selected", false);
                $("#list_datatable").dataTable().fnDestroy()
                generateOrderTable();
            }
            if(label1 == 'lbl_tcs_section'){
                $("#tcs_receivable_modal .select2-selection__rendered").empty();
                $('#filter_tcs_section option:selected').prop("selected", false);
                $("#list_datatable").dataTable().fnDestroy()
                generateOrderTable();
            }
            if(label1 == 'lbl_tcs_percentage'){
                $("#rate_tax_modal .select2-selection__rendered").empty();
                $('#filter_tcs_percentage option:selected').prop("selected", false);
                $("#list_datatable").dataTable().fnDestroy()
                generateOrderTable();
            }
            if(label1 == 'lbl_taxable_amount'){
                $('#from_taxable_amount').val('');
                $('#to_taxable_amount').val('');
                $("#list_datatable").dataTable().fnDestroy()
                generateOrderTable();
            }
            if(label1 == 'lbl_tds_amount'){
                $('#from_tcs_amount').val('');
                $('#to_tcs_amount').val('');
                $("#list_datatable").dataTable().fnDestroy()
                generateOrderTable();
            }
        });
    });
</script>