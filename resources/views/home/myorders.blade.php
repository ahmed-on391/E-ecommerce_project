<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    @include('home.css') 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');
        
        body {
            font-family: 'Cairo', sans-serif; /* خط عربي شيك */
        }
        .orders_section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        .table_container {
            background: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border: 1px solid #eee;
        }
        .order_table {
            width: 100%;
            border-spacing: 0 12px;
            border-collapse: separate;
        }
        .order_table thead tr th {
            background-color: #db4566;
            color: white;
            border: none;
            padding: 15px;
            font-weight: 700;
        }
        .order_table thead tr th:first-child { border-radius: 0 15px 15px 0; }
        .order_table thead tr th:last-child { border-radius: 15px 0 0 15px; }

        .order_table tbody tr {
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
            transition: all 0.3s ease;
        }
        .order_table tbody tr:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .order_table td {
            padding: 20px;
            vertical-align: middle;
            text-align: center;
            border-top: 1px solid #f1f1f1;
            border-bottom: 1px solid #f1f1f1;
        }
        .status_badge {
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
        }
        .status_pending { background: #fff3cd; color: #856404; }
        .status_delivered { background: #d4edda; color: #155724; }
        .product_img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid #f8f9fa;
        }
        .price_text {
            color: #db4566;
            font-weight: 700;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')

        <section class="orders_section">
            <div class="container">
                <div class="heading_container heading_center mb-5">
                    <h2 style="font-weight: 700;">طلباتي <span>الخاصة</span></h2>
                    <p>تابع حالة هداياك بكل سهولة من هنا</p>
                </div>

                <div class="table_container">
                    @if($orders->count() > 0)
                    <div class="table-responsive">
                        <table class="order_table">
                            <thead>
                                <tr>
                                    <th>المنتج</th>
                                    <th>اسم الهدية</th>
                                    <th>السعر</th>
                                    <th>حالة الطلب</th>
                                    <th>التاريخ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <img src="products/{{ $order->product->image }}" class="product_img" alt="صورة المنتج">
                                    </td>
                                    <td><strong>{{ $order->product->title }}</strong></td>
                                    <td><span class="price_text">{{ number_format($order->product->price, 2) }} ج.م</span></td>
                                    <td>
                                        @if($order->status == 'delivered')
                                            <span class="status_badge status_delivered">
                                                <i class="fa fa-check-circle"></i> تم التوصيل
                                            </span>
                                        @else
                                            <span class="status_badge status_pending">
                                                <i class="fa fa-clock-o"></i> قيد التنفيذ
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $order->created_at->translatedFormat('d M Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-5">
                        <img src="https://cdn-icons-png.flaticon.com/512/11329/11329073.png" style="width: 150px; opacity: 0.5;" alt="empty">
                        <h4 class="mt-4">لا يوجد طلبات حالياً..</h4>
                        <p>ابدأ بتسوق أجمل الهدايا الآن!</p>
                        <a href="{{ url('/shop') }}" class="btn btn-danger mt-3 px-5 py-2" style="border-radius: 50px;">اذهب للمتجر</a>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </div>

    @include('home.footer')
</body>
</html>