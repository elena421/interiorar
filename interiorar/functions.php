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
 * Templates PHP con layout propio — GeneratePress no debe envolverlos
 */
function interiorar_custom_templates() {
    return array(
        'template-landing.php',
        'page-interiorar.php',
        'casi-listo.php',
        'bienvenido.php',
        'contacto.php',
        'page-legal.php',
        'single-transmision.php',
        'interiorar-member-dashboard.php',
        'interiorar-gracias-compra.php',
        '404.php',
        'interiorar-cerebro-acceso.php',
        'interiorar-dinero-acceso.php',
    );
}

/**
 * Disable GeneratePress header, footer y sidebar en templates con layout propio
 */
function interiorar_disable_gp_elements() {
    foreach ( interiorar_custom_templates() as $tpl ) {
        if ( is_page_template( $tpl ) ) {
            remove_action( 'generate_header', 'generate_construct_header' );
            remove_action( 'generate_footer', 'generate_construct_footer' );
            remove_action( 'generate_sidebar', 'generate_construct_sidebars' );
            return;
        }
    }
    if ( is_404() ) {
        remove_action( 'generate_header', 'generate_construct_header' );
        remove_action( 'generate_footer', 'generate_construct_footer' );
    }
}
add_action( 'wp', 'interiorar_disable_gp_elements' );

/**
 * GeneratePress: no renderizar header/footer/sidebar en templates propios
 */
function interiorar_blank_gp_structure( $bool, $template_part ) {
    $skip = array( 'header', 'footer', 'sidebar', 'navigation' );
    foreach ( interiorar_custom_templates() as $tpl ) {
        if ( is_page_template( $tpl ) && in_array( $template_part, $skip ) ) {
            return false;
        }
    }
    return $bool;
}
add_filter( 'generate_do_template_part', 'interiorar_blank_gp_structure', 10, 2 );

/**
 * Sin sidebar en templates propios
 */
function interiorar_gp_full_width_layout( $layout ) {
    foreach ( interiorar_custom_templates() as $tpl ) {
        if ( is_page_template( $tpl ) ) {
            return 'no-sidebar';
        }
    }
    return $layout;
}
add_filter( 'generate_sidebar_layout', 'interiorar_gp_full_width_layout' );

/**
 * Ocultar título de página de GP en templates propios
 */
function interiorar_gp_remove_page_title() {
    foreach ( interiorar_custom_templates() as $tpl ) {
        if ( is_page_template( $tpl ) ) {
            add_filter( 'generate_show_title', '__return_false' );
            return;
        }
    }
}
add_action( 'wp', 'interiorar_gp_remove_page_title' );

/**
 * CSS inline: anulan los contenedores de GeneratePress en templates propios.
 * Prioridad 999 para ejecutarse después de todos los estilos del tema.
 */
function interiorar_override_gp_container_css() {
    $is_custom = false;
    foreach ( interiorar_custom_templates() as $tpl ) {
        if ( is_page_template( $tpl ) ) {
            $is_custom = true;
            break;
        }
    }
    if ( ! $is_custom ) return;
    ?>
    <style id="interiorar-gp-override">
    body .site-content,
    body #content,
    body .inside-page-hero,
    body #primary,
    body .content-area {
        max-width: none !important;
        padding: 0 !important;
        margin: 0 !important;
        width: 100% !important;
        float: none !important;
    }
    body .site-content { display: block !important; }
    /* GLITCH sin restricción de tamaño */
    body .gl-protagonist,
    body .hr-glitch img.gl-protagonist,
    body .hr-glitch > img {
        position: absolute !important;
        bottom: 0 !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        width: 90% !important;
        max-width: none !important;
        height: auto !important;
        display: block !important;
    }
    </style>
    <?php
}
add_action( 'wp_head', 'interiorar_override_gp_container_css', 999 );

/**
 * Body classes para templates propios
 */
