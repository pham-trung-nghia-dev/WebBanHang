# 🛒 Web Bán Hàng - Hệ Thống E-Commerce Laravel

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![Redis](https://img.shields.io/badge/Redis-Caching-orange.svg)](https://redis.io)

## 📖 Giới Thiệu

Hệ thống thương mại điện tử hoàn chỉnh được xây dựng bằng Laravel. Dự án thể hiện kỹ năng full-stack development với các công nghệ hiện đại như Redis caching, Queue jobs, và payment gateway integration.

---

## ✨ Tính Năng Đầy Đủ

### 🎯 Frontend (Khách Hàng)

**Trang Chủ & Sản Phẩm:**
- ✅ Trang chủ với sản phẩm mới nhất (Redis cache)
- ✅ Danh mục sản phẩm đa cấp (parent-child)
- ✅ Quản lý thương hiệu
- ✅ Tìm kiếm sản phẩm với Redis caching (TTL 180s)
- ✅ Chi tiết sản phẩm (hình ảnh, mô tả, giá)
- ✅ Lọc sản phẩm theo danh mục/thương hiệu

**Giỏ Hàng & Thanh Toán:**
- ✅ Giỏ hàng với cập nhật số lượng real-time
- ✅ Đăng ký/Đăng nhập/Đăng xuất khách hàng
- ✅ Thanh toán đa dạng: COD, MoMo, ATM
- ✅ Lịch sử đặt hàng
- ✅ Giao diện responsive (mobile/tablet/desktop)

### 🔧 Backend (Admin)

**Quản Lý:**
- ✅ Dashboard tổng quan
- ✅ CRUD sản phẩm (thêm/sửa/xóa, upload ảnh, kích hoạt/vô hiệu hóa)
- ✅ CRUD danh mục (phân cấp cha-con)
- ✅ CRUD thương hiệu
- ✅ Quản lý đơn hàng (xem danh sách, chi tiết, xóa)
- ✅ Email log system
- ✅ Authentication & Session management

### 🚀 Tính Năng Kỹ Thuật

**Performance:**
- ✅ Redis caching (sản phẩm, tìm kiếm, session)
- ✅ Query optimization
- ✅ Lazy loading

**Email System:**
- ✅ Queue jobs (async email processing)
- ✅ Gmail SMTP integration
- ✅ Email templates (Blade)
- ✅ Email logging

**Security:**
- ✅ CSRF protection
- ✅ SQL injection prevention (Query Builder)
- ✅ XSS protection (Blade escaping)
- ✅ Session management (Redis)
- ✅ Input validation

**Database:**
- ✅ Migrations (version control)
- ✅ Seeders (sample data)
- ✅ 9 bảng chính (normalized design)

---

## 🛠️ Công Nghệ Sử Dụng

**Backend:**
- Laravel 12.x, PHP 8.2+, MySQL, Redis, Composer

**Frontend:**
- Blade Templates, Bootstrap, jQuery, Vite, Tailwind CSS 4.0

**Tools:**
- Laravel Tinker, Pint, Pail, PHPUnit, FakerPHP

**Integrations:**
- Gmail SMTP, MoMo Payment API

---

## 📁 Cấu Trúc Dự Án

```
WebBanHang/
├── app/Http/Controllers/     # 7 Controllers (Admin, Product, Cart, Checkout...)
├── app/Jobs/                  # Queue Jobs (SendOrderEmailJob)
├── app/Mail/                  # Mail Classes
├── database/migrations/       # 12+ Migrations
├── resources/views/           # Blade templates (admin, pages, emails)
├── routes/web.php            # 40+ Routes
└── public/upload/            # Product images
```

---

## 🗄️ Database

**9 Bảng Chính:**
- `tbl_category_product` - Danh mục (phân cấp)
- `tbl_brand` - Thương hiệu
- `tbl_product` - Sản phẩm
- `tbl_customer` - Khách hàng
- `tbl_shipping` - Vận chuyển
- `tbl_payment` - Thanh toán
- `tbl_order` - Đơn hàng
- `tbl_order_details` - Chi tiết đơn hàng
- `tbl_email_log` - Email log

---

## 🚀 Cài Đặt Nhanh

```bash
# 1. Clone & Install
git clone https://github.com/your-username/WebBanHang.git
cd WebBanHang
composer install
npm install

# 2. Config
cp .env.example .env
php artisan key:generate

# 3. Database
mysql -u root -p -e "CREATE DATABASE shopbanhang;"
php artisan migrate
# hoặc: mysql -u root -p shopbanhang < ShopBanHang.sql

# 4. Redis (đảm bảo Redis đang chạy)
# Cấu hình trong .env: REDIS_HOST=127.0.0.1, REDIS_PORT=6379

# 5. Mail (Gmail SMTP)
# Xem GMAIL_SMTP_SETUP.md

# 6. Run
php artisan storage:link
npm run dev
php artisan queue:work  # Terminal riêng
php artisan serve
```

---

## 📊 Thống Kê

- **Controllers:** 7
- **Routes:** 40+
- **Database Tables:** 9
- **Migrations:** 12+
- **Views:** 20+
- **Lines of Code:** ~5000+

---

## 🌟 Kỹ Năng Thể Hiện

- ✅ **Laravel Framework** (MVC, Routing, Middleware, Eloquent)
- ✅ **Redis** (Caching, Session, Queue)
- ✅ **MySQL** (Database Design, Relationships, Queries)
- ✅ **Queue Jobs** (Async Processing)
- ✅ **Email Integration** (SMTP, Templates)
- ✅ **Payment Gateway** (MoMo API)
- ✅ **Frontend** (Blade, Bootstrap, jQuery, Vite)
- ✅ **Security Best Practices**
- ✅ **Code Quality** (PSR standards, Laravel best practices)

---

## 🔮 Có Thể Mở Rộng

- Payment: VNPay, Stripe, Wallet
- Features: Reviews, Wishlist, Social Login, Order Tracking
- Admin: Analytics Dashboard, Inventory, Reports, Multi-role
- Technical: RESTful API, Real-time Notifications, Multi-language, Docker, CI/CD

---

## 👨‍💻 Tác Giả

**Phạm Trung Nghĩa**

Laravel Developer đam mê xây dựng ứng dụng web hiện đại.

**Liên hệ để trao đổi:**
- 📧 Email: phamtrungnghia15082003@gmail.com
