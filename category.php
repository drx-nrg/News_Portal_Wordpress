<?php get_header(); ?>
<main id="content" class="site-main" itemscope itemtype="https://schema.org/CollectionPage">
    <div class="container mt-4" style="padding: 0 1.5rem !important;">
        <div class="row">
            <div class="col-md-8">
                <section id="category-news">
                    <header id="page-header">
                        <?php get_template_part(
                            'breadcrumbs', 
                            null, 
                            array(
                                'type' => 'category', 
                                'category' => get_queried_object(), 
                                'title' => null
                                )
                            ); ?>
                        <h1 class="fs-2 fw-semibold text-dark" itemprop="headline"><?php echo single_cat_title(null, false) ?></h1>
                        <?php if (category_description()) : ?>
                            <p class="category-description text-secondary" itemprop="description"><?php echo category_description(); ?></p>
                        <?php endif; ?>
                    </header>
                    <div class="row">
                        <div class="col-12 d-flex flex-column align-items-center px-0">
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <?php get_template_part('entry', 'summary') ?>
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
                                <div class="d-flex flex-column gap-2 gap-md-3">
                                    <div class="main-text d-flex flex-column align-items-center">
                                        <h2 class="fw-semibold fs-1 mt-5 text-dark">404</h2>
                                        <p class="text-secondary">Berita dengan kategori <?php echo single_cat_title(null, false) ?> tidak ditemukan.</p>
                                    </div>
                                    <?php get_search_form(['is_white' => true]) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-4">
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
</main>
<?php get_template_part('nav', 'below'); ?>
<?php get_footer(); ?>