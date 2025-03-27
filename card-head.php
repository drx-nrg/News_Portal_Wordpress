<div class="col-md-12 card bg-light mb-0 rounded-2 border-0 overflow-hidden">
    <div class="row border-bottom">
        <div class="col-12 p-0 rounded-2 overflow-hidden" style="height: 300px;">
            <a href="<?php the_permalink() ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid object-cover w-100')) ?>
            </a>
        </div>
        <div class="col-12 py-4 px-2 mb-0">
            <?php 
                $categories = get_the_category();

                foreach($categories as $category):
            ?>
                <a href="<?= get_category_link($category) ?>" class="d-block text-orange text-uppercase mb-1 fw-semibold text-decoration-none"><?= $category->name ?></a>
            <?php endforeach; ?>
            <h1 class="card-title fs-md-5 fs-lg-4"><a href="<?php the_permalink() ?>" class="text-dark text-decoration-none"><?= get_the_title() ?></a></h1>
            <div class="text-secondary mt-2"><?= wp_trim_words(get_the_excerpt(), 10, '...') ?></div>
        </div>
    </div>
</div>