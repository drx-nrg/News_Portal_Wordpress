<nav class="main-menu py-1 <?= get_theme_mod('is_active_slider', true) && get_theme_mod('is_show_headline', true) ? 'mb-5' : 'mb-3' ?> bg-orange shadow-sm">
    <style>
        .scrollbar-nav::-webkit-scrollbar{
            display: none;
        }
    </style>
    <div class="container scrollbar-nav overflow-x-auto" role="navigation" style="padding: 0 1.5rem !important;">
        <?php
        $menu_id = get_menu_id('main-menu');
        $menu_items = wp_get_nav_menu_items($menu_id);

        // wp_nav_menu(array(
        //     'theme_location' => 'main-menu',
        //     'menu_class' => 'navbar-nav d-flex flex-row justify-content-between gap-5',
        //     'menu_item_class' => 'nav-item active',
        //     'link_class' => 'text-decoration-none text-white',
        //     'container' => 'ul'
        // ));
        
        if( !empty($menu_items) && is_array($menu_items) ):
        ?>
            <ul class="navbar-nav d-flex flex-row gap-5" style="min-width: max-content;">
                <?php foreach( $menu_items as $menu_item ): ?>
                    <?php if( !$menu_item->menu_item_parent ): ?>
                        <?php  
                            $child_menu_items = get_child_menu_items($menu_items, $menu_item->ID);
                            $has_children = !empty($child_menu_items) && is_array($child_menu_items);    
                            
                            if( !$has_children ):
                        ?>
                            <li class="nav-item active d-block" style="cursor: pointer;">
                                <a class="nav-link active text-decoration-none fs-6 fw-semibold" aria-current="page" href="<?= esc_url($menu_item->url) ?>" target="<?= esc_attr($menu_item->target) ?>" ><?= esc_html($menu_item->title) ?></a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item d-none active has-sub-menu d-md-flex flex-row align-items-center gap-2" style="cursor: pointer;">
                                <a class="nav-link active text-decoration-none text-white fs-6 fw-semibold" aria-current="page" href="<?= esc_url($menu_item->url) ?>" target="<?= esc_attr($menu_item->target) ?>" ><?= esc_html($menu_item->title) ?></a>
                                <svg class="text-white fs-4" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M17 9.17a1 1 0 0 0-1.41 0L12 12.71L8.46 9.17a1 1 0 0 0-1.41 0a1 1 0 0 0 0 1.42l4.24 4.24a1 1 0 0 0 1.42 0L17 10.59a1 1 0 0 0 0-1.42"/></svg>
                                <ul class="sub-menu p-3 bg-white shadow-sm border-4 border-bottom border-success" style="width: max-content;">
                                    <?php  foreach( $child_menu_items as $item ): ?>
                                        <li class="nav-item d-none d-md-block">
                                            <a class="nav-link active text-decoration-none text-dark fs-6 fw-semibold" aria-current="page" href="<?= esc_url($item->url) ?>" target="<?= esc_attr($item->target) ?>" ><?= esc_html($item->title) ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                <li class="d-flex flex-row align-items-center ms-lg-auto">
                    <button aria-label="Show sidebar menu" id="toggle-sidebar-btn" style="background-color: transparent; border: none; outline: none;" class="d-flex flex-row align-items-center gap-3">
                        <i class="bi bi-list text-white fs-4 mb-0"></i>
                    </button>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>