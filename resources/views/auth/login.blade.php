@extends('layouts.app')

@section('page-classes', 'admin-page login-page')

@section('content')
    <div class="container">
        {!! Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'login-form']) !!}
            @include('partials._messages')
            <div class="form-section">
                {!! Form::label('email', trans('forms.email')) !!}
                {!! Form::email('email', null, ['required', 'autofocus']) !!}
            </div>
            <div class="form-section">
                {!! Form::label('password', trans('forms.password')) !!}
                {!! Form::password('password', null, ['required']) !!}
            </div>
            <div class="form-section">
                {!! Form::label('password', trans('forms.remember-me')) !!}
                {!! Form::checkbox('remember', (old('remember') ? 'checked' : '' )) !!}
            </div>
            <div class="form-section lost-password-section">
                {!! Form::submit(trans('forms.enter')) !!}
                {!! link_to_route('password.request', trans('forms.forget-password')) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
