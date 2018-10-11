<!--========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <div class="user-box">
            <div class="user-img">
                <img src="{{ asset('uploads/avatars/'.Auth::user() -> image) }}" alt="user-img" title="{{ Auth::user() -> full_name }}" class="rounded-circle img-thumbnail img-responsive">
                <div class="user-status online"><i class="mdi mdi-adjust"></i></div>
            </div>
            <h5><a href="{{ route('home') }}">{{ Auth::user() -> full_name }}</a> </h5>
            <h5><a href="{{ route('home') }}">({{ Auth::user() -> email }})</a> </h5>
            <ul class="list-inline">

                {{-- <li class="list-inline-item">
                    <a href="#" >
                        <i class="mdi mdi-settings"></i>
                    </a>
                </li> --}}

                <li class="list-inline-item">
                    <a href="#" class="text-custom" title="Logout" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-power"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
    <!-- End User -->

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <ul>
            <li class="text-muted menu-title">Navigation</li>

            <li>
                <a href="{{ route('home') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
            </li>

            @hasrole('superadmin')
            <li>
                <a href="{{ route('users.index') }}" class="waves-effect"><i class="fa fa-user"></i> <span> User Management</span> </a>
            </li>
            @endhasrole

            @hasrole('superadmin')
            <li>
                <a href="{{ route('reports.all') }}" class="waves-effect"><i class="mdi mdi-texture"></i> <span> All Documents</span> </a>
            </li>
            @endhasrole

            <li>
                <a href="{{ route('reports.index') }}" class="waves-effect"><i class="mdi mdi-texture"></i> <span> My Documents</span> </a>
            </li>

            <li>
                <a href="{{ route('account.index') }}" class="waves-effect"><i class="mdi mdi-settings"></i> <span> Password Reset</span> </a>
            </li>


                {{-- <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-settings"></i> <span> Settings</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('account.index') }}">Password Reset</a></li>
                    </ul>
                </li> --}}
            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
            <!-- Left Sidebar End