@include('nav.menu')
<div class="content-wrapper">
    <!-- Content Header (order header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thùng rác đơn hàng</h1>
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
                    <a href="{{ route('order.index') }}" class="btn btn-success" style="margin-right: 15px;"><i class="fa-solid fa-left-long"></i></a>
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

    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center">Người nhận</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Phone</th>
                <th scope="col" class="text-center">Địa chỉ</th>
                <th scope="col" class="text-center">Tình trạng</th>
                <th scope="col" class="text-center">Chức năng</th>
                <th scope="col" class="text-center">Mã đơn hàng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $key => $ord)
            <tr>
                <td class="text-center">{{$ord->delivery_name}}</td>
                <td class="text-center">{{$ord->delivery_email}}</td>
                <td class="text-center">{{$ord->delivery_phone}}</td>
                <td class="text-center">{{$ord->delivery_address}}</td>
                <td class="text-center">
                    @if($ord->status==0)
                    <span class="text text-success">Đang vận chuyển</span>
                    @else
                    <span class="text text-danger">Đang chuẩn bị</span>
                    @endif
                </td>
                <td class="text-center">

                    <a href="{{ route('order.restore', [$ord->id])}}" class="btn btn-primary" style="margin-right: 5px;"><i class="fa-solid fa-rotate-left"></i></a>
                    <form action="{{ route('order.destroy', $ord->id) }}" method="POST" style="display: inline;">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Bạn có muốn xóa đơn hàng này vĩnh viễn không?');" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                    </form>


                </td>

                <td class="text-center">{{$ord->id}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


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