@include('nav.menu');

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
           
              <h1>Thêm sản phẩm</h1>
       
          </div>
        </div><!-- /.container-fluid -->

      </section>

      <!-- Main content -->
      <div class="container">

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
              <a href="{{ route('product.index') }}" class="btn btn-success" style="margin-right: 15px;"><i class="fa-solid fa-left-long"></i></a>
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


        <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" value="{{old('name')}}" onkeyup="ChangeToSlug();" name="name" id="slug" placeholder="Nhập tên sản phẩm...">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Slug sản phẩm</label>
            <input type="text" class="form-control" name="slug" id="convert_slug" value="{{old('slug')}}" placeholder="">

          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mô tả sản phẩm</label>
            <input type="text" class="form-control" value="{{old('meta_desc')}}" name="meta_desc" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả sản phẩm...">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Từ khóa</label>
            <input type="text" class="form-control" value="{{old('meta_key')}}" name="meta_key" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Từ khóa sản phẩm...">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">Danh mục</label>
            <select name="category" class="custom-select" style="width: 200px;">
              @foreach($category as $key => $cat)
              <option value="{{$cat->id}}">{{$cat->name}}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1">Thể loại</label>
            <select name="brand" class="custom-select" style="width: 200px;">
              @foreach($brand as $key => $br)
              <option value="{{$br->id}}">{{$br->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="price">Giá</label>
            <input name="price" value="{{old('price')}}" id="price" type="text" class="form-control" placeholder="Hãy nhập số tiền (VNĐ)..." required>
          </div>


          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control-file" value="{{old('image')}}" name="image">
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
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
  <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('dist/js/demo.js')}}"></script>
</body>

</html>
<script type="text/javascript">
  function ChangeToSlug() {
    var slug;

    //Lấy text từ thẻ input title 
    slug = document.getElementById("slug").value;
    slug = slug.toLowerCase();
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('convert_slug').value = slug;
  }
</script>