<article class="row w-100 d-flex align-items-center mb-4 text-decoration-none text-dark mb-3 p-2 pb-3 border-bottom">
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink() ?>" class="col-4 d-block post-thumbnail overflow-hidden rounded-3 border p-0" style="height: 200px;">
            <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100 object-cover mb-0')); ?>
        </a>
    <?php endif; ?>
    <div class="col-8 mt-3 mt-md-0 px-md-4 pl-4 pl-md-0">
        <div class="mb-2 d-flex flex-row gap-3">
            <?php
            $categories = get_the_category();
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    if($category->slug != 'headline'){
                        echo '<span class="fw-semibold text-uppercase text-orange">' . esc_html($category->name) . '</span>';
                    }
                }
            }
            ?>
        </div>
        <h1 class="card-title mb-2 fs-sm-6 fs-md-5"> <a href="<?php the_permalink() ?>" class="post-title text-dark text-decoration-none"><?= get_the_title(); ?></a></h1>
        <div class="d-flex flex-wrap align-items-center mb-2 text-secondary fs-sm-6 fs-md-5">
            <span class="me-2 text-secondary fw-semibold d-none d-md-block"><a href="<?= get_author_posts_url(get_the_author_meta('ID')) ?>" class="text-decoration-none text-secondary"><?php the_author(); ?></a></span>
            <span class="me-2 d-none d-md-block">-</span>
            <span class="me-2"><?php echo diffForHumans(strtotime(get_the_date('c'))) ?></span>
        </div>
        <div class="text-secondary d-none d-md-block"><?= trim(get_the_excerpt()) ?></div>
    </div>
</article>