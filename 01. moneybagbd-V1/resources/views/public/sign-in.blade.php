@extends('public.master')
@section('title','Sign-in')
@section('style')
    <style>
        section.big-section {
            padding: 30px 0 !important;
        }

        /*footer {*/
        /*position: absolute;*/
        /*right: 0;*/
        /*left: 290px;*/
        /*bottom: 0;*/
        /*background-color: #efefef;*/

        /*}*/
    </style>
@stop
@include('public.nav-2')
@section('content')

    <h3 class="alt-font text-gra font-weight-600 vertical-align-middle text-center margin-25px-top">Sign-in</h3>

    <section class="wow fadeIn big-section" id="section-down" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row equalize sm-equalize-auto">
                <div class="col-md-6 col-sm-12 col-xs-12 sm-margin-30px-bottom wow fadeInLeft"
                     style="visibility: visible; animation-name: fadeInLeft; height: 608px;">
                    <div class="padding-fifteen-all bg-light-gray border-radius-6 md-padding-seven-all xs-padding-30px-all height-100">
                        <span class="text-extra-dark-gray alt-font text-large font-weight-600 margin-25px-bottom display-block">Ready to get started?</span>
                        <form id="contact-form" action="javascript:void(0)" method="post">
                            <div>
                                <div id="success-contact-form" class="no-margin-lr" style="display: none;"></div>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <input name="login_email" id="login_email" placeholder="email*"
                                           class="border-radius-4 bg-white medium-input" type="text" required>
                                    <input name="login_password" id="login_password" placeholder="Password*"
                                           class="border-radius-4 bg-white medium-input" type="password" required>
                                    <button id="login" type="submit"
                                            class="btn btn-small border-radius-4 btn-deep-pink">
                                        Login
                                    </button>
                                    <a href="{{ url('public/forget-password') }}" class="text-underline pull-right">Forget
                                        password</a>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 col-xs-12 last-paragraph-no-margin wow fadeInRight"
                     style="visibility: visible; animation-name: fadeInRight; height: 608px;">
                    <div class="padding-fifteen-all bg-light-gray border-radius-6 md-padding-seven-all xs-padding-30px-all height-100">
                        <span class="text-extra-dark-gray alt-font text-large font-weight-600 margin-25px-bottom display-block">If you are new in this site please register.</span>
                        <form id="contact-form" action="javascript:void(0)" method="post">
                            <div>
                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                    <div id="success-contact-form" class="no-margin-lr" style="display: none;"></div>
                                    <input name="name" id="name" placeholder="Name*"
                                           class="border-radius-4 bg-white medium-input" type="text" required>
                                    <input name="email" id="email" placeholder="E-mail*"
                                           class="border-radius-4 bg-white medium-input" type="mail" required>
                                    <input name="mobile" id="mobile" placeholder="Mobile"
                                           class="border-radius-4 bg-white medium-input" maxlength="11" type="number"
                                           required>
                                    <input name="password" id="password" placeholder="Password"
                                           class="border-radius-4 bg-white medium-input" type="password" required>
                                    <input name="confirm_password" id="confirm_password" placeholder="Confirm Password"
                                           class="border-radius-4 bg-white medium-input" type="password" required>
                                    <button id="contact-us-button" type="submit"
                                            class="btn btn-small border-radius-4 btn-deep-pink">Register
                                    </button>
                                    <form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('script')
@stop