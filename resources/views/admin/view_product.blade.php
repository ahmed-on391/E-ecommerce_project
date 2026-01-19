<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory | All Products</title>
    @include('admin.css')

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            background: #0f111a; /* Dark Luxury Theme */
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #e2e8f0;
            margin: 0;
        }

        .page-header h2 {
            color: #fff;
            font-weight: 700;
            text-align: center;
            margin: 35px 0 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        /* 🔍 Modern Search Bar */
        .search-box {
            text-align: center;
            margin-bottom: 35px;
            position: relative;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-box input[type="text"] {
            width: 100%;
            padding: 14px 20px 14px 45px;
            border: 1px solid #30363d;
            border-radius: 14px;
            background: #161b22;
            color: #fff;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .search-box i.search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
        }

        .search-box input[type="text"]:focus {
            border-color: #00b4d8;
            box-shadow: 0 0 0 4px rgba(0, 180, 216, 0.15);
            outline: none;
        }

        /* 📋 Premium Table Styling */
        .table-container {
            background: #161b22;
            border-radius: 20px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            text-align: center;
        }

        th {
            background: rgba(255, 255, 255, 0.03);
            color: #94a3b8;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            font-weight: 700;
            padding: 18px;
            border-bottom: 1px solid #30363d;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #30363d;
            vertical-align: middle;
            font-size: 0.9rem;
            color: #cbd5e1;
        }

        tr:last-child td { border-bottom: none; }

        tr:hover td {
            background: rgba(255, 255, 255, 0.02);
            transition: 0.2s;
        }

        /* 🖼 Product Image */
        .product-img {
            width: 55px;
            height: 55px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid #30363d;
            transition: transform 0.3s;
        }

        .product-img:hover {
            transform: scale(1.2);
            cursor: zoom-in;
        }

        /* 🔘 Action Buttons */
        .btn-action {
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none !important;
            transition: 0.2s;
        }

        .btn-edit {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .btn-edit:hover {
            background: #f59e0b;
            color: #fff;
        }

        .btn-delete {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-delete:hover {
            background: #ef4444;
            color: #fff;
        }

        /* 📄 Pagination Styling */
        .pagination-wrapper {
            margin-top: 30px;
            display: flex;
            justify-content: center;
        }

        .pagination .page-link {
            background-color: #161b22;
            border: 1px solid #30363d;
            color: #94a3b8;
            margin: 0 3px;
            border-radius: 8px !important;
        }

        .pagination .page-item.active .page-link {
            background-color: #00b4d8;
            border-color: #00b4d8;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2><i data-lucide="package" style="color:#00b4d8"></i> Inventory List</h2>

                <div class="search-box">
                    <i data-lucide="search" class="search-icon" style="width: 18px"></i>
                    <form action="{{ url('product_search') }}" method="GET">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products by title or category...">
                    </form>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>    

                        <tbody>
                            @forelse($products as $key => $product)
                                <tr>
                                    <td style="color:#64748b">{{ $key + 1 }}</td>
                                    <td class="font-weight-bold" style="color: #fff;">{{ $product->title }}</td>
                                    <td class="text-muted">{{ Str::limit($product->description, 35) }}</td>
                                    <td style="color: #10b981; font-weight: 600;">${{ number_format($product->price, 2) }}</td>
                                    <td>
                                        <span class="badge {{ $product->quantity > 5 ? 'bg-dark' : 'bg-danger' }}">
                                            {{ $product->quantity }}
                                        </span>
                                    </td>
                                    <td><span class="text-info">#{{ $product->category }}</span></td>

                                    <td>
    @if($product->image)
        <div class="position-relative overflow-hidden mx-auto"
             style="width:55px;height:55px;border-radius:10px;border:1px solid #30363d;background:#111;">
             
            <img
                src="{{ file_exists(public_path('products/' . $product->image))
                        ? asset('products/' . $product->image)
                        : $product->image }}"
                alt="{{ $product->title }}"
                style="width:100%;height:100%;object-fit:cover;transition:0.4s;"
                onmouseover="this.style.transform='scale(1.15)'"
                onmouseout="this.style.transform='scale(1)'"
            >

            <span class="position-absolute top-0 end-0 badge rounded-pill"
                  style="background:#db4566;font-size:10px;padding:3px 6px;">
                جديد
            </span>
        </div>
    @else
        <i data-lucide="image-off" style="color:#444"></i>
    @endif
</td>

                                    {{-- <td>
                                        @if($product->image)
                                            <img src="/products/{{ $product->image }}" class="product-img" alt="Product">
                                        @else
                                            <i data-lucide="image-off" style="color:#444"></i>
                                        @endif
                                    </td> --}}
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ url('update_product', $product->slug) }}" class="btn-action btn-edit">
                                                <i data-lucide="edit-3" style="width: 14px"></i>
                                            </a>
                                            <form action="{{ url('delete_product', $product->id) }}" method="POST" class="delete-form m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action btn-delete border-0">
                                                    <i data-lucide="trash-2" style="width: 14px"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-5 text-muted">
                                        <i data-lucide="search-x" class="d-block mx-auto mb-2" style="width: 40px; height: 40px;"></i>
                                        No products match your search.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="pagination-wrapper">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        lucide.createIcons();

        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This product will be permanently removed!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Yes, delete it!',
                    background: '#161b22',
                    color: '#fff'
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
</body>
</html>