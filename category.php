<?php get_header(); ?>
<section id="category" class="mt-5">
    <header class="header mb-3">
        <h1 class="category-title bg-orange fs-5" style="clip-path: polygon(0 0, 90% 0, 100% 100%, 0% 100%); padding: 10px 30px 10px 15px; max-width: fit-content;" itemprop="name"><?php single_term_title(); ?></h1>
        <hr class="green-line">
    </header>
    <p class="fs-6 fs-lg-5">Menampilkan postingan dengan kategori <span class="fw-semibold"><?= single_term_title() ?></span>. <a href="<?= home_url() ?>" class="text-decoration-none text-dark">Tampilkan semua postingan</a></p>
    <div class="row d-flex flex-row gap-5 gap-md-0">
        <div class="col-md-8 d-flex flex-column align-items-center">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part('entry', 'summary') ?>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="d-flex flex-column gap-2 gap-md-3">
                    <div class="main-text d-flex flex-column align-items-center">
                        <h1 class="fw-semibold fs-1 mt-5">Not Found</h1>
                        <p class="text-secondary">Berita dengan kategori <?= single_cat_title() ?> tidak ditemukan.</p>
                    </div>
                    <?php get_search_form(['is_white' => true]) ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <?php get_sidebar() ?>
        </div>
    </div>
</section>
<?php get_template_part('nav', 'below'); ?>
<?php get_footer(); ?>