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
                                        <h4 class="mb-0 collapsed helvetica-regular" aria-expanded="true">
                                            {{ trans('site.tbilisi') }} - {{ $parameterItems['address_ge'][0] }}
                                            <i class="icon_plus"></i>
                                            <i class="icon_minus-06"></i>
                                        </h4>
                                    </div>
                                </div>
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