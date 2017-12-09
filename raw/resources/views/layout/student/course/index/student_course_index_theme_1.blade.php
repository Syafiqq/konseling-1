@extends('layout.student.extension.adminlte-sidebar')
<?php
$form = \Collective\Html\FormFacade::getFacadeRoot();
if (!isset($user))
{
    $user = null;
}
/** @var \App\Eloquent\UserStudents $student */
/** @noinspection PhpUndefinedVariableInspection */
$student = $user->getAttribute('student');
/** @var \App\Eloquent\Answer $answer */
$answer = $user->getAttribute('answer')->last();
$now = \Carbon\Carbon::now();
?>
@section('head-title')
    <title>Dashboard</title>
@endsection

@section('head-description')
    <meta name="description" content="Dashboard">
@endsection

@section('body-content')
    @parent
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Selamat Datang
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i>
                    Dashboard
                </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Dashboard</h3>
                </div>
                <div class="box-body">
                    <div class="col-sm-12">
                        <ol>
                            <li>Isilah angket dengan kejujuran dan apa adanya sesuai dengan kondisi diri anda. Hasil angket ini tidak akan mempengaruhi nilai mata pelajaran apapun. Kejujuran anda dalam mengisi angket ini akan mempengaruhi pemahaman anda terkait kondisi diri anda.</li>
                            <li>Isilah setiap pernyataan menurut pendapat Anda dengan memilih satu dari empat alternatif jawaban yang telah disediakan, yaitu:</li>
                            <dl class="dl-horizontal" style="margin-top: 10px; margin-bottom: 10px">
                                <dt>Sangat Sesuai</dt>
                                <dd>: Apabila kondisi yang digambarkan pada item sangat sesuai dengen diri anda</dd>
                                <dt>Sesuai</dt>
                                <dd>: Apabila kondisi yang digambarkan pada item cukup sesuai dengen diri anda</dd>
                                <dt>Kurang Sesuai</dt>
                                <dd>: Apabila kondisi yang digambarkan pada item kurang sesuai dengen diri anda</dd>
                                <dt>Tidak Sesuai</dt>
                                <dd>: Apabila kondisi yang digambarkan pada item tidak sesuai dengen diri anda</dd>
                            </dl>
                            <li>Periksa kembali jawaban Anda dan pastikan tidak ada jawaban yang terlewatkan.</li>
                        </ol>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    @if($user->hasOpenedCourse())
                        {!! link_to_route('student.course.start.edit', $title = 'Lanjutkan Sebelumnya', $parameters = [1], $attributes = ['class' => 'btn btn-success']);  !!}
                    @elseif((intval($student->getAttribute('active')) === 1) || is_null($answer) ||($answer->getAttribute('finished_at')->diffInDays($now) > \App\Eloquent\Answer::$exerciseWindow))
                        {!! link_to_route('student.course.create', $title = 'Mulai Baru', $parameters = [], $attributes = ['class' => 'btn btn-success']);  !!}
                    @else
                        Anda Tidak Diperkenankan Mengerjakan, Silahkan Hubungi Konselor Anda.
                    @endif
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
