<?php
/**
 * Template Name: InteriorAR Landing
 * Template Post Type: page
 * 
 * Landing page para InteriorAR Newsletter
 * Coloca este archivo en: wp-content/themes/generatepress-child/page-interiorar.php
 */

// Evitar que WordPress cargue el header/footer por defecto
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/interiorar.css">
    
    <?php wp_head(); ?>
</head>
<body class="interiorar-landing">

<div class="app">
    <div class="noise"></div>
    <div class="scanlines"></div>
    <div class="cursor-glitch" id="cursorGlitch">
        <img src="https://customer-assets.emergentagent.com/job_design-boost-59/artifacts/drhyyz5i_De_espalda.png" alt="">
    </div>

    <!-- NAVIGATION -->
    <nav class="nav" id="mainNav">
        <a href="<?php echo home_url(); ?>" class="nav-logo">
            <span class="glitchy" data-text="INTERIORAR">INTERIORAR</span>
        </a>
        <div class="nav-links">
            <a href="#transmision">[TRANSMISIÓN]</a>
            <a href="#territorios">[TERRITORIOS]</a>
            <a href="#suscribir" class="nav-cta">SUSCRIBIR_</a>
        </div>
    </nav>

    <main>
        <!-- HERO SECTION -->
        <section class="hero">
            <div class="hero-bg" id="matrixBg"></div>
            
            <div class="hero-content">
                <span class="hero-tag">
                    <span class="blink">&gt;</span> CANAL_DE_ENSAYO_VISUAL_CIENTÍFICO
                </span>
                
                <h1 class="hero-title">
                    <span class="title-small">No estás atascado.</span>
                    <span class="title-big">
                        <span class="scramble" data-text="ESTÁS">ESTÁS</span><br>
                        <span class="scramble" data-text="SIENDO" data-delay="300">SIENDO</span><br>
                        <span class="title-accent">
                            <span class="scramble" data-text="DISEÑADO." data-delay="600">DISEÑADO.</span>
                        </span>
                    </span>
                </h1>

                <div class="hero-text">
                    <p>
                        Tu cerebro es una reliquia biológica de hace milenios. Las plataformas que usas para leer esto son laboratorios construidos ayer por ingenieros que cobran seis cifras para <strong>encontrar las grietas de tu evolución y colarse por ellas.</strong>
                    </p>
                </div>

                <div class="hero-callout">
                    <p>
                        Esto no es autoayuda. El narrador es <strong class="highlight">GLITCH</strong>. No le importa si triunfas o si te hundes en la miseria. Solo le importan sus latas de atún.
                    </p>
                    <p class="callout-accent">
                        Y precisamente porque le das igual, es el único en quien puedes confiar.
                    </p>
                </div>

                <div class="hero-form" id="transmision">
                    <span class="form-label">&gt; INICIAR_TRANSMISION_</span>
                    
                    <!-- FORMULARIO ACUMBAMAIL - Reemplaza ACTION con tu URL -->
                    <div class="form-container">
                        <form action="TU_URL_DE_ACUMBAMAIL" method="post" id="heroForm">
                            <div class="form-row">
                                <div class="input-wrap">
                                    <input type="email" name="email" placeholder="tu@email.com" required>
                                    <span class="input-glitch"></span>
                                </div>
                                <button type="submit">
                                    <span class="btn-text">[ RECIBIR SEÑAL ]</span>
                                    <span class="btn-glitch">[ RECIBIR SEÑAL ]</span>
                                </button>
                            </div>
                            <label class="checkbox-wrap">
                                <input type="checkbox" name="gdpr" required>
                                <span class="checkmark"></span>
                                <span class="checkbox-text">
                                    He leído la <a href="<?php echo home_url('/privacidad'); ?>">Política de Privacidad</a>
                                </span>
                            </label>
                        </form>
                        <p class="form-note">Sin spam. Sin coaching. Sin bullshit. Cancelas cuando quieras.</p>
                    </div>
                </div>
            </div>

            <div class="hero-glitch">
                <img src="https://customer-assets.emergentagent.com/job_design-boost-59/artifacts/drhyyz5i_De_espalda.png" alt="GLITCH" class="glitch-img">
                <div class="glitch-aura"></div>
            </div>

            <div class="scroll-indicator">
                <span>SCROLL</span>
                <div class="scroll-line"></div>
            </div>
        </section>

        <!-- ORIGIN SECTION -->
        <section class="origin">
            <div class="distortion">
                <?php for($i = 0; $i < 20; $i++): ?>
                <div class="distortion-line" style="animation-delay: <?php echo $i * 0.05; ?>s"></div>
                <?php endfor; ?>
            </div>
            
            <div class="origin-content">
                <div class="origin-left">
                    <span class="section-tag">&gt; QUIEN_ES_GLITCH</span>
                    <h2>
                        Te presento a <span class="accent">GLITCH</span>,<br>
                        el gato que <em>no te quiere.</em>
                    </h2>
                    
                    <div class="origin-text">
                        <p>
                            No es un gurú. No es un coach. Es un gato callejero digital que un día apareció en mis notas y decidió quedarse. Le llamé GLITCH porque su existencia es un error en el código.
                        </p>
                        <p>
                            <strong>Su única motivación son las latas de atún</strong> que le pago con cada suscriptor. Cuantos más seáis, más come. Y cuanto más come, más verdades incómodas suelta.
                        </p>
                        <p>
                            No le importa si te ofendes. No le importa si abandonas. <strong>No tiene ningún interés emocional en tu éxito.</strong> Y precisamente por eso, es el único que te va a decir lo que necesitas oír.
                        </p>
                    </div>
                </div>

                <div class="origin-right">
                    <div class="glitch-showcase">
                        <img src="https://customer-assets.emergentagent.com/job_design-boost-59/artifacts/vp4zid1l_descarga.png" alt="GLITCH" class="showcase-img">
                        <div class="showcase-scanlines"></div>
                        <div class="showcase-noise"></div>
                    </div>
                </div>
            </div>

            <div class="mechanism">
                <span class="section-tag">&gt; COMO_FUNCIONA</span>
                <div class="mechanism-grid">
                    <div class="mechanism-item">
                        <span class="mechanism-num">01</span>
                        <p>Recibes un email cada semana con un tema específico.</p>
                    </div>
                    <div class="mechanism-item">
                        <span class="mechanism-num">02</span>
                        <p>El gato (GLITCH) te explica <strong>cómo te manipulan</strong> usando neurociencia.</p>
                    </div>
                    <div class="mechanism-item">
                        <span class="mechanism-num">03</span>
                        <p>Al final del email encontrarás <strong>la herramienta de defensa</strong> correspondiente.</p>
                    </div>
                    <div class="mechanism-item">
                        <span class="mechanism-num">04</span>
                        <p>Sin humo. Sin promesas. Sin motivación. <strong>Solo el manual de usuario de tu cerebro.</strong></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- TERRITORIES SECTION -->
        <section class="territories" id="territorios">
            <div class="territories-header">
                <span class="section-tag">&gt; TERRITORIOS_QUE_EXPLORAREMOS</span>
                <h2 class="scramble" data-text="BIBLIOTECA DE MANIPULACIONES">BIBLIOTECA DE MANIPULACIONES</h2>
                <p>Cada semana atacamos un punto ciego diferente. El sistema tiene muchas puertas traseras a tu cerebro. Las iremos cerrando una a una.</p>
            </div>

            <div class="topics-grid">
                <div class="topic-card">
                    <span class="topic-num">001</span>
                    <span class="topic-tag">DOPAMINA</span>
                    <h3>Scroll Infinito</h3>
                    <p>Por qué no puedes dejar el móvil (y qué hacer al respecto).</p>
                    <div class="topic-glitch"></div>
                </div>
                <div class="topic-card">
                    <span class="topic-num">002</span>
                    <span class="topic-tag">CORTISOL</span>
                    <h3>Urgencia Artificial</h3>
                    <p>Cómo las notificaciones secuestran tu sistema de alerta.</p>
                    <div class="topic-glitch"></div>
                </div>
                <div class="topic-card">
                    <span class="topic-num">003</span>
                    <span class="topic-tag">SEROTONINA</span>
                    <h3>Comparación Social</h3>
                    <p>El algoritmo que destruye tu autoestima en 3 segundos.</p>
                    <div class="topic-glitch"></div>
                </div>
                <div class="topic-card">
                    <span class="topic-num">004</span>
                    <span class="topic-tag">OXITOCINA</span>
                    <h3>Falsa Conexión</h3>
                    <p>Likes, corazones y el vacío que dejan.</p>
                    <div class="topic-glitch"></div>
                </div>
                <div class="topic-card">
                    <span class="topic-num">005</span>
                    <span class="topic-tag">GABA</span>
                    <h3>FOMO Engineered</h3>
                    <p>Miedo a perderte algo que nunca existió.</p>
                    <div class="topic-glitch"></div>
                </div>
                <div class="topic-card">
                    <span class="topic-num">006</span>
                    <span class="topic-tag">ACETILCOLINA</span>
                    <h3>Atención Fragmentada</h3>
                    <p>Tu capacidad de concentración, vendida al mejor postor.</p>
                    <div class="topic-glitch"></div>
                </div>
            </div>
        </section>

        <!-- WHY SECTION -->
        <section class="why-section">
            <div class="distortion">
                <?php for($i = 0; $i < 20; $i++): ?>
                <div class="distortion-line" style="animation-delay: <?php echo $i * 0.05; ?>s"></div>
                <?php endfor; ?>
            </div>
            <div class="why-content">
                <span class="section-tag">&gt; POR_QUE_ESTO_ES_DIFERENTE</span>
                
                <div class="why-grid">
                    <div class="why-card">
                        <h3><span class="glitchy" data-text="NO ES MOTIVACIÓN">NO ES MOTIVACIÓN</span></h3>
                        <p>La motivación es gasolina de bajo octanaje. Se evapora. Aquí hablamos de mecánica: cómo funcionas, por qué fallas, qué palancas tocar.</p>
                        <blockquote>"No necesitas motivación. Necesitas entender el sistema."</blockquote>
                    </div>
                    <div class="why-card">
                        <h3><span class="glitchy" data-text="NO ES COACHING">NO ES COACHING</span></h3>
                        <p>Un coach te vende una versión mejorada de ti. GLITCH te enseña los planos del edificio para que dejes de chocar contra las paredes.</p>
                        <blockquote>"Los coaches venden esperanza. Nosotros vendemos esquemas eléctricos."</blockquote>
                    </div>
                    <div class="why-card">
                        <h3><span class="glitchy" data-text="NO ES AUTOAYUDA">NO ES AUTOAYUDA</span></h3>
                        <p>La autoayuda asume que el problema eres tú. Aquí partimos de otra premisa: el problema es que nadie te explicó cómo funciona la máquina.</p>
                        <blockquote>"No estás roto. Estás operando sin manual."</blockquote>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA SECTION -->
        <section class="cta-section">
            <div class="cta-content">
                <span class="section-tag center">&gt; INSTALACIÓN_FINAL</span>
                <h2>
                    Ya no puedes decir<br>
                    <span class="accent">que no lo sabías.</span>
                </h2>
                <p class="cta-body">
                    Una newsletter semanal de neurociencia y comportamiento. Sin coaches. Sin motivación. Sin suavizar. Gratis.
                </p>
                <div class="cta-quote">
                    <p>
                        "Cada martes que pasas sin entender cómo te manipulan, es un martes que el sistema gana una partida que tú ni siquiera sabías que estabas jugando."
                    </p>
                    <strong>GLITCH necesita sus latas. Tú necesitas el manual.</strong>
                </div>
            </div>
        </section>

        <!-- FINAL SECTION -->
        <section class="final-section" id="suscribir">
            <div class="final-glitch">
                <img src="https://customer-assets.emergentagent.com/job_design-boost-59/artifacts/drhyyz5i_De_espalda.png" alt="GLITCH">
                <div class="final-glitch-overlay"></div>
            </div>
            
            <div class="final-content">
                <h2>
                    Última transmisión<br>
                    <span class="accent">antes de cerrar.</span>
                </h2>
                <p>
                    Si has llegado hasta aquí, algo resonó. Eso significa que tu cerebro ya detectó la señal entre el ruido. Ahora solo queda una decisión: seguir en modo automático, o empezar a leer el código.
                </p>
                
                <!-- FORMULARIO ACUMBAMAIL - Reemplaza ACTION con tu URL -->
                <div class="form-container">
                    <form action="TU_URL_DE_ACUMBAMAIL" method="post" id="finalForm">
                        <div class="form-row">
                            <div class="input-wrap">
                                <input type="email" name="email" placeholder="tu@email.com" required>
                                <span class="input-glitch"></span>
                            </div>
                            <button type="submit">
                                <span class="btn-text">[ RECIBIR SEÑAL ]</span>
                                <span class="btn-glitch">[ RECIBIR SEÑAL ]</span>
                            </button>
                        </div>
                        <label class="checkbox-wrap">
                            <input type="checkbox" name="gdpr" required>
                            <span class="checkmark"></span>
                            <span class="checkbox-text">
                                He leído la <a href="<?php echo home_url('/privacidad'); ?>">Política de Privacidad</a>
                            </span>
                        </label>
                    </form>
                    <p class="form-note">Sin spam. Sin coaching. Sin bullshit. Cancelas cuando quieras.</p>
                </div>
                
                <span class="signature">— GLITCH & humano asociado</span>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-content">
            <span class="footer-logo"><span class="glitchy" data-text="INTERIORAR">INTERIORAR</span></span>
            <div class="footer-links">
                <a href="<?php echo home_url('/privacidad'); ?>">[PRIVACIDAD]</a>
                <a href="<?php echo home_url('/legal'); ?>">[LEGAL]</a>
                <a href="<?php echo home_url('/contacto'); ?>">[CONTACTO]</a>
            </div>
            <p>© <?php echo date('Y'); ?> INTERIORAR. Un error en el código.</p>
        </div>
    </footer>

    <!-- COOKIE BANNER -->
    <div class="cookie-banner" id="cookieBanner" style="display: none;">
        <div class="cookie-content">
            <span class="cookie-icon">🍪</span>
            <div>
                <strong>COOKIES & PRIVACIDAD</strong>
                <p>Usamos cookies para que GLITCH recuerde quién eres. Nada de tracking agresivo.</p>
            </div>
            <div class="cookie-actions">
                <button class="cookie-btn" onclick="closeCookies()">[CONFIGURAR]</button>
                <button class="cookie-btn primary" onclick="acceptCookies()">[ACEPTAR]</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/interiorar.js"></script>

<?php wp_footer(); ?>
</body>
</html>
