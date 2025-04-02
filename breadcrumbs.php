<nav aria-label="breadcrumb" class="text-dark d-flex align-items-center gap-2">
    <ol class="breadcrumb d-flex gap-2" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="<?= home_url() ?>" class="text-decoration-none text-dark" itemprop="item">
                <span itemprop="name">Beranda</span>
            </a>
            <meta itemprop="position" content="1" />
        </li>
        <?php if($args["type"] == "post"): ?>
            <li><i class="bi bi-chevron-double-right fs-6"></i></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?= get_category_link($args["category"]) ?>" class="text-decoration-none text-dark" itemprop="item">
                    <span itemprop="name"><?= esc_html($args["category"]->name) ?></span>
                </a>
                <meta itemprop="position" content="2" />
            </li>
            <li><i class="bi bi-chevron-double-right fs-6"></i></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <span itemprop="name"><?= esc_html($args["title"]) ?></span>
                <meta itemprop="position" content="3" />
            </li>
        <?php elseif($args['type'] == 'page'): ?>
            <li><i class="bi bi-chevron-double-right fs-6"></i></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <span itemprop="name"><?= esc_html($args["title"]) ?></span>
                <meta itemprop="position" content="2" />
            </li>
        <?php elseif($args['type'] == 'category'): ?>
            <li><i class="bi bi-chevron-double-right fs-6"></i></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?= get_category_link($args["category"]) ?>" class="text-decoration-none text-dark" itemprop="item">
                    <span itemprop="name"><?= esc_html($args["category"]->name) ?></span>
                </a>
                <meta itemprop="position" content="2" />
            </li>
        <?php elseif($args['type'] == 'author'): ?>
            <li><i class="bi bi-chevron-double-right fs-6"></i></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?= $args['author_link'] ?>" class="text-decoration-none text-dark" itemprop="item">
                    <span itemprop="name"><?= esc_html($args["author_name"]) ?></span>
                </a>
                <meta itemprop="position" content="2" />
            </li>
        <?php endif; ?>
    </ol>
</nav>

