# 💈 Laravel Barbershop Platform

## 📘 Introduction

The Laravel Barbershop Platform is a modern web application built with the Laravel framework. It allows barbershops to manage bookings, services, and barbers while offering customers a seamless experience to book appointments, read news, and interact through comments and FAQs. The system supports role-based access control for admins and users.

---

## 🔑 Key Features

| Module         | Description                                                                |
| -------------- | -------------------------------------------------------------------------- |
| Authentication | Secure login and registration with role-based access (admin, user).        |
| Services       | Manage barbershop services (name, duration, price).                         |
| Barbers        | Maintain barber profiles including bio and availability.                   |
| Bookings       | Book services with time slot management and conflict prevention.            |
| News           | Create and manage news/blog articles related to the barbershop.             |
| FAQs           | Frequently Asked Questions organized by category.                          |
| Contact Form   | Simple contact form that stores messages in the database.                  |

---

## 🧰 Technologies Used

- **Laravel 11**
- **PHP 8.2+**
- **MySQL**
- **Blade (Laravel templating engine)**
- **Tailwind CSS**
- **Node.js & npm**

---

## 📂 Folder Structure

```
resources/views/
├── admin/          → Admin dashboards and panels
├── auth/           → Authentication views
├── components/     → Reusable Blade components
├── faqs/           → FAQ interface
├── layouts/        → Main layout structure
├── news/           → News article views
├── profile/        → User profile section
├── user/           → Standard user views

/database
├── migrations/     → Database table definitions
├── seeders/        → Seeder files for demo content
```

---

## 🚀 Installation & Setup

### 1. Requirements

- PHP ≥ 8.2
- Composer
- MySQL/MariaDB
- Node.js & npm

### 2. Clone and Install

```bash
git clone https://github.com/<your-user>/shop1.1.git
cd shop1.1
composer install
cp .env.example .env
php artisan key:generate
```

### 3. Configure Database

Update your `.env` file:

```dotenv
DB_DATABASE=shop11
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Migrate and Seed Database

```bash
php artisan migrate --seed
```

Seeders included:

- `BarberSeeder`
- `BookingSeeder`
- `ServiceSeeder`
- `NewsSeeder`
- `FAQSeeder`

### 5. Build Frontend Assets

```bash
npm install
npm run build
```

### 6. Serve Locally

```bash
php artisan serve
```

Visit: [http://localhost:8000](http://localhost:8000)

---

## 👥 User Roles

| Role  | Access Rights                                                              |
| ----- | -------------------------------------------------------------------------- |
| Admin | Full access to manage services, barbers, users, bookings, and content.     |
| User  | Can view services, book appointments, comment on articles, and read FAQs.  |

---

## 📚 Learning Resources

### Claude.ai Discussion

- 🤖 AI : [claude.ai/share/0d128d73-d48b-4899-9f44-0e74b53e978d](https://claude.ai/share/0d128d73-d48b-4899-9f44-0e74b53e978d)

### 🎥 Laravel Tutorials

1. Laravel PHP Framework Tutorial - Full Course for Beginners (2019)  
   [📺 Watch on YouTube](https://www.youtube.com/watch?v=XAwQUUr1obM)

2. Laravel 11 Tutorial for Beginners - Laravel Crash Course (2024)  
   [📺 Watch on YouTube](https://www.youtube.com/watch?v=AB8CvQgcMe8)

3. Full Laravel Beginner Course (starts at timestamp)  
   [📺 Watch on YouTube](https://www.youtube.com/watch?v=ImtZ5yENzgE&t=9468s)

---

## 👨‍💻 Author

**Ammar Najjar**  
Laravel Developer | Erasmus High School  
*Proudly built with 💻 and ☕*

---
