@extends('layouts.master')

@section('title') Chi tiết phòng @endsection

@section('content')
<div class="container">
    <h2 class="title">CHI TIẾT PHÒNG</h2>
    <div class="row">
        <div class="col-12 text-center">
            <img src="{{ asset($room->image) }}" alt="" class="w-1001">
        </div>

        
        <div style=" width : 800px;">
        <div class="col-6" style="padding : 20px;" >
            <span class="icon-nav-home-fill"></span>
            <h2 class="font-size-20">Thông tin phòng</h2>
            <h5 class="RoomName" style="width:600px;">{{ $room->name }}</h5>

            <div class="row">
                <div class="col-sm-6">
                    <h5 class="">Mã phòng: {{ $room->code }}</h5>
                    <p class="text-danger mt-2">Diện tích: {{ number_format($room->acreage, 0, ',', '.') }}m²</p>
                    <p style="width: 500px;">Địa chỉ: {{ $room->address }}</p>
                </div>
            </div>
                                <!-- ==================== -->
           <div style= " position: absolute; right: -800px; top: 0px; padding : 20px;">
                    <div style=" width : 400px">
                        <h2  style="font-size: 30px;">Thông tin chủ phòng</h2>
                        
                        <p>Chủ phòng : {{ $room->user->name }}</p>
                        @if (auth()->guard('web')->user())
                            <p>SĐT: {{ $room->user->phone }}</p>
                        @endif
                        <p>Ngày đăng: {{ $room->created_at }}</p>
                    </div>
                    <div class="col-12">
                        @if (auth()->guard('web')->user())
                            <button type="button" data-toggle="modal" data-target="#booking">Đặt thuê phòng</button>
                        @else
                            <p class="d-block mt-2 font-weight-bold"><a href="{{ route('web.login') }}" class="text-primary">Đăng nhập</a> để đặt thuê phòng!</p>
                        @endif
                    </div>
            </div>  
            </div>

            <div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="left: 100px">
                            <h5 class="modal-title" id="exampleModalLabel">Điền thông tin thuê phòng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('web.booking', $room->id) }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="from_date">Ngày bắt đầu thuê <span class="text-danger">*</span></label>
                                            <input type="date" name="from_date" class="form-control" value="{{ old('from_date') }}">
                                            {!! $errors->first('from_date', '<span class="error">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="to_date">Ngày kết thúc thuê <span class="text-danger">*</span></label>
                                            <input type="date" name="to_date" class="form-control" value="{{ old('to_date') }}">
                                            {!! $errors->first('to_date', '<span class="error">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-success">Đặt phòng</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thông tin phòng-->
        <div class="cloum" style="width: 500px;">
                    <p class="mt-2" style="width: 500px; font-size:20px;"><img src="https://img.icons8.com/dusk/64/000000/school.png"/> Trường đại học: {{ $room->university->name }}</p>
                    <p class="text-success mt-2" style="font-size: 20px; width : 300px;"><img src="https://img.icons8.com/ios-glyphs/30/000000/conference-call--v1.png"/>Số lượng người: {{ $room->hired }}/{{ $room->amount }} người</p>
                    <p class="text-danger mt-2" style="font-size: 20px; with: 100px;"><img src="https://img.icons8.com/material-outlined/48/000000/money--v1.png"/>  Giá: {{ number_format($room->price, 0, ',', '.') }} VND</p>
         </div>

         <!-- Loại Phòng-->
        <div class="cloum" style="right: 100px; ">
            <h2 style="font-size: 40px"><img src="https://img.icons8.com/dusk/64/000000/room.png"/> Loại phòng</h2>
            @foreach ($room->types as $type)
                <label class="form-check-label" for="type{{ $type->type->id }}">
                <p id="id_1" style="width: 200px; font-size: 25px;">+ {{ $type->type->name }}<p>
                </label>
            @endforeach
        </div>

        <!-- Tiện ích-->
        <div class="cloum">
            <h2  style="font-size: 40px;"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/000000/external-utilities-industry-flaticons-lineal-color-flat-icons.png"/>Tiện ích</h2>
            @foreach ($room->utilities as $utiliti)
                <label class="form-check-label" for="type{{ $utiliti->utiliti->id }}">
                <p id="id_1" style="width: 300px; font-size: 25px;">+ {{ $utiliti->utiliti->name }}<p>
                </label>
            @endforeach
        </div>
        <!--Sở Thích -->
        <div class="cloum" style="position: right;">
            <h2  style="font-size: 40px;"><img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/000000/external-hobby-lifestyles-flaticons-lineal-color-flat-icons.png"/> Sở thích</h2>
            @foreach ($room->hobbys as $hobby)
                <label class="form-check-label" for="type{{ $hobby->hobby->id }}">
                <p id="id_1" style="width: 200px;font-size: 25px;">+ {{ $hobby->hobby->name }}<p>
                </label>
            @endforeach
        </div>
    </div>

    <div class="row1">
        <h2 class="title" style=" font-size: 50px;" >Mô tả</h2>
        <div class="col-12" style="font-size : 40px;"> {!! $room->description !!}  </div>
    </div>
</div>
@endsection

@push('js')
    <script type="text/javascript">

        @if($errors->first('from_date'))
        Command: toastr["error"]("{{ $errors->first('from_date') }}")

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

        @if($errors->first('to_date'))
        Command: toastr["error"]("{{ $errors->first('to_date') }}")

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
@endpush

<style>
    .w-1001{
        width: 1100px;
        height: 700px;
    }
    .row1 {
    font-family: Nunito-Regular;
    font-size: 30px;
    box-sizing: border-box;
    padding-left: 32px;
    padding-right: 32px;
    background-color: #FFFFFF;
    padding-top: 5px;
    padding-bottom: 24px;
    border-radius: 20px;
    margin : auto;
    border: 3px solid green;
    
    }
    .cloum{
        width: 500px;
        padding : 30px;
    }
    
    .RoomName{
        font-size: 21px;
        color: #333333;
        letter-spacing: 0;
    }
</style>



