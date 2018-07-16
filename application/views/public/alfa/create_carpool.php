<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('public/alfa/_parts/header');
?>
<title><?php echo $this->config->item('site_title'); ?></title>
</head>
<body>
    <?php $this->load->view('public/alfa/_parts/navbar_header'); ?>
     <?php $this->load->view('public/alfa/_parts/logedin_navbar_header');?>
    <div class="container">
        <div class="row">
            <div class="headline">
                <p class="headline_title">Create Carpool</p>
            </div>
            <div class="span-18 last">
                <h1>Create a new casual carpool</h1>
                <form name="adForm" method="POST" action="">
                    <div id="formErrorDisplay" style="display: none" class="yui-module">
                        <div class="bd"></div>
                    </div>

                    In this carpool you will be : &nbsp;
                    <input name="carpoolType" type="radio" value="both" checked="">driver or passenger
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="carpoolType" type="radio" value="driver">driver only
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="carpoolType" type="radio" value="passenger">passenger only
                    <div id="checkCarpoolType"></div>

                    <div id="departureCityWrapper">
                        <b>Departure City:</b>
                        <input id="departureCityId" name="departureCityId" type="hidden" value="">
                        <input id="departureCityIsBig" name="departureCityIsBig" type="hidden" value="">
                        <div id="departureCityAutocomplete" class="yui-skin-sam yui-ac">
                            <input id="departureCity" name="departureCity" type="text" value="" class="yui-ac-input" autocomplete="off">
                            <div id="departureCityContainer" class="yui-ac-container">
                                <div class="yui-ac-content" style="display: none;"><div class="yui-ac-hd" style="display: none;"></div><div class="yui-ac-bd"><ul><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li></ul></div><div class="yui-ac-ft" style="display: none;"></div></div></div>
                        </div>

                    </div>
                    <div id="departureAreaAddOn" style="display: none">
                        Departure City area:
                        <input id="departureAreaId" name="departureAreaId" type="hidden" value="">
                        <div id="departureAreaAutocomplete" class="yui-ac">
                            <input id="departureArea" name="departureArea" type="text" value="" class="yui-ac-input" autocomplete="off">
                            <div id="departureAreaContainer" class="yui-ac-container">
                                <div class="yui-ac-content" style="display: none;"><div class="yui-ac-hd" style="display: none;"></div><div class="yui-ac-bd"><ul><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li></ul></div><div class="yui-ac-ft" style="display: none;"></div></div></div>
                        </div>
                    </div>


                    <div id="destinationCityWrapper">
                        <b>Destination City: </b>
                        <input id="destinationCityId" name="destinationCityId" type="hidden" value="">
                        <input id="destinationCityIsBig" name="destinationCityIsBig" type="hidden" value="">
                        <div id="destinationCityAutocomplete" class="yui-ac">
                            <input id="destinationCity" name="destinationCity" type="text" value="" class="yui-ac-input" autocomplete="off">
                            <div id="destinationCityContainer" class="yui-ac-container">
                                <div class="yui-ac-content" style="display: none;"><div class="yui-ac-hd" style="display: none;"></div><div class="yui-ac-bd"><ul><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li></ul></div><div class="yui-ac-ft" style="display: none;"></div></div></div>
                        </div>

                    </div>
                    <div id="destinationAreaAddOn" style="display: none">
                        Destination City area:
                        <input id="destinationAreaId" name="departureAreaId" type="hidden" value="">
                        <div id="destinationAreaAutocomplete" class="yui-ac">
                            <input id="destinationArea" name="destinationArea" type="text" value="" class="yui-ac-input" autocomplete="off">
                            <div id="destinationAreaContainer" class="yui-ac-container">
                                <div class="yui-ac-content" style="display: none;"><div class="yui-ac-hd" style="display: none;"></div><div class="yui-ac-bd"><ul><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li><li style="display: none;"></li></ul></div><div class="yui-ac-ft" style="display: none;"></div></div></div>
                        </div>
                    </div>

                </form></div>
        </div>
    </div>

    <?php $this->load->view('public/alfa/_parts/footer'); ?>