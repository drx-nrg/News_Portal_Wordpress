<?php get_header(); ?>
<section id="search-result">
    <div class="container-fluid mb-5">
        <?php if (have_posts()) : ?>
            <div class="row">
                <div class="col-md-8">
                    <header class="header mb-3">
                        <h1 class="entry-title fs-4 fw-normal" itemprop="name">Hasil Pencarian Untuk : <span class="fw-semibold"><?= get_search_query() ?></span></h1>
                    </header>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_post_type() == "post" ? get_template_part('entry', 'summary') : null ?>
                    <?php endwhile; ?>
                    <?php get_template_part('nav', 'below'); ?>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-12">
                    <article id="post-0" class="post no-results not-found row w-100 d-flex flex-column justify-content-center">
                        <header class="col-md-12 header text-center">
                            <h1 class="entry-title" itemprop="name"><?php esc_html_e('Nothing Found', 'blankslate'); ?></h1>
                        </header>
                        <div class="col-md-12 d-flex flex-column align-items-center entry-content" itemprop="mainContentOfPage">
                            <p><?php esc_html_e('Sorry, nothing matched your search. Please try again.', 'blankslate'); ?></p>
                            <?php get_search_form(); ?>
                        </div>
                    </article>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>