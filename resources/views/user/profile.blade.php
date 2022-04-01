@extends('layouts.default')

@section('title') Thông tin cá nhân @endsection

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Thông tin cá nhân</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);" title="Thông tin cá nhân" data-toggle="tooltip" data-placement="top">Thông tin cá nhân</a></li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">    
                    
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Thông tin cá nhân</h4>

                                <div class="table-responsive">
                                    <table class="table table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Họ và tên :</th>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Số điện thoại :</th>
                                                <td>{{ $user->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">E-mail :</th>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Ngày sinh :</th>
                                                <td>{{ date("d-m-Y", strtotime($user->birthday)) }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Địa chỉ :</th>
                                                <td>{{ $user->address }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection