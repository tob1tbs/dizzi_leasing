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
            <img class="sticky" src="{{ url('assets/web/img/logo/logo.svg') }}" srcset="{{ url('assets/web/img/logo/logo.svg') }} 2x" alt="logo" style="position: relative; left: -55px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>






<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="#">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Link</a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
Dropdown
</a>
<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
<li><a class="dropdown-item" href="#">Action</a></li>
<li><a class="dropdown-item" href="#">Another action</a></li>
<li><hr class="dropdown-divider"></li>
<li><a class="dropdown-item" href="#">Something else here</a></li>
</ul>
</li>
<li class="nav-item">
<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
</li>
</ul>
<form class="d-flex">
<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
<button class="btn btn-outline-success" type="submit">Search</button>
</form>
</div>
</div>
</nav>