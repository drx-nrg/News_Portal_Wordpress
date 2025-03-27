<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Inter:wght@100..900&family=Lora:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<style type="text/css">
    :root{
        --primary: <?php echo get_theme_mod('primary_color', '#ff7700'); ?>;
    }
    #menu-overflow{
        overflow-y: visible !important;
    }
    #menu-overflow::-webkit-scrollbar{
        display: block !important;
    }
    #search-modal-btn{
        cursor: pointer;
    }
    .menu-item{
        display: flex;
        align-items: center;
    }
    .modals{
        display: flex;
        opacity: 0;
        transform: translate(0px, -50px);
        transition: all .3s ease-out;
    }
    .modal-active{
        opacity: 1;
        transform: translate(0px, 0px);
    }
    .has-sub-menu{
        position: relative;
    }
    .sub-menu{
        list-style: none;
        position: absolute;
        top: 60px !important;
        pointer-events: none;
        transition: all .2s ease-out;
        opacity: 0;
    }
    .sub-menu-active{
        top: 40px !important;
        pointer-events: auto;
        opacity: 1;
    }
    .sub-menu{

    }
    .sidebar-wrapper{
        width: 100%;
        height: 100vh;
        position: fixed;
        background-color:  rgba(0, 0, 0, 0.4);
        display: flex;
        justify-content: flex-end;
        z-index: 9999;
        transition: all .3s ease;
        transform: translate(400px, 0px);
        opacity: 0;
        pointer-events: none;
    }
    .category-menu-sidebar{
        width: 400px;
        height: 100vh;
        background-color: white;
        padding: 50px;
    }
    .sub-menu-sidebar{
        /* position: absolute; */
        /* transform: translateY(-50px); */
        transition: all .2s ease;
        /* transform-origin: top; */
        opacity: 0;
        pointer-events: none;
        z-index: 100;
        margin-bottom: 0;
        position: absolute;
        width: 100%;
        transform: scaleY(0%);
        transform-origin: top;
    }
    .sub-menu-sidebar-active{
        position: relative;
        transform: scaleY(100%);
        opacity: 1;
        pointer-events: auto;
    }
    .sub-menu-sidebar li{
        transition: all .2s ease;
    }
    .nav-item-dropdown-title{
        z-index: 999;
    }
    .flip-icon{
        transform: rotate(180deg);
    }
    .active-sidebar{
        transform: translate(0px, 0px);
        opacity: 1;
        pointer-events: auto;
    }
    .move-text{
        animation: moveText .5s linear infinite;
    }
    @keyframes moveText {
        0%{
            transform: translate(0, 0px);
        }
        50%{
            transform: translate(10px, 0px);
        }
        100%{
            transform: translate(0px, 0px);
        }
    }
    #menu-page-menu li a{
        position: relative;
    }

    #menu-page-menu li a::after{
        content: "";
        position: absolute;
        left: 0;
        bottom: -3px;
        width: 100%;
        height: 2px;
        background-color: black;
        transform: scaleX(0);
        transition: all .3s ease;
        transform-origin: left;
    }
    #menu-page-menu li a:hover::after{
        transform: scaleX(1);
    }
    #social-media-list li a{
        width: 55px;
        transition: all .3s ease;
        overflow: hidden;
        white-space: nowrap;
    }
    #social-media-list li a:hover{
        width: 200px;
    }
    a{
        text-decoration: none !important;
    }
    .page_item a{
        color: black !important;
        font-weight: 600 !important;
    }
    .bg-orange{
        background-color: var(--primary) !important;
        color: white !important;
    }
    .text-orange{
        color: var(--primary);
    }
    .popular-post-card{
        min-height: 50%;
        max-height: 50%;
    }
    @media screen and (max-width: 768px) {
        .popular-post-card{
            min-height: auto;
            max-height: auto;
        }
    }
    #sidebar .widget-container ul {
        padding-left: 0;
    }
    #sidebar .widget-container li {
        border-bottom: 0.5px solid rgba(0,0,0,0.5);
        margin-bottom: 1rem;
    }
    #sidebar .widget-container li a{
        font-weight: normal;
    }
    .headline-column-2{
        max-height: auto;
    }
    @media screen and (min-width: 768px) {
        .headline-column-2{
            max-height: 400px;
        }
    }
