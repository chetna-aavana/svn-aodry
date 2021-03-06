<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('layout/header');
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <div class="fixed-breadcrumb">
        <ol class="breadcrumb abs-ol">
            <li><a href="<?php echo base_url('auth/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url('leads'); ?>">Leads</a></li>
            <li class="active">Business Type</li>
        </ol>
    </div>
    <!-- Main content -->
    <section class="content mt-50">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Business Type</h3>
                        <?php
                        if (in_array($lead_module_id, $active_add))
                        {
                            ?>
                            <a class="add_business_type btn btn-sm btn-info pull-right" data-toggle="modal" data-target="#business_type_modal" title="Add Lead Business Type">Add Business Type</a>
                        <?php } ?>
                        <a class="btn btn-sm btn-info pull-right" href="<?php echo base_url('leads/index'); ?>" title="Main Page">Main Page</a>
                        <a class="btn btn-sm btn-info pull-right" href="<?php echo base_url('leads/list_source'); ?>" title="Source List">Source List</a>
                        <a class="btn btn-sm btn-info pull-right" href="<?php echo base_url('leads/list_stages'); ?>" title="Stages List">Stages List</a>
                        <a class="btn btn-sm btn-info pull-right" href="<?php echo base_url('leads/list_group'); ?>" title="Group List">Group List</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="list_datatable" class="custom_datatable table table-bordered table-striped table-hover table-responsive" >
                            <thead>
                                <tr>
                                    <th style="min-width: 100px;text-align: center;">Added Date</th>
                                    <th style="min-width: 150px;text-align: center;">Business Type</th>
                                    <th style="min-width: 150px;text-align: center;">User</th>
                                    <th style="min-width: 100px;text-align: center;">Action</th>
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
</div>
<!-- /.content-wrapper -->
<?php
$this->load->view('layout/footer');
$this->load->view('general/delete_modal');
$this->load->view('leads/business_type_modal');
?>
<script>
    $(document).ready(function () {
        $('#list_datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                "url": base_url + "leads/list_business_type",
                "dataType": "json",
                "type": "POST",
                "data": {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                }
            },
            "columns": [
                {"data": "added_date"},
                {"data": "lead_business_type"},
                {"data": "added_user"},
                {"data": "action"}
            ]
        });
    });
</script>
