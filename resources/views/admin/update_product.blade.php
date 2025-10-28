<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <title>Update Product</title>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background: #181a20;
            font-family: "Poppins", sans-serif;
            color: #eaeaea;
        }

        h2.page-title {
            color: #0dcaf0;
            font-weight: 700;
            text-align: center;
            margin: 40px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-section {
            background: linear-gradient(145deg, #1e2027, #252830);
            border-radius: 18px;
            padding: 40px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
            max-width: 750px;
            margin: 0 auto 50px auto;
            transition: all 0.3s ease-in-out;
        }

        .form-section:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 30px rgba(0, 180, 216, 0.3);
        }

        .form-label {
            font-weight: 600;
            color: #cfcfcf;
            margin-bottom: 6px;
        }

        .form-label i {
            color: #00b4d8;
            margin-right: 6px;
        }

        .form-control {
            background: #202228;
            border: 1px solid #333;
            color: #fff;
            border-radius: 10px;
            padding: 12px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #0dcaf0;
            box-shadow: 0 0 8px rgba(13, 202, 240, 0.4);
            background: #262831;
        }

        .btn-primary {
            background: linear-gradient(45deg, #00b4d8, #0096c7);
            border: none;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 10px;
            width: 48%;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: linear-gradient(45deg, #0096c7, #00b4d8);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #5a6268;
            border: none;
            border-radius: 10px;
            padding: 12px 20px;
            width: 48%;
            transition: 0.3s;
        }

        .btn-secondary:hover {
            background: #4b5054;
            transform: translateY(-2px);
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
        }

        .product-img {
            width: 130px;
            height: 130px;
            border-radius: 12px;
            object-fit: cover;
            border: 2px solid #444;
            margin-top: 10px;
            transition: 0.3s;
        }

        .product-img:hover {
            transform: scale(1.05);
            border-color: #00b4d8;
        }

        label i {
            width: 22px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="container-fluid">
            <h2 class="page-title"><i class="fa-solid fa-pen-to-square"></i> Update Product</h2>

            <div class="form-section">
                <form id="updateForm" action="{{ url('edit_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label"><i class="fa-solid fa-tag"></i> Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $product->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fa-solid fa-align-left"></i> Description</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $product->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fa-solid fa-dollar-sign"></i> Price</label>
                        <input type="number" name="price" class="form-control" value="{{ $product->price }}" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fa-solid fa-boxes-stacked"></i> Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fa-solid fa-list"></i> Category</label>
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
                        <label class="form-label"><i class="fa-solid fa-image"></i> Current Image</label><br>
                        @if($product->image)
                            <img src="/products/{{ $product->image }}" class="product-img" alt="Product Image">
                        @else
                            <p style="color:#aaa;">No image uploaded</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fa-solid fa-upload"></i> Upload New Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="btn-group">
                        <button type="button" id="submitBtn" class="btn btn-primary">
                            <i class="fa-solid fa-check"></i> Update
                        </button>
                        <a href="{{ route('view_product') }}" class="btn btn-secondary">
                            <i class="fa-solid fa-xmark"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to update this product?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#00b4d8',
                cancelButtonColor: '#6c757d',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('updateForm').submit();
                }
            });
        });
    </script>
</body>
</html>
