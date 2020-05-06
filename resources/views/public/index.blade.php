@extends('public.master')
@section('title','Home')
@section('style')
    <style>
        .m-t-5 {

            margin-top: 40px !important;

        }

        .m-b-2 {

            margin-bottom: 16px !important;

        }

        table, td, th {
            border: 1px solid #ddd;
        }

        h4 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #f73a65;
        }

        th, td {
            text-align: left;
            padding: 5px;
        }

        th {
            background-color: white;
            color: #f73a65;
        }

        .feedback {
            background-color: limegreen;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border-color: limegreen;
            border-width: 0.5px;
        }

        #mybutton {
            position: fixed;
            bottom: -8px;
            right: 10px;
            z-index: 999;
        }

        .modal-header {
            /*padding: 2px 16px;*/
            background-color: #5cb85c;
            color: white;
        }

        {{--.modal-body {--}}
        {{--background-image: url('{{asset('asset')}}/images/2.jpg');--}}
        {{--background-repeat: no-repeat;--}}
        {{--background-size: cover;--}}
        {{--height: 400px;--}}
        {{--}--}}
        .modal {
            text-align: center;
            padding: 0!important;

            position: absolute;
            top: 10px;
            right: -20%;
            bottom: 0;
            left: 0;
            z-index: 10040;
            overflow: auto;
            overflow-y: auto;
        }

        .modal:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -4px;
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }

        .marquee {
            width: 100%;
            overflow: hidden;
            border: 1px solid #fff;
            background: #fff;
        }

    </style>
