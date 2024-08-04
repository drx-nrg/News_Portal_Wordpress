<?php
get_header(); ?>
<?php
$categories = get_categories(array(
    'exclude' => '1'
));
$colors = ['bg-success', 'bg-danger', 'bg-warning', 'bg-primary', 'bg-dark', 'bg-info'];

$categories_colors = [];

$idx = 0;
foreach ($categories as $category) {
    if ($idx <= count($colors) - 1) {
        $categories_colors[$category->name] = $colors[$idx];
        $idx++;
    } else {
        $categories_colors[$category->name] = $colors[3];
    }
}
?>
<div class="container-fluid">
    <div class="row">
        <?php $index = 0; ?>
        <?php
        $sticky = get_option('sticky_posts');
        $args = array(
            'post_type' => 'post',
            'post__in' => $sticky,
            'orderby' => 'date',
            'order' => 'DESC',
        );

        $popular_posts_query = new WP_Query($args);
        ?>
        <?php if ($popular_posts_query->have_posts()) : while ($popular_posts_query->have_posts()) : $popular_posts_query->the_post(); ?>
                <?php if ($index == 0) : ?>
                    <?php get_template_part('entry', 'large') ?>
                    <?php $index++ ?>
                <?php endif; ?>
        <?php endwhile;
        endif; ?>
        <?php $index = 0 ?>
        <div class="col-md-6 d-flex flex-column">
            <div class="row">
                <?php if ($popular_posts_query->have_posts()) : while ($popular_posts_query->have_posts()) : $popular_posts_query->the_post(); ?>
                        <?php if ($index != 0 && $index < 3) : ?>
                            <?php get_template_part('entry') ?>
                        <?php endif; ?>
                        <?php $index++ ?>
                <?php endwhile;
                endif; ?>
            </div>
            <?php $index = 0 ?>
            <div class="row">
                <?php if ($popular_posts_query->have_posts()) : while ($popular_posts_query->have_posts()) : $popular_posts_query->the_post(); ?>
                        <?php if ($index > 2) : ?>
                            <?php get_template_part('entry') ?>
                        <?php endif; ?>
                        <?php $index++ ?>
                <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="fs-3 fw-semibold mb-3"><i class="bi bi-bookmark"></i> Pilihan Editor</h1>
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'meta_query' => array(
                                    array(
                                        'key' => 'is_editors_pick',
                                        'value' => '1',
                                        'compare' => '='
                                    )
                                ),
                                'post__not_in' => $sticky,
                                'orderby' => 'date',
                                'order' => 'DESC',
                            );

                            $editors_pick_query = new WP_Query($args);

                            if ($editors_pick_query->have_posts()) : while ($editors_pick_query->have_posts()) : $editors_pick_query->the_post()
                            ?>
                                    <?php get_template_part('card', 'secondary', array('mb' => true)) ?>
                            <?php endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <h1 class="fw-semibold fs-2"><i class="bi bi-newspaper"></i> Berita Terbaru</h1>
                    <p class="text-secondary fs-5">Berita baru dan terpercaya dari <?= get_bloginfo('name') ?></p>
                </div>
                <div class="col-md-12">
                    <?php
                    $latest_news = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'post__not_in' => $sticky,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));

                    if ($latest_news->have_posts()) : while ($latest_news->have_posts()) : $latest_news->the_post()
                    ?>
                            <?php get_template_part('entry', 'summary'); ?>
                    <?php endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
            <?php foreach ($categories as $category) : ?>
                <?php $random_index = random_int(0, 3); ?>
                <div class="row mt-3 mb-3">
                    <div class="col-md-12">
                        <div class="row d-flex align-items-center mb-3">
                            <div class="col-md-8">
                                <h1 class="fs-2 fw-semibold"><?= $category->name ?></h1>
                                <p class="text-secondary fs-5"><?= $category->description ?></p>
                            </div>
                            <div class="col-md-4 d-flex justify-content-start justify-content-md-end align-items-center">
                                <a href="<?= get_category_link($category) ?>" class="text-success text-decoration-none fw-semibold fs-5 d-flex gap-2 align-items-center mb-0 more-link">Selengkapnya <i class="bi bi-arrow-right d-block m-0 p-0"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            $index = 0;
                            $category_post_query = new WP_Query(array(
                                "post_type" => 'post',
                                "post_per_page" => 5,
                                "category_name" => $category->slug
                            ));

                            if ($category_post_query->have_posts()) : while ($category_post_query->have_posts()) : $category_post_query->the_post()
                            ?>
                                    <?php if ($index == 0) : ?>
                                        <?php get_template_part('card', 'head'); ?>
                                    <?php endif; ?>
                                    <?php $index++; ?>
                            <?php endwhile;
                            endif; ?>
                            <div class="col-md-6 d-flex flex-column <?= count($category_post_query->posts) == 5 ? "justify-content-between" : "" ?>">
                                <?php
                                $index = 0;
                                if ($category_post_query->have_posts()) : while ($category_post_query->have_posts()) : $category_post_query->the_post()
                                ?>
                                        <?php if ($index != 0) : ?>
                                            <?php get_template_part('card', 'secondary', array('mb' => count($category_post_query->posts) == 5 ? false : true)); ?>
                                        <?php endif; ?>
                                        <?php $index++; ?>
                                <?php endwhile;
                                    wp_reset_postdata();
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-4">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>
<?php get_template_part('nav', 'below');
get_footer(); ?>