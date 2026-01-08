<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    @include('home.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; }
        .giftos-color { color: #db4566; }
        .giftos-bg { background-color: #db4566; }
        .giftos-bg:hover { background-color: #b83652; }
        .input-focus:focus { border-color: #db4566; ring-color: #db4566; }
    </style>
</head>

<body class="bg-gray-50">

@include('home.header')

<div class="flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-[2.5rem] shadow-xl border border-pink-50">
        
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">
                إنشاء <span class="giftos-color">حساب جديد</span>
            </h2>
            <p class="mt-2 text-sm text-gray-500">انضم إلينا واستمتع بتجربة تسوق فريدة</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mr-1 mb-1">الاسم بالكامل</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all"
                    placeholder="أدخل اسمك">
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mr-1 mb-1">البريد الإلكتروني</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all"
                    placeholder="example@mail.com">
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mr-1 mb-1">رقم الهاتف</label>
                    <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all"
                        placeholder="012xxxxxxx">
                    <x-input-error :messages="$errors->get('phone')" class="mt-1" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mr-1 mb-1">العنوان</label>
                    <input id="address" type="text" name="address" value="{{ old('address') }}" required
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all"
                        placeholder="القاهرة، مصر">
                    <x-input-error :messages="$errors->get('address')" class="mt-1" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mr-1 mb-1">كلمة المرور</label>
                    <input id="password" type="password" name="password" required
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all"
                        placeholder="••••••••">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mr-1 mb-1">تأكيد الكلمة</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="appearance-none relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all"
                        placeholder="••••••••">
                </div>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-lg font-bold rounded-2xl text-white giftos-bg shadow-lg shadow-pink-200 transition-all active:scale-95 focus:outline-none">
                    تسجيل الحساب
                </button>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-pink-600 transition-colors">
                    لديك حساب بالفعل؟ <span class="giftos-color font-bold">تسجيل الدخول</span>
                </a>
            </div>
        </form>
    </div>
</div>

@include('home.footer')

</body>
</html>