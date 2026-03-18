# Manual Técnico: MVP Pizarrón Digital CFI

Este documento describe la arquitectura técnica, estándares de seguridad y guía de despliegue del MVP Logístico.

## 1. Arquitectura "Fosa Ciega" (Site5)
Por mandato de seguridad, el framework CodeIgniter 4 ha sido desacoplado del directorio público de internet.
- `cfi_core/`: Contiene el núcleo (`app`, `system`, `.env`, `vendor`, `writable`). **Fuera del alcance web.**
- `public_html/`: Contiene el Front-End (HTML/JS/CSS) y el archivo `index.php` enrutador. Actúa como única puerta de entrada.

## 2. Ecosistema de Seguridad (Zero-Trust)
1. **Autenticación (CodeIgniter Shield):** Las sesiones se basan estrictamente en Cookies configuradas con `HttpOnly=true` y `SameSite=Strict`. Prohibido el uso de LocalStorage.
2. **Filtros Globales (CORS):** La API solo obedece peticiones originadas desde dominios en la Whitelist (`localhost`, `cfi.test`).
3. **RBAC (Role-Based Access Control):** Middleware aplicado en `Routes.php`. Los clientes tienen denegado el acceso a `/api/tractocamiones`, `/api/choferes`, etc.
4. **Privacidad de Data:** El controlador `Viajes.php` filtra automáticamente las búsquedas si el rol es "cliente" (`id_cliente = auth()->id()`).

## 3. Catálogo de API Endpoints (Fases 1 a 3)
Todas las rutas Base: `/api/`

- **Tractocamiones (`/tractocamiones`):** CRUD estándar. GET retorna catálogo. Requiere rol interno.
- **Choferes (`/choferes`):** CRUD estándar.
- **Cajas / Remolques (`/cajas_remolques`):** CRUD estándar.
- **Viajes (`/viajes`):** CRUD. Al hacer `POST`, el Modelo intercepta y dispara `checkActiveTrips` previniendo duplicidad de equipos en ruta.
- **Mantenimiento (`/ordenes_trabajo`):** Soporta payload dinámico con el campo `checklist_fallas` (JSON). Optimizado para envíos ágiles en terreno con `status` fijo inicial.
- **Evidencias (`/evidencias`):** Endpoint POST con validación antimalware de Binarios (Acepta `pdf`, `xml`, `jpg`). Archivos se almacenan criptográficamente en `writable/uploads` fuera del scope web.

## 4. Guía de Despliegue a Producción (cPanel / Site5)
1. Descomprimir el proyecto en el directorio `/home/user/`.
2. Mover los contenidos de `public_html` al directorio real público de Site5.
3. Asegurar que las carpetas mantengan la misma alineación de niveles. Editar `public_html/index.php` para apuntar el `$pathsPath` hacia `../cfi_core/app/Config/Paths.php`.
4. Modificar `.env` en producción: `CI_ENVIRONMENT = production` y `cookie.secure = true`.
