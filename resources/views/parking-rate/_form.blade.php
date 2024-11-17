<div class="card">
    <div class="card-body">

        <h4 class="card-title">Thông tin cơ bản</h4>
        <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>
        @csrf
        <div>
            <label for="hourly_rate">Loại xe: {{ $data_edit->vehicle_type }}</label>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="hourly_rate">Giá thuê theo giờ <span class="text-danger">*</span></label>
                    <input id="hourly_rate" name="hourly_rate" type="text" class="form-control"
                        placeholder="Giá thuê theo giờ" value="{{ old('hourly_rate', $data_edit->hourly_rate ?? '') }}">
                    {!! $errors->first('hourly_rate', '<span class="error">:message</span>') !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="daily_rate">Giá thuê theo ngày <span class="text-danger">*</span></label>
                    <input id="daily_rate" name="daily_rate" type="text" class="form-control"
                        placeholder="Giá thuê theo ngày" value="{{ old('daily_rate', $data_edit->daily_rate ?? '') }}">
                    {!! $errors->first('daily_rate', '<span class="error">:message</span>') !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="monthly_rate">Giá thuê theo tháng <span class="text-danger">*</span></label>
                    <input id="monthly_rate" name="monthly_rate" type="text" class="form-control"
                        placeholder="Giá thuê theo tháng"
                        value="{{ old('monthly_rate', $data_edit->monthly_rate ?? '') }}">
                    {!! $errors->first('monthly_rate', '<span class="error">:message</span>') !!}
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
            <a href="{{ route('parking_rates.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
        </div>
    </div>
</div>
