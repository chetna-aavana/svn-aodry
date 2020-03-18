<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('layout/header');
?>

<div class="content-wrapper">
    <section class="content-header"></section>

    <div class="fixed-breadcrumb">
        <ol class="breadcrumb abs-ol">
            <li><a href="<?php echo base_url('auth/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url('product/varient_list'); ?>">Product</a></li>
            <li class="active">Generate Barcode</li>
        </ol>
    </div>

    <!-- Main content -->
    <section class="content mt-50">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Generate Barcode</h3>
                        <a class="btn btn-sm btn-default pull-right back_button" href1="<?php echo base_url('barcode'); ?>">Back </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">                        
                            <form role="form" id="form" method="post" action="<?php echo base_url('barcode/print_barcode_list'); ?>" target="_blank">
                                <div class="row">
                                    <div class="col-sm-12">                                  
                                            <div class="form-group">
                                                <label>Product Name:- </label> <?php echo $posts[0]->product_name." ( ".$posts[0]->item_code." )"?>
                                                <input type='hidden' name='item_id' value="<?php echo $posts[0]->product_id;?>">
                                                <input type='hidden' name='item_barcode_symbology' value="<?php echo $posts[0]->barcode_symbology;?>">
                                                <input type='hidden' name='item_type' value="  <?php echo $posts[0]->item_type;?>">
                                                <input type='hidden' name='item_code' value='<?php echo $posts[0]->item_code;?>'>
                                                <input type='hidden' name='item_name' value='<?php echo $posts[0]->product_name;?>'>
                                                <input type='hidden' name='item_selling_price' value='<?php echo $posts[0]->product_selling_price;?>'>
                                                <input type='hidden' name='item_unit' value='<?php echo $posts[0]->varient_unit;?>'>
                                                <input type='hidden' name='item_category' value='<?php echo $posts[0]->category_name;?>'>
                                                <input type='hidden' name='item_sku' value='<?php echo $posts[0]->product_sku;?>'>  
                                                <input type='hidden' name='item_category_code' value='<?php echo $posts[0]->category_code;?>'>
                                            </div>                                            
                                        </div>
                                        </div>
                                       
                                        <div class="row">
                                        <div class="col-sm-2">
                                        <div class="form-group">                                            
                                        <label>Quantity <span class="validation-color">*</span> :-</label>
                                        <input type='text' name='item_quantity' class="form-control"  id='item_quantity' value='1'>
                                            </div>
                                        </div>


                                    
                                <?php 
                                $style = $posts[0]->bar_style;
                                $select_50 = '';
                                $select_40 = '';
                                $select_30 = '';
                                $select_24 = '';
                                $select_10 = '';
                                $style_ore = 'margin-top: 10px; display: none;';
                              
                              if($style == 50){
                                $select_50 = 'selected';
                                $style_ore = '';
                              }

                              if($style == 40){
                                $select_40 = 'selected';
                              }

                              if($style == 30){
                                $select_30 = 'selected';
                              }

                              if($style == 24 || $style == 20){
                                $select_24 = 'selected';
                              }
                              
                              if($style == 10){
                                 $select_10 = 'selected';
                              }

                                ?>
                               
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Style</label> <span class="validation-color">*</span>
                                            <select class="form-control select2" id="style" name="style" tabindex="5">
                                                <option value="">Select</option>
                                                <option value="40" <?php echo $select_40;?>>40 per sheet</option>
                                                <option value="30" <?php echo $select_30;?>>30 per sheet</option>
                                                <option value="24" <?php echo $select_24;?>>24 per sheet</option>
                                                <option value="10" <?php echo $select_10;?>>10 per sheet</option>
                                               <!-- <option value="50" <?php //echo $select_50;?>>continuous_feed</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4" style="margin-top:30px; ">
                                    <div class="form-group">  
                                    <?php 
                                    if($posts[0]->selling_price == 'Yes'){
                                        $selling_price_chk = 'checked="checked"';
                                    }else{
                                        $selling_price_chk = '';
                                    }

                                    if($posts[0]->unit == 'Yes'){
                                        $unit_chk = 'checked="checked"';
                                    }else{
                                        $unit_chk = '';
                                    }

                                    if($posts[0]->category == 'Yes'){
                                        $category_chk = 'checked="checked"';
                                    }else{
                                        $category_chk = '';
                                    }

                                    if($posts[0]->sku == 'Yes'){
                                        $sku_chk = 'checked="checked"';
                                    }else{
                                        $sku_chk = '';
                                    }

                                ?>            
                                        <input name="unit_chk" type="checkbox" id="unit_chk" value="1" <?php echo $unit_chk;?> style="display:inline-block;" />
                                        <label for="unit" class="padding05">Unit</label>
                                        <input name="price_chk" type="checkbox" id="price_chk" value="1" <?php echo $selling_price_chk;?> style="display:inline-block;" />
                                        <label for="price" class="padding05">Selling Price</label>
                                        <input name="category_chk" type="checkbox" id="category_chk" value="1" <?php echo $category_chk;?> style="display:inline-block;" />
                                        <label for="category" class="padding05">Category</label>
                                        <input name="sku_chk" type="checkbox" id="sku_chk" value="1" <?php echo $sku_chk;?> style="display:inline-block;" />
                                        <label for="product_sku" class="padding05">SKU</label>
                                        
                                    </div>
                                </div>
                                    <div class="cf-con" style="<?php echo $style_ore;?>">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Width</label>
                                                <input type="text" class="form-control" name="cf_width" id="cf_width" placeholder="width">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Height</label>
                                                <input type="text" class="form-control" name="cf_height" id="cf_height" placeholder="height">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Orientation</label>
                                                <select class="form-control select2" id="cf_orientation" name="cf_orientation" style="width: 100%">
                                                    <option value="">Select Orientation</option>
                                                    <option value="0">Portrait</option>
                                                    <option value="1">Landscape</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <!-- <hr>
                                <div class="col-sm-12">
                                    <div class="form-group">  
                                    <?php 
                                    if($posts[0]->selling_price == 'Yes'){
                                        $selling_price_chk = 'checked="checked"';
                                    }else{
                                        $selling_price_chk = '';
                                    }

                                    if($posts[0]->unit == 'Yes'){
                                        $unit_chk = 'checked="checked"';
                                    }else{
                                        $unit_chk = '';
                                    }

                                    if($posts[0]->category == 'Yes'){
                                        $category_chk = 'checked="checked"';
                                    }else{
                                        $category_chk = '';
                                    }

                                    if($posts[0]->sku == 'Yes'){
                                        $sku_chk = 'checked="checked"';
                                    }else{
                                        $sku_chk = '';
                                    }

                                ?>            
                                        <input name="unit_chk" type="checkbox" id="unit_chk" value="1" <?php echo $unit_chk;?> style="display:inline-block;" />
                                        <label for="unit" class="padding05">Unit</label>
                                        <input name="price_chk" type="checkbox" id="price_chk" value="1" <?php echo $selling_price_chk;?> style="display:inline-block;" />
                                        <label for="price" class="padding05">Selling Price</label>
                                        <input name="category_chk" type="checkbox" id="category_chk" value="1" <?php echo $category_chk;?> style="display:inline-block;" />
                                        <label for="category" class="padding05">Category</label>
                                        <input name="sku_chk" type="checkbox" id="sku_chk" value="1" <?php echo $sku_chk;?> style="display:inline-block;" />
                                        <label for="product_sku" class="padding05">SKU</label>
                                        
                                    </div>
                                </div> -->
                       
                        <div class="box-footer">
                            <button type="submit" id="print" name="print" value="print" class="btn btn-info" target="_blank">Get Barcode</button>
                            <span class="btn btn-default" id="sale_cancel" onclick="cancel('barcode')">Cancel</span>
                        </div>
                    </div>
                </form>
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
?>
<script type="text/javascript">
    var sales_data = new Array();
    var mapping = {};
    <?php 
        if ($this->input->post('print')){
    ?>
        $(window).load(function () {
            $('html, body').animate({
                scrollTop: ($("#barcode-con").offset().top) - 15
            }, 1000);
        });
    <?php } ?>

    if (typeof count_data === 'undefined' || count_data === null){
        var count_data = 0;
    }

    var table_index = count_data;
    // get items to table starts
    $('#add_item').autoComplete({ 
                    minChars: 1,
                    cache: false,
                    source: function (term, suggest){
                    term = term.toLowerCase();
                    $.ajax({ url: base_url + "barcode/get_product_suggestions/" + term,
                             type: "GET",
                             dataType: "json",
                             success: function (data){
                             var suggestions = [];
                             for (var i = 0; i < data.length; ++i) {
                                suggestions.push(data[i].item_code + ' ' + data[i].item_name);
                                mapping[data[i].item_code] = data[i].item_id + '-' + data[i].item_type;
                             }
                             suggest(suggestions);
                            }
                        })
                },
                onSelect: function (event, ui){
                    var code = ui.split(' ');                   
                    console.log(mapping[code[0]]);
                    $.ajax({ url: base_url + 'barcode/get_table_items/' + mapping[code[0]],
                             type: "GET",
                             dataType: "JSON",
                             success: function (data){
                                add_row(data);
                                call_css();
                                $('#add_item').val('')
                            }
                        })
                }
            });

