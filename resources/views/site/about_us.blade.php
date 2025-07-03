@extends('site.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection

@section('css')
    <link rel="stylesheet" href="/site/css/contact.css">
    <link rel="stylesheet" href="/site/css/page-header.css">
    <link rel="stylesheet" href="/site/css/error-page.css">
    <style>
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
    </style>
@endsection

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header__bg"
            style="background-image: url({{ $banners[0]->image ? $banners[0]->image->path : 'https://placehold.co/1920x1080' }});">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <div class="page-header__title-box">
                    <h3 class="text-white">{{ $title }}</h3>
                </div>
                <div class="thm-breadcrumb__box">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li><span>/</span></li>
                        <li>{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
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
                                    <div class="about-one__design-make-text limit-5-line">{{ $config->web_des }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--About One End -->
    <!--Services Four Start-->
    <section class="services-four">
        {{-- <div class="section-shape-1" style="background-image: url(/site/images/section-shape-1.png);">
        </div> --}}
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style2">
                <h2 class="section-title__title title-animation">
                    {{ $config->short_name_company }}
                </h2>
            </div>
            <div class="row">
                <!--Services Four Single Start-->
                <div class="col-xl-12 col-lg-12 wow fadeInLeft" data-wow-delay="100ms">
                    {!! $config->introduction !!}
                </div>
            </div>
        </div>
    </section>
    <!--Services Four End-->
@endsection

@push('script')
@endpush
