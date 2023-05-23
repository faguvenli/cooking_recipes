<header>
    <div class="container-sm position-relative">
        <a href="javascript:void(0);" class="hamburger_btn slide-menu__control d-lg-none" data-target="slide-menu" data-action="toggle" type="button"><span></span></a>

        <nav class="top-menu">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="#" alt="Yemek Tarifleri Logo" class="img-fluid">
                </a>
            </div>
            <div class="links d-none d-lg-inline-block">
                <ul>
                    <li @if(request()->routeIs('home'))class="active"@endif><a href="{{ route('home') }}">ANASAYFA</a></li>
                    <li><a href="#">LINK</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <div class="overlay d-none"></div>
    <nav class="slide-menu" id="slide-menu">
        <ul class="mt-5">
            <li @if(request()->routeIs('home'))class="active"@endif><a href="{{ route('home') }}">ANASAYFA</a></li>
            <li><a href="#">LINK</a></li>
        </ul>
    </nav>
</header>
