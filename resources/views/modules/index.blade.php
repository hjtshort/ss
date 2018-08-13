@extends('App')
@section('content')
    <section class="dashboard-counts section-padding">
        <div class="container-fluid">
            <div class="row">
                <!-- Count item widget-->
                <div class="col-xl-3 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-user"></i></div>
                        <div class="name"><strong class="text-uppercase">Khách hàng</strong><span>Trong 1 ngày</span>
                            <div class="count-number">{{ $countCustomersInDay }}</div>
                        </div>
                    </div>
                </div>
                <!-- Count item widget-->
                <div class="col-xl-3 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-padnote"></i></div>
                        <div class="name"><strong class="text-uppercase">Khách hàng chưa có người quản lý</strong>
                            <div class="count-number">{{ $countCustomersNotManager }}</div>
                        </div>
                    </div>
                </div>
                <!-- Count item widget-->
                <div class="col-xl-3 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-check"></i></div>
                        <div class="name"><strong class="text-uppercase">Cộng tác viên</strong><span>&nbsp;</span>
                            <div class="count-number">{{ $countCollaborators }}</div>
                        </div>
                    </div>
                </div>
                <!-- Count item widget-->
                <div class="col-xl-3 col-md-4 col-6">
                    <div class="wrapper count-title d-flex">
                        <div class="icon"><i class="icon-bill"></i></div>
                        <div class="name"><strong class="text-uppercase">Nhân viên</strong><span>&nbsp;</span>
                            <div class="count-number">{{ $countEmployee }}</div>
                        </div>
                    </div>
                </div>
                <!-- Count item widget-->
                {{--<div class="col-xl-3 col-md-4 col-6">--}}
                    {{--<div class="wrapper count-title d-flex">--}}
                        {{--<div class="icon"><i class="icon-list"></i></div>--}}
                        {{--<div class="name"><strong class="text-uppercase">Open Cases</strong><span>Last 3 months</span>--}}
                            {{--<div class="count-number">92</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Count item widget-->--}}
                {{--<div class="col-xl-3 col-md-4 col-6">--}}
                    {{--<div class="wrapper count-title d-flex">--}}
                        {{--<div class="icon"><i class="icon-list-1"></i></div>--}}
                        {{--<div class="name"><strong class="text-uppercase">New Cases</strong><span>Last 7 days</span>--}}
                            {{--<div class="count-number">70</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </section>
    <!-- Header Section-->
    <!-- Statistics Section-->
    <section class="statistics mt-5">
        <div class="container-fluid">
            <div class="row d-flex">
                {{--<div class="col-lg-4">--}}
                    {{--<!-- Income-->--}}
                    {{--<div class="card income text-center">--}}
                        {{--<div class="icon"><i class="icon-user"></i></div>--}}
                        {{--<div class="number">{{ $countCustomersInDay }}</div>--}}
                        {{--<strong class="text-primary">Khách hàng trong ngày</strong>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4">--}}
                    {{--<!-- Income-->--}}
                    {{--<div class="card income text-center">--}}
                        {{--<div class="icon"><i class="icon-user"></i></div>--}}
                        {{--<div class="number">{{ $countCustomersNotManager }}</div>--}}
                        {{--<strong class="text-primary">Khách hàng chưa có người quản lý</strong>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4">--}}
                    {{--<!-- Monthly Usage-->--}}
                    {{--<div class="card data-usage">--}}
                        {{--<h2 class="display h4">Monthly Usage</h2>--}}
                        {{--<div class="row d-flex align-items-center">--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<div id="progress-circle"--}}
                                     {{--class="d-flex align-items-center justify-content-center"></div>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6"><strong class="text-primary">80.56 Gb</strong>--}}
                                {{--<small>Current Plan</small>--}}
                                {{--<span>100 Gb Monthly</span></div>--}}
                        {{--</div>--}}
                        {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-lg-4">--}}
                    {{--<!-- User Actibity-->--}}
                    {{--<div class="card user-activity">--}}
                        {{--<h2 class="display h4">User Activity</h2>--}}
                        {{--<div class="number">210</div>--}}
                        {{--<h3 class="h4 display">Social Users</h3>--}}
                        {{--<div class="progress">--}}
                            {{--<div role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"--}}
                                 {{--aria-valuemax="100" class="progress-bar progress-bar bg-primary"></div>--}}
                        {{--</div>--}}
                        {{--<div class="page-statistics d-flex justify-content-between">--}}
                            {{--<div class="page-statistics-left"><span>Pages Visits</span><strong>230</strong></div>--}}
                            {{--<div class="page-statistics-right"><span>New Visits</span><strong>73.4%</strong></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </section>
    <!-- Updates Section -->
    <section class="mt-30px mb-30px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <!-- Recent Updates Widget          -->
                    <div id="new-updates" class="card updates recent-updated">
                        <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                            <h2 class="h5 display"><a data-toggle="collapse" data-parent="#new-updates"
                                                      href="#updates-box" aria-expanded="true"
                                                      aria-controls="updates-box">Top CTV điểm cao</a></h2><a
                                    data-toggle="collapse" data-parent="#new-updates" href="#updates-box"
                                    aria-expanded="true" aria-controls="updates-box"><i
                                        class="fa fa-angle-down"></i></a>
                        </div>
                        <div id="updates-box" role="tabpanel" class="collapse show">
                            <ul class="news list-unstyled">
                                @forelse($topTenBonus as $k=>$val)
                                <!-- Item-->
                                <li class="d-flex justify-content-between">
                                    <div class="left-col d-flex">
                                        <div class="icon"><i class="icon-rss-feed"></i></div>
                                        <div class="title"><a href="{{ route('getCustomersByCollaborators',$val->id) }}"><strong>{{ $val->name }}.</strong></a>
                                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
                                                {{--tempor.</p>--}}
                                        </div>
                                    </div>
                                    <div class="right-col text-right">
                                        <div class="update-date">{{ $val->bonus }}<span class="month">{{ number_format($val->bonus*1000) }} vnđ</span></div>
                                    </div>
                                </li>
                                @empty
                                <!-- Item-->
                                    @endforelse
                            </ul>
                        </div>
                    </div>
                    <!-- Recent Updates Widget End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- Daily Feed Widget-->
                    <div id="new-updates" class="card updates recent-updated">
                        <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                            <h2 class="h5 display"><a data-toggle="collapse" data-parent="#new-updates"
                                                      href="#updates-box1" aria-expanded="true"
                                                      aria-controls="updates-box1">Top nhân viên quản lý</a></h2><a
                                    data-toggle="collapse" data-parent="#new-updates" href="#updates-box1"
                                    aria-expanded="true" aria-controls="updates-box1"><i
                                        class="fa fa-angle-down"></i></a>
                        </div>
                        <div id="updates-box1" role="tabpanel" class="collapse show">
                            <ul class="news list-unstyled">
                            @forelse($topTenManager as $k=>$val)
                                <!-- Item-->
                                    <li class="d-flex justify-content-between">
                                        <div class="left-col d-flex">
                                            <div class="icon"><i class="icon-rss-feed"></i></div>
                                            <div class="title"><a href="{{ route('getCustomersByEmployees',$val->Manager_id) }}"><strong>{{ $val->name }}.</strong></a>
                                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
                                                {{--tempor.</p>--}}
                                            </div>
                                        </div>
                                        <div class="right-col text-right">
                                            <div class="update-date">{{ $val->countCustomer }}<span class="month"> khách hàng</span></div>
                                        </div>
                                    </li>
                            @empty
                                <!-- Item-->
                                @endforelse
                            </ul>
                        </div>
                    </div>
                    <!-- Daily Feed Widget End-->
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- Recent Activities Widget      -->
                    <div id="new-updates" class="card updates recent-updated">
                        <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                            <h2 class="h5 display"><a data-toggle="collapse" data-parent="#new-updates"
                                                      href="#updates-box2" aria-expanded="true"
                                                      aria-controls="updates-box">Thống kê nhà mạng khách hàng sử dụng</a></h2><a
                                    data-toggle="collapse" data-parent="#new-updates" href="#updates-box2"
                                    aria-expanded="true" aria-controls="updates-box2"><i
                                        class="fa fa-angle-down"></i></a>
                        </div>
                        <div id="updates-box2" role="tabpanel" class="collapse show">
                            <ul class="news list-unstyled">
                            @forelse($topTenNetwork as $k=>$val)
                                <!-- Item-->
                                    <li class="d-flex justify-content-between">
                                        <div class="left-col d-flex">
                                            <div class="icon"><i class="icon-rss-feed"></i></div>
                                            <div class="title"><strong>{{ $val->Network }}.</strong>
                                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
                                                {{--tempor.</p>--}}
                                            </div>
                                        </div>
                                        <div class="right-col text-right">
                                            <div class="update-date">{{ $val->countNetwork }}<span class="month"> khách hàng</span></div>
                                        </div>
                                    </li>
                            @empty
                                <!-- Item-->
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection