<?php get_header(); ?>
<?php  
    $categories = get_categories(array(
        'number' => 0,
        'hide_empty' => false
    ));
    $colors = ['bg-success', 'bg-danger', 'bg-warning', 'bg-primary', 'bg-dark', 'bg-info'];

    $categories_colors = [];

    $idx = 0;
    foreach($categories as $category){
        if($idx <= count($colors) - 1) {
            $categories_colors[$category->name] = $colors[$idx];
            $idx++;
        }else{
            $categories_colors[$category->name] = $colors[3];
        }
    }
?>
<section id="author">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <header class="header">
                            <?php the_post(); ?>
                            <h1 class="entry-title author text-decoration-none text-dark fs-4" itemprop="name">Menampilkan postingan dari penulis : <span class="fw-semibold"><?php the_author_link(); ?></span></h1>
                            <div class="archive-meta" itemprop="description"><?php if ('' != get_the_author_meta('user_description')) {
                                                                                    echo esc_html(get_the_author_meta('user_description'));
                                                                                } ?></div>
                            <?php rewind_posts(); ?>
                        </header>
                    </div>
                </div>
                <div class="row mt-3">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="row w-100 d-flex align-items-center mb-4 text-decoration-none text-dark mb-3">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink() ?>" class="col-md-4 d-block post-thumbnail overflow-hidden rounded-3">
                                    <?php the_post_thumbnail('medium', array('class' => 'img-fluid w-100 object-cover mb-0')); ?>
                                </a>
                            <?php endif; ?>
                            <div class="col-md-8">
                                <div class="mb-2">
                                    <?php
                                    $categories = get_the_category();
                                    if (!empty($categories)) {
                                        foreach($categories as $category){
                                            echo '<span class="text-white '. $categories_colors[$category->name] .' fw-semibold" style="padding: 5px 20px 5px 15px; clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);">' . esc_html($category->name) . '</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <h1 class="card-title mb-2 fs-3"> <a href="<?php the_permalink() ?>" class="post-title text-dark text-decoration-none"><?php the_title(); ?></a></h1>
                                <div class="d-flex flex-wrap align-items-center mb-2 fs-5">
                                    <i class="bi bi-person me-2"></i>
                                    <span class="me-3">Oleh <a href="<?= get_author_posts_url(get_the_author_meta('ID')) ?>" class="text-decoration-none"><?php the_author(); ?></a></span>
                                    <i class="bi bi-calendar me-2"></i>
                                    <span class="me-3"><?php echo get_the_date('j F, Y'); ?></span>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
</section>
<?php get_template_part('nav', 'below'); ?>
<?php get_footer(); ?>