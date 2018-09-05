@unless($customerData)

    @php
        $has_error_class = ($errors->count()) ? ' has_error' : '';
    @endphp

    <div class="log-in-form{{$has_error_class}}">
        <div class="inner">
            {!! Form::open(['route' => 'customer.sign-in']) !!}
            <div class="block-1">
                @if($errors->count())
                    <p class="error-message">{{ trans('forms.purchase-not-found') }}</p>
                @endif
                {{ Form::text('number', null, ['required', 'placeholder' => trans('forms.number'), 'class' => 'sign-in-number']) }}
                {{ Form::text('phone', null, ['required', 'placeholder' => trans('forms.phone'), 'class' => 'sign-in-phone']) }}
            </div>
            <div class="block-2">
                {{ Form::submit(trans('forms.log-in')) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endunless


