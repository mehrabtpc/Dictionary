<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="#">
            <img src="{{ auth()->user()->image }}" class="header-brand-img desktop-lgo" height="48px" width="48px" alt="english" style="border-radius: 100px">
            <img src="{{ auth()->user()->image }}" class="header-brand-img dark-logo" height="48px" width="48px" alt="english" style="border-radius: 100px">
            <img src="{{ auth()->user()->image }}" class="header-brand-img mobile-logo" height="48px" width="48px" alt="english" style="border-radius: 100px">
            <img src="{{ auth()->user()->image }}" class="header-brand-img darkmobile-logo" height="36px" width="36px" alt="english" style="border-radius: 100px">
        </a>
    </div>
    <div class="app-sidebar3">
        <ul class="side-menu">
            <li class="side-item side-item-category mt-4">English</li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ route('panel-dictionaries.index') }}">
                    <i class="fa-solid fa-chart-area sidemenu_icon"></i>
                    <span class="side-menu__label">Dictionaries</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
