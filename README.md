# 🛍️ NexShop - Premium Multi-Vendor Marketplace

NexShop is a visually stunning, high-performance e-commerce platform built with **Laravel 12**, **Livewire 3**, and **Filament v3**. Developed to showcase advanced technical proficiency in the **TALL Stack**, this project features a premium glassmorphic UI, real-time interactivity, and robust enterprise-grade security.

![NexShop Preview](https://laraveldaily.com/uploads/2025/01/database-structure-min.png) <!-- Replace with your actual preview if available -->

---

## ⚡ Core Features

### 💎 Premium User Experience (Frontend)
- **Glassmorphic UI**: High-end dark theme designed for a modern, premium feel.
- **Real-time Search**: Instant product filtering with Livewire, including predicted results and debounced input.
- **Stay-Interactive Cart**: Add products to your cart without page reloads using Livewire events and real-time badge updates.
- **Toast Notifications**: Smooth, animated feedback for user actions.
- **Dynamic Dashboards**: Fully customized User Dashboard for profile management, order history, and activity tracking.

### 🛡️ Enterprise-Grade Security
- **Anti-Bot Math Challenge**: Custom-built math captcha for Login and Registration to prevent automated submissions.
- **Strict Security Headers**: Protection against XSS, Clickjacking (`X-Frame-Options`), and Content Sniffing.
- **Hardened Passwords**: Enforced policies requiring mixed-case letters, symbols, numbers, and "HaveIBeenPwned" data breach checks.
- **Policy-based Isolation**: Strict ownership checks ensuring users only access their own data.
- **Production HTTPS Enforcement**: Built-in logic to force secure connections in production environments.

### ⚙️ Back-office & Management
- **Filament v3 Admin Panel**: Professional administration suite for managing Products, Vendors, and global site settings.
- **Complex DB Schema**: 47+ migrations handling multi-vendor commissions, product variants, global shipments, and more.
- **Highly Seeded**: Comes with 20+ seeders to simulate a live marketplace with real-world data relationships.

---

## 🛠️ Technological Stack

- **Backend**: Laravel 12.x
- **Frontend**: Livewire 3 (Interactive Components)
- **Styling**: Tailwind CSS
- **Administration**: Filament v3
- **Authentication**: Laravel Breeze (Customized)
- **Database**: SQLite (Default) | Supports MySQL/PostgreSQL

---

## 🚀 Installation & Setup

1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   cd Laravel-Examples-Ecommerce-DB
   ```

2. **Install Dependencies**:
   ```bash
   composer install --ignore-platform-reqs
   npm install
   ```

3. **Environment Setup**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Initialization**:
   ```bash
   touch database/database.sqlite
   php artisan migrate:fresh --seed
   ```

5. **Run the Development Servers**:
   ```bash
   php artisan serve
   # In another terminal
   npm run dev
   ```

---

## 🔑 Access for Testing

- **Admin/User**: `test@example.com`
- **Password**: `password`
- **Admin Panel**: Accessible at `/admin` after login.

---

## 📂 Project Structure Decisions
1. **Separated Domains**: Routes are organized by role in `routes/public.php`, `routes/customer.php`, `routes/vendor.php`, and `routes/admin.php`.
2. **Strict Eloquent**: Models are configured to fail fast in development to catch N+1 queries and security leaks early.
3. **Reusable Layouts**: Architecture follows a unified layout system in `resources/views/layouts/app.blade.php`.

---

## 👨‍💻 Created to Impress
This project demonstrates proficiency in:
- **TALL Stack Development**
- **Security Engineering**
- **State Management with Livewire Events**
- **Customization of Filament Layouts & Resources**
- **Advanced DB Relationship Management**

---
*Developed for technical showcase purposes.*