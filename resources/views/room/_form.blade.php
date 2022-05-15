<div class="card">
    <div class="card-body">

        <h4 class="card-title">Thông tin cơ bản</h4>
        <p class="card-title-desc">Điền tất cả thông tin bên dưới</p>
        @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="name">Tiêu đề <span class="text-danger">*</span></label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Tiêu đề" value="{{ old('name', $data_edit->name ?? '') }}">
                    {!! $errors->first('name', '<span class="error">:message</span>') !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="acreage">Diện tích(m²) <span class="text-danger">*</span></label>
                    <input id="acreage" name="acreage" type="number" class="form-control" placeholder="Diện tích" value="{{ old('acreage', $data_edit->acreage ?? '') }}">
                    {!! $errors->first('acreage', '<span class="error">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="amount">Số lượng người <span class="text-danger">*</span></label>
                    <input id="amount" name="amount" type="number" class="form-control" placeholder="Số lượng người" value="{{ old('amount', $data_edit->amount ?? '') }}">
                    {!! $errors->first('amount', '<span class="error">:message</span>') !!}
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

                <div class="form-group">
                    <label for="district_id">Quận/Huyện <span class="text-danger">*</span></label>
                    <select name="district_id" id="district_id" class="form-control select2">
                        @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('district_id', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group">
                    <label for="university_id">Tên trường đại học <span class="text-danger">*</span></label>
                    <select class="form-control select2" name="university_id">
                        <option value="">Chọn trường đại học</option>
                        @foreach ($universities as $university_id)
                        <option value="{{ $university_id->id }}" {{ isset($data_edit->university_id) && $data_edit->university_id == $university_id->id ? 'selected' : '' }}>{{ $university_id->name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('university_id', '<span class="error">:message</span>') !!}
                </div>

            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">Loại phòng <span class="text-danger">*</span></h4>
        {!! $errors->first('types', '<span class="error">:message</span>') !!}

        <div class="row">
            <div class="col-sm-6">
                @foreach ($types as $type)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $type->id }}" name="types[]" id="type{{ $type->id }}" {{ isset($data_edit) && $data_edit->types->contains('type_id', $type->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="type{{ $type->id }}">
                        {{ $type->name }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">Tiện ích <span class="text-danger">*</span></h4>
        {!! $errors->first('utilities', '<span class="error">:message</span>') !!}

        <div class="row">
            <div class="col-sm-6">
                @foreach ($utilities as $utiliti)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $utiliti->id }}" name="utilities[]" id="utiliti{{ $utiliti->id }}" {{ isset($data_edit) && $data_edit->utilities->contains('utiliti_id', $utiliti->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="utiliti{{ $utiliti->id }}">
                        {{ $utiliti->name }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">Sở thích <span class="text-danger">*</span></h4>
        {!! $errors->first('hobbys', '<span class="error">:message</span>') !!}

        <div class="row">
            <div class="col-sm-6">
                @foreach ($hobbys as $hobby)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $hobby->id }}" name="hobbys[]" id="hobby{{ $hobby->id }}" {{ isset($data_edit) && $data_edit->hobbys->contains('hobby_id', $hobby->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="hobby{{ $hobby->id }}">
                        {{ $hobby->name }}
                    </label>
                </div>
                @endforeach
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