@extends('web.layout.layout')

@section('content')
<main>
    <section class="banner-area-2 loan-banner"></section>
    <section class="pb-40 bg_white" style="padding: 100px 0 30px 0;">
        <div class="container">
                <form id="leasing_form" class="row">
                    <div class="col-lg-8 ">
                        <div class="blog-post-widget">
                            <div class="row gy-4 ">
                                <div class="loan-details-widget bg_white">
                                    <div id="formtitle">
                                        <h3 class="neue">{{ trans('site.user_data') }}</h3>
                                    </div>
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <label class="label helvetica-regular" for="fName">{{ trans('site.name') }}</label>
                                            <input id='fName' class="form-control" type="text" name="user_name">
                                        </div>
    
                                        <div class="col-md-6">
                                            <label class="label helvetica-regular" for="lName">{{ trans('site.last_name') }}</label>
                                            <input id='lName' class="form-control" type="text" name="user_lastname">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label helvetica-regular" for="pName">{{ trans('site.personal_number') }}</label>
                                            <input id='lName' class="form-control" type="text" name="user_personal_number">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label helvetica-regular" for="dob-d">{{ trans('site.bdate') }}</label>
                                            <input type="date" name="user_bdate" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label helvetica-regular" for="dob-d">{{ trans('site.phone') }}</label>
                                            <input type="text" name="user_phone" id="user_phone" class="form-control" value="@if(!empty(request()->phone)){{ request()->phone }}@endif">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label helvetica-regular" for="dob-d">{{ trans('site.email') }}</label>
                                            <input type="text" name="user_email" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li><span class="active_bar"></span></li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active month-tab helvetica-regular tab-click-1" id="monthTab" data-bs-toggle="tab" href="#sa" role="tab" aria-controls="monthTabId"  aria-selected="true">{{ trans('site.i_need_car') }}</a>
                                                </li>
                                                <li class="nav-item " role="presentation">
                                                    <a class="nav-link year-tab helvetica-regular tab-click-2" id="yearTab" data-bs-toggle="tab" href="#as" role="tab" aria-controls="yearTabId" aria-selected="false">{{ trans('site.i_found_car') }}</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <input type="hidden" name="car_status" id="car_status" value="1">
                                                <div class="tab-pane fade show active" id="sa" role="tabpanel"
                                                    aria-labelledby="monthTab">            
                                                </div>
                                                <div class="tab-pane fade" id="as" role="tabpanel" aria-labelledby="yearTab">
                                                    <div class="row gy-4" id="autoneed">
                                                        <div id="formtitle" style="margin-bottom: 0;">
                                                            <h3>{{ trans('site.car_info') }}</h3>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="label helvetica-regular" for="aurl">{{ trans('site.car_url') }}</label>
                                                            <input id='aurl' class="market" type="text" placeholder="https://" name="car_data[car_url]">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="label helvetica-regular" for="auton">{{ trans('site.car_number') }}</label>
                                                            <div class="auton">
                                                                <input id='auton' class="market" type="text" name="car_data[car_number]">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="label helvetica-regular" for="marka">{{ trans('site.car_make') }}</label>
                                                            <select class="market" name="car_data[car_make]" id="car_make" onchange="GetCarModel(this)">
                                                                <option value="0"></option>
                                                                @foreach($car_make as $make_item)
                                                                <option value="{{ $make_item['name'] }}">{{ $make_item['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="label helvetica-regular" for="model">{{ trans('site.car_model') }}</label>
                                                            <select class="market" name="car_data[car_model]" id="car_model" disabled>
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="label helvetica-regular" for="year">{{ trans('site.car_year') }}</label>
                                                            <select class="market" name="car_data[car_year]">
                                                                <option value="0"></option>
                                                                @foreach($year_list as $year_item)
                                                                <option value="{{ $year_item }}">{{ $year_item }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="label helvetica-regular" for="wheel">{{ trans('site.car_steering_wheel') }}</label>
                                                            <select class="market" name="car_data[car_steering_wheel]">
                                                                <option value="0"></option>
                                                                @foreach($steering_wheel as $key => $steering_item)
                                                                <option value="{{ $key }}">{{ $steering_item[app()->getLocale()] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="label helvetica-regular" for="fuel">{{ trans('site.car_fuel_type') }}</label>
                                                            <select class="market" name="car_data[car_fuel_type]">
                                                                <option value="0"></option>
                                                                @foreach($fuel_type as $key => $fuel_item)
                                                                <option value="{{ $key }}">{{ $fuel_item[app()->getLocale()] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="label helvetica-regular" for="type">{{ trans('site.car_body_type') }}</label>
                                                            <select class="market" name="car_data[car_body_type]">
                                                                <option value="0"></option>
                                                                @foreach($car_body as $key => $car_body_item)
                                                                <option value="{{ $key }}">{{ $car_body_item[app()->getLocale()] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="label helvetica-regular" for="ktype">{{ trans('site.car_gearbox') }}</label>
                                                            <select class="market" name="car_data[car_gearbox]">
                                                                <option value="0"></option>
                                                                @foreach($car_gearbox as $key => $car_gearbox_item)
                                                                <option value="{{ $key }}">{{ $car_gearbox_item[app()->getLocale()] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="label helvetica-regular" for="engine">{{ trans('site.car_engine_volume') }}</label>
                                                            <select class="market" name="car_data[car_engine_volume]">
                                                                <option value="0"></option>
                                                                @foreach($engine_volume as $engine_volume_item)
                                                                <option value="{{ $engine_volume_item }}">{{ $engine_volume_item }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="terms">
                                            <input type="checkbox" id="fast_review" name="fast_review" value="yes" checked>
                                            <label for="terms" class="helvetica-regular" style="font-size: 14px;"> მსურს ვისარგებლო სწრაფი განხილვის სერვისით <br>
                                            <a href="#0" id="readmore">{{ trans('site.read_more') }}</a>
                                            </label>
                                        </div>
                                        <div id="terms">
                                                <input type="checkbox" id="accept_terms" name="accept_terms" required>
                                                <label for="terms" class="helvetica-regular" style="font-size: 14px;"> ამით ვადასტურებ, რომ წავიკითხე და მესმის შ.პ.ს "ფინრივა" - ს კონფიდენციალურობის დებულება ნებართვა ასეთი პირადი მონაცემების მიწოდებაზე და რომ შ.პ.ს "ფინრივა" უფლებამოსილია დაამუშაოს ჩემი მონაცემები, , მიიღეთ ჩემი მონაცემები და სხვა ინფორმაცია სესხის ისტორიის მონაცემთა ბაზებიდან<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mt-60">
                                        <div class="col-md-12">
                                            <div class="nav-btn d-flex flex-wrap justify-content-between">
                                                <button type="button" onclick="LeasingFormSubmit()" class=" next-btn theme-btn-primary_alt theme-btn ">{{ trans('site.submit_now') }}<i class="arrow_right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 ps-xl-5 mt-5 mt-lg-0">
                        <div class="blog-sidebar-widget ps-lg-2">
                            <div class="widget-subscribe" style="padding: 30px 20px 40px 20px;">
                                <h4 class="widget-title mb-15 neue" style="font-size: 18px">{{ trans('site.loan_data') }} <img src="{{ url('assets/web/img\icon\pen.png') }}" id="pen" style="width: 20px 0px 15px 0; cursor: pointer;"></h4>
                                <hr>
                                <div class="col-lg-12" id="loanwidgetdata">
                                    <div class="col-lg-6">
                                        <p style="font-size: 15px" class="helvetica-regular">{{ trans('site.leasing_amount') }}</p>
                                    </div>
                                    <div class="col-lg-6" id="price">
                                        <p style="font-size: 15px" class="helvetica-regular"><span class="calc-amount">{{ request()->amount - request()->advance_payment }}</span> {{ trans('site.gel') }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="loanwidgetdata2">
                                    <div class="col-lg-6">
                                        <p style="font-size: 15px" class="helvetica-regular">{{ trans('site.leasing_month') }}</p>
                                    </div>
                                    <div class="col-lg-6" id="month">
                                        <p style="font-size: 15px"><span class="calc-duration">{{ request()->duration }}</span> {{ trans('site.month') }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="loanwidgetdata3">
                                    <div class="col-lg-6">
                                        <p style="font-size: 15px" class="helvetica-regular">{{ trans('site.month_percent') }}</p>
                                    </div>
                                    <div class="col-lg-6" id="payment">
                                        <p style="font-size: 15px" class="loan-month-percent helvetica-regular">{{ $parameterLeasing['leasing_month_percent'][0] }} %</p>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="loanwidgetdata3">
                                    <div class="col-lg-6">
                                        <p style="font-size: 15px" class="helvetica-regular">{{ trans('site.month_price') }}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p style="font-size: 15px" class="loan-month-amount helvetica-regular">{{ trans('site.gel') }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="loanwidgetdata3">
                                    <div class="col-lg-6">
                                        <p style="font-size: 15px" class="helvetica-regular">{{ trans('site.complicity') }}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p style="font-size: 15px" class="loan-complicity helvetica-regular">{{ trans('site.gel') }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="calculator-widget">
                                    <div class="row  gy-lg-0 gy-3">
                                        <div class="col-lg-12">
                                            <div class="single-calculator-widget calc-sidebar" style="padding: 20px; display: none;">
                                                <div class="single-range">
                                                    <div class="range-header mb-25">
                                                        <h6 class="helvetica-regular" style="width: 100%;">{{ trans('site.leasing_amount') }}</h6>
                                                        <input type="text" id="SetRange" value="{{ $parameterLeasing['leasing_price_default'][0] }}" style="width: 100%;">
                                                    </div>
                                                    <div id="RangeSlider"></div>
                                                </div>
                                                <div class="single-range mt-45 mb-45">
                                                    <div class="range-header d-flex flex-wrap justify-content-between align-items-center mb-25">
                                                        <h6 class="helvetica-regular" style="width: 100%;">{{ trans('site.leasing_month') }}</h6>
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            <li><span class="active_bar"></span></li>
                                                            <li class="nav-item" role="presentation">
                                                                <a class="nav-link active month-tab" id="monthTab" data-bs-toggle="tab" href="#monthTabId" role="tab" aria-controls="monthTabId" aria-selected="true">თვე</a>
                                                            </li>
                                                        </ul>
                                                        <input type="text" id="SetMonthRange" value="{{ $parameterLeasing['leasing_month_default'][0] }}" style="width: 100%;">
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
                                                <div class="single-range mb-25">
                                                    <div class="range-header mb-25" style="display: none;">
                                                        <h6 class="helvetica-regular" style="width: 100%;">{{ trans('site.advance_payment') }} {{ trans('site.gel') }}</h6>
                                                        <input type="text" id="PercetSetRangeAmount" value="@if(!empty(request()->advance_payment)) {{ request()->advance_payment }} @else {{ $parameterLeasing['leasing_price_default'][0] / 100 * $parameterLeasing['leasing_avanse_percent_default'][0] }} @endif" style="width: 100%;">
                                                    </div>
                                                    <div class="range-header mb-25">
                                                        <h6 class="helvetica-regular" style="width: 100%;">{{ trans('site.advance_payment') }} %</h6>
                                                        <input type="text" id="PercetSetRange" value="@if(!empty(request()->advance_payment)) {{ number_format(request()->advance_payment / request()->amount * 100, 0) }} @else $parameterLeasing['leasing_avanse_percent_default'][0] @endif" style="width: 100%;">
                                                    </div>
                                                    <div id="PercetRangeSlider"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ url('assets/web/img\icon\next.png') }}">
                                <button data-js="open" type="button" class="popupbutton">კალკულაციის მაგალითი </button>
                                <br>
                                <img src="{{ url('assets/web/img\icon\next.png') }}">
                                <a href="" data-modal="#modal" class="modal__trigger" style="transform: none;">სტანდარტული ინფორმაცია</a>
                            </div>
                            <div class="widget-subscribe" id="promocodewidget">
                                <h4 class="widget-title mb-15 neue" style="font-size: 16px">{{ trans('site.promo') }}</h4>
                                <input class="form-control" id="promo_code" name="promo_code" type="text" placeholder="">
                                <p style="font-size: 14px; margin-top: 5px; width: 100%;">{{ trans('site.promo_text') }}</p>
                            </div>  
                        </div>
                    </div>
                    <input type="hidden" id="leasing_type" name="leasing_type" value="leasing">
                    <input type="hidden" id="leasing_price" name="leasing_price" value="@if(!empty(request()->amount)) {{ request()->amount }} @else 0 @endif">
                    <input type="hidden" id="leasing_month" name="leasing_month" value="@if(!empty(request()->duration)) {{ request()->duration }} @else 0 @endif">
                    <input type="hidden" id="leasing_advance_payment" name="leasing_advance_payment" value="@if(!empty(request()->advance_payment)) {{ request()->advance_payment }} @else 0 @endif">
                </form>
            </div>
    </section>
</main>
<div class="popup" style="z-index: 500000;">
    <button name="close" id="popupclose">X</button>
    <h2>დაანგარიშების საფუძველი</h2>
    <p>კალკულაციის მონაცემები არის მხოლოდ ინფორმაციისთვის. ის გაძლევს ინფორმაციას ყოველთვიური გადასახადის შესახებ</p><br>
    <p>ყოველთვიური გადასახადი დაანგარიშებულია შემდეგი გარემოებებით:</p><br>
    <div class="col-lg-12" id="loanwidgetdata">
        <div class="col-lg-6">
            <p>ლიზინგის თანხა</p>
        </div>
        <div class="col-lg-6" id="pprice">
            <p class="pprice">{{ request()->amount - request()->advance_payment }} ₾</p>
        </div>
    </div>
    <div class="col-lg-12" id="loanwidgetdata2">
        <div class="col-lg-6">
            <p>ლიზინგის პირობები</p>
        </div>
        <div class="col-lg-6" id="pmonth">
            <p class="pmonth">{{ request()->duration }} თვე</p>
        </div>
    </div>
    <div class="col-lg-12" id="loanwidgetdata3">
        <div class="col-lg-6">
            <p>საპროცენტო განაკვეთი</p>
        </div>
        <div class="col-lg-6" id="ppayment">
            <p>{{ $parameterLeasing['leasing_month_percent'][0] }} %</p>
        </div>
    </div>
    <p>* საკომისიო არის 0 ₾ და ის გადაიხდება თანაბარ ნაწილად სესხის მთლიანი პერიოდის განმავლობაში.</p>
</div>
<div id="modal" class="modal modal__bg" role="dialog" aria-hidden="true">
    <div class="modal__dialog">
        <div class="modal__content">
            <h2>სტანდარტული ინფორმაცია</h2>
            <hr>
            <a href="#0" id="readmore">წაიკითხე მეტი</a>
            
            <!-- modal close button -->
            <a href="" class="modal__close demo-close">
                <svg class="" viewBox="0 0 24 24"><path d="M19 6.41l-1.41-1.41-5.59 5.59-5.59-5.59-1.41 1.41 5.59 5.59-5.59 5.59 1.41 1.41 5.59-5.59 5.59 5.59 1.41-1.41-5.59-5.59z"/><path d="M0 0h24v24h-24z" fill="none"/></svg>
            </a>
            
        </div>
    </div>
</div>
<style type="text/css">
    .nav-tabs .nav-link {
        margin-bottom: 6px;
        background: 0 0;
        border: none; 
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }

    .market {
        font-family: 'HelveticaRegular';
        font-weight: normal;
        font-size: 13px;
        height: 38px;
    }
</style>
@endsection

@section('js')
<script type="text/javascript">
    function LeasingFormSubmit() {
        var form = $('#leasing_form')[0];
        var data = new FormData(form);

        $.ajax({
            dataType: 'json',
            url: "/ajax/ajaxLeasingSubmit",
            type: "POST",
            data: data,
            processData: false,
            contentType: false,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if(data['status'] == true) {
                    if(data['errors'] == true) {

                    } else {
                        window.location.replace(data['RedirectUrl']);
                    }
                }
            }
        });
    }

    $(".tab-click-1").click(function() {
        $("#car_status").val(1);
    });

    $(".tab-click-2").click(function() {
        $("#car_status").val(2);
    });

    function GetCarModel() {
        $.ajax({
            dataType: 'json',
            url: "/ajax/ajaxGetCarModel",
            type: "GET",
            data: {
                car_make: $("#car_make").val(),
            },
            success: function(data) {
                if(data['status'] == true) {
                    if(data['CarModelList'].length > 0) {
                        $("#car_model").html('');
                        $.each(data['CarModelList'], function(key, value) {
                            $("#car_model").append(`<option value='`+value['name']+`'>`+value['name']+`</option>`)
                        });
                        $("#car_model").attr('disabled', false);
                    } else {
                        $("#car_model").attr('disabled', true);
                    }
                } else {
                    alert('დაფისქირდა შეცდომა გთხოვთ სცადოთ თავიდან');
                }
            }
        });
    }

    $.ajax({
        dataType: 'json',
        url: "/ajax/ajaxGetLoanData",
        type: "GET",
        data: {
            leasing_month: $("#leasing_month").val(),
            leasing_price: $("#leasing_price").val(),
            leasing_advance_payment: $("#leasing_advance_payment").val(),
        },
        success: function(data) {
            if(data['status'] == true) {
                $(".loan-month-amount").html(data['loan_data']['loan_month_price']+' {{ trans('site.gel') }}');
                $(".loan-complicity").html($("#leasing_advance_payment").val() +' {{ trans('site.gel') }}');
            }
        }
    });

    function CheckPromoCode() {
        $.ajax({
            dataType: 'json',
            url: "/ajax/ajaxCheckPromoCode",
            type: "GET",
            data: {
                promo_code: $("#promo_code").val(),
                user_phone: $("#user_phone").val(),
            },
            success: function(data) {
                if(data['status'] == true) {
                    if(data['errors'] == true) {
                        if(data['validate'] == false) {
                            $(".promo-text").html('');
                            $.each(data['message'], function(key, value) {
                                $(".promo-text").append(`<span class="text-danger">`+value+`</span><br>`);
                            })
                        } else {
                            $(".promo-text").html(`<span class="text-danger">`+data['message']+`</span>`);
                        }
                    } else {
                        $(".promo-text").html(`<span class="text-success">`+data['message']+`</span>`);
                    }
                }
            }
        });
    }

    $("#pen").click(function() {
        $(".calc-sidebar").toggle( "slow" );
    });

    function Calculate(data) {
        var SelectedAmount, selectedTime = {}, RateOfInterestTime, RateOfInterestAmount;

        if (typeof wNumb !== "undefined") {
            var AmountFormat = wNumb({
                decimals: 0,
                thousand: ",",
                prefix: "",
            });

            var TimeFormatMonths = wNumb({
              prefix: " months",
            });

            var TimeFormatYears = wNumb({
              prefix: " months",
            });
        }

          var mySlider = document.getElementById("RangeSlider");
          var mySliderMonth = document.getElementById("MonthRangeSlider");
          var mySliderYear = document.getElementById("YearRangeSlider");
          var mySliderPercent = document.getElementById("PercetRangeSlider");
          var SliderAmount = document.getElementById("SliderAmount");
          var SliderPeriod = document.getElementById("SliderPeriod");

          function clickOnPip(sliderName, This) {
            var value = Number(This.getAttribute("data-value"));
            sliderName.noUiSlider.set(value);
          }

          function SetPipsOnSlider(PipsName, sliderName) {
            for (var i = 0; i < PipsName.length; i++) {
              PipsName[i].style.cursor = "pointer";
              PipsName[i].addEventListener("click", function () {
                clickOnPip(sliderName, this);
              });
            }
          }

          if (mySlider && mySliderMonth && mySliderYear && mySliderPercent) {
            noUiSlider.create(mySlider, {
              start: [parseInt({{ request()->amount }})],
              connect: "lower",
              step: 100,
              range: {
                min: parseInt([{{ $parameterLeasing['leasing_min_price'][0] }}]),
                max: parseInt([{{ $parameterLeasing['leasing_max_price'][0] }}]),
              },
              format: wNumb({
                decimals: 0,
                thousand: "",
                prefix: "",
              }),
              pips: {
                mode: "values",
                density: 100,
                values: [parseInt({{ $parameterLeasing['leasing_min_price'][0] }}), parseInt({{ $parameterLeasing['leasing_max_price'][0] }})],
                stepped: false,
                format: wNumb({
                  encoder: function (a) {
                    return a / 1;
                  },
                  decimals: 0,
                  thousand: ",",
                  prefix: "₾",
                }),
              },
            });
            noUiSlider.create(mySliderMonth, {
              start: [parseInt({{ request()->duration }})],
              connect: "lower",
              range: {
                min: parseInt({{ $parameterLeasing['leasing_min_month'][0] }}),
                max: parseInt({{ $parameterLeasing['leasing_max_month'][0] }}),
              },
              format: wNumb({
                decimals: 0,
                suffix: "",
              }),
              pips: {
                mode: "values",
                density: 100,
                values: [parseInt({{ $parameterLeasing['leasing_min_month'][0] }}), parseInt({{ $parameterLeasing['leasing_max_month'][0] }})],
                stepped: true,
                format: wNumb({
                  decimals: 0,
                }),
              },
            });
            noUiSlider.create(mySliderPercent, {
              start: [$("#PercetSetRangeAmount").val()],
              connect: "lower",
              range: {
                min: parseInt($("#SetRange").val() * {{ $parameterLeasing['leasing_avanse_min_percent'][0] }} / 100),
                max: parseInt($("#SetRange").val() * {{ $parameterLeasing['leasing_avanse_max_percent'][0] }} / 100),
              },
              format: wNumb({
                decimals: 0,
                suffix: "",
              }),
              pips: {
                mode: "values",
                density: 100,
                values: [$("#SetRange").val() * {{ $parameterLeasing['leasing_avanse_min_percent'][0] }} / 100, $("#SetRange").val() * {{ $parameterLeasing['leasing_avanse_max_percent'][0] }} / 100],
                stepped: true,
                format: wNumb({
                  encoder: function (a) {
                    return a / 1;
                  },
                  decimals: 0,
                  thousand: ",",
                  prefix: "₾",
                }),
              },
            });

            //Slider Pips
            var pips = mySlider.querySelectorAll(".noUi-value");
            var pipsMonth = mySliderMonth.querySelectorAll(".noUi-value");
            var pipsYear = mySliderYear.querySelectorAll(".noUi-value");
            var pipsPercent = mySliderPercent.querySelectorAll(".noUi-value");

            //Slider Input Element
            var inputMonthFormat = document.getElementById("SetMonthRange");
            var inputFormat = document.getElementById("SetRange");

            SetPipsOnSlider(pips, mySlider);
            SetPipsOnSlider(pipsMonth, mySliderMonth);
            SetPipsOnSlider(pipsYear, mySliderYear);
            SetPipsOnSlider(pipsYear, mySliderPercent);

            function calc() {
                $.ajax({
                    dataType: 'json',
                    url: "/ajax/ajaxGetLoanData",
                    type: "GET",
                    data: {
                        leasing_month: $("#SetMonthRange").val(),
                        leasing_price: $("#SetRange").val(),
                        leasing_advance_payment: $("#PercetSetRangeAmount").val(),
                    },
                    success: function(data) {
                        if(data['status'] == true) {
                            $(".calc-duration, .calc-amount").html('');
                            $(".calc-duration").html($("#SetMonthRange").val());
                            $(".calc-amount").html($("#SetRange").val());
                            $(".pprice").html($("#SetRange").val()+' ₾');
                            $(".pmonth").html($("#SetMonthRange").val()+ ' {{ trans('site.month') }}');
                            $("#leasing_price").val($("#SetRange").val());
                            $("#leasing_month").val($("#SetMonthRange").val());
                            $(".loan-month-amount").html(data['loan_data']['loan_month_price']+' {{ trans('site.gel') }}');
                            $(".loan-complicity").html($("#leasing_advance_payment").val() +' {{ trans('site.gel') }}');
                        }
                    }
                });
            }

            mySlider.noUiSlider.on("update", function (values, handle) {
              inputFormat.value = values[handle];
              SelectedAmount = AmountFormat.from(values[handle]);
              mySliderPercent.noUiSlider.updateOptions({
                    start: [$("#SetRange").val() / 100 * $("#PercetSetRange").val()],
                    range: {
                        'min': $("#SetRange").val() * {{ $parameterLeasing['leasing_avanse_min_percent'][0] }} / 100,
                        'max': $("#SetRange").val() * {{ $parameterLeasing['leasing_avanse_max_percent'][0] }} / 100,
                    },
                    pips: {
                        mode: "values",
                        density: 100,
                        values: [$("#SetRange").val() * {{ $parameterLeasing['leasing_avanse_min_percent'][0] }} / 100, $("#SetRange").val() * {{ $parameterLeasing['leasing_avanse_max_percent'][0] }} / 100],
                        stepped: true,
                        format: wNumb({
                          encoder: function (a) {
                            return a / 1;
                          },
                          decimals: 0,
                          thousand: ",",
                          prefix: "₾",
                        }),
                    },
                });
            });

            mySlider.noUiSlider.on("change", function (values, handle) {
                inputFormat.value = values[handle];
                SelectedAmount = AmountFormat.from(values[handle]);
                calc();
                mySliderPercent.noUiSlider.updateOptions({
                    start: [$("#PercetSetRangeAmount").val()],
                    range: {
                        min: parseInt($("#SetRange").val() * {{ $parameterLeasing['leasing_avanse_min_percent'][0] }} / 100),
                        max: parseInt($("#SetRange").val() * {{ $parameterLeasing['leasing_avanse_max_percent'][0] }} / 100),
                    },
                    pips: {
                        mode: "values",
                        density: 100,
                        values: [$("#SetRange").val() * {{ $parameterLeasing['leasing_avanse_min_percent'][0] }} / 100, $("#SetRange").val() * {{ $parameterLeasing['leasing_avanse_max_percent'][0] }} / 100],
                        stepped: true,
                        format: wNumb({
                          encoder: function (a) {
                            return a / 1;
                          },
                          decimals: 0,
                          thousand: ",",
                          prefix: "₾",
                        }),
                    },
                });
            });

            mySliderMonth.noUiSlider.on("change", function (values, handle) {
                calc();
            });

            mySliderPercent.noUiSlider.on("change", function (values, handle) {
                $("#PercetSetRangeAmount").val(values[handle]);
                $("#PercetSetRange").val((values[handle] / SelectedAmount * 100).toFixed(0));
                $(".loan-complicity").html(values[handle] +' {{ trans('site.gel') }}');
                $("#leasing_advance_payment").val(values[handle]);
            });

            mySliderPercent.noUiSlider.on("update", function (values, handle) {
                $("#PercetSetRangeAmount").val(values[handle]);
                $("#PercetSetRange").val((values[handle] / SelectedAmount * 100).toFixed(0));
                $(".loan-complicity").html(values[handle] +' {{ trans('site.gel') }}');
                $("#leasing_advance_payment").val(values[handle]);
            });

            inputFormat.addEventListener("change", function () {
              mySlider.noUiSlider.set(this.value);
              calc();
            });

            if ($("#monthTab.active").length > 0) {
              mySliderMonth.noUiSlider.on("update", function (values, handle) {
                inputMonthFormat.value = values[handle];
                selectedTime = {
                  type: "month",
                  value: TimeFormatMonths.from(values[handle]),
                };
              });

              mySliderMonth.noUiSlider.on("change", function (values, handle) {
                calc();
              });

              inputMonthFormat.addEventListener("change", function () {
                mySliderMonth.noUiSlider.set(this.value);
              });
            } else if ($("#yearTab.active").length > 0) {
              mySliderYear.noUiSlider.on("update", function (values, handle) {
                inputMonthFormat.value = values[handle];
                selectedTime = {
                  type: "year",
                  value: TimeFormatYears.from(values[handle]),
                };
                
              });
            }

            inputMonthFormat.addEventListener("change", function () {
              if ($("#monthTab.active").length > 0) {
                mySliderMonth.noUiSlider.set(this.value);
              } else if ($("#yearTab.active").length > 0) {
                mySliderYear.noUiSlider.set(this.value);
              }
            });

            $("#yearTab").on("click", function () {
              mySliderMonth.noUiSlider.off("update", function (values, handle) {
                inputMonthFormat.value = values[handle];
                selectedTime = {
                  type: "month",
                  value: TimeFormatMonths.from(values[handle]),
                };
                
              });
              mySliderYear.noUiSlider.on("update", function (values, handle) {
                inputMonthFormat.value = values[handle];
                selectedTime = {
                  type: "year",
                  value: TimeFormatYears.from(values[handle]),
                };
              });
            });
            
          }
    }


    Calculate();


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

</script>
@endsection