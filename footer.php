</main>
</div>
<footer class="mt-5 site-footer py-5 bg-light text-dark" role="complementary">
    <div class="container">
        <div class="row d-flex align-items-center gap-5 gap-md-0">
            <div class="col-md-4">
                <h1 class="text-dark fs-2"><?php bloginfo('name') ?></h1>
                <p class="text-secondary fs-5"><?php bloginfo('description') ?></p>
            </div>
            <div class="col-md-4">
                <h1 class="fs-2">Kategori</h1>
                <?php $categories = get_categories(array(
                    'number' => 0,
                    'hide_empty' => false
                )); ?>
                <?php if (!empty($categories)) : ?>
                    <div class="row w-100 d-flex flex-row flex-wrap">
                        <?php foreach ($categories as $category) : ?>
                            <span class="d-block col-md-6"><a href="<?= get_category_link($category) ?>" class="text-decoration-none text-secondary fs-5"><?= $category->name ?></a></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <h1 class="fs-2">Informasi</h1>
                <ul style="list-style: none; list-style-position: inside; margin-left: 0; padding-left: 0;" class="text-decoration-none text-secondary">
                    <li><a href="#" class="text-decoration-none text-secondary fs-5">Hubungi Kami</a></li>
                    <li><a href="#" class="text-decoration-none text-secondary fs-5">Tentang Kami</a></li>
                    <li><a href="#" class="text-decoration-none text-secondary fs-5">Kebijakan Privasi</a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <p class="mb-0 fs-5">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name') ?> All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

</div>
<?php wp_footer(); ?>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        let headlineSwiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 5000,
            },
            slidesPerView: 1,
            spaceBetween: 30,
            effect: 'slide'
        });

        let latestNewsSwiper = new Swiper('.latest-swiper-container', {
            loop: true,
            autoplay: {
                delay: 3000
            },
            slidesPerView: 3,
            spaceBetween: 30,
            effect: 'slide'
        });
    });

    const dropdownMenus = document.querySelectorAll('.menu-item-has-children')
    const dropdownItems = document.querySelectorAll('.menu-item-has-children .sub-menu');

    dropdownMenus.forEach((menu, index) => {
        menu.innerHTML += "<i class='bi bi-chevron-down text-white'></i>"
    });

    dropdownMenus.forEach((menu, index) => {
        const item = menu.querySelector('.sub-menu');
        menu.addEventListener('mouseover', function() {
            item.classList.add('sub-menu-active');
        });
        menu.addEventListener('mouseout', function() {
            item.classList.remove('sub-menu-active');
        });
    });

    document.querySelectorAll("input[type='text'], input[type='search']").forEach(item => {
        item.classList.add("form-control");
    });

    document.querySelectorAll("input[type='button'], button, input[type='submit'").forEach(item => {
        item.classList.add('btn')
        item.classList.add('btn-success')
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
</body>

</html>