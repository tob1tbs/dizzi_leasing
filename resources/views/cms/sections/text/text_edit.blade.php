@extends('cms.layout.layout')

@section('css')
<link rel="stylesheet" href="{{ url('assets/cms/css/summernote.css') }}">
@endsection

@section('content')
<div class="nk-block nk-block-lg">
    <form id="cars_form">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-preview">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="page_title">გვერდის დასახელებ</label>
                                    <input type="text" class="form-control font-neue" value="{{ $text_page_data->title }}" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="page_text">გვერდის ტექსტი</label>
                                    <div class="summernote-basic">{{ $text_page_data->value }}</div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-2">
                                    <button type="button" class="font-neue btn btn-lg btn-primary" onclick="TextPageSubmit()">შენახვა</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')

@endsection
