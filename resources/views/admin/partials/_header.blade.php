<section class="top-panel">
    <ul>
        <li id="console-toggle">
            <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
        </li>
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i>{{ trans('content.home') }}</a>
        </li>
        <li class="exit-button">
            {!! Form::open(['route' => 'logout', 'method' => 'POST']) !!}
                {{ Form::submit(trans('forms.log-out')) }}
            {!! Form::close() !!}
        </li>
    </ul>
</section>