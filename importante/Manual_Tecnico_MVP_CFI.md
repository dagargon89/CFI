# Manual Técnico: MVP Pizarrón Digital CFI

Este documento describe la arquitectura técnica, estándares de seguridad y guía de despliegue del MVP Logístico total (Fases 1 a 4).

## 1. Arquitectura de Despliegue (Fosa Ciega)
El sistema utiliza el **Dataholics Hybrid Stack** sobre Site5:
- `cfi_core/`: Contiene el núcleo seguro (`app`, `system`, `.env`, `vendor`, `writable`). No accesible vía HTTP.
- `public_html/`: Contiene el Front-End desacoplado (`index.html`, `router.php`, assets).

## 2. Seguridad y Autenticación (RBAC)
1. **Identidad:** Implementada con CodeIgniter Shield. Sesiones vía Cookies `HttpOnly` y `SameSite=Strict`.
2. **Endpoint Identity:** `/api/auth/me` permite al Frontend adaptar la UI al rol del usuario en tiempo real.
3. **Filtros de Grupo:** Configurados en `Routes.php` (Ej. `filter => 'group:admin,finanzas'`).
4. **Validación de Negocio:**
   - **Viajes:** `beforeInsert` callback en `ViajesModel` impide duplicidad de chofer/unidad en ruta.
   - **Evidencias:** Join con `viajes` en el controlador para que clientes solo listen sus propios archivos.

## 3. Catálogo de API Endpoints
- **Activos:** `/tractocamiones`, `/choferes`, `/cajas_remolques`.
- **Operaciones:** `/viajes` (Bitácora), `/evidencias` (Upload binario seguro en `WRITEPATH`).
- **Mantenimiento:** `/ordenes_trabajo` (JSON Payload), `/insumos` (Control de refacciones).
- **Finanzas:** `/gastos_operativos` (Diesel, Casetas).
- **Auditoría:** `/exportacion/gastos` (Generador de CSV con Excel BOM).

## 4. Guía de Despliegue
1. Subir `cfi_core` arriba de `public_html`.
2. Configurar `.env` con base de datos real.
3. El `router.php` en el root maneja el redireccionamiento para el servidor de desarrollo local y simula el comportamiento de Site5.
