<article class="row w-100 d-flex align-items-center mb-4 text-decoration-none text-dark mb-3">
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink() ?>" class="col-md-4 d-block post-thumbnail overflow-hidden rounded-3">
            <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100 object-cover mb-0')); ?>
        </a>
    <?php endif; ?>
    <div class="col-md-8 mt-3 mt-md-0">
        <div class="mb-2">
            <?php
            $categories = get_the_category();
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    echo '<span class="text-white bg-success fw-semibold" style="padding: 5px 20px 5px 15px; clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);">' . esc_html($category->name) . '</span>';
                }
            }
            ?>
        </div>
        <h1 class="card-title mb-2 fs-3"> <a href="<?php the_permalink() ?>" class="post-title text-dark text-decoration-none"><?php the_title(); ?></a></h1>
        <div class="d-flex flex-wrap align-items-center mb-2 fs-5 text-secondary">
            <i class="bi bi-person me-2"></i>
            <span class="me-3">Oleh <a href="<?= get_author_posts_url(get_the_author_meta('ID')) ?>" class="text-decoration-none"><?php the_author(); ?></a></span>
            <i class="bi bi-calendar me-2"></i>
            <span class="me-3"><?php echo diffForHumans(strtotime(get_the_date('j F, Y'))) ?></span>
        </div>
    </div>
</article>