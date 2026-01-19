<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>متجر Giftos | عالم الهدايا الفاخرة</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <style>
        :root {
            --main-pink: #db4566;
            --dark-bg: #1a1a1a;
            --soft-gray: #f8f9fa;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background-color: var(--soft-gray);
            color: #333;
        }

        /* Hero Section */
        .shop-hero {
            background: linear-gradient(135deg, #1a1a1a 0%, #333 100%);
            padding: 80px 0;
            color: white;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            margin-bottom: 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .back-home-btn {
            position: absolute;
            top: -40px;
            right: 0;
            color: white;
            text-decoration: none !important;
            font-weight: 700;
            font-size: 14px;
            background: rgba(255, 255, 255, 0.1);
            padding: 10px 20px;
            border-radius: 50px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: 0.3s;
        }

        .back-home-btn:hover { background: var(--main-pink); color: white; transform: translateX(-5px); }

        .floating-back-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background: var(--main-pink);
            color: white !important;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 24px;
            box-shadow: 0 10px 20px rgba(219, 69, 102, 0.3);
            z-index: 999;
            transition: 0.4s;
            text-decoration: none !important;
        }

        .floating-back-btn:hover { transform: scale(1.1) rotate(360deg); background: #1a1a1a; }

        /* Sidebar Filters */
        .category-card {
            background: white;
            border-radius: 25px;
            border: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.03);
            overflow: hidden;
            position: sticky;
            top: 20px;
        }

        .category-link {
            display: flex; justify-content: space-between; align-items: center;
            padding: 15px 20px; color: #444; font-weight: 700; transition: 0.3s;
            border-bottom: 1px solid #f8f9fa; text-decoration: none !important;
        }

        .category-link:hover, .category-link.active { background: var(--main-pink); color: white !important; }

        /* Product Cards - المنسقة */
        .product-card {
            background: white;
            border-radius: 25px;
            overflow: hidden;
            border: none;
            transition: 0.4s;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.02);
        }

        .product-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }

        .img-container {
            position: relative;
            height: 260px;
            background: #fdfdfd;
            overflow: hidden;
        }

        .img-container img {
            width: 100%; height: 100%;
            object-fit: contain; /* عشان الهدايا متبقاش مقصوصة */
            padding: 15px;
            transition: 0.5s;
        }

        .product-card:hover .img-container img { transform: scale(1.1) rotate(2deg); }

        /* Badge جديد */
        .new-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--main-pink);
            color: white;
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            z-index: 2;
            box-shadow: 0 4px 10px rgba(219, 69, 102, 0.3);
        }

        /* Hover Actions */
        .hover-actions {
            position: absolute;
            bottom: -60px; left: 0; right: 0;
            display: flex; justify-content: center; gap: 15px;
            padding: 20px; transition: 0.4s;
            background: linear-gradient(to top, rgba(255,255,255,0.9), transparent);
            opacity: 0;
        }

        .product-card:hover .hover-actions { bottom: 0; opacity: 1; }

        .action-circle {
            width: 45px; height: 45px;
            background: white; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: var(--dark-bg); box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: 0.3s; text-decoration: none !important;
        }

        .action-circle:hover { background: var(--main-pink); color: white; transform: scale(1.1); }

        .product-info { padding: 20px; text-align: center; }
        .product-name { font-size: 17px; font-weight: 800; margin-bottom: 10px; color: var(--dark-bg); }
        .price-badge {
            background: #fff0f3; color: var(--main-pink);
            padding: 5px 15px; border-radius: 50px;
            font-weight: 900; font-size: 1.1rem; display: inline-block;
        }
    </style>
</head>
<body>

<div class="shop-hero">
    <div class="container text-center position-relative">
        <a href="{{ url('/') }}" class="back-home-btn">
            <i class="fa fa-arrow-right ml-2"></i> العودة للرئيسية
        </a>
        <h1 class="display-4 font-weight-black mt-4">متجر <span style="color: var(--main-pink);">Giftos</span></h1>
        <p class="lead opacity-75">اكتشف عالم من الهدايا التي تُحفر في الذاكرة</p>
    </div>
</div>

<a href="{{ url('/') }}" class="floating-back-btn" title="الرئيسية">
    <i class="fa fa-home"></i>
</a>

<div class="container mb-5">
    <div class="row">
        <div class="col-lg-3">
            <div class="category-card">
                <div class="p-4 border-bottom">
                    <h5 class="m-0 font-weight-bold"><i class="fa fa-sliders ml-2"></i> الأقسام</h5>
                </div>
                <div class="category-list">
                    <a href="{{ url('shop') }}" class="category-link active">الكل <span>{{ $product->total() }}</span></a>
                    @foreach($categories as $cat)
                    <a href="{{ url('category_search/'.$cat->category_name) }}" class="category-link">
                        {{ $cat->category_name }} <i class="fa fa-angle-left"></i>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="row">
                @forelse($product as $item)
                <div class="col-md-4 col-sm-6">
                    <div class="product-card">
                        <div class="img-container">
                            <span class="new-badge">جديد</span>

                            @php
                                $imagePath = $item->image;
                                $src = (str_starts_with($imagePath, 'http')) ? $imagePath : asset('products/' . $imagePath);
                            @endphp

                            <img src="{{ $src }}" alt="{{ $item->title }}">
                            
                            <div class="hover-actions">
                                <a href="{{ url('product_details', $item->id) }}" class="action-circle">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <form action="{{ url('add_cart', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="action-circle border-0" style="background: var(--main-pink); color: white; cursor: pointer;">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="product-name text-truncate" title="{{ $item->title }}">{{ $item->title }}</div>
                            <div class="price-badge">{{ number_format($item->price) }} EGP</div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <h3 class="text-muted">قريباً.. هدايا جديدة في هذا القسم</h3>
                </div>
                @endforelse
            </div>

            <div class="d-flex justify-content-center mt-5">
                {!! $product->withQueryString()->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>