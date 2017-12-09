@extends('root.root-bootstrap')
<?php
/** @var \Collective\Html\FormBuilder $form */
setlocale(LC_TIME, 'Indonesian');
\Carbon\Carbon::setLocale('id');
if (isset($errors))
{
    \Illuminate\Support\Facades\Session::push('cbk_msg', $errors->all());
}
?>

@section('head-css-pre')
    @parent
    <link rel="stylesheet" href="{{asset('/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/baked/authentication/css/style.min.css')}}">
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
    <script type="text/javascript" src="{{asset('/assets/baked/authentication/js/jquery.backstretch.min.js')}}"></script>
    <script type="text/javascript">
        {!! 'var sessionFlashdata = ' . json_encode(\Illuminate\Support\Facades\Session::get('cbk_msg'))!!}
    </script>
    <script type="text/javascript" src="{{asset('/assets/js/common/common_function.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/assets/js/shard/music-player/theme_1.min.js')}}"></script>
@endsection
