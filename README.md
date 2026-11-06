# Emmanuel Mwangata — Premium Laravel Portfolio

A visually sophisticated, fully animated, multi-page personal portfolio website built with Laravel 11, Tailwind CSS, Alpine.js, and GSAP.

---

## Design System

**Colour Palette** (from Color Hunt)

| Token         | Hex       | Usage |
|---------------|-----------|-------|
| `--sand-100`  | `#ECEBDE` | Light text, highlights |
| `--sand-200`  | `#D7D3BF` | Body text |
| `--sand-300`  | `#C1BAA1` | Secondary text |
| `--sand-400`  | `#A59D84` | Accents, CTAs |
| `--obs`       | `#17161A` | Page background |
| `--obs-light` | `#1E1D22` | Card backgrounds |
| `--obs-mid`   | `#28272E` | Elevated surfaces |

**Typography**
- Display: Cormorant Garamond (serif editorial)
- Body: Inter (sans-serif)
- Code: JetBrains Mono (monospace)

---

## Tech Stack

| Layer        | Technology |
|-------------|-----------|
| Backend     | Laravel 11, PHP 8.2+ |
| Frontend    | Blade templates, Tailwind CSS 3, Alpine.js 3 |
| Animation   | GSAP 3 + ScrollTrigger |
| Database    | MySQL 8+ |
| Build tool  | Vite 5 |

---

## Pages

| URL               | Description |
|-------------------|-------------|
| `/`               | Home — hero, projects preview, services, CTA |
| `/about`          | About — story, philosophy, timeline |
| `/work`           | Projects index with category filter |
| `/work/{slug}`    | Project detail page |
| `/services`       | Services with expandable details |
| `/skills`         | Technical skills by category |
| `/experience`     | Career timeline |
| `/contact`        | Contact form with DB persistence |
| `/resume`         | CV download |
| `/privacy`        | Privacy policy |
| `/admin`          | Admin dashboard (protected) |
| `/admin/projects` | Project CRUD |
| `/admin/messages` | Contact message viewer |
| `/sitemap.xml`    | Auto-generated XML sitemap |

---

## Installation

### Prerequisites

- PHP 8.2+
- Composer
- Node.js 20+ and npm
- MySQL 8+

---

### Step 1 — Clone and install PHP dependencies

```bash
git clone <your-repo-url> portfolio
cd portfolio
composer install
```

### Step 2 — Environment configuration

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env`:

```env
APP_NAME="Emmanuel Mwangata | Portfolio"
APP_URL=http://localhost:8000

DB_DATABASE=portfolio_db
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

# Optional: email notifications
MAIL_MAILER=smtp
MAIL_HOST=smtp.yourprovider.com
MAIL_PORT=587
MAIL_USERNAME=your@email.com
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your@email.com
ADMIN_EMAIL=your@email.com
```

### Step 3 — Database setup

```bash
# Create the database in MySQL
mysql -u root -p -e "CREATE DATABASE portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# Run migrations
php artisan migrate

# Seed with sample data (creates admin user + 3 sample projects)
php artisan db:seed
```

**Default admin credentials** (change immediately after first login):
- Email: `futurist@example.com`
- Password: `change-this-password`

### Step 4 — Frontend assets

```bash
npm install
npm run build
# For development with hot reload:
npm run dev
```

### Step 5 — Storage link

```bash
php artisan storage:link
```

Create the CV directory:
```bash
mkdir -p storage/app/public/cv
```

### Step 6 — Serve

```bash
php artisan serve
```

Visit `http://localhost:8000`

---

## Customisation Guide

### Personal information

Update your details in these files:

| File | What to update |
|------|---------------|
| `resources/views/components/footer.blade.php` | Email, GitHub, LinkedIn URLs |
| `resources/views/components/mobile-menu.blade.php` | Social links |
| `resources/views/pages/about.blade.php` | Bio, education, timeline |
| `resources/views/pages/experience.blade.php` | Roles, responsibilities |
| `resources/views/pages/contact.blade.php` | Contact details |
| `.env` → `ADMIN_EMAIL` | Where contact notifications go |

