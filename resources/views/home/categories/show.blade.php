@extends('home.layouts.home')
@section('title')
    صفحه ای فروشگاه
@endsection
@section('script')
    <script>
        function filter() {

            let brand = $('.brand:checked').map(function () {
                return this.value;
            }).get().join('-');
            if (brand == "") {
                $('#filter-brand').prop('disabled', true);
            } else {
                $('#filter-brand').val(brand);
            }

            let attributes = @json($attributes);
            attributes.map(attribute => {
                let valueAttribute = $(`.attribute-${attribute.id}:checked`).map(function () {
                    return this.value;
                }).get().join('-');

                if (valueAttribute == "") {
                    $(`#filter-attribute-${attribute.id}`).prop('disabled', true);
                } else {
                    $(`#filter-attribute-${attribute.id}`).val(valueAttribute);
                }
            });
            let variation = $('.variation:checked').map(function () {
                return this.value;
            }).get().join('-');
            if (variation == "") {
                $('#filter-variation').prop('disabled', true);
            } else {
                $('#filter-variation').val(variation);
            }
            let search = $('#search-input').val();
            if (search == "") {
                $('#filter-search').prop('disabled', true);
            } else {
                $('#filter-search').val(search);
            }

            $('#filter-form').submit();

        }

        $('#filter-form').on('submit', function (event) {
            event.preventDefault();
            let currentUrl = '{{ url()->current() }}';
            let url = currentUrl + '?' + decodeURIComponent($(this).serialize());
            let urlF = url.replace(/ /g, "_");
            $(location).attr('href', urlF);
        });
    </script>
