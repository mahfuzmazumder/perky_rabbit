<nav class="navbar top-navbar navbar-expand-md navbar-dark">
    <!-- ============================================================== -->
    <!-- Logo -->
    <!-- ============================================================== -->
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('admin_dashboard') }}">
            <!-- Logo icon --><b>
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->

                {{-- <img src="{{ asset('/assets/template/images/logo-icon.png') }}" alt="homepage" class="dark-logo" /> --}}

                <!-- Light Logo icon -->

                {{-- <img src="{{ asset('/assets/template/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" /> --}}

            </b>
            <!--End Logo icon -->
            <span class="hidden-xs"><span class="font-bold">@lang('common.stock')</span>&nbsp;@lang('common.management')</span>
        </a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav me-auto">
            <!-- This is  -->
            <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                    href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
            <li class="nav-item"> <a
                    class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"
                    href="javascript:void(0)"><i class="fas fa-bars"></i></a> </li>
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            <li class="nav-item">
                <form class="app-search d-none d-md-block d-lg-block">
                    <input type="text" class="form-control" placeholder="@lang('common.search_and_enter')">
                </form>
            </li>
        </ul>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <ul class="navbar-nav my-lg-0">
            <!-- ============================================================== -->
            <!-- User Profile -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown u-pro">
                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src=""
                        alt="@lang('common.user')" class=""> <span class="hidden-md-down">Name &nbsp;<i
                            class="fa fa-angle-down"></i></span> </a>
                <div class="dropdown-menu dropdown-menu-end animated flipInY">
                    <!-- text-->
                    <a href="javascript:void(0)" class="dropdown-item"><i class="far fa-user"></i>@lang('common.my_profile')</a>
                    <!-- text-->
                    <div class="dropdown-divider"></div>
                    <!-- text-->
                    <div class="dropdown-divider"></div>
                    <!-- text-->
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                       <i class="fa fa-power-off"></i> @lang('common.logout')
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <!-- text-->
                </div>
            </li>
            <!-- ============================================================== -->
            <!-- End User Profile -->
            <!-- ============================================================== -->
            <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light"
                    href="javascript:void(0)"><i class="fas fa-cog"></i></a></li>
        </ul>
    </div>
</nav>
