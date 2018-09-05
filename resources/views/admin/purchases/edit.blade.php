@extends('admin.main')

@section('purchases.status', 'active')

@section('workplace')
    @php
        $links = [
            'defecting',
            'insurance',
            'parts',
            'preparation',
            'repair',
            'painting',
            'assembling',
            'control',
            'return'
        ];
    @endphp
    <section class="right-panel">
        <div class="inner">
            <div class="title">
                <h2>{{ trans('content.purchases') }} | {{ trans('content.editing') }} | {{ $purchase->customer->phone }} | {{ $purchase->number }}</h2>
            </div>
            @include('partials._messages')
            <div class="content">
                <table class="items-list purchase-edit">
                    <thead>
                    <tr>
                        <th>{{ trans('purchase.stage') }}</th>
                        <th>{{ trans('purchase.attachments') }}</th>
                        <th>{{ trans('content.new') }}</th>
                        <th>{{ trans('purchase.end_date') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($purchase->stages as $stage)
                        <tr>
                            <td>{{ $stage->number }} {{ trans('stages.' . $links[$stage->number - 1]) }}</td>
                            <td>
                                @unless($stage->attachments->count())
                                    {{ trans('attachment.not-found') }}
                                @endunless()

                                @foreach($stage->attachments as $attachment)
                                    <div class="attachment-wrap">
                                        <div class="attachment-content">
                                            @if($attachment->type === 'photo')
                                                <img src="{{ $attachment->link }}">
                                            @else
                                                <video controls>
                                                    <source src="{{ $attachment->link }}">
                                                </video>
                                            @endif
                                        </div>
                                        <div class="actions-buttons">
                                            <div class="button delete-button">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                {!! Form::open(['route' => ['attachments.destroy', $attachment->id], 'method' => 'DELETE']) !!}
                                                    {!! Form::submit('X') !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                            <td class="attachment-add-block">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                {!! Form::open(['route' => ['attachments.store', $purchase->id, $stage->number], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    {!! Form::hidden('MAX_FILE_SIZE', "52428800") !!}
                                    {!! Form::file('attachment', ['accept' => 'image/*,video/*', 'required']) !!}
                                    {!! Form::submit('+') !!}
                                {!! Form::close() !!}
                            </td>
                            <td>
                                {!! Form::open(['route' => ['stage.store-date', $purchase->id, $stage->number], 'method' => 'POST']) !!}
                                    {!! Form::text('end_date', $stage->end_date, ['placeholder' => trans('purchase.end_date'), 'class' => 'date_input']) !!}
                                    {!! Form::submit('SAVE DATE', ['class' => 'date_input_submit']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection