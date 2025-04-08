<?php get_header(); ?>
<main id="content" class="site-main">
    <div class="container mt-4" style="padding: 0 1.5rem !important;">
        <div class="row">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('col-md-8 d-flex flex-column'); ?> itemscope itemtype="https://schema.org/NewsArticle">
                        <input type="text" class="permalink-share" value="<?php echo get_permalink() ?>" style="position:absolute; top:0; left:0; opacity:0; pointer-events: none;">
                        <header class="entry-header">
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <?php get_template_part('breadcrumbs', null, array('type' => 'post', 'category' => get_the_category()[0], 'title' => get_the_title())); ?>
                                </div>
                            </div>
                            <div class="post-categories mb-3 d-flex d-xl-none justify-content-center gap-3">
                                <?php
                                $categories = get_the_category();
                                foreach ($categories as $category) {
                                    echo '<a href="' . get_category_link($category) . '" class="badge bg-primary py-2 px-3 fs-6 rounded-pill'. (count($categories) > 1 ? ' me-2 ' : ' ') .'text-decoration-none" itemprop="articleSection">' . esc_html($category->name) . '</a>';
                                }
                                ?>
                            </div>
                            <style>
                                @media screen and (min-width: 992px) {
                                    #post-title{
                                        width: 80%;
                                    }
                                }
                            </style>
                            <div class="single-title w-100 d-flex justify-content-center">
                                <h1 id="post-title" class="text-decoration-none fw-bolder text-center mb-3 text-dark fs-2" itemprop="headline"><?php the_title(); ?></h1>
                            </div>
                            <div class="d-flex flex-wrap w-100 fs-6 fs-md-5 text-dark justify-content-center gap-2">
                                <div class="post-author p-0 mb-0 d-flex align-items-center">
                                    <i class="bi bi-person me-2"></i> 
                                    <span class="me-1">Oleh</span> 
                                    <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                                        <a href="<?= get_author_posts_url(get_the_author_meta('ID')) ?>" 
                                        class="fw-semibold text-dark" 
                                        itemprop="url">
                                            <span itemprop="name"><?= get_the_author() ?></span>
                                        </a>
                                    </span>
                                </div>
                                <div class="post-date p-0 mb-0 d-flex align-items-center">
                                    <p class="d-none d-lg-block mb-0">-</p>
                                    <i class="bi bi-calendar ms-2 me-2"></i> <time datetime="<?php echo esc_html(wp_date('c', get_post_time('U', true))); ?>" itemprop="datePublished"><?php echo wp_date('l, d F Y', get_post_time('U', true)) ?></time>
                                </div>
                                <div class="w-100 reading-time text-center mt-2 mt-md-0 mb-3" style="margin-top: -30px;">
                                    <i class="bi bi-clock me-1"></i>
                                    <?php echo calculate_reading_time(get_post()) . " menit membaca" ?>
                                </div>
                            </div>
                            <p class="text-uppercase fw-bold fs-5 text-center text-secondary mb-0 mb-2">Bagikan</p>
                            <div class="social-buttons mb-4 d-flex w-100 justify-content-center align-items-center" role="complementary">
                                <a href="<?php echo esc_url('https://instagram.com') ?>" class="btn py-2 me-2 rounded-pill bg-danger" aria-label="Share on Instagram"><i class="bi bi-instagram text-white"></i></a>
                                <a href="<?php echo esc_url("https://api.whatsapp.com/send?text=".urlencode(get_the_title() . ' ' . get_permalink())); ?>" class="btn py-2 me-2 rounded-pill bg-success" aria-label="Share on WhatsApp"><i class="bi bi-whatsapp text-white"></i></a>
                                <a href="<?php echo esc_url("https://www.facebook.com/sharer/sharer.php?u=" . urlencode(get_permalink())) ?>" class="btn py-2 me-2 rounded-pill bg-primary" aria-label="Share on Facebook"><i class="bi bi-facebook text-white"></i></a>
                                <a href="<?php echo esc_url("https://twitter.com/intent/tweet?url=" . urlencode(get_permalink()) . "&text=" . urlencode(get_the_title())) ?>" class="btn py-2 px-2 me-2 rounded-pill bg-dark d-flex align-items-center justify-content-center" aria-label="Share on X" style="width: 40px; height: 40px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                    </svg>
                                </a>
                                <a role="button" id="copyBtn" class="btn py-2 me-2 rounded-pill bg-secondary" aria-label="Copy To Clipboard"><i class="bi bi-paperclip text-white"></i></a>
                            </div>
                        </header>
                        <?php
                        if (has_post_thumbnail()) : ?>
                            <figure class="post-thumbnail mb-3 d-flex flex-column align-items-center" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                                <?php
                                    the_post_thumbnail('medium', ['itemprop' => 'contentUrl', 'class' => 'rounded-3', 'style' => 'box-shadow: rgba(99,99,99,.2) 0 2px 4px 0;']);
                                    $thumb_id = get_post_thumbnail_id();
                                    $thumb_description = null;

                                    if (get_post($thumb_id)) {
                                        $thumb_description = get_post($thumb_id)->post_content;
                                    }

                                    if (!empty($thumb_description)) : ?>
                                        <figcaption itemprop="caption" class="featured-image-description mt-2 text-center text-secondary fs-6">
                                            <?php echo esc_html($thumb_description); ?>
                                        </figcaption>
                                <?php endif;?>
                            </figure>
                        <?php endif; ?>
                        <style>
                            @media screen and (max-width: 992px){
                                .post-content{
                                    font-size: 1rem;
                                }
                            }
                            @media screen and (min-width: 992px){
                                .post-content{
                                    font-size: 1.1rem;
                                }
                            }
                            .post-content p{
                                font-family: Merriweather;
                                letter-spacing: .5px;
                            }
                        </style>
                        <div class="mt-3 post-content text-decoration-none text-dark" itemprop="articleBody">
                            <?php
                            $is_full_content = isset($_GET["all"]);

                            if ($is_full_content) {
                                $content = get_post_field('post_content', get_the_ID());
                                echo $content;
                            } else {
                                the_content();
                            }

                            $args = array(
                                'before'           => '<nav class="page-links"><span class="page-links-title fw-semibold">' . __('Halaman:', 'newslify') . '</span>',
                                'after'            => $is_full_content ? '</nav>' : "<a href='" . get_permalink() . '?all=1' . "' role='button' class='btn btn-success ms-auto' id='show-all-pages'>Tampilkan semua</a></nav>",
                                'link_before'      => '<span class="page-number rounded-circle bg-light text-dark">',
                                'link_after'       => '</span>',
                                'next_or_number'   => 'number',
                                'separator'        => ' ',
                                'nextpagelink'     => __('Next page', 'newslify'),
                                'previouspagelink' => __('Previous page', 'newslify'),
                                'pagelink'         => '%',
                                'echo'             => 1
                            );

                            wp_link_pages($args);
                            ?>
                        </div>
                        <div class="share-section w-100 mt-3">
                            <h2 class="fw-semibold fs-5 fs-md-4 mb-3 text-dark" itemprop="additionalType">Bagikan:</h2>
                            <div class="social-buttons mb-3 d-flex w-100 justify-content-start" role="complementary">
                                <a href="https://instagram.com" class="btn py-2 me-2 rounded-pill bg-danger" aria-label="Share on Instagram"><i class="bi bi-instagram text-white"></i></a>
                                <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(is_single() ? get_the_title() . ' ' . get_permalink() : get_bloginfo('name') . ' ' . home_url()); ?>" class="btn py-2 me-2 rounded-pill bg-success" aria-label="Share on WhatsApp"><i class="bi bi-whatsapp text-white"></i></a>
                                <a href="<?php echo "https://www.facebook.com/sharer/sharer.php?u=" . urlencode(is_single() ? get_permalink() : home_url()) ?>" class="btn py-2 me-2 rounded-pill bg-primary" aria-label="Share on Facebook"><i class="bi bi-facebook text-white"></i></a>
                                <a href="<?php echo "https://twitter.com/intent/tweet?url=" . urlencode(is_single() ? get_permalink() : home_url()) . "&text=" . urlencode(is_single() ? get_the_title() : get_bloginfo('name') . ' - ' . get_bloginfo('description')) ?>" class="btn py-2 me-2 rounded-pill bg-dark d-flex align-items-center justify-content-center" aria-label="Share on X">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                    </svg>
                                </a>
                                <a role="button" id="copyBtn" class="btn py-2 me-2 rounded-pill bg-secondary" aria-label="Copy To Clipboard"><i class="bi bi-paperclip text-white"></i></a>
                            </div>
                        </div>
                        <div class="content-tags d-flex flex-wrap gap-2 align-items-center mt-5 mb-3 pb-3 border-bottom">
                            <p class="fs-4 fw-semibold text-dark mb-0">Tags:</p>
                            <?php
                            $tags = get_the_tags();
                            if ($tags) {
                                echo '<div class="post-tags d-flex flex-wrap gap-3">';
                                foreach ($tags as $tag) {
                                    echo '<a href="' . get_tag_link($tag) . '" class="badge bg-white py-2 px-4 d-block rounded-0 text-dark shadow-sm fs-6 fs-md-6 fw-normal text-decoration-none" style="line-height: 1.5; word-wrap: break-word; overflow-wrap: break-word; white-space: normal;" itemprop="keywords">' . strtoupper(esc_html($tag->name)) . '</a> ';
                                }
                                echo '</div>';
                            } else {
                                echo "<h5 class='mb-0 text-secondary'>No Tags</h5>";
                            }
                            ?>
                        </div>
                        <?php get_template_part('nav-below-single') ?>
                        <?php if (comments_open() && !post_password_required()) {
                            comments_template('', true);
                        } ?>
                        <section id="related-articles" aria-labelledby="related-articles-title">
                            <h2 id="related-articles-title" class="fw-semibold fs-2 text-dark">Artikel Terkait</h2>
                            <p class="text-dark">Artikel yang memiliki jenis dan kategori yang sama</p>
                            <div class="row">
                                <div class="col-12 d-flex flex-column align-items-center px-0">
                                <?php
                                    $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 5,
                                        'category_name' => $categories[0]->slug,
                                        'post__not_in' => array(intval(get_the_ID()))
                                    );

                                    $related_articles = new WP_Query($args);

                                    if (!$related_articles->have_posts()):
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
                            </div>
                        </section>
                    </article>
            <?php
                endwhile;
            endif;
            ?>
            <div class="col-md-4" role="complementary">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>