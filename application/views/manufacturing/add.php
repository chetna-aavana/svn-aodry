<?php

defined('BASEPATH') OR exit('No direct script access allowed');

defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// $p = array('admin', 'manager');

// if (!(in_array($this->session->userdata('type'), $p))) {

//     redirect('auth');

// }

$this->load->view('layout/header');

?>

<style type="text/css">

    .tabactive .active>a{background-color: #0177a9!important;color: #fff!important }

    .tabactive a{color: #000}

    .nav-tabs>li>a{color: #000!important}

    .mt-30{margin:30px 0px;}

    .table-scroll{width: 100%;overflow: scroll;display: none;}

    .add-more>.fa,.removeDiv>.fa{font-size: 20px;  }

    .add-more,.removeDiv{color: #0177a9 !important;cursor: pointer;}

    .add-more{margin-top: 25px;}

    .mt-25{margin-top: 25px}

    #getRowsValue{color:#0177a9;display: none;}

    .alert-custom{color:red;display: none;}

    input[type=radio] {

        height: 20px;

        width: 20px;

    }

    .require_field{display: none;color:red}

</style>



<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">



    </section>

    <div class="fixed-breadcrumb">

        <ol class="breadcrumb abs-ol">

            <li><a href="<?php echo base_url('auth/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li><a href="<?php echo base_url('product/varient_list'); ?>">Raw materials</a></li>

            <li class="active">Add Raw materials</li>

        </ol>

    </div>



    <!-- Main content -->

    <section class="content mt-50">

        <div class="row">



            <!-- tabs -->



            <!-- /tabs -->



            <!-- right column -->

            <div class="col-md-12">

                <div class="box">

                    <div class="box-header with-border">

                        <h3 class="box-title">Add Raw materials</h3><span class="btn btn-default pull-right" id="cancel" onclick="cancel('product')">Back</span>

                    </div>

                    <!-- /.box-header -->

                    <div class="tabactive">

                        <ul class="nav nav-tabs">

                            <li class="active"><a data-toggle="tab" href="#home">Raw materials</a></li>

                            <li><a data-toggle="tab" href="#menu1">Varients</a></li>

                        </ul>

                    </div>

                    <div class="tab-content">

                        <div id="home" class="tab-pane fade in active">



                            <div class="box-body">

                                <form role="form" id="form" method="post" action="<?php echo base_url('manufacturing/add_raw_material'); ?>" encType="multipart/form-data">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="raw_material_code">Raw materials Code <span class="validation-color">*</span></label>

                                                <input type="text" class="form-control" tabindex="1"  id="ajax_raw_material_code" name="ajax_raw_material_code" value="<?php echo $invoice_number; ?>" <?php

                                                if ($access_settings[0]->invoice_readonly == 'yes')

                                                {

                                                    echo "readonly";

                                                }

                                                ?>>

                                                <span class="validation-color" id="err_raw_material_code"><?php echo form_error('raw_material_code'); ?></span>

                                            </div>

                                            <!--  <div class="form-group">

                                                 <label for="raw_material_quantity">Stock</label>

                                                 <input type="number" class="form-control" id="raw_material_quantity" name="raw_material_quantity" value="<?php echo set_value('raw_material_quantity'); ?>" tabindex="3">

                                                 <span class="validation-color" id="err_raw_material_quantity"></span>

                                             </div> -->

                                            <div class="form-group">

                                                <input type="hidden" class="form-control" id="c_type" name="c_type" value="product">

                                                <label for="raw_material_category">Select Category <span class="validation-color">*</span></label><a href="" data-toggle="modal" data-target="#category_modal" data-name="product" class="pull-right new_category">+ Add Category</a>

                                                <select class="form-control select2" id="raw_material_category" name="raw_material_category" style="width: 100%;" tabindex="5">

                                                    <option value="">Select</option>

                                                    <?php

                                                    foreach ($product_category as $row)

                                                    {

                                                        echo "<option value='$row->category_id'" . set_select('raw_material_category', $row->category_id) . ">$row->category_name</option>";

                                                    }

                                                    ?>

                                                </select>

                                                <span class="validation-color" id="err_raw_material_category"><?php echo form_error('raw_material_category'); ?></span>

                                            </div>





                                            <!-- <div class="form-group">

                                                <label for="raw_material_color">Color</label>

                                                <input type="text" class="form-control" id="raw_material_color" name="raw_material_color" value="<?php echo set_value('raw_material_color'); ?>" tabindex="7">

                                                <span class="validation-color" id="err_raw_material_color"><?php echo form_error('raw_material_color'); ?></span>

                                             </div> -->

                                            <div class="form-group">

                                                <label for="raw_material_price">Unit Price <span class="validation-color">*</span></label>

                                                <input type="text" class="form-control" id="raw_material_price" name="raw_material_price" value="<?php echo set_value('raw_material_price'); ?>" tabindex="9">

                                                <span class="validation-color" id="err_raw_material_price"><?php echo form_error('raw_material_price'); ?></span>

                                            </div>

                                            <div class="form-group">

                                                <label for="raw_material_hsn_sac_code">Product HSN Code <span class="validation-color">*</span></label> <a href="" data-toggle="modal" data-target="#hsn_modal" class="pull-right"><span>Product HSN Lookup</span></a>

                                                <input type="text" class="form-control" id="product_hsn_sac_code" name="product_hsn_sac_code" value="<?php echo set_value('product_hsn_sac_code'); ?>" tabindex="11">

                                                <span class="validation-color" id="err_raw_material_hsn_sac_code"><?php echo form_error('raw_material_hsn_sac_code'); ?></span>

                                            </div>

                                            <div class="form-group">

                                                <label for="raw_material_type">Is it an asset ? <span class="validation-color">*</span></label>

                                                <br/>

                                                <label class="radio-inline">

                                                    <input type="radio" name="raw_material_type" value="asset" /> Yes

                                                </label>

                                                <label class="radio-inline">

                                                    <input type="radio" name="raw_material_type" value="product" checked="checked" /> No

                                                </label>

                                                <br/>

                                                <span class="validation-color" id="err_raw_material_type"><?php echo form_error('raw_material_type'); ?></span>

                                            </div>



                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label for="raw_material_name">Raw materials Name <span class="validation-color">*</span></label>

                                                <input type="hidden" name="Raw Materials_id" id="Raw Materials_id" value="0">



                                                <input type="text" class="form-control" id="raw_materials_name" name="raw_materials_name" value="<?php echo set_value('Raw Materials_name'); ?>" tabindex="2">

                                                <span class="validation-color" id="err_raw_materials_name"><?php echo form_error('Raw Materials_name'); ?></span>

                                            </div>





                                            <div class="form-group">

                                                <label for="Raw Materials_unit">Raw Materials Unit <span class="validation-color">*</span></label>

                                                <select class="form-control select2" id="Raw Materials_unit" name="Raw Materials_unit" style="width: 100%;" tabindex="4">

                                                    <option value="">Select</option>

                                                    <?php

                                                    foreach ($uqc as $value)

                                                    {

                                                        echo "<option value='$value->uom - $value->description'" . set_select('brand', $value->id) . ">$value->uom - $value->description</option>";

                                                    }

                                                    ?>

                                                </select>

                                                <span class="validation-color" id="err_Raw Materials_unit"><?php echo form_error('Raw Materials_unit'); ?></span>

                                            </div>



                                            <div class="form-group">

                                                <label for="Raw Materials_subcategory">Select Subcategory <span class="validation-color">*</span></label><a href="" data-toggle="modal" data-target="#subcategory_modal" data-name="Raw Materials" class="pull-right new_subcategory">+ Add Subcategory</a>

                                                <select class="form-control select2" id="raw_material_subcategory" name="raw_material_subcategory" style="width: 100%;" tabindex="6">

                                                    <option value="">Select</option>

                                                </select>

                                                <span class="validation-color" id="err_raw_material_subcategory"></span>

                                            </div>

                                            <!--  <div class="form-group">

                                                     <label for="Raw Materials_model_no">Model Number</label>

                                                     <input type="text" class="form-control" id="raw_material_model_no" name="raw_material_model_no" value="<?php echo set_value('raw_material_model_no'); ?>" tabindex="8">

                                                     <span class="validation-color" id="err_raw_material_model_no"><?php echo form_error('raw_material_model_no'); ?></span>

                                                 </div> -->





                                            <div class="form-group">

                                                <label for="Raw Materials_tax">Select Raw Materials Tax <span class="validation-color">*</span></label><a href="" data-toggle="modal" data-target="#tax_modal" data-name="product" class="pull-right new_tax">+ Add Tax</a>

                                                <select class="form-control select2" id="product_tax" name="raw_material_tax" style="width: 100%;" tabindex="10">

                                                    <option value="0">Select</option>

                                                    <?php

                                                    foreach ($tax as $row)

                                                    {

                                                        echo "<option value='$row->tax_id-$row->tax_value'" . set_select('tax', $row->tax_id) . ">$row->tax_name</option>";

                                                    }

                                                    ?>

                                                </select>

                                                <span class="validation-color" id="err_raw_material_tax"><?php echo form_error('raw_material_tax'); ?></span>

                                                <div id="p-tax">

                                                    <input type="hidden" name="product_igst" id="raw_material_igst" value="0.00" />

                                                    <input type="hidden" name="product_cgst" id="raw_material_cgst" value="0.00" />

                                                    <input type="hidden" name="product_sgst" id="raw_material_sgst" value="0.00" />

                                                    <br>IGST : <span id="p_igst">0.00</span>

                                                    <br>CGST : <span id="p_cgst">0.00</span>

                                                    <br>SGST : <span id="p_sgst">0.00</span>

                                                </div>

                                            </div>



                                        </div>

                                    </div>

                                    <?php

                                    $array_varients = htmlspecialchars(json_encode($varients_key));

                                    ?>

                                    <input type="hidden" name="varients_array" id="varients_array" value="<?php echo $array_varients; ?>">

                                    <input type="hidden" name="table_data" id="table_data" >

                                    <input type="hidden" name="key_value" id="key_value" >

                                    <!-- -->

                                    <div class="col-sm-12">

                                        <div class="box-footer">

                                            <a data-toggle="tab" href="#menu1"><button type="button" id="" class="btn btn-info">Add Varients</button></a>



                                        </div>



                                    </div>





                            </div>

                        </div>

                        <div id="menu1" class="tab-pane fade">



                            <!--   <div class="col-md-12 mt-30">

                                  <a data-toggle="modal" data-target="#varientsModal" href="#">Add Varients</a>

                              </div> -->



                            <div class="well get_num">

                                <div class="row">

                                    <div class="col-sm-3">

                                        <div class="form-group">

                                            <label for="date">Varient Key<span class="validation-color">*</span></label>

                                            <select class="form-control select2 key_varient" id="varient_key_1" name="varient_key[]" style="width: 100%;">

                                                <option value="">Select</option>

                                                <?php

                                                foreach ($varients_key as $row)

                                                {

                                                    echo "<option value='$row->varients_id'" . set_select('category', $row->varients_id) . ">$row->varient_key</option>";

                                                }

                                                ?>

                                            </select>

                                            <p class="alert-custom">Please select Key and Value</p>

                                        </div>



                                    </div>

                                    <div class="col-sm-3">

                                        <div class="form-group">

                                            <label for="date">Varient Value<span class="validation-color">*</span></label>

                                            <select multiple="" class="form-control select2 value_varient" id="varient_value_1" name="varient_value[]" style="width: 100%;">



                                            </select>

                                            <span class="validation-color" id="err_voucher_date"></span>



                                        </div>

                                    </div>

                                    <div class="col-sm-3">

                                        <p class="add-more" id="add_more"><i class="fa fa-files-o" aria-hidden="true"> </i> Add More</p>

                                    </div>

                                </div>

                                <div id="newRows">

                                </div>

                            </div>

                            <div class="well">

                                <p id="err_add_more"></p>



                                <div class="row">

                                    <div class="col-sm-3">

                                        <div class="form-group">

                                            <label>Barcode Symbology</label> <span class="validation-color">*</span>



                                            <select class="form-control select2" id="barcode_symbology" name="barcode_symbology"  tabindex="5" style="width: 100%;">

                                                <option value="">Select</option>

                                                <option value="code25">Code25</option>

                                                <option value="code39">Code39</option>

                                                <option value="code128" selected="">Code128</option>

                                                <option value="ean13">EAN13</option>

                                                <option value="upca">UPC-A</option>



                                            </select>

                                            <span class="validation-color" id="err_barcode_symbology"></span>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            <div class="well">



                                <div class="form-group">

                                    <label class="form-group">genarate the combinations</label><br />

                                </div>

                                <div class="form-group">

                                    <input type="Button" id="getRows" name="combination" class="btn btn-info" value="manual" onclick="get_dynamic_table()" />

                                </div>

                                <div class="form-group">

                               <!-- <input type="radio" name="combination" value="automatic" id="automatic" />

                               <label  class="form-group">Automatic</label> -->

                                </div>

                                <!-- <button id="getRows" onclick="get_dynamic_table()">click</button><br><br> -->





                                <!-- <button id="getRows" type="button" onclick="get_dynamic_table()" class="btn btn-info">Manual</button><br><br> -->

                                <p id="getRowsValue">+ Add More</p>





                            </div>

                            <div class="table-scroll">





                                <table class="gen_table table table-bordered table-striped table-hover table-responsive no-footer dtr-inline collapsed">

                                    <thead>

                                        <tr id="genarate_table">



                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr class="generate_table_data">



                                        </tr>

                                    </tbody>

                                </table>



                            </div>



                            <div class="box-footer" style="display: none;">

                                <button  id="raw_material_modal_submit" class="btn btn-info">Add</button>

                                <span class="btn btn-default" id="cancel" onclick="cancel('product')">Cancel</span>

                            </div>



                        </div>









                        <!-- <button onclick="getvalues()">test</button> -->

                        </form>

                        <!-- <button type="button" onclick="autometic_listings()">test</button> -->





                    </div>

                </div>



                <p id="result"></p>

                <!-- <button id="finalresults">finalresults</button>    -->

            </div>

            <!-- /.box-body -->

        </div>

        <!--/.col (right) -->

</div>

<!-- /.row -->

</section>



<!-- /.content -->

</div>

<!-- /.content-wrapper -->

<!-- Modal -->



<?php

$this->load->view('layout/footer');

$this->load->view('tax/tax_modal');

$this->load->view('product/hsn_modal');

$this->load->view('category/category_modal');

$this->load->view('subcategory/subcategory_modal');

?>

<script type="text/javascript">



    $(document).ready(function () {

        $('#category_type').html("<option value='product'>Product</option>");

        $.ajax({

            url: base_url + 'purchase/get_raw_material_code',

            type: 'POST',

            success: function (data)

            {

                var parsedJson = $.parseJSON(data);

                var raw_material_code = parsedJson.raw_material_code;

                $("#code").val(raw_material_code);



                $(".modal-body #category_type").val('product');

                // $(".modal-body .type_div").hide();

            }

        });

    });

</script>



<script type="text/javascript">

    $(document).ready(function () {

        varients_array = JSON.parse($('#varients_array').val());
        var x = 1;
        var in_array_data = new Array();
        $('body').on('click', '#add_more', function ()
        {
            if ($(".value_varient ").val() == '') {
                alert_d.text ='please Select Values';
                PNotify.error(alert_d);
            } else {
                if ($('.key_varient').val() != "")

                {
                    x++;
                    var addVarients = "<div class='row mt-25'><div class='col-sm-3'> <select class='form-control select2 key_varient' id='varient_key_" + x + "' name='varient_key[]' style='width: 100%;'><option value=''>Select</option></select></div><div class='col-sm-3'><select multiple='' class='form-control select2 value_varient' id='varient_value_" + x + "' name='varient_value[]' style='width: 100%;'></select></div><div class='col-sm-3'><p class='removeDiv'><i class='fa fa-trash' aria-hidden='true'></i> Remove</p></div><br></div>";
                    if (x > varients_array.length) {
                        $("#err_add_more").text('cannot add more');
                    } else {
                        $("#err_add_more").text('');
                        $('#newRows').append(addVarients);
                    }
                    for (var i = 0; i < varients_array.length; i++)
                    {
                        var prev_val = $('#varient_key_' + (i + 1)).val()
                        if (prev_val != varients_array[i].varients_id) {
                            $('#varient_key_' + x).append('<option value="' + varients_array[i].varients_id + '">' + varients_array[i].varient_key + '</option>');
                        }
                    }
                    $('.key_varient').select2();
                    $('.value_varient').select2();
                    call_css();
                }
            }
        })

        $('body').on('click', '.removeDiv', function () {
            $(this).closest('.row').remove();
            x--;
        });
        $(document).on('change', '.key_varient', function (event)
        {

            var id = $(this).attr('id');

            var id_index = id.split("_");//get the x value

            var value = $(this).val();



            $.ajax({

                url: base_url + 'varients/get_varient_value',

                dataType: 'JSON',

                method: 'POST',

                data: {

                    'varient_id': value



                },

                success: function (result)

                {

                    var data = result;

                    $('#varient_value_' + id_index[2]).html('');

                    for (i = 0; i < data.length; i++)

                    {



                        $('#varient_value_' + id_index[2]).append('<option value="' + data[i].varients_value_id + '">' + data[i].varients_value + '</option>');

                    }

                }

            });



        });









    });

    function get_dynamic_table() {
        if ($(".value_varient").val() == "") {
            $('.alert-custom').show();
        } else {
            $('.alert-custom').hide();
            $("#getRowsValue").show();
            $('#genarate_table').empty();
            $(".generate_table_data").empty();
            $('.table-scroll').show();
            $('.box-footer').show();

            var numberOfColoumns = ($('.get_num select').length) / 2;
            for (t = 1; t <= numberOfColoumns; t++) {



                var rows = "<th>" + $('#varient_key_' + t + ' option:selected').text() + "</th>";

                var rowsText = $("select#varient_value_" + t + " option:selected").map(function () {

                    return '<option value=' + $(this).val() + ' >' + $(this).text() + '</option>';

                }).get();

                // var rowsVal = $("select#varient_value_"+t+" option:selected").map(function() {return '<option>'+$(this).val()+'</option>';}).get();



                var cols = "<td><select name='var_val[]' class='select2'>" + rowsText + "</select></td>";



                var remove = "<td>remove</td>";



                $('#genarate_table').append(rows);

                $(".generate_table_data").append(cols);
            }

            $('#genarate_table:last').append("<td class='removeTd'><b>Varient Code</b></td>");
            $('#genarate_table:last').append("<td class='removeTd'><b>Varient Name</b></td>");
            $('#genarate_table:last').append("<td class='removeTd'><b>Reordering Point</b></td>");
            $('#genarate_table:last').append("<td class='removeTd'><b>Purchase price</b></td>");
            $('#genarate_table:last').append("<td class='removeTd'><b>Selling Price</b></td>");
            $('#genarate_table:last').append("<td class='removeTd'><b>Unit</b></td>");
            $('#genarate_table:last').append("<td class='removeTd'><b>Quantity</b></td>");
            $('#genarate_table:last').append("<td class='removeTd'><b>Action</b></td>");
            for (var k = 0; k < $('.generate_table_data').length; k++) {
                $('.generate_table_data').eq(k).append("<td class='input_purchase'><input class='diff_varient' type='text'><p class='require_field'>required</p></td>");

                $('.generate_table_data').eq(k).append("<td class='input_purchase'><input  class='diff_varient' type='text'><p class='require_field'>required</p></td>");

                $('.generate_table_data').eq(k).append("<td class='input_purchase'><input placeholder='Reordering Point'  class='diff_varient' type='text'><p class='require_field'>required</p></td>");

                $('.generate_table_data').eq(k).append("<td class='input_purchase'><input class='diff_varient' type='text'><p class='require_field'>required</p></td>");

                $('.generate_table_data').eq(k).append("<td class='input_purchase'><input class='diff_varient' type='text'><p class='require_field'>required</p></td>");
                $('.generate_table_data').eq(k).append("<td class='input_purchase'><p class='require_field'>required</p><select class='diff_varient'> <?php

foreach ($uqc as $value)

{

    echo "<option value='$value->uom - $value->description'" . set_select('brand', $value->id) . ">$value->uom - $value->description</option>";

}

?></select></td>");

                $('.generate_table_data').eq(k).append("<td class='input_purchase'><input class='diff_varient' type='text'><p class='require_field'>required</p></td>");

                $('.generate_table_data').eq(k).append("<td class='removeTd'><i class='fa fa-trash'></i>remove</td>");









            }

        }

    }



    // row cloan

    $(document).on('click', '#getRowsValue', function () {

        var numberOfColoumns = ($('.get_num select').length) / 2;





        $('.generate_table_data:last').clone().insertAfter(".generate_table_data:last");



    })



    $(document).on('click', '.removeTd', function () {

        $(this).parent('tr').empty();

    })

    //row clone end

    function automatic_generate() {



        var numberOfColoumns = ($('.get_num select').length) / 2;



        for (t = 1; t <= numberOfColoumns; t++) {



            var rows = "<th>" + $('#varient_key_' + t + ' option:selected').text() + "</th>";

        }

    }

    function json_string() {

        var values = $("input[name='var_val[]']")

                .map(function () {

                    return $(this).val();

                }).get();

    }

    $("#raw_material_modal_submit").click(function () {



        var tbl2 = $('.gen_table tbody tr').each(function (e) {

            $(this).find(".diff_varient").each(function () {



                if ($(this).val() == '') {

                    $(this).closest('tr .diff_varient').next('.require_field').show();

                } else {

                    $(this).closest('tr .diff_varient').next('.require_field').hide();

                }



            });

        });



        if ($('.diff_varient').val() == "") {



            return false;

        } else {

            var json = html2json();

            var json1 = get_key_value();

            $("#table_data").val(json);

            $("#key_value").val(json1);

            $("#raw_material_modal_submit").submit();



        }









    });



    function html2json() {

        var json = '{';

        var otArr = [];



        var rowCount = $('#gen_table tbody tr').length;





        // var i = 1;

        var tbl2 = $('.gen_table tbody tr').each(function (e) {

            x = $(this).children();

            var itArr = [];

            var t = 0;

            var l = 0;

            var count = 0;

            var column = $('.gen_table tbody tr').length;



            $(this).find(".diff_varient").each(function () {





                varient_array = ['varient_code', 'varient_name', 'reordering_point', 'purchase_price', 'selling_price', 'varient_unit', 'quantity'];



                itArr.push('"' + varient_array[l] + '"' + ':' + '"' + this.value + '"');

                l++;

            });



            otArr.push('"' + e + '": {' + itArr.join(',') + '}');

        })



        json += otArr.join(",") + '}'



        return json;

    }



    function get_key_value() {



        var json = '{';

        var otArr = [];



        var rowCount = $('#gen_table tbody tr').length;





        // var i = 1;

        var tbl2 = $('.gen_table tbody tr').each(function (e) {

            x = $(this).children();

            var itArr = [];

            var t = 0;

            var l = 0;

            var count = 0;

            x.each(function () {

                count++;

                if ($(this).find(".select2 option:selected").text() != "") {

                    t++;

                    var r = $('#varient_key_' + t + ' option:selected').val();

                    itArr.push('"' + r + '"' + ':' + '"' + $(this).find('option:selected').val() + '"');

                }



            });

            otArr.push('"' + e + '": {' + itArr.join(',') + '}');

        })

        json += otArr.join(",") + '}'



        return json;



    }

    function autometic_listings() {







    }



</script>



<script src="<?php echo base_url('assets/js/product/') ?>product.js"></script>



