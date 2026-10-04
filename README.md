# TechZone - Computer Accessories E-Commerce

A Laravel-based e-commerce website for selling computer accessories (keyboards, mice, headsets, monitors, and storage). Features both a public storefront for customers and an admin panel for managing products.

## Features

### Customer (User)
- Browse products by category
- View product details
- Homepage with categorized product listings
- Responsive design with Bootstrap 5

### Admin
- Dashboard
- Add, edit, and delete products
- Manage keyboard, mouse, headset, monitor, and storage categories
- Upload product images

## Tech Stack

- Laravel (PHP Framework)
- MySQL / SQLite
- Bootstrap 5 + Bootstrap Icons
- Blade Templates

## Getting Started

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure database
4. Run `php artisan key:generate`
5. Run `php artisan migrate --seed` (if seeders available)
6. Run `php artisan serve`
7. Open `http://127.0.0.1:8000`

## Project Structure

- `resources/views/user/` - Public storefront
- `resources/views/admin/` - Admin panel
- `app/Http/Controllers/` - Application logic
- `routes/web.php` - Web routes

## Author

Chrismastian Lolo Allo
