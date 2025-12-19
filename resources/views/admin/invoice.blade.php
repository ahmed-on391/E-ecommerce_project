<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; direction: ltr; text-align: right; color: #111; padding: 15px; font-size: 11px; }
        .header { width: 100%; border-bottom: 2px solid #111; padding-bottom: 10px; margin-bottom: 20px; }
        .store-logo { font-size: 24px; font-weight: bold; color: #ff9900; } /* Amazon Orange */
        .section-header { background: #f3f3f3; padding: 5px; font-weight: bold; margin-bottom: 10px; border: 1px solid #ddd; }
        
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        .items-table th { border-bottom: 2px solid #111; padding: 8px; text-align: center; background: #fafafa; }
        .items-table td { padding: 8px; border-bottom: 1px solid #eee; text-align: center; vertical-align: middle; }
        
        .product-img { width: 50px; height: 50px; border: 1px solid #ddd; }
        .totals-table { width: 200px; margin-left: auto; margin-right: 0; }
        .grand-total { font-weight: bold; border-top: 1px solid #111; font-size: 13px; }
        .qr-section { text-align: center; margin-top: 30px; }
    </style>
</head>
<body>

    <table class="header">
        <tr>
            <td style="text-align: left; vertical-align: bottom;">
                <strong>{{ $invoice_title }}</strong><br>
                {{ $order->id }} {{ $l_invoice_no }} <br>
                {{ $date }} {{ $l_issue_date }}
            </td>
            <td style="text-align: right;">
                <div class="store-logo">{{ $store_name }}</div>
                <div>الرقم الضريبي: {{ $tax_no }}</div>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 50%; vertical-align: top;">
                <div class="section-header">{{ $l_bill_to }}</div>
                <strong>{{ $name }}</strong><br>{{ $order->phone }}<br>{{ $address }}
            </td>
            <td style="width: 50%; vertical-align: top; text-align: right;">
                <div class="section-header">{{ $l_seller }}</div>
                <strong>{{ $store_name }} Official</strong><br>Cairo, Egypt
            </td>
        </tr>
    </table>

    <table class="items-table">
        <thead>
            <tr>
                <th>{{ $l_total_row }}</th>
                <th>{{ $l_qty }}</th>
                <th>{{ $l_unit_price }}</th>
                <th>{{ $l_description }}</th>
                <th>{{ $l_img_label }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->product->price }}</td>
                <td>1</td>
                <td>{{ $order->product->price }}</td>
                <td style="text-align: right;">
                    <strong>{{ $product_title }}</strong><br>
                    <small>SKU: ITM-{{ $order->product->id }}</small>
                </td>
                <td>
                    @if($product_image)
                        <img src="{{ $product_image }}" class="product-img">
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <table class="totals-table">
        <tr>
            <td style="text-align: left;">{{ $order->product->price }} {{ $l_currency }}</td>
            <td>{{ $l_subtotal }}</td>
        </tr>
        <tr class="grand-total">
            <td style="text-align: left;">{{ $order->product->price }} {{ $l_currency }}</td>
            <td>{{ $l_grand_total }}</td>
        </tr>
    </table>

    <div class="qr-section">
        <img src="https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=OrderID:{{ $order->id }}" width="70">
        <div style="margin-top: 5px; color: #888;">{{ $l_footer_note }}</div>
    </div>

</body>
</html>