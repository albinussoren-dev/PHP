MY WEBSITE - PHP VIDEO + PDF UPLOAD

Requirements:
- PHP 8+
- MySQL/MariaDB
- Apache/XAMPP/LAMP

Setup:
1. Copy the my-website folder into htdocs (XAMPP) or your web root.
2. Create/import the database using database.sql in phpMyAdmin.
3. Check MySQL credentials in config.php.
4. Make sure uploads/videos and uploads/pdfs are writable.
5. Open:
   http://localhost/my-website/

Admin:
http://localhost/my-website/admin.php

NOTE:
This is a starter CMS. Before production use, add admin authentication,
CSRF protection, stronger MIME validation, rate limiting, and file access controls.
