# Guía de Estilos y Diseño - CFI Transporte

Esta guía documenta el sistema de diseño utilizado en la interfaz de **CFI Transporte**, basado en una estética técnica, elegante y minimalista. Se fundamenta en **Tailwind CSS** con una paleta de colores personalizada y tipografía específica.

## 🎨 Paleta de Colores

El sistema utiliza una paleta oscura con acentos dorados (`Primary`), siguiendo la nomenclatura de *Material Design 3*.

| Color | Hex | Clase Tailwind | Uso Principal |
| :--- | :--- | :--- | :--- |
| **Primary** | `#D1A14E` | `bg-primary` / `text-primary` | Botones, estados activos, iconos clave. |
| **Surface** | `#131314` | `bg-surface` | Fondo principal de la aplicación. |
| **Surface Low** | `#1B1B1C` | `bg-surface-container-low` | Fondos de tarjetas y contenedores secundarios. |
| **Surface High** | `#2A2A2B` | `bg-surface-container-high` | Hover en elementos de lista, cabeceras. |
| **On Surface** | `#E5E2E3` | `text-on-surface` | Texto principal (blanco roto). |
| **On Surface Var**| `#D2C4BC` | `text-on-surface-variant` | Texto secundario o descripciones. |
| **Outline** | `#9B8E87` | `text-outline` | Bordes sutiles y etiquetas de bajo contraste. |
| **Outline Var** | `#4F453F` | `border-outline-variant` | Divisores y bordes decorativos. |

---

## 🔡 Tipografía

Se utilizan tres familias tipográficas para diferenciar la jerarquía de la información:

1.  **Headline (Noto Serif):** Utilizada para títulos principales y secciones ejecutivas. Transmite autoridad.
    *   *Clase:* `font-headline` o `font-serif`
2.  **Body (Manrope):** Tipografía principal para lectura, datos y párrafos.
    *   *Clase:* `font-body` o `font-sans`
3.  **Label (Inter):** Para etiquetas técnicas, metadatos y botones. Alta legibilidad en tamaños pequeños.
    *   *Clase:* `font-label`

---

## 🛠️ Componentes y Ejemplos

### 1. Botón Principal (Primary)
Diseño cuadrado (sin bordes redondeados), mayúsculas y espaciado de letras amplio.

```html
<button class="bg-primary text-on-primary px-10 py-4 font-label text-xs uppercase tracking-widest hover:brightness-110 transition-all">
    Generar Reporte
</button>
```

### 2. Tarjeta Estilo "Bento"
Uso de `Surface Low` y bordes rectos para un look técnico.

```html
<div class="bg-surface-container-low p-8 relative border-l-4 border-primary">
    <span class="font-label text-[10px] uppercase tracking-widest text-outline mb-2 block">Métrica 01</span>
    <h3 class="font-headline text-lg mb-2">Precisión de Datos</h3>
    <div class="text-4xl font-body font-light mb-4 text-on-surface">
        99.9<span class="text-sm text-outline">%</span>
    </div>
    <p class="font-label text-xs text-on-surface-variant uppercase tracking-wider">
        Verificación contra balizas GPS.
    </p>
</div>
```

### 3. Fila de Lista (Audit/Log)
Efectos de hover sutiles y tipografía técnica.

```html
<div class="flex items-center justify-between p-6 bg-surface hover:bg-surface-container-high transition-colors group cursor-pointer border-b border-outline-variant/10">
    <div class="flex items-center gap-6">
        <div class="w-10 h-10 bg-primary/10 flex items-center justify-center">
            <span class="material-symbols-outlined text-primary">monitoring</span>
        </div>
        <div>
            <div class="font-body font-medium text-sm text-on-surface">Validación de Telemetría</div>
            <div class="font-label text-[10px] text-outline uppercase tracking-widest">Global • Real-time</div>
        </div>
    </div>
    <span class="material-symbols-outlined text-outline group-hover:text-primary transition-colors">chevron_right</span>
</div>
```

### 4. Badge de Estado
Etiquetas pequeñas para indicar estados activos o pendientes.

```html
<!-- Estado Activo -->
<span class="inline-flex items-center px-3 py-1 bg-primary/20 text-primary font-label text-[10px] uppercase tracking-tighter">
    Activo
</span>

<!-- Estado Pendiente -->
<span class="inline-flex items-center px-3 py-1 bg-outline-variant/20 text-outline font-label text-[10px] uppercase tracking-tighter">
    Programado
</span>
```

---

## ✨ Efectos Especiales

### Textura "Matte Grain"
Añade profundidad al diseño mediante un overlay de ruido sutil.

**CSS Requerido:**
```css
.matte-grain {
    position: relative;
}
.matte-grain::before {
    content: "";
    position: absolute;
    inset: 0;
    opacity: 0.03;
    pointer-events: none;
    background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA7..."); /* URL de la imagen de grano */
}
```

### Bordes y Radios
*   **Border Radius:** Por defecto es `0px` (`rounded-none`). Solo se usa `rounded-full` para elementos circulares específicos (como avatars).
*   **Tracking:** Se usa mucho `tracking-widest` o `tracking-[0.3em]` en etiquetas para mantener la legibilidad y estética premium.

---

## ⚙️ Configuración de Tailwind (Extend)

Para implementar estos estilos, asegúrate de tener esta configuración en tu `tailwind.config.js`:

```javascript
theme: {
    extend: {
        colors: {
            "primary": "#D1A14E",
            "surface": "#131314",
            "surface-container-low": "#1b1b1c",
            "surface-container-high": "#2a2a2b",
            "on-surface": "#e5e2e3",
            "on-surface-variant": "#d2c4bc",
            "outline": "#9b8e87",
            "outline-variant": "#4f453f",
            "tertiary": "#dec1af",
            "tertiary-container": "#3d2b1f",
        },
        fontFamily: {
            "headline": ["Noto Serif"],
            "body": ["Manrope"],
            "label": ["Inter"]
        },
        borderRadius: { 
            "DEFAULT": "0px", 
            "lg": "0px", 
            "xl": "0px" 
        },
    }
}
```
