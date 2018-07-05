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
				<li>
                <?php
                    if ($this->is_online) {
                        echo'<a href="'.base_url('social/logout').'">
                        <img src="'.$this->sess_photoURL.'" alt="'.lang("profile_user_picture").'" class="user_photo img-circle" /><span class="nav_log">'.lang("nav_logout").'</span></a>';
                    } else {
                        echo'<a href="'.base_url().'"><i class="fa fa-lock" aria-hidden="true"></i><span class="nav_log"> '.lang("nav_login").'</span></a>';
                    }
                ?>
                </li>
			</ul>
        </div>

    </div>
</div>

<div class="container">
	<div class="row">
		<div class="headline"><p class="headline_title"><?php echo lang('headline_admin_error');?></p></div>
		<div class="alert alert-info must_login_note"><?php echo lang('view_admin_error');?></div>
	</div>
</div>

<?php $this->load->view('public/alfa/_parts/footer'); ?>