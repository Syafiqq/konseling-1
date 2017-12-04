<?php
/**
 * @var \App\Eloquent\User $user
 */
$form = \Collective\Html\FormFacade::getFacadeRoot();
if (!isset($user))
{
    $user = null;
}

?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course</title>
</head>
<body>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong>
        There were some problems with your input.
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if($user->hasOpenedCourse())
    {!! link_to_route('student.course.start', $title = 'Lanjutkan Sebelumnya', $parameters = [1], $attributes = []);  !!}
@else
    {!! link_to_route('student.course.create', $title = 'Mulai Baru', $parameters = [], $attributes = []);  !!}
@endif
</body>
</html>
