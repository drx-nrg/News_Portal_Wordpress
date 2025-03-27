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
<footer style="position: relative;" class="mt-5 site-footer px-5 py-5 bg-white text-dark shadow-sm" role="complementary">
    <div class="container" style="z-index: 20;">
        <div class="row d-flex flex-wrap align-items-start gap-5 gap-md-0 border-bottom pb-3 pb-md-0">
            <div class="col-md-4 col-lg-3 mb-3 mb-md-5">
                <h1 class="text-dark fs-4 fs-lg-3"><?= get_theme_mod('site-title', "KabarAgribisnis.com") ?></h1>
                <p class="text-secondary fs-6 fs-lg-5"><?= get_theme_mod('site-description', "Mengabarkan berita terkait Agribisnis dari sumber terpercaya") ?></p>
                <ul class="d-flex flex-row gap-3 p-0 m-0" style="list-style: none; list-style-position: inside;">
                    <li><a href="https://instagram.com/<?= get_theme_mod("instagram_link", "Default Link") ?>" class="text-secondary fs-3"><i class="bi bi-instagram"></i></a></li>
                    <li><a href="https://facebook.com/<?= get_theme_mod("facebook_link", "Default Link") ?>" class="text-secondary fs-3"><i class="bi bi-facebook"></i></a></li>
                    <li><a href="https://youtube.com/<?= get_theme_mod("youtube_link", "Default Link") ?>" class="text-secondary fs-3"><i class="bi bi-youtube"></i></a></li>
                    <li><a href="https://x.com/<?= get_theme_mod("twitter_link", "Default Link") ?>" class="text-secondary fs-3"><i class="bi bi-twitter"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 mb-3 mb-md-5">
                <h1 class="fs-4 fs-lg-3">Kategori</h1>
                <ul class="p-0 m-0 d-flex flex-column gap-2" style="list-style: none; list-style-position: inside;">
                    <?php
                    $categories = get_categories(array(
                        'number' => 0,
                        'hide_empty' => false
                    ));

                    for ($i = 0; $i < 4; $i++) :
                    ?>
                        <li><a href="<?php get_category_link($categories[$i]) ?>" class="fs-6 fs-lg-5 text-decoration-none text-secondary"><?= $categories[$i]->name ?></a></li>
                    <?php endfor; ?>
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 mb-0 mb-md-5">
                <h1 class="fs-4 fs-lg-3">Informasi</h1>
                <ul class="p-0 m-0 d-flex flex-column gap-2" style="list-style: none; list-style-position: inside;">

                    <?php  
                        $pages = get_pages([
                            'numberposts' => -1
                        ]);
                        
                        foreach($pages as $page):
                    ?>
                        <li><a href="<?= get_permalink($page->ID) ?>" class="fs-6 fs-lg-5 text-decoration-none text-secondary"><?= $page->post_title ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-4 col-lg-3 mb-3 mb-md-5">
                <h1 class="fs-4 fs-lg-3">Address</h1>
                <p class="fs-6 fs-lg-5 text-secondary"><?= get_theme_mod('address', "Jl. Papanggo 3 Tanjung Priok Jakarta Utara, DKI Jakarta, Indonesia") ?></p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <p class="mb-0 fs-6 fs-lg-6">Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name') ?> All rights reserved.</p>
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
            loop: Boolean(<?= get_theme_mod('is_looping', true) ?>),
            autoplay: {
                delay: Number(<?= get_theme_mod('slider_delay', 3000) ?>)
            },
            slidesPerView: 1,
            spaceBetween: 30,
            effect: 'slide',
            breakpoints: {
                768: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 3
                }
            }
        });
    });

    document.querySelector('.wp-block-search__button').classList.add('btn');
    document.querySelector('.wp-block-search__button').classList.add('bg-orange');

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
        item.classList.add("bg-light");
    });

    // document.querySelectorAll("input[type='button'], button, input[type='submit'").forEach(item => {
    //     item.classList.add('btn')
    //     item.classList.add('btn-success')
    // });

    const searchModal = document.getElementById('search-modal');
    const searchModalButton = document.querySelectorAll('#search-modal-btn');

    jQuery(document).ready(function($){
        $('<button class="btn bg-orange" id="search-modal-btn" role="button"><i class="bi bi-search"></i></button>').clone(true).appendTo('#menu-page-menu');
        $('#search-modal-btn').click(function(){
            $('#search-modal').css('display', 'flex');
            setTimeout(() => {
                $('.modals').addClass('modal-active');
            }, 50)
        });
        
    });


    searchModalButton.forEach((btn) => {
        btn.onclick = () => {
            document.querySelector('.modals').classList.remove('modal-active')
            setTimeout(() => {
                searchModal.style.display = searchModal.style.display === "flex" ? "none" : "flex";
            }, 50)
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

    const dropdowns = document.querySelectorAll('.has-sub-menu');
    console.log(dropdowns);

    dropdowns.forEach((dropdown, i) => {
        const submenu = dropdown.querySelector('.sub-menu');
        
        dropdown.addEventListener('mouseenter', function(){
            submenu.classList.add('sub-menu-active');
        });
        dropdown.addEventListener('mouseleave', function(){
            submenu.classList.remove('sub-menu-active');
        });
    }) 
    
    const sidebarItems = document.querySelectorAll('.has-sub-menu-sidebar');
    const sidebarDropdowns = document.querySelectorAll('.sub-menu-sidebar');
    const sidebarDropdownIcon = document.querySelectorAll('.sub-menu-icon');

    [...Array(sidebarDropdowns.length)].map((_, i) => {
        sidebarItems[i].addEventListener('click', function(){
            sidebarDropdowns[i].classList.toggle('sub-menu-sidebar-active');
            sidebarDropdownIcon[i].classList.toggle('flip-icon');
        });
    })

    document.querySelectorAll('#toggle-sidebar-btn').forEach((item, i) => {
        item.onclick = () => {
            const sidebar = document.querySelector('.sidebar-wrapper');
            sidebar.classList.toggle('active-sidebar');
        }
    });


</script>
</body>

</html>