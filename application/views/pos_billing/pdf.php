<!DOCTYPE html>

<html>

    <head>

        <title>

            POS Billing

        </title>

        <style type="text/css">



            .table {

                margin: 0px;

                font-size: 11px;

            }







            .table, th, td {

                border: 1px solid #333 !important;

                border-width: thin;

                font-size: 11px;

                padding: 2px 4px;

                border-collapse: collapse !important;



            }

            .header_table td{

                padding-left: 15px;



            }

            .footerpad {

                padding: 4px;

            }

            .minheight {

                min-height: 1000px;

            }

            .fontS {

                font-size: 11px;

            }

            .fontH {

                font-size: 12px;

            }

            p

            {

                font-size: 12px;

            }

        </style>

    </head>

    <body>

        <?php

        if ($pdf_results['theme'] == 'custom' && $pdf_results['background'] == 'black')

        {



            echo "<style>

            .white-text{color: #fff}

            </style>";

        }

        else

        {

            echo "<style>

            .white-text{color: #000}

            </style>";

        }









        $sid = $this->session->userdata('SESS_BRANCH_ID');



        if ($pdf_results['heading_position'] == 'top')

        {

            ?>

            <table width="100%" cellspacing="0" border-collapse="collapse" class="table header_table" style="margin-top:20px 0px;border:none!important">

                <?php

                if ($pdf_results['theme'] == 'default')

                {

                    ?>

                    <tr style="text-align: center;">

                        <td style="text-align: center;font-size: 20px">POS Billing </td>

                    </tr>

                    <?php

                }

                ?>

                <?php

                if ($pdf_results['theme'] == 'custom')

                {

                    ?>

                    <tr style="text-align: center;background-color: <?= $pdf_results['background']; ?>;border:none!important">

                        <td style="text-align: center;font-size: 20px;" class="white-text">POS Billing </td>

                    </tr>

                    <?php

                }

                ?>

            </table>



            <table width="100%" style="margin-top: 20px">

                <tr>

                    <td valign="top" width="50%">

                        POS Billing Date<br>

                        <?php

                        $date     = $data[0]->pos_billing_date;

                        $date_for = date('d-m-Y', strtotime($date));

                        ?>

                        <p style="font-weight:bold"><?php

                            if (isset($data[0]->pos_billing_date))

                            {

                                echo $date_for;

                            }

                            ?></p>

                    </td>

                    <td valign="top" width="50%">

                        POS Billing Number<br>

                        <p style="font-weight:bold"><?php

                            if (isset($data[0]->pos_billing_invoice_number))

                            {

                                echo $data[0]->pos_billing_invoice_number;

                            }

                            ?></p>

                    </td>

                </tr>

            </table>

            <?php

        }

        ?>

        <table width="100%" class="table" style="border:none!important;margin-top: 20px">

            <tr style="border: 0px;">

                <td style="border: 0px;text-align: <?= $pdf_results['logo_align'] ?>; font-size: 20px"><?php

                    if (isset($branch[0]->firm_logo) && $branch[0]->firm_logo != "" && $pdf_results['logo'] == 'yes')

                    {

                        ?>

                        <img src="<?php echo base_url('assets/branch_files/') . $branch[0]->branch_id . '/' . $branch[0]->firm_logo; ?>" style="max-width: 150px !important;max-height: 50px !important;" />

                        <?php

                    }

                    else

                    {

                        ?>

                        <?php

                        if ($pdf_results['theme'] == 'default' && $pdf_results['company_name'] == 'yes')

                        {

                            ?>



                            <b style="font-size: 14px; text-transform: uppercase">  <?= $branch[0]->firm_name ?></b>

                            <?php

                        }

                        ?>

                        <?php

                        if ($pdf_results['theme'] == 'custom' && $pdf_results['company_name'] == 'yes')

                        {

                            ?>



                            <b style="font-size: 14px; text-transform: uppercase; border-bottom: solid 2px #0177a9;">  <?= $branch[0]->firm_name ?></b>

                            <?php

                        }

                    }

                    ?>

                </td>



            </tr>

           <!--  <tr style="border: 0px;">

               <td style="border: 0px;text-align: right;">(<?php echo $invoice_type; ?>)</td>



            </tr> -->

        </table>

       <!--  <table width="100%" cellspacing="0" border-collapse="collapse" class="table header_table" style="margin-top:20px">

            <tr>

                <td style="padding: 5px;" align="center" width="50%" >Credit Note </td>



                <td valign="top" width="25%">

                        Sales Date<br>

        <?php

        $date     = $data[0]->pos_billing_date;

        $date_for = date('d-m-Y', strtotime($date));

        ?>

                    <p style="font-weight:bold"><?php

        if (isset($data[0]->pos_billing_date))

        {

            echo $date_for;

        }

        ?></p>

                </td>

                <td valign="top" width="25%">

                      Sales Number<br>

                    <p style="font-weight:bold"><?php

        if (isset($data[0]->pos_billing_invoice_number))

        {

            echo $data[0]->pos_billing_invoice_number;

        }

        ?></p>

                </td>

            </tr>

        </table> -->



        <table width="100%" cellspacing="0" border-collapse="collapse" class="table header_table" style="margin-top:20px;border:none!important;">

            <tr>

                <?php

                if ($pdf_results['show_from'] == 'yes')

                {

                    ?>

                    <td width="50%" valign="top" style="border:<?php echo ($pdf_results['bordered'] == 'yes') ? '' : 'none'; ?>;">





                        <b style="font-size: 11px;">From,</b><br><br>

                        <b style="font-size: 11px; text-transform: capitalize;"><?php

                            if (isset($branch[0]->branch_name))

                            {

                                echo $branch[0]->branch_name;

                            }

                            ?></b>

                        <br>

                        <?php

                        if ($pdf_results['address'] == 'yes')

                        {

                            if (isset($branch[0]->branch_address))

                            {

                                echo str_replace(array(

                                        "\r\n",

                                        "\\r\\n",

                                        "\n",

                                        "\\n" ), "<br>", $branch[0]->branch_address);

                                ?>

                                <br>



                                <?php

                            }

                        }



                        if ($pdf_results['state'] == 'yes')

                        {

                            if (isset($state[0]->state_name))

                            {

                                echo $state[0]->state_name . ",";

                            }

                        }

                        ?> <?php

                        if ($pdf_results['country'] == 'yes')

                        {

                            if (isset($country[0]->country_name))

                            {

                                echo $country[0]->country_name . ".";

                                ?>



                                <?php

                            }

                        }

                        if ($pdf_results['mobile'] == 'yes')

                        {

                            if (isset($branch[0]->branch_mobile))

                            {

                                if ($branch[0]->branch_mobile != "" || $branch[0]->branch_mobile != null)

                                {

                                    echo '<br>Mobile No : ' . $branch[0]->branch_mobile;

                                }

                                // echo 'Contact No : ' . $branch[0]->branch_mobile;

                            }

                            ?>

                            <?php

                            if ($pdf_results['landline'] == 'yes')

                            {

                                if (isset($branch[0]->branch_land_number))

                                {

                                    if ($branch[0]->branch_land_number != "")

                                    {

                                        echo '<br>Landline No : ' . $branch[0]->branch_land_number;

                                    }

                                }

                            }

                            ?>



                            <?php

                        }

                        if (isset($branch[0]->branch_email_address) && ($pdf_results['email'] == 'yes'))

                        {

                            if ($branch[0]->branch_email_address != "")

                            {

                                echo '<br>E-mail : ' . $branch[0]->branch_email_address;

                            }

                            ?>





                            <?php

                        }

                        if (isset($branch[0]->branch_gstin_number) && ($pdf_results['gst'] == 'yes'))

                        {

                            if ($branch[0]->branch_gstin_number != "" || $branch[0]->branch_gstin_number != null)

                            {

                                echo "<br>GSTIN : " . $branch[0]->branch_gstin_number;

                            }

                            ?>

                            <?php

                        }

                        ?>

                        <?php

                        if (isset($branch[0]->branch_pan_number) && $branch[0]->branch_pan_number != "" && ($pdf_results['pan'] == 'yes'))

                        {

                            if ($branch[0]->branch_pan_number != "" || $branch[0]->branch_pan_number != null)

                            {

                                echo "<br />PAN : " . $branch[0]->branch_pan_number;

                            }

                            ?>



                            <?php

                        }

                        ?>



                        <?php

                        if (isset($branch[0]->branch_import_export_code_number) && ($pdf_results['iec'] == 'yes'))

                        {

                            if ($branch[0]->branch_import_export_code_number != "" || $branch[0]->branch_import_export_code_number != null)

                            {

                                echo "<br />IEC : " . $branch[0]->branch_import_export_code_number;

                            }

                            ?>





                            <?php

                        }



                        if (isset($branch[0]->branch_lut_number) && ($pdf_results['lut'] == 'yes'))

                        {

                            if ($branch[0]->branch_lut_number != "" || $branch[0]->branch_lut_number != null)

                            {

                                echo "<br />LUT : " . $branch[0]->branch_lut_number;

                            }

                            ?>



                            <?php

                        }

                        if (isset($branch[0]->branch_cin_number) && ($pdf_results['lut'] == 'yes'))

                        {

                            if ($branch[0]->branch_cin_number != "" || $branch[0]->branch_cin_number != null)

                            {

                                echo "<br />CIN : " . $branch[0]->branch_cin_number;

                            }

                        }

                        ?>



                    </td>

                    <?php

                }



                if ($pdf_results['l_r'] == 'yes')

                {

                    ?>

                    <td width="50%" valign="top" style="border:<?php echo ($pdf_results['bordered'] == 'yes') ? '' : 'none'; ?>">

                        <?php

                        if ($data[0]->pos_billing_party_type || $data[0]->pos_billing_mobile || $data[0]->pos_billing_email)

                        {

                            ?>

                            <b style="font-size: 11px;">To,</b><br><br>

                            <b style="font-size: 11px; text-transform: capitalize;"><?php

                                if (isset($data[0]->pos_billing_party_type) && ($pdf_results['to_company'] == 'yes'))

                                {

                                    echo $data[0]->pos_billing_party_type;

                                }

                                ?></b>

                        <?php } ?>

                        <?php

                        if (isset($data[0]->pos_billing_mobile) && ($pdf_results['to_mobile'] == 'yes'))

                        {

                            if ($data[0]->pos_billing_mobile != "")

                            {

                                echo '<br>Mobile No : ' . $data[0]->pos_billing_mobile;

                            }

                        }

                        ?>

                        <?php

                        if (isset($data[0]->pos_billing_email) && ($pdf_results['to_email'] == 'yes'))

                        {

                            if ($data[0]->pos_billing_email != "")

                            {

                                echo '<br>E-mail : ' . $data[0]->pos_billing_email;

                            }

                        }

                        ?>



                    </td>

                <?php } ?>

                <?php

                if ($access_common_settings[0]->affliation_images != null)

                {

                    if ($pdf_results['l_r'] != 'yes' && $pdf_results['display_affliate'] == 'yes')

                    {

                        $json_str = str_replace("\\", "", $access_common_settings[0]->affliation_images);

                        $arr      = json_decode($json_str);

                        ?>



                        <td width="50%" valign="top" style="text-align: center;border:<?php echo ($pdf_results['bordered'] == 'yes') ? '' : 'none'; ?>;">

                            <img width="200" height="150" style="margin: 20px 0px" src="<?= base_url('assets/affiliate/' . $sid . '/' . $arr[0]) ?>">

                        </td>

                        <?php

                    }

                }

                ?>











                <!-- <?php

                // if($this->session->userdata('SESS_BRANCH_ID')==) {

                ?> -->



<!-- <img width="250" src="<?= base_url('assets/img/Street-view-trusted-logo-new-grey.png') ?>"> -->

            </tr>



            <!--  <?php

            // }

            ?> -->



        </table>



        <?php

        if ($pdf_results['heading_position'] == 'center')

        {

            ?>

            <table width="100%" cellspacing="0" border-collapse="collapse" class="table header_table" style="margin-top:20px 0px;border:none!important">

                <?php

                if ($pdf_results['theme'] == 'default')

                {

                    ?>

                    <tr style="text-align: center;">

                        <td style="text-align: center;font-size: 20px">POS Billing </td>

                    </tr>

                    <?php

                }

                ?>

                <?php

                if ($pdf_results['theme'] == 'custom')

                {

                    ?>

                    <tr style="text-align: center;background-color: <?= $pdf_results['background']; ?>;border:none!important">

                        <td style="text-align: center;font-size: 20px;" class="white-text"> POS Billing </td>

                    </tr>

                    <?php

                }

                ?>

            </table>

            <table width="100%" style="margin-top: 20px">

                <tr>

                    <td valign="top" width="50%">

                        POS Billing Date<br>

                        <?php

                        $date     = $data[0]->pos_billing_date;

                        $date_for = date('d-m-Y', strtotime($date));

                        ?>

                        <p style="font-weight:bold"><?php

                            if (isset($data[0]->pos_billing_date))

                            {

                                echo $date_for;

                            }

                            ?></p>

                    </td>

                    <td valign="top" width="50%">

                        POS Billing Number<br>

                        <p style="font-weight:bold"><?php

                            if (isset($data[0]->pos_billing_invoice_number))

                            {

                                echo $data[0]->pos_billing_invoice_number;

                            }

                            ?></p>

                    </td>

                </tr>

            </table>

            <?php

        }

        ?>

        <table width="100%" cellspacing="0" border-collapse="collapse" class="table header_table" style="margin-top:20px;border:none!important">

            <?php

            if ($pdf_results['l_r'] != 'yes')

            {

                ?>

                <tr style="border:<?php echo ($pdf_results['bordered'] == 'yes') ? '' : 'none'; ?>;">

                    <td> <b style="font-size: 11px;">To,</b><br><br>

                        <b style="font-size: 11px; text-transform: capitalize;"><?php

                            if (isset($data[0]->customer_name) && ($pdf_results['to_company'] == 'yes'))

                            {

                                echo $data[0]->customer_name;

                            }

                            ?></b>

                        <?php

                        if (isset($data[0]->customer_gstin_number))

                        {

                            if ($data[0]->customer_gstin_number != "")

                            {

                                echo "<br/>GSTIN : ";

                                echo $data[0]->customer_gstin_number;

                            }

                        }

                        ?><br>

                            <?php

                            if (isset($data[0]->customer_address) && ($pdf_results['to_address'] == 'yes'))

                            {

                                echo str_replace(array(

                                        "\r\n",

                                        "\\r\\n",

                                        "\n",

                                        "\\n" ), "<br>", $data[0]->customer_address);

                            }

                            ?><br>

                        <?php

                        if (isset($data[0]->customer_city_name))

                        {

                            echo $data[0]->customer_city_name;

                        }

                        ?>  <?php

                        if (isset($data[0]->customer_postal_code))

                        {

                            if ($data[0]->customer_postal_code != "")

                            {

                                echo "-" . $data[0]->customer_postal_code;

                            }

                        }

                        ?><br>

                        <?php

                        if (isset($data[0]->customer_state_name) && ($pdf_results['to_state'] == 'yes'))

                        {

                            echo $data[0]->customer_state_name;

                        }

                        ?>,

                        <?php

                        if (isset($data[0]->customer_country_name) && ($pdf_results['to_country'] == 'yes'))

                        {

                            echo $data[0]->customer_country_name;

                        }

                        ?>



                        <?php

                        if (isset($data[0]->customer_mobile) && ($pdf_results['to_mobile'] == 'yes'))

                        {

                            if ($data[0]->customer_mobile != "")

                            {

                                echo '<br>Mobile No : ' . $data[0]->customer_mobile;

                            }

                        }

                        ?>

                        <?php

                        if (isset($data[0]->customer_email) && ($pdf_results['to_email'] == 'yes'))

                        {

                            if ($data[0]->customer_email != "")

                            {

                                echo '<br>E-mail : ' . $data[0]->customer_email;

                            }

                        }

                        ?>



                        <?php

                        if (isset($data[0]->customer_state_code) && $data[0]->customer_state_code != 0 && ($pdf_results['to_state_code'] == 'yes'))

                        {

                            echo '<br>State Code : ' . $data[0]->customer_state_code;

                        }

                        ?>



                        <?php

                        if (isset($data[0]->place_of_supply) && ($pdf_results['place_of_supply'] == 'yes'))

                        {

                            if ($data[0]->place_of_supply != "" || $data[0]->place_of_supply != null)

                            {

                                echo '<br>Place of Supply : ' . $data[0]->place_of_supply;

                            }

                        }



                        if (isset($data[0]->shipping_address_sa))

                        {

                            if ($data[0]->shipping_address_sa != "" || $data[0]->shipping_address_sa != null)

                            {

                                echo '<br><br><b>Shipping Address</b><br>' . str_replace(array(

                                        "\r\n",

                                        "\\r\\n",

                                        "\n",

                                        "\\n" ), "<br>", $data[0]->shipping_address_sa);

                            }

                        }



                        if (isset($data[0]->shipping_gstin))

                        {

                            if ($data[0]->shipping_gstin != "" || $data[0]->shipping_gstin != null)

                            {

                                echo '<br>Shipping GSTIN : ' . $data[0]->shipping_gstin;

                            }

                        }

                        ?>



                    </td>

                </tr>

                <?php

            }

            ?>

        </table>



        <table width="100%" cellspacing="0" border-collapse="collapse" class="table"  style="margin-top: 20px;">

            <thead>

                <?php

                if ($igst_tax > 1 || $cgst_tax > 1 || $sgst_tax > 1)

                {

                    ?>

                    <tr>

                       <!--  <th width="4%" rowspan="2" >Sl<br/>No</th> -->

                        <th rowspan="2" >Item Description</th>

                        <!-- <?php if ($dpcount > 0)

                {

                        ?>

                                    <th rowspan="2"  >Description</th>

    <?php } ?>  -->

                        <!-- <th colspan="1" style="border-top: 1px solid #333; border-right: 0">qty</th> -->

                        <th rowspan="2">Quantity</th>

                        <th rowspan="2">Rate</th>

                        <th rowspan="2">Sub <br/> Total</th>

                        <?php if ($dtcount > 0)

                        {

                            ?>

                            <th rowspan="2" >Disc<br />Amt</th>

                        <?php } ?>



                        <!-- <?php

                        if ($igst_tax < 1 && $cgst_tax > 1)

                        {

                            ?>

                                    <th rowspan="2">Taxable <br/>Value</th>

                                    <th colspan="2">CGST</th>

                                    <th colspan="2">SGST</th>



                        <?php

                        }

                        else if ($igst_tax > 1 && $cgst_tax < 1)

                        {

                            ?>

                                    <th rowspan="2">Taxable <br/>Value</th>

                                    <th colspan="2" >IGST</th>

    <?php } ?> -->

                        <th rowspan="2">Taxable <br/>Value</th>

                        <th colspan="2" >GST</th>

                        <th rowspan="2">Total</th>

                    </tr>

                    <tr>

                        <!-- <?php

    if ($igst_tax < 1 && $cgst_tax > 1)

    {

        ?>

                                <th>

                                   Rate %

                                </th>

                                 <th>

                                   Amt

                                </th>

                                 <th>

                                   Rate %

                                </th>

                                 <th>

                                   Amt

                                </th>



    <?php

    }

    else if ($igst_tax > 1 && $cgst_tax < 1)

    {

        ?>



                                         <th>

                                   Rate %

                                </th>

                                 <th>

                                   Amt

                                </th>

    <?php } ?>  -->

                        <th>

                            Rate %

                        </th>

                        <th>

                            Amt

                        </th>

                    </tr>

    <?php

}

else

{

    ?>

                    <tr>

                       <!--  <th width="4%">Sl<br/>No</th> -->

                        <th>Item Description</th>

                        <!-- <?php if ($dpcount > 0)

    {

        ?>

                                    <th>Description</th>

                        <?php } ?>  -->

                        <!-- <th colspan="1" style="border-top: 1px solid #333; border-right: 0">qty</th> -->

                        <th>Quantity</th>

                        <th>Rate</th>

                        <th>Sub <br/> Total</th>

    <?php if ($dtcount > 0)

    {

        ?>

                            <th>Disc<br />Amt</th>

                    <?php } ?>

                        <th>Total</th>

                    </tr>

                <?php } ?>

            </thead>



            <tbody>

                <?php

                $i           = 1;

                $tot         = 0;

                $igst        = 0;

                $cgst        = 0;

                $sgst        = 0;

                $quantity    = 0;

                $price       = 0;

                $discount    = 0;

                $grand_total = 0;

                foreach ($items as $value)

                {

                    ?>

                    <tr>

                      <!--   <td align="center"><?php echo $i; ?></td> -->

    <?php if ($value->item_type == 'product' || $value->item_type == 'product_inventory')

    {

        ?>

                            <td ><?php echo $value->product_name; ?><br>HSN/SAC: <?php echo $value->product_hsn_sac_code; ?><br><?php echo $value->pos_billing_item_description; ?></td>

                        <?php

                        }

                        else

                        {

                            ?>

                            <td ><?php echo $value->service_name; ?><br>HSN/SAC: <?php echo $value->service_hsn_sac_code; ?><br><?php echo $value->pos_billing_item_description; ?></td>

                            <?php } ?>



                        <!--  <?php if ($dpcount > 0)

                        {

                                ?>

                                     <td  ><?php echo $value->pos_billing_item_description; ?></td>

    <?php } ?> -->



                        <td align="center"><?php

                        echo $value->pos_billing_item_quantity;

                        if ($value->item_type == 'product' || $value->item_type == 'product_inventory')

                        {

                            $unit = explode("-", $value->product_unit);

                            echo " " . $unit[0];

                        }

                        ?>



                        </td>

                        <td align="right"><?php echo $value->pos_billing_item_unit_price; ?></td>

                        <td align="right"><?php echo $value->pos_billing_item_sub_total; ?></td>



    <?php if ($dtcount > 0)

    {

        ?>

                            <td align="right"><?php echo $value->pos_billing_item_discount_amount; ?></td>



    <?php } ?>



                        <!-- <?php if ($igst_tax < 1 && $cgst_tax > 1)

    {

        ?>

                                <td align="right"><?php echo $value->pos_billing_item_taxable_value; ?></td>

                                <td align="center"><?php echo $value->pos_billing_item_cgst_percentage; ?></td>

                                <td align="right"><?php echo $value->pos_billing_item_cgst_amount; ?></td>

                                <td align="center"><?php echo $value->pos_billing_item_sgst_percentage; ?></td>

                                <td align="right"><?php echo $value->pos_billing_item_sgst_amount; ?></td>



    <?php

    }

    else if ($igst_tax > 1 && $cgst_tax < 1)

    {

        ?>

                                <td align="right"><?php echo $value->pos_billing_item_taxable_value; ?></td>

                                    <td align="center"><?php echo $value->pos_billing_item_igst_percentage; ?></td>

                                <td align="right"><?php echo $value->pos_billing_item_igst_amount; ?></td>

                    <?php } ?> -->



                    <?php if ($igst_tax > 1 || $cgst_tax > 1 || $sgst_tax > 1)

                    {

                        ?>

                            <td align="right"><?php echo $value->pos_billing_item_taxable_value; ?></td>

                            <td align="center"><?php echo bcadd($value->pos_billing_item_cgst_percentage, $value->pos_billing_item_sgst_percentage, 2); ?></td>

                            <td align="right"><?php echo bcadd($value->pos_billing_item_cgst_amount, $value->pos_billing_item_sgst_amount, 2); ?></td>

    <?php } ?>

                        <td align="right"><?php echo $value->pos_billing_item_grand_total ?></td>

                    </tr>

                        <?php

                        $i++;

                        $quantity = bcadd($quantity, $value->pos_billing_item_quantity, 2);

                        $price    = bcadd($price, $value->pos_billing_item_unit_price, 2);

                        // $sub_total = bcadd($tot, $value->sub_total, 2);

                        // $discount = bcadd($discount, $value->discount_amt, 2);

                        // $taxable_value = bcadd($discount, $value->taxable_value, 2);

                        // $igst = bcadd($igst, $value->sales_item_igst_amount, 2);

                        // $cgst = bcadd($cgst, $value->sales_item_cgst_amount, 2);

                        // $sgst = bcadd($sgst, $value->sales_item_sgst_amount, 2);



                        $grand_total = bcadd($grand_total, $value->pos_billing_item_grand_total, 2);

                    }

                    ?>

                <tr>





<?php

if ($dpcount > 0)

{

    ?>

                        <th colspan="1" align="right" height="30px;"><b>Total</b></th>



                        <?php

                    }

                    else

                    {

                        ?>

                        <th colspan="1" align="right">Total</th>

    <?php

}

?>



                    <th align="right"><?php echo $quantity; ?></th>

                    <th align="right"><?php echo $price; ?></th>

                    <th align="right"><?php echo $data[0]->pos_billing_sub_total; ?></th>



                    <?php

                    if ($dtcount > 0)

                    {

                        ?>

                        <th><?php echo $data[0]->pos_billing_discount_value; ?></th>



    <?php

}

?>



                    <!-- <?php if ($igst_tax < 1 && $cgst_tax > 1)

                    {

    ?>

                            <th align="right"><?php echo $data[0]->pos_billing_taxable_value; ?></th>



                                    <th align="right" colspan="2"><?php echo bcdiv($data[0]->pos_billing_tax_amount, 2, 2); ?></th>



                                <th align="right" colspan="2"><?php echo bcdiv($data[0]->pos_billing_tax_amount, 2, 2); ?></th>



<?php

}

else if ($igst_tax > 1 && $cgst_tax < 1)

{

    ?>

                            <th align="right"><?php echo $data[0]->pos_billing_taxable_value; ?></th>



                                <th align="right" colspan="2"><?php echo $data[0]->pos_billing_tax_amount; ?></th>



            <?php }

            ?> -->



            <?php if ($igst_tax > 1 || $cgst_tax > 1 || $sgst_tax > 1)

            {

                ?>

                        <th align="right"><?php echo $data[0]->pos_billing_taxable_value; ?></th>

                        <th align="right" colspan="2"><?php echo $data[0]->pos_billing_tax_amount; ?></th>

            <?php } ?>

                    <th align="right"><?php echo $grand_total ?></th>



                </tr>

            </tbody>

        </table>



        <table width="100%" cellspacing="0" border-collapse="collapse" class="table" style="margin-top: 30px;">



            <?php

            $charges_sub_module = 0;

            foreach ($access_sub_modules as $key => $value)

            {

                if (isset($charges_sub_module_id))

                {

                    if ($charges_sub_module_id == $value->sub_module_id)

                    {

                        $charges_sub_module = 1;

                    }

                }

            }

            if ($charges_sub_module == 1)

            {

                if ($data[0]->total_freight_charge > 0)

                {

                    ?>

                    <tr class="no-bottom-border no-top-border">

                        <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;">Freight Charge (<?php echo $this->session->userdata('SESS_DEFAULT_CURRENCY_CODE'); ?>)</td>

                        <td align="right" class="footerpad fontH"><?php echo $data[0]->total_freight_charge; ?> /-</td>

                    </tr>

                    <?php

                }

                if ($data[0]->total_insurance_charge > 0)

                {

                    ?>

                    <tr class="no-bottom-border no-top-border">

                        <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;">Insurance Charge (<?php echo $this->session->userdata('SESS_DEFAULT_CURRENCY_CODE'); ?>)</td>

                        <td align="right" class="footerpad fontH"><?php echo $data[0]->total_insurance_charge; ?> /-</td>

                    </tr>

                    <?php

                }

                if ($data[0]->total_packing_charge > 0)

                {

                    ?>

                    <tr class="no-bottom-border no-top-border">

                        <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;">Packing & Forwarding Charge (<?php echo $this->session->userdata('SESS_DEFAULT_CURRENCY_CODE'); ?>)</td>

                        <td align="right" class="footerpad fontH"><?php echo $data[0]->total_packing_charge; ?> /-</td>

                    </tr>

                    <?php

                }

                if ($data[0]->total_incidental_charge > 0)

                {

                    ?>

                    <tr class="no-bottom-border no-top-border">

                        <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;">Incidental Charge (<?php echo $this->session->userdata('SESS_DEFAULT_CURRENCY_CODE'); ?>)</td>

                        <td align="right" class="footerpad fontH"><?php echo $data[0]->total_incidental_charge; ?> /-</td>

                    </tr>

                    <?php

                }

                if ($data[0]->total_inclusion_other_charge > 0)

                {

                    ?>

                    <tr class="no-bottom-border no-top-border">

                        <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;">Other Inclusive Charge (<?php echo $this->session->userdata('SESS_DEFAULT_CURRENCY_CODE'); ?>)</td>

                        <td align="right" class="footerpad fontH"><?php echo $data[0]->total_inclusion_other_charge; ?> /-</td>

                    </tr>

        <?php

    }

    if ($data[0]->total_exclusion_other_charge > 0)

    {

        ?>

                    <tr class="no-bottom-border no-top-border">

                        <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;">Other Exclusive Charge (<?php echo $this->session->userdata('SESS_DEFAULT_CURRENCY_CODE'); ?>)</td>

                        <td align="right" class="footerpad fontH">-<?php echo $data[0]->total_exclusion_other_charge; ?> /-</td>

                    </tr>

                <?php

            }

        }

        ?>

        </table>



        <table width="100%" cellspacing="0" border-collapse="collapse" class="table" style="margin-top: 30px;">



            <tr>

                <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;"><b>Grand Total (<?php echo $this->session->userdata('SESS_DEFAULT_CURRENCY_CODE'); ?>)</td>

                <td align="right" class="footerpad fontH"><b><?php echo $data[0]->pos_billing_grand_total; ?> /-</td>

            </tr>

            <tr>

                <td style="" align="left" colspan="2" height="25">

                    Amount (in Words): <b><?php echo $this->session->userdata('SESS_DEFAULT_CURRENCY_TEXT') . " " . $this->numbertowords->convert_number($data[0]->pos_billing_grand_total) . " Only"; ?> </b><br/>

                </td>

            </tr>

        </table>



        <?php

        $notes_sub_module = 0;

        foreach ($access_sub_modules as $key => $value)

        {

            if (isset($notes_sub_module_id))

            {

                if ($notes_sub_module_id == $value->sub_module_id)

                {

                    $notes_sub_module = 1;

                }

            }

        }

        if ($notes_sub_module == 1)

        {

            $this->load->view('note_template/display_note');

        }

        ?>

        <br/>

                <?php

                if (isset($access_common_settings[0]->invoice_footer))

                {

                    ?>

            <table>

                <tr>

                    <td colspan="14" style="border:0px;text-align: center;font-size: 13px;"><?php echo $access_common_settings[0]->invoice_footer; ?></td>

                </tr>

            </table>



    <?php

}



if ($pdf_results['display_affliate'] == 'yes')

{

    ?>



            <table width="100%" style="margin:50px 0px 0px 0px;">

                <tr>

            <?php

            if ($access_common_settings[0]->affliation_images != null)

            {

                $json_str = str_replace("\\", "", $access_common_settings[0]->affliation_images);

                $arr      = json_decode($json_str);

                ?>

                        <td class="text-center" style="text-align: center;border:none">

        <?php

        foreach ($arr as $key)

        {

            ?>



                                <img  width="100" height="50" src="<?= base_url('assets/affiliate/' . $sid . '/' . $key) ?>">



            <?php

        }

        ?>

                        </td>

    <?php } ?>

                </tr>

            </table>

    <?php

}

?>



    </body>

</html>

