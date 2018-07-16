<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('public/alfa/_parts/header');
?>
<title><?php echo $this->config->item('site_title'); ?></title>
</head>
<body>
 <?php $this->load->view('public/alfa/_parts/navbar_header');?>
<div class="container">
	<div class="row">
		<div class="headline">
			<p class="headline_title">My Carpool</p>
		</div>

	</div>
</div>

<?php $this->load->view('public/alfa/_parts/footer'); ?>