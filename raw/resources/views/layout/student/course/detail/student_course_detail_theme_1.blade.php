@extends('layout.student.extension.adminlte-sidebar')
<?php
/** @var \App\Eloquent\User $student */
/** @var \App\Eloquent\UserStudents $studentProfile */
/** @var \App\Eloquent\Answer $studentAnswer */
$studentProfile = $student->student()->first();
$studentAnswer = $student->getAttribute('answer')->first();
$accumulation = $studentAnswer->answer_result()->sum('result');
$analytics = $studentAnswer->getResultAnalytics($accumulation);
$now = \Carbon\Carbon::now();
?>
@section('head-title')
    <title>Detail</title>
@endsection

@section('head-description')
    <meta name="description" content="Detail">
@endsection

@section('body-content')
    @parent
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                &nbsp;
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i>
                    Hasil
                </li>
                <li>
                    <i class="fa fa-home"></i>
                    Detail
                </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Detail</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row vertical-align">
                                <div class="col-sm-12 text-center">
                                    <p id="content_welcome" class="margin-bottom-4" style="font-weight: bold; font-size: 20px">HASIL INVENTORI</p>
                                    <p id="content_title" style="font-weight: bolder; font-size: 20px; margin: 4px">
                                        <b>
                                            <i>SCHOOL ENGAGEMENT</i>
                                        </b>
                                        SISWA
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    &nbsp;
                                </div>
                            </div>
                            <div class="row vertical-align">
                                <div class="col-sm-2  col-sm-offset-1 text-left">
                                    <p class="margin-left-1-cm">Nama</p>
                                </div>
                                <div class="col-sm-3 no-padding-side">
                                    <p>: {{$student->getAttribute('name')}}</p>
                                </div>
                                <div class="col-sm-2  col-sm-offset-1 text-left">
                                    <p>Sekolah</p>
                                </div>
                                <div class="col-sm-3 no-padding-side">
                                    <p>: {{$studentProfile->getAttribute('school')}}</p>
                                </div>
                            </div>
                            <div class="row vertical-align">
                                <div class="col-sm-2 col-sm-offset-1 text-left">
                                    <p class="margin-left-1-cm">NISN</p>
                                </div>
                                <div class="col-sm-3 no-padding-side">
                                    <p>: {{$student->getAttribute('credential')}}</p>
                                </div>
                                <div class="col-sm-2  col-sm-offset-1 text-left">
                                    <p>Jenis Kelamin</p>
                                </div>
                                <div class="col-sm-3 no-padding-side">
                                    <p>: {{$student->getGenderTranslation()}}</p>
                                </div>
                            </div>
                            <div class="row vertical-align">
                                <div class="col-sm-2  col-sm-offset-1 text-left">
                                    <p class="margin-left-1-cm">Kelas</p>
                                </div>
                                <div class="col-sm-3 no-padding-side">
                                    <p>: {{$studentProfile->getAttribute('grade')}}</p>
                                </div>
                                <div class="col-sm-2  col-sm-offset-1 text-left">
                                    <p>Tanggal Pengisian</p>
                                </div>
                                <div class="col-sm-3 no-padding-side">
                                    <p>: {{$studentAnswer->getAttribute('finished_at')->formatLocalized('%d %B %Y')}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                </div>
                                <div class="col-sm-10 text-center">
                                    <p id="content_welcome" style="font-weight: bold; font-size: 16px; margin: 4px">HASIL ANALISA</p>
                                    <b><?php printf("%.4g%%", $accumulation) ?></b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th width="150" class="text-center font-size-14px">
                                                <b>Interval Persentase</b>
                                            </th>
                                            <th width="150" class="text-center font-size-14px">
                                                <b>Klasifikasi</b>
                                            </th>
                                            <th class="text-center font-size-14px">
                                                <b>Interpretasi</b>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="font-size-12px text-center">
                                                <strong>{{$analytics['interval']}}</strong>
                                            </td>
                                            <td class="font-size-12px text-center">
                                                <strong>{{$analytics['class']}}</strong>
                                            </td>
                                            <td class="font-size-12px text-center">
                                                <strong>{{$analytics['description']['key']}}</strong>
                                                <ol>
                                                    @foreach($analytics['description']['value'] as $interpretation)
                                                        <li class="text-left">
                                                            <strong>{{$interpretation}}</strong>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-1">
                                </div>
                                <div class="col-sm-10 text-left">
                                    <p style="margin: 4px; font-size: 16px;">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('head-css-post')
    @parent
    <link rel="stylesheet" href="{{asset('/assets/css/layout/student/course/index/student_course_index_theme_1.min.css')}}">
@endsection

@section('body-js-lower-post')
    @parent
    <script type="text/javascript" src="{{asset('/assets/js/layout/student/course/index/student_course_index_theme_1.min.js')}}"></script>
@endsection
