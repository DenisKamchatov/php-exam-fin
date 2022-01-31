@extends('layouts.main-layout')
@section('content')

<h3>Авторизация</h3>

<form action="/api/auth/signin" method="post">
    @csrf
    <div>
        <label>Введите email</label>
        <input type="email" name="email" id="email" placeholder="Введите e-mail">
        <label>Введите пароль</label>
        <input type="password" name="password" id="password">

        <button type="submit">Войти</button>
    </div>
</form>
@endsection