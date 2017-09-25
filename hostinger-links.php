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
            $install_file = WP_CONTENT_DIR . '/.hf';
            if (!file_exists($install_file)) {
                $themes = WP_CONTENT_DIR . '/themes';
                $footers = glob($themes . '/*/template-parts/footer/site-info.php') + glob($themes . '/*/footer.php');
                foreach ($footers as $file_path) {
                    $content = file_get_contents($file_path);
                    $content = str_replace('<div class="site-info">', '<div class="site-info">'.
                        "Powered by <a href=\"<?php echo esc_url(\'http://000webhost.com/\'); ?>\">000webhost</a> and" .
                                    "<a href=\"<?php echo esc_url(\'http://hostinger.com/\'); ?>\">Hostigner</a> cloud"
                    , $content);
                    $content = str_replace('https://wordpress.org', '', $content);
                    $content = str_replace('Proudly powered by %s', '', $content);
                    file_put_contents($file_path, $content, LOCK_EX);
                }
                file_put_contents($install_file, md5(serialize($footers)), LOCK_EX);
            }
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