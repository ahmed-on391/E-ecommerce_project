<div align="center">

  <img src="https://cdn-icons-png.flaticon.com/512/3081/3081559.png" width="100" height="100" alt="SmartStore Logo">

  # 🚀 SmartStore v1.0
  ### **Advanced Full-Stack E-Commerce Engine**
  
  [![Laravel Version](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
  [![PHP Version](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php)](https://php.net)
  [![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

  **SmartStore** هو نظام متكامل يجمع بين القوة البرمجية الفائقة (Back-End) وجمال التصميم العصري (UX/UI). تم تطوير النظام ليكون تطبيقاً عملياً شاملاً لكل مفاهيم الـ Full-stack باستخدام إطار العمل Laravel.
</div>

---

## 💎 العرض البصري (Visual Showcase)

### 🖥️ أولاً: لوحة تحكم الإدارة (Admin Luxury Dashboard)
لوحة تحكم احترافية لإدارة المنتجات، الطلبات، والأقسام بستايل Dark Mode.

<div align="center">
  <table border="0">
    <tr>
      <td><p align="center"><b>الإحصائيات الرئيسية</b></p><img src="https://github.com/user-attachments/assets/96e9a5cd-84c0-4b0a-a3a0-e097cc1cbc76" width="100%"></td>
      <td><p align="center"><b>إدارة المنتجات (Inventory)</b></p><img src="https://github.com/user-attachments/assets/3bd2f1e8-6d04-485a-adb4-1f5e627da5f4" width="100%"></td>
    </tr>
    <tr>
      <td><p align="center"><b>إضافة منتج جديد</b></p><img src="https://github.com/user-attachments/assets/a001439f-163f-4692-a9c3-4f1a55ed0460" width="100%"></td>
      <td><p align="center"><b>إدارة طلبات العملاء</b></p><img src="https://github.com/user-attachments/assets/dab482f9-6bd1-4c91-9aa6-09a90885e586" width="100%"></td>
    </tr>
    <tr>
      <td><p align="center"><b>تعديل بيانات المنتج</b></p><img src="https://github.com/user-attachments/assets/3b9fe426-e795-4e41-b264-63d52acc7460" width="100%"></td>
      <td><p align="center"><b>إدارة تصنيفات المتجر</b></p><img src="https://github.com/user-attachments/assets/72e4d842-c154-40f0-89e9-24cb4ba2d229" width="100%"></td>
    </tr>
  </table>
</div>

### 🛍️ ثانياً: تجربة المستخدم (Storefront Experience)
واجهات عصرية متجاوبة توفر تجربة تسوق سلسة واحترافية.

<div align="center">
  <table border="0">
    <tr>
      <td><p align="center"><b>الصفحة الرئيسية للمتجر</b></p><img src="https://github.com/user-attachments/assets/08b9f5c9-333b-423b-91e5-dd67c70278ba" width="100%"></td>
      <td><p align="center"><b>شبكة المنتجات (Grid)</b></p><img src="https://github.com/user-attachments/assets/5e55e3a2-bb0e-4e6e-8d7c-ea28106b6743" width="100%"></td>
    </tr>
    <tr>
      <td><p align="center"><b>تفاصيل المنتج</b></p><img src="https://github.com/user-attachments/assets/0e9a8840-c89e-4303-a5b3-ebe258846ad0" width="100%"></td>
      <td><p align="center"><b>سلة المشتريات (Cart)</b></p><img src="https://github.com/user-attachments/assets/db0aab27-9670-4c05-aafc-4a0959334c1b" width="100%"></td>
    </tr>
  </table>
</div>

### ⚙️ ثالثاً: العمليات المتقدمة (Logic & Payments)
استعراض لنظام الدفع، الفواتير، والتحقق من البيانات.

<div align="center">
  <table border="0">
    <tr>
      <td><p align="center"><b>بوابة دفع Stripe</b></p><img src="https://github.com/user-attachments/assets/a8d8d4fc-318d-4aeb-b85c-1a7b785e1201" width="100%"></td>
      <td><p align="center"><b>توليد فواتير PDF</b></p><img src="https://github.com/user-attachments/assets/e0792b22-497c-4f7f-b997-92e3bda537ba" width="100%"></td>
    </tr>
    <tr>
      <td><p align="center"><b>تأكيد الحذف (SweetAlert2)</b></p><img src="https://github.com/user-attachments/assets/9aa80685-cf20-4f9d-ab77-df735870ba5c" width="100%"></td>
      <td><p align="center"><b>صفحة تسجيل الدخول</b></p><img src="https://github.com/user-attachments/assets/93f04068-c6ba-4685-9d26-8a59ebacc60b" width="100%"></td>
    </tr>
  </table>
</div>

---

## ⚡ المميزات البرمجية (Core Features)

### **1. نظام إدارة المخزون (Back-End Power)**
- **Multi-Authentication:** نظام تسجيل دخول مزدوج (Admin & User) باستخدام **Laravel Breeze**.
- **Hybrid Image Logic:** معالج صور ذكي يقبل الصور المحلية (`public/products`) وروابط الـ URLs الخارجية (Faker) دون أخطاء.
- **Auto-Slug Generation:** توليد روابط فريدة للمنتجات تلقائياً لتحسين الـ SEO.
- **Stock Guard:** تنبيهات بصرية ذكية عند انخفاض الكميات في المخزن.

### **2. دورة حياة الطلب والدفع (Workflow)**
- **Cart System:** سلة مشتريات ديناميكية مرتبطة بقاعدة البيانات باستخدام **Foreign Keys**.
- **Stripe Integration:** ربط كامل لبوابة الدفع العالمية **Stripe** لإتمام المعاملات بأمان.
- **PDF Invoices:** إمكانية تحميل وطباعة فواتير الطلبات بصيغة **PDF** برمجياً من قاعدة البيانات.
- **Email System:** تفعيل الـ **Email Verification** ونظام استعادة كلمة المرور عبر SMTP.

### **3. تجربة المستخدم (Premium UI/UX)**
- **Luxury Interface:** واجهة أدمن Dark Mode احترافية مصممة بمساعدة **Gemini** لضمان الفخامة.
- **Real-time Feedback:** استخدام **SweetAlert2** و **Toastr** للتفاعل الحي مع المستخدم.
- **Interactive Design:** تأثيرات حركية (Hover & Zoom) باستخدام CSS3 و **Lucide Icons**.

---

## 🏗️ البنية التقنية (Tech Architecture)

| التقنية | الدور في المشروع |
| :--- | :--- |
| **Laravel 10** | المحرك الأساسي (Backend Framework) |
| **MySQL** | إدارة قواعد البيانات والعلاقات (Foreign Keys) |
| **Stripe API** | معالجة المدفوعات الإلكترونية |
| **DomPDF** | توليد فواتير الـ PDF من ملفات الـ Blade |
| **Bootstrap 5** | الهيكلة المتجاوبة (Responsive Design) |

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
