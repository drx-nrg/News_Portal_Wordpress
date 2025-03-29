<nav class="navbar navbar-expand-lg bg-white">
    <div class="container" style="padding: 0 1.5rem !important;">
        <a href="<?php echo home_url(); ?>" class="text-decoration-none text-dark mb-0">
            <h1 class="fs-4 mb-0" style="font-family: 'Lora';"><?= get_theme_mod('site-title', get_bloginfo('name')) ?></h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <?php 
                $menu_id = get_menu_id('page-menu');
                $menu_items = wp_get_nav_menu_items($menu_id);

                if( !empty($menu_items) && is_array($menu_items) ):
            ?>
                <?php wp_nav_menu(array(
                    'theme_location' => 'page-menu',
                    'menu_class' => 'navbar-nav ms-auto d-flex flex-column flex-lg-row mt-3 mb-3 mt-lg-0 mb-lg-0 gap-3 gap-lg-5 fs-6',
                    'menu_item_class' => 'nav-item',
                    'link_class' => 'nav-link text-decoration-none text-dark',
                    'container' => 'ul'
                )); ?>
            <?php else: ?>
                <ul class="navbar-nav empty-nav-main ms-auto d-flex flex-column flex-lg-row mt-3 mb-3 mt-lg-0 mb-lg-0 gap-3 gap-lg-5 fs-6"></ul>
            <?php endif; ?>
        </div>
    </div>
</nav>