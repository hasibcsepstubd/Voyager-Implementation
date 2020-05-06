@extends('public.master')
@section('title','Payment Proof')
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
@include('public.nav-2')
@section('content')
    <div>
        <h5 class="wow fadeInDown page-header text-uppercase alt-font text-gray font-weight-600 padding-30px-left padding-10px-top text-center">
            Payment Proof</h5>
    </div>

    <!-- start hero with parallax section -->
    <section class="wow bounceInRight" style="visibility: visible; animation-name: bounceInRight;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 center-col">
                    <h6 class="text-uppercase alt-font text-gray font-weight-600">Transection History</h6>
                    <div class="table-responsive">
                        <table class="table table-striped table-dark table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="color:red">#</th>
                                <th scope="col" style="color:red">Date</th>
                                <th scope="col" style="color:red">Name</th>
                                <th scope="col" style="color:red">Send - Received</th>
                                <th scope="col" style="color:red">Send Amount</th>
                                <th scope="col" style="color:red">Received Amount</th>
                                {{--<th scope="col" style="color:red">Rate</th>--}}
                                <th scope="col" style="color:red">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($trans[0]))
                                @foreach($trans as $index => $tran)
                                    <tr>
                                        <th scope="row">{{$index+1}}</th>
                                        <td>{{$tran->created_at}}</td>
                                        <td>@if(isset($tran->user->name)){{$tran->user->name}}@endif</td>
                                        <td>{{$tran->send}} - {{$tran->received}}</td>
                                        <td>{{$tran->send_amount}}</td>
                                        <td>{{$tran->received_amount}}</td>
                                        {{--<td>{{$rate}}</td>--}}
                                        <td>
                                            <span class="{{($tran->status=="Completed")? 'label label-success': 'label label-warning'}}">{{$tran->status}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7"> No Data Available.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('script')
@stop