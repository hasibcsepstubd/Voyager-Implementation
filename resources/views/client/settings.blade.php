@extends('client.master')
@section('title','Settings')
@section('style')
@stop
@section('content')
    <div class="col-sm-12 page-header">
        <div class="col-sm-6">
            <h5 style="margin-bottom: 0px;" class="animated fadeInDown text-uppercase alt-font text-gray font-weight-600 padding-30px-left padding-10px-top">
                Profile
                Settings</h5>
        </div>
        <div class="col-sm-6">
            <div class="animated fadeInDown text-uppercase alt-font text-gray font-weight-600 padding-15px-right padding-30px-top float-right">
                <span style="color:red">Welcome,</span> {{Auth::user()->name}}</div>
        </div>
        </div>

            <div class="wow slideInUp padding-30px-top" style="visibility: hidden; animation-name: slideInUp;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{url('/client/user-info-update')}}" method="post"
                                  enctype="multipart/form-data"
                                  accept-charset="utf-8">
                                {{ csrf_field() }}
                                <div class="custom_message">
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Full Name*</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="name" value="{{$profile_info->name}}" type="text" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Address*</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="address" value="{{$profile_info->address}}" type="text" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Mobile-1*</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="mobile_1" value="{{$profile_info->mobile_1}}" maxlength="11"
                                               minlength="11"
                                               type="number" required>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Mobile-2</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="mobile_2" value="{{$profile_info->mobile_2}}" maxlength="11"
                                               minlength="11"
                                               type="number">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>City/Town*</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="city" value="{{$profile_info->city}}" type="text" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Gender*</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="gender" required>

                                            <option value="">Select</option>
                                            <option value="Male" @if($profile_info->gender=='Male') selected @endif>Male
                                            </option>
                                            <option value="Female" @if($profile_info->gender=='Female') selected @endif>
                                                Female
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>NID*</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="nid" value="{{$profile_info->nid}}" type="number" required>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>NID First Page*</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input name="nid_first_page" value="" type="file">

                                    </div>
                                </div>
                        </div>
                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-md-3">
                                    <label>NID Second Page*</label>
                                </div>
                                <div class="col-md-9">
                                    <input name="nid_second_page" value="" type="file">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label>User Photo*</label>
                                </div>
                                <div class="col-md-9">
                                    <input name="avatar" value="" type="file">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label>Email*</label>
                                </div>
                                <div class="col-md-9">
                                    <input name="email" value="{{$profile_info->email}}" readonly type="mail">
                                    <input name="id" value="{{$profile_info->id}}" type="hidden">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label>Change Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input name="new_pass" type="password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <input name="submit" value="Save Change"
                                           class="btn btn-small border-radius-4 btn-deep-pink"
                                           type="submit">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
@stop
@section('script')
@stop