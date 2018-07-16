

<div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
    <div class="container-fluid">
        <!-- Load Navbar Header -->
        <div class="navbar-header"><a class="navbar-brand" href="<?php echo base_url(); ?>">
                <!--img alt="<?php echo $this->config->item('site_name'); ?>" src="<?php echo base_url('themes/public/alfa/img/cisociall.png'); ?>" class="cisociall_navbar_logo img-responsive"/> <?php echo $this->config->item('site_name'); ?>-->RidersAndPoolers.com
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only"><?php echo lang('toggle_navigation'); ?></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i> <?php echo lang('nav_home'); ?></a></li>
                <li><a href="<?php echo base_url('how-it-works'); ?>"><i class="fa fa-users" aria-hidden="true"></i> How it Works</a></li>
                <li><a href="<?php echo base_url('support'); ?>"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php //echo lang('nav_admin');  ?>Support / Suggestions</a></li>
                <li><a href="<?php echo base_url('about'); ?>"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php //echo lang('nav_admin');  ?>About Us</a></li>

            </ul>
            <?php
            if ($this->is_online) {
                ?>
                <ul class="nav navbar-nav navbar-right">

                    <li><a href="<?php echo base_url('myaccount'); ?>"><img src="<?php echo $this->sess_photoURL; ?>" alt="<?php echo lang('profile_user_picture'); ?>" class="user_photo img-circle" /><span class="nav_log">My Account</span></a></li>

                    <li><a href="<?php echo base_url('social/logout'); ?>"><span class="nav_log"><?php echo lang('nav_logout'); ?></span></a></li>

                </ul>
                <?php
            } else {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url('login'); ?>"><i class="fa fa-lock" aria-hidden="true"></i><span class="nav_log"> <?php echo lang('nav_login'); ?></span></a></li>
                </ul>
                <?php
            }
            ?>
        </div>
    </div>
</div>
