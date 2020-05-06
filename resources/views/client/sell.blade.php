@extends('client.master')
@section('title','Buy-Sell & Exchange')
@section('style')
@stop
@section('content')
    <?php $home_info = \App\Home::select('max_order','min_order')->firstOrFail();?>
    <div class="col-sm-12 page-header bg-light-gray">
        <div class="col-sm-6">
            <h5 style="margin-bottom: 0px;" class="animated fadeInDown text-uppercase alt-font text-gray font-weight-600 padding-30px-left padding-10px-top">
                Sell</h5>
        </div>
        <div class="col-sm-6">
            <div class="animated fadeInDown text-uppercase alt-font text-gray font-weight-600 padding-15px-right padding-30px-top float-right">
                <span style="color:red">Welcome,</span> {{Auth::user()->name}}</div>
        </div>
    </div>

    <div class="wow fadeInUp bg-white padding-0px-top bg-light-gray" style="visibility: hidden; animation-name: fadeInUp;">
        @if(isset($notice))
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ">
                        {!! $notice->details !!}
                    </div>
                </div>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> Transaction <span style="padding-left:150px;">(Maximum Order {{$home_info->max_order}}$ )</span>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body bg-light-gray">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-horizontal" method="POST"
                                              action="{{ url('/client/transection') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <label for="send" class="col-md-4 control-label">Send*</label>

                                                <div class="col-md-7">
                                                    <select class="form-control" id="send" name="send">
                                                        @if(isset($rates))
                                                            @foreach($rates as $rate)
                                                                <option data-sell="{{$rate->sell}}"
                                                                        data-buy="{{$rate->buy}}"
                                                                        data-id="{{$rate->id}}"
                                                                        value="{{$rate->curency_name}}">{{$rate->curency_name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="ammount" class="col-md-4 control-label">Sending
                                                    Amount*</label>

                                                <div class="col-md-7">
                                                    <input class="form-control" step="any" name="send_amount"
                                                           placeholder="Amount" max="{{$home_info->max_order}}" min ="{{$home_info->min_order}}"
                                                           onchange="validateNum(this);" type="number">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="received" class="col-md-4 control-label">Receive*</label>

                                                <div class="col-md-7">
                                                    <select class="form-control" id="received" name="received">
                                                        @if(isset($receives))
                                                            @foreach($receives as $receive)
                                                                <option data-sell="{{$receive->sell}}"
                                                                        data-buy="{{$receive->buy}}"
                                                                        data-reserved="{{$receive->reserved}}"
                                                                        data-id="{{$receive->id}}"
                                                                        value="{{$receive->curency_name}}">{{$receive->curency_name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="received_amount"
                                                       class="col-md-4 control-label">Receive Amount*</label>

                                                <div class="col-md-7">
                                                    <p class="form-control" id="recevied"></p>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="sending_account_no" class="col-md-4 control-label">Sending
                                                    Account
                                                    No*</label>

                                                <div class="col-md-7">
                                                    <input class="form-control" step="any" name="sending_account_no"
                                                           placeholder="Sending Account"
                                                           type="text" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="account_no" class="col-md-4 control-label">Recipient Account
                                                    No*</label>

                                                <div class="col-md-7">
                                                    <input class="form-control" step="any" name="account_no"
                                                           placeholder="Recipient Account"
                                                           type="text" required>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="trx_id" class="col-md-4 control-label">Transaction
                                                    ID</label>

                                                <div class="col-md-7">
                                                    <input class="form-control" step="any" name="trx_id"
                                                           placeholder="Transection ID"
                                                           type="text">

                                                </div>
                                            </div>

                                            <div class="form-group">

                                                <div class="col-md-7 col-md-offset-4">
                                                    {{--<input name="accept_terms" value="1" checked="" type="checkbox">--}}
                                                    <p><b>I agree to the terms of Service and Privacy Policy</b></p>
                                                    <input type="hidden" name="rsm" id="rsm" value="">
                                                    <input class="form-control" type="hidden" step="any"
                                                           name="received_amount" value="">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <button type="submit" onclick="getCurrecyId();"
                                                            class="btn btn-small border-radius-4 btn-deep-pink">
                                                        Submit
                                                        <input class="form-control" type="hidden" step="any"
                                                               id="cash_in" name="cash_in" value="">
                                                        <input class="form-control" type="hidden" step="any"
                                                               id="cash_out" name="cash_out" value="">
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.col-lg-4 (nested) -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    @if(isset($rates_info))
                        <div class="col-lg-5">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bell fa-fw"></i> Admin Account Info
                                </div>

                                <div class="panel-body bg-light-gray">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Account</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($rates_info as $rate)
                                                        @if(isset($rate->account_info))
                                                            <tr>
                                                                <td>{{$rate->curency_name}}</td>
                                                                <td>{{$rate->account_info}}</td>
                                                            </tr>
                                                        @endif
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <!-- /.col-lg-4 (nested) -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>


                        <div class="col-lg-5">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bell fa-fw"></i> Today's Rate
                                </div>

                                <div class="panel-body bg-light-gray">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Currency</th>
                                                        <th>We Buy</th>
                                                        <th>Reserved</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($rates_info as $rate)
                                                        <tr>
                                                            <td><img src="{{Voyager::image($rate->image)}}" width="20"
                                                                     height="20"> {{$rate->curency_name}}</td>
                                                            <td>{{$rate->buy}}</td>
                                                            <td>{{$rate->reserved}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        </div>
                                        <!-- /.col-lg-4 (nested) -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@stop
@section('script')

    <script>
        function getCurrecyId() {
            var send_currency_id = $('#send').find(':selected').data('id')
            var received_currency_id = $('#received').find(':selected').data('id')
            $('#cash_in').val(send_currency_id)
            $('#cash_out').val(received_currency_id)
        }
    </script>

    <script>
        function validateNum(input) {
            var received_reserved = $('#received').find(':selected').data('reserved')
            var send_buy = $('#send').find(':selected').data('buy')
            var amount =0;
            amount = received_reserved / send_buy;
            var x = parseInt(amount);
            if (input.value < {{$home_info->min_order}}) input.value = {{$home_info->min_order}};
            if (input.value > {{$home_info->max_order}}) input.value = {{$home_info->max_order}};
            if (input.value > x) input.value = x;
        }
    </script>

    <script>
        $(document.body).on('input', 'input[name="send_amount"], #send, #received', function () {

            var send_money = $('input[name="send_amount"]').val()
            var receive_money = $('input[name="received_amount"]').val()

            var send_type = $('#send').val()
            var send_sell = $('#send').find(':selected').data('sell')
            var send_buy = $('#send').find(':selected').data('buy')

            var received_type = $('#received').val()
            var received_buy = $('#received').find(':selected').data('buy')
            var received_sell = $('#received').find(':selected').data('sell')


            var amount = 0;

            if (send_sell != 0 && received_buy == 0) {
                amount = send_money * send_buy;
            }

            else if (send_sell != 0) {
                amount = (send_buy * send_money) / received_sell;
            }

            else {
                amount = send_money;
                if (received_sell != 0) {
                    amount = send_money / received_sell;
                }
            }

            amount = parseFloat(amount)
            amount = amount.toFixed(2)


            $('#recevied').html(amount)
            $('input[name="received_amount"]').val(amount)
            $('input[name="rsm"]').val(CryptoJS.MD5(amount));
        })
    </script>

    <script>
        $(document.body).on('change', 'input[name="send_amount"], #send, #received', function () {

            var send_money = $('input[name="send_amount"]').val()
            var receive_money = $('input[name="received_amount"]').val()

            var send_type = $('#send').val()
            var send_sell = $('#send').find(':selected').data('sell')
            var send_buy = $('#send').find(':selected').data('buy')

            var received_type = $('#received').val()
            var received_buy = $('#received').find(':selected').data('buy')
            var received_sell = $('#received').find(':selected').data('sell')


            var amount = 0;

            if (send_sell != 0 && received_buy == 0) {
                amount = send_money * send_buy;
            }

            else if (send_sell != 0) {
                amount = (send_buy * send_money) / received_sell;
            }

            else {
                amount = send_money;
                if (received_sell != 0) {
                    amount = send_money / received_sell;
                }
            }

            amount = parseFloat(amount)
            amount = amount.toFixed(2)


            $('#recevied').html(amount)
            $('input[name="received_amount"]').val(amount)
            $('input[name="rsm"]').val(CryptoJS.MD5(amount));
        })
    </script>
@stop