### Add your CV

Upload your PDF through the admin dashboard at `/admin` → CV Upload section, or manually:

```bash
cp your-cv.pdf storage/app/public/cv/emmanuel-mwangata-cv.pdf
```

### Add projects

Option 1 — Admin panel: Visit `/admin/projects/create`

Option 2 — Seeder: Edit `database/seeders/DatabaseSeeder.php` and re-run:
```bash
php artisan db:seed
```

### Update social links

Search for `YOUR_GITHUB` and `YOUR_LINKEDIN` across the views and replace with your actual handles.

### Change colours

The design system lives in `resources/css/app.css` under `:root {}`. All colour tokens are defined there.

---

## Admin Panel

Access at `/admin/login`

**Features:**
- Secure login with rate limiting (5 attempts per 5 minutes)
- Project CRUD with image upload
- Contact message viewer with read/unread tracking
- CV upload
- Dashboard with stats

**Security:**
- Admin middleware protects all `/admin/*` routes
- CSRF protection on all forms
- Rate limiting on login and contact form
- Input validation and sanitisation

---

## Production Deployment

```bash
# Optimise for production
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build

# Set correct permissions
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

**Nginx config:**

```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/portfolio/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

---

## Project Structure

```
portfolio/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Admin panel controllers
│   │   │   ├── HomeController.php
│   │   │   ├── ProjectController.php
│   │   │   ├── ContactController.php
│   │   │   └── StaticPageController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── Project.php
│       ├── ContactMessage.php
│       └── User.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/app.css             # Design system + all styles
│   ├── js/app.js               # GSAP animations + Alpine.js
│   └── views/
│       ├── components/         # navbar, footer, mobile-menu
│       ├── layouts/            # app.blade.php, admin.blade.php
│       ├── pages/              # All public pages
│       ├── admin/              # Admin panel views
│       └── errors/             # 404 page
├── routes/web.php
├── tailwind.config.js
└── vite.config.js
```

---

## Features Implemented

- [x] Animated hero with GSAP text reveals
- [x] Code terminal illustration with stagger animation
- [x] Infinite technology ticker
- [x] Animated counter stats
- [x] Custom cursor with lag-ring (desktop)
- [x] Magnetic button effect
- [x] Scroll-triggered reveal animations
- [x] Project category filter (Alpine.js)
- [x] Interactive skill cards (hover expand)
- [x] Expandable service descriptions
- [x] Animated timeline (education + experience)
- [x] Mobile-first responsive design
- [x] Mobile slide-out navigation
- [x] Contact form with server-side validation
- [x] Rate limiting on contact form
- [x] Contact message database persistence
- [x] Email notification on new contact
- [x] Admin login with rate limiting
- [x] Project CRUD with image upload
- [x] Contact message viewer
- [x] CV download
- [x] CV upload via admin
- [x] XML sitemap
- [x] robots.txt
- [x] Custom 404 page
- [x] CSRF protection
- [x] Open Graph meta tags
- [x] Reduced motion support
- [x] Keyboard navigation
- [x] Focus states
- [x] Screen-reader semantic markup
- [x] Flash messages (auto-dismiss)

---

## Placeholders to Update

Before going live, replace these in the code:

| Placeholder | File | Replace with |
|-------------|------|-------------|
| `futurist@example.com` | Multiple views, .env.example | Your real email |
| `YOUR_GITHUB` | footer, mobile-menu | Your GitHub username |
| `YOUR_LINKEDIN` | footer, mobile-menu | Your LinkedIn handle |
| `[Your School Name]` | about.blade.php, experience.blade.php | Your actual school |
| `[Organisation Name]` | experience.blade.php | Your attachment organisation |
| `[Certification Name]` | experience.blade.php | Your actual certifications |
| `change-this-password` | DatabaseSeeder.php | Strong admin password |

---

## License

MIT — Emmanuel M. Mwangata
