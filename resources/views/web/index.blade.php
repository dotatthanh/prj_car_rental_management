@extends('layouts.master')

@section('title') Trang chủ @endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="search-index">
                <h2 class="title">BỘ LỌC</h2>

                <form action="{{ route('home') }}" method="GET">

                    {{-- <div class="form-group">
                        <h2>Tiện ích</h2>
                        <select name="utilities[]" id="utilities" class="form-control select2" multiple="">
                            <option value="">Chọn trường đại học</option>
                            @foreach ($utilities as $utiliti)
                            <option value="{{ $utiliti->id }}">{{ $utiliti->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h2>Loại phòng</h2>
                        <select name="types[]" id="types" class="form-control select2" multiple="">
                            <option value="">Chọn loại phòng</option>
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <h2>Sở thích</h2>
                        <select name="hobbys[]" id="hobbys" class="form-control select2" multiple="">
                            <option value="">Chọn sở thích</option>
                            @foreach ($hobbys as $hobby)
                            <option value="{{ $hobby->id }}">{{ $hobby->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <ul class="">
                        <li class="title-search">
                            <a href="javascript:void(0)" class="dropdown-item-1">Giá <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Dưới 1 triệu" name="price" {{$request->price == 'Dưới 1 triệu' ? 'checked' : ''}} id="radio-1">
                                        <label class="form-check-label" for="radio-1">
                                            Dưới 1.000.000
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1 triệu - 2 triệu" name="price" {{$request->price == '1 triệu - 2 triệu' ? 'checked' : ''}} id="radio-2">
                                        <label class="form-check-label" for="radio-2">
                                            Khoảng 1.000.000 - 2.000.000
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="2 triệu - 3 triệu" name="price" {{$request->price == '2 triệu - 3 triệu' ? 'checked' : ''}} id="radio-3">
                                        <label class="form-check-label" for="radio-3">
                                            Khoảng 2.000.000 - 3.000.000
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="3 triệu - 4 triệu" name="price" {{$request->price == '3 triệu - 4 triệu' ? 'checked' : ''}} id="radio-4">
                                        <label class="form-check-label" for="radio-4">
                                            Khoảng 3.000.000 - 4.000.000
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="4 triệu - 5 triệu" name="price" {{$request->price == '4 triệu - 5 triệu' ? 'checked' : ''}} id="radio-5">
                                        <label class="form-check-label" for="radio-5">
                                            Khoảng 4.000.000 - 5.000.000
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Trên 5 triệu" name="price" {{$request->price == 'Trên 5 triệu' ? 'checked' : ''}} id="radio-6">
                                        <label class="form-check-label" for="radio-6">
                                            Trên 5.000.000
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="title-search">
                            <a href="javascript:void(0)" class="dropdown-item-1">Tiện ích <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul>
                                <li>
                                    @foreach ($utilities as $utiliti)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $utiliti->id }}" name="utilities[]" {{ isset($request->utilities) && in_array($utiliti->id, $request->utilities) ? 'checked' : '' }} id="checkbox-utiliti-{{ $utiliti->id }}">
                                        <label class="form-check-label" for="checkbox-utiliti-{{ $utiliti->id }}">
                                            {{ $utiliti->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </li>
                            </ul>
                        </li>
                        <!-- =========================== Tìm theo khu vực========================-->
                        


                        <li class="title-search">
                            <a href="javascript:void(0)" class="dropdown-item-1">Loại phòng <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul>
                                <li>
                                    @foreach ($types as $type)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $type->id }}" name="types[]" {{ isset($request->types) && in_array($type->id, $request->types) ? 'checked' : '' }} id="checkbox-type-{{ $type->id }}">
                                        <label class="form-check-label" for="checkbox-type-{{ $type->id }}">
                                            {{ $type->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </li>
                            </ul>
                        </li>
                        <li class="title-search">
                            <a href="javascript:void(0)" class="dropdown-item-1">Sở thích <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul>
                                <li>
                                    @foreach ($hobbys as $hobby)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $hobby->id }}" {{ isset($request->hobbys) && in_array($hobby->id, $request->hobbys) ? 'checked' : '' }} name="hobbys[]" id="checkbox-hobby-{{ $hobby->id }}">
                                        <label class="form-check-label" for="checkbox-hobby-{{ $hobby->id }}">
                                            {{ $hobby->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </li>
                            </ul>
                        </li>


                    </ul>

                    <div class="d-flex">
                        <button class="reset" type="reset">Reset</button>
                        <button class="apply" type="submit">Áp dụng</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-6">
            <h2 class="title">PHÒNG</h2>
            <div class="row">
                @foreach ($rooms as $room)
                    <div class="col-sm-4 mb-3">
                        <a href="{{ route('web.room-detail', $room->id) }}" class="c-img hv-light"><img src="{{ asset($room->image) }}" alt=""></a>
                        <a href="{{ route('web.room-detail', $room->id) }}" class="font-weight-bold font-size-20">{{ $room->name }}</a>
                        <p class="text-danger">Diện tích: {{ $room->acreage }}m²</p>
                        <p class="text-success">Số lượng người: {{ $room->hired }}/{{ $room->amount }}</p>
                        <p class="text-danger">Giá: {{ number_format($room->price, 0, ',', '.') }} VND</p>
                        <p>Địa chỉ: {{ $room->address }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-sm-3">
            <h2 class="title">GỢI Ý PHÒNG</h2>
            <div class="row">
                @foreach ($suggests as $suggest)
                <div class="col-sm-12 mb-3">
                    <a href="{{ route('web.room-detail', $suggest->id) }}" class="c-img hv-light"><img src="{{ asset($suggest->image) }}" alt="image_1"></a>
                    <a href="{{ route('web.room-detail', $suggest->id) }}" class="font-weight-bold font-size-20">{{ $suggest->name }}</a>
                    <p class="text-danger">Diện tích: {{ $suggest->acreage }}m²</p>
                    <p class="text-success">Số lượng người: {{ $suggest->hired }}/{{ $suggest->amount }}</p>
                    <p class="text-danger">Giá: {{ number_format($suggest->price, 0, ',', '.') }} VND</p>
                    <p>Địa chỉ: {{ $suggest->address }}</p>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class="row">
        <div class="m-auto">
            {{ $rooms->links() }}
        </div>
    </div>
</div>
@endsection

@push('js')
    <!-- select 2 plugin -->
    <script src="{{ asset('libs\select2\js\select2.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('js\pages\ecommerce-select2.init.js') }}"></script>

    <script type="text/javascript">
        // Menu
        var Menu=function(){
            $('.dropdown-item-1').click(function(){
                $(this).children('i').toggleClass('fa-angle-down').toggleClass('fa-angle-right');
                $(this).parent('li').children('ul').slideToggle();
            });

            $('.btn-close').click(function(){
                $(this).parent('.menu-mb').removeClass('open');
                $(this).parent('.menu-mb').addClass('close');
            });
        };

        $(function(){
            Menu();
        });
    </script>
@endpush

<style>
    .image_1{
        width: 300px;
    }
</style>
@push('css')
    <!-- select2 css -->
    <link href="{{ asset('libs\select2\css\select2.min.css') }}" rel="stylesheet" type="text/css">
@endpush