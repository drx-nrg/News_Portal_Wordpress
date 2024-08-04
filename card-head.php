<div class="col-md-6 card mb-0 p-0 bg-white rounded-2 border-0 overflow-hidden">
    <div class="row w-100 border-bottom p-0">
        <div class="col-12 p-0 rounded-2 overflow-hidden" style="height: 300px;">
            <a href="<?php the_permalink() ?>">
                <?php the_post_thumbnail('thumbnail', array('class' => 'img-fluid object-cover w-100')) ?>
            </a>
        </div>
        <div class="col-12 p-4 mb-0">
            <?php 
                $categories = get_the_category();

                foreach($categories as $category):
            ?>
                <p class="text-success text-uppercase mb-1"><?= $category->name ?></p>
            <?php endforeach; ?>
            <h1 class="card-title fs-4"><?= get_the_title() ?></h1>
            <!-- <div class="post-author d-flex gap-2 text-secondary align-items-center">
                <i class="bi bi-person"></i>
                <p class="fs-6 mb-0">Oleh <a href="<? get_author_posts_url(get_the_author_meta('ID')) ?>" class="text-decoration-none"><?php the_author() ?></a></p>
            </div>
            <div class="post-date d-flex gap-2 text-secondary align-items-center">
                <i class="bi bi-calendar"></i>
                <p class="fs-6 mb-0"><?= diffForHumans(strtotime(get_the_date('c'))) ?></p>
            </div> -->
            <div class="text-secondary mt-2"><?php the_excerpt() ?></div>
        </div>
    </div>
</div>