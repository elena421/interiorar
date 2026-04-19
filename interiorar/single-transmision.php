<?php
/**
 * Template Name: InteriorAR Transmisión Single
 * Template Post Type: post
 *
 * ── CÓMO USAR ────────────────────────────────────────────────────
 * 1. Crea un post normal en WordPress (Entradas → Añadir nueva)
 * 2. Escribe el contenido con el editor (título + cuerpo)
 * 3. Asigna la categoría: Relaciones / Dinero / Trabajo / IA Sistema / Cerebro / Sociedad
 * 4. Campos personalizados (Custom Fields o plugin ACF):
 *    - transmision_num     → ej. 004
 *    - transmision_pd      → texto del PD al final
 *    - transmision_pd_link → URL del enlace del PD
 *    - transmision_pd_txt  → texto del enlace (ej. "→ Ver en Amazon")
 * 5. Selecciona este template en "Atributos de página"
 * 6. Publica — listo.
 *
 * El "Siguiente transmisión" se genera automáticamente con el post
 * publicado anterior en orden cronológico.
 * ─────────────────────────────────────────────────────────────────
 */

if (!defined('ABSPATH')) exit;

// Si no hay post, salir
if (!have_posts()) {
    wp_redirect(home_url('/transmisiones/'));
    exit;
}

the_post();

// Datos del post
$titulo    = get_the_title();
$contenido = get_the_content();
$fecha     = get_the_date('d.m.Y');
$cats      = get_the_category();
$categoria = $cats ? strtoupper($cats[0]->name) : 'TRANSMISIÓN';
$cat_slug  = $cats ? $cats[0]->slug : '';

// Mapeo slug → clase CSS de color
$cat_clases = [
    'relaciones' => 'relaciones',
    'dinero'     => 'dinero',
    'trabajo'    => 'trabajo',
    'ia-sistema' => 'ia',
    'ia_sistema' => 'ia',
    'cerebro'    => 'cerebro',
    'sociedad'   => 'sociedad',
];
$cat_class = isset($cat_clases[$cat_slug]) ? $cat_clases[$cat_slug] : 'relaciones';

// Campos personalizados
$num      = get_post_meta(get_the_ID(), 'transmision_num', true) ?: '—';
$pd_texto = get_post_meta(get_the_ID(), 'transmision_pd', true);
$pd_link  = get_post_meta(get_the_ID(), 'transmision_pd_link', true);
$pd_txt   = get_post_meta(get_the_ID(), 'transmision_pd_txt', true) ?: '→ Ver más';

