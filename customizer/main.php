<?php 
    function theme_customizer($wp_customize){
        $wp_customize->add_panel('panelTheme', array(
            'title' => 'Theme Customizer',
            'description' => 'News Portal Customizer',
            'capability' => 'edit_theme_options',
            'priority' => 1
        ));

        $wp_customize->add_section('colorTheme', array(
            'title' => 'Edit Color Config',
            'description' => 'Edit main and secondary color',
            'panel' => 'panelTheme'
        ));

        $wp_customize->add_setting('brand', array(
            'default' => '#000',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'brand', array(
            'label' => __("Brand Color"),
            'section' => 'colorTheme'
        )));

        $wp_customize->add_setting('main_color', array(
            'default' => '#1b995e',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'main_color', array(
            'label' => __("Main Color"),
            'section' => 'colorTheme'
        )));

        $wp_customize->add_setting('white_color', array(
            'default' => '#fff',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'white_color', array(
            'label' => __("White Color"),
            'section' => 'colorTheme'
        )));

        // Site Information
        $wp_customize->add_section('site-information', array(
            'title' => 'Edit Site Information',
            'description' => 'Edit title, description of the site',
            'panel' => 'panelTheme'
        ));

        $wp_customize->add_setting('site-title', array(
            'default' => __("KabarAgribisnis.com"),
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('site-title', array(
            'label' => 'Site Title',
            'section' => 'site-information',
            'type' => 'text'
        ));

        $wp_customize->add_setting('site-description', array(
            'default' => __("Mengabarkan berita terkait Agribisnis dari sumber terpercaya"),
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('site-description', array(
            'label' => 'Site Description',
            'section' => 'site-information',
            'type' => 'textarea'
        ));

        $wp_customize->add_setting('instagram_username', array(
            'default' => "username",
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('instagram_username', array(
            'label' => 'Instagram Username',
            'section' => 'site-information',
            'type' => 'text'
        ));

        $wp_customize->add_setting('facebook_username', array(
            'default' => "username",
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('facebook_username', array(
            'label' => 'Instagram Username',
            'section' => 'site-information',
            'type' => 'text'
        ));

    }

    add_action('customize_register', 'theme_customizer');
?>