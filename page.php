<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section id="page-single <?= get_post_field('post_name', get_post()) ?>">
            <div class="container-fluid">
                <div class="row d-flex flex-row">
                    <article id="post-<?php the_ID(); ?>" class="col-md-8">
                        <header class="header text-center">
                            <h1 class="entry-title fw-bolder" itemprop="name"><?php the_title(); ?></h1>
                            <?php edit_post_link(); ?>
                        </header>
                        <div class="entry-content mt-3 d-flex flex-row gap-3 flex-wrap" style="min-width: 600px;" itemprop="mainContentOfPage">
                            <div class="post-thumbnail" style="max-width: 50%; max-height: 50%;">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium', array('itemprop' => 'image'));
                                } ?>
                            </div>
                            <div class="text-content float-left fs-5" style="flex: 1;">
                                <?php the_content(); ?>
                            </div>
                            <div class="entry-links"><?php wp_link_pages(); ?></div>
                        </div>
                    </article>
                    <div class="col-md-4">
                        <?php get_sidebar() ?>
                    </div>
                </div>
            </div>
            <?php if (comments_open() && !post_password_required()) {
                comments_template('', true);
            } ?>
        </section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>