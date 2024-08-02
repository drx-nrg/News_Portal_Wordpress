<?php get_header(); ?>
<div class="container mb-5">
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
<?php get_footer(); ?>