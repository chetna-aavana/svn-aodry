<?phpdefined('BASEPATH') OR exit('No direct script access allowed');$this->load->view('layout/header');?><div class="content-wrapper">    <!-- Content Header (Page header) -->    <section class="content-header">    </section>    <div class="fixed-breadcrumb">        <ol class="breadcrumb abs-ol">            <li><a href="<?php echo base_url('auth/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>            <li class="active">News and Updates</li>        </ol>    </div>    <section class="content mt-50">        <div class="row">            <div class="col-md-12">                <div class="box">                    <div class="box-header with-border">                        <h3 class="box-title">News and Updates</h3>                        <a class="btn btn-sm btn-info pull-right" href="<?php echo base_url('newsupdates/add'); ?>">Add/Updates</a>                    </div>                    <div class="box-body">                        <table id="list_datatable" class="table table-bordered table-striped table-hover table-responsive">                            <thead>                                <tr>                                    <th>Title</th>                                    <th>Type</th>                                    <th>Description</th>                                    <th>Date</th>                                    <th><?php echo 'Action'; ?></th>                                </tr>                            </thead>                            <tbody></tbody>                        </table>                    </div>                </div>            </div>        </div>    </section></div><?php$this->load->view('layout/footer');$this->load->view('general/delete_modal');?><script>    $(document).ready(function () {        $('#list_datatable').DataTable({            "processing": true,            "serverSide": true,            "ajax": {                "url": base_url + "newsupdates",                "dataType": "json",                "type": "POST",                "data": {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'}            },            "columns": [                {"data": "news_title"},                {"data": "type"},                {"data": "news_description"},                {"data": "news_added_date"},                {"data": "action"}            ]        });    });</script>