</style>
<body <?php body_class('bg-light'); ?>>
    <?php wp_body_open(); ?>
    <div id="wrapper" class="hfeed">
        <div class="sidebar-wrapper">
            <div class="category-menu-sidebar">
                <button id="toggle-sidebar-btn" 
                        class="bi bi-x text-dark fs-1" 
                        style="position: absolute; top: 20px; right: 20px; cursor: pointer; border: none; background-color: transparent;"
                        aria-label="Close sidebar" 
                        aria-controls="sidebar" 
                        aria-expanded="true">
                </button>                
                <h1 class="fs-2 text-dark fw-semibold mb-3 d-flex flex-row gap-2 align-items-center"><svg class="fs-3 text-dark" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M22.78 10.37A1 1 0 0 0 22 10h-2V9a3 3 0 0 0-3-3h-6.28l-.32-1a3 3 0 0 0-2.84-2H4a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14.4a3 3 0 0 0 2.92-2.35L23 11.22a1 1 0 0 0-.22-.85M5.37 18.22a1 1 0 0 1-1 .78H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h3.56a1 1 0 0 1 1 .68l.54 1.64A1 1 0 0 0 10 8h7a1 1 0 0 1 1 1v1H8a1 1 0 0 0-1 .78Zm14 0a1 1 0 0 1-1 .78H7.21a1.4 1.4 0 0 0 .11-.35L8.8 12h12Z"/></svg> <?= __("Menu Kategori", "newslify") ?></h1>
                <nav class="container" role="navigation">
                    <?php
                    $menu_id = get_menu_id('main-menu');
                    $menu_items = wp_get_nav_menu_items($menu_id);

                    if( !empty($menu_items) && is_array($menu_items) ):
                    ?>
                        <ul class="navbar-nav d-flex flex-col gap-2 w-100">
                            <?php foreach( $menu_items as $menu_item ): ?>
                                <?php if( !$menu_item->menu_item_parent ): ?>
                                    <?php  
                                        $child_menu_items = get_child_menu_items($menu_items, $menu_item->ID);
                                        $has_children = !empty($child_menu_items) && is_array($child_menu_items);    
                                        
                                        if( !$has_children ):
                                    ?>
                                        <li class="nav-item active d-flex flex-row gap-2 align-items-center" style="cursor: pointer;">
                                            <i class="bi bi-play-fill"></i>
                                            <a class="nav-link active text-decoration-none text-dark fs-5 fw-semibold" aria-current="page" href="<?= esc_url($menu_item->url) ?>" target="<?= esc_attr($menu_item->target) ?>" ><?= esc_html($menu_item->title) ?></a>
                                        </li>
                                    <?php else: ?>
                                        <li class="nav-item active has-sub-menu-sidebar d-flex flex-column gap-2" style="cursor: pointer;">
                                            <!-- <svg class="text-dark fs-3" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="m14.83 11.29l-4.24-4.24a1 1 0 0 0-1.42 0a1 1 0 0 0 0 1.41L12.71 12l-3.54 3.54a1 1 0 0 0 0 1.41a1 1 0 0 0 .71.29a1 1 0 0 0 .71-.29l4.24-4.24a1 1 0 0 0 0-1.42"/></svg> -->
                                            <div class="nav-item-dropdown-title w-100 bg-white d-flex flex-row align-items-center gap-2">
                                                <i class="bi bi-play-fill"></i>
                                                <a class="nav-link active text-decoration-none text-dark fs-5 fw-semibold" aria-current="page" href="<?= esc_url($menu_item->url) ?>" target="<?= esc_attr($menu_item->target) ?>" ><?= esc_html($menu_item->title) ?></a>
                                                <svg class="sub-menu-icon text-dark fs-3" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M17 9.17a1 1 0 0 0-1.41 0L12 12.71L8.46 9.17a1 1 0 0 0-1.41 0a1 1 0 0 0 0 1.42l4.24 4.24a1 1 0 0 0 1.42 0L17 10.59a1 1 0 0 0 0-1.42"/></svg>
                                            </div>
                                            <ul class="sub-menu-sidebar py-0" style="width: max-content; list-style: none;">
                                                <?php  foreach( $child_menu_items as $item ): ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link active text-decoration-none text-dark fs-5 fw-semibold" aria-current="page" href="<?= esc_url($item->url) ?>" target="<?= esc_attr($item->target) ?>" ><?= esc_html($item->title) ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </nav>
            </div>
        </div>

        <?php get_template_part('template-parts/header/nav-main') ?>
        <?php get_template_part('template-parts/header/nav') ?>

        <div style="width: 100%; height: 100vh; position: absolute; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.3); z-index: 9999; display: none;" class="align-items-center" id="search-modal">
            <div class="row w-100 justify-content-center modals">
                <div class="search-modal col-md-4 rounded-2 bg-white d-flex flex-column justify-content-center align-items-center p-5" style="height: 200px; position: relative">
                    <i class="bi bi-x fs-2" style="position: absolute; top: 0; right: 5px;" id="search-modal-btn"></i>
                    <h1 class="fs-2 fw-semibold mb-3">Cari Berita</h1>
                    <?php get_search_form() ?>
                </div>
            </div>
        </div>
        <!-- Tombol untuk sharing artikel -->
        <!-- <ul class="social-media p-0 m-0 <?= is_home() ? "d-none" : "d-flex" ?> flex-column overflow-hidden rounded-3" id="social-media-list" style="list-style: none; list-style-position: inside; position: fixed; top: 20%; z-index: 999">
            <li><a href="https://instagram.com" class="p-3 text-white fs-4 d-flex flex-row align-items-center text-decoration-none gap-3 fw-semibold" style="background-color: rgb(255, 0, 123);"><i class="bi bi-instagram"></i> <span id="social-media-name">Instagram</span></a></li>
            <li><a href="<?="https://www.facebook.com/sharer/sharer.php?u=".urlencode(is_single() ? get_permalink() : home_url()) ?>" target="_blank" rel="noopener noreferrer" class="p-3 bg-primary text-white fs-4 d-flex flex-row align-items-center text-decoration-none gap-3 fw-semibold"><i class="bi bi-facebook"></i> <span id="social-media-name">Facebook</span></a></li>
            <li><a href="https://api.whatsapp.com/send?text=<?= urlencode(is_single() ? get_the_title() . ' ' . get_permalink() : get_bloginfo('name').' '.home_url()); ?>" target="_blank" rel="noopener noreferrer" class="p-3 text-white fs-4 d-flex flex-row align-items-center text-decoration-none gap-3 fw-semibold" style="background-color: #1b995e;"><i class="bi bi-whatsapp"></i> <span id="social-media-name">WhatApp</span></a></li>
            <li><a href="https://youtube.com" class="p-3 bg-danger text-white fs-4 d-flex flex-row align-items-center text-decoration-none gap-3 fw-semibold"><i class="bi bi-youtube"></i> <span id="social-media-name">YouTube</span></a></li>
            <li><a href="<?="https://twitter.com/intent/tweet?url=".urlencode(is_single() ? get_permalink() : home_url())."&text=".urlencode(is_single() ? get_the_title() : get_bloginfo('name').' - '.get_bloginfo('description')) ?>" rel="noopener noreferrer" target="_blank" class="p-3 bg-dark text-white fs-4 d-flex flex-row align-items-center text-decoration-none gap-3 fw-semibold"><i class="bi bi-twitter"></i> <span id="social-media-name">Twitter (X)</span></a></li>
        </ul> -->
        <div class="container">
            <main id="content" role="main">
                <?php if (is_active_sidebar('top-ads-widget')) : ?>
                    <?php dynamic_sidebar('top-ads-widget') ?>
                <?php endif; ?>