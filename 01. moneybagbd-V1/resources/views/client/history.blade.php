@extends('client.master')
@section('title','History')
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

    <div>
        <h5 class="animated fadeInDown page-header text-uppercase alt-font text-gray font-weight-600 padding-30px-left padding-10px-top">
            Transection
            History</h5>
    </div>


    <!-- start hero with parallax section -->
    <section class="wow bounceInRight" style="visibility: hidden; animation-name: bounceInRight;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 center-col">
                    <div class="table-responsive">
                        <table class="table table-striped table-dark table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="color:red">Trx ID</th>
                                <th scope="col" style="color:red">Date</th>
                                <th scope="col" style="color:red">Send-Received</th>
                                <th scope="col" style="color:red">Send Amount</th>
                                <th scope="col" style="color:red">Received Amount</th>
                                {{--<th scope="col" style="color:red">Rate</th>--}}
                                <th scope="col" style="color:red">Status</th>
                                <th scope="col" style="color:red; text-align: center;">Review</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($trans[0]))
                                @foreach($trans as $tran)

                                    <tr>
                                        <td>{{$tran->id}}</td>
                                        <td>{{$tran->created_at}}</td>
                                        <td>{{$tran->send}} - {{$tran->received}}</td>
                                        <td>{{$tran->send_amount}}</td>
                                        <td>{{$tran->received_amount}}</td>
                                        {{--<td>{{$rate}}</td>--}}
                                        <td><span class="{{($tran->status=="Completed")? 'label label-success': 'label label-warning'}}">{{$tran->status}}</span></td>
                                        <td style="width: 100px; text-align: center;">

                                            <?php
                                            $is_reviewed = \App\Transection::where('id', $tran->id)->first();
                                            ?>

                                            @if($is_reviewed->is_reviewed==0 && $is_reviewed->status=='Completed')
                                                <a data-toggle="modal" href="#review_modal_{{$tran->id}}"
                                                   data-original-title="Review">&nbsp;&nbsp;<i
                                                            class="fa fa-edit text-info"></i>
                                                </a>
                                            @elseif ($is_reviewed->is_reviewed==1)
                                                <span class="label label-success">Reviewed</span>

                                            @else
                                                <span>-</span>
                                            @endif

                                            <div id="review_modal_{{$tran->id}}" class="modal fade in"
                                                 style="text-align: left;">
                                                <div class="modal-dialog modal-confirm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title col-xs-10">Give Review</h6>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="text-center" id="loading">
                                                            <div class="rect1"></div>
                                                            <div class="rect2"></div>
                                                            <div class="rect3"></div>
                                                        </div>
                                                        <form action="{{url('/client/give-review')}}" method="POST"
                                                              id="form_modal" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            <div class="modal-body" id="form_modal_body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="required">Title</label>
                                                                            <input type="text" name="review_title"
                                                                                   class="form-control" value=""
                                                                                   id="review_title"
                                                                                   autofocus required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="required">Details</label>
                                                                            <textarea type="text" name="review_details"
                                                                                      class="form-control"
                                                                                      maxlength="500"
                                                                                      rows="7" value=""
                                                                                      id="review_details"
                                                                                      class="form-control"
                                                                                      autofocus required></textarea>
                                                                            <p class="charsRemaining"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                        class="btn btn-small border-radius-4 btn-light-gray"
                                                                        data-dismiss="modal">Close
                                                                </button>
                                                                <button type="submit"
                                                                        class="btn btn-small border-radius-4 btn-deep-pink">
                                                                    Submit
                                                                </button>
                                                                <input type="hidden" name="id" id="id"
                                                                       value="{{$tran->id}}">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8"> No Data Available.</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        {!! $trans->appends(['type'=>'transection'])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
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

@stop