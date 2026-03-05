# InteriorAR - Child Theme de GeneratePress

Un child theme moderno y elegante para GeneratePress con estética tech/startup, diseñado para landing pages y sitios de producto.

## Características

- **Diseño oscuro moderno** con acentos en naranja (#ff5c1a)
- **Totalmente personalizable** desde el Customizer de WordPress
- **Integración con Acumbamail** para formularios de suscripción
- **Templates PHP tradicionales** fáciles de modificar
- **Animaciones CSS** (scroll reveal, glitch effects, ticker)
- **Responsive** y optimizado para móviles
- **Compatible con GDPR** (checkbox de consentimiento)

## Requisitos

- WordPress 5.0+
- GeneratePress (tema padre) instalado y activo
- PHP 7.4+

## Instalación

1. Descarga el tema padre **GeneratePress** desde WordPress.org
2. Activa GeneratePress
3. Sube la carpeta `interiorar-child` a `/wp-content/themes/`
4. Activa "InteriorAR Child Theme" desde Apariencia > Temas
5. Ve a **Personalizar** para configurar el tema

## Configuración

### Opciones del Customizer

Ve a **Apariencia > Personalizar > InteriorAR Theme**:

#### Configuración General
- Texto del logo
- Mostrar/ocultar ticker

#### Colores
- Color principal (Fire): naranja por defecto
- Color de fondo (Void): negro por defecto
- Color de texto (White): crema por defecto

#### Sección Hero
- Tagline
- Título (3 líneas con estilos diferentes)
- Descripción
- Imagen principal
- Texto del botón

#### Ticker/Banner
- Hasta 5 elementos rotatorios

#### Sección Manifesto
- 3 columnas con número, título y texto

#### Acumbamail
- ID del formulario
- ID de la lista
- API Key
- Texto GDPR
- Mensajes de éxito/error

#### Footer
- Descripción
- Copyright
- Redes sociales (Twitter, Instagram, LinkedIn, Facebook, YouTube)

## Uso de Templates

### Landing Page

1. Crea una nueva página en WordPress
2. En el panel lateral, selecciona **Template: Landing Page**
3. Publica la página

### Shortcodes Disponibles

```php
// Formulario de newsletter
[acumbamail_form]

// Con opciones
[acumbamail_form placeholder="Tu email" button="Unirse" hint="Acceso exclusivo"]

// Hero section
[interiorar_hero]

// Manifesto section
[interiorar_manifesto]

// Ticker
[interiorar_ticker]
```

## Estructura de Archivos

```
interiorar-child/
├── assets/
│   ├── css/
│   ├── images/
│   └── js/
│       └── main.js
├── inc/
│   ├── acumbamail.php
│   └── customizer.php
├── template-parts/
│   ├── footer-custom.php
│   ├── hero.php
│   ├── manifesto.php
│   ├── navigation.php
│   ├── newsletter-form.php
│   └── ticker.php
├── functions.php
├── screenshot.png
├── style.css
├── template-landing.php
└── README.md
```

## Personalización Avanzada

### Añadir nuevas secciones

1. Crea un archivo en `/template-parts/tu-seccion.php`
2. Incluye en `template-landing.php`:
   ```php
   <?php get_template_part( 'template-parts/tu-seccion' ); ?>
   ```

### Modificar colores CSS

Edita las variables CSS en `style.css`:

```css
:root {
    --void: #000;      /* Fondo principal */
    --near: #0f1011;   /* Fondo secundario */
    --card: #141618;   /* Tarjetas */
    --line: #1e2226;   /* Bordes */
    --muted: #3a4149;  /* Texto tenue */
    --dim: #6c7a89;    /* Texto secundario */
    --soft: #a8b4bf;   /* Texto suave */
    --white: #f0ede8;  /* Texto principal */
    --fire: #ff5c1a;   /* Acento principal */
    --ember: #ff7a3d;  /* Acento hover */
}
```

## Configuración de Acumbamail

1. Crea una cuenta en [Acumbamail](https://acumbamail.com)
2. Crea una lista de suscriptores
3. Obtén tu API Key desde Configuración > API
4. Copia el ID de tu lista
5. Configura estos datos en el Customizer

## Soporte

Para problemas o sugerencias, contacta a: info@interiorar.com

## Licencia

GNU General Public License v2 or later
