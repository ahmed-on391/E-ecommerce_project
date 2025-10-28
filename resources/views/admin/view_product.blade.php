<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Products</title>
    @include('admin.css')

    <style>
        body {
            background: #2d3035;
            font-family: "Muli", sans-serif;
            color: #fff;
        }

        .page-header h2 {
            color: #00b4d8;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }

        .table-container {
            background: #3a3f44;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: #fff;
            text-align: center;
        }

        th, td {
            padding: 12px 10px;
            border-bottom: 1px solid #555;
            vertical-align: middle;
        }

        th {
            background: #00b4d8;
            color: #fff;
            text-transform: uppercase;
            font-size: 14px;
        }

        tr:hover {
            background: #2b2e33;
            transition: 0.3s;
        }

        .btn {
            padding: 6px 15px;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
            color: #fff;
            display: inline-block;
            margin: 2px;
        }

        .btn-edit {
            background: #f0ad4e;
        }

        .btn-edit:hover {
            background: #ec971f;
        }

        .btn-delete {
            background: #d9534f;
        }

        .btn-delete:hover {
            background: #c9302c;
        }

        .product-img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
            border: 1px solid #555;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            margin-top: 25px;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination li a, 
        .pagination li span {
            color: #fff;
            background-color: #00b4d8;
            border-radius: 6px;
            padding: 6px 12px;
            text-decoration: none;
            transition: 0.3s;
        }

        .pagination li a:hover {
            background-color: #0091b2;
        }

        .pagination .active span {
            background-color: #0091b2;
            color: #fff;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2>All Products</h2>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>{{ Str::limit($product->description, 40) }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>
                                        @if($product->image)
                                            <img src="/products/{{ $product->image }}" class="product-img" alt="Product">
                                        @else
                                            <span style="color:#aaa;">No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('update_product', $product->id) }}" class="btn btn-edit">Edit</a>
                                        {{-- <a href="{{ url('delete_product', $product->id) }}" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a> --}}

                                        <form action="{{ url('delete_product', $product->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" style="color:#aaa;">No products found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div>
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    
    <!-- ✅ SweetAlert لحذف الفئة -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'هل أنت متأكد؟',
                    text: "لن يمكنك التراجع بعد الحذف!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'نعم، احذفها',
                    cancelButtonText: 'إلغاء',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>
</html>
