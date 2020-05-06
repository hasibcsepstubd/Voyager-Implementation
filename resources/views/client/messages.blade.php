@extends('client.master')
@section('title','Messages')
@section('style')
    <style>
        section.big-section {
            padding: 30px 0 !important;
        }

        section {
            padding: 0px 0 !important;
            overflow: hidden;
        }
    </style>
@stop
@section('content')
    <div class="col-sm-12 page-header bg-light-gray">
        <div class="col-sm-6">
            <h5 style="margin-bottom: 0px;" class="animated fadeInDown text-uppercase alt-font text-gray font-weight-600 padding-30px-left padding-10px-top">
                Messages</h5>
        </div>
        <div class="col-sm-6">
            <div class="animated fadeInDown text-uppercase alt-font text-gray font-weight-600 padding-15px-right padding-30px-top float-right">
                <span style="color:red">Welcome,</span> {{Auth::user()->name}}</div>
        </div>
    </div>

    <!-- start hero with parallax section -->
    <div class="wow fadeInUp bg-white padding-0px-top bg-light-gray" style="visibility: hidden; animation-name: fadeInUp;">
        <div class="col-sm-offset-10 col-sm-2 "><input style="float: middle; margin-bottom: 10px;"
                                                       name="submit"
                                                       value="Send New"
                                                       class="btn btn-small border-radius-4 btn-deep-pink "
                                                       type="submit"
                                                       data-target="#add_new" data-toggle="modal"
                                                       data-id="add">
        </div>
        <div class="container tab-style2">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <!-- start tab navigation -->
                    <ul class="nav nav-tabs alt-font text-uppercase text-small display-inherit text-left font-weight-600">
                        {{--<li @if(empty(Request::get('type'))) class="active"--}}
                            {{--@elseif(Request::get('type') == 'index_msg') class="active" @elseif(Request::get('type') == 'sent_msg')  @endif>--}}
                            {{--<a href="#tab_sec1" data-toggle="tab" aria-expanded="true">Inbox</a></li>--}}
                        <li @if(empty(Request::get('type'))) class="active" @elseif(Request::get('type') == 'sent_msg') class="active" @endif><a href="#tab_sec2"
                                                                                             data-toggle="tab"
                                                                                             aria-expanded="false">Inbox</a></li>
                    </ul>
                    <!-- end tab navigation -->
                </div>
            </div>
            <div class="tab-content">
                <!-- start tab content -->
                {{--<div class="tab-pane med-text fade @if(empty(Request::get('type'))) active in @elseif(Request::get('type') == 'index_msg') active in @elseif(Request::get('type') == 'sent_msg')  @endif"--}}
                     {{--id="tab_sec1">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12 col-sm-12 col-xs-12 center-col">--}}
                            {{--<div class="table-responsive">--}}
                                {{--<table class="table table-striped table-dark table-bordered">--}}
                                    {{--<thead>--}}
                                    {{--<tr>--}}
                                        {{--<th scope="col" style="color:red">#</th>--}}
                                        {{--<th scope="col" style="color:red">Title</th>--}}
                                        {{--<th scope="col" style="color:red">Details</th>--}}
                                        {{--<th scope="col" style="color:red; text-align: center">Date</th>--}}
                                        {{--<th scope="col" style="color:red; text-align: center">Action</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    {{--@if(isset($inbox_messages[0]))--}}
                                        {{--@foreach($inbox_messages as $index => $inbox_message)--}}
                                            {{--<tr @if($inbox_message->status == 'Unread') style="font-weight: bold" @endif>--}}
                                                {{--<td>{{$index+1}}</td>--}}
                                                {{--<td>{{$inbox_message->title}}</td>--}}
                                                {{--<td>{{str_limit($inbox_message->details,50)}}</td>--}}
                                                {{--<td style="text-align: center">{{$inbox_message->created_at}}</td>--}}
                                                {{--<td style="text-align: center">--}}
                                                    {{--<a href="#message_show" data-toggle="modal"--}}
                                                       {{--data-id="{{Crypt::encrypt($inbox_message->id)}}" class="edit_btn"--}}
                                                       {{--data-original-title="Close">--}}
                                                        {{--<i class="fa fa-edit text-info">&nbsp;&nbsp;</i>--}}
                                                    {{--</a>--}}
                                                    {{--<a data-toggle="modal"--}}
                                                       {{--href="#index_message_delete_modal_{{$inbox_message->id}}"--}}
                                                       {{--data-original-title="Delete">&nbsp;&nbsp;<i--}}
                                                                {{--class="fa fa-trash-o text-danger"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<div id="index_message_delete_modal_{{$inbox_message->id}}"--}}
                                                         {{--class="modal fade in">--}}
                                                        {{--<div class="modal-dialog modal-confirm">--}}
                                                            {{--<div class="modal-content">--}}
                                                                {{--<div class="modal-header">--}}
                                                                    {{--<h4 class="modal-title">Confirmation</h4>--}}
                                                                    {{--<button type="button" class="close"--}}
                                                                            {{--data-dismiss="modal"--}}
                                                                            {{--aria-hidden="true">×--}}
                                                                    {{--</button>--}}
                                                                {{--</div>--}}
                                                                {{--<div class="modal-body">--}}
                                                                    {{--<p>Are you sure you want to delete this item? This--}}
                                                                        {{--action--}}
                                                                        {{--cannot--}}
                                                                        {{--be undone and you will be unable to recover any--}}
                                                                        {{--data.</p>--}}
                                                                {{--</div>--}}
                                                                {{--<div class="modal-footer">--}}
                                                                    {{--<a href="#" class="btn btn-info"--}}
                                                                       {{--data-dismiss="modal">Cancel</a>--}}
                                                                    {{--<a data-id="{{Crypt::encrypt($inbox_message->id)}}"--}}
                                                                       {{--href="{{URL::to('/client/message/delete/'.$inbox_message->id)}}"--}}
                                                                       {{--class="btn btn-danger delete">Yes, delete it!</a>--}}

                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}

                                                {{--</td>--}}

                                            {{--</tr>--}}
                                        {{--@endforeach--}}
                                    {{--@else--}}
                                        {{--<tr>--}}
                                            {{--<td colspan="5"> No Data Available.</td>--}}
                                        {{--</tr>--}}
                                    {{--@endif--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}
                                {{--{!! $inbox_messages->appends(['type'=>'index_msg'])->links() !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!-- end tab content -->
                <!-- start tab content -->
                <div class="tab-pane fade @if(empty(Request::get('type'))) active in @elseif(Request::get('type') == 'sent_msg') active in @endif" id="tab_sec2">

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 center-col">
                            <div class="table-responsive">
                                <table class="table table-striped table-dark table-bordered">
                                    <thead>
                                    <tr>
                                        {{--<th scope="col" style="color:red">#</th>--}}
                                        <th scope="col" style="color:red">Title</th>
                                        <th scope="col" style="color:red">Details</th>
                                        <th scope="col" style="color:red">Reply</th>
                                        <th scope="col" style="color:red; text-align: center">Date</th>
                                        <th scope="col" style="color:red; text-align: center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($sent_messages[0]))
                                        @foreach($sent_messages as $index => $sent_message)
                                            <tr @if($sent_message->status=='Replied') style="font-weight: bold" @endif>
                                                {{--<td>{{$index+1}}</td>--}}
                                                <td>{{$sent_message->title}}</td>
                                                <td>{{str_limit($sent_message->details,50)}}</td>
                                                <td>{{str_limit($sent_message->reply,50)}}</td>
                                                <td style="text-align: center">{{$sent_message->created_at}}</td>
                                                <td style="text-align: center">
                                                   @if($sent_message->status != 'Unread')
                                                    <a href="#message_show" data-toggle="modal"
                                                       data-id="{{Crypt::encrypt($sent_message->id)}}" class="edit_btn"
                                                       data-original-title="Close">
                                                        <i class="fa fa-edit text-info">&nbsp;&nbsp;</i>
                                                    </a>
                                                    @endif
                                                    <a data-toggle="modal"
                                                       href="#send_message_delete_modal_{{$sent_message->id}}"
                                                       data-original-title="Delete">&nbsp;&nbsp;<i
                                                                class="fa fa-trash-o text-danger"></i>
                                                    </a>
                                                    <div id="send_message_delete_modal_{{$sent_message->id}}"
                                                         class="modal fade in">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Confirmation</h4>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-hidden="true">×
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are you sure you want to delete this item? This
                                                                        action
                                                                        cannot
                                                                        be undone and you will be unable to recover any
                                                                        data.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="#" class="btn btn-info"
                                                                       data-dismiss="modal">Cancel</a>
                                                                    <a data-id="{{Crypt::encrypt($sent_message->id)}}"
                                                                       href="{{URL::to('/client/message/delete/'.$sent_message->id)}}"
                                                                       class="btn btn-danger delete">Yes, delete it!</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5"> No Data Available.</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                {!! $sent_messages->appends(['type'=>'sent_msg'])->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end tab content -->

            </div>
        </div>
    </div>






    {{--<section class="wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12 col-sm-12 col-xs-12 center-col">--}}

    {{--<div class="row margin-15px-bottom">--}}
    {{--<div class="col-md-offset-10 col-md-2 "><input style="float: right;" name="submit" value="Send New"--}}
    {{--class="btn btn-small border-radius-4 btn-deep-pink " type="submit"--}}
    {{--data-target="#add_new" data-toggle="modal" data-id="add"></div>--}}
    {{--</div>--}}
    {{--<table class="table table-striped table-dark table-bordered">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th scope="col" style="color:red">#</th>--}}
    {{--<th scope="col" style="color:red">Title</th>--}}
    {{--<th scope="col" style="color:red">Details</th>--}}
    {{--<th scope="col" style="color:red; text-align: center">Date</th>--}}
    {{--<th scope="col" style="color:red; text-align: center">Action</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--@if(isset($messages[0]))--}}
    {{--@foreach($messages as $index => $message)--}}
    {{--<tr>--}}
    {{--<td>{{$index+1}}</td>--}}
    {{--<td>{{$message->title}}</td>--}}
    {{--<td>{{$message->details}}</td>--}}
    {{--<td style="text-align: center">{{$message->created_at}}</td>--}}
    {{--<td style="text-align: center">--}}
    {{--<a href="#add_and_edit_modal" data-toggle="modal"--}}
    {{--data-id="{{Crypt::encrypt($message->id)}}" class="edit_btn"--}}
    {{--data-original-title="Close">--}}
    {{--<i class="fa fa-edit text-info">&nbsp;&nbsp;</i>--}}
    {{--</a>--}}
    {{--<a data-toggle="modal" href="#delete_modal_{{$message->id}}"--}}
    {{--data-original-title="Delete">&nbsp;&nbsp;<i--}}
    {{--class="fa fa-trash-o text-danger"></i>--}}
    {{--</a>--}}
    {{--<div id="delete_modal_{{$message->id}}" class="modal fade in">--}}
    {{--<div class="modal-dialog modal-confirm">--}}
    {{--<div class="modal-content">--}}
    {{--<div class="modal-header">--}}
    {{--<h4 class="modal-title">Confirmation</h4>--}}
    {{--<button type="button" class="close" data-dismiss="modal"--}}
    {{--aria-hidden="true">×--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--<div class="modal-body">--}}
    {{--<p>Are you sure you want to delete this item? This--}}
    {{--action--}}
    {{--cannot--}}
    {{--be undone and you will be unable to recover any--}}
    {{--data.</p>--}}
    {{--</div>--}}
    {{--<div class="modal-footer">--}}
    {{--<a href="#" class="btn btn-info"--}}
    {{--data-dismiss="modal">Cancel</a>--}}
    {{--<a data-id="{{Crypt::encrypt($message->id)}}"--}}
    {{--href="{{URL::to('/client/message/delete/'.$message->id)}}"--}}
    {{--class="btn btn-danger delete">Yes, delete it!</a>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</td>--}}

    {{--</tr>--}}
    {{--@endforeach--}}
    {{--@else--}}
    {{--<tr>--}}
    {{--<td colspan="5"> No Data Available.</td>--}}
    {{--</tr>--}}
    {{--@endif--}}
    {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}

    <div class="modal fade" id="add_new" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title col-xs-10">Send New Message</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="text-center" id="loading">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                </div>
                <form action="{{url('/client/send-message')}}" method="POST" id="form_modal"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body" id="form_modal_body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="required">Subject</label>
                                    <input type="text" name="msg_title" class="form-control" value="" id="msg_title"
                                           autofocus required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="required">Message</label>
                                    <textarea type="text" name="msg_details" maxlength="500" rows="7"
                                              class="form-control" value=""
                                              id="msg_details"
                                              autofocus required></textarea>
                                    <p class="charsRemaining"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-small border-radius-4 btn-light-gray" data-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-small border-radius-4 btn-deep-pink">Save</button>
                        <input type="hidden" name="id" id="id">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="message_show" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title col-xs-10">Message</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="text-center" id="msg_loading">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                </div>

                <div class="modal-body" id="message_html">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-small border-radius-4 btn-light-gray" data-dismiss="modal">
                        Close
                    </button>
                    {{--<button type="submit" class="btn btn-small border-radius-4 btn-deep-pink">Save</button>--}}
                    <input type="hidden" name="id" id="id">
                </div>

            </div>
        </div>
    </div>
@stop
@section('script')
    <script type="text/javascript">
        function textareaMaxLength() {
            $('textarea[maxlength]').keyup(function () {
                var max = parseInt($(this).attr('maxlength'));
                if ($(this).val().length > max) {
                    $(this).val($(this).val().substr(0, $(this).attr('maxlength')));
                }
                $(this).parent().find('.charsRemaining').html('You have ' + (max - $(this).val().length) + ' characters remaining');

            });
        }

        textareaMaxLength();
    </script>

    <script>
        $(document.body).on('click', '.edit_btn', function (e) {
            var edit_id = $(this).data('id')
            // $('#media_form').submit();
            $('#msg_loading').show()
            $('#message_html').empty();
            e.preventDefault()
            $.ajax({
                type: 'GET',
                url: '{{url('/client/messages-show')}}' + '?message_id=' + edit_id,
                data: $('#form_modal').serialize(),
                dataType: 'json',
                success: function (data) {
                    $('#msg_loading').hide();
                    var message_json = data.data_message;

                    $('#message_html').append(
                        '<h6>' + message_json.title + '</h6>' +
                        '<p>' + message_json.details + '</p>'+
                        '<hr>'+
                        '<h6>Reply</h6>'+
                        '<p>' + message_json.reply + '</p>'
                    );
                }
            });
        })
    </script>
@stop