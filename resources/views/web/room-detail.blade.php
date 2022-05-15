@extends('layouts.master')

@section('title') Chi tiết phòng @endsection

@section('content')
<div class="container">
    <h2 class="title">CHI TIẾT PHÒNG</h2>
    <div class="row">
        <div class="col-12 text-center">
            <img src="{{ asset($room->image) }}" alt="" class="w-100">
        </div>

        <div class="col-12">
            @if (auth()->guard('web')->user())
                <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#booking">Đặt thuê phòng</button>
            @else
                <p class="d-block mt-2 font-weight-bold"><a href="{{ route('web.login') }}" class="text-primary">Đăng nhập</a> để đặt thuê phòng!</p>
            @endif
        </div>

        <div class="col-6">
            <h2 class="font-size-20">Thông tin phòng</h2>
            <h5 class="font-size-24 font-weight-bold d-block">{{ $room->name }}</h5>

            <div class="row">
                <div class="col-sm-6">
                    <h5 class="">Mã phòng: {{ $room->code }}</h5>
                    <p class="text-danger mt-2">Diện tích: {{ number_format($room->acreage, 0, ',', '.') }}m²</p>
                    <p class="mt-2">Địa chỉ: {{ $room->address }}</p>
                </div>
                <div class="col-sm-6">
                    <p class="mt-2">Trường đại học: {{ $room->university->name }}</p>
                    <p class="text-success mt-2">Số lượng người: {{ $room->hired }}/{{ $room->amount }} người</p>
                    <p class="text-danger mt-2">Giá: {{ number_format($room->price, 0, ',', '.') }} VND</p>
                </div>
            </div>


            <div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
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

        <div class="col-6">
            <h2 class="font-size-20">Thông tin chủ phòng</h2>
            <p>{{ $room->user->name }}</p>
            @if (auth()->guard('web')->user())
                <p>SĐT: {{ $room->user->phone }}</p>
            @endif
            <p>Ngày đăng: {{ $room->created_at }}</p>
        </div>

        <div class="col-sm-6 mt-3">
            <h2 class="font-size-20">Loại phòng</h2>
            @foreach ($room->types as $type)
                <label class="form-check-label" for="type{{ $type->type->id }}">
                    {{ $type->type->name }}
                </label>
            @endforeach
        </div>

        <div class="col-sm-6 mt-3">
            <h2 class="font-size-20">Tiện ích</h2>
            @foreach ($room->utilities as $utiliti)
                <label class="form-check-label" for="type{{ $utiliti->utiliti->id }}">
                    {{ $utiliti->utiliti->name }}
                </label>
            @endforeach
        </div>

        <div class="col-sm-6 mt-3">
            <h2 class="font-size-20">Tiện ích</h2>
            @foreach ($room->hobbys as $hobby)
                <label class="form-check-label" for="type{{ $hobby->hobby->id }}">
                    {{ $hobby->hobby->name }}
                </label>
            @endforeach
        </div>
    </div>

    <div class="row">
        <h2 class="title">Mô tả</h2>

        <div class="col-12">
            {!! $room->description !!}
        </div>
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