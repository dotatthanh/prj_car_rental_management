@extends('layouts.master')

@section('title')
    Thuê chỗ gửi xe
@endsection

@section('content')
    <h2 class="h1 text-center mt-5">Thuê chỗ gửi xe</h2>
    <div class="text-center mt-3">
        <a href="{{ route('car-parking-rental') }}" class="btn btn-primary">Xe ô tô</a>
        <a href="{{ route('bike-parking-rental') }}" class="btn btn-primary">Xe gắn máy</a>
    </div>
@endsection
