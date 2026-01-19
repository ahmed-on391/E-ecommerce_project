<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data->title }} | Giftos</title>
    
    @include('home.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Cairo', sans-serif; background: #fdfdfd; color: #333; }
        .giftos-color { color: #db4566; }
        .giftos-bg { background-color: #db4566; }
        .giftos-bg:hover { background-color: #b83652; }
        
        /* تحسين السلايدر */
        .carousel-container { position: relative; border-radius: 2rem; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); background: #fff; }
        .carousel-images { display: flex; transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); }
        .carousel-images img { width: 100%; flex-shrink: 0; object-fit: contain; aspect-ratio: 1/1; padding: 20px; }
        
        .nav-btn { background: rgba(255, 255, 255, 0.9); color: #db4566; width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: 0.3s; z-index: 10; }
        .nav-btn:hover { background: #db4566; color: white; transform: scale(1.1); }

        /* ستايل مصغرات الصور */
        .thumb-img { width: 80px; height: 80px; border-radius: 1rem; cursor: pointer; border: 2px solid transparent; transition: 0.3s; object-fit: cover; flex-shrink: 0; }
        .thumb-img.active { border-color: #db4566; transform: translateY(-5px); }
    </style>
</head>
<body class="bg-gray-50">

@include('home.header')

<div class="container mx-auto mt-12 px-4 pb-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
        
        <div class="space-y-6">
            <div class="carousel-container">
                <div class="carousel-images" id="carousel-images">
                    @php 
                        $images = json_decode($data->images ?? '[]'); 
                        // لو مفيش مصفوفة صور، نستخدم الصورة الأساسية
                        if(empty($images)) { $images = [$data->image]; }
                    @endphp
                    
                    @foreach($images as $img)
                        <img src="{{ (str_starts_with($img, 'http')) ? $img : asset('products/'.$img) }}" alt="{{ $data->title }}">
                    @endforeach
                </div>

                @if(count($images) > 1)
                <button class="nav-btn absolute right-4 top-1/2 -translate-y-1/2" onclick="nextSlide()">
                    <i class="fa fa-chevron-right"></i>
                </button>
                <button class="nav-btn absolute left-4 top-1/2 -translate-y-1/2" onclick="prevSlide()">
                    <i class="fa fa-chevron-left"></i>
                </button>
                @endif
            </div>

            @if(count($images) > 1)
            <div class="flex gap-4 overflow-x-auto py-2 px-1 scrollbar-hide justify-center">
                @foreach($images as $key => $img)
                    <img src="{{ (str_starts_with($img, 'http')) ? $img : asset('products/'.$img) }}" 
                         onclick="showSlide({{ $key }})"
                         class="thumb-img border-2 border-transparent hover:border-pink-300">
                @endforeach
            </div>
            @endif
        </div>

        <div class="product-info bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100">
            <nav class="flex text-gray-400 text-sm mb-4 gap-2">
                <a href="{{ url('/') }}" class="hover:text-pink-500 transition">الرئيسية</a>
                <span>/</span>
                <span class="text-gray-600 font-bold">{{ $data->category }}</span>
            </nav>

            <h1 class="text-3xl font-extrabold text-gray-800 mb-4 leading-tight">{{ $data->title }}</h1>
            
            <div class="flex items-center gap-4 mb-6">
                <span class="text-3xl font-black giftos-color">{{ number_format($data->price) }} <small class="text-sm">EGP</small></span>
                <div class="h-6 w-[1px] bg-gray-200"></div>
                <div class="flex items-center text-yellow-400 gap-1">
                    @for($i=1; $i<=5; $i++)
                        <i class="fa fa-star{{ $i <= 4 ? '' : '-o' }}"></i>
                    @endfor
                    <span class="text-gray-400 text-xs mr-2 font-bold">(12 تقييم)</span>
                </div>
            </div>

            <p class="text-gray-500 leading-relaxed mb-8 border-r-4 border-pink-100 pr-4 italic">
                {{ $data->short_description ?? 'هذا المنتج صُمم خصيصاً ليضيف لمسة من الجمال والتميز لهديتك، جودة عالية وتصميم فريد يليق بمناسباتكم السعيدة.' }}
            </p>

            <form action="{{ url('add_cart', $data->id) }}" method="POST" class="space-y-6">
                @csrf
                <div class="flex items-center gap-4">
                    <label class="font-bold text-gray-700">الكمية:</label>
                    <div class="flex items-center border-2 border-gray-100 rounded-2xl overflow-hidden bg-gray-50">
                        <button type="button" onclick="changeQty(-1)" class="px-5 py-2 hover:bg-white transition font-bold">-</button>
                        <input type="number" name="quantity" id="qty_input" value="1" min="1" class="w-14 text-center bg-transparent border-none focus:ring-0 font-bold text-lg">
                        <button type="button" onclick="changeQty(1)" class="px-5 py-2 hover:bg-white transition font-bold">+</button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <button type="submit" class="giftos-bg text-white py-4 rounded-2xl font-bold text-lg shadow-xl shadow-pink-100 transition-all hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3">
                        <i class="fa fa-shopping-cart text-xl"></i> إضافة للسلة
                    </button>
                    <a href="https://wa.me/201065972771?text=أريد الاستفسار عن: {{ $data->title }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white py-4 rounded-2xl font-bold text-lg shadow-xl shadow-green-100 transition-all hover:-translate-y-1 flex items-center justify-center gap-3">
                        <i class="fa fa-whatsapp text-2xl"></i> اطلب عبر واتساب
                    </a>
                </div>
            </form>

            <div class="grid grid-cols-3 gap-2 mt-10 border-t pt-8">
                <div class="text-center group">
                    <div class="w-12 h-12 bg-pink-50 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:bg-pink-500 group-hover:text-white transition">
                        <i class="fa fa-truck text-xl"></i>
                    </div>
                    <p class="text-[11px] font-bold text-gray-600">شحن سريع</p>
                </div>
                <div class="text-center group border-x border-gray-100">
                    <div class="w-12 h-12 bg-pink-50 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:bg-pink-500 group-hover:text-white transition">
                        <i class="fa fa-shield text-xl"></i>
                    </div>
                    <p class="text-[11px] font-bold text-gray-600">دفع آمن</p>
                </div>
                <div class="text-center group">
                    <div class="w-12 h-12 bg-pink-50 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:bg-pink-500 group-hover:text-white transition">
                        <i class="fa fa-refresh text-xl"></i>
                    </div>
                    <p class="text-[11px] font-bold text-gray-600">استرجاع سهل</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-16 bg-white p-10 rounded-[3rem] shadow-sm border border-gray-50">
        <h3 class="text-2xl font-black mb-8 flex items-center gap-4">
            <span class="w-3 h-10 giftos-bg rounded-full"></span>
            التفاصيل الكاملة للمنتج
        </h3>
        <div class="text-gray-600 leading-loose text-lg text-justify pr-6 border-r-2 border-gray-50">
            {!! nl2br(e($data->description)) !!}
        </div>
    </div>
</div>

@include('home.footer')

<script>
    let index = 0;
    const carousel = document.getElementById('carousel-images');
    const total = carousel.children.length;
    const thumbs = document.querySelectorAll('.thumb-img');

    function updateThumbs() {
        thumbs.forEach((t, i) => {
            if(i === index) t.classList.add('active');
            else t.classList.remove('active');
        });
    }

    function showSlide(i) {
        index = i;
        if(index < 0) index = total - 1;
        if(index >= total) index = 0;
        
        // في الـ RTL (العربي)، الـ translateX لازم يكون بالموجب للتحرك لليسار
        carousel.style.transform = `translateX(${index * 100}%)`;
        updateThumbs();
    }

    function nextSlide() { showSlide(index + 1); }
    function prevSlide() { showSlide(index - 1); }

    function changeQty(val) {
        const input = document.getElementById('qty_input');
        let current = parseInt(input.value);
        if(current + val >= 1) {
            input.value = current + val;
        }
    }

    // تشغيل أول Thumb
    if(thumbs.length > 0) updateThumbs();
</script>
</body>
</html>