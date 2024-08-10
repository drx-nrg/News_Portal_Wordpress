<div class="row">
    <?php
        $index = 0;
        if ($args["category_post_query"]->have_posts()) : while ($args["category_post_query"]->have_posts()) : $args["category_post_query"]->the_post()
    ?>
            <?php if ($index == 0) : ?>
                <div class="col-md-6">
                    <div class="row">
                        <?php get_template_part('card', 'head'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php $index++; ?>
    <?php endwhile;
    endif; ?>
    <div class="col-md-6 d-flex flex-column <?= count($args["category_post_query"]->posts) == 5 ? "justify-content-between" : "" ?>">
        <?php
        $index = 0;
        if ($args["category_post_query"]->have_posts()) : while ($args["category_post_query"]->have_posts()) : $args["category_post_query"]->the_post()
        ?>
                <?php if ($index != 0) : ?>
                    <?php get_template_part('card', 'secondary', array('mb' => count($args["category_post_query"]->posts) == 5 ? false : true)); ?>
                <?php endif; ?>
                <?php $index++; ?>
        <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
</div>