<!DOCTYPE html>
<html >

<head>
    @include('admin.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الفئات</title>

    <!-- 🎨 Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            background: #1e1f25;
            font-family: 'Cairo', sans-serif;
            color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        h2.page-title {
            color: #00b4d8;
            font-weight: 700;
            text-align: center;
            margin: 30px 0;
            letter-spacing: 1px;
        }

        /* 🔹 إضافة فئة جديدة */
        .form-section {
            background: #2a2c31;
            border-radius: 16px;
            padding: 30px;
            max-width: 600px;
            margin: 0 auto 50px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.45);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-section:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
        }

        label {
            font-weight: 600;
            color: #ccc;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            background: #1e1f25;
            border: 1px solid #444;
            color: #fff;
            border-radius: 10px;
            padding: 12px;
            width: 100%;
        }

        .form-control:focus {
            border-color: #00b4d8;
            box-shadow: 0 0 8px rgba(0, 180, 216, 0.4);
            outline: none;
        }

        .btn-primary {
            background: #00b4d8;
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 10px;
            width: 100%;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: #0087a3;
        }

        /* 📋 جدول الفئات */
        .table-container {
            background: #2a2c31;
            border-radius: 16px;
            padding: 25px;
            margin-top: 30px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.45);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #00b4d8;
            color: #fff;
        }

        th, td {
            padding: 14px 16px;
            border-bottom: 1px solid #444;
            text-align: center;
        }

        tr:hover {
            background: #24262b;
            transition: background 0.3s ease;
        }

        .btn-warning, .btn-danger {
            border: none;
            padding: 7px 14px;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn-warning {
            background: #f0ad4e;
            color: #fff;
        }

        .btn-warning:hover {
            background: #e6952c;
        }

        .btn-danger {
            background: #d9534f;
            color: #fff;
        }

        .btn-danger:hover {
            background: #c9302c;
        }

        /* ✅ تنبيهات */
        .alert {
            max-width: 600px;
            margin: 20px auto;
            border-radius: 10px;
            font-weight: 600;
        }

        /* 📱 موبايل */
        @media (max-width: 768px) {
            .form-section, .alert {
                width: 90%;
            }

            table th, table td {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="container-fluid">
            <h2 class="page-title"><i data-lucide="folder-plus" class="inline-block w-6 h-6"></i> إدارة الفئات</h2>

            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="form-section">
                <form action="{{ url('add_category') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="categoryName"><i data-lucide="tag" class="inline-block w-5 h-5"></i> اسم الفئة</label>
                        <input type="text" name="name" id="categoryName" class="form-control" placeholder="أدخل اسم الفئة..." required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i data-lucide="plus-circle" class="inline-block w-5 h-5"></i> إضافة فئة جديدة</button>
                </form>
            </div>

            <div class="table-container mt-4">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الفئة</th>
                            <th>التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="{{ route('edit_category', $category->id) }}" class="btn btn-warning btn-sm">
                                        <i data-lucide="edit-3" class="inline-block w-4 h-4"></i> تعديل
                                    </a>
                                    <form action="{{ route('delete_category', $category->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i data-lucide="trash-2" class="inline-block w-4 h-4"></i> حذف
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">🚫 لا توجد فئات حاليًا</td>
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
                    title: 'هل أنت متأكد؟',
                    text: "لن يمكنك التراجع بعد الحذف!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'نعم، احذفها',
                    cancelButtonText: 'إلغاء',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#00b4d8',
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
