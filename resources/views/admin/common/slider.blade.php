<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar ps">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu metismenu">
                <li class="app-sidebar__heading">Menu</li>

                <li class="mm-active">
                    <a href="#" aria-expanded="true">
                        <i class="metismenu-icon pe-7s-plugin"></i>Music Manager
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul class="mm-collapse mm-show">
                        <li>
                            <a href="{{route('dashboard')}}" class="">
                                <i class="metismenu-icon"></i>Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user.index')}}" >
                                <i class="metismenu-icon"></i>User
                            </a>
                        </li>
                        <li>
                            <a href="{{route('genre.index')}}">
                                <i class="metismenu-icon"></i>Genres
                            </a>
                        </li>
                        <li>
                            <a href="{{route('singer.index')}}">
                                <i class="metismenu-icon"></i>Singer
                            </a>
                        </li>
                        <li>
                            <a href="{{route('album.index')}}">
                                <i class="metismenu-icon"></i>Album
                            </a>
                        </li>
                        <li>
                            <a href="{{route('song.index')}}">
                                <i class="metismenu-icon"></i>Song
                            </a>
                        </li>
                        <li>
                            <a href="{{route('transaction.index')}}">
                                <i class="metismenu-icon"></i>Transaction
                            </a>
                        </li>
                        <li>
                            <a href="{{route('logout')}}">
                                <i class="metismenu-icon"></i><strong>Logout</strong>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
</div>
