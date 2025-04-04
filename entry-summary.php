<article id="post-<?php the_ID() ?>" <?php post_class("row w-100 d-flex align-items-center mb-4 text-decoration-none text-dark mb-3 p-2 pb-3 border-bottom") ?> itemscope itemtype="https://schema.org/NewsArticle">
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink() ?>" itemprop="url" class="col-4 d-block post-thumbnail overflow-hidden rounded-3 p-0" style="height: 200px; box-shadow: rgba(99,99,99,.2) 0 2px 4px 0;" aria-label="Baca selengkapnya tentang <?= get_the_title() ?>" title="<?php the_title_attribute() ?>">
            <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100 h-100 object-cover mb-0', 'itemprop' => 'image')); ?>
        </a>
    <?php endif; ?>
    <div class="col-8 mt-3 mt-md-0 px-md-4 pl-4 pl-md-0">
        <div class="d-flex flex-row gap-3">
            <?php
            $categories = get_the_category();
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    if ($category->slug != 'headline') {
                        echo '<span class="fw-semibold text-uppercase text-orange">' . esc_html($category->name) . '</span>';
                    }
                }
            }
            ?>
        </div>
        <h3 style="line-height: 1.1 !important;">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>" class="post-title text-dark text-decoration-none" itemprop="url">
                <span class="card-title mb-2 fs-4" itemprop="headline"><?= get_the_title() ?></span>
            </a>
        </h3>
        <div class="d-flex flex-wrap align-items-center text-dark mb-2 fs-md-5">
            <span class="me-2 d-none d-md-block">
                Oleh 
                <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <a href="<?= get_author_posts_url(get_the_author_meta('ID')) ?>" 
                    class="text-decoration-none text-dark fw-semibold" 
                    itemprop="url" title="<?php echo get_the_author() ?>">
                        <span itemprop="name"><?= get_the_author() ?></span>
                    </a>
                </span>
            </span>
            <span class="me-2 d-none d-md-block fs-7">-</span>
            <time itemprop="datePublished" class="me-2" datetime="<?= get_the_date('c') ?>"><?php echo diffForHumans(strtotime(get_the_date('c'))) ?></time>
        </div>
    </div>
</article>