@extends('admin.main')

@section('purchases.status', 'active')

@section('workplace')
    <section class="right-panel">
        <div class="inner">
            <div class="title">
                <h2>{{ trans('content.purchases') }} | {{ trans('content.new') }} </h2>
            </div>
            @include('partials._messages')
            <div class="content">
                {!! Form::open(['route' => 'purchases.store', 'method' => 'POST']) !!}
                    <table class="items-list create-purchase-list">
                        <tbody>
                        <tr>
                            <td>{{ trans('forms.phone') }}</td>
                            <td>{!! Form::text('phone', old('phone'), ['placeholder' => '380971231212', 'required']) !!}</td>
                        </tr>
                        <tr>
                            <td>{{ trans('forms.number') }}</td>
                            <td>{!! Form::text('number', old('number'), ['placeholder' => 'АБ4587МС', 'required']) !!}</td>
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