function interiorar_body_classes( $classes ) {
    foreach ( interiorar_custom_templates() as $tpl ) {
        if ( is_page_template( $tpl ) ) {
            $classes[] = 'interiorar-landing';
            $classes[] = 'interiorar-full-width';
            return $classes;
        }
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

/**
 * Get social icon SVG
 */
function interiorar_get_social_icon( $network ) {
    $icons = array(
        'twitter'   => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
        'instagram' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>',
        'linkedin'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>',
        'facebook'  => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
        'youtube'   => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>',
    );
    
    return isset( $icons[ $network ] ) ? $icons[ $network ] : '';
}
/**
 * ── WP-LOGIN PERSONALIZADO — Estética INTERIORAR ──────────────────
 */

// 1. CSS que reemplaza el diseño por defecto
function interiorar_login_styles() { ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
:root{--orange:#ff6b00;--bg:#0a0a0a;--card:#0f0f0f}
*{box-sizing:border-box}
body.login{
    background:var(--bg)!important;
    font-family:'Space Mono',monospace!important;
}
body.login::before{
    content:'';position:fixed;inset:0;z-index:0;pointer-events:none;
    background:repeating-linear-gradient(0deg,rgba(0,0,0,.07) 0,rgba(0,0,0,.07) 1px,transparent 1px,transparent 2px);
}
/* Logo */
#login h1 a{
    background-image:none!important;
    font-family:'Bebas Neue',sans-serif!important;
    font-size:2rem!important;letter-spacing:.35em!important;
    color:var(--orange)!important;
    text-shadow:0 0 20px rgba(255,107,0,.35)!important;
    text-decoration:none!important;
    width:auto!important;height:auto!important;
    display:block!important;text-align:center!important;
    margin-bottom:.5rem!important;
}
/* Etiqueta encima del form */
#login h1 a::before{
    content:'> ÁREA_PRIVADA';
    display:block;font-size:.55rem;letter-spacing:.3em;
    color:rgba(255,107,0,.45);margin-bottom:.6rem;
    font-family:'Space Mono',monospace;
}
/* Wrap general */
#login{
    width:380px!important;padding:0!important;
    position:relative;z-index:1;
}
/* Card del formulario */
#loginform,#lostpasswordform{
    background:var(--card)!important;
    border:1px solid rgba(255,107,0,.15)!important;
    border-top:3px solid var(--orange)!important;
    border-radius:0!important;
    box-shadow:none!important;
    padding:2rem!important;
    position:relative;overflow:hidden;
}
#loginform::before,#lostpasswordform::before{
    content:'';position:absolute;top:0;left:0;right:0;height:1px;
    background:linear-gradient(90deg,var(--orange),transparent);opacity:.4;
}
/* Labels */
#loginform label,#lostpasswordform label{
    font-family:'Space Mono',monospace!important;
    font-size:.6rem!important;letter-spacing:.25em!important;
    color:rgba(255,255,255,.3)!important;
    text-transform:uppercase!important;
}
/* Inputs */
#loginform input[type=text],
#loginform input[type=password],
#loginform input[type=email],
#lostpasswordform input[type=text],
#lostpasswordform input[type=email]{
    background:#080808!important;
    border:1px solid rgba(255,107,0,.18)!important;
    border-radius:0!important;
    color:#f0f0f0!important;
    font-family:'Space Mono',monospace!important;
    font-size:.9rem!important;
    padding:.75rem 1rem!important;
    box-shadow:none!important;
    transition:border-color .2s,box-shadow .2s!important;
    width:100%!important;
}
#loginform input[type=text]:focus,
#loginform input[type=password]:focus,
#lostpasswordform input[type=text]:focus,
#lostpasswordform input[type=email]:focus{
    border-color:var(--orange)!important;
    box-shadow:0 0 0 1px rgba(255,107,0,.15)!important;
    outline:none!important;
}
/* Botón submit */
#loginform .button-primary,
#lostpasswordform .button-primary{
    background:var(--orange)!important;
    border:none!important;border-radius:0!important;
    color:#000!important;
    font-family:'Bebas Neue',sans-serif!important;
    font-size:1rem!important;letter-spacing:.2em!important;
    padding:.85rem 1.5rem!important;
    box-shadow:none!important;
    text-shadow:none!important;
    transition:all .2s!important;
    width:100%!important;height:auto!important;
    cursor:pointer!important;
}
#loginform .button-primary:hover,
#lostpasswordform .button-primary:hover{
    background:#ff8c33!important;
    box-shadow:0 0 25px rgba(255,107,0,.3)!important;
}
/* Recordarme */
#loginform .forgetmenot{margin-bottom:0}
#loginform .forgetmenot label{
    color:rgba(255,255,255,.25)!important;
    font-size:.6rem!important;
}
#loginform input[type=checkbox]{
    accent-color:var(--orange)!important;
}
/* Links bajo el form */
#nav a,#backtoblog a{
    font-family:'Space Mono',monospace!important;
    font-size:.65rem!important;letter-spacing:.08em!important;
    color:rgba(255,107,0,.45)!important;
    transition:color .2s!important;
}
#nav a:hover,#backtoblog a:hover{color:var(--orange)!important}
#nav,#backtoblog{
    text-align:center!important;
    background:transparent!important;
    border:none!important;
    box-shadow:none!important;
}
/* Mensajes de error */
#login_error{
    background:rgba(255,50,50,.06)!important;
    border:1px solid rgba(255,50,50,.2)!important;
    border-left:3px solid #ff3232!important;
    border-radius:0!important;
    color:rgba(255,100,100,.85)!important;
    font-family:'Space Mono',monospace!important;
    font-size:.78rem!important;
    box-shadow:none!important;
}
.message{
    background:rgba(50,200,50,.06)!important;
    border:1px solid rgba(50,200,50,.2)!important;
    border-left:3px solid #32c832!important;
    border-radius:0!important;
    color:rgba(100,200,100,.9)!important;
    font-family:'Space Mono',monospace!important;
    font-size:.78rem!important;
    box-shadow:none!important;
}
/* Quitar el powered by wp del footer */
.login #backtoblog{display:none}
</style>
<?php }
add_action('login_enqueue_scripts', 'interiorar_login_styles');

