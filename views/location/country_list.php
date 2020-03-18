<?php defined('BASEPATH') OR exit('No direct script access allowed');$this ->load->view('layout/header');?><div class="content-wrapper">		<div class="fixed-breadcrumb">		<ol class="breadcrumb abs-ol">			<li>				<a href="<?php echo base_url('auth/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>			</li>			<li class="active">				Tax			</li>		</ol>	</div>	<section class="content mt-50">		<div class="row">			<div class="col-md-12">				<div class="box">					<div id="plus_btn">					<div class="box-header with-border drop-dn">						<h3 class="box-title">Country</h3>						<a data-toggle="modal" data-target="#add_country" class="add_subcategory btn btn-sm btn-info pull-right" href="">Add Country</a>					</div>					</div>					<div id="filter">						<div class="box-header with-border box-body filter_body">						</div>					</div>					<div class="box-body">						<table id="list_datatable" class="table table-bordered table-striped table-hover table-responsive">							<thead>								<tr>									<th width="9px">#</th>									<th>Country </th>								</tr>							</thead>							<tbody></tbody>						</table>					</div>									</div>							</div>					</div>			</section>	</div><?php $this->load->view('layout/footer');	$this->load->view('general/delete_modal');	$this->load->view('location/add_country');	$this->load->view('location/edit_country');?><script>	$(document).ready(function() {		$('#list_datatable').DataTable({						"processing": true,            "serverSide": true,            "ajax": {                "url": base_url + "location/country",                "dataType": "json",                "type": "POST",                "data": {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'}            },            "columns": [           		{"data": "action"},                {"data": "country_name"},             ],             'language': {                'loadingRecords': '&nbsp;',                'processing': ' <h1 class="ml8"><span class="letters-container"> <span class="letters letters-left"><img src="<?php echo base_url('assets/'); ?>images/loader-icon.png" width="30px"></span></span><span class="circle circle-white"></span><span class="circle circle-dark"></span><span class="circle circle-container"><span class="circle circle-dark-dashed"></span></span></h1>'                },            });             anime.timeline({loop:!0}).add({targets:".ml8 .circle-white",scale:[0,3],opacity:[1,0],easing:"easeInOutExpo",rotateZ:360,duration:8e3}),anime({targets:".ml8 .circle-dark-dashed",rotateZ:360,duration:8e3,easing:"linear",loop:!0});	}); 		$('body').on('change' , 'input[type="checkbox"][name="check_item"]' , function () {        var i = 0;        $.each($("input[name='check_item']:checked") , function () {            i++;        });        if (i == 1)        {            var row = $("input[name='check_item']:checked").closest("tr");            var action_button = row.find('.action_button').html();            $('#plus_btn').hide();            $('.filter_body').html(action_button);            $('#filter').show();        }        else        {            $('#plus_btn').show();            $('#filter').hide();            $('.filter_body').html('');        }    });</script>