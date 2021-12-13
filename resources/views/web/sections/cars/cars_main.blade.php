@extends('web.layout.layout')

@section('content')
<main>
	<section class="banner-area-2 loan-banner pt-145"></section>
    <section class="pb-40 bg_white" style="padding: 100px 0 40px 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-sidebar-widget ps-lg-2 blog-share-widget" style="margin-bottom: 40px;">
	                    <div class="marketbg">
	                        <form action="#" class="mt-15">
	                        	<div class="row price-slider">
	                        		<div class="col-lg-12">
			                            <h4 class="widget-title mb-15 pt-20 pb-0 helvetica-regular" style="font-size: 15px;">{{ trans('site.car_make') }}:</h4>
			                            <select class="market" name="car_make" id="make" onchange="GetCarModelList()" style="font-size: 13px;">
			                            	<option value="0"></option>
			                            	@foreach($car_make_list as $make_item)
			                                <option value="{{ $make_item->id }}" @if($make_item->id == request()->car_make) selected @endif>{{ $make_item->name }}</option>
			                                @endforeach
			                            </select>
			                        </div>
			                        <div class="col-lg-12">
			                            <h4 class="widget-title mb-15 pt-20 pb-0 helvetica-regular" style="font-size: 15px;">{{ trans('site.car_model') }}:</h4>
			                            <select class="market" name="car_model" id="model" style="font-size: 13px;">
			                            	<option value="0"></option>
			                            </select>
			                        </div>
		                         	<h4 class="widget-title mb-15 pt-20 pb-0 helvetica-regular" style="font-size: 15px; ">{{ trans('site.price') }}</h4>
                                   	<div class="col-lg-6 col-12">
                                		<h4 style="font-size: 14px;" class="helvetica-regular">{{ trans('site.from') }}</h4>
                                        <input type="number" class="market" name="price_from" value="{{ request()->price_from }}" min="0" max="" style="margin-top: 10px;">	
                                    </div>
                                    <div class="col-lg-6 col-12">
                                    	<h4 style="font-size: 14px;" class="helvetica-regular">{{ trans('site.to') }}</h4>
                                        <input type="number" class="market" name="price_to" value="{{ request()->price_to }}" min="0" max="" style="margin-top: 10px;">
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 15px">
                                      <div id="slider-range"></div>
                                    </div>
                                  </div>
                                  <div class="row slider-labels">
                                    <div class="col-xs-6 caption">
                                      <strong>Min:</strong> <!-- <span id="slider-range-value1"></span> -->
                                    </div>
                                    <div class="col-xs-6 text-right caption">
                                      <strong>Max:</strong> <!-- <span id="slider-range-value2"></span> -->
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-12">
                                      <form>
                                        <input type="hidden" name="min-value" value="">
                                        <input type="hidden" name="max-value" value="">
                                      </form>
                                    </div>
		                         	<h4 class="widget-title mb-15 pt-20 pb-0 helvetica-regular" style="font-size: 15px; ">{{ trans('site.car_year') }}</h4>
                                   	<div class="col-lg-6 col-12">
                                		<h4 style="font-size: 14px;" class="helvetica-regular">{{ trans('site.from') }}</h4>
                                    	<select class="market" name="year_from" id="year_from" style="font-size: 13px;">
			                            	<option value="0"></option>
	                                        @foreach($car_year as $year_item)
	                                        <option value="{{ $year_item }}" @if($year_item == request()->year_from) selected @endif>{{ $year_item }}</option>
	                                        @endforeach
			                            </select>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                    	<h4 style="font-size: 14px;" class="helvetica-regular">{{ trans('site.to') }}</h4>
                                        <select class="market" name="year_to" id="year_to" style="font-size: 13px;">
			                            	<option value="0"></option>
	                                        @foreach($car_year as $year_item)
	                                        <option value="{{ $year_item }}" @if($year_item == request()->year_to) selected @endif>{{ $year_item }}</option>
	                                        @endforeach
			                            </select>
                                    </div>
		                         	<h4 class="widget-title mb-15 pt-20 pb-0 helvetica-regular" style="font-size: 15px; ">{{ trans('site.engine_volume') }}</h4>
                                   	<div class="col-lg-6 col-12">
                                		<h4 style="font-size: 14px;" class="helvetica-regular">{{ trans('site.from') }}</h4>
                                    	<select class="market" name="engine_from" id="engine_from" style="font-size: 13px;">
			                            	<option value="0"></option>
	                                        @foreach($car_engine as $engine_item)
	                                        <option value="{{ $engine_item }}" @if($engine_item == request()->engine_from) selected @endif>{{ $engine_item }}</option>
	                                        @endforeach
			                            </select>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                    	<h4 style="font-size: 14px;" class="helvetica-regular">{{ trans('site.to') }}</h4>
                                        <select class="market" name="engine_to" id="engine_to" style="font-size: 13px;">
			                            	<option value="0"></option>
	                                        @foreach($car_engine as $engine_item)
	                                        <option value="{{ $engine_item }}" @if($engine_item == request()->engine_to) selected @endif>{{ $engine_item }}</option>
	                                        @endforeach
			                            </select>
                                    </div>
		                         	<h4 class="widget-title mb-15 pt-20 pb-0 helvetica-regular" style="font-size: 15px; ">{{ trans('site.millage') }}</h4>
                                   	<div class="col-lg-6 col-12">
                                		<h4 style="font-size: 14px;" class="helvetica-regular">{{ trans('site.from') }}</h4>
                                        <input type="input" class="market" name="millage_from" value="{{ request()->millage_from }}" style="margin-top: 10px;">	
                                    </div>
                                    <div class="col-lg-6 col-12">
                                    	<h4 style="font-size: 14px;" class="helvetica-regular">{{ trans('site.to') }}</h4>
                                        <input type="input" class="market" name="millage_to" value="{{ request()->millage_to }}" style="margin-top: 10px;">
                                    </div>
			                        @foreach($car_option_array as $option_item)
			                        <div class="col-lg-12">
			                            <h4 class="widget-title mb-15 pt-20 pb-0 helvetica-regular" style="font-size: 15px;">{{ $option_item['name']->{app()->getLocale()} }}</h4>
					                        @switch($option_item['type'])
					                        @case('input')
		                                    <input type="text" class="market font-neue" name="option[{{ $option_item['key'] }}]" id="{{ $option_item['key'] }}" value="">
		                                    @break
					                        @case('select')
		                                    <select class="market font-neue" name="option[{{ $option_item['key'] }}]" id="{{ $option_item['key'] }}" style="font-size: 13px;">
		                                    	<option value="0"></option>
			                                    @foreach($option_item['option'] as $item)
		                                        <option value="{{ $item['id'] }}">{{ json_decode($item['value'])->{app()->getLocale()} }}</option>
			                                    @endforeach
		                                    </select>
					                        @break
					                        @case('date')
		                                    <input type="text" class="market font-neue date-picker-alt" name="option[{{ $option_item['key'] }}]" id="{{ $option_item['key'] }}" data-date-format="yyyy">
		                                    @break
			                        @endswitch
			                        </div>
			                        @endforeach
		                        </div>
		                        <input type="submit" value="{{ trans('site.search') }}" style="width: 100%; height: 40px; background: #f0c019; border-radius: 5px; margin-top: 20px; border: none; color: #ffffff; font-family: 'HelveticaRegular';">
	                        </form>
	                    </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog-post-widget">
                        <div class="row gy-4 ">
                        	@foreach($car_list as $car_item)
                            <div class="col-md-6">
                                <div class="blog-widget-2 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="blog-img">
                                        <img src="{{ url('uploads/cars/main/'.$car_item['car_photo']) }}" style="height: 300px;" alt="blog-img">
                                        <div class="catagory bg_primary">{{ $car_item['car_price'] }} $</div>
                                    </div>
                                    <div class="blog-content">
                                        <h4>{{ $car_item['car_make'] }} {{ $car_item['car_model'] }}</h4>
                                        <p>{{ $car_item['car_year'] }}</p>
                                        <hr>
                                        <div class="post-info">
                                            <div class="author">
                                                <img src="{{ url('assets/web/img/blog/user-profile.svg') }}" alt="user profile">
                                                <span>თვეში 550  ₾ - დან</span>
                                            </div>
                                            <div class="post-date"> 
                                               <a href="{{ route('actionCarsView', $car_item['car_id']) }}" class="theme-btn neue">{{ trans('site.more') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<style type="text/css">
	.theme-btn {
		height: 30px;
		line-height: 30px;
		font-size: 15px;
		border-radius: 5px;
		padding: 0 20px;
	}
	
	.slider-labels {
  margin-top: 10px;
}

/* Functional styling;
 * These styles are required for noUiSlider to function.
 * You don't need to change these rules to apply your design.
 */
.noUi-target,.noUi-target * {
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -ms-touch-action: none;
  touch-action: none;
  -ms-user-select: none;
  -moz-user-select: none;
  user-select: none;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

.noUi-target {
  position: relative;
  direction: ltr;
}

.noUi-base {
  width: 100%;
  height: 100%;
  position: relative;
  z-index: 1;
/* Fix 401 */
}

.noUi-origin {
  position: absolute;
  right: 0;
  top: 0;
  left: 0;
  bottom: 0;
}

.noUi-handle {
  position: relative;
  z-index: 1;
}

.noUi-stacking .noUi-handle {
/* This class is applied to the lower origin when
   its values is > 50%. */
  z-index: 10;
}

.noUi-state-tap .noUi-origin {
  -webkit-transition: left 0.3s,top .3s;
  transition: left 0.3s,top .3s;
}

.noUi-state-drag * {
  cursor: inherit !important;
}

/* Painting and performance;
 * Browsers can paint handles in their own layer.
 */
.noUi-base,.noUi-handle {
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}

/* Slider size and handle placement;
 */
.noUi-horizontal {
  height: 4px;
}

.noUi-horizontal .noUi-handle {
  width: 18px;
  height: 18px;
  border-radius: 50%;
  left: -7px;
  top: -7px;
  background-color: #345DBB;
}

/* Styling;
 */
.noUi-background {
  background: #D6D7D9;
}

.noUi-connect {
  background: #345DBB;
  -webkit-transition: background 450ms;
  transition: background 450ms;
}

.noUi-origin {
  border-radius: 2px;
}

.noUi-target {
  border-radius: 2px;
}

.noUi-target.noUi-connect {
}

/* Handles and cursors;
 */
.noUi-draggable {
  cursor: w-resize;
}

.noUi-vertical .noUi-draggable {
  cursor: n-resize;
}

.noUi-handle {
  cursor: default;
  -webkit-box-sizing: content-box !important;
  -moz-box-sizing: content-box !important;
  box-sizing: content-box !important;
}

.noUi-handle:active {
  border: 8px solid #345DBB;
  border: 8px solid rgba(53,93,187,0.38);
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  left: -14px;
  top: -14px;
}

/* Disabled state;
 */
[disabled].noUi-connect,[disabled] .noUi-connect {
  background: #B8B8B8;
}

[disabled].noUi-origin,[disabled] .noUi-handle {
  cursor: not-allowed;
}
</style>
@endsection

@section('js')
<script type="text/javascript" src="{{ url('assets/web/js/car_slider.js') }}"></script>
<script type="text/javascript">
	function GetCarModelList() {
	    $.ajax({
	        dataType: 'json',
	        url: "/ajax/ajaxCarMake",
	        type: "GET",
	        data: {
	            make_id: $("#make").val(),
	        },
	        success: function(data) {
	            if(data['status'] == true) {
	                if(data['CarModelList'].length > 0) {
	                    $("#model").html('');
	                    var html = '<option value="0">{{ trans('site.choise_car_model') }}</option>';
                    	var Selected = '';
	                    $.each(data['CarModelList'], function(key, value) {
                    	@if(!empty(request()->car_model))
                    	if(value['id'] == {{ request()->car_model }}) {
                    		var Selected = 'Selected';
                    	} else {
                    		var Selected = '';
                    	}
                    	@endif
                        html += `<option value='`+value['id']+`' `+Selected+`>`+value['name']+`</option>`
	                    });
	                    $("#model").append(html);
	                    $("#model").attr('disabled', false);
	                } else {
	                    $("#model").attr('disabled', true);
	                }
	            }
	        }
	    });
	}

	GetCarModelList();
</script>
@endsection