// 2. Reemplazar el logo (enlace apunta al site, no a wordpress.org)
function interiorar_login_logo_url() { return home_url(); }
add_filter('login_headerurl', 'interiorar_login_logo_url');

function interiorar_login_logo_title() { return 'INTERIORAR'; }
add_filter('login_headertext', 'interiorar_login_logo_title');

// 3. Redirigir al dashboard tras login exitoso (no al admin)
function interiorar_login_redirect( $redirect_to, $request, $user ) {
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        if ( in_array( 'administrator', $user->roles ) ) {
            return admin_url();
        }
        return home_url('/member-dashboard/');
    }
    return $redirect_to;
}
add_filter('login_redirect', 'interiorar_login_redirect', 10, 3);

// 4. Texto del botón de submit
function interiorar_login_button( $translated_text, $text, $domain ) {
    if ( $text === 'Log In' ) return '[ ACCEDER ]';
    return $translated_text;
}
add_filter('gettext', 'interiorar_login_button', 20, 3);

// ─────────────────────────────────────────────────────────────────

add_action('wp_ajax_nopriv_interiorar_login', 'interiorar_ajax_login');
function interiorar_ajax_login() {
  check_ajax_referer('interiorar_login_nonce', 'nonce');
  $creds = ['user_login' => sanitize_email($_POST['user_login']), 'user_password' => $_POST['user_pass'], 'remember' => false];
  $user = wp_signon($creds, false);
  if (is_wp_error($user)) {
    wp_send_json_error(['message' => 'Email o contraseña incorrectos.']);
  } else {
    wp_send_json_success(['redirect' => home_url('/member-dashboard/')]);
  }
}
/**
 * GeneratePress: forzar layout full-width sin contenedores para templates propios
 * Esto elimina el .grid-container y .inside-article que recortan el layout
 */
function interiorar_gp_disable_content_container( $class ) {
    foreach ( interiorar_custom_templates() as $tpl ) {
        if ( is_page_template( $tpl ) ) {
            return false; // sin contenedor
        }
    }
    return $class;
}
add_filter( 'generate_inside_content_class', 'interiorar_gp_disable_content_container' );
add_filter( 'generate_inside_article_class', 'interiorar_gp_disable_content_container' );

/**
 * Eliminar el generate_content_title (título H1 de GP) en templates propios
 */
function interiorar_gp_disable_content_title() {
    foreach ( interiorar_custom_templates() as $tpl ) {
        if ( is_page_template( $tpl ) ) {
            remove_action( 'generate_before_content', 'generate_do_post_title' );
            remove_action( 'generate_content_while_loading', 'generate_do_post_title' );
            return;
        }
    }
}
add_action( 'wp', 'interiorar_gp_disable_content_title', 20 );

/**
 * Forzar body a full width quitando el container de GP
 */
function interiorar_gp_remove_grid_container( $classes ) {
    foreach ( interiorar_custom_templates() as $tpl ) {
        if ( is_page_template( $tpl ) ) {
            // Eliminar clases de layout de GP
            $remove = array(
                'grid-container', 'grid-parent', 'content-area',
                'inside-content', 'site-content', 'page'
            );
            foreach ( $remove as $c ) {
                $key = array_search( $c, $classes );
                if ( $key !== false ) unset( $classes[$key] );
            }
        }
    }
    return $classes;
}
add_filter( 'body_class', 'interiorar_gp_remove_grid_container', 20 );

/**
 * Template single para posts de transmisiones (Entradas normales de WordPress)
 * Como "transmisiones" está como Página de entradas, los posts individuales
 * usan single.php. Este filtro asigna nuestro template a todos los posts.
 */
function interiorar_single_template( $template ) {
    if ( is_single() && get_post_type() === 'post' ) {
        $custom = get_stylesheet_directory() . '/single-transmision.php';
        if ( file_exists( $custom ) ) {
            return $custom;
        }
    }
    return $template;
}
add_filter( 'single_template', 'interiorar_single_template' );

