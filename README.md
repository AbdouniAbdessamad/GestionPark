# GestionPark

**A Laravel web app for managing an organisation's vehicle fleet, equipment stock and staff leave, with an employee request / admin approval workflow.**

![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.4-06B6D4?logo=tailwindcss&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3-8BC0D0?logo=alpinedotjs&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-6-646CFF?logo=vite&logoColor=white)

## Overview

GestionPark is an internal management tool (French-language UI) that brings three everyday back-office processes into one place: the motor pool (*parc automobile*), the equipment inventory and its suppliers, and leave requests (*congés*). Employees submit requests for a vehicle, for equipment or for leave; administrators review, approve or reject them from a dedicated admin area. Approvals have real side effects: an approved vehicle request marks the car as in use, and an approved equipment request is deducted from stock.

## Key Features

**Authentication & roles**
- Login, registration, password reset and profile management (Laravel Breeze).
- Two roles, `admin` and `user`; the navigation and dashboard adapt to the signed-in user's role.
- Admin user management: create, edit and delete accounts with role, grade (rank) and phone number.

**Fleet management (vehicles)**
- CRUD for vehicles: licence plate (`matricule`), condition, mileage, oil-change info, fuel type and status.
- Vehicle statuses: `disponible` (available), `en_utilisation` (in use), `en_panne` (broken down) and `Vidange` (oil change due).
- Employees request an available vehicle for a date and an estimated distance.
- Admins approve requests (vehicle switches to *in use*) or reject them, view vehicles currently in use, and mark a vehicle as returned.
- On return, the trip distance is added to the vehicle's mileage, and the vehicle is flagged for an oil change once it reaches the 10,000 km threshold.
- Per-vehicle history of approved trips.

**Inventory & suppliers**
- CRUD for suppliers (`fournisseurs`) and inventory items linked to a supplier.
- Employees request a quantity of an item; on approval the quantity is checked against stock and deducted, and the request is refused with an error if stock is insufficient.
- Employees can edit or cancel an equipment request only while it is still pending.
- Admin history of all equipment requests.

**Leave management**
- Employees submit leave requests: start date, duration in days and type (annual, sick, maternity, paternity, exceptional).
- Admins approve or reject them and can browse all leave requests.

**Dashboards**
- Admin dashboard: vehicle counts by status (available, in use, broken down, oil change due) and the latest pending vehicle, equipment and leave requests.
- Employee dashboard: counters for the user's own pending, accepted and refused requests.

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.2+, Laravel 12 (Eloquent ORM, Blade, resource controllers) |
| Auth | Laravel Breeze 2 (Blade stack), Laravel Sanctum 4 |
| Frontend | Blade templates, Tailwind CSS 3.4 (+ `@tailwindcss/forms`), Alpine.js 3 |
| Build | Vite 6 with `laravel-vite-plugin` |
| Database | MySQL (database name `autopark` in `.env.example`) |
| Testing | Pest 3 / PHPUnit 11 (Breeze auth and profile feature tests) |

## Project Structure

```
GestionPark/
├── app/
│   ├── Http/Controllers/
│   │   ├── AutomobileController.php        # vehicle CRUD
│   │   ├── DemandeController.php           # employee vehicle requests
│   │   ├── DemandeInventaireController.php # employee equipment requests
│   │   ├── CongeController.php             # employee leave requests
│   │   ├── InventaireController.php        # inventory CRUD
│   │   ├── FournisseurController.php       # supplier CRUD
│   │   ├── UserController.php              # admin user management
│   │   ├── AdminDemandeController.php      # approve/reject, returns, history
│   │   └── Auth/                           # Breeze authentication
│   └── Models/                             # Automobile, Demande, DemandeInventaire,
│                                           # Conge, Inventaire, Fournisseur, User
├── database/migrations/                    # schema (see Database below)
├── resources/views/
│   ├── admin/                              # admin approval & history screens
│   ├── automobiles/ inventaires/ fournisseurs/ users/
│   ├── Demandes/ demande-inventaires/ conges/
│   └── dashboard.blade.php                 # role-aware dashboard
├── routes/web.php                          # all application routes
└── tests/                                  # Pest feature tests
```

Each business area follows the same pattern: an Eloquent model, a resource controller and a folder of Blade views. Request approval logic is centralised in `AdminDemandeController`, and all application routes sit behind the `auth` middleware in `routes/web.php`.

## Database

| Table | Purpose | Main columns |
|---|---|---|
| `users` | Employees and admins | `name`, `email`, `num_tel`, `role` (`admin`/`user`), `grade`, `password` |
| `automobiles` | Fleet vehicles | `matricule` (unique), `Etat`, `Kilometrage`, `Vidange`, `Carburant`, `Status` (default `disponible`) |
| `demandes` | Vehicle requests | `date_demande`, `distance_total`, `matricule` → `automobiles.matricule`, `status`, `created_by` → `users` |
| `fournisseurs` | Suppliers | `nom`, `adresse`, `telephone`, `email` |
| `inventaires` | Stock items | `libelle`, `quantite`, `fournisseur_id` → `fournisseurs` |
| `demande_inventaires` | Equipment requests | `date_demande`, `libelle`, `quantite`, `status`, `created_by` → `users` |
| `conges` | Leave requests | `date_debut`, `Duree`, `type_conge`, `status`, `created_by` → `users` |

Request statuses are `en attente` (pending), `validé` (approved) and `rejeté` (rejected). Laravel's default `password_reset_tokens`, `sessions`, `cache` and `jobs` tables are also created.

## Getting Started

**Prerequisites:** PHP 8.2+, Composer, Node.js and npm, and a MySQL server.

```bash
git clone https://github.com/AbdouniAbdessamad/GestionPark.git
cd GestionPark

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Create a MySQL database called `autopark` (or change `DB_DATABASE` in `.env`) and set your DB credentials, then:

```bash
php artisan migrate
npm run build        # or `npm run dev` while developing
php artisan serve
```

Open http://127.0.0.1:8000, register an account and choose the `admin` role to reach the admin area. `composer run dev` starts the PHP server, queue listener and Vite together.

Run the tests with:

```bash
php artisan test
```

## Possible Improvements

- **Enforce roles on the server.** Admin routes are currently only protected by `auth`, and the public registration form lets anyone pick the `admin` role. An admin middleware or policies, and removing the role choice from self-registration, would close that gap.
- **Fix the oil-change rule.** Once a vehicle passes 10,000 km, every later return flags it for an oil change. Storing the mileage of the last oil change and comparing against it would make the rule accurate.
- **Link equipment requests to inventory by ID.** Requests currently match stock by item name (`libelle`); a foreign key would avoid mismatches.
- **Tidy up status handling.** The employee dashboard counts `accepté`/`refusé` while the app stores `validé`/`rejeté`, so those counters always show 0. Status enums or constants would prevent this; the seeder and user factory also need the required `num_tel`, `role` and `grade` columns.

## Author

**Abdessamad Abdouni**, Information Systems Engineering student at SUPMTI Rabat, Morocco
GitHub: [github.com/AbdouniAbdessamad](https://github.com/AbdouniAbdessamad)
