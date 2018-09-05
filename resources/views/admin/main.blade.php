@extends('layouts.app')

@section('page-classes', 'admin-page')

@section('content')
    @include('admin.partials._header')

    <main class="page-inner">
        @include('admin.partials._sidebar')
        @yield('workplace')
    </main>
@endsection
