<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>لوحة التحكم - الطلبات الاحترافية</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --bg: #f8fafc;
      --card: #ffffff;
      --primary: #1e293b;
      --secondary: #64748b;
      --accent: #3b82f6;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --border: #e2e8f0;
    }

    * { box-sizing: border-box; font-family: 'Cairo', sans-serif; }
    body { background: var(--bg); color: var(--primary); margin: 0; padding: 40px 20px; line-height: 1.6; }
    .container { max-width: 1300px; margin: 0 auto; }

    /* Header Styling */
    .page-header { margin-bottom: 30px; border-right: 5px solid var(--accent); padding-right: 15px; }
    .page-header h1 { margin: 0; font-size: 28px; font-weight: 700; color: var(--primary); }
    .page-header p { margin: 5px 0 0; color: var(--secondary); font-size: 15px; }

    /* Card Styling */
    .card { 
      background: var(--card); 
      border-radius: 16px; 
      box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
      overflow: hidden;
      border: 1px solid var(--border);
    }

    /* Table Styling */
    table { width: 100%; border-collapse: collapse; background: white; }
    thead th { 
      background: #f1f5f9; 
      color: var(--secondary); 
      text-align: right; 
      padding: 16px; 
      font-size: 14px; 
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    tbody td { padding: 16px; border-bottom: 1px solid var(--border); font-size: 15px; vertical-align: middle; }
    tbody tr:hover { background: #f8fafc; transition: 0.3s; }

    /* Product Image */
    .prod-img { 
      width: 60px; height: 60px; border-radius: 12px; 
      object-fit: cover; border: 1px solid var(--border);
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    /* Badges Styling (Soft Colors) */
    .badge {
      padding: 6px 12px; border-radius: 8px; font-size: 12px; font-weight: 600; display: inline-block;
    }
    .badge-red { background: #fee2e2; color: #991b1b; }
    .badge-sky { background: #e0f2fe; color: #075985; }
    .badge-yellow { background: #fef3c7; color: #92400e; }

    /* Buttons Actions */
    .btn {
      padding: 8px 14px; border-radius: 8px; text-decoration: none; 
      font-size: 13px; font-weight: 600; transition: 0.2s; display: inline-flex; align-items: center; gap: 5px;
      border: none; cursor: pointer;
    }
    .btn-status { background: #f1f5f9; color: var(--primary); border: 1px solid var(--border); margin-bottom: 4px; }
    .btn-status:hover { background: var(--accent); color: white; border-color: var(--accent); }
    
    .btn-view { background: #eff6ff; color: #1d4ed8; }
    .btn-view:hover { background: #1d4ed8; color: white; }
    
    .btn-delete { background: #fff1f2; color: #be123c; }
    .btn-delete:hover { background: #be123c; color: white; }

    .action-group { display: flex; flex-direction: column; gap: 4px; }
    .flex-actions { display: flex; gap: 8px; }

    @media (max-width: 1024px) {
      table, thead, tbody, th, td, tr { display: block; }
      thead tr { display: none; }
      tr { margin-bottom: 15px; border: 1px solid var(--border); border-radius: 12px; padding: 10px; }
      td { text-align: left; padding: 8px 10px; border: none; position: relative; padding-right: 50%; }
      td::before { content: attr(data-label); position: absolute; right: 10px; font-weight: bold; color: var(--secondary); }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="page-header">
      <h1>إدارة الطلبات</h1>
      <p>متابعة وتحديث حالة الشحنات والعملاء</p>
    </div>

    <div class="card">
      <table>
        <thead>
          <tr>
            <th>العميل</th>
            <th>المنتج</th>
            <th>السعر</th>
            <th>التاريخ</th>
            <th>الحالة</th>
            <th>تحديث الحالة</th>
            <th>الإجراءات</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)
          <tr>
            <td data-label="العميل">
              <div style="font-weight: 700;">{{ $order->name }}</div>
              <div style="font-size: 12px; color: var(--secondary);">{{ $order->phone }}</div>
            </td>

            <td data-label="المنتج">
              <div style="display: flex; align-items: center; gap: 10px;">
                @if ($order->product && $order->product->image)
                  <img src="{{ asset('products/' . $order->product->image) }}" class="prod-img">
                @endif
                <span>{{ $order->product->title ?? '—' }}</span>
              </div>
            </td>

            <td data-label="السعر">
              <span style="font-weight: 700; color: var(--accent);">{{ $order->product->price ?? 0 }} EGP</span>
            </td>

            <td data-label="التاريخ">{{ $order->created_at->format('M d, Y') }}</td>

            <td data-label="الحالة">
              <span class="badge 
                @if($order->status == 'in progress') badge-red
                @elseif($order->status == 'on the way') badge-sky
                @elseif($order->status == 'delivered') badge-yellow
                @endif">
                @if($order->status == 'in progress') قيد المعالجة
                @elseif($order->status == 'on the way') في الطريق
                @elseif($order->status == 'delivered') تم التوصيل
                @else {{ $order->status }}
                @endif
              </span>
            </td>

            <td data-label="تحديث الحالة">
              <div class="action-group">
                <a href="{{ url('on_the_way/'.$order->id) }}" class="btn btn-status">🚚 شحن الطلب</a>
                <a href="{{ url('delivered/'.$order->id) }}" class="btn btn-status">✅ تم الاستلام</a>
              </div>
            </td>

            <td data-label="الإجراءات">
              <div class="flex-actions">

                <a href="{{ url('print_pdf', $order->id) }}" class="btn" style="background: #fdf2f2; color: #dc2626; border: 1px solid #fee2e2;" title="تحميل PDF">
       📄 فاتورة
    </a>
                <a href="{{ url('/order_view', $order->id) }}" class="btn btn-view">عرض</a>
                <a href="{{ url('/delete_order', $order->id) }}" class="btn btn-delete" onclick="return confirm('حذف الطلب؟')">حذف</a>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>