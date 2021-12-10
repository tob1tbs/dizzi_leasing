@extends('web.layout.layout')

@section('content')
<main>
	<section class="banner-area-2 loan-banner pt-145"></section>
    <section class="pb-40 bg_white" style="padding: 100px 0 0 0">
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
			                                    <input type="text" class="market font-neue" name="option[{{ $option_item['key'] }}]" id="{{ $option_item['key'] }}" value="{{ request()->option[$option_item['key']] }}">
			                                    @break
					                        @endswitch
			                        </div>
			                        @endforeach
		                        </div>
		                        <input type="submit" name="">
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
</style>
@endsection

@section('js')
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