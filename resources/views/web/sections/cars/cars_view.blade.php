@extends('web.layout.layout')

@section('css')
<link rel="stylesheet" href="https://myautohome.ge/frontend-assets/css/slick.css">
@endsection

@section('content')
<main>
    <section class="pb-40 bg_white" style="padding: 50px 0 0 0">
    	<section id="details-slider__section col-12">
	        <div class="details-slider">
                <div class="details-slider__item" onclick="showImg(1)">
                    <img src="{{ url('uploads/cars/main/'.$car_item['photo']) }}" alt="">
                    <div class="slider-overlay"></div>
                </div>
	        	@foreach($car_gallery as $gallery_item)
                <div class="details-slider__item" onclick="showImg({{ $loop->iteration + 1 }})">
                    <img src="{{ url('uploads/cars/'.$car_item->id.'/gallery/'.$gallery_item['photo']) }}" alt="">
                    <div class="slider-overlay"></div>
                </div>
                @endforeach
	        </div>
	    </section>
	    <div class="slider-modal ">
            <div class="display_img">
                <button class="close-slide-m">&#10006;</button>
                <img  src="{{ url('uploads/cars/main/'.$car_item['photo']) }}" alt="">
            </div>
        </div>
        <section id="details-section">
	        <div class="container">
	            <div class="details-section__main">
	                <div class="details-section__main-description">
	                    <h2 class="description__heading neue">
	                    	{{ $car_item->carMake->name }} {{ $car_item->carModel->name }} - ${{ $car_item->price }}
	                    </h2>
	                    <h2 class="description__heading neue">
	                    	{{ trans('site.description') }}
	                    </h2>
	                    <div class="description__p">
	                        {!! json_decode($car_item->description)->{app()->getLocale()} !!}
	                    </div>
	                    <div class="description__grid">
	                    	<p class="description__element helvetica-regular">
	                            <b>{{ trans('site.car_year') }}</b>:
	                            <span>{{ $car_item->year }}</span>
	                        </p>
	                    	<p class="description__element helvetica-regular">
	                            <b>{{ trans('site.millage') }}</b>:
	                            <span>{{ $car_item->millage }}</span>
	                        </p>
	                    	<p class="description__element helvetica-regular">
	                            <b>{{ trans('site.engine_volume') }}</b>:
	                            <span>{{ $car_item->engine }}</span>
	                        </p>
	                    	@foreach($car_parameter_list as $parameter_item)
	                        <p class="description__element helvetica-regular">
	                            <b>{{ $parameter_item['label']->{app()->getLocale()} }}</b>:
	                            <span>
	                            @if($parameter_item['json'] == 1)
                            	{{ $parameter_item['value']->{app()->getLocale()} }}
                            	@else
                            	{{ $parameter_item['value'] }}
                            	@endif
                            	</span>
	                        </p>
	                        @endforeach

	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
        @foreach($car_gallery as $gallery_item)
	    <div class="slider-modal ">
            <div class="display_img">
                <button class="close-slide-m">&#10006;</button>
                <img  src="{{ url('uploads/cars/'.$car_item->id.'/gallery/'.$gallery_item['photo']) }}" alt="">
            </div>
        </div>
        @endforeach
        <div class="container">
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
		                            <div class="testimonial-widget-3 wow fadeInLeft">
		                                <div class="client-img">
		                                    <img src="{{ url('uploads/cars/main/'.$car_list_item->photo) }}" alt="client" style="height: 280px; width: 100%;">
		                                </div>
		                                <div class="client-info">
		                                    <h6>{{ $car_list_item->carMake->name }} {{ $car_list_item->carModel->name }}</h6>
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
		                            <h2 class="wow fadeInRight neue">{{ trans('site.other_cars') }}</h2>
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
        </div>
    </section>
