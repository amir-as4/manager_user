@extends('home.layouts.homeAuth')
@section('title')
    صفحه ورود
@endsection
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="main-content col-12 col-md-7 col-lg-5 mx-auto">
                <div class="account-box">
                    <a href="#" class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                    <div class="account-box-title text-right">ورود به تاپ کالا</div>
                    <div class="account-box-content">
                        <form action="{{ route('login') }}" class="form-account" method="post">
                            @csrf
                            <div class="form-account-title">ایمیل</div>
                            <div class="form-account-row">
                                <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                                <input class="input-field @error('email') is-invalid @enderror" name="email" type="text"
                                       placeholder="ایمیل خود را وارد نمایید">
                                @error('email')
                                <div class="alert alert-danger mt-2">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-account-title">رمز عبور
                                <a href="{{ route('password.request') }}" class="btn-link-border form-account-link">رمز
                                    عبور خود را فراموش
                                    کرده ام</a>
                            </div>
                            <div class="form-account-row">
                                <label class="input-label"><i
                                        class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input class="input-field @error('password') is-invalid @enderror" name="password"
                                       type="password"
                                       placeholder="رمز عبور خود را وارد نمایید">
                                @error('password')
                                <div class="alert alert-danger mt-2">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-account-row form-account-submit">
                                <div class="parent-btn">
                                    <button class="dk-btn dk-btn-info">
                                        ورود به تاپ کالا
                                        <i class="fa fa-sign-in"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-account-agree">
                                <label class="checkbox-form checkbox-primary">
                                    <input type="checkbox" value="{{ old('remember'?'checked':'') }}" id="agree"
                                           name="remember">
                                    <span class="checkbox-check"></span>
                                </label>
                                <label for="agree">مرا به خاطر داشته باش</label>
                            </div>
                        </form>
                    </div>
                    <div class="account-box-footer">
                        <span>کاربر جدید هستید؟</span>
                        <a href="#" class="btn-link-border">ثبت‌نام در
                            تاپ کالا</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
