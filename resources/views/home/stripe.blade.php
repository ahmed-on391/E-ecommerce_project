<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    @include('home.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; background-color: #f8f9fa; }
        .stripe-card-element {
            background-color: white;
            padding: 15px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .giftos-bg { background-color: #db4566; }
        .giftos-bg:hover { background-color: #b83652; }
    </style>
</head>
<body class="bg-gray-50">

@include('home.header')

<div class="container mx-auto mt-16 px-4 mb-20">
    <div class="max-w-lg mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
        <div class="giftos-bg p-8 text-center text-white">
            <div class="mb-4">
                <i class="fa fa-shield text-5xl opacity-80"></i>
            </div>
            <h2 class="text-2xl font-bold">الدفع الآمن بالكارت</h2>
            <p class="text-pink-100 mt-2 text-sm">سيتم معالجة بياناتك بتشفير 256-bit</p>
        </div>

        <div class="p-8">
            <div class="flex justify-between items-center mb-8 bg-gray-50 p-4 rounded-2xl border border-dashed border-gray-300">
                <span class="text-gray-600 font-bold text-lg">إجمالي المطلوب دفعه:</span>
                <span class="text-2xl font-black text-gray-800">{{ number_format($total, 2) }} <small class="text-xs">EGP</small></span>
            </div>

            <form action="{{ route('stripe.post', $total) }}" method="POST" id="payment-form" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700 mr-2">بيانات البطاقة البنكية</label>
                    <div id="card-element" class="stripe-card-element">
                        </div>
                    <div id="card-errors" role="alert" class="text-red-500 text-xs mt-2 mr-2"></div>
                </div>

                <button id="submit-button" class="w-full giftos-bg text-white py-4 rounded-2xl text-xl font-bold shadow-lg shadow-pink-200 transition-all hover:scale-[1.02] active:scale-95 flex items-center justify-center gap-3">
                    <i class="fa fa-lock"></i>
                    <span>ادفع الآن بأمان</span>
                </button>
            </form>

            <div class="mt-8 flex justify-center gap-4 opacity-50">
                <img src="https://upload.wikimedia.org/wikipedia/commons/d/d6/Visa_2021.svg" class="h-6" alt="Visa">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" class="h-6" alt="Mastercard">
            </div>
        </div>
    </div>
</div>

@include('home.footer')

<script>
    var stripe = Stripe("{{ env('STRIPE_KEY') }}"); // تأكد من وضع المفتاح في ملف .env
    var elements = stripe.elements();

    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Cairo", sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': { color: '#aab7c4' }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    var card = elements.create('card', {style: style, hidePostalCode: true});
    card.mount('#card-element');

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // تعطيل الزرار لمنع الضغط المتكرر
        document.getElementById('submit-button').disabled = true;
        document.getElementById('submit-button').innerHTML = '<i class="fa fa-spinner fa-spin"></i> جاري المعالجة...';

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
                document.getElementById('submit-button').disabled = false;
                document.getElementById('submit-button').innerText = 'ادفع الآن بأمان';
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });

    function stripeTokenHandler(token) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>

</body>
</html>