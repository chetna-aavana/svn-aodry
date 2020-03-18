<!DOCTYPE html>

<html>

    <head>

        <title>

            Sales Invoice

        </title>

        <style type="text/css">



            .table {

                margin: 0px;

                font-size: 11px;

            }

            .white-text{color: #fff}

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

        </style>    </head>

    <body>

        <table width="100%" class="table" style="border:none!important;">

            <tr style="border: 0px;">

                <td style="border: 0px;text-align: center; font-size: 20px"><?php

                    if (isset($branch[0]->firm_logo) && $branch[0]->firm_logo != "")

                    {

                        ?>

                        <img src="<?php echo base_url('assets/branch_files/') . $branch[0]->branch_id . '/' . $branch[0]->firm_logo; ?>" style="max-width: 150px !important;max-height: 50px !important;" />

                        <?php

                    }

                    else

                    {

                        ?>

                        <b style="font-size: 14px; text-transform: uppercase; border-bottom: solid 2px #0177a9;">  <?= $branch[0]->firm_name ?></b>

                        <?php

                    }

                    ?>

                </td>



            </tr>

            <tr style="border: 0px;">

                <td style="border: 0px;text-align: right;">(<?php echo $invoice_type; ?>)</td>



            </tr>

        </table>

       <!--  <table width="100%" cellspacing="0" border-collapse="collapse" class="table header_table" style="margin-top:20px">

            <tr>

                <td style="padding: 5px;" align="center" width="50%" >Tax Invoice</td>



                <td valign="top" width="25%">

                        Sales Date<br>

        <?php

        $date     = $data[0]->sales_date;

        $date_for = date('d-m-Y', strtotime($date));

        ?>

                    <p style="font-weight:bold"><?php

        if (isset($data[0]->sales_date))

        {

            echo $date_for;

        }

        ?></p>

                </td>

                <td valign="top" width="25%">

                      Sales Number<br>

                    <p style="font-weight:bold"><?php

        if (isset($data[0]->sales_invoice_number))

        {

            echo $data[0]->sales_invoice_number;

        }

        ?></p>

                </td>

            </tr>

        </table> -->



        <table width="100%" cellspacing="0" border-collapse="collapse" class="table header_table" style="margin-top:20px;border:none!important;">

            <tr>



                <td width="50%" valign="top" style="border:none!important;">





                    <b style="font-size: 11px;">From,</b><br><br>

                    <b style="font-size: 11px; text-transform: capitalize;"><?php

                        if (isset($branch[0]->branch_name))

                        {

                            echo $branch[0]->branch_name;

                        }

                        ?></b>

                    <br>

                    <?php

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

                    if (isset($state[0]->state_name))

                    {

                        echo $state[0]->state_name;

                    }

                    ?>, <?php

                    if (isset($country[0]->country_name))

                    {

                        echo $country[0]->country_name;

                        ?>.



                        <?php

                    }

                    if (isset($branch[0]->branch_mobile))

                    {

                        if ($branch[0]->branch_mobile != "" || $branch[0]->branch_mobile != null)

                        {

                            echo '<br>Mobile No : ' . $branch[0]->branch_mobile;

                        }

                        // echo 'Contact No : ' . $branch[0]->branch_mobile;

                        ?>

                        <?php

                        if (isset($branch[0]->branch_land_number))

                        {

                            if ($branch[0]->branch_land_number != "")

                            {

                                echo '<br>Landline No : ' . $branch[0]->branch_land_number;

                            }

                        }

                        ?>



                        <?php

                    }

                    if (isset($branch[0]->branch_email_address))

                    {

                        if ($branch[0]->branch_email_address != "")

                        {

                            echo '<br>E-mail : ' . $branch[0]->branch_email_address;

                        }

                        ?>





                        <?php

                    }

                    if (isset($branch[0]->branch_gstin_number))

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

                    if (isset($branch[0]->branch_pan_number) && $branch[0]->branch_pan_number != "")

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

                    if (isset($branch[0]->branch_import_export_code_number))

                    {

                        if ($branch[0]->branch_import_export_code_number != "" || $branch[0]->branch_import_export_code_number != null)

                        {

                            echo "<br />IEC : " . $branch[0]->branch_import_export_code_number;

                        }

                        ?>





                        <?php

                    }



                    if (isset($branch[0]->branch_lut_number))

                    {

                        if ($branch[0]->branch_lut_number != "" || $branch[0]->branch_lut_number != null)

                        {

                            echo "<br />LUT : " . $branch[0]->branch_lut_number;

                        }

                        ?>



                        <?php

                    }

                    if (isset($branch[0]->branch_cin_number))

                    {

                        if ($branch[0]->branch_cin_number != "" || $branch[0]->branch_cin_number != null)

                        {

                            echo "<br />CIN : " . $branch[0]->branch_cin_number;

                        }

                    }

                    ?>



                </td>

                <td width="50%" valign="top" style="border:none!important;">







            </tr>







        </table>



        <table width="100%" cellspacing="0" border-collapse="collapse" class="table header_table" style="margin-top:20px;border:none!important">

            <tr style="text-align: center;background-color: #367fa9;border:none!important">

                <td style="text-align: center;font-size: 20px;color: #fff">Tax Invoice</td>

            </tr>

        </table>

        <table width="100%" cellspacing="0" border-collapse="collapse" class="table header_table" style="margin-top:20px;border:none!important">

            <tr style="border:none!important">

                <td> <b style="font-size: 11px;">To,</b><br><br>

                    <b style="font-size: 11px; text-transform: capitalize;"><?php

                        if (isset($data[0]->customer_name))

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

                        if (isset($data[0]->customer_address))

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

                    if (isset($data[0]->customer_state_name))

                    {

                        echo $data[0]->customer_state_name;

                    }

                    ?>,

                    <?php

                    if (isset($data[0]->customer_country_name))

                    {

                        echo $data[0]->customer_country_name;

                    }

                    ?>



                    <?php

                    if (isset($data[0]->customer_mobile))

                    {

                        if ($data[0]->customer_mobile != "")

                        {

                            echo '<br>Mobile No : ' . $data[0]->customer_mobile;

                        }

                    }

                    ?>

                    <?php

                    if (isset($data[0]->customer_email))

                    {

                        if ($data[0]->customer_email != "")

                        {

                            echo '<br>E-mail : ' . $data[0]->customer_email;

                        }

                    }

                    ?>



                    <?php

                    if (isset($data[0]->customer_state_code) && $data[0]->customer_state_code != 0)

                    {

                        echo '<br>State Code : ' . $data[0]->customer_state_code;

                    }

                    ?>



                    <?php

                    if (isset($data[0]->place_of_supply))

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

                <!-- <td colspan="2">

                     <b style="font-size: 11px;">Shipping Details,</b>

                     <br/><br/>

                       <b style="font-size: 11px; text-transform: capitalize;"></b><?php

                if (isset($data[0]->mode_of_shipment) && $data[0]->mode_of_shipment != "")

                {



                    echo "Shipment Mode: " . $data[0]->mode_of_shipment;

                    echo "<br/>";

                }

                ?>



                <?php

                if (isset($data[0]->ship_by) && $data[0]->ship_by != "")

                {







                    echo "Ship By : ";

                    echo $data[0]->ship_by;

                    echo "<br/>";

                }

                ?>



                <?php

                if (isset($data[0]->net_weight) && $data[0]->net_weight != "")

                {



                    echo "Net Weight : " . $data[0]->net_weight;

                    echo "<br/>";

                }

                ?>



                <?php

                if (isset($data[0]->gross_weight) && $data[0]->gross_weight != "")

                {



                    echo "Gross Weight : " . $data[0]->gross_weight;

                    echo "<br/>";

                }

                ?>



                <?php

                if (isset($data[0]->origin) && $data[0]->origin != "")

                {



                    echo "Orgin : " . $data[0]->origin;

                    echo "<br/>";

                }

                ?>



                <?php

                if (isset($data[0]->destination) && $data[0]->destination != "")

                {



                    echo "Destination : " . $data[0]->destination;

                }

                ?>

            <br/>

                <?php

                if (isset($data[0]->shipping_type) && $data[0]->shipping_type != "")

                {



                    echo $data[0]->shipping_type . ' : ' . $data[0]->shipping_type_place;



                    echo "<br/>";

                }

                ?>



                <?php

                if (isset($data[0]->lead_time) && $data[0]->lead_time != "")

                {



                    echo 'Lead Time : ' . $data[0]->lead_time;

                    echo "  ,  ";

                }



                if (isset($data[0]->warranty) && $data[0]->warrantys != "")

                {



                    echo 'Warranty : ' . $data[0]->warranty;

                }

                ?>

                </td> --></td>

            </tr>



        </table>



        <table width="100%" cellspacing="0" border-collapse="collapse" class="table header_table" style="margin-top:20px">

            <tr>

                <td valign="top" width="34%">

                    Billing Country<br>

                    <p style="font-weight:bold"><?php

                        if (isset($data_country[0]->country_name))

                        {

                            echo ucfirst($data_country[0]->country_name);

                        }

                        ?></p>

                </td>



              <!--   <td valign="top" width="25%">

                        Place of Supply<br>

                    <p style="font-weight:bold"><?php

                if (isset($data_state[0]->state_name))

                {

                    if ($data_state[0]->state_name != "" || $data_state[0]->state_name != null)

                    {

                        echo ucfirst($data_state[0]->state_name);

                    }

                    else

                    {

                        echo "-";

                    }

                }

                else

                {

                    echo "-";

                }

                ?></p>

                </td> -->



                <td valign="top" width="33%">

                    Nature of Supply<br>

                    <p style="font-weight:bold"><?php

                        if (isset($nature_of_supply))

                        {

                            echo $nature_of_supply;

                            // echo str_replace("_", " ", $type_of_supply);

                        }

                        ?></p>

                </td>

                <td valign="top" width="33%">

                    GST Payable on Reverse Charge<br>

                    <p style="font-weight:bold"><?php

                        if (isset($data[0]->sales_gst_payable))

                        {

                            echo ucfirst($data[0]->sales_gst_payable);

                        }

                        ?></p>

                </td>

            </tr>

        </table>



        <table width="100%" cellspacing="0" border-collapse="collapse" class="table"  style="margin-top: 20px;">

            <thead>

                <?php

                if ($igst_tax > 1 || $cgst_tax > 1 || $sgst_tax > 1)

                {

                    ?>

                    <tr style="background-color: #367fa9">

                       <!--  <th width="4%" rowspan="2" >Sl<br/>No</th> -->

                        <th rowspan="2" class="white-text">Item  Description</th>

                        <!--   <?php if ($dpcount > 0)

                {

                        ?>

                                      <th rowspan="2"  >Description</th>

    <?php } ?>  -->

                          <!-- <th colspan="1" style="border-top: 1px solid #333; border-right: 0">qty</th> -->

                        <th rowspan="2" class="white-text">Quantity</th>

                        <th rowspan="2" class="white-text">Rate</th>

                        <th rowspan="2" class="white-text">Sub <br/> Total</th>

                        <?php if ($dtcount > 0)

                        {

                            ?>

                            <th rowspan="2" >Disc<br />Amt</th>

                        <?php } ?>

                        <th rowspan="2" class="white-text">Taxable <br/>Value</th>

                        <?php

                        if ($igst_tax < 1 && $cgst_tax > 1)

                        {

                            ?>

                            <th colspan="2" class="white-text">CGST</th>

                            <th colspan="2" class="white-text">SGST</th>



                        <?php

                        }

                        else

                        {

                            ?>



                            <th colspan="2"  class="white-text">IGST</th>

                        <?php } ?>

                        <th rowspan="2" class="white-text">Total</th>

                    </tr>

                    <tr style="background-color: #367fa9 ">

    <?php

    if ($igst_tax < 1 && $cgst_tax > 1)

    {

        ?>

                            <th  class="white-text">

                                Rate %

                            </th>

                            <th  class="white-text">

                                Amt

                            </th>

                            <th  class="white-text">

                                Rate %

                            </th>

                            <th  class="white-text">

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

                            <th  class="white-text">

                                Amt

                            </th>

    <?php

    }

    else if ($data[0]->sales_billing_state_id == $branch[0]->branch_state_id)

    {

        ?>

                            <th>

                                Rate %

                            </th>

                            <th  class="white-text">

                                Amt

                            </th>

                            <th  class="white-text">

                                Rate %

                            </th>

                            <th  class="white-text">

                                Amt

                            </th>





        <?php

    }

    else

    {

        ?>

                            <th class="white-text">

                                Rate %

                            </th>

                            <th class="white-text">

                                Amt

                            </th>

                    <?php }

                    ?>



                    </tr>

    <?php

}

else

{

    ?>

                    <tr>

                        <!-- <th width="4%" >Sl<br/>No</th> -->

                        <th >Item  Description</th>

                        <!--    <?php if ($dpcount > 0)

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

                        <!-- <td align="center"><?php echo $i; ?></td> -->

                        <?php if ($value->item_type == 'product' || $value->item_type == 'product_inventory')

                        {

                            ?>

                            <td ><?php echo $value->product_name; ?><br>HSN/SAC: <?php echo $value->product_hsn_sac_code; ?><br><?php echo $value->sales_item_description; ?></td>

    <?php

    }

    else

    {

        ?>

                            <td ><?php echo $value->service_name; ?><br>HSN/SAC: <?php echo $value->service_hsn_sac_code; ?><br><?php echo $value->sales_item_description; ?></td>

                            <?php } ?>



                        <!-- <?php if ($dpcount > 0)

                        {

                            ?>

                                    <td  ><?php echo $value->sales_item_description; ?></td>

    <?php } ?> -->



                        <td align="center"><?php

                        echo $value->sales_item_quantity;

                        if ($value->item_type == 'product' || $value->item_type == 'product_inventory')

                        {

                            $unit = explode("-", $value->product_unit);

                            echo " " . $unit[0];

                        }

                        ?>



                        </td>

                        <td align="right"><?php echo $value->sales_item_unit_price; ?></td>

                        <td align="right"><?php echo $value->sales_item_sub_total; ?></td>



                        <?php if ($dtcount > 0)

                        {

                            ?>

                            <td align="right"><?php echo $value->sales_item_discount_amount; ?></td>



    <?php } ?>



                        <?php if ($igst_tax < 1 && $cgst_tax > 1)

                        {

                            ?>

                            <td align="right"><?php echo $value->sales_item_taxable_value; ?></td>

                            <td align="center"><?php echo $value->sales_item_cgst_percentage; ?></td>

                            <td align="right"><?php echo $value->sales_item_cgst_amount; ?></td>

                            <td align="center"><?php echo $value->sales_item_sgst_percentage; ?></td>

                            <td align="right"><?php echo $value->sales_item_sgst_amount; ?></td>



    <?php

    }

    else if ($igst_tax > 1 && $cgst_tax < 1)

    {

        ?>

                            <td align="right"><?php echo $value->sales_item_taxable_value; ?></td>

                            <td align="center"><?php echo $value->sales_item_igst_percentage; ?></td>

                            <td align="right"><?php echo $value->sales_item_igst_amount; ?></td>



                            <?php

                        }

                        // else if ($data[0]->sales_billing_state_id == $branch[0]->branch_state_id ) {

                        ?>

                            <!-- <td align="right"><?php echo $value->sales_item_taxable_value; ?></td>

                               <td align="center"><?php echo $value->sales_item_cgst_percentage; ?></td>

                                    <td align="right"><?php echo $value->sales_item_cgst_amount; ?></td>

                                     <td align="center"><?php echo $value->sales_item_sgst_percentage; ?></td>

                                <td align="right"><?php echo $value->sales_item_sgst_amount; ?></td> -->



    <?php

    // }

    // else {

    ?>

                            <!-- <td align="center"><?php echo $value->sales_item_igst_percentage; ?></td>

                            <td align="right"><?php echo $value->sales_item_igst_amount; ?></td> -->



                    <?php

                    // }

                    ?>

                    <?php

                    // $a = bcsub($value->sub_total, $value->discount, 2);

                    // $b = bcadd($a, $value->igst_tax, 2);

                    // $c = bcadd($b, $value->cgst_tax, 2);

                    // $d = bcadd($c, $value->sgst_tax, 2);

                    // $final = bcsub($d, $value->tds_amt, 2);

                    ?>

                        <td align="right"><?php echo $value->sales_item_grand_total ?></td>

                    </tr>

                        <?php

                        $i++;

                        $quantity = bcadd($quantity, $value->sales_item_quantity, 2);

                        $price    = bcadd($price, $value->sales_item_unit_price, 2);

                        // $sub_total = bcadd($tot, $value->sub_total, 2);

                        // $discount = bcadd($discount, $value->discount_amt, 2);

                        // $taxable_value = bcadd($discount, $value->taxable_value, 2);

                        // $igst = bcadd($igst, $value->sales_item_igst_amount, 2);

                        // $cgst = bcadd($cgst, $value->sales_item_cgst_amount, 2);

                        // $sgst = bcadd($sgst, $value->sales_item_sgst_amount, 2);



                        $grand_total = bcadd($grand_total, $value->sales_item_grand_total, 2);

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

                    <th align="right"><?php echo $data[0]->sales_sub_total; ?></th>



<?php

if ($dtcount > 0)

{

    ?>

                        <th><?php echo $data[0]->sales_discount_value; ?></th>



    <?php

}

?>





<?php if ($data[0]->sales_igst_amount < 1 && $data[0]->sales_cgst_amount > 1)

{

    ?>

                        <th align="right"><?php echo $data[0]->sales_taxable_value; ?></th>



                        <th align="right" colspan="2"><?php echo bcdiv($data[0]->sales_tax_amount, 2, 2); ?></th>



                        <th align="right" colspan="2"><?php echo bcdiv($data[0]->sales_tax_amount, 2, 2); ?></th>



                    <?php

                    }

                    else if ($data[0]->sales_igst_amount > 1 && $data[0]->sales_cgst_amount < 1)

                    {

                        ?>

                        <th align="right"><?php echo $data[0]->sales_taxable_value; ?></th>

                        <th align="right" colspan="2"><?php echo $data[0]->sales_tax_amount; ?></th>



<?php

}

// else if ($data[0]->sales_billing_state_id == $branch[0]->branch_state_id ) {

?>

                    <!-- <th align="right"><?php echo $data[0]->sales_taxable_value; ?></th>

                     <th align="right" colspan="2"><?php echo bcdiv($data[0]->sales_tax_amount, 2, 2); ?></th>



                        <th align="right" colspan="2"><?php echo bcdiv($data[0]->sales_tax_amount, 2, 2); ?></th> -->

            <?php

            // }

            // else {

            ?>

                        <!-- <th align="right" colspan="2"><?php echo $data[0]->sales_tax_amount; ?></th> -->

            <?php

// }

            ?>



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

                        <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;">Freight Charge (<?php echo $data[0]->currency_code; ?>)</td>

                        <td align="right" class="footerpad fontH"><?php echo $data[0]->total_freight_charge; ?> /-</td>

                    </tr>

                    <?php

                }

                if ($data[0]->total_insurance_charge > 0)

                {

                    ?>

                    <tr class="no-bottom-border no-top-border">

                        <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;">Insurance Charge (<?php echo $data[0]->currency_code; ?>)</td>

                        <td align="right" class="footerpad fontH"><?php echo $data[0]->total_insurance_charge; ?> /-</td>

                    </tr>

                    <?php

                }

                if ($data[0]->total_packing_charge > 0)

                {

                    ?>

                    <tr class="no-bottom-border no-top-border">

                        <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;">Packing & Forwarding Charge (<?php echo $data[0]->currency_code; ?>)</td>

                        <td align="right" class="footerpad fontH"><?php echo $data[0]->total_packing_charge; ?> /-</td>

                    </tr>

                    <?php

                }

                if ($data[0]->total_incidental_charge > 0)

                {

                    ?>

                    <tr class="no-bottom-border no-top-border">

                        <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;">Incidental Charge (<?php echo $data[0]->currency_code; ?>)</td>

                        <td align="right" class="footerpad fontH"><?php echo $data[0]->total_incidental_charge; ?> /-</td>

                    </tr>

                    <?php

                }

                if ($data[0]->total_inclusion_other_charge > 0)

                {

                    ?>

                    <tr class="no-bottom-border no-top-border">

                        <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;">Other Inclusive Charge (<?php echo $data[0]->currency_code; ?>)</td>

                        <td align="right" class="footerpad fontH"><?php echo $data[0]->total_inclusion_other_charge; ?> /-</td>

                    </tr>

        <?php

    }

    if ($data[0]->total_exclusion_other_charge > 0)

    {

        ?>

                    <tr class="no-bottom-border no-top-border">

                        <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;">Other Exclusive Charge (<?php echo $data[0]->currency_code; ?>)</td>

                        <td align="right" class="footerpad fontH">-<?php echo $data[0]->total_exclusion_other_charge; ?> /-</td>

                    </tr>

                <?php

            }

        }

        ?>

        </table>



        <table width="100%" cellspacing="0" border-collapse="collapse" class="table" style="margin-top: 30px;">



            <tr>

                <td align="right" class="footerpad fontH" width="80%" style="border-right: solid 1px #FFF;"><b>Grand Total (<?php echo $data[0]->currency_code; ?>)</td>

                <td align="right" class="footerpad fontH"><b><?php echo $data[0]->sales_grand_total; ?> /-</td>

            </tr>

            <tr>

                <td style="" align="left" colspan="2" height="25">

                    Amount (in Words): <b><?php echo $data[0]->currency_text . " " . $this->numbertowords->convert_number($data[0]->sales_grand_total) . " Only"; ?> </b><br/>

                </td>

            </tr>

        </table>



        <?php

        if (isset($data[0]->sales_type_of_supply) && $data[0]->sales_type_of_supply != "regular")

        {

            ?>

            <table width="100%" cellspacing="0" border-collapse="collapse" class="table" style="margin-top: 30px;">

                <tr>

                    <td style="" valign="top">

    <?php

    if (isset($data[0]->sales_type_of_supply) && $data[0]->sales_type_of_supply == "export_with_payment")

    {

        ?>

                            <p><b>NOTE : </b>SUPPLY MEANT FOR EXPORT ON PAYMENT OF INTEGRATED TAX</p>

                <?php

            }

            else if (isset($data[0]->sales_type_of_supply) && $data[0]->sales_type_of_supply == "export_without_payment")

            {

                ?>

                            <p><b>NOTE : </b>SUPPLY MEANT FOR EXPORT UNDER BOND OR LETTER OF UNDERTAKING WITHOUT PAYMENT OF INTEGRATED TAX</p>

            <?php } ?>

                    </td>

                </tr>

            </table>

        <?php } ?>



<!--         <table width="100%" cellspacing="0" border-collapse="collapse" class="table" style="margin-top: 30px;">



               <tr>



                 <td style="" valign="top" align="Right" height="65px">

                    <b>Authorised Signature: </b><b><br/><br/></b>

                </td>

            </tr>

         </table> -->



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

?>

    </body>

</html>

