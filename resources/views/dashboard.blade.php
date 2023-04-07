@extends('layouts.app')

@section('title')
    <title>داشبورد</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session()->get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session()->get('time'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('time') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/services" method="post">
                    @csrf
                    <div class="form-group">
                        <label>خدمات</label>
                        <select class="form-control {{ $errors->first('service') ? 'border border-danger' : '' }} " name="service">
                            <option value="" disabled selected>یکی از موارد را انتخاب کنید ...</option>
                            <option value="روشویی به مدت 15 دقیقه و مبلغ 25 هزار تومان">روشویی به مدت 15 دقیقه و مبلغ 25 هزار تومان</option>
                            <option value="نظافت داخل به مدت 20 دقیقه و مبلغ 30 هزار تومان">نظافت داخل به مدت 20 دقیقه و مبلغ 30 هزار تومان</option>
                            <option value="صفر شویی به مدت 60 دقیقه و مبلغ 80 هزار تومان">صفر شویی به مدت 60 دقیقه و مبلغ 80 هزار تومان</option>
                        </select>
                    </div>
                    @if (!empty($errors->first('service')))
                        <p class="text-danger">{{ $errors->first('service') }}</p>
                    @endif
                    <div class="form-group">
                        <label>تاریخ</label>
                        <input class="form-control {{ $errors->first('date') ? 'border border-danger' : '' }}" name="date" type="date" value="{{ old('date') }}" min="09:00" max="21:00">
                    </div>
                    @if (!empty($errors->first('date')))
                        <p class="text-danger">{{ $errors->first('date') }}</p>
                    @endif
                    <div class="form-group">
                        <label>ساعت</label>
                        <input class="form-control {{ $errors->first('time') ? 'border border-danger' : '' }}" name="time" type="time" value="{{ old('time') }}" min="09:00" max="21:00">
                    </div>
                    @if (!empty($errors->first('time')))
                        <p class="text-danger">{{ $errors->first('time') }}</p>
                    @endif
                    <div class="d-flex justify-content-center mt-2">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
