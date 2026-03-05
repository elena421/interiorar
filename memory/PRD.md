# PRD - InteriorAR GeneratePress Child Theme

## Original Problem Statement
Convertir una web React existente (landing page tech/startup con estética oscura) en un child theme de GeneratePress para WordPress.

## User Personas
- Propietario de sitio web que quiere migrar de React a WordPress
- Usuario con GeneratePress ya instalado
- Necesita opciones configurables desde el panel de WordPress
- Integración con Acumbamail para email marketing

## Core Requirements (Static)
1. ✅ Child theme de GeneratePress funcional
2. ✅ Diseño visual fiel al original (colores oscuros, tipografías Space Grotesk/IBM Plex Mono)
3. ✅ Templates PHP tradicionales (no bloques Gutenberg)
4. ✅ Opciones configurables desde Customizer de WordPress
5. ✅ Integración con Acumbamail para formularios de suscripción
6. ✅ Secciones: Hero, Manifesto, Ticker, Footer

## What's Been Implemented (Jan 2026)

### Archivos Creados
- `style.css` - Estilos completos con variables CSS, animaciones, responsive
- `functions.php` - Setup del tema, enqueue de assets, shortcodes
- `inc/customizer.php` - Panel completo de opciones del Customizer
- `inc/acumbamail.php` - Integración AJAX con Acumbamail
- `template-landing.php` - Template de página para landing
- `template-parts/navigation.php` - Navegación fija con menú móvil
- `template-parts/ticker.php` - Banner animado superior
- `template-parts/hero.php` - Sección hero con formulario
- `template-parts/manifesto.php` - Sección de 3 columnas
- `template-parts/footer-custom.php` - Footer personalizado
- `template-parts/newsletter-form.php` - Formulario reutilizable
- `assets/js/main.js` - JavaScript para animaciones y formularios
- `README.md` - Documentación completa

### Funcionalidades
- Scroll reveal animations
- Glitch effect en imágenes (hover)
- Ticker/marquee animado
- Formulario con validación AJAX
- Soporte GDPR (checkbox de consentimiento)
- Navegación responsive
- Smooth scroll
- Variables CSS personalizables desde Customizer

### Opciones del Customizer
- **General**: Logo, mostrar/ocultar ticker
- **Colores**: Fire (acento), Void (fondo), White (texto)
- **Hero**: Tagline, título (3 líneas), descripción, imagen, botón
- **Ticker**: 5 elementos configurables
- **Manifesto**: 3 columnas con título y texto
- **Acumbamail**: Form ID, List ID, API Key, textos
- **Footer**: Descripción, copyright, redes sociales

## ZIP File Location
`/app/interiorar-generatepress-child.zip`

## Installation Steps
1. Instalar y activar GeneratePress
2. Subir ZIP a WordPress (Apariencia > Temas > Añadir nuevo > Subir)
3. Activar "InteriorAR Child Theme"
4. Configurar desde Personalizar > InteriorAR Theme
5. Crear página con template "Landing Page"

## Prioritized Backlog

### P0 (Crítico) - Completado
- ✅ Estructura base del child theme
- ✅ Estilos CSS completos
- ✅ Templates PHP
- ✅ Customizer options
- ✅ Integración Acumbamail

### P1 (Importante) - Pendiente para usuario
- [ ] Subir a WordPress y probar
- [ ] Configurar credenciales de Acumbamail reales
- [ ] Personalizar contenido desde Customizer
- [ ] Añadir imagen hero

### P2 (Mejoras Futuras)
- [ ] Añadir más secciones (Territories, Why, Testimonials)
- [ ] Page builder compatibility (Elementor)
- [ ] Dark/Light mode toggle
- [ ] Multi-language support
- [ ] WooCommerce integration

## Next Tasks
1. Usuario descarga el ZIP
2. Sube a WordPress con GeneratePress activo
3. Configura opciones del Customizer
4. Añade credenciales de Acumbamail
5. Crea página con template Landing Page
