<!DOCTYPE html>
<html lang="ar">
<head>
    @include('home.css')
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    @include('home.header')

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6 text-center">سلة المشتريات ({{ $count }} منتجات)</h2>

        @if($count > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-center">صورة المنتج</th>
                        <th class="py-3 px-4 text-center">اسم المنتج</th>
                        <th class="py-3 px-4 text-center">السعر</th>
                        <th class="py-3 px-4 text-center">الكمية</th>
                        <th class="py-3 px-4 text-center">الإجمالي</th>
                        <th class="py-3 px-4 text-center">حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 text-center">
                            <img src="{{ asset('products/' . $item->product->image) }}" alt="{{ $item->product->title }}" class="w-16 h-16 object-cover mx-auto rounded">
                        </td>
                        <td class="py-3 px-4 text-center">{{ $item->product->title }}</td>
                        <td class="py-3 px-4 text-center">{{ $item->product->price }} EGP</td>
                        <td class="py-3 px-4 text-center">{{ $item->quantity ?? 1 }}</td>
                        <td class="py-3 px-4 text-center">{{ ($item->product->price) * ($item->quantity ?? 1) }} EGP</td>
                        <td class="py-3 px-4 text-center">
                            <form action="{{ url('remove_cart', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">حذف</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex flex-col md:flex-row justify-between items-center bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold">
                الإجمالي: 
                {{ $cart->sum(fn($item) => $item->product->price * ($item->quantity ?? 1)) }} EGP
            </h3>
            <a href="{{ url('checkout') }}" class="mt-3 md:mt-0 bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                إتمام الشراء
            </a>
        </div>

        @else
        <p class="text-center text-gray-500 text-lg mt-10">سلة المشتريات فارغة 😔</p>
        @endif
    </div>

    @include('home.footer')

</body>
</html>
