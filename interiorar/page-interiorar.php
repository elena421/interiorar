<?php
/**
 * Template Name: InteriorAR Landing
 * Template Post Type: page
 */
if (!defined('ABSPATH')) exit;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>INTERIORAR — Has visto el mecanismo fuera. Ahora vas a verlo en ti.</title>
<meta name="description" content="No es motivación. Es registro. Descarga gratis el ARCHIVO_PERSONAL.">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=JetBrains+Mono:ital,wght@0,400;0,600;1,400&family=Newsreader:ital,opsz,wght@0,6..72,400..600;1,6..72,400..600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}

:root{
  --paper:   #efe7d6;
  --paper-2: #e6dcc4;
  --paper-3: #f5efdf;
  --ink:     #0e0d0b;
  --ink-2:   #3a372e;
  --ink-3:   #6b6656;
  --rule:    #c9bfa3;
  --orange:  #c85a00;
  --orange-2:#e06800;
  --orange-dim:rgba(200,90,0,.08);
  --shadow:  rgba(14,13,11,.12);
}

body{background:var(--paper);color:var(--ink);font-family:'Newsreader',Georgia,serif;
  font-size:17px;line-height:1.65;overflow-x:hidden;font-feature-settings:"ss01","onum"}
a{text-decoration:none;color:inherit}

/* grano de papel */
.grain{position:fixed;inset:0;z-index:9998;pointer-events:none;opacity:.35;mix-blend-mode:multiply;
  background-image:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='220' height='220'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 .05 0 0 0 0 .04 0 0 0 0 .03 0 0 0 .45 0'/></filter><rect width='100%25' height='100%25' filter='url(%23n)'/></svg>")}

/* líneas de papel */
.ruled{position:fixed;inset:0;z-index:9997;pointer-events:none;opacity:.06;
  background-image:repeating-linear-gradient(0deg,transparent 0,transparent 31px,var(--ink) 31px,var(--ink) 32px)}

/* separador animado */
.divider{height:54px;position:relative;overflow:hidden;background:var(--paper)}
.divider-line{position:absolute;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent 0%,var(--ink) 30%,var(--orange) 55%,var(--ink) 80%,transparent 100%);animation:divSweep 3.2s ease-in-out infinite}
@keyframes divSweep{0%,100%{transform:translateX(-30%) scaleX(.2);opacity:0}50%{transform:translateX(30%) scaleX(1);opacity:.8}}

/* NAV */
.nav{position:fixed;top:0;left:0;right:0;z-index:9999;padding:1.3rem 3rem;
  display:flex;justify-content:space-between;align-items:center;
  background:rgba(239,231,214,.88);backdrop-filter:blur(12px);
  border-bottom:1px solid transparent;transition:all .3s}
.nav.scrolled{background:rgba(239,231,214,.98);border-bottom:1px solid var(--rule)}
.nav-logo{font-family:'JetBrains Mono',monospace;font-size:.95rem;letter-spacing:.22em;
  color:var(--ink);font-weight:600;position:relative}
.nav-logo::after{content:'';position:absolute;left:0;right:0;bottom:-4px;height:2px;
  background:var(--orange);transform:scaleX(.2);transform-origin:left;
  transition:transform .45s cubic-bezier(.2,.9,.3,1)}
.nav-logo:hover::after{transform:scaleX(1)}
.nav-links{display:flex;gap:2rem;align-items:center}
.nav-links a{font-family:'JetBrains Mono',monospace;font-size:.72rem;letter-spacing:.2em;
  color:var(--ink-2);transition:color .2s;text-transform:uppercase}
.nav-links a:hover{color:var(--orange)}
.nav-cta{padding:.55rem 1.2rem!important;background:var(--ink)!important;
  color:var(--paper)!important;font-family:'JetBrains Mono',monospace!important;
  font-size:.72rem!important;letter-spacing:.2em!important;
  transition:all .25s!important;border-radius:2px}
.nav-cta:hover{background:var(--orange)!important;color:var(--paper)!important}

.blink{animation:blink 1s step-end infinite}
@keyframes blink{0%,50%{opacity:1}51%,100%{opacity:0}}

/* ══════════════════════════════════════
   HERO
   Izquierda 55%: copy + form
   Derecha 45%: GLITCH grande + phrase stream
══════════════════════════════════════ */
.hero{
  height:100vh; /* altura fija — los hijos de grid necesitan height (no min-height) para heredarla */
  min-height:700px; /* fallback para pantallas muy pequeñas */
  display:grid;grid-template-columns:1.2fr 1fr;
  align-items:stretch;
  position:relative;overflow:hidden;background:var(--paper)}

/* fondo — ink drops */
.hero-bg{position:absolute;inset:0;overflow:hidden;opacity:.5;pointer-events:none}
.ink-drop{position:absolute;top:-30px;font-family:'JetBrains Mono',monospace;
  font-size:12px;color:var(--ink);opacity:.2;animation:inkFall linear infinite}
@keyframes inkFall{from{transform:translateY(-100%) rotate(-4deg);opacity:.25}
  to{transform:translateY(110vh) rotate(-4deg);opacity:0}}

/* IZQUIERDA */
.hero-content{padding:9rem 3.5rem 5rem 5rem;display:flex;flex-direction:column;
  justify-content:center;position:relative;z-index:2}
.hero-tag{font-family:'JetBrains Mono',monospace;font-size:.72rem;letter-spacing:.28em;
  color:var(--orange);margin-bottom:2.2rem;display:flex;align-items:center;gap:.55rem;text-transform:uppercase}

/* headline: Bebas Neue para el impacto, Newsreader para el subtítulo */
.title-small{display:block;font-family:'Newsreader',serif;font-style:italic;
  font-weight:400;font-size:1.3rem;color:var(--ink-2);margin-bottom:1rem;letter-spacing:-.005em}
.title-big{display:block;font-family:'Bebas Neue',sans-serif;
  font-size:clamp(3.5rem,7vw,6.5rem);line-height:.88;letter-spacing:.01em;
  color:var(--ink)}
.title-accent{color:var(--orange);position:relative;display:inline-block}
/* subrayado amarillo mostaza */
.title-accent::after{content:'';position:absolute;left:0;right:0;bottom:.06em;
  height:.35em;background:rgba(217,178,58,.45);z-index:-1;transform:skewX(-4deg)}

.hero-text{max-width:540px;margin-bottom:1.6rem}
.hero-text p{font-size:1.05rem;line-height:1.75;color:var(--ink-2);font-family:'Newsreader',serif}
.hero-text p+p{margin-top:.85rem}
.hero-text strong{color:var(--ink);font-weight:600}

