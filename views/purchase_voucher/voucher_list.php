<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layout/header');
?>
<style type="text/css">
    td span.details-control {
        background: url('<?=base_url()?>assets/images/expond.png') no-repeat center center;
        width: 40px;
        display: block;
        height: 30px;
        cursor: pointer;
    }
    .disable_in{border: none;pointer-events: none;color: #212529 !important;}
    .filter ul li {display: inline-block; width: 15.6%;}
    .filter ul li.auto-w, .top-filter ul li.auto-w {
        width: auto !important;
        vertical-align: top;
    }
    .custom-filter ul li { width: 12.8%;}
</style>
<div class="content-wrapper">
    <section class="content-header">
    </section>
    <div class="fixed-breadcrumb">
        <ol class="breadcrumb abs-ol">
            <li><a href="<?php echo base_url('auth/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?=(ucfirst(str_replace('_', ' ', $reference_type)));?> Voucher</li>
        </ol>
    </div>
    <section class="content mt-50">
        <div class="row">
            <?php
            if ($this->session->flashdata('email_send') == 'success')
            {
            ?>
            <div class="col-sm-12">
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert" type="button">×</button>
                    Email has been send with the attachment.
                    <div class="alerts-con"></div>
                </div>
            </div>
            <?php
            }
            ?>
            <!--
            <div class="customized-filter filter mb-10" style="display: none;">
                            <ul>
                                <li>
                                    <div id="datepicker-popup1" class="input-group date datepicker">
                                        <input type="text" class="form-control" name="invoice_from" placeholder="Invoice From Date*">
                                        <span class="input-group-addon input-group-append"> <span class="mdi mdi-calendar input-group-text"></span> </span>
                                    </div>
                                </li>
                                <li>
                                    <div id="datepicker-popup2" class="input-group date datepicker">
                                        <input type="text" class="form-control" name="invoice_to" placeholder="Invoice To Date*">
                                        <span class="input-group-addon input-group-append"> <span class="mdi mdi-calendar input-group-text"></span> </span>
                                    </div>
                                </li>
                                <li>
                                    <select class="form-control js-example-basic-single" name="invoice_ledger">
                                        <option value="">Select Ledger*</option>
                                        <?php 
                                            if(!empty($ledgers)){
                                                foreach ($ledgers as $key => $value) {
                                                    echo "<option value='{$value['ledger_id']}'>{$value['ledger_name']}</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </li>
                                <li>
                                    <select class="form-control custom_select2" name="invoice_cr">
                                        <option value="">Select CR/DR*</option>
                                        <option value="CR">CR</option>
                                        <option value="DR">DR</option>
                                    </select>
                                </li>
                                <li>
                                    <select class="form-control custom_select2" name="invoice_status">
                                        <option value="">Select Status</option>
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </li>
                                <li class="auto-w">
                                    <button type="button" class="btn btn-primary tbl-btn" id="search_voucher">
                                        Search
                                    </button>
                                </li>
                                <li class="auto-w">
                                    <button type="reset" class="btn btn-primary tbl-btn" id="reset_filter">
                                        Reset
                                    </button>
                                </li>
                                <?php if($access['m_add']){?>
                                <li class="pull-right auto-w">
                                    <span class="btn btn-primary btn-xs round-btn add_voucher"><a data-toggle="tooltip" data-placement="left" data-custom-class="tooltip-primary" data-original-title="Add Voucher"><i class="icon-plus"></i></a> </span>
                                    <span class="btn btn-primary btn-xs round-btn"><a href="<?php echo base_url("assets/excel/voucher_with_ledgers_demo.csv")  ?>" data-toggle="tooltip" data-placement="left" data-custom-class="tooltip-primary" data-original-title="Download Voucher with ledgers CSV demo file" download><i class="mdi mdi-download"></i></a> </span>
                                    <span class="btn btn-primary btn-xs round-btn upload_voucher_popup" ><a data-toggle="tooltip" data-placement="left" data-custom-class="tooltip-primary" data-original-title="Upload Voucher" class=""><i class="icon-cloud-upload"></i></a> </span>
                                    <span class="btn btn-primary btn-xs round-btn" ><a href="<?=base_url();?>upload_voucher" data-toggle="tooltip" data-placement="left" data-custom-class="tooltip-primary" data-original-title="Upload Bulk Voucher"><i class="icon-cloud-upload"></i></a> </span>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>-->
            
            <!-- right column -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?=(ucfirst(str_replace('_', ' ', $reference_type)));?> Ledger</h3>
                    </div>
                    <div class="row filter-margin">
                    <div class="col-sm-2 pr-2">
                        <div class="input-group date">
                            <input type="text" class="form-control datepicker" name="invoice_from" placeholder="Invoice From Date*">
                            <div class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 pl-2 pr-2">
                        <div class="input-group date">
                            <input type="text" class="form-control datepicker" name="invoice_to" placeholder="Invoice To Date*">
                            <div class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 pl-2 pr-2">
                        <select class="form-control select2" name="invoice_ledger">
                            <option value="">Select Ledger*</option>
                            <?php
                            if (!empty($ledgers)) {
                                foreach ($ledgers as $key => $value) {
                                    echo "<option value='{$value['ledger_id']}'>{$value['ledger_name']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-2 pl-2 pr-2">
                        <select class="form-control select2" name="invoice_cr">
                            <option value="">Select CR/DR*</option>
                            <option value="CR">CR</option>
                            <option value="DR">DR</option>
                        </select>
                    </div>
<!--                    <div class="col-sm-2 pl-2 pr-2">
                        <select class="form-control select2" name="invoice_status">
                            <option value="">Select Status</option>
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                        </select>
                    </div>-->
                    <div class="col-sm-2 pl-2">
                        <button type="button" class="btn btn-primary tbl-btn" id="search_voucher">
                            Search
                        </button>
                        <button type="reset" class="btn btn-primary tbl-btn" id="reset_filter">
                            Reset
                        </button>
                    </div>
                   </div>
                    <div class="box-body">
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
                        <table id="voucher_list" class="custom_datatable table table-bordered table-striped table-hover table-responsive" >
                            <thead>
                               <tr>
                                    <th width="12%">Voucher Number</th>
                                    <th width="10%">Invoice Date</th>
                                    <th width="11.5%">Invoice Number</th>
                                    <th width="10%">Invoice Total</th>
                                    <th width="6%">Expand</th>
                                    <th>Ledger</th>
                                    <th width="12%">Amount</th>
                                    <th width="6%">CR/DR</th>
                                </tr>
                            </thead>
                        <tbody></tbody>
                    </table>
                    <div class="bottom">
                        <div class="dataTables_length" id="acc_company_length">
                            <div class="pages_dropdown">
                        </div>
                        </div>
                        
                        <div class="paging_simple_numbers pull-right" id="acc_company_paginate">
                            <ul class="pagination"></ul>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('layout/footer');
$this->load->view('general/delete_modal');
?>
<script>
var reference_type = '<?=$reference_type;?>';
$(document).ready(function () {
    var reference_id = '<?php echo $ledger_value;?>';
    GetAllVoucher(1, reference_id);
    $('#voucher_list tbody').on('click', 'span.details-control', function() {
        var tr = $(this).closest('tr');
        if($(this).hasClass('expand')){
            $(this).removeClass('expand');
            tr.nextUntil('tr.main_tr').show().end().addClass('shown');
        }else{
            tr.nextUntil('tr.main_tr').not(tr.next('tr')).hide().end();
            tr.removeClass('shown');
            //tr.nextUntil('tr.odd').hide().end().removeClass('shown');
            $(this).addClass('expand');
        }
    });
    $(document).on('click','#search_voucher',function(){
        GetAllVoucher();
    })
    $(document).on('click','#reset_filter',function(){
        $('[name=invoice_from],[name=invoice_to],[name=invoice_ledger],[name=invoice_cr],[name=invoice_status]').val('').trigger('change');
        GetAllVoucher();
    })
    $(document).on('click','.paginate_button a' , function(){
        if($(this).parent().hasClass('enable')){
            var page = $(this).attr('page');
            GetAllVoucher(page);
        }
    });
    $(document).on('change','#chnage_page' , function(){
        var page = $(this).val();
        GetAllVoucher(page);
    });
});
function GetAllVoucher(page = 1, reference_id = ''){
    var voucher_type = 'purchase';
    var voucher_id = $('input[name=voucher_id]').val();
    $('.main_row').show();
    $(document).find('div.filter,div.table-responsive.voucher').show();
    var invoice_from = $('input[name=invoice_from]').val();
    var invoice_to = $('input[name=invoice_to]').val();
    var invoice_ledger = $('select[name=invoice_ledger]').val();
    var invoice_cr = $('select[name=invoice_cr]').val();
    var invoice_status = $('select[name=invoice_status]').val();
    $('#search_voucher-popup').modal('hide');
    $.ajax({
        url:'<?=base_url();?>Purchase_ledger/GetAllVoucher',
        type:'post',
        dataType:'json',
        data:{page:page,reference_type:reference_type,invoice_to : invoice_to,invoice_from : invoice_from,invoice_ledger : invoice_ledger,invoice_cr : invoice_cr,invoice_status : invoice_status,voucher_type:voucher_type,voucher_id:voucher_id,reference_id: reference_id},
         beforeSend: function(){
                   // Show image container
                   $("#loader").show();
                },
        success:function(j){
            $('#voucher_list tbody').html(j.tbody);
            $(document).find('ul.pagination').html(j.pagination);
            $('[name=invoice_from]').val(j.from_date);
            $('[name=invoice_to]').val(j.to_date);
            $('.pages_dropdown').html(j.pages_dropdown);
              $("#loader").hide();
            /*SetDefaultClass();*/
            //GetLedgers();
        }
    })
}
 anime.timeline({loop:!0}).add({targets:".ml8 .circle-white",scale:[0,3],opacity:[1,0],easing:"easeInOutExpo",rotateZ:360,duration:8e3}),anime({targets:".ml8 .circle-dark-dashed",rotateZ:360,duration:8e3,easing:"linear",loop:!0});

</script>