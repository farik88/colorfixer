@extends('layouts.app')

@section('page-classes', 'stage-page')

@section('content')
    @include('partials._header')
    <section class="single-stage">
        <div class="inner">
            <div class="flex-container">
                <div class="info">
                    <div class="number">
                        <span>{{ $stage->number }}</span>
                    </div>
                    <div class="title">
                        <h1>{{ trans('demo-stages.title-'.$stage->number) }}</h1>
                    </div>
                    <div class="sub-title">
                        <span>{{ trans('demo-stages.text-'.$stage->number) }}</span>
                    </div>
                </div>
                <div class="attachments">
                    @if(is_null($stage) || $stage->attachments->count() === 0)
                        <img src="{{ url("img/stage-{$page['number']}.jpg") }}" alt="{{ trans('content.site-name') }}">
                    @else
                        @if($stage->attachments->count() === 1)
                            @if($stage->attachments->first()->type === 'photo')
                                <img src="{{ $stage->attachments->first()->link }}" class="single-attachment" alt="{{ trans('content.site-name') }}">
                            @else
                                <video controls>
                                    <source src="{{ $stage->attachments->first()->link }}">
                                </video>
                            @endif
                        @elseif($stage->attachments->count() > 1)
                            <div class="owl-carousel owl-theme">
                                @foreach($stage->attachments as $attachment)
                                    @if($attachment->type === 'photo')
                                        <img src="{{ $attachment->link }}" alt="{{ trans('content.site-name') }}">
                                    @else
                                        <video controls>
                                            <source src="{{ $attachment->link }}">
                                        </video>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    @endif
                </div>
                <div class="close-block">
                    <a href="{{ route("stages.index") }}">X</a>
                </div>
            </div>
        </div>
    </section>

@endsection
