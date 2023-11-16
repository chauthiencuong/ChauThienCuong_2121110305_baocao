@include('nav.menu')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật banner</h1>
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
                    <a href="{{ route('banner.index') }}" class="btn btn-success" style="margin-right: 15px;"><i class="fa-solid fa-left-long"></i></a>
                </div>


            </div>
        </nav>
    </div>
    <div class="container">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form method="POST" action="{{route('banner.update',[$banner->id])}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên banner</label>
                <input type="text" class="form-control" name="name" value="{{$banner->name}}" placeholder="Nhập tên banner...">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mô tả banner</label>
                <input type="text" class="form-control" name="description" value="{{$banner->description}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả banner...">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Link</label>
                <input type="text" class="form-control" value="{{$banner->link}}" name="link" placeholder="Nhập link...">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                @if($banner->image)
                <img src="{{ asset('uploads/banner_img/' . $banner->image) }}" height="100" width="100">
                @endif
                <input type="file" class="form-control-file" name="image">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                <select class="form-select" name="status" aria-label="Default select example">
                    @if($banner->status==0)
                    <option selected value="0">Kích hoạt</option>
                    <option value="1">Không kích hoạt</option>
                    @else
                    <option value="0">Kích hoạt</option>
                    <option selected value="1">Không kích hoạt</option>
                    @endif
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
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
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
</body>

</html>