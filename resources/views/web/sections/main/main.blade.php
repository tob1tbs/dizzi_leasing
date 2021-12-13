@extends('web.layout.layout')

@section('content')
<main>
    <section class="banner-area-3 pt-90" id="banner_animation2">
        <div class="bg-slides">
            <div class="slide" data-parallax='{"x": 220, "y": 0, "rotateZ":0}'>
                <img class="wow slideInRight" data-wow-delay='0.2s' src="{{ url('assets/web/img/banner/slide-shape-1.png') }}" alt="img">
            </div>
            <div class="slide" data-parallax='{"x": 270, "y": 0, "rotateZ":0}'>

                <img class="wow slideInRight" data-wow-delay='0.6s' src="{{ url('assets/web/img/banner/slide-shape-2.png') }}" alt="img">
            </div>
            <div class="slide" data-parallax='{"x": 330, "y": 0, "rotateZ":0}'>

                <img class="wow slideInRight" data-wow-delay='1.3s' src="{{ url('assets/web/img/banner/slide-shape-3.png') }}" alt="img">
            </div>
        </div>
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7 pt-100 pt-lg-200 pb-lg-200 pb-100">
                    <div class="banner-content pb-20 pt-20">
                        <h1 class="wow fadeInUp" data-wow-delay="0.1s">Compare Loans From Several Banks Find The
                            Cheapest Loan</h1>
                        <div>
                            <a href="{{ route('actionWebLeasing') }}" class="wow fadeInUp mt-30 theme-btn theme-btn-rounded-2 theme-btn-lg theme-btn-alt neue"
                            data-wow-delay="0.3s" style="font-size: 16px; padding: 0 25px;">{{ trans('site.leasing') }}
                            <i class="arrow_right"></i></a>

                            <a href="{{ route('actionWebBackLeasing') }}""
                            class="wow fadeInUp mt-30 theme-btn theme-btn-rounded-2 theme-btn-lg theme-btn-alt neue"
                            data-wow-delay="0.3s" style="font-size: 16px; padding: 0 25px;">{{ trans('site.backleasing') }}
                            <i class="arrow_right"></i></a>
                        </div>
       
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block position-relative">
                    <img class="person-img " src="{{ url('assets/web/img/banner/person-2.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
	<section id="feature" class="feature-area pb-60">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mx-auto pt-50 pt-lg-50 pb-30">
					<div class="section-title">
						<h2 class="wow fadeInUp neue">{{ trans('site.terms_and_conditions') }}</h2>
						<!-- <p class="wow fadeInUp" data-wow-delay="0.3s">
							You may want top security so that you can rest
							assured that your accounts will not be
							compromised while you're using the app.</p> -->
					</div>
				</div>
			</div>
			<div class="row gy-xl-0 gy-4">
				<div class="col-xl-12 col-md-12">
					<div class="feature-card-widget" style="padding: 20px;">
						<div class="row">
							<div class="col-lg-4">
								<div class="wow fadeInUp" data-wow-delay="0.3s" style="border-radius: 6px; padding-bottom: 4px;">
									<div class="card-img" id="cardbg" style="background-color: #ffffff;">
										<h4 class="neue" style="font-size: 16px; margin-bottom: 0; background-color: #ffffff;">&nbsp;</h4>
									</div>
									<ul class="service helvetica-regular" style="text-align: left; padding-left: 15px;">
			                            <li>{{ trans('site.max_price') }}</li>
			                            <hr>
			                            <li>{{ trans('site.max_month') }}</li>
			                            <hr>
			                            <li>{{ trans('site.guarantors') }}</li>
			                            <hr>
			                            <li>{{ trans('site.funding') }}</li>
			                            <hr>
			                            <li>{{ trans('site.vehicle_evaluation') }}</li>
			                            <hr>
			                            <li>{{ trans('site.car_owner') }}</li>
			                            <hr>
			                            <li>{{ trans('site.car_driver') }}</li>
			                        </ul>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="wow fadeInUp" data-wow-delay="0.3s" style="border-radius: 6px; padding-bottom: 4px;">
									<div class="card-img" id="cardbg">
										<h4 class="neue" style="font-size: 16px; margin-bottom: 0;">{{ trans('site.leasing') }}</h4>
									</div>
									<ul class="service helvetica-regular">
										@if(Session::get('locale') == 'ge')
			                            <li>{{ number_format($parameterLeasing['leasing_max_price'][0], '0', '.', ',') }} {{ trans('site.to_gel') }} </li>
			                            @else
			                            <li>To {{ number_format($parameterLeasing['leasing_max_price'][0], '0', '.', ',') }} {{ trans('site.to_gel') }} </li>
			                            @endif
			                            <hr>
			                            <li>{{ $parameterLeasing['leasing_max_month'][0] }} {{ trans('site.month') }}</li>
			                            <hr>
			                            <li>{{ trans('site.individual') }}</li>
			                            <hr>
			                            @if(Session::get('locale') == 'ge')
			                            <li>100%-{{ trans('site.to') }}</li>
			                            @else
			                            <li>{{ trans('site.to') }} 100%</li>
			                            @endif
			                            <hr>
			                            <li>{{ trans('site.max_market_price') }}</li>
			                            <hr>
			                            <li>{{ $parameterItems['company_name_'.Session::get('locale')][0] }}</li>
			                            <hr>
			                            <li>{{ trans('site.customer') }}</li>
			                        </ul>
			                        <a href="{{ route('actionWebLeasing') }}" class="theme-btn theme-btn-rounded neue" style="width: 100%; font-size: 16px; border-radius: 6px;"> {{ trans('site.complete_now') }} <i class="arrow_right"></i> </a>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="wow fadeInUp" data-wow-delay="0.3s" style="border-radius: 6px; padding-bottom: 4px;">
									<div class="card-img" id="cardbg">
										<h4 class="neue" style="font-size: 16px; margin-bottom: 0;">{{ trans('site.backleasing') }}</h4>
									</div>
			                        <ul class="service helvetica-regular">
			                            <li>{{ number_format($parameterLeasing['leasing_max_price'][0], '0', '.', ',') }} {{ trans('site.to_gel') }} </li>
			                            <hr>
			                            <li>{{ $parameterLeasing['leasing_max_month'][0] }} {{ trans('site.month') }}</li>
			                            <hr>
			                            <li>{{ trans('site.individual') }}</li>
			                            <hr>
			                            <li>100%-{{ trans('site.to') }}</li>
			                            <hr>
			                            <li>{{ trans('site.max_market_price') }}</li>
			                            <hr>
			                            <li>{{ $parameterItems['company_name_'.Session::get('locale')][0] }}</li>
			                            <hr>
			                            <li>{{ trans('site.customer') }}</li>
			                        </ul>
			                        <a href="loan-details.html" class="theme-btn theme-btn-rounded neue" style=" width: 100%; font-size: 16px; border-radius: 6px;"> {{ trans('site.complete_now') }} <i class="arrow_right"></i> </a>
								</div>
							</div>
						</div>
					</div>
					<div class="feature-card-widget wow fadeInUp" data-wow-delay="0.6s" id="about" style="margin-top: 35px; padding: 30px;">
						<div class="card-img" >
							<h4 class="neue">{{ trans('site.what_is_leasing') }}</h4>
						</div>
						<p id="abouttext" class="helvetica-regular">
                            ჩვენ შევძელით შეგვექმნა ტექნოლოგიურად ყველაზე გამარტივებული პროცესი, რომელიც, უმოკლეს დროში, ინდივიდუალურად აგენერირებს შეთავაზებებს.
                            <br><br>
                            ტურბო ავტომობილის შეძენის ყველაზე სწრაფი და მარტივი გზაა, ოღონდ მართლა!
                            <br><br>
                            ჩვენი მიზანია ტურბო იყოს შენთვის უსწრაფესი გზა მანქანის შესაძენად. არ აქვს მნიშვნელობა ახალი ავტომობილის ყიდვა გინდა თუ მეორადის, ადგილზე ფიქრობ შეძენას თუ ჩამოყვანა გინდა უცხოეთიდან, ბანკები მარტივად გაფინანსებენ თუ არა - ტურბოში შეგიძლია შეიძინო ნებისმიერი ავტომობილი, საქართველოში და მის საზღვრებს გარეთ და გააკეთო ეს შენზე მაქსიმალურად მორგებული საუკეთესო, უმარტივესი და უსწრაფესი დაფინანსებით.
                            <div class="aboutoffer helvetica-regular">
                                <div class="col-md-6">
                                    <ul>
                                        <li>ინდივიდუალური შეთავაზება</li>
                                        <li>საუკეთესო პირობებით</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>მხოლოდ რამდენიმე წამში</li>
                                        <li>ოღონდ მართლა</li>
                                    </ul>
                                </div>
                            </div>
                        </p>
					</div>
				</div>
			</div>
		</div>
	</section>
    <section class="customize-card-area pt-lg-50 pt-20 pb-50 bg_disable" id="card_area_animation">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pe-lg-0">
                    <div class="section-title mb-35 text-start">
                        <h2 class="wow fadeInUp neue">{{ trans('site.how_it_works') }}</h2>
                        <p class="wow fadeInUp helvetica-regular" data-wow-delay="0.3s">{{ trans('site.4_steps') }}</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1 order-2">
                    <div class="feature-card-widget-6 wow fadeInUp mt-sm-0 mt-5" data-wow-delay="0.1s">
                        <div class="icon mr-20">
                            <img src="{{ url('assets/web/img/icon/1.png') }}" alt="icon">
                        </div>
                        <div class="card-content">
                            <h6 class="neue">{{ trans('site.step_1_heading') }}</h6>
                            <p class="helvetica-regular">{{ trans('site.step_1_body') }}</p>
                        </div>
                    </div>
                    <div class="feature-card-widget-6 wow fadeInUp mt-30" data-wow-delay="0.3s">
                        <div class="icon mr-20">
                            <img src="{{ url('assets/web/img/icon/2.png') }}" alt="icon">
                        </div>
                        <div class="card-content">
                            <h6 class="neue">{{ trans('site.step_2_heading') }}</h6>
                            <p class="helvetica-regular">{{ trans('site.step_2_body') }}</p>
                        </div>
                    </div>
                    <div class="feature-card-widget-6 wow fadeInUp mt-30" data-wow-delay="0.5s">
                        <div class="icon mr-20">
                            <img src="{{ url('assets/web/img/icon/3.png') }}" alt="icon">
                        </div>
                        <div class="card-content">
                            <h6 class="neue">{{ trans('site.step_3_heading') }}</h6>
                            <p class="helvetica-regular">{{ trans('site.step_3_body') }}</p>
                        </div>
                    </div>
                    <div class="feature-card-widget-6 wow fadeInUp mt-30" data-wow-delay="0.5s">
                        <div class="icon mr-20">
                            <img src="{{ url('assets/web/img/icon/4.png') }}" alt="icon">
                        </div>
                        <div class="card-content">
                            <h6 class="neue">{{ trans('site.step_4_heading') }}</h6>
                            <p class="helvetica-regular">{{ trans('site.step_4_body') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1 pl-lg-50">
                    <div class="card-img mb-5 mb-sm-0">

                        <img class="img-fluid" src="{{ url('assets/web/img/card/card-img-bg.png') }}" alt="bg image">
                        <div class="shape-1">
                            <img class="layer wow rotateInUpRight" data-wow-delay="1.2s" data-depth="0.2" src="{{ url('assets/web/img/card/Card-image-1.png') }}" alt="card">
                        </div>
                        <div class="shape-2">
                            <img class="layer wow rotateInUpRight" data-wow-delay="0.6s" data-depth="0.15" src="{{ url('assets/web/img/card/Card-image-2.png') }}" alt="card">
                        </div>
                        <div class="shape-3">
                            <img class="layer wow rotateInUpRight" data-depth="0.3" src="{{ url('assets/web/img/card/Card-image-3.png') }}" alt="card">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="client-area pt-50 pb-100">
        <div class="container">
            <div class="section-title">
                <h2 class="neue mb-3 mb-sm-0 wow fadeInRight">{{ trans('site.reviews') }}</h2>
                <p class="mt-20 helvetica-regular">{{ trans('site.our_customer_reviews') }}</p>
            </div>
            <div class=" client-slider pt-45">
                @foreach($review_list as $review_item)
                <div class="single-client wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded-circle" src="{{ url('assets/web/img/client/client-1.png') }}" alt="cleint">
                    <p class="quote helvetica-regular">
                        {{ $review_item['message'] }}
                    </p>
                    <div class="client-info">
                        <div>
                            <p class="neue">{{ $review_item['name'] }}</p>
                        </div>
                        <div class="rating">
                            <a href="#"><i class="icon_star"></i></a>
                            <a href="#"><i class="icon_star"></i></a>
                            <a href="#"><i class="icon_star"></i></a>
                            <a href="#"><i class="icon_star"></i></a>
                            <a href="#"><i class="icon_star"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="theme-btn theme-btn-rounded-2 theme-btn-alt neue" href="javascript:;" onclick="OpenReviewModal()" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin: 20px auto 0; position: absolute; left: 50%; transform: translate(-50%, 0); background: #5651a1; color: #ffffff;">{{ trans('site.add_review') }}</a>
    </section>
    <section class="testimonial-area pt-60 pb-60 bg_disable">
        <div class="container">
            <div class="section-title d-md-none mb-4">
                <h2 class="neue" style="font-size: 22px;">{{ trans('site.get_cars_from_our_partners') }}</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 pr-lg-35">
                    <div class="testimonial-slider-3">
                    	@foreach($car_list as $car_item)
                        <a href="{{ route('actionCarsView', $car_item['car_id']) }}">
                            <div class="testimonial-widget-3 wow fadeInLeft">
                                <div class="client-img">
                                    <img src="{{ url('uploads/cars/main/'.$car_item['car_photo']) }}" alt="client" style="height: 280px; width: 100%;">
                                </div>
                                <div class="client-info">
                                    <h6>{{ $car_item['car_make'] }} {{ $car_item['car_model']}}</h6>
                                    <span>{{ $car_item['car_price']}} $</span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 ">
                    <div class="h-100 d-flex flex-column justify-content-between">
                        <div class="section-title text-start d-none d-md-block">
                            <h2 class="wow fadeInRight neue" style="font-size: 22px;">{{ trans('site.get_cars_from_our_partners') }}</h2>
                        </div>
                        <div class="testimonial-slider-2">
                        	@foreach($car_list as $car_item)
                            <a href="{{ route('actionCarsView', $car_item['car_id']) }}">
                                <div class="testimonial-widget-2 wow fadeInUp" data-wow-delay="0.1s">
                                        <img src="{{ url('uploads/cars/main/'.$car_item['car_photo']) }}" alt="client" style="height: 200px; width: 100%;">
                                    <div class="client-info">
                                        <p>{{ $car_item['car_make'] }} {{ $car_item['car_model']}}</p>
                                        <span>{{ $car_item['car_price']}} $</span>
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
    <section class="news-area pb-60">
        <div class="container ">
            <div class="section-title pt-30">
                <h2 class="wow fadeInUp neue">{{ trans('site.blog') }}</h2>
                <a href="{{ route('actionWebBlog') }}" class="caption helvetica-regular">{{ trans('site.all_blogs') }}</a>
            </div>
            <div class="news-slider">
                @foreach($blog_list as $blog_item)
                <div class="blog-widget-1 wow fadeInUp">
                    <img class="w-sm-auto w-100" src="{{ url('assets/web/img/blog/news-3.png') }}" alt="news image">
                    <div class="blog-content pr-20 pl-20">
                        <h4 class="neue" style="font-size: 16px"><a href="{{ route('actionWebBlogView', $blog_item['id']) }}">{{ json_decode($blog_item['title'])->{app()->getLocale()} }}</a></h4>
                        <a class="read-more helvetica-regular" href="{{ route('actionWebBlogView', $blog_item['id']) }}">{{ trans('site.more') }} <i class="arrow_right"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="advisor-area pt-50  pb-70 overflow-hidden" id="MouseMoveAnimation">
        <div class="container">
            <div class="row gy-4 gy-lg-0">
                <div class="col-lg-6 pr-lg-75">
                    <div class="section-title text-start">
                        <h2 class="mb-0 wow fadeInUp neue" style="font-size:30px;">{!! trans('site.instruction_faq') !!}</h2>
                    </div>
                    <div class="advisor-img mt-45 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="shape ">
                            <div class="box">
                                <img class="layer layer2" data-depth="0.5" src="{{ url('assets/web/img/faq/Shape.png') }}" alt="shape">
                            </div>
                            <div class="circle-shape"></div>
                        </div>
                        <img class="main-img" src="{{ url('assets/web/img/faq/advisor.png') }}" alt="advisor">
                        <div id="video">
                            <a class="play-btn" data-fancybox
                                href="https://www.youtube.com/watch?v=xcJtL7QggTI">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                        <div class="work-time">
                            <div class="circle-shape"></div>
                            All weekdays <span>10.00 - 18.00</span>
                        </div>
                    </div>
                    <div class="row mt-4 gy-md-0 gy-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="col-md-6">
                            <a href="tel:+995 {{ $parameterItems['phone_number'][0] }}"
                                class="theme-btn theme-btn-primary_alt theme-btn-rounded d-flex align-items-center justify-content-center" style="font-size: 16px;">
                                <i class="icon_phone"></i> +995 {{ $parameterItems['phone_number'][0] }}</a>
                        </div>
                        <div class="col-md-6">
                            <a href="mailto:{{ $parameterItems['email'][0] }}" class="theme-btn theme-btn-primary_alt theme-btn-rounded d-flex align-items-center justify-content-center" style="text-transform: none; font-size: 16px;">
                                <i class="icon_mail_alt"></i> {{ $parameterItems['email'][0] }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq-widget-2">
                        <div class="accordion" id="accordionExample">
                            @foreach($faq_list as $faq_item)
                            <div class="single-widget-one wow fadeInUp" data-wow-delay="0.3s">
                                <div class="faq-header" id="headingTwo{{ $faq_item['id'] }}">
                                    <h6 class="mb-0 collapsed neue" data-bs-toggle="collapse" data-bs-target="#collapseTwo{{ $faq_item['id'] }}"
                                        aria-expanded="true" aria-controls="collapseTwo{{ $faq_item['id'] }}">
                                        {{ json_decode($faq_item['title'])->{app()->getLocale()} }}
                                        <i class="icon_plus"></i>
                                        <i class="icon_close"></i>
                                    </h6>
                                </div>
                                <div id="collapseTwo{{ $faq_item['id'] }}" class="collapse" aria-labelledby="headingTwo{{ $faq_item['id'] }}" data-bs-parent="#accordionExample">
                                    <div class="faq-body helvetica-regular">
                                        {!! json_decode($faq_item['value'])->{app()->getLocale()} !!}
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
<div class="modal fade" id="ReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 5000000;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title neue" id="exampleModalLabel">{{ trans('site.add_review') }}</h5>
      </div>
      <div class="modal-body">
        <form class="row" id="add_review">
            <div class="col-lg-6 col-sm-12">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label helvetica-regular">{{ trans('site.name') }}:</label>
                <input type="text" class="form-control" name="review_name" id="review_name">
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label helvetica-regular">{{ trans('site.phone') }}:</label>
                <input type="text" class="form-control" name="review_phone" id="review_phone">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label for="message-text" class="col-form-label helvetica-regular">{{ trans('site.message') }}:</label>
                <textarea class="form-control" name="review_message" id="review_message"></textarea>
              </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary helvetica-regular" onclick="CloseModal()" data-dismiss="modal">{{ trans('site.close') }}</button>
        <button type="button" class="btn btn-primary helvetica-regular" onclick="SaveReview()">{{ trans('site.save_review') }}</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    function OpenReviewModal() {
        $("#ReviewModal").modal('show');
    }

    function SaveReview() {
        var form = $('#add_review')[0];
        var data = new FormData(form);

        $.ajax({
            dataType: 'json',
            url: "/ajax/ajaxSaveReview",
            type: "POST",
            data: data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if(data['status'] == true) {
                    Swal.fire({
                      title: '{{ trans('site.success') }}',
                      text: '{{ trans('site.review_success') }}',
                      icon: 'success',
                      confirmButtonText: '{{ trans('site.close') }}',
                      timer: 2000
                    });
                    $("#ReviewModal").modal('hide');
                } else {
                   
                }
            }
        });
    }

    function CloseModal() {
        $("#ReviewModal").modal('hide');
    }
</script>
@endsection