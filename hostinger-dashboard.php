<?php
/*
Plugin Name: Hostinger Dashboard Notification
Description: Display free migration notice for WordPress site to Hostinger. Get free domain with upgrade!
Version: 1.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

// Do not access file directly!
if (!defined('WPINC')) {
    die;
}
function hostinger_admin_notice__success() {
    ?>
    <style type="text/css">
        .upgrade_button { background: #ffcf4d; border: 0; padding: 8px; color: #cb0005; font-size: 16px; border-radius: 3px; }
        .upgrade_button:hover { background: #ffcf4d; color: #cb0005 !important; }
        .upgrade_button_red { background: #d10303; border: 1px solid #d10303 ; padding: 5px 15px 8px 15px; color: #fff; font-size: 16px; border-radius: 3px; cursor:pointer}
        .upgrade_button_red .h2 {font-size: 18px;}
        .upgrade_button_red .h5 {font-size: 12px;}
        .upgrade_button_red:hover { background: #fff; color: #d10303 !important; }
        .upgrade_hostinger { text-align: center; }
        #main_content h1 { }
        #main_content .col-lg-6 { width: 50%; padding 20px; display: inline-block;}
        #main_content .col-lg-8 { width: 80%; padding 20px; display: inline-block; }
        #main_content .col-lg-4 { width: 20%; padding 20px; display: inline-block; }
        #main_content ul { margin-left: 20px; }
        #main_content ul li { list-style-type: square; margin-bottom: 0; color: #000; font-size: 14px; }
        #main_content a { text-decoration: none; }
        .notice_content li { margin-bottom: 10px !important; }
        .upgrade_hostinger1 { margin: 20px auto 10px; }
        #main_content { padding-bottom: 10px; padding-top: 5px; }
        #main_content > p { font-weight: bold; }
        #main_content .hlogo { height: 50px;    float: right;    margin: 40px 20px 30px 30px; }
    </style>
    <div class="notice notice-success is-dismissible">
        <div id="main_content" class="notice_content">
            <img src="https://cdn.rawgit.com/hostinger/logo/master/v3/logo_new_web.png" alt="Upgrade to Hostinger" class="hlogo"/>
            <h1>Did you know?</h1>
            <p>000webhost was created as an educational platform by Hostinger team. At <a href="https://www.hostinger.com/special/000webhost?utm_campaign=000-wp&utm_medium=upgrade-button&utm_source=000" target="_blank">Hostinger</a> we provide professional web hosting:</p>
            <ul>
                <li>WordPress sites hosted on hostinger are 5x faster; </li>
                <li>SEO Optimization for WordPress - you will rank higher on Google search; </li>
                <li>Daily backups, so your data will always be safe;</li>
                <li>Fast and dedicated support ready to help you;</li>
                <li>Migration of your current WordPress sites to Hostinger is totally free!</li>
                <li>Try Premium Hostinger offers from $2.15</li>
            </ul>
            <p>
                <a href="https://www.hostinger.com/special/000webhost?utm_campaign=000-wp&utm_medium=upgrade-cta&utm_source=000" target="_blank">
                    <button class="upgrade_button_red">
                        <b class="h2">TRANSFER</b><br><span class="h5">My site to Hostinger</span>
                    </button>
                </a>
            </p>
        </div>
    </div>
    <?php
}
if(!isset($_COOKIE['hostinger'])){
    add_action( 'admin_notices', 'hostinger_admin_notice__success' );
}
add_action( 'admin_footer', 'hostinger_admin_notice__function' );
function hostinger_admin_notice__function(){?>
<script type="text/javascript">
    jQuery(window).on('load',function($) {
        jQuery('.notice .notice-dismiss').on('click',function(){
            document.cookie = "hostinger=1";
        });
    });
</script>
    <?php
}?>