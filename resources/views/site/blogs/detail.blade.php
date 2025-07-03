@extends('site.layouts.master')
@section('title')
    {{ $blog_title }}
@endsection
@section('description')
    {{ strip_tags($blog->intro) }}
@endsection
@section('image')
    {{ $blog->image ? $blog->image->path : '' }}
@endsection

@section('css')
    <link rel="stylesheet" href="/site/css/contact.css">
    <link rel="stylesheet" href="/site/css/page-header.css">
    <link rel="stylesheet" href="/site/css/error-page.css">
@endsection

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header__bg"
            style="background-image: url({{ $blog->image ? $blog->image->path : 'https://placehold.co/1920x1080' }});">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <div class="page-header__title-box">
                    <h3 class="text-white">{{ $blog_title }}</h3>
                </div>
                <div class="thm-breadcrumb__box">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li><span>/</span></li>
                        <li>{{ $blog_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--Page Header End-->
    <!--Blog Details Start-->
    <section class="blog-details">
        <div class="section-shape-1"
            style="background-image: url(/site/images/blog-details-sec-shape-1.png);">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="{{ $blog->image ? $blog->image->path : 'https://placehold.co/600x400' }}"
                                alt="">
                        </div>
                        <div class="blog-details__content">
                            <div class="blog-details__meta-and-share">
                                <ul class="blog-details__meta list-unstyled">
                                    <li>
                                        <a href="#"><span class="icon-user"></span>By Admin</a>
                                    </li>
                                    <li>
                                        <a href="#"><span class="icon-conversation"></span>{0}Comments</a>
                                    </li>
                                </ul>
                                <div class="blog-details__share">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('front.detail-blog', $blog->slug)) }}"><span class="fas fa-share-alt"></span></a>
                                </div>
                            </div>
                            <h3 class="blog-details__title-1">{{ $blog->name }}</h3>
                            {!! $blog->body !!}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__search">
                            <form action="#" class="sidebar__search-form">
                                <input type="search" placeholder="Search Keyword">
                                <button type="submit"><i class="icon-search-interface-symbol"></i></button>
                            </form>
                        </div>
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Bài viết mới nhất</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach ($other_blogs as $item)
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{ $item->image ? $item->image->path : 'https://placehold.co/600x400' }}"
                                            alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <p class="sidebar__post-date"><span class="icon-calendar"></span>{{ $item->created_at->format('d') }},
                                            {{ $item->created_at->format('Y') }}
                                        </p>
                                        <h3>
                                            <a href="{{ route('front.detail-blog', $item->slug) }}">{{ $item->name }}</a>
                                        </h3>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Blog Details End-->
@endsection

@push('script')
@endpush
