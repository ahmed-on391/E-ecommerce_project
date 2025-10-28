<!DOCTYPE html>
<html >

<head>
    @include('admin.css')
    <meta charset="UTF-8">
    <title>تعديل الفئة</title>

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
            padding: 35px 40px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            max-width: 600px;
            margin: 0 auto;
            transition: all 0.3s ease-in-out;
        }

        .form-section:hover {
            transform: translateY(-3px);
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

        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 10px 20px;
            width: 48%;
        }

        .btn-primary {
            background: #00b4d8;
            border: none;
        }

        .btn-primary:hover {
            background: #0091b2;
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <!-- ✅ Page Content -->
    <div class="page-content">
        <div class="container-fluid">
            <h2 class="page-title">Edit Category  </h2>

            <!-- ✅ Edit Form -->
            <div class="form-section">
                <form action="{{ route('update_category', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Name Category </label>
                        <input type="text" name="name" id="categoryName" class="form-control"
                               value="{{ $category->category_name }}" required>
                    </div>

                    <div class="btn-container">
                        <button type="submit" class="btn btn-primary">💾 update</button>
                        <a href="{{ route('view_category') }}" class="btn btn-secondary">❌ cansel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ✅ Scripts -->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>
</html>
