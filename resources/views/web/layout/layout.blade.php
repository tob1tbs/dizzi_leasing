<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <title>@if(!empty($seo_data['title_ge'])) @else {{ $parameterItems['title_ge'][0] }} @endif</title>
    
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="@if(!empty($seo_data['keywords_ge'])) @else {{ $parameterItems['keywords_ge'][0] }} @endif">
    <meta name="descrition" content="@if(!empty($seo_data['description_ge'])) @else {{ $parameterItems['description_ge'][0] }} @endif">
    
    <link rel="shortcut icon" href="{{ url('assets/web/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/bootstrap.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/elegant-icons.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/all.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/animate.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/slick.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/slick-theme.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/nice-select.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/animate.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/jquery.fancybox.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/nouislider.min.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/default.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/style.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/responsive.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/custom.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/web/css/custom_edit.css') }}" media="all" />
    <link rel="stylesheet" href="{{ url('assets/web/css/sweetalert2.min.css') }}">
    @yield('css')

</head>
<body data-spy="scroll" data-offset="70">
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="round_spinner">
                <div class="spinner"></div>
                <div class="text">
                    <img src="{{ url('/assets/web/img/logo/logo.svg') }}" alt="">
                </div>
            </div>
            <h2 class="head">DIZI LEASING</h2>
        </div>
    </div>
    @include('web.include.header_1')
    @yield('content')
    <footer class="footer footer-2 pt-lg-50 pt-50 pb-50 pb-lg-50" style="background-image: url({{ url('assets/web/img/footer/footer-bg-2.png') }});">
        <div class="copyright">
            <div class="container">
                <div class="row ">
                    <div class="col-xl-8">
                        <div class="row align-items-center gy-lg-0 gy-3 gx-0">
                            <div class="col-md-2  text-md-start text-center" >
                                <a href=""><img src="{{ url('assets/web/img/logo/Logo_2.svg') }}" alt="logo" id="footerlogo" style="position: relative; left: -35px;"></a>
                            </div>
                            <div class="col-md-4">
                                <div class="social-button text-center">
                                    @if(!empty($parameterItems['facebook_url'][0]))
                                    <a class="ms-0" href="{{ $parameterItems['facebook_url'][0] }}"><i class="fab fa-facebook-f"></i></a>
                                    @endif
                                    @if(!empty($parameterItems['instagram_url'][0]))
                                    <a class="ms-0" href="{{ $parameterItems['instagram_url'][0] }}"><i class="fab fa-instagram"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="copyright-text text-md-start text-center">
                                <p>&copy; Dizi 2021.<br class="d-sm-none"> <!-- <a class="ms-3" href="#">Privecy</a> | <a class="ms-0" href="#">Term of Use</a> --> </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <ul>
                                <li>
                                    <img class="img-fluid" src="{{ url('assets/web/img//phone-outline-white.png') }}" alt="phone"><a
                                        href="tel:+995{{ $parameterItems['phone_number'][0] }}">+995 {{ $parameterItems['phone_number'][0] }}</a>
                                </li>

                                <li>
                                    <i class="icon_mail_alt"></i><a
                                        href="mailto:{{ $parameterItems['email'][0] }}">{{ $parameterItems['email'][0] }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text" style="text-align: center;">
                            <p><br class="d-sm-none"> Crafted By <a href="https://www.linkedin.com/in/mito-chikhladze-7554b4174/" target="_blank" style="margin-left: 1px;">Mito Chikhladze</a> | Designed <a
                                    href="https://shotazhvania.dev/" target="_blank" style="margin-left: 1px;">ShotaZhvania.dev</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a id="back-to-top" title="Back to Top"></a>
    <script type="text/javascript" src="{{ url('assets/web/js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/preloader.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/jquery.smoothscroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/jquery.waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/jquery.counterup.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/jquery.nice-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/jquery.fancybox.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/nouislider.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/wNumb.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/parallax.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/jquery.parallax-scroll.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/intlTelInput-jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/web/js/custom.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--Start of Tawk.to Script-->
    <!-- <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/61b731a580b2296cfdd16ecb/1fmppjs3v';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script> -->

    <script>(function(a,m,o,c,r,m){a[m]={id:"95737",hash:"233493d4005740fa5cdba63c995bf4e9ef621987d3456af3b5373e934b3ab5b9",locale:"en",inline:false,setMeta:function(p){this.params=(this.params||[]).concat([p])}};a[o]=a[o]||function(){(a[o].q=a[o].q||[]).push(arguments)};var d=a.document,s=d.createElement('script');s.async=true;s.id=m+'_script';s.src='https://gso.amocrm.ru/js/button.js?1639756119';d.head&&d.head.appendChild(s)}(window,0,'amoSocialButton',0,0,'amo_social_button'));</script>

    <!--End of Tawk.to Script-->
    @yield('js')
</body>
</html>