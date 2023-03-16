<div id="aside" class="page-sidenav no-shrink bg-light nav-dropdown fade sticky" data-class="bg-light">
    <div class="sidenav h-100 modal-dialog bg-light"><!-- sidenav top -->
        <div class="navbar"><!-- brand --> <a href="" class="navbar-brand" data-pjax-state="">
                <svg width="32" height="32" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                    <g class="loading-spin" style="transform-origin: 256px 256px">
                        <path d="M200.043 106.067c-40.631 15.171-73.434 46.382-90.717 85.933H256l-55.957-85.933zM412.797 288A160.723 160.723 0 0 0 416 256c0-36.624-12.314-70.367-33.016-97.334L311 288h101.797zM359.973 134.395C332.007 110.461 295.694 96 256 96c-7.966 0-15.794.591-23.448 1.715L310.852 224l49.121-89.605zM99.204 224A160.65 160.65 0 0 0 96 256c0 36.639 12.324 70.394 33.041 97.366L201 224H99.204zM311.959 405.932c40.631-15.171 73.433-46.382 90.715-85.932H256l55.959 85.932zM152.046 377.621C180.009 401.545 216.314 416 256 416c7.969 0 15.799-.592 23.456-1.716L201.164 288l-49.118 89.621z">
                        </path>
                    </g>
                </svg><!-- <img src="template/client/assets/img/logo.png" alt="..."> --> <span class="hidden-folded d-inline l-s-n-1x">Music</span> </a><!-- / brand --></div>
        <!-- Flex nav content -->
        <div class="flex scrollable hover">
            <div class="nav-active-text-primary" data-nav="">
                <ul class="nav bg">
                    <li>
                    </li>
                    <li class="nav-header hidden-folded"><span class="text-muted">Music</span></li>
                    <li><a href="{{route('home')}}" data-pjax-state=""><span class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-disc">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg> </span><span class="nav-text">Discover</span></a></li>
                    <li><a href="{{route('charts.user')}}" data-pjax-state=""><span class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                            </span><span class="nav-text">Charts</span></a></li>
                    <li><a href="{{route('song.user')}}" data-pjax-state=""><span class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-radio">
                                    <circle cx="12" cy="12" r="2"></circle>
                                    <path d="M16.24 7.76a6 6 0 0 1 0 8.49m-8.48-.01a6 6 0 0 1 0-8.49m11.31-2.82a10 10 0 0 1 0 14.14m-14.14 0a10 10 0 0 1 0-14.14"></path>
                                </svg> </span><span class="nav-text">Songs</span></a></li>
                    <li>
                        <a href="{{route('artists.user')}}" data-pjax-state=""><span class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg> </span><span class="nav-text">Artists</span></a>
                    </li>
                   @if(Auth::guard('cus')->check())
                        <li><a href="{{route('playlist',Auth::guard('cus')->id())}}" data-pjax-state=""><span class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-disc">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg> </span><span class="nav-text">Playlist</span></a></li>
                        <li><a href="{{route('history',Auth::guard('cus')->id())}}" data-pjax-state=""><span class="nav-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-disc">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg> </span><span class="nav-text">History</span></a></li>
                    @endif
                </ul>
            </div>
        </div><!-- sidenav bottom -->
        <div class="no-shrink">
            <div class="nav-fold py-1"><a data-toggle-class="folded" data-target="#aside" class="p-3" data-pjax-state="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </a></div>
        </div>
    </div>
</div>
