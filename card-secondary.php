<article class="col-md-12 d-flex align-items-center text-decoration-none text-dark border-bottom pb-2 <?= $args["mb"] ? "mb-4" : "" ?>">
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink() ?>" class="col-md-4 d-block post-thumbnail overflow-hidden rounded-1 border p-0" style="height: 100px;">
            <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid w-100 object-cover mb-0')); ?>
        </a>
    <?php endif; ?>
    <div class="col-md-8 mt-3 mt-md-0 px-4">
        <h1 class="card-title mb-2 fs-5"> <a href="<?php the_permalink() ?>" class="post-title text-dark text-decoration-none"><?= limit_words(get_the_title(), 5) ?></a></h1>
        <div class="d-flex flex-wrap align-items-center mb-2 text-dark">
            <span class="me-3"><?php echo diffForHumans(strtotime(get_the_date('j F, Y'))) ?></span>
        </div>
    </div>
</article>