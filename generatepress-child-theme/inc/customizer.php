<?php
/**
 * Customizer Settings for InteriorAR Child Theme
 *
 * @package InteriorAR_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register customizer settings
 */
function interiorar_customize_register( $wp_customize ) {
    
    // =========================================================================
    // PANEL: InteriorAR Settings
    // =========================================================================
    $wp_customize->add_panel( 'interiorar_panel', array(
        'title'       => __( 'InteriorAR Theme', 'interiorar-child' ),
        'description' => __( 'Configuración del tema InteriorAR', 'interiorar-child' ),
        'priority'    => 30,
    ));
    
    // =========================================================================
    // SECTION: General Settings
    // =========================================================================
    $wp_customize->add_section( 'interiorar_general', array(
        'title'    => __( 'Configuración General', 'interiorar-child' ),
        'panel'    => 'interiorar_panel',
        'priority' => 10,
    ));
    
    // Logo Text
    $wp_customize->add_setting( 'interiorar_logo_text', array(
        'default'           => 'INTERIORAR',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control( 'interiorar_logo_text', array(
        'label'    => __( 'Texto del Logo', 'interiorar-child' ),
        'section'  => 'interiorar_general',
        'type'     => 'text',
    ));
    
    // Show Ticker
    $wp_customize->add_setting( 'interiorar_show_ticker', array(
        'default'           => true,
        'sanitize_callback' => 'interiorar_sanitize_checkbox',
    ));
    
    $wp_customize->add_control( 'interiorar_show_ticker', array(
        'label'   => __( 'Mostrar Ticker/Banner', 'interiorar-child' ),
        'section' => 'interiorar_general',
        'type'    => 'checkbox',
    ));
    
    // =========================================================================
    // SECTION: Colors
    // =========================================================================
    $wp_customize->add_section( 'interiorar_colors', array(
        'title'    => __( 'Colores', 'interiorar-child' ),
        'panel'    => 'interiorar_panel',
        'priority' => 20,
    ));
    
    // Primary Color (Fire)
    $wp_customize->add_setting( 'interiorar_color_fire', array(
        'default'           => '#ff5c1a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'interiorar_color_fire', array(
        'label'   => __( 'Color Principal (Fire)', 'interiorar-child' ),
        'section' => 'interiorar_colors',
    )));
    
    // Background Color (Void)
    $wp_customize->add_setting( 'interiorar_color_void', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'interiorar_color_void', array(
        'label'   => __( 'Color de Fondo (Void)', 'interiorar-child' ),
        'section' => 'interiorar_colors',
    )));
    
    // Text Color (White)
    $wp_customize->add_setting( 'interiorar_color_white', array(
        'default'           => '#f0ede8',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'interiorar_color_white', array(
        'label'   => __( 'Color de Texto (White)', 'interiorar-child' ),
        'section' => 'interiorar_colors',
    )));
    
    // =========================================================================
    // SECTION: Hero
    // =========================================================================
    $wp_customize->add_section( 'interiorar_hero', array(
        'title'    => __( 'Sección Hero', 'interiorar-child' ),
        'panel'    => 'interiorar_panel',
        'priority' => 30,
    ));
    
    // Tagline
    $wp_customize->add_setting( 'interiorar_hero_tagline', array(
        'default'           => 'Bienvenido',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'interiorar_hero_tagline', array(
        'label'   => __( 'Tagline', 'interiorar-child' ),
        'section' => 'interiorar_hero',
        'type'    => 'text',
    ));
    
    // Title Faint
    $wp_customize->add_setting( 'interiorar_hero_title_faint', array(
        'default'           => 'DISEÑO',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'interiorar_hero_title_faint', array(
        'label'       => __( 'Título (Línea 1 - Tenue)', 'interiorar-child' ),
        'section'     => 'interiorar_hero',
        'type'        => 'text',
    ));
    
    // Title Accent
    $wp_customize->add_setting( 'interiorar_hero_title_accent', array(
        'default'           => 'INTERIOR',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'interiorar_hero_title_accent', array(
        'label'       => __( 'Título (Línea 2 - Acento)', 'interiorar-child' ),
        'section'     => 'interiorar_hero',
        'type'        => 'text',
    ));
    
    // Title Bright
    $wp_customize->add_setting( 'interiorar_hero_title_bright', array(
        'default'           => 'CON AR',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'interiorar_hero_title_bright', array(
        'label'       => __( 'Título (Línea 3 - Brillante)', 'interiorar-child' ),
        'section'     => 'interiorar_hero',
        'type'        => 'text',
    ));
    
    // Description
    $wp_customize->add_setting( 'interiorar_hero_description', array(
        'default'           => 'Transforma tus espacios con tecnología de realidad aumentada.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    
    $wp_customize->add_control( 'interiorar_hero_description', array(
        'label'   => __( 'Descripción', 'interiorar-child' ),
        'section' => 'interiorar_hero',
        'type'    => 'textarea',
    ));
    
    // Hero Image
    $wp_customize->add_setting( 'interiorar_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'interiorar_hero_image', array(
        'label'   => __( 'Imagen Hero', 'interiorar-child' ),
        'section' => 'interiorar_hero',
    )));
    
    // Form Hint Text
    $wp_customize->add_setting( 'interiorar_hero_form_hint', array(
        'default'           => 'Acceso anticipado disponible',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'interiorar_hero_form_hint', array(
        'label'   => __( 'Texto encima del formulario', 'interiorar-child' ),
        'section' => 'interiorar_hero',
        'type'    => 'text',
    ));
    
    // Button Text
    $wp_customize->add_setting( 'interiorar_hero_button_text', array(
        'default'           => 'Suscribirse',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'interiorar_hero_button_text', array(
        'label'   => __( 'Texto del botón', 'interiorar-child' ),
        'section' => 'interiorar_hero',
        'type'    => 'text',
    ));
    
    // =========================================================================
    // SECTION: Ticker
    // =========================================================================
    $wp_customize->add_section( 'interiorar_ticker', array(
        'title'    => __( 'Ticker/Banner', 'interiorar-child' ),
        'panel'    => 'interiorar_panel',
        'priority' => 35,
    ));
    
    // Ticker Items (up to 5)
    for ( $i = 1; $i <= 5; $i++ ) {
        $wp_customize->add_setting( 'interiorar_ticker_item_' . $i, array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control( 'interiorar_ticker_item_' . $i, array(
            'label'   => sprintf( __( 'Elemento %d', 'interiorar-child' ), $i ),
            'section' => 'interiorar_ticker',
            'type'    => 'text',
        ));
    }
    
    // =========================================================================
    // SECTION: Manifesto
    // =========================================================================
    $wp_customize->add_section( 'interiorar_manifesto', array(
        'title'    => __( 'Sección Manifesto', 'interiorar-child' ),
        'panel'    => 'interiorar_panel',
        'priority' => 40,
    ));
    
    // Show Manifesto
    $wp_customize->add_setting( 'interiorar_show_manifesto', array(
        'default'           => true,
        'sanitize_callback' => 'interiorar_sanitize_checkbox',
    ));
    
    $wp_customize->add_control( 'interiorar_show_manifesto', array(
        'label'   => __( 'Mostrar sección Manifesto', 'interiorar-child' ),
        'section' => 'interiorar_manifesto',
        'type'    => 'checkbox',
    ));
    
    // Manifesto Items (3 columns)
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( 'interiorar_manifesto_title_' . $i, array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control( 'interiorar_manifesto_title_' . $i, array(
            'label'   => sprintf( __( 'Columna %d - Título', 'interiorar-child' ), $i ),
            'section' => 'interiorar_manifesto',
            'type'    => 'text',
        ));
        
        $wp_customize->add_setting( 'interiorar_manifesto_text_' . $i, array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        ));
        
        $wp_customize->add_control( 'interiorar_manifesto_text_' . $i, array(
            'label'   => sprintf( __( 'Columna %d - Texto', 'interiorar-child' ), $i ),
            'section' => 'interiorar_manifesto',
            'type'    => 'textarea',
        ));
    }
    
    // =========================================================================
    // SECTION: Acumbamail
    // =========================================================================
    $wp_customize->add_section( 'interiorar_acumbamail', array(
        'title'       => __( 'Acumbamail', 'interiorar-child' ),
        'description' => __( 'Configuración de integración con Acumbamail', 'interiorar-child' ),
        'panel'       => 'interiorar_panel',
        'priority'    => 50,
    ));
    
    // Acumbamail Form ID
    $wp_customize->add_setting( 'interiorar_acumbamail_form_id', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'interiorar_acumbamail_form_id', array(
        'label'       => __( 'ID del Formulario', 'interiorar-child' ),
        'description' => __( 'ID del formulario de Acumbamail', 'interiorar-child' ),
        'section'     => 'interiorar_acumbamail',
        'type'        => 'text',
    ));
    
    // Acumbamail List ID
    $wp_customize->add_setting( 'interiorar_acumbamail_list_id', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'interiorar_acumbamail_list_id', array(
        'label'       => __( 'ID de la Lista', 'interiorar-child' ),
        'description' => __( 'ID de la lista de suscriptores', 'interiorar-child' ),
        'section'     => 'interiorar_acumbamail',
        'type'        => 'text',
    ));
    
    // Acumbamail API Key
    $wp_customize->add_setting( 'interiorar_acumbamail_api_key', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'interiorar_acumbamail_api_key', array(
        'label'       => __( 'API Key', 'interiorar-child' ),
        'description' => __( 'Tu API Key de Acumbamail (opcional para formularios embebidos)', 'interiorar-child' ),
        'section'     => 'interiorar_acumbamail',
        'type'        => 'password',
    ));
    
    // GDPR Text
    $wp_customize->add_setting( 'interiorar_gdpr_text', array(
        'default'           => 'Acepto recibir comunicaciones y la <a href="/politica-privacidad">política de privacidad</a>.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    
    $wp_customize->add_control( 'interiorar_gdpr_text', array(
        'label'   => __( 'Texto GDPR/Privacidad', 'interiorar-child' ),
        'section' => 'interiorar_acumbamail',
        'type'    => 'textarea',
    ));
    
    // Success Message
    $wp_customize->add_setting( 'interiorar_form_success', array(
        'default'           => '¡Gracias por suscribirte! Revisa tu email.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'interiorar_form_success', array(
        'label'   => __( 'Mensaje de éxito', 'interiorar-child' ),
        'section' => 'interiorar_acumbamail',
        'type'    => 'text',
    ));
    
    // Error Message
    $wp_customize->add_setting( 'interiorar_form_error', array(
        'default'           => 'Hubo un error. Por favor, inténtalo de nuevo.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control( 'interiorar_form_error', array(
        'label'   => __( 'Mensaje de error', 'interiorar-child' ),
        'section' => 'interiorar_acumbamail',
        'type'    => 'text',
    ));
    
    // =========================================================================
    // SECTION: Footer
    // =========================================================================
    $wp_customize->add_section( 'interiorar_footer', array(
        'title'    => __( 'Footer', 'interiorar-child' ),
        'panel'    => 'interiorar_panel',
        'priority' => 60,
    ));
    
    // Footer Description
    $wp_customize->add_setting( 'interiorar_footer_description', array(
        'default'           => 'Transformando espacios con tecnología de realidad aumentada.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    
    $wp_customize->add_control( 'interiorar_footer_description', array(
        'label'   => __( 'Descripción del Footer', 'interiorar-child' ),
        'section' => 'interiorar_footer',
        'type'    => 'textarea',
    ));
    
    // Copyright Text
    $wp_customize->add_setting( 'interiorar_copyright', array(
        'default'           => '© ' . date('Y') . ' InteriorAR. Todos los derechos reservados.',
        'sanitize_callback' => 'wp_kses_post',
    ));
    
    $wp_customize->add_control( 'interiorar_copyright', array(
        'label'   => __( 'Texto de Copyright', 'interiorar-child' ),
        'section' => 'interiorar_footer',
        'type'    => 'text',
    ));
    
    // Social Links
    $social_networks = array( 'twitter', 'instagram', 'linkedin', 'facebook', 'youtube' );
    
    foreach ( $social_networks as $network ) {
        $wp_customize->add_setting( 'interiorar_social_' . $network, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control( 'interiorar_social_' . $network, array(
            'label'   => ucfirst( $network ) . ' URL',
            'section' => 'interiorar_footer',
            'type'    => 'url',
        ));
    }
}
add_action( 'customize_register', 'interiorar_customize_register' );

/**
 * Output custom CSS from customizer
 */
function interiorar_customizer_css() {
    $fire  = get_theme_mod( 'interiorar_color_fire', '#ff5c1a' );
    $void  = get_theme_mod( 'interiorar_color_void', '#000000' );
    $white = get_theme_mod( 'interiorar_color_white', '#f0ede8' );
    
    $css = "
        :root {
            --fire: {$fire};
            --void: {$void};
            --white: {$white};
        }
    ";
    
    wp_add_inline_style( 'interiorar-child-style', $css );
}
add_action( 'wp_enqueue_scripts', 'interiorar_customizer_css', 20 );
