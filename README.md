# LuxSecure

**Developed by Nexora Labs**

A production-ready Laravel property listing and management platform with user authentication, admin panel, favorites, contact inquiries, and REST API.

## Product ownership

LuxSecure is an **in-house product** of **Nexora Labs**, the official software house and product owner. All features, modules, and architecture are developed for internal use, reusable SaaS-style expansion, and future client deployments under Nexora Labs. This codebase represents an enterprise-level, portfolio-ready asset maintained by Nexora Labs.

## Features

- **User Authentication**: Register, login, logout, password reset (email), email verification
- **User Profile**: View and edit name/email/phone; view saved (favorite) properties
- **Properties**: Public listing with search (location/title), filter by type and price range, pagination, property detail page
- **Favorites / Wishlist**: Logged-in users can save properties; list visible on profile
- **Contact Form**: Validated submissions stored in DB; optional email notification to admin
- **Admin Panel** (`/admin`): Dashboard (users, properties, inquiries), full Property CRUD, image uploads, manage contact inquiries (view, mark as read)
- **Admin Auth**: Role-based access (`admin` vs `user`); admin middleware protects `/admin` routes
- **REST API**: `GET /api/properties` with filters and pagination; optional Sanctum-protected `/api/properties/favorites`
- **Custom Error Pages**: 404 and 503
- **Responsive UI**: Mobile-friendly layout with Tailwind-style styling

## Tech Stack

- **Backend**: Laravel 10.x, PHP 8.1+
- **Frontend**: Blade, Tailwind (CDN), Font Awesome, Lottie
- **Database**: MySQL/PostgreSQL/SQLite
- **Auth**: Laravel session + Laravel Sanctum (API)
- **Storage**: Local/public disk for property images

## Requirements

- PHP 8.1+
- Composer
- Node.js & NPM (for Vite; optional if using CDN assets only)
- MySQL / PostgreSQL / SQLite

## Installation

1. **Clone and install**
   ```bash
   git clone <repository-url>
   cd LuxSecure_P
   composer install
   npm install   # optional, for Vite
   ```

2. **Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Set `APP_URL`, `DB_*`, and optionally `MAIL_*` in `.env`.

3. **Database and storage**
   ```bash
   php artisan migrate
   php artisan storage:link
   php artisan db:seed
   ```
   Seeder creates admin user `admin@luxsecure.com` / `password` and sample properties.

4. **Run**
   ```bash
   php artisan serve
   ```
   Open `http://localhost:8000`. Login as admin to access `/admin`.

## Usage

- **Home**: `/` — featured properties (from DB or fallback placeholders)
- **Properties**: `/properties` — search, filter, paginate; click for detail and “Contact Agent”
- **Contact**: `/contact` — submit inquiry (saved in DB; optional admin email)
- **Register**: `/register` — name, email, optional phone, password; verification email sent
- **Login**: `/login` — after login, unverified users are sent to email verification notice
- **Profile**: `/profile` — view/edit profile, view saved properties, quick actions
- **Admin**: `/admin` — dashboard, properties CRUD, inquiries (admin user only)

## API

- `GET /api/properties` — List active properties. Query: `search`, `type`, `price_min`, `price_max`, `per_page` (max 50)
- `GET /api/user` — Current user (requires `Authorization: Bearer {token}` via Sanctum)
- `GET /api/properties/favorites` — Authenticated user’s favorite properties (Sanctum)

## Testing

```bash
php artisan test
```

Includes basic tests for registration, login, property listing, and API.

## Deployment

- Point document root to `public/`
- Run `php artisan migrate --force`, `php artisan storage:link`, `php artisan config:cache`
- Set `APP_ENV=production`, `APP_DEBUG=false`, strong `APP_KEY`
- Configure queue worker if using queued mail/jobs

## License

MIT.

---

*LuxSecure — Developed by Nexora Labs*
