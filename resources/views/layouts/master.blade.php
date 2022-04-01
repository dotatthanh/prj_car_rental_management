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
    <ul class="menu">
        <li>
            <a href="{{ route('home') }}">Trang chủ</a>
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
    <div class="container">
        @yield('content')

    </div>

    <footer>


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