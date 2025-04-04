<?php if (is_active_sidebar('primary-widget-area')) : ?>
    <aside id="sidebar" class="<?= is_single() ? "mt-3 mt-lg-0" : "mt-0" ?>" itemscope itemtype="https://schema.org/WPSideBar">
        <div id="primary" class="widget-area">
            <ul class="xoxo">
                <?php dynamic_sidebar('primary-widget-area'); ?>
            </ul>
        </div>
    </aside>
<?php endif; ?>