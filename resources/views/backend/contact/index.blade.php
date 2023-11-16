@include('nav.menu')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Quản lí liên hệ</h1>
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
              <a href="{{ route('contact.create') }}" class="btn btn-success" style="margin-right: 15px;"><i class="fa-solid fa-plus"></i></a>
              <a href="{{ route('contact.trash') }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
            <th scope="col" class="text-center">Tên liên hệ</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Phone</th>
            <th scope="col" class="text-center">Trạng thái</th>
            <th scope="col" class="text-center">Chức năng</th>
            <th scope="col" class="text-center">ID</th>
          </tr>
        </thead>
        <tbody>
          @foreach($contact as $key => $cont)
          <tr>
            <td class="text-center">{{$cont->name}}</td>
            <td class="text-center">{{$cont->email}}</td>
            <td class="text-center">{{$cont->phone}}</td>
            <td class="text-center">
              @if($cont->status==0)
              <span class="text text-success">Kích hoạt</span>
              @else
              <span class="text text-danger">Không kích hoạt</span>
              @endif
            </td>
            <td class="text-center">
              <a href="{{ route('contact.edit', [$cont->id])}}" class="btn btn-primary" style="margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i></a>
              <a href="{{ route('contact.delete', [$cont->id])}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
              <a href="{{ route('contact.show', [$cont->id])}}" class="btn btn-info" style="margin-left: 5px;"><i class="fa-solid fa-eye"></i></a>
            </td>

            <td class="text-center">{{$cont->id}}</td>
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
</body>

</html>