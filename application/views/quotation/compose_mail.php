<div id="composeMail" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">		
                <button type="button" class="close" data-dismiss="modal">&times;</button>		
                <h4 class="modal-title">New Mail</h4>
            </div>
            <form role="form" id="form" method="post" action="<?php echo base_url('email_template/send_email_compose/'); ?>" encType="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">   
                            <div class="form-group">                            
                                <!-- <div class="input-group">
                                    <div class="input-group-addon">
                                        <a href="" data-toggle="modal" data-target="#email_setup_modal" class="pull-right">+</a>
                                    </div> -->
                                    <select class="form-control" id="from_email" name="from_email">
                                        <option value="">From</option>
                                    </select>
                                <!-- </div> -->
                                <span class="validation-color" id="err_from_email"><?php echo form_error('from_email'); ?></span>
                            </div>
                        </div>	
                        <div class="col-sm-12" >
                            <div class="form-group">
                                <input type="text" class="form-control" id="to_email" name="to_email" data-role="tagsinput" placeholder="To" value="" >
                                <span class="validation-color" id="err_to_email"><?php echo form_error('to_email'); ?></span>
                            </div>
                        </div>  				
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="cc_email" name="cc_email" data-role="tagsinput" placeholder="Cc">
                                <input type="hidden" id="id" name="id" > 							
                                <span class="validation-color" id="err_cc_email"></span>
                            </div>
                        </div>
                        <div class="col-sm-12" >
                            <div class="form-group">
                                <select class="form-control select2" id="email_template" name="email_template">
                                    <option value="">Select Template</option>
                                </select>
                            </div>
                        </div>                     
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                                <span class="validation-color" id="err_subject"><?php echo form_error('subject'); ?></span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="redirect" value="quotation">
                                <textarea class="form-control" id="compose-textarea" name="message"></textarea>
                                <span class="validation-color" id="err_message"><?php echo form_error('message'); ?></span>
                            </div>   
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">         
                                <input type="hidden" name="pdf_file_path" id="pdf_file_path" value="">                                
                                <a href="" target="_blank" id="file_path"></a>
                            </div>
                        </div>
                        <div class="col-sm-9">                            
                            <div class="form-group row">
                                 <label class="col-sm-6 mt-5 text-right">Add More Attachments</label>
                                  <div class="col-sm-6">
                                 <input type="file" class="form-control" id="attachments" name="attachments">
                                  </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="email_submit" name="sales_submit" class="btn btn-info"> Send
                    </button>
                    <button type="button" class="btn btn-info" data-dismiss="modal">
                        Cancel
                    </button>				
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$this->load->view('email_setup/email_setup_modal');
?>
<script src="<?php echo base_url('assets/js/email/') ?>send_email.js"></script>
<script type="text/javascript">
    $(document).on("click", ".composeMail", function () {
        var id = $(this).data('id');
        $.ajax({
            url: base_url + 'quotation/email_popup/' + id,
            dataType: "JSON",
            success: function (data) {
                console.log(data[0].pdf_file_path);
                $('#file_path').attr("href", base_url + data[0].pdf_file_path);
                $('#pdf_file_path').val(data[0].pdf_file_path);
                $('#file_path').text(data[0].pdf_file_name);
                $('#id').val(data[0].id);
                var email_template = data[0].email_template;
                var firm_name = data[0].firm_name;
                var customer_email = data[0].customer_email;
                $('#to_email').tagsinput('add', customer_email);
                $('#email_template').empty();
                $('#email_template').append('<option value="" >Select</option>');
                var template_id = '';
                for (i = 0; i < email_template.length; i++) {
                    if(i == 0){
                    $('#email_template').append('<option value="' + email_template[i].email_template_id + '" selected>' + email_template[i].email_template_name + '</option>');
                    var template_id = email_template[i].email_template_id;
                    }else{
                        $('#email_template').append('<option value="' + email_template[i].email_template_id + '" >' + email_template[i].email_template_name + '</option>');
                    }
                }
                $('#from_email').empty();
                //$('#from_email').append('<option value="" >Select</option>');
                $('#from_email').append('<option value="' + firm_name + '<noreply@aodry.com>" >' + firm_name + '[noreply@aodry.com]</option>');
                templateAppend(template_id);
            }
        });
    });
    function templateAppend(id){
        if (id != "")
        {
            $.ajax({
                url: base_url + "email_template/get_email_templates",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data)
                {
                    var message = data['data'][0].message.replace(/\n|\\n|\r\n|\\r\\n/g, "\n");
                    var signature = data['data'][0].signature.replace(/\n|\\n|\r\n|\\r\\n/g, "\n");
                    var message = message + "\n\n\n" + signature;
                    $('#subject').val(data['data'][0].subject);
                   // $('#compose-textarea').val(message);
                    $('iframe').contents().find('.wysihtml5-editor').html(message);
                }
            });
        } else
        {
            $('#subject').val('');
            $('#compose-textarea').val('');
        }
    }
</script>