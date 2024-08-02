<a href="<?php the_permalink() ?>" class="col-md-6 mb-4">
    <div class="card h-100 rounded-3 overflow-hidden">
        <?php if (has_post_thumbnail()) : ?>
            <div class="card-img-top h-100 position-relative overflow-hidden">
                <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100 object-cover mb-0 rounded-3')); ?>
                <div class="card-img-overlay position-absolute d-flex flex-column justify-content-end align-items-start p-3 bottom-0">
                    <div class="mb-2">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            echo '<span class="text-white bg-success fw-semibold" style="padding: 5px 20px 5px 15px; clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);">' . esc_html($categories[0]->name) . '</span>';
                        }
                        ?>
                    </div>
                    <h5 class="card-title mb-2 fs-3"><?php the_title(); ?></h5>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-person me-2"></i>
                        <span class="me-3">Oleh <?php the_author(); ?></span>
                        <i class="bi bi-calendar me-2"></i>
                        <span><?php echo get_the_date('j F, Y'); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</a>