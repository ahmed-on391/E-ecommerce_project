<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

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

        $imagePath = public_path('products/' . $product->image);
        if (file_exists($imagePath)) {
            unlink($imagePath); 
        }

        if($product) {
            $product->delete();
            flash()->success('تم حذف المنتج بنجاح!');
        }
        return redirect()->back();
    }

    public function update_product($id)   
    {
        $product = Product::find($id);
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
}