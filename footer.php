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
                speed: 600,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: true
                },
                slidesPerView: 1,
                effect: 'slide',
                a11y: false,
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

    document.getElementById('backToTopBtn').onclick = () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    if(document.querySelector('.wp-block-search__button'))
        document.querySelector('.wp-block-search__button').classList.add('btn');
    if(document.querySelector('.wp-block-search__button'))
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

    const searchModal = document.getElementById('search-modal');
    const searchModalButton = document.querySelectorAll('#search-modal-btn');

    jQuery(document).ready(function($){
        const emptyNavMain = document.querySelector('.empty-nav-main');
        if(emptyNavMain)
        {
            //
        }
    });

    searchModalButton.forEach((btn) => {
        btn.onclick = () => {
            if(document.querySelector('.modals').classList.contains('modal-active'))
            {
                document.querySelector('.modals').classList.remove('modal-active')
                setTimeout(() => {
                    searchModal.style.opacity = 0;
                    searchModal.style.pointerEvents = 'none';
                }, 500)
            }
            else
            {
                searchModal.style.opacity = 1;
                searchModal.style.pointerEvents = 'auto';
                document.querySelector('.modals').classList.add('modal-active')
            }
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

    const changeNavbarTheme = () => {
        if(isDarkMode)
        {
            document.querySelector('.navbar').classList.add('navbar-dark');
            document.querySelector('.navbar').classList.remove('navbar-light');
        }
        else
        {
            document.querySelector('.navbar').classList.remove('navbar-dark');
            document.querySelector('.navbar').classList.add('navbar-light');
        }
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
        changeNavbarTheme();
        return;
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

    window.addEventListener('resize', changeNavbarTheme)
</script>
</body>

</html>