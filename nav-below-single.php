<nav id="nav-below-single" class="navigation post-navigation d-block mb-5" role="navigation">
    <div class="row nav-links d-flex justify-content-between">
        <div class="col-md-6 nav-previous text-decoration-none text-dark">
            <?php if (get_previous_post()) : ?>
                <?= get_previous_post_link('%link', 'Sebelumnya'); ?>
                <p class="fs-5 fw-semibold mt-2"><?= get_previous_post()->post_title ?></p>
            <?php endif; ?>
        </div>
        <div class="col-md-6 nav-next text-decoration-none text-dark d-flex flex-column align-items-end">
            <?php if (get_next_post()) : ?>
                <?= get_next_post_link('%link', 'Selanjutnya'); ?>
                <p class="fs-5 fw-semibold mt-2 text-end"><?= get_next_post()->post_title ?></p>
            <?php endif; ?>
        </div>
    </div>
</nav>
