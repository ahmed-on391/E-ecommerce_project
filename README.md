<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مشروع متجر إلكتروني | Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: 'Cairo', sans-serif;
            background: #f4f6f8;
            color: #333;
        }
        header {
            background: linear-gradient(135deg, #1d3557, #457b9d);
            color: #fff;
            padding: 60px 20px;
            text-align: center;
        }
        header h1 {
            margin-bottom: 10px;
            font-size: 36px;
        }
        header p {
            font-size: 18px;
            opacity: 0.9;
        }
        section {
            padding: 50px 20px;
            max-width: 1100px;
            margin: auto;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }
        h2 {
            margin-bottom: 15px;
            color: #1d3557;
        }
        ul {
            line-height: 2;
        }
        .tech span {
            display: inline-block;
            background: #e9ecef;
            padding: 8px 15px;
            border-radius: 20px;
            margin: 5px;
            font-size: 14px;
        }
        footer {
            background: #1d3557;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            background: #e63946;
            color: #fff;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<header>
    <h1>🛒 مشروع متجر إلكتروني</h1>
    <p>تطبيق ويب متكامل باستخدام Laravel يحاكي متجر حقيقي</p>
</header>

<section>
    <div class="card">
        <h2>📌 فكرة المشروع</h2>
        <p>
            مشروع متجر إلكتروني يتيح للمستخدم تصفح المنتجات،
            إضافة المنتجات إلى سلة المشتريات، وإدارة الطلبات
            مع مراعاة تنظيم الكود واستخدام أفضل ممارسات Laravel.
        </p>
    </div>

    <div class="card">
        <h2>✨ مميزات المشروع</h2>
        <ul>
            <li>إدارة المنتجات (إضافة – تعديل – حذف)</li>
            <li>سلة مشتريات (Cart System)</li>
            <li>علاقات بين الجداول باستخدام Foreign Keys</li>
            <li>إدارة الطلبات</li>
            <li>واجهة مستخدم بسيطة وسلسة</li>
            <li>كود منظم وقابل للتطوير</li>
        </ul>
    </div>

    <div class="card">
        <h2>⚙️ التقنيات المستخدمة</h2>
        <div class="tech">
            <span>Laravel</span>
            <span>PHP</span>
            <span>MySQL</span>
            <span>HTML</span>
            <span>CSS</span>
            <span>JavaScript</span>
            <span>Tailwind CSS</span>
        </div>
    </div>

    <div class="card">
        <h2>🗂️ قاعدة البيانات</h2>
        <ul>
            <li>Users</li>
            <li>Products</li>
            <li>Carts</li>
            <li>Orders</li>
        </ul>
        <p>تم استخدام القيود (Constraints) للحفاظ على سلامة البيانات.</p>
    </div>

    <div class="card">
        <h2>👨‍💻 المطور</h2>
        <p>
            <strong>Ahmed Yous</strong><br>
            Laravel Developer – Egypt 🇪🇬
        </p>
        <a href="#" class="btn">مشاهدة المشروع على GitHub</a>
    </div>
</section>

<footer>
    © 2026 – مشروع متجر إلكتروني باستخدام Laravel
</footer>

</body>
</html>
