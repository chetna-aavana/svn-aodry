<div class="row">    <div class="box-header with-border transporter" >        <h3 class="box-title">Transporter Details</h3>        <span class="pull-right-container"> <i class="glyphicon glyphicon-chevron-right"></i> </span>    </div></div><div class="row transporter-data mt-15">    <div class="col-sm-3">        <div class="form-group">            <label>Name</label>            <input type="text" class="form-control" name="transporter_name" id="transporter_name"  value="<?php            if (isset($data[0]->transporter_name)) {                echo $data[0]->transporter_name;            }            ?>">        </div>    </div>    <div class="col-sm-3">        <div class="form-group">            <label>GST Number</label>            <input type="text" class="form-control" name="transporter_gst_number" id="transporter_gst_number" value="<?php            if (isset($data[0]->transporter_gst_number)) {                echo $data[0]->transporter_gst_number;            }            ?>">        </div>    </div>    <div class="col-sm-3">        <div class="form-group">            <label>LR No:</label>            <input type="text" class="form-control" name="lr_no" id="lr_no" value="<?php            if (isset($data[0]->lr_no)) {                echo $data[0]->lr_no;            }            ?>">        </div>    </div>    <div class="col-sm-3">        <div class="form-group">            <label>Vehicle No:</label>            <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" value="<?php                   if (isset($data[0]->vehicle_no)) {                       echo $data[0]->vehicle_no;                   }                   ?>">        </div>    </div></div><script>    $('.transporter .glyphicon-chevron-right').click(function () {        $('.transporter-data').toggle('slow');    }).trigger('click');</script>