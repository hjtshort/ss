<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><img src="{{ asset('/cpanel/img/avatar-7.jpg') }}"
                                                               alt="person" class="img-fluid rounded-circle">
                <h2 class="h5">{{ Auth::user()->name }}</h2><span>
                    @if(Auth::user()->roles==0)
                        Admin
                        @elseif(Auth::user()->roles==1)
                        Nhân viên
                        @else
                        Công tác viên
                        @endif
                </span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center">
                    <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">Main</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li @if(Request::segment(1)=='') class="active" @endif><a href="{{ route('index') }}"> <i class="icon-home"></i>Home </a></li>
                <li @if(Request::segment(1)=='customers') class="active" @endif><a href="{{ route('customer') }}"> <i class="icon-user"></i>Khách hàng </a></li>
                @if(Auth::user()->roles==0)
                <li @if(Request::segment(1)=='employees') class="active" @endif ><a href="{{ route('employee') }}"> <i class="fa fa-address-book" aria-hidden="true"></i>Nhân viên </a></li>
                @endif
                @if(Auth::user()->roles==1)
                <li @if(Request::segment(1)=='list-customers') class="active" @endif><a href="{{ route('listCustomer') }}"> <i class="fa fa-users" aria-hidden="true"></i>Danh sách khách hàng </a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>