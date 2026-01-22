<div align="center">
  <img src="https://cdn-icons-png.flaticon.com/512/3081/3081559.png" width="100" height="100" alt="SmartStore Logo">

  # 🚀 SmartStore v1.0
  ### **Advanced Full-Stack E-Commerce Engine**
  
  [![Laravel Version](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
  [![PHP Version](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php)](https://php.net)
  [![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

  **SmartStore** هو نظام متكامل يجمع بين القوة البرمجية الفائقة (Back-End) وجمال التصميم العصري (UX/UI). تم تطوير النظام ليكون تطبيقاً عملياً شاملاً لكل مفاهيم الـ Full-stack باستخدام Laravel.
</div>

---

## 💎 العرض البصري (Visual Showcase)

### 🖥️ لوحة الإدارة (Luxury Dark Mode)
<div align="center">
  <table border="0">
    <tr>
      <td><img src="https://github.com/user-attachments/assets/96e9a5cd-84c0-4b0a-a3a0-e097cc1cbc76" width="100%"></td>
      <td><img src="https://github.com/user-attachments/assets/3bd2f1e8-6d04-485a-adb4-1f5e627da5f4" width="100%"></td>
    </tr>
    <tr>
      <td><img src="https://github.com/user-attachments/assets/a001439f-163f-4692-a9c3-4f1a55ed0460" width="100%"></td>
      <td><img src="https://github.com/user-attachments/assets/dab482f9-6bd1-4c91-9aa6-09a90885e586" width="100%"></td>
    </tr>
  </table>
</div>

### 🛍️ واجهة المستخدم وتجربة التسوق
<div align="center">
  <table border="0">
    <tr>
      <td><img src="https://github.com/user-attachments/assets/08b9f5c9-333b-423b-91e5-dd67c70278ba" width="100%"></td>
      <td><img src="https://github.com/user-attachments/assets/5e55e3a2-bb0e-4e6e-8d7c-ea28106b6743" width="100%"></td>
    </tr>
    <tr>
      <td><img src="https://github.com/user-attachments/assets/0e9a8840-c89e-4303-a5b3-ebe258846ad0" width="100%"></td>
      <td><img src="https://github.com/user-attachments/assets/db0aab27-9670-4c05-aafc-4a0959334c1b" width="100%"></td>
    </tr>
  </table>
</div>

### 💳 المدفوعات والعمليات المتقدمة (Stripe & Orders)
<div align="center">
  <table border="0">
    <tr>
      <td><img src="https://github.com/user-attachments/assets/3b9fe426-e795-4e41-b264-63d52acc7460" width="100%"></td>
      <td><img src="https://github.com/user-attachments/assets/72e4d842-c154-40f0-89e9-24cb4ba2d229" width="100%"></td>
    </tr>
    <tr>
      <td><img src="https://github.com/user-attachments/assets/a8d8d4fc-318d-4aeb-b85c-1a7b785e1201" width="100%"></td>
      <td><img src="https://github.com/user-attachments/assets/e0792b22-497c-4f7f-b997-92e3bda537ba" width="100%"></td>
    </tr>
  </table>
</div>

---

## ⚡ المميزات البرمجية (Core Features)

### **1. نظام إدارة المخزون (Back-End Power)**
- **Multi-Authentication:** نظام تسجيل دخول مزدوج (Admin & User) باستخدام **Laravel Breeze**.
- **Hybrid Image Logic:** معالج صور ذكي يقبل الصور المحلية والروابط الخارجية (Faker) دون أخطاء.
- **Auto-Slug Generation:** توليد روابط فريدة للمنتجات تلقائياً لتحسين الـ SEO.

### **2. دورة حياة الطلب والدفع (Workflow)**
- **Stripe Integration:** ربط كامل لبوابة الدفع العالمية **Stripe** لإتمام المعاملات بأمان.
- **PDF Invoices:** إمكانية تحميل وطباعة فواتير الطلبات بصيغة **PDF** برمجياً.
- **Email System:** تفعيل الـ **Email Verification** ونظام استعادة كلمة المرور عبر SMTP.

### **3. تجربة المستخدم (Premium UI/UX)**
- **Luxury Interface:** واجهة أدمن Dark Mode احترافية مصممة بمساعدة **Gemini**.
- **Real-time Feedback:** استخدام **SweetAlert2** و **Toastr** للتفاعل الحي.

---

## 🏗️ البنية التقنية (Tech Architecture)

| التقنية | الدور في المشروع |
| :--- | :--- |
| **Laravel 10** | المحرك الأساسي (Backend Framework) |
| **MySQL** | إدارة قواعد البيانات والعلاقات (Foreign Keys) |
| **Stripe API** | معالجة المدفوعات الإلكترونية |
| **DomPDF** | توليد فواتير الـ PDF |

---

## 🛠️ خطوات التشغيل السريع (Quick Start)

```bash
# 1. نسخ المشروع
git clone [https://github.com/yourusername/smartstore.git](https://github.com/yourusername/smartstore.git)

# 2. تثبيت المكتبات وتجهيز البيئة
cp .env.example .env
composer install
npm install && npm run dev

# 3. إعداد قاعدة البيانات والبيانات التجريبية
php artisan key:generate
php artisan migrate --seed

# 4. الانطلاق
php artisan serve
