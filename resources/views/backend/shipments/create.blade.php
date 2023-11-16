@include('nav.menu')

<!-- Content Wrapper. Contains order content -->
<div class="content-wrapper">
    <!-- Content Header (order header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm đơn xuất hàng</h1>
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
                <div class="dashboard-table">
                    <td>
                        <a href="{{ route('shipments.create') }}" class="btn btn-primary">Quản lý</a>
                        <a href="" class="btn btn-secondary">Chi tiết</a>
                    </td>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <a href="{{ route('shipments.index') }}" class="btn btn-success" style="margin-right: 15px;"><i class="fa-solid fa-left-long"></i></a>
                </div>


            </div>
        </nav>
    </div>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif


        <form method="POST" action="{{route('shipments.store')}}">
            @csrf
    
            <div class="mb-3">
                <label for="exampleInputEmail1">Mã đơn hàng</label>
                <select name="order" class="custom-select" style="width: 200px;">
                    @foreach($order as $key => $ord)
                    <option value="{{$ord->id}}">{{$ord->id}}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
                <select class="form-select" name="status" aria-label="Default select example">
                    <option value="0" @if(old('status')==0) selected @endif>Kích hoạt</option>
                    <option value="1" @if(old('status')==1) selected @endif>Không kích hoạt</option>
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Thêm</button>
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
<!-- AdminLTE for demo purposes -->
</body>

</html>