<article <?php post_class('post-card'); ?> itemscope itemtype="http://schema.org/BlogPosting">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" aria-label="<?php the_title_attribute(); ?>">
        <figure class="post-card__image">
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_post_thumbnail_caption(); ?>" itemprop="image">
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.png" alt="Placeholder Image">
            <?php endif; ?>
        </figure>
        <div class="post-card__content">
            <h2 class="post-card__title" itemprop="headline"><?php the_title(); ?></h2>
            <p class="post-card__excerpt" itemprop="description"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
            <time class="post-card__date" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
        </div>
    </a>
</article>