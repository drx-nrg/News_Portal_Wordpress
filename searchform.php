<?php $args['is_white'] = $args['is_white'] ?? false; ?>
<form role="search" method="get" class="search-form d-flex gap-2 align-items-center" action="<?= esc_url(home_url('/')) ?>" itemscope itemtype="https://schema.org/SearchAction" itemprop="potentialAction">
    <meta itemprop="target" content="<?php echo esc_url(home_url('/?s={search_term_string}')); ?>">
    <input type="search" class="search-field form-control <?= $args['is_white'] ? 'bg-white' : '' ?> text-dark" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'newslify'); ?>" value="<?= get_search_query(); ?>" name="s" itemprop="query-input" />
    <button type="submit" class="search-submit btn bg-orange"><i class="bi bi-search text-white"></i></button>
</form>