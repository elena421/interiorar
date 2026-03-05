<?php
/**
 * Template Part: Manifesto Section
 *
 * @package InteriorAR_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get manifesto content from customizer
$columns = array();
for ( $i = 1; $i <= 3; $i++ ) {
    $title = get_theme_mod( 'interiorar_manifesto_title_' . $i, '' );
    $text  = get_theme_mod( 'interiorar_manifesto_text_' . $i, '' );
    
    // Default content if not set
    if ( empty( $title ) ) {
        switch ( $i ) {
            case 1:
                $title = 'Visión';
                $text  = 'Democratizar el diseño interior de alta calidad a través de la tecnología.';
                break;
            case 2:
                $title = 'Misión';
                $text  = 'Conectar personas con espacios que reflejen su identidad única.';
                break;
            case 3:
                $title = 'Valores';
                $text  = 'Innovación, accesibilidad y experiencia del usuario primero.';
                break;
        }
    }
    
    $columns[] = array(
        'number' => str_pad( $i, 2, '0', STR_PAD_LEFT ),
        'title'  => $title,
        'text'   => $text,
    );
}
?>

<section class="manifesto" id="manifesto">
    <div class="wrap">
        <?php foreach ( $columns as $index => $column ) : ?>
            <div class="m-col sr" data-d="<?php echo esc_attr( $index ); ?>">
                <div class="m-n"><?php echo esc_html( $column['number'] ); ?></div>
                <h3 class="m-title"><?php echo esc_html( $column['title'] ); ?></h3>
                <p class="m-body"><?php echo wp_kses_post( $column['text'] ); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
