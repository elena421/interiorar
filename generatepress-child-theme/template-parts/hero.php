<?php
/**
 * Template Part: Hero Section
 *
 * @package InteriorAR_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get customizer values
$tagline      = isset( $atts['tagline'] ) ? $atts['tagline'] : get_theme_mod( 'interiorar_hero_tagline', 'Bienvenido' );
$title_faint  = isset( $atts['title_faint'] ) ? $atts['title_faint'] : get_theme_mod( 'interiorar_hero_title_faint', 'DISEÑO' );
$title_accent = isset( $atts['title_accent'] ) ? $atts['title_accent'] : get_theme_mod( 'interiorar_hero_title_accent', 'INTERIOR' );
$title_bright = isset( $atts['title_bright'] ) ? $atts['title_bright'] : get_theme_mod( 'interiorar_hero_title_bright', 'CON AR' );
$description  = isset( $atts['description'] ) ? $atts['description'] : get_theme_mod( 'interiorar_hero_description', 'Transforma tus espacios con tecnología de realidad aumentada. Visualiza muebles y decoración en tu hogar antes de comprar.' );
$hero_image   = isset( $atts['image'] ) ? $atts['image'] : get_theme_mod( 'interiorar_hero_image', '' );
?>

<section class="hero" id="hero">
    <div class="hero-left">
        <div class="sr" data-d="0">
            <?php if ( ! empty( $tagline ) ) : ?>
                <div class="tag-line"><?php echo esc_html( $tagline ); ?></div>
            <?php endif; ?>
            
            <h1 class="hero-h1">
                <?php if ( ! empty( $title_faint ) ) : ?>
                    <span class="faint"><?php echo esc_html( $title_faint ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $title_accent ) ) : ?>
                    <span class="accent"><?php echo esc_html( $title_accent ); ?></span>
                <?php endif; ?>
                <?php if ( ! empty( $title_bright ) ) : ?>
                    <span class="bright"><?php echo esc_html( $title_bright ); ?></span>
                <?php endif; ?>
            </h1>
        </div>
        
        <?php if ( ! empty( $description ) ) : ?>
            <p class="hero-body sr" data-d="1">
                <?php echo wp_kses_post( $description ); ?>
            </p>
        <?php endif; ?>
        
        <div class="sr" data-d="2">
            <?php echo interiorar_get_acumbamail_form(); ?>
        </div>
    </div>
    
    <div class="hero-right">
        <?php if ( ! empty( $hero_image ) ) : ?>
            <div class="hero-cat-wrapper glitch-container">
                <img 
                    src="<?php echo esc_url( $hero_image ); ?>" 
                    alt="<?php esc_attr_e( 'Hero Image', 'interiorar-child' ); ?>" 
                    class="hero-cat glitch-effect"
                    loading="eager"
                >
            </div>
        <?php else : ?>
            <div class="hero-cat-wrapper glitch-container">
                <div class="hero-placeholder" style="
                    width: 300px;
                    height: 300px;
                    background: var(--card);
                    border: 2px dashed var(--line);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: var(--muted);
                    font-size: 12px;
                    text-align: center;
                    padding: 20px;
                ">
                    <?php esc_html_e( 'Añade una imagen desde Personalizar > InteriorAR Theme > Sección Hero', 'interiorar-child' ); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
