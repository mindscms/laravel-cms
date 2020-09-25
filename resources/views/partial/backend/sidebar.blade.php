@php
    $current_page = Route::currentRouteName();
@endphp

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="{{ asset('backend/img/logo.png') }}" width="50" alt="{{ config('app.name') }}">
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @role(['admin'])
        @foreach($admin_side_menu as $menu)
            @if (count($menu->appearedChildren) == 0)
                <li class="nav-item {{ $menu->id == getParentShowOf($current_page) ? 'active' : '' }}">
                    <a href="{{ route('admin.'. $menu->as) }}" class="nav-link">
                        <i class="{{ $menu->icon != null ? $menu->icon : 'fa fa-home' }}"></i>
                        <span>{{ $menu->display_name }}</span></a>
                </li>
                <hr class="sidebar-divider">
            @else
                <li class="nav-item {{ in_array($menu->parent_show, [getParentShowOf($current_page), getParentOf($current_page)]) ? 'active' : '' }}">
                    <a class="nav-link {{ in_array($menu->parent_show, [getParentShowOf($current_page), getParentOf($current_page)]) ? 'collapsed' : '' }}" href="#" data-toggle="collapse" data-target="#collapse_{{ $menu->route }}" aria-expanded="{{ $menu->parent_show == getParentOf($current_page) && getParentOf($current_page) != null ? 'false' : 'true' }}" aria-controls="collapse_{{ $menu->route }}">
                        <i class="{{ $menu->icon != null ? $menu->icon : 'fa fa-home' }}"></i>
                        <span>{{ $menu->display_name }}</span>
                    </a>
                    @if (isset($menu->appearedChildren) && count($menu->appearedChildren) > 0)
                        <div id="collapse_{{ $menu->route }}" class="collapse {{ in_array($menu->parent_show, [getParentShowOf($current_page), getParentOf($current_page)]) ? 'show' : '' }}"
                             aria-labelledby="heading_{{ $menu->route }}" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                @foreach($menu->appearedChildren as $sub_menu)
                                    <a class="collapse-item {{ getParentOf($current_page) != null && (int)(getParentIdOf($current_page)+1) == $sub_menu->id ? 'active' : '' }}" href="{{ route('admin.' . $sub_menu->as) }}">{{ $sub_menu->display_name }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </li>
            @endif
        @endforeach
    @endrole

    @role(['editor'])
    @foreach($admin_side_menu as $menu)
        @permission($menu->name)
            @if (count($menu->appearedChildren) == 0)
                <li class="nav-item {{ $menu->id == getParentShowOf($current_page) ? 'active' : '' }}">
                    <a href="{{ route('admin.'. $menu->as) }}" class="nav-link">
                        <i class="{{ $menu->icon != null ? $menu->icon : 'fa fa-home' }}"></i>
                        <span>{{ $menu->display_name }}</span></a>
                </li>
                <hr class="sidebar-divider">
            @else
                <li class="nav-item {{ in_array($menu->parent_show, [getParentShowOf($current_page), getParentOf($current_page)]) ? 'active' : '' }}">
                    <a class="nav-link {{ in_array($menu->parent_show, [getParentShowOf($current_page), getParentOf($current_page)]) ? 'collapsed' : '' }}" href="#" data-toggle="collapse" data-target="#collapse_{{ $menu->route }}" aria-expanded="{{ $menu->parent_show == getParentOf($current_page) && getParentOf($current_page) != null ? 'false' : 'true' }}" aria-controls="collapse_{{ $menu->route }}">
                        <i class="{{ $menu->icon != null ? $menu->icon : 'fa fa-home' }}"></i>
                        <span>{{ $menu->display_name }}</span>
                    </a>
                    @if (isset($menu->appearedChildren) && count($menu->appearedChildren) > 0)
                        <div id="collapse_{{ $menu->route }}" class="collapse {{ in_array($menu->parent_show, [getParentShowOf($current_page), getParentOf($current_page)]) ? 'show' : '' }}"
                             aria-labelledby="heading_{{ $menu->route }}" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                @foreach($menu->appearedChildren as $sub_menu)
                                    @permission($sub_menu->name)
                                    <a class="collapse-item {{ getParentOf($current_page) != null && (int)(getParentIdOf($current_page)+1) == $sub_menu->id ? 'active' : '' }}" href="{{ route('admin.' . $sub_menu->as) }}">{{ $sub_menu->display_name }}</a>
                                    @endpermission
                                @endforeach
                            </div>
                        </div>
                    @endif
                </li>
            @endif
        @endpermission
    @endforeach
    @endrole



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
