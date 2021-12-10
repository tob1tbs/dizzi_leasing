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
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">გვერდის დასახელება (ქართულად)</label>
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">გვერდის დასახელება (ინგლისურად)</label>
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">გვერდის SLUG (უნიკალური)</label>
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">Meta Description</label>
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">Meta Keywords</label>
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">გვერდის ტექსტი (ქართულად)</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">გვერდის ტექსტი (ინგლისურად)</label>
                                    <textarea class="form-control"></textarea>
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
