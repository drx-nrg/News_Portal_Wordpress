<nav class="navbar navbar-expand-lg bg-white">
    <div class="container d-flex justify-content-between align-items-center py-1 fw-bold fs-5">
        <a href="<?php echo home_url(); ?>" class="text-decoration-none text-dark mb-0">
            <h1 class="fs-4 mb-0" style="font-family: 'Lora';"><?= get_theme_mod('site-title', 'KabarAgribisnis.com') ?></h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <?php wp_nav_menu(array(
                'theme_location' => 'page-menu',
                'menu_class' => 'navbar-nav ms-auto d-flex flex-column flex-lg-row mt-3 mb-3 mt-lg-0 mb-lg-0 gap-3 gap-lg-5 fs-6',
                'menu_item_class' => 'nav-item',
                'link_class' => 'nav-link text-decoration-none text-dark',
                'container' => 'ul'
            )) ?>
        </div>
    </div>
</nav>