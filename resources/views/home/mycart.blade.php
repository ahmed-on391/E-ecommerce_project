<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    @include('home.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; background-color: #fcfcfc; }
        .giftos-color { color: #db4566; }
        .giftos-bg { background-color: #db4566; }
        .giftos-bg:hover { background-color: #b83652; }
        .card-bg { background-color: #2b3481; } 
        .card-bg:hover { background-color: #1e255e; }
        
        /* تأثير احترافي للصور */
        .product-img-container {
            width: 100px;
            height: 100px;
            min-width: 100px;
            overflow: hidden;
            border-radius: 1rem;
            background: #f8f9fa;
        }
    </style>
</head>

<body class="bg-gray-50">

@include('home.header')

<div class="container mx-auto mt-12 px-4 pb-20">
    <div class="flex items-center justify-between mb-10 border-b pb-6">
        <h1 class="text-3xl font-extrabold text-gray-800">
            سلة المشتريات 
            <span class="giftos-color text-lg bg-pink-100 px-3 py-1 rounded-full mr-2">{{ $count }} منتجات</span>
        </h1>
        <a href="{{ url('/shop') }}" class="text-gray-500 hover:text-pink-600 transition flex items-center gap-2">
            <i class="fa fa-arrow-right"></i> متابعة التسوق
        </a>
    </div>

    @if($count > 0)
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

        <div class="lg:col-span-8 space-y-6">
            @foreach($cart as $item)
                @if($item->product)
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col md:flex-row gap-6 items-center transition hover:shadow-md">
                    
                    <div class="product-img-container shadow-inner border border-gray-50">
                        @php
                            $img = $item->product->image;
                            $src = (str_starts_with($img, 'http')) ? $img : asset('products/'.$img);
                        @endphp
                        <img src="{{ $src }}" class="w-full h-full object-contain p-2 transition duration-500 hover:scale-110">
                    </div>

                    <div class="flex-1 text-center md:text-right">
                        <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $item->product->title }}</h2>
                        <div class="flex flex-wrap justify-center md:justify-start gap-4 text-sm text-gray-600">
                            <span class="bg-gray-50 px-3 py-1 rounded-md border border-gray-100">سعر الوحدة: <b class="text-gray-900">{{ number_format($item->product->price, 2) }}</b></span>
                            <span class="bg-gray-50 px-3 py-1 rounded-md border border-gray-100">الكمية: <b class="text-gray-900">{{ $item->quantity ?? 1 }}</b></span>
                        </div>
                        <p class="giftos-color font-black text-lg mt-4">
                            إجمالي الصنف: {{ number_format($item->product->price * ($item->quantity ?? 1), 2) }} EGP
                        </p>
                    </div>

                    <div class="md:border-r md:pr-6">
                        <a href="{{ url('delete_cart', $item->id) }}" class="text-red-400 hover:text-red-600 hover:bg-red-50 p-3 rounded-full transition-all inline-block" onclick="return confirm('هل تريد حذف هذا المنتج من السلة؟')">
                            <i class="fa fa-trash-o text-2xl"></i>
                        </a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        <div class="lg:col-span-4">
            <div class="bg-white p-8 rounded-3xl shadow-lg border border-pink-50 sticky top-10">
                <h3 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-4">تأكيد الطلب</h3>

                <div class="space-y-4 mb-8">
                    <div class="flex justify-between text-gray-600">
                        <span>إجمالي المنتجات</span>
                        <span class="font-semibold">{{ number_format($total, 2) }} EGP</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>مصاريف الشحن</span>
                        <span class="text-green-500 font-bold">مجاني 🎁</span>
                    </div>
                    <div class="flex justify-between text-2xl font-extrabold text-gray-900 pt-4 border-t">
                        <span>الإجمالي</span>
                        <span class="giftos-color">{{ number_format($total, 2) }} EGP</span>
                    </div>
                </div>

                <h3 class="text-lg font-bold mb-4 text-gray-700">اختر طريقة الدفع</h3>
                <div class="grid grid-cols-2 gap-3 mb-6">
                    <label class="cursor-pointer">
                        <input type="radio" name="pay_method" value="cash" class="hidden peer" checked onclick="togglePayment('cash')">
                        <div class="p-3 border-2 border-gray-100 rounded-xl text-center peer-checked:border-pink-500 peer-checked:bg-pink-50 transition-all">
                            <i class="fa fa-money text-xl block mb-1"></i>
                            <span class="text-xs font-bold">كاش عند الاستلام</span>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="pay_method" value="card" class="hidden peer" onclick="togglePayment('card')">
                        <div class="p-3 border-2 border-gray-100 rounded-xl text-center peer-checked:border-blue-600 peer-checked:bg-blue-50 transition-all">
                            <i class="fa fa-credit-card text-xl block mb-1"></i>
                            <span class="text-xs font-bold">بطاقة ائتمان</span>
                        </div>
                    </label>
                </div>

                <form method="POST" action="{{ url('confirm_order') }}" class="space-y-4">
                    @csrf
                    <div class="space-y-3">
                        <input type="text" name="reciver_name" placeholder="اسم المستلم بالكامل" value="{{ Auth::user()->name }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-pink-400 outline-none transition" required>
                        <input type="text" name="reciver_address" placeholder="عنوان التوصيل (المدينة، الشارع، المبنى)" value="{{ Auth::user()->address }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-pink-400 outline-none transition" required>
                        <input type="text" name="reciver_phone" placeholder="رقم موبايل للتواصل" value="{{ Auth::user()->phone }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-pink-400 outline-none transition" required>
                    </div>

                    <button id="btn_cash" type="submit" class="w-full giftos-bg text-white py-4 mt-4 rounded-2xl text-lg font-bold shadow-lg transition-all hover:shadow-pink-200 active:scale-95">
                        <i class="fa fa-check-circle ml-2"></i> إتمام الطلب الآن
                    </button>

                    <a id="btn_card" href="{{ url('stripe', $total) }}" class="hidden w-full card-bg text-white py-4 mt-4 rounded-2xl text-lg font-bold shadow-lg transition-all active:scale-95 flex items-center justify-center">
                        <i class="fa fa-credit-card ml-2"></i> الذهاب لصفحة الدفع الآمن
                    </a>
                </form>
            </div>
        </div>

    </div>

    @else
    <div class="bg-white rounded-[3rem] p-20 text-center shadow-sm border border-gray-100">
        <div class="mb-6"><i class="fa fa-shopping-basket text-7xl text-gray-100"></i></div>
        <h2 class="text-2xl font-bold text-gray-800">سلتك لا تزال تنتظر الهدايا!</h2>
        <p class="text-gray-400 mt-2">لم تقم بإضافة أي منتجات للسلة بعد.</p>
        <a href="{{ url('/shop') }}" class="giftos-bg text-white px-10 py-3 rounded-full font-bold inline-block mt-8 shadow-lg hover:-translate-y-1 transition">تصفح المتجر الآن</a>
    </div>
    @endif
</div>

@include('home.footer')

<script>
    function togglePayment(method) {
        const btnCash = document.getElementById('btn_cash');
        const btnCard = document.getElementById('btn_card');
        
        if(method === 'card') {
            btnCash.classList.add('hidden');
            btnCard.classList.remove('hidden');
            btnCard.classList.add('flex');
        } else {
            btnCash.classList.remove('hidden');
            btnCard.classList.add('hidden');
            btnCard.classList.remove('flex');
        }
    }
</script>

</body>
</html>