<?php get_header(); ?>
<main id="primary" class="site-main" itemscope itemtype="https://schema.org/CollectionPage">
    <div class="container mt-4" style="padding: 0 1.5rem !important;">
        <header class="header mb-3" class="page-header">
            <h1 class="fs-2 fw-semibold tag-title" itemprop="name"><?= get_the_archive_title() ?></h1>
            <?php if (get_the_archive_description()) : ?>
                <p class="category-description tag-description" itemprop="description"><?= get_the_archive_description(); ?></p>
            <?php endif; ?>
        </header>

        <section id="category-news tag-news" itemscope itemtype="https://schema.org/NewsMediaOrganization">
            <div class="row d-flex flex-row gap-5 gap-md-0">
                <div class="col-md-8 d-flex flex-column align-items-center px-0">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php get_template_part('entry', 'summary') ?>
                    <?php endwhile; ?>
                     <!-- Navigasi Halaman -->
                    <nav class="pagination" aria-label="Navigasi Halaman">
                        <?php
                        the_posts_pagination(array(
                            'mid_size'  => 2,
                            'prev_text' => __('«', 'newslify'),
                            'next_text' => __('»', 'newslify'),
                        ));
                        ?>
                    </nav>
                    <?php else: ?>
                        <div class="d-flex flex-column gap-2 gap-md-3">
                            <div class="main-text d-flex flex-column align-items-center">
                                <h1 class="fw-semibold fs-1 mt-5 text-dark">Not Found</h1>
                                <p class="text-secondary">Berita dengan kategori <?= single_cat_title() ?> tidak ditemukan.</p>
                            </div>
                            <?php get_search_form(['is_white' => true]) ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 px-0">
                    <?php get_sidebar() ?>
                </div>
            </div>
        </section>
    </div>
</main>
<?php get_template_part('nav', 'below'); ?>
<?php get_footer(); ?>