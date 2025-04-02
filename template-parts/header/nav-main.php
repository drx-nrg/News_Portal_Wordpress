<nav class="navbar navbar-expand-lg bg-white">
    <div class="container" style="padding: 0 1.5rem !important;">
        <a href="<?php echo home_url(); ?>" class="text-decoration-none text-dark mb-0 d-flex flex-column gap-1 justify-content-center">
            <?php if(is_home()): ?>
                <h1 class="fs-4 mb-0" style="font-family: 'Lora';"><?= get_theme_mod('site-title', get_bloginfo('name')) ?></h1>
            <?php else: ?>
                <h2 class="fs-4 mb-0" style="font-family: 'Lora';"><?= get_theme_mod('site-title', get_bloginfo('name')) ?></h2>
            <?php endif; ?>
            <p class="p-0 m-0 fs-6" style="font-family: 'Lora';"><?php echo get_bloginfo('description') ?></p>
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
                <ul class="navbar-nav empty-nav-main ms-auto d-flex flex-column flex-lg-row mt-3 mb-3 mt-lg-0 mb-lg-0 gap-3 gap-lg-5 fs-6">
                    <li>
                        <style>
                            #owner-social-media{
                                transition: all .3s ease-in-out;
                            }
                            #owner-social-media:hover{
                                opacity: 0.8;
                            }
                        </style>
                        <ul style="list-style: none;" class="d-flex gap-3 align-items-center px-0">
                            <li> 
                                <a id="owner-social-media" href="<?= get_theme_mod('instagram_link', 'Default Link') ?>" aria-label="Kunjungi Akun Instagram <?php bloginfo('name') ?>" target="_blank" class="d-flex align-items-center justify-content-center rounded-circle text-white" style="width: 40px !important; height: 40px; background: #ff0066;"> 
                                    <i class="bi bi-instagram"></i> 
                                </a>
                            </li>
                            <li> 
                                <a id="owner-social-media" href="<?= get_theme_mod('facebook_link', 'Default Link') ?>" aria-label="Kunjungi Halama Facebook <?php bloginfo('name') ?>" target="_blank" class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white" style="width: 40px !important; height: 40px;"> 
                                    <i class="bi bi-facebook"></i> 
                                </a>
                            </li>
                            <li> 
                                <a id="owner-social-media" href="<?= get_theme_mod('youtube_link', 'Default Link') ?>" aria-label="Kunjungi Kanal YouTube <?php bloginfo('name') ?>" target="_blank" class="d-flex align-items-center justify-content-center rounded-circle bg-danger text-white" style="width: 40px !important; height: 40px;"> 
                                    <i class="bi bi-youtube"></i> 
                                </a>
                            </li>
                            <li> 
                                <a id="owner-social-media" href="<?= get_theme_mod('twitter_link', 'Default Link') ?>" aria-label="Kunjungi Akun Twitter <?php bloginfo('name') ?>" target="_blank" class="d-flex align-items-center justify-content-center rounded-circle bg-dark text-white" style="width: 40px !important; height: 40px;"> 
                                    <i class="bi bi-twitter"></i> 
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>