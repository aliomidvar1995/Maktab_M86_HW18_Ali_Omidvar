@extends('layouts.app')

@section('title')
    <title></title>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $service->service }}</h2>
            <p>{{ $service->time }}</p>
            <p>{{ $service->tracking_code }}</p>
        </div>
    </div>
@endsection