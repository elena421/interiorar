<?php
/**
 * Acumbamail Integration for InteriorAR Child Theme
 *
 * @package InteriorAR_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Handle Acumbamail form submission via AJAX
 */
function interiorar_acumbamail_subscribe() {
    // Verify nonce
    if ( ! wp_verify_nonce( $_POST['nonce'], 'interiorar_nonce' ) ) {
        wp_send_json_error( array( 'message' => __( 'Error de seguridad', 'interiorar-child' ) ) );
    }
    
    // Sanitize email
    $email = sanitize_email( $_POST['email'] );
    
    if ( ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => __( 'Email inválido', 'interiorar-child' ) ) );
    }
    
    // Check GDPR consent
    if ( empty( $_POST['gdpr'] ) || $_POST['gdpr'] !== 'true' ) {
        wp_send_json_error( array( 'message' => __( 'Debes aceptar la política de privacidad', 'interiorar-child' ) ) );
    }
    
    // Get Acumbamail settings
    $list_id = get_theme_mod( 'interiorar_acumbamail_list_id', '' );
    $api_key = get_theme_mod( 'interiorar_acumbamail_api_key', '' );
    
    if ( empty( $list_id ) || empty( $api_key ) ) {
        // If no API configured, just store locally or return success
        // This allows testing without full Acumbamail setup
        wp_send_json_success( array( 
            'message' => get_theme_mod( 'interiorar_form_success', __( '¡Gracias por suscribirte!', 'interiorar-child' ) )
        ));
    }
    
    // Make API request to Acumbamail
    $response = wp_remote_post( 'https://acumbamail.com/api/1/addSubscriber/', array(
        'timeout' => 30,
        'body'    => array(
            'auth_token'   => $api_key,
            'list_id'      => $list_id,
            'merge_fields' => json_encode( array(
                'email' => $email,
            )),
            'double_optin' => 1,
        ),
    ));
    
    if ( is_wp_error( $response ) ) {
        wp_send_json_error( array( 
            'message' => get_theme_mod( 'interiorar_form_error', __( 'Error de conexión. Inténtalo más tarde.', 'interiorar-child' ) )
        ));
    }
    
    $body = json_decode( wp_remote_retrieve_body( $response ), true );
    
    if ( isset( $body['error'] ) ) {
        // Check for duplicate subscriber
        if ( strpos( $body['error'], 'already exists' ) !== false || strpos( $body['error'], 'ya existe' ) !== false ) {
            wp_send_json_success( array( 
                'message' => __( 'Este email ya está suscrito.', 'interiorar-child' )
            ));
        }
        
        wp_send_json_error( array( 
            'message' => get_theme_mod( 'interiorar_form_error', __( 'Error al procesar. Inténtalo más tarde.', 'interiorar-child' ) )
        ));
    }
    
    wp_send_json_success( array( 
        'message' => get_theme_mod( 'interiorar_form_success', __( '¡Gracias por suscribirte! Revisa tu email.', 'interiorar-child' ) )
    ));
}
add_action( 'wp_ajax_interiorar_subscribe', 'interiorar_acumbamail_subscribe' );
add_action( 'wp_ajax_nopriv_interiorar_subscribe', 'interiorar_acumbamail_subscribe' );

/**
 * Generate Acumbamail embedded form HTML
 * 
 * @param array $args Form arguments
 * @return string HTML output
 */
function interiorar_get_acumbamail_form( $args = array() ) {
    $defaults = array(
        'class'       => 'hero-form',
        'placeholder' => __( 'Tu email', 'interiorar-child' ),
        'button_text' => get_theme_mod( 'interiorar_hero_button_text', __( 'Suscribirse', 'interiorar-child' ) ),
        'show_hint'   => true,
        'hint_text'   => get_theme_mod( 'interiorar_hero_form_hint', __( 'Acceso anticipado disponible', 'interiorar-child' ) ),
        'show_gdpr'   => true,
    );
    
    $args = wp_parse_args( $args, $defaults );
    
    $form_id = get_theme_mod( 'interiorar_acumbamail_form_id', '' );
    $gdpr_text = get_theme_mod( 'interiorar_gdpr_text', __( 'Acepto la <a href="/politica-privacidad">política de privacidad</a>.', 'interiorar-child' ) );
    
    ob_start();
    ?>
    <div class="<?php echo esc_attr( $args['class'] ); ?>" data-form-id="<?php echo esc_attr( $form_id ); ?>">
        <?php if ( $args['show_hint'] && ! empty( $args['hint_text'] ) ) : ?>
            <div class="form-hint">
                <span class="hint-dot"></span>
                <?php echo esc_html( $args['hint_text'] ); ?>
            </div>
        <?php endif; ?>
        
        <form class="acumbamail-form" id="interiorar-newsletter-form">
            <div class="input-row">
                <input 
                    type="email" 
                    name="email" 
                    class="f-email" 
                    placeholder="<?php echo esc_attr( $args['placeholder'] ); ?>" 
                    required
                    aria-label="<?php esc_attr_e( 'Email', 'interiorar-child' ); ?>"
                >
                <button type="submit" class="f-btn">
                    <span class="btn-text"><?php echo esc_html( $args['button_text'] ); ?></span>
                    <span class="btn-loading" style="display:none;">...</span>
                </button>
            </div>
            
            <?php if ( $args['show_gdpr'] ) : ?>
                <label class="gdpr">
                    <input type="checkbox" name="gdpr" class="g-check" required>
                    <span><?php echo wp_kses_post( $gdpr_text ); ?></span>
                </label>
            <?php endif; ?>
            
            <div class="form-message" style="display:none;"></div>
            
            <p class="fine"><?php esc_html_e( 'Sin spam. Cancela cuando quieras.', 'interiorar-child' ); ?></p>
        </form>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Shortcode for Acumbamail form
 */
function interiorar_acumbamail_form_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'class'       => 'hero-form',
        'placeholder' => __( 'Tu email', 'interiorar-child' ),
        'button'      => '',
        'hint'        => '',
        'show_gdpr'   => 'true',
    ), $atts );
    
    return interiorar_get_acumbamail_form( array(
        'class'       => $atts['class'],
        'placeholder' => $atts['placeholder'],
        'button_text' => ! empty( $atts['button'] ) ? $atts['button'] : get_theme_mod( 'interiorar_hero_button_text', __( 'Suscribirse', 'interiorar-child' ) ),
        'hint_text'   => ! empty( $atts['hint'] ) ? $atts['hint'] : get_theme_mod( 'interiorar_hero_form_hint', '' ),
        'show_hint'   => ! empty( $atts['hint'] ) || get_theme_mod( 'interiorar_hero_form_hint', '' ),
        'show_gdpr'   => $atts['show_gdpr'] === 'true',
    ));
}
add_shortcode( 'acumbamail_form', 'interiorar_acumbamail_form_shortcode' );
