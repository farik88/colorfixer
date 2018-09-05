@extends('admin.main')

@section('users.status', 'active')

@section('workplace')
    <section class="right-panel">
        <div class="inner">
            <div class="title">
                <h2>{{ trans('content.users') }} | {{ trans('content.new') }} </h2>
            </div>
            @include('partials._messages')
            <div class="content">
                {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
                    <table class="items-list create-purchase-list">
                        <tbody>
                        <tr>
                            <td>{{ trans('forms.email') }}</td>
                            <td>{!! Form::email('email', null, ['placeholder' => 'example@gmail.com', 'required', 'autofocus']) !!}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('forms.name') }}</td>
                            <td>{!! Form::text('name', null, ['placeholder' => 'manager', 'required']) !!}</td>
                        </tr>
                        <tr>
                            <td colspan="2">{!! Form::submit(trans('forms.save')) !!}</td>
                        </tr>
                        </tbody>
                    </table>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection