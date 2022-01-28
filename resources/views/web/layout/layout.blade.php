<!DOCTYPE HTML>
<html lang="ka">
<head>
    <title>@if(!empty($seo_data['title_ge'])) {{ $seo_data['title_ge'] }} @else {{ $parameterItems['title_ge'][0] }} @endif</title>
    
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="facebook-domain-verification" content="f35co0iz84xewjylp4gw1a7du8fb5k" />

    <meta name="keywords" content="@if(!empty($seo_data['keywords_ge'])) {{ $seo_data['keywords_ge'] }} @else {{ $parameterItems['keywords_ge'][0] }} @endif">
    <meta name="descrition" content="@if(!empty($seo_data['description_ge'])) {{ $seo_data['description_ge'] }} @else {{ $parameterItems['description_ge'][0] }} @endif">

    <meta property="og:url" content="https://dizi.ge/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="ავტოლიზინგი | dizi.ge">
    <meta property="og:description" content="მიიღე 30000 ლარამდე დაფინანსება დღესვე">
    <meta property="og:image" content="{{ url('assets/web/og.jpg') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="dizi.ge">
    <meta property="twitter:url" content="https://dizi.ge/">
    <meta name="twitter:title" content="ავტოლიზინგი | dizi.ge">
    <meta name="twitter:description" content="მიიღე 30000 ლარამდე დაფინანსება დღესვე">
    <meta name="twitter:image" content="{{ url('assets/web/og.jpg') }}">

    
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

    <!-- calltouch -->
    <script type="text/javascript">
    (function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)},m=typeof Array.prototype.find === 'function',n=m?"init-min.js":"init.js";s.type="text/javascript";s.async=true;s.src="https://mod.calltouch.ru/"+n+"?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})(window,document,"ct","ez7c2xwd");
    </script>
    <!-- calltouch -->
    @yield('css')

</head>
<body data-spy="scroll" data-offset="70">
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="round_spinner">
                <div class="spinner"></div>
                <div class="text">
                    <img src="{{ url('/assets/web/img/logo/logo.svg') }}" alt="avtolizingi-logo">
                </div>
            </div>
            <h2 class="head neue">დიზი ლიზინგი</h2>
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
                                <a href=""><img src="{{ url('assets/web/img/logo/Logo_2.svg') }}" alt="avtolizingi-logo" id="footerlogo" style="position: relative; left: -35px;"></a>
                            </div>
                            <div class="col-md-4">
                                <div class="social-button text-center">
                                    @if(!empty($parameterItems['facebook_url'][0]))
                                    <a class="ms-0" target="_blank" href="{{ $parameterItems['facebook_url'][0] }}"><i class="fab fa-facebook-f"></i></a>
                                    @endif
                                    @if(!empty($parameterItems['instagram_url'][0]))
                                    <a class="ms-0" target="_blank" href="{{ $parameterItems['instagram_url'][0] }}"><i class="fab fa-instagram"></i></a>
                                    @endif
                                    @if(!empty($parameterItems['linkdin_url'][0]))
                                    <a class="ms-0" target="_blank" href="{{ $parameterItems['linkdin_url'][0] }}"><i class="fab fa-linkedin-in"></i></a>
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
                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="copyright-text" style="text-align: center;">
                            <p><br class="d-sm-none"> Crafted By <a href="https://www.linkedin.com/in/mito-chikhladze-7554b4174/" target="_blank" style="margin-left: 1px;">Mito Chikhladze</a> | Designed <a
                                    href="https://shotazhvania.dev/" target="_blank" style="margin-left: 1px;">ShotaZhvania.dev</a></p>
                        </div>
                    </div>
                </div> -->
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
    <script>(function(a,m,o,c,r,m){a[m]={id:"100501",hash:"079e443732e2ba2422d0535c84f98fd51aa7c392e74aa6bf8bb095036f5a68cb",locale:"en",inline:false,setMeta:function(p){this.params=(this.params||[]).concat([p])}};a[o]=a[o]||function(){(a[o].q=a[o].q||[]).push(arguments)};var d=a.document,s=d.createElement('script');s.async=true;s.id=m+'_script';s.src='https://gso.amocrm.ru/js/button.js?1639756310';d.head&&d.head.appendChild(s)}(window,0,'amoSocialButton',0,0,'amo_social_button'));</script>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window,document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
     fbq('init', '315325083800839'); 
    fbq('track', 'PageView');
    </script>
    <noscript>
     <img height="1" width="1" 
    src="https://www.facebook.com/tr?id=315325083800839&ev=PageView
    &noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QW3TWDCHJ1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-QW3TWDCHJ1');
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MLJS9BH');</script>
    <!-- End Google Tag Manager -->
    <!-- Yandex.Metrika counter --> <script type="text/javascript">     (function(m,e,t,r,i,k,a){         m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};         m[i].l=1*new Date();         k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)     })(window, document,'script','//mc.yandex.ru/metrika/tag.js', 'ym');      ym(87312766, 'init', {accurateTrackBounce:true, trackLinks:true, webvisor:true, clickmap:true, params: {__ym: {isFromApi: 'yesIsFromApi'}}}); </script> <noscript><div><img src="https://mc.yandex.ru/watch/87312766" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
    @yield('js')
</body>
</html>