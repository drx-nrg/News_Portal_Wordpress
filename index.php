<?php
get_header(); ?>

<?php
$categories = get_categories([
    "hide_empty" => false,
    "number" => 10
]);
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

<main id="primary" class="site-main" itemscope itemtype="http://schema.org/Website">
    <div class="container mt-4" style="padding: 0 1.5rem !important;">
        <!-- Bagian ini berisi post-post berdasarkan waktu terlama -->
        <section id="oldest-posts" class="row mb-3 oldest-swiper-container overflow-hidden" aria-labelledby="oldest-posts-heading">
            <h2 id="oldest-posts-heading" class="visually-hidden">Post Berdasarkan Waktu Terlama</h2>
            <?php
            $sticky = get_option('sticky_posts');
            $posts = new WP_Query(array(
                "post_type" => 'post',
                'post__not_in' => $sticky,
                'orderby' => 'date',
                'order' => 'ASC'
            ));

            if ($posts->have_posts() && get_theme_mod('is_active_slider', true)) :
            ?>
                <div class="swiper-wrapper" role="list" aria-live="polite">
                    <?php while ($posts->have_posts()) : $posts->the_post() ?>
                        <article class="col-md-4 swiper-slide" itemscope itemtype="http://schema.org/BlogPosting">
                            <div class="row">
                                <?php get_template_part('card', 'circle') ?>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php endif; ?>
        </section>

        <!-- Bagian ini berisi post headline yang dipilih editor -->
        <?php
        $headline_ids = [
            get_theme_mod('headline_post_1'),
            get_theme_mod('headline_post_2'),
            get_theme_mod('headline_post_3'),
            get_theme_mod('headline_post_4'),
            get_theme_mod('headline_post_5'),
        ];
        $args = array(
            'post_type' => 'post',
            'post__in' => $headline_ids,
            'orderby' => 'date',
            'order' => 'DESC',
        );

        $popular_posts_query = new WP_Query($args);
        if ($popular_posts_query->have_posts() && get_theme_mod('is_show_headline', true)):
        ?>
            <section id="headline-posts" class="row" aria-labelledby="headline-posts-heading">
                <h2 id="headline-posts-heading" class="visually-hidden screen-reader-text">Post Headline yang Dipilih Editor</h2>
                <?php $index = 0; ?>
                <?php
                ?>
                <?php foreach ($headline_ids as $headline_id): ?>
                    <?php
                    $post = get_post($headline_id);
                    setup_postdata($post);
                    ?>
                    <?php if ($index == 0): ?>
                        <div class="col-md-6 pt-1 pl-1 pr-1 pb-0" style="max-height: 400px;">
                            <article id="post-<?php the_ID() ?>" <?php post_class('h-100'); ?> itemscope itemtype="http://schema.org/BlogPosting">
                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" aria-label="<?php the_title_attribute(); ?>" class="card h-100 overflow-hidden">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="card-img-top h-100 position-relative overflow-hidden">
                                            <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100 object-cover mb-0', "alt" => get_the_post_thumbnail_caption(), "itemprop" => "image")); ?>
                                            <div class="card-img-overlay position-absolute d-flex flex-column justify-content-end align-items-start p-4 bottom-0">
                                                <div class="mb-2">
                                                    <?php
                                                    $categories = get_the_category();
                                                    if (!empty($categories)) {
                                                        echo '<span class="text-white bg-orange fw-semibold" style="padding: 5px 20px 5px 15px; clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);">' . esc_html($categories[0]->name) . '</span>';
                                                    }
                                                    ?>
                                                </div>
                                                <h5 class="card-title mb-2 fs-4" itemprop="headline"><?php the_title(); ?></h5>
                                                <div class="d-flex align-items-center mb-2 fs-6">
                                                    <i class="bi bi-person me-2"></i>
                                                    <span class="me-3" itemprop="author">Oleh <?php the_author(); ?></span>
                                                    <i class="bi bi-calendar me-2"></i>
                                                    <time datetime="<?= esc_html(get_the_date('c')); ?>" itemprop="datePublished"><?php echo diffForHumans(strtotime(get_the_date('c'))); ?></time>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </a>
                            </article>
                        </div>
                    <?php endif; ?>
                    <?php $index++; ?>
                <?php endforeach;
                wp_reset_postdata(); ?>
                <?php $index = 0; ?>
                <div class="col-md-6 p-2 p-md-0 headline-column-2">
                    <div class="row w-100 h-100 m-0">
                        <?php foreach ($headline_ids as $headline_id):
                            $post = get_post($headline_id);
                            setup_postdata($post);
                        ?>
                            <?php if ($index > 0): ?>
                                <article id="post-<?php the_ID() ?>" <?php post_class("col-md-6 mb-1 p-1 popular-post-card") ?> aria-labelledby="small-article-heading" itemscope itemtype="http://schema.org/BlogPosting">
                                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" aria-label="<?php the_title_attribute(); ?>" class="card rounded-3 overflow-hidden h-100">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="card-img-top position-relative overflow-hidden h-100">
                                                <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100 object-cover mb-0 rounded-3', "alt" => get_the_post_thumbnail_caption(), "itemprop" => "image")); ?>
                                                <div class="card-img-overlay position-absolute d-flex flex-column justify-content-end align-items-start p-3 bottom-0">
                                                    <div class="mb-2">
                                                        <?php
                                                        $categories = get_the_category();
                                                        if (!empty($categories)) {
                                                            echo '<span class="text-white bg-orange fw-semibold fs-6" style="padding: 5px 20px 5px 15px; clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);">' . esc_html($categories[0]->name) . '</span>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <h5 class="card-title mb-2 fs-6 d-none d-md-block" itemprop="headline"><?php the_title(); ?></h5>
                                                    <h5 class="card-title mb-2 fs-4 d-block d-md-none" itemprop="headline"><?php the_title(); ?></h5>
                                                    <div class="d-flex align-items-center mb-2 fs-6 d-block d-md-none">
                                                        <i class="bi bi-person me-2"></i>
                                                        <span class="me-3" itemprop="author">Oleh <?php the_author(); ?></span>
                                                        <i class="bi bi-calendar me-2"></i>
                                                        <time datetime="<?= get_the_date('c'); ?>" itemprop="datePublished"><?php echo diffForHumans(strtotime(get_the_date('c'))); ?></time>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </a>
                                </article>
                            <?php endif; ?>
                            <?php $index++; ?>
                        <?php endforeach;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <div class="row gap-5 gap-md-0 <?= get_theme_mod('is_show_headline', true) || get_theme_mod('is_active_slider', true) ? 'mt-5' : ''  ?>">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
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

                            if ($editors_pick_query->have_posts()):
                            ?>
                                <div class="col-lg-6">
                                    <h2 class="fs-3 fw-semibold mb-3" id="editors-pick-heading">
                                        <i class="bi bi-bookmark"></i> Pilihan Editor
                                    </h2>
                                    <div style="width: 100px; height: 5px; background-color: var(--primary); border-radius: 2px;" class="mb-3"></div>
                                    <?php
                                    while ($editors_pick_query->have_posts()) : $editors_pick_query->the_post()
                                    ?>
                                        <article aria-labelledby="editors-pick-article-heading">
                                            <?php get_template_part('card', 'secondary', array('mb' => true)) ?>
                                        </article>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            <?php endif; ?>
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

                            if ($warm_topic_query->have_posts()):
                            ?>
                                <div class="col-lg-6">
                                    <h2 class="fs-3 fw-semibold mb-3 d-flex align-items-center gap-2" id="warm-topic-heading">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire fs-1" viewBox="0 0 16 16" style="transform: scale(1.4);">
                                            <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />
                                        </svg> Topik Hangat
                                    </h2>
                                    <div style="width: 100px; height: 5px; background-color: var(--primary); border-radius: 2px;" class="mb-3"></div>
                                    <?php
                                    while ($warm_topic_query->have_posts()) : $warm_topic_query->the_post()
                                    ?>
                                        <article aria-labelledby="warm-topic-article-heading">
                                            <?php get_template_part('card', 'secondary', array('mb' => true)) ?>
                                        </article>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row px-2">
                    <div class="headline-post-container rounded-3 overflow-hidden col-md-12 p-0 mb-4">
                        <?php
                        $posts = new WP_Query([
                            'post_type' => 'post',
                        ]);
                        ?>
                        <div class="swiper-wrapper">
                            <?php if ($posts->have_posts()): while ($posts->have_posts()): $posts->the_post() ?>
                                    <article id="post-<?php the_ID() ?>" <?php post_class('swiper-slide headline-swiper-slide-item'); ?> itemscope itemtype="http://schema.org/BlogPosting">
                                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" aria-label="<?php the_title_attribute(); ?>" class="card rounded-0 h-100 overflow-hidden">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="card-img-top rounded-0 h-100 position-relative overflow-hidden">
                                                    <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100 h-100 object-cover mb-0', "alt" => get_the_post_thumbnail_caption(), "itemprop" => "image")); ?>
                                                    <div class="card-img-overlay position-absolute d-flex flex-column justify-content-end align-items-start p-4 bottom-0">
                                                        <div class="mb-2">
                                                            <?php
                                                            $categories = get_the_category();
                                                            if (!empty($categories)) {
                                                                echo '<span class="text-white bg-orange fw-semibold" style="padding: 5px 20px 5px 15px; clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);">' . esc_html($categories[0]->name) . '</span>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <h5 class="card-title mb-2 fs-4" itemprop="headline"><?php the_title(); ?></h5>
                                                        <div class="d-flex align-items-center mb-2 fs-6">
                                                            <i class="bi bi-person me-2"></i>
                                                            <span class="me-3" itemprop="author">Oleh <?php the_author(); ?></span>
                                                            <i class="bi bi-calendar me-2"></i>
                                                            <time datetime="<?= esc_html(get_the_date('c')); ?>" itemprop="datePublished"><?php echo diffForHumans(strtotime(get_the_date('c'))); ?></time>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </a>
                                    </article>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="fw-semibold fs-2 mb-3 text-dark" id="latest-news-heading">
                            Berita Terbaru
                        </h2>
                        <div style="width: 100px; height: 5px; background-color: var(--primary); border-radius: 2px;" class="mb-3"></div>
                    </div>
                    <div class="col-md-12">
                        <?php
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1; // Menangkap halaman aktif

                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 10, // Menampilkan 5 postingan per halaman
                            'paged'          => $paged, // Menangani paginasi
                        );
                        
                        $query = new WP_Query($args);
                        if($query->have_posts()):
                        ?>
                            <?php while($query->have_posts()): $query->the_post() ?>
                                <article aria-labelledby="latest-news-article-heading">
                                    <?php get_template_part('entry', 'summary'); ?>
                                </article>
                            <?php endwhile; ?>
                                <div class="pagination">
                                    <?= paginate_links(array(
                                        'total'   => $query->max_num_pages,
                                        'current' => $paged,
                                        'prev_text' => '&laquo;',
                                        'next_text' => '&raquo;',
                                    ));
                                    ?>
                                </div>
                                <?php wp_reset_postdata() ?>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-secondary">Belum ada berita terbaru.</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                    </div>
                </div>
                <?php
                $categories = get_categories();
                foreach ($categories as $category) : ?>
                    <?php $random_index = random_int(0, 3); ?>
                    <section class="row mt-3" aria-labelledby="category-<?php echo esc_attr($category->slug); ?>-heading">
                        <div class="col-md-12">
                            <div class="row d-flex align-items-center mb-3">
                                <div class="col-md-8">
                                    <h2 class="fs-2 fw-semibold text-dark" id="category-<?php echo esc_attr($category->slug); ?>-heading"><?= $category->name ?></h2>
                                    <p class="text-secondary fs-5"><?= $category->description ?></p>
                                </div>
                                <div class="col-md-4 d-flex justify-content-start justify-content-md-end align-items-center">
                                    <a href="<?= get_category_link($category) ?>" class="text-orange text-decoration-none fw-semibold fs-5 d-flex gap-2 align-items-center mb-0 more-link" itemprop="url">Selengkapnya <i class="bi bi-arrow-right d-block m-0 p-0"></i></a>
                                </div>
                            </div>
                            <?php
                            $index = 0;
                            $category_post_query = new WP_Query(array(
                                "post_type" => 'post',
                                "posts_per_page" => 5,
                                "category_name" => $category->slug
                            ));

                            $count_map = ["one", "two", "three", "four", "five"];
                            if ($category_post_query->have_posts()) {
                                get_template_part('section/section', $count_map[count($category_post_query->posts) - 1] . '-post', array('category_post_query' => $category_post_query));
                            }
                            ?>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
            <aside class="col-md-4" role="complementary">
                <?php get_sidebar() ?>
            </aside>
        </div>
    </div>
</main>

<?php get_template_part('nav', 'below');
get_footer(); ?>