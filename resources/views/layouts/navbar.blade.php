<div class="app-header header">
    <div class="container-fluid">
        <div class="d-flex">
            <a class="header-brand" href="{{ env('APP_URL') }}">
                <img src="{{asset('favicon.png')}}"
                     class="header-brand-img desktop-lgo" height="36px" alt="Dayonelogo">
                <img src="{{asset('favicon.png')}}"
                     class="header-brand-img dark-logo" alt="Dayonelogo">
                <img src="{{asset('favicon.png')}}" height="36px"
                     class="header-brand-img mobile-logo" alt="Dayonelogo">
                <img src="{{asset('favicon.png')}}"
                     class="header-brand-img darkmobile-logo" alt="Dayonelogo">
            </a>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#">
                    <i class="feather feather-menu"></i>
                </a>
                <a class="close-toggle" href="#">
                    <i class="feather feather-x"></i>
                </a>
            </div>
{{--            <div class="mt-0">--}}
{{--                <form class="form-inline">--}}
{{--                    <div class="search-element">--}}
{{--                        <input type="search" class="form-control header-search" placeholder="جستجو..."--}}
{{--                               aria-label="Search" tabindex="1">--}}
{{--                        <button class="btn btn-primary-color">--}}
{{--                            <i class="feather feather-search"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
            <!-- SEARCH -->
            <div class="d-flex order-lg-2 my-auto mr-auto">
                <a class="nav-link my-auto icon p-0 nav-link-lg d-md-none navsearch" href="#"
                   data-toggle="search">
                    <i class="feather feather-search search-icon header-icon"></i>
                </a>
                <div class="dropdown header-fullscreen">
                    <a class="nav-link icon full-screen-link">
                        <i class="feather feather-maximize fullscreen-button fullscreen header-icons"></i>
                        <i class="feather feather-minimize fullscreen-button exit-fullscreen header-icons"></i>
                    </a>
                </div>
                <div class="dropdown profile-dropdown">
                    <a href="{{ env('APP_URL') }}" class="nav-link pr-1 pl-0 leading-none" data-toggle="dropdown">
												<span>
													<img src="{{asset('assets/images/users/16.jpg')}}" alt="img"
                                                         class="avatar avatar-md bradius">
												</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow animated">
                        <div class="p-3 text-center border-bottom">
{{--                            <a href="#" class="text-center user pb-0 font-weight-bold">{{auth()->user()->name}} <span style="font-weight: initial">عزیز</span></a>--}}
                            <p class="text-center user-semi-title" style="margin-top: 10px;">خوش آمدید!</p>
                        </div>

                        <a class="dropdown-item d-flex" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="feather feather-power ml-3 fs-16 my-auto"></i>
                            <div class="mt-1">خروج</div>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
