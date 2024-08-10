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
    <div class="row mb-3 oldest-swiper-container overflow-hidden">
        <?php
        $sticky = get_option('sticky_posts');
        $posts = new WP_Query(array(
            "post_type" => 'post',
            'post__not_in' => $sticky,
            'orderby' => 'date',
            'order' => 'ASC'
        ));

        if ($posts->have_posts()) :
        ?>
            <div class="swiper-wrapper">
                <?php while ($posts->have_posts()) : $posts->the_post() ?>
                    <div class="col-md-4 swiper-slide">
                        <div class="row">
                            <?php get_template_part('card', 'circle') ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
                ?>
            </div>
        <?php endif; ?>
    </div>
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
                            <div style="width: 100px; height: 5px; background-color: #1b995e; border-radius: 2px;" class="mb-3"></div>
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
                            <h1 class="fs-3 fw-semibold mb-3 d-flex align-items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire fs-1" viewBox="0 0 16 16" style="transform: scale(1.4);">
                                    <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />
                                </svg> Topik Hangat</h1>
                            <div style="width: 100px; height: 5px; background-color: #1b995e; border-radius: 2px;" class="mb-3"></div>
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'meta_query' => array(
                                    array(
                                        'key' => 'is_warm_topic',
                                        'value' => '1',
                                        'compare' => '='
                                    )
                                ),
                                'post__not_in' => $sticky,
                                'orderby' => 'date',
                                'order' => 'DESC',
                            );

                            $warm_topic_query = new WP_Query($args);

                            if ($warm_topic_query->have_posts()) : while ($warm_topic_query->have_posts()) : $warm_topic_query->the_post()
                            ?>
                                    <?php get_template_part('card', 'secondary', array('mb' => true)) ?>
                            <?php endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <h1 class="fw-semibold fs-2 mb-3"><i class="bi bi-newspaper"></i> Berita Terbaru</h1>
                    <div style="width: 100px; height: 5px; background-color: #1b995e; border-radius: 2px;" class="mb-3"></div>
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
                <div class="row mt-3">
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
                        <?php
                        $index = 0;
                        $category_post_query = new WP_Query(array(
                            "post_type" => 'post',
                            "post_per_page" => 5,
                            "category_name" => $category->slug
                        ));

                        $count_map = ["one", "two", "three", "four", "five"];
                        if ($category_post_query->have_posts()) {
                            get_template_part('section/section', $count_map[count($category_post_query->posts) - 1] . '-post', array('category_post_query' => $category_post_query));
                        }
                        ?>
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