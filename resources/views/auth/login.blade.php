@extends('public.master')
@section('title','Sign-in')
@section('style')
    <style>
        section.big-section {
            padding: 30px 0 !important;
        }

        .checkbox input[type="checkbox"] {
            margin-left: -186px;
        }

        input[type="checkbox"] {
            margin: 7px 0 0;
        }

        .checkbox label, .radio label {
            min-height: 50px;
        }

        .panel-body {
            padding-top: 80px;
        }

    </style>
@stop
@include('public.nav-2')
@section('content')

    <div>
        <h5 class="animated fadeInDown page-header text-uppercase alt-font text-gray font-weight-600 padding-30px-left padding-10px-top text-center">
            Sign-in</h5>
    </div>

    <section class="wow fadeInUp big-section" id="section-down" style="visibility: hidden; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login</div>

                        <div class="col-md-12 margin-15px-top">
                            <div class="col-md-3 col-md-offset-9">
                                <a href="{{url('/public/sign-up')}}" type="submit" style="float:right;"
                                   class="btn btn-small border-radius-4 btn-deep-pink">
                                    Singup
                                </a>
                            </div>
                        </div>


                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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

                                <div class="form-group hidden-sm hidden-xs">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"
                                                       name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                                                Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-small border-radius-4 btn-deep-pink">
                                            Login
                                        </button>

                                        {{--<a class="btn btn-link" href="{{ url('/public/forget-password') }}">--}}
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
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