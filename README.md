# 🏛️ Fragrances Mahta — Luxury E-Commerce Platform

<p align="center">
  <strong>An exquisite, minimalist e-commerce web application built for luxury perfumes and premium personal care products.</strong>
</p>

---

## 🌟 Overview

**Fragrances Mahta** is a modern, responsive, and performance-optimized e-commerce application powered by **Laravel 13** and **PHP 8.5**. Designed with a minimalist aesthetic, it provides customers with a frictionless, high-end shopping experience featuring a reactive multi-product shopping cart, transparent free delivery messaging, and a streamlined Cash-on-Delivery (COD) checkout system.

Live Production Environment: **[https://fragrances-mahta.vercel.app/](https://fragrances-mahta.vercel.app/)**

---

## ✨ Key Features

### 🛍️ Customer Experience & UI/UX
- **Sophisticated Minimalist Theme:** Clean navy, white, and royal blue palette engineered for superior readability, modern typography, and luxury positioning.
- **Dynamic Multi-Product Cart:** Reactive client-side JavaScript cart system that persists across sessions via `localStorage`. Supports stacking multiple unique products, real-time total calculations, intuitive quantity adjustment (`+` / `-`), and individual item removal.
- **Frictionless Checkout Modal:** No mandatory account creation required. Customers can purchase immediately via *"Acheter maintenant"* directly on product pages or submit their entire grouped cart in one click.
- **Clean Free Delivery & COD Integration:** Subtle, brand-aligned indicators emphasizing **100% Free Shipping** and safe payment upon receipt (Cash on Delivery).
- **Interactive Celebration Modal:** Upon order validation, users are greeted with a sleek, animated confirmation interface designed to build confidence and outline next delivery steps.
- **Social Media Connectivity:** Embedded direct links to brand ecosystems on **Instagram** ([@nabil.mahta](https://www.instagram.com/nabil.mahta)), **Facebook**, and **TikTok** ([@mahta.fragrances](https://www.tiktok.com/@mahta.fragrances)).

### ⚡ Technical Capabilities & Performance
- **Optimized PostgreSQL Database Layer:** Built to support strict type-casting and lightning-fast query execution on serverless platforms for product catalogs and custom filters (`?collection=yahya`, `?collection=soins-capillaires`).
- **Secure Administrative Dashboard:** Protected back-office interface allowing administrators to inspect incoming orders, view individual product items within grouped customer purchases, track addresses and phone numbers, and update catalog offerings.
- **HTTPS & Serverless Ready:** Zero mixed-content security bottlenecks; configured natively for deployment on Vercel utilizing Serverless Functions (`api/index.php`).

---

## 🛠️ Technology Stack

| Component | Technology |
| :--- | :--- |
| **Backend Framework** | Laravel 13 (PHP 8.5.2) |
| **Database** | PostgreSQL |
| **Frontend Architecture** | Blade Templating, Vanilla CSS (Design System Tokens), Vanilla JavaScript (Stateful Cart) |
| **Hosting & CI/CD** | Vercel Serverless Platforms |
| **Asset Bundling** | Vite / Node 22+ |

---

## 🚀 Local Development & Setup

Follow these steps to configure and run the project in your local development environment:

### 1. Prerequisites
- **PHP** >= 8.3 (Tested on PHP 8.5.2)
- **Composer** >= 2.x
- **Node.js** >= 20.x & **NPM**
- **PostgreSQL** or local database instance

### 2. Installation
Clone the repository and install project dependencies:

```bash
git clone <your-repository-url>
cd enzo-cadamia

# Install backend PHP dependencies
composer install

# Install frontend Node dependencies & build assets
npm install
npm run build
```

### 3. Environment Configuration
Copy the sample environment file and generate your application key:

```bash
cp .env.example .env
php artisan key:generate
```

Configure your database connection in `.env`:
```ini
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Database Migrations & Seeding
Run migrations to generate tables for Products, Orders, and Order Items:

```bash
php artisan migrate --seed
```

### 5. Launch Local Server
Start the Laravel development server alongside Vite (if developing frontend modules):

```bash
# Terminal 1: Laravel Server
php artisan serve

# Terminal 2 (Optional): Hot Reloading for JS/CSS
npm run dev
```

Visit `http://localhost:8000` in your browser to inspect the site.

---

## ☁️ Deployment on Vercel

This repository is natively formatted for seamless serverless builds on **Vercel**:
1. Connect the git repository to your Vercel Dashboard.
2. Ensure Vercel environment variables map correctly to your cloud PostgreSQL instance (e.g., Vercel Postgres, Supabase, Neon).
3. Deploy directly via terminal or push to the main git branch:

```bash
vercel --prod --yes
```

---

## 📄 License

This software and project structure are proprietary to **Fragrances Mahta**. All rights reserved.
