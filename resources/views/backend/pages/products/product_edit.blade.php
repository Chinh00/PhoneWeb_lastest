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
    <link rel="stylesheet" href="{{asset('backend/style.css')}}">
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
                            <h6 class="m-0 font-weight-bold text-primary">Cập nhật sản phẩm</h6>
                        </div>
                        <div class="card-body">
                            <form action="/admin/product/edit" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$product[0]->id}}">


                                <div class="mb-3">
                                    <label for="name" class="form-label font-weight-bold">1. Tên sản phẩm</label>
                                    <input type="text" name="name" class="form-control" onkeyup="ChangeToSlug()" id="name" value="{{$product[0]->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label font-weight-bold">2. Slug sản phẩm</label>
                                    <input type="text" name="slug" class="form-control" id="slug" value="{{$product[0]->slug}}">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label font-weight-bold">3. Giá cả</label>
                                    <input type="text" name="price" class="form-control" value="{{$product[0]->price}}">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label font-weight-bold">4. Giảm giá</label>
                                    <input type="text" name="sale_price" class="form-control" value="{{$product[0]->sale_price}}">
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label font-weight-bold">5. Số lượng</label>
                                    <input type="text" name="quantity" class="form-control" value="{{$product[0]->quantity}}">
                                </div>
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-weight-bold" id="inputGroupFileAddon01">6. Hình ảnh đại diện cho sản phẩm</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="images[]" multiple>
                                        <label class="custom-file-label" for="inputGroupFile01">Chọn nhiều ảnh</label>
                                    </div>
                                </div>
                                
                                <div class="mb-3 mt-3">
                                    <label for="status" class="form-label font-weight-bold">7. Trạng thái kích hoạt</label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="status" value="1" {{$product[0]->status == "1" ? "checked" : ""}}>
                                        <label class="form-check-label" for="status">
                                            Kích hoạt
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="status" value="0" {{$product[0]->status == "0" ? "checked" : ""}}>
                                        <label class="form-check-label" for="status">
                                            Không kích hoạt
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="status" class="form-label font-weight-bold">8. Loại hàng</label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="condition" value="1" {{$product[0]->condition == "1" ? "checked" : ""}}>
                                        <label class="form-check-label" for="status">
                                            Mới
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="condition" value="0" {{$product[0]->condition == "0" ? "checked" : ""}}>
                                        <label class="form-check-label" for="status">
                                            Cũ
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="category_id" class="form-label font-weight-bold">9. Chọn hãng sản xuất</label>
                                    <select name="brand_id" id="" class="form-select form-control">
                                        <option value="" ></option>
                                        @foreach($brands as $key)
                                            <option value="{{$key->id}}" {{$product[0]->brand_id == $key->id ? "selected" : "" }}>{{$key->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="category_id" class="form-label font-weight-bold">10. Chọn bảo hành</label>
                                    <select name="guarantee_id" id="" class="form-select form-control">
                                        <option value="" selected></option>
                                        @foreach($guarantee as $key)
                                            <option value="{{$key->id}}" {{$product[0]->guarantee_id == $key->id ? "selected" : "" }}>{{$key->guarantee_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="category_id" class="form-label font-weight-bold">12. Mô tả sản phẩm</label>
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-7 offset-3 mt-4">
                                                        <div class="card-body">
                                                                <div class="form-group">
                                                                    <textarea class="ckeditor form-control" name="content">{{$product[0]->content}}</textarea>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('.ckeditor').ckeditor()
                                                // CKEDITOR.instances['ckeditor'].setData();

                                            });
                                        </script>

                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="category_id" class="form-label font-weight-bold">13. Thông tin sản phẩm</label>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">1. Kích thước màn hình</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="display_size" value="{{$product[0]->display_size}}">
                                    </div>
                                    
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">3. Camera</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="camera" value="{{$product[0]->camera}}">
                                    </div>
                                    
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">5. Chip set</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="cpu" value="{{$product[0]->cpu}}">
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">6. Dung lượng ram</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="ram" value="{{$product[0]->ram}}">
                                    </div>
                                    
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">8. Pin</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="pin" value="{{$product[0]->pin}}">
                                    </div>
                                    
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">10. Hệ điều hành</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="os" value="{{$product[0]->os}}">
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary form-control">Cập nhật</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                
<script>
    function ChangeToSlug()
{
    var title, slug;
 
    //Lấy text từ thẻ input title 
    title = document.getElementById("name").value;
 
    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();
 
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
    document.getElementById('slug').value = slug;
}
</script>
            
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
@endsection




























