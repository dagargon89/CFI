# Manual de Usuario: Pizarrón Digital CFI

Bienvenido al sistema Logístico Central (Zero-Friction UI). Dicho sistema permite llevar el control íntegro de viajes y equipos sin interfaces complicadas.

## 1. Acceso al Sistema
Todo personal o cliente debe iniciar sesión a través del portal centralizado:
- **URL:** `/login` (Ejemplo: `https://dominio.com/login`)
- Introduzca su E-Mail institucional y Contraseña. 
- Nota: Si usted es un cliente, el sistema lo restringirá automáticamente de visualizar módulos administrativos.

## 2. Pizarrón Central (Fase 1 y 2)
Al iniciar sesión y dirigirse al `index.html`, usted observará el ecosistema en 3 pestañas dinámicas (Alpine.js):
- **Tractocamiones:** Tabla general con información de las cajas, estatus y UUIDs.
- **Choferes:** Directorio logístico.
- **Viajes Activos / Bitácora:** Donde podrá dar seguimiento a las asignaciones. Solo se permite cruzar tractocamiones "libres".

## 3. Taller y Mantenimiento (Fase 3)
- **URL:** `/mantenimiento.html`
- Para reportar una avería directamente desde la cabina o patio, toque el botón rojo "Reporte Ágil".
- Se desplegará un veloz cuestionario de opciones (Llantas, Luces, Motor, Frenos). El sistema procesará el envío sin demoras.
- Las tablas pintarán de "Rojo" aquellas fallas severas que comprometan la rotación del Tractocamión.

## 4. Portal Privado del Cliente
- **URL:** `/portal_cliente.html`
- Entorno aislado donde sus clientes podrán verificar el estatus (`En ruta`, `Entregado`) únicamente de la carga ligada a su propia empresa, garantizando que su data permanece sellada y confidencial.