.hero-callout{position:relative;padding:1rem 0 1rem 1.4rem;margin-bottom:2.4rem;
  border-left:3px solid var(--orange);max-width:540px;
  background:linear-gradient(90deg,var(--orange-dim),transparent 40%)}
.hero-callout p{font-size:1rem;line-height:1.75;color:var(--ink);
  font-family:'Newsreader',serif;font-style:italic}

/* form */
.hero-form{max-width:540px;width:100%}
.form-label{display:block;font-family:'JetBrains Mono',monospace;font-size:.7rem;
  letter-spacing:.24em;color:var(--orange);margin-bottom:.9rem;text-transform:uppercase}
.form-row{display:flex;margin-bottom:.85rem}
.input-wrap{flex:1;position:relative}
.input-wrap input[type=email]{width:100%;padding:1.05rem 1.2rem;
  background:var(--paper-3);border:1.5px solid var(--ink);border-right:none;
  color:var(--ink);font-family:'JetBrains Mono',monospace;font-size:.92rem;
  outline:none;transition:all .2s}
.input-wrap input::placeholder{color:var(--ink-3)}
.input-wrap input:focus{background:#fff;border-color:var(--orange)}
.form-btn{padding:1.05rem 1.8rem;background:var(--ink);border:1.5px solid var(--ink);
  font-family:'JetBrains Mono',monospace;font-size:.82rem;font-weight:600;
  letter-spacing:.15em;color:var(--paper);cursor:pointer;
  transition:all .25s;text-transform:uppercase;position:relative;overflow:hidden}
.form-btn::before{content:'';position:absolute;inset:0;background:var(--orange);
  transform:translateX(-100%);transition:transform .35s cubic-bezier(.2,.9,.3,1)}
.form-btn span{position:relative;z-index:1}
.form-btn:hover::before{transform:translateX(0)}
.checkbox-wrap{display:flex;align-items:flex-start;gap:.7rem;cursor:pointer;margin-bottom:.6rem}
.checkbox-wrap input[type=checkbox]{width:16px;height:16px;accent-color:var(--orange);cursor:pointer;margin-top:3px}
.checkbox-text{font-family:'JetBrains Mono',monospace;font-size:.72rem;color:var(--ink-2);letter-spacing:.02em}
.checkbox-text a{color:var(--orange);border-bottom:1px solid transparent;transition:border-color .2s}
.checkbox-text a:hover{border-bottom-color:var(--orange)}
.form-note{font-family:'JetBrains Mono',monospace;font-size:.7rem;color:var(--ink-3);letter-spacing:.04em}

/* DERECHA — GLITCH protagonista */
/* COLUMNA DERECHA — hr-glitch
   Estrategia: position:relative puro, sin flex tricks,
   GLITCH ocupa toda la columna con object-fit */
.hr-glitch{
  position:relative;
  overflow:hidden;
  background:var(--paper-2);
  border-left:1px solid var(--rule);
  /* height se hereda del grid — no necesita declararse explícitamente */
}

/* matrix rain: position:absolute relativo a .hr-glitch — correcto */
.m-rain{position:absolute;inset:0;z-index:1;pointer-events:none;overflow:hidden}
.mc{position:absolute;top:-60px;font-family:'JetBrains Mono',monospace;
  color:rgba(200,90,0,.18);animation:mcFall linear infinite;user-select:none;white-space:pre}
@keyframes mcFall{from{transform:translateY(-100%);opacity:1}to{transform:translateY(110vh);opacity:0}}

/* GLITCH — ocupa el centro-abajo de la columna con position:absolute
   El contenedor .hr-glitch tiene position:relative y hereda la altura del grid */
.gl-protagonist{
  position:absolute!important;
  bottom:0!important;
  left:50%!important;
  transform:translateX(-50%)!important;
  /* Tamaño generoso — ocupa casi toda la columna */
  width:90%!important;
  max-width:none!important; /* sin límite — el tema lo estaba forzando a 500px */
  height:auto!important;
  display:block!important;
  z-index:3;
  animation:gFloat 8s ease-in-out infinite, gSnap 11s step-end infinite;
  filter:drop-shadow(0 -30px 70px rgba(200,90,0,.2));
}
@keyframes gFloat{
  0%,100%{transform:translateX(-50%) translateY(0) rotate(0deg)}
  33%{transform:translateX(-50%) translateY(-22px) rotate(.7deg)}
  66%{transform:translateX(-50%) translateY(-10px) rotate(-.5deg)}
}
@keyframes gSnap{
  0%,88%,100%{filter:drop-shadow(0 -30px 70px rgba(200,90,0,.2))}
  89%{filter:drop-shadow(-5px 0 rgba(0,200,220,.9)) drop-shadow(5px 0 rgba(220,0,100,.8))}
  90%{filter:drop-shadow(5px 0 rgba(0,200,220,.9)) drop-shadow(-5px 0 rgba(220,0,100,.8))}
  91%{filter:drop-shadow(0 -30px 70px rgba(200,90,0,.2))}
  95%{filter:drop-shadow(-2px 0 rgba(0,200,220,.5)) drop-shadow(2px 0 rgba(220,0,100,.4))}
  96%{filter:drop-shadow(0 -30px 70px rgba(200,90,0,.2))}
}

/* phrase stream — frases typewriter sobre GLITCH */
.phrase-stream{position:absolute;inset:0;z-index:4;pointer-events:none}
.phrase-item{position:absolute;white-space:normal;pointer-events:none;
  will-change:transform,opacity;opacity:0;max-width:50%;line-height:1.55;
  font-family:'JetBrains Mono',monospace}
.phrase-item.big{font-size:clamp(.75rem,1.2vw,.92rem);font-weight:600;
  color:var(--ink);text-shadow:0 1px 4px rgba(230,220,196,.9)}
.phrase-item.small{font-size:clamp(.62rem,.95vw,.78rem);letter-spacing:.1em;
  color:var(--orange);font-style:italic;text-shadow:0 1px 4px rgba(230,220,196,.9)}
.phrase-item .cursor{display:inline-block;width:8px;height:1em;background:currentColor;
  margin-left:3px;vertical-align:text-bottom;animation:blink .7s step-end infinite}

.stream-label{position:absolute;bottom:1.5rem;right:1.5rem;z-index:5;
  font-family:'JetBrains Mono',monospace;font-size:.55rem;letter-spacing:.28em;
  color:rgba(200,90,0,.45);animation:lp 3s ease-in-out infinite}
@keyframes lp{0%,100%{opacity:.2}50%{opacity:.65}}

.scroll-indicator{position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);
  display:flex;flex-direction:column;align-items:center;gap:.4rem;z-index:3}
.scroll-indicator span{font-family:'JetBrains Mono',monospace;font-size:.62rem;
  letter-spacing:.3em;color:var(--ink-3)}
