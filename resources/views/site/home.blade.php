@extends('site.layouts.master')
@section('title')
    {{ $config->meta_title ?? $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{-- {{ url('' . $banners[0]->image->path) }} --}}
@endsection
@section('css')
    <style>
        .gradient-icon {
            display: inline-block;
            width: 24px;
            height: 24px;
            font-size: 24px;
            border-radius: 6px;
            background: linear-gradient(270deg, #d53c00 0%, #dd6333 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .limit-5-line {
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .limit-3-line {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .limit-2-line {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
@section('content')
    <!-- Main Sllider Start -->
    <section class="main-slider">
        <div class="main-slider__carousel owl-carousel owl-theme">
            @foreach ($banners as $banner)
                <div class="item">
                    <div class="main-slider__bg"
                        style="background-image: url({{ $banner->image ? $banner->image->path : 'https://placehold.co/1920x1080' }});">
                    </div>
                    <!-- /.slider-one__bg -->
                    <div class="main-slider__shape-1"></div>
                    <div class="main-slider__shape-2"></div>
                    <div class="main-slider__shape-3"></div>
                    <div class="main-slider__shape-4"></div>
                    <div class="container">
                        <div class="main-slider__content">
                            <h2 class="main-slider__title" data-text="{{ $banner->title }}">{{ $banner->title }}
                            </h2>
                            <div class="main-slider__video-link">
                                <a href="{{ $banner->link }}" class="video-popup">
                                    <div class="main-slider__video-icon">
                                        <span class="fa fa-play"></span>
                                        <i class="ripple"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!--Main Sllider Start -->

    <!--Feature One Start -->
    <section class="feature-one">
        <div class="section-shape-1" style="background-image: url(/site/images/section-shape-1.png);">
        </div>
        <div class="container">
            <div class="feature-one__inner">
                <ul class="list-unstyled feature-one__list">
                    <li class="wow fadeInLeft" data-wow-delay="100ms">
                        <div class="icon">
                            <span class="icon-engineer"></span>
                        </div>
                        <div class="text">
                            <p>
                                <a href="javascript:void(0)">Chất lượng và độ bền <br>
                                    Chịu lực tốt, Chống trầy xước, Chống mài mòn</a>
                            </p>
                        </div>
                    </li>
                    <li class="wow fadeInUp" data-wow-delay="200ms">
                        <div class="icon">
                            <span class="icon-workstations"></span>
                        </div>
                        <div class="text">
                            <p><a href="javascript:void(0)">Kích thước và phù hợp không gian<br>
                                Phù hợp tỷ lệ với diện tích không gian để tránh mất cân đối.</a>
                            </p>
                        </div>
                    </li>
                    <li class="wow fadeInRight" data-wow-delay="300ms">
                        <div class="icon">
                            <span class="icon-cyber-security"></span>
                        </div>
                        <div class="text">
                            <p><a href="javascript:void(0)">Thẩm mỹ và phong cách
                                    <br>
                                    Phối hợp với đồ nội thất để tạo tổng thể hài hoà.</a>
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--Feature One End -->

    <!-- Projects One Start -->
    <section class="projects-one">
        <div class="section-shape-1">
        </div>
        <div class="projects-one__top">
            <div class="container">
                <div class="projects-one__top-inner">
                    <div class="section-title text-center sec-title-animation animation-style2">
                        <h2 class="section-title__title title-animation" style="padding-top: 80px;">Bộ sưu tập sản phẩm
                        </h2>
                    </div>
                    {{-- <div class="projects-one__filter-box">
                        <ul class="projects-one__filter style1 post-filter list-unstyled clearfix">
                            <li data-filter=".filter-item" class="active"><span class="filter-text">All</span>
                            </li>
                            <li data-filter=".des"><span class="filter-text">Design</span></li>
                            <li data-filter=".ani"><span class="filter-text">Anime</span></li>
                            <li data-filter=".nat"><span class="filter-text">Nature</span></li>
                            <li data-filter=".anim"><span class="filter-text">Animal</span></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="projects-one__bottom">
            <div class="container">
                <div class="row filter-layout projects-three__carousel owl-theme owl-carousel">
                    @foreach ($categorySpecial as $category)
                        <div class=" filter-item des nat anim">
                            <div class="projects-one__single">
                                <div class="projects-one__img-box">
                                    <div class="projects-one__img">
                                        <img src="{{ $category->image ? $category->image->path : 'https://placehold.co/483x584' }}"
                                            alt="">
                                    </div>
                                    <div class="projects-one__content">
                                        <div class="projects-one__content-shape-1"
                                            style="background-image: url(/site/images/projects-one-content-shape-1.png);">
                                        </div>
                                        <h4 class="projects-one__title"><a
                                                href="{{ route('front.show-product-category', $category->slug) }}">{{ $category->name }}</a>
                                        </h4>
                                        <p class="projects-one__sub-title">{{ $category->description }}</p>
                                    </div>
                                    <div class="projects-one__arrow">
                                        <a href="{{ $category->image ? $category->image->path : 'https://placehold.co/483x584' }}"
                                            class="img-popup"><span class="icon-up-right-arrow-1"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Projects One End -->

    <!--About One Start -->
    <section class="about-one">
        <div class="about-one__shape1">
            <img class="float-bob-x" src="/site/images/about-v1-shape1.png" alt="Shape">
        </div>
        <div class="section-shape-1" style="background-image: url(/site/images/section-shape-1.png);">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-5">
                    <div class="about-one__left">
                        <ul class="list-unstyled about-one__img-list">
                            <li>
                                <div class="about-one__img">
                                    <img src="{{ $config->introduction_image ? $config->introduction_image->path : 'https://placehold.co/620x620' }}"
                                        alt="">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="about-one__right wow fadeInLeft" data-wow-delay="300ms">
                        <div class="about-one__content">
                            <div class="section-title sec-title-animation animation-style2">
                                <h2 class="section-title__title title-animation">Giới thiệu về chúng tôi
                                </h2>
                            </div>
                            <div class="about-one__design-make">
                                <div class="about-one__design-make-content">
                                    <div class="about-one__design-make-text limit-5-line">{!! $config->introduction !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About One End -->

    <!-- Services One Start -->
    @foreach ($categorySpecialPost as $category)
        <section class="services-one">
            {{-- <div class="section-shape-1" style="background-image: url(/site/images/section-shape-1.png);">
            </div> --}}
            <div class="section-shape-1">
            </div>
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <h2 class="section-title__title title-animation">
                        {{ $category->name }}
                    </h2>
                </div>
                <div class="service-style4__carousel owl-theme owl-carousel">
                    <!-- Services One Sinlge Start -->
                    @foreach ($category->posts as $post)
                        <div class=" wow fadeInLeft" data-wow-delay="100ms">
                            <div class="services-one__single">
                                <div class="services-one__content-box">
                                    <h3 class="services-one__title limit-2-line"><a
                                            href="{{ route('front.detail-blog', $post->slug) }}">{{ $post->name }}</a>
                                    </h3>
                                    <div class="services-one__img">
                                        <img src="{{ $post->image ? $post->image->path : 'https://placehold.co/370x250' }}"
                                            alt="">
                                    </div>
                                    <div class="services-one__text limit-3-line">{{ $post->intro }}
                                    </div>
                                </div>
                                <a href="{{ route('front.detail-blog', $post->slug) }}" class="services-one__btn"><span
                                        class="icon-next"></span>Xem chi tiết</a>
                            </div>
                        </div>
                    @endforeach
                    <!-- Services One Sinlge End -->
                </div>
            </div>
        </section>
    @endforeach
    <!-- Services One End -->

    <!-- Video One Start -->
    <section class="video-one">
        <div class="video-one__inner">
            {{-- <div class="video-one__curved-circle">
                <div class="curved-circle">
                    CÔNG NGHỆ HÀNG ĐẦU
                </div>
                <!-- /.curved-circle -->
                <div class="video-one__video-link">
                    <a href="https://www.youtube.com/watch?v=OzUkvzyBttA" class="video-popup">
                        <div class="video-one__video-icon">
                            <span class="fa fa-play"></span>
                        </div>
                    </a>
                </div>
            </div> --}}
            <!-- /.curved-circle -->
            <div class="video-one__main-content">
                <div class="swiper-container" id="video-one__carousel">
                    <div class="swiper-wrapper">
                        @foreach ($galleries as $gallery)
                            <div class="swiper-slide">
                                <div class="video-one__main-content-inner">
                                    <div class="video-one__main-content-bg"
                                        style="background-image: url({{ $gallery->image ? $gallery->image->path : 'https://placehold.co/1920x1080' }});">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- /.swiper-slide -->
                    </div>
                </div>
                <div class="video-one__nav">
                    <div class="swiper-button-prev" id="video-one__swiper-button-next">
                        <i class="icon-prev"></i>
                    </div>
                    <div class="swiper-button-next" id="video-one__swiper-button-prev">
                        <i class="icon-next"></i>
                    </div>
                </div>
            </div>
            <div class="video-one__thumb-box">
                <div class="swiper-container" id="video-one__thumb">
                    <div class="swiper-wrapper">
                        @foreach ($galleries as $gallery)
                            <div class="swiper-slide">
                                <div class="video-one__img-holder-box">
                                    <div class="video-one__img-holder">
                                        <img src="{{ $gallery->image ? $gallery->image->path : 'https://placehold.co/1920x1080' }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- /.swiper-slide -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video One End -->

    <!-- Blog One Start -->
    @foreach ($categorySpecialOtherPost as $category)
        <section class="blog-one">
            <div class="section-shape-1">
            </div>
            <div class="container">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <h2 class="section-title__title title-animation">{{ $category->name }}
                    </h2>
                </div>
                <div class="row">
                    <!-- Blog One Single Start -->
                    @foreach ($category->posts as $post)
                        <div class="col-xl-4 col-lg-4 wow fadeInLeft" data-wow-delay="100ms">
                            <div class="blog-one__single">
                                <div class="blog-one__img">
                                    <img src="{{ $post->image ? $post->image->path : 'https://placehold.co/483x584' }}"
                                        alt="">
                                </div>
                                <div class="blog-one__content">
                                    <div class="blog-one__content-shape-1"
                                        style="background-image: url(/site/images/blog-one-content-shape-1.png);">
                                    </div>
                                    <div class="blog-one__date-and-title-box">
                                        <div class="blog-one__date">
                                            <h3>{{ $post->created_at->format('d') }}</h3>
                                            <p>{{ $post->created_at->format('M Y') }}</p>
                                        </div>
                                        <div class="blog-one__title-box">
                                            <h3 class="blog-one__title"><a
                                                    href="{{ route('front.detail-blog', $post->slug) }}">{{ $post->name }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="blog-one__btn-box">
                                        <a href="{{ route('front.detail-blog', $post->slug) }}"
                                            class="thm-btn blog-one__btn">Xem chi tiết <span
                                                class="icon-up-right-arrow"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Blog One Single End -->
                </div>
            </div>
        </section>
    @endforeach
    <!-- Blog One End -->

    <!--Brand One Start-->
    <section class="brand-one">
        <div class="container">
            <div class="brand-one__carousel owl-theme owl-carousel">
                @foreach ($partners as $partner)
                    <div class="item">
                        <div class="brand-one__img">
                            <a href="{{ $partner->link }}"><img
                                    src="{{ $partner->image ? $partner->image->path : 'https://placehold.co/1920x1080' }}"
                                    alt=""></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Brand One End-->
@endsection
@push('script')
@endpush
