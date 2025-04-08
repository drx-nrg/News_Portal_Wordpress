<?php get_header(); ?>

<main id="content" class="site-main" itemscope itemtype="https://schema.org/CollectionPage">
    <div class="container mt-4" style="padding: 0 1.5rem !important;">
        <div class="row">
            <div class="col-md-8">
                <section id="archive-posts">
                    <header class="mb-4" id="page-header">
                        <?php get_template_part(
                            'breadcrumbs',
                            null,
                            [
                                'type' => 'archive',
                                'archive_url' => get_permalink(get_queried_object()),
                                'archive_title' => strip_tags(get_the_archive_title())
                            ]
                        ); ?>
                        <?php the_archive_title('<h1 class="fs-2 fw-semibold text-dark" itemprop="name">', '</h1>'); ?>
                        <?php if (get_the_archive_description()) : ?>
                            <p class="archive-description text-secondary" itemprop="description">
                                <?= get_the_archive_description(); ?>
                            </p>
                        <?php endif; ?>
                    </header>
                    <div class="row">
                        <div class="col-12 d-flex flex-column align-items-center px-0">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                    <?php get_template_part('entry', 'summary'); ?>
                                <?php endwhile; ?>

                                <!-- Navigasi Halaman -->
                                <nav class="pagination" aria-label="Navigasi Halaman">
                                    <?php the_posts_pagination([
                                        'mid_size'  => 2,
                                        'prev_text' => __('«', 'newslify'),
                                        'next_text' => __('»', 'newslify'),
                                    ]); ?>
                                </nav>

                            <?php else: ?>
                                <div class="not-found text-center">
                                    <h2 class="fw-semibold fs-1 mt-5 text-dark">404</h2>
                                    <p class="text-secondary">Tidak ditemukan arsip untuk saat ini.</p>
                                    <?php get_search_form(['is_white' => true]); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>