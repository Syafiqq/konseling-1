@section('head-title')
    <title>Title</title>
@endsection

@section('head-description')
    <meta name="description" content="Root">
@endsection

@section('head-property')
    {{-- Tell the browser to be responsive to screen width --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- Favicon--}}
    <link rel="apple-touch-icon" href="{{asset('/icon.png')}}">
@endsection

@section('body-upgrade-browser')
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an
        <strong>outdated</strong>
                              browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a>
                              to improve your experience and security.
    </p>
    <![endif]-->
@endsection

<!doctype html>
<html class="no-js" lang="id-ID">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('head-meta')
    @yield('head-title')
    @yield('head-description')
    @yield('head-property')
    @yield('head-css-pre')
    @yield('head-css-post')
    @yield('head-js-pre')
    @yield('head-js-post')
</head>
<body>
@yield('body-css-upper-pre')
@yield('body-css-upper-post')
@yield('body-js-upper-pre')
@yield('body-js-upper-post')
@yield('body-upgrade-browser')
@yield('body-content')
@yield('body-css-lower-pre')
@yield('body-css-lower-post')
@yield('body-js-lower-pre')
@yield('body-js-lower-post')
</body>
</html>
