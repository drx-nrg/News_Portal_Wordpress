<?php get_header(); ?>
<div class="container mb-5 mt-4" style="min-height: 100vh;">
    <article id="post-0" class="post no-results not-found row w-100 d-flex flex-column justify-content-center align-items-center">
        <div class="col-md-12 d-flex flex-column align-items-center entry-content" itemprop="mainContentOfPage">
            <div class="row">
                <div class="col-md-8 d-flex flex-column align-items-center">
                    <header class="col-md-12 header text-center">
                        <h1 class="entry-title text-dark fw-semibold fs-1" itemprop="name">404</h1>
                    </header>
                    <p class="text-dark"><?php esc_html_e('Maaf, tidak ada yang sesuai dengan pencarian anda, silahkan coba lagi.', 'newslify'); ?></p>
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
        </div>
    </article>
</div>
<?php get_footer(); ?>