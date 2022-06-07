@extends('layouts.default')

@section('title') Quản lý khách hàng @endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Danh sách khách hàng</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);" title="Quản lý" data-toggle="tooltip" data-placement="top">Quản lý</a></li>
                                    <li class="breadcrumb-item active">Danh sách khách hàng</li>
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
                                <form method="GET" action="{{ route('customers.index') }}">
                                    <div class="row mb-2">
                                        <div class="col-sm-5">
                                            <div class="search-box mr-2 mb-2 d-inline-block">
                                                <div class="position-relative">
                                                    <input type="text" name="search" class="form-control" placeholder="Nhập họ và tên">
                                                    <i class="bx bx-search-alt search-icon"></i>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                <i class="bx bx-search-alt search-icon font-size-16 align-middle mr-2"></i> Tìm kiếm
                                            </button>
                                        </div>

                                        {{-- @can('Thêm khách hàng')
                                        <div class="col-sm-7">
                                            <div class="text-sm-right">
                                                <a href="{{ route('customers.create') }}" class="text-white btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Thêm khách hàng</a>
                                            </div>
                                        </div><!-- end col-->
                                        @endcan --}}
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap">
                                        <thead class="thead-light">
                                            <tr>
                                                <th style="width: 70px;" class="text-center">STT</th>
                                                <th>Mã</th>
                                                <th>Ảnh đại diện</th>
                                                <th>Họ và tên</th>
                                                <th>Giới tính</th>
                                                <th>Số điện thoại</th>
                                                <th>Ngày sinh</th>
                                                <th>Tỉnh/Thành phố</th>
                                                <th>Quận/Huyện</th>
                                                <th>Địa chỉ</th>
                                                <th>Trường đại học</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php ($stt = 1)
                                            @foreach ($customers as $customer)
                                                <tr>
                                                    <td class="text-center">{{ $stt++ }}</td>
                                                    <td>{{ $customer->code }}</td>
                                                    <td>
                                                        @if ($customer->avatar)
                                                            <div>
                                                                <img class="rounded-circle avatar-xs" src="{{ asset($customer->avatar) }}" alt="">
                                                            </div>
                                                        @else
                                                            <div class="avatar-xs">
                                                                <span class="avatar-title rounded-circle text-uppercase">
                                                                    {{ substr($customer->name, 0, 1) }}
                                                                </span>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $customer->name }}
                                                    </td>
                                                    <td>{{ $customer->gender }}</td>
                                                    <td>{{ $customer->phone }}</td>
                                                    <td>{{ date("d-m-Y", strtotime($customer->birthday)) }}</td>
                                                    <td>{{ $customer->province->name }}</td>
                                                    <td>{{ $customer->district->name }}</td>
                                                    <td>{{ $customer->address }}</td>
                                                    <td>{{ $customer->university ? $customer->university->name : '' }}</td>
                                                    <td class="text-center">
                                                        <ul class="list-inline font-size-20 contact-links mb-0">
                                                            {{-- @can('Chỉnh sửa khách hàng')
                                                            <li class="list-inline-item px">
                                                                <a href="{{ route('customers.edit', $customer->id) }}" data-toggle="tooltip" data-placement="top" title="Sửa"><i class="mdi mdi-pencil text-success"></i></a>
                                                            </li>
                                                            @endcan --}}

                                                            @can('Xóa khách hàng')
                                                            <li class="list-inline-item px">
                                                                <form method="post" action="{{ route('customers.destroy', $customer->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    
                                                                    <button onclick="return confirm('Bạn có chắc chắn muốn xoá?')" type="submit" data-toggle="tooltip" data-placement="top" title="Xóa" class="border-0 bg-white"><i class="mdi mdi-trash-can text-danger"></i></button>
                                                                </form>
                                                            </li>
                                                            @endcan
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                {{ $customers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        
    </div>
@endsection