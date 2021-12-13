@extends('cms.layout.layout')

@section('css')
<link rel="stylesheet" href="{{ url('assets/cms/css/summernote.css') }}">
@endsection

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">ახალი ბლოგის დამატება</h4>
        </div>  
    </div>
</div>
<div class="nk-block nk-block-lg">
    <form id="cars_form">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-preview">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">ბლოგის დასახელება (ქართულად)</label>
                                    <input type="text" class="form-control font-neue" name="title_ge" id="title_ge">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">ბლოგის დასახელება (ინგლისურად)</label>
                                    <input type="text" class="form-control font-neue" name="title_en" id="title_en">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">ბლოგის სურათი</label>
                                    <input type="file" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">ბლოგის ტექსტი (ქართულად)</label>
                                    <input type="text" class="form-control font-neue" name="text_ge" id="text_ge">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">ბლოგის ტექსტი (ინგლისურად)</label>
                                    <input type="text" class="form-control font-neue" name="text_en" id="text_en">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <button class="btn btn-success font-neue" type="button" onclick="BlogAddSubmit()">შენახვა</button>
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
<script src="{{ url('assets/cms/js/Custom/BlogsScripts.js') }}"></script>
<script src="{{ url('assets/cms/js/summernote.js') }}"></script>
<script src="{{ url('assets/cms/js/editors.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endsection