<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		'base_url' => 'index.php/social/endpoint',

		"providers" => array (
		/* ------------------------------------------------------------------------------------------ */
	        "Facebook" => array (
	          	"enabled" => true,
	          	"keys"    => array ( "id" => "1897143067202176", "secret" => "9443f71220c1b604797319298a4df0a9" ),
	          	"scope"   => ['email','public_profile','user_friends']
	    	),
	    	
			"Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "62812281069-79euita9n874jplgjrvo168tpj9jm8of.apps.googleusercontent.com","secret" => "Z1KNlpxWnmRddaYfsYBllXMC"),
				"redirect_uri"=>"http://localhost/cisociall/index.php/social/endpoint?hauth.done=Google"
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "2EfdXXpi79nbfo0VFQViK8G7g", "secret" => "x4ToPn7ZJ2uM42t4MhJn47wNxFG5lnaJCCJxMLedwnHcnPeXtq")
			),

			"Instagram" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "1a8e02ed3bd34ade8e0c49db98ae6a3d", "secret" => "aca2ee9345fe4911ae541f5541feaf56")
			),

			"LinkedIn" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "86b9jmf9dunrqw", "secret" => "8Xo264B6d8YrGEZJ")
			),

			"Vimeo" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "cb396dc1310cbfc6d8d2a3410960f030e2ea6bf7", "secret" => "IqHUk1cIzOF0NF+IVpc5vOELNVsYVZyN4kmc4ApNAzDVXB9prb2u/5MJebsKx098gE6SgpSuzvgc7uxGGQdHARXYZM9ODqlBM0Le0+suzZ7BAU0lf913U4+Y7on/tF6i")
			),

			"Foursquare" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "FBBT3HAP2SC4BZJLFJZJTGR3L1E3ECPK3PO42O35WTZELZCW", "secret" => "KSSNBD4NA0WEOHEIXWYAZB01EF5VX2MXZHTZV0XQ2FIIM3D2")
			),

			"Dribbble" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "8ab3071db7d2fa938a9f9621dff0b34d6fbda8a01d9a2cbb25d6f668dfc97542", "secret" => "b2f0eb85aef1c739e0d0bf02bd76f1ed4c37651c47be2278ae4e4ed44435c5fd")
			),

			"Odnoklassniki" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "1251769344", "key" => "CBANHNJLEBABABABA", "secret" => "2247A527FAB06336D3CC3CB3")
			),

			"Vkontakte" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "6098252", "secret" => "OQ5aPc704psm5tZPSpuB")
			),

			"Yandex" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "16c9783a2f55425db5dcccc19f69844f", "secret" => "2f3929e9a3714b9fb18ebc6b89182053")
			),

			"Mailru" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "754817", "key" => "471c2af05d808379da8a087806ab5a20", "secret" => "b9b8a89f0f74d861dfd2d7e67993f8dc")
			),

			"px500" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "Co6wNh3xfgYpFLoQq6bjgi3TCeiK92bjAFd636CG", "secret" => "6jbyuslJIXm4y67H93FZfXQxDjeLhcl5c2U6w9Gp")
			),

			"TwitchTv" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "zym338h8zjwmwuu874gi1l4yg6py1w", "secret" => "okd7qw3v7xjbbzg3fhe662qvtsmi4o")
			),

			"BitBucket" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "xEJFSeKpNLE3yk532K", "secret" => "qMwRqzAGMbEZDSNKfxMLeevEhLfuNqVH")
			),

			"GitHub" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "8e4f8b0fa78d407d6242", "secret" => "6834d29557f83b28d94030e7b57ebbbda991f400")
			),
		/* ------------------------------------------------------------------------------------------ */
		),
	);