//$(document).ready(function (){    //$(document).on('click', "#add_submit", function (event) {    $("#add_trans").click(function () {         var myform = document.getElementById("form_tax");        data = new FormData(myform);        var txt_transaction = $('#txt_transaction').val();        var cmb_type = $('#cmb_type').val();        var voucher_type = $('#voucher_type').val();              if (txt_transaction == null || txt_transaction == ""){            $("#err_transaction").text("Please Enter Transaction Purpose.");            return !1;        }else{            $("#err_transaction").text("")        }        if (cmb_type == null || cmb_type == ""){            $("#err_cmb_type").text("Please Select Transaction Type.");            return !1;        }else{            $("#err_cmb_type").text("")        }         if (voucher_type == null || voucher_type == ""){            $("#err_voucher_type").text("Please Select Voucher Type.");            return !1;        }else{            $("#err_voucher_type").text("")        }        $.ajax({        url:  base_url +'general_voucher/add_tansaction',        data: data,        cache: false,        processData: false,        contentType: false,        dataType: 'JSON',        type: 'POST',         beforeSend: function(){            // Show image container            $("#loader").show();        },         success: function (result) {                if(result.flag){                                        dTable.destroy();                    dTable = getAllTransaction();                    alert_d.text = result.msg;                    PNotify.success(alert_d);                    $("#form_tax")[0].reset();                    $("#txt_transaction").select2();                    $("#cmb_type").select2();                    $("#voucher_type").select2();                    $('#add_transaction').modal('hide');                }else{                    alert_d.text = result.msg;                    PNotify.error(alert_d);                                    }            },            error: function (result){                alert_d.text ='Something Went Wrong!';                PNotify.error(alert_d);            }        });            });   // $(document).on('click', "#edit_submit", function (event) {    $("#edit_submit").click(function () {        var txt_transaction = $('#txt_transaction_e').val();        var cmb_type = $('#cmb_type_e').val();        var voucher_type = $('#voucher_type_e').val();        var myform = document.getElementById("form_trans");        data = new FormData(myform);              if (txt_transaction == null || txt_transaction == ""){            $("#err_transaction_e").text("Please Enter Transaction Purpose.");            return !1;        }else{            $("#err_transaction_e").text("")        }        if (cmb_type == null || cmb_type == ""){            $("#err_cmb_type_e").text("Please Select Transaction Type.");            return !1;        }else{            $("#err_cmb_type_e").text("")        }         if (voucher_type == null || voucher_type == ""){            $("#err_voucher_type_e").text("Please Select Voucher Type.");            return !1;        }else{            $("#err_voucher_type_e").text("")        }        $.ajax({        url:  base_url +'general_voucher/edit_tansaction',        data: data,        cache: false,        processData: false,        contentType: false,        dataType: 'JSON',        type: 'POST',        success: function (result) {                if(result.flag){                                        dTable.destroy();                    dTable = getAllTransaction();                    alert_d.text = result.msg;                    PNotify.success(alert_d);                    $("#form_trans")[0].reset();                    $("#txt_transaction").select2();                    $("#cmb_type").select2();                    $("#voucher_type").select2();                    $('#edit_trans').modal('hide');                }else{                    alert_d.text = result.msg;                    PNotify.error(alert_d);                                    }            },            error: function (result){                alert_d.text ='Something Went Wrong!';                PNotify.error(alert_d);            }        });            });    //});