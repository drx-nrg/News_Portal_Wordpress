<?php if (is_active_sidebar('primary-widget-area')) : ?>
    <aside id="sidebar" class="<?= is_single() ? "mt-3" : "mt-0" ?>">
        <div id="primary" class="widget-area">
            <ul class="xoxo">
                <?php dynamic_sidebar('primary-widget-area'); ?>
            </ul>
        </div>
    </aside>
<?php endif; ?>