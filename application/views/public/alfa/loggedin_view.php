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
                <li class="active"><a href="<?php echo base_url();?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('nav_home');?></a></li>
				<li><a href="<?php echo base_url('users');?>"><i class="fa fa-users" aria-hidden="true"></i> <?php echo lang('nav_all_users');?></a></li>                
                <li><a href="<?php echo base_url('admin');?>"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo lang('nav_admin');?></a></li>
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
			<p class="headline_title"><?php echo lang('headline_you_are_loggedin');?></p>
		</div>

		<div class="alert alert-success loggedin_note"><?php echo lang('view_loggedin_alert');?></div>
		
		<!-- ''''''''''''''''''''''''' User Profile ''''''''''''''''''''''''' -->
		<div class="col-sm-12 social_loggedin">
		<?php foreach ($user_loggedin_detail as $loggedin_user_detail) { ?>

			<div class="col-sm-3 user_profile_left">
			<!-- ''''''''''''''''''''''''' Circle Image ''''''''''''''''''''''''' -->
					<?php
			if (!empty($loggedin_user_detail->photoURL))
				{ ?>
				<a href="<?php echo $loggedin_user_detail->photoURL; ?>" class="popup_image">
				<img src="<?php echo $loggedin_user_detail->photoURL;?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive" /></a>
			<?php }  else {
					if ($loggedin_user_detail->gender == 'male') { ?>
						<a href="<?php echo base_url('themes/public/alfa/img/user_male.png');?>" class="popup_image">
						<img src="<?php echo base_url('themes/public/alfa/img/user_male.png');?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive" /></a>	
					<?php } else if ($loggedin_user_detail->gender == 'female') { ?>
						<a href="<?php echo base_url('themes/public/alfa/img/user_female.png');?>" class="popup_image">
						<img src="<?php echo base_url('themes/public/alfa/img/user_female.png');?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive" /></a>
					<?php } else { ?>
					<a href="<?php echo base_url('themes/public/alfa/img/yoda.png');?>" class="popup_image">
					<img src="<?php echo base_url('themes/public/alfa/img/yoda.png');?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive" /></a>	
					<?php }
			} ?>
			</div>
			<div class="col-sm-9 user_profile_right">    
			<?php
				echo '<p><span class="col-xs-12"><i class="fa fa-circle" aria-hidden="true"></i> '.lang("profile_you_are_online").'</span></p>';
				echo '<p><span class="col-xs-4"><b>'.lang('profile_provider').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->provider_name.'</span></p>';
				echo '<p><span class="col-xs-4"><b>'.lang('profile_identifier').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->identifier.'</span></p>';
				if (!empty($loggedin_user_detail->displayName)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_user_name').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->displayName.'</span></p>';}
				if (!empty($loggedin_user_detail->firstName)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_first_name').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->firstName.'</span></p>';}
				if (!empty($loggedin_user_detail->lastName)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_last_name').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->lastName.'</span></p>';}
				if (!empty($loggedin_user_detail->email)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_email').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7" style="text-transform:none;">'.$loggedin_user_detail->email.'</span></p>';}
				if (!empty($loggedin_user_detail->phone)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_phone').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->phone.'</span></p>';}
				if (!empty($loggedin_user_detail->gender)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_gender').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->gender.'</span></p>';}
				if (!empty($loggedin_user_detail->language)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_language').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->language.'</span></p>';}
				if (!empty($loggedin_user_detail->age)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_age').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->age.'</span></p>';}
				if (!empty($loggedin_user_detail->birthDay)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_birth_day').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->birthDay.'</span></p>';}
				if (!empty($loggedin_user_detail->birthMonth)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_birth_month').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->birthMonth.'</span></p>';}
				if (!empty($loggedin_user_detail->birthYear)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_birth_year').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->birthYear.'</span></p>';}
				if (!empty($loggedin_user_detail->job_title)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_job_title').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->job_title.'</span></p>';}
				if (!empty($loggedin_user_detail->organization_name)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_organization').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->organization_name.'</span></p>';}
				if (!empty($loggedin_user_detail->webSiteURL)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_web_site').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7"><a href="'.$loggedin_user_detail->webSiteURL.'" target="_blank">'.$loggedin_user_detail->webSiteURL.'</a></span></p>';}
				if (!empty($loggedin_user_detail->city)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_city').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->city.'</span></p>';}
				if (!empty($loggedin_user_detail->region)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_region').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->region.'</span></p>';}
				if (!empty($loggedin_user_detail->country)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_country').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->country.'</span></p>';}
				if (!empty($loggedin_user_detail->zip)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_zip').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->zip.'</span></p>';}
				if (!empty($loggedin_user_detail->profileURL)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_account_url').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7" style="text-transform:none;"><a href="'.$loggedin_user_detail->profileURL.'" target="_blank">'.$loggedin_user_detail->profileURL.'</a></span></p>';}
				if (!empty($loggedin_user_detail->address)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_address').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->address.'</span></p>';}
				if (!empty($loggedin_user_detail->description)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_description').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$loggedin_user_detail->description.'</span></p>';}
				echo '<br/><br/><p><span class="col-xs-4"></span><span class="col-xs-1"></span><span class="col-xs-7">'.anchor('social/delete/'.$loggedin_user_detail->id.'/'.$loggedin_user_detail->identifier.'', lang('loggedin_delete_my_account'), array('class' => 'btn btn-danger flat', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => lang('loggedin_delete_tooltip'))).'</span></p>';
			?>
			</div>
		<?php } ?>
		</div>
		<!-- '''''''''''''''''''''''''''''''''''''''''''''''''' -->
	</div>
</div>

<?php $this->load->view('public/alfa/_parts/footer'); ?>