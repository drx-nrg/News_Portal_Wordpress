<nav id="breadcrumb" aria-label="breadcrumb" class="text-secondary d-flex align-items-center gap-2 fw-semibold">
    <ol class="breadcrumb d-flex gap-1" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="<?php echo home_url() ?>" class="text-decoration-none text-secondary" itemprop="item">
                <span itemprop="name">Beranda</span>
            </a>
            <meta itemprop="position" content="1" />
        </li>
        <?php if($args["type"] == "post"): ?>
            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m14.83 11.29l-4.24-4.24a1 1 0 0 0-1.42 0a1 1 0 0 0 0 1.41L12.71 12l-3.54 3.54a1 1 0 0 0 0 1.41a1 1 0 0 0 .71.29a1 1 0 0 0 .71-.29l4.24-4.24a1 1 0 0 0 0-1.42"/></svg></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?php echo get_category_link($args["category"]) ?>" class="text-decoration-none text-secondary" itemprop="item">
                    <span itemprop="name"><?php echo esc_html($args["category"]->name) ?></span>
                </a>
                <meta itemprop="position" content="2" />
            </li>
            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m14.83 11.29l-4.24-4.24a1 1 0 0 0-1.42 0a1 1 0 0 0 0 1.41L12.71 12l-3.54 3.54a1 1 0 0 0 0 1.41a1 1 0 0 0 .71.29a1 1 0 0 0 .71-.29l4.24-4.24a1 1 0 0 0 0-1.42"/></svg></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <span itemprop="name"><?php echo esc_html($args["title"]) ?></span>
                <meta itemprop="position" content="3" />
            </li>
        <?php elseif($args['type'] == 'page'): ?>
            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m14.83 11.29l-4.24-4.24a1 1 0 0 0-1.42 0a1 1 0 0 0 0 1.41L12.71 12l-3.54 3.54a1 1 0 0 0 0 1.41a1 1 0 0 0 .71.29a1 1 0 0 0 .71-.29l4.24-4.24a1 1 0 0 0 0-1.42"/></svg></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <span itemprop="name"><?php echo esc_html($args["title"]) ?></span>
                <meta itemprop="position" content="2" />
            </li>
        <?php elseif($args['type'] == 'category'): ?>
            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m14.83 11.29l-4.24-4.24a1 1 0 0 0-1.42 0a1 1 0 0 0 0 1.41L12.71 12l-3.54 3.54a1 1 0 0 0 0 1.41a1 1 0 0 0 .71.29a1 1 0 0 0 .71-.29l4.24-4.24a1 1 0 0 0 0-1.42"/></svg></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?php echo get_category_link($args["category"]) ?>" class="text-decoration-none text-secondary" itemprop="item">
                    <span itemprop="name"><?php echo esc_html($args["category"]->name) ?></span>
                </a>
                <meta itemprop="position" content="2" />
            </li>
        <?php elseif($args['type'] == 'author'): ?>
            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m14.83 11.29l-4.24-4.24a1 1 0 0 0-1.42 0a1 1 0 0 0 0 1.41L12.71 12l-3.54 3.54a1 1 0 0 0 0 1.41a1 1 0 0 0 .71.29a1 1 0 0 0 .71-.29l4.24-4.24a1 1 0 0 0 0-1.42"/></svg></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?php echo $args['author_link'] ?>" class="text-decoration-none text-secondary" itemprop="item">
                    <span itemprop="name"><?php echo 'Arsip untuk '.esc_html($args["author_name"]) ?></span>
                </a>
                <meta itemprop="position" content="2" />
            </li>
        <?php elseif($args['type'] == 'archive'): ?>
            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m14.83 11.29l-4.24-4.24a1 1 0 0 0-1.42 0a1 1 0 0 0 0 1.41L12.71 12l-3.54 3.54a1 1 0 0 0 0 1.41a1 1 0 0 0 .71.29a1 1 0 0 0 .71-.29l4.24-4.24a1 1 0 0 0 0-1.42"/></svg></li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?php echo $args['archive_url'] ?>" class="text-decoration-none text-secondary" itemprop="item">
                    <span itemprop="name"><?php echo esc_html($args["archive_title"]) ?></span>
                </a>
                <meta itemprop="position" content="2" />
            </li>
        <?php endif; ?>
    </ol>
</nav>