@endsection
@section('content')
    <!-- main -->
    <main class="search-page default">
        <div class="container">
            <div class="row">
                <aside class="sidebar-page col-12 col-sm-12 col-md-4 col-lg-3 order-1">
                    <div class="box">
                        <div class="box-header">جستجو در نتایج:</div>
                        <div class="box-content">
                            <div class="ui-input ui-input--quick-search">
                                <input id="search-input" type="text" class="ui-input-field ui-input-field--cleanable"
                                       placeholder="نام محصول یا برند مورد نظر را بنویسید…" onchange="filter()"
                                       value="{{ request()->has('search') ? request()->search : '' }}">
                                <span class="ui-input-cleaner"></span>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header">
                            <div class="box-toggle" data-toggle="collapse" href="#collapseExample1" role="button"
                                 aria-expanded="true" aria-controls="collapseExample1">
                                دسته بندی نتایج
                                <i class="now-ui-icons arrows-1_minimal-down"></i>
                            </div>
                        </div>
                        <div class="box-content">
                            <div class="collapse show" id="collapseExample1">
                                <div class="profile-menu hidden-md">
                                    <div class="my-2">
                                        <i class="fal fa-chevron-left ml-2"></i>
                                        {{ $category->parent->name }}</div>
                                    <ul class="my-3 pr-3">
                                        @foreach($category->parent->children as $childCategory)
                                            <li class="random-font">
                                                <a href="{{ route('home.categories.show',['category'=>$childCategory->slug]) }}"
                                                   style="{{ $childCategory->name==$category->name ? 'color: #009ec9':'' }}">
                                                    {{ $childCategory->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-header">
                            <div class="box-toggle" data-toggle="collapse" href="#collapseExample2" role="button"
                                 aria-expanded="true" aria-controls="collapseExample2">
                                برند
                                <i class="now-ui-icons arrows-1_minimal-down"></i>
                            </div>
                        </div>
                        <div class="box-content">
                            <div class="collapse show" id="collapseExample2">
                                <div class="ui-input ui-input--quick-search">
                                    <input type="text" class="ui-input-field ui-input-field--cleanable"
                                           placeholder="نام برند مورد نظر را بنویسید…">
                                    <span class="ui-input-cleaner"></span>
                                </div>
                                <div class="filter-option">
                                    @foreach($categoryBrands->unique('brand_id') as $brand)
                                        <div class="checkbox">
                                            <input id="brand-{{ $brand->id }}" class="brand"
                                                   type="checkbox" value="{{ $brand->brand->name }}"
                                                   onchange="filter()"
                                                {{ (request()->has('brand') && in_array(str_replace(' ','_',$brand->brand->name) ,explode('-',request('brand')))) ? 'checked' :''}}>
                                            <label for="brand-{{ $brand->id }}">
                                                {{ $brand->brand->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($attributes as $attribute)
                        <div class="box">
                            <div class="box-header">
                                <div class="box-toggle" data-toggle="collapse"
                                     href="#collapseExample2-{{ $attribute->id }}" role="button"
                                     aria-expanded="true" aria-controls="collapseExample2">
                                    {{ $attribute->name }}
                                    <i class="now-ui-icons arrows-1_minimal-down"></i>
                                </div>
                            </div>
                            <div class="box-content">
                                <div class="collapse show" id="collapseExample2-{{ $attribute->id }}">
                                    <div class="filter-option">
                                        @foreach($attribute->values->unique('value') as $value)
                                            <div class="checkbox">
                                                <input type="checkbox" id="attribute-{{ $value->value }}"
                                                       class="attribute-{{ $attribute->id }}"
                                                       value="{{ $value->value }}" onchange="filter()"
                                                    {{ (request()->has('attribute.'.$attribute->id) && in_array(str_replace(' ','_',$value->value) ,explode('-', request()->attribute[$attribute->id]))) ? 'checked':'' }}>
                                                <label for="attribute-{{ $value->value }}">
                                                    {{ $value->value }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="box">
                        <div class="box-header">
                            <div class="box-toggle" data-toggle="collapse" href="#collapseExample2" role="button"
                                 aria-expanded="true" aria-controls="collapseExample2">
                                {{ $variation->name }}
                                <i class="now-ui-icons arrows-1_minimal-down"></i>
                            </div>
                        </div>
                        <div class="box-content">
                            <div class="collapse show" id="collapseExample2">
                                <div class="filter-option">
                                    @foreach($variation->variationValues as $value)
                                        <div class="checkbox">
                                            <input class="variation" value="{{ $value->value }}"
                                                   type="checkbox" id="variation-{{ $value->value }}"
                                                   onchange="filter()"
                                                {{ (request()->has('variation') && in_array(str_replace(' ','_',$value->value) ,explode('-',request('variation'))))?'checked':''}}>
                                            <label for="variation-{{ $value->value }}">
                                                {{ $value->value }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                        <div class="box">--}}
                    {{--                            <div class="box-content">--}}
                    {{--                                <input type="checkbox" name="checkbox" class="bootstrap-switch" checked/>--}}
                    {{--                                <label >فقط کالاهای موجود</label>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="box">--}}
                    {{--                            <div class="box-content">--}}
                    {{--                                <input type="checkbox" name="checkbox" class="bootstrap-switch" checked/>--}}
                    {{--                                <label for="">فقط کالاهای آماده ارسال</label>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                </aside>
                <div class="col-12 col-sm-12 col-md-8 col-lg-9 order-2">
                    <div class="breadcrumb-section default">
                        <ul class="breadcrumb-list">
                            <li>
                                <a href="#">
                                    <span>فروشگاه اینترنتی تاپ کالا</span>
                                </a>
                            </li>
                            <li><span>جستجوی موبایل</span></li>
                        </ul>
                    </div>
                    <div class="listing default">
                        <div class="listing-counter">۶,۱۸۸ کالا</div>
                        <div class="listing-header default">
                            <ul class="listing-sort nav nav-tabs justify-content-center" role="tablist"
                                data-label="مرتب‌سازی بر اساس :">
                                <li>
                                    <a class="active " data-toggle="tab" href="#related" role="tab"
                                       aria-expanded="false">مرتبط‌ترین</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#most-view" role="tab"
                                       aria-expanded="false">پربازدیدترین</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#new" role="tab" aria-expanded="true"
                                       onchange="filter()">جدیدترین</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#most-seller" role="tab"
                                       aria-expanded="false" onchange="filter()">پرفروش‌ترین‌</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#down-price" role="tab"
                                       aria-expanded="false" onchange="filter()">ارزان‌ترین</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#top-price" role="tab" onchange="filter()"
                                       aria-expanded="false">گران‌ترین</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content default text-center">
                            <div class="tab-pane active" id="related" role="tabpanel" aria-expanded="true">
                                <div class="container no-padding-right">
                                    <ul class="row listing-items">
                                        @foreach($products as $product)
                                            <li class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding">
                                                <div class="product-box">
                                                    <div
                                                        class="product-seller-details product-seller-details-item-grid">
                                                        <span class="product-main-seller"><span
                                                                class="product-seller-details-label">فروشنده:
                                                            </span>تاپ کالا</span>
                                                        <span class="product-seller-details-badge-container"></span>
                                                    </div>
                                                    <a class="product-box-img" href="#">
                                                        <img
                                                            src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$product->primary_image) }}"
                                                            alt="{{ $product->primary_image }}">
                                                    </a>
                                                    <div class="product-box-content">
                                                        <div class="product-box-content-row">
                                                            <div class="product-box-title">
                                                                <a href="#">
                                                                    {{ $product->name }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                        @if($product->quantity_check)
                                                            <div class="product-box-row product-box-row-price">
                                                                <div class="price">
                                                                    <div class="price-value">
                                                                        <div class="price-value-wrapper">
                                                                            @if($product->sale_check)
                                                                                <div class="d-flex flex-row align-items-center">
                                                                                    <del
                                                                                        class="expired">{{ number_format($product->sale_check->price) }}</del>
                                                                                    @foreach($product->variations->take(1) as $percentage)
                                                                                        @if($percentage->is_sale)
                                                                                            <span
                                                                                                class="price-discount">%{{ $percentage->percent_sale }}</span>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                                <span>{{ number_format($product->sale_check->sale_price) }}<span
                                                                                        class="price-currency">تومان</span></span>
                                                                            @else
                                                                                <span>{{ number_format($product->price_check->price) }}<span
                                                                                        class="price-currency">تومان</span></span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="justify-content-center fontSize">
                                                                ناموجود
                                                            </div>
                                                        @endif
                                                    </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="pager default text-center">
                            <ul class="pager-items">
                                <li>
                                    <a class="pager-item is-active" href="#">۱</a>
                                </li>
                                <li>
                                    <a class="pager-item" href="#">۲</a>
                                </li>
                                <li>
                                    <a class="pager-item" href="#">۳</a>
                                </li>
                                <li>
                                    <a class="pager-item" href="#">۴</a>
                                </li>
                                <li>
                                    <a class="pager-item" href="#">۵</a>
                                </li>
                                <line class="pager-items--partition"></line>
                                <li>
                                    <a class="pager-next"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <form id="filter-form">
                    <input id="filter-brand" type="hidden" name="brand">
                    @foreach($attributes as $attribute)
                        <input id="filter-attribute-{{ $attribute->id }}" type="hidden"
                               name="attribute[{{ $attribute->id }}]">
                    @endforeach
                    <input id="filter-variation" type="hidden" name="variation">
                    <input id="filter-search" type="hidden" name="search">
                </form>
            </div>
        </div>
    </main>
    <!-- main -->
@endsection
