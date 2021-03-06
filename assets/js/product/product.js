if (typeof product_ajax === 'undefined' || product_ajax === null) {
    var product_ajax = "no";
}
$(document).on("click", ".open_product_modal", function () {
    var selected = 'current';
    var module_id = $("#product_module_id").val();
    var privilege = $("#privilege").val();
    $.ajax({
        url: base_url + 'general/generate_date_reference',
        type: 'POST',
        data: {
            date: selected,
            privilege: privilege,
            module_id: module_id
        },
        success: function (data) {
            var parsedJson = $.parseJSON(data);
            var product_code = parsedJson.reference_no;
            $(".modal-body #product_code").val(product_code);
            $('.modal-body #category_type').html('');
            $('.modal-body #category_type').append('<option value="product" selected>Product</option>');
            if (parsedJson.access_settings[0].invoice_readonly == "yes") {
            $('#product_code').attr('readonly', 'true');
            }
        }
    });
});
$(document).ready(function () {
    var name_regex = /^[a-zA-Z\[\]/@()#$%&\-.+,\d\-_\s\']+$/;
    var hsn_regex = /^[0-9]+[0-9 ]+$/;
    var product_name_exist = 0;

    $('#product_option').on('change',function(){
        var id = $(this).val();
        var batch = $(this).find('option:selected').attr('batch');
        var serial = $(this).find('option:selected').attr('serial');
        var code = $(this).find('option:selected').attr('code');
        batch = parseInt(batch) + 1;
        $('[name=batch_serial]').val(batch);
        $('[name=product_code]').val(code);
        $('[name=product_scheme_no]').val(batch);
        if(batch < 10 ) batch = '0'+batch;
        $('#product_batch').val("BATCH-" + batch);
        $('[name=batch_parent_product_id]').val(id);
        console.log(id,batch,serial);
    }) 

    $("#product_modal_edit").click(function (event) {
        var code = $('#product_code').val();
        var name = $('[name=product_name_edit]').val();
        var category = $('#product_category').val();
        var subcategory = $('#product_subcategory').val();
        var hsn_sac_code = $('#product_hsn_sac_code').val();
        var unit = $('#product_unit').val();
        var product_type = $('#product_type').val();

        if (product_name_exist == 1) {
            $("#err_product_name").text(name + " name already exists!");
            return false;
        }
        if (code == null || code == "") {
            $("#err_product_code").text("Please Enter product Code.");
            return false;
        } else {
            $("#err_product_code").text("");
        }
        if (!code.match(name_regex)) {
            $('#err_product_code').text("Please Enter Valid product Code.");
            return false;
        } else {
            $("#err_product_code").text("");
        }
        if (name == null || name == "") {
            $("#err_product_name").text("Please Enter Product Name.");
            return false;
        } else {
            $("#err_product_name").text("");
        }
        /*if (!name.match(name_regex)) {
            $('#err_product_name').text("Please Enter Valid Product Name ");
            return false;
        } else {
            $("#err_product_name").text("");
        }*/
        if (product_type == "") {
            $("#err_product_type").text("Select the Product Type.");
            return false;
        } else {
            $("#err_product_type").text("");
        }

        if (category == "" || category == null) {
            $("#err_product_category").text("Select the Category.");
            return false;
        } else {
            $("#err_product_category").text("");
        }
        if (unit == "") {
            $("#err_product_unit").text("Select the unit.");
            return false;
        } else {
            $("#err_product_unit").text("");
        }
        if (hsn_sac_code == "" || hsn_sac_code==null) {
            $("#err_product_hsn_sac_code").text("Select the HSN Code.");
            return false;
        } else {
            $("#err_product_hsn_sac_code").text("");
        }
         if (!hsn_sac_code.match(hsn_regex)) {
            $('#err_product_hsn_sac_code').text("Please Enter Valid Product HSN Code");
            return false;
        } else {
            $("#err_product_hsn_sac_code").text("");
        }
    });
    
    $("#product_modal_submit").click(function (event) {
        var code = $('#product_code').val();
        var name = $('[name=product_name]').val();
        var product_brand = $('[name=product_brand]').val();
        var category = $('#product_category').val();
        var subcategory = $('#product_subcategory').val();
        var hsn_sac_code = $('#product_hsn_sac_code').val();
        var unit = $('#product_unit').val();
        var product_type = $('#product_type').val();
        var product_discount = $('#product_discount').val();
        var allowedFiles = [".png", ".jpg", ".gif","jpeg"];
        var fileUpload = $("#product_image");
        var lblError = $("#lblError");
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
        

        if (product_name_exist == 1) {
            $("#err_product_name").text(name + " name already exists!");
            return false;
        }
        if (code == null || code == "") {
            $("#err_product_code").text("Please Enter product Code.");
            return false;
        } else {
            $("#err_product_code").text("");
        }
        if (!code.match(name_regex)) {
            $('#err_product_code').text("Please Enter Valid product Code.");
            return false;
        } else {
            $("#err_product_code").text("");
        }
        if (name == null || name == "") {
            $("#err_product_name").text("Please Enter Product Name.");
            return false;
        } else {
            $("#err_product_name").text("");
        }
        if (!name.match(name_regex)) {
            $('#err_product_name').text("Please Enter Valid Product Name ");
            return false;
        } else {
            $("#err_product_name").text("");
        }
        if (product_type == "") {
            $("#err_product_type").text("Select the Product Type.");
            return false;
        } else {
            $("#err_product_type").text("");
        }

        if (category == "" || category == null) {
            $("#err_product_category").text("Select the Category.");
            return false;
        } else {
            $("#err_product_category").text("");
        }
        if (unit == "") {
            $("#err_product_unit").text("Select the unit.");
            return false;
        } else {
            $("#err_product_unit").text("");
        }
        if (hsn_sac_code == "" || hsn_sac_code==null) {
            $("#err_product_hsn_sac_code").text("Select the HSN Code.");
            return false;
        } else {
            $("#err_product_hsn_sac_code").text("");
        }
         if (!hsn_sac_code.match(hsn_regex)) {
            $('#err_product_hsn_sac_code').text("Please Enter Valid Product HSN Code");
            return false;
        } else {
            $("#err_product_hsn_sac_code").text("");
        }

        if($("#product_image").val() != ''){
            if (!regex.test(fileUpload.val().toLowerCase())) {
                lblError.html("Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.");
                return false;
            }else{
                lblError.html("");
            }
        }else{
            lblError.html("");
        }

        var formData = new FormData();
        formData.append('product_code', $('#product_code').val());
        formData.append('product_name', $('[name=product_name]').val());
        if($('#product_brand')) {
           formData.append('product_brand', $('[name=product_brand]').val());
        }
        formData.append('product_quantity', $('#product_quantity').val());
        formData.append('product_category', $('#product_category').val());
        formData.append('product_subcategory', $('#product_subcategory').val());
        formData.append('product_hsn_sac_code', $('#product_hsn_sac_code').val());
        formData.append('product_price', $('#product_price').val());
        formData.append('product_unit', $('#product_unit').val());
        formData.append('product_tax', $('#product_tax').val());
        formData.append('tds_tax_product', $('#tds_tax_product').val());
        formData.append('product_tds_code', $('#product_tds_code').val());
        formData.append('tds_id', $('#tds_id').val());
        formData.append('product_discount', $('#product_discount').val());
        formData.append('product_serial', $('#product_serial').val());
        formData.append('product_selling_price', $('#product_selling_price').val());
        formData.append('product_mrp' , $('#product_mrp').val());
        formData.append('gst_tax_product', $('#gst_tax_product').val());
        formData.append('product_gst_code', $('#product_gst_code').val());
        formData.append('product_description', $('#product_description').val());
        formData.append('product_batch', $('#product_batch').val());
        formData.append('batch_serial', $('[name=batch_serial]').val());
        formData.append('batch_parent_product_id', $('[name=batch_parent_product_id]').val());
        formData.append('product_type', $('#product_type').val());
        formData.append('product_sku' , $('#product_sku').val());
        if($('#product_opening_stock')) {
            formData.append('product_opening_stock' , $('#product_opening_stock').val());
        }
       
        formData.append('asset' , 'N');
        formData.append('varient' , 'N');
        formData.append('product_image', $('input[type=file]')[0].files[0]);
        if (product_ajax == "yes") {
            // console.log($('#product_code').val())
            $.ajax({
                url: base_url + 'product/add_product_ajax',
                dataType: 'JSON',
                method: 'POST',
                data: formData,
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false,
                    // {
                    // 'product_code': $('#product_code').val(),
                    // 'product_name': $('[name=product_name]').val(),
                    // 'product_quantity': $('#product_quantity').val(),
                    // 'product_category': $('#product_category').val(),
                    // 'product_subcategory': $('#product_subcategory').val(),
                    // 'product_hsn_sac_code': $('#product_hsn_sac_code').val(),
                    // 'product_price': $('#product_price').val(),
                    // 'product_unit': $('#product_unit').val(),
                    // 'product_tax': $('#product_tax').val(),
                    // 'tds_tax_product' : $('#tds_tax_product').val(),
                    // 'product_tds_code': $('#product_tds_code').val(),
                    // 'tds_id': $('#tds_id').val(),
                    // 'product_type': $('#product_type').val(),
                    // 'product_batch': $('#product_batch').val(),
                    // 'product_sku' : $('#product_sku').val(),
                    // 'product_serial':$('#product_serial').val(),
                    // 'product_selling_price': $('#product_selling_price').val(),
                    // 'product_mrp' : $('#product_mrp').val(),
                    // 'gst_tax_product' : $('#gst_tax_product').val(),
                    // 'product_gst_code' : $('#product_gst_code').val(),
                    // 'product_description' : $('#product_description').val(),
                    // 'product_unit' : $('#product_unit').val(),
                    // 'asset' : 'N',
                    // 'varient' : 'N'
                    // }   
                // },
                 beforeSend: function(){
                    // Show image container
                     $("#product_inventory_modal #loader").show();
                },
                success: function (result) {  
                  $("#product_inventory_modal #loader").hide();                  
                    var product_name = result['product_name'];
                    var product_id = result['product_id'];
                    var state_id = $('#billing_state').val();
                    var country_id = $('#billing_country').val();

                    $('#input_purchase_code').val(product_name);
                    var addRow = true;                    
                    if($(document).find('#brand_id').length > 0){
                        var brand_id = $(document).find('#brand_id').val();
                        if(brand_id != 0 && brand_id != product_brand){
                            addRow = false;
                        }
                    }

                    if(addRow){
                        $.ajax({
                            url: base_url + 'purchase/get_table_items/' + product_id + '-product-yes-gst',
                            type: "GET",
                            dataType: "JSON",
                            success: function (data) {
                                $('#table-total').show();
                                add_row(data);
                                $('#input_purchase_code').val('');
                                $('[name=service_hsn_sac_code]').val('');
                            }
                        });
                    }
                    $("#productForm")[0].reset();
                    // $("#product_unit").change();
                    // $("#product_category").change();
                    // $("#product_subcategory").change();
                    $("#product_unit").select2().val('').trigger('change.select2');
                    $("#product_category").select2().val('').trigger('change.select2');
                    $("#product_subcategory").select2().val('').trigger('change.select2');
                    $("#product_tax").select2().val('0').trigger('change.select2');
                    $("#item_modal").modal("hide");
                    $('body').css('position','relative');
                    // $("#product_tax").change();
                }
            });
        }
    });

    $("#ajax_product_code").on("blur", function (event) {
        var code = $('#ajax_product_code').val();
        if (code == null || code == "") {
            $("#err_product_code").text("Please Enter Code.");
            return false;
        } else {
            $("#err_product_code").text("");
        }
        if (!code.match(name_regex)) {
            $('#err_product_code').text("Please Enter Valid Code.");
            return false;
        } else {
            $("#err_product_code").text("");
        }
    });
    
    $("[name=product_name_edit]").on("blur", function (event) {
        var product_name = $('[name=product_name_edit]').val();
        var product_id = $('#product_id').val();
        
        if (product_name == null || product_name == "") {
            $("#err_product_name").text("Please Enter Product Name.");
            return false;
        } else {
            $("#err_product_name").text("");
        }
        if (!product_name.match(name_regex)) {
            $('#err_product_name').text("Please Enter Valid Product Name ");
            return false;
        } else {
            $("#err_product_name").text("");
        }

        $.ajax({
            url: base_url + 'product/get_check_product',
            dataType: 'JSON',
            method: 'POST',
            data: {
                'product_name': product_name,
                'product_id': product_id
            },
            success: function (result) {
               
                if (result.length > 0) {
                    var num = result[0].num;
                    num = parseInt(num) + 1;
                    $('#product_batch').val("BATCH-0" + num);
                    
                } 
            }
        });
    });
    $("#product_category").on("change", function (event) {
         var product_code = $('#product_code').val();
         var category_id = $('#product_category').val();
          $.ajax({
            url: base_url + 'product/get_product_sku',
            dataType: 'JSON',
            method: 'POST',
            data: {
                'product_code': product_code,
                'category_id': category_id
            },
            success: function (result) {
                $("#product_sku").val(result);
            }
        });
    })
    var flag_exit = 0;
    var proXhr = null;
    $("[name=product_name]").on("blur", function (event) {
        var product_name = $('[name=product_name]').val();
        var product_id = $('#product_id').val();
        
        if (product_name == null || product_name == "") {
            $("#err_product_name").text("Please Enter Product Name.");
            return false;
        } else {
            $("#err_product_name").text("");
        }
        if (!product_name.match(name_regex)) {
            $('#err_product_name').text("Please Enter Valid Product Name ");
            return false;
        } else {
            $("#err_product_name").text("");
        }
        
        proXhr = $.ajax({
            url: base_url + 'product/get_check_product',
            dataType: 'JSON',
            method: 'POST',
            data: {
                'product_name': product_name,
                'product_id': product_id
            },
            beforeSend : function()    {           
                if(proXhr != null) {
                    proXhr.abort();
                }
            },
            success: function (result) {
                if (result.length > 0) {
                    
                    var num = result[0].num;
                    num = parseInt(num) + 1;
                    $('#product_batch').val("BATCH-0" + num);
                    var batch = parseInt(result[0].batch_serial) + 1;
                    $('[name=batch_serial]').val(batch);
                    $('[name=batch_parent_product_code]').val(result[0].product_code);
                    $('[name=product_scheme_no]').val(batch);
                    if(batch < 10 ) batch = '0'+batch;
                    $('#product_batch').val("BATCH-" + batch);
                    $('[name=batch_parent_product_id]').val(result[0].product_id);

                    $("#err_product_name").text(product_name + " name already exists! Changed Batch!");
                    $("#product_type").val(result[0].product_type).change();
                    $("#product_hsn_sac_code").val(result[0].product_hsn_sac_code);
                    $("#subcategory_hidden").val(result[0].product_subcategory_id);
                    $("#product_category").val(result[0].product_category_id).change();
                    $("#product_unit").val(result[0].product_unit_id).change();
                    $("#gst_tax_product").val(result[0].product_gst_id).change();
                    //$("#service_gst_code").val(result[0].product_gst_value);
                    $("#tds_tax_product").val(result[0].product_tds_id).change();
                    //$("#service_tds_code").val(result[0].product_tds_value);
                    //$("#product_subcategory").val(result[0].product_subcategory_id).change();
                    //$("#product_subcategory").find('select').val(result[0].product_subcategory_id);
                    //  $('#product_subcategory').val(result[0].product_subcategory_id).attr("selected", "selected");
                    //$('#product_subcategory option').eq(1).prop('selected',true);
                    //$('#product_subcategory option[value='+result[0].product_subcategory_id+']').attr('selected','selected');
                    //$("#product_subcategory [value='"+result[0].product_subcategory_id+"']").attr("selected","selected");
                    $('.product_tcs').addClass('disable_div');
                    $('.product_gst').addClass('disable_div');
                    $('.product_uom').addClass('disable_div');
                    $('.product_category').addClass('disable_div');
                    $('.product_subcategory').addClass('disable_div');
                    $('.produc_hsn').addClass('disable_div');
                    $('.produc_type').addClass('disable_div');
                    $('.product_name').addClass('disable_div');
                    flag_exit = 1;
                } else if(flag_exit == 1) {
                    $("#err_product_name").text("");
                    $('#product_batch').val("BATCH-01");
                    $('[name=batch_parent_product_code]').val(0);
                    $('[name=batch_parent_product_id]').val(0);
                    $('[name=product_scheme_no]').val(1);
                    $("#product_type").val("").change();
                    $("#product_hsn_sac_code").val("");
                    $("#product_category").val("").change();
                    $("#product_subcategory").val("").change();
                    $("#product_unit").val("").change();
                    $("#gst_tax_product").val("").change();
                    $("#subcategory_hidden").val("");
                    //$("#service_gst_code").val(result[0].product_gst_value);
                    $("#tds_tax_product").val("").change();
                    $('.product_tcs').removeClass('disable_div');
                    $('.product_gst').removeClass('disable_div');
                    $('.product_uom').removeClass('disable_div');
                    $('.product_category').removeClass('disable_div');
                    $('.product_subcategory').removeClass('disable_div');
                    $('.produc_hsn').removeClass('disable_div');
                    $('.produc_type').removeClass('disable_div');
                    $('.product_name').removeClass('disable_div');
                    flag_exit = 0;
                }
            }
        });
    });
    /* $("#product_name").on("blur", function (event) {
     
     var product_name = $('#product_name').val();
     
     var product_id = $('#product_id').val();
     
     
     
     $.ajax({
     
     url: base_url + 'product/get_check_product',
     
     dataType: 'JSON',
     
     method: 'POST',
     
     data: {
     
     'product_name': product_name,
     
     'product_id': product_id
     
     },
     
     success: function (result) {
     
     if (result[0].num > 0) {
     
     $("#err_product_name").text(product_name + " name already exists!");
     
     product_name_exist = 1;
     
     } else {
     
     $("#err_product_name").text("");
     
     product_name_exist = 0;
     
     }
     
     }
     
     });
     
     }); */

    $("#hsn_sac_code").on("blur", function (event) {
        if ($('#hsn_sac_code').val() != "") {
            var hsn_sac_code = $('#hsn_sac_code').val();
            if (hsn_sac_code == null || hsn_sac_code == "") {
                $("#err_product_hsn_sac_code").text("Please Enter HSN/SAC Code");
                return false;
            } else {
                $("#err_product_hsn_sac_code").text("");
            }
            if (!hsn_sac_code.match(hsn_regex)) {
                $('#err_product_hsn_sac_code').text("Please Enter Valid HSN/SAC Code.");
                return false;
            } else {
                $("#err_product_hsn_sac_code").text("");
            }
        }
    });
    
    // $("#product_category").change(function (event) {
    //     var category = $('#product_category').val();
    //     if (category == "" || category == null) {
    //         $("#err_product_category").text("Please Select Category.");
    //         return false;
    //     } else {
    //         $("#err_product_category").text("");
    //     }
    // });
    
    $('#product_category').change(function () {
        var id = $(this).val();
        var sub_cat_id = $('#subcategory_hidden').val();
        $('#product_subcategory').html('');
        $('#product_subcategory').append('<option value="">Select</option>');
        $.ajax({
            url: base_url + 'product/get_subcategory',
            method: "POST",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function (data) {
                for (i = 0; i < data.length; i++) {
                    if (sub_cat_id == data[i].sub_category_id) {
                        $('#product_subcategory').append('<option value="' + data[i].sub_category_id + '" selected>' + data[i].sub_category_name + '</option>');
                    } else {
                        $('#product_subcategory').append('<option value="' + data[i].sub_category_id + '">' + data[i].sub_category_name + '</option>');
                    }
                }
            }
        });
    });
    // $("#product_subcategory").change(function (event) {
    //     var subcategory = $('#product_subcategory').val();
    //     if (subcategory == "") {
    //         $("#err_product_subcategory").text("Select the Subcategory.");
    //         return false;
    //     } else {
    //         $("#err_product_subcategory").text("");
    //     }
    // });
    $("#product_price").on("blur", function (event) {
        var price = $('#product_price').val();
        if (price == null || price == "") {
            $("#err_product_price").text("Please Enter Price");
            return false;
        } else {
            $("#err_product_price").text("");
        }
        if (!price.match(price_regex)) {
            $('#err_product_price').text("Please Enter Valid Price. (Ex - 1000 or 100.10)");
            return false;
        } else {
            $("#err_product_price").text("");
        }
    });
    $("#gst_tax_product").change(function (event) {
        var tax_id = $('#gst_tax_product').val();
        if (tax_id != "" && tax_id != null && typeof tax_id != 'undefined') {
            $.ajax({
                url: base_url + 'tax/get_tax_perctage',
                dataType: 'JSON',
                method: 'POST',
                data: {
                    'tax_id': tax_id
                },
                success: function (result) {
                    var tax_value_gst = parseFloat(result[0].tax_value).toFixed(2);
                    tax_value_gst_dec_value = tax_value_gst.split('.');
                    if (tax_value_gst_dec_value[1] != '00') {
                        tax_value_gst = tax_value_gst + '%';
                    } else {
                        tax_value_gst = tax_value_gst_dec_value[0] + '%';
                    }
                    $('#product_gst_code').val(tax_value_gst);
                }
            });
        } else {
            $('#product_gst_code').val("");
        }
    });
    $("#tds_tax_product").change(function (event) {
        var tax_id = $('#tds_tax_product').val();
        if (tax_id != "") {
            $.ajax({
                url: base_url + 'tax/get_tax_perctage',
                dataType: 'JSON',
                method: 'POST',
                data: {
                    'tax_id': tax_id
                },
                success: function (result) {
                    //console.log(result[0].tax_value);
                    var tax_value_tds = parseFloat(result[0].tax_value).toFixed(2);
                    tax_value_tcs_dec_value = tax_value_tds.split('.');
                    if (tax_value_tcs_dec_value[1] != '00') {
                        tax_value_tds = tax_value_tds + '%';
                    } else {
                       tax_value_tds = tax_value_tcs_dec_value[0] + '%';
                    }
                    //console.log(tax_value_tcs_dec_value[1]);
                    $('#product_tds_code').val(tax_value_tds);
                }
            });
        } else {
            $('#product_tds_code').val("");
        }
    });
});
