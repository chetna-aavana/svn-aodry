<div id="add_hsn_modal" class="modal fade z_index_modal" role="dialog" data-backdrop="static">    <div class="modal-dialog modal-md">        <div class="modal-content">            <div class="modal-header">                <button type="button" class="close" data-dismiss="modal">                    &times;                </button>                <h4 class="modal-title">Add HSN</h4>            </div>	            <div class="modal-body">                <div id="loader">                    <h1 class="ml8"><span class="letters-container"> <span class="letters letters-left"><img src="<?php echo base_url('assets/'); ?>images/loader-icon.png" width="40px"></span></span><span class="circle circle-white"></span><span class="circle circle-dark"></span><span class="circle circle-container"><span class="circle circle-dark-dashed"></span></span></h1>                </div>                <div class="row">                    <div class="col-sm-6">                        <div class="form-group">                            <label for="hsnType">HSN Type<span class="validation-color">*</span></label>                            <select class="form-control select2" id="hsnType" name="hsnType" style="width: 100%">                                <option value="">Select HSN Type</option>                                <option value="goods">Goods/Product</option>                                <option value="services">Services</option>                            </select>                            <span class="validation-color" id="err_type"><?php echo form_error('err_type'); ?></span>                        </div>                    </div>                    <div class="col-sm-6">                        <div class="form-group">                            <label for="hsnCode">HSN Code<span class="validation-color">*</span></label>                            <input type="text" class="form-control" id="hsnCode" name="hsnCode" maxlength="20">                            <span class="validation-color" id="err_hsn_code"><?php echo form_error('err_hsn_code'); ?></span>                        </div>                    </div>                    <div class="col-sm-12">                        <div class="form-group">                            <label for="description">Description</label>                            <textarea class="form-control" id="description" name="description" maxlength="100"></textarea>	                        </div>                    </div>                </div>            </div>            <div class="modal-footer">                <button type="submit" id="submitHsn" class="btn btn-info">Add</button>                <button type="button" class="btn btn-info" data-dismiss="modal">                    Cancel                </button>            </div>        </div>    </div></div><script src="<?php echo base_url('assets/js/') ?>icon-loader.js"></script><script type="text/javascript">    $(document).ready(function ()    {        var hsn_code_exist = 0;        $("#submitHsn").click(function () {            var hsnType = $('#hsnType').val();            var hsnCode = $('#hsnCode').val();            var description = $('#description').val();            // var num_regex=/^\$?([0-9]{1,3},([0-9]{3},)*[0-9]{3}|[0-9]+)(.[0-9][0-9])?$/;            var hsn_regex = /^\d[0-9.,\s]+$/;            if (hsnType == null || hsnType == "") {                $("#err_type").text("Please Select HSN Type ");                return false;            } else {                $("#err_type").text("");            }            if (hsnCode == null || hsnCode == "") {                $("#err_hsn_code").text("Please Enter HSN Code ");                return false;            } else {                $("#err_hsn_code").text("");            }            if (!hsnCode.match(hsn_regex)) {                $("#err_hsn_code").text("Please Enter Valid HSN Code ");                return !1;            } else {                $("#err_hsn_code").text("");            }            if (hsn_code_exist > 0) {                $("#err_code").text("The Hsn code is already exist.");                return false;            } else {                $("#err_code").text("");            }            $.ajax(                    {                        url: base_url + 'hsn/addHsn',                        dataType: 'JSON',                        method: 'POST',                        data: {'hsnType': hsnType, 'hsnCode': hsnCode, 'description': description},                        beforeSend: function(){                         // Show image container                        $("#loader").show();                        },                           success: function (result) {                            if(result.flag){                                $("#loader").hide();                                $('#add_hsn_modal').modal('hide');                                dTable.destroy();                                dTable = getAllHsn();                                alert_d.text = result.msg;                                PNotify.success(alert_d);                                $('#hsnCode').val('');                                $('#hsnType').prop('selectedIndex',0);                                $('#description').val('');                                $('#hsnType').select2();                            }else{                                if(result.msg == 'duplicate'){                                    $("#loader").hide();                                    $('#err_hsn_code').text('The Hsn code is already exist.');                                    return false;                                }else{                                    $('#add_hsn_modal').modal('hide');                                    alert_d.text = result.msg;                                    PNotify.error(alert_d);                                }                            }                        },                        error: function (result)                        {                             $("#loader").hide();                            alert_d.text ='Something Went Wrong!';                            PNotify.error(alert_d);                        }            });        });    });</script>