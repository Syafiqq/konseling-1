@extends('root.root-bootstrap')
<?php
/** @var \Collective\Html\FormBuilder $form */
setlocale(LC_TIME, 'Indonesian');
\Carbon\Carbon::setLocale('id');
/** @var \Illuminate\Session\Store $session */
$session = \Illuminate\Support\Facades\Session::getFacadeRoot();
$flashdata = ['notify' => []];
if (isset($errors))
{
    $flashdata['notify'] = array_merge($flashdata['notify'], $errors->all());
}
if (!is_null($session->get('cbk_msg')))
{
    $flashdata = array_merge($flashdata, $session->get('cbk_msg'));
}
?>

@section('head-css-pre')
    @parent
    <link rel="stylesheet" href="{{asset('/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/ionicons/dist/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/nprogress/nprogress.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/baked/authentication/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/vendor/icheck/skins/square/blue.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/common/common-style.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/shard/music-player/theme_1.min.css')}}">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=EB+Garamond">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,800" type="text/css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titan+One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Viga">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Yatra+One">
@endsection

@section('body-content')
    @parent
    <div style="display: none">
        @include('shard.music-player.music-player-theme_1')
    </div>
@endsection

@section('body-js-lower-pre')
    @parent
    <script type="text/javascript" src="{{asset('/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/vendor/fastclick/lib/fastclick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/vendor/nprogress/nprogress.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/vendor/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/baked/authentication/js/jquery.backstretch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/vendor/icheck/icheck.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/baked/authentication/js/default-backstretch.min.js')}}"></script>
    <script type="text/javascript">
        {!! 'var sessionFlashdata = ' . json_encode($flashdata)!!}
    </script>
    <script type="text/javascript" src="{{asset('/assets/js/common/common_function.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/js/shard/music-player/theme_1.min.js')}}"></script>
@endsection
