# ✈️ Aviation Ticketing Platform

A full-stack web application for airline ticket booking and flight management, developed with Laravel. The project provides a complete booking workflow, from flight search to reservation management, while demonstrating modern web development practices.

## ✨ Features

- User authentication 
- Flight search and ticket booking
- Reservation management
- Administrative dashboard
- SQLite database integration
- MVC architecture with Laravel

## 🛠️ Tech Stack

- PHP 8
- Laravel
- SQLite
- HTML5
- CSS3
- Bootstrap

---

## ⚙️ Prerequisites (Before running the project)

Before starting the project, make sure you have the following installed:

- PHP (>= 8.1 recommended)
- Composer
- SQLite support enabled in PHP

---

## 📦 Project setup

### 1. Create environment file

```bash
cp .env.example .env
```

### 2. Install dependencies

```bash
composer install
```
### 3. Generate application key:

```bash
php artisan key:generate
```

### 4. Run migrations

```bash
php artisan migrate
```

### 5. Start the Laravel development server

```bash
php artisan serve
```

### 6. Then open your browser at

```
http://127.0.0.1:8000
```
