<header class="header">
<div class="header-top py-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="header-info-left">
                    <div class="timestamp helvetica-regular"> <i class="icon_clock_alt"></i> ორშაბათი - პარასკევი {{ $parameterItems['work_start'][0] }}-{{ $parameterItems['work_end'][0] }}
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
<nav class="navbar navbar-expand-lg navbar-light custom-bg-light" id="sticky">
    <div class="container">
        <a class="navbar-brand sticky_logo" href="{{ route('actionWebMain') }}">
            <img class="main" src="{{ url('assets/web/img/logo/Logo_2.svg') }}" srcset="{{ url('assets/web/img/logo/Logo_2.svg') }} 2x" alt="logo" style="position: relative; left: -55px;">
            <!-- <img class="sticky" src="{{ url('assets/web/img/logo/logo.svg') }}" srcset="{{ url('assets/web/img/logo/logo.svg') }} 2x" alt="logo" style="position: relative; left: -55px;"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a href="{{ route('actionWebMain') }}" class="nav-link">{{ trans('site.main') }}</a></li>
                <li class="nav-item"><a href="{{ route('actionWebContact') }}" class="nav-link">{{ trans('site.our_office') }}</a></li>
                <li class="nav-item"><a href="{{ route('actionWebRequsites') }}" class="nav-link">{{ trans('site.requisites') }}</a></li>
                <li class="nav-item"><a href="{{ route('actionWebFaq') }}" class="nav-link">{{ trans('site.faq') }}</a></li>
                <li class="nav-item"><a href="{{ route('actionWebAboutUs') }}" class="nav-link">{{ trans('site.about_us') }}</a></li>
                <li class="nav-item dropdown submenu">
                    <a class="theme-btn theme-btn-rounded-2 theme-btn-alt neue custom-button-color" href="#0" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 0 25px; font-size: 15px; position: relative; left: 15px;">
                        {{ trans('site.get_loan') }}
                    </a>
                    <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="false"
                        data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link" href="{{ route('actionWebLeasing') }}">{{ trans('site.leasing') }}</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('actionWebBackLeasing') }}">{{ trans('site.backleasing') }}</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('actionWebTaxiLeasing') }}">{{ trans('site.taxileasing') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style type="text/css">
    .custom-bg-light {
        z-index: 1;
        background-color: #5650a1;
        transition: all 0.2s linear;
    }
</style>