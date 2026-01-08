<header class="header_section fixed-top transition-all" id="mainHeader" dir="rtl">
    <div class="container mt-3"> <nav class="navbar navbar-expand-lg py-3 shadow-lg rounded-pill" 
             style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.3);">
            
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <span class="font-weight-bold" style="font-size: 24px; color: #1a1a1a;">
                        Gift<span style="color: #db4566;">os</span> 🎁
                    </span>
                </a>

                <button class="navbar-toggler border-0 shadow-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="fa fa-bars text-dark"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto text-center">
                        <li class="nav-item px-2">
                            <a class="nav-link custom-link {{ Request::is('/') ? 'active-link' : '' }}" href="{{ url('/') }}">الرئيسية</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link custom-link" href="{{ url('/shop') }}">المتجر</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link custom-link" href="{{ url('/why') }}">لماذا نحن؟</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link custom-link" href="{{ url('/contact') }}">تواصل معنا</a>
                        </li>
                    </ul>

                    <div class="user_option d-flex align-items-center justify-content-center gap-3">
                        @auth
                            <a href="{{ url('mycart') }}" class="cart-icon-wrapper">
                                <i class="fa fa-shopping-basket"></i>
                                <span class="cart-badge">{{ $count ?? 0 }}</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="m-0 mr-2">
                                @csrf
                                <button type="submit" class="logout-minimal">
                                    <i class="fa fa-power-off"></i>
                                </button>
                            </form>
                        @else
                            <a href="{{ url('/login') }}" class="login-text mx-3">دخول</a>
                            <a href="{{ url('/register') }}" class="btn-join">انضم إلينا</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600;800&display=swap');
    
    body { 
        font-family: 'Cairo', sans-serif;
        padding-top: 100px; /* دي أهم حتة عشان الصفحة متدخلش تحت الهيدر */
    }

    /* الروابط */
    .custom-link {
        color: #333 !important;
        font-weight: 600;
        font-size: 15px;
        transition: 0.3s;
        border-radius: 50px;
    }
    .custom-link:hover, .active-link {
        color: #db4566 !important;
        background: rgba(219, 69, 102, 0.05);
    }

    /* السلة */
    .cart-icon-wrapper {
        position: relative;
        color: #333;
        font-size: 20px;
        background: #fff;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    .cart-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background: #db4566;
        color: white;
        font-size: 10px;
        padding: 2px 6px;
        border-radius: 50%;
    }

    /* زر الانضمام */
    .btn-join {
        background: #111;
        color: #fff !important;
        padding: 8px 25px;
        border-radius: 50px;
        font-weight: 800;
        text-decoration: none;
        transition: 0.3s;
    }
    .btn-join:hover {
        background: #db4566;
        transform: scale(1.05);
    }

    .logout-minimal {
        border: none;
        background: #fff0f3;
        color: #db4566;
        padding: 8px 12px;
        border-radius: 10px;
        transition: 0.3s;
    }

    /* جعل الهيدر أصغر عند النزول */
    .header-scrolled .container {
        margin-top: 0 !important;
        max-width: 100%;
    }
    .header-scrolled nav {
        border-radius: 0;
        background: rgba(255, 255, 255, 0.98) !important;
    }
</style>

<script>
    window.onscroll = function() {
        if (window.pageYOffset > 50) {
            document.getElementById("mainHeader").classList.add("header-scrolled");
        } else {
            document.getElementById("mainHeader").classList.remove("header-scrolled");
        }
    };
</script>