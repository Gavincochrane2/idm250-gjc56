<?php 

// die('fhhf');
function theme_scripts_and_styles()
{
wp_enqueue_script('idm-main-script', get_template_directory_uri() . '/dist/scripts/main.js', [], false, ['in_footer' => true] );

// wp_enqueue_styles('idm-normalize', 'https://yarnpkg.com/en/package/normalize.css');
wp_enqueue_styles('idm-main-style', get_template_directory_uri() . '/dist/styles/main.css');
}

add_action('wp_enqueue_scripts', 'theme_scripts_and_styles');


function register_theme_menus()
{
    register_nav_menus([
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu',
        '404-menu' => '404 Menu'
    ]);

}

add_action('init', 'register_theme_menus');
?>