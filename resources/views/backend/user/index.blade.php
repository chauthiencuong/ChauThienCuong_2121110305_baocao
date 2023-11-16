@include('nav.menu')

    <!-- Content Wrapper. Contains user content -->
    <div class="content-wrapper">
      <!-- Content Header (user header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Quản lí thành viên </h1>
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
              <a href="{{ route('user.create') }}" class="btn btn-success" style="margin-right: 15px;"><i class="fa-solid fa-plus"></i></a>
              <a href="{{ route('user.trash') }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
            <th scope="col" class="text-center">Tên</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Trạng thái</th>
            <th scope="col" class="text-center">Chức năng</th>
            <th scope="col" class="text-center">ID</th>
          </tr>
        </thead>
        <tbody>
          @foreach($user as $key => $us)
          <tr>
            <td class="text-center">{{$us->name}}</td>
            <td class="text-center">{{$us->email}}</td>
            <td class="text-center">
              @if($us->status==0)
              <span class="text text-success">Kích hoạt</span>
              @else
              <span class="text text-danger">Không kích hoạt</span>
              @endif
            </td>
            <td class="text-center">
              <a href="{{ route('user.edit', [$us->id])}}" class="btn btn-primary" style="margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i></a>
              <a href="{{ route('user.delete', [$us->id])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
              <a href="{{ route('user.show', [$us->id])}}" class="btn btn-info" style="margin-left: 5px;"><i class="fa-solid fa-eye"></i></a>
            </td>

            <td class="text-center">{{$us->id}}</td>
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