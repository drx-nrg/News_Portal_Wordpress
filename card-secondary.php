<div class="col-md-12 card-secondary d-flex align-items-center text-decoration-none text-dark border-bottom pb-2 <?= esc_attr($args["mb"] ? "mb-4" : "") ?>" style="height: 130px;">
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; align-items: center;">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" class="d-block overflow-hidden rounded-1 p-0" style="height: 100px; min-width: 150px; grid-column: span 1 / span 1;" aria-label="Baca selengkapnya tentang <?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'mb-0', 'alt' => esc_attr(get_the_title()), 'style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
            </a>
        <?php endif; ?>
        <div class="mt-3 mt-md-0" style="grid-column: span 2 / span 2;">
            <h2 class="card-title mb-2" itemprop="headline">
                <a href="<?php the_permalink(); ?>" class="post-title text-dark text-decoration-none fs-6">
                    <?= esc_html(limit_words(get_the_title(), 5)); ?>
                </a>
            </h2>
            <div class="d-flex flex-wrap align-items-center mb-2 text-dark">
                <span class="me-3" itemprop="datePublished" content="<?php echo esc_attr(get_the_date('c')); ?>">
                    <?php echo esc_html(diffForHumans(strtotime(get_the_date('c')))); ?>
                </span>
            </div>
        </div>
    </div>
    <meta itemprop="url" content="<?php the_permalink(); ?>">
    <meta itemprop="author" content="<?php the_author(); ?>">
    <meta itemprop="publisher" content="<?php bloginfo('name'); ?>">
</div>
