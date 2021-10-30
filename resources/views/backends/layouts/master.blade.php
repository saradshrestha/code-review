<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Dashboard
        @if(request()->routeIs('backend.posts*'))
            - Post
        @elseif(request()->routeIs('backend.categories*'))
            - Category
        @elseif(request()->routeIs('backend.categories*'))
            - User
        @endif
    </title>
    @include('backends.partials.stylesheet')
</head>
<body class="alt-menu sidebar-noneoverflow">

<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>

@include('backends.partials.navigation')


<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <div class="topbar-nav header navbar" role="banner">
        <nav id="topbar">
            <ul class="navbar-nav theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="index.html">
                        <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="index.html" class="nav-link"> CORK </a>
                </li>
            </ul>

            <ul class="list-unstyled menu-categories" id="topAccordion">
                <li class="menu single-menu">
                    <a href="{{ route ('backend.dashboard') }}"  >
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>
                <li class="menu single-menu  {{ (request()->routeIs('backend.posts*'))  ? 'active' : '' }}">
                    <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                            <span>Posts</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="app" data-parent="#topAccordion">
                        <li class= "{{ (request()->routeIs('backend.posts.index*')) ? 'active' : '' }}">
                            <a href="{{route ('backend.posts.index')}}"> View All Posts </a>
                        </li>
                        <li class= "{{ (request()->routeIs('backend.posts.trash'))  ? 'active' : '' }}">
                            <a href="{{route('backend.posts.trash')}}">View Trashed Post </a>
                        </li>
                    </ul>
                </li>
                <li class="menu single-menu {{ (request()->routeIs('backend.categories*'))  ? 'active' : '' }}">
                    <a href="#category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                            <span>Category</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="category" data-parent="#topAccordion">
                        <li class="{{ (request()->routeIs('backend.categories.index*')) ? 'active' : '' }}">
                            <a href="{{ route ('backend.categories.index') }}"> View All Category </a>
                        </li>
                        <li class="{{ (request()->routeIs('backend.categories.trash*')) ? 'active' : '' }}">
                            <a href="{{ route ('backend.categories.trash') }}"> View Trashed Category </a>
                        </li>

                    </ul>
                </li>
                @role('admin')
                    <li class="menu single-menu {{ (request()->routeIs('backend.users*'))  ? 'active' : '' }}">
                        <a href="#user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                <span>Users</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="user" data-parent="#topAccordion">
                            <li class="{{ (request()->routeIs('backend.users.index*')) ? 'active' : '' }}">
                                <a href=" {{route ('backend.users.index')}} "> View All Users </a>
                            </li>
                            <li class="{{ (request()->routeIs('backend.users.trash*')) ? 'active' : '' }}">
                                <a href=" {{route ('backend.users.trash')}} "> View Trashed Users </a>
                            </li>

                        </ul>
                    </li>
                @endrole

                <li class="menu single-menu">
                    <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                            <span>Tables</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="tables"  data-parent="#topAccordion">
                        <li>
                            <a href="table_basic.html"> Basic </a>
                        </li>
                        <li class="sub-sub-submenu-list">
                            <a href="#datatable" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> DataTables <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="collapse list-unstyled sub-submenu" id="datatable" data-parent="#datatable">
                                <li>
                                    <a href="table_dt_basic.html"> Basic </a>
                                </li>
                                <li>
                                    <a href="table_dt_basic-dark.html"> Dark </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            @yield('content')
        </div>
    </div>
</div>
@include('backends.partials.scripts')
</body>
</html>
