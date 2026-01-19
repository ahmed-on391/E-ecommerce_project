<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product</title>
    @include('admin.css')

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            background: #0f111a; /* Dark Luxury Background */
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #e2e8f0;
            margin: 0;
        }

        .page-title {
            color: #fff;
            font-weight: 700;
            text-align: center;
            margin: 40px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        /* ✨ Premium Form Card */
        .form-container {
            max-width: 650px;
            margin: 0 auto 60px;
            background: #161b22;
            border-radius: 20px;
            padding: 35px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-5px);
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
            font-size: 0.95rem;
            margin-bottom: 22px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #00b4d8 !important;
            box-shadow: 0 0 0 4px rgba(0, 180, 216, 0.15) !important;
            outline: none;
        }

        /* 🔘 Action Button */
        .btn-submit {
            background: linear-gradient(135deg, #00b4d8, #0077b6);
            border: none;
            padding: 16px;
            font-weight: 700;
            border-radius: 12px;
            width: 100%;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 180, 216, 0.2);
        }

        .btn-submit:hover {
            filter: brightness(1.1);
            box-shadow: 0 12px 25px rgba(0, 180, 216, 0.4);
        }

        /* Custom style for File input */
        input[type="file"] {
            padding: 10px;
            line-height: 1;
        }

        @media (max-width: 768px) {
            .form-container { width: 90%; padding: 25px; }
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="container-fluid">
            
            <h2 class="page-title">
                <i data-lucide="package-plus" style="color: #00b4d8"></i> Add New Product
            </h2>

            <div class="form-container">
                <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label><i data-lucide="type" style="width:18px"></i> Product Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter product name..." required>
                    </div>

                    <div class="form-group">
                        <label><i data-lucide="file-text" style="width:18px"></i> Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Describe the product details..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label><i data-lucide="dollar-sign" style="width:18px"></i> Price</label>
                        <input type="number" name="price" class="form-control" placeholder="0.00" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label><i data-lucide="hash" style="width:18px"></i> Stock Quantity</label>
                        <input type="number" name="qty" class="form-control" placeholder="Quantity available" required>
                    </div>

                    <div class="form-group">
                        <label><i data-lucide="tag" style="width:18px"></i> Category</label>
                        <select name="category" class="form-control" required>
                            <option disabled selected>-- Select a Category --</option>
                            @foreach($category as $cat)
                                <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label><i data-lucide="image" style="width:18px"></i> Product Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <button type="submit" class="btn-submit">
                        <i data-lucide="plus-circle"></i> Add Product Now
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>