.scroll-line{width:1px;height:36px;background:linear-gradient(to bottom,var(--orange),transparent);
  animation:sp 2s ease-in-out infinite}
@keyframes sp{0%,100%{opacity:1;height:36px}50%{opacity:.3;height:18px}}

/* ══════════════════════════════════════
   ORIGIN — qué es exactamente
══════════════════════════════════════ */
.origin{background:var(--paper-3);padding:0}
.section-tag{display:block;font-family:'JetBrains Mono',monospace;font-size:.7rem;
  letter-spacing:.28em;color:var(--orange);margin-bottom:1.8rem;text-transform:uppercase}
.origin-content{display:grid;grid-template-columns:1.05fr 1fr;gap:5rem;
  padding:7rem 4rem;max-width:1400px;margin:0 auto;align-items:center}
.origin-left h2{font-family:'Bebas Neue',sans-serif;
  font-size:clamp(2.8rem,5vw,4.5rem);line-height:.92;letter-spacing:.01em;
  margin-bottom:2rem;color:var(--ink)}
.origin-left h2 .accent{color:var(--orange);font-style:italic}
.origin-text p{font-size:1.05rem;line-height:1.8;color:var(--ink-2);margin-bottom:1.2rem;
  font-family:'Newsreader',serif}
.origin-text strong{color:var(--ink);font-weight:600}
.origin-list{list-style:none;margin:1.2rem 0 1.8rem;
  border-top:1px solid var(--rule);border-bottom:1px solid var(--rule)}
.origin-list li{display:flex;gap:1rem;padding:.85rem 0;
  border-bottom:1px dashed var(--rule);font-size:1rem;color:var(--ink)}
.origin-list li:last-child{border-bottom:none}
.origin-list .idx{font-family:'JetBrains Mono',monospace;font-size:.75rem;
  color:var(--orange);letter-spacing:.12em;flex-shrink:0;padding-top:3px;font-weight:600}
.origin-closer{font-family:'Newsreader',serif;font-style:italic;font-size:1.1rem;
  color:var(--ink);font-weight:400}

/* notebook — lado derecho origin */
.origin-right{display:flex;align-items:center;justify-content:center;position:relative}
.notebook{position:relative;width:100%;max-width:480px;aspect-ratio:4/5;
  background:var(--paper);border:1px solid var(--rule);
  box-shadow:0 30px 60px -25px var(--shadow),0 10px 20px -8px var(--shadow);
  transform:rotate(1.8deg);padding:2.5rem 2rem 2rem;
  animation:nbFloat 11s ease-in-out infinite}
.notebook::before{content:'';position:absolute;top:0;bottom:0;left:42px;
  width:1px;background:var(--orange);opacity:.3}
.notebook::after{content:'';position:absolute;top:20px;left:20px;
  width:16px;height:16px;border-radius:50%;background:var(--paper-2);
  box-shadow:0 70px 0 var(--paper-2),0 140px 0 var(--paper-2),0 210px 0 var(--paper-2),0 280px 0 var(--paper-2),0 350px 0 var(--paper-2)}
@keyframes nbFloat{0%,100%{transform:rotate(1.8deg) translateY(0)}50%{transform:rotate(1.2deg) translateY(-14px)}}
.note-line{font-family:'JetBrains Mono',monospace;font-size:.82rem;line-height:2;
  color:var(--ink);padding-left:3rem;position:relative;
  border-bottom:1px solid var(--rule);padding-bottom:.4rem;margin-bottom:.4rem}
.note-line .time{color:var(--orange);font-weight:600;margin-right:.6rem}
.note-line .arrow{color:var(--ink-3);margin:0 .35rem}
.note-scribble{position:absolute;right:18px;bottom:22px;
  font-family:'Newsreader',serif;font-style:italic;font-size:1rem;
  color:var(--orange);transform:rotate(-4deg);opacity:.85}
.note-highlight{background:linear-gradient(180deg,transparent 55%,rgba(217,178,58,.5) 55%);
  opacity:.85;padding:0 .15em}

/* ══════════════════════════════════════
   MECHANISM — oscuro
══════════════════════════════════════ */
.mechanism{background:var(--ink);padding:5.5rem 4rem;position:relative;overflow:hidden}
.mechanism::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;
  background:repeating-linear-gradient(90deg,
    var(--orange) 0,var(--orange) 20px,var(--ink) 20px,var(--ink) 40px,
    var(--paper) 40px,var(--paper) 60px,var(--ink) 60px,var(--ink) 80px)}
.mechanism .section-tag{max-width:1400px;margin:0 auto 1rem;
  color:rgba(217,178,58,.9);letter-spacing:.28em;font-weight:600;opacity:1}
.mechanism h3{max-width:1400px;margin:0 auto 2.8rem;
  font-family:'Bebas Neue',sans-serif;
  font-size:clamp(2rem,3.5vw,3rem);line-height:1;letter-spacing:.02em;
  color:var(--paper)}
.mechanism h3 em{color:var(--orange);font-style:italic}
.mechanism-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1.5rem;
  max-width:1400px;margin:0 auto}
.mechanism-item{padding:1.8rem 1.6rem;background:rgba(245,239,223,.04);
  border-top:2px solid var(--orange);transition:all .3s;position:relative}
.mechanism-item:hover{background:rgba(245,239,223,.08);transform:translateY(-6px)}
.mechanism-num{display:block;font-family:'JetBrains Mono',monospace;font-size:.72rem;
  color:var(--orange);letter-spacing:.25em;margin-bottom:.9rem;font-weight:600}
.mechanism-item p{font-size:1rem;line-height:1.7;color:var(--paper);font-family:'Newsreader',serif}
.mechanism-item strong{color:rgba(217,178,58,.9);font-weight:600;font-style:italic}

/* ══════════════════════════════════════
   TERRITORIES — zonas del archivo
══════════════════════════════════════ */
.territories{background:var(--paper);padding:7rem 4rem;position:relative}
.territories-header{max-width:1400px;margin:0 auto 4rem;
  display:grid;grid-template-columns:1fr auto;gap:2rem;align-items:end;
  border-bottom:2px solid var(--ink);padding-bottom:2rem}
.territories-header .section-tag{color:var(--orange);margin-bottom:1rem}
.territories-header h2{font-family:'Bebas Neue',sans-serif;
  font-size:clamp(2.5rem,5vw,4rem);line-height:.95;letter-spacing:.01em;color:var(--ink)}
.territories-header h2 em{color:var(--orange);font-style:italic}
.territories-header p{font-family:'JetBrains Mono',monospace;font-size:.75rem;
  letter-spacing:.1em;color:var(--ink-3);max-width:260px;text-align:right}
.topics-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;
  background:var(--rule);max-width:1400px;margin:0 auto;border:1px solid var(--rule)}
