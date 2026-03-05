<?php
/**
 * Template Part: Navigation
 *
 * @package InteriorAR_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$logo_text = get_theme_mod( 'interiorar_logo_text', 'INTERIORAR' );
?>

<nav class="site-nav" role="navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'interiorar-child' ); ?>">
    <div class="wrap">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
            <span class="logo-dot"></span>
            <?php echo esc_html( $logo_text ); ?>
        </a>
        
        <button class="nav-toggle" aria-expanded="false" aria-controls="nav-links">
            <span class="sr-only"><?php esc_html_e( 'Menu', 'interiorar-child' ); ?></span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>
        
        <div class="nav-links" id="nav-links">
            <?php
            if ( has_nav_menu( 'interiorar-main-menu' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'interiorar-main-menu',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'depth'          => 1,
                ));
            } else {
                // Default menu items
                ?>
                <a href="#manifesto"><?php esc_html_e( 'Manifesto', 'interiorar-child' ); ?></a>
                <a href="#servicios"><?php esc_html_e( 'Servicios', 'interiorar-child' ); ?></a>
                <a href="#nosotros"><?php esc_html_e( 'Nosotros', 'interiorar-child' ); ?></a>
                <a href="#contacto" class="nav-cta"><?php esc_html_e( 'Contacto', 'interiorar-child' ); ?></a>
                <?php
            }
            ?>
        </div>
    </div>
</nav>
