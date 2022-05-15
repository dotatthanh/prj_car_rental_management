@csrf
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="name">Tên trường đại học <span class="text-danger">*</span></label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Tên trường đại học" value="{{ old('name', $data_edit->name ?? '') }}">
            {!! $errors->first('name', '<span class="error">:message</span>') !!}
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Lưu lại</button>
<a href="{{ route('universities.index') }}" class="btn btn-secondary waves-effect">Quay lại</a>