// Post siguiente (más reciente) y anterior (más antiguo)
$post_siguiente = get_next_post(true, '', 'category');
$post_anterior  = get_previous_post(true, '', 'category');
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo esc_html($titulo); ?> — INTERIORAR</title>
<meta name="description" content="Transmisión <?php echo esc_attr($num); ?> de INTERIORAR. <?php echo esc_attr(wp_strip_all_tags($titulo)); ?>">
<?php wp_head(); ?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=JetBrains+Mono:ital,wght@0,400;0,600;1,400&family=Newsreader:ital,opsz,wght@0,6..72,400..600;1,6..72,400..600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{background:#f5f2ee;color:#1a1a1a;font-family:'JetBrains Mono',monospace;font-size:15px;line-height:1.7;overflow-x:hidden}
a{text-decoration:none;color:inherit}

.scanlines{position:fixed;inset:0;z-index:9997;pointer-events:none;
  background:repeating-linear-gradient(0deg,rgba(0,0,0,.08) 0,rgba(0,0,0,.08) 1px,transparent 1px,transparent 2px)}

/* ── NAV ── */
.nav{
  position:fixed;top:0;left:0;right:0;z-index:100;
  padding:1.5rem 3rem;
  display:flex;justify-content:space-between;align-items:center;
  background:rgba(239,231,214,.99);
  border-bottom:1px solid rgba(200,90,0,.2);
}
.nav-logo{font-family:'Bebas Neue',sans-serif;font-size:1.8rem;letter-spacing:.3em;color:#c85a00;
  animation:logoGlitch 6s infinite}
@keyframes logoGlitch{
  0%,95%,100%{text-shadow:0 0 18px rgba(200,90,0,.35);transform:none}
  96%{text-shadow:-2px 0 #00f0ff,2px 0 #ff00ff;transform:translateX(-1px)}
  97%{text-shadow:2px 0 #00f0ff,-2px 0 #ff00ff;transform:translateX(1px)}
  98%{text-shadow:0 0 18px rgba(200,90,0,.35);transform:none}
}
.nav-links{display:flex;gap:2rem;align-items:center}
.nav-links a{font-size:.75rem;letter-spacing:.15em;color:#ccc;transition:color .2s}
.nav-links a:hover{color:#c85a00}
.nav .nav-cta,
.nav a.nav-cta{
  display:inline-block!important;
  padding:.6rem 1.5rem!important;
  border:1px solid #c85a00!important;
  color:#c85a00!important;
  background:transparent!important;
  font-family:'Bebas Neue',sans-serif!important;
  font-size:1rem!important;
  letter-spacing:.2em!important;
  transition:all .2s!important;
  border-radius:0!important;
  box-shadow:none!important;
  text-decoration:none!important;
}
.nav .nav-cta:hover,
.nav a.nav-cta:hover{
  background:#c85a00!important;
  color:#000!important;
  box-shadow:none!important;
}

/* ── HEADER ── */
.trans-header{padding:10rem 4rem 4rem;max-width:780px;margin:0 auto}
.trans-meta-top{display:flex;align-items:center;gap:1.5rem;margin-bottom:2rem;flex-wrap:wrap}
.trans-tag{font-size:.6rem;letter-spacing:.2em;padding:.3rem .9rem;border:1px solid}
.trans-tag.ia       {color:#ff9f43;border-color:rgba(255,159,67,.5)}
.trans-tag.dinero   {color:#ffd93d;border-color:rgba(255,217,61,.5)}
.trans-tag.relaciones{color:#c85a00;border-color:rgba(200,90,0,.5)}
.trans-tag.trabajo  {color:#6bcb77;border-color:rgba(107,203,119,.5)}
.trans-tag.cerebro  {color:#c77dff;border-color:rgba(199,125,255,.5)}
.trans-tag.sociedad {color:#00d4e8;border-color:#00a8c0}
.trans-num-badge{font-family:'Bebas Neue',sans-serif;font-size:.9rem;letter-spacing:.2em;color:rgba(26,26,26,.3)}
.trans-fecha{font-size:.6rem;letter-spacing:.2em;color:rgba(255,255,255,.2)}

.trans-asunto{
  font-family:'Bebas Neue',sans-serif;
  font-size:clamp(1.8rem,4vw,3rem);line-height:1.05;letter-spacing:.03em;
  color:#1a1a1a;margin-bottom:1.5rem;
}
.trans-signal{
  font-size:.65rem;letter-spacing:.2em;color:#c85a00;
  padding:.5rem 0;
  border-top:1px solid rgba(200,90,0,.2);
  border-bottom:1px solid rgba(200,90,0,.2);
  margin-bottom:3rem;
}

/* ── CUERPO ── */
.trans-body{max-width:780px;margin:0 auto;padding:0 4rem 4rem}
.trans-body p{font-size:.9rem;line-height:1.95;color:rgba(26,26,26,.72);margin-bottom:1.4rem}
.trans-body strong{color:#fff}
.trans-body em{color:rgba(26,26,26,.58);font-style:italic}
.trans-body h2,
.trans-body h3{
  font-family:'Bebas Neue',sans-serif;font-size:1.1rem;letter-spacing:.15em;
  color:#c85a00;margin:2.5rem 0 1rem;
}
.trans-body h2{font-size:1.3rem}
.trans-body hr{border:none;border-top:1px solid rgba(200,90,0,.15);margin:2.5rem 0}
.trans-body ul,.trans-body ol{padding-left:1.5rem;margin-bottom:1.4rem}
.trans-body li{font-size:.9rem;line-height:1.9;color:rgba(26,26,26,.72);margin-bottom:.5rem}
.trans-body blockquote{
  border-left:3px solid #c85a00;padding:.75rem 1.25rem;
  margin:1.5rem 0;font-style:italic;color:rgba(255,255,255,.55);
  background:rgba(200,90,0,.03);
}
.trans-body a{color:#c85a00;border-bottom:1px solid rgba(200,90,0,.3);transition:border-color .2s}
.trans-body a:hover{border-bottom-color:#c85a00}
.trans-body img{max-width:100%;height:auto;margin:2rem 0;opacity:.9}

/* ── FIRMA ── */
.trans-firma{
  max-width:780px;margin:0 auto;
  padding:2rem 4rem;
  font-size:.75rem;letter-spacing:.15em;color:rgba(26,26,26,.3);
}

/* ── PD ── */
.trans-pd{max-width:780px;margin:0 auto;padding:2rem 4rem;border-top:1px solid rgba(200,90,0,.2)}
.trans-pd p{font-size:.8rem;color:rgba(255,255,255,.45);line-height:1.8}
.trans-pd a{color:#c85a00;transition:color .2s}
.trans-pd a:hover{color:#e06800}
.trans-pd strong{color:rgba(26,26,26,.58)}

/* ── NAVEGACIÓN ENTRE TRANSMISIONES ── */
.trans-nav{
  background:#f5f2ee;
  border-top:1px solid rgba(200,90,0,.15);
  padding:3rem 4rem;
}
.trans-nav-inner{
  max-width:780px;margin:0 auto;
  display:grid;grid-template-columns:1fr 1fr;gap:2rem;
}
.trans-nav-item{display:flex;flex-direction:column;gap:.5rem}
.trans-nav-item.next{text-align:right}
.trans-nav-label{font-size:.58rem;letter-spacing:.25em;color:rgba(26,26,26,.3)}
.trans-nav-title{
  font-family:'Bebas Neue',sans-serif;font-size:1rem;letter-spacing:.04em;
  color:#1a1a1a;line-height:1.2;transition:color .2s;
}
.trans-nav-item a:hover .trans-nav-title{color:#c85a00}
.trans-nav-arrow{font-size:.7rem;color:rgba(200,90,0,.5);margin-top:.25rem}

/* ── CTA SUSCRIPCIÓN ── */
.trans-cta{background:#000;padding:5rem 4rem;text-align:center;border-top:3px solid #c85a00}
.trans-cta-inner{max-width:600px;margin:0 auto}
.trans-cta h2{font-family:'Bebas Neue',sans-serif;font-size:clamp(1.8rem,4vw,3rem);color:#1a1a1a;margin-bottom:1rem}
.trans-cta h2 span{color:#c85a00}
.trans-cta p{font-size:.85rem;color:rgba(255,255,255,.5);margin-bottom:2rem;line-height:1.8}
.form-row{display:flex;gap:0;max-width:500px;margin:0 auto}
.form-row input[type=email]{
  flex:1;padding:1rem 1.25rem;
  background:rgba(255,255,255,.06);
  border:1px solid rgba(200,90,0,.5);border-right:none;
  color:#1a1a1a;font-family:'Space Mono',monospace;font-size:.85rem;outline:none;
}
.form-row input::placeholder{color:rgba(255,255,255,.3)}
.form-row button{
  padding:1rem 1.5rem;background:#c85a00;border:1px solid #c85a00;
  font-family:'Bebas Neue',sans-serif;font-size:.9rem;letter-spacing:.1em;
  color:#000;cursor:pointer;transition:all .2s;
}
.form-row button:hover{background:#e06800}
.form-privacy{font-size:.65rem;color:rgba(255,255,255,.3);margin-top:1rem}
.form-privacy a{color:rgba(200,90,0,.6)}

/* ── FOOTER ── */
footer{background:#ede9e3;padding:2rem 4rem;border-top:1px solid rgba(200,90,0,.15)}
.footer-content{max-width:1400px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem}
.footer-logo{font-family:'Bebas Neue',sans-serif;font-size:1.2rem;letter-spacing:.3em;color:#c85a00}
.footer-links{display:flex;gap:2rem}
.footer-links a{font-size:.7rem;letter-spacing:.15em;color:#999;transition:color .2s}
.footer-links a:hover{color:#c85a00}
footer p{font-size:.65rem;color:rgba(255,255,255,.4)}

@media(max-width:768px){
  .nav{padding:1rem 1.5rem}
  .nav-links a:not(.nav-cta){display:none}
  .trans-header,.trans-body,.trans-pd,.trans-firma,.trans-nav{padding-left:1.5rem;padding-right:1.5rem}
  .trans-cta{padding:4rem 1.5rem}
  .trans-nav-inner{grid-template-columns:1fr}
  .trans-nav-item.next{text-align:left}
  footer{padding:2rem 1.5rem}
  .footer-content{flex-direction:column;align-items:flex-start;gap:1rem}
}
</style>
</head>
<body>
<div class="scanlines"></div>

<nav class="nav">
  <a href="<?php echo home_url(); ?>" class="nav-logo">INTERIORAR</a>
  <div class="nav-links">
    <a href="<?php echo home_url('/transmisiones/'); ?>">[ARCHIVO]</a>
    <a href="<?php echo home_url('/#territorios'); ?>">[TERRITORIOS]</a>
    <a href="<?php echo home_url('/#suscribir'); ?>" class="nav-cta">SUSCRIBIR_</a>
  </div>
</nav>

<main>

  <!-- HEADER -->
  <div class="trans-header">
    <div class="trans-meta-top">
      <span class="trans-tag <?php echo esc_attr($cat_class); ?>"><?php echo esc_html($categoria); ?></span>
      <span class="trans-num-badge">> TRANSMISIÓN_<?php echo esc_html($num); ?></span>
      <span class="trans-fecha"><?php echo esc_html($fecha); ?></span>
    </div>
    <h1 class="trans-asunto"><?php echo esc_html($titulo); ?></h1>
    <div class="trans-signal">> SEÑAL_ACTIVA_ <span style="animation:blink 1s infinite;display:inline-block">█</span></div>
  </div>

  <!-- CUERPO — viene del editor de WordPress -->
  <div class="trans-body">
    <?php echo apply_filters('the_content', $contenido); ?>
  </div>

  <!-- FIRMA -->
  <div class="trans-firma">— GLITCH &amp; humano asociado</div>

  <!-- PD (campo personalizado) -->
  <?php if ($pd_texto) : ?>
  <div class="trans-pd">
    <p><strong>PD.</strong> <?php echo wp_kses_post($pd_texto); ?>
      <?php if ($pd_link) : ?>
        <a href="<?php echo esc_url($pd_link); ?>" target="_blank" rel="noopener"><?php echo esc_html($pd_txt); ?></a>
      <?php endif; ?>
    </p>
  </div>
  <?php endif; ?>

  <!-- NAVEGACIÓN ENTRE TRANSMISIONES -->
  <?php if ($post_anterior || $post_siguiente) : ?>
  <div class="trans-nav">
    <div class="trans-nav-inner">
      <?php if ($post_anterior) : ?>
      <div class="trans-nav-item prev">
        <span class="trans-nav-label">← TRANSMISIÓN ANTERIOR</span>
        <a href="<?php echo get_permalink($post_anterior); ?>">
          <div class="trans-nav-title"><?php echo esc_html(get_the_title($post_anterior)); ?></div>
        </a>
      </div>
      <?php else : ?>
      <div></div>
      <?php endif; ?>

      <?php if ($post_siguiente) : ?>
      <div class="trans-nav-item next">
        <span class="trans-nav-label">SIGUIENTE TRANSMISIÓN →</span>
        <a href="<?php echo get_permalink($post_siguiente); ?>">
          <div class="trans-nav-title"><?php echo esc_html(get_the_title($post_siguiente)); ?></div>
        </a>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>

  <!-- CTA SUSCRIPCIÓN -->
  <div class="trans-cta">
    <div class="trans-cta-inner">
      <h2>El vídeo lo ve todo el mundo.<br><span>El análisis solo tú.</span></h2>
      <p>Dos emails por semana. Lo que no cabe en pantalla. Gratis.</p>
      <form action="https://acumbamail.com/newform/subscribe/BcR1jJI9vEuzJ1UEa5sbhMg8LI2NcDBRSSRbT/61575/" method="post">
        <div class="form-row">
          <input type="email" name="email_1" placeholder="tu@email.com" required autocomplete="email">
          <button type="submit">[ SUSCRIBIR ]</button>
        </div>
        <input type="text"     name="a1259583c" tabindex="-1" style="position:absolute;left:-4900px;" aria-hidden="true" autocomplete="off">
        <input type="email"    name="b1259583c" tabindex="-1" style="position:absolute;left:-5000px;" aria-hidden="true" autocomplete="off">
        <input type="checkbox" name="c1259583c" tabindex="-1" style="position:absolute;left:-5100px;" aria-hidden="true" autocomplete="off">
        <input type="hidden"   name="ok_redirect" value="<?php echo home_url('/casi-listo/'); ?>">
        <p class="form-privacy">Sin spam. Sin bullshit. Te vas cuando quieras. <a href="<?php echo home_url('/privacidad/'); ?>">Privacidad</a></p>
      </form>
    </div>
  </div>

</main>

<footer>
  <div class="footer-content">
    <span class="footer-logo">INTERIORAR</span>
    <div class="footer-links">
      <a href="<?php echo home_url('/privacidad/'); ?>">[PRIVACIDAD]</a>
      <a href="<?php echo home_url('/legal/'); ?>">[LEGAL]</a>
      <a href="<?php echo home_url('/contacto/'); ?>">[CONTACTO]</a>
    </div>
    <p>&copy; 2025 INTERIORAR. Un error en el código.</p>
  </div>
</footer>

<?php wp_footer(); ?>
<style>@keyframes blink{0%,50%{opacity:1}51%,100%{opacity:0}}</style>
</body>
</html>
