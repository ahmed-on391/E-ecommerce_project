<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;

use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->category_name= $request->name;
        $category->save();
        
                flash()->success('Product created successfully!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if($category) {
            $category->category_name = $request->name;
            $category->save();
            flash()->success('تم تحديث الفئة بنجاح!');
        }
        return redirect()->route('view_category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if($category) {
            $category->delete();
            flash()->success('تم حذف الفئة بنجاح!');
        }
        return redirect()->back();
    }

    public function add_product(Request $request)
    {

        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;

        $data ->title = $request->title;
        $data ->description = $request->description;
        $data ->price = $request->price;
        $data ->quantity = $request->qty;
        $data ->category = $request->category;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data ->image = $imagename;
            flash()->success('تم رفع الملفات بنجاح!');

        }

        $data ->save();
        return redirect()->back();
    }

    public function view_product()
    {
        $products = Product::paginate(5);
        return view('admin.view_product', compact('products'));
    }



    public function delete_product($id)
{
    $product = Product::find($id);

    if (!$product) {
        flash()->error('المنتج غير موجود!');
        return redirect()->back();
    }

    // 🟢 مسح المنتج من كل العربيات
    Cart::where('product_id', $id)->delete();

    // 🟢 مسح الصورة
    $imagePath = public_path('products/' . $product->image);
    if (!empty($product->image) && file_exists($imagePath)) {
        unlink($imagePath);
    }

    // 🟢 مسح المنتج
    $product->delete();

    flash()->success('تم حذف المنتج بنجاح!');
    return redirect()->back();
}
//    public function delete_product($id)
// {
//     $product = Product::find($id);

//     if ($product) {
//         $imagePath = public_path('products/' . $product->image);

//         // تأكد إن الصورة موجودة فعلاً وإنها ملف مش مجلد
//         if (!empty($product->image) && file_exists($imagePath) && is_file($imagePath)) {
//             unlink($imagePath);
//         }

//         $product->delete();
//         flash()->success('تم حذف المنتج بنجاح!');
//     } else {
//         flash()->error('المنتج غير موجود!');
//     }

//     return redirect()->back();
// }


    public function update_product($slug)   
    {
        $product = Product::where('slug', $slug)->get()->first();
        $categories = Category::all();
        return view('admin.update_product', compact('product', 'categories'));
    }

    public function edit_product(Request $request, $id)
    {
        $product = Product::find($id);
        if($product) {
            $product->title = request('title');
            $product->description = request('description');
            $product->price = request('price');
            $product->quantity = request('qty');
            $product->category = request('category');

            $image = request()->file('image');

            if($image)
            {
                $imagePath = public_path('products/' . $product->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath); 
                }

                $imagename = time().'.'.$image->getClientOriginalExtension();
                request()->file('image')->move('products', $imagename);
                $product->image = $imagename;
            }

            $product->save();
            flash()->success('تم تحديث المنتج بنجاح!');
        }
        return redirect('view_product');// يسطا خد بالك منها جدا
        
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('title', 'LIKE', "%$search%")->paginate(5);
        return view('admin.view_product', compact('products'));
    }

    
        public function view_orders()
        {
            $orders = Order::with('product')->latest()->get();
            return view('admin.orders', compact('orders'));
        }
    // public function view_orders()
    // {
    //     return view('admin.orders');
    // }

    public function on_the_way($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = 'on the way';
            $order->save();
            flash()->success('Order status updated to "on the way" successfully!');
        } else {
            flash()->error('Order not found!');
        }
        return redirect()->back();
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->status = 'delivered';
            $order->save();
            flash()->success('Order status updated to "delivered" successfully!');
        } else {
            flash()->error('Order not found!');
        }
        return redirect()->back();
    }
//  public function print_pdf($id)
// {
//     $order = Order::find($id);
    
//     // تأكد من المسار الصحيح للفولدر هنا
//     $pdf = Pdf::loadView('admin.invoice', compact('order'));

//     // stream بتفتح الـ PDF في المتصفح بدل ما تحمله فوراً
//     return $pdf->stream('invoice_'.$order->id.'.pdf');
// }

public function print_pdf($id)
{
    $order = \App\Models\Order::with('product')->find($id);
    if (!$order) return redirect()->back();

    $arabic = new \ArPHP\I18N\Arabic();
    $c = function($text) use ($arabic) { 
        return $arabic->utf8Glyphs($text); 
    };

    // تجهيز صورة المنتج بصيغة Base64 (عشان تظهر 100%)
    $imageData = null;
    $imagePath = public_path('products/' . $order->product->image);
    if ($order->product->image && file_exists($imagePath)) {
        $type = pathinfo($imagePath, PATHINFO_EXTENSION);
        $imgBinary = file_get_contents($imagePath);
        $imageData = 'data:image/' . $type . ';base64,' . base64_encode($imgBinary);
    }

    $data = [
        'order'         => $order,
        'product_image' => $imageData,
        'date'          => $order->created_at->format('Y-m-d'),
        'invoice_title' => $c('فاتورة ضريبية'),
        'store_name'    => 'MY-STORE',
        'tax_no'        => '123-456-789',
        'product_title' => $c($order->product->title ?? 'منتج'),
        'name'          => $c($order->name ?? 'عميل كاش'),
        'address'       => $c($order->address ?? 'غير مسجل'),
        // العناوين (Labels)
        'l_bill_to'     => $c('يُشحن إلى'),
        'l_seller'      => $c('تفاصيل البائع'),
        'l_description' => $c('الوصف'),
        'l_unit_price'  => $c('سعر الوحدة'),
        'l_qty'         => $c('الكمية'),
        'l_total_row'   => $c('الإجمالي'),
        'l_subtotal'    => $c('الإجمالي الفرعي'),
        'l_grand_total' => $c('الإجمالي النهائي'),
        'l_currency'    => $c('ج.م'),
        'l_img_label'   => $c('الصورة'), // جهزناها هنا عشان متبوظش الـ Blade
        'l_footer_note' => $c('هذه فاتورة إلكترونية صادرة عن النظام ولا تحتاج لختم'),
        'l_invoice_no'  => $c('رقم الفاتورة:'),
        'l_issue_date'  => $c('تاريخ الإصدار:'),
    ];

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('admin.invoice', $data);
    
    // تفعيل الصور الخارجية (للـ QR Code)
    $pdf->setOption(['isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true]);

    return $pdf->stream('Amazon_Invoice.pdf');
}
}