@section('nav')
    <!-- start navigation -->
    <nav class="navbar no-margin-bottom bootsnav alt-font bg-white sidebar-nav sidebar-nav-style-1">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="col-md-12 col-sm-12 col-xs-12 sidenav-header">
            <!-- start logo -->
            <div class="logo-holder" style="margin-top: -20px; padding-bottom: 5px;">
                <a class=" hidden-sm hidden-xs" href="{{url('/public/home')}}" class="display-inline-block logo"><img
                            alt="Moneybagbd" width="52px" hight="52px"
                            src="{{asset('asset')}}/images/logo.png"
                            data-at2x="{{asset('asset')}}/images/logo.png"></a>
                <p>Money Bag BD</p>
            </div>
            <!-- end logo -->
            <button class="navbar-toggle mobile-toggle" type="button" id="mobileToggleSidenav">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12 no-padding-lr">
            <div id="navbar-menu" class="collapse navbar-collapse no-padding">
                <ul class="nav navbar-nav navbar-left-sidebar font-weight-600">
                    <li class="dropdown">
                        <a class="nav-link js-scroll-trigger" href="#home">Home<i
                                    class="fa fa-angle-right pull-right"></i></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link js-scroll-trigger" href="#buy_sell_exchange">Buy, Sell & Exchange<i
                                    class="fa fa-angle-right"></i></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link js-scroll-trigger" href="{{url('/public/payment-proof')}}">Payment Proof<i
                                    class="fa fa-angle-right"></i></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link js-scroll-trigger" href="#notice">Notice<i class="fa fa-angle-right"></i></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link js-scroll-trigger" href="#about_us">About us<i class="fa fa-angle-right"></i></a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link js-scroll-trigger" href="#testimonial">Testimonial<i class="fa fa-angle-right"></i></a>
                    </li>
                    @if(Auth::check()=='true')
                        <li class="dropdown">
                            <a class="nav-link js-scroll-trigger" style="color: limegreen"
                               href="{{url('/client/dashboard')}}">Dashboard<i
                                        class="fa fa-angle-right"></i></a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a class="nav-link js-scroll-trigger" href="{{url('/public/login')}}">Sign-in<i
                                        class="fa fa-angle-right"></i></a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
        <div class="col-md-12 position-absolute top-auto bottom-0 left-0 width-100 padding-20px-bottom xs-padding-15px-bottom">
            <div class="footer-holder">
                <div class="social-icon-style-8 text-center margin-eleven-bottom padding-eight-top xs-padding-15px-top xs-margin-15px-bottom">
                    <ul class="small-icon no-margin-bottom">
                        <li><a href="https://www.facebook.com/BestDollarBuySell/" target="_blank" rel="noopener"
                               class="text-extra-dark-gray"><i
                                        class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://twitter.com/" target="_blank" rel="noopener"
                               class="text-extra-dark-gray"><i
                                        class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        {{--<li><a href="https://dribbble.com/" target="_blank" class="text-extra-dark-gray"><i--}}
                        {{--class="fa fa-dribbble" aria-hidden="true"></i></a></li>--}}
                        <li><a href="https://plus.google.com/" target="_blank" rel="noopener"
                               class="text-extra-dark-gray"><i
                                        class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="text-medium-gray text-extra-small border-top border-color-extra-light-gray padding-twelve-top xs-padding-15px-top">
                    &COPY; 2018 MONEYBAGBD.COM
                </div>
            </div>
        </div>
    </nav>
    <!-- end navigation -->
@endsection