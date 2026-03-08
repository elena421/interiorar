<?php
/**
 * Interiorar Child Theme — functions.php
 */

// 1. Cargar estilos del tema padre
add_action( 'wp_enqueue_scripts', 'interiorar_child_enqueue' );
function interiorar_child_enqueue() {
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css'
    );
}

// 2. Registrar plantilla manualmente
add_filter( 'theme_page_templates', 'interiorar_register_template' );
function interiorar_register_template( $templates ) {
    $templates['page-interiorar-home.php'] = 'Interiorar Home';
    return $templates;
}

add_filter( 'template_include', 'interiorar_load_template' );
function interiorar_load_template( $template ) {
    if ( is_page() ) {
        $page_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
        if ( 'page-interiorar-home.php' === $page_template ) {
            $custom = get_stylesheet_directory() . '/page-interiorar-home.php';
            if ( file_exists( $custom ) ) {
                return $custom;
            }
        }
    }
    return $template;
}

// 3. Registrar campos ACF para la home
// Requiere tener instalado el plugin gratuito Advanced Custom Fields
add_action( 'acf/init', 'interiorar_register_acf_fields' );
function interiorar_register_acf_fields() {

    if ( ! function_exists('acf_add_local_field_group') ) return;

    // ── EPISODIOS ──────────────────────────────────────────
    acf_add_local_field_group(array(
        'key'      => 'group_episodios',
        'title'    => '📡 Transmisiones (Episodios)',
        'location' => array(array(array(
            'param'    => 'page_template',
            'operator' => '==',
            'value'    => 'page-interiorar-home.php',
        ))),
        'menu_order' => 1,
        'fields' => array(

            // Episodio 1
            array( 'key' => 'field_ep1_tag',    'label' => 'Episodio 1 — Tag',    'name' => 'ep1_tag',    'type' => 'text', 'default_value' => 'dinero · sesgo cognitivo' ),
            array( 'key' => 'field_ep1_titulo',  'label' => 'Episodio 1 — Título', 'name' => 'ep1_titulo', 'type' => 'text', 'default_value' => 'Los 5 sesgos cognitivos que más dinero te cuestan sin que lo sepas' ),
            array( 'key' => 'field_ep1_spine',   'label' => 'Episodio 1 — Frase',  'name' => 'ep1_spine',  'type' => 'text', 'default_value' => '"La unidad cree que sus decisiones son racionales. En realidad, cinco fallos de fábrica la sangran en silencio."' ),
            array( 'key' => 'field_ep1_estado',  'label' => 'Episodio 1 — Estado', 'name' => 'ep1_estado', 'type' => 'select', 'choices' => array( 'live' => 'Publicado', 'soon' => 'Próximo' ), 'default_value' => 'live' ),
            array( 'key' => 'field_ep1_url',     'label' => 'Episodio 1 — URL YouTube', 'name' => 'ep1_url', 'type' => 'url', 'default_value' => '' ),

            // Episodio 2
            array( 'key' => 'field_ep2_tag',    'label' => 'Episodio 2 — Tag',    'name' => 'ep2_tag',    'type' => 'text', 'default_value' => 'trabajo · economía del comportamiento' ),
            array( 'key' => 'field_ep2_titulo',  'label' => 'Episodio 2 — Título', 'name' => 'ep2_titulo', 'type' => 'text', 'default_value' => 'Por qué trabajar más duro no escala igual que trabajar distinto' ),
            array( 'key' => 'field_ep2_spine',   'label' => 'Episodio 2 — Frase',  'name' => 'ep2_spine',  'type' => 'text', 'default_value' => '"La unidad confunde esfuerzo con progreso. El sistema también prefiere que lo haga."' ),
            array( 'key' => 'field_ep2_estado',  'label' => 'Episodio 2 — Estado', 'name' => 'ep2_estado', 'type' => 'select', 'choices' => array( 'live' => 'Publicado', 'soon' => 'Próximo' ), 'default_value' => 'live' ),
            array( 'key' => 'field_ep2_url',     'label' => 'Episodio 2 — URL YouTube', 'name' => 'ep2_url', 'type' => 'url', 'default_value' => '' ),

            // Episodio 3
            array( 'key' => 'field_ep3_tag',    'label' => 'Episodio 3 — Tag',    'name' => 'ep3_tag',    'type' => 'text', 'default_value' => 'cerebro · neurociencia' ),
            array( 'key' => 'field_ep3_titulo',  'label' => 'Episodio 3 — Título', 'name' => 'ep3_titulo', 'type' => 'text', 'default_value' => 'El sistema de recompensa no distingue entre logro real y notificación' ),
            array( 'key' => 'field_ep3_spine',   'label' => 'Episodio 3 — Frase',  'name' => 'ep3_spine',  'type' => 'text', 'default_value' => '"La dopamina no premia el resultado. Premia la anticipación. El teléfono lo sabe."' ),
            array( 'key' => 'field_ep3_estado',  'label' => 'Episodio 3 — Estado', 'name' => 'ep3_estado', 'type' => 'select', 'choices' => array( 'live' => 'Publicado', 'soon' => 'Próximo' ), 'default_value' => 'soon' ),
            array( 'key' => 'field_ep3_url',     'label' => 'Episodio 3 — URL YouTube', 'name' => 'ep3_url', 'type' => 'url', 'default_value' => '' ),

            // Episodio 4
            array( 'key' => 'field_ep4_tag',    'label' => 'Episodio 4 — Tag',    'name' => 'ep4_tag',    'type' => 'text', 'default_value' => 'sociedad · narrativa' ),
            array( 'key' => 'field_ep4_titulo',  'label' => 'Episodio 4 — Título', 'name' => 'ep4_titulo', 'type' => 'text', 'default_value' => 'La trampa del mérito: por qué el esfuerzo solo nunca fue suficiente' ),
            array( 'key' => 'field_ep4_spine',   'label' => 'Episodio 4 — Frase',  'name' => 'ep4_spine',  'type' => 'text', 'default_value' => '"La narrativa del mérito no es un error del sistema. Es una función de diseño."' ),
            array( 'key' => 'field_ep4_estado',  'label' => 'Episodio 4 — Estado', 'name' => 'ep4_estado', 'type' => 'select', 'choices' => array( 'live' => 'Publicado', 'soon' => 'Próximo' ), 'default_value' => 'soon' ),
            array( 'key' => 'field_ep4_url',     'label' => 'Episodio 4 — URL YouTube', 'name' => 'ep4_url', 'type' => 'url', 'default_value' => '' ),

            // Episodio 5
            array( 'key' => 'field_ep5_tag',    'label' => 'Episodio 5 — Tag',    'name' => 'ep5_tag',    'type' => 'text', 'default_value' => 'digital · diseño persuasivo' ),
            array( 'key' => 'field_ep5_titulo',  'label' => 'Episodio 5 — Título', 'name' => 'ep5_titulo', 'type' => 'text', 'default_value' => 'Cómo las interfaces explotan tu aversión a la pérdida para retenerte' ),
            array( 'key' => 'field_ep5_spine',   'label' => 'Episodio 5 — Frase',  'name' => 'ep5_spine',  'type' => 'text', 'default_value' => '"No es falta de fuerza de voluntad. Es ingeniería de incentivos con presupuesto de Fortune 500."' ),
            array( 'key' => 'field_ep5_estado',  'label' => 'Episodio 5 — Estado', 'name' => 'ep5_estado', 'type' => 'select', 'choices' => array( 'live' => 'Publicado', 'soon' => 'Próximo' ), 'default_value' => 'soon' ),
            array( 'key' => 'field_ep5_url',     'label' => 'Episodio 5 — URL YouTube', 'name' => 'ep5_url', 'type' => 'url', 'default_value' => '' ),

        ),
    ));

    // ── TEXTOS GENERALES ──────────────────────────────────
    acf_add_local_field_group(array(
        'key'      => 'group_textos',
        'title'    => '✏️ Textos Generales',
        'location' => array(array(array(
            'param'    => 'page_template',
            'operator' => '==',
            'value'    => 'page-interiorar-home.php',
        ))),
        'menu_order' => 2,
        'fields' => array(
            array( 'key' => 'field_hero_titulo',   'label' => 'Hero — Título (línea naranja)', 'name' => 'hero_titulo',   'type' => 'text',     'default_value' => 'que sigues' ),
            array( 'key' => 'field_acumba_url',    'label' => 'Acumbamail — URL del formulario', 'name' => 'acumba_url', 'type' => 'url',      'default_value' => '' ),
            array( 'key' => 'field_youtube_canal', 'label' => 'URL canal YouTube',             'name' => 'youtube_canal', 'type' => 'url',      'default_value' => 'https://youtube.com/@interiorar' ),
            array( 'key' => 'field_parche_url',    'label' => 'URL página Parche 1.0',         'name' => 'parche_url',    'type' => 'url',      'default_value' => '/parche' ),
        ),
    ));

}
