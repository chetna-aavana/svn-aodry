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

            <li class="active">POS Billing</li>

        </ol>

    </div>

    <!-- Main content -->

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

            <!-- right column -->

            <div class="col-md-12">

                <div class="box">

                    <div class="box-header with-border">

                        <h3 class="box-title">POS Billing</h3>

                       <?php



                  if (in_array($advance_voucher_module_id , $active_add))

                  {



                      ?>

                        <a class="btn btn-sm btn-info pull-right" href="<?php echo base_url('pos_billing/add'); ?>" title="Add POS Billing">Add POS Billing</a>

                        <?php } ?>

                    </div>

                    <!-- /.box-header -->

                    <div class="box-body">

                        <table id="list_datatable" class="custom_datatable table table-bordered table-striped table-hover table-responsive" >

                            <thead>

                                <tr>

                                    <th style="min-width: 100px;text-align: center;">POS Billing Date</th>

                                    <th style="min-width: 150px;text-align: center;">Invoice Number</th>

                                    <th style="min-width: 150px;text-align: center;">Customer Name</th>

                                    <th style="min-width: 150px;text-align: center;">Mobile</th>

                                    <th style="min-width: 150px;text-align: center;">Email</th>

                                    <th style="min-width: 150px;text-align: center;"><?php echo 'Grand Total'; ?></th>

                                    <!-- <th style="min-width: 150px;text-align: center;"><?php echo 'Converted Amount (' . $this->session->userdata('SESS_DEFAULT_CURRENCY_SYMBOL') . ')'; ?></th> -->

                                    <th style="min-width: 150px;text-align: center;">User</th>

                                    <th style="min-width: 250px;text-align: center;"><?php echo ''; ?></th>

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

$this->load->view('sales/pdf_type_modal');

$this->load->view('general/delete_modal');

// $this->load->view('advance_voucher/advance_voucher_modal');

?>

<script>

$(document).ready(function () {
        $('#list_datatable').DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "ajax": {
            "url": base_url + "pos_billing",
            "dataType": "json",
            "type": "POST",
            "data": {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'}
            },
        "columns": [
            {"data": "date"},
            {"data": "invoice"},
            {"data": "customer"},
            {"data": "mobile"},
            {"data": "email"},
            {"data": "grand_total"},
            {"data": "added_user"},
            {"data": "action"},
        ],
         'language': {
            'loadingRecords': '&nbsp;',
            'processing': ' <h1 class="ml8"><span class="letters-container"> <span class="letters letters-left"><img src="<?php echo base_url('assets/'); ?>images/loader-icon.png" width="30px"></span></span><span class="circle circle-white"></span><span class="circle circle-dark"></span><span class="circle circle-container"><span class="circle circle-dark-dashed"></span></span></h1>'
            },
        });
         anime.timeline({loop:!0}).add({targets:".ml8 .circle-white",scale:[0,3],opacity:[1,0],easing:"easeInOutExpo",rotateZ:360,duration:8e3}),anime({targets:".ml8 .circle-dark-dashed",rotateZ:360,duration:8e3,easing:"linear",loop:!0});
    });
</script>