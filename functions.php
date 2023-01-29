<?php

// const PAGE_HOME_ID = 7;
const PAGE_HOME_ID = 6;

// const PAGE_PRIVACY_TERMS_ID = 18;
const PAGE_PRIVACY_TERMS_ID = 8;

// hability menu
add_theme_support("menus");

// custom logo
function theme_custom_logo_setup()
{
    $defaults = array(
        'height'               => 26,
        'width'                => 132,
        'flex-height'          => false,
        'flex-width'           => false,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );

    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'theme_custom_logo_setup');

// remove fields
remove_action("wp_head", "rsd_link");
remove_action("wp_head", "wlwmanifest_link");
remove_action("wp_head", "start_post_rel_link", 10, 0);
remove_action("wp_head", "adjacend_posts_rel_link_wp_head", 10, 0);
remove_action("wp_head", "feed_links_extra", 3);
remove_action("wp_head", "wp_generator");
remove_action("wp_head", "print_emoji_detection_script", 7);
remove_action("admin_print_scripts", "print_emoji_detection_script");
remove_action("wp_print_styles", "print_emoji_styles");
remove_action("admin_print_styles", "print_emoji_styles");

/**
 * 
 * 
 * 
 * CMB2
 * 
 * 
 * 
 */

/**
 * 
 * CMB2: SEO PAGE
 * 
 */
