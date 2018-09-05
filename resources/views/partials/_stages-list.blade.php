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

    $current_stage = isset($page) ? (int) $page['number'] : -1;
@endphp

@foreach($links as $key => $value)
    <div class="row {{ ($key >= $current_stage ? '' : 'passed') }} {{ (($key + 1) === $current_stage ? 'current' : '') }}">
        <a href="{{ route('stages.show', ['number' => $key + 1]) }}" class="link-button">
            <button class="bs-button bs-white">{{ $key + 1 }}</button>
        </a>
        <a href="{{ route('stages.show', ['number' => $key + 1]) }}" class="link-text">{{ trans('stages.' . $value) }}</a>
    </div>
@endforeach