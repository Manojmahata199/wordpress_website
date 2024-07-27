<?php
/*This file is part of HardNews child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

function newschrome_enqueue_child_styles()
{
    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    $parent_style = 'chromenews-style';
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap' . $min . '.css');
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'newschrome',
        get_stylesheet_directory_uri() . '/style.css',
        array('bootstrap', $parent_style),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'newschrome_enqueue_child_styles');

function newschrome_override_banner_advertisment_function()
{

    remove_action('chromenews_action_header_section', 'chromenews_header_section', 40);
}

add_action('wp_loaded', 'newschrome_override_banner_advertisment_function');


if (!function_exists('newschrome_header_section')) :
    /**
     * Banner Slider
     *
     * @since ChromeNews 1.0.0
     *
     */
    function newschrome_header_section()
    { ?>

        <header id="masthead" class="header-layout-side chromenews-header">
            <?php
            chromenews_get_block('layout-default', 'header');

            ?>

        </header>

        <!-- end slider-section -->
<?php
    }
endif;
add_action('chromenews_action_header_section', 'newschrome_header_section', 40);



function newschrome_filter_default_theme_options($defaults)
{
    $defaults['site_title_font_size'] = 38;
    $defaults['header_layout'] = 'header-layout-default';
    $defaults['enable_site_mode_switch'] = 'aft-disable-mode-switch';
    $defaults['select_main_banner_layout_section'] = 'layout-vertical';
    $defaults['global_single_content_mode'] = 'single-content-mode-compact';
    $defaults['single_show_tags_list'] = 0;
    $defaults['main_navigation_custom_background_color'] = '#000000';
    $defaults['secondary_color'] = '#EE2224';
    $defaults['text_over_secondary_color'] = '#fff';
    $defaults['post_title_font']    = 'secondary';
    $defaults['global_font_size'] = 14;
    $defaults['chromenews_section_title_font_size']    = 20;
    $defaults['global_widget_title_border'] = 'widget-title-background-side';
    $defaults['global_post_title_hover'] = 'hover-title-secondary-color';



    return $defaults;
}
add_filter('chromenews_filter_default_theme_options', 'newschrome_filter_default_theme_options', 1);

function newschrome_setup()
{
    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('chromenews_custom_background_args', array(
        'default-color' => 'f9f9f9',
        'default-image' => '',
    )));
}
add_action('after_setup_theme', 'newschrome_setup');
