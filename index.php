<?php get_header(); ?>
<main id="content" class="site-main" itemscope itemtype="http://schema.org/Website">
  <div class="container mt-4" style="padding: 0 1.5rem !important;">
    <div class="row gap-5 gap-md-0 <?= get_theme_mod('is_show_headline', true) || get_theme_mod('is_active_slider', true) ? 'mt-5' : ''  ?>">
      <div class="col-md-8">
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1; // Menangkap halaman aktif
        ?>
        <?php if ($paged <= 1): ?>
          <section id="headline-news" aria-labelledby="headline-news-title">
            <h2 id="headline-news-title" class="visually-hidden">Berita Headline</h2>
            <div class="row px-2">
              <div class="headline-post-container rounded-3 overflow-hidden col-md-12 p-0 mb-4" style="box-shadow: rgba(99,99,99,.2) 0 2px 4px 0;">
                <?php
                $posts = new WP_Query([
                  'post_type' => 'post',
                  'posts_per_page' => 5
                ]);
                ?>
                <div class="swiper-wrapper">
                  <?php if ($posts->have_posts()): while ($posts->have_posts()): $posts->the_post() ?>
                      <article id="post-<?php the_ID() ?>" <?php post_class('swiper-slide headline-swiper-slide-item'); ?> itemscope itemtype="http://schema.org/BlogPosting">
                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" aria-label="<?php the_title_attribute(); ?>" class="card rounded-0 h-100 overflow-hidden border-0">
                          <?php if (has_post_thumbnail()) : ?>
                            <div class="card-img-top rounded-0 h-100 position-relative overflow-hidden">
                              <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100 h-100 object-cover mb-0 no-lazyload', "alt" => get_the_post_thumbnail_caption(), "itemprop" => "image", 'loading' => 'eager')); ?>
                              <div class="card-img-overlay position-absolute d-flex flex-column justify-content-end align-items-start p-4 bottom-0">
                                <div class="mb-2">
                                  <?php
                                  $categories = get_the_category();
                                  if (!empty($categories)) {
                                    echo '<span class="text-white bg-orange fw-semibold" style="padding: 5px 20px 5px 15px; clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);">' . esc_html($categories[0]->name) . '</span>';
                                  }
                                  ?>
                                </div>
                                <h3 class="card-title mb-2 fs-4" itemprop="headline"><?php the_title(); ?></h3>
                                <div class="d-none d-md-flex align-items-center mb-2 fs-6">
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
          </section>
        <?php endif; ?>
        <section id="latest-news" aria-labelledby="latest-news-heading">
          <div class="row">
            <div class="col-md-12">
              <h2 class="fw-semibold fs-2 mb-2 text-dark" id="latest-news-heading">
                Berita Terbaru
              </h2>
              <div style="width: 100px; height: 5px; background-color: var(--primary); border-radius: 2px;" class="mb-3"></div>
            </div>
            <div class="col-md-12">
              <?php
              $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 10, // Menampilkan 10 postingan per halaman
                'paged'          => $paged, // Menangani paginasi
              );

              $query = new WP_Query($args);
              if ($query->have_posts()):
              ?>
                <?php while ($query->have_posts()): $query->the_post() ?>
                  <?php get_template_part('entry', 'summary'); ?>
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
        </section>
      </div>
      <aside class="col-md-4" role="complementary">
        <?php get_sidebar() ?>
      </aside>
    </div>
  </div>
</main>

<?php get_template_part('nav', 'below');
get_footer(); ?>