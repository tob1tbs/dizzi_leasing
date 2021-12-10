@extends('cms.layout.layout')

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
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">ბლოგის დასახელება (ინგლისურად)</label>
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">კატეგორია</label>
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">ბლოგის სურათი</label>
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">ბლოგის ტექსტი (ქართულად)</label>
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">ბლოგის ტექსტი (ინგლისურად)</label>
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">ბლოგის ტექსტი (ქართულად)</label>
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">ბლოგის ტექსტი (ინგლისურად)</label>
                                    <input type="text" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form
></div>
@endsection