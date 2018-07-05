<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends MY_Controller 
{
	/*--------------------------------------------------------------*/
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('hybridauthlib', 'user_agent'));
	}

	/*--------------------------------------------------------------*/
	public function index()
	{
		// Delete old sessions before 10 Minutes
		$data["delete_old_sessions"] = $this->cisociall_model->delete_old_sessions();
		
		if ($this->is_online) 
		{
				$data["user_loggedin_detail"]	= $this->cisociall_model->already_login($this->sess_identifier);
				
				// User is active or not
				foreach ($data["user_loggedin_detail"] as $uld) {

					if ($uld->active==1)// If account is active show loggedin data
					{
						$this->load->view('public/alfa/loggedin_view',$data);
					}
					else// If is not active account, logout and show deactive error warning
					{
						$this->hybridauthlib->logoutAllProviders();
						$this->session->sess_destroy();
						
						$this->load->view('public/alfa/deactivate_view');
					}
				}		
		}
		// If it is not online: If logout or dont logged with any provider. 
		else
		{
			$data['providers'] = $this->hybridauthlib->getProviders();
			$this->load->view('public/alfa/login_view', $data);
		}
	}

	/*--------------------------------------------------------------*/
	public function login($provider)
	{
		if ($this->is_online OR !$provider) 
		{
			redirect('social');	
		}
		// If it is not online: If logout or dont logged with any provider. 
		else
		{
			// Begin to Hybridauth login process.
			try
			{
				// If provider name setup in config/hybridauth file
				if ($this->hybridauthlib->providerEnabled($provider))
				{
					// If hybridauth login is completed.
					$service = $this->hybridauthlib->authenticate($provider);

					if ($service->isUserConnected())
					{
						// Get all data about provider
						$user_profile = $service->getUserProfile();

						// Prepare this data for Database Input
	            		$user_data['ip_address'] 		= $this->input->ip_address();
						$user_data['provider_name']		= $provider;
						$user_data['identifier']		= $user_profile->identifier;
						$user_data['displayName']		= $user_profile->displayName;
						$user_data['firstName']			= $user_profile->firstName;
						$user_data['lastName']			= $user_profile->lastName;
						$user_data['email']				= $user_profile->email;
						$user_data['emailVerified']		= $user_profile->emailVerified;
						$user_data['phone']				= $user_profile->phone;
						$user_data['gender']			= $user_profile->gender;
						$user_data['language']			= $user_profile->language;
						$user_data['age']				= $user_profile->age;
						$user_data['birthDay']			= $user_profile->birthDay;
						$user_data['birthMonth']		= $user_profile->birthMonth;
						$user_data['birthYear']			= $user_profile->birthYear;
						$user_data['job_title']			= $user_profile->job_title;
						$user_data['organization_name']	= $user_profile->organization_name;
						$user_data['webSiteURL']		= $user_profile->webSiteURL;
						$user_data['description']		= $user_profile->description;
						$user_data['city']				= $user_profile->city;
						$user_data['region']			= $user_profile->region;
						$user_data['country']			= $user_profile->country;
						$user_data['zip']				= $user_profile->zip;
						$user_data['address']			= $user_profile->address;
						$user_data['profileURL']		= $user_profile->profileURL;
						$user_data['photoURL']			= $user_profile->photoURL;

						// Get Extra Values About User Agents
						$user_data['mobile'] 			= $this->agent->mobile();
						$user_data['browser'] 			= $this->agent->browser();
						$user_data['browser_version'] 	= $this->agent->version();
						$user_data['platform'] 			= $this->agent->platform();								
						$user_data['referrer'] 			= $this->agent->referrer();

						/* ------------------------------------------------------------ */
						// Get Users Geolocation Datas
						// This GeoPlugin(www.geoplugin.net) includes GeoLite data created by MaxMind(www.maxmind.com)
						$user_geolocation = json_decode(file_get_contents('http://www.geoplugin.net/json.gp?ip='.$this->input->ip_address()));
						
						// Save Geolocation Datas Into The Database
						$user_data['g_l_status']		= $user_geolocation->geoplugin_status;
						$user_data['g_l_city']			= $user_geolocation->geoplugin_city;
						$user_data['g_l_region']		= $user_geolocation->geoplugin_region;
						$user_data['g_l_areaCode']		= $user_geolocation->geoplugin_areaCode;
						$user_data['g_l_dmaCode']		= $user_geolocation->geoplugin_dmaCode;
						$user_data['g_l_countryCode']	= $user_geolocation->geoplugin_countryCode;
						$user_data['g_l_countryName']	= $user_geolocation->geoplugin_countryName;
						$user_data['g_l_continentCode']	= $user_geolocation->geoplugin_continentCode;
						$user_data['g_l_latitude']		= $user_geolocation->geoplugin_latitude;
						$user_data['g_l_longitude']		= $user_geolocation->geoplugin_longitude;
						$user_data['g_l_regionCode']	= $user_geolocation->geoplugin_regionCode;
						$user_data['g_l_regionName']	= $user_geolocation->geoplugin_regionName;
						$user_data['g_l_currencyCode']	= $user_geolocation->geoplugin_currencyCode;
						$user_data['g_l_currencySym'] 	= $user_geolocation->geoplugin_currencySymbol_UTF8;
						$user_data['g_l_currencyConv']	= $user_geolocation->geoplugin_currencyConverter;

						// Insert or update user data in database
						$user_data_id = $this->cisociall_model->insert_update_social_users($user_data);

							// Check user data insert or update status
							if (!empty($user_data_id))
							{
								// Add User is Online Session Value
								$user_data['is_online'] 		= TRUE;
								$data['userData'] 				= $user_data;
								// Create Session for this user
								$this->session->set_userdata('userData', $user_data);
							}
							else
							{
								$data['userData'] = array();
							}

						redirect('social');
					}
					else // Cannot authenticate user
					{
						show_error('Cannot authenticate user');
					}
				}
				else // This service is not enabled.
				{
					redirect('error_404');
				}
			}
			catch(Exception $e)
			{
				$error = 'Unexpected error';
				switch($e->getCode())
				{
					case 0 : $error = 'Unspecified error.'; break;
					case 1 : $error = 'Cisociall configuration error.'; break;
					case 2 : $error = 'Provider not properly configured.'; break;
					case 3 : $error = 'Unknown or disabled provider.'; break;
					case 4 : $error = 'Missing provider application credentials.'; break;
					case 5 : 
					         if (isset($service))
					         {
					         	$service->logout();
					         }
					         show_error('Authentification failed. User has cancelled the authentication or the provider refused the connection.');
						break;
					case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
						$service->logout();
					    break;
					case 7 : $error = 'User not connected to the provider.'; 
						$service->logout();
						break;
					case 8 : echo "Provider does not support this feature."; break;
				}

				if (isset($service))
				{
					$service->logout();
				}
				show_error('Error authenticating user.');
			}
		}
	}

	/*--------------------------------------------------------------*/
	public function endpoint()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			$_GET = $_REQUEST;
		}
		require_once (APPPATH.'/third_party/hybridauth/index.php');
	}

	/*--------------------------------------------------------------*/
	public function logout(){

		// Delete Cookies
		$this->load->helper('cookie');
		delete_cookie('cisociallsessions');

		// Delete Sessions
		$this->hybridauthlib->logoutAllProviders();
		$this->session->sess_destroy();

		redirect('social');
	}

	/*--------------------------------------------------------------*/
	public function delete()
	{
		$user_id 			= $this->uri->segment(3);
		$user_identifier 	= $this->uri->segment(4);

		if ($this->is_online AND $user_identifier=$this->sess_identifier) {
			$this->cisociall_model->delete_account($user_id, $user_identifier);
			redirect('social/logout');
		}
		else
		{
			redirect('social');
		}
	}
	/*--------------------------------------------------------------*/
} // Class End