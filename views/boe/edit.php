<?phpdefined('BASEPATH') OR exit('No direct script access allowed');$this->load->view('layout/header');$financial_year = explode('-', $this->session->userdata('SESS_FINANCIAL_YEAR_TITLE'));$date = date('Y-m-d');if ((date("Y") != $financial_year[0]) && (date("Y") != $financial_year[1]))    $date = $financial_year[0] . '-04-01';?><style>    #total_sum tr td:nth-last-child(2) {        width: 85%;        text-align: right;    }    #total_sum tr td:last-child {        text-align: right;    }</style><div class="content-wrapper" id="advance_voucher">    <div class="fixed-breadcrumb">        <ol class="breadcrumb abs-ol">            <li><a href="<?php echo base_url('auth/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>            </li>            <li><a href="<?php echo base_url('boe'); ?>">BOE Voucher</a>            </li>            <li class="active">Edit BOE</li>        </ol>    </div>    <section class="content mt-50">        <div class="row">            <div class="col-md-12">                <div class="box">                    <div class="box-header with-border">                        <h3 class="box-title">Edit BOE</h3>                        <a class="btn btn-default pull-right back_button" id="sale_cancel" onclick1="cancel('boe')">Back</a>                    </div>                    <div class="box-body">                        <form role="form" id="form" method="post" action="<?php echo base_url('boe/edit_boe'); ?>">                            <div class="row">                                <div class="col-sm-3">                                    <div class="form-group">                                        <label for="date">BOE Date<span class="validation-color">*</span>                                        </label>                                         <div class="input-group date">                                            <input type="text" class="form-control datepicker" id="boe_date" name="boe_date" value="<?= date('d-m-Y',strtotime($data[0]->boe_date)); ?>">                                             <span class="input-group-addon"><span class="fa fa-calendar"></span></span>                                        </div>                                        <span class="validation-color" id="err_boe_date"></span>                                    </div>                                </div>                                <input type="hidden" name="boe_id" value="<?= $data[0]->boe_id; ?>">                                <div class="col-sm-3">                                    <div class="form-group">                                        <label for="">BOE Reference Number<span class="validation-color">*</span>                                        </label>                                        <input type="text" class="form-control" id="reference_number" name="reference_number" value="<?= $data[0]->reference_number; ?>" readonly>                                    </div>                                </div>                                <div class="col-sm-3">                                    <div class="form-group">                                        <label for="">BOE Voucher Number<span class="validation-color">*</span>                                        </label>                                        <input type="text" class="form-control" id="boe_number" name="boe_number" value="<?= $data[0]->boe_number; ?>">	<span class="validation-color" id="err_boe_number"></span>                                    </div>                                </div>                                <div class="col-sm-3">                                    <div class="form-group">                                        <label for="">Purchase Invoice Number</label>                                        <select multiple="" class="form-control select2 lect2-hidden-accessible" id="purchase_invoice" name="purchase_invoice[]" tabindex="-1" aria-hidden="true">                                            <?php                                            if (!empty($purchase_invoice)) {                                                foreach ($purchase_invoice as $key => $value) {                                                    ?>                                                    <option value="<?= $value->purchase_id; ?>" <?= (in_array($value->purchase_id, $purchase_added) ? 'selected' : ''); ?>>                                                        <?= $value->purchase_invoice_number; ?></option>                                                    <?php                                                }                                            }                                            ?>                                        </select>	<span class="validation-color" id="err_purchase_invoice"></span>                                    </div>                                </div>                            </div>                            <div class="row">                                <div class="col-sm-3">                                    <div class="form-group">                                        <label for="cin">CIN</label>                                        <input type="text" class="form-control" id="cin" name="cin" value="<?= $data[0]->CIN; ?>"><span class="validation-color" id="err_cin"></span>                                    </div>                                </div>                                <div class="col-sm-3">                                    <div class="form-group">                                        <label for="cin_date">CIN Date</label>                                        <div class="input-group date">                                            <input type="text" class="form-control datepicker" id="cin_date" name="cin_date" value="<?= $data[0]->CIN_date; ?>">                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>                                        </div>                                        <span class="validation-color" id="err_cin_date"></span>                                    </div>                                </div>                                <div class="col-sm-3">                                    <div class="form-group">                                        <label for="Bank">Bank</label>                                        <select class="form-control select2" id="bank_id" name="bank_id" tabindex="-1" aria-hidden="true">                                            <?php                                            if (!empty($bank_account)) {                                                foreach ($bank_account as $key => $value) {                                                    ?>                                                    <option value="<?= $value->bank_account_id; ?>" <?= ($data[0]->bank_id == $value->bank_account_id ? 'selected' : ''); ?>>                                                        <?= $value->ledger_title; ?></option>                                                    <?php                                                }                                            }                                            ?>                                        </select>                                        <input type="hidden" class="form-control" id="bank_name" name="bank_name" value="<?= $data[0]->bank_name; ?>">	<span class="validation-color" id="err_bank_name"></span>                                    </div>                                </div>                            </div>                                                          <!-- <div class="row">                                    <div class="col-sm-12"> <span class="validation-color" id="err_product"></span>                                    </div>                                    <?php                                    $product_modal = 0;                                    $service_modal = 0;                                    $product_inventory_modal = 0;                                    $item_modal = 0;                                    if ($access_settings[0]->item_access == 'product') {                                        ?>                                        <div class="col-sm-12 search_purchase_code">                                            <?php                                            if (in_array($product_module_id, $active_add)) {                                                if ($inventory_access == "yes") {                                                    $product_inventory_modal = 1;                                                    ?> <a href="" data-toggle="modal" data-target="#product_inventory_modal" class="open_product_modal pull-left">+ Add Product</a>                                                    <?php                                                } else {                                                    $product_modal = 1;                                                    ?> <a href="" data-toggle="modal" data-target="#product_modal" class="open_product_modal pull-left">+ Add Product</a>                                                    <?php                                                }                                            }                                            ?>                                            <input id="input_purchase_code" class="form-control" type="text" name="input_purchase_code" placeholder="Enter Product Code/Name">                                        </div>                                    <?php } elseif ($access_settings[0]->item_access == 'service') { ?>                                        <div class="col-sm-12 search_purchase_code">                                            <?php                                            if (in_array($service_module_id, $active_add)) {                                                $service_modal = 1;                                                ?> <a href="" data-toggle="modal" data-target="#service_modal" class="open_service_modal pull-left">+ Add Service</a>                                            <?php } ?>                                            <input id="input_purchase_code" class="form-control" type="text" name="input_purchase_code" placeholder="Enter Product Code/Name">                                        </div>                                    <?php } else { ?>                                        <div class="col-sm-12 search_purchase_code">                                            <div class="input-group">                                                <div class="input-group-addon">                                                    <?php                                                    if (in_array($service_module_id, $active_add) && in_array($product_module_id, $active_add)) {                                                        $item_modal = 1;                                                        ?> <a href="" data-toggle="modal" data-target="#item_modal" class="pull-left">+</a>                                                    <?php } ?>                                                </div>                                                <input id="input_purchase_code" class="form-control" type="text" name="input_purchase_code" placeholder="Enter Product/Service Code/Name">                                            </div>                                        </div>                                    <?php } ?>                                    <div class="col-sm-12"> <span class="validation-color" id="err_purchase_code"></span>                                    </div>                                </div>     -->                                                  <div class="row">                                <div class="col-sm-12">                                    <div class="box-header">                                      <h3 class="box-title ml-0">Inventory Items</h3>                                        <table class="table table-striped table-bordered table-condensed table-hover purchase_table table-responsive" id="purchase_data">                                            <thead>                                                <tr>                                                    <th width="2%">                                                        <img src="<?php echo base_url(); ?>assets/images/bin1.png" />                                                    </th>                                                    <th class="span2">Items</th>                                                    <th class="span2" width="6%">Quantity</th>                                                    <th class="span2" width="15%">Rate</th>                                                    <th class="span2" width="10%">BCD TAX(%)</th>                                                    <?php if ($access_settings[0]->tax_type == 'gst' || $access_settings[0]->tax_type == 'single_tax') { ?>                                                        <th class="span2" width="10%">GST(%)</th>                                                        <th class="span2" width="10%">Cess(%)</th>                                                    <?php } ?>                                                    <th class="span2" width="10%">Other Duties(%)</th>                                                    <th class="span2" width="15%">Total</th>                                                </tr>                                            </thead>                                            <tbody id="purchase_table_body">                                                <?php                                                $i = 0;                                                $tot = 0;                                                $boe_data = array();                                                foreach ($items as $key) {                                                    ?>                                                    <tr id="<?= $i ?>">                                                        <td><a class='deleteRow'> <img src='<?= base_url(); ?>assets/images/bin_close.png' /></a>                                                            <input type='hidden' name='item_key_value' value="<?= $i ?>">                                                            <input type='hidden' name='item_id' value="<?= $key->item_id; ?>">                                                            <input type='hidden' name='item_type' value="<?= $key->item_type; ?>">                                                        </td>                                                        <?php if ($key->item_type == 'product' || $key->item_type == 'product_inventory') { ?>                                                            <td>                                                                <input type='hidden' name='item_code' value='<?= $key->product_code; ?>'>                                                                <?php echo $key->product_name; ?>                                                                <br>HSN/SAC:                                                                 <?php echo $key->product_hsn_sac_code; ?></td>                                                        <?php } else { ?>                                                            <td>                                                                <input type='hidden' name='item_code' value='<?php                                                                echo $key->service_code;                                                                ?>'>                                                                       <?php echo $key->service_name; ?>                                                                <br>SAC:                                                                <?php echo $key->service_hsn_sac_code; ?></td>                                                        <?php } ?>                                                        <td>                                                            <input type='text' class='form-control form-fixer text-center float_number' value='<?php                                                            echo $key->boe_item_quantity ? $key->boe_item_quantity : 0;                                                            ?>' data-rule='quantity' name='item_quantity'>                                                        </td>                                                        <td>                                                            <input type='text' class='form-control form-fixer text-right float_number' name='item_price' value='<?= ($key->boe_item_unit_price ? precise_amount($key->boe_item_unit_price) : 0); ?>'><span id='item_sub_total_lbl_<?= $i ?>' class='pull-right' style='color:red;'><?= ($key->boe_item_sub_total ? precise_amount($key->boe_item_sub_total) : 0); ?></span>                                                            <input type='hidden' class='form-control form-fixer text-right' style='' value='<?= ($key->boe_item_sub_total ? precise_amount($key->boe_item_sub_total) : 0); ?>' name='item_sub_total'>                                                        </td>                                                        <td>                                                            <input type='hidden' name='item_bcd_amount' value='<?= ($key->boe_item_bcd_amount ? $key->boe_item_bcd_amount : 0); ?>'>                                                            <div class="form-group" style="margin-bottom:0px !important;">                                                                <input type="number" class="form-control" name="bcd_tax" value="<?= ($key->boe_item_bcd_percentage ? (float)($key->boe_item_bcd_percentage) : 0); ?>" style="width: 100%;">                                                            </div> <span id='item_bcd_lbl_<?= $i ?>' class='pull-right' style='color:red;'><?php                                                                echo $key->boe_item_bcd_amount ? precise_amount($key->boe_item_bcd_amount) : 0;                                                                ?></span>                                                            <input type='hidden' name='item_taxable_value' value='<?= ($key->boe_item_taxable_value ? $key->boe_item_taxable_value : 0); ?>'>                                                        </td>                                                        <td>                                                            <input type='hidden' name='item_tax_percentage' value='<?= ($key->boe_tax_percentage ? (float)($key->boe_tax_percentage) : 0); ?>'>                                                            <input type='hidden' name='item_tax_amount_igst' value='<?= $key->boe_item_igst_amount; ?>'>                                                            <input type='hidden' name='item_tax_amount' value='<?= $key->boe_item_tax_amount ? precise_amount($key->boe_item_tax_amount) : 0 ?>'>                                                            <div class="form-group" style="margin-bottom:0px !important;">                                                                <input type="number" class='form-control' name="item_tax" value="<?= (float)$key->boe_tax_percentage; ?>">                                                            </div> <span id='item_tax_lbl_<?= $i ?>' class='pull-right' style='color:red;'><?= $key->boe_item_tax_amount ? precise_amount($key->boe_item_tax_amount) : 0 ?></span>                                                        </td>                                                        <td>                                                            <input type='hidden' name='item_tax_cess_percentage' value='<?= $key->boe_item_tax_cess_percentage ? (float)($key->boe_item_tax_cess_percentage) : 0; ?>'>                                                            <input type='hidden' name='item_tax_cess_amount' value='<?= $key->boe_tax_cess_amount ? precise_amount($key->boe_tax_cess_amount) : 0 ?>'>                                                            <div class="form-group" style="margin-bottom:0px !important;">                                                                <input type="number" class='form-control' name='item_tax_cess' value="<?= $key->boe_item_tax_cess_percentage ? (float)($key->boe_item_tax_cess_percentage) : 0; ?>">                                                            </div> <span id='item_tax_cess_lbl_<?= $i ?>' class='pull-right' style='color:red;'><?= ($key->boe_tax_cess_amount != '' ? precise_amount($key->boe_tax_cess_amount) : 0); ?></span>                                                        </td>                                                        <td>                                                            <input type='hidden' name='item_other_duties_amount' value='<?= $key->boe_item_tax_other_duties_amount ? precise_amount($key->boe_item_tax_other_duties_amount) : 0 ?>'>                                                            <div class="form-group" style="margin-bottom:0px !important;">                                                                <input type="number" class='form-control' name='other_duties_tax' value="<?= $key->boe_item_tax_other_duties_percentage ? (float)($key->boe_item_tax_other_duties_percentage) : 0; ?>">                                                            </div> <span id='item_other_duties_lbl_<?= $i ?>' class='pull-right' style='color:red;'><?= ($key->boe_item_tax_other_duties_amount != '' ? precise_amount($key->boe_item_tax_other_duties_amount) : 0); ?></span>                                                        </td>                                                        <!-- tax area  -->                                                        <td>                                                            <input type='text' class='float_number form-control form-fixer text-right' name='item_grand_total' value='<?= ($key->boe_item_grand_total ? precise_amount($key->boe_item_grand_total) : 0); ?>'>                                                        </td>                                                        <?php                                                        $boe_temp = array( "item_key_value" => $i, "item_id" => $key->item_id, "item_type" => $key->item_type, "item_quantity" => $key->boe_item_quantity, "item_price" => $key->boe_item_unit_price ? precise_amount($key->boe_item_unit_price) : 0, "item_sub_total" => $key->boe_item_sub_total ? precise_amount($key->boe_item_sub_total) : 0, "item_bcd_amount" => $key->boe_item_bcd_amount ? precise_amount($key->boe_item_bcd_amount) : 0, "bcd_percentage" => $key->boe_item_bcd_percentage ? $key->boe_item_bcd_percentage : 0, "item_tax_amount" => $key->boe_item_tax_amount ? precise_amount($key->boe_item_tax_amount) : 0, "item_tax_cess_amount" => $key->boe_tax_cess_amount ? $key->boe_tax_cess_amount : 0, "item_tax_cess_percentage" => $key->boe_item_tax_cess_percentage ? (float)($key->boe_item_tax_cess_percentage) : 0,                                                            "item_other_duties_amount" => $key->boe_item_tax_other_duties_amount ? $key->boe_item_tax_other_duties_amount : 0,                                                             "other_duties_percentage" => $key->boe_item_tax_other_duties_percentage ? precise_amount($key->boe_item_tax_other_duties_percentage) : 0,                                                            "item_tax_percentage" => $key->boe_tax_percentage ? precise_amount($key->boe_tax_percentage) : 0, "item_taxable_value" => $key->boe_item_taxable_value ? precise_amount($key->boe_item_taxable_value) : 0, "item_grand_total" => $key->boe_item_grand_total ? precise_amount($key->boe_item_grand_total) : 0 );                                                        if ($key->item_type == 'product' || $key->item_type == 'product_inventory') {                                                            $boe_temp['item_code'] = $key->product_code;                                                        } else {                                                            $boe_temp['item_code'] = $key->service_code;                                                        }                                                        ?></tr>                                                    <?php                                                    $boe_data[$i] = $boe_temp;                                                    $i++;                                                } $boe = htmlspecialchars(json_encode($boe_data));                                                $countData = $i;                                                ?>                                            </tbody>                                        </table>                                        <!-- Hidden Field -->                                        <input type="hidden" class="form-control" id="product_module_id" name="product_module_id" value="<?= $product_module_id ?>">                                        <input type="hidden" class="form-control" id="service_module_id" name="service_module_id" value="<?= $service_module_id ?>">                                        <input type="hidden" class="form-control" id="invoice_date_old" name="invoice_date_old" value="<?php echo $date; ?>">                                        <input type="hidden" class="form-control" id="module_id" name="module_id" value="<?= $boe_module_id ?>">                                        <input type="hidden" class="form-control" id="privilege" name="privilege" value="<?= $privilege ?>">                                        <input type="hidden" class="form-control" id="invoice_number_old" name="invoice_number_old" value="<?= $data[0]->reference_number; ?>">                                        <input type="hidden" class="form-control" id="section_area" name="section_area" value="add_boe">                                        <input type="hidden" name="total_sub_total" id="total_sub_total" value="<?= $data[0]->boe_sub_total; ?>">                                        <input type="hidden" name="total_taxable_amount" id="total_taxable_amount" value="<?= $data[0]->boe_sub_total; ?>">                                        <input type="hidden" name="total_tax_amount" id="total_tax_amount" value="<?= $data[0]->boe_tax_amount; ?>">                                        <input type="hidden" name="total_bcd_amount" id="total_bcd_amount" value="<?= $data[0]->boe_bcd_amount; ?>">                                        <input type="hidden" name="total_tax_cess_amount" id="total_tax_cess_amount" value="<?= $data[0]->boe_cess_amount; ?>">                                        <input type="hidden" name="total_other_duties_amount" id="total_other_duties_amount" value="<?= $data[0]->boe_other_duties_amount; ?>">                                        <input type="hidden" name="total_igst_amount" id="total_igst_amount" value="<?= $data[0]->boe_tax_amount; ?>">                                        <input type="hidden" name="total_grand_total" id="total_grand_total" value="<?= $data[0]->boe_grand_total; ?>">                                        <input type="hidden" name="table_data" id="table_data" value="<?= $boe; ?>">                                        <table id="table-total" class="table table-striped table-bordered table-condensed table-hover table-responsive">                                            <tr class="totalBCDAmount_tr">                                                <td align="right">                                                    <?php echo 'Total BCD'; ?>(+)</td>                                                <td align='right'><span id="totalBCD"><?= precise_amount($data[0]->boe_bcd_amount); ?></span>                                                </td>                                            </tr>                                            <tr <?= ( $access_settings[0]->tax_type == 'no_tax' ? 'style="display: none;"' : ''); ?> class='totalIGSTAmount_tr'>                                                <td align="right">                                                    <?php echo 'IGST'; ?>(+)</td>                                                <td align='right'><span id="totalIGSTAmount"><?= precise_amount($data[0]->boe_tax_amount); ?></span>                                                </td>                                            </tr>                                            <tr <?= ( $access_settings[0]->tax_type == 'no_tax' ? 'style="display: none;"' : ''); ?> class='totalCessAmount_tr'>                                                <td align="right">                                                    <?php echo 'Cess'; ?>(+)</td>                                                <td align='right'><span id="totalTaxCessAmount"><?= precise_amount($data[0]->boe_cess_amount); ?></span>                                                </td>                                            </tr>                                            <tr  class='totalOtherDutiesAmount_tr'>                                                <td align="right"><?php echo 'Other Duties'; ?> (+)</td>                                                <td align='right'><span id="totalOtherDutiesAmount"><?= precise_amount($data[0]->boe_other_duties_amount); ?></span></td>                                            </tr>                                            <tr>                                                <td align="right">                                                    <?php echo 'Grand Total'; ?>(=)</td>                                                <td align='right'><span id="totalGrandTotal"><?= precise_amount($data[0]->boe_grand_total); ?></span>                                                </td>                                            </tr>                                        </table>                                    </div>                                    <div class="box-footer">                                        <button type="submit" id="boe_submit" name="submit" value="edit" class="btn btn-info">Update</button>                                        <span class="btn btn-default" id="boe_cancel" onclick="cancel('boe')">Cancel</span>                                    </div>                                    <?php $this->load->view('sub_modules/notes_sub_module'); ?></div>                            </div>                        </form>                    </div>                </div>            </div>        </div>    </section>   </div> <?php    $this->load->view('layout/footer');    $this->load->view('supplier/supplier_modal');    $this->load->view('category/category_modal');    $this->load->view('subcategory/subcategory_modal');    $this->load->view('tax/tax_modal');    $this->load->view('discount/discount_modal');    if ($item_modal == 1) {        $this->load->view('layout/item_modal');    } else {        if ($product_inventory_modal == 1) {            $this->load->view('product/product_inventory_modal');        } if ($product_modal == 1) {            $this->load->view('product/product_modal');        } if ($product_modal == 1 || $product_inventory_modal == 1) {            $this->load->view('product/hsn_modal');        } if ($service_modal == 1) {            $this->load->view('service/service_modal');            $this->load->view('service/sac_modal');        }    } $this->load->view('sub_modules/shipping_address_modal');    ?>    <script type="text/javascript">        var purchase_data = new Array();        var branch_state_list = <?php echo json_encode($state); ?>;        var item_gst = new Array();        var common_settings_round_off = "<?= $access_common_settings[0]->round_off_access ?>";        var common_settings_amount_precision = "<?= $access_common_settings[0]->amount_precision ?>";        var settings_tax_percentage = "<?= $access_common_settings[0]->tax_split_percentage ?>";        var common_settings_inventory_advanced = "1";        var settings_tax_type = "<?= $access_settings[0]->tax_type ?>";        var settings_discount_visible = "<?= $access_settings[0]->discount_visible ?>";        var settings_description_visible = "<?= $access_settings[0]->description_visible ?>";        var settings_tds_visible = "<?= $access_settings[0]->tds_visible ?>";        var settings_item_editable = "<?= $access_settings[0]->item_editable ?>";    </script>    <script src="<?php echo base_url('assets/js/boe/'); ?>boe.js"></script>    <script src="<?php echo base_url('assets/js/boe/'); ?>boe_common_basic.js"></script>