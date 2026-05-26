## ⚙️ Prerequisites (Before running the project)

Before starting the project, make sure you have the following installed:

- PHP (>= 8.1 recommended)
- Composer
- SQLite support enabled in PHP

---

## 📦 Project setup

### 1. Install dependencies

```bash
composer install
```
2. Configure environment

Copy the example environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```bash

3. Database setup (SQLite)

Create the SQLite database file:

touch database/database.sqlite

Then update your .env file with:
```bash
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

4. Run migrations

```bash
php artisan migrate
```

🚀 Run the Project

Start the Laravel development server:

```bash
php artisan serve
```

Then open your browser at:

```
http://127.0.0.1:8000
```
