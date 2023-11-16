@include('nav.menu')
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thùng rác chủ đề</h1>
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
                            <a href="{{ route('topic.index') }}" class="btn btn-success" style="margin-right: 15px;"><i class="fa-solid fa-left-long"></i></a>
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
                        <th scope="col" class="text-center">Tên chủ đề</th>
                        <th scope="col" class="text-center">Slug chủ đề</th>
                        <th scope="col" class="text-center">Mô tả</th>
                        <th scope="col" class="text-center">Từ khóa</th>
                        <th scope="col" class="text-center">Trạng thái</th>
                        <th scope="col" class="text-center">Chức năng</th>
                        <th scope="col" class="text-center">ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topic as $key => $top)
                    <tr>
                        <td class="text-center">{{$top->name}}</td>
                        <td class="text-center">{{$top->slug}}</td>
                        <td class="text-center">{{$top->meta_desc}}</td>
                        <td class="text-center">{{$top->meta_key}}</td>
                        <td class="text-center">
                            @if($top->status==0)
                            <span class="text text-success">Kích hoạt</span>
                            @else
                            <span class="text text-danger">Không kích hoạt</span>
                            @endif
                        </td>
                        <td class="text-center">
                            
                            <a href="{{ route('topic.restore', [$top->id])}}" class="btn btn-primary" style="margin-right: 5px;"><i class="fa-solid fa-rotate-left"></i></a>
                            <form action="{{ route('topic.destroy', $top->id) }}" method="POST" style="display: inline;">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Bạn có muốn xóa chủ đề này vĩnh viễn không?');" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                            </form>


                        </td>

                        <td class="text-center">{{$top->id}}</td>
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
    <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
</body>

</html>