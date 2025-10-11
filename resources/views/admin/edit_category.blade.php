<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <title>تعديل الفئة</title>
</head>

<body>
    @include('admin.header')

    @include('admin.sidebar')

    <!-- بداية محتوى الصفحة -->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                {{-- عنوان الصفحة --}}
                <h2 class="mb-4">تعديل الفئة</h2>

                {{-- نموذج تعديل الفئة --}}
                <form action="{{ route('update_category', $category->id) }}" method="POST" class="mb-5">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">اسم الفئة</label>
                        <input type="text" name="name" id="categoryName" class="form-control" value="{{ $category->category_name }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">تحديث</button>
                    <a href="{{ route('view_category') }}" class="btn btn-secondary">إلغاء</a>
                </form>

            </div>
        </div>
    </div>
    <!-- نهاية محتوى الصفحة -->

    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>