@extends('layouts.app')

@section('title')
    <title></title>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session()->get('notFound'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('notFound') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('پیگیری خدمات') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('trackings.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="tracking_code" class="col-md-4 col-form-label text-md-start">{{ __('کد پیگیری') }}</label>

                            <div class="col-md-6">
                                <input id="tracking_code" type="text" class="form-control @error('tracking_code') is-invalid @enderror" name="tracking_code" value="{{ old('tracking_code') }}" autocomplete="tracking_code" autofocus>

                                @error('tracking_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ارسال') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection