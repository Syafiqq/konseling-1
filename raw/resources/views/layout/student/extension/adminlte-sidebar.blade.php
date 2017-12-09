@extends('root.extension.adminlte-sidebar')
<?php
/** @var \Collective\Html\FormBuilder $form */
setlocale(LC_TIME, 'Indonesian');
\Carbon\Carbon::setLocale('id');
if (isset($errors))
{
    \Illuminate\Support\Facades\Session::push('cbk_msg', $errors->all());
}
?>


@section('body-content')
    @parent
@endsection

@section('body-content-navbar')
    @include('layout.student.extension.navbar.theme_1_navbar')
@endsection

@section('body-content-sidebar')
    @include('layout.student.extension.sidebar.theme_1_sidebar')
@endsection
@section('head-css-pre')
    @parent
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{asset('/assets/css/common/common-style.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    <script type="text/javascript">
        {!! 'var sessionFlashdata = ' . json_encode(\Illuminate\Support\Facades\Session::get('cbk_msg'))!!}
    </script>
    <script type="text/javascript" src="{{asset('/assets/js/common/common_function.min.js')}}"></script>
@endsection

@section('body-property')
    <body class="hold-transition skin-green fixed sidebar-mini">
@endsection
