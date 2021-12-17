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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>