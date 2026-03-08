<?php
/**
 * Template Name: InteriorAR Landing
 * Template Post Type: page
 */
// Bloquear acceso directo
if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InteriorAR - Newsletter de Neurociencia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{background:#000!important;color:#f0f0f0;font-family:'Space Mono',monospace;font-size:14px;line-height:1.7;overflow-x:hidden}
a{text-decoration:none;color:inherit}
.noise{position:fixed;inset:0;z-index:9998;pointer-events:none;opacity:.04;background:url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E")}
.scanlines{position:fixed;inset:0;z-index:9997;pointer-events:none;background:repeating-linear-gradient(0deg,rgba(0,0,0,.15) 0px,rgba(0,0,0,.15) 1px,transparent 1px,transparent 2px)}
.distortion{height:60px;position:relative;overflow:hidden;background:#000}
.distortion-line{position:absolute;left:0;right:0;height:3px;background:linear-gradient(90deg,transparent 0%,#00f0ff 20%,#ff00ff 50%,#ffff00 80%,transparent 100%);animation:distortLine 2s ease-in-out infinite}
@keyframes distortLine{0%,100%{transform:translateX(-100%) scaleX(.3);opacity:0}50%{transform:translateX(100%) scaleX(1);opacity:1}}
.nav{position:fixed;top:0;left:0;right:0;z-index:100;padding:1.5rem 3rem;display:flex;justify-content:space-between;align-items:center;background:transparent;transition:all .3s ease}
.nav.scrolled{background:rgba(0,0,0,.95);backdrop-filter:blur(10px);border-bottom:1px solid rgba(255,107,0,.2)}
.nav-logo{font-family:'Bebas Neue',sans-serif;font-size:1.8rem;letter-spacing:.3em;color:#ff6b00;text-shadow:0 0 20px rgba(255,107,0,.4)}
.nav-links{display:flex;gap:2rem;align-items:center}
.nav-links a{font-size:.75rem;letter-spacing:.15em;color:#666;transition:color .2s}
.nav-links a:hover{color:#ff6b00}
.nav-cta{padding:.6rem 1.5rem!important;border:1px solid #ff6b00!important;color:#ff6b00!important;font-family:'Bebas Neue',sans-serif!important;font-size:1rem!important;letter-spacing:.2em!important;transition:all .2s ease!important}
.nav-cta:hover{background:#ff6b00!important;color:#000!important;box-shadow:0 0 30px rgba(255,107,0,.4)!important}
.hero{min-height:100vh;display:grid;grid-template-columns:1fr 1fr;position:relative;overflow:hidden}
.hero-bg{position:absolute;inset:0;overflow:hidden;opacity:.1}
.matrix-char{position:absolute;top:-20px;font-family:'Space Mono',monospace;font-size:14px;color:#ff6b00;animation:matrixFall linear infinite}
@keyframes matrixFall{from{transform:translateY(-100%);opacity:1}to{transform:translateY(100vh);opacity:0}}
.hero-content{padding:8rem 4rem 6rem;display:flex;flex-direction:column;justify-content:center;position:relative;z-index:2}
.hero-tag{font-size:.7rem;letter-spacing:.3em;color:#ff6b00;margin-bottom:2rem;display:flex;align-items:center;gap:.5rem}
.blink{animation:blink 1s infinite}
@keyframes blink{0%,50%{opacity:1}51%,100%{opacity:0}}
.hero-title{margin-bottom:2rem}
.title-small{display:block;font-family:'Space Mono',monospace;font-size:1rem;font-style:italic;color:rgba(255,255,255,.3);margin-bottom:.5rem}
.title-big{display:block;font-family:'Bebas Neue',sans-serif;font-size:clamp(4rem,10vw,8rem);line-height:.9;letter-spacing:.05em;text-transform:uppercase}
.title-accent{color:#ff6b00;text-shadow:0 0 40px rgba(255,107,0,.4),2px 2px 0 #00f0ff,-2px -2px 0 #ff00ff;animation:titleGlitch 5s infinite}
@keyframes titleGlitch{0%,95%,100%{text-shadow:0 0 40px rgba(255,107,0,.4),2px 2px 0 #00f0ff,-2px -2px 0 #ff00ff;transform:none}96%{text-shadow:-5px 0 #00f0ff,5px 0 #ff00ff;transform:translateX(-3px)}97%{text-shadow:5px 0 #00f0ff,-5px 0 #ff00ff;transform:translateX(3px)}98%{text-shadow:0 0 40px rgba(255,107,0,.4);transform:none}}
.hero-text{max-width:550px;margin-bottom:2rem}
.hero-text p{font-size:.95rem;line-height:1.9;color:rgba(255,255,255,.5)}
.hero-text strong{color:#f0f0f0}
.hero-callout{position:relative;padding:1.5rem 2rem;margin-bottom:2.5rem;background:rgba(255,107,0,.05);border-left:3px solid #ff6b00;max-width:550px}
.hero-callout p{font-size:.9rem;line-height:1.8;color:rgba(255,255,255,.6);margin-bottom:.75rem}
.hero-callout p:last-child{margin-bottom:0}
.highlight{color:#ff6b00;font-weight:700}
.callout-accent{color:#ff6b00!important;font-weight:600}
.hero-form{max-width:500px}
.form-label{display:block;font-size:.7rem;letter-spacing:.2em;color:#ff6b00;margin-bottom:1rem}
.hero-glitch{display:flex;align-items:center;justify-content:center;position:relative;padding:4rem}
.glitch-img{width:100%;max-width:550px;height:auto;animation:glitchFloat 6s ease-in-out infinite;filter:drop-shadow(0 0 80px rgba(255,107,0,.4))}
@keyframes glitchFloat{0%,100%{transform:translateY(0) rotate(0deg)}25%{transform:translateY(-15px) rotate(1deg)}50%{transform:translateY(-5px) rotate(-1deg)}75%{transform:translateY(-20px) rotate(.5deg)}}
.glitch-aura{position:absolute;inset:10%;background:radial-gradient(circle,rgba(255,107,0,.4) 0%,transparent 70%);filter:blur(60px);animation:auraPulse 4s ease-in-out infinite}
@keyframes auraPulse{0%,100%{opacity:.3;transform:scale(1)}50%{opacity:.6;transform:scale(1.1)}}
.scroll-indicator{position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);display:flex;flex-direction:column;align-items:center;gap:.5rem}
.scroll-indicator span{font-size:.6rem;letter-spacing:.3em;color:#666}
.scroll-line{width:1px;height:40px;background:linear-gradient(to bottom,#ff6b00,transparent);animation:scrollPulse 2s ease-in-out infinite}
@keyframes scrollPulse{0%,100%{opacity:1;height:40px}50%{opacity:.3;height:20px}}
.form-container{width:100%}
.form-row{display:flex;gap:0;margin-bottom:1rem}
.input-wrap{flex:1;position:relative}
.input-wrap input[type="email"]{width:100%;padding:1rem 1.25rem;background:rgba(255,255,255,.03);border:1px solid rgba(255,255,255,.1);border-right:none;color:#f0f0f0;font-family:'Space Mono',monospace;font-size:.9rem;outline:none;transition:all .2s}
.input-wrap input::placeholder{color:rgba(255,255,255,.2)}
.input-wrap input:focus{border-color:#ff6b00;background:rgba(255,107,0,.05)}
.form-container button{padding:1rem 2rem;background:#ff6b00;border:1px solid #ff6b00;font-family:'Bebas Neue',sans-serif;font-size:1rem;letter-spacing:.15em;color:#000;cursor:pointer;transition:all .2s}
.form-container button:hover{box-shadow:0 0 30px rgba(255,107,0,.4)}
.checkbox-wrap{display:flex;align-items:flex-start;gap:.75rem;cursor:pointer;margin-bottom:.75rem}
.checkbox-wrap input[type="checkbox"]{width:18px;height:18px;accent-color:#ff6b00;cursor:pointer}
.checkbox-text{font-size:.8rem;color:rgba(255,255,255,.4)}
.checkbox-text a{color:#ff6b00;border-bottom:1px solid transparent;transition:border-color .2s}
.checkbox-text a:hover{border-bottom-color:#ff6b00}
.form-note{font-size:.7rem;color:rgba(255,255,255,.25)}
.origin{background:#fafafa;color:#000;padding:0}
.section-tag{display:block;font-size:.65rem;letter-spacing:.25em;color:#ff6b00;margin-bottom:1.5rem}
.origin-content{display:grid;grid-template-columns:1fr 1fr;gap:6rem;padding:6rem 4rem;max-width:1400px;margin:0 auto}
.origin-left h2{font-family:'Bebas Neue',sans-serif;font-size:clamp(2.5rem,5vw,4rem);line-height:1;letter-spacing:.02em;margin-bottom:2rem}
.origin-left h2 .accent{color:#ff6b00}
.origin-left h2 em{font-style:italic;font-family:Georgia,serif}
.origin-text p{font-size:.95rem;line-height:1.9;color:rgba(0,0,0,.6);margin-bottom:1.25rem}
.origin-text strong{color:#000}
.origin-right{display:flex;align-items:center;justify-content:center}
.glitch-showcase{position:relative;width:100%;max-width:400px}
.showcase-img{width:100%;height:auto;display:block;filter:drop-shadow(0 20px 60px rgba(255,107,0,.3));animation:showcaseFloat 8s ease-in-out infinite}
@keyframes showcaseFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-20px)}}
.mechanism{background:#000;padding:5rem 4rem}
.mechanism .section-tag{max-width:1400px;margin:0 auto 2rem}
.mechanism-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:2rem;max-width:1400px;margin:0 auto}
.mechanism-item{padding:2rem;background:rgba(255,255,255,.02);border-left:2px solid #ff6b00;transition:all .3s}
.mechanism-item:hover{background:rgba(255,107,0,.05);transform:translateX(10px)}
.mechanism-num{display:block;font-family:'Bebas Neue',sans-serif;font-size:2.5rem;color:#ff6b00;margin-bottom:1rem}
.mechanism-item p{font-size:.85rem;line-height:1.8;color:rgba(255,255,255,.5)}
.mechanism-item strong{color:#f0f0f0}
.territories{background:#0a0a0a;padding:6rem 4rem}
.territories-header{max-width:1400px;margin:0 auto 4rem}
.territories-header h2{font-family:'Bebas Neue',sans-serif;font-size:clamp(2rem,4vw,3.5rem);letter-spacing:.1em;margin-bottom:1rem;color:#f0f0f0}
.territories-header p{font-size:.9rem;color:rgba(255,255,255,.4);max-width:600px}
.topics-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:1px;background:rgba(255,107,0,.1);max-width:1400px;margin:0 auto}
.topic-card{background:#0a0a0a;padding:2.5rem;position:relative;overflow:hidden;transition:all .3s}
.topic-card::before{content:'';position:absolute;top:0;left:0;width:3px;height:0;background:#ff6b00;transition:height .3s}
.topic-card:hover::before{height:100%}
.topic-card:hover{background:rgba(255,107,0,.03)}
.topic-num{position:absolute;top:1.5rem;right:1.5rem;font-family:'Bebas Neue',sans-serif;font-size:3rem;color:rgba(255,255,255,.03)}
.topic-tag{display:inline-block;font-size:.6rem;letter-spacing:.2em;color:#00f0ff;padding:.25rem .75rem;border:1px solid #00f0ff;margin-bottom:1rem;opacity:.6;transition:opacity .2s}
.topic-card:hover .topic-tag{opacity:1}
.topic-card h3{font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:.05em;margin-bottom:.5rem;color:#f0f0f0}
.topic-card p{font-size:.85rem;color:rgba(255,255,255,.4);line-height:1.7}
.why-section{background:#1a1a1a}
.why-content{padding:6rem 4rem;max-width:1400px;margin:0 auto}
.why-content .section-tag{text-align:center}
.why-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:2rem;margin-top:3rem}
.why-card{padding:2.5rem;background:#000;border-top:3px solid #ff6b00;transition:transform .3s}
.why-card:hover{transform:translateY(-10px)}
.why-card h3{font-family:'Bebas Neue',sans-serif;font-size:1.5rem;letter-spacing:.1em;color:#ff6b00;margin-bottom:1rem}
.why-card p{font-size:.85rem;line-height:1.8;color:rgba(255,255,255,.5);margin-bottom:1.5rem}
.why-card blockquote{font-size:.8rem;font-style:italic;color:#ff6b00;padding-left:1rem;border-left:2px solid #ff6b00;opacity:.7;margin:0}
.cta-section{background:#000;padding:8rem 4rem;text-align:center}
.cta-content{max-width:800px;margin:0 auto}
.section-tag.center{text-align:center}
.cta-section h2{font-family:'Bebas Neue',sans-serif;font-size:clamp(2.5rem,5vw,4.5rem);line-height:1;margin-bottom:2rem;color:#f0f0f0}
.cta-section h2 .accent{color:#ff6b00;display:block}
.cta-body{font-size:1rem;color:rgba(255,255,255,.5);margin-bottom:2rem}
.cta-quote{padding:2rem;border-top:1px solid rgba(255,255,255,.1);border-bottom:1px solid rgba(255,255,255,.1)}
.cta-quote p{font-size:.9rem;font-style:italic;color:rgba(255,255,255,.4);margin-bottom:1rem}
.cta-quote strong{color:#ff6b00;font-style:normal;display:block}
.final-section{display:grid;grid-template-columns:1fr 1fr;min-height:100vh}
.final-glitch{background:#000;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden}
.final-glitch img{width:80%;max-width:400px;filter:drop-shadow(0 0 80px rgba(255,107,0,.4));animation:finalFloat 10s ease-in-out infinite}
@keyframes finalFloat{0%,100%{transform:translateY(0) scale(1)}50%{transform:translateY(-30px) scale(1.02)}}
.final-glitch-overlay{position:absolute;inset:0;background:radial-gradient(circle at center,transparent 30%,#000 100%)}
.final-content{background:#fafafa;color:#000;padding:6rem 4rem;display:flex;flex-direction:column;justify-content:center}
.final-content h2{font-family:'Bebas Neue',sans-serif;font-size:clamp(2rem,4vw,3.5rem);line-height:1;margin-bottom:1.5rem}
.final-content h2 .accent{color:#ff6b00;display:block}
.final-content>p{font-size:.95rem;line-height:1.8;color:rgba(0,0,0,.6);margin-bottom:2rem;max-width:500px}
.final-content .form-container{max-width:500px}
.final-content .form-container input[type="email"]{background:rgba(0,0,0,.03);border-color:rgba(0,0,0,.1);color:#000}
.final-content .form-container input::placeholder{color:rgba(0,0,0,.3)}
.final-content .checkbox-text{color:rgba(0,0,0,.5)}
.final-content .form-note{color:rgba(0,0,0,.3)}
.signature{margin-top:2rem;font-size:.7rem;letter-spacing:.2em;color:rgba(0,0,0,.25)}
.footer{background:#000;padding:2rem 4rem;border-top:1px solid rgba(255,107,0,.1)}
.footer-content{max-width:1400px;margin:0 auto;display:flex;justify-content:space-between;align-items:center}
.footer-logo{font-family:'Bebas Neue',sans-serif;font-size:1.2rem;letter-spacing:.3em;color:#ff6b00}
.footer-links{display:flex;gap:2rem}
.footer-links a{font-size:.7rem;letter-spacing:.15em;color:#666;transition:color .2s}
.footer-links a:hover{color:#ff6b00}
.footer p{font-size:.65rem;color:rgba(255,255,255,.2)}
.cookie-banner{position:fixed;bottom:1.5rem;left:50%;transform:translateX(-50%);z-index:1000;background:#000;border:1px solid #ff6b00;box-shadow:0 0 40px rgba(255,107,0,.4);max-width:600px;width:calc(100% - 2rem);display:none}
.cookie-content{display:flex;align-items:center;gap:1.5rem;padding:1.25rem 1.5rem}
.cookie-icon{font-size:2rem}
.cookie-content strong{display:block;font-family:'Bebas Neue',sans-serif;font-size:1rem;letter-spacing:.15em;color:#ff6b00;margin-bottom:.25rem}
.cookie-content p{font-size:.75rem;color:rgba(255,255,255,.5);margin:0}
.cookie-actions{display:flex;gap:.5rem;flex-shrink:0}
.cookie-btn{padding:.5rem 1rem;font-family:'Space Mono',monospace;font-size:.65rem;letter-spacing:.1em;background:transparent;border:1px solid rgba(255,255,255,.2);color:#f0f0f0;cursor:pointer;transition:all .2s}
.cookie-btn:hover{border-color:#f0f0f0}
.cookie-btn.primary{background:#ff6b00;border-color:#ff6b00;color:#000}
.cookie-btn.primary:hover{box-shadow:0 0 20px rgba(255,107,0,.4)}
@media(max-width:1024px){.hero{grid-template-columns:1fr}.hero-glitch{display:none}.hero-content{padding:8rem 2rem 4rem}.origin-content{grid-template-columns:1fr;gap:3rem;padding:4rem 2rem}.origin-right{order:-1}.mechanism-grid{grid-template-columns:repeat(2,1fr)}.mechanism{padding:4rem 2rem}.topics-grid{grid-template-columns:1fr}.why-grid{grid-template-columns:1fr}.final-section{grid-template-columns:1fr}.final-glitch{padding:4rem;min-height:50vh}.footer-content{flex-direction:column;gap:1rem;text-align:center}.cookie-content{flex-wrap:wrap;justify-content:center;text-align:center}}
@media(max-width:640px){.nav{padding:1rem 1.5rem}.nav-links a:not(.nav-cta){display:none}.hero-content{padding:7rem 1.5rem 3rem}.mechanism-grid{grid-template-columns:1fr}.territories,.why-content,.cta-section{padding:4rem 1.5rem}.final-content{padding:4rem 1.5rem}}
</style>
</head>
<body>
<div class="app">
    <div class="noise"></div>
    <div class="scanlines"></div>

    <nav class="nav" id="mainNav">
        <a href="<?php echo home_url(); ?>" class="nav-logo">INTERIORAR</a>
        <div class="nav-links">
            <a href="#transmision">[TRANSMISIÓN]</a>
            <a href="#territorios">[TERRITORIOS]</a>
            <a href="#suscribir" class="nav-cta">SUSCRIBIR_</a>
        </div>
    </nav>

    <main>
        <section class="hero">
            <div class="hero-bg" id="matrixBg"></div>
            <div class="hero-content">
                <span class="hero-tag"><span class="blink">&gt;</span> CANAL_DE_ENSAYO_VISUAL_CIENTÍFICO</span>
                <h1 class="hero-title">
                    <span class="title-small">No estás atascado.</span>
                    <span class="title-big">ESTÁS<br>SIENDO<br><span class="title-accent">DISEÑADO.</span></span>
                </h1>
                <div class="hero-text">
                    <p>Tu cerebro es una reliquia biológica de hace milenios. Las plataformas que usas para leer esto son laboratorios construidos ayer por ingenieros que cobran seis cifras para <strong>encontrar las grietas de tu evolución y colarse por ellas.</strong></p>
                </div>
                <div class="hero-callout">
                    <p>Esto no es autoayuda. El narrador es <strong class="highlight">GLITCH</strong>. No le importa si triunfas o si te hundes en la miseria. Solo le importan sus latas de atún.</p>
                    <p class="callout-accent">Y precisamente porque le das igual, es el único en quien puedes confiar.</p>
                </div>
                <div class="hero-form" id="transmision">
                    <span class="form-label">&gt; INICIAR_TRANSMISION_</span>
                    <div class="form-container">
                        <form action="TU_URL_ACUMBAMAIL" method="post">
                            <div class="form-row">
                                <div class="input-wrap"><input type="email" name="email" placeholder="tu@email.com" required></div>
                                <button type="submit">[ RECIBIR SEÑAL ]</button>
                            </div>
                            <label class="checkbox-wrap">
                                <input type="checkbox" name="gdpr" required>
                                <span class="checkbox-text">He leído la <a href="<?php echo home_url('/privacidad'); ?>">Política de Privacidad</a></span>
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
            <div class="scroll-indicator"><span>SCROLL</span><div class="scroll-line"></div></div>
        </section>

        <section class="origin">
            <div class="distortion"><?php for($i=0;$i<20;$i++): ?><div class="distortion-line" style="animation-delay:<?php echo $i*.05; ?>s"></div><?php endfor; ?></div>
            <div class="origin-content">
                <div class="origin-left">
                    <span class="section-tag">&gt; QUIEN_ES_GLITCH</span>
                    <h2>Te presento a <span class="accent">GLITCH</span>,<br>el gato que <em>no te quiere.</em></h2>
                    <div class="origin-text">
                        <p>No es un gurú. No es un coach. Es un gato callejero digital que un día apareció en mis notas y decidió quedarse. Le llamé GLITCH porque su existencia es un error en el código.</p>
                        <p><strong>Su única motivación son las latas de atún</strong> que le pago con cada suscriptor. Cuantos más seáis, más come. Y cuanto más come, más verdades incómodas suelta.</p>
                        <p>No le importa si te ofendes. No le importa si abandonas. <strong>No tiene ningún interés emocional en tu éxito.</strong> Y precisamente por eso, es el único que te va a decir lo que necesitas oír.</p>
                    </div>
                </div>
                <div class="origin-right">
                    <div class="glitch-showcase"><img src="https://customer-assets.emergentagent.com/job_design-boost-59/artifacts/vp4zid1l_descarga.png" alt="GLITCH" class="showcase-img"></div>
                </div>
            </div>
            <div class="mechanism">
                <span class="section-tag">&gt; COMO_FUNCIONA</span>
                <div class="mechanism-grid">
                    <div class="mechanism-item"><span class="mechanism-num">01</span><p>Recibes un email cada semana con un tema específico.</p></div>
                    <div class="mechanism-item"><span class="mechanism-num">02</span><p>El gato (GLITCH) te explica <strong>cómo te manipulan</strong> usando neurociencia.</p></div>
                    <div class="mechanism-item"><span class="mechanism-num">03</span><p>Al final del email encontrarás <strong>la herramienta de defensa</strong> correspondiente.</p></div>
                    <div class="mechanism-item"><span class="mechanism-num">04</span><p>Sin humo. Sin promesas. Sin motivación. <strong>Solo el manual de usuario de tu cerebro.</strong></p></div>
                </div>
            </div>
        </section>

        <section class="territories" id="territorios">
            <div class="territories-header">
                <span class="section-tag">&gt; TERRITORIOS_QUE_EXPLORAREMOS</span>
                <h2>BIBLIOTECA DE MANIPULACIONES</h2>
                <p>Cada semana atacamos un punto ciego diferente. El sistema tiene muchas puertas traseras a tu cerebro. Las iremos cerrando una a una.</p>
            </div>
            <div class="topics-grid">
                <div class="topic-card"><span class="topic-num">001</span><span class="topic-tag">DOPAMINA</span><h3>Scroll Infinito</h3><p>Por qué no puedes dejar el móvil (y qué hacer al respecto).</p></div>
                <div class="topic-card"><span class="topic-num">002</span><span class="topic-tag">CORTISOL</span><h3>Urgencia Artificial</h3><p>Cómo las notificaciones secuestran tu sistema de alerta.</p></div>
                <div class="topic-card"><span class="topic-num">003</span><span class="topic-tag">SEROTONINA</span><h3>Comparación Social</h3><p>El algoritmo que destruye tu autoestima en 3 segundos.</p></div>
                <div class="topic-card"><span class="topic-num">004</span><span class="topic-tag">OXITOCINA</span><h3>Falsa Conexión</h3><p>Likes, corazones y el vacío que dejan.</p></div>
                <div class="topic-card"><span class="topic-num">005</span><span class="topic-tag">GABA</span><h3>FOMO Engineered</h3><p>Miedo a perderte algo que nunca existió.</p></div>
                <div class="topic-card"><span class="topic-num">006</span><span class="topic-tag">ACETILCOLINA</span><h3>Atención Fragmentada</h3><p>Tu capacidad de concentración, vendida al mejor postor.</p></div>
            </div>
        </section>

        <section class="why-section">
            <div class="distortion"><?php for($i=0;$i<20;$i++): ?><div class="distortion-line" style="animation-delay:<?php echo $i*.05; ?>s"></div><?php endfor; ?></div>
            <div class="why-content">
                <span class="section-tag">&gt; POR_QUE_ESTO_ES_DIFERENTE</span>
                <div class="why-grid">
                    <div class="why-card"><h3>NO ES MOTIVACIÓN</h3><p>La motivación es gasolina de bajo octanaje. Se evapora. Aquí hablamos de mecánica: cómo funcionas, por qué fallas, qué palancas tocar.</p><blockquote>"No necesitas motivación. Necesitas entender el sistema."</blockquote></div>
                    <div class="why-card"><h3>NO ES COACHING</h3><p>Un coach te vende una versión mejorada de ti. GLITCH te enseña los planos del edificio para que dejes de chocar contra las paredes.</p><blockquote>"Los coaches venden esperanza. Nosotros vendemos esquemas eléctricos."</blockquote></div>
                    <div class="why-card"><h3>NO ES AUTOAYUDA</h3><p>La autoayuda asume que el problema eres tú. Aquí partimos de otra premisa: el problema es que nadie te explicó cómo funciona la máquina.</p><blockquote>"No estás roto. Estás operando sin manual."</blockquote></div>
                </div>
            </div>
        </section>

        <section class="cta-section">
            <div class="cta-content">
                <span class="section-tag center">&gt; INSTALACIÓN_FINAL</span>
                <h2>Ya no puedes decir<br><span class="accent">que no lo sabías.</span></h2>
                <p class="cta-body">Una newsletter semanal de neurociencia y comportamiento. Sin coaches. Sin motivación. Sin suavizar. Gratis.</p>
                <div class="cta-quote">
                    <p>"Cada martes que pasas sin entender cómo te manipulan, es un martes que el sistema gana una partida que tú ni siquiera sabías que estabas jugando."</p>
                    <strong>GLITCH necesita sus latas. Tú necesitas el manual.</strong>
                </div>
            </div>
        </section>

        <section class="final-section" id="suscribir">
            <div class="final-glitch">
                <img src="https://customer-assets.emergentagent.com/job_design-boost-59/artifacts/drhyyz5i_De_espalda.png" alt="GLITCH">
                <div class="final-glitch-overlay"></div>
            </div>
            <div class="final-content">
                <h2>Última transmisión<br><span class="accent">antes de cerrar.</span></h2>
                <p>Si has llegado hasta aquí, algo resonó. Eso significa que tu cerebro ya detectó la señal entre el ruido. Ahora solo queda una decisión: seguir en modo automático, o empezar a leer el código.</p>
                <div class="form-container">
                    <form action="TU_URL_ACUMBAMAIL" method="post">
                        <div class="form-row">
                            <div class="input-wrap"><input type="email" name="email" placeholder="tu@email.com" required></div>
                            <button type="submit">[ RECIBIR SEÑAL ]</button>
                        </div>
                        <label class="checkbox-wrap">
                            <input type="checkbox" name="gdpr" required>
                            <span class="checkbox-text">He leído la <a href="<?php echo home_url('/privacidad'); ?>">Política de Privacidad</a></span>
                        </label>
                    </form>
                    <p class="form-note">Sin spam. Sin coaching. Sin bullshit. Cancelas cuando quieras.</p>
                </div>
                <span class="signature">— GLITCH & humano asociado</span>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <span class="footer-logo">INTERIORAR</span>
            <div class="footer-links">
                <a href="<?php echo home_url('/privacidad'); ?>">[PRIVACIDAD]</a>
                <a href="<?php echo home_url('/legal'); ?>">[LEGAL]</a>
                <a href="<?php echo home_url('/contacto'); ?>">[CONTACTO]</a>
            </div>
            <p>© <?php echo date('Y'); ?> INTERIORAR. Un error en el código.</p>
        </div>
    </footer>

    <div class="cookie-banner" id="cookieBanner">
        <div class="cookie-content">
            <span class="cookie-icon">🍪</span>
            <div><strong>COOKIES & PRIVACIDAD</strong><p>Usamos cookies para que GLITCH recuerde quién eres.</p></div>
            <div class="cookie-actions">
                <button class="cookie-btn" onclick="document.getElementById('cookieBanner').style.display='none'">[CONFIGURAR]</button>
                <button class="cookie-btn primary" onclick="localStorage.setItem('cookies','1');document.getElementById('cookieBanner').style.display='none'">[ACEPTAR]</button>
            </div>
        </div>
    </div>
</div>

<script>
(function(){
var nav=document.getElementById('mainNav');
window.addEventListener('scroll',function(){nav.classList.toggle('scrolled',window.scrollY>100)});
var bg=document.getElementById('matrixBg');
function mc(){var c=document.createElement('span');c.className='matrix-char';c.textContent=String.fromCharCode(12448+Math.random()*96);c.style.left=Math.random()*100+'%';c.style.animationDuration=(3+Math.random()*4)+'s';c.style.animationDelay=Math.random()*5+'s';bg.appendChild(c);setTimeout(function(){c.remove()},10000)}
for(var i=0;i<50;i++)setTimeout(mc,i*100);setInterval(mc,200);
document.querySelectorAll('a[href^="#"]').forEach(function(a){a.addEventListener('click',function(e){e.preventDefault();var t=document.querySelector(this.getAttribute('href'));if(t)t.scrollIntoView({behavior:'smooth',block:'start'})})});
if(!localStorage.getItem('cookies'))setTimeout(function(){document.getElementById('cookieBanner').style.display='block'},2500);
})();
</script>
</body>
</html>
