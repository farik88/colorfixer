<div class="messages">
    @if(session()->has('success') || session()->has('errors') || session()->has('warnings') || $errors->count() || session()->has('status'))
        <ul>
            @foreach($errors->all() as $value)
                <li class="error">{{ trans($value) }}</li>
            @endforeach
            @foreach(session()->get('success', []) as $value)
                <li class="info">{{ trans($value) }}</li>
            @endforeach
            @if($status = session()->get('status'))
                <li class="info">{{ trans($status) }}</li>
            @endif
            @foreach(session()->get('warnings', []) as $value)
                <li class="warning">{{ trans($value) }}</li>
            @endforeach
        </ul>
    @endif
</div>