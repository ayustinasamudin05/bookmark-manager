# Bookmark Manager

A web-based application for managing and organizing bookmarks in one place. Users can save useful links, organize them into categories, mark favorite bookmarks, and quickly find saved resources.

## Features

- **User Authentication** – Register, log in, and log out securely.
- **Bookmark Management** – Create, view, edit, and delete bookmarks.
- **Category Management** – Organize bookmarks into categories.
- **Favorites** – Mark and access favorite bookmarks.
- **Search and Filtering** – Find bookmarks more easily.
- **User Data Isolation** – Each user can only access their own bookmarks and categories.

## Tech Stack

- **Backend:** PHP, Laravel 13
- **Database:** MySQL / MariaDB
- **Frontend:** Blade, Bootstrap 5, JavaScript
- **Build Tool:** Vite
- **Development Environment:** XAMPP

## Application Screenshots

Screenshots will be added here to demonstrate the application's interface and main features.

<!-- Add screenshots here -->

## Requirements

- PHP >= 8.4.1
- Composer
- Node.js and npm
- MySQL or MariaDB

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/ayustinasamudin05/bookmark-manager.git
   cd bookmark-manager
   ```

2. Install PHP dependencies:

   ```bash
   composer install
   ```

3. Install frontend dependencies:

   ```bash
   npm install
   ```

4. Create your environment file:

   ```bash
   copy .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Configure your database credentials in the `.env` file.

7. Create the database, then run migrations:

   ```bash
   php artisan migrate
   ```

8. Build frontend assets:

   ```bash
   npm run build
   ```

9. Start the Laravel development server:

   ```bash
   php artisan serve
   ```

10. Open the application:

    http://127.0.0.1:8000/login

## Project Status

This project is currently developed and tested in a local environment. A public live demo is not available yet.

## Author

**Ayustina Samudin**

- GitHub: [@ayustinasamudin05](https://github.com/ayustinasamudin05)