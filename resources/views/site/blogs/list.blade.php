@extends('site.layouts.master')
@section('title')
    {{ $cate_title }}
@endsection
@section('description')
    {{ $cate_des ?? '' }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection

@section('css')
    <link rel="stylesheet" href="/site/css/contact.css">
    <link rel="stylesheet" href="/site/css/page-header.css">
    <link rel="stylesheet" href="/site/css/error-page.css">
    <style>
        .blog-one__img img {
            height: 300px;
            object-fit: cover;
        }

        @media (max-width: 1400px) {
            .blog-one__img img {
                height: 250px;
            }
        }

        @media (max-width: 1200px) {
            .blog-one__img img {
                height: 250px;
            }
        }

        @media (max-width: 992px) {
            .blog-one__img img {
                height: 250px;
            }
        }

        @media (max-width: 768px) {
            .blog-one__img img {
                height: 250px;
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
                    <h3 class="text-white">{{ $cate_title }}</h3>
                </div>
                <div class="thm-breadcrumb__box">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li><span>/</span></li>
                        <li>{{ $cate_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--Page Header End-->
    <!-- Blog One Start -->
    <section class="blog-one">
        <div class="section-shape-1">
        </div>
        <div class="container">
            <div class="row">
                <!-- Blog One Single Start -->
                @foreach ($blogs as $post)
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                        <div class="blog-one__single">
                            <div class="blog-one__img">
                                <img src="{{ $post->image ? $post->image->path : 'https://placehold.co/600x400' }}"
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
                                        class="thm-btn blog-one__btn">Xem thêm <span class="icon-up-right-arrow"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Blog One Single End -->
            </div>
            <div class="row">
                <div class="col-12">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Blog One End -->
@endsection

@push('script')
@endpush
