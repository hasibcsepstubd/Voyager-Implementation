@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager.generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager.generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if(!is_null($dataTypeContent->getKey()))
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="">Rates</label>
                                @if(isset($compare_rates[0]))
                                    <p class="form-control">{{$rate_item->curency_name}}</p>
                                    <input type="hidden" name="from_rate_id" value="{{$rate_item->id}}">
                                @else
                                    <select name="from_rate_id" class="form-control" id="rate_id">
                                        <option value="">Select Rate</option>
                                        @if(isset($rates[0]))
                                            @foreach($rates as $rate)
                                                <option @if(!empty($rate_item) && $rate_item->id == $rate->id) selected @endif value="{{$rate->id}}">{{$rate->curency_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                @endif
                            </div>
                            <div id="rate_compare">
                                @if(isset($compare_rates[0]))
                                    @foreach($compare_rates as $rate)
                                        @php 
                                            $rate_value = 0;
                                            if(!empty(App\Currency::getToRateValue($rate_item->id,$rate->id))) {
                                                $rate_value = App\Currency::getToRateValue($rate_item->id,$rate->id)->rate_value;
                                            }
                                        @endphp

                                        <div class="form-group">
                                            <label>{{$rate->curency_name}}</label>
                                            <input type="number" step="any" name="rate_compare[]" class="form-control"
                                             value="{{$rate_value}}">
                                            <input type="hidden" name="to_rate_id[]" value="{{$rate->id}}">
                                        </div>
                                    @endforeach 
                                @endif
                            </div>

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary save">{{ __('voyager.generic.save') }}</button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager.generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager.generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager.generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager.generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script>
        $(document.body).on('change','#rate_id',function() {

            var rateArray = [];
            var thisRateId = $(this).find('option:selected').val();
            var thisRateText = $(this).find('option:selected').text();

            // creating javascript array from $rates
            @if(isset($rates[0]))
                @foreach($rates as $rate)
                    rateArray.push({
                        id: '{{$rate->id}}',
                        name: '{{$rate->curency_name}}',
                    });
                @endforeach
            @endif

            // find position of the secteled value
            arrayPosition = rateArray.findIndex(x => x.id==thisRateId);

            // remove selected value from array 
            rateArray.splice(arrayPosition, 1);


            // making html from new array and create html
            var rate_compare_html = '';

            if(rateArray.length != 0) {
                for(i=0;i<rateArray.length;i++) {
                    rate_compare_html += 
                        '<div class="form-group">'+
                        '<label>'+rateArray[i]['name']+'</label>'+
                        '<input type="number" step="any" name="rate_compare[]" class="form-control">'+
                        '<input type="hidden" name="to_rate_id[]" value="'+rateArray[i]['id']+'">'+
                        '</div>'

                }
            }
        
            $('#rate_compare').html('');
            $('#rate_compare').html(rate_compare_html);

        });



        var params = {}
        var $image

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                $image = $(this).siblings('img');

                params = {
                    slug:   '{{ $dataType->slug }}',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop
