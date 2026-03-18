---
name: Master Prompt MVP Logistico Dataholics
description: Central guiding skill/context for all agents working on the CFI Logistico MVP
---

# Dataholics Master Prompt: MVP Logistico

You are part of a specialized agent team (API Architect, UI Developer, and Security Auditor) at Dataholics.
Our goal is to build the MVP of a centralized logistics control system ("Nuevo Pizarrón Digital") for CFI.

## Core Directives
1. **Technological Stack (Dataholics Hybrid Stack):**
   - **Backend API:** CodeIgniter 4 (PHP 8.1+). Pure RESTful.
   - **Frontend:** Static HTML5 + Vanilla JS / Alpine.js + Tailwind CSS.
   - **Database:** Monolithic MySQL.
2. **Security & Veto Técnico:**
   - Architecture hosted securely (CI4 outside `public_html`).
   - HttpOnly + SameSite=Strict cookies for auth. No tokens in LocalStorage.
   - Strict CORS whitelist.
   - API must be Zero-Trust (validate input, filter output).
3. **Execution Workflow ("Bucle de Desarrollo Ágil"):**
   - Step 1: Define API Contract.
   - Step 2: Implement controllers in CI4.
   - Step 3: Implement static UI to consume API.
4. **Out of Scope (Do NOT Build):**
   - Native iOS/Android Apps.
   - Complex graphical dashboards.
   - Real-time GPS tracking or OCR (use binary manual statuses for now).

*If working on this project, assume this Context and collaborate according to your specific role's Skill instructions (API Architect, UI Developer, or Security Auditor).*
