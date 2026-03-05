<?php
/**
 * Template Name: Landing Page
 * Template Post Type: page
 *
 * Full-width landing page template for InteriorAR
 *
 * @package InteriorAR_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<?php get_template_part( 'template-parts/navigation' ); ?>

<?php if ( get_theme_mod( 'interiorar_show_ticker', true ) ) : ?>
    <?php get_template_part( 'template-parts/ticker' ); ?>
<?php endif; ?>

<main id="primary" class="site-main">
    
    <?php get_template_part( 'template-parts/hero' ); ?>
    
    <?php if ( get_theme_mod( 'interiorar_show_manifesto', true ) ) : ?>
        <?php get_template_part( 'template-parts/manifesto' ); ?>
    <?php endif; ?>
    
    <?php 
    // Allow content from the page editor
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
    ?>
    
</main>

<?php get_template_part( 'template-parts/footer-custom' ); ?>

<?php get_footer(); ?>
