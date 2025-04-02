<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <main id="content" class="site-main" itemscope itemtype="Article">
            <div class="container mt-4" style="padding: 0 1.5rem !important;">
                <div class="row d-flex flex-row">
                    <article id="post-<?php the_ID(); ?>" class="col-md-8">
                        <header class="header text-center">
                            <?php get_template_part('breadcrumbs', null, array(
                                "type" => "page",
                                "title" => get_the_title(),
                            )) ?>
                            <h1 class="entry-title fw-bolder" itemprop="headline"><?php the_title(); ?></h1>
                            <?php edit_post_link(); ?>
                        </header>
                        <div class="entry-content mt-3 d-flex flex-row gap-3 flex-wrap">
                            <div class="post-thumbnail" style="max-width: 50%; max-height: 50%;">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium', array('itemprop' => 'image'));
                                } ?>
                            </div>
                            <div class="text-content fs-5" itemprop="articleBody">
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
        </main>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>