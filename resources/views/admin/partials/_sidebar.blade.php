<section class="left-panel">
    <ul class="general-menu">
        <li class="@yield('purchases.status')">
            <a href="{{ route('purchases.index') }}" title="{{ trans('content.purchases') }}">
                <i class="fa fa-rocket" aria-hidden="true"></i>
                <span>{{ trans('content.purchases') }}</span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{ route('purchases.index', ['type' => 'active']) }}">{{ trans('content.active') }}</a>
                    <a href="{{ route('purchases.index', ['type' => 'archived']) }}">{{ trans('content.archived') }}</a>
                    <a href="{{ route('purchases.index', ['type' => 'all']) }}">{{ trans('content.all') }}</a>
                    <a href="{{ route('purchases.create') }}">{{ trans('content.new') }}</a>
                </li>
            </ul>
        </li>
        <li class="@yield('users.status')">
            <a href="{{ route('users.index') }}" title="{{ trans('content.users') }}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>{{ trans('content.users') }}</span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{ route('users.index', ['type' => 'all']) }}">{{ trans('content.all') }}</a>
                    <a href="{{ route('users.create') }}">{{ trans('content.new') }}</a>
                </li>
            </ul>
        </li>
    </ul>
</section>