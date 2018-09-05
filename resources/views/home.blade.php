@extends('layouts.app')

@section('page-classes', 'home-page')

{{--HEADERS PARTS--}}
@section('header-slogan')
    <div class="introduction">
        <h2>{{trans('content.slogan')}}</h2>
    </div>
@endsection

@section('header-menu')
    <nav class="menu">
        @include('partials._main-menu-list')
    </nav>
@endsection

{{--MAIN CONTENT--}}
@section('content')
    @include('partials._header')
    <div class="presentation-banner">
        <img src="/img/main_banner_2_cut_2.jpg">
    </div>
    <section class="employers-photos">
        <div class="inner">
            <ul>
                <li>
                    <img src="/img/empl_1.jpg" alt="employer photo 1" title="">
                </li>
                <li>
                    <img src="/img/empl_5.jpg" alt="employer photo 4" title="">
                </li>
                <li>
                    <img src="/img/empl_3.jpg" alt="employer photo 2" title="">
                </li>
                <li>
                    <img src="/img/empl_4.jpg" alt="employer photo 3" title="">
                </li>
            </ul>
        </div>
    </section>
    <section class="heading">
        <div class="inner">
            <h1>
                <a href="{{ route('stages.index') }}">{!! trans('content.heading-text') !!}</a>
            </h1>
        </div>
    </section>
    <section class="site-chapters">
        <div class="inner">
            <div class="chapter">
                <a href="{{ route('home') }}" class="modal-opener"  data-modal="1">
                    <div class="image">
                        <img src="/img/main_banner_5-454x283.jpg" alt="" title="">
                    </div>
                    <div class="title">
                        <h3>{{ trans('content.chapter-title-1') }}</h3>
                    </div>
                    <div class="sub-title">
                        <h4>{{ trans('content.chapter-sub-title-1') }}</h4>
                    </div>
                </a>
            </div>
            <div class="chapter">
                <a href="{{ route('stages.index')  }}">
                    <div class="image">
                        <img src="/img/main_banner_3-454x283.jpg" alt="" title="">
                    </div>
                    <div class="title">
                        <h3>{{ trans('content.chapter-title-2') }}</h3>
                    </div>
                    <div class="sub-title">
                        <h4>{{ trans('content.chapter-sub-title-2') }}</h4>
                    </div>
                </a>
            </div>
            <div class="chapter">
                <a href="#" class="modal-opener" data-modal="3">
                    <div class="image">
                        <img src="/img/main_banner_4-454x283.jpg" alt="" title="">
                    </div>
                    <div class="title">
                        <h3>{{ trans('content.chapter-title-3') }}</h3>
                    </div>
                    <div class="sub-title">
                        <h4>{{ trans('content.chapter-sub-title-3') }}</h4>
                    </div>
                </a>
            </div>
            <div class="chapter">
                <a href="#" class="not-modal-opener" data-modal="4" onclick="return false;">
                    <div class="image">
                        <img src="/img/main_banner_1-454x283.jpg" alt="" title="">
                    </div>
                    <div class="title">
                        <h3>{{ trans('content.chapter-title-4') }}</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection