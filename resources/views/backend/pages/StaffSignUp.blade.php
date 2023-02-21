<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng ký tài khoản nhân viên</h1>
                                    </div>
                                    <form class="user" id="formSignUpForStaff" action="/staff/sign-up" method="post" >
                                        @csrf
                                        <div class="form-group">
                                            <label for="fullname" class="form-label">Họ và tên</label>
                                            <input type="text" class="form-control form-control-user"
                                                 aria-describedby="emailHelp"
                                                placeholder="Fullname" name="fullname" require>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control form-control-user"
                                                 aria-describedby="emailHelp"
                                                placeholder="Email" name="email" require>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Số điện thoại</label>
                                            <input type="text" class="form-control form-control-user"
                                                aria-describedby="emailHelp"
                                                placeholder="Phone" name="phone" require>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label">Mật khẩu</label>
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" require>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm-password" class="form-label">Xác nhận mật khẩu</label>
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputConfirmPassword" placeholder="Confirm Password"  require>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Đăng ký</button>
                                        <a href="/admin/login" class="float-right mt-3">Đã có tài khoản? Đăng nhập </a>
                                    </form>
                                    <hr>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
            
                
            
                $("#formSignUpForStaff").submit(function (e) { 
                    const pass = document.getElementById("exampleInputPassword").value
                    const conf_pass = document.getElementById("exampleInputConfirmPassword").value
                    if (pass !== conf_pass){
                        e.preventDefault()
                        alert("Mật khẩu và xác nhận mật khẩu không trùng khớp")
                    }
                });                
    </script>
</body>

</html>