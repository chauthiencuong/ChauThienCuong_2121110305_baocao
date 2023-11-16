@include('nav.menu')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Xem banner</h1>
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
                <?= $banner->id; ?>
              </td>
            </tr>

            <tr>
              <td> Tên banner</td>
              <td>
                <?= $banner->name; ?>
              </td>
            </tr>
            <tr>
              <td> Mô tả </td>
              <td>
                <?= $banner->description; ?>
              </td>
            </tr>
            <tr>
              <td> Ngày tạo </td>
              <td>
              <?= $banner->created_at; ?>
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
              <?= $banner->updated_at; ?> 
              </td>
            </tr>
            <tr>
              <td> Người cập nhật </td>
              <td>
              </td>
            </tr>
            <tr>
                <td> Hình ảnh </td>
                <td ><img src="{{ asset('uploads/banner_img/' . $banner->image) }}" height="200" width="800"></td>
                </tr>
                <tr>
            <tr>
              <td> Trạng thái </td>
              <td>
                <?php if ($banner->status === 0) : ?>
                  Kích hoạt
                <?php elseif ($banner->status === 1) : ?>
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