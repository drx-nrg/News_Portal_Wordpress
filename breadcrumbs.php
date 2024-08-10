<?php if ($args["type"] == "post") : ?>
    <nav aria-label="breadcrumb" class="fs-5 text-secondary d-flex align-items-center gap-2" itemscope itemtype="http://schema.org/BreadcrumbList">
        <ol class="breadcrumb d-flex gap-2">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?= home_url() ?>" class="text-decoration-none text-secondary" itemprop="item">
                    <span itemprop="name">Beranda</span>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li><i class="bi bi-chevron-double-right fs-6"></i></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?= get_category_link($args["category"]) ?>" class="text-decoration-none text-secondary" itemprop="item">
                    <span itemprop="name"><?= esc_html($args["category"]->name) ?></span>
                </a>
                <meta itemprop="position" content="2" />
            </li>
            <li><i class="bi bi-chevron-double-right fs-6"></i></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <span itemprop="name"><?= esc_html($args["title"]) ?></span>
                <meta itemprop="position" content="3" />
            </li>
        </ol>
    </nav>
<?php else : ?>
    <nav aria-label="breadcrumb" class="fs-5 text-secondary d-flex align-items-center gap-2" itemscope itemtype="http://schema.org/BreadcrumbList">
        <ol class="breadcrumb d-flex gap-2">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?= home_url() ?>" class="text-decoration-none text-secondary" itemprop="item">
                    <span itemprop="name">Beranda</span>
                </a>
                <meta itemprop="position" content="1" />
            </li>
            <li><i class="bi bi-chevron-double-right fs-6"></i></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <span itemprop="name"><?= esc_html($args["title"]) ?></span>
                <meta itemprop="position" content="2" />
            </li>
        </ol>
    </nav>
<?php endif; ?>
