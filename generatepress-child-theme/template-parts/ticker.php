<?php
/**
 * Template Part: Ticker/Banner
 *
 * @package InteriorAR_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get ticker items from customizer
$ticker_items = array();
for ( $i = 1; $i <= 5; $i++ ) {
    $item = get_theme_mod( 'interiorar_ticker_item_' . $i, '' );
    if ( ! empty( $item ) ) {
        $ticker_items[] = $item;
    }
}

// Default items if none configured
if ( empty( $ticker_items ) ) {
    $ticker_items = array(
        'Diseño Interior',
        'Realidad Aumentada',
        'Visualización 3D',
        'Experiencia Inmersiva',
        'Innovación',
    );
}
?>

<div class="ticker" role="marquee" aria-label="<?php esc_attr_e( 'Announcements', 'interiorar-child' ); ?>">
    <div class="ticker-track">
        <?php 
        // Duplicate items for seamless loop
        for ( $repeat = 0; $repeat < 4; $repeat++ ) :
            foreach ( $ticker_items as $index => $item ) : 
        ?>
            <span class="t-item"><?php echo esc_html( $item ); ?></span>
            <span class="t-sep">•</span>
        <?php 
            endforeach;
        endfor; 
        ?>
    </div>
</div>
