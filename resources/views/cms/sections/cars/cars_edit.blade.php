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
                                        <option></option>
                                        @foreach($car_make_list as $make_item)
                                        <option value="{{ $make_item->id }}" @if($car_data->make == $make_item->id) selected @endif>{{ $make_item->name }}</option>
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
                                    <input type="hidden" name="old_photo" value="{{ $car_data->photo }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="photo_main">დამატებითი სურათები</label>
                                    <div id="gallery_photo"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row g-gs">
                                    @foreach($car_gallery as $gallery_item)
                                    <div class="col-sm-6 col-lg-3 gallery_item-{{ $gallery_item->id }}">
                                        <div class="gallery card card-bordered">
                                            <a class="gallery-image popup-image" href="{{ url('uploads/cars/'.$gallery_item->car_id.'/gallery/'.$gallery_item->photo) }}"><img class="w-100 rounded-top" src="{{ url('uploads/cars/'.$gallery_item->car_id.'/gallery/'.$gallery_item->photo) }}" alt="" /></a>
                                        </div>
                                        <div class="gallery-body card-inner align-center justify-between flex-wrap g-2">
                                            <div class="user-info">
                                                <span class="lead-text font-neue" style="cursor: pointer;" onclick="DeleteGalleryPhoto({{ $gallery_item->id }})">წაშლა</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="description_ge">აღწერა ქართულად</label>
                                    <textarea class="summernote" name="description_ge">{{ json_decode($car_data->description, true)['ge'] }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-control-wrap mb-2">
                                    <label class="form-label" for="description_en">აღწერა ინგლისურად</label>
                                    <textarea class="summernote" name="description_en">{{ json_decode($car_data->description, true)['en'] }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-preview">
                    <div class="card-inner">
                        <div class="row">
                            @foreach($option_list as $option_item)
                            <div class="col-6">
                                <div class="form-control-wrap mb-2">
                                    @switch($option_item['type'])
                                    @case('input')
                                    <label class="form-label" for="{{ $option_item['key'] }}">{{ $option_item['name'] }}</label>
                                    <input type="text" class="form-control font-neue" name="option[{{ $option_item['key'] }}]" id="{{ $option_item['key'] }}" value="{{ $car_parameter_list[$option_item['key']]['value'] }}">
                                    @break
                                    @case('select')
                                    <label class="form-label" for="{{ $option_item['key'] }}">{{ $option_item['name'] }}</label>
                                    <select class="form-control font-neue" name="option[{{ $option_item['key'] }}]" id="{{ $option_item['key'] }}">
                                    @foreach($option_item['option'] as $item)
                                        <option value="{{ $item['id'] }}">{{ json_decode($item['value'])->ge }}</option>
                                    @endforeach
                                    </select>
                                    @break
                                    @case('date')
                                    <label class="form-label" for="{{ $option_item['key'] }}">{{ $option_item['name'] }}</label>
                                    <input type="text" class="form-control font-neue date-picker-alt" name="option[{{ $option_item['key'] }}]" id="{{ $option_item['key'] }}" data-date-format="yyyy" value="{{ $car_parameter_list[$option_item['key']]['value'] }}">
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

        $.ajax({
            dataType: 'json',
            url: "/cms/ajax/ajaxCarMake",
            type: "GET",
            data: {
                make_id: $("#make").val(),
            },
            success: function(data) {
                if(data['status'] == true) {
                    if(data['CarModelList'].length > 0) {
                        $("#model").html('');
                        $.each(data['CarModelList'], function(key, value) {
                            $("#model").append(`<option value='`+value['id']+`'>`+value['name']+`</option>`)
                        });
                        $("#model").attr('disabled', false);
                    } else {
                        $("#model").attr('disabled', true);
                    }
                } else {
                    Swal.fire({
                      icon: 'error',
                      text: data['message'],
                    })
                }
            }
        });
    });
</script>
@endsection