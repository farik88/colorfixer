@extends('layouts.app')

@section('page-classes', 'password-reset-new-password-page admin-page')

@section('content')
    <div class="container">
        {!! Form::open(['route' => 'password.request']) !!}
            @include('partials._messages')
            {!! Form::hidden('token', $token) !!}
            <div class="form-section">
                {!! Form::label('email', trans('forms.email')) !!}
                {!! Form::email('email', ($email ?: old('email')), ['required', 'autofocus']) !!}
            </div>
            <div class="form-section">
                {!! Form::label('password', trans('forms.password')) !!}
                {!! Form::password('password', null, ['required']) !!}
            </div>
            <div class="form-section">
                {!! Form::label('password_confirmation', trans('forms.password-confirm')) !!}
                {!! Form::password('password_confirmation', null, ['required']) !!}
            </div>
            <div class="form-section">
                {!! Form::submit(trans('forms.change-password')) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection