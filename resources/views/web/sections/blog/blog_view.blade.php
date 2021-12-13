@extends('web.layout.layout')

@section('content')
<main>
	<section class="banner-area-2 loan-banner pt-145"></section>
    <section class="pt-50 pb-120 bg_disable" style="padding: 100px 0 50px 0;">
        <div class="container">
            <div class="row gy-lg-0 gy-4">
                <div class="col-lg-1 position-relative">
                    <div class="blog-share-widget d-flex d-lg-block align-items-center">
                        <p>Share Now</p>
                        <div class="social-link">
                            <a href="javascript:;" onclick="share()"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="post-details-widget pb-30 position-relative">
                        <img class="post-img w-100" src="{{ url('assets/web/img/blog/blog-details-img.jpg') }}" alt="post image">
                    </div>
                    <div class="blog-title" style="margin-bottom: 30px;">
                    	<b style="font-size: 19px;" class="neue">{{ json_decode($blog_data['title'], true)[app()->getLocale()] }}</b>
                    </div>
                    <div class="blog-text helvetica-regular">
	                    {!! json_decode($blog_data['text'], true)[app()->getLocale()] !!}
	                </div>
                </div>
                <div class="col-lg-4 ps-xl-5">
                    <div class="blog-sidebar-widget ps-lg-2">

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script> share = function(){ url = 'https://work.workplace.com/sharer.php?display=popup&u=' + window.location.href; options = 'toolbar=0,status=0,resizable=1,width=626,height=436'; window.open(url,'sharer',options); } </script>
<style type="text/css">
	.blog-text > p {
		margin-bottom: 20px;
	}

	h2 {
		font-family: 'HelveticaRegular';
		font-size: 19px;
	}
</style>
@endsection