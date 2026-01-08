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
        .carousel-container { position: relative; border-radius: 2rem; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .carousel-images { display: flex; transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
        .carousel-images img { width: 100%; flex-shrink: 0; object-fit: cover; aspect-ratio: 1/1; }
        
        /* أزرار السلايدر */
        .nav-btn { background: rgba(255, 255, 255, 0.9); color: #db4566; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; shadow: 0 4px 10px rgba(0,0,0,0.1); transition: all 0.3s; }
        .nav-btn:hover { background: #db4566; color: white; }

        /* الأنيميشن */
        .hover-scale { transition: transform 0.3s ease; }
        .hover-scale:hover { transform: scale(1.02); }
    </style>
</head>
<body class="bg-gray-50">

@include('home.header')

<div class="container mx-auto mt-12 px-4 pb-20">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
        
        <div class="space-y-4">
            <div class="carousel-container bg-white">
                <div class="carousel-images" id="carousel-images">
                    @php $images = json_decode($data->images ?? '[]'); @endphp
                    
                    @if(count($images) > 0)
                        @foreach($images as $img)
                            <img src="{{ asset('products/'.$img) }}" alt="{{ $data->title }}">
                        @endforeach
                    @else
                        <img src="{{ asset('products/'.$data->image) }}" alt="{{ $data->title }}">
                    @endif
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

            <div class="flex gap-3 overflow-x-auto py-2 px-1">
                @foreach($images as $key => $img)
                    <img src="{{ asset('products/'.$img) }}" 
                         onclick="showSlide({{ $key }})"
                         class="w-20 h-20 rounded-xl cursor-pointer border-2 border-transparent hover:border-pink-500 transition object-cover">
                @endforeach
            </div>
        </div>

        <div class="product-info bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100">
            <nav class="flex text-gray-400 text-sm mb-4 gap-2">
                <a href="{{ url('/') }}" class="hover:text-pink-500">الرئيسية</a>
                <span>/</span>
                <span class="text-gray-600 font-bold">{{ $data->category }}</span>
            </nav>

            <h1 class="text-3xl font-extrabold text-gray-800 mb-4 leading-tight">{{ $data->title }}</h1>
            
            <div class="flex items-center gap-4 mb-6">
                <span class="text-3xl font-black giftos-color">{{ number_format($data->price, 2) }} <small class="text-sm">EGP</small></span>
                <div class="h-6 w-[1px] bg-gray-200"></div>
                <div class="flex items-center text-yellow-400 gap-1">
                    @for($i=1; $i<=5; $i++)
                        <i class="fa fa-star{{ $i <= ($data->rating ?? 4) ? '' : '-o' }}"></i>
                    @endfor
                    <span class="text-gray-400 text-xs mr-2 font-bold">({{ $data->reviews_count ?? 12 }} تقييم)</span>
                </div>
            </div>

            <p class="text-gray-500 leading-relaxed mb-8 border-r-4 border-pink-100 pr-4">
                {{ $data->short_description ?? 'هذا المنتج صُمم خصيصاً ليضيف لمسة من الجمال والتميز لهديتك، جودة عالية وتصميم فريد.' }}
            </p>

            <form action="{{ url('add_cart', $data->id) }}" method="POST" class="space-y-6">
                @csrf
                <div class="flex items-center gap-4">
                    <label class="font-bold text-gray-700">الكمية:</label>
                    <div class="flex items-center border border-gray-200 rounded-xl overflow-hidden">
                        <button type="button" onclick="changeQty(-1)" class="px-4 py-2 bg-gray-50 hover:bg-gray-100">-</button>
                        <input type="number" name="quantity" id="qty_input" value="1" min="1" class="w-12 text-center border-none focus:ring-0 font-bold">
                        <button type="button" onclick="changeQty(1)" class="px-4 py-2 bg-gray-50 hover:bg-gray-100">+</button>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <button type="submit" class="giftos-bg text-white py-4 rounded-2xl font-bold text-lg shadow-lg shadow-pink-100 transition-all hover:scale-[1.02] active:scale-95 flex items-center justify-center gap-3">
                        <i class="fa fa-shopping-cart"></i> إضافة للسلة
                    </button>
                    <a href="https://wa.me/201234567890?text=أريد الاستفسار عن: {{ $data->title }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white py-4 rounded-2xl font-bold text-lg shadow-lg shadow-green-100 transition-all hover:scale-[1.02] flex items-center justify-center gap-3">
                        <i class="fa fa-whatsapp text-2xl"></i> اطلب عبر واتساب
                    </a>
                </div>
            </form>

            <div class="grid grid-cols-3 gap-2 mt-8 border-t pt-8">
                <div class="text-center">
                    <i class="fa fa-truck text-pink-400 text-xl mb-1"></i>
                    <p class="text-[10px] font-bold text-gray-500">شحن سريع</p>
                </div>
                <div class="text-center border-x">
                    <i class="fa fa-shield text-pink-400 text-xl mb-1"></i>
                    <p class="text-[10px] font-bold text-gray-500">ضمان جودة</p>
                </div>
                <div class="text-center">
                    <i class="fa fa-refresh text-pink-400 text-xl mb-1"></i>
                    <p class="text-[10px] font-bold text-gray-500">استرجاع سهل</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-16 bg-white p-10 rounded-[2.5rem] shadow-sm border border-gray-50">
        <h3 class="text-2xl font-extrabold mb-6 flex items-center gap-3">
            <span class="w-2 h-8 giftos-bg rounded-full"></span>
            وصف المنتج بالتفصيل
        </h3>
        <div class="text-gray-600 leading-loose text-lg">
            {!! nl2br(e($data->description)) !!}
        </div>
    </div>
</div>

@include('home.footer')

<script>
    let index = 0;
    const carousel = document.getElementById('carousel-images');
    const total = carousel.children.length;

    function showSlide(i) {
        index = i;
        if(index < 0) index = total - 1;
        if(index >= total) index = 0;
        // تعديل الـ Transition للـ RTL
        carousel.style.transform = `translateX(${index * 100}%)`;
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
</script>
</body>
</html>