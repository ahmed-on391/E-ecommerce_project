<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تواصل معنا | Giftos Store</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <style>
        :root {
            --main-pink: #db4566;
            --dark-bg: #1a1a1a;
            --input-bg: #f8fafc;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background-color: #fdfdfd;
            color: #333;
        }

        /* Hero Section */
        .contact-hero {
            background: var(--dark-bg);
            padding: 100px 0;
            color: white;
            text-align: center;
            border-bottom-left-radius: 60px;
            border-bottom-right-radius: 60px;
            margin-bottom: -50px;
        }

        .back-home {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #aaa;
            border-radius: 50px;
            text-decoration: none !important;
            transition: 0.3s;
            margin-bottom: 15px;
        }
        .back-home:hover { color: white; background: var(--main-pink); }

        /* Contact Card */
        .contact-wrapper {
            background: white;
            border-radius: 40px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.05);
            overflow: hidden;
            border: 1px solid #f1f1f1;
        }

        /* Info Side */
        .info-side {
            background: var(--main-pink);
            color: white;
            padding: 60px 40px;
            height: 100%;
        }

        .contact-method {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .method-icon {
            width: 55px;
            height: 55px;
            background: rgba(255,255,255,0.15);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        /* Form Side */
        .form-side {
            padding: 60px 50px;
        }

        .form-control {
            background: var(--input-bg);
            border: 2px solid transparent;
            border-radius: 15px;
            padding: 15px 20px;
            height: auto;
            transition: 0.3s;
            font-weight: 600;
        }

        .form-control:focus {
            background: white;
            border-color: var(--main-pink);
            box-shadow: 0 10px 20px rgba(219, 69, 102, 0.05);
            outline: none;
        }

        .btn-send {
            background: var(--main-pink);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 15px;
            font-weight: 800;
            width: 100%;
            font-size: 18px;
            box-shadow: 0 10px 20px rgba(219, 69, 102, 0.2);
            transition: 0.3s;
        }

        .btn-send:hover {
            transform: translateY(-5px);
            background: var(--dark-bg);
        }

        .social-links a {
            color: white;
            font-size: 20px;
            margin-left: 15px;
            opacity: 0.8;
            transition: 0.3s;
        }
        .social-links a:hover { opacity: 1; transform: scale(1.2); }

        @media (max-width: 991px) {
            .info-side { border-radius: 0 0 40px 40px; }
        }
    </style>
</head>
<body>

    <section class="contact-hero">
        <div class="container">
            <a href="{{ url('/') }}" class="back-home"><i class="fa fa-home ml-2"></i> الرئيسية</a>
            <h1 class="display-4 font-weight-black">تواصل <span style="color: var(--main-pink);">معنا</span></h1>
            <p class="opacity-75">نحن هنا للإجابة على جميع استفساراتك وتلقي طلباتك الخاصة</p>
        </div>
    </section>

    <div class="container py-5">
        <div class="contact-wrapper">
            <div class="row no-gutters">
                
                <div class="col-lg-4 order-lg-2">
                    <div class="info-side">
                        <h3 class="font-weight-bold mb-5">معلومات التواصل</h3>
                        
                        <div class="contact-method">
                            <div class="method-icon"><i class="fa fa-map-marker"></i></div>
                            <div>
                                <h6 class="mb-1 font-weight-bold">موقعنا</h6>
                                <p class="small mb-0">الجيزة، مدينة الصف، مصر</p>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="method-icon"><i class="fa fa-phone"></i></div>
                            <div>
                                <h6 class="mb-1 font-weight-bold">اتصل بنا</h6>
                                <p class="small mb-0">+20 01159081499</p>
                            </div>
                        </div>

                        <div class="contact-method">
                            <div class="method-icon"><i class="fa fa-envelope"></i></div>
                            <div>
                                <h6 class="mb-1 font-weight-bold">البريد الإلكتروني</h6>
                                <p class="small mb-0">ahmededress111@gmail.com</p>
                            </div>
                        </div>

                        <div class="mt-5 pt-5">
                            <h6 class="mb-3 font-weight-bold">تابعنا على:</h6>
                            <div class="social-links d-flex">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 order-lg-1">
                    <div class="form-side">
                        <h2 class="font-weight-black mb-4" style="color: var(--dark-bg);">أرسل لنا <span style="color: var(--main-pink);">رسالة</span></h2>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="font-weight-bold small">الاسم بالكامل</label>
                                    <input type="text" class="form-control" placeholder="أحمد يس">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="font-weight-bold small">البريد الإلكتروني</label>
                                    <input type="email" class="form-control" placeholder="name@example.com">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="font-weight-bold small">الموضوع</label>
                                    <input type="text" class="form-control" placeholder="استفسار عن هدية خاصة">
                                </div>
                                <div class="col-md-12 mb-5">
                                    <label class="font-weight-bold small">الرسالة</label>
                                    <textarea rows="5" class="form-control" placeholder="اكتب استفسارك هنا..."></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn-send">
                                        إرسال الآن <i class="fa fa-paper-plane mr-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid p-0 mt-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.60385045332!2d31.188423407949667!3d30.059483810452614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296efaaad!2sCairo%2C%20Cairo%20Governorate!5e0!3m2!1sen!2seg!4v1700000000000!5m2!1sen!2seg" width="100%" height="400" style="border:0; filter: grayscale(100%) invert(90%);" allowfullscreen="" loading="lazy"></iframe>
    </div>

</body>
</html>