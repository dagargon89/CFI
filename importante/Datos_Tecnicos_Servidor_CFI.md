# Datos Técnicos del Servidor — Proyecto CFI

> ⚠️ **DOCUMENTO CONFIDENCIAL** — Restringido al equipo técnico de Dataholics. No compartir.

---

## Acceso al Servidor de Producción

| Campo        | Valor                                          |
|--------------|------------------------------------------------|
| **Dominio**  | `cfi.dataholics.com.mx`                        |
| **Usuario**  | `CFI_Dev@cfi.dataholics.com.mx`                |
| **Contraseña** | `S@JASgfBrdi;`                               |
| **Directorio** | `/home/noodluis/cfi.dataholics.com.mx/CFI_Dev` |

---

## Base de Datos MySQL

| Campo            | Valor                |
|------------------|----------------------|
| **Base de Datos**| `noodluis_CFI`       |
| **Usuario DB**   | `noodluis_baseCFI`   |
| **Contraseña DB**| `szDS$QX9!4#_`       |
| **Permisos**     | ALL PRIVILEGES       |

**Privilegios habilitados:** ALTER, ALTER ROUTINE, CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, DELETE, DROP, EVENT, EXECUTE, INDEX, INSERT, LOCK TABLES, REFERENCES, SELECT, SHOW VIEW, TRIGGER, UPDATE.

---

## Repositorio Git

| Campo                   | Valor                  |
|-------------------------|------------------------|
| **Repository Path**     | `/home1/noodluis/CFI`  |

---


- El directorio raíz del proyecto en el servidor es `/home/noodluis/cfi.dataholics.com.mx/CFI_Dev`.
- El directorio público (webroot) de CodeIgniter 4 debe apuntar a `CFI_Dev/public`.
- Asegurarse de que el archivo `.env` **nunca** sea accesible desde el dominio (verificar configuración del `public_html` / webroot).
- Las credenciales de este documento deben rotarse una vez finalizado el desarrollo y antes del Go-Live.
