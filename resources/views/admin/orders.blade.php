<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>لوحة التحكم - الطلبات</title>

  <style>
    :root{--bg:#f5f7fb;--card:#ffffff;--muted:#6b7280;--primary:#0f172a;--accent:#059669}
    *{box-sizing:border-box;font-family:Inter, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial}
    body{background:var(--bg);color:var(--primary);margin:0;padding:24px}
    .container{max-width:1200px;margin:0 auto}
    .card{background:var(--card);padding:20px;border-radius:12px;box-shadow:0 6px 20px rgba(2,6,23,0.06)}
    h1{margin:0 0 12px 0;font-size:22px}
    table{width:100%;border-collapse:collapse;margin-top:12px}
    thead th{background:#f1f5f9;color:#111827;text-align:right;padding:12px;border-bottom:1px solid #e6edf3}
    tbody td{padding:12px;border-bottom:1px solid #eef2f6;vertical-align:middle}
    tbody tr:hover{background: #fbfdff}
    .badge{display:inline-block;padding:6px 10px;border-radius:999px;font-size:13px}
    .badge-green{background:#ecfdf5;color:#065f46}
    .badge-yellow{background:#fffbeb;color:#92400e}
    .badge-red{background:#fff1f2;color:#991b1b}
    .actions a{display:inline-block;margin-left:6px;padding:6px 10px;border-radius:8px;text-decoration:none;color:#fff}
    .btn-view{background:#2563eb}
    .btn-delete{background:#dc2626}
    .muted{color:var(--muted);font-size:14px}
    .right{text-align:right}
    .left{text-align:left}

    @media (max-width:900px){
      thead{display:none}
      tbody td{display:block;padding:10px}
      tbody td::before{content:attr(data-label);display:block;font-weight:600;color:#111827}
      .actions{margin-top:8px}
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="card">
      <h1>إدارة الطلبات</h1>
      <p class="muted">قائمة بجميع الطلبات الواردة. يمكنك تعديل الحالة، حذف أو عرض تفاصيل الطلب.</p>

      <table role="table" aria-label="Orders table">
        <thead>
          <tr>
            <th>#</th>
            <th>اسم العميل</th>
            <th>رقم الهاتف</th>
            <th>العنوان</th>
            <th>المنتج</th>
            <th>السعر</th>
            <th>التاريخ</th>
            <th>الحالة</th>
            <th>التحكم</th>
          </tr>
        </thead>

        <tbody>

          @foreach ($orders as $index => $order)
          <tr>
            <td data-label="#">
              {{ $index + 1 }}
            </td>

            <td data-label="اسم العميل">
              {{ $order->name }}
            </td>

            <td data-label="رقم الهاتف">
              {{ $order->phone }}
            </td>

            <td data-label="العنوان">
              {{ $order->address }}
            </td>

            <td data-label="المنتج">
              {{ $order->product->title ?? '—' }}
            </td>
  <td>
        @if ($order->product && $order->product->image)
            <img src="{{ asset('products/' . $order->product->image) }}" 
                 width="80" 
                 height="80" 
                 style="border-radius: 10px;">
        @else
            لا توجد صورة
        @endif
    </td>

    <td>{{ $order->product->title ?? '—' }}</td>

            <td data-label="السعر">
              {{ $order->product->price ?? 0 }} EGP
            </td>

            <td data-label="التاريخ">
              {{ $order->created_at->format('Y-m-d') }}
            </td>

            <td data-label="الحالة">
              <span class="badge badge-green">
                {{ $order->status ?? 'in progress' }}
              </span>
            </td>

            <td data-label="التحكم" class="actions left">
              <a href="{{ url('/order_view', $order->id) }}" class="btn-view">عرض</a>

              <a href="{{ url('/delete_order', $order->id) }}"
                 class="btn-delete"
                 onclick="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">
                حذف
              </a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