.topic-card{background:var(--paper);padding:2.5rem 2rem;position:relative;
  overflow:hidden;transition:all .35s;cursor:default}
.topic-card::before{content:'';position:absolute;top:0;left:0;width:0;height:3px;
  background:var(--orange);transition:width .4s}
.topic-card:hover::before{width:100%}
.topic-card:hover{background:var(--paper-3)}
.topic-num{position:absolute;top:1.5rem;right:1.5rem;
  font-family:'Bebas Neue',sans-serif;font-size:3.5rem;color:var(--rule);line-height:1}
.topic-tag{display:inline-block;font-family:'JetBrains Mono',monospace;
  font-size:.62rem;letter-spacing:.22em;color:var(--orange);
  padding:.25rem .65rem;border:1px solid var(--orange);
  margin-bottom:1.2rem;text-transform:uppercase;font-weight:600}
.topic-card h3{font-family:'Bebas Neue',sans-serif;font-size:1.5rem;line-height:1.1;
  letter-spacing:.02em;margin-bottom:.6rem;color:var(--ink)}
.topic-card p{font-size:.96rem;color:var(--ink-2);line-height:1.65;
  font-family:'Newsreader',serif;font-style:italic}

/* ══════════════════════════════════════
   TRANSMISIONES — antes / después
══════════════════════════════════════ */
.transmisiones{background:var(--paper-2);padding:7rem 4rem;border-top:1px solid var(--rule)}
.transmisiones-header{max-width:1400px;margin:0 auto 4rem}
.transmisiones-header .section-tag{color:var(--orange)}
.transmisiones-header h2{font-family:'Bebas Neue',sans-serif;
  font-size:clamp(2.5rem,5vw,4rem);line-height:.95;letter-spacing:.01em;
  margin-bottom:1rem;color:var(--ink)}
.transmisiones-header h2 em{color:var(--orange);font-style:italic}
.transmisiones-header p{font-family:'Newsreader',serif;font-style:italic;
  font-size:1.05rem;color:var(--ink-2);max-width:560px}
.trans-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:2rem;
  max-width:1400px;margin:0 auto}
.trans-card{background:var(--paper-3);padding:2.2rem 2rem;position:relative;
  transition:all .35s;display:flex;flex-direction:column;
  border:1px solid var(--rule);box-shadow:0 4px 0 var(--paper-2)}
.trans-card:hover{transform:translate(-3px,-3px);box-shadow:7px 7px 0 var(--ink)}
.trans-num{position:absolute;top:1.2rem;right:1.4rem;
  font-family:'JetBrains Mono',monospace;font-size:.72rem;
  color:var(--ink-3);letter-spacing:.2em;font-weight:600}
.ba-block{margin-bottom:1.3rem}
.ba-label{display:inline-block;font-family:'JetBrains Mono',monospace;
  font-size:.62rem;letter-spacing:.25em;padding:.22rem .6rem;
  margin-bottom:.7rem;font-weight:700;text-transform:uppercase}
.ba-label.before{background:var(--ink);color:var(--paper)}
.ba-label.after{background:var(--orange);color:var(--paper)}
.ba-text{font-family:'Newsreader',serif;font-weight:400;
  font-size:1.05rem;line-height:1.35;color:var(--ink);font-style:italic}
.ba-text.after-text{color:var(--orange)}
.trans-card .tagline{margin-top:auto;padding-top:1.1rem;
  border-top:1px dashed var(--rule);font-family:'JetBrains Mono',monospace;
  font-size:.72rem;letter-spacing:.12em;color:var(--ink-2);text-transform:uppercase}

/* ══════════════════════════════════════
   REALITY — golpe de realidad (GLITCH habla)
══════════════════════════════════════ */
.reality{background:var(--ink);padding:7rem 4rem;position:relative;overflow:hidden}
.reality::after{content:'×';position:absolute;bottom:-4rem;right:-3rem;
  font-family:'Bebas Neue',sans-serif;font-size:28rem;
  color:rgba(200,90,0,.07);line-height:.8;pointer-events:none}
.reality-content{max-width:1000px;margin:0 auto;position:relative;z-index:1}
.reality .section-tag{color:rgba(217,178,58,.85);letter-spacing:.3em}
.reality h2{font-family:'Bebas Neue',sans-serif;
  font-size:clamp(2.5rem,5vw,4.5rem);line-height:.95;letter-spacing:.01em;
  color:var(--paper);margin-bottom:2rem}
.reality h2 em{color:var(--orange);font-style:italic}
.reality-body{font-family:'Newsreader',serif;font-size:1.2rem;line-height:1.65;
  color:rgba(245,239,223,.82);max-width:680px;margin-bottom:2.5rem}
.reality-body strong{color:var(--paper);font-weight:600}
.reality-quote{padding:2.2rem 0;
  border-top:1px solid rgba(245,239,223,.2);border-bottom:1px solid rgba(245,239,223,.2);
  max-width:780px}
.reality-quote p{font-family:'Newsreader',serif;font-style:italic;
  font-size:clamp(1.3rem,2.4vw,1.75rem);line-height:1.25;
  color:var(--paper);letter-spacing:-.01em;font-weight:400}
.reality-quote .sig{margin-top:1rem;font-family:'JetBrains Mono',monospace;
  font-size:.72rem;letter-spacing:.25em;color:var(--orange);
  font-weight:600;text-transform:uppercase;font-style:normal}

/* ══════════════════════════════════════
   FINAL — ticket + formulario
══════════════════════════════════════ */
.final-section{display:grid;grid-template-columns:1fr 1.1fr;min-height:90vh;background:var(--paper)}
.final-left{background:var(--paper-2);display:flex;align-items:center;
  justify-content:center;padding:4rem;position:relative;overflow:hidden}
.final-left::before{content:'';position:absolute;inset:0;
  background:repeating-linear-gradient(0deg,transparent 0,transparent 29px,
  rgba(14,13,11,.05) 29px,rgba(14,13,11,.05) 30px);pointer-events:none}

/* ticket — mantiene el giro, ahora con borde naranja */
.final-ticket{position:relative;width:100%;max-width:440px;background:var(--paper-3);
  padding:2.5rem 2.2rem;border:2px dashed var(--ink);
  box-shadow:0 30px 60px -25px var(--shadow);
  transform:rotate(-2deg);animation:nbFloat 13s ease-in-out infinite}
.ticket-h{font-family:'JetBrains Mono',monospace;font-size:.65rem;letter-spacing:.28em;
  color:var(--orange);margin-bottom:1rem;font-weight:600;text-transform:uppercase}
.ticket-title{font-family:'Bebas Neue',sans-serif;font-size:2rem;line-height:1.05;
  letter-spacing:.02em;color:var(--ink);margin-bottom:1.2rem}
