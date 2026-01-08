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
    </style>
</head>

<body class="bg-gray-50">

@include('home.header')

<div class="flex items-center justify-center min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-[2.5rem] shadow-xl border border-pink-50">
        
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900">
                أهلاً بك <span class="giftos-color">مرة أخرى</span>
            </h2>
            <p class="mt-2 text-sm text-gray-500">سجل دخولك لمتابعة هداياك المفضلة</p>
        </div>

        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mr-1 mb-1">البريد الإلكتروني</label>
                <div class="relative">
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                        class="appearance-none relative block w-full pr-10 pl-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all"
                        placeholder="أدخل بريدك الإلكتروني">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mr-1 mb-1">كلمة المرور</label>
                <div class="relative">
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                        <i class="fa fa-lock text-lg"></i>
                    </span>
                    <input id="password" type="password" name="password" required
                        class="appearance-none relative block w-full pr-10 pl-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-xl focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all"
                        placeholder="••••••••">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" 
                        class="h-4 w-4 text-pink-600 focus:ring-pink-500 border-gray-300 rounded">
                    <label for="remember_me" class="mr-2 block text-sm text-gray-700 font-semibold">
                        تذكرني
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium giftos-color hover:text-pink-800 transition-colors">
                            نسيت كلمة السر؟
                        </a>
                    </div>
                @endif
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-lg font-bold rounded-2xl text-white giftos-bg shadow-lg shadow-pink-200 transition-all active:scale-95">
                    تسجيل الدخول
                </button>
            </div>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-500">
                    ليس لديك حساب؟ 
                    <a href="{{ route('register') }}" class="giftos-color font-bold hover:underline transition-all">
                        أنشئ حساباً الآن
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>

@include('home.footer')

</body>
</html>