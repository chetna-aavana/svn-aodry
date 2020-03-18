<div class="modal fade" id="upload_service_doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-3" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
                <h4 class="modal-title">Upload Service</h4>
            </div>
            <form class="" id="upload_bulk_dervice" method="post" action="<?= base_url(); ?>Service/add_bulk_upload_service" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" id='bulk_service' name="bulk_service" class="form-control file-upload-default">
                                <span class="validation-color" id="err_bulk_service"></span>
                                <!-- <input type="hidden" name="voucher_type" value="<?= $voucher_type; ?>">
                                <input type="hidden" name="redirect_uri" value="<?= $redirect_uri; ?>">
                                <input type="hidden" name="company_id"> -->
                            </div>                          
                                <div class="date_note">
                                    <p><strong>Caution!</strong> Make sure your CSV Contain All the Data Required!.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button id='add_bulk_service' class="btn btn-primary tbl-btn save_bulk">Submit</button>
                    <button type="button" class="btn btn-primary tbl-btn" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#add_bulk_service').click(function(){
    if(document.getElementById("bulk_service").files.length == 0 ){
        $('#err_bulk_service').text('Please Select File!');
    return false;
}
})
</script>
