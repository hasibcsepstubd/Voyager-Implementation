@extends('voyager::master')

@section('page_title', __('voyager.generic.viewing').' '.$dataType->display_name_plural)

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->display_name_plural }}
        </h1>
        @can('add',app($dataType->model_name))
            <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>{{ __('voyager.generic.add_new') }}</span>
            </a>
        @endcan
        
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>Rate Name</td>
                                        <td>Compare</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($rates[0]))
                                        @foreach($rates as $rate)
                                            @php
                                                $compares = DB::table('rates')->where('id','!=',$rate->id)->get();
                                            @endphp
                                            <tr>
                                                <td>{{$rate->curency_name}}</td>
                                                <td>
                                                    @if(isset($compares[0]))
                                                        <ul type="square">
                                                        @foreach($compares as $compare)
                                                        @php 
                                                            $rate_value = 0;
                                                            if(!empty(App\Currency::getToRateValue($rate->id,$compare->id))) {
                                                                $rate_value = App\Currency::getToRateValue($rate->id,$compare->id)->rate_value;
                                                            }
                                                        @endphp
                                                            <li>{{$compare->curency_name}}: {{$rate_value}}</li>
                                                        @endforeach
                                                        </ul>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('voyager.'.$dataType->slug.'.edit', $rate->id) }}" title="{{ __('voyager.generic.edit') }}" class="btn btn-sm btn-primary pull-right edit">
                                                        <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg">{{ __('voyager.generic.edit') }}</span>
                                                    </a>
                                                    <a href="javascript:;" title="Delete" class="btn btn-sm btn-danger pull-right delete" data-id="{{$rate->id}}" id="delete-{{$rate->id}}">
                                                        <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm hidden-md hidden-lg">Delete</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager.generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager.generic.delete_question') }} {{ strtolower($dataType->display_name_singular) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                                 value="{{ __('voyager.generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager.generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('css')
@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
<link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@endif
@stop

@section('javascript')
   <script>
    var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) { // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');
            console.log(form.action);

            $('#delete_modal').modal('show');
        });
    </script>
@stop
