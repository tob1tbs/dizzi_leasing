<div class="nk-header-wrap">
    <div class="nk-menu-trigger mr-sm-2 d-lg-none">
        <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-menu"></em></a>
    </div>
    <div class="nk-header-brand">
        <a href="{{ route('actionMain') }}" class="logo-link">
            <img class="logo-light logo-img" src="{{ url('assets/cms/images/logo.png') }} " srcset="{{ url('assets/cms/images/logo2x.png 2x') }}" alt="logo" />
            <img class="logo-dark logo-img" src="{{ url('assets/cms/images/logo-dark.png') }}" srcset="{{ url('assets/cms/images/logo-dark2x.png 2x') }}" alt="logo-dark" />
        </a>
    </div>
    <div class="nk-header-menu ml-auto" data-content="headerNav">
        <div class="nk-header-mobile">
            <div class="nk-header-brand">
                <a href="{{ route('actionMain') }}" class="logo-link">
                    <img class="logo-light logo-img" src="{{ url('assets/cms/images/logo.png') }}" srcset="{{ url('assets/cms/images/logo2x.png 2x') }}" alt="logo" />
                    <img class="logo-dark logo-img" src="{{ url('assets/cms/images/logo-dark.png') }}" srcset="{{ url('assets/cms/images/logo-dark2x.png 2x') }}" alt="logo-dark" />
                </a>
            </div>
            <div class="nk-menu-trigger mr-n2">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em class="icon ni ni-arrow-left"></em></a>
            </div>
        </div>
        <ul class="nk-menu nk-menu-main ui-s2">
            <li class="nk-menu-item"><a href="{{ route('actionMain') }}" class="nk-menu-link"><span class="nk-menu-text">მთავარი გვერდი</span></a></li>
            <li class="nk-menu-item has-sub">
                <a href="javascript:;" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">მომხმარებლები</span></a>
                <ul class="nk-menu-sub" style="min-width: 300px;">
                    <li class="nk-menu-item">
                        <a href="{{ route('actionUsersMain') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">ჩამონათვალი</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('actionUsersRoles') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">წვდომის ჯგუფები</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nk-menu-item has-sub">
                <a href="javascript:;" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">პარამეტრები</span></a>
                <ul class="nk-menu-sub" style="min-width: 300px;">
                    <li class="nk-menu-item">
                        <a href="{{ route('actionParametersBasicMain') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">ძირითადი პარამეტრები</span>
                        </a>
                    </li>
                    <!-- <li class="nk-menu-item">
                        <a href="{{ route('actionParametersSections') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">სექციები</span>
                        </a>
                    </li> -->
                    <li class="nk-menu-item">
                        <a href="{{ route('actionParametersTranslate') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">თარგმნები</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nk-menu-item has-sub">
                <a href="javascript:;" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">ლიზინგი</span></a>
                <ul class="nk-menu-sub" style="min-width: 300px;">
                    <li class="nk-menu-item">
                        <a href="{{ route('actionLeasingParameters') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">ლიზინგის პარამეტრები</span>
                        </a>
                    </li>
                    <!-- <li class="nk-menu-item">
                        <a href="{{ route('actionLeasingPromo') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">პრომო</span>
                        </a>
                    </li> -->
                </ul>
            </li><!-- 
            <li class="nk-menu-item has-sub">
                <a href="javascript:;" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">ბლოგები</span></a>
                <ul class="nk-menu-sub" style="min-width: 300px;">
                    <li class="nk-menu-item">
                        <a href="{{ route('actionBlog') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">ჩამონათვალი</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- <li class="nk-menu-item has-sub">
                <a href="javascript:;" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">ავტომობილები</span></a>
                <ul class="nk-menu-sub" style="min-width: 300px;">
                    <li class="nk-menu-item">
                        <a href="{{ route('actionCars') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">ჩამონათვალი</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('actionCarsOptions') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">ავტომობილების პარამეტრები</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nk-menu-item has-sub">
                <a href="javascript:;" class="nk-menu-link nk-menu-toggle"><span class="nk-menu-text">დამატებითი გვერდები</span></a>
                <ul class="nk-menu-sub" style="min-width: 300px;">
                    <li class="nk-menu-item">
                        <a href="{{ route('actionTextPages') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">ტექსტური გვერდები</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('actionTextQuestions') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">კითხვები</span>
                        </a>
                    </li><!-- 
                    <li class="nk-menu-item">
                        <a href="{{ route('actionReviews') }}" class="nk-menu-link" data-original-title="" title="">
                            <span class="nk-menu-text">შეფასებები</span>
                        </a>
                    </li> -->
                </ul>
            </li>
        </ul>
    </div>
    <div class="nk-header-tools">
        <ul class="nk-quick-nav">
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="user-toggle">
                        <div class="user-avatar sm"><em class="icon ni ni-user-alt"></em></div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1 is-light">
                    <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                        <div class="user-card">
                            <div class="user-avatar"><span class="font-helvetica-regular">{{ Str::substr(Auth::user()->name, 0, 1) }}{{ Str::substr(Auth::user()->lastname, 0, 1) }}</span></div>
                            <div class="user-info font-neue">
                                <span class="lead-text">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
                                <span class="sub-text">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-inner">
                        <ul class="link-list font-neue">
                            <li>
                                <a href="{{ route('actionUsersLogout') }}"><em class="icon ni ni-signout"></em><span>გასვლა</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>