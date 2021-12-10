<!DOCTYPE html>
<html lang="zxx" class="js">
    <head>
        <title>CMS V2.0</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="shortcut icon" href="/demo8/images/favicon.png">
        <link rel="stylesheet" href="{{ url('assets/cms/css/dashlite.css') }}">
        <link rel="stylesheet" href="{{ url('assets/cms/css/custom.css') }}">
        <link rel="stylesheet" href="{{ url('assets/cms/css/image-uploader.min.css') }}">
        @yield('css')
    </head>
    <body class="nk-body bg-lighter neue">
        <div class="nk-app-root">
            <div class="nk-wrap">
                <div class="nk-header is-light nk-header-fixed">
                    <div class="container-fluid">
                        @include('cms.include.navigation')
                    </div>
                </div>
                <div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                @include('cms.include.footer')
            </div>
        </div>
        <script src="{{ url('assets/cms/js/bundle.js') }}"></script>
        <script src="{{ url('assets/cms/js/scripts.js') }}"></script>
        <script src="{{ url('assets/cms/js/image-uploader.min.js') }}"></script>
        <script src="{{ url('assets/cms/js/custom/GeneralScripts.js') }}"></script>
        @yield('js')
    </body>
</html>