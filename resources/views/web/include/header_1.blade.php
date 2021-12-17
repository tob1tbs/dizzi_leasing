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
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="sticky">
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
            </ul>
        </div>
    </div>
</nav>