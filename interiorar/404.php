<?php
/**
 * 404 — InteriorAR
 */
if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>404 — Señal perdida · INTERIORAR</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Mono:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html,body{height:100%}
body{background:#000;color:#f0f0f0;font-family:'Space Mono',monospace;font-size:14px;line-height:1.7;overflow:hidden;display:flex;flex-direction:column}

.scanlines{position:fixed;inset:0;z-index:9997;pointer-events:none;background:repeating-linear-gradient(0deg,rgba(0,0,0,.08) 0,rgba(0,0,0,.08) 1px,transparent 1px,transparent 2px)}

/* ── NAV ── */
.nav{padding:1.4rem 3rem;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid rgba(200,90,0,.15);flex-shrink:0}
.nav-logo{font-family:'Bebas Neue',sans-serif;font-size:1.7rem;letter-spacing:.3em;color:#c85a00;text-decoration:none;text-shadow:0 0 18px rgba(200,90,0,.4);animation:logoGlitch 5s infinite}
@keyframes logoGlitch{
  0%,95%,100%{text-shadow:0 0 18px rgba(200,90,0,.4);transform:none}
  96%{text-shadow:-2px 0 #00f0ff,2px 0 #ff00ff;transform:translateX(-1px)}
  97%{text-shadow:2px 0 #00f0ff,-2px 0 #ff00ff;transform:translateX(1px)}
  98%{text-shadow:0 0 18px rgba(200,90,0,.4);transform:none}
}
.nav-back{font-size:.65rem;letter-spacing:.18em;color:rgba(255,255,255,.3);text-decoration:none;transition:color .2s}
.nav-back:hover{color:#c85a00}

/* ── MAIN ── */
.main{flex:1;display:flex;flex-direction:column;align-items:center;justify-content:center;padding:2rem 3rem;position:relative;text-align:center}

/* glitch number */
.error-num{
  font-family:'Bebas Neue',sans-serif;
  font-size:clamp(8rem,22vw,18rem);
  line-height:.85;
  color:#0d0d0d;
  letter-spacing:.05em;
  position:relative;
  user-select:none;
  animation:numGlitch 4s infinite;
}
.error-num::before,
.error-num::after{
  content:'404';
  position:absolute;inset:0;
  font-family:'Bebas Neue',sans-serif;
  font-size:inherit;letter-spacing:inherit;line-height:inherit;
}
.error-num::before{
  color:rgba(200,90,0,.6);
  clip-path:polygon(0 30%,100% 30%,100% 50%,0 50%);
  animation:glitchTop 4s infinite;
}
.error-num::after{
  color:rgba(0,212,232,.4);
  clip-path:polygon(0 55%,100% 55%,100% 70%,0 70%);
  animation:glitchBot 4s infinite;
}

@keyframes numGlitch{
  0%,90%,100%{transform:none}
  91%{transform:translateX(-3px)}
  92%{transform:translateX(3px)}
  93%{transform:none}
  95%{transform:translateX(-2px) skewX(-2deg)}
  96%{transform:none}
}
@keyframes glitchTop{
  0%,89%,100%{transform:none;opacity:0}
  90%{transform:translateX(-4px);opacity:1}
  91%{transform:translateX(4px);opacity:1}
  92%{transform:none;opacity:0}
  94%{transform:translateX(3px);opacity:1}
  95%{transform:none;opacity:0}
}
@keyframes glitchBot{
  0%,89%,100%{transform:none;opacity:0}
  90%{transform:translateX(4px);opacity:1}
  92%{transform:translateX(-3px);opacity:1}
  93%{transform:none;opacity:0}
  95%{transform:translateX(-4px);opacity:1}
  96%{transform:none;opacity:0}
}

/* tag */
.error-tag{
  font-size:.62rem;letter-spacing:.3em;color:#c85a00;
  margin-bottom:1.2rem;
  display:flex;align-items:center;justify-content:center;gap:.5rem;
}
.blink{animation:blink 1s step-end infinite}
@keyframes blink{0%,50%{opacity:1}51%,100%{opacity:0}}

/* message */
.error-title{
  font-family:'Bebas Neue',sans-serif;
  font-size:clamp(1.6rem,4vw,2.8rem);
  letter-spacing:.04em;
  color:#f0f0f0;
  margin-bottom:1rem;
  line-height:1;
}
.error-title .accent{color:#c85a00}

.error-body{
  font-size:.82rem;line-height:1.95;
  color:rgba(255,255,255,.45);
  max-width:480px;margin-bottom:2.5rem;
}

/* actions */
.error-actions{display:flex;align-items:center;gap:1.5rem;flex-wrap:wrap;justify-content:center}
.btn-home{
  padding:.9rem 2.4rem;background:#c85a00;
  font-family:'Bebas Neue',sans-serif;font-size:.95rem;
  letter-spacing:.2em;color:#000;text-decoration:none;
  transition:all .2s;border:none;cursor:pointer;
}
.btn-home:hover{background:#e06800;box-shadow:0 0 28px rgba(200,90,0,.45)}
.btn-archive{
  font-size:.65rem;letter-spacing:.18em;
  color:rgba(255,255,255,.3);text-decoration:none;
  border:1px solid rgba(200,90,0,.2);
  padding:.9rem 1.8rem;
  transition:all .2s;
}
.btn-archive:hover{color:#c85a00;border-color:rgba(200,90,0,.5)}

/* glitch note */
.error-note{
  margin-top:3rem;
  font-size:.68rem;font-style:italic;
  color:rgba(255,255,255,.18);
  letter-spacing:.05em;
}

/* distortion line bottom */
.distortion{position:fixed;bottom:0;left:0;right:0;height:40px;overflow:hidden;pointer-events:none}
.distortion-line{
  position:absolute;left:0;right:0;height:2px;top:50%;
  background:linear-gradient(90deg,transparent,rgba(200,90,0,.5) 30%,rgba(0,240,255,.3) 70%,transparent);
  animation:distLine 3s ease-in-out infinite;
}
@keyframes distLine{
  0%,100%{transform:translateX(-100%) scaleX(.2);opacity:0}
  50%{transform:translateX(100%) scaleX(1);opacity:1}
}

/* noise flicker on load */
@keyframes flicker{
  0%,100%{opacity:1}
  41%{opacity:1}
  42%{opacity:.8}
  43%{opacity:1}
  75%{opacity:1}
  76%{opacity:.9}
  77%{opacity:1}
}
.main{animation:flicker 6s infinite}

@media(max-width:600px){
  .nav{padding:1rem 1.5rem}
  .main{padding:2rem 1.5rem}
  .error-actions{flex-direction:column;width:100%}
  .btn-home,.btn-archive{width:100%;text-align:center}
}
</style>
</head>
<body>
<div class="scanlines"></div>

<nav class="nav">
  <a href="<?php echo home_url(); ?>" class="nav-logo">INTERIORAR</a>
  <a href="<?php echo home_url(); ?>" class="nav-back">&larr; [VOLVER AL INICIO]</a>
</nav>

<main class="main">
  <div class="error-tag">
    <span class="blink">></span> ERROR_DE_SEÑAL
  </div>

  <div class="error-num">404</div>

  <h1 class="error-title">
    PÁGINA NO ENCONTRADA.<br>
    <span class="accent">LA SEÑAL SE PERDIÓ.</span>
  </h1>

  <p class="error-body">
    Esta URL no existe o fue eliminada. El sistema no puede mostrarte algo que no está ahí. A diferencia de muchos otros sistemas, este al menos te lo dice.
  </p>

  <div class="error-actions">
    <a href="<?php echo home_url(); ?>" class="btn-home">[ VOLVER AL INICIO ]</a>
    <a href="<?php echo home_url('/transmisiones'); ?>" class="btn-archive">[ VER TRANSMISIONES ]</a>
  </div>

  <p class="error-note">— GLITCH no sabe dónde estás. Pero sabe dónde no estás.</p>
</main>

<div class="distortion"><div class="distortion-line"></div></div>

</body>
</html>
