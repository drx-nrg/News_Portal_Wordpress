<?php get_header(); ?>
<main id="content" class="site-main">
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
              <div class="headline-post-container rounded-2 overflow-hidden col-md-12 p-0 mb-4" style="box-shadow: rgba(99,99,99,.2) 0 2px 4px 0;">
                <?php
                $posts = new WP_Query([
                  'post_type' => 'post',
                  'posts_per_page' => 5
                ]);
                ?>
                <div class="swiper-wrapper">
                  <?php if ($posts->have_posts()): while ($posts->have_posts()): $posts->the_post() ?>
                      <article id="post-<?php the_ID() ?>" <?php post_class('swiper-slide headline-swiper-slide-item'); ?> itemscope itemtype="http://schema.org/NewsArticle">
                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" aria-label="<?php the_title_attribute(); ?>" class="card rounded-0 h-100 overflow-hidden border-0" itemprop="url">
                          <?php if (has_post_thumbnail()) : ?>
                            <div class="card-img-top rounded-0 h-100 position-relative overflow-hidden">
                              <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100 h-100 object-cover mb-0 no-lazyload', "alt" => get_the_post_thumbnail_caption(), "itemprop" => "image", 'loading' => 'eager')); ?>
                              <div class="card-img-overlay position-absolute d-flex flex-column justify-content-end align-items-start p-4 bottom-0">
                                <div class="mb-2 d-none d-md-flex">
                                  <?php
                                  $categories = get_the_category();
                                  if (!empty($categories)) {
                                    echo '<span class="text-white bg-orange fw-semibold" style="padding: 5px 20px 5px 15px; clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);" itemprop="articleSection">' . esc_html($categories[0]->name) . '</span>';
                                  }
                                  ?>
                                </div>
                                <h3 class="card-title mb-2 fs-4" itemprop="headline"><?php the_title(); ?></h3>
                                <div class="d-flex align-items-center mb-2 fs-6">
                                  <i class="bi bi-person me-2"></i>
                                  <span class="me-3">Oleh <?php the_author(); ?></span>
                                  <!-- Microdata eksplisit -->
                                  <div itemprop="author" itemscope itemtype="https://schema.org/Person">
                                    <meta itemprop="name" content="<?php the_author() ?>" />
                                    <meta itemprop="url" content="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>" />
                                  </div>
                                  <i class="bi bi-clock me-2"></i>
                                  <time datetime="<?= esc_html(wp_date('c', get_post_time('U', true))); ?>" itemprop="datePublished"><?php echo diffForHumans(strtotime(get_the_date('c'))); ?></time>
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
        <section id="latest-news" aria-labelledby="latest-news-heading" class="mb-3">
          <div class="row">
            <div class="col-md-12">
              <h2 class="fw-bold fs-2 mb-2 text-dark" id="latest-news-heading">
                Berita Terbaru
              </h2>
              <div style="width: 80px; height: 5px; background-color: var(--primary); border-radius: 2px;" class="mb-4"></div>
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
                <div class="w-100 latest-news-grid gap-4 mb-4">
                  <?php while ($query->have_posts()): $query->the_post() ?>
                    <article id="post-<?php the_ID() ?>" <?php post_class('latest-news-card bg-white shadow-sm d-flex flex-column overflow-hidden rounded-2') ?> itemscope itemtype="https://schema.org/NewsArticle" style="box-shadow: rgba(99,99,99,.2) 0 2px 4px 0;">
                      <?php if (has_post_thumbnail()) : ?>
                        <figure itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="d-block post-thumbnail overflow-hidden rounded-0 p-0 mb-0" style="max-height: 200px; box-shadow: rgba(99,99,99,.2) 0 2px 4px 0;">
                          <a href="<?php the_permalink() ?>" aria-label="Baca selengkapnya tentang <?= get_the_title() ?>" title="<?php the_title_attribute() ?>" class="d-block post-thumbnail rounded-0 p-0 mb-0" style="height: 200px;">
                            <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100 h-100 mb-0', 'style' => 'object-fit: cover;', 'itemprop' => 'contentUrl')); ?>
                          </a>
                          <meta itemprop="url" content="<?php echo get_the_post_thumbnail_url(null, 'medium') ?>" >
                          <figcaption class="sr-only" itemprop="caption"><?php echo get_post(get_post_thumbnail_id())->post_content ?></figcaption>
                        </figure>
                        <div class="d-flex flex-column justify-content-between p-4" style="flex: 1 1 0;">
                          <div class="d-flex flex-column">
                            <div class="d-flex flex-row gap-3 mb-1">
                              <?php
                              $categories = get_the_category();
                              if (!empty($categories)) {
                                foreach ($categories as $category) {
                                  if ($category->slug != 'headline') {
                                    echo '<a href="' . get_category_link($categories[0]) . '" class="fw-semibold text-uppercase text-orange"><span itemprop="articleSection">' . esc_html($category->name) . '</span></a>';
                                  }
                                }
                              }
                              ?>
                            </div>
                            <h3 class="card-title text-dark mb-2">
                              <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" class="post-title text-dark text-decoration-none" itemprop="url">
                                <span class="card-title mb-2 fs-5 fw-bold" itemprop="headline"><?= get_the_title() ?></span>
                              </a>
                            </h3>
                            <p class="text-secondary fs-6 fw-semibold" itemprop="description"><?php echo wp_trim_words(get_the_excerpt(), 10, '...') ?></p>
                            <!-- Microdata eksplisit -->
                            <div itemprop="author" itemscope itemtype="https://schema.org/Person">
                              <meta itemprop="name" content="<?php the_author() ?>" />
                              <meta itemprop="url" content="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>" />
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6 d-flex align-items-center">
                              <a href="<?= get_permalink() ?>" class="fw-semibold text-orange d-flex align-items-center gap-2 mt-auto more-link" itemprop="url">Selengkapnya <i class="bi bi-arrow-right m-0 p-0 d-flex align-items-center"></i></a>
                            </div>
                            <div class="col-6 d-flex justify-content-end align-items-center">
                              <span class="fw-semibold text-secondary d-inline"><i class="bi bi-clock me-1"></i><time itemprop="datePublished" datetime="<?php echo wp_date('c', get_post_time('U', true)) ?>"><?php echo diffForHumans(strtotime(get_the_date('c'))); ?></time></span>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>
                    </article>
                  <?php endwhile; ?>
                </div>
                <nav class="pagination-container py-3 overflow-x-scroll" aria-label="Navigasi Halaman">
                  <div class="pagination" style="min-width: max-content;">
                    <?= paginate_links(array(
                      'total'   => $query->max_num_pages,
                      'current' => $paged,
                      'prev_text' => '&laquo;',
                      'next_text' => '&raquo;',
                    ));
                    ?>
                  </div>
                </nav>
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
        <!-- <?php
        $categories = get_categories();
        foreach ($categories as $category) : ?>
          <section class="row mb-3" aria-labelledby="category-<?php echo esc_attr($category->slug); ?>-heading">
            <div class="col-md-12">
              <div class="row d-flex align-items-center mb-3">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                  <h2 class="fs-2 fw-bold fst-italic text-dark" id="category-<?php echo esc_attr($category->slug); ?>-heading">Berita <?= $category->name ?></h2>
                  <div style="width: 80px; height: 5px; background-color: var(--primary); border-radius: 2px;" class="d-none d-md-flex"></div>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center mt-md-0">
                  <a href="<?= get_category_link($category) ?>" class="text-orange text-decoration-none fw-semibold fs-6 d-flex gap-2 align-items-center mb-0 more-link" itemprop="url">Selengkapnya <i class="bi bi-arrow-right d-block m-0 p-0"></i></a>
                </div>
              </div>
              <?php
              $index = 0;
              $category_post_query = new WP_Query(array(
                "post_type" => 'post',
                "posts_per_page" => 5,
                "category_name" => $category->slug
              ));
              if($category_post_query->have_posts()):
              ?>
                <div class="row">
                  <div class="col-12 d-flex flex-column align-items-center px-0">
                    <?php while($category_post_query->have_posts()): $category_post_query->the_post() ?>
                      <?php get_template_part('entry', 'summary') ?>
                    <?php endwhile; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </section>
        <?php endforeach; ?> -->
      </div>
      <div class="col-md-4" role="complementary">
        <?php get_sidebar() ?>
      </div>
    </div>
  </div>
</main>

<?php get_template_part('nav', 'below');
get_footer(); ?>