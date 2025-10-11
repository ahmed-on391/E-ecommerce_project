<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <title>Magment Category</title>
</head>

<body>
    @include('admin.header')

    @include('admin.sidebar')

    <!-- بداية محتوى الصفحة -->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                {{-- عنوان الصفحة --}}
                <h2 class="mb-4">Magment Category</h2>

                {{-- رسائل النجاح والخطأ --}}
                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                {{-- نموذج إضافة فئة جديدة --}}
                <form action="{{ url('add_category') }}" method="POST" class="mb-5">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Name Category</label>
                        <input type="text" name="name" id="categoryName" class="form-control"
                            placeholder="Enter Name Category" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>

                {{-- جدول عرض الفئات من قاعدة البيانات --}}
                <table class="table table-bordered text-center">
                    <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>اسم الفئة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>
                                <a href="{{ route('edit_category', $category->id) }}"
                                    class="btn btn-sm btn-warning">تعديل</a>
                                <form action="{{ route('delete_category', $category->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center">لا توجد فئات متاحة</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>
    <!-- نهاية محتوى الصفحة -->

    <!-- JavaScript files-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // مسك كل الفورمات اللي عليها كلاس delete-form
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault(); // وقف الإرسال

            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لن تتمكن من التراجع عن هذا!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'نعم، احذفها!',
                cancelButtonText: 'إلغاء',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // لو أكد → نفذ الفورم
                }
            });
        });
    });
    </script>

    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>