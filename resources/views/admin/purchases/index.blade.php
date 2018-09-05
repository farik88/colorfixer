@extends('admin.main')

@section('purchases.status', 'active')

@section('workplace')
    <section class="right-panel">
        <div class="inner">
            <div class="title">
                <h2>{{ trans('content.purchases') }} | {{ trans("content.{$type}") }}</h2>
            </div>
            @include('partials._messages')
            @if($purchases->count())
                <div class="content">
                    <table class="items-list">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('forms.number') }}</th>
                            <th>{{ trans('forms.phone') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($purchases as $index => $purchase)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="purchase-number-sell">
                                    <a href="{{ route('purchases.edit', ['id' => $purchase->id]) }}">{{ $purchase->number }}</a>
                                </td>
                                <td>{{ $purchase->customer->phone }}</td>
                                <td class="purchases-actions">
                                    @if($purchase->trashed())
                                        {!! Form::open(['route' => ['purchases.destroy', $purchase->id], 'method' => 'DELETE']) !!}
                                            <span>{{ Form::submit(trans('forms.destroy')) }}</span>
                                        {!! Form::close() !!}
                                        {!! Form::open(['route' => ['purchases.restore', $purchase->id], 'method' => 'PUT']) !!}
                                            <span>{{ Form::submit(trans('forms.restore')) }}</span>
                                        {!! Form::close() !!}
                                    @else
                                        {!! Form::open(['route' => ['purchases.archive', $purchase->id], 'method' => 'PUT']) !!}
                                            <span>{{ Form::submit(trans('forms.archive')) }}</span>
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>
@endsection