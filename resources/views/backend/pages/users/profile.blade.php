@extends("/backend/templates/main")
@include("/backend/templates/topbar")

@section("css")
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section("container")
    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            

            <!-- Main Content -->
            <div id="content">

                @yield("topbar")

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Trang cá nhân</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Thông tin cá nhân</h6>
                        </div>
                        <div class="card-body">
                            <form action="/admin/profile/update" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$user[0]->id}}">
                                <div class="form-group mb-3">
                                    <div class="col">
                                        @if(isset($user[0]->avatar))
                                            <div class="rounded" >
                                                <img src="{{asset('images/avatar/' . $user[0]->avatar)}}" alt="" style="width: 100px; height: 100px;">
                                            </div>
                                        @else 
                                        <div class="rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                            </svg>
                                            </div>
                                        @endif
                                        <label for="" class="form-label mt-3">Avatar</label>
                                        
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="inputGroupFileAddon01">{{(isset($user[0]->avatar))  ? "Cập nhật ảnh đại diện mới" : "Chưa có ảnh đại diện" }}</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="img">
                                        <label class="custom-file-label" for="inputGroupFile01">Tải lên ảnh đại diện</label>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="fullname" class="form-label">Họ và tên</label>
                                    <input type="text" value="{{$user[0]->fullname}}" class="form-control" name="fullname" >                                
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="fullname" class="form-label">Địa chỉ</label>
                                    <input type="text" value="{{$user[0]->address}}" class="form-control" placeholder="Chưa được cập nhật" name="address" >                                
                                </div>

                                <div class="form-group mb-3">
                                    <label for="fullname" class="form-label">Email</label>
                                    <input type="text" value="{{$user[0]->email}}" class="form-control" name="email" disabled>                                
                                </div>
                                <div class="form-group mb-3">
                                    <label for="fullname" class="form-label">Số điện thoại</label>
                                    <input type="text" value="{{$user[0]->phone}}" class="form-control" name="phone">                                
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-secondary">Cập nhật</button>                        
                                </div>
                            </form>
                            
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

@endsection
@section("js")

    <!-- Core plugin JavaScript-->

    <!-- Custom scripts for all pages-->

    <!-- Page level plugins -->
    <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
@endsection