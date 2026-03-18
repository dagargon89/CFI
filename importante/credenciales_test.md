# Credenciales de Prueba MVP Logístico

Este documento contiene los usuarios maestros de prueba generados por el Seeder (`AdminSeeder.php`) de CodeIgniter Shield para auditar la plataforma "Pizarrón Digital".

## Perfil "Administrador Global"
**Acceso a:** Todas las pantallas y endpoints (Tractocamiones, Choferes, Viajes, Mantenimiento).
- **Email:** `sudo@cfi.test`
- **Username:** `sudo`
- **Contraseña:** `Dataholics2026`
- **Rol Shield:** `admin`

## Perfil "Cliente" (Zero-Trust)
**Acceso a:** Únicamente "Portal Cliente" y el endpoint de `Mis Viajes`. Denegado (HTTP 401/403) a los demás módulos.
- **Email:** `cliente@cfi.test`
- **Username:** `cliente_demo`
- **Contraseña:** `Cliente2026`
- **Rol Shield:** `cliente`

*Nota:* El login se realiza por defecto a través de la interfaz web nativa de Auth provista por Shield en `/login`.
