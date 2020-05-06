@extends('client.master')
@section('title','Dashboard')
@section('style')
    <style>
        .huge {
            font-size: 40px;
        }

        .panel-green {
            border-color: #5cb85c;
        }

        .panel-yellow {
            border-color: #f0ad4e;
        }

        .panel-red {
            border-color: #d9534f;
        }

        .panel-green > .panel-heading {
            border-color: #5cb85c;
            color: white;
            background-color: #5cb85c;
        }

        .panel-yellow > .panel-heading {
            border-color: #f0ad4e;
            color: white;
            background-color: #f0ad4e;
        }

        .panel-red > .panel-heading {
            border-color: #d9534f;
            color: white;
            background-color: #d9534f;
        }

    </style>
@stop
@section('content')

    <?php
    $referral_count = \App\User::where('referred_by', Auth::user()->affiliate_id)->where('is_verified', 'Yes')->count();
    $new_message = \App\Message::where('from', Auth::user()->id)->where('status', 3)->count();
    $total_transection = \App\Transection::where('user_id', Auth::user()->id)->where('status', 2)->count();
    $total = $referral_count * 0.25;
    ?>

<div class="col-sm-12 page-header">
    <div class="col-sm-6">
        <h5 style="margin-bottom: 0px;" class="animated fadeInDown text-uppercase alt-font text-gray font-weight-600 padding-10px-top">
            Dashboard</h5>
    </div>
    <div class="col-sm-6"><div class="animated fadeInDown text-uppercase alt-font text-gray font-weight-600 padding-15px-right padding-30px-top float-right" ><span style="color:red">Welcome,</span> {{Auth::user()->name}}</div></div>

</div>


    <div>
        <div class="col-md-12">
            <div class="col-lg-3 col-md-6 wow flipInX">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge" style="padding-top: 15px;">{{$new_message}}</div>
                                <div style="padding-top: 2px;">New Message</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/client/messages')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow flipInX" data-wow-delay="0.2s">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge" style="padding-top: 15px;">{{$total}}</div>
                                <div style="padding-top: 2px;">Referal Amount</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/client/referral')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow flipInX" data-wow-delay="0.4s">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge" style="padding-top: 15px;">{{$total_transection}}</div>
                                <div style="padding-top: 2px;">Total Transection</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/client/history')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow flipInX" data-wow-delay="0.6s">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="small" style=" font-size: 24px; padding-top: 15px;">

                                    @if(Auth::user()->is_verified=='Yes')
                                        Verified
                                    @else
                                        Unverified
                                    @endif

                                </div>
                                <div style="padding-top: 2px;">Amount Status</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('/client/settings')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="col-md-12 animated slideInUp">
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
                                        <label for="ammount" class="col-md-4 control-label">Sending Amount*</label>

                                        <div class="col-md-7">
                                            <input class="form-control" step="any" name="send_amount"
                                                   placeholder="Amount"
                                                   type="number">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="sending_account_no" class="col-md-4 control-label">Sending Account
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
                                            <input class="form-control" type="hidden" step="any" name="received_amount"
                                                   value="">
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
    <div class="clearfix"></div>
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

        })
    </script>
@stop