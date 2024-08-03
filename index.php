<?php
get_header(); ?>
<?php
$categories = get_categories(array(
    'number' => 0,
    'hide_empty' => false
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
    <?php
    $categories = get_categories(array(
        'exclude' => '1'
    ));
    ?>
    <div class="row">
        <div class="col-md-8">
            <div class="row latest-swiper-container overflow-hidden mb-4">
                <?php
                $sticky = get_option('sticky_posts');
                $latest_news = new WP_Query(array(
                    'post_type' => 'post',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => -1,
                    'post__not_in' => $sticky,
                    "category__not_in" => array(1)
                ));
                if ($latest_news->have_posts()) :
                ?>
                    <div class="swiper-wrapper">
                        <?php while ($latest_news->have_posts()) : $latest_news->the_post() ?>
                            <?php get_template_part('entry'); ?>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'post__in'  => $sticky,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                $headline_news = new WP_Query($args);
                if ($headline_news->have_posts()) :
                ?>
                    <div class="swiper-container col-md-12 overflow-hidden rounded-4">
                        <div class="swiper-wrapper">
                            <?php while ($headline_news->have_posts()) : $headline_news->the_post(); ?>
                                <?php get_template_part('entry', 'large');  ?>
                            <?php endwhile; 
                                wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php foreach ($categories as $category) : ?>
                <?php $random_index = random_int(0, 3); ?>
                <div class="row mb-3 mt-5">
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
                        $category_post_query = new WP_Query(array(
                            "post_type" => 'post',
                            "post_per_page" => 5,
                            "category_name" => $category->slug
                        ));

                        if ($category_post_query->have_posts()) : while ($category_post_query->have_posts()) : $category_post_query->the_post()
                        ?>
                                <?php get_template_part('entry', 'summary') ?>
                        <?php endwhile;
                        endif; ?>
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