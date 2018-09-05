@extends('layouts.app')

@section('page-classes', 'error-page error-404')

@section('content')
    <div class="container">
        <div class="page-section">
            <h1>404. Страница не найдена</h1>
        </div>
        <div class="page-section">
            <h3>Вы можете вернуться на главную страницу <a class="back-home-button" href="/"><i class="fa fa-home" aria-hidden="true"></i></a></h3>
        </div>
    </div>
@endsection