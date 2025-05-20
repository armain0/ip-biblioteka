<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ url('/home') }}" style="margin-right: 300px;">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ url('/home') }}">Početna</a></li>
                        <li><a href="{{ url('/explore') }}">Istraži</a></li>

                        @if (Route::has('login'))
                            @auth
                                <li>
                                    <a href="{{ url('book_history') }}">Istorija posudbi</a>
                                </li>

                                <x-app-layout>
                                </x-app-layout>
                            @else
                                <li><a href="{{ route('login') }}">Uloguj se</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Registruj se</a></li>
                                @endif
                            @endauth
                        @endif



                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