.ticket-row{display:flex;justify-content:space-between;padding:.6rem 0;
  border-bottom:1px dashed var(--rule);
  font-family:'JetBrains Mono',monospace;font-size:.8rem}
.ticket-row .k{color:var(--ink-3);letter-spacing:.08em}
.ticket-row .v{color:var(--ink);font-weight:600}
.ticket-stamp{position:absolute;bottom:-18px;right:-14px;
  font-family:'JetBrains Mono',monospace;font-size:.68rem;letter-spacing:.22em;
  color:var(--orange);border:2px solid var(--orange);padding:.5rem .8rem;
  transform:rotate(6deg);background:var(--paper-3);font-weight:600;text-transform:uppercase}

.final-content{background:var(--paper);color:var(--ink);padding:6rem 4rem;
  display:flex;flex-direction:column;justify-content:center;border-left:1px solid var(--rule)}
.final-content h2{font-family:'Bebas Neue',sans-serif;
  font-size:clamp(2.5rem,5vw,4rem);line-height:.95;letter-spacing:.01em;
  margin-bottom:1.4rem;color:var(--ink)}
.final-content h2 .accent{color:var(--orange);display:block}
.final-content>p{font-family:'Newsreader',serif;font-size:1.1rem;line-height:1.7;
  color:var(--ink-2);margin-bottom:2rem;max-width:520px}
.final-content .form-container{max-width:520px}
.signature{margin-top:2rem;font-family:'JetBrains Mono',monospace;font-size:.7rem;
  letter-spacing:.22em;color:var(--ink-3);text-transform:uppercase}

/* FOOTER */
.footer{background:var(--ink);padding:2rem 4rem;border-top:3px solid var(--orange)}
.footer-content{max-width:1400px;margin:0 auto;
  display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem}
.footer-logo{font-family:'JetBrains Mono',monospace;font-size:.85rem;
  letter-spacing:.28em;color:var(--paper);font-weight:600}
.footer-links{display:flex;gap:1.8rem;flex-wrap:wrap}
.footer-links a{font-family:'JetBrains Mono',monospace;font-size:.7rem;
  letter-spacing:.2em;color:rgba(245,239,223,.55);transition:color .2s;text-transform:uppercase}
.footer-links a:hover{color:var(--orange)}
.footer p{font-family:'JetBrains Mono',monospace;font-size:.65rem;
  color:rgba(245,239,223,.35);letter-spacing:.12em}

/* COOKIE */
.cookie-banner{position:fixed;bottom:1.5rem;left:50%;transform:translateX(-50%);
  z-index:1000;background:var(--paper-3);border:1.5px solid var(--ink);
  box-shadow:0 12px 40px rgba(14,13,11,.25);max-width:620px;width:calc(100% - 2rem);display:none}
.cookie-content{display:flex;align-items:center;gap:1.5rem;padding:1.15rem 1.4rem}
.cookie-icon{font-family:'JetBrains Mono',monospace;font-size:1.4rem;color:var(--orange)}
.cookie-content strong{display:block;font-family:'JetBrains Mono',monospace;font-size:.72rem;
  letter-spacing:.2em;color:var(--ink);margin-bottom:.2rem;font-weight:700;text-transform:uppercase}
.cookie-content p{font-family:'Newsreader',serif;font-size:.88rem;color:var(--ink-2);margin:0;line-height:1.4}
.cookie-actions{display:flex;gap:.5rem;flex-shrink:0}
.cookie-btn{padding:.5rem 1rem;font-family:'JetBrains Mono',monospace;font-size:.65rem;
  letter-spacing:.15em;background:transparent;border:1.5px solid var(--ink-3);
  color:var(--ink-2);cursor:pointer;transition:all .2s;text-transform:uppercase;font-weight:600}
.cookie-btn:hover{border-color:var(--ink);color:var(--ink)}
.cookie-btn.primary{background:var(--ink);border-color:var(--ink);color:var(--paper)}
.cookie-btn.primary:hover{background:var(--orange);border-color:var(--orange)}

/* RESPONSIVE */
@media(max-width:1024px){
  .hero{grid-template-columns:1fr}
  .hr-glitch{height:60vw;min-height:320px;border-left:none;border-top:1px solid var(--rule)}
  .hero-content{padding:7.5rem 2rem 4rem}
  .origin-content{grid-template-columns:1fr;gap:3rem;padding:5rem 2rem}
  .origin-right{order:-1}
  .mechanism-grid{grid-template-columns:repeat(2,1fr)}
  .mechanism,.territories,.transmisiones,.reality{padding:5rem 2rem}
  .topics-grid,.trans-grid{grid-template-columns:1fr}
  .territories-header{grid-template-columns:1fr}
  .territories-header p{text-align:left;max-width:none}
  .final-section{grid-template-columns:1fr}
  .final-left{padding:4rem 2rem;min-height:50vh}
  .final-content{padding:5rem 2rem}
  .footer-content{flex-direction:column;text-align:center}
  .cookie-content{flex-wrap:wrap;justify-content:center;text-align:center}
}
@media(max-width:640px){
  .nav{padding:1rem 1.5rem}
  .nav-links a:not(.nav-cta){display:none}
  .hero-content{padding:6.5rem 1.5rem 3rem}
  .hr-glitch{height:75vw}
  .form-row{flex-direction:column;gap:.6rem}
  .input-wrap input[type=email]{border-right:1.5px solid var(--ink)}
  .form-btn{width:100%}
  .mechanism-grid{grid-template-columns:1fr}
  .footer{padding:2rem 1.5rem}
}
</style>
</head>
<body>
<div class="grain"></div>
<div class="ruled"></div>

<nav class="nav" id="mainNav">
  <a href="<?php echo home_url(); ?>" class="nav-logo">INTERIORAR</a>
  <div class="nav-links">
    <a href="#que-es">[QUÉ_ES]</a>
    <a href="#zonas">[ZONAS]</a>
    <a href="#transmisiones">[CASOS]</a>
    <a href="#final-form" class="nav-cta">QUIERO_EL_ARCHIVO</a>
  </div>
</nav>

