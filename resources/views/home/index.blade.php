@extends('home.layouts.home')
@section('title')
    صفحه اصلی
@endsection
@section('content')
    <main class="main default">
        <div class="container">
            <!-- banner -->
            @foreach($fixSliders as $fixSlider)
                <div class="row banner-ads">
                    <div class="col-12">
                        <section class="banner">
                            <a href="#">
                                <img src="{{ url(env('BANNER_IMAGES_UPLOAD_PATH').$fixSlider->image) }}" alt="">
                            </a>
                        </section>
                    </div>
                </div>
            @endforeach
        <!-- banner -->
            <div class="row">
                <aside class="sidebar col-12 col-lg-3 order-2 order-lg-1">
                    <div class="sidebar-inner default">
                        {{-- Banners sidebar top section--}}
                        @foreach($sidebarTopSliders as $sidebarTopSlider)
                            <div class="widget-banner widget card">
                                <a href="#" target="_top">
                                    <img class="img-fluid"
                                         src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH').$sidebarTopSlider->image) }}"
                                         alt="">
                                </a>
                            </div>
                        @endforeach
                        <div class="widget-services widget card">
                            <div class="row">
                                <div class="feature-item col-12">
                                    <a href="#" target="_blank">
                                        <img src="{{ asset('images/home/svg/return-policy.svg') }}" alt="">
                                    </a>
                                    <p>ضمانت برگشت</p>
                                </div>
                                <div class="feature-item col-6">
                                    <a href="#" target="_blank">
                                        <img src="{{ asset('images/home/svg/payment-terms.svg') }}" alt="">
                                    </a>
                                    <p>پرداخت درمحل</p>
                                </div>
                                <div class="feature-item col-6">
                                    <a href="#" target="_blank">
                                        <img src="{{ asset('images/home/svg/delivery.svg') }}" alt="">
                                    </a>
                                    <p>تحویل اکسپرس</p>
                                </div>
                                <div class="feature-item col-6">
                                    <a href="#" target="_blank">
                                        <img src="{{ asset('images/home/svg/origin-guarantee.svg') }}" alt="">
                                    </a>
                                    <p>تضمین بهترین قیمت</p>
                                </div>
                                <div class="feature-item col-6">
                                    <a href="#" target="_blank">
                                        <img src="{{ asset('images/home/svg/contact-us.svg') }}" alt="">
                                    </a>
                                    <p>پشتیبانی 24 ساعته</p>
                                </div>
                            </div>
                        </div>
                        {{-- End Banners sidebar top section--}}
                        {{-- Suggestion products section --}}
                        <div class="widget-suggestion widget card">
                            <header class="card-header">
                                <h3 class="card-title">پیشنهاد لحظه ای</h3>
                            </header>
                            <div id="progressBar">
                                <div class="slide-progress"></div>
                            </div>
                            <div id="suggestion-slider" class="owl-carousel owl-theme">
                                @foreach($products->take(6) as $product)
                                    @if($product->random_product)
                                        <div class="item">
                                            <a href="#">
                                                <img
                                                    src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$product->primary_image) }}"
                                                    class="w-100" alt="{{ $product->primary_image }}">
                                            </a>
                                            <h3 class="product-title">
                                                <a href="#">{{ $product->name }} </a>
                                            </h3>
                                            <div class="price">
                                                @if($product->sale_check)
                                                    <del>
                                                        <span>{{ number_format($product->sale_check->price) }}<span>تومان</span></span>
                                                    </del>
                                                    <span>{{ number_format($product->sale_check->sale_price) }}<span>تومان</span></span>
                                                    @foreach($product->variations->take(1) as $percentage)
                                                        @if($percentage->is_sale)
                                                            <span class="btn-danger btn-sm mx-auto">%{{ $percentage->percent_sale }} تخفیف </span>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <span>{{ number_format($product->price_check->price) }}<span>تومان</span></span>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        {{-- End Suggestion products section --}}
                        {{-- Banners sidebar bottom section--}}
                        @foreach($sidebarBottomBanners as $sidebarBottomBanner)
                            <div class="widget-banner widget card">
                                <a href="#" target="_blank">
                                    <img class="img-fluid"
                                         src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH').$sidebarBottomBanner->image) }}"
                                         alt="">
                                </a>
                            </div>
                        @endforeach
                        {{--End Banners sidebar bottom section--}}
                    </div>
                </aside>
                <div class="col-12 col-lg-9 order-1 order-lg-2">
                    {{-- Banner main-slider section --}}
                    <section id="main-slider" class="carousel slide carousel-fade card"
                             data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                            <li data-target="#main-slider" data-slide-to="1"></li>
                            <li data-target="#main-slider" data-slide-to="2"></li>
                            <li data-target="#main-slider" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach($topSliders as $topSlider)
                                <div class="carousel-item {{ $loop->first?'active':'' }}">
                                    <a class="d-block" href="#">
                                        <img
                                            src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH').$topSlider->image) }}"
                                            class="d-block w-100" alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#main-slider" role="button"
                           data-slide="prev">
                            <i class="now-ui-icons arrows-1_minimal-right"></i>
                        </a>
                        <a class="carousel-control-next" href="#main-slider" data-slide="next">
                            <i class="now-ui-icons arrows-1_minimal-left"></i>
                        </a>
                    </section>
                    {{--End Banner main-slider section --}}
                    {{-- Select Products Banners section--}}
                    <section id="amazing-slider" class="carousel slide carousel-fade card" data-ride="carousel">
                        <div class="row m-0">
                            <ol class="carousel-indicators pr-0 d-flex flex-column col-lg-3">
                                @foreach($products->take(9) as $product)
                                    <li class="{{ $loop->first?'active':'' }}" data-target="#amazing-slider"
                                        data-slide-to="{{ ($product->id)-1 }}">
                                        <span>{{ $product->name }}</span>
                                    </li>
                                @endforeach
                                <li class="view-all">
                                    <a href="#" class="btn btn-primary btn-block hvr-sweep-to-left">
                                        <i class="fas fa-arrow-left"></i>مشاهده همه شگفت انگیزها
                                    </a>
                                </li>
                            </ol>
                            <div class="carousel-inner p-0 col-12 col-lg-9">
                                <img class="amazing-title" src="{{ asset('images/home/amazing-title-01.png') }}" alt="">
                                @foreach($products->take(9) as $product)

                                    <div class="carousel-item {{ $loop->first?'active':'' }}">
                                        <div class="row m-0">
                                            <div class="right-col col-5 d-flex align-items-center">
                                                <a class="w-100 text-center" href="#">
                                                    <img
                                                        src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$product->primary_image) }}"
                                                        class="img-fluid" alt="{{ $product->primary_image }}">
                                                </a>
                                            </div>
                                            <div class="left-col col-7">
                                                <div class="price">
                                                    @if($product->quantity_check)
                                                        @if($product->sale_check)
                                                            <del>
                                                                <span>{{ number_format($product->sale_check->price) }}<span>تومان</span></span>
                                                            </del>
                                                            <ins><span>{{ number_format($product->sale_check->sale_price) }}<span>تومان</span></span>
                                                            </ins>
                                                            @foreach($product->variations->take(1) as $percentage)
                                                                @if($percentage->is_sale)
                                                                    <ins><span class="discount-percent">%{{ $percentage->percent_sale }} تخفیف </span>
                                                                    </ins>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <ins><span class="amount">{{ number_format($product->price_check->price) }}<span>تومان</span></span>
                                                            </ins>
                                                        @endif
                                                    @else
                                                        <p class="finished text-center">ناموجود</p>
                                                    @endif
                                                </div>
                                                <h2 class="product-title">
                                                    <a href="#">{{ $product->name }} </a>
                                                </h2>
                                                <ul class="list-group">
                                                    @foreach($product->attributes()->with('attribute')->get() as $attribute)
                                                        <li class="list-group-item">{{ $attribute->attribute->name }}:
                                                            {{ $attribute->value }}</li>
                                                    @endforeach
                                                </ul>
                                                <hr>
                                                @if($product->quantity_check)
                                                    @if($product->sale_check)
                                                        <div class="countdown-timer" countdown
                                                             data-date="{{ $product->sale_check->date_on_sale_to }}">
                                                            <span data-days>0</span>:
                                                            <span data-hours>0</span>:
                                                            <span data-minutes>0</span>:
                                                            <span data-seconds>0</span>
                                                        </div>
                                                        <div class="timer-title">زمان باقی مانده تا پایان سفارش</div>
                                                    @endif
                                                @else
                                                    <a href="#" class="finished btn"> تمام شد </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                    {{-- Banners index top section--}}
                    <div class="row banner-ads">
                        <div class="col-12">
                            <div class="row">
                                @foreach( $indexTopBanners as $indexTopBanner)
                                    <div class="col-6 col-lg-3">
                                        <div class="widget-banner card">
                                            <a href="#" target="_blank">
                                                <img class="img-fluid"
                                                     src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH').$indexTopBanner->image) }}"
                                                     alt="{{ $indexTopBanner->image }}">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{--End Banners index top section--}}
                    {{--  Products section first --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-product card">
                                @foreach($mobileProducts as $mobileProduct)
                                    <header class="card-header">
                                        <h3 class="card-title">
                                            <span>{{ $mobileProduct->name }}</span>
                                        </h3>
                                        <a href="#" class="view-all">مشاهده همه</a>
                                    </header>
                                    <div class="product-carousel owl-carousel owl-theme">
                                        @foreach($mobileProduct->products as $mobile)
                                            <div class="item">
                                                <a href="#">
                                                    <img
                                                        src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$mobile->primary_image) }}"
                                                        class="img-fluid" alt="{{ $mobile->primary_image }}">
                                                </a>
                                                <h2 class="post-title">
                                                    <a href="#">{{ $mobile->name }}</a>
                                                </h2>
                                                <div class="price">
                                                    @if($mobile->quantity_check)
                                                        @if($mobile->sale_check)
                                                            <del>
                                                                <span>{{ number_format($mobile->sale_check->price) }}<span>تومان</span></span>
                                                            </del>
                                                            <ins><span>{{ number_format($mobile->sale_check->sale_price) }}<span>تومان</span></span>
                                                            </ins>
                                                        @else
                                                            <ins>
                                                                <span>{{ number_format($mobile->price_check->price) }}<span>تومان</span></span>
                                                            </ins>
                                                        @endif
                                                    @else
                                                        <div>
                                                            <p class="checkout-contact-location">ناموجود</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-product card">
                                @foreach($computerProducts as $computerProduct)
                                    <header class="card-header">
                                        <h3 class="card-title">
                                            <span>{{ $computerProduct->name }}</span>
                                        </h3>
                                        <a href="#" class="view-all">مشاهده همه</a>
                                    </header>
                                    <div class="product-carousel owl-carousel owl-theme">
                                        @foreach($computerProduct->products as $computer)
                                            <div class="item">
                                                <a href="#">
                                                    <img
                                                        src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$computer->primary_image) }}"
                                                        class="img-fluid" alt="{{ $computer->primary_image }}">
                                                </a>
                                                <h2 class="post-title">
                                                    <a href="#">{{ $computer->name }}</a>
                                                </h2>
                                                <div class="price">
                                                    @if($computer->quantity_check)
                                                        @if($computer->sale_check)
                                                            <del><span>{{ number_format($computer->sale_check->price) }}<span>تومان</span></span>
                                                            </del>
                                                            <ins><span>{{ number_format($computer->sale_check->sale_price) }}<span>تومان</span></span>
                                                            </ins>
                                                        @else
                                                            <ins><span>{{ number_format($computer->price_check->price) }}<span>تومان</span></span>
                                                            </ins>
                                                        @endif
                                                    @else
                                                        <div>
                                                            <p class="checkout-contact-location">ناموجود</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- End  Products section first --}}
                    {{-- Banners index middle section--}}
                    <div class="row banner-ads">
                        <div class="col-12">
                            <div class="row">
                                @foreach($indexMiddleBanners as $indexMiddleBanner)
                                    <div class="col-12 col-lg-6">
                                        <div class="widget-banner card">
                                            <a href="#" target="_blank">
                                                <img class="img-fluid"
                                                     src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH').$indexMiddleBanner->image) }}"
                                                     alt="{{ $indexMiddleBanner->image }}">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{--End Banners index middle section--}}
                    {{--  Products section second --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-product card">
                                @foreach($bookProducts as $bookProduct)
                                    <header class="card-header">
                                        <h3 class="card-title">
                                            <span>{{ $bookProduct->name }}</span>
                                        </h3>
                                        <a href="#" class="view-all">مشاهده همه</a>
                                    </header>
                                    <div class="product-carousel owl-carousel owl-theme">
                                        @foreach($bookProduct->products as $book)
                                            <div class="item">
                                                <a href="#">
                                                    <img
                                                        src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$book->primary_image) }}"
                                                        class="img-fluid" alt="{{ $book->primary_image }}">
                                                </a>
                                                <h2 class="post-title">
                                                    <a href="#">{{ $book->name }}</a>
                                                </h2>
                                                <div class="price">
                                                    @if($book->quantity_check)
                                                        @if($book->sale_check)
                                                            <del>
                                                                <span>{{ number_format($book->sale_check->price) }}<span>تومان</span></span>
                                                            </del>
                                                            <ins><span>{{ number_format($book->sale_check->sale_price) }}<span>تومان</span></span>
                                                            </ins>
                                                        @else
                                                            <ins>
                                                                <span>{{ number_format($book->price_check->price) }}<span>تومان</span></span>
                                                            </ins>
                                                        @endif
                                                    @else
                                                        <div>
                                                            <p class="checkout-contact-location">ناموجود</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-product card">
                                @foreach($handmadeProducts as $handmadeProduct)
                                    <header class="card-header">
                                        <h3 class="card-title">
                                            <span>{{ $handmadeProduct->name }}</span>
                                        </h3>
                                        <a href="#" class="view-all">مشاهده همه</a>
                                    </header>
                                    <div class="product-carousel owl-carousel owl-theme">
                                        @foreach($handmadeProduct->products as $handmade)
                                            <div class="item">
                                                <a href="#">
                                                    <img
                                                        src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$handmade->primary_image) }}"
                                                        class="img-fluid" alt="{{ $handmade->primary_image }}">
                                                </a>
                                                <h2 class="post-title">
                                                    <a href="#">{{ $handmade->name }}</a>
                                                </h2>
                                                <div class="price">
                                                    @if($handmade->quantity_check)
                                                        @if($handmade->sale_check)
                                                            <del><span>{{ number_format($handmade->sale_check->price) }}<span>تومان</span></span>
                                                            </del>
                                                            <ins><span>{{ number_format($handmade->sale_check->sale_price) }}<span>تومان</span></span>
                                                            </ins>
                                                        @else
                                                            <ins><span>{{ number_format($handmade->price_check->price) }}<span>تومان</span></span>
                                                            </ins>
                                                        @endif
                                                    @else
                                                        <div>
                                                            <p class="checkout-contact-location">ناموجود</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- End  Products section second --}}
                    {{-- Banners index bootom section--}}
                    <div class="row banner-ads">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    @foreach($indexBottomBanners as $indexBottomBanner)
                                        <div class="widget widget-banner card">
                                            <a href="#" target="_blank">
                                                <img class="img-fluid"
                                                     src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH').$indexBottomBanner->image) }}"
                                                     alt="">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--End Banners index bootom section--}}
                    {{--  Products section third --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-product card">
                                @foreach($homeAppliancesProducts as $homeAppliancesProduct)
                                    <header class="card-header">
                                        <h3 class="card-title">
                                            <span>{{ $homeAppliancesProduct->name }}</span>
                                        </h3>
                                        <a href="#" class="view-all">مشاهده همه</a>
                                    </header>
                                    <div class="product-carousel owl-carousel ">
                                        @foreach($homeAppliancesProduct->products as $homeAppliances)
                                            <div class="item">
                                                <a href="#">
                                                    <img
                                                        src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$homeAppliances->primary_image) }}"
                                                        class="img-fluid"
                                                        alt="{{ $homeAppliances->primary_image }}">
                                                </a>
                                                <h2 class="post-title">
                                                    <a href="#">{{ $homeAppliances->name }}</a>
                                                </h2>
                                                <div class="price">
                                                    @if($homeAppliances->quantity_check)
                                                        @if($homeAppliances->sale_check)
                                                            <del><span>{{ number_format($homeAppliances->sale_check->price) }}<span>تومان</span></span>
                                                            </del>
                                                            <ins><span>{{ number_format($homeAppliances->sale_check->sale_price) }}<span>تومان</span></span>
                                                            </ins>
                                                        @else
                                                            <ins><span>{{ number_format($homeAppliances->price_check->price) }}<span>تومان</span></span>
                                                            </ins>
                                                        @endif
                                                    @else
                                                        <div>
                                                            <p class="checkout-contact-location">ناموجود</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- End  Products section third --}}
                </div>
            </div>
            {{-- Brand banners section--}}
            <div class="row">
                <div class="col-12">
                    <div class="brand-slider card">
                        <header class="card-header">
                            <h3 class="card-title"><span>برندهای ویژه</span></h3>
                        </header>
                        <div class="owl-carousel">
                            @foreach($brandBanners as $brandBanner)
                                <div class="item">
                                    <a href="#">
                                        <img src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH').$brandBanner->image) }}"
                                             alt="">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Brand banners section--}}
        </div>
    </main>
@endsection
