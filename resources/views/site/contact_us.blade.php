@extends('site.layouts.master')
@section('title')
    Liên hệ
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
    <link rel="stylesheet" href="/site/css/google-map.css">
    <link rel="stylesheet" href="/site/css/united-kingdom.css">
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
                    <h3 class="text-white">Liên hệ</h3>
                </div>
                <div class="thm-breadcrumb__box">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('front.home-page') }}"><i class="fas fa-home"></i> Trang chủ</a>
                        </li>
                        <li><span>/</span></li>
                        <li>Liên hệ</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--Page Header End-->
    <!--Contact Page Start-->
    <section class="contact-page" ng-controller="ContactUsController">
        <div class="section-shape-1" style="background-image: url(/site/images/section-shape-1.png);">
        </div>
        <div class="container">
            <div class="contact-page__inner">
                <div class="row">
                    <div class="col-xl-5 col-lg-5">
                        <div class="contact-page__left">
                            <div class="contact-page__information">
                                <h3 class="contact-page__information-title">Thông tin liên hệ</h3>
                                <ul class="contact-page__information-list list-unstyled">
                                    <li>
                                        <div class="icon">
                                            <span class="icon-pin"></span>
                                        </div>
                                        <div class="content">
                                            <h3>Địa chỉ</h3>
                                            <p>{{ $config->address_company }}</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-trading"></span>
                                        </div>
                                        <div class="content">
                                            <h3>Số điện thoại</h3>
                                            <p><a
                                                    href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline }}</a>
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-envelope-1"></span>
                                        </div>
                                        <div class="content">
                                            <h3>Email</h3>
                                            <p><a href="mailto:{{ $config->email }}">{{ $config->email }}</a>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <div class="contact-page__right">
                            <h3 class="contact-page__contact-title">Gửi liên hệ</h3>
                            <form id="contact-form" class="contact-page__form contact-form-validated">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contact-page__input-box">
                                            <input type="text" name="name" placeholder="Họ tên" required
                                                ng-model="your_name">
                                            <div class="invalid-feedback d-block error" role="alert">
                                                <span ng-if="errors && errors.your_name">
                                                    <% errors.your_name[0] %>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-page__input-box">
                                            <input type="email" name="email" placeholder="Email" required
                                                ng-model="your_email">
                                            <div class="invalid-feedback d-block error" role="alert">
                                                <span ng-if="errors && errors.your_email">
                                                    <% errors.your_email[0] %>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-page__input-box">
                                            <input type="number" placeholder="Số điện thoại" name="phone" required
                                                ng-model="your_phone">
                                            <div class="invalid-feedback d-block error" role="alert">
                                                <span ng-if="errors && errors.your_phone">
                                                    <% errors.your_phone[0] %>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box text-message-box">
                                            <textarea name="message" placeholder="Nội dung" required ng-model="your_message"></textarea>
                                            <div class="invalid-feedback d-block error" role="alert">
                                                <span ng-if="errors && errors.your_message">
                                                    <% errors.your_message[0] %>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="contact-page__btn-box">
                                            <button type="submit" class="thm-btn contact-page__btn"
                                                data-loading-text="Vui lòng chờ..." ng-click="submitContact()"
                                                ng-disabled="loading">
                                                <span ng-if="loading">
                                                    <i class="fa fa-spinner fa-spin"></i>
                                                </span>
                                                Gửi liên hệ
                                                <span class="icon-up-right-arrow" ng-if="!loading"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="result mt-2"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Page End-->
    <!--Google Map Start-->
    <section class="google-map-one">
        <div class="section-shape-1" style="background-image: url(/site/images/section-shape-1.png);">
        </div>
        {!! $config->location !!}
    </section>
    <!--Google Map End-->
@endsection

@push('script')
    <script>
        app.controller('ContactUsController', function($scope, $http) {
            $scope.loading = false;
            $scope.errors = {};
            $scope.submitContact = function() {
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
        });
    </script>
@endpush