</main>
<style type="text/css">
	#details-slider__section {
	    width: 100%;
	    max-height: 700px;
	    min-height: 100%;
	}
	.details-slider__item {
	    position: relative;
	    height: 100%;
	}
	.details-slider__item img {
	    width: 100%;
	    height: 700px;
	    object-fit: cover;
	}

	.slick-center.details-slider__item .slider-overlay {
	    opacity: 0;
	}
	.slider-overlay {
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    background-color: rgba(0, 0, 0, 0.63);
	    z-index: 10;
	    -webkit-transition: .2s;
	    -o-transition: .2s;
	    transition: .2s;
	}

	@media (max-width: 1500px) {
	    .details-slider__item img {
	        height: 500px;
	    }
	}
	@media (max-width: 1100px) {
	    #details-slider__section {
	        margin-top: 63px;
	    }
	}
	@media (max-width: 990px) {
	    .details-slider__item img {
	        height: 400px;
	    }
	}
	@media (max-width: 700px) {
	    #details-slider__section {
	        margin-top: 55px;
	    }
	}

	.slider-modal {
	    position: fixed;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	    background-color: rgba(17, 17, 17, 0.884);
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    z-index: 500000;
	    visibility: hidden;
	    opacity: 0;
	    transition: .5s;
	}
	.slider-modal.show {
	    visibility: visible;
	    opacity: 1;
	}

	#details-section {
    padding: 0 0 5rem;
}
#details-section  .container {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
        -ms-flex-pack: justify;
            justify-content: space-between;
}

.details-section__main {
    width: 100%;
}
.car-brand-icon {
    width: 90px;
    height: 90px;
    border-radius: 50%;
}
.details-section__main-top {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
}
.details__car-info {
    margin-left: 3rem;
    max-width: 420px;
}
.details__car-price {
    color: #EE3939;
    font-size: 27px;
    font-family: "BPG WEB 001 Caps", sans-serif;
}
.details__car-name {
    font-size: 31px ;
    color: #111;
    font-family: "BPG WEB 001 Caps", sans-serif;
    margin: 1rem 0;
}

.details__car-additational {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
        -ms-flex-pack: justify;
            justify-content: space-between;
}
.details__car-additational p {
    border: 1px solid #cccbcb;
    border-radius: 16px;
    line-height: 4rem;
    padding: 0 3rem;
    color:#a0a0a0;
    font-size: 12px;
}

.details-section__main-description {
    border-radius: 14px;
    -webkit-box-shadow: 0px 0px 17px rgba(17, 17, 17, 0.103);
            box-shadow: 0px 0px 17px rgba(17, 17, 17, 0.103);
    padding: 2.5rem;
    background-color: #fff;
    margin-top: 5rem;
    border: 1px solid #EEEEEE;
}
.description__heading {
    font-size: 22px;
    font-family: "BPG WEB 001 Caps", sans-serif;
    color: #111;
}
.description__p > p {
    font-size: 14px;
    color: #777777;
    margin: 0.5rem 0 1rem;
}
.description__grid {
    display: -ms-grid;
    display: grid;
    -ms-grid-columns: 1fr 3rem 1fr;
    grid-template-columns: 1fr 1fr;
    grid-row-gap: 1rem;
    grid-column-gap: 3rem;
    max-width: 100%;
}

.description__element {
    font-family: "BPG WEB 001 Caps", sans-serif;
    color: #111;
    font-size: 13px;
}
.description__element span {
    color: #777777;
    font-size: 14px;
    margin-left: 2rem;
}
.details-section__form {
    border-radius: 14px;
    -webkit-box-shadow: 0px 0px 17px rgba(17, 17, 17, 0.103);
            box-shadow: 0px 0px 17px rgba(17, 17, 17, 0.103);
    padding: 4.5rem 4rem;
    background-color: #fff;
    margin-top: 5rem;
    border: 1px solid #EEEEEE;
    color: #BBBBBB;
}

.details__form-heading {
    font-family: "BPG WEB 001 Caps", sans-serif;
    font-size: 21px;
    color: var(--clr-orange);
}
.details__form-heading img {
    margin-left: 4rem;
}

