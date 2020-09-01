<?php
function university_files()
{
    //loading css files

    wp_enqueue_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('custom_google_fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('university_main_style', get_stylesheet_uri(), NULL, microtime());

    //loading js files
    wp_enqueue_script('university_main_js_files', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), 'true');
}

add_action('wp_enqueue_scripts', 'university_files');

//add action for title
function university_features()
{
    add_theme_support('title-tag');
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerMenuLocation1', 'Footer Menu Location1');
    register_nav_menu('footerMenuLocation2', 'Footer Menu Location2');
}
add_action('after_setup_theme', 'university_features');

//Customize File
require get_template_directory() . '/customizer.php';
//add datepicker options
function add_my_scripts($scripts)
{
    wp_enqueue_script('jquery-ui-datepicker');
}
add_action('wp_enqueue_scripts', 'add_my_scripts');


function university_adjust_queries($query)
{
    $today = date('Ymd');
    if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            )
        ));
    }
}
add_action('pre_get_posts', 'university_adjust_queries');
