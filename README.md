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

<div align="center">
  <table border="0">
    <tr>
      <td width="50%">
        <p align="center"><b>🖥️ لوحة الإدارة (Luxury Dark Mode)</b></p>
        <img src="screenshots/admin_panel.png" width="100%" style="border-radius:15px" alt="Admin Dashboard Preview">
      </td>
      <td width="50%">
        <p align="center"><b>🛍️ واجهة المتجر (Modern Storefront)</b></p>
        <img src="screenshots/storefront.png" width="100%" style="border-radius:15px" alt="Storefront Preview">
      </td>
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
- **PDF Invoices:** إمكانية تحميل وطباعة فواتير الطلبات بصيغة **PDF** برمجياً.
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
