@extends('layout.app')

@section('content')
    <section class="breadcrumb padding-y-120">
        <img src="assets/images/thumbs/breadcrumb-img.png" alt="" class="breadcrumb__img">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb__wrapper">
                        <h2 class="breadcrumb__title"> {{__("Checkout")}}</h2>
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a href="index.html" class="breadcrumb__link"> <i
                                        class="las la-home"></i> {{__("Home")}}</a> </li>
                            <li class="breadcrumb__item"><i class="fas fa-angle-right"></i></li>
                            <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> {{__("Checkout")}} </span> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout padding-y-120">
        <div class="container container-two">
            <form action="#">
                <div class="row gy-4">
                    @include('pages.checkout.infor_customer_checkout')

                    @include('pages.checkout.pay_checkout')
                </div>
            </form>
        </div>
    </section>

    <section class="cta padding-b-120">
        <div class="container container-two">
            <div class="cta-box flx-between gap-2">
                <div class="cta-content">
                    <h2 class="cta-content__title">Subscribe To Our <span class="text-gradient">Newsletter</span> </h2>
                    <p class="cta-content__desc">It is a long established fact that a reader will be distracted by the
                        readable content of a page when looking at its layout.</p>
                    <form action="#" class="cta-content__form d-flex align-items-center gap-2">
                        <div class="position-relative w-100">
                            <input type="text" class="common-input common-input--withLeftIcon w-100"
                                placeholder="Enter Your Email Address">
                            <span class="input-icon input-icon--left text-gradient font-20 line-height-1"><i
                                    class="far fa-envelope"></i></span>
                        </div>
                        <button type="submit" class="btn btn-main text-uppercase flex-shrink-0"> Subscribe <span
                                class="text">Now</span> </button>
                    </form>
                </div>
                <div class="cta-content__thumb d-xl-block d-none">
                    <img src="assets/images/thumbs/cta-img.png" alt="">
                </div>
            </div>
        </div>
    </section>
@endsection