.details__form-input-grid {
    display: -ms-grid;
    display: grid;
    -ms-grid-columns: 1fr 22px 1fr;
    grid-template-columns: 1fr 1fr;
    grid-gap: 22px;
    margin: 2rem 0;
}
.details__form-input-grid input {
    border-radius: 3px;
    line-height: 50px;
    border: 1px solid #ECECEC;
    padding: 0 2rem;
    color:  var(--clr-orange);
    font-size: 11px;
}
.details__form-input-grid input[type=date] {
    color: gray;
}
.details__form-input-grid input::-webkit-input-placeholder {
    color: #BBBBBB;
}
.details__form-input-grid input::-moz-placeholder {
    color: #BBBBBB;
}
.details__form-input-grid input:-ms-input-placeholder {
    color: #BBBBBB;
}
.details__form-input-grid input::-ms-input-placeholder {
    color: #BBBBBB;
}
.details__form-input-grid input::placeholder {
    color: #BBBBBB;
}

.confirm-info {
    color: #3F3357;
    font-size: 8px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    position: relative;
    padding: 5px 0;
}
.confirm-info label {
    margin-left: 2rem;
    cursor: pointer;
}

.confirm-info input[type=checkbox]{
  /* Hide original inputs */
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  position: absolute;
}

.confirm-info input[type=checkbox]:before{
  height:14px;
  width:14px;
  content: " ";
  display:inline-block;
  vertical-align: baseline;
  border:1px solid #3F3357;
  border-radius: 3px;
  cursor: pointer;
}
.confirm-info input[type=checkbox]:checked:before{
  background:var(--clr-orange);
}

.details__form-btn {
    border-radius: 9px ;
    width: 24rem;
    line-height: 50px;
    background-color: #3F3357;
    border: 1px solid transparent;
    color: #fff;
    font-size: 12px;
    margin: 4.5rem auto 0;
    display: block;
    -webkit-transition: .9s;
    -o-transition: .9s;
    transition: .9s;
}
.details__form-btn:hover {
    background-color: #fff;
    border: 1px solid #3F3357;
    color: #3F3357;
}

.details-section__aside {
    width: 400px;
}
.details-section__callus {
    width: 100%;
    line-height: 60px;
    border-radius: 8px;
    background-color: var(--clr-blue);
    color: #fff;
    border: 1px solid transparent;
    -webkit-transition: .8s;
    -o-transition: .8s;
    transition: .8s;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
        -ms-flex-pack: center;
            justify-content: center;
    -webkit-box-align: center;
        -ms-flex-align: center;
            align-items: center;
    margin-bottom: 35px;
}
.details-section__callus svg {
    fill: #fff;
    margin-right: 1rem;
    -webkit-transition: .8s;
    -o-transition: .8s;
    transition: .8s;
}
.details-section__callus:hover {
    background-color: #fff;
    color: var(--clr-blue);
    border: 1px solid var(--clr-blue);
}
.details-section__callus:hover  svg {
    fill:  var(--clr-blue);
}
.adide__ad-top,
.adide__ad-bottom {
    border-radius: 24px;
    overflow: hidden;
}
.adide__ad-top {
     max-height: 575px;
}
.adide__ad-bottom {
    margin-top: 35px;
    max-height: 400px;
}


</style>
@endsection

@section('js')
<script src="https://myautohome.ge/frontend-assets/script/slick.min.js"></script>
<script type="text/javascript">
	$('.details-slider').slick({
    infinite: true,
    autoplaySpeed: 1200,
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 500,
    arrows: true,
    centerMode: true,
    centerPadding: '500px',
    responsive: [
      {
        breakpoint: 1500,
        settings: {
          slidesToShow: 1,
          centerPadding: '300px',
        }
      },

      {
        breakpoint: 990,
        settings: {
          slidesToShow: 1,
          centerPadding: '200px',
        }
      },
      {
        breakpoint: 700,
        settings: {
          slidesToShow: 1,
          centerPadding: '43px',
        }
      }
    ]
  });

	const slidesModal = document.querySelectorAll('.slider-modal');

	function showImg(num) {
	  slidesModal[num -1].classList.add('show');
	}


	window.addEventListener('click', evt => {
	  slidesModal.forEach((e, i)=> {
	    if(evt.target == slidesModal[i] ) {
	      e.classList.remove('show');
	    }
	  })

	})

	const closeSlidesModal = document.querySelectorAll('.close-slide-m');

	// close with x button
	closeSlidesModal.forEach((e,)=> {
	  e.addEventListener('click', ()=> {
	    slidesModal.forEach(e => {
	        e.classList.remove('show');
	    })
	  })
	})
</script>
@endsection