@extends('web.layout.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/intlTelInput.css') }}" media="all" />
@endsection

@section('content')
<main>
	<section class="banner-area-2 loan-banner pt-145"></section>
    <section class="pb-40 bg_white" style="padding: 100px 0 50px 0;">
    <div class="section-title">
        <h1 class="wow neue fadeInUp" style="font-size: 30px;">{{ trans('site.servis_centers') }}</h1>
    </div>
    <div class="container">
    	<div class="row">
            <div class="col-lg-12">  
                <div class="span4 " id="width" style="width: 100%;">
                    <div style="width: 100%; overflow: hidden; height: 440px;">
                        <iframe src="https://www.google.com/maps/d/embed?mid=146Pr_Z6g0jdIVLCEVQa3krPMXUbAtYNW&ehbc=2E312F" width="100%" height="480" style="margin-top: -54px;"></iframe>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mx-auto">
                    <div class="faq-widget">
                        <div class="accordion" id="accordionExample">
                            <div class="single-widget-one wow fadeInUp" data-wow-delay="0.1s">
                                <div class="widget-icon">
                                    <img src="{{ url('assets/web/img/cta/google-maps.png') }}">
                                </div>
                                <div class="w-100">
                                    <div class="faq-header" id="headingOne">

                                        <h4 class="mb-0 collapsed helvetica-regular" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{ trans('site.tbilisi') }}
                                            <i class="icon_plus"></i>
                                            <i class="icon_minus-06"></i>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-bs-parent="#accordionExample">
                                        <div class="faq-body">
                                            <p>{{ $parameterItems['address_ge'][0] }}
                                                <!--  -->
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="calculator-widget" style="margin-top: 40px;">
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
                                <div class="single-range mt-85 mb-65">
                                    <div class="range-header d-flex flex-wrap justify-content-between align-items-center mb-25">
                                        <h6 class="helvetica-regular">{{ trans('site.leasing_month') }}</h6>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li><span class="active_bar"></span></li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active month-tab" id="monthTab" data-bs-toggle="tab" href="#monthTabId" role="tab" aria-controls="monthTabId" aria-selected="true">თვე</a>
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
                                <div class="single-range mb-95">
                                    <div class="range-header d-flex justify-content-between align-items-center mb-25">
                                        <h6 class="helvetica-regular">{{ trans('site.advance_payment') }} {{ trans('site.gel') }}</h6>
                                        <input type="text" id="PercetSetRangeAmount" value="{{ $parameterLeasing['leasing_price_default'][0] / 100 * $parameterLeasing['leasing_avanse_percent_default'][0] }}">
                                    </div>
                                    <div class="range-header d-flex justify-content-between align-items-center mb-25">
                                        <h6 class="helvetica-regular">{{ trans('site.advance_payment') }} %</h6>
                                        <input type="text" id="PercetSetRange" value="{{ $parameterLeasing['leasing_avanse_percent_default'][0] }}">
                                    </div>
                                    <div id="PercetRangeSlider"></div>
                                </div>
                                <div class="row mt-lg-20 mt-25 text-center">
                                    <div class="col-6">
                                        <h4 class="mb-1 neue" style="font-size: 23px;">{{ trans('site.month_price') }}</h4>
                                        <h1 class="m-0" id="emiAmount"></h1>
                                    </div>
                                    <div class="col-6">
                                        <h4 class="mb-1 neue" style="font-size: 23px;">{{ trans('site.advance_payment') }}</h4>
                                        <h1 class="m-0" id="emiAmount2"></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 pl-lg-35">
                            <div class="calculator-result-widget bg_disable wow fadeInUp" data-wow-delay="0.3s">
                                <div>
                                    <h4 for="inputPhoneNumber" class="neue" style="margin-bottom: 1rem;">{{ trans('site.make_order') }} *</h4>
                                    <i class="helvetica-regular" style="font-size: 12px; float: left; width: 100%; margin-bottom: 10px;">{{ trans('site.exmpl') }}: 595111111</i>
                                    <input id="inputPhoneNumber" class="form-control" type="number" name="phone_number">
                                    <span class="error-message text-danger helvetica-regular" style="float: left; width: 100%; margin-top: 10px;"></span>
                                </div>
                                <div id="terms" style="margin-top: 15px; width: 100%; float: left;">
                                    <input type="checkbox" style="float: left; margin-top: 10px;" name="terms" id="terms" checked>
                                    <label for="terms" class="helvetica-regular" style="font-size: 14px; float: left; width: 100%; margin-left: 15px;"> {{ trans('site.accept_marketing') }}
                                        <br>
                                        <a href="#0" style="font-size: 16px; text-decoration: underline; color: #f0c019;">{{ trans('site.read_more') }}</a>
                                    </label>
                                </div>
                                <input type="hidden" name="leasing_type" value="1">
                                <button type="button" onclick="LesingFormSubmit()" class="theme-btn theme-btn-lg mt-40 neue">{{ trans('site.submit_now') }}<i class="arrow_right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<style type="text/css">
    #emiAmount2, #emiAmount {
        color: #5651a1;
        font-size: 42px;
    }
</style>
@endsection

@section('js')
<script type="text/javascript" src="{{ url('assets/web/js/calculate.js') }}"></script>
@endsection