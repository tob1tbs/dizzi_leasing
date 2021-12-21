@extends('cms.layout.layout')

@section('content')
<div class="nk-block nk-block-lg">
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title font-neue">ლიზინგის პარამეტრები</h5>
            </div>
            <form action="#" class="gy-3" id="leasing_parameters">
                <div class="card card-preview">
                    <div class="card-inner">
                        <ul class="nav nav-tabs mt-n3">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tabItem1">ლიზინგი</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabItem2">უკულიზინგი</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabItem3">ტაქსილიზინგი</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabItem1">
                                @foreach($back_leasing_parameters->where('leasing') as $parameter_item)
                                @switch($parameter_item->type)
                                @case('number')
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="{{ $parameter_item->key }}">{{ $parameter_item->label }}</label>
                                            <span class="form-note font-helvetica-regular">{{ $parameter_item->snippet }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control font-neue parameter-input" id="{{ $parameter_item->key }}" name="{{ $parameter_item->key }}" value="{{ $parameter_item->value }}">
                                                <span class="text-danger font-helvetica-regular font-italic error-text error-{{ $parameter_item->key }}"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @endswitch
                                @endforeach
                            </div>
                            <div class="tab-pane" id="tabItem2">
                                @foreach($back_leasing_parameters->where('back_leasing') as $parameter_item)
                                @switch($parameter_item->type)
                                @case('number')
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="{{ $parameter_item->key }}">{{ $parameter_item->label }}</label>
                                            <span class="form-note font-helvetica-regular">{{ $parameter_item->snippet }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control font-neue parameter-input" id="{{ $parameter_item->key }}" name="{{ $parameter_item->key }}" value="{{ $parameter_item->value }}">
                                                <span class="text-danger font-helvetica-regular font-italic error-text error-{{ $parameter_item->key }}"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @endswitch
                                @endforeach
                            </div>
                            <div class="tab-pane" id="tabItem3">
                                @foreach($back_leasing_parameters->where('taxi_leasing') as $parameter_item)
                                @switch($parameter_item->type)
                                @case('number')
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="{{ $parameter_item->key }}">{{ $parameter_item->label }}</label>
                                            <span class="form-note font-helvetica-regular">{{ $parameter_item->snippet }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control font-neue parameter-input" id="{{ $parameter_item->key }}" name="{{ $parameter_item->key }}" value="{{ $parameter_item->value }}">
                                                <span class="text-danger font-helvetica-regular font-italic error-text error-{{ $parameter_item->key }}"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @endswitch
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group mt-2">
                    <button type="button" onclick="LeasingParametersSubmit()" class="btn btn-lg btn-primary font-neue">შენახვა</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ url('assets/cms/js/Custom/LeasingScripts.js') }}"></script>
@endsection