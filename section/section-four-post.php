<div class="row px-2">
    <?php 
        $index = 0;
        if($args["category_post_query"]->have_posts()): while($args["category_post_query"]->have_posts()): $args["category_post_query"]->the_post() 
    ?>
        <?php if(in_array($index, [0, 1])): ?>
            <div class="col-md-6 px-3 border-bottom">
                <div class="row">
                    <?php get_template_part('card', 'head', [
                        'border_bottom' => false
                    ]); ?>
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
            <div class="col-lg-6 px-0 px-lg-3 mt-3">
                <?php get_template_part('card', 'secondary', array("mb" => false)); ?>
            </div>
        <?php endif; ?>
    <?php 
        $index++;
        endwhile;
        wp_reset_postdata();
        endif;
    ?>
</div>