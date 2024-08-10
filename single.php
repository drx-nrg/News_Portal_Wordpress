<?php get_header(); ?>
<section id="single-page">
    <div class="row">
        <article class="col-md-8 d-flex flex-column">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <?php get_template_part('breadcrumbs', null, array('type' => 'post', 'category' => get_the_category()[0], 'title' => get_the_title())) ?>
                    <div class="post-categories mt-3 mb-3 d-flex justify-content-center gap-3">
                        <?php
                        $categories = get_the_category();
                        foreach ($categories as $category) {
                            echo '<span class="badge bg-primary py-2 px-3 fs-6 rounded-pill me-2">' . esc_html($category->name) . '</span>';
                        }
                        ?>
                    </div>
                    <h1 class="post-title fw-bolder text-center mb-3"><?php the_title(); ?></h1>
                    <p class="text-uppercase fw-bold fs-5 text-center text-secondary">Bagikan</p>
                    <div class="social-buttons mb-4 d-flex w-100 justify-content-center">
                        <a href="#" class="btn py-2 me-2 rounded-pill bg-danger"><i class="bi bi-instagram text-white"></i></a>
                        <a href="#" class="btn py-2 me-2 rounded-pill bg-success"><i class="bi bi-whatsapp text-white"></i></a>
                        <a href="#" class="btn py-2 me-2 rounded-pill bg-primary"><i class="bi bi-facebook text-white"></i></a>
                    </div>
                    <div class="d-flex flex-wrap w-100 fs-5 text-secondary justify-content-center gap-2">
                        <div class="post-author p-0">
                            <i class="bi bi-person me-2"></i> Oleh <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="text-decoration-none"><?php the_author(); ?></a>
                        </div>
                        <p>-</p>
                        <div class="post-date p-0">
                            <i class="bi bi-calendar me-2"></i> <?php echo date_i18n('l, d M Y H:i', strtotime(get_the_date('c'))); ?>
                        </div>
                        <div class="w-100 reading-time text-center mb-3" style="margin-top: -10px;">
                            <i class="bi bi-clock"></i>
                            <?= calculate_reading_time(get_post())." menit membaca" ?>
                        </div>
                    </div>
                    <div class="post-thumbnail mb-3 overflow-hidden rounded-3 d-flex flex-column align-items-center">
                        <?php
                        if (has_post_thumbnail()) :
                            the_post_thumbnail('large');
                            $thumb_id = get_post_thumbnail_id();
                            $thumb_description = null;

                            if(get_post($thumb_id)){
                                $thumb_description = get_post($thumb_id)->post_content;
                            }

                            if (!empty($thumb_description)) : ?>
                                <p class="featured-image-description mt-2 text-center"><?php echo esc_html($thumb_description); ?></p>
                        <?php endif;
                        endif;
                        ?>
                    </div>
                    <div class="post-content fs-5 text-decoration-none">
                        <?php the_content();

                        $args = array(
                            'before'           => '<nav class="page-links"><span class="page-links-title">' . __('Halaman:', 'textdomain') . '</span>',
                            'after'            => '</nav>',
                            'link_before'      => '<span class="page-number rounded-circle bg-light text-dark">',
                            'link_after'       => '</span>',
                            'next_or_number'   => 'number',
                            'separator'        => ' ',
                            'nextpagelink'     => __('Next page', 'textdomain'),
                            'previouspagelink' => __('Previous page', 'textdomain'),
                            'pagelink'         => '%',
                            'echo'             => 1
                        );

                        wp_link_pages($args);

                        ?>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
            <div class="share-section w-100 mt-3">
                <h1 class="fw-semibold fs-4 mb-3">Bagikan:</h1>
                <div class="social-buttons mb-3 d-flex w-100 justify-content-start">
                    <a href="#" class="btn py-2 me-2 rounded-pill bg-danger"><i class="bi bi-instagram text-white"></i></a>
                    <a href="#" class="btn py-2 me-2 rounded-pill bg-success"><i class="bi bi-whatsapp text-white"></i></a>
                    <a href="#" class="btn py-2 me-2 rounded-pill bg-primary"><i class="bi bi-facebook text-white"></i></a>
                </div>
            </div>
            <div class="content-tags d-flex flex-wrap gap-2 align-items-center mt-5 mb-3 pb-3 border-bottom">
                <p class="fs-4 fw-semibold text-dark mb-0">Tags :</p>
                <?php
                $tags = get_the_tags();
                if ($tags) {
                    echo '<div class="post-tags d-flex flex-wrap gap-3">';
                    foreach ($tags as $tag) {
                        echo '<a href="' . get_tag_link($tag) . '" class="badge bg-light py-2 px-4 d-block rounded-0 text-secondary fs-5 fw-normal text-decoration-none">' . strtoupper(esc_html($tag->name)) . '</a> ';
                    }
                    echo '</div>';
                } else {
                    echo "<h5 class='mb-0 text-secondary'>No Tags</h5>";
                }
                ?>
            </div>
            <nav id="nav-below-single" class="navigation post-navigation d-block mb-5" role="navigation">
                <div class="row nav-links d-flex justify-content-between">
                    <div class="col-md-6 nav-previous text-decoration-none text-dark">
                        <?= get_previous_post_link('%link', 'Sebelumnya'); ?>
                        <p class="fs-5 fw-semibold mt-2"><?= get_previous_post()->post_title ?></p>
                    </div>
                    <div class="col-md-6 nav-next text-decoration-none text-dark d-flex flex-column align-items-end">
                        <?= get_next_post_link('%link', 'Selanjutnya'); ?>
                        <p class="fs-5 fw-semibold mt-2 text-end"><?= get_next_post()->post_title ?></p>
                    </div>
                </div>
            </nav>

            <div id="related-articles" class="mb-5 w-100">
                <h1 class="fw-semibold fs-2">Artikel Terkait</h1>
                <p class="text-secondary">Artikel yang memiliki jenis dan kategori yang sama</p>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => '5',
                    'category_name' => $categories[0]->slug,
                    'post__not_in' => array(intval(get_the_ID()))
                );

                $related_articles = new WP_Query($args);

                if ($related_articles->have_posts()) : while ($related_articles->have_posts()) : $related_articles->the_post()
                ?>
                        <?php  get_template_part('entry', 'summary') ?>
                <?php endwhile;
                    wp_reset_postdata();
                endif;  ?>
            </div>

            <?php if (comments_open() && !post_password_required()) {
                comments_template('', true);
            } ?>
        </article>
        <div class="col-md-4">
            <?php get_sidebar() ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>