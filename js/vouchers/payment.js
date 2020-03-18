var reference_array = new Array();
var reference_array_list = new Array();
$(document).ready(function (){
    if ($('#payment_mode').val() == "cash" || $('#payment_mode').val() == "" || $('#payment_mode').val() == 'other payment mode'){
        $('#hide').hide();
    }
    var count = 0;
    $('.add_row_button').click(function() {
        var reference_html = $(this).closest('.main_row').find('#reference_number_1').html();
        
        pending_amount = 0;
        $(document).find('[name=reference_number]').each(function(){
            if($(this).val() != ''){
                $('#common_select').find('option[value='+$(this).val()+']').remove();
                pending_amount += parseFloat($(this).closest('.row_count').find('[name=pending_amount]').val());
            }
        })
     
        var reference_html = $('#common_select').html();
        if(pending_amount <= 0){
            reference_html += '<option value="excess_amount">Excess Amount</option>';
        }
        var row = '<div class="row row_count" row="'+row_count+'"><div class="col-sm-2" style="width: 20%"><div class="form-group"> <label for="reference">Reference<br/>Number<span class="validation-color">*</span></label> <a type="buttion" href="#" class="remove_row_button pull-right">(-)</a> <select class="reference_number form-control select2" id="reference_number_'+row_count+'" name="reference_number" style="width: 100%;">'+reference_html+' </select><span>Invoice Amount: <strong class="total_invoice_amount">0.00</strong>/-</span><span class="validation-color" id="err_reference_number_'+row_count+'"></span></div></div><div class="col-sm-2 paid_amount_div"><div class="form-group"> <label for="Total amount">Total Received Amount<span class="validation-color">*</span></label> <input type="text" class="form-control number_only" id="paid_amount_'+row_count+'" name="paid_amount" value="" readonly> <input type="hidden" class="form-control number_only" id="remaining_amount_'+row_count+'" name="remaining_amount" value="" > <span id="err_remaining_amount_'+row_count+'" class="remaining_class"></span></div></div><div class="col-sm-2 payment_amount_div"><div class="form-group"> <label for="payment Amount">payment<br/>Amount <span class="validation-color">*</span></label> <input type="text" class="form-control number_only" id="payment_amount_'+row_count+'" name="payment_amount" value=""> <span class="validation-color" id="err_payment_amount_'+row_count+'"></span></div></div><div class="col-sm-2 gain_loss_amount_div"><div class="form-group"><label for="Invoice amount">Exchange Gain/loss</label><div class="input-group"> <input type="hidden" name="icon_gain_loss_amount" value="plus"><span class="input-group-addon toggle_plus" id="Input_addon_plus" name="Loss"><i id="plus_button" class="fa fa-plus"></i></span><input type="text" class="form-control number_only" name="gain_loss_amount" id="gain_loss_amount_'+row_count+'"></div><span id="gain_visible" class="toggle_lbl">Loss(+)</span><span class="validation-color" id="err_grand_total_'+row_count+'"></span></div></div><div class="col-sm-2 discount_div"><div class="form-group"> <label for="Invoice amount"><br/>Discount</label> <input type="text" class="form-control number_only" id="discount_'+row_count+'" name="discount" value=""> <span class="validation-color" id="err_discount_'+row_count+'"></span></div></div><div class="col-sm-2 other_charges_div"><div class="form-group"> <label for="Invoice amount"><br/>Other Charges</label> <input type="text" class="form-control number_only" id="other_charges_'+row_count+'" name="other_charges" value=""> <span class="validation-color" id="err_other_charges_'+row_count+'"></span></div></div><div class="col-sm-2 round_off_div"><div class="form-group"><label for="Invoice amount"><br/>Round Off(+/-)</label><div class="input-group"><input type="hidden"  name="icon_round_off" value="plus"><span class="input-group-addon toggle_plus" id="Input_addon_roundoff" name="Round Off"><i id="roundoff_button" class="fa fa-plus"></i></span><input type="text" class="form-control number_only" name="round_off" id="round_off_'+row_count+'" ></div><span id="roundoff_gain" class="toggle_lbl">Round Off(+)</span><span class="validation-color" id="err_grand_total_'+row_count+'"></span></div></div><div class="col-sm-2 pending_amount_div"><div class="form-group"> <label for="Invoice amount">Pending<br/>Amount<span class="validation-color">*</span></label> <input type="text" class="form-control" id="pending_amount_'+row_count+'" name="pending_amount" value="" readonly> <span class="validation-color" id="err_pending_amount_'+row_count+'"></span></div></div><input type="hidden" class="form-control" id="reference_number_text_'+row_count+'" name="reference_number_text" value="" ><input type="hidden" class="form-control" id="current_paid_amount_'+row_count+'" name="current_paid_amount" value="" ><input type="hidden" class="form-control" id="current_invoice_amount_'+row_count+'" name="current_invoice_amount" value="" ><input type="hidden" class="form-control" id="old_payment_amount_'+row_count+'" name="payment_amount_old" value="" ><input type="hidden" class="form-control" id="last_payment_amount_'+row_count+'" name="last_payment_amount" value=""><input  type="hidden" class="float_number form-control" id="invoice_total_'+row_count+'" name="invoice_total" value=""></div>';
        /*$clone = '<div class="row row_count" row="'+row_count+'">'+$clone+'</div>';
        $('.add_row_button', $clone).text('');*/
        $("#add_row_field").append(row);
    });
    $(document).on("click", ".remove_row_button", function() {
        $(this).closest('.row').remove();
    });
  
    $(document).on('click','.toggle_plus',function(){
        var i = $(this).find('i');
        var dv = $(this).closest('.input-group');
        var lbl = $(this).attr('name');

        if(i.hasClass('fa-plus')){
            dv.find('input[type=hidden]').val('minus');
            i.removeClass('fa-plus').addClass('fa-minus');
            if(lbl == 'Loss')lbl = 'Gain';
            dv.parent().find('.toggle_lbl').text(lbl +'(-)');
        }else{
            dv.find('input[type=hidden]').val('plus');
            i.removeClass('fa-minus').addClass('fa-plus');
            dv.parent().find('.toggle_lbl').text(lbl +'(+)');
        }
        dv.find('input[type=text]').trigger('change');
    })
    //date change
    $('#voucher_date').on('changeDate', function (){
        var selected = $(this).val();
        var module_id = $("#module_id").val();
        var date_old = $("#voucher_date_old").val();
        var privilege = $("#privilege").val();
        var old_res = date_old.split("-");
        var new_res = selected.split("-");
        if (old_res[1] != new_res[1]) {
            $.ajax({
                url: base_url + 'general/generate_date_reference',
                type: 'POST',
                data:{
                        date: selected,
                        privilege: privilege,
                        module_id: module_id
                    },
                success: function (data){
                    var parsedJson = $.parseJSON(data);
                    var type = parsedJson.reference_no;
                    $('#voucher_number').val(type)
                }
            })
        } else {
            var old_reference = $('#voucher_number_old').val();
            $('#voucher_number').val(old_reference)
        }
    });
    var all_purchase_obj = {};
    if(typeof data_items != 'undefined'){
        if(data_items.length > 0){
            all_purchase_obj = $.parseJSON(data_items);
        }
    }
    $("#supplier").change(function (event) {
        var currency_id = $('#currency_id').val();
        var supplier_id = $('#supplier').val();
        var reference_type = $('#reference_type').val();
        if (reference_type == "")
        {
            var reference_type = 'purchase';
        }
        $('#payment_amount_1').val('');
        $('#paid_amount_1').val('');
        $('#remaining_amount_1').val('');
        $('#pending_amount_1').val('');
        $('#invoice_total_1').val('');
        $('#current_invoice_amount_1').val('');
        $('#current_paid_amount_1').val('');
        $('#old_payment_amount_1').val('');
        var row_count = $('.row_count').length;
        if (row_count > 1){
            $('#add_row_field').html('');
        }
        if (supplier_id != ""){
            $.ajax({
                url: base_url + 'payment_voucher/get_purchase_invoice_number',
                type: 'POST',
                data:{supplier_id: supplier_id, currency_id: currency_id,reference_type: reference_type},
                success: function (result){
                    var parsedJson = $.parseJSON(result);
                    var data = parsedJson.data;
                    $(data).each(function(k,v){
                        all_purchase_obj['purchase_'+v.purchase_id] = v;
                    })
                    
                    $('#reference_number_1').html('');
                    $('#common_select').html('');
                    var row_count = $('.row_count').length;
                    if (row_count > 1)
                    {
                        $('#add_row_field').html('');
                    }
                    reference_array = data;
                    $('#reference_number_1').append('<option value="">Select</option>');
                    $('#common_select').append('<option value="">Select</option>');
                    for (var i = 0; i < data.length; i++)
                    {
                        $('#reference_number_1').append('<option value="' + data[i].purchase_id + '">' + data[i].purchase_invoice_number + '</option>');
                        $('#common_select').append('<option value="' + data[i].purchase_id + '">' + data[i].purchase_invoice_number + '</option>');
                    }
                }
            });
        }
    });
    
    $('#currency_id').change(function (event)
    {
        $('#supplier').change();
    });
    $(document).on('change',"[id^=reference_number]",function (event){
        /* var purchase_id = $('#reference_number_1').val();*/
        var val = $(this).val();
        var el = $(this);
        if(val != 'excess_amount'){
            $(this).closest('.row_count').find('.paid_amount_div,.gain_loss_amount_div,.discount_div,.other_charges_div,.round_off_div,.pending_amount_div').show();
            $(document).find('[name=reference_number]').each(function(){
                if(el[0] != $(this)[0]){
                    if($(this).val() != '' && $(this).val() == val){
                        alert_d.text ='This reference number already selected!';
                        PNotify.error(alert_d); 
                        /*alert('This reference number already selected!');*/
                        el.val('');
                        return false;
                    }
                }
            });
            
            ths = $(this).closest('.row_count');
            ths.find('[id=payment_amount]').val('');
            ths.find('[id=paid_amount]').val('');
            ths.find('[id=remaining_amount]').val('');
            ths.find('[id=gain_loss_amount]').val('');
            ths.find('[id=discount]').val('');
            ths.find('[id=other_charges]').val('');
            ths.find('[id=round_off]').val('');
            ths.find('[id=pending_amount]').val('');
            ths.find('[id=invoice_total]').val('');
            ths.find('[id=current_invoice_amount]').val('');
            ths.find('[id=current_paid_amount]').val('');
            ths.find('[id=old_payment_amount]').val('');
            calculateAmount(ths);
        }else{
            $(this).closest('.row_count').find('.paid_amount_div,.gain_loss_amount_div,.discount_div,.other_charges_div,.round_off_div,.pending_amount_div').hide();
        }
    });
    /*$(document).on('change',"[id^=payment_amount],[id^=gain_loss_amount],[id^=discount],[id^=other_charges],[id^=round_off]", function (event){
        var payment_amount = $('#payment_amount_1').val();
        ths = $(this).closest('.row_count');
        calculateAmount(ths);
    });*/
    function getRemainigAmount12(ths,data){
        var row_no = ths.attr('row');
        if(!row_no) row_no = 1;
        //var grand_total = (parseFloat(data.purchase_grand_total) + parseFloat(data.credit_note_amount) - parseFloat(data.debit_note_amount)).toFixed(2);
        var grand_total = parseFloat(data.purchase_grand_total).toFixed(2);
       
        var remaining_amount = (grand_total - parseFloat(data.purchase_paid_amount)).toFixed(2);
        
        var payment_amount = (ths.find('#payment_amount_'+row_no).val()) ? ths.find('#payment_amount_'+row_no).val() : 0;
        var gain_loss_amount = (ths.find('#gain_loss_amount_'+row_no).val()) ? ths.find('#gain_loss_amount_'+row_no).val() : 0;
        var discount = (ths.find('#discount_'+row_no).val()) ? ths.find('#discount_'+row_no).val() : 0;
        var other_charges = (ths.find('#other_charges_'+row_no).val()) ? ths.find('#other_charges_'+row_no).val() : 0;
        var round_off = (ths.find('#round_off_'+row_no).val()) ? ths.find('#round_off_'+row_no).val() : 0;
        var current_paid_amount = parseFloat(data.purchase_paid_amount).toFixed(2);
        var current_invoice_amount = parseFloat(grand_total).toFixed(2);
        var payment_amount_old = parseFloat(ths.find('#old_payment_amount_'+row_no).val());
        var total_paid_amount = data.purchase_paid_amount;
        if(isNaN(payment_amount_old)) payment_amount_old = 0;
        var paid_amount = 0;
        if(parseFloat(current_paid_amount) > 0){
            paid_amount = (parseFloat(current_paid_amount) - parseFloat(payment_amount_old)).toFixed(2);
        }
        
        remaining_amount = (parseFloat(current_invoice_amount) - parseFloat(paid_amount)).toFixed(2);
       
        over_all_amount = parseFloat(payment_amount);
        remaining_amount = (parseFloat(remaining_amount) - parseFloat(payment_amount)).toFixed(2);
       
        if(ths.find('[name^=icon_gain_loss_amount]').val() == 'plus'){
            over_all_amount += parseFloat(gain_loss_amount);
            //remaining_amount = (parseFloat(remaining_amount) - parseFloat(gain_loss_amount)).toFixed(2);
        }else{
            over_all_amount -= parseFloat(gain_loss_amount);
            //remaining_amount = (parseFloat(remaining_amount) + parseFloat(gain_loss_amount)).toFixed(2);
        }
        over_all_amount += parseFloat(discount);
        remaining_amount = (parseFloat(remaining_amount) - parseFloat(discount)).toFixed(2);
      
        over_all_amount += parseFloat(other_charges);
        remaining_amount = (parseFloat(remaining_amount) + parseFloat(other_charges)).toFixed(2);
     
        if(ths.find('[name^=icon_round_off]').val() != 'plus'){
            /*over_all_amount += parseFloat(round_off);
            remaining_amount = (parseFloat(remaining_amount) - parseFloat(round_off)).toFixed(2);*/
            over_all_amount -= parseFloat(round_off);
            remaining_amount = (parseFloat(remaining_amount) - parseFloat(round_off)).toFixed(2);
        }else{
        }
      
        return {'remaining_amount':remaining_amount,'over_all_amount':over_all_amount};
    }
    function getRemainigAmount(ths,data){
        var row_no = ths.attr('row');
        if(!row_no) row_no = 1;
        //var grand_total = (parseFloat(data.purchase_grand_total) + parseFloat(data.credit_note_amount) - parseFloat(data.debit_note_amount)).toFixed(2);
        var grand_total = parseFloat(data.purchase_grand_total).toFixed(2);
        var remaining_amount = (grand_total - parseFloat(data.purchase_paid_amount)).toFixed(2);
        var already_paid_amount = parseFloat(data.purchase_paid_amount).toFixed(2);
        
        
        var payment_amount = (ths.find('#payment_amount_'+row_no).val()) ? ths.find('#payment_amount_'+row_no).val() : 0;
        var gain_loss_amount = (ths.find('#gain_loss_amount_'+row_no).val()) ? ths.find('#gain_loss_amount_'+row_no).val() : 0;
        var loss_amount = 0
        if(ths.find('[name=icon_gain_loss_amount]').val() != 'plus') loss_amount= gain_loss_amount;
        var discount = (ths.find('#discount_'+row_no).val()) ? ths.find('#discount_'+row_no).val() : 0;
        var other_charges = (ths.find('#other_charges_'+row_no).val()) ? ths.find('#other_charges_'+row_no).val() : 0;
        
        var round_off = (ths.find('#round_off_'+row_no).val()) ? ths.find('#round_off_'+row_no).val() : 0;
        round_off_minus = round_off_plus = 0;
        if(ths.find('[name=icon_round_off]').val() == 'plus'){
            round_off_plus =  round_off;
        }else{
            round_off_minus =  round_off;
        }
        var payment_amount_old = parseFloat(ths.find('#old_payment_amount_'+row_no).val());
        
        if(isNaN(payment_amount_old)) payment_amount_old = 0;
       /* var paid_amount = (parseFloat(current_paid_amount) - parseFloat(payment_amount_old)).toFixed(2);*/
        /* peinding amount formula peinding = recipt + discount + othr crgs + round off minus - round off plus */ 
        /*var pending_mount = +payment_amount + +loss_amount + +discount + +other_charges + +round_off_minus - +round_off_plus;*/ 
        var pending_mount = +payment_amount + +loss_amount + +discount + +other_charges + +round_off_minus; 
        remaining_amount = +grand_total - +already_paid_amount - pending_mount;
        
        over_all_amount = parseFloat(payment_amount);
        if(ths.find('[name^=icon_gain_loss_amount]').val() == 'plus'){
            over_all_amount += parseFloat(gain_loss_amount);
        }
        if(ths.find('[name^=icon_round_off]').val() == 'plus'){
            over_all_amount += parseFloat(round_off);
        }
        return {'remaining_amount':parseFloat(remaining_amount).toFixed(2),'over_all_amount':over_all_amount};
    }
    function calculateAmount(ths){
        var reference_type = $('#reference_type').val();
        if (reference_type == "") reference_type = 'purchase';
        purchase_id = ths.find('[name=reference_number]').val();
        data = all_purchase_obj['purchase_'+purchase_id];
        
        var total_payment_amount = $('#total_payment_amount').val();
        var all_payment_total = 0;
        var row_no = ths.attr('row');
        if(!row_no) row_no = 1;
        if (purchase_id != "" && typeof purchase_id != undefined && !isNaN(purchase_id)){
            var reference_number_text = ths.find('#reference_number_'+row_no+' :selected').text();
            ths.find('#reference_number_text_'+row_no).val(reference_number_text);
            ths.find('.total_invoice_amount').text(parseFloat(data.purchase_grand_total).toFixed(2));
            var grand_total = (parseFloat(data.purchase_grand_total) + parseFloat(data.credit_note_amount) - parseFloat(data.debit_note_amount)).toFixed(2);
            var remaining_amount = (grand_total - parseFloat(data.purchase_paid_amount)).toFixed(2);
            var payment_amount = (ths.find('#payment_amount_'+row_no).val()) ? ths.find('#payment_amount_'+row_no).val() : 0;
           
            var current_paid_amount = parseFloat(data.purchase_paid_amount).toFixed(2);
            var current_invoice_amount = parseFloat(grand_total).toFixed(2);
            var payment_amount_old = parseFloat(ths.find('#old_payment_amount_'+row_no).val());
            var total_paid_amount = data.purchase_paid_amount;
            if(isNaN(payment_amount_old)) payment_amount_old = 0;
            var paid_amount = (parseFloat(current_paid_amount) - parseFloat(payment_amount_old)).toFixed(2);
            
            GetRemianAmount = getRemainigAmount(ths,data);
            remaining_amount = GetRemianAmount.remaining_amount;
            over_all_amount = GetRemianAmount.over_all_amount;
            /*total_paid_amount = (parseFloat(paid_amount) + parseFloat(over_all_amount)).toFixed(2);*/
            
            if(remaining_amount >= 0 ){
                /*ths.find('#paid_amount_'+row_no).val(parseFloat(total_paid_amount));*/
                ths.find('#paid_amount_'+row_no).val(global_round_off(parseFloat(data.purchase_paid_amount)));
                ths.find('#remaining_amount_'+row_no).val(global_round_off(parseFloat(remaining_amount)));
                ths.find('#pending_amount_'+row_no).val(global_round_off(parseFloat(remaining_amount)));
                ths.find('#invoice_total_'+row_no).val(global_round_off(parseFloat(grand_total)));
                ths.find('#last_payment_amount_'+row_no).val(payment_amount);
                ths.find('#current_invoice_amount_'+row_no).val(global_round_off(parseFloat(grand_total)));
                ths.find('#current_paid_amount_'+row_no).val(parseFloat(data.purchase_paid_amount));
                ths.find('#old_payment_amount_'+row_no).val(0);
            }
        } else {
            ths.find('#payment_amount_'+row_no).val('');
            ths.find('#paid_amount_'+row_no).val('');
            ths.find('#remaining_amount_'+row_no).val('');
            ths.find('#pending_amount_'+row_no).val('');
            ths.find('#invoice_total_'+row_no).val('');
            ths.find('#current_invoice_amount_'+row_no).val('');
            ths.find('#current_paid_amount_'+row_no).val('');
            ths.find('#old_payment_amount_'+row_no).val('');
        }
        checkExcessAmount();
    }
    $(document).on('change','[name=payment_amount]',function(){
        ths = $(this).closest('.row_count');
        purchase_id = ths.find('[name=reference_number]').val();
        if (purchase_id != "" && typeof purchase_id != undefined && !isNaN(purchase_id)){
            
            data = all_purchase_obj['purchase_'+purchase_id];
            var row_no = ths.attr('row');
            if(!row_no) row_no = 1;
            var GetRemianAmount = getRemainigAmount(ths,data);
            if(GetRemianAmount.remaining_amount < 0 ){
                alert_d.text ='Total Payment Amount should not exceed total invoice amount!';
                PNotify.error(alert_d); 
                /*alert("Total Received Amount should not exceed total invoice amount!");*/
                var last_payment_amount_1 = ths.find('#last_payment_amount_'+row_no).val();
                
                if(last_payment_amount_1 == '' || isNaN(last_payment_amount_1) || typeof last_payment_amount_1 == 'undefined') last_payment_amount_1 = 0;
                ths.find('#payment_amount_'+row_no).val(parseFloat(last_payment_amount_1));
                calculateAmount(ths);
                return false;
            }else{
                calculateAmount(ths);
            }
        }
    });
    $(document).on('change','[id^=round_off],[id^=gain_loss_amount],[id^=discount],[id^=other_charges]',function(){
        IsChangeValid($(this).attr('id'));
        
    });
    function checkExcessAmount(){
        var is_pending = 0;
        $(document).find('[name=pending_amount]').each(function(){
            if($(this).val() <= 0){
                is_pending = 1;
            }
        })
        if(!is_pending){
            $(document).find('[name=reference_number]').each(function(){
                if($(this).val() == 'excess_amount'){
                    $(this).closest('.reference_number_div').find('.remove_row_button').trigger('click');
                }
            })
        }
    }
    function IsChangeValid(id) {
        ths = $('#'+id).closest('.row_count');
        var val = ths.find('#'+id).val();
        purchase_id = ths.find('[name^=reference_number]').val();
        /*if(val > parseFloat(ths.find('[name=payment_amount]').val())){
            alert('Amount should not exceed payment amount!');
            return false;
        }*/
        if (purchase_id != "" && typeof purchase_id != undefined && !isNaN(purchase_id)){
            data = all_purchase_obj['purchase_'+purchase_id];
            purchase_grand_total = parseFloat(data.purchase_grand_total);
            if( val > purchase_grand_total){
                alert_d.text ='Amount should not grater than total paid amount!';
                PNotify.error(alert_d); 
                /*alert('Amount should not grater than total paid amount!');*/
                ths.find('#'+id).val(0);
                calculateAmount(ths);
                return false;
            }
            var row_no = ths.attr('row');
            if(!row_no) row_no = 1;
            var GetRemianAmount = getRemainigAmount(ths,data);
            if(GetRemianAmount.remaining_amount < 0 ){
                alert_d.text ='Amount should not grater than total paid amount!';
                PNotify.error(alert_d); 
                /*alert('Amount should not grater than total paid amount!');*/
                ths.find('#'+id).val(0);
                calculateAmount(ths);
                return false;
            }else{
                calculateAmount(ths);
            }
        }
    }
    $("#payment_mode").on("change", function (event) {
        var payment_mode = $('#payment_mode').val();
        if (payment_mode == null || payment_mode == "") {
            $('#hide').hide();
            $("#other_payment").hide();
        } else {
            if ((payment_mode != "cash" && payment_mode != "" && payment_mode != "other payment mode") || payment_mode == "bank") {
                $('#hide').show();
                $("#other_payment").hide();
            } else
            {
                $('#hide').hide();
                $("#bank_name").val('');
                $("#cheque_number").val('');
                $("#cheque_date").val('');
            }
            if (payment_mode == "other payment mode") {
                $("#other_payment").show();
            } else
            {
                $("#other_payment").hide();
                $("#payment_via").val('');
                $("#reff_number").val('');
            }
        }
    });
    $('#add_row_field').on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault();
        // parent().parent().remove()
        var id = $(this).attr('id');
        var split = id.split('_');
        reference_array_list[split[1] - 1] = "";
        $(this).parent('div').parent('div').parent('div').remove();
    });
});
