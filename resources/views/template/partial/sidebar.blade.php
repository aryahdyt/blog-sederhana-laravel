<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">{{ config('app.name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">
                {{-- <img src="{{ asset('assets/img/logo/logo_tb.png') }}" alt="Tb" width="50px"> --}}
                Art
            </a>
        </div>
        <ul class="sidebar-menu">
            @if (auth()->user()->role == "admin")
            {{-- admin --}}
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i></i>
                    <span>Dasboard</span></a>
            </li>

            <li class="menu-header">Data Master</li>
            <li class="nav-item dropdown {{ request()->is('user*','') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fa fa-archive"></i>
                    <span>Data Mater</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('user*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.index') }}">Data User</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Blog</li>
            <li class="{{ request()->is('blog*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('blog.index') }}">
                    <i class="fas fa-blog"></i>
                    <span class="text-center">Blog Saya<i class="fas fa-user"></i></span>
                </a>
            </li>
            <li class="{{ request()->is('all-blogs*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('all-blogs') }}">
                    <i class="fas fa-blog"></i>
                    <span class="text-center">Semua Blog<i class="fas fa-users"></i></span>
                </a>
            </li>
            @elseif(auth()->user()->role == "normal")
            {{-- normal --}}
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i></i>
                    <span>Dasboard</span></a>
            </li>

            <li class="menu-header">Blog</li>
            <li class="{{ request()->is('blog*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('blog.index') }}">
                    <i class="fas fa-blog"></i>
                    <span class="text-center">Blog Saya<i class="fas fa-user"></i></span>
                </a>
            </li>
            <li class="{{ request()->is('all-blogs*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('all-blogs') }}">
                    <i class="fas fa-blog"></i>
                    <span class="text-center">Semua Blog<i class="fas fa-xs fa-users text-right"></i></span>
                </a>
            </li>
            @endif

        </ul>
    </aside>
</div>