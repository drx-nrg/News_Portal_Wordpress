<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<style>
    :root{
        --primary: <?php echo get_theme_mod('primary_color')  ?>
    }
    #search-modal:before{
        content: "";
        width: 100%;
        height: 100vh;
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);
        transition: all .5s ease;
    }
    #search-modal{
        opacity: 0;
        pointer-events: none;
        display: flex !important;
        transition: all .5s ease;
    }
</style>

<body <?php body_class('bg-light'); ?>>
    <?php wp_body_open(); ?>
    <div id="wrapper" class="hfeed">
        <?php get_template_part('template-parts/header/nav-main') ?>
        <?php get_template_part('template-parts/header/nav') ?>
        <div style="min-width: 100%; height: 100vh; position: absolute; top: 0; left: 0; z-index: 9999; display: none;" class="container justify-content-center align-items-center" id="search-modal">
            <div class="container">
                <div class="row justify-content-center modals">
                    <div class="search-modal col-md-6 rounded-2 bg-white d-flex flex-column justify-content-center align-items-center p-5" style="height: 200px; position: relative">
                        <i class="bi bi-x fs-2 text-dark" style="position: absolute; top: 0; right: 5px;" id="search-modal-btn"></i>
                        <h1 class="fs-2 fw-semibold mb-3 text-dark">Cari Berita</h1>
                        <?php get_search_form() ?>
                    </div>
                </div>
            </div>
        </div>
        <button id="backToTopBtn" aria-label="Gulir Ke Atas" title="Gulir Ke Atas" class="btn bg-orange rounded-circle shadow-lg" style="position: fixed; right: 2rem; bottom: 0rem; z-index: 999; opacity: 0; transition: all .3s ease-in-out;">
            <i class="bi bi-chevron-double-up text-white fs-4"></i>
        </button>
