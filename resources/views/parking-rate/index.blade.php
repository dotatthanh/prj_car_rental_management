@extends('layouts.default')

@section('title') Quản lý giá gửi xe @endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Danh sách giá gửi xe</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);" title="Quản lý" data-toggle="tooltip" data-placement="top">Quản lý</a></li>
                                    <li class="breadcrumb-item active">Danh sách giá gửi xe</li>
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
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="width: 70px;" class="text-center">STT</th>
                                                <th>Loại xe</th>
                                                <th>Giá thuê theo giờ</th>
                                                <th>Giá thuê theo ngày</th>
                                                <th>Giá thuê theo tháng</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php ($stt = 1)
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td class="text-center">{{ $stt++ }}</td>
                                                    <td>{{ $item->vehicle_type }}</td>
                                                    <td>{{ number_format($item->hourly_rate) }} VND</td>
                                                    <td>{{ number_format($item->daily_rate) }} VND</td>
                                                    <td>{{ number_format($item->monthly_rate) }} VND</td>
                                                    <td class="text-center">
                                                        <ul class="list-inline font-size-20 contact-links mb-0">
                                                            @can('Chỉnh sửa xe')
                                                            <li class="list-inline-item px">
                                                                <a href="{{ route('parking_rates.edit', $item->id) }}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="mdi mdi-pencil text-success"></i></a>
                                                            </li>
                                                            @endcan
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        
    </div>
@endsection