@extends('cms.layout.layout')

@section('css')
<link rel="stylesheet" href="{{ url('assets/cms/css/summernote.css') }}">
@endsection

@section('content')
<div class="nk-block-head">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title font-neue">ახალი ავტომობილის დამატება</h4>
        </div>    
    </div>
</div>
<div class="nk-block nk-block-lg">
    <form id="cars_form">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-preview">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="make">ავტომობილის მარკა</label>
                                    <select class="form-control font-neue" name="make" id="make" onchange="GetCarModelList()">
                                        <option value="0"></option>
                                        @foreach($car_make_list as $make_item)
                                        <option value="{{ $make_item->id }}" @if($make_item->id == $car_data->make) selected @endif)>{{ $make_item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="make">ავტომობილის მოდელი</label>
                                    <select class="form-control font-neue" name="model" id="model" disabled>

                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">მთავარი ფოტო</label>
                                    <input type="file" class="form-control font-neue" name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">დამატებითი სურათები</label>
                                    <div id="gallery_photo"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="description_ge">აღწერა ქართულად</label>
                                    <textarea class="summernote" name="description_ge"></textarea>
                                </div>
                            </div>
                            <!-- <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="description_en">აღწერა ინგლისურად</label>
                                    <textarea class="summernote" name="description_en"></textarea>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-preview">
                    <div class="card-inner">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="">ფასი</label>
                                    <input type="text" class="form-control font-neue" name="car_price" id="car_price" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="">გამოშვების წელი</label>
                                    <select class="form-control font-neue" name="car_year" id="car_year">
                                        <option value="0"></option>
                                        @foreach($car_year as $year_item)
                                        <option value="{{ $year_item }}">{{ $year_item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="">გარბენი</label>
                                    <input type="text" class="form-control font-neue" name="car_millage" id="car_millage" value="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="">ძრავის მოცულობა</label>
                                    <select class="form-control font-neue" name="car_engine_volume" id="car_engine_volume">
                                        <option value="0"></option>
                                        @foreach($car_engine as $engine_item)
                                        <option value="{{ $engine_item }}">{{ $engine_item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @foreach($option_list as $option_item)
                            <div class="col-lg-6 col-12">
                                <div class="form-control-wrap mb-2">
                                    @switch($option_item['type'])
                                    @case('input')
                                    <label class="form-label" for="{{ $option_item['key'] }}">{{ $option_item['name'] }}</label>
                                    <input type="text" class="form-control font-neue" name="option[{{ $option_item['key'] }}]" id="{{ $option_item['key'] }}" value="">
                                    @break
                                    @case('select')
                                    <label class="form-label" for="{{ $option_item['key'] }}">{{ $option_item['name'] }}</label>
                                    <select class="form-control font-neue" name="option[{{ $option_item['key'] }}]" id="{{ $option_item['key'] }}">
                                    <option value="0"></option>
                                    @foreach($option_item['option'] as $item)
                                        <option value="{{ $item['id'] }}">{{ json_decode($item['value'])->ge }}</option>
                                    @endforeach
                                    </select>
                                    @break
                                    @case('date')
                                    <label class="form-label" for="{{ $option_item['key'] }}">{{ $option_item['name'] }}</label>
                                    <input type="text" class="form-control font-neue date-picker-alt" name="option[{{ $option_item['key'] }}]" id="{{ $option_item['key'] }}" data-date-format="yyyy">
                                    @break
                                    @endswitch
                                </div>
                            </div>
                            @endforeach
                            <div class="col-12">
                                <button class="btn btn-success font-neue" type="button" onclick="CarsAddSubmit()">შენახვა</button>
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
<script src="{{ url('assets/cms/js/Custom/CarScripts.js') }}"></script>
<script src="{{ url('assets/cms/js/summernote.js') }}"></script>
<script src="{{ url('assets/cms/js/editors.js') }}"></script>
<script type="text/javascript">
    $("#year").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years",
        autoclose:true //to close picker once year is selected
    });

    $(document).ready(function() {
        $('.summernote').summernote();
        $('#gallery_photo').imageUploader({
            imagesInputName: 'gallery_photo',
            maxFiles: 5,
        });
    });
</script>
@endsection