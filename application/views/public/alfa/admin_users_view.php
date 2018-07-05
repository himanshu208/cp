<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('public/alfa/_parts/header'); 
?>
<title><?php echo $this->config->item('site_title'); ?></title>
</head>
<body>

<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
    <div class="container-fluid">
    	<!-- Load Navbar Header -->
        <?php $this->load->view('public/alfa/_parts/navbar_header');?>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('nav_home');?></a></li>
				<li><a href="<?php echo base_url('users');?>"><i class="fa fa-users" aria-hidden="true"></i> <?php echo lang('nav_all_users');?></a></li>                
                <li class="active"><a href="<?php echo base_url('admin');?>"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo lang('nav_admin');?></a></li>
            </ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url('social/logout');?>"><img src="<?php echo $this->sess_photoURL;?>" alt="<?php echo lang('profile_user_picture');?>" class="user_photo img-circle" /><span class="nav_log"><?php echo lang('nav_logout');?></span></a></li>
			</ul>
        </div>

    </div>
</div>

<div class="container">
	<div class="row">

		<div class="headline">
			<p class="headline_title"><?php echo lang('nav_all_users');?></p>
		</div>
		
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin');?>"><?php echo lang('nav_admin');?></a></li>
			<li class="active"><?php echo lang('nav_all_users');?></li>
			<li class="pull-right go_back"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><i class="fa fa-caret-left" aria-hidden="true"></i> <?php echo lang('nav_back');?></a></li>
		</ol>
		
			<div class="col-md-12">
				<!-- All Users Table -->
				<div class="widget_box">
					<div class="col-md-12">
					<h5><?php echo lang('gen_total_users');?> <?php echo $this->db->count_all('cisociall_users'); ?></h5>
						<div class="table-responsive">
							<table id="mytable" class="table table-bordred table-striped">
								<thead>
									<th><?php echo lang('profile_title_image');?></th>
									<th><?php echo lang('profile_provider');?></th>
									<th><?php echo lang('profile_identifier');?></th>
									<th><?php echo lang('profile_user_name');?></th>
									<th><?php echo lang('profile_email');?></th>
									<th><?php echo lang('profile_title_profile');?></th>
									<th><?php echo lang('profile_title_activation');?></th>
								</thead>

								<tbody>

								<?php foreach ($admin_all_users as $get_admin_all_users) { ?>
									<tr>
										<td><img src="<?php echo $get_admin_all_users->photoURL;?>" alt="<?php echo $get_admin_all_users->displayName;?>" class="media-object" /></td>
										<td class="capitalize"><?php echo $get_admin_all_users->provider_name;?></td>
										<td><?php echo $get_admin_all_users->identifier;?></td>
										<td><?php echo $get_admin_all_users->displayName;?></td> 
										<td><?php echo $get_admin_all_users->email;?></td>
										<td><div class="btn btn-primary btn-xs btn-flat" onclick="document.getElementById('sendprofile_<?php echo $get_admin_all_users->id;?>').submit();"><i class="fa fa-eye" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="<?php echo lang('profile_title_go_profile');?>"></i></div>
										<?php echo form_open(base_url('admin/user_detail'), 'id="sendprofile_'.$get_admin_all_users->id.'"');?>
										<?php echo form_hidden('user_id', $get_admin_all_users->id);?>
										<?php echo form_hidden('user_email', $get_admin_all_users->email);?>
										<?php echo form_close();?>
										</td>
										<td><?php echo ($get_admin_all_users->active) ? anchor('admin/users/deactivate/'.$get_admin_all_users->id, lang('profile_button_active'), 'span class="btn btn-success btn-xs btn-flat" data-toggle="tooltip" data-placement="top" title="'.lang('profile_deactive_tooltip').'"') : anchor('admin/users/activate/'. $get_admin_all_users->id, lang('profile_button_deactive'), 'span class="btn btn-danger btn-xs btn-flat" data-toggle="tooltip" data-placement="top" title="'.lang('profile_active_tooltip').'"'); ?>
										</td>
									</tr>
								<?php } ?>
								</tbody>       
							</table>

							<div class="clearfix"></div>
							<div id="pagination" class="col-xs-12 text-center"><?php echo $this->pagination->create_links(); ?></div>

						</div>
					</div>
				</div>
			</div>
		<!-- '''''''''''''''''''''''''''''''''''''''' -->
	</div>
</div>

<?php $this->load->view('public/alfa/_parts/footer'); ?>