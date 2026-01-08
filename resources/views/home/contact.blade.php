{{-- 
 --}}


 <section class="contact_section py-16 relative overflow-hidden" dir="rtl" style="background: #fdfdfd; font-family: 'Cairo', sans-serif;">
    
    <div class="absolute top-0 right-0 w-64 h-64 bg-pink-50 rounded-full blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>

    <div class="container position-relative z-index-1">
        <div class="row align-items-center">
            
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="contact_info_card p-5 shadow-lg rounded-[2.5rem] bg-dark text-white relative overflow-hidden">
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-pink-600 rounded-circle opacity-10 -translate-x-1/2 translate-y-1/2"></div>
                    
                    <h2 class="text-3xl font-black mb-4">خلينا على <span style="color: #db4566;">تواصل</span></h2>
                    <p class="text-gray-400 mb-8">عندك استفسار؟ عايز هدية بمواصفات خاصة؟ فريق Giftos جاهز يرد عليك في أي وقت.</p>
                    
                    <div class="space-y-6">
                        <div class="d-flex align-items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-2xl bg-pink-500/20 d-flex align-items-center justify-content-center text-pink-500">
                                <i class="fa fa-map-marker text-xl"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 font-bold">موقعنا</h6>
                                <p class="small text-gray-400 mb-0">القاهرة، جمهورية مصر العربية</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-2xl bg-green-500/20 d-flex align-items-center justify-content-center text-green-500">
                                <i class="fa fa-phone text-xl"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 font-bold">رقم الهاتف</h6>
                                <p class="small text-gray-400 mb-0">+20 123 456 7890</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-blue-500/20 d-flex align-items-center justify-content-center text-blue-500">
                                <i class="fa fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 font-bold">البريد الإلكتروني</h6>
                                <p class="small text-gray-400 mb-0">support@giftos.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 flex gap-3">
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 d-flex align-items-center justify-content-center hover:bg-pink-600 transition-all"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 d-flex align-items-center justify-content-center hover:bg-pink-600 transition-all"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 rounded-full bg-white/10 d-flex align-items-center justify-content-center hover:bg-pink-600 transition-all"><i class="fa fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 pr-lg-5">
                <div class="bg-white p-5 rounded-[2.5rem] border border-gray-100 shadow-sm">
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="font-bold text-gray-700 mb-2 block">الاسم بالكامل</label>
                                <input type="text" placeholder="مثال: أحمد محمد" class="contact-input">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="font-bold text-gray-700 mb-2 block">البريد الإلكتروني</label>
                                <input type="email" placeholder="email@example.com" class="contact-input">
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="font-bold text-gray-700 mb-2 block">رقم الهاتف</label>
                                <input type="text" placeholder="01xxxxxxxxx" class="contact-input">
                            </div>
                            <div class="col-md-12 mb-5">
                                <label class="font-bold text-gray-700 mb-2 block">رسالتك</label>
                                <textarea rows="4" placeholder="كيف يمكننا مساعدتك؟" class="contact-input"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="w-full py-4 rounded-2xl text-white font-black text-lg shadow-lg hover:scale-[1.02] active:scale-95 transition-all" style="background: linear-gradient(135deg, #db4566 0%, #ff7a91 100%);">
                                    إرسال الرسالة الآن <i class="fa fa-paper-plane mr-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    .contact-input {
        width: 100%;
        padding: 15px 20px;
        background: #f8fafc;
        border: 2px solid transparent;
        border-radius: 18px;
        outline: none;
        transition: all 0.3s;
        font-weight: 600;
        color: #334155;
    }

    .contact-input:focus {
        background: #fff;
        border-color: #db4566;
        box-shadow: 0 10px 20px rgba(219, 69, 102, 0.05);
    }

    .contact-input::placeholder {
        color: #94a3b8;
        font-weight: 400;
    }

    /* تحسين شكل الكارد الـ Dark */
    .bg-dark {
        background-color: #111111 !important;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .pr-lg-5 {
            padding-right: 15px !important;
        }
    }
</style>