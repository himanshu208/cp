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
				<li><a href="<?php echo base_url('admin');?>"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo lang('nav_admin');?></a></li>
				<li class="active"><a href="<?php echo base_url('user_profile');?>"><i class="fa fa-user" aria-hidden="true"></i> <?php echo lang('nav_profile');?></a></li> 
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
		</div>
		
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin');?>"><?php echo lang('nav_admin');?></a></li>
			<li><a href="<?php echo base_url('admin/users');?>"><?php echo lang('nav_all_users');?></a></li>
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
				<img src="<?php echo $get_user_detail->photoURL; ?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive" /></a>
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
				if (!empty($get_user_detail->active==0)) { echo '<p><span class="col-xs-12 alert alert-warning">'.lang('profile_deactivated_alert').'</span></p>';}
				echo '<p><span class="col-xs-5"><b>'.lang('profile_provider').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->provider_name.'</span></p>';
				echo '<p><span class="col-xs-5"><b>'.lang('profile_identifier').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->identifier.'</span></p>';
				if (!empty($get_user_detail->displayName)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_user_name').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->displayName.'</span></p>';}
				if (!empty($get_user_detail->firstName)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_first_name').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->firstName.'</span></p>';}
				if (!empty($get_user_detail->lastName)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_last_name').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->lastName.'</span></p>';}
				if (!empty($get_user_detail->email)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_email').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6" style="text-transform:none;">'.$get_user_detail->email.'</span></p>';}
				if (!empty($get_user_detail->phone)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_phone').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->phone.'</span></p>';}
				if (!empty($get_user_detail->gender)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_gender').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->gender.'</span></p>';}
				if (!empty($get_user_detail->language)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_language').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->language.'</span></p>';}
				if (!empty($get_user_detail->age)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_age').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->age.'</span></p>';}
				if (!empty($get_user_detail->birthDay)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_birth_day').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->birthDay.'</span></p>';}
				if (!empty($get_user_detail->birthMonth)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_birth_month').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->birthMonth.'</span></p>';}
				if (!empty($get_user_detail->birthYear)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_birth_year').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->birthYear.'</span></p>';}
				if (!empty($get_user_detail->job_title)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_job_title').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->job_title.'</span></p>';}
				if (!empty($get_user_detail->organization_name)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_organization').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->organization_name.'</span></p>';}
				if (!empty($get_user_detail->webSiteURL)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_web_site').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6" style="text-transform:none;"><a href="'.$get_user_detail->webSiteURL.'" target="_blank">'.$get_user_detail->webSiteURL.'</a></span></p>';}
				if (!empty($get_user_detail->city)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_city').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->city.'</span></p>';}
				if (!empty($get_user_detail->region)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_region').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->region.'</span></p>';}
				if (!empty($get_user_detail->country)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_country').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->country.'</span></p>';}
				if (!empty($get_user_detail->zip)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_zip').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->zip.'</span></p>';}
				if (!empty($get_user_detail->profileURL)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_account_url').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6" style="text-transform:none;"><a href="'.$get_user_detail->profileURL.'" target="_blank">'.$get_user_detail->profileURL.'</a></span></p>';}
				if (!empty($get_user_detail->address)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_address').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->address.'</span></p>';}
				if (!empty($get_user_detail->description)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_description').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->description.'</span></p>';}
				echo '<div class="col-xs-12"><hr/></div>';
				if (!empty($get_user_detail->referrer)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_referrer').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6" style="text-transform:none;">'.$get_user_detail->referrer.'</span></p>';}
				if (!empty($get_user_detail->platform)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_platform').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->platform.'</span></p>';}
				if (!empty($get_user_detail->mobile)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_mobile').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->mobile.'</span></p>';}
				if (!empty($get_user_detail->browser)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_browser').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->browser.'</span></p>';}
				if (!empty($get_user_detail->browser_version)) { echo '<p><span class="col-xs-5"><b>'.lang('profile_browser_ver').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->browser_version.'</span></p>';}
				echo '<div class="col-xs-12"><hr/></div>';
				echo '<p><span class="col-xs-5"><b>'.lang('profile_created_time').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.date('Y-m-d H:i', $get_user_detail->created_date).'</span></p>';
				echo '<p><span class="col-xs-5"><b>'.lang('profile_modified_time').'</b> <i class="ion-arrow-down-b" aria-hidden="true"></i></span><span class="col-xs-1">:</span><span class="col-xs-6">'.date('Y-m-d H:i', $get_user_detail->modified_date).'</span></p>';
				echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_ip_address').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->ip_address.'</span></p>';
				if (!empty($get_user_detail->g_l_status)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_status').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_status.'</span></p>';}
				if (!empty($get_user_detail->g_l_city)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_city').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_city.'</span></p>';}
				if (!empty($get_user_detail->g_l_areaCode)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_area_code').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_areaCode.'</span></p>';}
				if (!empty($get_user_detail->g_l_dmaCode)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_dma_code').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_dmaCode.'</span></p>';}
				if (!empty($get_user_detail->g_l_countryCode)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_country_code').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_countryCode.'</span></p>';}
				if (!empty($get_user_detail->g_l_countryName)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_country_name').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_countryName.'</span></p>';}
				if (!empty($get_user_detail->g_l_continentCode)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_continent_code').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_continentCode.'</span></p>';}
				if (!empty($get_user_detail->g_l_latitude)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_latitude').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_latitude.'</span></p>';}
				if (!empty($get_user_detail->g_l_longitude)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_longitude').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_longitude.'</span></p>';}
				if (!empty($get_user_detail->g_l_region)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_region').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_region.'</span></p>';}
				if (!empty($get_user_detail->g_l_regionCode)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_region_code').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_regionCode.'</span></p>';}
				if (!empty($get_user_detail->g_l_regionName)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_region_name').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_regionName.'</span></p>';}
				if (!empty($get_user_detail->g_l_currencyCode)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_curr_code').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_currencyCode.'</span></p>';}
				if (!empty($get_user_detail->g_l_currencySym)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_curr_symbol').'</b></span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_currencySym.'</span></p>';}
				if (!empty($get_user_detail->g_l_currencyConv)) { echo '<p><span class="col-xs-5"><i class="ion-arrow-right-b" aria-hidden="true"></i> <b>'.lang('profile_gl_curr_convert').'</b> ($)</span><span class="col-xs-1">:</span><span class="col-xs-6">'.$get_user_detail->g_l_currencyConv.'</span></p>';}
				echo '<br/><p><span class="col-xs-12 alert alert-info">'.lang('profile_gl_exp').'<span></p>';
			
				echo '<div id="map" class="col-xs-12"></div>';

				?>
				<!-- ................ Begin Google Map Settings ................ -->
			    <script>
				function initMap() {
					// Create Map Style
					var styledMapType = new google.maps.StyledMapType(
			            [
			              {elementType: 'geometry', stylers: [{color: '#f5f5f5'}]},
			              {elementType: 'labels.text.fill', stylers: [{color: '#555555'}]},
			              {elementType: 'labels.text.stroke', stylers: [{color: '#f5f5f5'}]},
			              {
			                featureType: 'administrative',
			                elementType: 'geometry.stroke',
			                stylers: [{color: '#cccccc'}]
			              },
			              {
			                featureType: 'administrative.land_parcel',
			                elementType: 'geometry.stroke',
			                stylers: [{color: '#dcd2be'}]
			              },
			              {
			                featureType: 'administrative.land_parcel',
			                elementType: 'labels.text.fill',
			                stylers: [{color: '#bdbdbd'}]
			              },
			              {
			                featureType: 'landscape.natural',
			                elementType: 'geometry',
			                stylers: [{color: '#eeeeee'}]
			              },
			              {
			                featureType: 'poi',
			                elementType: 'geometry',
			                stylers: [{color: '#eeeeee'}]
			              },
			              {
			                featureType: 'poi',
			                elementType: 'labels.text.fill',
			                stylers: [{color: '#757575'}]
			              },
			              {
			                featureType: 'poi.park',
			                elementType: 'geometry.fill',
			                stylers: [{color: '#eeeeee'}]
			              },
			              {
			                featureType: 'poi.park',
			                elementType: 'labels.text.fill',
			                stylers: [{color: '#9e9e9e'}]
			              },
			              {
			                featureType: 'road',
			                elementType: 'geometry',
			                stylers: [{color: '#fafafa'}]
			              },
			              {
			                featureType: 'road.arterial',
			                elementType: 'geometry',
			                stylers: [{color: '#fdfcf8'}]
			              },
			              {
			                featureType: 'road.highway',
			                elementType: 'geometry',
			                stylers: [{color: '#cacaca'}]
			              },
			              {
			                featureType: 'road.highway',
			                elementType: 'geometry.stroke',
			                stylers: [{color: '#95ADC6'}]
			              },
			              {
			                featureType: 'road.highway.controlled_access',
			                elementType: 'geometry',
			                stylers: [{color: '#dddddd'}]
			              },
			              {
			                featureType: 'road.highway.controlled_access',
			                elementType: 'geometry.stroke',
			                stylers: [{color: '#8DA8C2'}]
			              },
			              {
			                featureType: 'road.local',
			                elementType: 'labels.text.fill',
			                stylers: [{color: '#9e9e9e'}]
			              },
			              {
			                featureType: 'transit.line',
			                elementType: 'geometry',
			                stylers: [{color: '#dddddd'}]
			              },
			              {
			                featureType: 'transit.line',
			                elementType: 'labels.text.fill',
			                stylers: [{color: '#8f7d77'}]
			              },
			              {
			                featureType: 'transit.line',
			                elementType: 'labels.text.stroke',
			                stylers: [{color: '#ebe3cd'}]
			              },
			              {
			                featureType: 'transit.station',
			                elementType: 'geometry',
			                stylers: [{color: '#eeeeee'}]
			              },
			              {
			                featureType: 'water',
			                elementType: 'geometry.fill',
			                stylers: [{color: '#d6d6d6'}]
			              },
			              {
			                featureType: 'water',
			                elementType: 'labels.text.fill',
			                stylers: [{color: '#d9d9d9'}]
			              }
			            ],
					{name: "<?php echo lang('profile_map_cisociall');?>"});

					// Setup Map Position
					var cisociall_position = {lat:<?php echo $get_user_detail->g_l_latitude; ?>, lng:<?php echo $get_user_detail->g_l_longitude; ?>};

					// Create Map
					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 10,
						center: cisociall_position,
						mapTypeControlOptions: {
            				mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
          				}
					});

					// Create Content
					var contentString = '<div id="content">'+
			            '<div id="firstHeading"><?php echo $get_user_detail->provider_name; ?></div>'+
			            '<div id="bodyContent">'+
			            	'<span><i class="ion-checkmark" aria-hidden="true"></i> '+
			            	'<?php echo lang('profile_user_name'); ?>: '+
			            	'<?php echo $get_user_detail->displayName; ?></span><br/>'+
			            	'<span><i class="ion-checkmark" aria-hidden="true"></i> '+
			            	'<?php echo lang('profile_identifier'); ?>: '+
			            	'<?php echo $get_user_detail->identifier; ?></span>'+
			            '</div>'+
			            '</div>';
					
					// Put Content in Icon 
					var infowindow = new google.maps.InfoWindow({
			         		content: contentString
			        });

					// Setup Google Map Marker
			        var image = {
						url: '<?php echo $get_user_detail->photoURL; ?>',
						origin: new google.maps.Point(0, 0),
						size: new google.maps.Size(24, 24),
						scaledSize: new google.maps.Size(24, 24),
						strokeColor: 'black',
						strokeWeight: 3
			        };

			        // Put Google Map Marker
					var marker = new google.maps.Marker({
						map: map,
			            position: cisociall_position,
			            draggable: true,
			            icon: image
					});
						marker.addListener('click', function() {
          				infowindow.open(map, marker);
        			});

					//Associate the styled map with the MapTypeId and set it to display.
        			map.mapTypes.set('styled_map', styledMapType);
        			map.setMapTypeId('styled_map');
				}
			    </script>
			    <script async defer
			    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->google_map_api; ?>&callback=initMap">
			    </script>
				<!-- ................ End of Google Map Settings ................ -->

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

						<form action="<?php echo base_url('admin/user_detail'); ?>" id="sendprofile_<?php echo $get_related_accounts->id; ?>" method="post">
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
								<img src="<?php echo base_url('themes/public/alfa/img/user_female.png');?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive" /></a>
								<?php }
							else
							{ ?>

							<a href="<?php echo base_url('themes/public/alfa/img/yoda.png');?>" class="popup_image">
							<img src="<?php echo base_url('themes/public/alfa/img/yoda.png');?>" alt="<?php echo lang('profile_user_picture');?>" class="img-circle img-responsive" /></a>	
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
									if ($get_related_accounts->ip_address==$this->sess_ip_address AND $get_related_accounts->identifier==$this->sess_identifier) {
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