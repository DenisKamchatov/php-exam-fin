@extends('layouts.main-layout')

@section('title', 'Главная страница')

@section('content')
<h2>Вывод данных описания вещей из базы данных</h2>
@foreach($things as $thing)
<p>{{ $thing -> name }}</p>
@endforeach
@endsection()