<main>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg" id="inkBg"></div>

  <!-- IZQUIERDA: copy + form -->
  <div class="hero-content">
    <span class="hero-tag"><span class="blink">●</span> CANAL_DE_ENSAYO_VISUAL_CIENTÍFICO</span>
    <h1>
      <span class="title-small">Has visto el patrón fuera.</span>
      <span class="title-big">Ahora te toca<br><span class="title-accent">verlo en ti.</span></span>
    </h1>
    <div class="hero-text">
      <p>No tienes un problema de disciplina. Tienes un problema de visibilidad.</p>
      <p><strong>Si no lo registras, no lo ves. Y si no lo ves, lo repites.</strong></p>
      <p>En menos de 15 minutos puedes detectar la primera grieta. Gratis. Sin teoría absurda.</p>
    </div>
    <div class="hero-callout">
      <p>No es un curso. No es motivación. Es un sitio donde escribir lo que haces… cuando sabes que no deberías hacerlo.</p>
    </div>
    <div class="hero-form" id="suscribir">
      <span class="form-label">> ABRIR_ARCHIVO_PERSONAL</span>
      <div class="form-container">
        <form action="https://acumbamail.com/newform/subscribe/BcR1jJI9vEuzJ1UEa5sbhMg8LI2NcDBRSSRbT/61575/" method="post">
          <div class="form-row">
            <div class="input-wrap">
              <input name="email_1" type="email" placeholder="tu@email.com" required autocomplete="email">
            </div>
            <button type="submit" class="form-btn"><span>[ QUIERO MI ARCHIVO ]</span></button>
          </div>
          <input type="text"     name="a1259583c" tabindex="-1" style="position:absolute;left:-4900px;" aria-hidden="true" autocomplete="off">
          <input type="email"    name="b1259583c" tabindex="-1" style="position:absolute;left:-5000px;" aria-hidden="true" autocomplete="off">
          <input type="checkbox" name="c1259583c" tabindex="-1" style="position:absolute;left:-5100px;" aria-hidden="true" autocomplete="off">
          <input type="hidden"   name="ok_redirect" value="<?php echo home_url('/casi-listo/'); ?>">
          <label class="checkbox-wrap">
            <input type="checkbox" required>
            <span class="checkbox-text">He leído la <a href="<?php echo home_url('/privacidad'); ?>">Política de Privacidad</a></span>
          </label>
        </form>
        <p class="form-note">Te doy el archivo. Y luego 2 emails por semana con lo que no estás viendo.<br>Si te molesta, te vas. Sin drama.</p>
      </div>
    </div>
  </div>

  <!-- DERECHA: GLITCH grande + matrix + phrases -->
  <div class="hr-glitch">
    <div class="m-rain" id="mRain"></div>
    <img
      src="https://interiorar.com/wp-content/uploads/2026/03/GLITCH.png"
      alt="GLITCH"
      class="gl-protagonist"
    >
    <div class="phrase-stream" id="phraseStream"></div>
    <span class="stream-label"><span class="blink">●</span> SISTEMA_ACTIVO</span>
  </div>

  <div class="scroll-indicator"><span>SCROLL</span><div class="scroll-line"></div></div>
</section>

<!-- ORIGIN -->
<section class="origin" id="que-es">
  <div class="divider"><?php for($i=0;$i<18;$i++): ?><div class="divider-line" style="animation-delay:<?php echo $i*.08; ?>s"></div><?php endfor; ?></div>
  <div class="origin-content">
    <div class="origin-left">
      <span class="section-tag">> QUÉ_ES_EXACTAMENTE</span>
      <h2>Esto no es un <span class="accent">dashboard.</span><br>Es un espejo.</h2>
      <div class="origin-text">
        <p>Un sitio donde <strong>escribir lo que haces cuando sabes que no deberías hacerlo.</strong> Porque si no lo registras, no lo ves. Y si no lo ves, lo repites.</p>
      </div>
      <ul class="origin-list">
        <li><span class="idx">01</span>Plantilla en Notion lista para duplicar</li>
        <li><span class="idx">02</span>Zonas simples: cerebro, dinero, trabajo, relaciones</li>
        <li><span class="idx">03</span>Ejemplos reales de registro</li>
        <li><span class="idx">04</span>Estructura para empezar hoy sin aprender nada</li>
        <li><span class="idx">05</span>Prompt para detectar patrones con IA</li>
      </ul>
      <p class="origin-closer">Nada de dashboards que parecen cabinas de avión. Esto es escribir y ver.</p>
    </div>
    <div class="origin-right">
      <div class="notebook">
        <div class="note-line"><span class="time">MAR 16:40</span><span class="arrow">→</span>evité una decisión<br><span style="padding-left:5.5rem;display:block;color:var(--ink-3)">abrí Instagram</span></div>
        <div class="note-line"><span class="time">JUE 09:15</span><span class="arrow">→</span>reunión importante<br><span style="padding-left:5.5rem;display:block;color:var(--ink-3)">dormí mal la noche anterior</span></div>
        <div class="note-line"><span class="time">LUN 11:30</span><span class="arrow">→</span><span class="note-highlight">tercer día seguido</span><br><span style="padding-left:5.5rem;display:block;color:var(--ink-3)">empezando por el email</span></div>
        <span class="note-scribble">← aquí está la grieta</span>
      </div>
    </div>
  </div>

  <!-- MECHANISM -->
  <div class="mechanism" id="demo">
    <span class="section-tag">> ASÍ_SE_USA</span>
    <h3>Registras lo que haces cuando sabes que <em>no deberías</em>.<br>Después de 3–5 días, preguntas: <em>¿qué patrón se repite?</em></h3>
    <div class="mechanism-grid">
      <div class="mechanism-item"><span class="mechanism-num">REG 01</span><p><strong>MAR 16:40</strong> → evité una decisión importante → abrí Instagram.</p></div>
      <div class="mechanism-item"><span class="mechanism-num">REG 02</span><p><strong>JUE 09:15</strong> → reunión importante → dormí mal la noche anterior.</p></div>
      <div class="mechanism-item"><span class="mechanism-num">REG 03</span><p><strong>LUN 11:30</strong> → tercer día seguido empezando por el email.</p></div>
      <div class="mechanism-item"><span class="mechanism-num">PROMPT</span><p>"¿Qué patrón repito sin darme cuenta?" → y por primera vez… <strong>la IA deja de responder en genérico.</strong></p></div>
    </div>
  </div>
</section>

