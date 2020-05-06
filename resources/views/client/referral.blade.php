@extends('client.master')
@section('title','Referral')
@section('style')
    <style>
        section.big-section {
            padding: 30px 0 !important;
        }

        section {
            padding: 30px 0 !important;
            overflow: hidden;
        }

    </style>
@stop
@section('content')

    <?php
    $referral_count = \App\User::where('referred_by', Auth::user()->affiliate_id)->where('is_verified', 'Yes')->count();
    $total = $referral_count * 0.25;
    ?>

    <div class="col-sm-12 page-header bg-light-gray">
        <div class="col-sm-6">
            <h5 style="margin-bottom: 0px;" class="animated fadeInDown text-uppercase alt-font text-gray font-weight-600 padding-30px-left padding-10px-top">
                Referral</h5>
        </div>
        <div class="col-sm-6">
            <div class="animated fadeInDown text-uppercase alt-font text-gray font-weight-600 padding-15px-right padding-30px-top float-right">
                <span style="color:red">Welcome,</span> {{Auth::user()->name}}</div>
        </div>
    </div>

    {{--<h4 class="alt-font text-gra font-weight-600 vertical-align-middle text-center margin-25px-top">Referral</h4>--}}
    <!-- start hero with parallax section -->

    <div class="wow fadeInUp bg-white padding-0px-top bg-light-gray" style="visibility: hidden; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                {{--<div class="col-md-12 col-sm-12 col-xs-12">--}}

                <div class="col-sm-9 col-md-10 col-xs-12">
                    <p class="alt-font text-gray font-weight-600">Your Referral Code: <b
                                style="color:red">{{\Illuminate\Support\Facades\Auth::user()->affiliate_id}}</b>,
                        Total:
                        $ @if(!isset(Auth::user()->current_referral_amount)) {{$total}} @else {{Auth::user()->current_referral_amount}} @endif
                        <b></b></p>
                </div>
                <div class=" col-sm-3 col-md-2 col-xs-12">
                    <input style="float: right; margin-bottom: 15px;"
                           name="submit"
                           value="Withdraw"
                           class="btn btn-small border-radius-4 btn-deep-pink "
                           type="submit"
                           data-target="@if(Auth::user()->is_verified == 'No') #add_new_1 @else #add_new  @endif"
                           data-toggle="modal"
                           data-id="add">
                </div>
                {{--</div>--}}
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 center-col">
                    <div class="table-responsive">
                        <table class="table table-striped table-dark table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="color:red">#</th>
                                <th scope="col" style="color:red">User Name</th>
                                <th scope="col" style="color:red">Referal Ammount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($referrals[0]))
                                @foreach($referrals as $index => $referral)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$referral->name}}</td>
                                        <td>$ 0.25</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3"> No Data Available.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {!! $referrals->appends(['type'=>'referral'])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_new" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title col-xs-10">Withdraw</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="text-center" id="loading">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                </div>
                <form action="{{url('/client/referral-withdraw')}}" method="POST" id="form_modal"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body" id="form_modal_body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="required">Amount</label>
                                    <input type="number" name="withdraw" class="form-control" value="" id="withdraw"
                                           placeholder="Amount"
                                           autofocus required
                                           max="@if(!isset(Auth::user()->current_referral_amount)) {{$total}} @else {{Auth::user()->current_referral_amount}} @endif"
                                           min="1">
                                </div>
                            </div>

                            <?php
                            $rates = \App\Rate::where('is_active', 1)->orderBy('curency_name', 'asc')->get();
                            ?>
                            @if(isset($rates))
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="required">Payment Method</label>
                                        <select class="form-control" name="payment_method" id="payment_method" autofocus
                                                required>
                                            @foreach($rates as $rate)
                                                <option value="{{$rate->curency_name}}">{{$rate->curency_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            @endif
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="required">Account No</label>
                                    <input type="text" name="account_no" class="form-control" value="" id="account_no"
                                           placeholder="Email or Mobile"
                                           autofocus required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-small border-radius-4 btn-light-gray" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-small border-radius-4 btn-deep-pink">Submit</button>
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="total" id="total"
                               value="@if(!isset(Auth::user()->current_referral_amount)) {{$total}} @else {{Auth::user()->current_referral_amount}} @endif">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add_new_1" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title col-xs-10">Verify The Account</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="text-center" id="loading">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                </div>
                <form action="" method="POST" id="form_modal"
                      enctype="multipart/form-data">
                    <div class="modal-body" id="form_modal_body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <p>Please go to <b>>> Settings</b> from left menu bar and fill all the necessary
                                        information and wait for admin approved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-small border-radius-4 btn-light-gray" data-dismiss="modal">
                            Close
                        </button>
                        {{--<button type="submit" class="btn btn-small border-radius-4 btn-deep-pink">Save</button>--}}
                        <input type="hidden" name="id" id="id">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('script')
@stop