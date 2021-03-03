<?php

/**
 * Copyright (c) Vincent Klaiber.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/*
 * Plugin Name: Clean UI
 * Description: Take control over the administration dashboard.
 * Author: Vincent Klaiber
 * Author URI: https://vinkla.dev/
 * Version: 1.0.0
 */

function clean_ui_menu_items(): void
{
    remove_menu_page('edit-comments.php'); // Comments
    // remove_menu_page('edit.php?post_type=page'); // Pages
    remove_menu_page('edit.php'); // Posts
    remove_menu_page('index.php'); // Dashboard
    // remove_menu_page('upload.php'); // Media
}

add_action('admin_init', 'clean_ui_menu_items');

function clean_ui_toolbar_items($menu): void
{
    $items = [
        'comments', // Comments
        'customize', // Customize
        'edit', // Edit
        'new-content', // New Content
        'search', // Search
        'updates', // Updates
        // 'site-name', // Site Name
        'view-site', // Visit Site
        'dashboard', // Dashboard
        'themes', // Themes
        'menus', // Menus
        'widgets', // Widgets
        'wp-logo', // WordPress Logo
    ];

    foreach ($items as $item) {
        $menu->remove_node($item);
    }
}

add_action('admin_bar_menu', 'clean_ui_toolbar_items', 999);

function clean_ui_dashboard_widgets(): void
{
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']); // Activity
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // At a Glance
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health']); // Site Health Status
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Events and News
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Draft
}

add_action('wp_dashboard_setup', 'clean_ui_dashboard_widgets');

function clean_ui_logo(): void
{
    $url = get_theme_file_uri('favicon.svg');
    $width = 200;

    $styles = [
        sprintf('background-image: url(%s);', $url),
        sprintf('width: %dpx;', $width),
        'background-position: center;',
        'background-size: contain;',
    ];

    echo sprintf(
        '<style> .login h1 a { %s } </style>',
        implode('', $styles)
    );
}

add_action('login_head', 'clean_ui_logo');

function clean_ui_favicon()
{
    return get_theme_file_uri('favicon.svg');
}

add_filter('get_site_icon_url', 'clean_ui_favicon');
