<section class="info_section pt-5" dir="rtl" style="background-color: #1a1a1a; color: white; font-family: 'Cairo', sans-serif;">
    <div class="container">
        
        <div class="social_container mb-5 text-center">
            <h5 class="mb-4 font-weight-bold" style="color: #db4566;">تابعنا على منصاتنا</h5>
            <div class="social_box_wrapper">
                <a href="#" class="social-icon-item"><i class="fa fa-facebook"></i></a>
                <a href="#" class="social-icon-item"><i class="fa fa-twitter"></i></a>
                <a href="#" class="social-icon-item"><i class="fa fa-instagram"></i></a>
                <a href="#" class="social-icon-item"><i class="fa fa-youtube"></i></a>
            </div>
        </div>

        <div class="info_container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4">
                    <h6 class="footer-heading">من نحن</h6>
                    <p style="font-size: 14px; line-height: 1.8; color: #aaa;">
                        متجر **Giftos** هو وجهتك الأولى لاختيار أرقى الهدايا. نحن نهتم بكل تفصيلة لتصل هديتك بحب وإتقان لمن تحب.
                    </p>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <h6 class="footer-heading">اشترك معنا</h6>
                    <div class="newsletter_form">
                        <form action="#" class="subscribe-form">
                            <input type="email" placeholder="بريدك الإلكتروني">
                            <button type="submit">اشترك</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <h6 class="footer-heading">روابط تهمك</h6>
                    <ul class="list-unstyled pr-0">
                        <li class="mb-2"><a href="{{ url('/') }}" class="footer-link">الرئيسية</a></li>
                        <li class="mb-2"><a href="{{ url('/shop') }}" class="footer-link">المتجر</a></li>
                        <li class="mb-2"><a href="{{ url('/why') }}" class="footer-link">لماذا نحن؟</a></li>
                        <li class="mb-2"><a href="{{ url('/contact') }}" class="footer-link">اتصل بنا</a></li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3 mb-4">
                    <h6 class="footer-heading">تواصل معنا</h6>
                    <div class="contact-links-list">
                        <a href="#" class="contact-link-item">
                            <i class="fa fa-map-marker"></i>
                            <span>القاهرة، مصر</span>
                        </a>
                        <a href="#" class="contact-link-item">
                            <i class="fa fa-phone"></i>
                            <span>+2001159081499</span>
                        </a>
                        <a href="#" class="contact-link-item">
                            <i class="fa fa-envelope"></i>
                            <span>ahmededress111@gmail.com</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer_section py-3 mt-4" style="background-color: #111; border-top: 1px solid #333;">
        <div class="container text-center">
            <p class="m-0 text-white-50" style="font-size: 13px;">
                &copy; {{ date('Y') }} جميع الحقوق محفوظة لـ 
                <a href="#" style="color: #db4566; font-weight: bold; text-decoration: none;">Giftos Store</a>
            </p>
        </div>
    </footer>
</section>

<style>
    /* التنسيق النهائي للأيقونات لضمان التساوي */
    .social_box_wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px; /* مسافة موحدة بين الأيقونات */
    }

    .social-icon-item {
        width: 45px;
        height: 45px;
        background-color: #2c2c2c;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: all 0.3s ease;
        text-decoration: none !important;
        font-size: 18px;
    }

    .social-icon-item:hover {
        background-color: #db4566;
        color: white;
        transform: translateY(-5px);
    }

    /* تنسيق قسم تواصل معنا */
    .contact-links-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .contact-link-item {
        display: flex;
        align-items: center;
        color: #aaa;
        text-decoration: none !important;
        transition: 0.3s;
    }

    .contact-link-item i {
        width: 30px; /* توحيد عرض منطقة الأيقونة ليكون النص محاذي */
        color: #db4566;
        font-size: 18px;
        text-align: center;
        margin-left: 10px;
    }

    .contact-link-item:hover {
        color: #db4566;
    }

    /* العناوين */
    .footer-heading {
        color: #fff;
        font-weight: 800;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 10px;
        text-align: right;
    }

    .footer-heading::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 40px;
        height: 3px;
        background-color: #db4566;
    }

    /* فورم الاشتراك */
    .subscribe-form {
        position: relative;
        display: flex;
        align-items: center;
    }

    .subscribe-form input {
        width: 100%;
        padding: 12px 15px 12px 80px; /* مساحة للزرار جهة اليسار */
        border-radius: 50px;
        border: 1px solid #444;
        background: #222;
        color: white;
        outline: none;
        text-align: right;
    }

    .subscribe-form button {
        position: absolute;
        left: 5px;
        background: #db4566;
        color: white;
        border: none;
        padding: 7px 20px;
        border-radius: 50px;
        font-weight: bold;
        transition: 0.3s;
    }

    .footer-link {
        color: #aaa;
        text-decoration: none !important;
        transition: 0.3s;
    }

    .footer-link:hover {
        color: #db4566;
        padding-right: 8px;
    }
</style>