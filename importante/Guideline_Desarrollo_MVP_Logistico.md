# Guideline de Desarrollo: MVP "Nuevo Pizarrón Digital" Logístico

Este documento contiene el prompt maestro y la estructura de tareas (backlog) diseñada para que los agentes de desarrollo de Dataholics construyan el MVP Logístico basado en el Statement of Work (SOW), alineado con las **Nuevas Políticas Operativas (CI4 + Decoupled API)**.

---

## 1. Prompt Maestro para Agentes (Contexto Inicial)

*Copia y pega este prompt al iniciar el entorno de desarrollo con los agentes:*

> **Contexto Principal:**
> Eres un equipo de agentes especializados (API Architect, UI Developer y Security Auditor) de Dataholics. Nuestro objetivo es construir el MVP de un sistema centralizado de control logístico ("Nuevo Pizarrón Digital") para CFI.
>
> **Stack Tecnológico Obligatorio (Dataholics Hybrid Stack):**
> *   **Backend (API):** CodeIgniter 4 (PHP 8.1+). Arquitectura RESTful pura.
> *   **Frontend:** HTML5 estático + Vanilla JS / Alpine.js + Tailwind CSS. Comunicación vía API.
> *   **Base de Datos:** MySQL (Monolito Relacional).
>
> **Reglas de Seguridad Mandatorias (Veto Técnico):**
> 1.  **Arquitectura Segura en Site5:** El core de CI4 (`app`, `system`, `writable`) debe vivir FUERA del `public_html`.
> 2.  **Auth Inquebrantable:** Usar **Cookies HttpOnly y SameSite=Strict** para la sesión. PROHIBIDO guardar tokens en LocalStorage.
> 3.  **CORS:** Configurar whitelist estricta para el dominio del frontend.
> 4.  **Sanitización de API:** La API nunca debe confiar en el frontend. Valida cada entrada y filtra cada salida JSON (No envíes campos sensibles innecesarios).
>
> **Instrucción de Ejecución:**
> Trabajaremos bajo el "Bucle de Desarrollo Ágil": Primero definiremos el contrato de la API, luego implementaremos los controladores en CI4 y finalmente la interfaz estática. Confirma que entiendes estas directrices antes de comenzar con la Fase 1.

---

## 2. Backlog de Tareas por Fases ("El Backlog de API y Front")

### Fase 1: Arquitectura Base y Catálogos (Nivel 1)
**Objetivo:** Levantar la API segura y los modelos de activos.

*   [ ] **Task 1.1:** Inicializar proyecto CI4. Mover carpetas de sistema arriba de `public_html` en el entorno de desarrollo/simulación.
*   [ ] **Task 1.2:** Configurar **Shield** o sistema de Auth basado en Cookies HttpOnly. Definir Roles (RBAC): Cliente, Tráfico, Mantenimiento, Finanzas, Admin.
*   [ ] **Task 1.3:** **API Endpoints:** CRUDs para **Tractocamiones**, **Choferes** y **Cajas**. Asegurar que las respuestas JSON estén filtradas (Security Audit).
*   [ ] **Task 1.4:** **UI Estática:** Crear pantallas maestras (tablas con Alpine.js) que consuman la API para listar y filtrar activos.

### Fase 2: Solicitudes y Documentación (Nivel 2)
**Objetivo:** Gestión de viajes y flujo de archivos.

*   [ ] **Task 2.1:** **API Endpoints:** Lógica de **Viajes/Órdenes de Servicio**. Implementar validación cruzada (Un chofer no puede tener dos viajes activos).
*   [ ] **Task 2.2:** **Gestión de Archivos:** Implementar subida segura de evidencias (PDF/XML) asociadas a viajes. Los archivos deben guardarse en una carpeta no indexable.
*   [ ] **Task 2.3:** **Portal Cliente:** Interfaz ligera que consuma el endpoint de "Mis Viajes", protegida por el middleware de sesión de CI4.

### Fase 3: Mantenimiento (Nivel 3)
**Objetivo:** Reporte de fallas y logística de taller.

*   [ ] **Task 3.1:** **API Endpoints:** Órdenes de Trabajo. Endpoint optimizado para reportes rápidos desde móvil (POST simple).
*   [ ] **Task 3.2:** **UI Dashboard Mantenimiento:** Vista tabular que resalte unidades con órdenes abiertas.

### Fase 4: Auditoría y Finanzas (Nivel 4)
**Objetivo:** Control de gastos y exportación de datos.

*   [ ] **Task 4.1:** **API Endpoints:** Registro de Gastos Operativos vinculados estrictamente a `uuid` de viaje o tractocamión.
*   [ ] **Task 4.2:** **Exportación Segura:** Endpoint que genere CSV/XLSX procesado en el servidor para evitar que el frontend maneje grandes volúmenes de datos crudos.

---

## 3. Criterios de Calidad (Checklist del Auditor)
1.  ¿La cookie de sesión tiene el flag `HttpOnly` activo?
2.  ¿Los controladores de CI4 validan el `role` del usuario antes de retornar el JSON?
3.  ¿El archivo `.env` está protegido y fuera del alcance web?
4.  ¿Se usa el Query Builder de CI4 para evitar Inyección SQL?

---

## 4. Entregables de Documentación

### 4.1. Manual Técnico CI4 (`Manual_Tecnico_MVP_CFI.md`)
*   [ ] **Estructura Site5:** Explicación del mapeo de carpetas seguras.
*   [ ] **Documentación de API:** Listado de endpoints, métodos (GET/POST/PATCH) y esquemas de JSON.
*   [ ] **Guía de Despliegue:** Proceso de subida a Site5 y configuración de base de datos vía cPanel.

### 4.2. Manual de Usuario (`Manual_Usuario_MVP_CFI.md`)
*   [ ] Guías visuales de la interfaz estática consumiendo la API.


