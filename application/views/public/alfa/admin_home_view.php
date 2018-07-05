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

		<br/><br/><div class="col-md-4 col-md-offset-4 text-center"><a href="<?php echo base_url('admin/users');?>" class="btn btn-danger btn-block flat" role="button"><?php echo lang('btn_admin_all_users');?></a></div>
		
		<div class="col-md-12"><br/>
	            <!-- .................. Total Users .................. -->
	            <div class="title"><span><?php echo lang('title_admin_social_users');?></span></div>
	            <div class="col-md-12 "><div class="widget_12"><span><b><?php echo lang('gen_total_users');?> </b><?php echo $this->db->count_all('cisociall_users');?></span><span class="pull-right"><?php echo date('Y-m-d') ?></span></div></div>

				<div class="widget_box">
				<!-- ......... -->
					<div class="col-xs-12 top_list">
						<div class="top_list_title"><i class="fa fa-globe" aria-hidden="true"></i> <?php echo lang('title_admin_world_users');?> </div>
						<div class="top_list_body col-xs-12">
						<div id="map" class="col-xs-12"></div>
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

							// Create Map
							var map = new google.maps.Map(document.getElementById('map'), {
								
								center: new google.maps.LatLng(45,0),
 								zoom: 2,
								mapTypeControlOptions: {
			            			mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
			          			}
							});

							<?php foreach ($all_users_for_google_map as $get_all_users_for_google_map) { ?>
					
								// Setup Map Position
								var cisociall_position_<?php echo $get_all_users_for_google_map->id; ?> = {lat:<?php echo $get_all_users_for_google_map->g_l_latitude; ?>, lng:<?php echo $get_all_users_for_google_map->g_l_longitude; ?>};

						        // Setup Google Map Marker
						        var image = {
									url: '<?php echo $get_all_users_for_google_map->photoURL; ?>',
									origin: new google.maps.Point(0, 0),
									size: new google.maps.Size(24, 24),
									scaledSize: new google.maps.Size(24, 24),
									strokeColor: 'black',
									strokeWeight: 3
						        };

						        // Put Google Map Marker
								var marker<?php echo $get_all_users_for_google_map->id; ?> = new google.maps.Marker({
									map: map,
						            position: cisociall_position_<?php echo $get_all_users_for_google_map->id; ?>,
						            draggable: true,
						            icon: image
								});

								// Put Content in Icon 
								var infowindow<?php echo $get_all_users_for_google_map->id; ?> = new google.maps.InfoWindow({
									content: '<div id="content">'+
									'<div id="firstHeading">'+
										'<?php echo $get_all_users_for_google_map->provider_name; ?>'+
									'</div>'+
									'<div id="bodyContent">'+
										'<span><i class="ion-checkmark" aria-hidden="true"></i> '+
										'<?php echo lang('profile_user_name'); ?>: '+
										'<?php echo $get_all_users_for_google_map->displayName; ?></span><br/>'+
										'<span><i class="ion-checkmark" aria-hidden="true"></i> '+
										'<?php echo lang('profile_identifier'); ?>: '+
			            				'<?php echo $get_all_users_for_google_map->identifier; ?></span>'+
									'</div>'+
									'</div>'
			        			});

			        			marker<?php echo $get_all_users_for_google_map->id; ?>.addListener('click', function() {
          						infowindow<?php echo $get_all_users_for_google_map->id; ?>.open(map, marker<?php echo $get_all_users_for_google_map->id; ?>);
        						});

							<?php } ?>

								//Associate the styled map with the MapTypeId and set it to display.
			        			map.mapTypes.set('styled_map', styledMapType);
			        			map.setMapTypeId('styled_map');
						      }
						    </script>
						    <script async defer
						    src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->google_map_api; ?>&callback=initMap">
						    </script>

						</div>
					</div>
				<!-- ......... -->
				</div>


	            <div class="widget_box">
	            <!-- ......... -->
	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_google"><i class="socicon socicon-google"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_google_users');?></span>
	                            <span class="info-box-number"><?php echo $google_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_facebook"><i class="socicon socicon-facebook"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_facebook_users');?></span>
	                            <span class="info-box-number"><?php echo $facebook_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_twitter"><i class="socicon socicon-twitter"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_twitter_users');?></span>
	                            <span class="info-box-number"><?php echo $twitter_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_instagram"><i class="socicon socicon-instagram"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_instagram_users');?></span>
	                            <span class="info-box-number"><?php echo $instagram_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_linkedin"><i class="socicon socicon-linkedin"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_linkedin_users');?></span>
	                            <span class="info-box-number"><?php echo $linkedin_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_vimeo"><i class="socicon socicon-vimeo"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_vimeo_users');?></span>
	                            <span class="info-box-number"><?php echo $vimeo_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_foursquare"><i class="socicon socicon-foursquare"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_foursquare_users');?></span>
	                            <span class="info-box-number"><?php echo $foursquare_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_dribbble"><i class="socicon socicon-dribbble"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_dribbble_users');?></span>
	                            <span class="info-box-number"><?php echo $dribbble_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_odnoklassniki"><i class="socicon socicon-odnoklassniki"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_ok_users');?></span>
	                            <span class="info-box-number"><?php echo $odnoklassniki_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_vkontakte"><i class="socicon socicon-vkontakte"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_vk_users');?></span>
	                            <span class="info-box-number"><?php echo $vkontakte_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_yandex"><i class="socicon socicon-yandex"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_yandex_users');?></span>
	                            <span class="info-box-number"><?php echo $yandex_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_mailru"><i class="socicon socicon-mailru"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_mailru_users');?></span>
	                            <span class="info-box-number"><?php echo $mailru_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_px500"><i class="socicon socicon-px500"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_500px_users');?></span>
	                            <span class="info-box-number"><?php echo $px500_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_twitchtv"><i class="socicon socicon-twitchtv"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_twitch_users');?></span>
	                            <span class="info-box-number"><?php echo $twitchtv_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_bitbucket"><i class="fa fa-bitbucket"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_bitbucket_users');?></span>
	                            <span class="info-box-number"><?php echo $bitbucket_total_users;?></span>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="info-box">
	                    <span class="info-box-icon cisociall_github"><i class="socicon socicon-github"></i></span>
	                        <div class="info-box-content">
	                            <span class="info-box-text"><?php echo lang('title_github_users');?></span>
	                            <span class="info-box-number"><?php echo $github_total_users;?></span>
	                        </div>
	                    </div>
	                </div>
				<!-- ......... -->
	            </div>

	            <!-- .................. Server Details .................. -->
	            <div class="title"><span><?php echo lang('title_top_5_lists');?></span></div>
				<div class="widget_box">
				<!-- ......... -->
					<div class="col-sm-6 top_list">
						<div class="top_list_title"><i class="fa fa-bar-chart" aria-hidden="true"></i> <?php echo lang('title_top_5_platforms');?></div>
						<div class="top_list_body col-xs-12">
						<?php foreach ($top_platforms as $get_top_platforms) {
							echo '<p><span class="col-xs-6 list_left">'.$get_top_platforms->platform.'</span>';
							echo '<span class="col-xs-6 list_right">'.$get_top_platforms->total.'</span></p>';
						} ?>
						</div>
					</div>

					<div class="col-sm-6 top_list">
						<div class="top_list_title"><i class="fa fa-area-chart" aria-hidden="true"></i> <?php echo lang('title_top_5_browsers');?></div>
						<div class="top_list_body col-xs-12">
						<?php foreach ($top_browsers as $get_top_browsers) {
							echo '<p><span class="col-xs-6 list_left">'.$get_top_browsers->browser.'</span>';
							echo '<span class="col-xs-6 list_right">'.$get_top_browsers->total.'</span></p>';
						} ?>
						</div>
					</div>

					<div class="col-sm-6 top_list">
						<div class="top_list_title"><i class="fa fa-pie-chart" aria-hidden="true"></i> <?php echo lang('title_top_5_providers');?></div>
						<div class="top_list_body col-xs-12">
						<?php foreach ($top_providers as $get_top_providers) {
							echo '<p><span class="col-xs-6 list_left">'.$get_top_providers->provider_name.'</span>';
							echo '<span class="col-xs-6 list_right">'.$get_top_providers->total.'</span></p>';
						} ?>
						</div>
					</div>

					<div class="col-sm-6 top_list">
						<div class="top_list_title"><i class="fa fa-line-chart" aria-hidden="true"></i> <?php echo lang('title_top_5_mobiles');?></div>
						<div class="top_list_body col-xs-12">
						<?php foreach ($top_mobiles as $get_top_mobiles) {

							if (empty($get_top_mobiles->mobile)) 
							{
								echo '<p><span class="col-xs-6 list_left">'.lang('title_not_mobiles').'</span>';
							}
							else
							{
								echo '<p><span class="col-xs-6 list_left">'.$get_top_mobiles->mobile.'</span>';
							}						
							echo '<span class="col-xs-6 list_right">'.$get_top_mobiles->total.'</span></p>';
						} ?>
						</div>
					</div>
				<!-- ......... -->
				</div>

	            <!-- .................. Server Details .................. -->
	            <div class="title"><span><?php echo lang('title_server_details');?></span></div>
	            <div class="widget_box">
	            <!-- ......... -->
	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="widget_3">
	                        <div class="widget-inline-box text-center">
	                            <h5 class="m-t-15">
	                                <i class="text-info fa fa-hourglass"></i>
	                                <b><?php echo byte_format($disk_totalspace, 2);?></b>
	                            </h5>
	                            <p><?php echo lang('title_total_disk_space');?></p>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="widget_3">
	                        <div class="widget-inline-box text-center">
	                            <h5 class="m-t-15">
	                                <i class="text-success fa fa-hourglass-start"></i>
	                                <b><?php echo byte_format($disk_freespace, 2);?></b>
	                            </h5>
	                            <p><?php echo lang('title_free_disk_space');?></p>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="widget_3">
	                        <div class="widget-inline-box text-center">
	                            <h5 class="m-t-15">
	                                <i class="text-danger fa fa-hourglass-end"></i>
	                                <b><?php echo byte_format($disk_usespace, 2);?></b>
	                            </h5>
	                            <p><?php echo lang('title_used_disk_space');?></p>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="widget_3">
	                        <div class="widget-inline-box text-center">
	                            <h5 class="m-t-15">
	                                <i class="text-success fa fa-pie-chart"></i>
	                                <b><?php echo $disk_freepercent;?> %</b>
	                            </h5>
	                            <p><?php echo lang('title_free_disk_percent');?></p>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="widget_3">
	                        <div class="widget-inline-box text-center">
	                            <h5 class="m-t-15">
	                                <i class="text-danger fa fa-pie-chart"></i>
	                                <b><?php echo $disk_usepercent;?> %</b>
	                            </h5>
	                            <p><?php echo lang('title_used_disk_percent');?></p>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="widget_3">
	                        <div class="widget-inline-box text-center">
	                            <h5 class="m-t-15">
	                                <i class="text-default fa fa-microchip"></i>
	                                <b><?php echo byte_format($memory_peak_usage, 2);?></b>
	                            </h5>
	                            <p><?php echo lang('title_memory_peak_usage');?></p>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="widget_3">
	                        <div class="widget-inline-box text-center">
	                            <h5 class="m-t-15">
	                                <i class="text-success fa fa-microchip"></i>
	                                <b><?php echo byte_format($memory_usage, 2);?></b>
	                            </h5>
	                            <p><?php echo lang('title_memory_usage');?></p>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-3 col-sm-6 col-xs-12">
	                    <div class="widget_3">
	                        <div class="widget-inline-box text-center">
	                            <h5 class="m-t-15">
	                                <i class="text-danger fa fa-microchip"></i>
	                                <b><?php echo $memory_used_percent;?> %</b>
	                            </h5>
	                            <p><?php echo lang('title_memory_usage_percent');?></p>
	                        </div>
	                    </div>
	                </div>
				<!-- ......... -->   
	            </div>
		</div>
		<!-- ...................................................... -->
	</div>
</div>

<?php $this->load->view('public/alfa/_parts/footer'); ?>