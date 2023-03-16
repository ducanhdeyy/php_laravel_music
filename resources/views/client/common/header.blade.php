<div id="header" class="page-header bg-body sticky" data-class="bg-body">
    <div class="navbar navbar-expand-lg"><!-- brand --> <a href="" class="navbar-brand d-lg-none" data-pjax-state="">
            <svg width="32" height="32" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                <g class="loading-spin" style="transform-origin: 256px 256px">
                    <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z">
                    </path>
                </g>
            </svg><!-- <img src="template/client/assets/img/logo.png" alt="..."> --> <span class="hidden-folded d-inline l-s-n-1x d-lg-none">Basik</span>
        </a><!-- / brand --><!-- Navbar collapse -->
        <div class="collapse navbar-collapse order-2 order-lg-1" id="navbarToggler">
            <form action="{{route('search')}}" method="get" class="input-group m-2 my-lg-0">
                <div class="input-group-prepend">
                    <button type="button" class="btn no-shadow no-bg px-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </div>
                <input type="text" name="search" class="form-control no-border no-shadow no-bg typeahead" placeholder="Search..." data-api="template/client/assets/api/music.json">
            </form>
        </div>

            <ul class="nav navbar-menu order-1 order-lg-2">
                @if(Auth::guard('cus')->check())
                <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link d-flex align-items-center px-2 text-color" data-pjax-state=""><span class="dropdown-toggle mx-2 d-none l-h-1x d-lg-block text-right">{{Auth::guard('cus')->user()->name}}</span>
                        <span class="avatar w-24" style="margin: -2px"><img src="{{Auth::guard('cus')->user()->image != null ? asset('uploads/'. Auth::guard('cus')->user()->image) : asset('template/client/assets/img/default-user.png') }}" alt="..."></span></a>
                    <div class="dropdown-menu dropdown-menu-right w mt-3 animate fadeIn">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('setting')}}" data-pjax-state="">
                            <span>Setting</span> </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout.user')}}" data-pjax-state="">Sign
                            out</a>
                    </div>
                </li><!-- Navarbar toggle btn -->
                @else
                <li class="nav-item dropdown">
                    <a href="{{route('login.user')}}" class="nav-link d-flex align-items-center px-2 text-color"><span class="text-l mx-2 d-none l-h-1x d-lg-block text-right">Login</span>
                        <span class="avatar w-24" style="margin: -2px"><img src="{{asset('template/client/assets/img/user.png')}}" alt="..."></span></a>
                </li><!-- Navarbar toggle btn -->
                @endif
                <li class="nav-item d-lg-none"><a href="#" class="nav-link px-2" data-toggle="collapse" data-toggle-class="" data-target="#navbarToggler" data-pjax-state="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </a></li>
                <li class="nav-item d-lg-none"><a class="nav-link px-1" data-toggle="modal" data-target="#aside" data-pjax-state="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </a></li>
            </ul>
    </div>
</div>
