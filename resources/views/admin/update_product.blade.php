<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <title>Update Product</title>
    <style>
        body {
            background: #2d3035;
            font-family: "Muli", sans-serif;
            color: #f1f1f1;
        }

        h2.page-title {
            color: #00b4d8;
            font-weight: 700;
            text-align: center;
            margin: 30px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-section {
            background: #3a3f44;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            max-width: 700px;
            margin: 0 auto 50px auto;
        }

        .form-label {
            font-weight: 600;
            color: #ddd;
        }

        .form-control {
            background: #2a2c31;
            border: 1px solid #555;
            color: #fff;
            border-radius: 8px;
            padding: 10px;
        }

        .form-control:focus {
            border-color: #00b4d8;
            box-shadow: 0 0 6px rgba(0, 180, 216, 0.4);
        }

        .btn-primary {
            background: #00b4d8;
            border: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 10px 20px;
            border-radius: 8px;
            width: 100%;
        }

        .btn-primary:hover {
            background: #0091b2;
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            width: 100%;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .product-img {
            width: 120px;
            height: 120px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid #555;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="container-fluid">
            <h2 class="page-title">Update Product</h2>

            <div class="form-section">
                <form action="{{ url('edit_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf   
                  

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $product->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $product->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" value="{{ $product->price }}" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-control" required>
                            <option value="" disabled>Select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_name }}" {{ $product->category == $category->category_name ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        @if($product->image)
                            <img src="/products/{{ $product->image }}" class="product-img" alt="Product Image">
                        @else
                            <p style="color:#aaa;">No image uploaded</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload New Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                        {{-- <a href="{{ route('update_product') }}" class="btn btn-secondary">Cancel</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>
