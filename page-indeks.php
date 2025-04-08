<?php

/* Template Name: Indeks Page */

get_header()
?>
<main id="content" class="site-main">
    <div class="container mt-4" style="padding: 0 1.5rem !important;">
        <div class="row gap-5 gap-md-0">
            <div class="col-md-8">
                <section id="page-indeks" aria-labelledby="page-indeks-header">
                    <header>
                        <div class="row">
                            <div class="col-12">
                                <h1 id="page-indeks-header" class="fw-semibold fs-2 text-dark">Indeks Berita</h1>
                                <p class="text-secondary">Cari berita melalui waktu terbit dan kanal tertentu</p>
                            </div>
                        </div>
                    </header>
                    <div class="row">
                        <form action="" method="get" class="row gap-3 gap-md-0 mb-3">
                            <div class="col-md-4">
                                <input type="date" name="date" id="date" class="form-control bg-white text-dark" value="<?= $_GET["date"] ?? date('Y-m-d') ?>">
                            </div>
                            <div class="col-md-4">
                                <?php $categories = get_categories(array(
                                    'number' => 0,
                                    'hide_empty' => false
                                ));
                                ?>
                                <select name="category" id="category" class="form-select bg-white text-dark" value="<?= $_GET["category"] ?? $categories[0]->slug ?>">
                                    <?php
                                    foreach ($categories as $category) {
                                        $selected = $_GET["category"] == $category->slug ? "selected" : "";
                                        echo "<option value='$category->slug' $selected>$category->name</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button class="btn bg-orange" type="submit"><i class="bi bi-check-circle"></i> Terapkan</button>
                            </div>
                        </form>
                    </div>
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
                    <?php if ($index_posts->have_posts()): ?>
                        <div class="row">
                            <div class="col-12 d-flex flex-column align-items-center px-0">
                                <?php while ($index_posts->have_posts()) : $index_posts->the_post() ?>
                                    <?php get_template_part('entry', 'summary') ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </section>
            </div>
            <div class="col-md-4">
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer() ?>