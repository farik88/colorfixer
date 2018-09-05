<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ trans('content.site-name') }}</title>

        <link rel="stylesheet" type="text/css" href="{{ url('dist/app.min.css') }}" />
        <script src="{{ url('dist/app.min.js') }}"></script>
    </head>
    <body>
        <div class="content @yield('page-classes')">
            @include('partials._modal')
            @yield('content')
        </div>
    </body>
</html>