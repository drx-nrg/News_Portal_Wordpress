<?php get_header(); ?>

<main id="main-content" role="main">
    <section id="single-page" class="container">
        <div class="row">
            <article id="post-<?php the_ID(); ?>" <?php post_class('col-md-8 d-flex flex-column'); ?> itemscope itemtype="https://schema.org/NewsArticle">
                <?php
                if (have_posts()) :
                    while (have_posts()) : the_post(); ?>
                        <header class="entry-header">
                            <?php get_template_part('breadcrumbs', null, array('type' => 'post', 'category' => get_the_category()[0], 'title' => get_the_title())); ?>
                            <div class="post-categories mt-3 mb-3 d-flex justify-content-center gap-3">
                                <?php
                                $categories = get_the_category();
                                foreach ($categories as $category) {
                                    echo '<a href="'. get_category_link($category) .'" class="badge bg-primary py-2 px-3 fs-6 rounded-pill me-2 text-decoration-none" itemprop="articleSection">' . esc_html($category->name) . '</a>';
                                }
                                ?>
                            </div>
                            <h1 class="post-title fw-bolder text-center mb-3" itemprop="headline"><?php the_title(); ?></h1>
                            <p class="text-uppercase fw-bold fs-5 text-center text-secondary">Bagikan</p>
                        </header>
                        <div class="social-buttons mb-4 d-flex w-100 justify-content-center" role="complementary">
                            <a href="#" class="btn py-2 me-2 rounded-pill bg-danger" aria-label="Share on Instagram"><i class="bi bi-instagram text-white"></i></a>
                            <a href="#" class="btn py-2 me-2 rounded-pill bg-success" aria-label="Share on WhatsApp"><i class="bi bi-whatsapp text-white"></i></a>
                            <a href="#" class="btn py-2 me-2 rounded-pill bg-primary" aria-label="Share on Facebook"><i class="bi bi-facebook text-white"></i></a>
                        </div>
                        <div class="d-flex flex-wrap w-100 fs-6 fs-md-5 text-secondary justify-content-center gap-2">
                            <div class="post-author p-0">
                                <i class="bi bi-person me-2"></i> Oleh <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="text-decoration-none" itemprop="author" itemscope itemtype="https://schema.org/Person"><?php the_author(); ?></a>
                            </div>
                            <p class="d-none d-lg-block">-</p>
                            <div class="post-date p-0">
                                <i class="bi bi-calendar me-2"></i> <time datetime="<?php echo esc_html(get_the_date('c')); ?>" itemprop="datePublished"><?php echo date_i18n('l, d M Y H:i', strtotime(get_the_date('c'))); ?></time>
                            </div>
                            <div class="w-100 reading-time text-center mt-2 mt-md-0 mb-3" style="margin-top: -30px;">
                                <i class="bi bi-clock"></i>
                                <?= calculate_reading_time(get_post()) . " menit membaca" ?>
                            </div>
                        </div>
                        <figure class="post-thumbnail mb-3 overflow-hidden rounded-3 d-flex flex-column align-items-center" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                            <?php
                            if (has_post_thumbnail()) :
                                the_post_thumbnail('large');
                                $thumb_id = get_post_thumbnail_id();
                                $thumb_description = null;

                                if (get_post($thumb_id)) {
                                    $thumb_description = get_post($thumb_id)->post_content;
                                }

                                if (!empty($thumb_description)) : ?>
                                    <figcaption class="featured-image-description mt-2 text-center text-secondary"><?php echo esc_html($thumb_description); ?></figcaption>
                            <?php endif;
                            endif;
                            ?>
                        </figure>
                        <div class="mt-3 post-content fs-6 fs-md-5 text-decoration-none" itemprop="articleBody">
                            <?php
                            $is_full_content = isset($_GET["all"]);

                            if ($is_full_content) {
                                $content = get_post_field('post_content', get_the_ID());
                                echo $content;
                            } else {
                                the_content();
                            }

                            $args = array(
                                'before'           => '<nav class="page-links"><span class="page-links-title">' . __('Halaman:', 'textdomain') . '</span>',
                                'after'            => "<a href='" . get_permalink() . '?all=1' . "' role='button' class='btn btn-success ms-auto' id='show-all-pages'>Tampilkan semua</a></nav>",
                                'link_before'      => '<span class="page-number rounded-circle bg-light text-dark">',
                                'link_after'       => '</span>',
                                'next_or_number'   => 'number',
                                'separator'        => ' ',
                                'nextpagelink'     => __('Next page', 'textdomain'),
                                'previouspagelink' => __('Previous page', 'textdomain'),
                                'pagelink'         => '%',
                                'echo'             => 1
                            );

                            if (!$is_full_content) {
                                wp_link_pages($args);
                            }
                            ?>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>
                <div class="share-section w-100 mt-3">
                    <h2 class="fw-semibold fs-5 fs-md-4 mb-3" itemprop="additionalType">Bagikan:</h2>
                    <div class="social-buttons mb-3 d-flex w-100 justify-content-start" role="complementary">
                        <a href="#" class="btn py-2 me-2 rounded-pill bg-danger" aria-label="Share on Instagram"><i class="bi bi-instagram text-white"></i></a>
                        <a href="#" class="btn py-2 me-2 rounded-pill bg-success" aria-label="Share on WhatsApp"><i class="bi bi-whatsapp text-white"></i></a>
                        <a href="#" class="btn py-2 me-2 rounded-pill bg-primary" aria-label="Share on Facebook"><i class="bi bi-facebook text-white"></i></a>
                    </div>
                </div>
                <div class="content-tags d-flex flex-wrap gap-2 align-items-center mt-5 mb-3 pb-3 border-bottom">
                    <p class="fs-4 fw-semibold text-dark mb-0">Tags:</p>
                    <?php
                    $tags = get_the_tags();
                    if ($tags) {
                        echo '<div class="post-tags d-flex flex-wrap gap-3">';
                        foreach ($tags as $tag) {
                            echo '<a href="' . get_tag_link($tag) . '" class="badge bg-white py-2 px-4 d-block rounded-0 text-secondary shadow-sm fs-6 fs-md-6 fw-normal text-decoration-none" itemprop="keywords">' . strtoupper(esc_html($tag->name)) . '</a> ';
                        }
                        echo '</div>';
                    } else {
                        echo "<h5 class='mb-0 text-secondary'>No Tags</h5>";
                    }
                    ?>
                </div>
                <?php get_template_part('nav-below-single') ?>
                <div id="related-articles" class="mb-5 w-100">
                    <h2 class="fw-semibold fs-2">Artikel Terkait</h2>
                    <p class="text-secondary">Artikel yang memiliki jenis dan kategori yang sama</p>
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 5,
                            'category_name' => $categories[0]->slug,
                            'post__not_in' => array(intval(get_the_ID()))
                        );

                        $related_articles = new WP_Query($args);

                        if(!$related_articles->have_posts()):
                    ?>
                        <p class="text-body-secondary">Artikel tidak tersedia</p>
                    <?php
                        endif;
                        if ($related_articles->have_posts()) : while ($related_articles->have_posts()) : $related_articles->the_post();
                    ?>
                            <?php get_template_part('entry', 'summary'); ?>
                    <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>

                <?php if (comments_open() && !post_password_required()) {
                    comments_template('', true);
                } ?>
            </article>
            <aside class="col-md-4" role="complementary">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </section>
</main>

<?php get_footer(); ?>
