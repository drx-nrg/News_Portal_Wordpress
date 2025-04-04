<?php
    if(!array_key_exists('border_bottom', $args))
    {
        $args['border_bottom'] = true;
    }

?>
<article class="col-md-12 card bg-light mb-0 rounded-2 border-0 overflow-hidden" itemscope itemtype="https://schema.org/NewsArticle">
    <div class="row <?= $args['border_bottom'] == true ? 'border-bottom' : '' ?>">
        <!-- Thumbnail Image -->
        <div class="col-12 p-0 rounded-2 overflow-hidden" style="height: 300px;" itemprop="image">
            <a href="<?php the_permalink(); ?>" aria-label="Baca selengkapnya tentang <?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('medium', array('class' => 'img-fluid object-cover w-100 h-100', 'alt' => get_the_title())); ?>
            </a>
        </div>

        <!-- Post Content -->
        <div class="col-12 py-4 px-2 mb-0">
            <!-- Categories -->
            <div class="post-categories" itemprop="articleSection">
                <?php $categories = get_the_category(); ?>
                <?php if (!empty($categories)) : ?>
                    <?php foreach ($categories as $category) : ?>
                        <a href="<?= esc_url(get_category_link($category)) ?>" 
                           class="d-block text-orange text-uppercase mb-1 fw-semibold text-decoration-none">
                            <?= esc_html($category->name) ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <!-- Title -->
            <h3 class="card-title fs-md-5 fs-lg-4" itemprop="headline">
                <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none">
                    <?php the_title(); ?>
                </a>
            </h3>

        </div>
    </div>

    <!-- Metadata for SEO -->
    <meta itemprop="url" content="<?php the_permalink(); ?>">
    <meta itemprop="datePublished" content="<?php echo get_the_date('c'); ?>">
    <meta itemprop="dateModified" content="<?php echo get_the_modified_date('c'); ?>">
    <meta itemprop="author" content="<?php the_author(); ?>">
</article>
