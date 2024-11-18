@extends('layouts.master')

@section('title')
    Thuê chỗ gửi xe gắn máy
@endsection

@section('content')
    <h2 class="h1 text-center mt-5">Thuê chỗ gửi xe gắn máy</h2>

    <div class="container mt-3">
        <table class="table table-bordered">
            <tr>
                <td colspan="2" class="text-center font-weight-bold h4">Bảng giá</td>
            </tr>
            <tr>
                <td>Giá theo giờ</td>
                <td>{{ number_format($price->hourly_rate) }} VND</td>
            </tr>
            <tr>
                <td>Giá theo ngày</td>
                <td>{{ number_format($price->daily_rate) }} VND</td>
            </tr>
            <tr>
                <td>Giá theo tháng</td>
                <td>{{ number_format($price->monthly_rate) }} VND</td>
            </tr>
        </table>

        @if (auth()->guard('web')->user())
            <form action="{{ route('booking-parking') }}" method="POST">
                @csrf
                <input type="hidden" name="vehicle_type" value="Xe gắn máy">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="parking_slot_id">Vị trí gửi xe <span class="text-danger">*</span></label>
                            <select name="parking_slot_id" id="parking_slot_id" class="form-control mt-2">
                                <option value="">Chọn vị trí</option>
                                @foreach ($slots as $slot)
                                    <option value="{{ $slot->id }}" {{ old('parking_slot_id') == $slot->id ? "selected" : "" }}>{{ $slot->slot }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('parking_slot_id', '<span class="text-danger">:message</span>') !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="form_rent">Hình thức thuê <span class="text-danger">*</span></label>
                            <select name="form_rent" id="form_rent" class="form-control mt-2"
                                onchange="changeFormRent($(this).val())">
                                <option value="">Chọn hình thức thuê</option>
                                <option value="Thuê theo giờ" {{ old('form_rent') == "Thuê theo giờ" ? "selected" : "" }}>Theo giờ</option>
                                <option value="Thuê theo ngày" {{ old('form_rent') == "Thuê theo ngày" ? "selected" : "" }}>Theo ngày</option>
                                <option value="Thuê theo tháng" {{ old('form_rent') == "Thuê theo tháng" ? "selected" : "" }}>Theo tháng</option>
                            </select>
                            {!! $errors->first('form_rent', '<span class="text-danger">:message</span>') !!}
                        </div>
                    </div>

                    <div class="col-sm-6" id="start_date">
                    </div>

                    <div class="col-sm-6" id="end_date">
                    </div>

                </div>
                <div class="text-right mt-2">
                    <button type="submit" class="btn btn-primary">Thuê chỗ</button>
                </div>
            </form>

        @else
            <p class="d-block mt-2 font-weight-bold"><a href="{{ route('web.login') }}" class="text-primary">Đăng nhập</a>
                để đặt thuê chỗ gửi xe gắn máy!</p>
        @endif
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            const value = $('select[name=form_rent]').val();
            changeFormRent(value)
        })
        function changeFormRent(value) {
            let htmlStartDate = '';
            let htmlEndDate = '';
            switch (value) {
                case "Thuê theo giờ":
                    htmlStartDate = `
                        <label for="start_time">Ngày bắt đầu <span class="text-danger">*</span></label>
                        <div class="row form-group mt-2">
                            <div class="col-sm-6">
                                <input id="start_time" name="start_time" type="time" class="form-control"
                                    value="{{ old('start_time') }}">
                                {!! $errors->first('start_time', '<span class="error">:message</span>') !!}
                            </div>
                            <div class="col-sm-6">
                                <input id="start_date" name="start_date" type="date" class="form-control"
                                    value="{{ old('start_date') }}">
                                {!! $errors->first('start_date', '<span class="error">:message</span>') !!}
                            </div>
                        </div>
                    `;
                    $(`#start_date`).html(htmlStartDate);
                    htmlEndDate = `
                        <label for="end_time">Ngày kết thúc <span class="text-danger">*</span></label>
                        <div class="row form-group mt-2">
                            <div class="col-sm-6">
                                <input id="end_time" name="end_time" type="time" class="form-control"
                                    value="{{ old('end_time') }}">
                                {!! $errors->first('end_time', '<span class="error">:message</span>') !!}
                            </div>
                            <div class="col-sm-6">
                                <input id="end_date" name="end_date" type="date" class="form-control"
                                    value="{{ old('end_date') }}">
                                {!! $errors->first('end_date', '<span class="error">:message</span>') !!}
                            </div>
                        </div>
                    `;
                    $(`#end_date`).html(htmlEndDate);
                    break;

                case "Thuê theo ngày":
                    htmlStartDate = `
                        <label for="start_date">Ngày bắt đầu <span class="text-danger">*</span></label>
                        <input id="start_date" name="start_date" type="date" class="form-control mt-2"
                            value="{{ old('start_date') }}">
                        {!! $errors->first('start_date', '<span class="error">:message</span>') !!}
                    `;
                    $(`#start_date`).html(htmlStartDate);
                    htmlEndDate = `
                        <label for="end_date">Ngày kết thúc <span class="text-danger">*</span></label>
                        <input id="end_date" name="end_date" type="date" class="form-control mt-2"
                            value="{{ old('end_date') }}">
                        {!! $errors->first('end_date', '<span class="error">:message</span>') !!}
                    `;
                    $(`#end_date`).html(htmlEndDate);
                    break;
                case "Thuê theo tháng":
                    htmlStartDate = `
                        <label for="start_date">Ngày bắt đầu <span class="text-danger">*</span></label>
                        <input id="start_date" name="start_date" type="date" class="form-control mt-2"
                            value="{{ old('start_date') }}">
                        {!! $errors->first('start_date', '<span class="error">:message</span>') !!}
                    `;
                    $(`#start_date`).html(htmlStartDate);
                    htmlEndDate = `
                        <label for="month">Số tháng <span class="text-danger">*</span></label>
                        <input id="month" name="month" type="text" class="form-control mt-2"
                            value="{{ old('month') }}">
                        {!! $errors->first('month', '<span class="error">:message</span>') !!}
                    `;
                    $(`#end_date`).html(htmlEndDate);
                    break;

                default:
                    $(`#start_date`).html('');
                    $(`#end_date`).html('');
                    break;
            }
        }
    </script>
@endsection
