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
	      start: parseInt(data['LeasingArray']['leasing_price_default']),
	      step: 100,
	      connect: "lower",
	      range: {
	        min: parseInt(data['LeasingArray']['leasing_min_price']),
	        max: parseInt(data['LeasingArray']['leasing_max_price']),
	      },
	      format: wNumb({
	        decimals: 0,
	        thousand: "",
	        prefix: "",
	      }),
	      pips: {
	        mode: "values",
	        density: 100,
	        values: [parseInt(data['LeasingArray']['leasing_min_price']), parseInt(data['LeasingArray']['leasing_max_price'])],
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
	      start: [parseInt(data['LeasingArray']['leasing_month_default'])],
	      connect: "lower",
	      range: {
	        min: parseInt(data['LeasingArray']['leasing_min_month']),
	        max: parseInt(data['LeasingArray']['leasing_max_month']),
	      },
	      format: wNumb({
	        decimals: 0,
	        suffix: "",
	      }),
	      pips: {
	        mode: "values",
	        density: 100,
	        values: [parseInt(data['LeasingArray']['leasing_min_month']), parseInt(data['LeasingArray']['leasing_max_month'])],
	        stepped: true,
	        format: wNumb({
	          decimals: 0,
	        }),
	      },
	    });
		noUiSlider.create(mySliderPercent, {
	      start: [parseInt($("#PercetSetRangeAmount").val())],
	      connect: "lower",
	      step: 1,
	      range: {
	        min: parseInt($("#SetRange").val() * data['LeasingArray']['leasing_avanse_min_percent'] / 100),
	        max: parseInt($("#SetRange").val() * data['LeasingArray']['leasing_avanse_max_percent'] / 100),
	      },
	      format: wNumb({
	        decimals: 0,
	        suffix: "",
	      }),
	      pips: {
	        mode: "values",
	        density: 100,
	        values: [parseInt($("#SetRange").val() * data['LeasingArray']['leasing_avanse_min_percent'] / 100), parseInt($("#SetRange").val() * data['LeasingArray']['leasing_avanse_max_percent'] / 100)],
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
			        	$("#emiAmount").html(data['loan_data']['loan_month_price']+'₾');
			        	$("#emiAmount2").html($("#SetRange").val() / 100 * $('#PercetSetRange').val()+'₾');
			        }
			    }
			});
	    }

	    mySlider.noUiSlider.on("update", function (values, handle) {
	      inputFormat.value = values[handle];
	      SelectedAmount = AmountFormat.from(values[handle]);
	      mySliderPercent.noUiSlider.updateOptions({
	      		start: [$("#SetRange").val() / 100 * $("#PercetSetRange").val()],
	      		step: 1,
			    range: {
			        'min': parseInt($("#SetRange").val() * data['LeasingArray']['leasing_avanse_min_percent'] / 100),
			        'max': parseInt($("#SetRange").val() * data['LeasingArray']['leasing_avanse_max_percent'] / 100),
			    },
			    pips: {
			        mode: "values",
			        density: 100,
			        values: [parseInt($("#SetRange").val() * data['LeasingArray']['leasing_avanse_min_percent'] / 100), parseInt($("#SetRange").val() * data['LeasingArray']['leasing_avanse_max_percent'] / 100)],
			        stepped: false,
			        format: wNumb({
			          encoder: function (a) {
			            return a / 1;
			          },
			          decimals: 0,
			          thousand: " ",
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
			        'min': $("#SetRange").val() * data['LeasingArray']['leasing_avanse_min_percent'] / 100,
			        'max': $("#SetRange").val() * data['LeasingArray']['leasing_avanse_max_percent'] / 100,
			    },
			    pips: {
			        mode: "values",
			        density: 100,
			        values: [$("#SetRange").val() * data['LeasingArray']['leasing_avanse_min_percent'] / 100, $("#SetRange").val() * data['LeasingArray']['leasing_avanse_max_percent'] / 100],
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
	      	calc();
	      	$("#PercetSetRangeAmount").val($("#SetRange").val() / 100 * $('#PercetSetRange').val());
	      	$("#PercetSetRange").val((values[handle] / SelectedAmount * 100).toFixed(0));
	    });

	    mySliderPercent.noUiSlider.on("update", function (values, handle) {
	      	calc();
	      	$("#PercetSetRangeAmount").val($("#SetRange").val() / 100 * $('#PercetSetRange').val());
	      	$("#PercetSetRange").val((values[handle] / SelectedAmount * 100).toFixed(0));
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

	  $("#SetRange, #SetMonthRange, #PercetSetRange").keyup(function(event) {
	$.ajax({
	    dataType: 'json',
	    url: "/ajax/ajaxGetLeasingParameters",
	    type: "GET",
	    data: {},
	    success: function(data) {
	        if(data['status'] == true) {
	            calc();
	            $.ajax({
				    dataType: 'json',
				    url: "/ajax/ajaxGetLoanData",
				    type: "GET",
				    data: {
				    	leasing_month: data['LeasingArray']['leasing_month_default'],
				    	leasing_price: data['LeasingArray']['leasing_price_default'],
	    				leasing_advance_payment: $("#PercetSetRangeAmount").val(),
				    },
				    success: function(data) {
				        if(data['status'] == true) {
				        	$("#emiAmount").html(data['loan_data']['loan_month_price']+'₾');
				        	$("#emiAmount2").html($("#SetRange").val() / 100 * $('#PercetSetRange').val()+'₾');
				        }
				    }
				});
	        }
	    }
	});
});
}




$.ajax({
    dataType: 'json',
    url: "/ajax/ajaxGetLeasingParameters",
    type: "GET",
    data: {},
    success: function(data) {
        if(data['status'] == true) {
            Calculate(data);
            $.ajax({
			    dataType: 'json',
			    url: "/ajax/ajaxGetLoanData",
			    type: "GET",
			    data: {
			    	leasing_month: data['LeasingArray']['leasing_month_default'],
			    	leasing_price: data['LeasingArray']['leasing_price_default'],
    				leasing_advance_payment: $("#PercetSetRangeAmount").val(),
			    },
			    success: function(data) {
			        if(data['status'] == true) {
			        	$("#emiAmount").html(data['loan_data']['loan_month_price']+'₾');
			        	$("#emiAmount2").html($("#SetRange").val() / 100 * $('#PercetSetRange').val()+'₾');
			        }
			    }
			});
        }
    }
});

function LesingFormSubmit() {
    $.ajax({
        dataType: 'json',
        url: "/ajax/ajaxLeasingFormSubmit",
        type: "POST",
        data: {
        	amount: $("#SetRange").val(),
        	duration: $("#SetMonthRange").val(),
        	phone: $("#inputPhoneNumber").val(),
        	terms: $("#terms").val(),
        	advance_payment: $("#PercetSetRangeAmount").val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
	        $("#preloader").css("display","flex");
	    },
        success: function(data) {
	        $("#preloader").css("display","none");
            if(data['status'] == true) {
            	$("#inputPhoneNumber").removeClass('border-danger')

                if(data['errors'] == true) {
            		$("#inputPhoneNumber").addClass('border-danger')
            		$(".error-message").html(data['message'])
                }
                else {
                	window.location.replace(data['RedirectUrl']);
                }
            } else {
                alert('დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან');
            }
        }
    });
}