<footer class="site-footer">
    <div class="site-footer__shape-1 float-bob-x">
        <img src="/site/images/site-footer-shape-1.png" alt="">
    </div>
    <div class="site-footer__shape-2 float-bob-y">
        <img src="/site/images/site-footer-shape-2.png" alt="">
    </div>
    <div class="container">
        <div class="site-footer__top">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__logo">
                            <h3 class="footer-widget__title">{{ $config->short_name_company }}</h3>
                            {{-- <a href="{{route('front.home-page')}}"><img
                                        src="{{$config->image ? $config->image->path : 'https://placehold.co/100x100'}}"
                                        alt=""></a> --}}
                        </div>
                        <div class="footer-widget__about-text">{{ $config->web_des }}
                        </div>
                        <div class="site-footer__social">
                            <a href="{{ $config->facebook }}"><i class="fab fa-facebook"></i></a>
                            <a href="{{ $config->instagram }}"><i class="fab fa-instagram"></i></a>
                            <a href="{{ $config->youtube }}"><i class="fab fa-youtube"></i></a>
                            <a href="{{ $config->zalo }}"><i class="fab fa-zalo"></i></a>
                            <a href="{{ $config->tiktok }}"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__usefull-link">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Danh mục</h3>
                        </div>
                        <div class="footer-widget__link-box">
                            <ul class="footer-widget__link list-unstyled">
                                <li><a href="{{ route('front.home-page') }}">Trang chủ</a>
                                </li>
                                <li><a href="{{ route('front.about-us') }}">Giới thiệu</a>
                                </li>
                                <li><a href="{{ route('front.contact-us') }}">Liên hệ</a></li>
                                </li>
                            </ul>
                            <ul class="footer-widget__link footer-widget__link-2 list-unstyled">
                                @foreach ($product_categories as $category)
                                    <li><a
                                            href="{{ route('front.show-product-category', $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                                @foreach ($post_categories as $category)
                                    <li><a
                                            href="{{ route('front.list-blog', $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="footer-widget__column footer-widget__services">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Chính sách</h3>
                        </div>
                        <ul class="footer-widget__link list-unstyled">
                            @foreach ($policies as $policy)
                                <li><a
                                        href="{{ route('front.policy-detail', $policy->slug) }}">{{ $policy->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="footer-widget__column footer-widget__instagram">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Liên hệ</h3>
                        </div>
                        <ul class="footer-widget__link list-unstyled clearfix">
                            <li>

                                <a href="#"><span class="icon-location" style="color: #a6a182;"></span> Địa chỉ:
                                    {{ $config->address_company }}</a>

                            </li>
                            <li>

                                <a href="tel:{{ str_replace(' ', '', $config->hotline) }}"><span
                                        class="icon-telephone" style="color: #a6a182;"></span> {{ $config->hotline }}</a>

                            </li>
                            <li>

                                <a href="mailto:{{ $config->email }}" style="text-transform: none;"><span
                                        class="icon-envelope-2" style="color: #a6a182;"></span>
                                    {{ $config->email }}</a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="site-footer__bottom-inner">
                <p class="site-footer__bottom-text">© {{ date('Y') }}
                    Copyright <a href="{{ route('front.home-page') }}">{{ $config->web_title }}</a> | All rights
                    reserved
                </p>
                {{-- <ul class="list-unstyled site-footer__bottom-menu">
                    @foreach ($policies as $policy)
                        <li><a href="{{ route('front.policy-detail', $policy->slug) }}">{{ $policy->title }}</a></li>
                    @endforeach
                </ul> --}}
            </div>
        </div>
    </div>
</footer>
