@extends('layouts.master')

@section('title') Trang chủ @endsection

@section('content')
    <h2 class="title">GIỚI THIỆU</h2>
    <div class="row">
        @foreach ($rooms as $room)
        <div class="col-3 mb-3">
            <a href="{{ route('web.room-detail', $room->id) }}" class="c-img hv-light"><img src="{{ asset($room->image) }}" alt=""></a>
            <a href="{{ route('web.room-detail', $room->id) }}" class="font-weight-bold font-size-20">{{ $room->name }}</a>
            <p>Mã phòng: {{ $room->code }}</p>
            <p class="text-danger">Diện tích: {{ $room->acreage }}m²</p>
            <p class="text-danger">Giá: {{ number_format($room->price, 0, ',', '.') }} VND</p>
            <p>Địa chỉ: {{ $room->address }}</p>
        </div>
        @endforeach

        <div class="m-auto">
            {{ $rooms->links() }}
        </div>
    </div>
@endsection

@push('js')
@endpush

@push('css')
@endpush