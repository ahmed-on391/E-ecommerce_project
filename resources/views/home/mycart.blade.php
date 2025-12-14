<!DOCTYPE html>
<html lang="ar">
<head>
    @include('home.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

@include('home.header')

<div class="container mx-auto mt-10 px-4">

    <h1 class="text-3xl font-bold mb-6 text-center">
        🛒 سلة المشتريات  
        <span class="text-yellow-600">({{ $count }})</span>
    </h1>

    @if($count > 0)
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- ************** المنتجات ************** -->
        <div class="lg:col-span-2 space-y-4">

            @foreach($cart as $item)
                @if($item->product)
                <div class="bg-white p-4 rounded-lg shadow flex gap-4">

                    <!-- صورة -->
                    <img src="{{ asset('products/'.$item->product->image) }}"
                         class="w-28 h-28 object-cover rounded">

                    <!-- معلومات المنتج -->
                    <div class="flex-1">
                        <h2 class="text-xl font-semibold">{{ $item->product->title }}</h2>

                        <p class="text-gray-700 mt-1">
                            السعر:
                            <span class="font-bold">{{ $item->product->price }} EGP</span>
                        </p>

                        <p class="text-gray-700">
                            الكمية: {{ $item->quantity ?? 1 }}
                         </p>

                        <p class="text-green-600 font-bold mt-2">
                            إجمالي المنتج:
                            {{ $item->product->price * ($item->quantity ?? 1) }} EGP
                        </p>
                    </div>

                    <!-- أزرار -->
                    <div>
                        <!-- حذف -->
                        <form action="{{ url('remove_cart/'.$item->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">
                                حذف
                            </button>
                        </form>
                    </div>
                </div>
                @endif
            @endforeach

        </div>

        <!-- ************** ملخص الطلب + بيانات المستلم ************** -->
        <div class="bg-white p-6 rounded-lg shadow">

            <h3 class="text-xl font-bold mb-4">ملخص الطلب</h3>

            <div class="flex justify-between py-2 border-b">
                <span>إجمالي المنتجات</span>
                <span class="font-bold text-gray-800">{{ $total }} EGP</span>
            </div>

            <div class="flex justify-between py-2 border-b">
                <span>الشحن</span>
                <span class="text-green-600 font-bold">مجانًا</span>
            </div>

            <div class="flex justify-between py-4 text-xl font-bold">
                <span>الإجمالي النهائي</span>
                <span class="text-yellow-600">{{ $total }} EGP</span>
            </div>

            <!-- ************** بيانات المستلم ************** -->
            <h3 class="text-lg font-semibold mt-6 mb-3">بيانات المستلم</h3>

            <form method="POST" action="{{ url('confirm_order') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-semibold mb-1">اسم المستلم</label>
                    <input type="text" name="reciver_name"
                        class="border w-full px-3 py-2 rounded focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <div>
                    <label class="block font-semibold mb-1">عنوان المستلم</label>
                    <input type="text" name="reciver_address"
                        class="border w-full px-3 py-2 rounded focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <div>
                    <label class="block font-semibold mb-1">رقم الهاتف</label>
                    <input type="text" name="reciver_phone"
                        class="border w-full px-3 py-2 rounded focus:ring-yellow-500 focus:border-yellow-500">
                </div>

                <button class="w-full bg-yellow-600 text-white py-3 mt-4 rounded text-lg font-bold hover:bg-yellow-700">
                    إتمام الشراء
                </button>
            </form>

        </div>

    </div>

    @else
        <p class="text-center text-gray-600 text-lg">سلة المشتريات فارغة 😔</p>
    @endif
</div>

@include('home.footer')

</body>
</html>
