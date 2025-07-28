# ✅ Laravel Starter Template

A ready-to-use **Laravel Starter Template** with authentication, role-based access, and a clean architecture to help you kickstart any Laravel API project.

---

## 📁 Features

- 🔒 Authentication (Register, Login, Logout) using Laravel Sanctum
- 🎭 Role-Based Access Control via custom middleware
- 🧼 Clean service layer to separate business logic
- ✅ Request validation with custom messages
- 📦 Structured API responses using a helper class
- 🔄 Resource transformation for API data

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/mohamedabdallah11/Laravel-starter-template.git
cd laravel-starter-template
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Copy `.env` File

```bash
cp .env.example .env
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Configure Your `.env`

Update your database credentials in `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Run Migrations

```bash
php artisan migrate
```

### 7. Serve the Application

```bash
php artisan serve
```

---

## 🛠️ API Endpoints

| Method | Endpoint             | Middleware      | Description           |
|--------|----------------------|------------------|------------------------|
| POST   | `/api/auth/register` | -                | Register a new user   |
| POST   | `/api/auth/login`    | -                | Login and get token   |
| POST   | `/api/auth/logout`   | `auth:sanctum`   | Logout and revoke token |

---

## 🔐 Role-Based Access

You can protect routes by role using the custom `checkUserRole` middleware:

```php
Route::middleware(['auth:sanctum', 'checkUserRole:admin,parent'])->group(function () {
    // protected routes
});
```

---

## 🧾 Example Request: Register

```http
POST /api/auth/register
Content-Type: application/json

{
  "name": "mohamedAbdallah",
  "email": "mohamedAbdallah@example.com",
  "password": "password",
  "password_confirmation": "password",
  "role": "parent",
  "gender": "male",
  "birthdate": "2002-01-01"
}
```

---

## 📂 Project Structure (Highlights)

```
app/
├── Http/
│   ├── Controllers/Api/Authentication/AuthController.php
│   ├── Middleware/CheckUserRole.php
│   ├── Requests/LoginRequest.php
│   ├── Requests/RegisterRequest.php
│   └── Resources/UserResource.php
├── Services/Concrete/AuthService.php
├── Helpers/ApiResponse.php
```

---

## 🧰 Built With

- Laravel 10+
- PHP 8.1+
- Laravel Sanctum
- MySQL

---


## 🤝 Contributing

Feel free to fork the repo, suggest new features, or open a pull request. Contributions are welcome!