<!-- TERRITORIES -->
<section class="territories" id="zonas">
  <div class="territories-header">
    <div>
      <span class="section-tag">> ZONAS_DEL_ARCHIVO</span>
      <h2>Cuatro zonas. Cero dashboards. <em>Tú dentro.</em></h2>
    </div>
    <p>Empieza por la que más te cueste mirar. La que más se resiste suele ser la que más repite.</p>
  </div>
  <div class="topics-grid">
    <div class="topic-card"><span class="topic-num">01</span><span class="topic-tag">CEREBRO</span><h3>Lo que evitas empezando por tareas pequeñas.</h3><p>Cuándo empiezas el día con lo fácil y por qué nunca llegas a lo importante.</p></div>
    <div class="topic-card"><span class="topic-num">02</span><span class="topic-tag">DINERO</span><h3>Las decisiones que pospones cuando miras el saldo.</h3><p>Compras, facturas y silencios. El dinero registra lo que tú no quieres ver.</p></div>
    <div class="topic-card"><span class="topic-num">03</span><span class="topic-tag">TRABAJO</span><h3>La reunión en la que dijiste <em>sí</em> sin querer.</h3><p>Quién te impone el ritmo. A qué horas tu "bueno, vale" cuesta más caro.</p></div>
    <div class="topic-card"><span class="topic-num">04</span><span class="topic-tag">RELACIONES</span><h3>El mensaje que respondiste tres días tarde.</h3><p>Con quién evitas la conversación real. Y qué haces justo antes de evitarla.</p></div>
    <div class="topic-card"><span class="topic-num">05</span><span class="topic-tag">BUCLES</span><h3>El día que empezaste igual que el anterior.</h3><p>La repetición que ya no ves porque se parece demasiado a ti.</p></div>
    <div class="topic-card"><span class="topic-num">06</span><span class="topic-tag">DISPARADORES</span><h3>Instagram a las 16:40. Siempre 16:40.</h3><p>La hora exacta a la que tu cabeza suelta la cuerda. Regístrala y dejará de ser invisible.</p></div>
  </div>
</section>

<!-- TRANSMISIONES — antes / después -->
<section class="transmisiones" id="transmisiones">
  <div class="transmisiones-header">
    <span class="section-tag">> CAMBIO_REAL</span>
    <h2>De frase vacía a <em>información que usas.</em></h2>
    <p>Motivación era: <em>"debería enfocarme más"</em>. Información es: <em>"evito decisiones incómodas empezando por tareas pequeñas"</em>. Una no sirve. La otra, sí.</p>
  </div>
  <div class="trans-grid">
    <article class="trans-card">
      <span class="trans-num">CASO 001</span>
      <div class="ba-block"><span class="ba-label before">Antes</span><p class="ba-text">"Debería enfocarme más."</p></div>
      <div class="ba-block"><span class="ba-label after">Después</span><p class="ba-text after-text">"Evito decisiones incómodas empezando siempre por tareas pequeñas."</p></div>
      <span class="tagline">— eso ya no es motivación.</span>
    </article>
    <article class="trans-card">
      <span class="trans-num">CASO 002</span>
      <div class="ba-block"><span class="ba-label before">Antes</span><p class="ba-text">"Soy impulsivo con el dinero."</p></div>
      <div class="ba-block"><span class="ba-label after">Después</span><p class="ba-text after-text">"Compro online los domingos a las 21h cuando termino cansado la semana."</p></div>
      <span class="tagline">— eso ya es información.</span>
    </article>
    <article class="trans-card">
      <span class="trans-num">CASO 003</span>
      <div class="ba-block"><span class="ba-label before">Antes</span><p class="ba-text">"No sé qué hago mal con ella."</p></div>
      <div class="ba-block"><span class="ba-label after">Después</span><p class="ba-text after-text">"Evito hablar de lo importante los lunes, después del trabajo."</p></div>
      <span class="tagline">— eso ya lo puedes cambiar.</span>
    </article>
  </div>
</section>

<!-- REALITY — GLITCH habla -->
<section class="reality">
  <div class="reality-content">
    <span class="section-tag">> GLITCH_HABLA</span>
    <h2>La mayoría habla con IA como si la IA <em>los conociera.</em></h2>
    <p class="reality-body">No los conoce. <strong>Tú tampoco te conoces todavía.</strong> Ese es el problema. El archivo no te va a cambiar la vida. Pero por primera vez, el contenido eres tú.</p>
    <div class="reality-quote">
      <p>"El archivo no te va a cambiar la vida. Te va a mostrar la tuya."</p>
      <span class="sig">— GLITCH, sin entusiasmo aparente</span>
    </div>
  </div>
</section>

<!-- FINAL — ticket + formulario -->
<section class="final-section" id="final-form">
  <div class="final-left">
    <div class="final-ticket">
      <span class="ticket-h">✎ ARCHIVO_PERSONAL · PLANTILLA NOTION</span>
      <h3 class="ticket-title">Un sitio donde, por primera vez, el contenido eres tú.</h3>
      <div class="ticket-row"><span class="k">FORMATO</span><span class="v">Notion · duplicable</span></div>
      <div class="ticket-row"><span class="k">PRECIO</span><span class="v">Gratis</span></div>
      <div class="ticket-row"><span class="k">TIEMPO</span><span class="v">< 15 min</span></div>
      <div class="ticket-row"><span class="k">ENVÍO</span><span class="v">Inmediato</span></div>
      <div class="ticket-row"><span class="k">SPAM</span><span class="v">No</span></div>
      <span class="ticket-stamp">ADMITIR UNO</span>
    </div>
  </div>
  <div class="final-content">
    <h2>No tienes que hacerlo perfecto.<span class="accent">Solo no dejarlo vacío.</span></h2>
    <p>Duplica la plantilla, escribe tres líneas esta semana, pregunta a la IA qué ve. En cinco días tienes algo que ningún curso te va a dar: <strong>tu patrón, escrito por ti.</strong></p>
    <div class="form-container">
      <form action="https://acumbamail.com/newform/subscribe/BcR1jJI9vEuzJ1UEa5sbhMg8LI2NcDBRSSRbT/61575/" method="post">
        <div class="form-row">
          <div class="input-wrap">
            <input name="email_1" type="email" placeholder="tu@email.com" required autocomplete="email">
          </div>
          <button type="submit" class="form-btn"><span>[ QUIERO MI ARCHIVO ]</span></button>
        </div>
        <input type="text"     name="a1259583c" tabindex="-1" style="position:absolute;left:-4900px;" aria-hidden="true" autocomplete="off">
        <input type="email"    name="b1259583c" tabindex="-1" style="position:absolute;left:-5000px;" aria-hidden="true" autocomplete="off">
        <input type="checkbox" name="c1259583c" tabindex="-1" style="position:absolute;left:-5100px;" aria-hidden="true" autocomplete="off">
        <input type="hidden"   name="ok_redirect" value="<?php echo home_url('/casi-listo/'); ?>">
        <label class="checkbox-wrap">
          <input type="checkbox" required>
          <span class="checkbox-text">He leído la <a href="<?php echo home_url('/privacidad'); ?>">Política de Privacidad</a></span>
        </label>
      </form>
      <p class="form-note">Te doy el archivo. Y luego 2 emails por semana con lo que no estás viendo. Si te molesta, te vas. Sin drama.</p>
    </div>
    <span class="signature">ARCHIVO_PERSONAL · un sitio donde, por primera vez, te escribes a ti.</span>
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
      <a href="<?php echo home_url('/transmisiones'); ?>">[TRANSMISIONES]</a>
      <a href="<?php echo home_url('/wp-login.php'); ?>"
        style="color:rgba(245,239,223,.4);border:1px solid rgba(245,239,223,.2);padding:.22rem .55rem;transition:all .2s"
        onmouseover="this.style.color='var(--orange)';this.style.borderColor='var(--orange)'"
        onmouseout="this.style.color='rgba(245,239,223,.4)';this.style.borderColor='rgba(245,239,223,.2)'">[ÁREA DE MIEMBROS]</a>
    </div>
    <p>© 2025 INTERIORAR. Un error en el código.</p>
  </div>
