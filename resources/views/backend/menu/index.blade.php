@include('nav.menu')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lí menu sách truyện </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <a href="{{ route('menu.create') }}" class="btn btn-success" style="margin-right: 15px;"><i class="fa-solid fa-plus"></i></a>
                    <a href="{{ route('menu.trash') }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                </div>


            </div>
        </nav>
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

    </div>
    <div class="container-fluid">
        <div class="row">
    <div class="col-md-3">
    <form method="POST" action="{{ route('menu.store') }}" id="menuForm">
    @csrf

    <div class="container">
        <p class="d-inline-flex gap-1">
            <a class="btn btn" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                Danh mục sách
            </a>
        </p>
        <div class="collapse1" id="collapseExample1" data-bs-parent=".container">
            <div class="container" id="categoryList">
                @foreach($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="category_{{ $category->id }}" name="categories[]">
                        <label class="form-check-label" for="category_{{ $category->id }}">
                            {{ $category->name }}
                        </label>
                    </div>
                @endforeach
                <button type="button" class="btn btn-success" id="btnThemCategory">Thêm</button>
            </div>
        </div>
    </div>

    <div class="container">
        <p class="d-inline-flex gap-2">
            <a class="btn btn" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                Thể loại sách
            </a>
        </p>
        <div class="collapse2" id="collapseExample2" data-bs-parent=".container">
            <div class="container" id="brandList">
                @foreach($brand as $brd)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $brd->id }}" id="brd{{ $brd->id }}" name="brands[]">
                        <label class="form-check-label" for="brd{{ $brd->id }}">
                            {{ $brd->name }}
                        </label>
                    </div>
                @endforeach
                <button type="button" class="btn btn-success" id="btnThemBrand">Thêm</button>
            </div>
        </div>
    </div>

    <div class="container">
    <p class="d-inline-flex gap-3">
        <a class="btn btn" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
            Chủ đề bài viết
        </a>
    </p>
    <div class="collapse3" id="collapseExample3" data-bs-parent=".container">
        <div class="container" id="topicList">
            @foreach($topic as $top)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $top->id }}" id="topic_{{ $top->id }}" name="topics[]">
                    <label class="form-check-label" for="topic_{{ $top->id }}">
                        {{ $top->name }}
                    </label>
                </div>
            @endforeach
            <button type="button" class="btn btn-success" id="btnThemTopic">Thêm</button>
        </div>
    </div>
</div>

<div class="container">
    <p class="d-inline-flex gap-4">
        <a class="btn btn" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
            Trang đơn
        </a>
    </p>
    <div class="collapse4" id="collapseExample4" data-bs-parent=".container">
        <div class="container" id="pageList">
            @foreach($page as $pag)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $pag->id }}" id="page_{{ $pag->id }}" name="pages[]">
                    <label class="form-check-label" for="page_{{ $pag->id }}">
                        {{ $pag->title }}
                    </label>
                </div>
            @endforeach
            <button type="button" class="btn btn-success" id="btnThemPage">Thêm</button>
        </div>
    </div>
</div>

    <!-- Trường ẩn để xác định liệu biểu mẫu có được submit hay không -->
    <input type="hidden" name="form_submitted" id="formSubmitted" value="0">
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#btnThemCategory').click(function() {
            // Kiểm tra xem có checkbox nào được chọn không
            if ($('input[name="categories[]"]:checked').length > 0) {
                // Đặt giá trị của trường ẩn là 1 để xác định biểu mẫu được submit
                $('#formSubmitted').val('1');
                // Submit biểu mẫu
                $('#menuForm').submit();
            } else {
                // Hiển thị thông báo nếu không có checkbox nào được chọn
                alert("Vui lòng chọn ít nhất một danh mục trước khi nhấn 'Thêm'");
            }
        });

        $('#btnThemBrand').click(function() {
            // Kiểm tra xem có checkbox nào được chọn không
            if ($('input[name="brands[]"]:checked').length > 0) {
                // Đặt giá trị của trường ẩn là 1 để xác định biểu mẫu được submit
                $('#formSubmitted').val('1');
                // Submit biểu mẫu
                $('#menuForm').submit();
            } else {
                // Hiển thị thông báo nếu không có checkbox nào được chọn
                alert("Vui lòng chọn ít nhất một thể loại sách trước khi nhấn 'Thêm'");
            }
        });

        $('#btnThemTopic').click(function() {
            if ($('input[name="topics[]"]:checked').length > 0) {
                $('#formSubmitted').val('1');
                $('#menuForm').submit();
            } else {
                alert("Vui lòng chọn ít nhất một chủ đề bài viết trước khi nhấn 'Thêm'");
            }
        });

        $('#btnThemPage').click(function() {
            if ($('input[name="pages[]"]:checked').length > 0) {
                $('#formSubmitted').val('1');
                $('#menuForm').submit();
            } else {
                alert("Vui lòng chọn ít nhất một trang đơn trước khi nhấn 'Thêm'");
            }
        });
    });
</script>


    </div>
    <div class="col-md-8">
<table class="table">
    <thead>
        <tr>
            <th scope="col" class="text-center">Tên menu</th>
            <th scope="col" class="text-center">Trạng thái</th>
            <th scope="col" class="text-center">Chức năng</th>
            <th scope="col" class="text-center">ID</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menu as $key => $menu_list)
        <tr>
            <td class="text-center">{{$menu_list->name}}</td>
            <td class="text-center">
                @if($menu_list->status==0)
                <span class="text text-success">Kích hoạt</span>
                @else
                <span class="text text-danger">Không kích hoạt</span>
                @endif
            </td>
            <td class="text-center">
                <a href="{{ route('menu.edit', [$menu_list->id])}}" class="btn btn-primary" style="margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{ route('menu.delete', [$menu_list->id])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                <a href="{{ route('menu.show', [$menu_list->id])}}" class="btn btn-info" style="margin-left: 5px;"><i class="fa-solid fa-eye"></i></a>
            </td>

            <td class="text-center">{{$menu_list->id}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
        </div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
</body>

</html>
