<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layout/header');
?>
<div class="content-wrapper">
    <section class="content-header">

    </section>
    <div class="fixed-breadcrumb">
        <ol class="breadcrumb abs-ol">
            <li><a href="<?php echo base_url('auth/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Expense Bill</li>
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
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">List Expense Bill</h3>
                        <?php
                        if (in_array($expense_bill_module_id, $active_add))
                        {
                            ?>
                            <a class="btn btn-sm btn-info pull-right" href="<?php echo base_url('expense_bill/add'); ?>" >Add Expense Bill</a>
                        <?php } ?>
                    </div>
                    <div class="box-body">
                        <table id="list_datatable" class="custom_datatable table table-bordered table-striped table-hover table-responsive" >
                            <thead>
                                <tr>
                                    <th style="min-width: 100px !important;text-align: center;">Date</th>
                                    <th style="min-width: 150px !important;text-align: center;">Reference No</th>
                                    <th style="min-width: 200px !important;text-align: center;">Supplier</th>
                                    <!-- <th style="min-width: 120px;text-align: center;">Expense Name</th> -->
                                    <th style="min-width: 180px !important;text-align: center;">Grand Total</th>
                                    <th style="min-width: 180px !important;text-align: center;"><?php echo 'Converted Amount (' . $this->session->userdata('SESS_DEFAULT_CURRENCY_SYMBOL') . ')'; ?></th>
                                    <th style="min-width: 180px !important;text-align: center;">Paid Amount</th>
                                    <th style="min-width: 180px !important;text-align: center;">User</th>
                                    <th style="min-width: 250px !important;text-align: center;"></th>

                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
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
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Date</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="date">Date<span class="validation-color">*</span></label>
                                    <input type="hidden" id="salesId" name="salesId" value="">
                                    <input type="hidden" name="type" id="type" value="expense_bill">
                                    <input type="text" style="background: #fff;" class="form-control datepicker" id="invoice_date" name="invoice_date" readonly="">
                                    <span class="validation-color" id="err_date"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="date">Comments<span class="validation-color">*</span></label>
                                    <textarea class="form-control" id="comments" name="comments"></textarea><br>
                                    <div class="form-group text-center">
                                        <input type="submit" class="btn btn-info" id="post_notification_date" name="post_notification_date">
                                        <span class="validation-color" id="err_date"></span>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <table id="follow_up_table" border="1" cellspacing ="5" class="custom_datatable table table-bordered table-striped table-hover table-responsive">
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- model ok  -->
    <div id="myModal2" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Status</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success">
                        <strong>Success!</strong> Updated Follow Up date.
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('layout/footer');
$this->load->view('general/delete_modal');
$this->load->view('recurrence/recurrence_invoice_modal');
?>
<script>
    $(document).ready(function () {
        $('#list_datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                "url": base_url + "notification/default_notify_expense_bill",
                "dataType": "json",
                "type": "POST",
                "data": {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'}
            },
            "columns": [
                {"data": "date"},
                {"data": "invoice"},
                {"data": "payee"},
// { "data": "expense_name" },
                {"data": "grand_total"},
                {"data": "currency_converted_amount"},
                {"data": "paid_amount"},
                {"data": "added_user"},
                {"data": "action"},
            ]
        });
        $("#post_notification_date").click(function (e) {
            e.preventDefault();
            var sales_id = $('#salesId').val();
            var sales_type = $('#type').val();
            var update_date = $('#invoice_date').val();
            var comments = $('#comments').val();
            if (update_date == null || update_date == "") {
                $('#err_date').text('please Select Date');
                return false;
            }
            $.ajax({
                url: base_url + "follow_up/follow_up",
                type: "POST",
                data: {'sales_id': sales_id, 'sales_type': sales_type, 'update_date': update_date, 'comments': comments},
                success: function (data) {
                    var obj = JSON.parse(data);
                    if (obj.status = 'success') {
                        $("#myModal2").modal('show');
                    }
                }
            })
        })
    });
    function addToModel(id) {
// var id = data;
        document.getElementById("salesId").value = id;
        $.ajax({
            type: "GET",
            url: base_url + "follow_up/follow/" + id,
            success: function (data)
            {
// alert(data)
// $obj = JSON.parse(data);
                $("#follow_up_table").html(data);
            }
        });
    }
</script>
