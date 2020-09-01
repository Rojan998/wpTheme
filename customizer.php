<?php
function university_customizer_register($wp_customize)
{
    $wp_customize->add_section('showcase', array(
        'title' => __('Header', 'wpbootstrap'),
        'description' => sprintf(__('Options for showcase', 'university')),
        'priority' => 130
    ));


    //adds setting for header background image
    $wp_customize->add_setting('showcase_image', array(
        'default' => get_bloginfo('template_directory') . '/images/headerbg2.jpg', 'university',
        'type' => 'theme_mod'
    ));
    // adding control for header background image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'showcase_image', array(
        'label' => __('Header Background Image', 'university'),
        'section' => 'showcase',
        'priority' => 1
    )));


    //adds setting for heading
    $wp_customize->add_setting('showcase_heading', array(
        'default' => _x('Welcome!', 'university'),
        'type' => 'theme_mod'
    ));
    // adding control for heading
    $wp_customize->add_control('showcase_heading', array(
        'label' => __('Heading', 'university'),
        'section' => 'showcase',
        'priority' => 2
    ));


    //adds setting for header tagline 1
    $wp_customize->add_setting('showcase_tagline_first', array(
        'default' => _x('We think you’ll like it here. ', 'university'),
        'type' => 'theme_mod'
    ));
    // adding control for header tagline 1
    $wp_customize->add_control('showcase_tagline_first', array(
        'label' => __('Header Tagline First', 'university'),
        'section' => 'showcase',
        'priority' => 3
    ));

    //adds setting for header tagline 2
    $wp_customize->add_setting('showcase_tagline_second', array(
        'default' => _x('Why don’t you check out the major you’re interested in?', 'university'),
        'type' => 'theme_mod'
    ));
    // adding control for header tagline 2
    $wp_customize->add_control('showcase_tagline_second', array(
        'label' => __('Header Tagline Second', 'university'),
        'section' => 'showcase',
        'priority' => 4
    ));


    //adds setting for button url
    $wp_customize->add_setting('button_url', array(
        'default' => _x('www.google.com', 'university'),
        'type' => 'theme_mod'
    ));
    // adding control for button url
    $wp_customize->add_control('button_url', array(
        'label' => __('Button URL', 'university'),
        'section' => 'showcase',
        'priority' => 5
    ));

    //adds setting for button text
    $wp_customize->add_setting('button_text', array(
        'default' => _x('Find Your Major', 'university'),
        'type' => 'theme_mod'
    ));
    // adding control for button text
    $wp_customize->add_control('button_text', array(
        'label' => __('Button Text', 'university'),
        'section' => 'showcase',
        'priority' => 6
    ));
}

add_action('customize_register', 'university_customizer_register');
