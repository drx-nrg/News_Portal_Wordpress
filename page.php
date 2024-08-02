<?php get_header(); ?>
<?php
$categories = get_categories(array(
    'number' => 0,
    'hide_empty' => false
));
$colors = ['bg-success', 'bg-danger', 'bg-warning', 'bg-primary', 'bg-dark', 'bg-info'];

$categories_colors = [];

$idx = 0;
foreach ($categories as $category) {
    if ($idx <= count($colors) - 1) {
        $categories_colors[$category->name] = $colors[$idx];
        $idx++;
    } else {
        $categories_colors[$category->name] = $colors[3];
    }
}
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
        $current_url = explode("/", get_current_url());
        if ($current_url[count($current_url) - 1] == "indeks") :
        ?>
            <div class="container-fluid mb-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="fw-semibold fs-2">Indeks Berita</h1>
                        <p class="text-secondary">Cari berita melalui waktu terbit dan kanal tertentu</p>
                    </div>
                </div>
                <form action="" method="get" class="row">
                    <div class="col-md-4">
                        <input type="date" name="date" id="date" class="form-control" value="<?= $_GET["date"] ?? date('Y-m-d') ?>">
                    </div>
                    <div class="col-md-4">
                        <?php $categories = get_categories(array(
                            'number' => 0,
                            'hide_empty' => false
                        ));
                        ?>
                        <select name="category" id="category" class="form-select" value="<?= $_GET["category"] ?? $categories[0]->slug ?>">
                            <?php
                            foreach ($categories as $category) {
                                echo "<option value='$category->slug'>$category->name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-success" type="submit"><i class="bi bi-check-circle"></i> Terapkan</button>
                    </div>
                </form>
                <div class="row mt-5">
                    <?php
                    $categories = get_categories(array(
                        'number' => 0,
                        'hide_empty' => false
                    ));

                    $category = $_GET["category"] ?? $categories[0]->slug;
                    $date = $_GET["date"] ?? date('Y-m-d');

                    $date = explode('-', $date);

                    $year = intval($date[0]);
                    $month = intval($date[1]);
                    $day = intval($date[2]);

                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => -1,
                        'category_name' => $category,
                        'date_query' => array(
                            array(
                                'year'  => $date,
                                'month' => $month,
                                'day'   => $day,
                            ),
                        ),
                    );

                    $index_posts = new WP_Query($args);
                    ?>
                    <div class="col-md-8">
                        <?php if ($index_posts->have_posts()) : while ($index_posts->have_posts()) : $index_posts->the_post() ?>
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
                                                foreach ($categories as $category) {
                                                    echo '<span class="text-white ' . $categories_colors[$category->name] . ' fw-semibold" style="padding: 5px 20px 5px 15px; clip-path: polygon(0 0, 100% 0, 90% 100%, 0% 100%);">' . esc_html($category->name) . '</span>';
                                                }
                                            }
                                            ?>
                                        </div>
                                        <h1 class="card-title mb-2 fs-3"> <a href="<?php the_permalink() ?>" class="post-title text-dark text-decoration-none"><?php the_title(); ?></a></h1>
                                        <div class="d-flex flex-wrap align-items-center mb-2 fs-5 text-secondary">
                                            <i class="bi bi-person me-2"></i>
                                            <span class="me-3">Oleh <a href="<?= get_author_posts_url(get_the_author_meta('ID')) ?>" class="text-decoration-none"><?php the_author(); ?></a></span>
                                            <i class="bi bi-calendar me-2"></i>
                                            <span class="me-3"><?= diffForHumans(strtotime(get_the_date('j F, Y'))) ?></span>
                                        </div>
                                    </div>
                                </article>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <?php get_sidebar() ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="container-fluid">
                <div class="row d-flex flex-row">
                    <article id="post-<?php the_ID(); ?>" class="col-md-8">
                        <header class="header text-center">
                            <h1 class="entry-title fw-bolder" itemprop="name"><?php the_title(); ?></h1>
                            <?php edit_post_link(); ?>
                        </header>
                        <div class="entry-content mt-3 d-flex flex-row gap-3 flex-wrap" style="min-width: 600px;" itemprop="mainContentOfPage">
                            <div class="post-thumbnail" style="max-width: 50%; max-height: 50%;">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium', array('itemprop' => 'image'));
                                } ?>
                            </div>
                            <div class="text-content float-left fs-5" style="flex: 1;">
                                <?php the_content(); ?>
                            </div>
                            <div class="entry-links"><?php wp_link_pages(); ?></div>
                        </div>
                    </article>
                    <div class="col-md-4">
                        <?php get_sidebar() ?>
                    </div>
                </div>
            </div>
            <?php if (comments_open() && !post_password_required()) {
                comments_template('', true);
            } ?>
        <?php endif; ?>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>