# InteriorAR - Instalación en WordPress con GeneratePress Child

## Estructura de archivos

```
wp-content/themes/generatepress-child/
├── page-interiorar.php          ← Template de la landing
├── assets/
│   ├── css/
│   │   └── interiorar.css       ← Estilos
│   └── js/
│       └── interiorar.js        ← JavaScript
├── functions.php                 ← Ya existe, no modificar
└── style.css                     ← Ya existe, no modificar
```

---

## Pasos de instalación

### 1. Crear la estructura de carpetas

Conéctate por FTP o File Manager y crea estas carpetas dentro de tu child theme:

```
/assets/css/
/assets/js/
```

### 2. Subir los archivos

Sube los 3 archivos a sus ubicaciones:

- `page-interiorar.php` → raíz del child theme
- `interiorar.css` → `/assets/css/`
- `interiorar.js` → `/assets/js/`

### 3. Crear la página en WordPress

1. Ve a **Páginas → Añadir nueva**
2. Título: `Inicio` o `Home` (lo que prefieras)
3. En el panel derecho, busca **Atributos de página → Plantilla**
4. Selecciona: **InteriorAR Landing**
5. Publicar

### 4. Configurar como página de inicio (opcional)

Si quieres que sea tu home:

1. Ve a **Ajustes → Lectura**
2. Selecciona: "Una página estática"
3. Portada: elige la página que creaste
4. Guardar

---

## Configurar Acumbamail

En el archivo `page-interiorar.php`, busca estas líneas (hay 2 formularios):

```html
<form action="TU_URL_DE_ACUMBAMAIL" method="post" id="heroForm">
```

```html
<form action="TU_URL_DE_ACUMBAMAIL" method="post" id="finalForm">
```

Reemplaza `TU_URL_DE_ACUMBAMAIL` con la URL de tu formulario de Acumbamail.

### Cómo obtener la URL de Acumbamail:

1. Entra en tu cuenta de Acumbamail
2. Ve a **Listas → Tu lista → Formularios de suscripción**
3. Crea o edita un formulario
4. Copia la URL del `action` del formulario HTML

---

## Personalización

### Cambiar las imágenes de GLITCH

En `page-interiorar.php`, busca estas URLs:

```
https://customer-assets.emergentagent.com/job_design-boost-59/artifacts/drhyyz5i_De_espalda.png
https://customer-assets.emergentagent.com/job_design-boost-59/artifacts/vp4zid1l_descarga.png
```

Reemplázalas con las URLs de tus propias imágenes (súbelas a tu biblioteca de medios de WordPress).

### Cambiar colores

En `interiorar.css`, modifica las variables CSS al inicio:

```css
:root {
  --orange: #ff6b00;        /* Color principal */
  --cyan: #00f0ff;          /* Color glitch 1 */
  --magenta: #ff00ff;       /* Color glitch 2 */
  --yellow: #ffff00;        /* Color glitch 3 */
}
```

### Crear otras páginas (Privacidad, Legal, Contacto)

1. Crea páginas normales en WordPress con el editor de bloques
2. Usa el slug correcto:
   - `/privacidad`
   - `/legal`
   - `/contacto`

Los links del footer apuntarán automáticamente a estas páginas.

---

## Notas importantes

- Esta plantilla **NO usa** el header/footer de GeneratePress (es independiente)
- Los estilos están aislados para no afectar otras páginas
- El cursor personalizado solo funciona en desktop
- Las imágenes de GLITCH se cargan desde URLs externas (cámbialas por las tuyas)

---

## Soporte

Si necesitas ayuda adicional:
- Revisa que los archivos estén en las rutas correctas
- Verifica permisos de archivos (644 para archivos, 755 para carpetas)
- Limpia la caché del sitio después de hacer cambios
