<nav class="navbar navbar-expand-lg bg-white">
    <div class="container" style="padding: 0 1.5rem !important;">
        <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="<?php echo home_url(); ?>" class="text-decoration-none text-dark mb-0 d-flex flex-column gap-1 justify-content-center site-logo">
            <?php
            $site_name = get_theme_mod('site-title', get_bloginfo('name'));
            ?>
            <?php if (is_home()): ?>
                <h1 class="fs-4 mb-0 text-orange text-center text-lg-start" style="font-family: 'Lobster Two'; font-optical-sizing: auto; font-weight: 900 !important;"><?php echo $site_name ?></h1>
            <?php else: ?>
                <h2 class="fs-4 mb-0 text-orange text-center text-lg-start" style="font-family: 'Lobster Two'; font-optical-sizing: auto; font-weight: 900 !important;"><?php echo $site_name ?></h2>
            <?php endif; ?>
            <p class="p-0 m-0 fs-6 fw-semibold text-orange text-center text-lg-start d-none d-md-flex" style="font-family: 'Titillium Web';"><?php echo get_bloginfo('description') ?></p>
        </a>
        <button id="search-modal-btn" class="navbar-toggler d-flex d-lg-none align-items-center ms-3 ms-lg-5 border-0 p-0" aria-label="Buka Tab Pencarian Berita">
            <i class="bi bi-search navbar-toggler-icon d-flex align-items-center justify-content-center" style="background-image: none;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <?php
            $menu_id = get_menu_id('page-menu');
            $menu_items = wp_get_nav_menu_items($menu_id);

            if (!empty($menu_items) && is_array($menu_items)):
            ?>
                <?php wp_nav_menu(array(
                    'theme_location' => 'page-menu',
                    'menu_class' => 'navbar-nav ms-auto d-flex flex-column flex-lg-row mt-3 mb-3 mt-lg-0 mb-lg-0 gap-3 gap-lg-5 fs-6',
                    'menu_item_class' => 'nav-item',
                    'link_class' => 'nav-link text-decoration-none text-dark',
                    'container' => 'ul'
                )); ?>
            <?php else: ?>
                <ul class="navbar-nav empty-nav-main ms-auto d-flex flex-column flex-lg-row mt-3 mb-3 mt-lg-0 mb-lg-0 gap-3 gap-lg-5 fs-6">
                    <li>
                        <ul style="list-style: none;" class="d-flex gap-3 align-items-center px-0">
                            <li>
                                <a id="owner-social-media" href="<?= get_theme_mod('instagram_link', 'Default Link') ?>" aria-label="Kunjungi Akun Instagram <?php bloginfo('name') ?>" target="_blank" class="d-flex align-items-center justify-content-center rounded-circle text-white overflow-hidden" style="width: 40px !important; height: 40px; background: #ff0066;">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a id="owner-social-media" href="<?= get_theme_mod('facebook_link', 'Default Link') ?>" aria-label="Kunjungi Halama Facebook <?php bloginfo('name') ?>" target="_blank" class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white overflow-hidden" style="width: 40px !important; height: 40px;">
                                    <i class="bi bi-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a id="owner-social-media" href="<?= get_theme_mod('youtube_link', 'Default Link') ?>" aria-label="Kunjungi Kanal YouTube <?php bloginfo('name') ?>" target="_blank" class="d-flex align-items-center justify-content-center rounded-circle bg-danger text-white overflow-hidden" style="width: 40px !important; height: 40px;">
                                    <i class="bi bi-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a id="owner-social-media" href="<?= get_theme_mod('twitter_link', 'Default Link') ?>" aria-label="Kunjungi Akun X <?php bloginfo('name') ?>" target="_blank" class="d-flex align-items-center justify-content-center rounded-circle bg-dark text-white overflow-hidden" style="width: 40px !important; height: 40px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="d-flex align-items-center">
                        <button id="toggleMode" style="border: none; outline: none; background: transparent; position: relative;" class="d-flex align-items-center justify-content-center" type="button" aria-label="Ganti Mode Terang Atau Gelap">
                            <i id="lightMode" class="bi bi-moon-fill text-dark fs-5" style="opacity: 0; transition: all .3s ease;"></i>
                            <i id="darkMode" class="bi bi-brightness-high-fill text-warning fs-5" style="position: absolute; top: 50%; left: 0; transform: translate(0px, -50%); opacity: 0; transition: all .3s ease;"></i>
                        </button>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
        <button id="search-modal-btn" class="navbar-toggler d-none d-lg-flex align-items-center ms-3 ms-lg-5 border-0 p-0" aria-label="Buka Tab Pencarian Berita">
            <i class="bi bi-search navbar-toggler-icon d-flex align-items-center justify-content-center" style="background-image: none;"></i>
        </button>
    </div>
</nav>