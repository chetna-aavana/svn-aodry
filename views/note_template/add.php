<?phpdefined('BASEPATH') OR exit('No direct script access allowed');// $p = array('admin', 'manager');// if (!(in_array($this->session->userdata('type'), $p))) {//     redirect('auth');// }$this->load->view('layout/header');?><!-- Content Wrapper. Contains page content --><div class="content-wrapper">    <!-- Content Header (Page header) -->    <section class="content-header">        <h5>            <ol class="breadcrumb">                <li><a href="<?php echo base_url('auth/dashboard'); ?>"><i class="fa fa-dashboard"></i>                        <!-- Dashboard -->                        Dashboard</a></li>                <li><a href="<?php echo base_url('note_template'); ?>">                        Note Template</a>                </li>                <li class="active">Add Note Template                    <!-- <?php echo $this->lang->line('add_customer_label'); ?> -->                </li>            </ol>        </h5>    </section>    <section class="content">        <div class="row">            <div class="col-md-12">                <div class="box">                    <div class="box-header with-border">                        <h3 class="box-title">                            Add Note Template1                            <!-- <?php echo $this->lang->line('add_customer_header'); ?> -->                        </h3>                    </div>                    <div class="box-body">                        <div class="row">                            <form role="form" id="form" method="post" action="<?php echo base_url('note_template/add_note_template'); ?>">                                <div class="col-sm-3">                                    <div class="form-group">                                        <label for="hash_tag">Hash Tag (#)<span style="color:red;">*</span></label>                                        <input type="text" class="form-control" id="hash_tag" placeholder="#tag" name="hash_tag" value="<?php echo set_value('hash_tag'); ?>">                                        <span class="validation-color" id="err_hash_tag"><?php echo form_error('title'); ?></span>                                        <span style="color: green;" id="msg_hash_tag"><?php echo form_error('title'); ?></span>                                    </div>                                </div>                                <div class="col-sm-3">                                    <div class="form-group">                                        <label for="title">Title<span style="color:red;">*</span></label>                                        <input type="text" class="form-control" placeholder="Title" id="title" name="title" value="<?php echo set_value('title'); ?>">                                        <span class="validation-color" id="err_title"><?php echo form_error('title'); ?></span>                                    </div>                                </div>                                <div class="col-sm-3">                                    <div class="form-group">                                        <label for="content">Content<span style="color:red;">*</span></label>                                        <textarea class="form-control" id="content" name="content"></textarea>                                        <span class="validation-color" id="err_content"><?php echo form_error('content'); ?></span>                                    </div>                                </div>                                <div class="panel-body pull-right mt-15">                                    <p>                                        <button class="btn btn-info btn-flat" id="template_submit" type="submit">Add</button>                                        <a href="<?php echo base_url('note_template'); ?>" class="btn btn-default btn-flat" type="button">Cancel</a>                                    </p>                                </div>                            </form>                        </div>                    </div>                </div>            </div>        </div>    </section></div><?php$this->load->view('layout/footer.php');?><script src="<?php echo base_url('assets/js/note_template/') ?>note_template.js"></script>