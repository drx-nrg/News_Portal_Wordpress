<div class="row">
    <?php
    $index = 0;
    if ($args["category_post_query"]->have_posts()) : while ($args["category_post_query"]->have_posts()) : $args["category_post_query"]->the_post()
    ?>
            <?php if ($index == 0) : ?>
                <?php get_template_part('card', 'head'); ?>
            <?php endif; ?>
            <?php $index++; ?>
    <?php endwhile;
    endif; ?>
    <div class="col-md-12 mt-3">
        <div class="row">
            <?php
            $index = 0;
            if ($args["category_post_query"]->have_posts()) : while ($args["category_post_query"]->have_posts()) : $args["category_post_query"]->the_post()
            ?>
                    <?php if ($index != 0) : ?>
                        <?php get_template_part('entry', 'summary') ?>
                    <?php endif; ?>
                    <?php $index++; ?>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>
</div>