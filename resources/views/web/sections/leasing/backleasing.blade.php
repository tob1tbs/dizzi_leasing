@extends('web.layout.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/intlTelInput.css') }}" media="all" />
@endsection

@section('content')
<main>
    <section class="banner-area-2 loan-banner pt-145"></section>
    <section class="pb-20 bg_white" style="padding: 80px 0 0 0">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 mx-auto">
                    <div class="section-title">
                        <h2 class="wow fadeInUp neue">{{ trans('site.leasing') }}</h2>
                    </div>
                </div>
            </div>
            <div class="calculator-widget">
                <div class="row  gy-lg-0 gy-3">
                    <div class="col-lg-7">
                        <div class="single-calculator-widget wow fadeInUp" data-wow-delay="0.1s">
                            <div class="single-range">
                                <div class="range-header d-flex justify-content-between align-items-center mb-25">
                                    <h6 class="helvetica-regular">{{ trans('site.leasing_amount') }}</h6>
                                    <input type="text" id="SetRange" value="{{ $parameterLeasing['leasing_price_default'][0] }}">
                                </div>
                                <div id="RangeSlider"></div>
                            </div>
                            <div class="single-range mt-85 mb-95">
                                <div class="range-header d-flex flex-wrap justify-content-between align-items-center mb-25">
                                    <h6 class="helvetica-regular">{{ trans('site.leasing_month') }}</h6>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li><span class="active_bar"></span></li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active month-tab" id="monthTab" data-bs-toggle="tab" href="#monthTabId" role="tab" aria-controls="monthTabId"aria-selected="true">თვე</a>
                                        </li>
                                    </ul>
                                    <input type="text" id="SetMonthRange" value="{{ $parameterLeasing['leasing_month_default'][0] }}">
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="monthTabId" role="tabpanel" aria-labelledby="monthTab">
                                        <div id="MonthRangeSlider"></div>
                                    </div>
                                    <div class="fade" id="yearTabId" role="tabpanel">
                                        <div id="YearRangeSlider"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-lg-20 mt-25 text-center">
                                <div class="col-12">
                                    <h4 class="mb-1 neue">{{ trans('site.month_price') }}</h4>
                                    <h1 class="m-0" id="emiAmount"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 pl-lg-35">
                        <div class="calculator-result-widget bg_disable wow fadeInUp" data-wow-delay="0.3s">
                            <div>
                                <h4 for="inputPhoneNumber" class="neue" style="margin-bottom: 1rem;">{{ trans('site.phone') }} *</h4>
                                <i class="helvetica-regular" style="font-size: 12px; float: left; width: 100%; margin-bottom: 10px;">{{ trans('site.exmpl') }}: 595111111</i>
                                <input id="inputPhoneNumber" class="form-control" type="tel" pattern="[0-9]{9}" name="phone_number" maxlength="9">
                                <span class="error-message text-danger helvetica-regular" style="float: left; width: 100%; margin-top: 10px;"></span>
                            </div>
                            <div id="terms" style="margin-top: 15px; width: 100%; float: left;">
                                <input type="checkbox" style="float: left; margin-top: 10px;" name="terms" id="terms">
	                            <label for="terms" class="helvetica-regular" style="font-size: 14px; float: left; width: 100%; margin-left: 15px;"> {{ trans('site.accept_marketing') }}
	                            	<br>
	                                <a href="#0" style="font-size: 16px; text-decoration: underline; color: #f0c019;">{{ trans('site.read_more') }}</a>
	                            </label>
                            </div>
                            <input type="hidden" name="leasing_type" value="1">
                            <button type="button" onclick="BackLesingFormSubmit()" class="theme-btn theme-btn-lg mt-40 neue">{{ trans('site.submit_now') }}<i class="arrow_right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial-area pt-60 pb-60 bg_white">
        <div class="container">
            <div class="section-title d-md-none mb-4">
                <h2 class="neue">{{ trans('site.get_cars_from_our_partners') }}</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 pr-lg-35">
                    <div class="testimonial-slider-3">
                    	@foreach($car_list as $car_list_item)
                        <a href="{{ route('actionCarsView', $car_list_item->id) }}">
                            <div class="testimonial-widget-2 wow fadeInUp" data-wow-delay="0.1s">
                                <img src="{{ url('uploads/cars/main/'.$car_list_item->photo) }}" alt="client" style="height: 200px; width: 100%;">
                                <div class="client-info">
                                    <p>{{ $car_list_item->carMake->name }} {{ $car_list_item->carModel->name }}</p>
                                    <span>{{ $car_list_item->price}} $</span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 ">
                    <div class="h-100 d-flex flex-column justify-content-between">
                        <div class="section-title text-start d-none d-md-block">
                            <h2 class="wow fadeInRight neue">{{ trans('site.get_cars_from_our_partners') }}</h2>
                        </div>
                        <div class="testimonial-slider-2">
                        	@foreach($car_list as $car_list_item)
                            <a href="{{ route('actionCarsView', $car_list_item->id) }}">
                                <div class="testimonial-widget-2 wow fadeInUp" data-wow-delay="0.1s">
                                    <img src="{{ url('uploads/cars/main/'.$car_list_item->photo) }}" alt="client" style="height: 200px; width: 100%;">
                                    <div class="client-info">
                                        <p>{{ $car_list_item->carMake->name }} {{ $car_list_item->carModel->name }}</p>
                                        <span>{{ $car_list_item->price}} $</span>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('js')
<script type="text/javascript" src="{{ url('assets/web/js/back_calculate.js') }}"></script>
@endsection