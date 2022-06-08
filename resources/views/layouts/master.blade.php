<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title')</title>

    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">

    @yield('css')
    @stack('css')

    <!-- Toastr Css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('libs\toastr\build\toastr.min.css') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('css/bootstrap4.0.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">
    
    <link href="{{ asset('scss/reset.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('scss/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('slick/slick.css') }}" rel="stylesheet" type="text/css">

    <style type="text/css">
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
      }

      /* Firefox */
      input[type=number] {
          -moz-appearance: textfield;
      }
  </style>
</head>
<body>
    <ul class="menu">
        <li>
            <a href="{{ route('home') }}">Trang chủ</a>
        </li>
        <li>
            <a href="{{ route('blog') }}">Blog</a>
        </li>
        @if (auth()->guard('web')->user())
        <li class="float-right mr-5">
            <a href="{{ route('home') }}">{{ auth()->guard('web')->user()->name }} <i class="fa fa-angle-down" aria-hidden="true"></i>
</a>
            <ul>
                <li>
                    <a href="{{ route('web.profile') }}">Thông tin cá nhân</a>
                </li>
                <li>
                    <a href="{{ route('web.change-password') }}">Đổi mật khẩu</a>
                </li>
                <li>
                    <a href="{{ route('web.info-booking') }}">Thông tin đặt thuê phòng</a>
                </li>
                <li>
                    <form action="{{ route('web.logout') }}" method="post">
                        @csrf
                        <button class="btn-logout text-danger" type="submit">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </li>
        @else
            <li class="float-right">
                <a href="{{ route('web.login') }}">Đăng nhập</a>
            </li>
            <li class="float-right">
                <a href="{{ route('web.register') }}">Đăng ký</a>
            </li>
        @endif
        {{-- <li class="float-right mt-1">
            @if (auth()->guard('web')->user())
            <div class="btn-group">
                <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->guard('web')->user()->name }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('web.profile') }}">Thông tin cá nhân</a>
                    <a class="dropdown-item" href="{{ route('web.change-password') }}">Đổi mật khẩu</a>
                    <a class="dropdown-item" href="{{ route('web.info-booking') }}">Thông tin đặt thuê phòng</a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('web.logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit">Đăng xuất</button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('web.login') }}" class="btn btn-success">Đăng nhập</a>
            <a href="{{ route('web.register') }}" class="btn btn-primary">Đăng ký</a>
        @endif
        </li> --}}
    </ul>
    
        @yield('content')

    <footer>
     <div class="container">
         <!--Bắt Đầu Nội Dung Giới Thiệu-->
         <div class="noi-dung about">
             <h2>Về Chúng Tôi</h2>
             <p>Chào mừng bạn đã đến và sử dụng trang web hệ thống tìm kiếm phòng trọ của chúng tôi !</p>
             
         </div>
         <!--Kết Thúc Nội Dung Giới Thiệu-->
         <!--Bắt Đầu Nội Dung Đường Dẫn-->
         <div class="noi-dung links">
             <h2>Đường Dẫn</h2>
             <ul>
                 <li><a href="#">Trang Chủ</a></li>
                 <li><a href="#">Về Chúng Tôi</a></li>
                 <li><a href="#">Thông Tin Liên Lạc</a></li>
                 <li><a href="#">Dịch Vụ</a></li>
                 <li><a href="#">Điều Kiện Chính Sách</a></li>
             </ul>
         </div>
         <!--Kết Thúc Nội Dung Đường Dẫn-->
         <!--Bắt Đâu Nội Dung Liên Hệ-->
         <div class="noi-dung contact">
             <h2>Thông Tin Liên Hệ</h2>
             <ul class="info">
                 <li>
                     <span><i class="fa fa-map-marker"></i></span>
                     <span>Đường Số 1<br />
                         Quận 1, Thành Phố Hồ Chí Minh<br />
                         Việt Nam</span>
                 </li>
                 <li>
                     <span><i class="fa fa-phone"></i></span>
                     <p><a href="#">+84 123 456 789</a>
                         <br />
                         <a href="#">+84 987 654 321</a></p>
                 </li>
                 <li>
                     <span><i class="fa fa-envelope"></i></span>
                     <p><a href="#">diachiemail@gmail.com</a></p>
                </li>
                 <li>
                     <form class="form">
                         <input type="email" class="form__field" placeholder="Đăng Ký Subscribe Email" />
                         <button type="button" class="btn btn--primary  uppercase">Gửi</button>
                     </form>
                 </li>
             </ul>
         </div>
         <!--Kết Thúc Nội Dung Liên Hệ-->
     </div>
 </footer>

    <script src="{{ asset('js/jquery-2.2.1.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('slick/slick.js') }}"></script>
    <!-- toastr plugin -->
    <script src="{{ asset('libs\toastr\build\toastr.min.js') }}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        // toastr noti
        @if(Session::has('alert-success'))
        Command: toastr["success"]("{{ Session::get('alert-success') }}")

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @endif

        @if(Session::has('alert-error'))
        Command: toastr["error"]("{{ Session::get('alert-error') }}")

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        @endif
    </script>

    @yield('js')
    @stack('js')
