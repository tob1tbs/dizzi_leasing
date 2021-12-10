@extends('cms.layout.layout')

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">თარგმნების ჩამონათვალი</h4>
        </div>    
        <div class="nk-block-head-content">
            <ul class="nk-block-tools g-3">
                <li>
                    <a href="javascript:;" class="btn btn-white btn-outline-light" onclick="TranslateAddModal()">
                        <em class="icon ni ni-plus"></em>
                        <span class="font-helvetica-regular">ახალი თარგმანი</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="nk-block nk-block-lg">
    <div class="card card-bordered">
        <div class="card-inner">
            @foreach($translate_list as $translate_item)
            <form action="#" class="gy-3" id="translate_form_{{ $translate_item->id }}">
                <div class="row g-3 align-center">
                    <div class="col-lg-1">
                        <div class="form-group">
                            <label class="form-label"><br>ID: {{ $translate_item->id }}</label>
                            <input type="hidden" name="translate_id" value="{{ $translate_item->id }}">
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <label class="form-label">KEY</label>
                                <input type="text" class="form-control font-neue" name="translate_key" value="{{ $translate_item->key }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <label class="form-label">თარგმანი ქართულად</label>
                                <input type="text" class="form-control font-neue" name="translate_ge" value="{{ json_decode($translate_item->value, true)['ge'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <label class="form-label">თარგმანი ინგლისურად</label>
                                <input type="text" class="form-control font-neue" name="translate_en" value="{{ json_decode($translate_item->value, true)['en'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <label class="form-label">&nbsp;</label>
                                <button class="form-control btn btn-success" type="button" onclick="TranslateUpdateSubmit({{ $translate_item->id }})">
                                    <span class="text-center">
                                        <em class="icon ni ni-save"></em>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="form-group">
                            <div class="form-control-wrap">
                                <label class="form-label">&nbsp;</label>
                                <button class="form-control btn btn-danger" type="button" onclick="DeleteTranslate({{ $translate_item->id }})">
                                    <span class="text-center">
                                        <em class="icon ni ni-trash-fill"></em>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</div>
<div class="modal fade" id="TranslateAddModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-neue">ახალი თარგმნის დამატება</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <form action="#" class="form-validate is-alter" id="translate_form">
                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-control-wrap">
                                <label class="form-label">KEY</label>
                                <input type="text" class="form-control font-neue translate-input error-translate_key" name="translate_key" id="translate_key" value="">
                                <span class="text-danger font-helvetica-regular font-italic error-text error-translate_key"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-control-wrap">
                                <label class="form-label">თარგმანი ქართულად</label>
                                <input type="text" class="form-control font-neue translate-input error-translate_ge" name="translate_ge" id="translate_ge" value="">
                                <span class="text-danger font-helvetica-regular font-italic error-text error-translate_ge"></span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-control-wrap">
                                <label class="form-label">თარგმანი ინგლისურად</label>
                                <input type="text" class="form-control font-neue translate-input error-translate_en" name="translate_en" id="translate_en" value="">
                                <span class="text-danger font-helvetica-regular font-italic error-text error-translate_en"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-3">
                            <button class="btn btn-success font-neue" type="button" onclick="TranslateSubmit()">შენახვა</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ url('assets/cms/js/Custom/ParametersScripts.js') }}"></script>
@endsection