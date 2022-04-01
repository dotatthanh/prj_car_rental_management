@extends('layouts.default')

@section('title') Quản lý đặt thuê phòng @endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Danh sách đặt thuê phòng</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);" title="Quản lý" data-toggle="tooltip" data-placement="top">Quản lý</a></li>
                                    <li class="breadcrumb-item active">Danh sách đặt thuê phòng</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="GET" action="{{ route('bookings.index') }}">
                                    <div class="row mb-2">
                                        <div class="col-sm-5">
                                            <div class="search-box mr-2 mb-2 d-inline-block">
                                                <div class="position-relative">
                                                    <input type="text" name="search" class="form-control" placeholder="Nhập số điện thoại">
                                                    <i class="bx bx-search-alt search-icon"></i>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                <i class="bx bx-search-alt search-icon font-size-16 align-middle mr-2"></i> Tìm kiếm
                                            </button>
                                        </div>

                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center">STT</th>
                                                <th>Tên</th>
                                                <th>Số điện thoại</th>
                                                <th>Email</th>
                                                <th>Mã phòng</th>
                                                <th>Ngày bắt đầu thuê</th>
                                                <th>Ngày kết thúc thuê</th>
                                                <th>Trạng thái</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php ($stt = 1)
                                            @foreach ($bookings as $booking)
                                                <tr>
                                                    <td>{{ $stt++ }}</td>
                                                    <td>{{ $booking->customer->name }}</td>
                                                    <td>{{ $booking->customer->phone }}</td>
                                                    <td>{{ $booking->customer->email }}</td>
                                                    <td>{{ $booking->room->code }}</td>
                                                    <td class="text-center">{{ date("d-m-Y", strtotime($booking->from_date)) }}</td>
                                                    <td class="text-center">{{ date("d-m-Y", strtotime($booking->to_date)) }}</td>
                                                    <td>
                                                        @if ($booking->status == 1)
                                                            <label class="btn btn-success waves-effect waves-light">
                                                                <i class="bx bx-check-double font-size-16 align-middle mr-2"></i> Đã duyệt
                                                            </label>
                                                        @elseif ($booking->status == 0)
                                                            <label class="btn btn-warning waves-effect waves-light font-size-12">Chờ duyệt</label>
                                                        @elseif ($booking->status == -1)
                                                            <label class="btn btn-danger waves-effect waves-light font-size-12">Đã huỷ</label>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <ul class="list-inline font-size-20 contact-links mb-0">
                                                            @if ($booking->status == 0)
                                                                @can('Duyệt đặt thuê phòng')
                                                                <li class="list-inline-item px">
                                                                    <form method="post" action="{{ route('bookings.approve-booking', $booking->id) }}">
                                                                        @csrf
                                                                        
                                                                        <button type="submit" data-toggle="tooltip" data-placement="top" title="Duyệt" class="border-0 bg-white"><i class="bx bxs-calendar-check text-success"></i></button>
                                                                    </form>

                                                                </li>
                                                                @endcan

                                                                @can('Huỷ đặt thuê phòng')
                                                                <li class="list-inline-item px">
                                                                    <form method="post" action="{{ route('bookings.cancel-appointment', $booking->id) }}">
                                                                        @csrf
                                                                        
                                                                        <button type="submit" data-toggle="tooltip" data-placement="top" title="Huỷ đặt thuê phòng" class="border-0 bg-white"><i class="mdi mdi-trash-can text-danger"></i></button>
                                                                    </form>
                                                                </li>
                                                                @endcan
                                                            @endif
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{ $bookings->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        
    </div>
@endsection