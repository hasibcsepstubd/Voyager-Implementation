@extends('public.master')
@section('title','Register')
@section('style')
    <style>
        section.big-section {
            padding: 30px 0 !important;
        }
    </style>
@stop
@include('public.nav-2')
@section('content')
    <div>
        <h5 class="animated fadeInDown page-header text-uppercase alt-font text-gray font-weight-600 padding-30px-left padding-10px-top text-center">
            Register</h5>
    </div>

    <section class="wow fadeInUp big-section" id="section-down" style="visibility: hidden; animation-name: fadeInUp;">
        <div class="container">
            <div class="row equalize sm-equalize-auto">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Register</div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('referred_by') ? ' has-error' : '' }}">
                                    <label for="referred_by" class="col-md-4 control-label">Referral Code</label>

                                    <div class="col-md-6">
                                        <input id="referred_by" type="text" class="form-control" name="referred_by"
                                               value="" autofocus>

                                        @if ($errors->has('referred_by'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('referred_by') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password"
                                               required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm
                                        Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-small border-radius-4 btn-deep-pink">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    {{--@if(!empty(Session::get('message')))--}}
    {{--<script>--}}
    {{--toastr.success('{{Session::get('message')}}');--}}
    {{--</script>--}}
    {{--@endif--}}

    {{--@if(!empty(Session::get('warning')))--}}
    {{--<script>--}}
    {{--toastr.warning('{{Session::get('warning')}}');--}}
    {{--</script>--}}
    {{--@endif--}}
@stop