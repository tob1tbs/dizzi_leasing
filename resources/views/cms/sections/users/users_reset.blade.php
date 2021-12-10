<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
    <title>CMS V2.0</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="shortcut icon" href="/demo8/images/favicon.png">
        <link rel="stylesheet" href="{{ url('assets/cms/css/dashlite.css') }}">
        <link rel="stylesheet" href="{{ url('assets/cms/css/custom.css') }}">
</head>
<body class="nk-body bg-white npc-general pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="{{ route('actionMain') }}" class="logo-link">
                                <img class="logo-light logo-img" src="{{ url('assets/cms/images/logo.png') }}" srcset="{{ url('assets/cms/images/logo2x.png 2x') }}" alt="logo" />
                                <img class="logo-dark logo-img" src="{{ url('assets/cms/images/logo-dark.png') }}" srcset="{{ url('assets/cms/images/logo-dark2x.png 2x') }}" alt="logo-dark" />
                            </a>
                        </div>
                        @if (\Session::has('success'))
                        <div class="alert alert-fill alert-success alert-icon font-neue">
                            <em class="icon ni ni-done"></em>
                            <strong>{!! Session::get('success') !!}</strong> 
                        </div>
                        @elseif (\Session::has('error'))
                        <div class="alert alert-fill alert-danger alert-icon font-neue">
                            <em class="icon ni ni-cross-circle"></em> 
                            <strong>{!! Session::get('error') !!}</strong> 
                        </div>
                        @endif
                        @if(!empty($errors->first()))
                        <div class="alert alert-fill alert-danger alert-icon font-neue">
                            <em class="icon ni ni-cross-circle"></em> 
                            <strong>დაფიქსირდა შეცდომა:</strong> {!! $errors->first() !!}
                        </div>
                        @endif
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title font-helvetica-regular">პაროლის აღდგენა</h4>
                                        <div class="nk-block-des">
                                            <p class="font-neue" style="font-size: 13px;">პაროლის აღსადგენად გთხოვთ შეიყვანოთ თქვენი ელ-ფოსტა</p>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('actionUsersResetRequest') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">ელ-ფოსტა</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="default-01" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block font-helvetica-regular" type="submit">პაროლის აღდგენა</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <div class="nk-block-content text-center">
                                        <p class="text-soft">&copy; Crafted with ❤️ by Mito Chikhladze</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('assets/cms/js/bundle.js') }}"></script>
    <script src="{{ url('assets/cms/js/scripts.js') }}"></script>
    </body>
</html>