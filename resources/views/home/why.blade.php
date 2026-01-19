<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لماذا Giftos؟ | سر تميزنا</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <style>
        :root {
            --main-pink: #db4566;
            --dark-bg: #1a1a1a;
            --soft-bg: #ffffff;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background-color: var(--soft-bg);
            color: #333;
            overflow-x: hidden;
        }

        /* Hero Section */
        .why-hero {
            background: linear-gradient(rgba(26, 26, 26, 0.9), rgba(26, 26, 26, 0.9)), 
                        url('https://images.unsplash.com/photo-1513201099705-a9746e1e201f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            padding: 120px 0;
            color: white;
            text-align: center;
            border-bottom-left-radius: 80px;
            margin-bottom: -50px;
        }

        .back-btn {
            display: inline-block;
            padding: 10px 25px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            border-radius: 50px;
            text-decoration: none !important;
            margin-bottom: 20px;
            transition: 0.3s;
        }
        .back-btn:hover { background: var(--main-pink); transform: translateX(-5px); }

        /* Feature Card */
        .feature-card {
            padding: 40px 30px;
            border-radius: 30px;
            background: white;
            box-shadow: 0 15px 45px rgba(0,0,0,0.05);
            text-align: center;
            transition: 0.4s;
            border: 1px solid #f1f1f1;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-15px);
            border-color: var(--main-pink);
        }

        .icon-box {
            width: 90px;
            height: 90px;
            background: #fff0f3;
            color: var(--main-pink);
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            margin: 0 auto 25px;
            transition: 0.4s;
            transform: rotate(-5deg);
        }

        .feature-card:hover .icon-box {
            background: var(--main-pink);
            color: white;
            transform: rotate(0deg) scale(1.1);
        }

        .feature-title {
            font-weight: 800;
            font-size: 20px;
            margin-bottom: 15px;
            color: var(--dark-bg);
        }

        .feature-text {
            color: #777;
            font-size: 15px;
            line-height: 1.8;
        }

        /* Stats Section */
        .stats-bar {
            background: var(--dark-bg);
            border-radius: 40px;
            padding: 50px;
            color: white;
            margin-top: 100px;
        }

        .stat-item h2 { font-weight: 900; color: var(--main-pink); font-size: 40px; }

    </style>
</head>
<body>

    <section class="why-hero">
        <div class="container">
            <a href="{{ url('/') }}" class="back-btn"><i class="fa fa-arrow-right ml-2"></i> العودة للرئيسية</a>
            <h1 class="display-3 font-weight-black">لماذا تختار <span style="color: var(--main-pink);">Giftos</span>؟</h1>
            <p class="lead opacity-75">نحن لا نبيع هدايا، نحن نصنع ذكريات تدوم للأبد</p>
        </div>
    </section>

    <section class="features-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="icon-box">
                            <i class="fa fa-truck"></i>
                        </div>
                        <h4 class="feature-title">توصيل سريع للغاية</h4>
                        <p class="feature-text">نحن نعلم أن الهدايا لا تنتظر، لذلك نوفر أسرع خدمة توصيل في مصر لضمان وصول هديتك في وقتها المناسب.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="icon-box">
                            <i class="fa fa-diamond"></i>
                        </div>
                        <h4 class="feature-title">جودة استثنائية</h4>
                        <p class="feature-text">كل قطعة في متجرنا تمر بمراحل فحص دقيقة. نحن نختار الخامات الأفضل لنضمن لك تجربة شراء تليق بك.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="icon-box">
                            <i class="fa fa-lock"></i>
                        </div>
                        <h4 class="feature-title">دفع آمن 100%</h4>
                        <p class="feature-text">سواء كنت تفضل الدفع عند الاستلام أو عبر الفيزا، نحن نوفر لك بوابات دفع مشفرة وآمنة تماماً لحماية بياناتك.</p>
                    </div>
                </div>
            </div>

            <div class="stats-bar shadow-2xl">
                <div class="row text-center">
                    <div class="col-md-4 stat-item">
                        <h2>+10k</h2>
                        <p class="m-0">عميل سعيد</p>
                    </div>
                    <div class="col-md-4 stat-item">
                        <h2>+500</h2>
                        <p class="m-0">هدية متنوعة</p>
                    </div>
                    <div class="col-md-4 stat-item">
                        <h2>24/7</h2>
                        <p class="m-0">دعم فني متواصل</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center py-5">
        <p class="text-muted small">&copy; 2026 جميع الحقوق محفوظة لمتجر Giftos</p>
    </footer>

</body>
</html>