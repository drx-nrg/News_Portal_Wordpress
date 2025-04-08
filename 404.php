<?php get_header(); ?>
<section id="not-found">
    <article id="post-0" class="post no-results not-found container">
        <div class="row" itemprop="mainContentOfPage">
            <div class="col-md-8 d-flex flex-column align-items-center mb-5 mb-md-0">
                <header class="col-md-12 header text-center">
                    <h1 class="entry-title text-dark fw-semibold" style="font-size: 3rem;" itemprop="name">404</h1>
                </header>
                <p class="text-dark text-center"><?php esc_html_e('Maaf, tidak ada yang sesuai dengan pencarian anda, silahkan coba lagi.', 'newslify'); ?></p>
                <div class="row w-100 justify-content-center">
                    <div class="col-md-6">
                        <?php get_search_form(['is_white' => true]); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar() ?>
            </div>
        </div>
    </article>
</section>
<?php get_footer(); ?>