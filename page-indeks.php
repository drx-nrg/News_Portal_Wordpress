<?php 

/* Template Name: Indeks Page */

get_header() 
?>
<section id="post-index">
    <div class="container-fluid">
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
                        $selected = $_GET["category"] == $category->slug ? "selected" : "";
                        echo "<option value='$category->slug' $selected>$category->name</option>";
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
                        <?php get_template_part('entry', 'summary') ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>