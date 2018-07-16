<div class="collapse navbar-collapse navbar-menubuilder">
 <?php
            if ($this->is_online) {
                ?>
<ul class="nav navbar-nav navbar-right">
    <li><a href="<?php echo base_url('myaccount'); ?>"><i class="fa fa-lock" aria-hidden="true"></i><span class="nav_log">My Profile</span></a></li>
    <li><a href="<?php echo base_url('mycarpool'); ?>"><i class="fa fa-lock" aria-hidden="true"></i><span class="nav_log">My Carpool</span></a></li>
    <li><a href="<?php echo base_url('create-carpool'); ?>"><i class="fa fa-lock" aria-hidden="true"></i><span class="nav_log">Create a Carpool</span></a></li>
</ul>
            <?php } ?>
</div>