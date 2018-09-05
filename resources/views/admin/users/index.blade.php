@extends('admin.main')

@section('users.status', 'active')

@section('page-classes', 'admin-page users-listing')

@section('workplace')
    <section class="right-panel">
        <div class="inner">
            <div class="title">
                <h2>{{ trans('content.users') }} | {{ trans('content.all') }}</h2>
            </div>
            @include('partials._messages')
            @if($users->count())
                <div class="content">
                    <table class="items-list users-list">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('forms.name') }}</th>
                            <th>{{ trans('forms.email') }}</th>
                            <th>{{ trans('forms.verified') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="td-status">
                                    @if($user->verified)
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    @else
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    @endif
                                </td>
                                <td class="users-actions">
                                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                                        {{ Form::submit(trans('forms.destroy')) }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>
@endsection