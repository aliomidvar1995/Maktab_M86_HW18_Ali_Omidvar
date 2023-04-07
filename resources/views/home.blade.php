@extends('layouts.app')

@section('title')
    <title>خانه</title>
@endsection

@section('content')
    <div class="d-flex justify-content-center flex-column align-items-center">
        <img class="w-50" src="{{ asset('storage/car_wash.jpg') }}" alt="">
        <p class="home-p mt-2 font-weight-bold">Welcome to Car Wash</p>
    </div>
@endsection
