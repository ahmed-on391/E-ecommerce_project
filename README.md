# 🛒 SmartStore - Advanced E-Commerce Inventory System

![Laravel](https://img.shields.io/badge/Laravel-10-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000f?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

متجر إلكتروني متكامل يجمع بين تجربة تسوق عصرية للمستخدم ولوحة تحكم "Luxury Dark" قوية للمدير، مع ميزات متقدمة في إدارة المخزون والصور.

---

## 🚀 نظرة عامة على المشروع (Project Overview)

تم بناء هذا المشروع ليكون حلاً كاملاً للمتاجر الإلكترونية، حيث يركز على:
1. **الأداء:** سرعة التنقل بين المنتجات.
2. **التصميم:** واجهة أدمن مستوحاة من الأنظمة العالمية بستايل Dark Mode.
3. **الذكاء:** نظام معالجة صور يدعم الصور المرفوعة والروابط الخارجية (Faker) في نفس الوقت.

---

## ✨ المميزات الرئيسية (Core Features)

### 🛠 لوحة تحكم الأدمن (Admin Dashboard)
- **Luxury UI:** تصميم داكن (Dark Theme) مريح للعين مع أيقونات **Lucide**.
- **Smart CRUD:** إدارة كاملة للمنتجات (إضافة، تعديل، حذف، عرض).
- **Advanced Searching:** محرك بحث لحظي داخل الجدول للوصول لأي منتج بالاسم أو القسم.
- **Smart Badges:** ظهور علامات تلقائية مثل "جديد" وعلامات تحذيرية عند نقص الكمية (Stock Alert).
- **Interactive Deletes:** تأكيد الحذف باستخدام **SweetAlert2** لمنع المسح بالخطأ.

### 🛍 واجهة المتجر (Storefront)
- **Modern Grid:** عرض المنتجات في بطاقات (Cards) جذابة مع تأثيرات Hover.
- **Smooth Navigation:** نظام ترقيم صفحات (Pagination) متوافق مع تصميم الموقع.
- **Details View:** صفحة تفصيلية لكل منتج توضح كافة المواصفات.

---

## 🛠 التقنيات المستخدمة (Tech Stack)

| الطبقة | التقنية المستخدمة |
| :--- | :--- |
| **Backend** | Laravel 10 (PHP 8.2) |
| **Frontend** | Blade Engine, Bootstrap 5, Custom CSS3 |
| **Database** | MySQL |
| **Icons** | Lucide Icons & FontAwesome |
| **Notifications** | SweetAlert2 |
| **Fonts** | Plus Jakarta Sans (Google Fonts) |

---

## 📸 لقطات من المشروع (Screenshots)

### 🖥 لوحة التحكم (Admin Panel)
> *جدول إدارة المنتجات بستايل الـ Dark المتميز*
![Admin Preview](https://via.placeholder.com/800x400?text=Dark+Luxury+Admin+Dashboard+Preview)

### 🛒 واجهة العرض (Storefront)
> *عرض المنتجات مع تأثيرات الزووم وعلامة "جديد"*
![Store Preview](https://via.placeholder.com/800x400?text=Modern+Storefront+Grid+Preview)

---

## ⚙️ التثبيت والتشغيل (Setup & Installation)

1. **نسخ المشروع:**
```bash
git clone https://github.com/your-username/smart-store.git
cd smart-store
