<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>إضافة منتج جديد</title>
    @include('admin.css')

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

        /* 📦 صندوق النموذج */
        .form-container {
            max-width: 700px;
            margin: 40px auto;
            background: #2a2c31;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.6);
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #ccc;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #444;
            border-radius: 10px;
            background: #1e1f25;
            color: #fff;
            margin-bottom: 18px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #00b4d8;
            box-shadow: 0 0 6px rgba(0, 180, 216, 0.4);
            outline: none;
        }

        .btn-primary {
            background: #00b4d8;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #0091b2;
        }

        /* ✅ Responsive */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="container-fluid">
            <h2 class="page-title"><i data-lucide="package-plus" class="inline-block w-6 h-6"></i> إضافة منتج جديد</h2>

            <div class="form-container">
                <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label><i data-lucide="type" class="inline-block w-5 h-5"></i> اسم المنتج</label>
                        <input type="text" name="title" class="form-control" placeholder="أدخل اسم المنتج..." required>
                    </div>

                    <div>
                        <label><i data-lucide="file-text" class="inline-block w-5 h-5"></i> الوصف</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="أدخل وصف المنتج..." required></textarea>
                    </div>

                    <div>
                        <label><i data-lucide="dollar-sign" class="inline-block w-5 h-5"></i> السعر</label>
                        <input type="number" name="price" class="form-control" placeholder="أدخل السعر..." step="0.01" required>
                    </div>

                    <div>
                        <label><i data-lucide="hash" class="inline-block w-5 h-5"></i> الكمية</label>
                        <input type="number" name="qty" class="form-control" placeholder="أدخل الكمية المتوفرة..." required>
                    </div>

                    <div>
                        <label><i data-lucide="tag" class="inline-block w-5 h-5"></i> فئة المنتج</label>
                        <select name="category" class="form-control" required>
                            <option disabled selected>-- اختر الفئة --</option>
                            @foreach($category as $cat)
                                <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label><i data-lucide="image" class="inline-block w-5 h-5"></i> صورة المنتج</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <button type="submit" class="btn-primary">
                        <i data-lucide="plus-circle" class="inline-block w-5 h-5"></i> إضافة المنتج
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
