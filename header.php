<?php

require __DIR__ . "/app/config.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <meta name="title"
        content="<?= get_post_meta(get_the_ID(), "page_seo_title", true) ?>">
    <meta name="description"
        content="<?= get_post_meta(get_the_ID(), 'page_seo_description', true) ?>">
    <meta name="robots"
        content="<?= get_post_meta(get_the_ID(), 'page_seo_index_follow', true) == 'on' ? 'index,follow' : 'noindex,nofollow' ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= wp_get_canonical_url(get_the_ID()) ?>">
    <meta property="og:title"
        content="<?= get_post_meta(get_the_ID(), 'page_seo_title', true) ?>">
    <meta property="og:description"
        content="<?= get_post_meta(get_the_ID(), 'page_seo_description', true) ?>">
    <meta property="og:image"
        content="<?= get_post_meta(get_the_ID(), 'page_seo_cover', true) ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?= wp_get_canonical_url(get_the_ID()) ?>">
    <meta property="twitter:title"
        content="<?= get_post_meta(get_the_ID(), 'page_seo_title', true) ?>">
    <meta property="twitter:description"
        content="<?= get_post_meta(get_the_ID(), 'page_seo_description', true) ?>">
    <meta property="twitter:image"
        content="<?= get_post_meta(get_the_ID(), 'page_seo_cover', true) ?>">

    <title>
        <?= get_bloginfo("name") ?> -
        <?= get_post_meta(get_the_ID(), "page_seo_title", true) ?>
    </title>


    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/style.css">
    <link rel="stylesheet"
        href="<?= get_stylesheet_directory_uri() ?>/assets/css/icons.css">
    <link rel="stylesheet"
        href="<?= get_stylesheet_directory_uri() ?>/assets/css/styles.css">
    <link rel="shortcut icon" href="<?= get_site_icon_url() ?>" type="image/x-icon">

    <?= wp_head() ?>
</head>

<body>
    <div class="top-background"></div>

    <!-- header -->
    <header class="d-flex align-items-center header">
        <div class="container">
            <nav class="d-flex align-items-center">
                <a class="logo" href="<?= get_home_url() ?>">
                    <?php
                    $logo = get_custom_logo();
                    if (!empty($logo)):
                        ?>
                        <?= $logo ?>
                    <?php else: ?>
                        <h1 class="fs-6 fw-semibold">
                            <?= get_bloginfo("name") ?>
                        </h1>
                    <?php endif; ?>
                </a>

                <ul class="ms-auto nav">
                    <?php

                    $menu_header = wp_get_nav_menu_items("menu-principal");

                    foreach ($menu_header as $nav): ?>
                        <li class="nav-item">
                            <a href="<?= $nav->url ?>"
                                class="nav-link <?= get_field("menu_item_contrast", $nav->ID, true) ?? false ? "btn btn-primary" : "" ?>">
                                <i
                                    class="icon <?= the_field("menu_item_icon_class", $nav->ID, true) ?>"></i>
                                <span class="text">
                                    <?= $nav->title ?>
                                </span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <button
                    class="btn toggler px-0 text-light-light fs-4 ms-auto d-lg-none bg-transparent">
                    <i class="bi bi-list"></i>
                </button>
            </nav>
        </div>
    </header>
    <!-- /header -->