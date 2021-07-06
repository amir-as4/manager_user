@extends('home.layouts.homeAuth')
@section('title')
    صفحه ثبت نام
@endsection
@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="main-content col-12 col-md-7 col-lg-5 mx-auto">
                <div class="account-box">
                    <a href="#" class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </a>
                    <div class="account-box-title">تغییر رمز عبور</div>
                    <div class="account-box-content mt-2">
                        <form action="{{route('password.update')  }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ request()->route('token') }}">
                            <div class="form-account-title">پست الکترونیک</div>
                            <div class="form-account-row">
                                <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                                <input class="input-field @error('email') is-invalid @enderror" name="email"
                                       type="email" value="{{ old('email') }}"
                                       placeholder="پست الکترونیک خود را وارد نمایید">
                                @error('email')
                                <div class="alert alert-danger mt-2">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-account-title">کلمه عبور</div>
                            <div class="form-account-row">
                                <label class="input-label"><i
                                        class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input class="input-field @error('password') is-invalid @enderror" type="password"
                                       name="password"
                                       placeholder="کلمه عبور خود را وارد نمایید">
                                @error('password')
                                <div class="alert alert-danger mt-2"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-account-title">تکرار کلمه عبور</div>
                            <div class="form-account-row">
                                <label class="input-label"><i
                                        class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input class="input-field @error('email') is-password_confirmation @enderror"
                                       type="password" name="password_confirmation"
                                       placeholder="تکرار کلمه عبور">
                                @error('password_confirmation')
                                <div class="alert alert-danger mt-2"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="form-account-row form-account-submit">
                                <div class="parent-btn">
                                    <button type="submit" class="dk-btn dk-btn-info">
                                        تغییر رمز عبور
                                        <i class="now-ui-icons users_circle-08"></i>
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
