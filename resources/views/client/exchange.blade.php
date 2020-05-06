@extends('client.master')
@section('title','Buy-Sell & Exchange')
@section('style')
@stop
@section('content')
    <?php $home_info = \App\Home::select('max_order','min_order')->firstOrFail();?>
    <div class="col-sm-12 page-header bg-light-gray">
        <div class="col-sm-6">
            <h5 style="margin-bottom: 0px;" class="animated fadeInDown text-uppercase alt-font text-gray font-weight-600 padding-30px-left padding-10px-top">
                Exchange</h5>
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
                                <i class="fa fa-bar-chart-o fa-fw"></i> Transaction <span style="padding-left:150px;">(Minimum Order {{$home_info->min_order}}$)</span>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body bg-light-gray">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-horizontal" method="POST"
                                              action="{{ url('/client/exchange-transection') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <label for="send" class="col-md-4 control-label">Send*</label>

                                                <div class="col-md-7">
                                                    <select class="form-control" id="send" name="send" required>
                                                        <option value="">Select</option>
                                                        @if(isset($sends))
                                                            @foreach($sends as $rate)
                                                                <option data-sell="{{$rate->sell}}"
                                                                        data-buy="{{$rate->buy}}"
                                                                        data-id="{{$rate->id}}"
                                                                        data-reserved="{{$rate->reserved}}"
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
                                                           type="number" onchange="validateNum(this);" style="margin-bottom: 5px;">
                                                    <span id="err_msg" style="color: red;"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="received" class="col-md-4 control-label">Receive*</label>

                                                <div class="col-md-7">
                                                    <select class="form-control" id="received" required name="received">
                                                        {{-- @if(isset($receives))
                                                            @foreach($receives as $rate)
                                                                <option data-sell="{{$rate->sell}}"
                                                                        data-buy="{{$rate->buy}}"
                                                                        data-id="{{$rate->id}}"
                                                                        data-reserved="{{$rate->reserved}}"
                                                                        value="{{$rate->curency_name}}">{{$rate->curency_name}}</option>
                                                            @endforeach
                                                        @endif --}}
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="received_amount"
                                                       class="col-md-4 control-label">Receive Amount*</label>

                                                <div class="col-md-7">
                                                    <p class="form-control" id="received_amount"></p>

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
                                                    <button type="submit" onclick="getCurrecyId();" id="submit_btn" 
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
                                                        <th>We Sell</th>
                                                        <th>Reserved</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($rates_info as $rate)
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
            if (input.value < {{$home_info->min_order}}) input.value = {{$home_info->min_order}};
            if (input.value > received_reserved) input.value = received_reserved;
        }
    </script>

    <script>
        function makeReceiveRate(sendRate,html) {
            var rateArray = [];

            $.ajax({
                url: "{{ url('client/exchange-receiver-ajax') }}?send_rate_id="+sendRate,
                method: 'GET',
                dataType: "json",
                success: function(data){

                    var received_rates = data.currencies;

                    var rate_compare_html = '';
                    // var rate_compare_html = '<option value="">Select</otpion>';
                    if(received_rates.length > 0) {
                        for(i=0;i<received_rates.length;i++) {

                            rate_compare_html += 
                                '<option data-rate-value="'+received_rates[i]['rate_value']+'" data-reserved="'+received_rates[i]['reserved']+'" data-id="'+received_rates[i]['id']+'" value="'+received_rates[i]['curency_name']+'">'+received_rates[i]['curency_name']+'</option>'

                        }

                        $('#received').html('');
                        $('#received').html(rate_compare_html);
                    }
                    else {
                        return received_rates;
                    }
                

                }}).fail(function (data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                });
                      
        }
        $(document.body).on('change','#send',function() {
            var send_val = $(this).val();

            if(typeof send_val !== 'undefined' || send_val !== '') {
                var thisRateId = $(this).find('option:selected').data('id');

                $('#received_amount').text('')
                $('input[name="received_amount"]').val('')
                
                makeReceiveRate(thisRateId,1);
            }
        })

        function getCalculation() {
            var sendRateId = $('#send').find('option:selected').data('id');
            var rate_value = $('#received').find('option:selected').data('rate-value');
            var receivedReservedValue = $('#received').find('option:selected').data('reserved');

            // err_msg

            // get send amount value from input
            var sendAmount = $('input[name="send_amount"]').val();

            console.log(typeof sendAmount !== 'undefined' || sendAmount !== '');
            console.log(sendAmount !== '');

            if(sendAmount !== '' && rate_value !== '') {
                // calculation amount 
                var calculationAmount = sendAmount * rate_value;

                calculationAmount = parseFloat(calculationAmount)
                

                if(calculationAmount <= receivedReservedValue) {
                    $('#err_msg').text('');
                    $('#submit_btn').prop('disabled',false);

                    calculationAmount = calculationAmount.toFixed(2)

                    // 
                    $('#received_amount').text(calculationAmount)
                    $('input[name="received_amount"]').val(calculationAmount)
                    $('input[name="rsm"]').val(CryptoJS.MD5(calculationAmount));
                } else {
                    $('#err_msg').text('You can\'t get over the reserved value');
                    $('#submit_btn').prop('disabled',true);
                }                
            }
        }

        $(document.body).on('change', 'input[name="send_amount"], #send, #received', function () {
            getCalculation();
        });
        $(document.body).on('input', 'input[name="send_amount"], #send, #received', function () {
            getCalculation();
        });
    </script>
@stop