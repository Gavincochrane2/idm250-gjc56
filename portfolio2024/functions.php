<?php 

// die('fhhf');
function theme_scripts_and_styles()
{
wp_enqueue_script('idm-main-script', get_template_directory_uri() . '/dist/scripts/main.js', [], false, ['in_footer' => true] );

// wp_enqueue_styles('idm-normalize', 'https://yarnpkg.com/en/package/normalize.css');
wp_enqueue_style('idm-main-style', get_template_directory_uri() . '/dist/styles/main.css'); 
}

add_action('wp_enqueue_scripts', 'theme_scripts_and_styles');

// Add excerpt support to pages
add_post_type_support('page', 'excerpt');

function register_theme_menus()
{
    register_nav_menus([
        'primary' => 'Primary Menu',

        '404-menu' => '404 Menu'
    ]);

}

add_action('init', 'register_theme_menus');

// Add Featured Image Support
add_theme_support('post-thumbnails');
add_theme_support('widgets');

function add_widgets()
{
    register_sidebar([
        'name' => 'Main Sidebar',
        'id' => 'main_sidebar',
    ]);
}
add_action('widgets_init', 'add_widgets');


/**
 * Function to register custom post types
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * @return void
 */
function register_custom_post_types()
{
    $arg = [
        'labels' => [
            'name' => 'Project',
            'singular_name' => 'Project',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'project'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        // 'taxonomies' => ['project-categories'], // Name of custom taxonomy. Only need if you have a custom taxonomy
        'show_in_rest' => true,
    ];
    $post_type_name = 'project';

    // Register Albums post type
    register_post_type($post_type_name, $arg);
}

add_action('init', 'register_custom_post_types');



/**
 * Register custom taxonomies
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @return void
 */
function register_custom_taxonomies()
{
    $args = [
        'labels' => [
            'name' => 'Project Categories',
            'singular_name' => 'Project Category',
            'search_items' => 'Search Project Categories',
            'all_items' => 'All Project Categories',
            'parent_item' => 'Parent Project Category',
            'parent_item_colon' => 'Parent Project Type:',
            'edit_item' => 'Edit Category',
            'update_item' => 'Update Category',
            'add_new_item' => 'Add New Category',
            'new_item_name' => 'New Project Type Name',
            'menu_name' => 'Project Categories',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'project/categories'],
        'show_in_rest' => true,
    ];

    $taxonomy_name = 'project-categories'; // name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
    $taxonomy_association = ['project']; // post types to associate with this taxonomy

    register_taxonomy($taxonomy_name, $taxonomy_association, $args);
}
add_action('init', 'register_custom_taxonomies');