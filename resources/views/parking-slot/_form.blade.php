<div class="card">
    <div class="card-body">

        <h4 class="card-title">Thông tin cơ bản</h4>
        <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="slot">Chỗ gửi xe <span class="text-danger">*</span></label>
                    <input id="slot" name="slot" type="text" class="form-control" placeholder="Chỗ gửi xe" value="{{ old('slot', $data_edit->slot ?? '') }}">
                    {!! $errors->first('slot', '<span class="error">:message</span>') !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="vehicle_type">Loại xe <span class="text-danger">*</span></label>
                    <select name="vehicle_type" id="vehicle_type" class="form-control select2">
                        <option value="Ô tô" {{ old('vehicle_type', $data_edit->vehicle_type ?? '') == "Ô tô" ? "selected" : "" }}>Ô tô</option>
                        <option value="Xe gắn máy" {{ old('vehicle_type', $data_edit->vehicle_type ?? '') == "Xe gắn máy" ? "selected" : "" }}>Xe gắn máy</option>
                    </select>
                    {!! $errors->first('vehicle_type', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
            <a href="{{ route('parking_slots.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
        </div>
    </div>
</div>
