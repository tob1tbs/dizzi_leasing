@extends('web.layout.layout')

@section('content')
<main>
	<section class="banner-area-2 loan-banner"></section>
    <section class="pb-40 bg_white" style="padding: 100px 0 50px 0;">
        <div class="container">
            <div class="section-title">
                <h2 class="wow fadeInUp neue">{{ trans('site.faq') }}</h2>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="faq-widget">
                        <div class="accordion" id="accordionExample">
                        	@foreach($faq_list as $faq_item)
                            <div class="single-widget-one wow fadeInUp px-sm-5 px-4" data-wow-delay="0.7s">
                                <div class="widget-icon">
                                    <i class="icon_question_alt2 "></i>
                                </div>
                                <div class="w-100">
                                    <div class="faq-header" id="headingFour{{ $faq_item['id'] }}">
                                        <h4 class="mb-0 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour{{ $faq_item['id'] }}" aria-expanded="true" aria-controls="collapseFour{{ $faq_item['id'] }}">
                                            {{ json_decode($faq_item['title'])->{app()->getLocale()} }}
                                            <i class="icon_plus"></i><i class="icon_minus-06"></i>
                                        </h4>
                                    </div>
                                    <div id="collapseFour{{ $faq_item['id'] }}" class="collapse" aria-labelledby="headingFour{{ $faq_item['id'] }}" data-bs-parent="#accordionExample">
                                        <div class="faq-body pr-lg-130">
                                            {!! json_decode($faq_item['value'])->{app()->getLocale()} !!}
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
@endsection