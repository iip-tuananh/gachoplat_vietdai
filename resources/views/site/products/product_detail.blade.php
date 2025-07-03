@extends('site.layouts.master')
@section('title')
    {{ $product->name }}
@endsection
@section('description')
    {!! strip_tags($product->intro) !!}
@endsection
@section('image')
    {{ $product->image ? $product->image->path : $product->galleries[0]->image->path }}
@endsection

@section('css')
    <link rel="stylesheet" href="/site/css/contact.css">
    <link rel="stylesheet" href="/site/css/page-header.css">
    <link rel="stylesheet" href="/site/css/error-page.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #444;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .mySwiper2 {
            height: 80%;
            width: 100%;
        }

        .mySwiper {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }

        .mySwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
        }

        .mySwiper .swiper-slide img {
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 3px;
            background-color: #fff;
            height: 130px;
            object-fit: cover;
        }

        .mySwiper2 .swiper-slide img {
            height: 500px !important;
            object-fit: cover;
        }

        @media (max-width: 1200px) {
            .mySwiper .swiper-slide img {
                height: 80px;
            }
            .mySwiper2 .swiper-slide img {
                height: 400px !important;
            }
        }

        @media (max-width: 768px) {
            .mySwiper .swiper-slide img {
                height: 100px;
            }
            .mySwiper2 .swiper-slide img {
                height: 300px !important;
            }
        }

        .product-detail {
            padding-top: 80px;
            padding-bottom: 80px;
            background-color: #c1c1c180;
        }

        .product-detail-row {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
        }

        .product-detail-image {
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
        }

        .product-detail__content {
            padding: 10px;
        }

        .product-detail__price-new {
            color: #ff0000;
            font-weight: bold;
            font-size: 24px;
        }

        .product-detail__price-old {
            color: #6c757d;
            font-size: 16px;
        }

        .product-detail__price-discount {
            margin-left: 20px;
            color: #6c757d;
            font-size: 20px;
            font-weight: 500;
            font-family: 'Montserrat', sans-serif;
        }

        .product-detail__sku {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .product-detail__sku p {
            margin-bottom: 0;
            font-size: 16px;
            color: #6c757d;
            font-weight: 500;
        }

        .product-detail__btn-box img {
            width: 100%;
            height: auto;
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
                    <h3 class="text-white">{{ $product->name }}</h3>
                </div>
                <div class="thm-breadcrumb__box">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li><span>/</span></li>
                        <li>{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--Page Header End-->
    <!-- Blog One Start -->
    <section class="product-detail">
        <div class="section-shape-1" style="background-image: url(/site/images/section-shape-1.png);">
        </div>
        <div class="container">
            <div class="row product-detail-row">
                <!-- Product Detail Single Start -->
                <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                    <div class="product-detail-image">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                            class="swiper mySwiper2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ $product->image ? $product->image->path : 'https://placehold.co/370x250' }}" />
                                </div>
                                @foreach ($product->galleries as $gallery)
                                <div class="swiper-slide">
                                    <img src="{{ $gallery->image ? $gallery->image->path : 'https://placehold.co/370x250' }}" />
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ $product->image ? $product->image->path : 'https://placehold.co/370x250' }}" />
                                </div>
                                @foreach ($product->galleries as $gallery)
                                    <div class="swiper-slide">
                                        <img src="{{ $gallery->image ? $gallery->image->path : 'https://placehold.co/370x250' }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="100ms">
                    <div class="product-detail__content">
                        <h1 class="product-detail__title">{{ $product->name }}</h1>
                        <div class="product-detail__sku">
                            <p>{{ $product->sku }} <span class="text-muted">|</span> {{ $product->brand_name }} </p>
                        </div>
                        @if ($product->price > 0 && $product->base_price > 0)
                            <div class="product-detail__price mb-2">
                                <span class="product-detail__price-new">{{ formatCurrency($product->price) }}₫</span>
                                <span class="product-detail__price-old"><del>{{ formatCurrency($product->base_price) }}₫</del></span>
                                <span class="product-detail__price-discount">( <i class="fas fa-tag" style="color: #ff0000;"></i> Giảm {{ round(($product->base_price - $product->price) / $product->base_price * 100) }}%)</span>
                            </div>
                        @elseif ($product->price > 0 && $product->base_price == 0)
                            <div class="product-detail__price mb-2">
                                <span class="product-detail__price-new">{{ formatCurrency($product->price) }}₫</span>
                            </div>
                        @elseif ($product->price == 0 && $product->base_price > 0)
                            <div class="product-detail__price mb-2">
                                <span class="product-detail__price-new">{{ formatCurrency($product->base_price) }}₫</span>
                            </div>
                        @else
                            <div class="product-detail__price mb-2">
                                <span class="product-detail__price-new">Liên hệ</span>
                            </div>
                        @endif

                        <div class="product-detail__description mt-4">
                            {!! $product->intro !!}
                        </div>

                        <div class="product-detail__btn-box mt-4">
                            <img width="1827" height="244" src="/site/images/Asset-101.png" alt="">
                        </div>
                    </div>
                </div>
                <!-- Product Detail Single End -->
            </div>
            <div class="row" style="margin-top: 80px;">
                <div class="section-title text-center sec-title-animation animation-style1">
                    <h2 class="section-title__title title-animation">
                        Sản phẩm tương tự
                    </h2>
                </div>
                <div class="service-style4__carousel owl-theme owl-carousel ">
                    <!-- Product Category Single Start -->
                    @foreach ($productsRelated as $item)
                        <div class=" wow fadeInLeft" data-wow-delay="100ms">
                            <div class="blog-one__single">
                                <div class="blog-one__img">
                                    <img src="{{ $item->image ? $item->image->path : 'https://placehold.co/600x400' }}"
                                        alt="">
                                </div>
                                <div class="blog-one__content">
                                    <div class="blog-one__content-shape-1"
                                        style="background-image: url(/site/images/blog-one-content-shape-1.png);">
                                    </div>
                                    <div class="blog-one__date-and-title-box">
                                        <div class="blog-one__title-box">
                                            <h3 class="blog-one__title"><a
                                                    href="{{ route('front.show-product-detail', $item->slug) }}">{{ $item->name }}</a>
                                            </h3>
                                            <p>{{ $item->sku }} <span class="text-muted">|</span> {{$item->brand_name}} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Product Category Single End -->
                </div>
            </div>
        </div>
    </section>
    <!-- Product Category End -->
@endsection

@push('script')
    <script>
        var swiper = new Swiper(".mySwiper", {
            // loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>
    <script>
        // Plus number quantiy product detail
        var plusQuantity = function() {
            if (jQuery('input[name="quantity"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                if (!isNaN(currentVal)) {
                    jQuery('input[name="quantity"]').val(currentVal + 1);
                } else {
                    jQuery('input[name="quantity"]').val(1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
            }
        }
        // Minus number quantiy product detail
        var minusQuantity = function() {
            if (jQuery('input[name="quantity"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                if (!isNaN(currentVal) && currentVal > 1) {
                    jQuery('input[name="quantity"]').val(currentVal - 1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
            }
        }
        app.controller('ProductDetailController', function($scope, $http, $interval, cartItemSync, $rootScope, $compile,
            notiProduct) {
            $scope.product = @json($product);
            $scope.form = {
                quantity: 1
            };

            $scope.selectedAttributes = [];
            jQuery('.product-attribute-values .badge').click(function() {
                if (!jQuery(this).hasClass('active')) {
                    jQuery(this).parent().find('.badge').removeClass('active');
                    jQuery(this).addClass('active');
                    if ($scope.selectedAttributes.length > 0 && $scope.selectedAttributes.find(item => item
                            .index == jQuery(this).data('index'))) {
                        $scope.selectedAttributes.find(item => item.index == jQuery(this).data('index'))
                            .value = jQuery(this).data('value');
                    } else {
                        let index = jQuery(this).data('index');
                        $scope.selectedAttributes.push({
                            index: index,
                            name: jQuery(this).data('name'),
                            value: jQuery(this).data('value'),
                        });
                    }
                } else {
                    jQuery(this).parent().find('.badge').removeClass('active');
                    jQuery(this).removeClass('active');
                    $scope.selectedAttributes = $scope.selectedAttributes.filter(item => item.index !=
                        jQuery(this).data('index'));
                }
                $scope.$apply();
            });

            $scope.addToCartFromProductDetail = function() {
                let quantity = $('.details-product input[name="quantity"]').val();

                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.product.id);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(quantity),
                        'attributes': $scope.selectedAttributes
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                                notiProduct.product_id = response.noti_product.product_id;
                                notiProduct.product_name = response.noti_product
                                    .product_name;
                                notiProduct.product_image = response.noti_product
                                    .product_image;
                                notiProduct.product_price = response.noti_product
                                    .product_price;
                                notiProduct.product_qty = response.noti_product.product_qty;
                            }, 1000);
                            // toastr.success('Thao tác thành công !')
                            $scope.$applyAsync();

                            $('#popup-cart-mobile').addClass('active');
                            $('.backdrop__body-backdrop___1rvky').addClass('active');
                            $('#quick-view-product.quickview-product').hide();
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.addToCartCheckoutFromProductDetail = function() {
                let quantity = $('.details-product input[name="quantity"]').val();
                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.product.id);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(quantity),
                        'attributes': $scope.selectedAttributes
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            toastr.success('Thao tác thành công !')
                            window.location.href = "{{ route('cart.checkout') }}";
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }
        });
    </script>
@endpush
