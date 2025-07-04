<header class="main-header">
    <nav class="main-menu">
        <div class="main-menu__wrapper">
            {{-- <div class="container"> --}}
                <div class="main-menu__wrapper-inner">
                    <div class="main-menu__logo hidden-md hidden-lg">
                        <div class="section-shape-1">
                        </div>
                        <a href="{{route('front.home-page')}}"><img
                                src="{{$config->image ? $config->image->path : 'https://placehold.co/100x100'}}" class="img-fluid logo-img"
                                alt=""></a>
                    </div>
                    <style>
                        @media (max-width: 768px) {
                            .hidden-md {
                                display: block;
                            }
                            .hidden-lg {
                                display: block;
                            }
                        }
                        @media (min-width: 768px) {
                            .hidden-md {
                                display: none;
                            }
                            .hidden-lg {
                                display: none;
                            }
                        }
                    </style>

                    <div class="main-menu__top">
                        <div class="container">
                            <div class="main-menu__top-inner" style="background-image: url('/site/images/section-shape-1.png');">
                                <ul class="list-unstyled main-menu__contact-list">
                                    <li>
                                        <div class="icon">
                                            <i class="icon-telephone"></i>
                                        </div>
                                        <div class="text">
                                            <p><a
                                                    href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline }}</a>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="icon-envelope-2"></i>
                                        </div>
                                        <div class="text">
                                            <p><a href="mailto:{{ $config->email }}">{{ $config->email }}</a>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="main-menu__logo">
                                    <a href="{{ route('front.home-page') }}"><img
                                            src="{{ $config->image ? $config->image->path : 'https://placehold.co/100x100' }}"
                                            class="img-fluid logo-img" alt=""></a>
                                </div>
                                <div class="main-menu__top-right">
                                    <div class="main-menu__top-time">
                                        <div class="main-menu__top-time-icon">
                                            <span class="far fa-clock"></span>
                                        </div>
                                        <p class="main-menu__top-text">Mon - Fri: 09:00 - 05:00</p>
                                    </div>
                                    <div class="main-menu__social">
                                        <a href="{{ $config->twitter }}"><i class="fab fa-twitter"></i></a>
                                        <a href="{{ $config->facebook }}"><i class="fab fa-facebook"></i></a>
                                        <a href="{{ $config->pinterest }}"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="{{ $config->instagram }}"><i class="fab fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-menu__bottom container">
                        <div class="main-menu__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li class="{{Route::is('front.home-page') ? 'current' : ''}} ">
                                    <a href="{{ route('front.home-page') }}">Trang chủ </a>
                                </li>
                                <li class="{{Route::is('front.about-us') ? 'current' : ''}} ">
                                    <a href="{{ route('front.about-us') }}">Giới thiệu</a>
                                </li>
                                @foreach ($productCategories as $category)
                                    <li class="{{ $category->childs->count() > 0 ? 'dropdown' : ''}} {{Route::currentRouteName() == 'front.show-product-category' && $category->slug == request()->route()->parameter('categorySlug') ? 'current' : ''}} ">
                                        <a
                                            href="{{ route('front.show-product-category', $category->slug) }}">{{ $category->name }}</a>
                                        @if ($category->childs->count() > 0)
                                            <ul>
                                                @foreach ($category->childs as $child)
                                                    <li class="dropdown  current ">
                                                        <a
                                                            href="{{ route('front.show-product-category', $child->slug) }}">{{ $child->name }}</a>
                                                        @if ($child->childs->count() > 0)
                                                            <ul>
                                                                @foreach ($child->childs as $child)
                                                                    <li><a
                                                                            href="{{ route('front.show-product-category', $child->slug) }}">{{ $child->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                                {{-- <li class="{{Route::is('front.gallery') ? 'current' : ''}} ">
                                    <a href="">Thư viện</a>
                                </li> --}}
                                @foreach ($postCategories as $category)
                                    <li class="{{ $category->childs->count() > 0 ? 'dropdown' : ''}} {{Route::currentRouteName() == 'front.list-blog' && $category->slug == request()->route()->parameter('slug') ? 'current' : ''}} ">
                                        <a
                                            href="{{ route('front.list-blog', $category->slug) }}">{{ $category->name }}</a>
                                        @if ($category->childs->count() > 0)
                                            <ul>
                                                @foreach ($category->childs as $child)
                                                    <li><a
                                                            href="{{ route('front.list-blog', $child->slug) }}">{{ $child->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                                <li class="{{Route::is('front.contact-us') ? 'current' : ''}} ">
                                    <a href="{{ route('front.contact-us') }}">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="main-menu__search-and-btn-box">
                            <div class="main-menu__search-box">
                                <a href="#" class="main-menu__search search-toggler icon-search-interface-symbol">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </nav>
</header>
<div class="stricky-header stricked-menu main-menu">
    <div class="sticky-header__content"></div>
    <!-- /.sticky-header__content -->
</div>
