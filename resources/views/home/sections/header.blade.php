<!-- header -->
<header class="main-header default">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="logo-area default">
                    <a href="#">
                        <img src="{{ asset('images/logo.png') }}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-8 col-7">
                <div class="search-area default">
                    <form action="" class="search">
                        <input type="text" placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
                        <button type="submit"><img src="{{ asset('images/search.png') }}" alt="search img"></button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="user-login dropdown">
                    <a href="#" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                       id="navbarDropdownMenuLink1">
                        ورود / ثبت نام
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        <div class="dropdown-item">
                            <a class="btn btn-info">ورود به تاپ کالا</a>
                        </div>
                        <div class="dropdown-item font-weight-bold">
                            <span>کاربر جدید هستید؟</span> <a class="register" href="#">ثبت‌نام</a>
                        </div>
                    </ul>
                </div>
                <div class="cart dropdown">
                    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink1">
                        <i class="now-ui-icons shopping_cart-simple"></i>
                        سبد خرید
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        <div class="basket-header">
                            <div class="basket-total">
                                <span>مبلغ کل خرید:</span>
                                <span> ۲۳,۵۰۰</span>
                                <span> تومان</span>
                            </div>
                            <a href="#" class="basket-link">
                                <span>مشاهده سبد خرید</span>
                                <div class="basket-arrow"></div>
                            </a>
                        </div>
                        <ul class="basket-list">
                            <li>
                                <a href="#" class="basket-item">
                                    <button class="basket-item-remove"></button>
                                    <div class="basket-item-content">
                                        <div class="basket-item-image">
                                            <img alt="" src="#">
                                        </div>
                                        <div class="basket-item-details">
                                            <div class="basket-item-title">هندزفری بلوتوث مدل S530
                                            </div>
                                            <div class="basket-item-params">
                                                <div class="basket-item-props">
                                                    <span> ۱ عدد</span>
                                                    <span>رنگ مشکی</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="basket-submit">ورود و ثبت سفارش</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu">
        <div class="container">
            @php
                $parentCategories=App\Models\Category::where('parent_id',0)->get()
            @endphp
            <ul class="list float-right">
                @foreach($parentCategories as $parentCategory)
                    <li class="list-item list-item-has-children mega-menu mega-menu-col-5">
                        <a class="nav-link">{{ $parentCategory->name }}</a>
                        <ul class="sub-menu nav">
                            @foreach($parentCategory->children as $childCategory)
                                <li class="list-item list-item-has-children">
                                    <i class="now-ui-icons arrows-1_minimal-left"></i>
                                    <a class="main-list-item nav-link" href="{{ route('home.categories.show',['category'=>$childCategory->slug]) }}">{{ $childCategory->name }}</a>
                                    <ul class="sub-menu nav">
                                        @foreach($childCategory->products as $product)
                                            @if($product->category_id == $childCategory->id )
                                                <li class="list-item">
                                                    <a class="nav-link" href="{{ route('home.categories.show',['category'=>$childCategory->slug]) }}">{{ $product->name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                <li class="list-item amazing-item">
                    <a class="nav-link" href="#" target="_blank">شگفت‌انگیزها</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- header -->
