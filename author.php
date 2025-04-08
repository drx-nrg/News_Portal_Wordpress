<?php get_header(); ?>
<main id="content" class="site-main" itemscope itemtype="https://schema.org/ProfilePage">
    <div class="container" style="padding: 0 1.5rem !important;">
        <div class="row">
            <div class="col-md-8">
                <section id="author-posts">
                    <header class="mb-3" id="page-header">
                        <?php get_template_part(
                            'breadcrumbs',
                            null,
                            array(
                                'type' => 'author',
                                'category' => null,
                                'title' => null,
                                'author_link' => get_author_posts_url(get_the_author_meta('ID')),
                                'author_name' => get_the_author_meta('display_name')
                            )
                        ); ?>
                        <h1 class="entry-title author text-dark fs-5">
                            Menampilkan postingan dari penulis:
                            <span class="fw-semibold" itemprop="name"> <?= esc_html(get_the_author_meta('display_name')); ?> </span>
                        </h1>
                        <?php if (get_the_author_meta('description')) : ?>
                            <div class="archive-meta text-secondary" itemprop="description">
                                <?php echo esc_html(get_the_author_meta('description')); ?>
                            </div>
                        <?php endif; ?>
                        <?php rewind_posts(); ?>
                    </header>
                    <?php if (have_posts()) : ?>
                        <div class="row">
                            <div class="col-12 d-flex flex-column align-items-center px-0">
                                <?php while (have_posts()) : the_post(); ?>
                                    <?php get_template_part('entry', 'summary'); ?>
                                <?php endwhile; ?>
                            </div>
                        </div>

                        <nav class="pagination mt-4" aria-label="Navigasi Halaman">
                            <?php
                            the_posts_pagination(array(
                                'mid_size'  => 2,
                                'prev_text' => __('«', 'newslify'),
                                'next_text' => __('»', 'newslify'),
                            ));
                            ?>
                        </nav>

                    <?php else : ?>
                        <p class="text-secondary">Tidak ada postingan dari penulis ini.</p>
                    <?php endif; ?>
                </section>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>
<?php get_template_part('nav', 'below'); ?>
<?php get_footer(); ?>