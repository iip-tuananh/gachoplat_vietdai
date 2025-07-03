@extends('site.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    {{ $short_des }}
@endsection
@section('css')
    <link rel="stylesheet" href="/site/css/contact.css">
    <link rel="stylesheet" href="/site/css/page-header.css">
    <link rel="stylesheet" href="/site/css/error-page.css">
    <style>
        .product-category {
            padding-top: 80px;
        }
        .blog-one__date-and-title-box {
            margin-bottom: 0;
        }
        .blog-one__content {
            padding: 20px 25px 20px;
        }
        .blog-one__img img {
            height: 434px;
            object-fit: cover;
        }
        @media (max-width: 1400px) {
            .blog-one__img img {
                height: 350px;
            }
        }
        @media (max-width: 1200px) {
            .blog-one__img img {
                height: 300px;
            }
        }
        @media (max-width: 992px) {
            .blog-one__img img {
                height: 250px;
            }
        }
        @media (max-width: 768px) {
            .blog-one__img img {
                height: 300px;
            }
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
    <!--Page Header End-->
    <!-- Blog One Start -->
    <section class="product-category">
        <div class="section-shape-1" style="background-image: url(/site/images/section-shape-1.png);">
        </div>
        <div class="container">
            <div class="row">
                <!-- Product Category Single Start -->
                @foreach ($products as $product)
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                        <div class="blog-one__single">
                            <div class="blog-one__img">
                                <img src="{{ $product->image ? $product->image->path : 'https://placehold.co/600x400' }}"
                                    alt="">
                            </div>
                            <div class="blog-one__content">
                                <div class="blog-one__content-shape-1"
                                    style="background-image: url(/site/images/blog-one-content-shape-1.png);">
                                </div>
                                <div class="blog-one__date-and-title-box">
                                    <div class="blog-one__title-box">
                                        <h3 class="blog-one__title"><a
                                                href="{{ route('front.show-product-detail', $product->slug) }}">{{ $product->name }}</a>
                                        </h3>
                                        <p>{{ $product->sku }} <span class="text-muted">|</span> {{$product->brand_name}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Product Category Single End -->
            </div>
            <div class="row">
                <div class="col-12">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Category End -->
@endsection

@push('script')
@endpush
