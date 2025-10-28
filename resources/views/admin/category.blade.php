<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <title>Manage Categories</title>

    <style>
        /* 🎨 General Styling */
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

        /* 🔹 Add Category Box */
        .form-section {
            background: #3a3f44;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            max-width: 600px;
            margin: 0 auto 50px auto;
            transition: all 0.3s ease-in-out;
        }

        .form-section:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.5);
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

        /* 📋 Category Table */
        .table-container {
            background: #3a3f44;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #00b4d8;
            color: #fff;
            text-transform: uppercase;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #555;
            text-align: center;
        }

        tr:hover {
            background: #2b2e33;
            transition: 0.3s;
        }

        .btn-warning, .btn-danger {
            border: none;
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
        }

        .btn-warning {
            background: #f0ad4e;
        }

        .btn-warning:hover {
            background: #ec971f;
        }

        .btn-danger {
            background: #d9534f;
        }

        .btn-danger:hover {
            background: #c9302c;
        }

        /* ✅ Success Alert */
        .alert {
            max-width: 600px;
            margin: 20px auto;
            border-radius: 8px;
            font-weight: 500;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="container-fluid">

            <h2 class="page-title">Manage Categories</h2>

            {{-- ✅ Success Message --}}
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- ✅ Add Category Form --}}
            <div class="form-section">
                <form action="{{ url('add_category') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" name="name" id="categoryName" class="form-control"
                            placeholder="Enter category name..." required>
                    </div>
                    <button type="submit" class="btn btn-primary">➕ Add New Category</button>
                </form>
            </div>

            {{-- ✅ Category Table --}}
            <div class="table-container mt-4">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="{{ route('edit_category', $category->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                                    <form action="{{ route('delete_category', $category->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">🗑️ Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">🚫 No categories found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
