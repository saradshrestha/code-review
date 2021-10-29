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
<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div></div></div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
@include('backends.partials.navigation')
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN TOPBAR  -->
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
                    <a href="{{route ('backend.dashboard')}}"  >
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span>Dashboard

                            </span>
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
                        {{-- <li class= "{{ (request()->routeIs('backend.posts.create*'))  ? 'active' : '' }}">
                            <a href="{{route ('backend.posts.create')}}"> Create A Post </a>
                        </li> --}}
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
                            <a href="{{route ('backend.categories.index')}}"> View All Category </a>
                        </li>
                        {{-- <li class="{{ (request()->routeIs('backend.categories.create*')) ? 'active' : '' }}">
                            <a href="{{route ('backend.categories.create')}}"> Create Category</a>
                        </li> --}}
                        <li class="{{ (request()->routeIs('backend.categories.trash*')) ? 'active' : '' }}">
                            <a href="{{route ('backend.categories.trash')}}"> View Trashed Category </a>
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
                                <a href="{{route ('backend.users.index')}}"> View All Users </a>
                            </li>
                            {{-- <li class="{{ (request()->routeIs('backend.users.create*')) ? 'active' : '' }}">
                                <a href="{{route ('backend.users.create')}}"> Create User</a>
                            </li> --}}
                            <li class="{{ (request()->routeIs('backend.users.trash*')) ? 'active' : '' }}">
                                <a href="{{route ('backend.users.trash')}}"> View Trashed Users </a>
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

                <li class="menu single-menu">
                    <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                            <span>Forms</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="forms"  data-parent="#topAccordion">
                        <li>
                            <a href="form_bootstrap_basic.html"> Basic </a>
                        </li>

                    </ul>
                </li>

                <li class="menu single-menu">
                    <a href="#page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span>Pages</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="page"  data-parent="#topAccordion">
                        <li>
                            <a href="pages_helpdesk.html"> Helpdesk </a>
                        </li>
                        <li>
                            <a href="pages_contact_us.html"> Contact Form </a>
                        </li>
                        <li>
                            <a href="pages_faq.html"> FAQ </a>
                        </li>
                        <li>
                            <a href="pages_faq2.html"> FAQ 2 </a>
                        </li>
                        <li>
                            <a href="pages_privacy.html"> Privacy Policy </a>
                        </li>
                        <li>
                            <a href="pages_coming_soon.html"> Coming Soon </a>
                        </li>
                        <li>
                            <a href="user_profile.html"> Profile </a>
                        </li>
                        <li>
                            <a href="user_account_setting.html"> Account Settings </a>
                        </li>
                        <li class="sub-sub-submenu-list">
                            <a href="#pages-error" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Error <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="collapse list-unstyled sub-submenu" id="pages-error" data-parent="#more">
                                <li>
                                    <a href="pages_error404.html"> 404 </a>
                                </li>
                                <li>
                                    <a href="pages_error500.html"> 500 </a>
                                </li>
                                <li>
                                    <a href="pages_error503.html"> 503 </a>
                                </li>
                                <li>
                                    <a href="pages_maintenence.html"> Maintanence </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-sub-submenu-list">
                            <a href="#user-login" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Login <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="collapse list-unstyled sub-submenu" id="user-login" data-parent="#page">
                                <li>
                                    <a href="auth_login.html"> Login </a>
                                </li>
                                <li>
                                    <a href="auth_login_boxed.html"> Login Boxed </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-sub-submenu-list">
                            <a href="#user-register" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Register <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="collapse list-unstyled sub-submenu" id="user-register" data-parent="#page">
                                <li>
                                    <a href="auth_register.html"> Register </a>
                                </li>
                                <li>
                                    <a href="auth_register_boxed.html"> Register Boxed </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sub-sub-submenu-list">
                            <a href="#user-passRecovery" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Password Recovery <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="collapse list-unstyled sub-submenu" id="user-passRecovery" data-parent="#page">
                                <li>
                                    <a href="auth_pass_recovery.html"> Recover ID </a>
                                </li>
                                <li>
                                    <a href="auth_pass_recovery_boxed.html"> Recover ID Boxed </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sub-sub-submenu-list">
                            <a href="#user-lockscreen" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Lockscreen <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="collapse list-unstyled sub-submenu" id="user-lockscreen" data-parent="#page">
                                <li>
                                    <a href="auth_lockscreen.html"> Unlock </a>
                                </li>
                                <li>
                                    <a href="auth_lockscreen_boxed.html"> Unlock Boxed </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu single-menu">
                    <a href="#more" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                            <span>More</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="more" data-parent="#topAccordion">
                        <li>
                            <a href="dragndrop_dragula.html"> Drag and Drop</a>
                        </li>
                        <li>
                            <a href="widgets.html"> Widgets </a>
                        </li>
                        <li>
                            <a href="map_jvector.html"> Vector Maps</a>
                        </li>
                        <li>
                            <a href="charts_apex.html"> Charts </a>
                        </li>
                        <li>
                            <a href="fonticons.html"> Font Icons </a>
                        </li>
                        <li class="sub-sub-submenu-list">
                            <a href="#starter-kit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> Starter Kit <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="collapse list-unstyled sub-submenu eq-animated eq-fadeInUp" id="starter-kit" data-parent="#more">
                                <li>
                                    <a href="starter_kit_blank_page.html"> Blank Page </a>
                                </li>
                                <li>
                                    <a href="starter_kit_breadcrumb.html"> Breadcrumb </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="../../documentation/index.html"> Documentation </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <!--  END TOPBAR  -->

    <!--  BEGIN CONTENT PART  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            @yield('content')
        </div>
    </div>
    <!--  END CONTENT PART  -->

</div>
<!-- END MAIN CONTAINER -->

@include('backends.partials.scripts')
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>
