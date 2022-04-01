@extends('layouts.master')

@section('title') Chi tiết phòng @endsection

@section('content')
    <h2 class="title">CHI TIẾT PHÒNG</h2>
    <div class="row">
        <div class="col-6 text-center">
            <img src="{{ asset($room->image) }}" alt="" class="w-100">
        </div>
        <div class="col-6">
            <h5 class="font-weight-bold font-size-20">{{ $room->name }}</h5>
            <h5 class="font-size-20">Mã phòng: {{ $room->code }}</h5>
            <p class="text-danger mt-2">Diện tích: {{ $room->acreage }}m²</p>
            <p class="text-danger mt-2">Giá: {{ number_format($room->price, 0, ',', '.') }} VND</p>
            <p class="mt-2">Địa chỉ: {{ $room->address }}</p>
            
            @if (auth()->guard('web')->user())
                <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#booking">Đặt thuê phòng</button>
            @else
                <p class="mt-2 font-weight-bold"><a href="{{ route('web.login') }}" class="text-primary">Đăng nhập</a> để đặt thuê phòng!</p>
            @endif

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
    </div>

    <div class="row">
        <h2 class="title">Mô tả</h2>

        <div class="col-12">
            {!! $room->description !!}
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