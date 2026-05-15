# CityWorks WordPress Theme

Tema personalizado para CityWorks - Google Cloud Partner en América Latina y Norteamérica.

## Características

- Diseño moderno y responsivo
- Optimizado para rendimiento (lazy loading de imágenes, CSS/JS minificado)
- Compatible con Gutenberg
- Secciones personalizadas: Hero, Servicios, Industries, Contacto
- Formulario de contacto con AJAX
- Personalización via WordPress Customizer
- SEO-friendly
- Accesible (WCAG 2.1)

## Requisitos

- WordPress 5.8 o superior
- PHP 7.4 o superior
- MySQL 5.7 o superior

## Instalación

1. Sube la carpeta `cityworks` a `/wp-content/themes/`
2. Activa el tema en **Apariencia → Temas**
3. Configura el menú en **Apariencia → Menús**
4. Personaliza en **Apariencia → Personalizar**

## Personalización

El tema incluye las siguientes opciones en el Personalizador:

- **Hero Section**: Título, subtítulo, texto y enlace del botón CTA
- **Contact Info**: Email, teléfono, información de oficinas
- **Footer**: Texto de copyright

## Estructura de archivos

```
cityworks/
├── assets/
│   ├── css/
│   │   ├── style.css (principal)
│   │   ├── animations.css
│   │   └── responsive.css
│   ├── js/
│   │   └── main.js
│   └── images/
│       ├── logo.png
│       └── ... (imágenes del tema)
├── includes/
│   ├── customizer.php
│   ├── template-functions.php
│   └── widgets.php
├── template-parts/
│   ├── content-page.php
│   └── content.php
├── functions.php
├── header.php
├── footer.php
├── index.php
├── front-page.php
├── page.php
├── single.php
├── archive.php
├── search.php
├── 404.php
├── style.css
└── screenshot.png
```

## Widgets disponibles

- **Sidebar** (blog/páginas)
- **Footer Column 1-3**
- **Contact Form Widget**

## Shortcodes

No incluye shortcodes. Todo el contenido se maneja via Gutenberg o Template Parts.

## Soporte

Para soporte técnico: support@city.works

## Licencia

GNU General Public License v2 or later

## Créditos

- Basado en las mejores prácticas de WordPress
- Fuentes: Inter (Google Fonts)
- Iconos: Material Icons (recomendado)
