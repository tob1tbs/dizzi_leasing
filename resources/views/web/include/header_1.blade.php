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