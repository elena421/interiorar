<?php
/**
 * Template Name: InteriorAR Casi Listo
 * Template Post Type: page
 */
if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Casi listo — InteriorAR</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=JetBrains+Mono:ital,wght@0,400;0,600;1,400&family=Newsreader:ital,opsz,wght@0,6..72,400..600;1,6..72,400..600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{background:#f5f2ee!important;color:#1a1a1a;font-family:'JetBrains Mono',monospace;font-size:15px;line-height:1.7;overflow-x:hidden;min-height:100vh;display:flex;flex-direction:column}
a{text-decoration:none;color:inherit}
.scanlines{position:fixed;inset:0;z-index:9997;pointer-events:none;background:repeating-linear-gradient(0deg,rgba(0,0,0,.08) 0px,rgba(0,0,0,.08) 1px,transparent 1px,transparent 2px)}
.noise{position:fixed;inset:0;z-index:9998;pointer-events:none;opacity:.02}

.nav{position:fixed;top:0;left:0;right:0;z-index:100;padding:1.5rem 3rem;display:flex;justify-content:space-between;align-items:center;background:rgba(239,231,214,.96);border-bottom:1px solid rgba(200,90,0,.15)}
.nav-logo{font-family:'Bebas Neue',sans-serif;font-size:1.8rem;letter-spacing:.3em;color:#c85a00;text-shadow:0 0 20px rgba(200,90,0,.4);animation:logoGlitch 5s infinite}
@keyframes logoGlitch{0%,95%,100%{text-shadow:0 0 20px rgba(200,90,0,.4);transform:none}96%{text-shadow:-3px 0 #00f0ff,3px 0 #ff00ff;transform:translateX(-2px)}97%{text-shadow:3px 0 #00f0ff,-3px 0 #ff00ff;transform:translateX(2px)}98%{text-shadow:0 0 20px rgba(200,90,0,.4);transform:none}}

.page{flex:1;display:flex;align-items:center;justify-content:center;padding:8rem 2rem 4rem;position:relative;overflow:hidden}

/* background matrix rain — same as hero */
.page-bg{position:absolute;inset:0;overflow:hidden;opacity:.06;pointer-events:none}
.matrix-char{position:absolute;top:-20px;font-family:'JetBrains Mono',monospace;font-size:15px;color:#c85a00;animation:matrixFall linear infinite}
@keyframes matrixFall{from{transform:translateY(-100%);opacity:1}to{transform:translateY(100vh);opacity:0}}

.blink{animation:blink 1s infinite}
@keyframes blink{0%,50%{opacity:1}51%,100%{opacity:0}}

.content{max-width:680px;width:100%;text-align:center;position:relative;z-index:2}

.status-tag{font-size:.65rem;letter-spacing:.35em;color:#c85a00;margin-bottom:2.5rem;display:flex;align-items:center;justify-content:center;gap:.5rem}

.icon-wrap{margin-bottom:2.5rem;position:relative;display:inline-block}
.icon-ring{width:100px;height:100px;border:2px solid rgba(200,90,0,.4);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto;animation:ringPulse 3s ease-in-out infinite;position:relative}
.icon-ring::before{content:'';position:absolute;inset:-8px;border:1px solid rgba(200,90,0,.15);border-radius:50%;animation:ringPulse 3s ease-in-out infinite .5s}
@keyframes ringPulse{0%,100%{box-shadow:0 0 0 0 rgba(200,90,0,.2)}50%{box-shadow:0 0 40px 10px rgba(200,90,0,.1)}}
.icon-symbol{font-size:2.5rem;color:#c85a00;line-height:1}

.main-title{font-family:'Bebas Neue',sans-serif;font-size:clamp(3rem,8vw,6rem);line-height:.95;letter-spacing:.05em;margin-bottom:1.5rem}
.main-title .accent{color:#c85a00;text-shadow:0 0 40px rgba(200,90,0,.3),2px 2px 0 #00f0ff,-2px -2px 0 #ff00ff;animation:titleGlitch 5s infinite;display:block}
@keyframes titleGlitch{0%,95%,100%{text-shadow:0 0 40px rgba(200,90,0,.3),2px 2px 0 #00f0ff,-2px -2px 0 #ff00ff;transform:none}96%{text-shadow:-4px 0 #00f0ff,4px 0 #ff00ff;transform:translateX(-2px)}97%{text-shadow:4px 0 #00f0ff,-4px 0 #ff00ff;transform:translateX(2px)}98%{text-shadow:0 0 40px rgba(200,90,0,.3);transform:none}}

.body-text{font-size:.95rem;line-height:1.9;color:rgba(26,26,26,.7);margin-bottom:2.5rem;max-width:520px;margin-left:auto;margin-right:auto}

.callout{padding:0 0 0 1.25rem;border-left:3px solid #c85a00;text-align:left;margin-bottom:2.5rem}
.callout p{font-size:.9rem;line-height:1.9;color:rgba(26,26,26,.75);margin-bottom:.4rem}
.callout p:last-child{margin-bottom:0}
.callout .accent-text{color:#e06800;font-weight:700}

.steps{display:flex;flex-direction:column;gap:1rem;margin-bottom:3rem;text-align:left}
.step{display:flex;align-items:flex-start;gap:1.25rem;padding:1.25rem 1.5rem;border-left:2px solid rgba(200,90,0,.3);background:rgba(200,90,0,.03);transition:all .3s}
.step:hover{border-left-color:#c85a00;background:rgba(200,90,0,.06)}
.step-num{font-family:'Bebas Neue',sans-serif;font-size:2rem;color:#c85a00;line-height:1;flex-shrink:0;min-width:2rem}
.step-text{font-size:.85rem;line-height:1.8;color:rgba(26,26,26,.7)}
.step-text strong{color:#fff}

.back-link{display:inline-flex;align-items:center;gap:.5rem;font-size:.75rem;letter-spacing:.15em;color:rgba(26,26,26,.35);transition:color .2s;margin-top:1rem}
.back-link:hover{color:#c85a00}

.footer{padding:1.5rem 3rem;border-top:1px solid rgba(200,90,0,.1);display:flex;justify-content:space-between;align-items:center}
.footer-logo{font-family:'Bebas Neue',sans-serif;font-size:1rem;letter-spacing:.3em;color:#c85a00}
.footer p{font-size:.65rem;color:rgba(26,26,26,.25)}

@media(max-width:640px){.nav{padding:1rem 1.5rem}.page{padding:7rem 1.5rem 3rem}.footer{flex-direction:column;gap:.75rem;text-align:center;padding:1.5rem}}
</style>
</head>
<body>
<div class="scanlines"></div>
<div class="noise"></div>

<nav class="nav">
  <a href="<?php echo home_url(); ?>" class="nav-logo">INTERIORAR</a>
</nav>

<main class="page">
  <div class="page-bg" id="matrixBg"></div>
  <div class="content">

    <div class="status-tag">
      <span class="blink">></span> TRANSMISIÓN_BLOQUEADA
    </div>

    <h1 class="main-title">
      La señal ha salido.<br>
      <span class="accent">Pero no ha llegado.</span>
    </h1>
    <p class="body-text">Todavía no.</p>

    <!-- REVISA EMAIL -->
    <div class="callout">
      <p><strong>📩 Revisa tu email ahora</strong></p>
      <p>Si no confirmas, esto se queda aquí.<br>El archivo no se envía. La transmisión no empieza.</p>
    </div>

    <!-- LO QUE VAS A RECIBIR -->
    <div class="callout">
      <p><strong>🔓 Lo que estás a punto de recibir</strong></p>
      <p>· el ARCHIVO_PERSONAL en Notion<br>
      · una forma de verte en menos de 15 minutos<br>
      · las próximas transmisiones (2 por semana)</p>
    </div>

    <!-- PASOS -->
    <div class="steps">
      <div class="step">
        <span class="step-num">01</span>
        <span class="step-text">Abre tu bandeja de entrada. Busca: <strong>no-reply@interiorar.com</strong></span>
      </div>
      <div class="step">
        <span class="step-num">02</span>
        <span class="step-text">Abre el email. Asunto: <strong>Confirma para recibir el archivo</strong></span>
      </div>
      <div class="step">
        <span class="step-num">03</span>
        <span class="step-text"><strong>Haz clic en el enlace</strong><br>
        Si no lo ves: → revisa spam o promociones → o busca "INTERIORAR"</span>
      </div>
    </div>

    <!-- IMPORTANTE -->
    <div class="callout" style="border-left-color:#c85a00;background:rgba(200,90,0,.08)">
      <p><strong>🧨 IMPORTANTE</strong></p>
      <p>Si no confirmas:<br>
      · no recibes el archivo<br>
      · no recibes nada más<br>
      · desapareces del sistema</p>
    </div>

    <!-- LO QUE PASA CASI SIEMPRE -->
    <div class="callout">
      <p><strong>🧠 Esto es lo que pasa casi siempre</strong></p>
      <p>La gente llega hasta aquí… y no hace clic.<br>
      No porque no quiera. Porque lo deja "para luego".<br>
      Y luego no existe.</p>
      <p><span class="accent-text">👉 Haz clic ahora.<br>O déjalo aquí y sigue igual.</span></p>
    </div>

    <!-- NOTA FINAL -->
    <p style="font-size:.78rem;color:rgba(26,26,26,.45);line-height:1.85;text-align:left;margin-top:.5rem">
      ⚠️ Recibirás el archivo + 2 emails por semana con análisis como este.<br>
      Si no te interesa, te vas en un clic.<br>
      <em>— GLITCH &amp; humano asociado</em>
    </p>

  </div>
</main>

<footer class="footer">
  <span class="footer-logo">INTERIORAR</span>
  <p>© 2025 INTERIORAR. Un error en el código.</p>
</footer>

<script>
(function(){
  var bg = document.getElementById('matrixBg');
  function mc(){
    var c = document.createElement('span');
    c.className = 'matrix-char';
    c.textContent = String.fromCharCode(12448 + Math.random()*96);
    c.style.left = Math.random()*100+'%';
    c.style.animationDuration = (3+Math.random()*4)+'s';
    c.style.animationDelay = Math.random()*3+'s';
    bg.appendChild(c);
    setTimeout(function(){c.remove()},10000);
  }
  for(var i=0;i<30;i++) setTimeout(mc,i*120);
  setInterval(mc,400);
})();
</script>
</body>
</html>
