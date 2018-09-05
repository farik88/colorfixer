@extends('layouts.app')

@section('page-classes', 'stages-page')

@section('log-in-out-forms')
    @include('partials._customer-sign-in-form')
    @include('partials._customer-sign-out-form')
@endsection

@section('back-home-button')
<a id="mob-menu-switcher" href="{{ route('home')  }}">
    <i class="fa fa-bars" aria-hidden="true"></i>
</a>
@endsection

@section('content')

    @include('partials._header')

    @if(is_null($stages))
        @include('stages._demo-stages')
    @else
        <section class="customer-stages">
            <div class="inner">
                <div class="content">
                    <ul>
                        @foreach($stages as $stage)
                                <li class="stage">
                                    <div class="inner">
                                        <div class="number">
                                            <span>{{ $stage->number }}</span>
                                        </div>
                                        <div class="stage-content">
                                            @if($stage->attachments->count() > 0)
                                                <a href="/stages/{{ $stage->number }}" class="attachment-link">
                                                    @if($stage->attachments[0]->type === 'photo')
                                                        <div class="image">
                                                            <img src="/storage/{{ $stage->attachments[0]->name }}" alt="" title="">
                                                        </div>
                                                    @endif
                                                    @if($stage->attachments[0]->type === 'video')
                                                        <div class="video">
                                                            <video controls>
                                                                <source src="/storage/{{ $stage->attachments[0]->name }}">
                                                            </video>
                                                        </div>
                                                    @endif
                                                </a>
                                            @endif
                                            <div class="text-content">
                                                <div class="title">
                                                    @if($stage->attachments->count() > 0)
                                                        <a href="/stages/{{ $stage->number }}" class="title-link">
                                                            <h3>{{ trans('demo-stages.title-'.$stage->number) }}</h3>
                                                        </a>
                                                    @else
                                                        <h3>{{ trans('demo-stages.title-'.$stage->number) }}</h3>
                                                    @endif
                                                </div>
                                                <div class="text">
                                                    @if($stage->attachments->count() > 0)
                                                        <a href="/stages/{{ $stage->number }}" class="text-link">
                                                            <span>{{ trans('demo-stages.text-'.$stage->number) }}</span>
                                                        </a>
                                                    @else
                                                        <span>{{ trans('demo-stages.text-'.$stage->number) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            @if($stage->end_date)
                                                <div class="stage-date">
                                                    <span>{{ $stage->end_date }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif

@endsection
