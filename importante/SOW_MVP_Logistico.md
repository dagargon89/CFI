# Statement of Work (SOW): MVP "Nuevo Pizarrón Digital"

## 1. Información General del Proyecto
- **Nombre del Proyecto:** MVP "Nuevo Pizarrón Digital" (Recuperación de Control Logístico)
- **Cliente / Área Operativa:** CFI
- **Proveedor / Equipo Técnico:** Dataholics
- **Fecha de Inicio Estimada:** [Día/Mes/Año]
- **Fecha de Entrega Estimada:** [Día/Mes/Año]

---

## 2. Antecedentes y Contexto Operativo
El crecimiento acelerado de la empresa ha fracturado el sistema de control actual ("pizarrón físico"). Actualmente, la información logística y operativa se encuentra dispersa en silos de comunicación (grupos de WhatsApp, hojas de Excel desactualizadas y cadenas de correos). Esta fragmentación genera un "efecto dominó" que se traduce en:
* Puntos ciegos operativos.
* Retrasos en la conciliación y facturación.
* Flujos de efectivo estancados.

---

## 3. Visión y Solución: Arquitectura Centralizada
El presente MVP tiene como propósito desarrollar e implementar el **"Nuevo Pizarrón Digital"**, un ecosistema centralizado enfocado en la **Simplicidad Absoluta** y la **Integridad Referencial**, actuando como una sola fuente de la verdad para toda la empresa.

### 3.1. Definiciones de Arquitectura
*   **Framework de Desarrollo:** Se utilizará **CodeIgniter 4** en el backend para asegurar escalabilidad y rendimiento, siguiendo el **"Dataholics Hybrid Stack"**. Se omite de manera intencional el uso de frameworks frontend "pesados" (React, Vue, Angular) para maximizar la velocidad de carga y simplificar el mantenimiento.
*   **Base de Datos Relacional:** El sistema operará bajo un modelo de **Monolito MySQL**. Su estructura rígida impedirá la duplicidad y la generación de registros huérfanos. Se garantiza que cualquier actualización en el área de Tráfico se reflejará de inmediato en los módulos de Facturación y Finanzas.

### 3.2. Seguridad y Privacidad
*   **Modelo "Fosa Ciega":** La arquitectura aísla el directorio público (`public_html`) de los archivos críticos del core del sistema (contraseñas `.env`, carpeta de dependencias `vendor`), manteniéndolos fuera de acceso desde internet.
*   **Protocolo de Encriptación:** Todas las conexiones al sistema serán forzadas mediante HTTPS.
*   **Matriz de Privilegio Mínimo (RBAC):** Control de acceso estrictamente compartimentado. (Ejemplo: el cliente solo visualizará sus facturas, el área de Mantenimiento no tendrá acceso a Facturación, y Finanzas contará con un acceso global de nivel auditoría).

---

## 4. Decisiones de Diseño y Veto Técnico (Out of Scope)
Para proteger el Retorno de Inversión (ROI) y garantizar un despliegue operativo ágil, se ha establecido un veto sobre características de alto costo técnico pero de bajo impacto inicial. Por ende, **los siguientes elementos quedan excluidos del MVP**:

1.  **Aplicaciones Nativas:** No se desarrollarán apps para iOS/Android. Se entregará un portal web responsivo (Zero-Friction UI) para evitar descargas y constante mantenimiento.
2.  **Rastreo GPS en Tiempo Real y OCR Bancario:** Se optará por la carga de estados manual mediante estatus binarios (Ej. "En Patio" / "Sitio Cliente"). Esto forzará la disciplina operativa de los colaboradores antes de proceder a futuras automatizaciones complejas.
3.  **Dashboards de Tableros Complejos:** Las interfaces estarán fundamentadas en vistas tabulares directivas, optimizadas con filtros de lectura rápida y exportación limpia a archivos de Excel.

---

## 5. Cronología de Despliegue (Backlog de Acero)
El monolito se construirá y entregará en cuatro capas o niveles secuenciales estandarizados:

*   **Fase 1: Nivel 1 (Tráfico y Activos)**
    *   Construcción del cimiento de la base de datos central.
    *   Desarrollo de CRUDs para Unidades Tractocamiones y Choferes.
    *   Creación de la bitácora centralizada para control de cajas/remolques.

*   **Fase 2: Nivel 2 (Solicitudes y Facturación)**
    *   Implementación de portal Zero-Friction para interacción con clientes.
    *   Estructuración de módulos para la carga de archivos XML/PDF de viajes ejecutados.

*   **Fase 3: Nivel 3 (Mantenimiento)**
    *   Digitalización del seguimiento de Órdenes de Trabajo.
    *   Habilitación de captura de reporte de fallas directas desde cabina.
    *   Control inicial de refacciones y consumos vinculados al tractocamión.

*   **Fase 4: Nivel 4 (Finanzas)**
    *   Consolidación global del ecosistema operativo.
    *   Asignación y auditoría directa de gastos operativos (diésel, viáticos y deducciones) enfocados permanentemente a tractocamiones específicos para calcular la rentabilidad real.

---

## 6. Criterios de Aceptación
*   Aplicación web desplegada en el servidor de producción acordado bajo estándar HTTPS.
*   Base de datos configurada y funcional.
*   Cumplimiento de las 4 fases detalladas en el Backlog de Acero.

## 7. Acuerdos de Trabajo y Presupuesto
*   **Costo de Inversión del MVP:** [Monto a definir]
*   **Esquema de Pagos:** [Ej. 30% Anticipo, 30% Entregable Fase 2, 40% Cierre y Despliegue Fase 4]

---
**Firmas de Aprobación:**

Este Documento de Trabajo (SOW) rige el alcance de las actividades. Cualquier adición fuera de los 4 niveles o de las exclusiones marcadas se presupuestará como cambio de alcance (Change Request).

**Por Dataholics:**
Nombre: _____________________
Fecha: ______________________
Firma:  ______________________

**Por el Cliente / Área Solicitante:**
Nombre: _____________________
Fecha: ______________________
Firma:  ______________________
