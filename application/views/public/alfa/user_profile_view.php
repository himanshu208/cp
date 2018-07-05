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
				<li class="active"><a href="<?php echo base_url('user_profile');?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo lang('nav_profile');?></a></li>               
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
			<p class="headline_title"><?php echo lang('headline_user_profile');?></p>
			<p class="headline_explanation"><?php echo lang('view_user_profile_explanation');?></p>
		</div>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>"><?php echo lang('nav_home');?></a></li>
			<li><a href="<?php echo base_url('users');?>"><?php echo lang('nav_all_users');?></a></li>
			<li class="active"><?php echo lang('nav_profile');?></li>
			<li class="pull-right go_back"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><i class="fa fa-caret-left" aria-hidden="true"></i> <?php echo lang('nav_back');?></a></li>
		</ol>

		<!-- ''''''''''''''''''''''''' User Profile ''''''''''''''''''''''''' -->
		<div class="col-sm-12 user_profile">
		<?php foreach ($user_detail as $get_user_detail) { ?>

			<div class="col-sm-3 user_profile_left">
			<!-- ............. Circle Image ............. -->
					<?php
			if (!empty($get_user_detail->photoURL))
				{ ?>
				<a href="<?php echo $get_user_detail->photoURL; ?>" class="popup_image">
				<img src="<?php echo $get_user_detail->photoURL;?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive" /></a>
			<?php }  else {
					if ($get_user_detail->gender == 'male') { ?>
						<a href="<?php echo base_url('themes/public/alfa/img/user_male.png');?>" class="popup_image">
						<img src="<?php echo base_url('themes/public/alfa/img/user_male.png');?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive" /></a>	
					<?php } else if ($get_user_detail->gender == 'female') { ?>
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
				if ($get_user_detail->ip_address==$this->sess_ip_address AND $get_user_detail->identifier==$this->sess_identifier) { echo '<p><span class="col-xs-12"><i class="fa fa-circle" aria-hidden="true"></i> '.lang("profile_you_are_online").'</span></p>'; }
				echo '<p><span class="col-xs-4"><b>'.lang('profile_provider').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->provider_name.'</span></p>';
				echo '<p><span class="col-xs-4"><b>'.lang('profile_identifier').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->identifier.'</span></p>';
				if (!empty($get_user_detail->displayName)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_user_name').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->displayName.'</span></p>';}
				if (!empty($get_user_detail->firstName)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_first_name').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->firstName.'</span></p>';}
				if (!empty($get_user_detail->lastName)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_last_name').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->lastName.'</span></p>';}
				if (!empty($get_user_detail->email)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_email').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7" style="text-transform:none;">'.$get_user_detail->email.'</span></p>';}
				if (!empty($get_user_detail->phone)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_phone').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->phone.'</span></p>';}
				if (!empty($get_user_detail->gender)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_gender').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->gender.'</span></p>';}
				if (!empty($get_user_detail->language)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_language').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->language.'</span></p>';}
				if (!empty($get_user_detail->age)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_age').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->age.'</span></p>';}
				if (!empty($get_user_detail->birthDay)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_birth_day').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->birthDay.'</span></p>';}
				if (!empty($get_user_detail->birthMonth)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_birth_month').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->birthMonth.'</span></p>';}
				if (!empty($get_user_detail->birthYear)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_birth_year').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->birthYear.'</span></p>';}
				if (!empty($get_user_detail->job_title)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_job_title').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->job_title.'</span></p>';}
				if (!empty($get_user_detail->organization_name)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_organization').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->organization_name.'</span></p>';}
				if (!empty($get_user_detail->webSiteURL)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_web_site').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7"><a href="'.$get_user_detail->webSiteURL.'" target="_blank">'.$get_user_detail->webSiteURL.'</a></span></p>';}
				if (!empty($get_user_detail->city)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_city').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->city.'</span></p>';}
				if (!empty($get_user_detail->region)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_region').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->region.'</span></p>';}
				if (!empty($get_user_detail->country)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_country').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->country.'</span></p>';}
				if (!empty($get_user_detail->zip)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_zip').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->zip.'</span></p>';}
				if (!empty($get_user_detail->profileURL)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_account_url').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7" style="text-transform:none;"><a href="'.$get_user_detail->profileURL.'" target="_blank">'.$get_user_detail->profileURL.'</a></span></p>';}
				if (!empty($get_user_detail->address)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_address').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->address.'</span></p>';}
				if (!empty($get_user_detail->description)) { echo '<p><span class="col-xs-4"><b>'.lang('profile_description').'</b></span><span class="col-xs-1">:</span><span class="col-xs-7">'.$get_user_detail->description.'</span></p>';}
			?>
			</div>
		<?php } ?>
		</div>
		<!-- '''''''''''''''''''''''''''''''''''''''''''''''''' -->

		<div class="col-sm-12 related_accounts">
			<!-- ''''''''''''''''''''''''' Get All Related Social Accounts ''''''''''''''''''''''''' -->
			<?php
			if ($related_accounts == 'NULL' OR empty($related_accounts)) {
				echo '<div class="alert alert-warning">';
	  			echo lang('profile_rel_accounts_warning');
	  			echo '</div>';
			}
			else
			{
				echo '<div class="title"><span>'.lang('profile_rel_accounts').'</span></div>';

				// Get Social Accounts have same email
				foreach ($related_accounts as $get_related_accounts) { ?>

					<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="thumbnail">
						<div class="inner-triangle" onclick="document.getElementById('sendprofile_<?php echo $get_related_accounts->id;?>').submit();"><i class="fa fa-check" aria-hidden="true"></i></div>

						<form action="<?php echo base_url('user_profile'); ?>" id="sendprofile_<?php echo $get_related_accounts->id; ?>" method="post">
						<input type="hidden" name="user_id" value="<?php echo $get_related_accounts->id; ?>" />
						<input type="hidden" name="user_email" value="<?php echo $get_related_accounts->email; ?>" />
						<?php
							$csrf = array(
								'name' => $this->security->get_csrf_token_name(),
								'hash' => $this->security->get_csrf_hash()
							);
						?>
						<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
						</form>

						<!-- ............. Circle Image ............. -->
							<?php
						if (!empty($get_related_accounts->photoURL))
								{ ?>
								<a href="<?php echo $get_related_accounts->photoURL;?>" class="popup_image">
								<img src="<?php echo $get_related_accounts->photoURL;?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive" /></a>
								<?php } 
						else
							{
							if ($get_related_accounts->gender == 'male') { ?>
								<a href="<?php echo base_url('themes/public/alfa/img/user_male.png');?>" class="popup_image">
								<img src="<?php echo base_url('themes/public/alfa/img/user_male.png');?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive" /></a>	

								<?php }
							else if ($get_related_accounts->gender == 'female') { ?>

								<a href="<?php echo base_url('themes/public/alfa/img/user_female.png');?>" class="popup_image">
								<img src="<?php echo base_url('themes/public/alfa/img/user_female.png');?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive"/></a>
								<?php }
							else
							{ ?>

							<a href="<?php echo base_url('themes/public/alfa/img/yoda.png');?>" class="popup_image">
							<img src="<?php echo base_url('themes/public/alfa/img/yoda.png');?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive"/></a>	
								<?php }
						} ?>

						<div class="caption">
							<p class="display_name">
							<?php
								if (!empty($get_related_accounts->displayName))
									{
											echo $get_related_accounts->displayName;
									}
								?>
							</p>				
							<p><a href="<?php echo base_url('users/provider/'.$get_related_accounts->provider_name); ?>" class="provider_name"><?php echo $get_related_accounts->provider_name; ?></a></p>
							<p class="last_login">
								<?php
									if ($get_related_accounts->ip_address==$this->sess_ip_address AND $get_related_accounts->identifier==$this->sess_identifier)
									{
										echo  '<i class="fa fa-circle" aria-hidden="true"></i>'.lang("profile_you_are_online");
									}
									else
									{
										echo date('Y-m-d H:i', $get_related_accounts->modified_date);	
									}
								?>
							</p>
						</div>
					</div>		
					</div>
			<?php } } ?>
			<!-- '''''''''''''''''''''''''''''''''''''''''''''''''' -->
		</div>
	</div>
</div>

<?php $this->load->view('public/alfa/_parts/footer'); ?>