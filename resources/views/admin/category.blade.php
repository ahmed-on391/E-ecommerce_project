<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Management</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            background: #0f111a; /* أغمق وأفخم */
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #e2e8f0;
            margin: 0;
        }

        .page-title {
            color: #fff;
            font-weight: 700;
            text-align: center;
            margin: 40px 0;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        /* ✨ Advanced Glassmorphism Card */
        .form-section {
            background: #161b22;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 35px;
            max-width: 650px;
            margin: 0 auto 50px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        }

        label {
            font-weight: 600;
            color: #94a3b8;
            margin-bottom: 10px;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-control {
            background: #0d1117 !important;
            border: 1px solid #30363d !important;
            color: #fff !important;
            border-radius: 12px;
            padding: 14px;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-control:focus {
            border-color: #58a6ff !important;
            box-shadow: 0 0 0 4px rgba(88, 166, 255, 0.15) !important;
            outline: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #00b4d8, #0077b6);
            border: none;
            padding: 14px;
            font-weight: 700;
            border-radius: 12px;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 180, 216, 0.4);
            filter: brightness(1.1);
        }

        /* 📋 Premium Table Styling */
        .table-container {
            background: #161b22;
            border-radius: 20px;
            padding: 10px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        thead {
            background: rgba(255, 255, 255, 0.03);
        }

        th {
            padding: 20px;
            color: #94a3b8;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            font-weight: 700;
            border-bottom: 1px solid #30363d;
        }

        td {
            padding: 18px;
            border-bottom: 1px solid #30363d;
            font-size: 0.95rem;
            color: #cbd5e1;
        }

        tr:last-child td { border-bottom: none; }

        tr:hover td {
            background: rgba(255, 255, 255, 0.02);
            color: #fff;
        }

        /* 🔘 Actions Buttons */
        .btn-action {
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: 0.2s;
            text-decoration: none !important;
        }

        .btn-warning {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .btn-warning:hover {
            background: #f59e0b;
            color: #fff;
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .btn-danger:hover {
            background: #ef4444;
            color: #fff;
        }

        .alert-modern {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #10b981;
            border-radius: 12px;
            padding: 15px 25px;
            max-width: 650px;
            margin: 0 auto 20px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="container-fluid">
            
            <h2 class="page-title">
                <i data-lucide="layout-grid"></i> Category Management
            </h2>

            @if(session()->has('message'))
                <div class="alert-modern d-flex justify-content-between align-items-center animate__animated animate__fadeIn">
                    <span><i data-lucide="check-circle" class="mr-2"></i> {{ session()->get('message') }}</span>
                    <button type="button" class="close text-success" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <div class="form-section">
                <form action="{{ url('add_category') }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="categoryName"><i data-lucide="type" style="width: 18px"></i> Category Name</label>
                        <input type="text" name="name" id="categoryName" class="form-control" placeholder="Enter category title..." required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i data-lucide="plus"></i> Create Category
                    </button>
                </form>
            </div>

            <div class="table-container container">
                <table class="text-center">
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
                                <td style="color: #64748b;">{{ $key + 1 }}</td>
                                <td class="font-weight-bold">{{ $category->category_name }}</td>
                                <td class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('edit_category', $category->id) }}" class="btn-action btn-warning">
                                        <i data-lucide="edit-3" style="width: 14px"></i> Edit
                                    </a>
                                    <form action="{{ route('delete_category', $category->id) }}" method="POST" class="delete-form m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-danger border-0">
                                            <i data-lucide="trash-2" style="width: 14px"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-5 text-muted">No categories available yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
                    text: "You won't be able to revert this!",
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