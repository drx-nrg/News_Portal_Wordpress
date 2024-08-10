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
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="wrapper" class="hfeed">
        <div class="container-fluid navigation-top bg-white">
            <div class="container d-flex justify-content-between align-items-center py-3 fw-bold fs-5">
                <a href="<?php echo home_url(); ?>" class="text-decoration-none text-dark mb-0">
                    <h1 class="fs-2 mb-0" style="font-family: 'Lora';"><?= get_theme_mod('site-title', 'KabarAgribisnis.com') ?></h1>
                </a>
                <nav id="page-menu menu-halaman" class="d-flex align-items-center">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'page-menu',
                        'menu_class' => 'navbar-nav d-flex flex-row gap-3 gap-md-5',
                        'menu_item_class' => 'nav-item active',
                        'link_class' => 'text-decoration-none text-dark',
                        'container' => 'ul'
                    )) ?>
                </nav>
                <button class="btn btn-success" id="search-modal-btn"><i class="bi bi-search"></i></button>
            </div>
        </div>
        <div class="container-fluid main-menu py-3 mb-5">
            <nav class="container">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'menu_class' => 'navbar-nav d-flex flex-row justify-content-between gap-3 gap-md-5',
                    'menu_item_class' => 'nav-item active',
                    'link_class' => 'text-decoration-none text-white',
                    'container' => 'ul'
                ));
                ?>
            </nav>
        </div>
        <div style="width: 100%; height: 100vh; position: absolute; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.3); z-index: 9999; display: none;" class="align-items-center" id="search-modal">
            <div class="row w-100 justify-content-center">
                <div class="search-modal col-md-4 rounded-2 bg-white d-flex flex-column justify-content-center align-items-center p-5" style="height: 200px; position: relative">
                    <i class="bi bi-x fs-2" style="position: absolute; top: 0; right: 5px;" id="search-modal-btn"></i>
                    <h1 class="fs-2 fw-semibold mb-3">Cari Berita</h1>
                    <?php get_search_form() ?>
                </div>
            </div>
        </div>
        <ul class="social-media p-0 m-0 d-flex flex-column rounded-2 overflow-hidden" id="social-media-list" style="list-style: none; list-style-position: inside; position: fixed; top: 20%; z-index: 999">
            <li><a href="https://instagram.com" class="p-3 text-white fs-4 d-block" style="background-color: rgb(255, 0, 123);"><i class="bi bi-instagram"></i></a></li>
            <li><a href="https://facebook.com" class="p-3 bg-primary text-white fs-4 d-block"><i class="bi bi-facebook"></i></a></li>
            <li><a href="https://whatsapp.com" class="p-3 bg-success text-white fs-4 d-block"><i class="bi bi-whatsapp"></i></a></li>
            <li><a href="https://youtube.com" class="p-3 bg-danger text-white fs-4 d-block"><i class="bi bi-youtube"></i></a></li>
            <li><a href="https://x.com" class="p-3 bg-dark text-white fs-4 d-block"><i class="bi bi-twitter"></i></a></li>
        </ul>
        <div class="container">
            <main id="content" role="main">
                <?php if (is_active_sidebar('top-ads-widget')) : ?>
                    <?php dynamic_sidebar('top-ads-widget') ?>
                <?php endif; ?>