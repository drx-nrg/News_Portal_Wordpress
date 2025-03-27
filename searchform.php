<?php $args['is_white'] = $args['is_white'] ?? false; ?>
<form role="search" method="get" class="search-form d-flex gap-2 align-items-center" action="<?= esc_url(home_url('/')) ?>">
    <input type="search" class="search-field <?= $args['is_white'] ? 'bg-white' : '' ?>" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'mytheme'); ?>" value="<?= get_search_query(); ?>" name="s" />
    <button type="submit" class="search-submit btn bg-orange"><i class="bi bi-search"></i></button>
</form>