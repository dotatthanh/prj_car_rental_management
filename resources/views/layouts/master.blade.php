<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <div class="container">
        <div class="row bg-header">
            <div class="col-4">
                <span class="font-weight-bold">Liên hệ:</span> <a href="tel:0901 793 122" class="text-danger">0901 793 122</a>
            </div>
            <div class="col-4">
                <span class="font-weight-bold">Email:</span> <a href="mailto:gmail@gmail.com" class="text-danger">gmail@gmail.com</a>
            </div>
            <div class="col-4 text-right">
                @if (auth()->guard('web')->user())
                
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            </div>
        </div>

        <div class="row align-items-center" style="display: flex;">
            <div class="col-3 logo">Website thuê phòng trọ</div>
            <div class="col-9 slogan">
                TỔ ẤM - BÌNH AN - HẠNH PHÚC
            </div>
        </div>

        <div class="row">
            <ul class="menu">
                <li>
                    <a href="{{ route('home') }}">Trang chủ</a>
                </li>
            </ul>
        </div>

        @yield('content')

    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h4 class="h4 font-weight-bold title-footer">Website thuê phòng trọ</h4>
                    <p>Công ty Cổ phần ABC</p>
                    <p>Email: gmail@gmail.com</p>
                    <p>Tổng đài tư vấn: <a href="tel:0901 793 122">0901 793 122</a></p>
                </div>

                <div class="col-6">
                    <p>ĐKKD số: 0102624215-001 – Sở Kế hoạch và Đầu tư thành phố Hà Nội cấp ngày 11/02/2009</p>
                    <p>Giấy phép hoạt động cấp ngày 21/02/2017</p>
                    <p>Địa chỉ: 286 Thụy Khuê, Tây Hồ, Hà Nội</p>
                </div>
            </div>
        </div>

        <div class="coppyright">
            COPYRIGHT ©2020 Website thuê phòng trọ
        </div>

    </footer>

    <script src="{{ asset('js/jquery-2.2.1.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('slick/slick.js') }}"></script>
    <!-- toastr plugin -->
    <script src="{{ asset('libs\toastr\build\toastr.min.js') }}"></script>

    <script type="text/javascript">
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