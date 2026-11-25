# 🔖 Bookmark Manager

A web-based application to save, organize, and manage website bookmarks in one place.

Built as a portfolio project to demonstrate web application development using **Laravel, PHP, MySQL, and Bootstrap 5**.

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 13">
  <img src="https://img.shields.io/badge/PHP-8.4%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap 5">
</p>

---

## 📌 Project Overview

Bookmark Manager helps users store and organize website links efficiently. Users can manage their bookmarks, group them into categories, mark important links as favorites, and quickly find saved links through search and filtering.

The application includes user authentication and data isolation, ensuring that each user can only access and manage their own bookmarks and categories.

## ✨ Key Features

| Feature | Description |
|---|---|
| 🔐 User Authentication | User registration and login |
| 📊 Dashboard | Overview of bookmark information |
| 🔖 Bookmark Management | Create, view, edit, and delete bookmarks |
| 📁 Category Management | Organize bookmarks into categories |
| ⭐ Favorites | Mark and manage favorite bookmarks |
| 🔎 Search & Filter | Find bookmarks more easily |
| 👤 User Data Isolation | Keep each user's data separate |

## 🛠️ Tech Stack

- **Backend:** PHP, Laravel 13
- **Frontend:** Blade, Bootstrap 5, JavaScript
- **Database:** MySQL / MariaDB
- **Build Tool:** Vite
- **Development Tools:** Visual Studio Code, Composer, npm, Git

## 📸 Application Preview

> Screenshots will be added below to demonstrate the application's interface and main features.

| Login | Dashboard |
|---|---|
| *Coming soon* | *Coming soon* |

| Bookmark Management | Category Management |
|---|---|
| *Coming soon* | *Coming soon* |

## ⚙️ Installation & Setup

### Prerequisites

Make sure you have installed:

- PHP >= 8.4.1
- Composer
- Node.js and npm
- MySQL or MariaDB

### 1. Clone the Repository

```bash
git clone https://github.com/ayustinasamudin05/bookmark-manager.git
cd bookmark-manager
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Configure Environment

Copy the example environment file:

```bash
copy .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 4. Configure Database

Create a database in MySQL, then update the database configuration in your `.env` file:

```env
DB_DATABASE=bookmark_manager
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Database Migrations

```bash
php artisan migrate
```

### 6. Build Frontend Assets

```bash
npm run build
```

### 7. Run the Application

```bash
php artisan serve
```

Open the application in your browser:

```text
http://127.0.0.1:8000
```

## 📂 Project Structure

```text
bookmark-manager/
├── app/
│   ├── Http/Controllers/
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
│   └── web.php
├── public/
├── tests/
├── .env.example
├── artisan
├── composer.json
└── README.md
```

## 🎯 Project Objectives

This project demonstrates practical experience in:

- Developing a web application using Laravel.
- Implementing authentication and user-specific data access.
- Designing and managing relational databases.
- Building CRUD functionality.
- Organizing application features using the MVC architecture.
- Integrating frontend components with backend functionality.

## 🚧 Project Status

**Development completed for the current portfolio version.**

This repository contains the application source code and setup instructions. A live demo is not currently available.

## 👩‍💻 Author

**Ayustina Samudin**

Informatics Engineering Graduate | Aspiring Web Programmer

- GitHub: [@ayustinasamudin05](https://github.com/ayustinasamudin05)
- LinkedIn: [ayustina-samudin](https://www.linkedin.com/in/ayustina-samudin/)

---

<p align="center">
  <i>Built as part of my web development portfolio.</i>
</p>
