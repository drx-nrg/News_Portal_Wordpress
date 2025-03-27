<div class="row px-2">
    <?php
    $index = 0;
    if ($args["category_post_query"]->have_posts()) : while ($args["category_post_query"]->have_posts()) : $args["category_post_query"]->the_post()
    ?>
            <div class="col-lg-6 px-3">
                <div class="row">
                    <?php get_template_part('card', 'head'); ?>
                </div>
            </div>
    <?php
            $index++;
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
</div>