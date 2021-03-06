<!-- responsive-header -->
<nav class="navbar direction-ltr fixed-top header-responsive">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="#pablo">
                <img src="{{ asset('images/logo.png') }}" height="24px" alt="">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
                <div class="search-nav default">
                    <form action="">
                        <input type="text" placeholder="جستجو ...">
                        <button type="submit"><img src="{{ asset('images/search.png') }}" alt=""></button>
                    </form>
                    <ul>
                        <li><a href="{{ route('home.users_profile.index') }}"><i
                                    class="now-ui-icons users_single-02"></i></a></li>
                        <li><a href="#"><i class="now-ui-icons shopping_basket"></i></a></li>
                    </ul>
                </div>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <div class="logo-nav-res default text-center">
                <a href="#">
                    <img src="{{ asset('images/logo.png') }}" height="36px" alt="">
                </a>
            </div>
            @php
                $parentCategories=App\Models\Category::where('parent_id',0)->get()
            @endphp
            <ul class="navbar-nav default">
                @foreach($parentCategories as $parentCategory)
                    <li class="sub-menu">
                        <a>{{ $parentCategory->name }}</a>
                        <ul>
                            @foreach($parentCategory->children as $childCategory)
                                <li class="sub-menu">
                                    <a href="{{ route('home.categories.show',['category'=>$childCategory->slug]) }}">{{ $childCategory->name }}</a>
                                    <ul>
                                        @foreach($childCategory->products as $product)
                                            <li>
                                                <a href="{{ route('home.categories.show',['category'=>$childCategory->slug]) }}">{{ App\Models\Brand::find($product->brand_id)->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
<!-- responsive-header -->
