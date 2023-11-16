@include('nav.menu')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Xem bài viết </h1>
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

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Tên trường</th>
                    <th>Giá trị</th>
                </tr>
                <tr>
                    <td>ID</td>
                    <td>
                        <?= $order->id; ?>
                    </td>
                </tr>

                <tr>
                    <td> Tiêu đề</td>
                    <td>
                        <?= $order->delivery_name; ?>
                    </td>
                </tr>
                <tr>
                    <td> Ngày tạo </td>
                    <td>
                        <?= $order->created_at; ?>
                    </td>
                </tr>
                <tr>
                    <td> Người tạo </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td> Ngày cập nhật </td>
                    <td>
                        <?= $order->updated_at; ?>
                    </td>
                </tr>
                
                <tr>
    <td> Giá </td>
    <td>
        @if ($order->orderdetail)
            {{ $order->orderdetail->price }}
        @else
            {{-- Xử lý khi orderdetail không tồn tại --}}
            Không có thông tin giá
        @endif
    </td>
</tr>

                <tr>
                    <td> Trạng thái </td>
                    <td>
                        <?php if ($order->status === 0) : ?>
                            Kích hoạt
                        <?php elseif ($order->status === 1) : ?>
                            Không kích hoạt
                        <?php endif; ?> </td>
                </tr>
            </table>
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