@stop
@include('public.nav')
@section('content')
    <div id="mybutton">
        <button class="feedback hidden-xs hidden-sm" data-toggle="modal" data-target="#admin_notice">Admin Notice
        </button>
    </div>

    @if(isset($live_update))
    <div>
        <div style="margin-bottom: -15px;">
            {{--<marquee  onMouseOut="this.start()" onMouseOver="this.stop()" direction="left"  behavior="scroll" style="padding-top: 10px;"><p style="font-size: 16px; color: green"><b>{{strip_tags($live_update->details)}}</b></p></marquee>--}}
            <div class="marquee" style="padding-top: 10px;"><p style="font-size: 16px; color: green"><b>{{strip_tags($live_update->details)}}</b></p></div>
        </div>
    </div>



    @endif

    <!-- start hero with parallax section -->
    <section id="home" class="wow fadeIn no-padding parallax xs-background-image-center"
             data-stellar-background-ratio="0.5"
             style="background-image:url('{{asset('asset')}}/images/2.jpg');">
        <div class="wow fadeInUp container full-screen position-relative">
            <div class="slider-typography">
                <div class="slider-text-middle-main">
                    <div class="slider-text-middle md-padding-15px-lr">
                        <div class="col-lg-8 col-sm-10 col-lg-push-4 col-sm-push-1 text-left bg-deep-pink-opacity padding-seven-all md-padding-ten-all sm-text-center">
                            <div class=" wow fadeInUp alt-font text-white text-uppercase font-weight-700 letter-spacing-minus-2 title-large"
                                 data-wow-delay="0.2s">
                                @if(isset($homes_info[0])){{$homes_info[0]->moto_title}}@endif
                            </div>
                            <div class="separator-line-horrizontal-full width-100 margin-35px-tb sm-margin-25px-tb xs-margin-20px-tb bg-white"></div>
                            <span class="wow fadeInUp text-white text-extra-large font-weight-300 margin-35px-bottom display-block sm-margin-25px-bottom xs-margin-15px-bottom"
                                  data-wow-delay="0.4s">@if(isset($homes_info[0])){{$homes_info[0]->moto_details}}@endif</span>
                            <a href="{{url('/public/sign-up')}}"
                               class="btn btn-white text-link-deep-pink btn-medium">Signup Now</a>
                        </div>
                    </div>
                    <div class="down-section text-center">
                        <a href="#why" class="section-link up-down-ani"><i
                                    class="ti-mouse icon-small bounce text-deep-pink"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end hero banner with parallax section -->
    <!-- start feature box section  -->
    <section id="buy_sell_exchange" class="wow fadeInDwon bg-extra-dark-gray md-padding-two-lr sm-no-padding-lr"
             style="visibility: visible; animation-name: fadeInDwon; padding-top: 65px; padding-bottom: 65px;">
        <div class="container">
            <div class="row">
                <!-- start feature box item -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 feature-box-1 xs-margin-30px-bottom wow fadeIn">
                    <div class="col-md-12 col-sm-12 no-padding margin-15px-bottom alt-font">
                        <h3 class="char-value letter-spacing-minus-1 text-medium-gray font-weight-300">01.</h3>
                        <span class="text-large line-height-22 padding-20px-left sm-padding-15px width-100 display-table-cell vertical-align-middle text-medium-gray">Register<br>Login our site</span>
                    </div>
                    <p class="width-90 md-width-100">If you are new in our site please register first then login your
                        account to buy sell or exchange your money.</p>
                    <div class="clearfix"></div>
                    <div class="separator-line-horrizontal-medium-light3 bg-deep-pink margin-5px-top"></div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 feature-box-1 xs-margin-30px-bottom wow fadeIn"
                     data-wow-delay="0.2s">
                    <div class="col-md-12 col-sm-12 no-padding margin-15px-bottom alt-font">
                        <h3 class="char-value letter-spacing-minus-1 text-medium-gray font-weight-300">02.</h3>
                        <span class="text-large line-height-22 padding-20px-left width-100 display-table-cell vertical-align-middle text-medium-gray">Request Exchange Ammount</span>
                    </div>
                    <p class="width-90 md-width-100">Enter the currency you need and how much. Then pay your amount you
                        need to buy.</p>
                    <div class="clearfix"></div>
                    <div class="separator-line-horrizontal-medium-light3 bg-deep-pink margin-5px-top"></div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 feature-box-1 wow fadeIn" data-wow-delay="0.4s">
                    <div class="col-md-12 col-sm-12 no-padding margin-15px-bottom alt-font">
                        <h3 class="char-value letter-spacing-minus-1 text-medium-gray font-weight-300">03.</h3>
                        <span class="text-large line-height-22 padding-20px-left width-100 display-table-cell vertical-align-middle text-medium-gray">Delevery<br>Transfer funds</span>
                    </div>
                    <p class="width-90 md-width-100">The funds are sent to your recipient account. You can track and
                        trace your transfer in 'Transaction History'.</p>
                    <div class="clearfix"></div>
                    <div class="separator-line-horrizontal-medium-light3 bg-deep-pink margin-5px-top"></div>
                </div>
                <!-- end feature box item -->
            </div>
        </div>
    </section>

    <!--  start clients slider section  -->
    <section class="wow fadeIn"
             style="visibility: visible; animation-name: fadeIn; padding-top: 25px; padding-bottom: 10px;">
        <div class="container text-center">
            <div class="swiper-slider-clients swiper-container black-move swiper-container-horizontal">
                <div class="swiper-wrapper" style="transform: translate3d(-570px, 0px, 0px); transition-duration: 0ms;">
                    <!-- start client slider item -->
                    <div class="swiper-slide text-center" style="width: 285px;"><img
                                src="{{asset('asset')}}/images/bkash.jpg" alt="bkash"
                                data-no-retina=""></div>
                    <!-- end client slider item -->
                    <!-- start client slider item -->
                    <div class="swiper-slide text-center swiper-slide-prev" style="width: 285px;"><img
                                src="{{asset('asset')}}/images/dbbl.jpg" alt="dbbl" data-no-retina=""></div>
                    <!-- end client slider item -->
                    <!-- start client slider item -->
                    <div class="swiper-slide text-center swiper-slide-active" style="width: 285px;"><img
                                src="{{asset('asset')}}/images/neteller.jpg" alt="neteller" data-no-retina=""></div>
                    <!-- end client slider item -->
                    <!-- start client slider item -->
                    <div class="swiper-slide text-center swiper-slide-next" style="width: 285px;"><img
                                src="{{asset('asset')}}/images/skrill.jpg" alt="skrill" data-no-retina=""></div>
                    <!-- end client slider item -->
                    <!-- start client slider item -->
                    <div class="swiper-slide text-center" style="width: 285px;"><img
                                src="{{asset('asset')}}/images/perfect-money.jpg" alt="perfect-money"
                                data-no-retina=""></div>
                    <!-- end client slider item -->
                    <!-- start client slider item -->
                    <div class="swiper-slide text-center" style="width: 285px;"><img
                                src="{{asset('asset')}}/images/payza.jpg" alt="payza"
                                data-no-retina=""></div>
                    <!-- end client slider item -->
                    <!-- start client slider item -->
                    <div class="swiper-slide text-center" style="width: 285px;"><img
                                src="{{asset('asset')}}/images/payneer.jpg" alt="payneer"
                                data-no-retina=""></div>
                    <!-- end client slider item -->
                    <!-- start client slider item -->
                    <div class="swiper-slide text-center" style="width: 285px;"><img
                                src="{{asset('asset')}}/images/payeer.jpg" alt="payeer"
                                data-no-retina=""></div>

                    <div class="swiper-slide text-center" style="width: 285px;"><img
                                src="{{asset('asset')}}/images/webmoney.jpg" alt="webmoney"
                                data-no-retina=""></div>

                {{--<div class="swiper-slide text-center" style="width: 285px;"><img--}}
                {{--src="{{asset('asset')}}/images/bracbank.jpg" alt="bracbank"--}}
                {{--data-no-retina=""></div>--}}
                <!-- end client slider item -->
                </div>
            </div>
        </div>
    </section>
    <!-- end clients slider  section -->

    @if(isset($rates[0]))
        <section style="padding-top: 5px; padding-bottom: 20px;">
            <div class="container">
                <div class="row">
                    <!-- start column -->
                    <div class="col-md-8 col-sm-12 sm-margin-10px-bottom wow slideInUp" data-wow-delay="0.2s">
                        <div class="bg-light xs-padding-30px-all last-paragraph-no-margin" style="padding-top: 40px;">
                            <div class="section trending-ads"><strong>
                                    <div class="btn btn"
                                         style="text-align: center; background: #f73a65; font-size: 16px; color: white; width: 100%; height:40px;">
                                        <strong>Today's Buy-Sell Rate</strong></div>
                                    <table class="table table-striped table-dark table-bordered">
                                        <tbody>
                                        <tr>
                                            <th><strong>We Accept</strong></th>
                                            <th><strong>We Buy</strong></th>
                                            <th><strong>We Sell</strong></th>
                                        </tr>
                                        @foreach($rates as $rate)
                                            <tr>
                                                <td><img src="{{Voyager::image($rate->image)}}" width="20"
                                                         height="20" alt="Currency Rate">&nbsp;
                                                    <strong>{{$rate->curency_name}}</strong></td>
                                                <td><strong>Tk. {{$rate->buy}}</strong></td>
                                                <td><strong>Tk. {{$rate->sell}}</strong></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </div>
                        </div>

                    </div>
                    <!-- end column -->
                    <!-- start column -->
                    <div class="col-md-4 col-sm-12 sm-margin-10px-bottom wow slideInUp" data-wow-delay="0.2s">
                        <div class="bg-light xs-padding-30px-all last-paragraph-no-margin" style="padding-top: 40px;">
                            <div class="section trending-ads"><strong>
                                    <div class="btn btn"
                                         style="text-align: center; background: #f73a65; font-size: 16px; color: white; width: 100%; height:40px;">
                                        <strong>Reserved Now</strong></div>
                                    <table class="table table-striped table-dark table-bordered">
                                        <tbody>
                                        <tr>
                                            <th><strong>Currency</strong></th>
                                            <th><strong>Reserve</strong></th>
                                        </tr>
                                        @foreach($rates as $rate)
                                            <tr>
                                                <td><img src="{{Voyager::image($rate->image)}}" width="20"
                                                         height="20" alt="Currency Reserved">&nbsp;
                                                    <strong>{{$rate->curency_name}}</strong></td>
                                                <td><strong>{{$rate->reserved}} {{$rate->ammount_type}}</strong></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </strong>
                            </div>
                        </div>
                    </div>
                    <!-- end column -->
                </div>
            </div>
        </section>
    @endif
    <!-- end feature box section -->
    <!-- feature box section -->
    <section class="wow fadeIn md-padding-two-lr sm-no-padding-lr" style="padding-top: 20px;">
        <div class="container">
            <div class="equalize sm-col-2-nth">
                <!-- start feature box item -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin-six-bottom md-margin-six-bottom sm-margin-30px-bottom wow fadeInUp last-paragraph-no-margin"
                     data-wow-delay="0.2s">
                    <div class="feature-box-5 position-relative">
                        <i class="icon-wallet text-deep-pink icon-medium"></i>
                        <div class="feature-content">
                            <div class="text-extra-dark-gray margin-5px-bottom alt-font font-weight-600">Instant Payment
                            </div>
                            <p>We always try to ensure instant payment with best rate and minimum service charge.</p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin-six-bottom md-margin-six-bottom sm-margin-30px-bottom wow fadeInUp last-paragraph-no-margin"
                     data-wow-delay="0.4s">
                    <div class="feature-box-5 position-relative">
                        <i class="icon-pricetags text-deep-pink icon-medium"></i>
                        <div class="feature-content">
                            <div class="text-extra-dark-gray margin-5px-bottom alt-font font-weight-600">Fastest
                                Transfers
                            </div>
                            <p>We have quick and seamless system of money transfers within 10 to 15 minutes.</p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 margin-six-bottom md-margin-six-bottom sm-margin-30px-bottom wow fadeInUp last-paragraph-no-margin"
                     data-wow-delay="0.6s">
                    <div class="feature-box-5 position-relative">
                        <i class="icon-chat text-deep-pink icon-medium"></i>
                        <div class="feature-content">
                            <div class="text-extra-dark-gray margin-5px-bottom alt-font font-weight-600">Best Rates and
                                Low Service Charge
                            </div>
                            <p>We always offer you to maximum best rate from others with low service charge.</p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 sm-margin-six-bottom md-margin-six-bottom sm-margin-30px-bottom wow fadeInUp last-paragraph-no-margin"
                     data-wow-delay="0.8s">
                    <div class="feature-box-5 position-relative ">
                        <i class="icon-target text-deep-pink icon-medium"></i>
                        <div class="feature-content">
                            <div class="text-extra-dark-gray margin-5px-bottom alt-font font-weight-600">True
                                and Trusted
                            </div>
                            <p>We are the best trusted solutions of buy, sell and exchange dollar all over
                                Bangladesh.</p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin"
                     data-wow-delay="1s">
                    <div class="feature-box-5 position-relative">
                        <i class="icon-shield text-deep-pink icon-medium"></i>
                        <div class="feature-content">
                            <div class="text-extra-dark-gray margin-5px-bottom alt-font font-weight-600">Regulated and
                                Secure
                            </div>
                            <p>Regulated by the secured system. Customer funds are ring fenced to ensure maximum
                                security and protection. Your money is in safe hands.</p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 wow fadeInUp last-paragraph-no-margin"
                     data-wow-delay="1.2s">
                    <div class="feature-box-5 position-relative">
                        <i class="icon-alarmclock text-deep-pink icon-medium"></i>
                        <div class="feature-content">
                            <div class="text-extra-dark-gray margin-5px-bottom alt-font font-weight-600">Available
                                Anywhere
                            </div>
                            <p>Exchange money from your web browser, or using our native apps for both iPhone and
                                Android.</p>
                        </div>
                    </div>
                </div>
                <!-- end feature box item -->
            </div>
        </div>
    </section>
    <!-- end feature box section -->
    @if(isset($notices[0]))
        <section id="notice" class="wow fadeIn no-padding main-slider mobile-height content-right-slider"
                 style="visibility: visible; animation-name: fadeIn;">
            <div class="container-fluid">
                <div class="row equalize sm-equalize-auto">
                    <div class="swiper-full-screen swiper-container col-md-12 no-padding-lr white-move bg-extra-dark-gray text-center xs-padding-20px-tb wow fadeIn swiper-container-horizontal"
                         style="visibility: visible; animation-name: fadeIn; height: 751px;">
                        <div class="swiper-wrapper"
                             style="transform: translate3d(-3800px, 0px, 0px); transition-duration: 0ms;">
                            <!-- start slider item -->
                            @foreach($notices as $index => $notice)
                                <div class="swiper-slide last-paragraph-no-margin" data-swiper-slide-index="1"
                                     style="width: 950px;">
                                    <div class="padding-eight-all md-padding-eight-all sm-padding-thirteen-all xs-padding-15px-lr">
                                        <div class="margin-30px-bottom text-center position-relative">
                                            <span class="title-large alt-font font-weight-100 text-dark-gray opacity4">NOTICE-{{$index+1}}</span>
                                            <p class="alt-font font-weight-600 text-deep-pink text-uppercase position-absolute left-0 right-0 top-35 sm-top-25 xs-top-12">
                                            </p>
                                        </div>
                                        <h4 class="alt-font text-white">{{$notice->title}}</h4>
                                        <p class="width-90 sm-width-95 xs-width-85 center-col">{!! $notice->details !!}</p>
                                        {{--<a href="" class="btn btn-small btn-white margin-35px-top">More</a>--}}
                                    </div>
                                </div>
                                <!-- end slider item -->
                        @endforeach

                        <!-- start slider pagination -->
                            <div class="swiper-button-next slider-long-arrow-white"></div>
                            <div class="swiper-button-prev slider-long-arrow-white"></div>
                            <!-- end slider pagination -->
                        </div>
                    </div>
                </div>
        </section>
    @endif
    <!-- start section -->
    <section id="about_us" class="wow fadeIn sm-no-padding-bottom xs-padding-50px-bottom" style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-8 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center">
                    <h5 class="alt-font font-weight-700 text-extra-dark-gray margin-20px-bottom text-uppercase">About
                        Us</h5>
                    <p class="margin-lr-auto">
                        @if(isset($homes_info[0])){{$homes_info[0]->about_us}}@endif

                    </p>
                </div>
            </div>
            <div class="row equalize md-equalize-auto">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center display-table no-padding-left md-padding-15px-left sm-no-padding wow fadeIn">
                    <div class="display-table-cell vertical-align-middle">
                        <img src="{{asset('asset')}}/images/image-1.jpg" alt="Image" class="width-100">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 text-center no-padding-left md-padding-15px-left display-table sm-no-padding wow fadeIn"
                     data-wow-delay="0.2s">
                    <div class="display-table-cell vertical-align-middle">
                        <img src="{{asset('asset')}}/images/image-2.jpg" alt="Image" class="width-100">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 no-padding display-table md-margin-15px-top sm-no-margin-top wow fadeIn"
                     data-wow-delay="0.4s">
                    <div class="display-table-cell bg-extra-dark-gray vertical-align-middle padding-thirteen-all sm-padding-ten-all sm-text-center xs-padding-five-lr xs-padding-fifteen-tb width-100">
                        <p class="text-extra-large text-medium-gray font-weight-300">We always stay with our clients and
                            respect their business. We deliver 100% and provide instant response.</p>
                        <p>We think it will be easy and faster way to all users who wants to Buy, Sell or Exchange
                            dollar
                            from online in a trustworthy way. Its so flexible. User could sell their Dollar in a
                            reasonable
                            price and also could buy dollar with a reasonable price. User could also exchange dollar
                            with a
                            flexible rate.</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
    <!-- start feature box section -->

    {{--<section class="wow fadeIn no-padding">--}}
    {{--<div class="feature-box feature-box-7 equalize xs-equalize-auto">--}}
    {{--<!-- start feature item -->--}}
    {{--<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 no-padding xs-margin-five-bottom wow fadeInLeft last-paragraph-no-margin ">--}}
    {{--<div class="box">--}}
    {{--<div class="content">--}}
    {{--<figure>--}}
    {{--<i class="icon-hotairballoon icon-extra-medium text-medium-gray margin-15px-bottom"></i>--}}
    {{--<span class="alt-font text-extra-dark-gray display-block margin-10px-bottom">Creative Elements</span>--}}
    {{--<div class="details">--}}
    {{--<p class="width-70 center-col">We are group of creative and energetic people to serve--}}
    {{--you.</p>--}}
    {{--</div>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- end feature item -->--}}
    {{--<!-- start feature item -->--}}
    {{--<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 no-padding xs-margin-five-bottom wow fadeInLeft last-paragraph-no-margin"--}}
    {{--data-wow-delay="0.2s">--}}
    {{--<div class="box">--}}
    {{--<div class="content">--}}
    {{--<figure>--}}
    {{--<i class="icon-pricetags icon-extra-medium text-medium-gray margin-15px-bottom"></i>--}}
    {{--<span class="alt-font text-extra-dark-gray display-block margin-10px-bottom">Trusted Authority</span>--}}
    {{--<div class="details">--}}
    {{--<p class="width-70 center-col">We are trusted and committed to provide you maximum--}}
    {{--services.</p>--}}
    {{--</div>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- end feature item -->--}}
    {{--<!-- start feature item -->--}}
    {{--<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 no-padding xs-margin-five-bottom wow fadeInLeft last-paragraph-no-margin"--}}
    {{--data-wow-delay="0.4s">--}}
    {{--<div class="box md-no-border-left md-no-border-top">--}}
    {{--<div class="content">--}}
    {{--<figure>--}}
    {{--<i class="icon-chat icon-extra-medium text-medium-gray margin-15px-bottom"></i>--}}
    {{--<span class="alt-font text-extra-dark-gray display-block margin-10px-bottom">Friendly Support</span>--}}
    {{--<div class="details">--}}
    {{--<p class="width-70 center-col">We have strong support team to serve you.</p>--}}
    {{--</div>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- end feature item -->--}}
    {{--<!-- start feature item -->--}}
    {{--<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 no-padding wow fadeInLeft last-paragraph-no-margin"--}}
    {{--data-wow-delay="0.6s">--}}
    {{--<div class="box md-no-border-top">--}}
    {{--<div class="content">--}}
    {{--<figure>--}}
    {{--<i class="icon-layers icon-extra-medium text-medium-gray margin-15px-bottom"></i>--}}
    {{--<span class="alt-font text-extra-dark-gray display-block margin-10px-bottom">Allways Available</span>--}}
    {{--<div class="details">--}}
    {{--<p class="width-70 center-col">We are available 24/7 to serve you.</p>--}}
    {{--</div>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- end feature item -->--}}
    {{--</div>--}}
    {{--</section>--}}

    <!-- end feature box section -->
    <!-- start team section -->

    {{--<section class="wow fadeIn">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-5 col-md-8 col-sm-8 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center">--}}
    {{--<h5 class="alt-font font-weight-700 text-extra-dark-gray margin-20px-bottom text-uppercase">Our--}}
    {{--Teams</h5>--}}
    {{--<p class="margin-lr-auto">Hi, we are CurrencyTransfer.com--}}
    {{--Thanks for stopping by.CurrencyTransfer.com is re-thinking the way we make online payments. By--}}
    {{--seamlessly connecting the world’s leading foreign exchange companies with customers in one--}}
    {{--venue, we make great rates more accessible and sending money abroad fairer.</p>--}}
    {{--</div>--}}
    {{--<!-- start team item -->--}}
    {{--<div class="col-md-3 col-sm-6 col-xs-12 team-block text-left team-style-1 sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp">--}}
    {{--<figure>--}}
    {{--<div class="team-image xs-width-100">--}}
    {{--<img src="{{asset('asset')}}/images/team13.jpg" alt="">--}}
    {{--<div class="overlay-content text-center">--}}
    {{--<div class="display-table height-100 width-100">--}}
    {{--<div class="vertical-align-middle display-table-cell icon-social-small">--}}
    {{--<a href="http://www.facebook.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-facebook"></i></a>--}}
    {{--<a href="http://www.twitter.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-twitter"></i></a>--}}
    {{--<a href="http://www.plus.google.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-google-plus"></i></a>--}}
    {{--<a href="http://www.instagram.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-instagram"></i></a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="team-overlay bg-deep-pink opacity8"></div>--}}
    {{--</div>--}}
    {{--<figcaption>--}}
    {{--<div class="team-member-position margin-20px-top text-center">--}}
    {{--<div class="text-small font-weight-500 text-extra-dark-gray text-uppercase">Hugh--}}
    {{--Macleod--}}
    {{--</div>--}}
    {{--<div class="text-extra-small text-uppercase text-medium-gray">Creative Director</div>--}}
    {{--</div>--}}
    {{--</figcaption>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--<!-- end team item -->--}}
    {{--<!-- start team item -->--}}
    {{--<div class="col-md-3 col-sm-6 col-xs-12 team-block text-left team-style-1 sm-margin-50px-bottom xs-margin-30px-bottom wow fadeInUp"--}}
    {{--data-wow-delay="0.2s">--}}
    {{--<figure>--}}
    {{--<div class="team-image xs-width-100">--}}
    {{--<img src="{{asset('asset')}}/images/team18.jpg" alt="">--}}
    {{--<div class="overlay-content text-center">--}}
    {{--<div class="display-table height-100 width-100">--}}
    {{--<div class="vertical-align-middle display-table-cell icon-social-small">--}}
    {{--<a href="http://www.facebook.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-facebook"></i></a>--}}
    {{--<a href="http://www.twitter.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-twitter"></i></a>--}}
    {{--<a href="http://www.plus.google.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-google-plus"></i></a>--}}
    {{--<a href="http://www.instagram.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-instagram"></i></a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="team-overlay bg-deep-pink opacity8"></div>--}}
    {{--</div>--}}
    {{--<figcaption>--}}
    {{--<div class="team-member-position margin-20px-top text-center">--}}
    {{--<div class="text-small font-weight-500 text-extra-dark-gray text-uppercase">Jeremy--}}
    {{--Dupont--}}
    {{--</div>--}}
    {{--<div class="text-extra-small text-uppercase text-medium-gray">Creative Director</div>--}}
    {{--</div>--}}
    {{--</figcaption>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--<!-- end team item -->--}}
    {{--<!-- start team item -->--}}
    {{--<div class="col-md-3 col-sm-6 col-xs-12 team-block text-left team-style-1 xs-margin-30px-bottom wow fadeInUp"--}}
    {{--data-wow-delay="0.4s">--}}
    {{--<figure>--}}
    {{--<div class="team-image xs-width-100">--}}
    {{--<img src="{{asset('asset')}}/images/team15.jpg" alt="">--}}
    {{--<div class="overlay-content text-center">--}}
    {{--<div class="display-table height-100 width-100">--}}
    {{--<div class="vertical-align-middle display-table-cell icon-social-small">--}}
    {{--<a href="http://www.facebook.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-facebook"></i></a>--}}
    {{--<a href="http://www.twitter.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-twitter"></i></a>--}}
    {{--<a href="http://www.plus.google.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-google-plus"></i></a>--}}
    {{--<a href="http://www.instagram.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-instagram"></i></a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="team-overlay bg-deep-pink opacity8"></div>--}}
    {{--</div>--}}
    {{--<figcaption>--}}
    {{--<div class="team-member-position margin-20px-top text-center">--}}
    {{--<div class="text-small font-weight-500 text-extra-dark-gray text-uppercase">Sara Smith--}}
    {{--</div>--}}
    {{--<div class="text-extra-small text-uppercase text-medium-gray">Creative Studio Head</div>--}}
    {{--</div>--}}
    {{--</figcaption>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--<!-- end team item -->--}}
    {{--<!-- start team item -->--}}
    {{--<div class="col-md-3 col-sm-6 col-xs-12 team-block text-left team-style-1 wow fadeInUp"--}}
    {{--data-wow-delay="0.6s">--}}
    {{--<figure>--}}
    {{--<div class="team-image xs-width-100">--}}
    {{--<img src="{{asset('asset')}}/images/team16.jpg" alt="">--}}
    {{--<div class="overlay-content text-center">--}}
    {{--<div class="display-table height-100 width-100">--}}
    {{--<div class="vertical-align-middle display-table-cell icon-social-small">--}}
    {{--<a href="http://www.facebook.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-facebook"></i></a>--}}
    {{--<a href="http://www.twitter.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-twitter"></i></a>--}}
    {{--<a href="http://www.plus.google.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-google-plus"></i></a>--}}
    {{--<a href="http://www.instagram.com/" class="text-white text-white-hover"--}}
    {{--target="_blank"><i class="fa fa-instagram"></i></a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="team-overlay bg-deep-pink opacity8"></div>--}}
    {{--</div>--}}
    {{--<figcaption>--}}
    {{--<div class="team-member-position margin-20px-top text-center">--}}
    {{--<div class="text-small font-weight-500 text-extra-dark-gray text-uppercase">Bill--}}
    {{--Gardner--}}
    {{--</div>--}}
    {{--<div class="text-extra-small text-uppercase text-medium-gray">Co-Founder / Design</div>--}}
    {{--</div>--}}
    {{--</figcaption>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--<!-- end team item -->--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}

    <!-- end team section -->
    <!-- start portfolio section -->

    <div class="wow fadeIn bg-light" style=" padding-bottom: 130px; visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row equalize sm-equalize-auto">
                <!-- start feature box item -->
                <div class="col-md-4 col-sm-12 col-xs-12 sm-text-center sm-margin-five-bottom xs-margin-ten-bottom display-table last-paragraph-no-margin"
                     style="height: 139px;">
                    <div class="display-table-cell vertical-align-middle">
                        <span class="text-extra-large text-extra-dark-gray alt-font margin-15px-bottom display-block width-85 sm-width-100">We combine trust and secure and high technical craft.</span>
                        <p class="width-90 sm-width-100">Your trust & safety is our 1st priority. Join to us.
                            With number of order taking place, Moneybagbd uses the latest high tech
                            anti-fraud and data security measures to keep your transactions and data safe.</p>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-md-2 col-sm-3 col-xs-12 text-center xs-margin-ten-bottom display-table wow zoomIn"
                     style="visibility: visible; animation-name: zoomIn; height: 139px;">
                    <div class="display-table-cell vertical-align-middle">
                        <img src="{{asset('asset')}}/images/image-icon1.png" alt="Available" data-no-retina="">
                        <p class="alt-font margin-10px-top no-margin-bottom">Available 24/7</p>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-md-2 col-sm-3 col-xs-12 text-center xs-margin-ten-bottom display-table wow zoomIn"
                     data-wow-delay="0.2s"
                     style="visibility: visible; animation-delay: 0.2s; animation-name: zoomIn; height: 139px;">
                    <div class="display-table-cell vertical-align-middle">
                        <img src="{{asset('asset')}}/images/image-icon2.png" alt="Secured" data-no-retina="">
                        <p class="alt-font margin-10px-top no-margin-bottom">Secured</p>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-md-2 col-sm-3 col-xs-12 text-center xs-margin-ten-bottom display-table wow zoomIn"
                     data-wow-delay="0.4s"
                     style="visibility: visible; animation-delay: 0.4s; animation-name: zoomIn; height: 139px;">
                    <div class="display-table-cell vertical-align-middle">
                        <img src="{{asset('asset')}}/images/image-icon3.png" alt="Trusted" data-no-retina="">
                        <p class="alt-font margin-10px-top no-margin-bottom">Trusted</p>
                    </div>
                </div>
                <!-- end feature box item -->
                <!-- start feature box item -->
                <div class="col-md-2 col-sm-3 col-xs-12 text-center display-table wow zoomIn" data-wow-delay="0.6s"
                     style="visibility: visible; animation-delay: 0.6s; animation-name: zoomIn; height: 139px;">
                    <div class="display-table-cell vertical-align-middle">
                        <img src="{{asset('asset')}}/images/image-icon4.png" alt="Superiority" data-no-retina="">
                        <p class="alt-font margin-10px-top no-margin-bottom">Superiority</p>
                    </div>
                </div>
            </div>
            <!-- end feature box item -->
        </div>
    </div>

    @if(isset($reviews[0]))
        <section id="testimonial" class="parallax wow fadeIn" data-stellar-background-ratio="0.5"
                 style="padding-top: 50px; padding-bottom: 50px; background-image: url(&quot;{{asset('asset')}}/images/testimonial-parallax-img.jpg&quot;); background-position: 0px 82.8167px; visibility: visible; animation-name: fadeIn;">
            <div class="opacity-medium bg-extra-dark-gray"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-xs-12 center-col text-center margin-10px-bottom xs-margin-5px-bottom">
                        <div class="position-relative overflow-hidden width-100">
                            <h5 class="text-outside-line-full alt-font font-weight-600 text-uppercase text-white">
                                Testimonial</h5>
                        </div>
                    </div>
                </div>
                <div class="row equalize sm-equalize-auto">
                    {{--<div class="swiper-slider-second swiper-container white-move swiper-container-horizontal">--}}
                    <div class="swiper-full-screen swiper-container white-move swiper-container-horizontal">
                        <div class="swiper-wrapper"
                             style="transform: translate3d(-1170px, 0px, 0px); transition-duration: 0ms;">

                        @foreach($reviews as $review)
                            <!-- start testimonial item -->
                                <div class="swiper-slide swiper-slide-prev" style="width: 1170px;" data-swiper-slide-index="1">
                                    <div class="col-md-7 col-sm-10 col-xs-12 center-col equalize sm-equalize-auto last-paragraph-no-margin">
                                        <div class="col-md-3 col-sm-3 col-xs-12 display-table" style="height: 133px;">
                                            <div class="display-table-cell vertical-align-middle">
                                                <img src="{{Voyager::image($review->image)}}" alt=""
                                                     class="border-radius-100 width-150px xs-width-100px xs-margin-15px-bottom"
                                                     data-no-retina="">
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12 text-left xs-text-center margin-20px-left xs-no-margin-left display-table"
                                             style="height: 133px;">
                                            <div class="display-table-cell vertical-align-middle">
                                                <b class="text-white alt-font text-small margin-15px-top display-inline-block">{!!$review->title !!}</b>
                                                <p class="text-extra-light-gray margin-15px-bottom">{!!$review->details !!}</p>
                                                <span class="text-white alt-font text-uppercase text-small margin-15px-top display-inline-block">- {{$review->client_name}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end testimonial item -->
                            @endforeach


                        </div>
                        <div class="swiper-button-next slider-long-arrow-white"></div>
                        <div class="swiper-button-prev slider-long-arrow-white"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- start portfolio section -->
    @endif

    <section style="padding-top: 50px; padding-bottom: 50px;"></section>
    {{--<section class="wow fadeIn parallax" data-stellar-background-ratio="0.4"--}}
    {{--style="background-image: url('{{asset('asset')}}/images/parallax-bg4.jpg';); background-position: 36px 882.34px; visibility: visible; animation-name: fadeIn;">--}}
    {{--<div class="opacity-full bg-extra-dark-gray"></div>--}}
    {{--<div class="container position-relative">--}}
    {{--<div class="row equalize sm-equalize-auto">--}}
    {{--<!-- start feature box item -->--}}
    {{--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 display-table md-margin-15px-top sm-no-margin-top sm-margin-ten-bottom xs-padding-five-lr xs-margin-ten-bottom wow fadeIn last-paragraph-no-margin"--}}
    {{--style="visibility: visible; animation-name: fadeIn; height: 344px;">--}}
    {{--<div class="display-table-cell vertical-align-middle padding-fourteen-right sm-no-padding-right sm-text-center">--}}
    {{--<h5 class="alt-font text-white">WE ACCEPT</h5>--}}
    {{--<p class="width-85 md-width-100 xs-width-100 sm-margin-lr-auto text-medium-gray">Moneybagbd.com--}}
    {{--is the trusted dollar buy sell site in Bangladesh.--}}
    {{--We accept bKash, DBBL Roket, Skrill, Neteller, Payza, Parfect Money, Web Money, Payoneer in--}}
    {{--Bangladesh. Our main motto to provide best--}}
    {{--services Bangladeshi Freelancers.</p>--}}
    {{--<a href="#about_us"--}}
    {{--class="margin-35px-top btn btn-small btn-white sm-margin-30px-top">About Company</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- end feature box item -->--}}
    {{--<!-- start feature box item -->--}}
    {{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center display-table xs-margin-ten-bottom wow fadeIn"--}}
    {{--data-wow-delay="0.2s"--}}
    {{--style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn; height: 344px;">--}}
    {{--<div class="display-table-cell vertical-align-middle">--}}
    {{--<span class="popup-youtube">--}}
    {{--<img src="{{asset('asset')}}/images/image-6.jpg" alt="" class="width-100" data-no-retina="">--}}
    {{--<div class="icon-play">--}}
    {{--<div class="absolute-middle-center width-80">--}}
    {{--<img src="{{asset('asset')}}/images/icon-play.png" alt="" data-no-retina="">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</span>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- end feature box item -->--}}
    {{--<!-- start feature box item -->--}}
    {{--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center display-table wow fadeIn"--}}
    {{--data-wow-delay="0.4s"--}}
    {{--style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn; height: 344px;">--}}
    {{--<div class="display-table-cell vertical-align-middle">--}}
    {{--<img src="{{asset('asset')}}/images/image-7.jpg" alt="" class="width-100" data-no-retina="">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!-- end feature box item -->--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}


    <section id="contact_us" class="wow fadeIn bg-extra-dark-gray" style="visibility: visible; animation-name: fadeIn;" data-wow-delay="0.2s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 padding-five-right md-padding-five-right sm-padding-15px-right sm-margin-five-bottom wow fadeIn"
                     style="visibility: visible; animation-name: fadeIn;">
                    <p class="alt-font text-medium margin-15px-bottom">Contact us</p>
                    <h5 class="alt-font text-white margin-20px-bottom">Feel free to get in touch with us any convenient
                        way</h5>
                    <p>Thank you for contacting Moneybagbd.com! Any query, issues, suggestions, comments, any technical
                        questions, pricing, special offers, discounts, etc. Please contact our addresses below.
                        We’ll try to help you as fast as possible.</p>
                    <div class="icon-box width-100 sm-margin-lr-auto xs-width-100 last-paragraph-no-margin">
                        <div class="icon-box-holder vertical-align-middle display-table-cell position-relative">
                            <i class="icon-map icon-medium text-deep-pink padding-5px-top"></i>
                            <div class="alt-font text-white">Postal Address</div>
                            <p>@if(isset($homes_info[0])){{$homes_info[0]->address}}@endif</p>
                        </div>
                    </div>
                    <div class="icon-box width-100 sm-margin-lr-auto xs-width-100 last-paragraph-no-margin">
                        <div class="icon-box-holder vertical-align-middle display-table-cell position-relative">
                            <i class="icon-envelope icon-medium text-deep-pink padding-5px-top"></i>
                            <div class="alt-font text-white">General Enquiries</div>
                            <p>@if(isset($homes_info[0])){{$homes_info[0]->support_phone}}@endif</p>
                        </div>
                    </div>
                    <div class="icon-box width-100 sm-margin-lr-auto xs-width-100 last-paragraph-no-margin">
                        <div class="icon-box-holder vertical-align-middle display-table-cell position-relative">
                            <i class="icon-chat icon-medium text-deep-pink padding-5px-top"></i>
                            <div class="alt-font text-white">Business Phone</div>
                            <p>@if(isset($homes_info[0])){{$homes_info[0]->support_email}}@endif</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                    <div class="padding-fifteen-all bg-white border-radius-6 md-padding-seven-all">
                        <div class="text-extra-dark-gray alt-font text-large font-weight-600 margin-30px-bottom">Message
                            us
                        </div>
                        <div>
                            <form id="contact-form" action="{{url('/public/send-message')}}" method="post">
                                {{ csrf_field() }}
                                <div id="success-contact-form" class="no-margin-lr" style="display: none;"></div>
                                <input name="name" id="name" placeholder="Name*" class="input-bg" type="text">
                                <input name="email" id="email" placeholder="E-mail*" class="input-bg" type="text">
                                <input name="subject" id="subject" placeholder="Subject" class="input-bg" type="text">
                                <textarea name="comment" id="comment" maxlength="500" placeholder="Your Message"
                                          class="input-bg"></textarea>
                                <p class="charsRemaining"></p>
                                <button id="contact-us-button" type="submit"
                                        class="btn btn-small border-radius-4 btn-black">send message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(isset($faqs[0]))
        <section id="faq" class="wow fadeInUp" style=" padding-top: 65px; padding-bottom: 65px; visibility: visible; animation-name: fadeInUp;" data-wow-delay="0.2s">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-uppercase alt-font text-extra-dark-gray font-weight-600 margin-four-bottom">
                            FAQ</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 center-col">
                        <!-- start accordion -->
                        <div class="panel-group accordion-style1" id="accordion-one">
                            <!-- start accordion item -->
                            @foreach($faqs as $faq)
                                <div class="panel">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion-one"
                                           href="#accordion-one-link{{$faq->id}}"
                                           class="collapsed" aria-expanded="false">
                                            <div class="panel-title font-weight-500 text-uppercase position-relative padding-20px-right">
                                                {{$faq->question}}<span
                                                        class="pull-right position-absolute right-0 top-0"><i
                                                            class="ti-plus"></i></span></div>
                                        </a>
                                    </div>
                                    <div id="accordion-one-link{{$faq->id}}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>{!!$faq->answer!!}</p>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        <!-- end accordion item -->
                        </div>
                        <!-- end accordion -->
                    </div>
                </div>
            </div>
        </section>

        <div class="wow fadeInUp" style="visibility: visible; animation-name:fadeInUp;">
            <div class="container" style="padding-top: -130px!important;">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom">
                        <h5 class="alt-font font-weight-600 text-extra-dark-gray margin-20px-bottom text-uppercase">Get
                            the
                            app</h5>
                        <p class="margin-lr-auto">Track your transfers on the go, or make new ones in a couple of
                            taps.</p>
                        <div class="text-xs-center">
                            <a href="#"
                               target="_blank"
                               class="m-r-3">
                                <img src="{{url('asset')}}/images/btn_download_appstore_en_US.svg"
                                     style="width:auto; height:56px" class="m-b-2" alt="iOS appstore button"></a>
                            <a href="#"
                               target="_blank">
                                <img src="{{url('asset')}}/images/btn_download_playstore_en_US.png"
                                     style="width:auto; height:56px" class="m-b-2" alt="Android playstore button"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
        <!-- Modal -->
    @if(isset($admin_notice))
    <div class="modal fade" id="admin_notice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="col-sm-10 modal-title" id="exampleModalLongTitle"><i
                                    class="fa fa-flag"></i> {{$admin_notice->title}}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{!! $admin_notice->details !!}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

@stop
@section('script')
    <script src="//cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js" type="text/javascript"></script>
    <script>
        $('.marquee').marquee({
            //duration in milliseconds of the marquee
            duration: 20000,
            //gap in pixels between the tickers
            gap: 300,
            //time in milliseconds before the marquee will start animating
            delayBeforeStart: 0,
            //'left' or 'right'
            direction: 'left',
            //true or false - should the marquee be duplicated to show an effect of continues flow
            duplicated: true,
            pauseOnHover: true
        });
    </script>

    <script type="text/javascript">
        function textareaMaxLength() {
            $('textarea[maxlength]').keyup(function () {
                var max = parseInt($(this).attr('maxlength'));
                if ($(this).val().length > max) {
                    $(this).val($(this).val().substr(0, $(this).attr('maxlength')));
                }
                $(this).parent().find('.charsRemaining').html('You have ' + (max - $(this).val().length) + ' characters remaining');

            });
        }

        textareaMaxLength();
    </script>
@stop