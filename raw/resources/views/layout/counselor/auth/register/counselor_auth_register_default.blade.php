<?php
/** @var \Collective\Html\FormBuilder $form */
$form = \Collective\Html\FormFacade::getFacadeRoot();
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{!! $form->open(['route' => 'counselor.auth.register.store', 'method' => 'post']) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->input('text','name', null, ['placeholder' => 'Nama', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->input('text','credential', null, ['placeholder' => 'NIK/NIP', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->radio('gender', 'l', null, ['required' => true]); !!}Laki
{!! $form->radio('gender', 'p', null, ['required' => true]); !!}Perempuan
{!! nl2br(PHP_EOL) !!}
{!! $form->input('password','password', null, ['placeholder' => 'Password', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->input('password','password_confirmation', null, ['placeholder' => 'Ulangi Password', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->input('text','token', null, ['placeholder' => 'Kode Registrasi', 'required'=> true]) !!}
{!! nl2br(PHP_EOL) !!}
{!! $form->button('Submit', ['type' => 'Submit']) !!}
{!! $form->close() !!}
</body>
</html>
