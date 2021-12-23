function popupOpenClose(popup){if($(".wrapper").length==0){$(popup).wrapInner("<div class='wrapper'></div>")}
$(popup).show();$(popup).click(function(e){if(e.target==this){if($(popup).is(':visible')){$(popup).hide()}}});$(popup).find("button[name=close]").on("click",function(){if($(".formElementError").is(':visible')){$(".formElementError").remove()}
$(popup).hide()})}
$(document).ready(function(){$("[data-js=open]").on("click",function(){popupOpenClose($(".popup"))})});function copyToClipboard(id){$(".copy_"+id).addClass('d-none');$(".copied_"+id).removeClass('d-none');setInterval(function(){$(".copy_"+id).removeClass('d-none');$(".copied_"+id).addClass('d-none')},700);var copyParam=document.getElementById("copy_value_"+id);copyParam.select();copyParam.setSelectionRange(0,99999)
document.execCommand("copy")}(function($){"use strict";var $window=$(window);var didScroll,lastScrollTop=0,delta=5,$mainNav=$("#sticky"),$mainNavHeight=$mainNav.outerHeight(),scrollTop;$window.on("scroll",function(){didScroll=!0;scrollTop=$(this).scrollTop()});setInterval(function(){if(didScroll){hasScrolled();didScroll=!1}},200);function hasScrolled(){if(Math.abs(lastScrollTop-scrollTop)<=delta){return}
if(scrollTop>lastScrollTop&&scrollTop>$mainNavHeight){}else{if(scrollTop+$(window).height()<$(document).height()){$mainNav.css("top",0)}}
lastScrollTop=scrollTop}
for(var clickButton of
document.getElementsByClassName("clickTheButton"))
clickButton.addEventListener("click",alertMeessage);function alertMeessage(){alert("დაკოპირდა")}
for(var clickButton2 of
document.getElementsByClassName("clickTheButton2"))
clickButton2.addEventListener("click",alertMeessage);function alertMeessage(){alert("დაკოპირდა")}
for(var clickButton3 of
document.getElementsByClassName("clickTheButton3"))
clickButton3.addEventListener("click",alertMeessage);function alertMeessage(){alert("დაკოპირდა")}
for(var clickButton4 of
document.getElementsByClassName("clickTheButton4"))
clickButton4.addEventListener("click",alertMeessage);function alertMeessage(){alert("დაკოპირდა")}
for(var clickButton5 of
document.getElementsByClassName("clickTheButton5"))
clickButton5.addEventListener("click",alertMeessage);function alertMeessage(){alert("დაკოპირდა")}(function(){var parent=document.querySelector(".price-slider");if(!parent)return;var rangeS=parent.querySelectorAll("input[type=range]"),numberS=parent.querySelectorAll("input[type=number]");rangeS.forEach(function(el){el.oninput=function(){var slide1=parseFloat(rangeS[0].value),slide2=parseFloat(rangeS[1].value);if(slide1>slide2){[slide1,slide2]=[slide2,slide1]}
numberS[0].value=slide1;numberS[1].value=slide2}});numberS.forEach(function(el){el.oninput=function(){var number1=parseFloat(numberS[0].value),number2=parseFloat(numberS[1].value);if(number1>number2){var tmp=number1;numberS[0].value=number2;numberS[1].value=tmp}
rangeS[0].value=number1;rangeS[1].value=number2}})})();var $window=$(window);$window.on('scroll',function(){var scroll=$window.scrollTop();if(scroll<205){$("#sticky").removeClass("navbar_fixed")}else{$("#sticky").addClass("navbar_fixed")}});$(".navbar-nav > li .mobile_dropdown_icon").on("click",function(e){$(this).parent().find("ul").first().toggle(300);$(this).parent().siblings().find("ul").hide(300)});if($(".submenu").length){$(".submenu > .dropdown-toggle").on("click",function(){var location=$(this).attr("href");window.location.href=location;return!1})}
if($("header").length){$("header").smoothScroll()}
if($("#banner_animation").length>0){$("#banner_animation").parallax({scalarX:10.0,scalarY:7.0,})}
if($("#banner_animation2").length>0){$("#banner_animation2").parallax({scalarX:10.0,scalarY:0.0,})}
if($("#card_area_animation").length>0){$("#card_area_animation").parallax({scalarX:10.0,scalarY:0.0,})}
if($("#MouseMoveAnimation").length>0){$("#MouseMoveAnimation").parallax({scalarX:5.0,scalarY:10.0,})}
if($("#readOnlyClose").length){$("#readOnlyClose").on("click",function(){$("#locationSelect").val("");$("#locationSelect").focus()})}
var back_top_btn=$("#back-to-top");$(window).scroll(function(){if($(window).scrollTop()>300){back_top_btn.addClass("show")}else{back_top_btn.removeClass("show")}});back_top_btn.on("click",function(e){e.preventDefault();$("html, body").animate({scrollTop:0},"300")});new WOW({}).init();if($(".counter span").length){$(".counter span").counterUp()}
if($(".stat-counter").length){$(".stat-counter").counterUp()}
if($("#select-lang").length){$("#select-lang").niceSelect()}
if($("#select-loan-type").length){$("#select-loan-type").niceSelect()}
if($("#loandetails01").length){$("#loandetails01").niceSelect()}
if($("#loandetails02").length){$("#loandetails02").niceSelect()}
if($("#dob-d").length){$("#dob-d").niceSelect()}
if($("#dob-m").length){$("#dob-m").niceSelect()}
if($("#dob-y").length){$("#dob-y").niceSelect()}
if($("#sort-select").length){$("#sort-select").niceSelect()}
if($("#locationSelect").length){$("#locationSelect").editableSelect()}
if($("[data-fancybox]").length){$("[data-fancybox]").fancybox({animationEffect:"zoom-in-out",})}
if($(".testimonial-slider").length){$(".testimonial-slider").slick({dots:!1,arrows:!0,prevArrow:'<button type="button" class="slick-prev"><i class="arrow_carrot-left"></i></button>',nextArrow:'<button type="button" class="slick-next"><i class="arrow_carrot-right"></i></button>',slidesToShow:1,centerMode:!0,autoplay:!0,infinite:!0,autoplaySpeed:7000,slidesToScroll:1,variableWidth:!0,responsive:[{breakpoint:576,settings:{centerMode:!1,variableWidth:!1,},},],})}
if($(".testimonial-slider-2").length){$(".testimonial-slider-2").slick({dots:!1,arrows:!0,prevArrow:'<button type="button" class="slick-prev"><i class="arrow_left"></i></button>',nextArrow:'<button type="button" class="slick-next"><i class="arrow_right"></i></button>',slidesToShow:3,centerMode:!1,autoplay:!0,infinite:!0,autoplaySpeed:2000,slidesToScroll:1,asNavFor:".testimonial-slider-3",responsive:[{breakpoint:992,settings:{slidesToShow:2,},},{breakpoint:768,settings:{slidesToShow:2,},},],})}
if($(".testimonial-slider-3").length){$(".testimonial-slider-3").slick({dots:!1,asNavFor:".testimonial-slider-2",arrows:!1,slidesToShow:1,centerMode:!1,autoplay:!1,infinite:!0,slidesToScroll:1,fade:!0,})}
if($(".feature-slider").length){$(".feature-slider").slick({dots:!0,arrows:!1,slidesToShow:3,autoplay:!0,infinite:!0,autoplaySpeed:5000,slidesToScroll:3,responsive:[{breakpoint:992,settings:{slidesToShow:1,slidesToScroll:1,},},],})}
if($(".statistics-slider").length){$(".statistics-slider").slick({dots:!0,arrows:!1,slidesToShow:1,autoplay:!0,infinite:!0,autoplaySpeed:3000,slidesToScroll:1,})}
if($(".client-slider").length){$(".client-slider").slick({dots:!0,arrows:!1,centerMode:!1,slidesToShow:3,autoplay:!0,infinite:!0,autoplaySpeed:5000,slidesToScroll:3,responsive:[{breakpoint:1200,settings:{slidesToShow:2,slidesToScroll:2,},},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,},},],})}
if($(".news-slider").length){$(".news-slider").slick({dots:!0,arrows:!1,centerMode:!1,slidesToShow:3,autoplay:!1,infinite:!0,autoplaySpeed:7500,slidesToScroll:3,responsive:[{breakpoint:992,settings:{slidesToShow:2,slidesToScroll:2,},},{breakpoint:768,settings:{slidesToShow:1,slidesToScroll:1,},},],})}
if($("#inputPhoneNumber").length){$("#inputPhoneNumber").intlTelInput({separateDialCode:!0,utilsScript:"js/utils.js",initialCountry:"GE",allowDropdown:!1,})}
if($("#dropzone").length){$("#dropzone").dropzone({paramName:"file",url:"upload-target",})}
var SelectedAmount,selectedTime={},RateOfInterestTime,RateOfInterestAmount;if(typeof wNumb!=="undefined"){var AmountFormat=wNumb({decimals:0,thousand:",",prefix:"₾ ",});var TimeFormatMonths=wNumb({prefix:" months",});var TimeFormatYears=wNumb({prefix:" months",})}})(jQuery)