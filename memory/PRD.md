# InteriorAR - Landing Page Redesign V2

## Original Problem Statement
"Mejorame esta web sin cambiar los textos" - Luego: "necesito algo mas rompedor, raro y que atrape" usando las imágenes reales de GLITCH.

## User Persona
- Newsletter creator focused on neuroscience and behavioral psychology
- Target audience: Spanish-speaking individuals interested in understanding digital manipulation
- GLITCH: Gato negro con ojos naranjas brillantes y efecto glitch desintegración (cyan/magenta/amarillo)

## Core Requirements (Static)
- ✅ Mantener todos los textos originales
- ✅ Usar las imágenes reales de GLITCH proporcionadas
- ✅ Diseño "rompedor, raro y que atrape"
- ✅ Estética experimental/glitch
- ✅ Mobile responsive

## Architecture
- **Frontend**: React 18 + Framer Motion
- **Styling**: Custom CSS with CSS Variables + @fontsource
- **Typography**: Bebas Neue (títulos), Space Mono (cuerpo)
- **Images**: Assets del usuario (GLITCH_BACK, GLITCH_FRONT)

## What's Been Implemented (January 2026)

### Design System V2
- Tema oscuro brutal (#000000 base)
- Accent naranja intenso (#ff6b00) con glow effects
- Colores glitch: cyan, magenta, amarillo
- Efectos: noise overlay, scanlines, cursor personalizado

### Components
1. **Navigation** - Logo glitcheante, links estilo terminal [BRACKETS]
2. **Hero** - Título gigante Bebas Neue, GLITCH flotante, formulario
3. **Origin** - GLITCH frontal, mecanismo en 4 pasos
4. **Territories** - Grid de 6 cards con neurotransmisores
5. **Why Different** - 3 cards con quotes
6. **CTA** - Centrado con frases destacadas
7. **Final** - GLITCH grande + formulario
8. **Cookie Banner** - Estilo glitch con emoji

### Visual Effects
- Scramble text animation on scroll
- GlitchyText component (random char replacement)
- Cursor follower con GLITCH miniatura
- Floating animation en imágenes
- Matrix rain en background hero

## Test Status
- Frontend: 95% passed
- Bugs menores: checkbox styling (workaround exists)
- Todas las secciones funcionales
- Formularios mocked correctamente

## Backlog

### P0 - Production Ready
- [ ] Conectar formulario con Acumbamail
- [ ] Crear páginas de privacidad/legal
- [ ] Add analytics

### P1 - Enhancements
- [ ] Más efectos de glitch en hover
- [ ] Audio effects (opcional)
- [ ] Loading screen con GLITCH

### P2 - Future
- [ ] Dark/light toggle
- [ ] Multi-language

## Files
```
/app/frontend/src/
├── App.js          # Componentes principales
├── App.css         # Estilos glitch
```

## Assets
- GLITCH_BACK: https://customer-assets.emergentagent.com/job_design-boost-59/artifacts/drhyyz5i_De_espalda.png
- GLITCH_FRONT: https://customer-assets.emergentagent.com/job_design-boost-59/artifacts/vp4zid1l_descarga.png
