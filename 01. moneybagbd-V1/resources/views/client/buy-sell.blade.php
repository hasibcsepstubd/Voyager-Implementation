@extends('client.master')
@section('title','Buy-Sell & Exchange')
@section('style')
@stop
@section('content')

    <div>
        <h5 class="animated fadeInDown page-header text-uppercase alt-font text-gray font-weight-600 padding-30px-left padding-10px-top">
            Buy, Sell &
            Exchange</h5>
    </div>

    <div class="wow fadeInUp bg-white padding-0px-top" style="visibility: hidden; animation-name: fadeInUp;">
        @if(isset($notice))
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
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
                                <i class="fa fa-bar-chart-o fa-fw"></i> Transection
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
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
                                                           placeholder="Amount"
                                                           type="number">
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
                                                <label for="received" class="col-md-4 control-label">Receive*</label>

                                                <div class="col-md-7">
                                                    <select class="form-control" id="received" name="received">
                                                        @if(isset($rates))
                                                            @foreach($rates as $rate)
                                                                <option data-sell="{{$rate->sell}}"
                                                                        data-buy="{{$rate->buy}}"
                                                                        value="{{$rate->curency_name}}">{{$rate->curency_name}}</option>
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
                                                <label for="account_no" class="col-md-4 control-label">Recipient Account
                                                    No*</label>

                                                <div class="col-md-7">
                                                    <input class="form-control" step="any" name="account_no"
                                                           placeholder="Recipient Account"
                                                           type="text" required>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="trx_id" class="col-md-4 control-label">Transection
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
                                                    <button type="submit"
                                                            class="btn btn-small border-radius-4 btn-deep-pink">
                                                        Submit
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
                    @if(isset($rates))
                        <div class="col-lg-5">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bell fa-fw"></i> Admin Account Info
                                </div>

                                <div class="panel-body">
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
                                                    @foreach($rates as $rate)
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

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Currency</th>
                                                        <th>Buy</th>
                                                        <th>Sell</th>
                                                        <th>Reserved</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($rates as $rate)
                                                        <tr>
                                                            <td><img src="{{Voyager::image($rate->image)}}" width="20"
                                                                     height="20"> {{$rate->curency_name}}</td>
                                                            <td>{{$rate->buy}}</td>
                                                            <td>{{$rate->sell}}</td>
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

            {{--$('input[name="rsm"]').val(CryptoJS.AES.encrypt(amount, '{{ env('APP_KEY') }}'))--}}


        })
    </script>
@stop