@extends('layouts.app')

@section('page-classes', 'password-reset-email-page admin-page')

@section('content')
    <div class="container">
        {!! Form::open(['route' => 'password.email']) !!}
            @include('partials._messages')
            <div class="form-section e-mail-section">
                {!! Form::label('email', trans('forms.email')) !!}
                {!! Form::email('email', null, ['required', 'autofocus']) !!}
            </div>
            <div class="form-section submit-block">
                {!! Form::submit(trans('forms.restore-password')) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection
