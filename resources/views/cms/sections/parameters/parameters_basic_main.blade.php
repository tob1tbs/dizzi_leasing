@extends('cms.layout.layout')

@section('content')
<div class="nk-block nk-block-lg">
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title font-neue">საიტის ზოგადი პარამეტრები</h5>
            </div>
            <form action="#" class="gy-3" id="basic_parameter_form">
                @foreach($parameters_list as $parameter_item)
                @switch($parameter_item->type)
                @case('input')
                <div class="row g-3 align-center">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label" for="{{ $parameter_item->key }}">{{ $parameter_item->label_ge }}</label>
                            <span class="form-note font-helvetica-regular">{{ $parameter_item->snippet }}</span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="text" class="form-control font-neue" id="{{ $parameter_item->key }}" name="{{ $parameter_item->key }}" value="{{ $parameter_item->value }}" @if($parameter_item->disabled == 1) disabled @endif>
                            </div>
                        </div>
                    </div>
                </div>
                @break
                @case('checkbox')
                <div class="row g-3 align-center">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label" for="{{ $parameter_item->key }}">{{ $parameter_item->label_ge }}</label>
                            <span class="form-note font-helvetica-regular">{{ $parameter_item->snippet }}</span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                @switch($parameter_item->key)
                                    @case('language_list')
                                        @foreach($language_list as $language_item)
                                        <div class="custom-control custom-switch" style="margin-right: 14px;">
                                            <input type="checkbox" class="custom-control-input font-neue" @if($language_item->status == 1) checked @endif name="{{ $language_item->key }}" id="{{ $language_item->key }}" value="1">
                                            <label class="custom-control-label font-neue" for="{{ $language_item->key }}">{{ $language_item->value }}</label>
                                        </div>
                                        @endforeach
                                    @break
                                    @default
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input font-neue" @if($parameter_item->value == 1) checked @endif name="{{ $parameter_item->key }}" id="{{ $parameter_item->key }}" value="1">
                                        <label class="custom-control-label" for="{{ $parameter_item->key }}"></label>
                                    </div>
                                @endswitch
                            </div>
                        </div>
                    </div>
                </div>
                @break
                @case('time')
                <div class="row g-3 align-center">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label" for="{{ $parameter_item->key }}">{{ $parameter_item->label_ge }}</label>
                            <span class="form-note font-helvetica-regular">{{ $parameter_item->snippet }}</span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <input type="time" class="form-control font-neue" id="{{ $parameter_item->key }}" name="{{ $parameter_item->key }}" value="{{ $parameter_item->value }}" @if($parameter_item->disabled == 1) disabled @endif>
                            </div>
                        </div>
                    </div>
                </div>
                @break
                @case('select')
                <div class="row g-3 align-center">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label" for="{{ $parameter_item->key }}">{{ $parameter_item->label_ge }}</label>
                            <span class="form-note font-helvetica-regular">{{ $parameter_item->snippet }}</span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <select class="form-control font-neue" id="{{ $parameter_item->key }}" name="{{ $parameter_item->key }}">
                                @if($parameter_item->key == 'default_language')
                                    @foreach($language_list as $language_item)
                                        <option value="{{ $language_item->key }}">{{ $language_item->value }}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @break
                @endswitch
                @endforeach
                <div class="form-group mt-2">
                    <button type="button" class="font-neue btn btn-lg btn-primary" onclick="BasicParameterSubmit()">შენახვა</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ url('assets/cms/js/Custom/ParametersScripts.js') }}"></script>
@endsection