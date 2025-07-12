<!DOCTYPE html>
<html lang="en">

<head>
    @include('site.partials.head')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="/site/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/site/css/animate.min.css" />
    <link rel="stylesheet" href="/site/css/custom-animate.css" />
    <link rel="stylesheet" href="/site/css/swiper.min.css" />
    <link rel="stylesheet" href="/site/css/font-awesome-all.css" />
    <link rel="stylesheet" href="/site/css/jarallax.css" />
    <link rel="stylesheet" href="/site/css/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="/site/css/odometer.min.css" />
    <link rel="stylesheet" href="/site/css/flaticon.css">
    <link rel="stylesheet" href="/site/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/site/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="/site/css/nice-select.css" />
    <link rel="stylesheet" href="/site/css/jquery-ui.css" />
    <link rel="stylesheet" href="/site/css/twentytwenty.css" />
    <link rel="stylesheet" href="/site/css/slider.css" />
    <link rel="stylesheet" href="/site/css/footer.css" />
    <link rel="stylesheet" href="/site/css/feature.css" />
    <link rel="stylesheet" href="/site/css/about.css" />
    <link rel="stylesheet" href="/site/css/sliding-text.css" />
    <link rel="stylesheet" href="/site/css/services.css" />
    <link rel="stylesheet" href="/site/css/projects.css" />
    <link rel="stylesheet" href="/site/css/design-interior.css" />
    <link rel="stylesheet" href="/site/css/testimonial.css" />
    <link rel="stylesheet" href="/site/css/video.css" />
    <link rel="stylesheet" href="/site/css/awards.css" />
    <link rel="stylesheet" href="/site/css/blog.css" />
    <link rel="stylesheet" href="/site/css/brand.css" />
    <link rel="stylesheet" href="/site/css/counter.css" />
    <link rel="stylesheet" href="/site/css/team.css" />
    <!-- template styles -->
    <link rel="stylesheet" href="/site/css/style.css" />
    <link rel="stylesheet" href="/site/css/responsive.css" />
    <link rel="stylesheet" href="/site/css/callbutton.css?v=123">

    @yield('css')

    <!-- Angular Js -->
    <script src="{{ asset('libs/angularjs/angular.js?v=222222') }}"></script>
    <script src="{{ asset('libs/angularjs/angular-resource.js') }}"></script>
    <script src="{{ asset('libs/angularjs/sortable.js') }}"></script>
    <script src="{{ asset('libs/dnd/dnd.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular-sanitize.js"></script>
    <script src="{{ asset('libs/angularjs/select.js') }}"></script>
    <script src="{{ asset('js/angular.js') }}?version={{ env('APP_VERSION', '1') }}"></script>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> --}}
    <script>
        app.controller('AppController', function($rootScope, $scope, cartItemSync, $interval, $compile, notiProduct) {
            $scope.currentUser = @json(Auth::guard('client')->user());
            $scope.isAdminClient = @json(Auth::guard('client')->check());

            // Biên dịch lại nội dung bên trong container
            var container = angular.element(document.getElementsByClassName('item_product_main'));
            $compile(container.contents())($scope);

            var popup = angular.element(document.getElementById('popup-cart-mobile'));
            $compile(popup.contents())($scope);

            var quickView = angular.element(document.getElementById('quick-view-product'));
            $compile(quickView.contents())($scope);

            // Đặt mua hàng
            $scope.hasItemInCart = false;
            $scope.cart = cartItemSync;
            $scope.noti_product = notiProduct;
            $scope.item_qty = 1;
            $scope.quantity_quickview = 1;

            $scope.addToCart = function(productId, quantity = 1) {
                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', productId);
                let item_qty = quantity;

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(item_qty)
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
                            // toastr.success('Thao tác thành công !')
                            $scope.noti_product = response.noti_product;
                            $scope.$applyAsync();
                            console.log($scope.noti_product);

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
                // if ($scope.isAdminClient) {
                // } else {
                //     window.location.href = "{{ route('front.login-client') }}";
                // }
            }

            $scope.changeQty = function(qty, product_id) {
                updateCart(qty, product_id)
            }

            $scope.incrementQuantity = function(product) {
                product.quantity = Math.min(product.quantity + 1, 9999);
            };

            $scope.decrementQuantity = function(product) {
                product.quantity = Math.max(product.quantity - 1, 0);
            };

            function updateCart(qty, product_id) {
                jQuery.ajax({
                    type: 'POST',
                    url: "{{ route('cart.update.item') }}",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        product_id: product_id,
                        qty: qty
                    },
                    success: function(response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            $scope.total_qty = response.count;
                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function(e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            // xóa item trong giỏ
            $scope.removeItem = function(product_id) {
                jQuery.ajax({
                    type: 'GET',
                    url: "{{ route('cart.remove.item') }}",
                    data: {
                        product_id: product_id
                    },
                    success: function(response) {
                        if (response.success) {
                            $scope.cart.items = response.items;
                            $scope.cart.count = Object.keys($scope.cart.items).length;
                            $scope.cart.totalCost = response.total;

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            if ($scope.cart.count == 0) {
                                $scope.hasItemInCart = false;
                            }
                            $scope.$applyAsync();
                        }
                    },
                    error: function(e) {
                        jQuery.toast.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            // Xem nhanh
            $scope.quickViewProduct = {};
            $scope.showQuickView = function(productId) {
                $.ajax({
                    url: "{{ route('front.get-product-quick-view') }}",
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        product_id: productId
                    },
                    success: function(response) {
                        $('#quick-view-product .quick-view-product').html(response.html);
                        var quickView = angular.element(document.getElementById(
                            'quick-view-product'));
                        $compile(quickView.contents())($scope);
                        $scope.$applyAsync();
                    },
                    error: function(e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            // Search product
            jQuery('#live-search').keyup(function() {
                var keyword = jQuery(this).val();
                jQuery.ajax({
                    type: 'post',
                    url: '{{ route('front.auto-search-complete') }}',
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        keyword: keyword
                    },
                    success: function(data) {
                        jQuery('.live-search-results').html(data.html);
                    }
                })
            });

            $scope.loading = false;
            $scope.errors = {};
            $scope.submitContactModal = function() {
                $scope.loading = true;
                let data = {
                    your_name: $scope.your_name,
                    your_email: $scope.your_email,
                    your_phone: $scope.your_phone,
                    your_message: $scope.your_message
                };
                jQuery.ajax({
                    url: '{{ route('front.post-contact') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            toastr.success('Thao tác thành công !')
                            $scope.loading = false;
                            $scope.errors = {};
                            $scope.your_name = '';
                            $scope.your_email = '';
                            $scope.your_message = '';
                            $scope.$applyAsync();
                            $('#chat-popup').removeClass('popup-visible');
                        } else {
                            $scope.errors = response.errors;
                            toastr.error('Thao tác thất bại !')
                            $scope.loading = false;
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                        $scope.loading = false;
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            };
        })

        app.factory('cartItemSync', function($interval) {
            var cart = {
                items: null,
                total: null
            };

            cart.items = @json($cartItems);
            cart.count = {{ $cartItems->sum('quantity') }};
            cart.total = {{ $totalPriceCart }};

            return cart;
        });

        app.factory('notiProduct', function($interval) {
            var noti = {
                product_id: null,
                product_name: null,
                product_image: null,
                product_price: null,
                product_qty: null
            };

            return noti;
        });

        @if (Session::has('token'))
            localStorage.setItem('{{ env('prefix') }}-token', "{{ Session::get('token') }}")
        @endif
        @if (Session::has('logout'))
            localStorage.removeItem('{{ env('prefix') }}-token');
        @endif
        var CSRF_TOKEN = "{{ csrf_token() }}";
        @if (Auth::guard('client')->check())
            const DEFAULT_CLIENT_USER = {
                id: "{{ Auth::guard('client')->user()->id }}",
                fullname: "{{ Auth::guard('client')->user()->name }}"
            };
        @else
            const DEFAULT_CLIENT_USER = null;
        @endif
    </script>
</head>

<body class="body-bg-color-1" ng-app="App" ng-controller="AppController" ng-cloak>
    {{-- <div class="preloader">
        <div class="preloader__image"></div>
    </div> --}}
    <!-- /.preloader -->
    <div class="chat-icon"><button type="button" class="chat-toggler"><i class="fa fa-comment"></i></button></div>
    <!--Chat Popup-->
    <div id="chat-popup" class="chat-popup">
        <div class="popup-inner">
            <div class="close-chat"><i class="fa fa-times"></i></div>
            <div class="chat-form">
                <p>Vui lòng điền thông tin bên dưới và chúng tôi sẽ liên hệ với bạn sớm nhất có thể.</p>
                <form class="contact-form-validated">
                    <div class="form-group">
                        <input type="text" placeholder="Họ tên" ng-model="your_name" required>
                        <span class="invalid-feedback d-block" role="alert">
                            <span ng-if="errors && errors.your_name">
                                <% errors.your_name[0] %>
                            </span>
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email" ng-model="your_email" required>
                        <span class="invalid-feedback d-block" role="alert">
                            <span ng-if="errors && errors.your_email">
                                <% errors.your_email[0] %>
                            </span>
                        </span>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Nội dung" ng-model="your_message"></textarea>
                        <span class="invalid-feedback d-block" role="alert">
                            <span ng-if="errors && errors.your_message">
                                <% errors.your_message[0] %>
                            </span>
                        </span>
                    </div>
                    <div class="form-group message-btn">
                        <button type="submit" class="thm-btn" ng-click="submitContactModal()">Gửi <span class="icon-up-right-arrow"></span>
                        </button>
                    </div>
                    <div class="result"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="theme-border-left"></div>
    <div class="theme-border-right"></div>
    <div class="page-wrapper">
        @include('site.partials.header')
        <!-- /.stricky-header -->
        @yield('content')
        <!--Site Footer Start-->
        @include('site.partials.footer')
        <!--Site Footer End-->
    </div>
    <!-- /.page-wrapper -->
    @include('site.partials.mobile_menu')
    <div class="hidden-xs">
        <div onclick="window.location.href= 'tel:{{ $config->hotline }}'" class="hotline-phone-ring-wrap">
            <div class="hotline-phone-ring">
                <div class="hotline-phone-ring-circle"></div>
                <div class="hotline-phone-ring-circle-fill"></div>
                <div class="hotline-phone-ring-img-circle">
                    <a href="tel: {{ str_replace(' ', '', $config->hotline) }}" class="pps-btn-img">
                        <img src="/site/images/phone.png" alt="Gọi điện thoại" width="50" loading="lazy">
                    </a>
                </div>
            </div>
            <a href="tel:{{ str_replace(' ', '', $config->hotline) }}">
            </a>
            <div class="hotline-bar"><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">
                </a><a href="tel:{{ str_replace(' ', '', $config->hotline) }}">
                    <span class="text-hotline">{{ $config->hotline }}</span>
                </a>
            </div>

        </div>
        <div class="inner-fabs">
            <a target="blank" href="{{ $config->facebook }}" class="fabs roundCool" id="challenges-fab"
                data-tooltip="Send Messenger">
                <img class="inner-fab-icon" src="/site/images/messenger-icon.png" alt="challenges-icon"
                    border="0" loading="lazy">
            </a>
            <a target="blank" href="https://zalo.me/{{ str_replace(' ', '', $config->zalo) }}"
                class="fabs roundCool" id="chat-fab" data-tooltip="Send message Zalo">
                <img class="inner-fab-icon" src="/site/images/zalo.png" alt="chat-active-icon" border="0"
                    loading="lazy">
            </a>
            {{--            <a target="blank" href="{{ $config->google_map }}" class="fabs roundCool" id="chat-fab" --}}
            {{--               data-tooltip="View map"> --}}
            {{--                <img class="inner-fab-icon" src="/site/images/map.png" alt="chat-active-icon" border="0" loading="lazy"> --}}
            {{--            </a> --}}

        </div>
        <div class="fabs roundCool call-animation" id="main-fab">
            <img class="img-circle" src="/site/images/lienhe.png" alt="" width="135" loading="lazy">
        </div>
    </div>
    <!-- /.search-popup --> <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Go Back Top</span>
    </a>
    <script src="/site/js/jquery-3.6.0.min.js"></script>
    <script src="/site/js/bootstrap.bundle.min.js"></script>
    <script src="/site/js/jarallax.min.js"></script>
    <script src="/site/js/jquery.ajaxchimp.min.js"></script>
    <script src="/site/js/jquery.appear.min.js"></script>
    <script src="/site/js/swiper.min.js"></script>
    <script src="/site/js/jquery.circle-progress.min.js"></script>
    <script src="/site/js/jquery.magnific-popup.min.js"></script>
    <script src="/site/js/jquery.validate.min.js"></script>
    <script src="/site/js/odometer.min.js"></script>
    <script src="/site/js/wNumb.min.js"></script>
    <script src="/site/js/wow.js"></script>
    <script src="/site/js/isotope.js"></script>
    <script src="/site/js/owl.carousel.min.js"></script>
    <script src="/site/js/jquery-ui.js"></script>
    <script src="/site/js/jquery.circleType.js"></script>
    <script src="/site/js/jquery.lettering.min.js"></script>
    <script src="/site/js/jquery.nice-select.min.js"></script>
    <script src="/site/js/marquee.min.js"></script>
    <script src="/site/js/countdown.min.js"></script>
    <script src="/site/js/jquery-sidebar-content.js"></script>
    <script src="/site/js/twentytwenty.js"></script>
    <script src="/site/js/jquery.event.move.js"></script>
    <script src="/site/js/gsap.js"></script>
    <script src="/site/js/ScrollTrigger.js"></script>
    <script src="/site/js/SplitText.js"></script>
    <script src="/site/js/script.js"></script>
    <script src="/site/js/callbutton.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    @stack('script')

</body>

</html>
