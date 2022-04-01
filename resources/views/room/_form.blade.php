<div class="card">
    <div class="card-body">

        <h4 class="card-title">Thông tin cơ bản</h4>
        <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Tiêu đề <span class="text-danger">*</span></label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Tiêu đề" value="{{ old('name', $data_edit->name ?? '') }}">
                    {!! $errors->first('name', '<span class="error">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="acreage">Diện tích(m²) <span class="text-danger">*</span></label>
                    <input id="acreage" name="acreage" type="number" class="form-control" placeholder="Diện tích" value="{{ old('acreage', $data_edit->acreage ?? '') }}">
                    {!! $errors->first('acreage', '<span class="error">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="price">Giá <span class="text-danger">*</span></label>
                    <input id="price" name="price" type="number" class="form-control" placeholder="Giá" value="{{ old('price', $data_edit->price ?? '') }}">
                    {!! $errors->first('price', '<span class="error">:message</span>') !!}
                </div>

            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="image">Ảnh @if ($routeType == 'create')<span class="text-danger">*</span>@endif</label>
                    <input id="image" name="image" type="file" class="form-control">
                    {!! $errors->first('image', '<span class="error">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ <span class="text-danger">*</span></label>
                    <input id="address" name="address" type="text" class="form-control" placeholder="Địa chỉ" value="{{ old('address', $data_edit->address ?? '') }}">
                    {!! $errors->first('address', '<span class="error">:message</span>') !!}
                </div>

            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">Mô tả <span class="text-danger">*</span></h4>

        <textarea id="description" class="summernote mb-2" name="description">{{ isset($data_edit->description) ? $data_edit->description : '' }}</textarea>
        {!! $errors->first('description', '<span class="error">:message</span>') !!}

        <div class="mt-3">
            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
            <a href="{{ route('rooms.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>
        </div>
    </div>

</div>