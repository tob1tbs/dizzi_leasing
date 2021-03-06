<header class="header" style="position: relative;">
    <div class="header-top py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="header-info-left">
                        <div class="timestamp helvetica-regular"> <i class="icon_clock_alt"></i> {{ trans('site.start_off_work_day') }} - {{ trans('site.end_off_work_day') }} {{ $parameterItems['work_start'][0] }}-{{ $parameterItems['work_end'][0] }} / {{ trans('site.satar') }} - 16:00
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-info-right">
                        <ul>
                            <li>
                                <img class="img-fluid" src="{{ url('assets/web/img/phone-outline-white.png') }}" alt="phone">
                                <a href="tel:+995{{ $parameterItems['phone_number'][0] }}">+995 {{ $parameterItems['phone_number'][0] }}</a>
                            </li>
                            <li>
                                <i class="icon_mail_alt"></i>
                                <a href="mailto:{{ $parameterItems['email'][0] }}">{{ $parameterItems['email'][0] }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu header-menu-4" id="sticky">
        <nav class="navbar navbar-expand-lg ">
            <div class="container">
                <a class="navbar-brand sticky_logo" href="{{ route('actionWebMain') }}">
                    <img class="main" src="{{ url('assets/web/img/logo/Logo_2.svg') }}" srcset="{{ url('assets/web/img/logo/Logo_2.svg') }} 2x" alt="avtolizingi-logo" style="max-width: 200px; width: 100%;position: relative; left: -55px;">
                    <img class="sticky" src="{{ url('assets/web/img/logo/logo.svg') }}" srcset="{{ url('assets/web/img/logo/logo.svg') }} 2x" alt="avtolizingi-logo" style="max-width: 200px; width: 100%;position: relative; left: -55px;">
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu_toggle">
                        <span class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="hamburger-cross">
                            <span></span>
                            <span></span>
                        </span>
                    </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav menu ms-auto">
                        <li class="nav-item dropdown submenu ">
                            <a href="{{ route('actionWebMain') }}" class="nav-link">{{ trans('site.main') }}</a>
                        </li>
                        <li class="nav-item dropdown submenu ">
                            <a href="{{ route('actionWebContact') }}" class="nav-link">{{ trans('site.our_office') }}</a>
                        </li>
                        <li class="nav-item dropdown submenu ">
                            <a href="{{ route('actionWebRequsites') }}" class="nav-link">{{ trans('site.requisites') }}</a>
                        </li>
                        @if($sectionStatus['blog'][0] == 1)
                        <li class="nav-item dropdown submenu ">
                            <a href="{{ route('actionWebBlog') }}" class="nav-link">{{ trans('site.blog') }}</a>
                        </li>
                        @endif
                        @if($sectionStatus['cars'][0] == 1)
                        <li class="nav-item dropdown submenu ">
                            <a href="{{ route('actionWebCars') }}" class="nav-link">{{ trans('site.cars') }}</a>
                        </li>
                        @endif
                        <li class="nav-item dropdown submenu ">
                            <a href="{{ route('actionWebFaq') }}" class="nav-link">{{ trans('site.faq') }}</a>
                        </li>
                        <li class="nav-item dropdown submenu ">
                            <a href="{{ route('actionWebAboutUs') }}" class="nav-link">{{ trans('site.about_us') }}</a>
                        </li>
                        <li class="nav-item dropdown submenu">
                            <a class="theme-btn theme-btn-rounded-2 theme-btn-alt neue custom-button-color" href="#0" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0 25px; font-size: 15px; position: relative; left: 15px;">
                                {{ trans('site.get_loan') }}
                            </a>
                            <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                                data-bs-toggle="dropdown"></i>
                            <ul class="dropdown-menu">
                                @if($sectionStatus['leasing'][0] == 1)
                                <li class="nav-item"><a class="nav-link" href="{{ route('actionWebLeasing') }}">{{ trans('site.leasing') }}</a></li>
                                @endif
                                @if($sectionStatus['backleasing'][0] == 1)
                                <li class="nav-item"><a class="nav-link" href="{{ route('actionWebBackLeasing') }}">{{ trans('site.backleasing') }}</a></li>
                                @endif
                                @if($sectionStatus['taxi_leasing'][0] == 1)
                                <li class="nav-item"><a class="nav-link" href="{{ route('actionWebTaxiLeasing') }}">{{ trans('site.taxileasing') }}</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="header-top2">
        <div class="container">
                <div class="d-xl-flex d-lg-flex d-md-flex justify-content-between">
                    <div>
                        <div class="helvetica-regular sm-content-center">
                            @if($sectionStatus['leasing'][0] == 1)
                            <a href="{{ route('actionWebLeasing') }}"  class="toptext">{{ trans('site.leasing') }}</a>
                            @endif
                            @if($sectionStatus['backleasing'][0] == 1)
                            <a href="{{ route('actionWebBackLeasing') }}"  class="toptext">{{ trans('site.backleasing') }}</a>
                            @endif
                            @if($sectionStatus['taxi_leasing'][0] == 1)
                            <a href="{{ route('actionWebTaxiLeasing') }}"  class="toptext">{{ trans('site.taxileasing') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>