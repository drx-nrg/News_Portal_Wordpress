<footer style="position: relative;" class="mt-5 site-footer px-5 py-5 bg-white text-dark shadow-sm">
    <div class="container" style="z-index: 20;">
        <div class="row gap-2">
            <div class="col-12 text-center">
                <p class="mb-0 fs-6 fs-lg-6">Copyright &copy; <?php echo date('Y'); ?> <?= get_theme_mod('site-title', get_bloginfo('name')) ?> All rights reserved.</p>
            </div>
            <div class="col-12 text-center">
                <p class="mb-0 fs-6 fs-lg-6">Contact: <?= get_theme_mod('contact_email', 'kabaragribisnis@gmail.com') ?></p>
            </div>
        </div>
    </div>
</footer>

</div>
<?php wp_footer(); ?>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        if(Boolean(<?php echo is_home() ?>) && Number(<?php echo get_query_var('paged') ?? 1 ?>) < 2)
        {
            let headlineSwiper = new Swiper('.headline-post-container', {
                loop: true,
                autoplay: {
                    delay: 5000,
                },
                slidesPerView: 1,
                effect: 'slide',
                a11y: false,
            });
        }
        if(Boolean(<?= get_theme_mod('is_active_slider', true) ?>))
        {
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
        }
    });

    window.addEventListener('scroll', function(){
        if(window.scrollY > 300)
        { 
            document.getElementById('backToTopBtn').style.bottom = '2rem';
            document.getElementById('backToTopBtn').style.opacity = '1';
        }
        else
        {
            document.getElementById('backToTopBtn').style.bottom = '0rem';
            document.getElementById('backToTopBtn').style.opacity = '0';
        }
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
        $(`<li class="menu-item-199"><button class="btn bg-orange w-100" id="search-modal-btn" role="button" aria-label="Buka pencarian">
    <i class="bi bi-search"></i>
</button>
</li>`).clone(true).appendTo('#menu-page-menu');

        const emptyNavMain = document.querySelector('.empty-nav-main');
        if(emptyNavMain)
        {
            $(`<li class="menu-item-199"><button class="btn bg-orange w-100" id="search-modal-btn" role="button" aria-label="Buka pencarian">
                <i class="bi bi-search"></i>
            </button>
            </li>`).clone(true).appendTo('.empty-nav-main');
        }

        $('#search-modal-btn').click(function(){
            $('#search-modal').css('opacity', '1');
            $('#search-modal').css('pointer-events', 'auto');
            setTimeout(() => {
                $('.modals').addClass('modal-active');
            }, 500)
        });
        
    });


    searchModalButton.forEach((btn) => {
        btn.onclick = () => {
            document.querySelector('.modals').classList.remove('modal-active')
            setTimeout(() => {
                searchModal.style.opacity = searchModal.style.opacity == 1 ? 0 : 1;
                searchModal.style.pointerEvents = searchModal.style.pointerEvents == 'none' ? 'auto' : 'none';
            }, 500)
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

    let isOpen = false;
    document.querySelectorAll('#toggle-sidebar-btn').forEach((item, i) => {
        item.onclick = () => {
            if(!isOpen)
            {
                const sidebar = document.querySelector('.sidebar-wrapper');
                sidebar.classList.toggle('active-sidebar');
                setTimeout(() => {
                    document.querySelector('.category-menu-sidebar').style.transform = "translate(0px, 0px)";
                    isOpen = true;
                }, 400);
            }
            else
            {
                document.querySelector('.category-menu-sidebar').style.transform = "translate(400px, 0px)";
                setTimeout(() => {
                    const sidebar = document.querySelector('.sidebar-wrapper');
                    sidebar.classList.toggle('active-sidebar');
                    isOpen = false;
                }, 300)
            }
        }
    });

    if(Boolean(<?php echo is_single() ?>))
    {
        document.querySelectorAll('#copyBtn').forEach(item => {
            item.onclick = () => {
                const copyText = document.querySelector('.permalink-share');
                copyText.select();
                copyText.setSelectionRange(0, 99999)
                document.execCommand('copy');
                alert("Link berhasil disalin!")
            }
        })
    }

    const changeMode = () => {
        if(isDarkMode)
        {
            let style = document.getElementById('modeStyle');
            if(!style)
            {
                style = document.createElement('style');
                style.setAttribute('id', 'modeStyle');
                document.head.appendChild(style);
            }
            style.innerHTML = `
                :root{
                    --bs-border-color: rgb(113, 118, 123);
                }
                .bg-white{
                    background-color: rgba(0,0,0,0.9) !important;
                }
                .text-white{
                    color: dark !important;
                }
                .text-dark{
                    color: white !important;
                }
                .text-secondary{
                    color: var(--bs-border-color) !important;
                }
                .bg-light{
                    background-color: rgba(0,0,0,0.9) !important;
                }
                .menu-item a {
                    color: white !important;
                }
                input::placeholder, textarea::placeholder{
                    color: var(--bs-border-color) !important;
                }
                input{
                    color: white !important;
                }
                a{
                    color: white !important;
                }
                .pagination :is(.page-numbers:not(.current))
                {
                    background-color: rgba(0,0,0,0.9) !important;
                    color: var(--primary) !important;
                }
            `;
        }
        else
        {
            if(document.getElementById('modeStyle'))
            {
                document.getElementById('modeStyle').innerHTML = '';
            }
        }
    }

    let isDarkMode = Boolean(JSON.parse(localStorage['isDarkMode'] || 'false'));
    if(isDarkMode)
    {
        document.getElementById('darkMode').style.opacity = '1';
        document.getElementById('lightMode').style.opacity = '0';
        changeMode();
    }
    else
    {
        document.getElementById('darkMode').style.opacity = '0';
        document.getElementById('lightMode').style.opacity = '1';
        changeMode();
    }
    document.getElementById('toggleMode').onclick = () => {
        isDarkMode = !isDarkMode;
        localStorage['isDarkMode'] = isDarkMode;
        if(isDarkMode)
        {
            document.getElementById('darkMode').style.opacity = '1';
            document.getElementById('lightMode').style.opacity = '0';
            changeMode()
        }
        else
        {
            document.getElementById('darkMode').style.opacity = '0';
            document.getElementById('lightMode').style.opacity = '1';
            changeMode()
        }
    }
</script>
</body>

</html>