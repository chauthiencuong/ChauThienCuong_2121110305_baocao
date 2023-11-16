@include('nav.menu')

<!-- Content Wrapper. Contains order content -->
<div class="content-wrapper">
    <!-- Content Header (order header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm đơn hàng</h1>
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
                        <a href="{{ route('order.create') }}" class="btn btn-primary">Quản lý</a>
                        <a href="{{ route('orderdetail.create') }}" class="btn btn-secondary">Chi tiết</a>
                    </td>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                    <a href="{{ route('order.index') }}" class="btn btn-success" style="margin-right: 15px;"><i class="fa-solid fa-left-long"></i></a>
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


        <form method="POST" action="{{route('order.store')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Người nhận</label>
                <input type="text" class="form-control" value="{{old('delivery_name')}}" name="delivery_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hãy nhập mô tả...">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1">Người giao</label>
                <select name="user" class="custom-select" style="width: 200px;">
                    @foreach($user as $key => $u)
                    <option value="{{$u->id}}">{{$u->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" class="form-control" value="{{old('delivery_email')}}" name="delivery_email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hãy nhập email...">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="text" class="form-control" value="{{old('delivery_phone')}}" name="delivery_phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hãy nhập phone...">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" value="{{old('delivery_address')}}" name="delivery_address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Hãy nhập địa chỉ...">
            </div>

            <div class="mb-3">
                <label for="detail" class="form-label">Ghi chú</label>
                <textarea class="form-control" name="note" id="detail" rows="4" placeholder="Hãy nhập ghi chú...">{{ old('note') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tình trạng</label>
                <select class="form-select" name="status" aria-label="Default select example">
                    <option value="0" @if(old('status')==0) selected @endif>Đang vận chuyển</option>
                    <option value="1" @if(old('status')==1) selected @endif>Đang chuẩn bị</option>
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