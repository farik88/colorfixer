@if($customerData)

    <div class="log-out-form">
        <div class="inner">
            {!! Form::open(['route' => 'customer.sign-out', 'method' => 'POST']) !!}
            <ul>
                {{--<li>--}}
                    {{--<span>{{ $customerData->phone }}</span>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<span>{{ $customerData->number }}</span>--}}
                {{--</li>--}}
                <li>
                    <span>{{ Form::submit(trans('forms.log-out')) }}</span>
                </li>
            </ul>
            {!! Form::close() !!}
        </div>
    </div>




@endif