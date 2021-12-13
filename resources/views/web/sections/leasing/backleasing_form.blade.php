@extends('web.layout.layout')

@section('content')
<main>
    <section class="banner-area-2 loan-banner pt-145"></section>
    <section class="pb-40 bg_white" style="padding: 100px 0 30px 0;">
        <div class="container">
                <form id="leasing_form" class="row">
                    <div class="col-lg-8 ">
                        <div class="blog-post-widget">
                            <div class="row gy-4 ">
                                <div class="loan-details-widget bg_white">
                                    <div id="formtitle">
                                        <h3 class="neue" style="font-size: 18px; font-weight: bold;">{{ trans('site.user_data') }}</h3>
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
                                            <input type="text" name="user_phone" class="form-control" value="@if(!empty(request()->phone)){{ request()->phone }}@endif">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="label helvetica-regular" for="dob-d">{{ trans('site.email') }}</label>
                                            <input type="text" name="user_email" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="tab-content">
                                                <input type="hidden" name="car_status" id="car_status" value="1">
                                                <div class="tab-pane fade  show active" id="as" role="tabpanel" aria-labelledby="yearTab">
                                                    <div class="row gy-4" id="autoneed">
                                                        <div id="formtitle" style="margin-bottom: 0;">
                                                            <h3 class="neue" style="font-size: 18px; font-weight: bold;">{{ trans('site.car_info') }}</h3>
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
                                            <input type="checkbox" id="fast_review" name="fast_review" value="yes">
                                            <label for="terms" class="helvetica-regular" style="font-size: 14px;"> მსურს ვისარგებლო სწრაფი განხილვის სერვისით <br>
                                            <a href="#0" id="readmore">{{ trans('site.read_more') }}</a>
                                            </label>
                                        </div>
                                        <div id="terms">
                                                <input type="checkbox" id="accept_terms" name="accept_terms" required>
                                                <label for="terms" class="helvetica-regular" style="font-size: 14px;"> ამით ვადასტურებ, რომ წავიკითხე და მესმის შ.პ.ს "mogo" - ს კონფიდენციალურობის დებულება ნებართვა ასეთი პირადი მონაცემების მიწოდებაზე და რომ შ.პ.ს "mogo" უფლებამოსილია დაამუშაოს ჩემი მონაცემები, , მიიღეთ ჩემი მონაცემები და სხვა ინფორმაცია სესხის ისტორიის მონაცემთა ბაზებიდან<br>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mt-60">
                                        <div class="col-md-12">
                                            <div class="nav-btn d-flex flex-wrap justify-content-between">
                                                <button type="button" onclick="BackLeasingFormSubmit()" class=" next-btn theme-btn-primary_alt theme-btn ">{{ trans('site.submit_now') }}<i class="arrow_right"></i></button>
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
                                <h4 class="widget-title mb-15 neue">{{ trans('site.loan_data') }} <img src="{{ url('assets/web/img\icon\pen.png') }}" id="pen" style="width: 20px 0px 15px 0; cursor: pointer;"></h4>
                                <hr>
                                <div class="col-lg-12" id="loanwidgetdata">
                                    <div class="col-lg-6">
                                        <p style="font-size: 15px">{{ trans('site.leasing_amount') }}</p>
                                    </div>
                                    <div class="col-lg-6" id="price">
                                        <p style="font-size: 15px"><span class="calc-amount">{{ request()->amount - request()->advance_payment }}</span> {{ trans('site.gel') }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="loanwidgetdata2">
                                    <div class="col-lg-6">
                                        <p style="font-size: 15px">{{ trans('site.leasing_month') }}</p>
                                    </div>
                                    <div class="col-lg-6" id="month">
                                        <p style="font-size: 15px"><span class="calc-duration">{{ request()->duration }}</span> {{ trans('site.month') }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="loanwidgetdata3">
                                    <div class="col-lg-6">
                                        <p style="font-size: 15px">{{ trans('site.month_percent') }}</p>
                                    </div>
                                    <div class="col-lg-6" id="payment">
                                        <p style="font-size: 15px" class="loan-month-percent">{{ $parameterLeasing['leasing_month_percent'][0] }} %</p>
                                    </div>
                                </div>
                                <div class="col-lg-12" id="loanwidgetdata3">
                                    <div class="col-lg-6">
                                        <p style="font-size: 15px">{{ trans('site.month_price') }}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p style="font-size: 15px" class="loan-month-amount">{{ trans('site.gel') }}</p>
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ url('assets/web/img\icon\next.png') }}">
                                <button data-js="open" type="button" class="popupbutton">კალკულაციის მაგალითი / სტანდარტული ინფორმაცია</button>
                            </div>
                            <div class="widget-subscribe" id="promocodewidget">
                                <h4 class="widget-title mb-15 neue" style="font-size: 16px">{{ trans('site.promo') }}</h4>
                                <form action="#" class="mt-15">
                                    <input class="form-control" id="promo_code" name="promo_code" type="text" placeholder="">
                                    <button type="button" onclick="CheckPromoCode()" style="width: 100%; height: 35px; border-radius: 5px; margin-top: 10px; background: #f0c019;">{{ trans('site.check_promo') }}</button>
                                    <p style="font-size: 14px; margin-top: 5px; width: 100%;" class="promo-text helvetica-regular"></p>
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
            <p>{{ request()->amount - request()->advance_payment }} ₾</p>
        </div>
    </div>
    <div class="col-lg-12" id="loanwidgetdata2">
        <div class="col-lg-6">
            <p>ლიზინგის პირობები</p>
        </div>
        <div class="col-lg-6" id="pmonth">
            <p>{{ request()->duration }} თვე</p>
        </div>
    </div>
    <div class="col-lg-12" id="loanwidgetdata3">
        <div class="col-lg-6">
            <p>ყოველთვიური გადასახადი</p>
        </div>
        <div class="col-lg-6" id="ppayment">
            <p>{{ $parameterLeasing['leasing_month_percent'][0] }}% ყოველთვიური ან {{ $parameterLeasing['leasing_month_percent'][0] * 12}}% ყოველწლიური</p>
        </div>
    </div>
    <p>* საკომისიო არის 0 ₾ და ის გადაიხდება თანაბარ ნაწილად სესხის მთლიანი პერიოდის განმავლობაში.</p>
    <hr>
    <h2>სტანდარტული ინფორმაცია</h2>
    <a href="#0" id="readmore">წაიკითხე მეტი</a>
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
    function BackLeasingFormSubmit() {
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
                        Swal.fire({
                          title: '{{ trans('site.success_loan_title') }}',
                          text: '{{ trans('site.success_loan_title') }}',
                          icon: 'success',
                          confirmButtonText: '{{ trans('site.success_loan_title') }}',
                          timer: 1500
                        });
                        window.location.replace("{{ route('actionWebMain') }}");
                    }
                }
            }
        });
    }
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
                $(".loan-complicity").html($("#PercetSetRangeAmount").val()+' {{ trans('site.gel') }}');
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
                leasing_month: $("#leasing_month").val(),
                leasing_price: $("#leasing_price").val(),
                user_phone: $("#user_phone").val(),
            },
            success: function(data) {
                if(data['status'] == true) {
                    if(data['errors'] == true) {
                        $(".promo-text").html(`<span class="text-danger">`+data['message']+`</span>`);
                    } else {
                        $(".loan-month-amount").html(data['loan_data']['loan_month_price']+' {{ trans('site.gel') }}');
                        $(".loan-month-percent").html(data['loan_data']['loan_month_percent']+' %');
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

          if (mySlider && mySliderMonth && mySliderYear) {
            noUiSlider.create(mySlider, {
              start: [parseInt({{ request()->amount }})],
              connect: "lower",
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

            //Slider Pips
            var pips = mySlider.querySelectorAll(".noUi-value");
            var pipsMonth = mySliderMonth.querySelectorAll(".noUi-value");
            var pipsYear = mySliderYear.querySelectorAll(".noUi-value");

            //Slider Input Element
            var inputMonthFormat = document.getElementById("SetMonthRange");
            var inputFormat = document.getElementById("SetRange");

            SetPipsOnSlider(pips, mySlider);
            SetPipsOnSlider(pipsMonth, mySliderMonth);
            SetPipsOnSlider(pipsYear, mySliderYear);

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
                            $(".pprice").html($("#SetRange").val());
                            $(".pmonth").html($("#SetMonthRange").val());
                            $("#leasing_price").val($("#SetRange").val());
                            $("#leasing_month").val($("#SetMonthRange").val());
                            $(".loan-month-amount").html(data['loan_data']['loan_month_price']+' {{ trans('site.gel') }}');
                        }
                    }
                });
            }

            mySlider.noUiSlider.on("update", function (values, handle) {
              inputFormat.value = values[handle];
              SelectedAmount = AmountFormat.from(values[handle]);
            });

            mySlider.noUiSlider.on("change", function (values, handle) {
                inputFormat.value = values[handle];
                SelectedAmount = AmountFormat.from(values[handle]);
                calc();
            });

            mySliderMonth.noUiSlider.on("change", function (values, handle) {
                calc();
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
            $("#monthTab").on("click", function () {
              mySliderYear.noUiSlider.off("update", function (values, handle) {
                inputMonthFormat.value = values[handle];
                selectedTime = {
                  type: "year",
                  value: TimeFormatYears.from(values[handle]),
                };
                
              });
              mySliderMonth.noUiSlider.on("update", function (values, handle) {
                inputMonthFormat.value = values[handle];
                selectedTime = {
                  type: "month",
                  value: TimeFormatMonths.from(values[handle]),
                };
              });
            });
          }
    }
    Calculate();

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

    $(document).ready(function () {
        $("[data-js=open]").on("click", function() {
            popupOpenClose($(".popup"));
        });
    });
</script>
@endsection