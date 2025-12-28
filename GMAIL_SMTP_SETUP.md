# Hướng Dẫn Cấu Hình Gmail SMTP cho Laravel

## Vấn đề
Gmail không còn cho phép sử dụng mật khẩu thông thường để đăng nhập SMTP. Bạn cần sử dụng **App Password** (Mật khẩu ứng dụng).

## Các bước cấu hình:

### Bước 1: Bật 2-Step Verification (Xác thực 2 bước)
1. Truy cập: https://myaccount.google.com/security
2. Tìm phần "2-Step Verification" và bật nó (nếu chưa bật)
3. Làm theo hướng dẫn để thiết lập xác thực 2 bước

### Bước 2: Tạo App Password (Mật khẩu ứng dụng)
1. Sau khi bật 2-Step Verification, truy cập: https://myaccount.google.com/apppasswords
2. Hoặc vào: Security → 2-Step Verification → App passwords
3. Chọn:
   - **App**: Mail
   - **Device**: Other (Custom name) → Nhập tên: "Laravel App"
4. Click "Generate"
5. **Copy mật khẩu 16 ký tự** (ví dụ: `abcd efgh ijkl mnop`)
   - ⚠️ **LƯU Ý**: Chỉ hiển thị 1 lần, hãy copy ngay!

### Bước 3: Cập nhật file .env
Thêm/cập nhật các dòng sau trong file `.env` của bạn:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=phamtrungnghia15082003@gmail.com
MAIL_PASSWORD=abcd efgh ijkl mnop
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=phamtrungnghia15082003@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

**Lưu ý quan trọng:**
- `MAIL_PASSWORD`: Dán mật khẩu App Password 16 ký tự (có thể có khoảng trắng, Laravel sẽ tự xử lý)
- `MAIL_PORT`: 587 cho TLS hoặc 465 cho SSL
- `MAIL_ENCRYPTION`: `tls` cho port 587, hoặc `ssl` cho port 465

### Bước 4: Xóa cache cấu hình
Sau khi cập nhật `.env`, chạy lệnh:

```bash
php artisan config:clear
php artisan cache:clear
```

### Bước 5: Test gửi email
Bạn có thể test bằng cách đặt hàng hoặc sử dụng route test (nếu có).

## Troubleshooting (Xử lý lỗi)

### Lỗi "535 Username and Password not accepted"
- ✅ Đảm bảo đã bật 2-Step Verification
- ✅ Sử dụng App Password, KHÔNG dùng mật khẩu Gmail thông thường
- ✅ Copy đúng App Password (16 ký tự)
- ✅ Không có khoảng trắng thừa trong `.env`

### Lỗi "Connection timeout"
- ✅ Kiểm tra firewall/antivirus có chặn port 587/465 không
- ✅ Thử đổi port: 587 (TLS) hoặc 465 (SSL)
- ✅ Thử đổi encryption: `tls` hoặc `ssl`

### Vẫn không được?
1. Kiểm tra lại App Password đã tạo đúng chưa
2. Xóa App Password cũ và tạo lại
3. Đảm bảo không có khoảng trắng thừa trong `.env`
4. Chạy `php artisan config:clear` sau khi sửa `.env`

## Cấu hình thay thế (nếu Gmail không được)

### Option 1: Mailtrap (Development)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
```

### Option 2: SendGrid / Mailgun (Production)
Sử dụng các dịch vụ email chuyên nghiệp cho production.

