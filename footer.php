</main>
</div>
<style>
    .page-list {
        list-style: none;
        list-style-position: outside;
        padding: 0;
    }

    .page-list li a {
        color: #6c757d;
        font-weight: normal;
        font-size: 1.25rem;
    }
</style>
<footer class="mt-5 site-footer px-5 py-5 bg-light text-dark" role="complementary">
    <div class="container">
        <div class="row d-flex align-items-start gap-5 gap-md-0 border-bottom pb-2">
            <div class="col-md-3">
                <h1 class="text-dark fs-3"><?= get_theme_mod('site-title', "KabarAgribisnis.com") ?></h1>
                <p class="text-secondary fs-5"><?= get_theme_mod('site-description', "Mengabarkan berita terkait Agribisnis dari sumber terpercaya") ?></p>
                <ul class="d-flex flex-row gap-3 p-0 m-0" style="list-style: none; list-style-position: inside;">
                    <li><a href="https://instagram.com/<?= get_theme_mod("instagram_username", "username") ?>" class="text-secondary fs-3"><i class="bi bi-instagram"></i></a></li>
                    <li><a href="https://facebook.com/<?= get_theme_mod("facebook_username", "username") ?>" class="text-secondary fs-3"><i class="bi bi-facebook"></i></a></li>
                    <li><a href="https://youtube.com/" class="text-secondary fs-3"><i class="bi bi-youtube"></i></a></li>
                    <li><a href="https://x.com/" class="text-secondary fs-3"><i class="bi bi-twitter"></i></a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h1 class="fs-3">Informasi</h1>
                <ul class="p-0 m-0 d-flex flex-column gap-2" style="list-style: none; list-style-position: inside;">
                    <?php
                    $categories = get_categories(array(
                        'number' => 0,
                        'hide_empty' => false
                    ));

                    for ($i = 0; $i < 4; $i++) :
                    ?>
                        <li><a href="<?php get_category_link($categories[$i]) ?>" class="fs-5 text-decoration-none text-secondary"><?= $categories[$i]->name ?></a></li>
                    <?php endfor; ?>
                </ul>
            </div>
            <div class="col-md-3">
                <h1 class="fs-3">Informasi</h1>
                <?php wp_nav_menu(array(
                    'theme_location' => 'page-menu',
                    'menu_class' => 'page-list d-flex flex-column gap-2',
                    'container' => 'ul'
                )) ?>
            </div>
            <div class="col-md-3">
                <h1 class="fs-3">Address</h1>
                <p class="fs-5 text-secondary">Jl. Papanggo 3 Tanjung Priok Jakarta Utara, DKI Jakarta, Indonesia</p>
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

        let oldestNewsSwiper = new Swiper('.oldest-swiper-container', {
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

    const searchModal = document.getElementById('search-modal');
    const searchModalButton = document.querySelectorAll('#search-modal-btn');

    searchModalButton.forEach((btn) => {
        btn.onclick = () => {
            searchModal.style.display = searchModal.style.display === "flex" ? "none" : "flex";
        }
    });

    const cards = document.querySelectorAll('.card-secondary');

    cards.forEach((card) => {
        card.addEventListener('mouseenter', () => {
            const image = card.querySelector('.wp-post-image');
            image.style.transform = "scale(1.3)";
        });

        card.addEventListener('mouseleave', () => {
            const image = card.querySelector('.wp-post-image');
            image.style.transform = "scale(1.0)";
        });
    })

</script>
</body>

</html>