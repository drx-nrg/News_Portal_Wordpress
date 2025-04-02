<?php 
    function theme_customizer($wp_customize){
        $wp_customize->add_panel('panelTheme', array(
            'title' => 'Newslify Customizer',
            'description' => 'Newslify Theme Customizer',
            'capability' => 'edit_theme_options',
            'priority' => 1
        ));

        $wp_customize->add_section('colorTheme', array(
            'title' => 'Colors',
            'description' => 'Edit main and secondary color',
            'panel' => 'panelTheme'
        ));

        // Primary Color
        $wp_customize->add_setting('primary_color', array(
            'default' => '#ff7700',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
            'label' => __("Primary Color"),
            'section' => 'colorTheme'
        )));

        // Site Information
        $wp_customize->add_section('site_information', array(
            'title' => 'Site Information',
            'description' => 'Edit title, description of the site',
            'panel' => 'panelTheme'
        ));

        $wp_customize->add_setting('site-title', array(
            'default' => get_bloginfo('name'),
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('site-title', array(
            'label' => 'Site Title',
            'section' => 'site_information',
            'type' => 'text'
        ));

        $wp_customize->add_setting('site-description', array(
            'default' => __("Mengabarkan berita terkait Agribisnis dari sumber terpercaya"),
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('site-description', array(
            'label' => 'Site Description',
            'section' => 'site_information',
            'type' => 'textarea'
        ));

        $wp_customize->add_setting('address', array(
            'default' => __("Jl. Papanggo 3 Tanjung Priok Jakarta Utara, DKI Jakarta, Indonesia"),
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('address', array(
            'label' => 'Address',
            'section' => 'site_information',
            'type' => 'textarea'
        ));

        $wp_customize->add_setting('instagram_link', array(
            'default' => "Default Link",
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('instagram_link', array(
            'label' => 'Instagram Link',
            'section' => 'site_information',
            'type' => 'text'
        ));

        $wp_customize->add_setting('facebook_link', array(
            'default' => "Default Link",
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('facebook_link', array(
            'label' => 'Facebook Link',
            'section' => 'site_information',
            'type' => 'text'
        ));

        $wp_customize->add_setting('youtube_link', array(
            'default' => "Default Link",
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('youtube_link', array(
            'label' => 'Youtube Link',
            'section' => 'site_information',
            'type' => 'text'
        ));

        $wp_customize->add_setting('twitter_link', array(
            'default' => "Default Link",
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('twitter_link', array(
            'label' => 'Twitter Link',
            'section' => 'site_information',
            'type' => 'text'
        ));

        $wp_customize->add_setting('contact_email', array(
            'default' => "kabaragribisnis@gmail.com",
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('contact_email', array(
            'label' => 'Contact Email',
            'section' => 'site_information',
            'type' => 'text'
        ));

        // Top Slider
        $wp_customize->add_section('slider_setting', array(
            'title' => "Slider Configuration",
            'description' => ' Set up and customize top slider posts',
            'panel' => 'panelTheme'
        ));

        $wp_customize->add_setting('is_active_slider', array(
            'default' => true,
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('is_active_slider', array(
            'label' => __("Activate Slider"),
            'description' => __("Toggle box to activate/deactivate slider"),
            'section' => 'slider_setting',
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting('is_looping', array(
            'default' => true,
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('is_looping', array(
            'label' => __("Loop"),
            'description' => __("Toggle box to loop the posts slider"),
            'section' => 'slider_setting',
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting('slider_delay', array(
            'default' => 3000,
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('slider_delay', array(
            'label' => __("Delay"),
            'section' => 'slider_setting',
            'type' => 'number',
            'input_attrs' => array(
                'min' => 0,
                'max' => 10000,
                'step' => 100
            )
        ));

        $posts_oldest = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 5,
            'orderby' => 'date',
            'order' => 'ASC' 
        ));
        
        $post_ids = [];
        
        if($posts_oldest->have_posts()){
            foreach($posts_oldest->posts as $post){
                $post_ids[] = $post->ID;
            }
        
            wp_reset_postdata();
        }

        $wp_customize->add_setting('post_1', array(
            'default' => '',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('post_1', array(
            'label' => __("Select Post 1"),
            'section' => 'slider_setting',
            'type' => 'select',
            'choices' => get_all_posts()
        ));
        
        $wp_customize->add_setting('post_2', array(
            'default' => '',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('post_2', array(
            'label' => __("Select Post 2"),
            'section' => 'slider_setting',
            'type' => 'select',
            'choices' => get_all_posts()
        ));

        $wp_customize->add_setting('post_3', array(
            'default' => '',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('post_3', array(
            'label' => __("Select Post 3"),
            'section' => 'slider_setting',
            'type' => 'select',
            'choices' => get_all_posts()
        ));

        $wp_customize->add_setting('post_4', array(
            'default' => '',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('post_4', array(
            'label' => __("Select Post 4"),
            'section' => 'slider_setting',
            'type' => 'select',
            'choices' => get_all_posts()
        ));

        // Headline Section
        $wp_customize->add_section('headline_posts_setting', array(
            'title' => "Headline Posts Setting",
            'description' => 'Edit and add new posts in headline section',
            'panel' => 'panelTheme'
        ));

        $wp_customize->add_setting('is_show_headline', array(
            'default' => true,
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('is_show_headline', array(
            'label' => __("Show Headline"),
            'description' => __("Toggle box to show or hide the posts headline"),
            'section' => 'headline_posts_setting',
            'type' => 'checkbox'
        ));

        $wp_customize->add_setting('headline_post_1', array(
            'default' => '',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('headline_post_1', array(
            'label' => __("Select Healine Post 1"),
            'section' => 'headline_posts_setting',
            'type' => 'select',
            'choices' => get_all_posts()
        ));

        $wp_customize->add_setting('headline_post_2', array(
            'default' => '',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('headline_post_2', array(
            'label' => __("Select Healine Post 2"),
            'section' => 'headline_posts_setting',
            'type' => 'select',
            'choices' => get_all_posts()
        ));

        $wp_customize->add_setting('headline_post_3', array(
            'default' => '',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('headline_post_3', array(
            'label' => __("Select Healine Post 3"),
            'section' => 'headline_posts_setting',
            'type' => 'select',
            'choices' => get_all_posts()
        ));

        $wp_customize->add_setting('headline_post_4', array(
            'default' => '',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('headline_post_4', array(
            'label' => __("Select Healine Post 4"),
            'section' => 'headline_posts_setting',
            'type' => 'select',
            'choices' => get_all_posts()
        ));

        $wp_customize->add_setting('headline_post_5', array(
            'default' => '',
            'transport' => 'refresh'
        ));

        $wp_customize->add_control('headline_post_5', array(
            'label' => __("Select Healine Post 5"),
            'section' => 'headline_posts_setting',
            'type' => 'select',
            'choices' => get_all_posts()
        ));
    }

    add_action('customize_register', 'theme_customizer');
?>