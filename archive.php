<?php get_header(); ?>

<main id="content" class="site-main" itemscope itemtype="https://schema.org/CollectionPage">
    <div class="container mt-4" style="padding: 0 1.5rem !important;">
        
        <header class="page-header mb-4">
            <?php get_template_part(
                'breadcrumbs', 
                null, 
                [
                    'type' => 'archive',
                    'archive_url' => get_permalink(get_queried_object()),
                    'archive_title' => strip_tags(get_the_archive_title())
                ]
            ); ?>
            
            <?php the_archive_title('<h1 class="fs-2 fw-semibold text-dark" itemprop="headline">', '</h1>'); ?>

            <?php if (get_the_archive_description()) : ?>
                <p class="archive-description text-secondary" itemprop="description">
                    <?= get_the_archive_description(); ?>
                </p>
            <?php endif; ?>
        </header>

        <section id="archive-posts" aria-labelledby="archive-heading">
            <h2 id="archive-heading" class="visually-hidden">Daftar Arsip Post</h2>

            <div class="row d-flex flex-row gap-5 gap-md-0">
                <div class="col-md-8 d-flex flex-column align-items-center px-0">
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

                <div class="col-md-4 px-0">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </section>

    </div>
</main>

<?php get_footer(); ?>
