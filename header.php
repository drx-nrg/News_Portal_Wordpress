<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Inter:wght@100..900&family=Lora:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <?php wp_head(); ?>
</head>
<style>
    body {
        font-family: 'Figtree';
    }

    #container {
        width: 100%;
        height: fit-content;
        padding: 0 5%;
        box-sizing: border-box;
    }

    .title {
        font-weight: bolder;
    }

    .navbar-custom {
        background-color: #000;
    }

    .navbar-custom .navbar-nav .nav-link {
        color: #fff;
    }

    .navbar-custom .navbar-nav .nav-link:hover {
        color: #ddd;
    }

    .menu-item a {
        text-decoration: none;
        color: white;
        font-weight: 600;
    }

    .menu-item {
        cursor: pointer;
    }

    .menu-item-has-children {
        display: flex;
        align-items: center;
        gap: 5px;
        position: relative;
    }

    .menu-item-has-children .sub-menu {
        position: absolute;
        top: 0px;
        left: 50px;
        list-style: none;
        list-style-position: inside;
        background-color: #212529;
        padding: 10px 20px;
        border-radius: 8px;
        opacity: 0;
        pointer-events: none;
        transition: .3s ease all;
    }

    .sub-menu-active {
        top: 30px !important;
        pointer-events: auto !important;
        opacity: 1 !important;
    }

    .widget-title {
        font-size: 1.2rem;
    }

    .xoxo {
        display: flex;
        flex-direction: column;
        gap: 1.6rem;
        list-style: none !important;
        font-family: 'Poppins' sans-serif;
        padding: 0;
    }
    #sidebar{
        position: sticky;
        top: 0;
    }
    #sidebar .widget-container {
        padding: 20px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 4px 0px;
        list-style: none !important;
        font-family: 'Poppins' !important;
    }

    #sidebar .widget-container a {
        color: black;
        text-decoration: none;
        font-weight: 700;
        display: block;
        margin-bottom: 10px;
        opacity: 0.7;
    }

    #sidebar .widget-container li {
        list-style: none;
        list-style-position: outside;
    }

    .comment-author .avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }

    .comment-body {
        display: flex;
        flex-direction: column;
    }

    .comment-author-name {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .comment-date {
        font-size: 0.9em;
        color: #888;
    }

    .comment-content {
        margin-top: 10px;
    }

    .wp-post-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .5s ease all;
        margin-bottom: 0 !important;
        border-radius: 15px;
    }

    .site-footer {
        background-color: #333;
        color: #fff;
    }

    .footer-widget {
        padding: 20px;
        margin-bottom: 1.6rem;
        border-radius: 5px;
        font-family: 'Poppins', sans-serif;
    }

    .footer-widget-title {
        font-weight: 700;
        margin-bottom: 10px;
        color: #fff;
    }

    .comment-form {
        font-family: 'Inter', sans-serif;
    }

    .comment-form .form-group {
        margin-bottom: 1.5rem;
    }

    .comment-form .form-label {
        font-weight: 700;
    }

    .comment-form .form-control {
        font-size: 1rem;
        padding: 0.75rem;
        border-radius: 0.25rem;
    }

    .comment-form .btn {
        font-size: 1rem;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
    }

    .navigation-top {
        width: 100%;
    }

    .page-links {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .page-number {
        display: block;
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        border-radius: 50%;
        background-color: #000;
        color: white;
        text-decoration: none;
    }

    .post-page-numbers {
        text-decoration: none;
    }

    .current .page-number {
        background-color: #198754 !important;
        color: white !important;
    }

    .card {
        border-radius: 1rem;
        overflow: hidden;
        padding-bottom: 0 !important;
    }

    .card:hover .wp-post-image {
        transform: scale(1.2);
    }

    .card:hover .card-img-overlay {
        background: rgba(0, 0, 0, 0.1);
    }

    .card-img-overlay {
        width: 100%;
        height: 102%;
        object-fit: cover;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.5);
        color: #fff;
        padding: 1rem;
        transition: .5s ease all;
        margin-bottom: 0 !important;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-text {
        margin-bottom: 1rem;
    }

    .card a.btn {
        border-radius: 50px;
        padding: 0.5rem 1rem;
    }

    .category-title {
        position: relative;
        margin-bottom: 0;
    }

    .green-line {
        display: block;
        width: 100%;
        height: 4px;
        background-color: #1b995e;
        opacity: 1 !important;
        margin: 0 !important;
        border: none;
        margin-top: -5px;
        margin-bottom: 10px !important;
    }

    .post-title:hover,
    .card-title:hover {
        text-decoration: underline !important;
    }

    .social-icon {
        display: block;
        color: black;
        transition: .3s ease all;
    }

    .social-icon:hover {
        transform: translate(0, -5px);
    }

    a[rel="prev"],
    a[rel="next"] {
        text-decoration: none;
        font-size: 1.2rem;
    }

    a[rel='author external'] {
        text-decoration: none;
        color: black;
    }

    @keyframes moveSide {
        0% {
            transform: translate(0, 0px);
        }

        50% {
            transform: translate(10px, 0px);
        }

        100% {
            transform: translate(0px, 0px);
        }
    }

    .more-link:hover {
        filter: brightness(120%);
        animation: moveSide .5s ease infinite;
    }

    /* .menu-item-has-children .sub-menu{
        display: none;
    } */
    .navbar-container {
        max-width: 100%;
        overflow-x: scroll;
    }

    .navbar-container::-webkit-scrollbar {
        display: none;
    }

    .navbar-nav {
        min-width: max-content;
    }

    .bg-success {
        background-color: #1b995e !important;
    }

    .fixed-header {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 999;
    }

    .relative {
        position: relative;
    }

    /* Style scrollbar track (jalur) */
    ::-webkit-scrollbar {
        width: 12px;
        /* Lebar scrollbar */
    }

    /* Style scrollbar thumb (kursor/drag) */
    ::-webkit-scrollbar-thumb {
        background-color: #1b995e;
        /* Warna scrollbar */
        border-radius: 10px;
        /* Membuat ujung scrollbar melengkung */
    }

    /* Style ketika hover */
    ::-webkit-scrollbar-thumb:hover {
        background-color: #198754;
        /* Warna scrollbar saat di-hover */
    }

    /* Style scrollbar track */
    ::-webkit-scrollbar-track {
        background-color: #f1f1f1;
        /* Warna background jalur scrollbar */
    }
    .post-content a{
        text-decoration: none;
    }
    .latest-swiper-container .swiper-slide{
        height: 200px !important;
    }
    .top-bar{
        position: fixed;
    }
    .wp-block-tag-cloud{
        display: flex;
        flex-wrap: wrap;
    }
    .tag-cloud-link{
        display: block;
        max-width: fit-content;
        padding: 10px;
        background-color: #198754 !important;
        border-radius: 4px;
        font-weight: lighter;
        color: white !important;
        opacity: 1;
        text-decoration: none;
        margin: 0;
    }
    .tag-cloud-link::before{
        content: "#";
    }
</style>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="wrapper" class="hfeed">
        <!-- <header id="header" role="banner">
            <div id="branding">
                <div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                    <?php
                    if (is_front_page() || is_home() || is_front_page() && is_home()) {
                        echo '<h1>';
                    }
                    echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" rel="home" itemprop="url"><span itemprop="name">' . esc_html(get_bloginfo('name')) . '</span></a>';
                    if (is_front_page() || is_home() || is_front_page() && is_home()) {
                        echo '</h1>';
                    }
                    ?>
                </div>
                <div id="site-description" <?php if (!is_single()) {
                                                echo ' itemprop="description"';
                                            } ?>><?php bloginfo('description'); ?></div>
            </div>
            <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                <?php wp_nav_menu(array('theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>')); ?>
                <div id="search"><?php get_search_form(); ?></div>
            </nav>
        </header> -->
        <div id="container" class="navigation-top bg-white shadow-sm mb-2">
            <div class="container-fluid d-flex justify-content-between align-items-center py-3 fw-bold fs-5">
                <p class="date mb-0">
                    <?php
                    $formatted_date = date('l, j F Y');
                    echo $formatted_date;
                    ?>
                </p>
                <div class="follow-us d-flex align-items-center">
                    <p class="mb-0">Follow Us</p>
                    <ul class="d-flex gap-3 align-items-center mb-0" style="list-style: none;">
                        <li><a class="social-icon" href="https://instagram.com"><i class="bi bi-instagram"></i></a></li>
                        <li><a class="social-icon" href="https://facebook.com"><i class="bi bi-facebook"></i></a></li>
                        <li><a class="social-icon" href="https://youtube.com"><i class="bi bi-youtube"></i></a></li>
                        <li><a class="social-icon" href="https://x.com"><i class="bi bi-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="container">
            <main id="content" role="main">
                <header class="mb-5 relative">
                    <div class="container-fluid py-3" id="header-logo-search">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-6 text-left">
                                <a href="<?php echo home_url(); ?>" class="text-decoration-none text-dark">
                                    <h1 class="fw-bolder fs-2 fst-italic" style="font-family: 'Lora';"><?= implode('', capitalizeSecondWord(get_bloginfo('name'))) ?></h1>
                                    <p><?php bloginfo('description') ?></p>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <form role="search" method="get" action="http://localhost/wordpress/" class="wp-block-search__button-outside wp-block-search__text-button wp-block-search">
                                    <div class="wp-block-search__inside-wrapper"><input class="wp-block-search__input" id="wp-block-search__input-1" placeholder="Enter Search" value="" type="search" name="s" required /><button aria-label="Search" class="wp-block-search__button wp-element-button" type="submit"><i class="bi bi-search"></i></button></div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        const headerLogo = document.querySelector('#header-logo-search');

                        window.onscroll = () => {
                            console.log(headerLogo.getBoundingClientRect().top);
                        }
                    </script>

                    <nav class="navbar navbar-expand-md bg-success rounded-3 p-3" st>
                        <div class="container-fluid">
                            <div class="navbar-container p-0" id="main-menu">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'main-menu',
                                    'menu_class' => 'navbar-nav d-flex flex-row gap-3 gap-md-5',
                                    'menu_item_class' => 'nav-item active',
                                    'link_class' => 'text-decoration-none text-white',
                                    'container' => 'ul'
                                ));
                                ?>
                            </div>
                        </div>
                    </nav>
                </header>