add_action('cmb2_admin_init', 'cmb2_page_seo_fields');
function cmb2_page_seo_fields()
{
    $cmb = new_cmb2_box(array(
        'id'            => 'page_seo_fields',
        'title'         => __('SEO DA PÁGINA', 'cmb2'),
        'object_types'  => array('page', 'post'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'closed'     => true, // Keep the metabox closed by default
    ));

    $cmb->add_field(array(
        'name'       => __('Indexar', 'cmb2'),
        'desc'       => __('Permitir indexação desta página aos mecanismos de busca', 'cmb2'),
        'id'         => 'page_seo_index_follow',
        'type'       => 'checkbox',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
    ));

    $cmb->add_field(array(
        'name'       => __('Título da página', 'cmb2'),
        'desc'       => __('', 'cmb2'),
        'id'         => 'page_seo_title',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
    ));

    $cmb->add_field(array(
        'name'       => __('Capa da página', 'cmb2'),
        'desc'       => __('', 'cmb2'),
        'id'         => 'page_seo_cover',
        'type'       => 'file',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
    ));

    $cmb->add_field(array(
        'name'       => __('Descrição da página', 'cmb2'),
        'desc'       => __('Uma descrição para ajudar mecanismos de busca(como o Google) encontra esta página.', 'cmb2'),
        'id'         => 'page_seo_desc',
        'type'       => 'textarea_small',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
    ));
}

/**
 * 
 * CMB2: HOME PAGE MANAGER
 * 
 */
add_action('cmb2_admin_init', 'cmb2_home_page_sections_manager');
function cmb2_home_page_sections_manager()
{
    /**
     * BANNER
     */
    $banner = new_cmb2_box(array(
        'id'            => 'banner_section_fields',
        'title'         => __('SEÇÃO BANNER', 'cmb2'),
        'object_types'  => array('page'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'closed'     => true, // Keep the metabox closed by default
        'show_on'      => array(
            'id' => array(PAGE_HOME_ID),
        )
    ));

    $banner->add_field([
        'id' => 'banner_section_image',
        'name' => 'Imagem do banner',
        'desc' => '',
        'type' => 'file'
    ]);

    $banner->add_field([
        'id' => 'banner_section_title',
        'name' => 'Título do banner',
        'desc' => '',
        'type' => 'text'
    ]);

    $banner->add_field([
        'id' => 'banner_section_desc',
        'name' => 'Descrição do banner',
        'desc' => '',
        'type' => 'textarea_small'
    ]);

    /**
     * SKILLS
     */
    $skills = new_cmb2_box(array(
        'id'            => 'skills_section_fields',
        'title'         => __('SEÇÃO HABILIDADES', 'cmb2'),
        'object_types'  => array('page'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'closed'     => true, // Keep the metabox closed by default
        'show_on'      => array(
            'id' => array(PAGE_HOME_ID),
        )
    ));

    $skills->add_field([
        'id' => 'skills_section_title',
        'name' => 'Título da seção',
        'desc' => '',
        'type' => 'text'
    ]);

    /**
     * SKILLS GROUP
     */
    $skills_list_id = $skills->add_field([
        'id'          => 'skills_section_skills_items',
        'type'        => 'group',
        'description' => esc_html__('', 'cmb2'),
        'options'     => array(
            'group_title'    => esc_html__('Habilidade {#}', 'cmb2'), // {#} gets replaced by row number
            'add_button'     => esc_html__('Adicionar habilidade', 'cmb2'),
            'remove_button'  => esc_html__('Remover habilidade', 'cmb2'),
            'sortable'       => true,
            'closed'      => true, // true to have the groups closed by default
            'remove_confirm' => esc_html__('Tem certeza de que quer excluir este item?', 'cmb2'), // Performs confirmation before removing group.
        )
    ]);

    $skills->add_group_field($skills_list_id, [
        'id'         => 'skills_item_icon',
        'name'       => esc_html__('Ícone da habilidade', 'cmb2'),
        'desc'         => 'Tag HTML do ícone. Encontrole o ícone <a href="https://icons.getbootstrap.com" target="_blank">aqui</a>',
        'type'       => 'text'
    ]);

    $skills->add_group_field($skills_list_id, [
        'name'       => esc_html__('Título da habilidade', 'cmb2'),
        'id'         => 'skills_item_title',
        'type'       => 'text'
    ]);

    $skills->add_group_field($skills_list_id, [
        'name'       => esc_html__('Descrição da habilidade', 'cmb2'),
        'id'         => 'skills_item_desc',
        'type'       => 'textarea_small'
    ]);

    /**
     * JOBS
     */
    $jobs = new_cmb2_box(array(
        'id'            => 'jobs_section_fields',
        'title'         => __('SEÇÃO PORTFÓLIO', 'cmb2'),
        'object_types'  => array('page'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'closed'     => true, // Keep the metabox closed by default
        'show_on'      => array(
            'id' => array(PAGE_HOME_ID),
        )
    ));

    $jobs->add_field([
        'id' => 'jobs_section_title',
        'name' => 'Título da seção',
        'desc' => '',
        'type' => 'text'
    ]);

    /**
     * jobs GROUP
     */
    $jobs_list_id = $jobs->add_field([
        'id'          => 'jobs_section_jobs_items',
        'type'        => 'group',
        'description' => esc_html__('', 'cmb2'),
        'options'     => array(
            'group_title'    => esc_html__('Trabalho {#}', 'cmb2'), // {#} gets replaced by row number
            'add_button'     => esc_html__('Adicionar trabalho', 'cmb2'),
            'remove_button'  => esc_html__('Remover trabalho', 'cmb2'),
            'sortable'       => true,
            'closed'      => true, // true to have the groups closed by default
            'remove_confirm' => esc_html__('Tem certeza de que quer excluir este item?', 'cmb2'), // Performs confirmation before removing group.
        )
    ]);

    $jobs->add_group_field($jobs_list_id, [
        'id'         => 'jobs_item_image',
        'name'       => esc_html__('Imagem da trabalho', 'cmb2'),
        'desc'         => '',
        'type'       => 'file'
    ]);

    $jobs->add_group_field($jobs_list_id, [
        'name'       => esc_html__('Título da trabalho', 'cmb2'),
        'id'         => 'jobs_item_title',
        'type'       => 'text'
    ]);

    $jobs->add_group_field($jobs_list_id, [
        'name'       => esc_html__('Descrição da trabalho', 'cmb2'),
        'id'         => 'jobs_item_desc',
        'type'       => 'textarea_small'
    ]);

    $jobs->add_group_field($jobs_list_id, [
        'name'       => esc_html__('URL(Código fonte)', 'cmb2'),
        'id'         => 'jobs_item_source_url',
        'type'       => 'text'
    ]);

    $jobs->add_group_field($jobs_list_id, [
        'name'       => esc_html__('URL(Previsualização)', 'cmb2'),
        'id'         => 'jobs_item_preview_url',
        'type'       => 'text'
    ]);

    /**
     * CONTACT
     */
    $contact = new_cmb2_box(array(
        'id'            => 'contact_section_fields',
        'title'         => __('SEÇÃO CONTATO', 'cmb2'),
        'object_types'  => array('page'), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'closed'     => true, // Keep the metabox closed by default
        'show_on'      => array(
            'id' => array(PAGE_HOME_ID),
        )
    ));

    $contact->add_field([
        'id' => 'contact_section_title',
        'name' => 'Título da seção',
        'desc' => '',
        'type' => 'text'
    ]);

    $contact->add_field([
        'id' => 'contact_section_desc',
        'name' => 'Descrição da seção',
        'desc' => '',
        'type' => 'textarea_small_small'
    ]);

    /**
     * social links GROUP
     */
    $social_links_id = $contact->add_field([
        'id'          => 'contact_section_social_items',
        'type'        => 'group',
        'description' => esc_html__('', 'cmb2'),
        'options'     => array(
            'group_title'    => esc_html__('Social/link {#}', 'cmb2'), // {#} gets replaced by row number
            'add_button'     => esc_html__('Adicionar social/link', 'cmb2'),
            'remove_button'  => esc_html__('Remover social/link', 'cmb2'),
            'sortable'       => true,
            'closed'      => true, // true to have the groups closed by default
            'remove_confirm' => esc_html__('Tem certeza de que quer excluir este item?', 'cmb2'), // Performs confirmation before removing group.
        )
    ]);

    $contact->add_group_field($social_links_id, [
        'id'         => 'social_link_item_title',
        'name'       => esc_html__('Título', 'cmb2'),
        'desc'         => '',
        'type'       => 'text'
    ]);

    $contact->add_group_field($social_links_id, [
        'id'         => 'social_link_item_url',
        'name'       => esc_html__('URL', 'cmb2'),
        'desc'         => '',
        'type'       => 'text'
    ]);

    $contact->add_group_field($social_links_id, [
        'id'         => 'social_icon_class_item_url',
        'name'       => esc_html__('Ícone', 'cmb2'),
        'desc'         => '',
        'type'       => 'text'
    ]);

    /**
     * freelancer platform links GROUP
     */
    $freelance_platforms_id = $contact->add_field([
        'id'          => 'contact_section_freelancer_platform_items',
        'type'        => 'group',
        'description' => esc_html__('', 'cmb2'),
        'options'     => array(
            'group_title'    => esc_html__('Plataforma freelancer {#}', 'cmb2'), // {#} gets replaced by row number
            'add_button'     => esc_html__('Adicionar Plataforma', 'cmb2'),
            'remove_button'  => esc_html__('Remover Plataforma', 'cmb2'),
            'sortable'       => true,
            'closed'      => true, // true to have the groups closed by default
            'remove_confirm' => esc_html__('Tem certeza de que quer excluir este item?', 'cmb2'), // Performs confirmation before removing group.
        )
    ]);

    $contact->add_group_field($freelance_platforms_id, [
        'id'         => 'freelancer_platform_link_item_title',
        'name'       => esc_html__('Plataforma', 'cmb2'),
        'desc'         => '',
        'type'       => 'text'
    ]);

    $contact->add_group_field($freelance_platforms_id, [
        'id'         => 'freelancer_platform_link_item_url',
        'name'       => esc_html__('URL', 'cmb2'),
        'desc'         => '',
        'type'       => 'text'
    ]);
}
