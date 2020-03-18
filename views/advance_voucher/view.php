<?phpdefined('BASEPATH') OR exit('No direct script access allowed');$this->load->view('layout/header');?><div class="content-wrapper">    <!-- Content Header (Page header) -->    <section class="content-header">        <h5>            <ol class="breadcrumb">                <li><a href="<?php echo base_url('auth/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>                <li><a href="<?php echo base_url('advance_voucher'); ?>">Advance Voucher </a></li>                <li class="active">Advance Voucher Details</li>            </ol>        </h5>    </section>    <section class="content">        <div class="row">            <div class="col-md-12">                <div class="box">                    <div class="box-header with-border">                        <h3 class="box-title">Advance Voucher  Details</h3>                        <a class="btn btn-sm btn-info pull-right back_button" id="cancel" onclick1="cancel('advance_voucher')">Back</a>                    </div>                    <div class="box-body">                                                <div class="row">                            <div class="col-sm-4">                                 <address>                                     From<br>                                    <?php if (isset($branch[0]->firm_name) && $branch[0]->firm_name != "") { ?>                                     <h4 style="text-transform: capitalize;"><?= $branch[0]->firm_name ?></h4>                                    <?php } ?>                                    <?php if (isset($branch[0]->branch_address) && $branch[0]->branch_address != "") { ?>                                       Address: <?php echo str_replace(array("\r\n", "\\r\\n", "\n", "\\n"), "<br>", $branch[0]->branch_address); ?>                                    <?php } ?>                                    <br/>                                    <?php if (isset($branch[0]->branch_city_name) && $branch[0]->branch_city_name != "") { ?>                                       Location:  <?php                                                if (isset($branch[0]->branch_city_name) && $branch[0]->branch_city_name != "") {                                                    echo $branch[0]->branch_city_name . ",";                                                } if (isset($branch[0]->branch_state_name) && $branch[0]->branch_state_name != "") {                                                    echo $branch[0]->branch_state_name . ",";                                                } if (isset($branch[0]->branch_country_name) && $branch[0]->branch_country_name != "") {                                                    echo $branch[0]->branch_country_name;                                                }                                                ?>                                    <?php } ?>                                    <br/>                                    <?php if (isset($branch[0]->branch_mobile) && $branch[0]->branch_mobile != "") { ?>                                        Mobile: <?= $branch[0]->branch_mobile ?>                                    <?php } ?>                                    <br>                                    <?php if (isset($branch[0]->branch_email_address) && $branch[0]->branch_email_address != "") { ?>                                        Email: <?= $branch[0]->branch_email_address ?>                                    <?php } if (isset($branch[0]->branch_gstin_number) && $branch[0]->branch_gstin_number != "") { ?>                                        GSTIN: <?= $branch[0]->branch_gstin_number ?>                                    <?php } ?>                                </address>                                <address>                                    To<br>                                <?php if (isset($data[0]->customer_name) && $data[0]->customer_name != "") { ?>                                   <h4 style="text-transform: capitalize;"><?= $data[0]->customer_name ?></h4>                                <?php } ?>                                <br/>                                <?php if (isset($data[0]->customer_address) && $data[0]->customer_address != "") { ?>                                    Address: <?php echo str_replace(array("\r\n", "\\r\\n", "\n", "\\n"), "<br>", $data[0]->customer_address); ?>                                <?php } ?>                                <br/>                                <?php if (isset($data[0]->customer_city) && $data[0]->customer_city != "") { ?>                                    Location: <?php                                            if (isset($data[0]->customer_city) && $data[0]->customer_city != "") {                                                echo $data[0]->customer_city . ",";                                            } if (isset($data[0]->customer_state) && $data[0]->customer_state != "") {                                                echo $data[0]->customer_state . ",";                                            } if (isset($data[0]->customer_country) && $data[0]->customer_country != "") {                                                echo $data[0]->customer_country;                                            }                                            ?>                                <?php } ?>                                <br>                                <?php if (isset($data[0]->customer_mobile) && $data[0]->customer_mobile != "") { ?>                                    Mobile: <?= $data[0]->customer_mobile ?>                                <?php } ?>                                <br>                                <?php if (isset($data[0]->customer_email) && $data[0]->customer_email != "") { ?>                                    Email: <?= $data[0]->customer_email ?>                                <?php } if (isset($data[0]->customer_gstin_number) && $data[0]->customer_gstin_number != "") { ?>                                    GSTIN: <?= $data[0]->customer_gstin_number ?>                                <?php } ?>                               </address>                            </div>                            <div class="col-sm-4 pull-right">                                  <div class="bg-light-table">                                    <b><h4>Invoice Details</h4></b>                                    Invoice Number : <?php echo $data[0]->voucher_number; ?><br>                                    Invoice Date : <?php                                    $date = $data[0]->voucher_date;                                    $c_date = date('d-m-Y', strtotime($date));                                    echo $c_date.'<br>'.$cess;                                    ?>                                </div>                            </div>                        </div>                                              <div class="row">                            <div class="col-sm-12">                                <table class="table table-hover table-bordered">                                    <thead>                                        <tr>                                            <th width="4%" rowspan="2" style="text-align: center;">S.No</th>                                            <th style="text-align: center;">Items</th>                                            <?php if ($dpcount > 0) { ?>                                                <th style="text-align: center;">Description</th>                                            <?php } ?>                                            <th style="text-align: center;">Quantity</th>                                            <th style="text-align: center;">Rate</th>                                            <th style="text-align: center;">Taxable                                                <br/>Value</th>                                            <?php if ($igst_tax < 1 && $cgst_tax > 1) { ?>                                                <th style="text-align: center;">CGST</th>                                                <th style="text-align: center;">                                                    <?= ( $is_utgst == '1' ? 'UTGST' : 'SGST'); ?>                                                </th>                                            <?php } else if ($igst_tax > 1 && $cgst_tax < 1) {                                                ?>                                                <th style="text-align: center;">IGST</th>                                            <?php } else if ($data[0]->customer_state_code == $branch[0]->branch_state_code) { ?>                                                <th style="text-align: center;">CGST</th>                                                <th style="text-align: center;">                                                    <?= ( $is_utgst == '1' ? 'UTGST' : 'SGST'); ?>                                                </th>                                            <?php } else { ?>                                                <th style="text-align: center;">IGST</th>                                            <?php } if ($cess > 0) { ?>                                                <th style="text-align: center;">Cess</th>                                            <?php } ?>                                            <th style="text-align: center;">Total</th>                                        </tr>                                    </thead>                                    <tbody>                                        <?php                                        $i = 1;                                        $tot = 0;                                        $igst = 0;                                        $cgst = 0;                                        $sgst = 0;                                        $price = 0;                                        $discount = 0;                                        $cess_row = 0;                                        foreach ($items as $value) {                                            ?>                                            <tr>                                                <td align="center">                                                    <?php echo $i; ?>                                                </td>                                                <?php if ($value->item_type == 'product' || $value->item_type == 'product_inventory') { ?>                                                    <td>                                                        <?php echo strtoupper(strtolower($value->product_name)); ?>                                                        <br>HSN/SAC:                                                         <?php echo $value->product_hsn_sac_code; ?>                                                        <br><?php echo $value->product_batch; ?></td>                                                <?php } elseif ($value->item_type == 'advance') { ?>                                                    <td>                                                        <?php echo strtoupper(strtolower($value->product_name)); ?></td>                                                <?php } else { ?>                                                    <td>                                                        <?php echo strtoupper(strtolower($value->service_name)); ?>                                                        <br>HSN/SAC:                                                         <?php echo $value->service_hsn_sac_code; ?></td>                                                <?php } if ($dpcount > 0) { ?>                                                    <td>                                                        <?php echo $value->item_description; ?></td>                                                <?php } ?>                                                <td align="center">                                                    <?php echo round($value->item_quantity, 2);  if ($value->product_unit != '') {                                                        $unit = explode("-", $value->product_unit);                                                        if($unit[0] != '') echo " <br>(" . $unit[0].')';                                                    }?></td>                                                <td align="right">                                                    <?php echo precise_amount($value->item_sub_total, 2); ?></td>                                                <td align="right">                                                    <?php echo precise_amount($value->item_sub_total, 2); ?></td>                                                <?php if ($value->item_igst_amount < 1 && $value->item_cgst_amount > 1) {                                                    ?>                                                    <td align="right">                                                        <?php                                                        if ($value->item_cgst_amount < 1) {                                                            echo '-';                                                        } else {                                                            ?>                                                            <?php echo precise_amount($value->item_cgst_amount, 2); ?>                                                            <br>(                                                            <?php echo (float)($value->item_cgst_percentage); ?>%)                                                        <?php } ?>                                                    </td>                                                    <td align="right">                                                        <?php                                                        if ($value->item_sgst_amount < 1) {                                                            echo '-';                                                        } else {                                                            ?>                                                            <?php echo precise_amount($value->item_sgst_amount, 2); ?>                                                            <br>(                                                            <?php echo (float)($value->item_sgst_percentage); ?>%)                                                        <?php } ?>                                                    </td>                                                <?php } else if ($value->item_igst_amount > 1 && $value->item_cgst_amount < 1) {                                                    ?>                                                    <td align="right">                                                        <?php                                                        if ($value->item_igst_amount < 1) {                                                            echo '-';                                                        } else {                                                            ?>                                                            <?php echo precise_amount($value->item_igst_amount, 2); ?>                                                            <br>(                                                            <?php echo (float)($value->item_igst_percentage); ?>%)                                                        <?php } ?>                                                    </td>                                                <?php } else if ($data[0]->customer_state_code == $branch[0]->branch_state_code) { ?>                                                    <td align="right">                                                        <?php                                                        if ($value->item_cgst_amount < 1) {                                                            echo '-';                                                        } else {                                                            ?>                                                            <?php echo precise_amount($value->item_cgst_amount, 2); ?>                                                            <br>(                                                            <?php echo (float)($value->item_cgst_percentage); ?>%)                                                        <?php } ?>                                                    </td>                                                    <td align="right">                                                        <?php                                                        if ($value->item_igst_amount < 1) {                                                            echo '-';                                                        } else {                                                            ?>                                                            <?php echo precise_amount($value->item_igst_amount, 2); ?>                                                            <br>(                                                            <?php echo (float)($value->item_igst_percentage); ?>%)                                                        <?php } ?>                                                    </td>                                                <?php } else { ?>                                                    <td align="right">                                                        <?php                                                        if ($value->item_igst_amount < 1) {                                                            echo '-';                                                        } else {                                                            ?>                                                            <?php echo precise_amount($value->item_igst_amount, 2); ?>                                                            <br>(                                                            <?php echo (float)($value->item_igst_percentage); ?>%)                                                        <?php } ?>                                                    </td>                                                <?php }                                                 if ($cess > 0) {                                                ?>                                                <td align="right">                                                <?php                                                     if ($value->item_cess_amount > 0) {                                                     echo precise_amount($value->item_cess_amount, 2).'<br>('.(float)($value->item_cess_percentage).'%)';                                                    }else{                                                ?>                                                -                                                <?php                                                     }                                                ?>                                                </td>                                                <?php                                                }?>                                                <td align="right">                                                    <?php echo precise_amount($value->item_grand_total, 2); ?></td>                                            </tr>                                            <?php                                            $i++;                                            $price = bcadd($price, $value->item_sub_total, 2);                                            $igst = bcadd($igst, $value->item_igst_amount, 2);                                            $cgst = bcadd($cgst, $value->item_cgst_amount, 2);                                            $sgst = bcadd($sgst, $value->item_sgst_amount, 2);                                            $cess_row = bcadd($cess_row, $value->item_cess_amount, 2);                                        }                                        ?>                                        <tr>                                            <td colspan="12" align="left"><b>Description :</b>                                                 <?php echo str_replace(array("\r\n", "\\r\\n", "\n", "\\n"), "<br>", $data[0]->description); ?></td>                                        </tr>                                    </tbody>                                </table>                                <table id="table-total" class="table table-hover table-bordered">                                    <tbody>                                        <tr>                                            <td><b>Total Value (<?php echo $data[0]->currency_symbol; ?>)</b>                                            </td>                                            <td>                                                <?php echo precise_amount($data[0]->voucher_sub_total, 2); ?></td>                                        </tr>                                        <?php if ($igst_tax > 0.00) { ?>                                            <tr>                                                <td>IGST (                                                    <?php echo $data[0]->currency_symbol; ?>)</td>                                                <td style="color: red;">( + )                                                    <?php echo precise_amount($igst, 2); ?>                                                </td>                                            </tr>                                        <?php } else { ?>                                            <tr>                                                <td>CGST (                                                    <?php echo $data[0]->currency_symbol; ?>)</td>                                                <td style="color: red;">( + )                                                    <?php echo precise_amount($cgst, 2); ?>                                                </td>                                            </tr>                                            <tr>                                                <td>                                                    <?= ( $is_utgst == '1' ? 'UTGST' : 'SGST'); ?>(                                                    <?php echo $data[0]->currency_symbol; ?>)</td>                                                <td style="color: red;">( + )                                                    <?php echo precise_amount($sgst, 2); ?>                                                </td>                                            </tr>                                        <?php } if ($cess > 0) { ?>                                            <tr>                                                <td>CESS (                                                    <?php echo $data[0]->currency_symbol; ?>)</td>                                                <td style="color: red;">( + )                                                    <?php echo precise_amount($cess_row, 2); ?>                                                </td>                                            </tr>                                        <?php } ?>                                        <tr>                                            <td><b>Grand Total (<?php echo $data[0]->currency_symbol; ?>)</b>                                            </td>                                            <td style="color: blue;">( = )                                                <?php echo precise_amount($data[0]->receipt_amount, 2); ?></td>                                        </tr>                                    </tbody>                                </table>                            </div>                            <?php $advance_id = $this->encryption_url->encode($data[0]->advance_voucher_id); ?>                            <div class="col-sm-12">                                <div class="buttons">                                    <div class="btn-group btn-group-justified">                                        <div class="btn-group">                                            <a class="btn btn-info composeMail" data-toggle="modal" data-target="#composeMail" title="Email" data-id="<?php echo $advance_id; ?>"> <i class="fa fa-envelope-o"></i>                                                <span class="hidden-sm hidden-xs">Email</span>                                            </a>                                        </div>                                        <?php if (in_array($module_id, $active_view)) { ?>                                            <div class="btn-group">                                                <a class="tip btn btn-success" href="<?php echo base_url('advance_voucher/pdf/'); ?><?php echo $advance_id; ?>" title="Download as PDF" target="_blank"> <i class="fa fa-file-pdf-o"></i>                                                    <span class="hidden-sm hidden-xs">PDF</span>                                                </a>                                            </div>                                        <?php } ?>                                        <?php if (in_array($module_id, $active_edit) && $data[0]->is_from_sales == 0) { ?>                                            <div class="btn-group">                                                <a class="tip btn btn-warning tip" href="<?php echo base_url('advance_voucher/edit/'); ?><?php echo $advance_id; ?>" title="Edit"> <i class="fa fa-pencil"></i>                                                    <span class="hidden-sm hidden-xs">Edit</span>                                                </a>                                            </div>                                        <?php } ?>                                        <?php if (in_array($module_id, $active_delete)) { ?>                                                <div class="btn-group">                                                    <a data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#delete_modal" data-id="<?php echo $advance_id; ?>" data-path="advance_voucher/delete" class="delete_button tip btn btn-danger" href="#" title="Delete Advance Voucher"> <i class="fa fa-trash-o"></i>                                                        <span class="hidden-sm hidden-xs">Delete</span>                                                    </a>                                                </div>                                                <!-- <a data-toggle="modal" data-target="#delete_modal" data-id="<?php echo $data[0]->sales_id; ?>" data-path="<?= 'sales/delete' ?>" title="Delete" class="tip btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash">Delete</span></a> -->                                                                                    <?php } ?>                                    </div>                                </div>                            </div>                        </div>                    </div>                </div>            </div>        </div>    </section></div><?php$this->load->view('layout/footer');$this->load->view('sales/pdf_type_modal');$this->load->view('general/delete_modal');$this->load->view('advance_voucher/compose_mail');?>