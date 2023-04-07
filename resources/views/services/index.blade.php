@extends('layouts.app')

@section('title')
    <title>خدمات</title>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
    @foreach ($services as $service)
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>سرویس: {{ $service->service }}</h2>
                <p>تاریخ: {{ $service->date }}</p>
                <p>زمان شروع: {{ $service->start }}</p>
                <p>زمان پایان: {{ $service->end }}</p>
                <p>کد پیگیری: {{ $service->tracking_code }}</p>
                <form action="{{ route('services.destroy', ['id' => $service->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger" type="submit">لغو</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection