@include('nav.menu')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa liên hệ</h1>
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
                    <a href="{{ route('contact.index') }}" class="btn btn-success" style="margin-right: 15px;"><i class="fa-solid fa-left-long"></i></a>
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
        <form method="POST" action="{{route('contact.update',[$contact->id])}}">
                    @method('PUT')
                    @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên liên hệ</label>
                <input type="text" class="form-control" value="{{$contact->name}}" name="name" placeholder="Nhập tên liên hệ...">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" class="form-control" value="{{$contact->email}}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bạn hãy nhập email...">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="text" class="form-control" value="{{$contact->phone}}" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bạn hãy nhập sdt...">
            </div>
            <div class="mb-3">

                <label for="user">Người dùng</label>
                <select name="user" class="custom-select" style="width: 200px;">
                    @foreach($user as $u)
                    <option value="{{ $u->id }}" @if($u->id === $contact->user_id) selected @endif>
                        {{ $u->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" value="{{$contact->title}}" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Bạn hãy nhập tiêu đề...">
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Nội dung</label>
                <textarea class="form-control" name="content" id="content" rows="7" placeholder="Hãy nhập nội dung...">{{$contact->content}}</textarea>
            </div>





            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kích hoạt</label>
                <select class="form-select" name="status" aria-label="Default select example">
                    @if($contact->status==0)
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