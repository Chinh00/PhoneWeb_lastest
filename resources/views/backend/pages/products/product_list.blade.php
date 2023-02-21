@extends("/backend/templates/main")
@include("/backend/templates/topbar")
@include("/backend/pages/alert")
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
                    <h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách các sản phẩm</h6>
                        </div>
                        <div class="card-body">
                            @yield("alert")
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <!-- ->select("products.id", "products.name", "products.quantity", "products.price", "products.sale_price", "products.status", "products.condition", "guarantee.guarantee_name") -->
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh nổi bật</th>
                                            <th>Slug</th>
                                            <th>Giá cả</th>
                                            <th>Tồn kho</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh nổi bật</th>
                                            <th>Slug</th>
                                            <th>Giá cả</th>
                                            <th>Tồn kho</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if(isset($products))
                                            @foreach($products as $key)
                                                @php
                                                    $image = DB::table("images")->where("product_id", $key->id)->get()[0]->link;
                                                @endphp

                                                <tr>
                                                    <td>{{$key->id}}</td>
                                                    <td>{{$key->name}}</td>
                                                    <td><img src="{{asset('images/' . $image)}}" style="height: 200px;" alt=""></td>
                                                    <td>{{$key->slug}}</td>
                                                    <td>{{number_format($key->price)}}</td>
                                                    <td>{{$key->quantity}}</td>
                                                    <td>{{$key->status}}</td>
                                                    <td>
                                                        <a href="/admin/product/delete/{{$key->id}}" class="btn btn-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            </svg>
                                                            Xóa
                                                        </a>
                                                        <a href="/admin/product/edit/{{$key->id}}" class="btn btn-primary">
                                                            <i class="fa fa-wrench" aria-hidden="true"></i>
                                                            Sửa
                                                        </a>


                                                    </td>
                                                </tr>
                                            @endforeach

                                        @endif
                                    </tbody>
                                </table>
                            </div>
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
    <script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('backend/js/alert.js')}}"></script>
@endsection