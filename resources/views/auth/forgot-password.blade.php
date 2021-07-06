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
                        @if (session('status'))
                            <div class="alert alert-success text-right" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('password.email') }}" class="form-account" method="post">
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
                            <div class="form-account-row form-account-submit">
                                <div class="parent-btn">
                                    <button class="dk-btn dk-btn-info">
                                        دریافت رمز عبور
                                        <i class="fa fa-sign-in"></i>
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

