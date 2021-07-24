@extends('home.layouts.home')
@section('title')
    صحفه ای محصول
@endsection
@section('script')
    <script>
        $('.radio input').on('change', function () {
            let variation = JSON.parse(this.value);
            let variationPriceDiv = $('.variation-price');
            variationPriceDiv.empty();
            if (variation.is_sale) {
                let percentage = $('<div/>', {
                    class: 'price-discount',
                    text: Math.round(((variation.price - variation.sale_price) / variation.price) * 100) + ' % '
                });
                let spanSale = $('<div/>', {
                    class: 'price-value',
                    text: toPersianNum(number_format(variation.sale_price)) + ' تومان'
                });
                let spanPrice = $('<del/>', {
                    text: toPersianNum(number_format(variation.price)) + 'تومان '
                });
                variationPriceDiv.append(spanSale);
                variationPriceDiv.append(spanPrice);
                variationPriceDiv.append(percentage);
            } else {
                let spanPrice = $('<div/>', {
                    class: 'price-value',
                    text: toPersianNum(number_format(variation.price)) + ' تومان'
                });
                variationPriceDiv.append(spanPrice);
            }
        });
    </script>
@endsection
@section('content')
    <!-- main -->
    <main class="single-product default">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ul class="breadcrumb">
                            <li>
                                <a href="#"><span>فروشگاه اینترنتی تاپ کالا</span></a>
                            </li>
                            <li>
                                <a href="#"><span>{{ $product->category->parent->name }}</span></a>
                            </li>
                            <li>
                                <a href="#"><span>{{ $product->category->name }}</span></a>
                            </li>
                            <li>
                                <span>{{ $product->name }}</span>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <article class="product">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="product-gallery default">
                                    <img href="#" class="zoom-img" id="img-product-zoom"
                                         src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$product->primary_image) }}"
                                         data-zoom-image="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$product->primary_image) }}"
                                         width="411"/>

                                    <div id="gallery_01f" style="width:500px;float:left;">
                                        <ul class="gallery-items">
                                            <li>
                                                @foreach($product->images as $image)
                                                    <a href="#" class="elevatezoom-gallery" data-update=""
                                                       data-image="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$image->image) }}"
                                                       data-zoom-image="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$image->image) }}">
                                                        <img
                                                            src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH').$image->image) }}"
                                                            width="100"/></a>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="gallery-options">
                                    <li>
                                        @auth()
                                            @if($product->checkUserWishlist(auth()->id()))
                                                <button class="add-favorites">
                                                    <a href="#">
                                                        <i class="fa fa-heart favorites"></i>
                                                        <span
                                                            class="tooltip-option">به لیست علاقه مندی ها اضافه شده است</span></a>
                                                </button>
                                            @else
                                                <button class="add-favorites">
                                                    <a href="{{ route('home.wishlist.add',['product'=>$product->id]) }}">
                                                        <i class="fa fa-heart"></i>
                                                        <span class="tooltip-option">افزودن به علاقمندی</span></a>
                                                </button>
                                            @endif
                                        @else
                                            <button class="add-favorites">
                                                <a href="{{ route('home.wishlist.add',['product'=>$product->id]) }}">
                                                    <i class="fa fa-heart"></i>
                                                    <span class="tooltip-option">افزودن به علاقمندی</span></a>
                                            </button>
                                        @endauth
                                    </li>
                                    <li>
                                        <button data-toggle="modal" data-target="#myModal"><i
                                                class="fa fa-share-alt"></i></button>
                                        <span class="tooltip-option">اشتراک گذاری</span>
                                    </li>
                                </ul>
                                <!-- Modal Core -->
                                <div class="modal-share modal fade" id="myModal" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">اشتراک گذاری</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-share">
                                                    <div class="form-share-title">اشتراک گذاری در شبکه های اجتماعی</div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <ul class="btn-group-share">
                                                                <li><a href="#" class="btn-share btn-share-twitter"
                                                                       target="_blank"><i class="fa fa-twitter"></i></a>
                                                                </li>
                                                                <li><a href="#" class="btn-share btn-share-facebook"
                                                                       target="_blank"><i
                                                                            class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#" class="btn-share btn-share-google-plus"
                                                                       target="_blank"><i class="fa fa-google-plus"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="form-share-title">ارسال به ایمیل</div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="ui-input ui-input-send-to-email"></label>
                                                            <input class="ui-input-field" type="email"
                                                                   placeholder="آدرس ایمیل را وارد نمایید.">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn-primary">ارسال</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <form class="form-share-url default">
                                                    <div class="form-share-url-title">آدرس صفحه</div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="ui-url">
                                                                <input class="ui-url-field"
                                                                       value="https://www.digikala.com">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Core -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="product-title default">
                                    <h1>
                                        {{ $product->name }}
                                        <span>{{ $product->slug }}</span></h1>
                                </div>
                                <div class="product-directory default">
                                    <ul>
                                        <li>
                                            <span>برند</span> :
                                            <span class="product-brand-title">{{ $product->brand->name }}</span>
                                        </li>
                                        <li>
                                            <span>دسته‌بندی</span> :
                                            <a href="#" class="btn-link-border">
                                                {{ $product->category->name }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-variants default">
                                    @if($product->quantity_check)
                                        @php
                                            if ($product->sale_check){
                                                $variationProductSelect=$product->sale_check;
                                            }else{
                                                $variationProductSelect=$product->price_check;
                                                }
                                        @endphp
                                        <span>{{ App\Models\Attribute::find($product->variations->first()->attribute_id)->name }}: </span>
                                        <div class="radio">
                                            @foreach($product->variations()->where('quantity','>',0)->get() as $variation)
                                                <input type="radio" name="radio-1" id="radio-{{ $variation->id }}"
                                                       value="{{ json_encode($variation->only(['id','quantity','price','is_sale','sale_price'])) }}"
                                                    {{ $variationProductSelect->id == $variation->id ?'checked':'' }}>
                                                <label for="radio-{{ $variation->id }}">
                                                    {{ $variation->value }}
                                                </label>
                                            @endforeach
                                        </div>
                                    @else
                                        <a href="#" class="finished btn "> تمام شد </a>
                                    @endif
                                </div>
                                <div class="product-guarantee default">
                                    <i class="fa fa-check-circle"></i>
                                    <p class="product-guarantee-text">گارانتی اصالت و سلامت فیزیکی کالا</p>
                                </div>
                                <div class="product-delivery-seller default">
                                    <p>
                                        <i class="now-ui-icons shopping_shop"></i>
                                        <span>فروشنده:‌</span>
                                        <a href="#" class="btn-link-border">ناسا</a>
                                    </p>
                                </div>
                                <div class="price-product defualt variation-price">
                                    @if($product->quantity_check)
                                        @if($product->sale_check)
                                            <div class="price-value">
                                                {{ number_format($product->sale_check->sale_price) }}
                                                تومان
                                            </div>
                                            <del>{{ number_format($product->sale_check->price) }}
                                                تومان
                                            </del>
                                            @foreach($product->variations->take(1) as $percentage)
                                                @if($percentage->is_sale)
                                                    <div class="price-discount">
                                                        {{ $percentage->percent_sale }}
                                                        %
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="price-value">
                                                {{ number_format($product->price_check->price) }}
                                                تومان
                                            </div>
                                        @endif
                                    @else
                                        <p class="btn btn-lg w-100">ناموجود</p>
                                    @endif
                                </div>
                                <div class="product-add default">
                                    <div class="parent-btn">
                                        <a href="#" class="dk-btn dk-btn-info">
                                            افزودن به سبد خرید
                                            <i class="now-ui-icons shopping_cart-simple"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 center-breakpoint">
                                <div class="product-guaranteed default">
                                    بیش از ۱۸۰ نفر از خریداران این محصول را پیشنهاد داده‌اند
                                </div>
                                <div class="product-params default">
                                    <ul data-title="ویژگی‌های محصول">
                                        @foreach($product->attributes()->with('attribute')->get() as $attribute)
                                            <li><span>{{ $attribute->attribute->name }}:</span>
                                                <span>{{ $attribute->value }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="col-12 default no-padding">
                        <div class="product-tabs default">
                            <div class="box-tabs default">
                                <ul class="nav" role="tablist">
                                    <li class="box-tabs-tab">
                                        <a class="{{ count($errors)>0?'':'active' }}" data-toggle="tab" href="#desc"
                                           role="tab"
                                           aria-expanded="true">
                                            <i class="now-ui-icons objects_umbrella-13"></i> نقد و بررسی
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a data-toggle="tab" href="#params" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons shopping_cart-simple"></i> مشخصات
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a data-toggle="tab" href="#comments" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons shopping_shop"></i> نظرات کاربران
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a class="{{ count($errors)>0?'active':'' }}" data-toggle="tab"
                                           href="#questions" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons ui-2_settings-90"></i> پرسش و پاسخ
                                        </a>
                                    </li>
                                </ul>
                                <div class="card-body default">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane {{ count($errors)>0?'':'active' }}" id="desc"
                                             role="tabpanel" aria-expanded="true">
                                            <article>
                                                @foreach($product->descriptions()->where('Specificationsandreview',1)->where('title','نقدوبررسی تخصصی')->get() as $specs)
                                                    <h2 class="param-title">
                                                        {{ $specs->title }}
                                                        <span>{{ $product->name }}</span>
                                                    </h2>
                                                    <div class="parent-expert default">
                                                        <div class="content-expert">
                                                            <p>
                                                                {{ $specs->description }}
                                                            </p>
                                                        </div>
                                                        <div class="sum-more">
                                                            <span class="show-more btn-link-border">
                                                                نمایش بیشتر
                                                            </span>
                                                            <span class="show-less btn-link-border">
                                                                بستن
                                                            </span>
                                                        </div>
                                                        <div class="shadow-box"></div>
                                                    </div>
                                                @endforeach
                                                <div class="accordion default" id="accordionExample">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link" type="button"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseOne"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapseOne">
                                                                    @foreach($product->descriptions->where('Specificationsandreview',1)->where('sort','B')->unique('attributes')  as $specs)
                                                                        {{ $specs->attributes }}
                                                                    @endforeach
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        @foreach($product->descriptions()->where('Specificationsandreview',1)->where('sort','B')->get()  as $specs)
                                                            <div id="collapseOne" class="collapse show"
                                                                 aria-labelledby="headingOne"
                                                                 data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <img
                                                                        src="{{ asset(env('METADECRIPTIONPRODUCT_IMAGES_UPLOAD_PATH').$specs->image) }}"
                                                                        alt="">
                                                                    <p>
                                                                        {{ $specs->description }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header" id="headingTwo">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link collapsed" type="button"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseTwo"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseTwo">
                                                                    @foreach($product->descriptions->where('Specificationsandreview',1)->where('sort','C')->unique('attributes')  as $specs)
                                                                        {{ $specs->attributes }}
                                                                    @endforeach
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        @foreach($product->descriptions()->where('Specificationsandreview',1)->where('sort','C')->get()  as $specs)
                                                            <div id="collapseTwo" class="collapse"
                                                                 aria-labelledby="headingTwo"
                                                                 data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <img
                                                                        src="{{ asset(env('METADECRIPTIONPRODUCT_IMAGES_UPLOAD_PATH').$specs->image) }}"
                                                                        alt="">
                                                                    <p>
                                                                        {{ $specs->description }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header" id="headingThree">
                                                            <h5 class="mb-0">
                                                                <button class="btn btn-link collapsed" type="button"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseThree"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseThree">
                                                                    @foreach($product->descriptions->where('Specificationsandreview',1)->where('sort','D')->unique('attributes')  as $specs)
                                                                        {{ $specs->attributes }}
                                                                    @endforeach
                                                                </button>
                                                            </h5>
                                                        </div>
                                                        @foreach($product->descriptions()->where('Specificationsandreview',1)->where('sort','D')->get()  as $specs)
                                                            <div id="collapseThree" class="collapse"
                                                                 aria-labelledby="headingThree"
                                                                 data-parent="#accordionExample">
                                                                <div class="card-body">
                                                                    <img
                                                                        src="{{ asset(env('METADECRIPTIONPRODUCT_IMAGES_UPLOAD_PATH').$specs->image) }}"
                                                                        alt="">
                                                                    <p>
                                                                        {{ $specs->description }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="tab-pane params" id="params" role="tabpanel" aria-expanded="false">
                                            <article>
                                                <h2 class="param-title">
                                                    مشخصات فنی
                                                    <span>{{ $product->name }}</span>
                                                </h2>
                                                <section>
                                                    @foreach($product->descriptions->where('Specificationsandreview',0)->where('sort','A')->unique('title')  as $defined)
                                                        <h3 class="params-title">{{ $defined->title }}</h3>
                                                    @endforeach
                                                    <ul class="params-list">
                                                        @foreach($product->descriptions()->where('Specificationsandreview',0)->where('sort','A')->get() as $defined)
                                                            <li>
                                                                <div class="params-list-key">
                                                                    <span
                                                                        class="block">{{ $defined->attributes }}</span>
                                                                </div>
                                                                <div class="params-list-value">
                                                                    <span class="block">
                                                                        {{ $defined->description }}
                                                                    </span>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </section>
                                                <section>
                                                    @foreach($product->descriptions->where('Specificationsandreview',0)->where('sort','B')->unique('title')  as $defined)
                                                        <h3 class="params-title">{{ $defined->title }}</h3>
                                                    @endforeach
                                                    <ul class="params-list">
                                                        @foreach($product->descriptions()->where('Specificationsandreview',0)->where('sort','B')->get() as $defined)
                                                            <li>
                                                                <div class="params-list-key">
                                                                    <span
                                                                        class="block">{{ $defined->attributes }}</span>
                                                                </div>
                                                                <div class="params-list-value">
                                                                    <span class="block">
                                                                        {{ $defined->description }}
                                                                    </span>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </section>
                                            </article>
                                        </div>
                                        <div class="tab-pane" id="comments" role="tabpanel" aria-expanded="false">
                                            <article>
                                                <h2 class="param-title">
                                                    نظرات کاربران
                                                    <span>{{ $product->approvedComment()->count() }}</span>
                                                </h2>
                                                <div class="comments-area default">
                                                    <ol class="comment-list">
                                                    @foreach($product->approvedComment as $comment)
                                                        <!-- #comment-## -->
                                                            <li>
                                                                @if($comment->parent_id==null)
                                                                    <div class="comment-body">
                                                                        <div class="comment-author">
                                                                            <img alt=""
                                                                                 src="{{ $comment->user->avatar == null ? asset('images/default-avatar.png'):$comment->user->avatar }}"
                                                                                 class="avatar"><cite
                                                                                class="fn">{{ $comment->user->name == null ?'کاربر گرامی': $comment->user->name}}</cite>
                                                                            <span class="says">گفت:</span></div>

                                                                        <div class="commentmetadata"><a href="#">
                                                                                {{ verta($comment->created_at)->format("%B %d %Y H:i") }}</a>
                                                                        </div>
                                                                        <p>{{ $comment->text }}</p>
                                                                        <div class="reply">
                                                                            <button class="btn btn-default"
                                                                                    type="button"
                                                                                    data-toggle="collapse"
                                                                                    data-target="#collapse-{{ $comment->id }}">
                                                                                پاسخ
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                            @endif
                                                            <!-- .children -->
                                                                <ol class="children">
                                                                    @foreach($comment->commentreplies()->where('approved',1)->get() as $reply)
                                                                        <li>
                                                                            <div class="comment-body">
                                                                                <div class="comment-author">
                                                                                    <img alt=""
                                                                                         src="{{ $reply->user->avatar == null ? asset('images/default-avatar.png'):$reply->user->avatar }}"
                                                                                         class="avatar">
                                                                                    <cite
                                                                                        class="fn">{{ $reply->user->name == null ?'کاربر گرامی': $reply->user->name}}</cite>
                                                                                    <span
                                                                                        class="says">گفت:</span>
                                                                                </div>
                                                                                <div class="commentmetadata">
                                                                                    <a href="#">
                                                                                        {{ verta($reply->created_at)->format("%B %d %Y H:i") }}</a>
                                                                                </div>
                                                                                <p>{{ $reply->text }}</p>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ol>
                                                                <!-- .children -->
                                                                <!-- #comment-## -->
                                                                <div class="tab-pane form-comment collapse"
                                                                     id="collapse-{{ $comment->id }}">
                                                                    <article>
                                                                        <h2 class="param-title"
                                                                            id="comments">
                                                                            افزودن نظر
                                                                            <span>نظر خود را در مورد محصول مطرح نمایید</span>
                                                                        </h2>
                                                                        @include('home.sections.errors')
                                                                        <form
                                                                            action="{{ route('home.comments.reply',['product'=>$product->id,'parentId'=>$comment->id]) }}"
                                                                            method="post" class="comment">
                                                                            @csrf
                                                                            <input type="hidden" name="comment"
                                                                                   value="{{ $comment->id }}">
                                                                            <textarea class="form-control"
                                                                                      placeholder="نظر"
                                                                                      name="text" rows="5"></textarea>
                                                                            <button type="submit"
                                                                                    class="btn btn-default">
                                                                                پاسخ به دیدگاه
                                                                            </button>
                                                                        </form>
                                                                    </article>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ol>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="tab-pane form-comment {{ count($errors)>0?'active':'' }}"
                                             id="questions" role="tabpanel"
                                             aria-expanded="false">
                                            <article>
                                                <h2 class="param-title" id="comments">
                                                    افزودن نظر
                                                    <span>نظر خود را در مورد محصول مطرح نمایید</span>
                                                </h2>
                                                @include('home.sections.errors')
                                                <form
                                                    action="{{ route('home.comments.store',['product'=>$product->id]) }}"
                                                    method="post" class="comment">
                                                    @csrf
                                                    <textarea class="form-control" placeholder="نظر" name="text"
                                                              rows="5"></textarea>
                                                    <button type="submit" class="btn btn-default">ارسال نظر</button>
                                                </form>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->
@endsection
