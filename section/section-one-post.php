<div class="row">
    <?php
        $index = 0;
        if ($args["category_post_query"]->have_posts()) : while ($args["category_post_query"]->have_posts()) : $args["category_post_query"]->the_post()
    ?>
        <?php get_template_part('card', 'head'); ?>
    <?php endwhile;
    endif; ?>
</div>