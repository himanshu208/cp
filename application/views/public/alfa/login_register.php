<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('public/alfa/_parts/header');
?>
<title><?php echo $this->config->item('site_title'); ?></title>
</head>
<body>
<?php $this->load->view('public/alfa/_parts/navbar_header'); ?>


    <div class="container">
        <div class="row">
            <div class="headline">
                <p class="headline_title">Login/Register<?php //echo lang('headline_cisociall_login'); ?></p>
                <p class="headline_explanation"><?php //echo lang('view_login_explanation'); ?></p>
            </div><hr/>
            <div class="icons-container">
                <div class="row">
<?php foreach ($providers as $provider => $data) { ?>
                        <div class="col-sm-4 col-md-3">
                            <a href="<?php echo base_url('social/login/' . $provider); ?>" class="btn cisociall_social cisociall_btn cisociall_<?php echo strtolower($provider); ?>"><span class="separator"></span><i class="socicon socicon-<?php echo strtolower($provider); ?>"></i><span class="soc_title"><?php echo $provider; ?></span></a>
                        </div>
<?php } ?>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('public/alfa/_parts/footer'); ?>