</body>
</html>
<style> 
*{
     margin: 0;
     padding: 0;
     box-sizing: border-box;
     font-family: Roboto;
 }

footer{
     position: relative;
     width: 100%;
     padding: 50px 100px;
     background: #111;
     display: flex;
     justify-content: space-between;
     flex-wrap: wrap;
     top : 250px;
 }
footer .container{
     display: flex;
     justify-content: space-between;
     flex-wrap: wrap;
     flex-direction: row;
 }
 footer .container .noi-dung{
     margin-right: 30px;
 }
footer  .container .noi-dung.about{
     width:40%;
 }
 footer .container .noi-dung.about h2{
     position: relative;
     color: #fff;
     font-weight: 500;
     margin-bottom: 15px;
 }
 footer .container .noi-dung.about h2:before{
     content: '';
     position: absolute;
     bottom: -5px;
     left: 0;
     width: 50px;
     height: 2px;
     background: #f00;
 }
footer .container .noi-dung.about p{
     color: #999;
 }
 /*Thiết Lập Cho Thành Phần Icon Mạng Xã Hội*/
 .social-icon{
     margin-top: 20px;
     display: flex;
 }
.social-icon li {
     list-style: none;
 }
 .social-icon li a{
     display: inline-block;
     width: 40px;
     height: 40px;
     background: #222;
     display: flex;
     justify-content: center;
     align-items: center;
     margin-right: 10px;
     text-decoration: none;
     border-radius: 4px;
 }
.social-icon li a:hover{
     background: #f00;
 }
.social-icon li a .fa{
     color: #fff;
     font-size: 20px;
 }
.links h2{
     position: relative;
     color: #fff;
     font-weight: 500;
     margin-bottom: 15px;
 }
.links h2::before{
     content: '';
     position: absolute;
     bottom: -5px;
     left: 0;
     width: 50px;
     height: 2px;
     background: #f00;
 }
.links{
    position: relative;
    width: 25%;
 }
 .links ul li{
     list-style: none;
 }
 .links ul li a{
     color: #999;
     text-decoration: none;
     margin-bottom: 10px;
     display: inline-block;
 }
.links ul li a:hover{
     color: #fff;
 }
 .contact h2{
     position: relative;
     color: #fff;
     font-weight: 500;
     margin-bottom: 15px;
 }
.contact h2::before{
     content: '';
     position: absolute;
     bottom: -5px;
     left: 0;
     width: 50px;
     height: 2px;
     background: #f00;
 }
.contact{
     width: calc(35% - 60px);
     margin-right: 0 !important;
 }
.contact .info{
     position: relative;
 }
 .contact .info li{
     display: flex;
     margin-bottom: 16px;
 }
 .contact .info li span:nth-child(1) {
     color: #fff;
     font-size: 20px;
     margin-right: 10px;
 }
.contact .info li span{
     color: #999;
 }
.contact .info li a{
     color: #999;
     text-decoration: none;
 }
 
</style>