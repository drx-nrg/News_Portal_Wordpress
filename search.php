<?php get_header(); ?>
<main id="content" itemscope itemtype="https://schema.org/SearchResultsPage">
    <div class="container mt-4" style="padding: 0 1.5rem !important;">
        <?php if (have_posts()) : ?>
            <div class="row">
                <div class="col-md-8">
                    <section id="posts-found">
                        <header class="header mb-3">
                            <h1 class="entry-title fs-5 fs-lg-4 fw-normal text-dark" itemprop="name">Hasil Pencarian Untuk : <span class="fw-semibold"><?= get_search_query() ?></span></h1>
                            <meta itemprop="description" content="Menampilkan hasil pencarian untuk kata kunci '<?php echo get_search_query(); ?>'">
                        </header>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_post_type() == "post" ? get_template_part('entry', 'summary') : null ?>
                        <?php endwhile; ?>
                    </section>
                    <!-- Navigasi Halaman -->
                    <nav class="pagination" aria-label="Navigasi Halaman">
                        <?php the_posts_pagination([
                            'mid_size'  => 2,
                            'prev_text' => __('«', 'newslify'),
                            'next_text' => __('»', 'newslify'),
                        ]); ?>
                    </nav>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-md-8">
                    <section id="post-not-found" class="row">
                        <header class="col-md-12 header text-center">
                            <h1 class="entry-title fw-semibold" itemprop="name">404</h1>
                        </header>
                        <div class="col-md-12 d-flex flex-column align-items-center entry-content" itemprop="mainContentOfPage">
                            <p><?php esc_html_e("Tidak ada hasil ditemukan untuk pencarian ".get_search_query(), 'newslify'); ?></p>
                            <div class="row justify-content-center w-100">
                                <div class="col-md-6">
                                    <?php get_search_form(['is_white' => true]); ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar() ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>