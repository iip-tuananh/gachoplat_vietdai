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
        .product-category-child .container {
            max-width: 100%;
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
    <section class="product-category {{ isset($category->childs) && count($category->childs) > 0 ? 'product-category-child' : '' }}">
        <div class="section-shape-1">
        </div>
        <div class="container">
            @if (isset($category->childs) && count($category->childs) > 0)
                <div class="row filter-layout">
                    @foreach ($category->childs as $category)
                        <div class="col-xl-3 col-lg-6 col-md-6 filter-item des nat anim">
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
            @else
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
                                            <p>{{ $product->sku }} <span class="text-muted">|</span>
                                                {{ $product->brand_name }} </p>
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
            @endif
        </div>
    </section>
    <!-- Product Category End -->
@endsection

@push('script')
@endpush
