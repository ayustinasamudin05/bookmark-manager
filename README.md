# 🔖 Bookmark Manager

<p align="center">
  <img width="100%" alt="Bookmark Manager Dashboard" src="https://github.com/user-attachments/assets/0aefbd3a-9f5e-4f0f-b783-8711e49733ad" />
</p>

<p align="center">
  A web-based application to save, organize, and manage website bookmarks in one place.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 13" />
  <img src="https://img.shields.io/badge/PHP-8.4%2B-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP" />
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" />
  <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap 5" />
</p>

---

## 📌 Overview

Bookmark Manager is a web application designed to help users save, organize, and manage website links efficiently.

Users can create bookmarks, organize them into categories, mark important links as favorites, and find saved links through search and filtering.

The application implements user authentication and user-specific data access to ensure that each user can only manage their own bookmarks and categories.

## ✨ Features

| Feature | Description |
|---|---|
| 🔐 Authentication | User registration and login |
| 📊 Dashboard | Overview of bookmark statistics |
| 🔖 Bookmark Management | Create, view, edit, and delete bookmarks |
| 📁 Category Management | Organize bookmarks into categories |
| ⭐ Favorites | Mark and manage favorite bookmarks |
| 🔎 Search & Filter | Search and filter saved bookmarks |
| 👤 Data Isolation | Ensure users can only access their own data |

## 🛠️ Technology Stack

| Category | Technologies |
|---|---|
| Backend | PHP, Laravel 13 |
| Frontend | Blade, Bootstrap 5, JavaScript |
| Database | MySQL / MariaDB |
| Asset Bundling | Vite |
| Development Tools | Visual Studio Code, Composer, npm, Git |

## 📸 Application Screenshots

### 1. Login Page

<p align="center">
  <img width="100%" alt="Bookmark Manager Login Page" src="https://github.com/user-attachments/assets/028900ef-e036-4fd0-8455-0c4c7c38c7b5" />
</p>

### 2. Dashboard

<p align="center">
  <img width="100%" alt="Bookmark Manager Dashboard" src="https://github.com/user-attachments/assets/f66492f0-249a-4225-a92e-b0615a70875a" />
</p>

### 3. Bookmark Management

<p align="center">
  <img width="100%" alt="Bookmark Management Page" src="https://github.com/user-attachments/assets/5ef149cf-3f8f-49a4-b2db-d8e804c7e777" />
</p>

### 4. Category Management

<p align="center">
  <img width="100%" alt="Category Management Page" src="https://github.com/user-attachments/assets/2bf51fce-834f-4e7f-b301-3385ee5a1056" />
</p>

## ⚙️ Installation & Setup

### Prerequisites

Make sure the following tools are installed:

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

Create your environment configuration file:

```bash
copy .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 4. Configure the Database

Create a database named `bookmark_manager` in MySQL or MariaDB.

Update the database configuration in your `.env` file:

```env
DB_DATABASE=bookmark_manager
DB_USERNAME=root
DB_PASSWORD=
```

Adjust the credentials according to your local database configuration.

### 5. Run Database Migrations

```bash
php artisan migrate
```

### 6. Build Frontend Assets

```bash
npm run build
```

### 7. Start the Application

```bash
php artisan serve
```

Open the application at:

```text
http://127.0.0.1:8000
```

## 📂 Project Structure

```text
bookmark-manager/
├── app/
│   ├── Http/
│   │   └── Controllers/
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

## 🎯 Technical Highlights

This project demonstrates practical experience in:

- Building web applications using the Laravel framework.
- Implementing authentication and user-specific data access.
- Developing CRUD operations for bookmarks and categories.
- Designing and managing relational databases.
- Applying the MVC (Model-View-Controller) architecture.
- Integrating frontend interfaces with backend functionality.

## 🚧 Project Status

**Completed – Portfolio Version**

The source code and installation instructions are available in this repository. The application currently runs locally; a live demo is not available.

## 👩‍💻 Author

**Ayustina Samudin**

Informatics Engineering Graduate | Aspiring Web Programmer

- GitHub: [@ayustinasamudin05](https://github.com/ayustinasamudin05)
- LinkedIn: [Ayustina Samudin](https://www.linkedin.com/in/ayustina-samudin/)

---

<p align="center">
  <i>Developed as part of my web development portfolio.</i>
</p>
