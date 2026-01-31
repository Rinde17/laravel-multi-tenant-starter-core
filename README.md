Laravel Multi-Tenant Starter Kit (Core)
=======================================

This repository contains the **core architecture** of a production-grade Laravel multi-tenant SaaS starter.

It is intentionally **not a complete, ready-to-ship product**.

👉 The full production-ready version (with tests, seeders, UI, and invitation flows fully wired) is available as a paid download.

🎯 Purpose of This Repository
-----------------------------

This public repository exists to showcase:

*   clean multi-tenant architecture
    
*   strict tenant isolation
    
*   permission & role boundaries
    
*   invitation domain modeling
    
*   explicit, readable Laravel code
    

It is meant for:

*   learning
    
*   evaluation
    
*   architectural reference
    

Not for:

*   instant deployment
    
*   demo apps
    
*   beginners
    

🏢 Multi-Tenancy Model
----------------------

*   Office-based tenancy
    
*   One user → one office
    
*   No tenant switching
    
*   No cross-tenant access
    

Tenant context is enforced via middleware and policies.

🔐 Roles & Permissions
----------------------

*   Powered by **spatie/laravel-permission**
    
*   Team-based permissions
    
*   Office is the permission team
    
*   Fully policy-driven authorization
    

✉️ Invitation Architecture
--------------------------

*   Token-based invitation model
    
*   Public acceptance controller
    
*   Secure office binding
    
*   Explicit lifecycle
    

(UI, seeders, and frontend flows are intentionally not included in this repository.)

🧱 What This Repo Includes
--------------------------

*   Core models
    
*   Middleware
    
*   Policies
    
*   Migrations
    
*   Route definitions
    
*   Architectural decisions
    

🚫 What This Repo Does NOT Include
----------------------------------

By design, this repository does **not** include:

*   Database seeders
    
*   Pest test suite
    
*   Factories
    
*   Inertia pages
    
*   UI flows
    
*   Billing or subscriptions
    

It also omits **standard Laravel Breeze application actions** (user creation, profile update, password update, email verification, etc.), even though they are part of the full starter.

> These files are not removed for technical reasons, but to keep this repository focused on **multi-tenant architecture**, not framework boilerplate.

💎 Full Version (Paid)
----------------------

The paid version includes everything needed to ship:

*   Full Pest test suite
    
*   Seeders & factories
    
*   Ready-to-use Inertia pages
    
*   Invitation UI
    
*   Complete developer experience
    
*   Ready-to-ship foundation
    
*   Workflows
    
*   **All default Laravel 12 + Breeze actions and flows**(authentication, user creation, profile & password management, email verification, etc.)
    

👉 Available on Gumroad.

🧠 Philosophy
-------------

> This starter solves **multi-tenancy**, not billing.

Infrastructure, not business logic.

📄 License
----------

MIT — code is free to study and reuse.
