<?php get_header(); ?>
<section id="author" itemscope itemtype="https://schema.org/ProfilePage">
    <div class="container" style="padding: 0 1.5rem !important;">
        <header class="header">
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
            <h1 class="entry-title author text-dark fs-5" itemprop="name">
                Menampilkan postingan dari penulis: 
                <span class="fw-semibold" itemprop="author"> <?= esc_html(get_the_author_meta('display_name')); ?> </span>
            </h1>
            <?php if (get_the_author_meta('description')) : ?>
                <div class="archive-meta text-secondary" itemprop="description">
                    <?php echo esc_html(get_the_author_meta('description')); ?>
                </div>
            <?php endif; ?>
            <?php rewind_posts(); ?>
        </header>
        
        <div class="row d-flex flex-row gap-5 gap-md-0">
            <div class="col-md-8">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('entry', 'summary'); ?>
                    <?php endwhile; ?>
                    
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
                    <p class="text-muted">Tidak ada postingan dari penulis ini.</p>
                <?php endif; ?>
            </div>
            <aside class="col-md-4" itemscope itemtype="https://schema.org/WPSideBar">
                <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</section>
<?php get_template_part('nav', 'below'); ?>
<?php get_footer(); ?>