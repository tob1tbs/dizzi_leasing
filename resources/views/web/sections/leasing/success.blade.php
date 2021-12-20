@extends('web.layout.layout')

@section('content')
<section class="banner-area-2 loan-banner"></section>
    <section class="pb-40 bg_white" style="padding: 100px 0 30px 0;">
	    <div class="container">
	        <div class="row">
	           <div class="col-lg-12 pt-lg-50 pt-50 pb-50 pb-lg-50" id="success">
	                <img src="{{ url('assets/web/img/icon/checked.png') }}" alt="" style="width: 200px;">
	                	<h2 class="neue">მადლობა, თქვენი განაცხადი მიღებულია!</h2>
	                	<p class="helvetica-regular">
		                	განაცხადის განხილვას დაჭირდება 10-15 წუთი. სამუშაო დღეები: ორშ-პარ. 10;00-დან 19:00 საათამდე. 
		                	<br>გადაწყვეტილებას დაფინანსების შესახებ გაცნობებთ თქვენს მიერ მითითებულ ნომერზე
		                </p>
	                	<br><br>
	            		<a href="{{ route('actionWebMain') }}" class="theme-btn theme-btn-rounded neue" >მთავარზე დაბრუნება</a><br>
		               	<div class="successnum">
		                	<img src="{{ url('assets/web/img/icon/ph.png') }}" alt=""> <a href="tel:+995 (032) 280 00 11"> +995 (032) 280 00 11</a>
		               </div>
	           </div>
	        </div>
	    </div>
	</section>
</section>
@endsection