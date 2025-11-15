<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }
#---------------------------------------------------------------------------



   public function home()
{
    $product = Product::all();

    $user = Auth::user();

    // القيمة الافتراضية
    $count = 0;

    // لو اليوزر مسجّل دخول
    if ($user) {
        $count = Cart::where('user_id', $user->id)->count();
    }

    return view('home.index', compact('product', 'count'));
}



    #---------------------------------------------------------------------------
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function product_details($id)
    {
        $data = Product::find($id);
        return view('home.product_details', compact('data'));
    }
     
    // public function add_cart($id)
    // {
    //     $product_id = $id;

    //     $user = Auth::user();
    //     $user_id = $user->id;
    //     $data = new Cart;
    //     $data->user_id = $user_id;
    //     $data->product_id = $product_id;
    //     $data->save();  

    //             flash()->success('Product created successfully!');

    //     return redirect()->back();
    // }

    public function add_cart($id)
{
    $user = Auth::user();

    




    // لو المستخدم مش مسجل دخول
    if (!$user) {
        return redirect()->route('login')->with('error', 'من فضلك سجل الدخول أولاً 🛒');
    }

    // التحقق لو المنتج مضاف بالفعل
    $existing = Cart::where('user_id', $user->id)
                    ->where('product_id', $id)
                    ->first();

    if ($existing) {
        return redirect()->back()->with('info', 'المنتج موجود بالفعل في العربة 😊');
    }

    // إضافة المنتج
    $cart = new Cart();
    $cart->user_id = $user->id;
    $cart->product_id = $id;
    $cart->save();

    return redirect()->back()->with('success', 'تم إضافة المنتج إلى العربة بنجاح 🛍️');
}

    public function mycart()
    {
       if(Auth::id())
       {
        $user=Auth::user();
        $userid=$user->id;
        $count=Cart::where('user_id',$userid)->count();

        $cart=Cart::where('user_id',$userid)->get();

        return view('home.mycart',compact('count' , 'cart'));
       }
       else
       {
        return redirect('login');
       }
    }

}