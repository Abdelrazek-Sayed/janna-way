<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" width="70px"
            src="{{ asset('dashboard/images/user.png') }}" alt="User Image">
        <div>
            @auth
                <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
                <p class="app-sidebar__user-designation">{{ auth()->user()->email }}</p>
            @endauth
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-dashboard"></i><span
                    class="app-menu__label">{{ trans('dashboard.dashboard') }}</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-laptop"></i><span
                    class="app-menu__label">{{ trans('dashboard.roles') }}</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('dashboard.roles') }}"><i
                            class="icon fa fa-circle-o"></i>
                        {{ trans('dashboard.roles') }}</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-laptop"></i><span
                    class="app-menu__label">{{ trans('dashboard.users') }}</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('dashboard.users') }}"><i
                            class="icon fa fa-circle-o"></i>
                        {{ trans('dashboard.users') }}</a></li>
            </ul>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-laptop"></i><span
                    class="app-menu__label">{{ trans('dashboard.categories') }}</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('dashboard.categories') }}"><i
                            class="icon fa fa-circle-o"></i>
                        {{ trans('dashboard.categories') }}</a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-laptop"></i><span
                    class="app-menu__label">{{ trans('dashboard.authers') }}</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('dashboard.authers') }}"><i
                            class="icon fa fa-circle-o"></i>
                        {{ trans('dashboard.authers') }}</a></li>
            </ul>
        </li>
    </ul>
</aside>
