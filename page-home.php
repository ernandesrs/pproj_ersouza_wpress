<?php

/*
Template Name: Home Page
*/

get_header();

$contact = get_site_page_data("home.contact");

?>

<main class="main">
    <!-- banner -->
    <section class="section section-banner">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 px-5 order-lg-5 pe-lg-2">
                    <img class="img-fluid" data-aos="zoom-out" data-aos-duration="750"
                        src="<?= get_post_meta(get_the_ID(), "banner_section_image", true) ?>"
                        alt="<?= get_post_meta(get_the_ID(), "banner_section_title", true) ?>">
                </div>

                <div class="col-12 col-lg-6 text-center text-lg-start ps-lg-2">
                    <h1 class="section-title" data-aos="zoom-out">
                        <?= get_post_meta(get_the_ID(), "banner_section_title", true) ?>
                    </h1>
                    <p class="py-3 banner-desc" data-aos="zoom-out" data-aos-delay="125">
                        <?= get_post_meta(get_the_ID(), "banner_section_desc", true) ?>
                    </p>
                    <div data-aos="fade-up">
                        <?php

                        $buttons = wp_get_nav_menu_items("menu-do-banner");

                        foreach ($buttons as $button): ?>
                            <a class="btn btn-<?=(get_field("menu_item_contrast", $button->ID) ?? 0) ? "primary" : "outline-primary" ?> mx-1 mb-2"
                                href="<?= $button->url ?>" title="<?= $button->title ?>">
                                <i
                                    class="icon <?= the_field("menu_item_icon_class", $button->ID) ?>"></i>
                                <span class="text">
                                    <?= $button->title ?>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /banner -->

    <!-- skills -->
    <section class="section section-skills" id="skills">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="row pb-3 mb-md-4">
                        <div
                            class="col-12 col-md-11 col-lg-10 col-xl-8 text-center text-md-start">
                            <h1 class="section-title typing pe-5 pe-xl-4">
                                <?= get_post_meta(get_the_ID(), "skills_section_title", true) ?>
                            </h1>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <?php
                        $skills = get_post_meta(get_the_ID(), "skills_section_skills_items", true); foreach ($skills as $key => $skill):
                            ?>
                            <div class="col-10 col-sm-6 col-lg-4 mb-4" data-aos="zoom-out-up"
                                data-aos-delay="<?= $key * 125 ?>"
                                data-aos-duration="<?= $key * 500 ?>">
                                <div class="card card-body h-100 skill-box">
                                    <div class="skill-icon-box">
                                        <?php if (!empty($skill["skills_item_icon"])): ?>
                                            <i class="icon <?= $skill["skills_item_icon"] ?>"></i>
                                        <?php else: ?>
                                            <i class="icon bi bi-app"></i>
                                        <?php endif; ?>
                                    </div>
                                    <div class="skill-content">
                                        <h2 class="skill-title">
                                            <?= $skill["skills_item_title"] ?>
                                        </h2>
                                        <p class="skill-desc">
                                            <?= $skill["skills_item_desc"] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /skills -->

    <!-- portfolio -->
    <section class="section section-portfolio" id="portfolio">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="row justify-content-md-end pb-3 mb-md-4">
                        <div
                            class="col-12 col-md-11 col-lg-10 col-xl-6 text-center text-md-end">
                            <h1 class="section-title typing ps-5 ps-xl-4">
                                <?= get_post_meta(get_the_ID(), "jobs_section_title", true) ?>
                            </h1>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <?php

                        $jobs = get_post_meta(get_the_ID(), "jobs_section_jobs_items", true); foreach ($jobs as $key => $job):
                            ?>
                            <div class="col-10 col-sm-6 col-lg-4 mb-3" data-aos="zoom-in-up"
                                data-aos-delay="<?= $key * 125 ?>"
                                data-aos-duration="<?= $key * 350 ?>">
                                <div class="card card-body h-100 job-box">
                                    <div class="job-image-box">
                                        <img class="img-fluid"
                                            src="<?= $job["jobs_item_image"] ?>"
                                            alt="<?= $job["jobs_item_title"] ?> Image">

                                        <div class="py-2 job-links">
                                            <?php if ($url = $job["jobs_item_preview_url"] ?? null): ?>
                                                <a class="btn btn-sm btn-primary-light"
                                                    href="<?= $url ?>" title="Previsualizar"
                                                    target="_blank">
                                                    <i class="bi bi-eye-fill"></i>
                                                    <span class="text">Preview</span>
                                                </a>
                                            <?php endif; ?>
                                            <?php if ($url = $job["jobs_item_source_url"] ?? null): ?>
                                                <a class="btn btn-sm btn-primary-light"
                                                    href="<?= $url ?>" title="Código fonte"
                                                    target="_blank">
                                                    <i class="bi bi-github"></i>
                                                    <span class="text">Fonte</span>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="job-content">
                                        <h2 class="job-title">
                                            <?= $job["jobs_item_title"] ?>
                                        </h2>
                                        <p class="job-desc">
                                            <?= $job["jobs_item_desc"] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /portfolio -->

    <!-- contact -->
    <section class="section section-contact" id="findme">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-10 col-md-8 col-lg-5 text-center">
                    <h1 class="section-title typing">
                        <?= get_post_meta(get_the_ID(), "contact_section_title", true) ?>
                    </h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-xl-7">
                    <div class="card card-body contacts-box">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-4 mb-md-0">
                                <div class="card card-body bg-transparent">
                                    <p class="fs-6">
                                        Me encontre nestas redes sociais ou via e-mail.
                                    </p>
                                    <ul class="nav profiles flex-column">
                                        <?php

                                        $socialLinks = get_post_meta(get_the_ID(), "contact_section_social_items", true); foreach ($socialLinks ?? [] as $socialLink):
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="<?= $socialLink["social_link_item_url"] ?>"
                                                    title="<?= $socialLink["social_link_item_title"] ?>"
                                                    target="_blank">
                                                    <i
                                                        class="icon <?= $socialLink["social_icon_class_item_url"] ?>"></i>
                                                    <span class="text">
                                                        <?= $socialLink["social_link_item_title"] ?>
                                                    </span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card card-body bg-transparent">
                                    <p class="fs-6">
                                        Também estou nestas plataformas freelancer.
                                    </p>
                                    <ul class="nav freelance flex-column">
                                        <?php

                                        $freelancePlatforms = get_post_meta(get_the_ID(), "contact_section_freelancer_platform_items", true); foreach ($freelancePlatforms ?? [] as $freelance): ?>
                                            <li class="nav-item">
                                                <a class="nav-link"
                                                    href="<?= $freelance["freelancer_platform_link_item_url"] ?>"
                                                    title="<?= $freelance["freelancer_platform_link_item_title"] ?>"
                                                    target="_blank">
                                                    <i
                                                        class="icon bi bi-arrow-up-right-square-fill"></i>
                                                    <span class="text">
                                                        <?= $freelance["freelancer_platform_link_item_title"] ?>
                                                    </span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /contatct -->
</main>

<?php

get_footer();

?>