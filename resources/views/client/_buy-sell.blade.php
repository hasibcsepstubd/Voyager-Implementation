@extends('client.master')
@section('title','Buy-Sell & Exchange')
@section('style')
    <style>
        h3.user_name_top {
            position: absolute;
            right: 7%;
            font-size: 18px;
            color: #fff;
            text-shadow: 0 0 5px #000;
            font-weight: bold;
        }

        .new-custon-class1 {
            background: #36274C;
            padding: 20px;
        }

        .new-custon-class1 h3 {
            margin-top: 10px;
        }

        .new-custon-class1 img {

        }

        #auto-hide2 {
            visibility: hidden;
            position: absolute;
        }

        .buy form {
            margin-top: 0;
        }

        #next, #previous {
            display: block;
            float: right;
            padding-right: 30px;
            text-decoration: none;
            color: #f00;
            font-size: 16px;
        }

        #previous {
            float: left;
        }

        .custom_message div.alert {
            margin-top: -15px !important;
        }

        .custom_message h3 {
            text-align: center;
            margin-top: 0;
        }

        .custom_message p {
            color: #8A6D3B;
            background: none;
            padding: 0;
            margin-bottom: 0;
            font-weight: normal;
            font-size: 16px;
        }

        .hide {

            display: none !important;

        }
    </style>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h5 class="page-header text-uppercase alt-font text-gray font-weight-600 padding-30px-left">Buy, Sell &
                Exchange</h5>
        </div>
    </div>
    {{--<section id="contact_us" class="wow fadeIn bg-extra-dark-gray" style="visibility: visible; animation-name: fadeIn;">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-6 padding-ten-right md-padding-five-right sm-padding-15px-right sm-margin-five-bottom wow fadeIn"--}}
    {{--style="visibility: visible; animation-name: fadeIn;">--}}
    {{--<p class="alt-font text-medium margin-15px-bottom">Technology expert people analysis</p>--}}
    {{--<h5 class="alt-font text-white margin-20px-bottom">Feel free to get in touch with us any convenient--}}
    {{--way</h5>--}}
    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been--}}
    {{--the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley--}}
    {{--of type and scrambled it to make a type specimen book.</p>--}}
    {{--<div class="icon-box width-100 sm-margin-lr-auto xs-width-100 last-paragraph-no-margin">--}}
    {{--<div class="icon-box-holder vertical-align-middle display-table-cell position-relative">--}}
    {{--<i class="icon-map icon-medium text-deep-pink padding-5px-top"></i>--}}
    {{--<div class="alt-font text-white">Postal Address</div>--}}
    {{--<p>301 The Greenhouse, Custard, Factory, London, E2 8DY.</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="icon-box width-100 sm-margin-lr-auto xs-width-100 last-paragraph-no-margin">--}}
    {{--<div class="icon-box-holder vertical-align-middle display-table-cell position-relative">--}}
    {{--<i class="icon-envelope icon-medium text-deep-pink padding-5px-top"></i>--}}
    {{--<div class="alt-font text-white">General Enquiries</div>--}}
    {{--<p><a href="mailto:no-reply@domain.com"> no-reply@domain.com</a> / <a--}}
    {{--href="mailto:sales@domain.com">sales@domain.com</a></p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="icon-box width-100 sm-margin-lr-auto xs-width-100 last-paragraph-no-margin">--}}
    {{--<div class="icon-box-holder vertical-align-middle display-table-cell position-relative">--}}
    {{--<i class="icon-chat icon-medium text-deep-pink padding-5px-top"></i>--}}
    {{--<div class="alt-font text-white">Business Phone</div>--}}
    {{--<p>+44 (0) 123 456 7890 / +44 (0) 123 456 700</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-6 wow fadeIn" style="visibility: visible; animation-name: fadeIn;">--}}
    {{--<div class="padding-fifteen-all bg-white border-radius-6 md-padding-seven-all">--}}
    {{--<div class="text-extra-dark-gray alt-font text-large font-weight-600 margin-30px-bottom">Looking--}}
    {{--for an excellent business idea?--}}
    {{--</div>--}}
    {{--<div>--}}
    {{--<form id="contact-form" action="javascript:void(0)" method="post">--}}
    {{--<div id="success-contact-form" class="no-margin-lr" style="display: none;"></div>--}}
    {{--<input name="name" id="name" placeholder="Name*" class="input-bg" type="text">--}}
    {{--<input name="email" id="email" placeholder="E-mail*" class="input-bg" type="text">--}}
    {{--<input name="subject" id="subject" placeholder="Subject" class="input-bg" type="text">--}}
    {{--<textarea name="comment" id="comment" placeholder="Your Message"--}}
    {{--class="input-bg"></textarea>--}}
    {{--<button id="contact-us-button" type="submit"--}}
    {{--class="btn btn-small border-radius-4 btn-black">send message--}}
    {{--</button>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}

    <div id="" class="wow fadeIn bg-white padding-30px-top" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p style="background:#fff;color:#000;font-weight:normal;font-size:16px;text-align:left;left;padding:15px 20px 12px;">
                        <b>নোটিশ</b><br> Coinbase ছাড়া অন্য ওয়ালেটে BTC BUY করার ক্ষেত্রে ট্রানজেকশন ফি আপনার এবং
                        নুন্যতম 20$ । Coinbase এর BUY করার ক্ষেত্রে মেইল দিয়ে রিকুয়েষ্ট সাবমিট করবেন।Payza BUY করার
                        ক্ষেত্রে ট্রানজেকশন ফি আপনার । Skrill / Neteller 30 $ নিচে BUY করার ক্ষেত্রে ট্রানজেকশন ফি 0.60$
                        আপনার ।
                        এই সাইটটি শুধুমাত্র বাংলাদেশী ফ্রিলেন্সারগণের জন্য তাই দেশের বাইরে টাকা বা ডলার প্রদান করা হয়
                        না। </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div style="background:#fff;color:#000;font-weight:normal;font-size:16px;text-align:left;padding:15px 20px 12px;">
                        <form action="https://tdbsewallet.com/subscriber/validation/buy_validation" method="post"
                              accept-charset="utf-8" style="min-height: 380px;" name="converter">
                            <div class="custom_message" style="display: none;">
                            </div>

                            <div id="auto-hide1" style="visibility: visible;">

                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Send</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-2"><img
                                                    src="https://tdbsewallet.com/public/images/icon/bKash.jpg"
                                                    id="img-buy"></div>
                                        <div class="col-md-10">
                                            <select id="select-buy" name="send_payment_method">
                                                <option value="bKash">bKash</option>
                                                <option value="brac_bank">BRAC Bank</option>
                                                <option value="dbbl_mobile_banking">DBBL</option>
                                            </select>
                                        </div>

                                    </div>


                                    <div class="col-md-4">
                                        <input step="any" name="send_money" placeholder="Amount BDT "
                                               type="number">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Receive</label>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="col-md-2">
                                            <img src="https://tdbsewallet.com/public/images/icon/neteller.jpg"
                                                 id="img-buy2">
                                        </div>
                                        <div class="col-md-10">
                                            <select id="select-buy2" name="receive_payment_method">
                                                <option value="payza">Payza</option>
                                                <option value="skrill">Skrill</option>
                                                <option value="perfect_money">Perfect Money</option>
                                                <option value="bit_coin">Coinbase</option>
                                                <option value="neteller">Neteller</option>
                                                <!--option value="dashcoin">Dashcoin</option>
                                                <option value="dogecoin">Dogecoin</option-->
                                                <option value="litecoin">Litecoin</option>
                                                <option value="ethereum">Ethereum</option>
                                                <!--option value="payoneer">Payoneer</option-->
                                            </select>
                                            <input name="amount" value="82.5" type="hidden">
                                            <input name="rate" value="0.0199" type="hidden">
                                            <input name="send_rate" value="0.02" type="hidden">
                                        </div>


                                    </div>
                                    <div class="col-md-4">
                                        <input step="any" name="receive_dolar" min="5" placeholder="Amount USD"
                                               type="number" readonly disabled="">
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="auto-btn1" style="display: block;">
                                <div class="col-md-12">
                                    <b style="padding-left: 45%;">Minimum $5</b><a href="#"
                                                                                   class="btn btn-white text-link-deep-pink btn-medium"
                                                                                   id="next">Next <i
                                                class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div id="auto-hide2" style="visibility: hidden; position: absolute;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="#" class="btn btn-white text-link-deep-pink btn-medium" id="previous"
                                           style="display: block;padding-top: 8px; padding-left: 0px!important;"><i
                                                    class="fa fa-arrow-left" aria-hidden="true"></i> Previous</a>
                                    </div>
                                </div>
                                <div class="row" id="auto-btn2"
                                ">
                                <div class="col-md-12">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">
                                        <h3 id="bkash_text" class="hide"
                                            style="color: red;font-size: 19px;margin-bottom: -5px;margin-top: 11px; padding-left: 0px!important;">
                                            নিচের
                                            bKash নাম্বারে টাকা পাঠানোর পর Submit Button-এ ক্লিক করুন ।</h3>

                                        <h3 id="bank_text" class="hide"
                                            style="color: red;font-size: 19px;margin-bottom: -5px;margin-top: 11px;  padding-left: 0px!important;">
                                            নিচের
                                            Account নাম্বারে টাকা পাঠানোর পর Submit Button-এ ক্লিক করুন ।</h3>

                                        <h3 id="dbbl_text" class="hide"
                                            style="color: red;font-size: 19px;margin-bottom: -5px;margin-top: 11px; padding-left: 0px!important;">
                                            নিচের
                                            DBBL Mobile নাম্বারে টাকা পাঠানোর পর Submit Button-এ ক্লিক করুন ।</h3>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="bkash_id" class="row hide">
                                                <div class="col-md-12">
                                                    <div class="col-md-offset-3 col-md-9"
                                                         style="margin-bottom: 30px;">
                                                        <!--p>Cashout To: 01750148858 (Agent Number)</p-->
                                                        Cashout From : 01750148858 (Agent Number)
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="bank_id" class="row hide">
                                                <div class="col-md-12">
                                                    <div class="col-md-offset-3 col-md-9"
                                                         style="margin-bottom: 30px;">
                                                        <p>Send Payment to Brac Bank's Account<br>Account
                                                            :6501103622772001
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="dbbl_id" class="row hide">
                                                <div class="col-md-offset-3 col-md-9" style="margin-bottom: 30px;">
                                                    <p>Cashout Payment to DBBL Account<br>Account : 01750 148854-7
                                                    </p>
                                                </div>
                                            </div>


                                            <div id="bkash1" class="">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label style="font-size:16px !important;font-weight:normal;">bKash
                                                            Mobile No</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input name="bkash" placeholder="bKash Mobile No"
                                                               style="width:95%;" minlength="11" maxlength="11"
                                                               type="number">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label style="font-size:16px !important;font-weight:normal;">bKash
                                                            Trx ID .</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input class="form-control" name="reference_no"
                                                               placeholder="bKash Trx ID."
                                                               style="height:38px; width:95%;" type="text">
                                                    </div>
                                                </div>

                                            </div>


                                            <div id="bank1" class="row hide">
                                                <div class="col-md-3">
                                                    <label style="font-size:16px !important;font-weight:normal;">Bank
                                                        Account No.</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="bank_acc_no"
                                                           placeholder="Bank Account No"
                                                           style="height:38px; width:95%;"
                                                           type="text">
                                                </div>
                                            </div>


                                            <div id="dbbl" class="row hide">
                                                <div class="col-md-3">
                                                    <label style="font-size:16px !important;font-weight:normal;">DBBL
                                                        Account No.</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="dbbl"
                                                           placeholder="DBBL Account No"
                                                           style="height:38px; width:95%;"
                                                           type="text">
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label style="font-size:16px !important;font-weight:normal;">Enter
                                                        Your <b id="method_name">neteller</b>&nbsp;<b
                                                                style="font-weight:normal;font-size:16px;"
                                                                id="m_id">Email</b></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input class="form-control hide" id="id_1" name="email"
                                                           placeholder="Enter Account ID"
                                                           style="height:38px; border:1px solid #ddd;width:95%;"
                                                           type="email">
                                                    <input class="form-control" id="id_2" name="email"
                                                           placeholder="Enter Account Email"
                                                           style="height:38px; border:1px solid #ddd;width:95%;"
                                                           type="email">
                                                    <input name="acc_id_or_email" id="acc_id_or_email"
                                                           type="hidden">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-offset-3 col-md-9">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    {{--<input name="accept_terms" value="1" checked="" type="checkbox">--}}
                                                    <label>
                                                        I agree to the terms of Service and Privacy Policy
                                                    </label>
                                                </div>
                                            </div>

                                            <input name="buy_info" value="0" type="hidden">

                                            <div class="col-md-12" style="margin-top: 10px;">
                                                <div class="row">
                                                    <input name="submit" value="Submit"
                                                           class="btn btn-small border-radius-4 btn-deep-pink"
                                                           type="submit">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    {{--<section>--}}
    {{--<div class="section">--}}
    {{--<div class="row" id="bit_exchange_box">--}}
    {{--<div id="bit_exchange_results"></div>--}}
    {{--<form id="bit_exchange_form">--}}
    {{--<div class="col-md-6">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-3 hidden-xs hidden-sm">--}}
    {{--<div style="margin-top:50px;">--}}
    {{--<img src="https://robikex.com/uploads/1513572726_icon.png" id="bit_image_send"--}}
    {{--class="img-circle img-bordered" width="72px" height="72px">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-9">--}}
    {{--<h3><i class="fa fa-arrow-down"></i> Send</h3>--}}
    {{--<div class="form-group">--}}
    {{--<select class="form-control form_style_1 input-lg" id="bit_gateway_send"--}}
    {{--name="bit_gateway_send" onchange="bit_refresh('1');">--}}
    {{--<option value="30" selected="">DBBL Rocket BDT</option>--}}
    {{--<option value="31">Litecoin (coinbase) USD</option>--}}
    {{--<option value="32">Ethereum (coinbase) USD</option>--}}
    {{--<option value="33">Bitcoin (coinbase) USD</option>--}}
    {{--<option value="36">Bkash BDT</option>--}}
    {{--<option value="37">Dogecoin- USD</option>--}}
    {{--</select>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<input class="form-control form_style_1 input-lg" id="bit_amount_send"--}}
    {{--name="bit_amount_send" value="0" onkeyup="bit_calculator();"--}}
    {{--onkeydown="bit_calculator();" type="text">--}}
    {{--</div>--}}
    {{--<div class="text text-muted pull-right" style="padding-bottom:10px;font-weight:bold;">--}}
    {{--Exchange rate: <span id="bit_exchange_rate">1 USD = 0.9 USD</span></div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-6">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-9">--}}
    {{--<h3><i class="fa fa-arrow-up"></i> Receive</h3>--}}
    {{--<div class="form-group">--}}
    {{--<select class="form-control form_style_1 input-lg" id="bit_gateway_receive"--}}
    {{--name="bit_gateway_receive" onchange="bit_refresh('2');">--}}
    {{--<option value="30">DBBL Rocket BDT</option>--}}
    {{--<option value="31" selected="">Litecoin (coinbase) USD</option>--}}
    {{--<option value="32">Ethereum (coinbase) USD</option>--}}
    {{--<option value="33">Bitcoin (coinbase) USD</option>--}}
    {{--<option value="36">Bkash BDT</option>--}}
    {{--<option value="37">Dogecoin- USD</option>--}}
    {{--<option value="38">Bitcoin cash (Coinbase) USD</option>--}}
    {{--</select>--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<input class="form-control form_style_1 input-lg" id="bit_amount_receive"--}}
    {{--name="bit_amount_receive" disabled="" value="0" type="text">--}}
    {{--</div>--}}
    {{--<div class="text text-muted" style="padding-bottom:10px;font-weight:bold;">Reserve:--}}
    {{--<span id="bit_reserve">00 USD</span></div>--}}
    {{--</div>--}}
    {{--<div class="col-md-3 hidden-xs hidden-sm">--}}
    {{--<div style="margin-top:50px;">--}}
    {{--<img src="https://robikex.com/uploads/1514429689_icon.jpg" id="bit_image_receive"--}}
    {{--class="img-circle img-bordered" width="72px" height="72px">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-12">--}}
    {{--<input name="bit_amount_receive" id="bit_amount_receive2" value="0.9" type="hidden">--}}
    {{--<input name="bit_rate_from" id="bit_rate_from" value="1" type="hidden">--}}
    {{--<input name="bit_rate_to" id="bit_rate_to" value="0.9" type="hidden">--}}
    {{--<input name="bit_currency_from" id="bit_currency_from" value="USD" type="hidden">--}}
    {{--<input name="bit_currency_to" id="bit_currency_to" value="USD" type="hidden">--}}
    {{--<input id="bit_login_to_exchange" name="bit_login_to_exchange" value="1" type="hidden">--}}
    {{--<input id="bit_ses_uid" name="bit_ses_uid" value="0" type="hidden">--}}
    {{--<center>--}}
    {{--<button type="button" class="btn btn-primary btn-lg" onclick="bit_exchange_step_1();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i--}}
    {{--class="fa fa-refresh"></i> Exchange&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--}}
    {{--</button>--}}
    {{--</center>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</section>--}}

@stop
@section('script')
    <script>
        $(document).ready(function () {

            var x = $('input[name="buy_info"]').val();


//             if(x>=100){
//                 $('input[name="submit"]').attr('disabled','disabled');
//             }


            $('#next').click(function () {
                $('#auto-hide1').css('visibility', 'hidden');
                $('#auto-hide2').css('visibility', 'visible');
                $('#auto-hide2').css('position', 'absolute');
                $('#auto-hide2').css('top', '10px');
                $('#auto-btn1').css('display', 'none');
                $('.buy form').css('min-height', '100px');
                $('.custom_message').css('display', 'none');


            });
            $('#previous').click(function () {
                $('#auto-hide1').css('visibility', 'visible');
                $('#auto-hide2').css('visibility', 'hidden');
                $('#auto-btn1').css('display', 'block');
                $('.buy form').css('min-height', '380px');
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            var cond = {'payment_method': 'payza'};
            $.ajax({
                url: 'https://tdbsewallet.com/ajax/retrieveBy/buy_rate',
                type: 'POST',
                data: 'condition=' + JSON.stringify(cond)
            }).done(function (response) {
                var obj = $.parseJSON(response)[0];
                $('input[name="amount"]').val(obj.amount);
            });


            // set charge rate
            var cond1 = {'payment_method': 'payza'};
            $.ajax({
                url: 'https://tdbsewallet.com/ajax/retrieveBy/charge_rate',
                type: 'POST',
                data: 'condition=' + JSON.stringify(cond1)
            }).done(function (response) {
                var obj1 = $.parseJSON(response)[0],
                    rate = ((obj1.amount) / 100);
                console.log(rate);
                $('input[name="rate"]').val(rate);
            });


            // set send charge rate
            var cond2 = {'payment_method': 'bkash'};
            $.ajax({
                url: 'https://tdbsewallet.com/ajax/retrieveBy/charge_rate',
                type: 'POST',
                data: 'condition=' + JSON.stringify(cond2)
            }).done(function (response) {
                var obj2 = $.parseJSON(response)[0],
                    rate2 = ((obj2.amount) / 100);
                console.log(rate2);
                $('input[name="send_rate"]').val(rate2);
            });


            $('#m_id').html("Email");
            $('input#id_1').addClass('hide');
            $('input#id_2').removeClass('hide');


            $('input[name="receive_dolar"]').on('keyup', function () {


                var cond = {'payment_method': $('select[name="receive_payment_method"]').val()},
                    x = parseFloat($(this).val()),
                    method = $('select[name="receive_payment_method"]').val(),
                    total = 0,
                    xx = 0;
                //alert(method);

                $.ajax({
                    url: 'https://tdbsewallet.com/ajax/retrieveBy/buy_rate',
                    type: 'POST',
                    data: 'condition=' + JSON.stringify(cond)
                }).done(function (response) {
                    var obj = $.parseJSON(response)[0];
                    console.log(obj);
                    // $('input[name="amount"]').val(obj.amount);

                    var y = parseFloat(obj.amount);

                    // set charge rate
                    var cond1 = {'payment_method': method};
                    $.ajax({
                        url: 'https://tdbsewallet.com/ajax/retrieveBy/charge_rate',
                        type: 'POST',
                        data: 'condition=' + JSON.stringify(cond1)
                    }).done(function (response) {
                        var obj1 = $.parseJSON(response)[0],
                            rate = ((obj1.amount) / 100);
                        console.log(rate);
                        $('input[name="rate"]').val(rate);
                    });


                    // set send charge rate
                    var send_payment = $('select[name="send_payment_method"]').val();
                    var cond2 = {'payment_method': send_payment};
                    $.ajax({
                        url: 'https://tdbsewallet.com/ajax/retrieveBy/charge_rate',
                        type: 'POST',
                        data: 'condition=' + JSON.stringify(cond2)
                    }).done(function (response) {
                        var obj2 = $.parseJSON(response)[0],
                            rate2 = ((obj2.amount) / 100);
                        console.log(rate2);
                        $('input[name="send_rate"]').val(rate2);
                    });

                    // end


                    var rate1 = parseFloat($('input[name="rate"]').val()),
                        s_rate = parseFloat($('input[name="send_rate"]').val()),
                        total_rate = rate1 + s_rate;
                    console.log('Total Rate=' + total_rate);

                    if (total_rate != 0.0) {
                        xx = (x + (x * total_rate));
                        total = (xx * y).toFixed(3);
                    }


                    /*if(method=="perfect_money" || method=="skrill" || method=="neteller"){
                        xx = (x+(x*0.0199));
                        total=(xx*y).toFixed(3);
                    }

                                else if(method=="payza"){

                                // set charge rate
                    var cond1 = {'payment_method': method};
                    $.ajax({
                        url: 'https://tdbsewallet.com/ajax/retrieveBy/charge_rate',
                        type: 'POST',
                        data: 'condition='+ JSON.stringify(cond1)
                       }).done(function(response){
                        var obj1 = $.parseJSON(response)[0],
                             rate=((obj1.amount)/100);
                             console.log(rate);
                             $('input[name="rate"]').val(rate);
                       });

                             // end

                                var rate1=$('input[name="rate"]').val();
                        xx = (x+(x*rate1));
                            total=(xx*y).toFixed(3);
                    }*/

                    else {
                        total = (x * y).toFixed(3);
                    }


                    $('input[name="send_money"]').val(total);
                    console.log("X=" + x + "Y=" + y + "method=" + method + "total=" + total);
                });
            });

            $(document.body).on('change', 'select[name="receive_payment_method"]', function () {
                var cond = {'payment_method': $(this).val()},
                    method = $(this).val(),
                    total = 0,
                    xx = 0;

                $.ajax({
                    url: 'https://tdbsewallet.com/ajax/retrieveBy/buy_rate',
                    type: 'POST',
                    data: 'condition=' + JSON.stringify(cond)
                }).done(function (response) {
                    var obj = $.parseJSON(response)[0];
                    // $('input[name="amount"]').val(obj.amount);
                    var x = parseFloat($('input[name="receive_dolar"]').val()),
                        y = parseFloat(obj.amount);

                    // set charge rate
                    var cond1 = {'payment_method': $('select[name="receive_payment_method"]').val()};

                    $.ajax({
                        url: 'https://tdbsewallet.com/ajax/retrieveBy/charge_rate',
                        type: 'POST',
                        data: 'condition=' + JSON.stringify(cond1)
                    }).done(function (response) {
                        var obj1 = $.parseJSON(response)[0],
                            rate = ((obj1.amount) / 100);
                        console.log(rate);
                        $('input[name="rate"]').val(rate);

                        // set send charge rate
                        var send_payment = $('select[name="send_payment_method"]').val();
                        var cond2 = {'payment_method': send_payment};
                        $.ajax({
                            url: 'https://tdbsewallet.com/ajax/retrieveBy/charge_rate',
                            type: 'POST',
                            data: 'condition=' + JSON.stringify(cond2)
                        }).done(function (response) {
                            var obj2 = $.parseJSON(response)[0],
                                rate2 = ((obj2.amount) / 100);
                            console.log(rate2);
                            $('input[name="send_rate"]').val(rate2);
                        });

                        // end


                        var rate1 = parseFloat($('input[name="rate"]').val()),
                            s_rate = parseFloat($('input[name="send_rate"]').val()),
                            total_rate = rate1 + s_rate;
                        console.log('Total Rate=' + total_rate);

                        if (total_rate != 0.0) {
                            xx = (x + (x * total_rate));
                            total = (xx * y).toFixed(3);
                        } else {
                            total = (x * y).toFixed(3);
                        }

                        $('input[name="send_money"]').val(total);
                    });

                    // end


                    /*if(method=="perfect_money" || method=="skrill" || method=="neteller"){
                        xx = (x+(x*0.0199));
                        total=(xx*y).toFixed(3);
                    }else if(method=="payza"){

                                // set charge rate
                    var cond1 = {'payment_method': 'payza'};
                    $.ajax({
                        url: 'https://tdbsewallet.com/ajax/retrieveBy/charge_rate',
                        type: 'POST',
                        data: 'condition='+ JSON.stringify(cond1)
                       }).done(function(response){
                        var obj1 = $.parseJSON(response)[0],
                             rate=((obj1.amount)/100);
                             console.log(rate);
                             $('input[name="rate"]').val(rate);
                       });

                             // end


                    }
                    */


                    console.log("X=" + x + "Y=" + y + "method=" + method + "total=" + total);
                });
                var m = method.replace(/_/g, ' ');
                if (method == 'perfect_money') {
                    $('#method_name').html('PM');
                    $('#m_id').html("ID");
                    $('input#id_1').removeClass('hide');
                    $('input#id_2').addClass('hide');
                } else if (method == 'bit_coin') {
                    $('#method_name').html(m);
                    $('#m_id').html("ID");
                    $('input#id_1').removeClass('hide');
                    $('input#id_2').addClass('hide');
                } else if (method == 'litecoin') {
                    $('#method_name').html("Litecoin");
                    $('#m_id').html("ID");
                    $('input#id_1').removeClass('hide');
                    $('input#id_2').addClass('hide');
                } else if (method == 'ethereum') {
                    $('#method_name').html("Ethereum");
                    $('#m_id').html("ID");
                    $('input#id_1').removeClass('hide');
                    $('input#id_2').addClass('hide');
                } else {
                    $('#method_name').html(m);
                    $('#m_id').html("Email");
                    $('input#id_1').addClass('hide');
                    $('input#id_2').removeClass('hide');
                }
            });

            $('input[name="email"]').on('blur', function () {
                var acc_id = $(this).val();
                $('input[name="acc_id_or_email"]').val(acc_id);
            });


            $('div#bkash_id').removeClass('hide');
            $('div#bank_id').addClass('hide');
            $('div#dbbl_id').addClass('hide');

            $('div#bkash1').removeClass('hide');
            $('div#bank1').addClass('hide');
            $('div#dbbl').addClass('hide');

            $('h3#bkash_text').removeClass('hide');
            $('h3#bank_text').addClass('hide');
            $('h3#dbbl_text').addClass('hide');


            $('select[name="send_payment_method"]').on('change', function () {
                var method = $(this).val();

                if (method == 'baksh') {
                    $('div#bkash_id').removeClass('hide');
                    $('div#bank_id').addClass('hide');
                    $('div#dbbl_id').addClass('hide');

                    $('div#bkash1').removeClass('hide');
                    $('div#bank1').addClass('hide');
                    $('div#dbbl').addClass('hide');

                    $('h3#bkash_text').removeClass('hide');
                    $('h3#bank_text').addClass('hide');
                    $('h3#dbbl_text').addClass('hide');
                }
                if (method == 'brac_bank') {
                    $('div#bkash_id').addClass('hide');
                    $('div#bank_id').removeClass('hide');
                    $('div#dbbl_id').addClass('hide');

                    $('div#bkash1').addClass('hide');
                    $('div#bank1').removeClass('hide');
                    $('div#dbbl').addClass('hide');

                    $('h3#bkash_text').addClass('hide');
                    $('h3#bank_text').removeClass('hide');
                    $('h3#dbbl_text').addClass('hide');
                }

                if (method == 'dbbl_mobile_banking') {
                    $('div#bkash_id').addClass('hide');
                    $('div#bank_id').addClass('hide');
                    $('div#dbbl_id').removeClass('hide');

                    $('div#bkash1').addClass('hide');
                    $('div#bank1').addClass('hide');
                    $('div#dbbl').removeClass('hide');

                    $('h3#bkash_text').addClass('hide');
                    $('h3#bank_text').addClass('hide');
                    $('h3#dbbl_text').removeClass('hide');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            var target = $('#menu').data('target');
            $('#' + target).addClass('active');

            $('#select-buy').on('change', function () {
                var x = $(this).val();
                $('#img-buy').attr('src', "https://tdbsewallet.com/public/images/icon/" + x + ".jpg");
            });
            $('#select-buy2').on('change', function () {
                var x2 = $(this).val();
                $('#img-buy2').attr('src', "https://tdbsewallet.com/public/images/icon/" + x2 + ".jpg");
            });
        });
        }
    </script>
    <script>
        $(document).ready(function () {

            $('#submit').click(function () {

                //Get the values
                var amount = $('#amount').val();
                var from = $('#from').val();
                var to = $('#to').val();

                var params = "amount=" + amount + "&amp;amp;from=" + from + "&amp;amp;to=" + to;

                $.ajax({
                    type: "POST",
                    url: "convert.php",
                    data: params,
                    success: function (data) {
                        $('#results').html(data);
                    }
                });
            });
        });
    </script>
@stop