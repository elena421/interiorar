<?php
/**
 * InteriorAR Child Theme - Functions
 *
 * @package InteriorAR_Child
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'INTERIORAR_CHILD_VERSION', '1.0.0' );
define( 'INTERIORAR_CHILD_DIR', get_stylesheet_directory() );
define( 'INTERIORAR_CHILD_URI', get_stylesheet_directory_uri() );

/**
 * Enqueue scripts and styles
 */
function interiorar_enqueue_assets() {
    // Parent theme stylesheet
    wp_enqueue_style( 
        'generatepress-style', 
        get_template_directory_uri() . '/style.css',
        array(),
        INTERIORAR_CHILD_VERSION
    );
    
    // Child theme stylesheet
    wp_enqueue_style( 
        'interiorar-child-style', 
        get_stylesheet_uri(),
        array( 'generatepress-style' ),
        INTERIORAR_CHILD_VERSION
    );
    
    // Google Fonts
    wp_enqueue_style(
        'interiorar-google-fonts',
        'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&family=IBM+Plex+Mono:wght@400;500&display=swap',
        array(),
        null
    );
    
    // Custom JavaScript
    wp_enqueue_script(
        'interiorar-main-js',
        INTERIORAR_CHILD_URI . '/assets/js/main.js',
        array(),
        INTERIORAR_CHILD_VERSION,
        true
    );
    
    // Localize script with customizer options
    wp_localize_script( 'interiorar-main-js', 'interiorarOptions', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'interiorar_nonce' ),
    ));
}
add_action( 'wp_enqueue_scripts', 'interiorar_enqueue_assets' );

/**
 * Include Customizer settings
 */
require_once INTERIORAR_CHILD_DIR . '/inc/customizer.php';

/**
 * Include Acumbamail integration
 */
require_once INTERIORAR_CHILD_DIR . '/inc/acumbamail.php';

/**
 * Theme setup
 */
function interiorar_theme_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus( array(
        'interiorar-main-menu'   => __( 'InteriorAR Main Menu', 'interiorar-child' ),
        'interiorar-footer-menu' => __( 'InteriorAR Footer Menu', 'interiorar-child' ),
    ));
    
    // Add image sizes
    add_image_size( 'interiorar-hero', 800, 800, false );
    add_image_size( 'interiorar-card', 400, 300, true );
}
add_action( 'after_setup_theme', 'interiorar_theme_setup' );

/**
 * Disable GeneratePress header and footer on landing pages
 */
function interiorar_disable_gp_elements() {
    if ( is_page_template( 'template-landing.php' ) ) {
        remove_action( 'generate_header', 'generate_construct_header' );
        remove_action( 'generate_footer', 'generate_construct_footer' );
    }
}
add_action( 'wp', 'interiorar_disable_gp_elements' );

/**
 * Add body classes
 */
function interiorar_body_classes( $classes ) {
    if ( is_page_template( 'template-landing.php' ) ) {
        $classes[] = 'interiorar-landing';
    }
    return $classes;
}
add_filter( 'body_class', 'interiorar_body_classes' );

/**
 * Custom excerpt length
 */
function interiorar_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'interiorar_excerpt_length' );

/**
 * Custom excerpt more
 */
function interiorar_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'interiorar_excerpt_more' );

/**
 * Shortcode: Newsletter Form (Acumbamail)
 */
function interiorar_newsletter_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'class' => '',
    ), $atts );
    
    ob_start();
    get_template_part( 'template-parts/newsletter-form' );
    return ob_get_clean();
}
add_shortcode( 'interiorar_newsletter', 'interiorar_newsletter_shortcode' );

/**
 * Shortcode: Hero Section
 */
function interiorar_hero_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'tagline'     => get_theme_mod( 'interiorar_hero_tagline', 'Welcome' ),
        'title_faint' => get_theme_mod( 'interiorar_hero_title_faint', '' ),
        'title_accent'=> get_theme_mod( 'interiorar_hero_title_accent', '' ),
        'title_bright'=> get_theme_mod( 'interiorar_hero_title_bright', '' ),
        'description' => get_theme_mod( 'interiorar_hero_description', '' ),
        'image'       => get_theme_mod( 'interiorar_hero_image', '' ),
    ), $atts );
    
    ob_start();
    include INTERIORAR_CHILD_DIR . '/template-parts/hero.php';
    return ob_get_clean();
}
add_shortcode( 'interiorar_hero', 'interiorar_hero_shortcode' );

/**
 * Shortcode: Manifesto Section
 */
function interiorar_manifesto_shortcode( $atts ) {
    ob_start();
    get_template_part( 'template-parts/manifesto' );
    return ob_get_clean();
}
add_shortcode( 'interiorar_manifesto', 'interiorar_manifesto_shortcode' );

/**
 * Shortcode: Ticker/Banner
 */
function interiorar_ticker_shortcode( $atts ) {
    ob_start();
    get_template_part( 'template-parts/ticker' );
    return ob_get_clean();
}
add_shortcode( 'interiorar_ticker', 'interiorar_ticker_shortcode' );

/**
 * Helper function to get customizer option with default
 */
function interiorar_get_option( $key, $default = '' ) {
    return get_theme_mod( 'interiorar_' . $key, $default );
}

/**
 * Sanitize checkbox
 */
function interiorar_sanitize_checkbox( $input ) {
    return ( isset( $input ) && true == $input ) ? true : false;
}

/**
 * Sanitize select
 */
function interiorar_sanitize_select( $input, $setting ) {
    $input = sanitize_key( $input );
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Add custom admin styles
 */
function interiorar_admin_styles() {
    echo '<style>
        .interiorar-admin-notice {
            background: #141618;
            border-left-color: #ff5c1a;
            color: #f0ede8;
        }
        .interiorar-admin-notice a {
            color: #ff5c1a;
        }
    </style>';
}
add_action( 'admin_head', 'interiorar_admin_styles' );

/**
 * Add theme info to admin
 */
function interiorar_admin_notice() {
    if ( current_user_can( 'manage_options' ) ) {
        $screen = get_current_screen();
        if ( $screen->id === 'themes' ) {
            echo '<div class="notice interiorar-admin-notice is-dismissible">
                <p><strong>InteriorAR Child Theme</strong> - Personaliza tu sitio desde <a href="' . admin_url( 'customize.php' ) . '">Apariencia > Personalizar</a></p>
            </div>';
        }
    }
}
add_action( 'admin_notices', 'interiorar_admin_notice' );
