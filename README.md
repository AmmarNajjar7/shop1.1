# Laravel Barbershop Booking Platform

## Introduction

This project is a web-based application developed using the Laravel framework. 

## Key Features

| Module         | Description                                                                |
| -------------- | -------------------------------------------------------------------------- |
| Authentication | Secure login and registration system with role-based access (admin, user). |
| Services       | Manage services, including name, duration, and price.                      |
| Barbers        | Manage barber profiles, including bio and availability.                    |
| Bookings       | Book services, manage time slots, and prevent booking conflicts.           |
| News           | Create and manage news articles related to the barbershop.                 |
| FAQs           | Frequently Asked Questions categorized for easy navigation.                |
| Comments       | Users can comment on news articles.                                        |
| Contact Form   | Simple contact form storing entries in the database.                       |

## Technologies Used

* **Laravel 11**
* **PHP 8.2+**
* **MySQL**
* **Blade (Laravel templating engine)**
* **Tailwind CSS**

## Folder Structure Overview

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

## Setup Instructions

### 1. Requirements

* PHP ≥ 8.1
* Composer
* MySQL database
* Node.js & npm

### 2. Installation Steps

```bash
# Clone repository
$ git clone https://github.com/<your-user>/shop1.1.git
$ cd shop1.1

# Install PHP dependencies
$ composer install

# Create environment file and generate key
$ cp .env.example .env
$ php artisan key:generate
```

### 3. Database Configuration

Edit the `.env` file and update database credentials:

```
DB_DATABASE=shop11
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Run Migrations and Seeders

```bash
$ php artisan migrate --seed
```

Seeders include:

* BarberSeeder
* BookingSeeder
* ServiceSeeder
* NewsSeeder
* FAQSeeder

### 5. Build Frontend Assets

```bash
$ npm install
$ npm run build
```

### 6. Launch Application

```bash
$ php artisan serve
```

Visit: `http://localhost:8000`

## User Roles and Access

| Role  | Description                                                 |
| ----- | ----------------------------------------------------------- |
| Admin | Full access to manage users, services, barbers, and posts.  |
| User  | Can browse services, book appointments, and leave comments. |


> Created by Ammar Najjar
