# Nabhovid Website v4

Static HTML/CSS/JS Salesforce services website with root-level pages (no `/pages/` in URLs), plus a PHP/MySQL contact form for Hostinger.

## Folder structure

- `index.html` — homepage
- Root-level `.html` files — all website pages
- `assets/` — CSS, JS and SVG
- `api/contact-submit.php` — saves contact enquiries into MySQL
- `api/config.php` — Hostinger database credentials (fill these in)
- `database/contact_submissions.sql` — table creation script
- `.htaccess` — HTTPS/www canonicalization and clean URL support

## Hostinger setup

1. Create a MySQL database and database user in Hostinger.
2. Open phpMyAdmin and run `database/contact_submissions.sql`.
3. Edit `api/config.php` with the database name, user and password.
4. Upload the *contents* of this folder into `public_html` (not the outer folder).
5. Visit `https://www.nabhovid.com/contact` and submit a test enquiry.
6. View saved enquiries in phpMyAdmin → your database → `contact_submissions`.

Do not put the real database password into public GitHub or other public repositories.

## URLs

The site supports clean URLs such as `/salesforce`, `/solutions`, `/contact`, etc. The underlying `.html` files remain at the web root for simple Hostinger deployment.
