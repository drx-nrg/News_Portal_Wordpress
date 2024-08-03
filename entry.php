<a href="<?php the_permalink() ?>" class="col-md-4 swiper-slide">
    <div class="card rounded-3 overflow-hidden h-100">
        <?php if (has_post_thumbnail()) : ?>
            <div class="card-img-top position-relative overflow-hidden h-100">
                <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid w-100 object-cover mb-0 rounded-3')); ?>
                <div class="card-img-overlay position-absolute d-flex flex-column justify-content-end align-items-start p-3 bottom-0 h-100">
                    <h5 class="card-title mb-2 fs-5"><?php the_title(); ?></h5>
                </div>
            </div>
        <?php endif; ?>
    </div>
</a>