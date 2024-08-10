<div class="row">
    <?php 
        $index = 0;
        if($args["category_post_query"]->have_posts()): while($args["category_post_query"]->have_posts()): $args["category_post_query"]->the_post() 
    ?>
        <?php if(in_array($index, [0, 1])): ?>
            <div class="col-md-6">
                <div class="row">
                    <?php get_template_part('card', 'head'); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php 
        $index++;
        endwhile;
        wp_reset_postdata();
        endif;
    ?>
    <?php 
        $index = 0;
        if($args["category_post_query"]->have_posts()): while($args["category_post_query"]->have_posts()): $args["category_post_query"]->the_post() 
    ?>
        <?php if(in_array($index, [2, 3])): ?>
            <div class="col-md-6 mt-3">
                <?php get_template_part('card', 'secondary', array("mb" => true)); ?>
            </div>
        <?php endif; ?>
    <?php 
        $index++;
        endwhile;
        wp_reset_postdata();
        endif;
    ?>
</div>