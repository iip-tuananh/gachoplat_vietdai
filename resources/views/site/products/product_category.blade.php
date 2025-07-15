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
            padding: 15px 12px 15px;
        }

        .blog-one__title-box {
            padding-left: 0;
        }

        .blog-one__img img {
            object-fit: cover;
        }

        @media (max-width: 1400px) {
            .blog-one__img img {
                height: 296px;
            }
        }

        @media (max-width: 1200px) {
            .blog-one__img img {
                height: 296px;
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

        .limit-1-line {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* .product-category-child .container {
                                max-width: 100%;
                            } */


        .product-category-child-sidebar {
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #f5f5f5;
        }

        .product-category-child-sidebar span.widget-title {
            font-size: 1em;
            font-weight: 600;
            line-height: 1.05;
            letter-spacing: .05em;
            text-transform: uppercase;
        }

        .product-category-child-sidebar .is-divider {
            height: 3px;
            display: block;
            background-color: rgba(0, 0, 0, .1);
            margin: 1em 0 1em;
            width: 100%;
            max-width: 30px;
            margin-top: .66em;
        }

        .product-category-child-sidebar .widget_product_categories>ul>li {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border-bottom: 1px solid #eaeaea;
        }

        .product-category-child-sidebar .widget_product_categories>ul>li>a {
            display: inline-block;
            padding: 6px 0;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            color: #333;
        }

        .result-count {
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
            float: right;
        }

        .count {
            opacity: 0.5;
        }

        .cat-item:hover a,
        .cat-item.active a {
            color: #ed1c24 !important;
        }

        .cat-item:hover .count,
        .cat-item.active .count {
            opacity: 1;
        }

        .clear-tag {
            cursor: pointer;
            color: #ed1c24;
            background-color: #cacacac1;
            padding: 2px 8px;
            font-size: 12px;
            margin-right: 5px;
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
    <section class="product-category" ng-controller="ProductCategoryController">
        <div class="section-shape-1">
        </div>
        <div class="container">
            {{-- @if (isset($category->childs) && count($category->childs) > 0)
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
            @else --}}
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-12 product-category-child-sidebar">
                    <aside class="widget_product_categories">
                        <span class="widget-title shop-sidebar">Danh mục sản phẩm</span>
                        <div class="is-divider small"></div>
                        <ul class="product-categories">
                            @foreach ($categories as $cate)
                                <li
                                    class="cat-item {{ Route::currentRouteName() == 'front.show-product-category' && $cate->slug == $category->slug ? 'active' : '' }}">
                                    <a
                                        href="javascript:void(0)" ng-click="filterCategoryother ('{{ $cate->slug }}')">{{ $cate->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                    @foreach ($attributes as $attribute)
                        @if ($attribute->tags->count() > 0)
                            <aside class="widget_product_categories mt-5">
                                <span class="widget-title shop-sidebar">{{ $attribute->name }}</span>
                                <div class="is-divider small"></div>
                                <ul class="product-categories">
                                    @foreach ($attribute->tags as $tag)
                                        <li class="cat-item"
                                            ng-class="{'active': code_tags.includes('{{ $tag->code }}')}">
                                            <div class="clear-tag" ng-click="clearTag('{{ $tag->code }}')"
                                                ng-if="code_tags.includes('{{ $tag->code }}')"> <i
                                                    class="fa fa-times"></i> </div>
                                            <a href="javascript:void(0)"
                                                ng-click="chooseTag('{{ $tag->code }}')">{{ $tag->name }}</a>
                                            <span class="count">({{ $tag->products->count() }})</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-9 col-lg-9 col-sm-12">
                    <div class="row">
                        {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <p class="result-count">Hiển thị {{ $products->firstItem() }} – {{ $products->lastItem() }} của {{ $products->total() }} kết quả</p>
                        </div> --}}
                        @if ($products->isEmpty())
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <p class="text-center">Không có sản phẩm nào</p>
                            </div>
                        @endif
                        <!-- Product Category Single Start -->
                        @foreach ($products as $product)
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                                <div class="blog-one__single">
                                    <div class="blog-one__img">
                                        <img width="247" height="296"
                                            src="{{ $product->image ? $product->image->path : 'https://placehold.co/247x296' }}"
                                            alt="">
                                    </div>
                                    <div class="blog-one__content">
                                        <div class="blog-one__content-shape-1"
                                            style="background-image: url(/site/images/blog-one-content-shape-1.png);">
                                        </div>
                                        <div class="blog-one__date-and-title-box">
                                            <div class="blog-one__title-box">
                                                <h3 class="blog-one__title limit-1-line"><a
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
                </div>
            </div>
            {{-- @endif --}}
        </div>
    </section>
    <!-- Product Category End -->
@endsection

@push('script')
    <script>
        app.controller('ProductCategoryController', function($scope, $http) {
            $scope.category = @json($category ?? null);
            if (window.localStorage.getItem('code_tags')) {
                $scope.code_tags = JSON.parse(window.localStorage.getItem('code_tags'));
            } else {
                $scope.code_tags = [];
            }

            $scope.filterCategoryother = function(slug) {
                $scope.code_tags = [];
                window.localStorage.removeItem('code_tags');
                $scope.filterCategory(slug);
            }

            $scope.filterCategory = function(slug, tag = null) {
                url = '{{ route('front.show-product-category', ['categorySlug' => ':categorySlug']) }}'
                    .replace(
                        ':categorySlug', slug);
                if (tag) {
                    url += '?tag=' + tag;
                }
                window.location.href = url;
            }

            $scope.chooseTag = function(code) {
                if ($scope.code_tags.includes(code)) {
                    $scope.code_tags = $scope.code_tags.filter(function(item) {
                        return item !== code;
                    });
                } else {
                    $scope.code_tags.push(code);
                }
                window.localStorage.setItem('code_tags', JSON.stringify($scope.code_tags));

                var tag = $scope.code_tags.join(',');
                $scope.filterCategory($scope.category.slug, tag);
            }

            $scope.clearTag = function(code) {
                $scope.code_tags = $scope.code_tags.filter(function(item) {
                    return item !== code;
                });
                if ($scope.code_tags.length == 0) {
                    window.localStorage.removeItem('code_tags');
                    $scope.filterCategory($scope.category.slug);
                } else {
                    window.localStorage.setItem('code_tags', JSON.stringify($scope.code_tags));
                    var tag = $scope.code_tags.join(',');
                    $scope.filterCategory($scope.category.slug, tag);
                }
            }
        });
    </script>
@endpush
