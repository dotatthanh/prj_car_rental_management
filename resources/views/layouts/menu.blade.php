<div class="vertical-menu">

    <div data-simplebar="" class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Quản lý</li>

                <li>
                    <a href="{{ route('dashboard') }}" class=" waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>

                @can('Xem danh sách đặt thuê phòng')
                    <li>
                        <a href="{{ route('bookings.index') }}" class=" waves-effect">
                            <i class="bx bx-calendar"></i>
                            <span>Đặt thuê phòng</span>
                        </a>
                    </li>
                @endcan

                    <li>
                        <a href="{{ route('utilities.index') }}" class=" waves-effect">
                            <i class="bx bx-calendar"></i>
                            <span>Tiện ích</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('hobbys.index') }}" class=" waves-effect">
                            <i class="bx bx-calendar"></i>
                            <span>Sở thích</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('types.index') }}" class=" waves-effect">
                            <i class="bx bx-calendar"></i>
                            <span>Loại phòng</span>
                        </a>
                    </li>

                @can('Xem danh sách phòng')
                <li>
                    <a href="{{ route('rooms.index') }}" class=" waves-effect">
                        <i class="bx bx-home-alt"></i>
                        <span>Phòng</span>
                    </a>
                </li>
                @endcan

                @can('Xem danh sách khách hàng')
                <li>
                    <a href="{{ route('customers.index') }}" class=" waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span>Khách hàng</span>
                    </a>
                </li>
                @endcan

                @can('Xem danh sách tài khoản', 'Xem danh sách vai trò', 'Xem danh sách quyền')
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="bx bx-cog"></i><span class="badge badge-pill badge-info float-right">03</span>
                        <span>Cài đặt</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @can('Xem danh sách tài khoản')
                        <li><a href="{{ route('users.index') }}">Tài khoản</a></li>
                        @endcan
                        @can('Xem danh sách vai trò')
                        <li><a href="{{ route('roles.index') }}">Vai trò</a></li>
                        @endcan
                        @can('Xem danh sách quyền')
                        <li><a href="{{ route('permissions.index') }}">Quyền</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>