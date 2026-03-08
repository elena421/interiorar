<?php
/**
 * Template Part: Custom Footer
 *
 * @package InteriorAR_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$logo_text   = get_theme_mod( 'interiorar_logo_text', 'INTERIORAR' );
$description = get_theme_mod( 'interiorar_footer_description', 'Transformando espacios con tecnología de realidad aumentada.' );
$copyright   = get_theme_mod( 'interiorar_copyright', '© ' . date('Y') . ' InteriorAR. Todos los derechos reservados.' );

// Social links
$socials = array(
    'twitter'   => get_theme_mod( 'interiorar_social_twitter', '' ),
    'instagram' => get_theme_mod( 'interiorar_social_instagram', '' ),
    'linkedin'  => get_theme_mod( 'interiorar_social_linkedin', '' ),
    'facebook'  => get_theme_mod( 'interiorar_social_facebook', '' ),
    'youtube'   => get_theme_mod( 'interiorar_social_youtube', '' ),
);

// Filter out empty social links
$socials = array_filter( $socials );
?>

<footer class="site-footer" role="contentinfo">
    <div class="wrap">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo">
                    <span class="logo-dot"></span>
                    <?php echo esc_html( $logo_text ); ?>
                </a>
                <?php if ( ! empty( $description ) ) : ?>
                    <p class="footer-desc"><?php echo esc_html( $description ); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="footer-col">
                <h4><?php esc_html_e( 'Navegación', 'interiorar-child' ); ?></h4>
                <?php
                if ( has_nav_menu( 'interiorar-footer-menu' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'interiorar-footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                    ));
                } else {
                    ?>
                    <ul>
                        <li><a href="#hero"><?php esc_html_e( 'Inicio', 'interiorar-child' ); ?></a></li>
                        <li><a href="#manifesto"><?php esc_html_e( 'Manifesto', 'interiorar-child' ); ?></a></li>
                        <li><a href="#servicios"><?php esc_html_e( 'Servicios', 'interiorar-child' ); ?></a></li>
                        <li><a href="#contacto"><?php esc_html_e( 'Contacto', 'interiorar-child' ); ?></a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>
            
            <div class="footer-col">
                <h4><?php esc_html_e( 'Legal', 'interiorar-child' ); ?></h4>
                <ul>
                    <li><a href="<?php echo esc_url( get_privacy_policy_url() ); ?>"><?php esc_html_e( 'Privacidad', 'interiorar-child' ); ?></a></li>
                    <li><a href="/terminos"><?php esc_html_e( 'Términos', 'interiorar-child' ); ?></a></li>
                    <li><a href="/cookies"><?php esc_html_e( 'Cookies', 'interiorar-child' ); ?></a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4><?php esc_html_e( 'Contacto', 'interiorar-child' ); ?></h4>
                <ul>
                    <li><a href="mailto:info@interiorar.com">info@interiorar.com</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p class="footer-copy"><?php echo wp_kses_post( $copyright ); ?></p>
            
            <?php if ( ! empty( $socials ) ) : ?>
                <div class="footer-socials">
                    <?php foreach ( $socials as $network => $url ) : ?>
                        <a href="<?php echo esc_url( $url ); ?>" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           aria-label="<?php echo esc_attr( ucfirst( $network ) ); ?>">
                            <?php echo interiorar_get_social_icon( $network ); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

?>
