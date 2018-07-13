<?php
/*
Plugin Name: Hostinger Links
Description: Hostinger Links in Meta widget.
Version: 0.1
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

// Do not access file directly!
if (!defined('WPINC')) {
    die;
}

if (!class_exists('Hostinger_Links')) {
    class Hostinger_Links
    {
        function __construct()
        {
            $this->install();
            $this->filters();
        }

        function install()
        {
        }

        function filters()
        {
            add_filter('widget_meta_poweredby', array($this, 'set_hostinger_links'), 9999);
        }

        function set_hostinger_links($link)
        {
            $link_1 = sprintf('<li><a href="%s" title="%s">%s</a></li>',
                esc_url('https://www.hostinger.com/'),
                esc_attr__('Hostinger'),
                'Hostinger'
            );

            $link_2 = sprintf('<li><a href="%s" title="%s">%s</a></li>',
                esc_url('https://www.000webhost.com/'),
                esc_attr__('000webhost'),
                '000webhost'
            );
            return $link_1 . $link_2;
        }
    }

    $hpc = new Hostinger_Links;
}