<div class="row">
    <?php
    $index = 0;
    if ($args["category_post_query"]->have_posts()) : while ($args["category_post_query"]->have_posts()) : $args["category_post_query"]->the_post()
    ?>
            <div class="col-md-6">
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