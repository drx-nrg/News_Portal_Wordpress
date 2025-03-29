<?php get_header(); ?>
<div class="container mb-5 mt-4" style="min-height: 100vh;">
    <article id="post-0" class="post no-results not-found row w-100 d-flex flex-column justify-content-center align-items-center">
        <header class="col-md-12 header text-center">
            <h1 class="entry-title text-dark fw-semibold" itemprop="name"><?php esc_html_e('Nothing Found', 'newslify'); ?></h1>
        </header>
        <div class="col-md-12 d-flex flex-column align-items-center entry-content" itemprop="mainContentOfPage">
            <p class="text-dark"><?php esc_html_e('Sorry, nothing matched your search. Please try again.', 'newslify'); ?></p>
            <div class="row">
                <div class="col-md-12">
                    <?php get_search_form(['is_white' => true]); ?>
                </div>
            </div>
        </div>
    </article>
</div>
<?php get_footer(); ?>