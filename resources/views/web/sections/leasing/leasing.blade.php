@extends('web.layout.layout')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/intlTelInput.css') }}" media="all" />
@endsection

@php
    $vissible = 0;
@endphp

@section('content')
<style type="text/css">
    html {
        scroll-behavior: smooth;
    }
</style>
<main>
    <section class="banner-area-2 loan-banner"></section>
    <section class="pb-20 bg_white" style="padding: 30px 0 80px 0">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 mx-auto">
                    <div class="section-title">
                        <h2 class="wow fadeInUp neue">{{ trans('site.leasing') }}</h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4 col-xl-4">
                            <img src="{{ url('uploads/other/'.$otherPhotos['3'][0]) }}" class="img-fluid" style="border-radius: 10px;">
                        </div>
                        <div class="col-sm-12 col-lg-8 col-xl-8 helvetica-regular">
                            {!! $text_list['leasing'] !!}
                        </div>
                    </div>
                    <a href="#form_block" class="theme-btn theme-btn-lg mt-40 neue" style="position: relative; left: 50%; transform: translate(-50%);">განაცხადის შევსება</a>
               </div>
            </div>
            <div class="calculator-widget" id="form_block" style="margin-top: 35px;">
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
                                <div class="range-header d-none justify-content-between align-items-center mb-25">
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
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <h4 class="mb-1 neue" style="font-size: 22px;">{{ trans('site.month_price') }}</h4>
                                    <h1 class="m-0" id="emiAmount"></h1>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <h4 class="mb-1 neue" style="font-size: 22px;">{{ trans('site.advance_payment') }}</h4>
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
                                <input id="inputPhoneNumber" class="form-control" type="tel" pattern="[0-9]{9}" name="phone_number" maxlength="9">
                                <span class="error-message text-danger helvetica-regular" style="float: left; width: 100%; margin-top: 10px;"></span>
                            </div>
                            <div id="terms" style="margin-top: 15px; width: 100%; float: left;">
                                <input type="checkbox" style="float: left; margin-top: 10px;" name="terms" id="terms" checked>
	                            <label for="terms" class="helvetica-regular" style="font-size: 14px; float: left; width: 100%; margin-left: 15px;"> {{ trans('site.accept_marketing') }}
	                            	<br>
	                                <a href="javascript:;" data-modal="#modal" id="readmore" class="modal__trigger" style="font-size: 16px; text-decoration: underline; color: #f0c019;">{{ trans('site.read_more') }}</a>
                                    <br><a href="{{ url('uploads/documents/'.$parameterItems['document_file'][0]) }}" target="_blank" style="position: relative; top: 10px; font-size: 16px; text-decoration: underline; color: #f0c019;">{{ trans('site.information') }}</a>
	                            </label>
                            </div>
                            <input type="hidden" name="leasing_type" value="1">
                            <button type="button" onclick="LesingFormSubmit()" class="theme-btn theme-btn-lg mt-40 neue">{{ trans('site.submit_now') }}<i class="arrow_right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="modal" class="modal modal__bg" role="dialog" aria-hidden="true">
        <div class="modal__dialog">
            <div class="modal__content">
                <p>თქვენ მიიღებთ დიზის მიმდინარე აქციების შესახებ ინფორმაციას.</p>
                
                <!-- modal close button -->
                <a href="" class="modal__close demo-close">
                    <svg class="" viewBox="0 0 24 24"><path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/><path d="M0 0h24v24h-24z" fill="none"/></svg>
                </a>
                
            </div>
        </div>
    </div>
    <div id="modal2" class="modal modal__bg" role="dialog" aria-hidden="true">
        <div class="modal__dialog">
            <div class="modal__content">
                <h2 style="margin-top: 2rem;">ლიზინგის ხელშეკრულება</h2>
                <hr>
                <a href="#0" id="readmore">სრულად ნახვა</a>
                
                <!-- modal close button -->
                <a href="" class="modal__close demo-close">
                    <svg class="" viewBox="0 0 24 24"><path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/><path d="M0 0h24v24h-24z" fill="none"/></svg>
                </a>
                
            </div>
        </div>
    </div>
    @if($vissible != 0)
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
    @endif
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
<script type="text/javascript">
    var Modal = (function() {

  var trigger = $qsa('.modal__trigger'); // what you click to activate the modal
  var modals = $qsa('.modal'); // the entire modal (takes up entire window)
  var modalsbg = $qsa('.modal__bg'); // the entire modal (takes up entire window)
  var content = $qsa('.modal__content'); // the inner content of the modal
    var closers = $qsa('.modal__close'); // an element used to close the modal
  var w = window;
  var isOpen = false;
    var contentDelay = 400; // duration after you click the button and wait for the content to show
  var len = trigger.length;

  // make it easier for yourself by not having to type as much to select an element
  function $qsa(el) {
    return document.querySelectorAll(el);
  }

  var getId = function(event) {

    event.preventDefault();
    var self = this;
    // get the value of the data-modal attribute from the button
    var modalId = self.dataset.modal;
    var len = modalId.length;
    // remove the '#' from the string
    var modalIdTrimmed = modalId.substring(1, len);
    // select the modal we want to activate
    var modal = document.getElementById(modalIdTrimmed);
    // execute function that creates the temporary expanding div
    makeDiv(self, modal);
  };

  var makeDiv = function(self, modal) {

    var fakediv = document.getElementById('modal__temp');

    /**
     * if there isn't a 'fakediv', create one and append it to the button that was
     * clicked. after that execute the function 'moveTrig' which handles the animations.
     */

    if (fakediv === null) {
      var div = document.createElement('div');
      div.id = 'modal__temp';
      self.appendChild(div);
      moveTrig(self, modal, div);
    }
  };

  var moveTrig = function(trig, modal, div) {
    var trigProps = trig.getBoundingClientRect();
    var m = modal;
    var mProps = m.querySelector('.modal__content').getBoundingClientRect();
    var transX, transY, scaleX, scaleY;
    var xc = w.innerWidth / 2;
    var yc = w.innerHeight / 2;

    // this class increases z-index value so the button goes overtop the other buttons
    trig.classList.add('modal__trigger--active');

    // these values are used for scale the temporary div to the same size as the modal
    scaleX = mProps.width / trigProps.width;
    scaleY = mProps.height / trigProps.height;

    scaleX = scaleX.toFixed(3); // round to 3 decimal places
    scaleY = scaleY.toFixed(3);


    // these values are used to move the button to the center of the window
    transX = Math.round(xc - trigProps.left - trigProps.width / 2);
    transY = Math.round(yc - trigProps.top - trigProps.height / 2);

        // if the modal is aligned to the top then move the button to the center-y of the modal instead of the window
    if (m.classList.contains('modal--align-top')) {
      transY = Math.round(mProps.height / 2 + mProps.top - trigProps.top - trigProps.height / 2);
    }


        // translate button to center of screen
        trig.style.transform = 'translate(' + transX + 'px, ' + transY + 'px)';
        trig.style.webkitTransform = 'translate(' + transX + 'px, ' + transY + 'px)';
        // expand temporary div to the same size as the modal
        div.style.transform = 'scale(' + scaleX + ',' + scaleY + ')';
        div.style.webkitTransform = 'scale(' + scaleX + ',' + scaleY + ')';


        window.setTimeout(function() {
            window.requestAnimationFrame(function() {
                open(m, div);
            });
        }, contentDelay);

  };

  var open = function(m, div) {

    if (!isOpen) {
      // select the content inside the modal
      var content = m.querySelector('.modal__content');
      // reveal the modal
      m.classList.add('modal--active');
      // reveal the modal content
      content.classList.add('modal__content--active');

      /**
       * when the modal content is finished transitioning, fadeout the temporary
       * expanding div so when the window resizes it isn't visible ( it doesn't
       * move with the window).
       */

      content.addEventListener('transitionend', hideDiv, false);

      isOpen = true;
    }

    function hideDiv() {
      // fadeout div so that it can't be seen when the window is resized
      div.style.opacity = '0';
      content.removeEventListener('transitionend', hideDiv, false);
    }
  };

  var close = function(event) {

        event.preventDefault();
    event.stopImmediatePropagation();

    var target = event.target;
    var div = document.getElementById('modal__temp');

    /**
     * make sure the modal__bg or modal__close was clicked, we don't want to be able to click
     * inside the modal and have it close.
     */

    if (isOpen && target.classList.contains('modal__bg') || target.classList.contains('modal__close')) {

      // make the hidden div visible again and remove the transforms so it scales back to its original size
      div.style.opacity = '1';
      div.removeAttribute('style');

            /**
            * iterate through the modals and modal contents and triggers to remove their active classes.
      * remove the inline css from the trigger to move it back into its original position.
            */

            for (var i = 0; i < len; i++) {
                modals[i].classList.remove('modal--active');
                content[i].classList.remove('modal__content--active');
                trigger[i].style.transform = 'none';
        trigger[i].style.webkitTransform = 'none';
                trigger[i].classList.remove('modal__trigger--active');
            }

      // when the temporary div is opacity:1 again, we want to remove it from the dom
            div.addEventListener('transitionend', removeDiv, false);

      isOpen = false;

    }

    function removeDiv() {
      setTimeout(function() {
        window.requestAnimationFrame(function() {
          // remove the temp div from the dom with a slight delay so the animation looks good
          div.remove();
        });
      }, contentDelay - 50);
    }

  };

  var bindActions = function() {
    for (var i = 0; i < len; i++) {
      trigger[i].addEventListener('click', getId, false);
      closers[i].addEventListener('click', close, false);
      modalsbg[i].addEventListener('click', close, false);
    }
  };

  var init = function() {
    bindActions();
  };

  return {
    init: init
  };

}());

Modal.init();

//Pop Up
function popupOpenClose(popup) {
    
    /* Add div inside popup for layout if one doesn't exist */
    if ($(".wrapper").length == 0){
        $(popup).wrapInner("<div class='wrapper'></div>");
    }
    
    /* Open popup */
    $(popup).show();

    /* Close popup if user clicks on background */
    $(popup).click(function(e) {
        if ( e.target == this ) {
            if ($(popup).is(':visible')) {
                $(popup).hide();
            }
        }
    });

    /* Close popup and remove errors if user clicks on cancel or close buttons */
    $(popup).find("button[name=close]").on("click", function() {
        if ($(".formElementError").is(':visible')) {
            $(".formElementError").remove();
        }
        $(popup).hide();
    });
}
</script>
@endsection