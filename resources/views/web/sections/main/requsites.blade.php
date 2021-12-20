@extends('web.layout.layout')

@section('content')
<main>
	<section class="banner-area-2 loan-banner"></section>
    <section class="pb-20 bg_white" style="padding: 80px 0 0 0">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mx-auto pt-20 pt-lg-50 pb-20">
					<div class="section-title">
						<h2 class="wow fadeInUp neue">{{ trans('site.requisites') }}</h2>
					</div>
				</div>
			</div>
			<div class="row">
				@foreach($requsites as $item)
				<div class="col-xl-6">
                    <label class="helvetica-regular">{{ $item->{"label_".app()->getLocale()} }}</label>
					<div class="feature-card-widget wow fadeInUp"  id="bankdetailbg" style="position: relative;">
						<div class="card-img">
							<h4 id="value_{{ $item->id }}" class="helvetica-regular" style="font-size: 15px;">{{ $item->value }}</h4>
							<input type="text" id="copy_value_{{ $item->id }}" value="{{ $item->value }}" style="position: absolute; opacity: 0;">
						</div>
                        <button onclick="copyToClipboard({{ $item->id }})" class="det-btn helvetica-regular" class="clickTheButton helvetica-regular">
                        	<span class="copy_{{ $item->id }}">{{ trans('site.copy') }}</span>
                        	<span class="copied_{{ $item->id }} d-none">{{ trans('site.copied') }}</span>
                        </button>
                    </div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
</main>
<style type="text/css">
.det-btn {
    background: #5651a1;
    color: white;
    padding: 10px;
    position: absolute;
    border-radius: 10px;
    top: 50%;
    right: 15px;
    font-size: 12px;
    transform: translate(0, -50%);
}
</style>
@endsection
