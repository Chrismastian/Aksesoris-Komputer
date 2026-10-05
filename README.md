# TechZone — Computer Accessories Store

A Laravel e-commerce application for computer accessories, with a public storefront and an admin panel.

![Laravel](https://img.shields.io/badge/Laravel-10.50-FF2D20) ![PHP](https://img.shields.io/badge/PHP-8.1-777BB4) ![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1) ![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3)

## Features

**Storefront**
- Homepage with featured products per category
- Category listings with search (`/produk/keyboard`, `/produk/mouse`, …)
- Product detail pages with related items
- Session-based cart: add, update quantity, remove, clear
- Checkout with server-side validation
- Order confirmation page with a generated order code

**Admin**
- Dashboard: pending orders, revenue from paid/shipped orders, recent orders
- Order management with status workflow (pending → paid → shipped / cancelled)
- Product CRUD for all five categories

## Tech stack

| Layer | Choice |
|---|---|
| Framework | Laravel 10.50 |
| Language | PHP 8.1 |
| Database | MySQL 8 (SQLite in-memory for tests) |
| Front-end | Bootstrap 5.3, Bootstrap Icons, SBAdmin template |
| Tests | PHPUnit + Laravel test helpers |

## Getting started

```bash
composer install
cp .env.example .env
php artisan key:generate
# set DB_DATABASE in .env, then:
php artisan migrate --seed
php artisan serve
```

Open http://127.0.0.1:8000. Admin panel is at `/admin`.

## Tests

```bash
php artisan test
```

The suite runs against an in-memory SQLite database configured in `.env.testing`, so it never touches your development data.

## Design decisions

**Prices are re-read from the database at checkout.** The session cart stores a price for display, but the client can modify session state. `CheckoutController` re-fetches every product and computes the total from the current database values. `tests/Feature/CheckoutPriceTest.php` proves this: it sets a cart price of 1 and asserts the order still records 250000.

**Category logic lives in one place.** `app/Support/CategoryMap.php` maps the five category slugs to their models and labels. The routes, controllers, and admin route loop all read from it, so adding a sixth category means editing one file rather than three. This replaced five near-identical controller methods and thirty hand-written admin routes.

**Order items store `category` alongside `product_id`.** Products live in five separate tables, so a single foreign key cannot point at all of them. The pair `(category, product_id)` identifies a product, and the order item also snapshots `nama` and `harga` so a later price change does not rewrite order history.

**The order code is generated in the model.** `Order::booted()` assigns `TZ-XXXXXXXX` on creation, so no controller or seeder can create an order without one.

**Five product tables, one model shape.** The categories were separate tables by design, so each model declares the same three fillable columns rather than sharing a base class — five short classes beat an inheritance layer for this.

**The five product tables are now created by a migration.** They previously existed only inside the MySQL server, which meant a fresh clone had no schema at all. Migration `2026_06_01_000000_create_product_tables.php` fixes that and replaces the five `add_timestamps` migrations it supersedes.

## Known limitations

- The admin panel has no authentication. Every `/admin` route is publicly reachable — add Laravel Sanctum or Breeze before this goes anywhere near production.
- Stock is not decremented on checkout; orders record what was ordered but nothing prevents overselling.
- Checkout collects no payment. Orders stay `pending` until an admin marks them paid.

## What I would build next

- Authentication on the admin routes (Sanctum or Breeze)
- Stock decrement inside the checkout transaction, guarded against overselling
- Product image upload with validation, replacing the current filename-in-DB approach
- Customer-facing order tracking by email

## Author

Chrismastian Lolo Allo — Information Technology student, Universitas Kristen Indonesia Toraja.
