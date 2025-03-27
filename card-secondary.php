<article class="col-md-12 card-secondary d-flex align-items-center text-decoration-none text-dark border-bottom pb-2 <?= $args["mb"] ? "mb-4" : "" ?>" style="height: 120px;">
    <div class="d-flex flex-row gap-3">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink() ?>" class="d-block overflow-hidden rounded-1 p-0" style="height: 100px; min-width: 150px;">
                <?php the_post_thumbnail('medium', array('class' => 'mb-0', 'style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
            </a>
        <?php endif; ?>
        <div class="mt-3 mt-md-0">
            <h1 class="card-title mb-2"> <a href="<?php the_permalink() ?>" class="post-title text-dark text-decoration-none fs-6"><?= limit_words(get_the_title(), 5) ?></a></h1>
            <div class="d-flex flex-wrap align-items-center mb-2 text-dark">
                <span class="me-3"><?php echo diffForHumans(strtotime(get_the_date('c'))) ?></span>
            </div>
        </div>
    </div>
</article>