</footer>

<div class="cookie-banner" id="cookieBanner">
  <div class="cookie-content">
    <span class="cookie-icon">✎</span>
    <div><strong>COOKIES & PRIVACIDAD</strong><p>Usamos cookies para que GLITCH recuerde quién eres.</p></div>
    <div class="cookie-actions">
      <button class="cookie-btn" onclick="localStorage.setItem('cookies','necessary');document.getElementById('cookieBanner').style.display='none'">[SOLO NECESARIAS]</button>
      <button class="cookie-btn primary" onclick="localStorage.setItem('cookies','all');document.getElementById('cookieBanner').style.display='none'">[ACEPTAR TODAS]</button>
    </div>
  </div>
</div>

<script>
(function(){

/* NAV */
var nav=document.getElementById('mainNav');
window.addEventListener('scroll',function(){nav.classList.toggle('scrolled',window.scrollY>60);},{passive:true});

/* ink drops fondo izquierda */
var bg=document.getElementById('inkBg');
if(bg){
  var glyphs=['·','•','◦','¶','§','†','‡','×','◊','/','—','→'];
  function drop(){
    var c=document.createElement('span');c.className='ink-drop';
    c.textContent=glyphs[Math.floor(Math.random()*glyphs.length)];
    c.style.left=Math.random()*100+'%';
    c.style.animationDuration=(5+Math.random()*6)+'s';
    c.style.animationDelay=Math.random()*4+'s';
    bg.appendChild(c);setTimeout(function(){c.remove();},12000);
  }
  for(var i=0;i<22;i++) setTimeout(drop,i*200);
  setInterval(drop,650);
}

/* smooth scroll */
document.querySelectorAll('a[href^="#"]').forEach(function(a){
  a.addEventListener('click',function(e){
    e.preventDefault();
    var t=document.querySelector(this.getAttribute('href'));
    if(t) t.scrollIntoView({behavior:'smooth',block:'start'});
  });
});

/* cookie */
if(!localStorage.getItem('cookies'))
  setTimeout(function(){document.getElementById('cookieBanner').style.display='block';},2500);

/* ════════════════════════
   MATRIX RAIN — columna derecha
════════════════════════ */
(function(){
  var rain=document.getElementById('mRain');
  if(!rain) return;
  var chars='01アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホ';
  function spawn(){
    var el=document.createElement('span');el.className='mc';
    var len=4+Math.floor(Math.random()*9);var s='';
    for(var i=0;i<len;i++) s+=chars[Math.floor(Math.random()*chars.length)]+(i<len-1?'\n':'');
    el.textContent=s;
    el.style.left=Math.random()*96+'%';
    el.style.fontSize=(10+Math.random()*4)+'px';
    el.style.animationDuration=(5+Math.random()*7)+'s';
    el.style.animationDelay=Math.random()*4+'s';
    el.style.opacity=(0.07+Math.random()*0.18).toFixed(2);
    rain.appendChild(el);
    setTimeout(function(){el.remove();},14000);
  }
  for(var i=0;i<16;i++) setTimeout(spawn,i*260);
  setInterval(spawn,420);
})();

/* ════════════════════════
   PHRASE STREAM — typewriter sobre GLITCH
════════════════════════ */
(function(){
  var stream=document.getElementById('phraseStream');
  if(!stream) return;

  var phrases=[
    {text:'Evito decisiones incómodas empezando por tareas pequeñas.',type:'big'},
    {text:'Instagram a las 16:40. Tercer día esta semana.',type:'small'},
    {text:'Compro online los domingos a las 21h.',type:'big'},
    {text:'No es pereza. Es un patrón sin nombre.',type:'small'},
    {text:'El email me protege de empezar por lo real.',type:'big'},
    {text:'Cuando estoy cansado, digo que sí sin querer.',type:'small'},
    {text:'Repito esto desde hace cinco años.',type:'big'},
    {text:'Mi saldo a final de mes tiene hora y día.',type:'small'},
    {text:'Lo he escrito. Ya no puedo no verlo.',type:'big'},
    {text:'El archivo no juzga. Registra.',type:'small'},
    {text:'El contenido, por primera vez, soy yo.',type:'big'},
    {text:'Tu cerebro tiene grietas. El sistema las conoce.',type:'small'},
  ];

  var slots=[
    {top:4, left:3},
    {top:16,left:42},
    {top:28,left:4},
    {top:40,left:38},
    {top:52,left:5},
    {top:64,left:40},
    {top:76,left:4},
  ];

  var busy=slots.map(function(){return false;});
  var idx=0;

  function free(){
    var f=[];busy.forEach(function(b,i){if(!b)f.push(i);});
    return f.length?f[Math.floor(Math.random()*f.length)]:-1;
  }

  function type(el,text,cb){
    var i=0;
    var cur=document.createElement('span');cur.className='cursor';el.appendChild(cur);
    var t=setInterval(function(){
      if(i>=text.length){clearInterval(t);if(cb)setTimeout(cb,1800);return;}
      cur.insertAdjacentText('beforebegin',text[i]);i++;
    },42);
  }

  function spawn(){
    var si=free();if(si<0)return;
    busy[si]=true;
    var p=phrases[idx%phrases.length];idx++;
    var el=document.createElement('div');
    el.className='phrase-item '+p.type;
    el.style.top=slots[si].top+'%';
    el.style.left=slots[si].left+'%';
    el.style.maxWidth='54%';
    el.style.opacity='1';

    var t0=performance.now();
    (function drift(now){
      el.style.transform='translateY('+(now-t0)*.01+'px)';
      if(el.parentNode)requestAnimationFrame(drift);
    })(t0);

    stream.appendChild(el);
    type(el,p.text,function(){
      el.style.transition='opacity 1s ease';el.style.opacity='0';
      setTimeout(function(){el.remove();busy[si]=false;},1000);
    });
  }

  for(var k=0;k<3;k++){(function(d){setTimeout(spawn,d);})(k*700);}
  setInterval(spawn,1300);

  var heroRight=document.querySelector('.hr-glitch');
  window.addEventListener('scroll',function(){
    if(!heroRight)return;
    var s=window.scrollY;
    if(s<heroRight.offsetHeight) stream.style.transform='translateY('+s*.08+'px)';
  },{passive:true});
})();

})();
</script>
</body>
</html>