//delete rows

    $("#sales_table_body").on("click", "a.deleteRow", function (event){
        deleteRow($(this).closest("tr"));
       $(this).closest("tr").remove();
    });

    $("#sales_table_body").on("change blur", 'input[name^="item_quantity"]', function (event){
        calculateRow($(this).closest("tr"));
    });

    $('#style').change(function (e) {
        if ($(this).val() == 50) {
            $('.cf-con').slideDown();
        } else {
            $('.cf-con').slideUp();
        }

    });

    var val_sty = <?php echo $style = $posts[0]->bar_style;?>;
    if (val_sty == 50) {
            $('.cf-con').slideDown();
        } else {
            $('.cf-con').slideUp();
        }

//function to add new row to datatable

    function add_row(data){

        console.log(data);
        var flag = 0;
        var item_id = data.item_id;
        var item_barcode_symbology = data[0].item_barcode_symbology;
        var item_type = data.item_type;
        var branch_id = data.branch_id;
        var item_code = data[0].item_code;
        var item_unit = data[0].varient_unit;
        var item_category = data[0].category_name;
        var item_name = data[0].item_name;
        var item_selling_price = data[0].selling_price;
        var item_sku = data[0].product_sku;
        var item_serial_no = data[0].product_serail_no;
        var item_varient_name = data[0].varient_name;
        var temp = {
            "item_id": item_id,
            "item_type": item_type,
            "item_barcode_symbology": item_barcode_symbology,
        };

        table_index = +table_index;
        var data_item = {
            "item_id": item_id,
            "item_barcode_symbology": item_barcode_symbology,
            "item_type": item_type,
            "item_code": item_code,
            "item_unit": item_unit,
            "item_category": item_category,
            "item_selling_price": item_selling_price,
            "item_name": item_name,
            "item_varient_name": item_varient_name,
            "item_key_value": table_index,
            "item_sku": item_sku,
            "item_serial_no": item_sku
        };

        var newRow = $("<tr id=" + table_index + ">");

        var cols = "";

        cols += "<td><a class='deleteRow'> <img src='" + base_url + "assets/images/bin_close.png' /> </a><input type='hidden' name='item_key_value'  value=" + table_index + "><input type='hidden' name='item_id' value=" + item_id + "><input type='hidden' name='item_barcode_symbology' value=" + item_barcode_symbology + "><input type='hidden' name='item_type' value=" + item_type + "><input type='hidden' name='item_code' value='" + item_code + "'><input type='hidden' name='item_name' value='" + item_name + "'><input type='hidden' name='item_selling_price' value='" + item_selling_price + "'><input type='hidden' name='item_unit' value='" + item_unit + "'><input type='hidden' name='item_category' value='" + item_category + "'><input type='hidden' name='item_sku' value='" + item_sku + "'><input type='hidden' name='item_serial_no' value='" + item_serial_no + "'></td>";

        if (item_type == 'product')
            
            cols += "<td>" +  item_code + "</td>";
            cols += "<td>" + item_name + "</td>";

        cols += "<td>" + "<input type='text' class='form-control form-fixer text-center float_number' value='1' data-rule='quantity' name='item_quantity'>" + "</td>";

        cols += "</tr>";

        newRow.append(cols);
        $("#sales_table_body").append(newRow);
        table_index++;
        calculateRow(newRow);
    }

    function calculateRow(row){

        var key = +row.index();
        var table_index = +row.find('input[name^="item_key_value"]').val();
        var item_quantity = +row.find('input[name^="item_quantity"]').val();
        var item_id = +row.find('input[name^="item_id"]').val();
        var item_barcode_symbology = row.find('input[name^="item_barcode_symbology"]').val();
        var item_type = row.find('input[name^="item_type"]').val();
        var item_code = row.find('input[name^="item_code"]').val();
        var item_name = row.find('input[name^="item_name"]').val();
        var item_selling_price = row.find('input[name^="item_selling_price"]').val();
        var item_unit = row.find('input[name^="item_unit"]').val();
        var item_category = row.find('input[name^="item_category"]').val();
        var item_sku = row.find('input[name^="item_sku"]').val();
        var item_serial_no = row.find('input[name^="item_serial_no"]').val();
        if (sales_data[key] == null){
                var temp = {
                "item_id": item_id,
                "item_barcode_symbology": item_barcode_symbology,
                "item_type": item_type,
                "item_code": item_code,
                "item_selling_price": item_selling_price,
                "item_name": item_name,
                "item_unit": item_unit,
                "item_category": item_category,
                "item_key_value": table_index,
                "item_sku": item_sku,
                "item_serial_no": item_serial_no
            };
            sales_data[key] = temp
        }

        sales_data[key].item_quantity = item_quantity;
        sales_data[key].item_key_value = table_index;
        var table_data = JSON.stringify(sales_data);
        $('#table_data').val(table_data);
    }

    function deleteRow(row){
        var table_index = +row.find('input[name^="item_key_value"]').val();     
         var sales_data_temp = new Array();         
        for (var i = 0; i < sales_data.length; i++){           
            if (sales_data[i] != null && sales_data[i].item_key_value == table_index){
                sales_data.splice(i, 1)               
            }
        }
        console.log(sales_data);
        var table_data = JSON.stringify(sales_data);       
        $('#table_data').val(table_data)
    }


    $(document).ready(function (){
        $("#print").click(function (event){
            var print_style = $("#style").val();
            var width = $("#cf_width").val();
            var height = $("#cf_height").val();
            var orientation = $("#cf_orientation").val();  
            var item_quantity = $("#item_quantity").val();     

                   
             if(item_quantity == '' ){
                alert_d.text ='Please Enter quantity';
                PNotify.error(alert_d);
                return false;
            }

            if(print_style == '' ){
                alert_d.text ='Please Select Style';
                PNotify.error(alert_d);
                return false;
            }

            if(print_style == 50 && width == ''){
                alert_d.text ='Please Select Width';
                PNotify.error(alert_d);
                return false;
            }

            if(print_style == 50 && height == ''){
                alert_d.text ='Please Select Height';
                PNotify.error(alert_d);
                return false;
            }

            if(print_style == 50 && orientation == ''){
                alert_d.text ='Please Select Orientation';
                PNotify.error(alert_d);
                return false;
            }
            
            return true;
        });
    });

</script>

