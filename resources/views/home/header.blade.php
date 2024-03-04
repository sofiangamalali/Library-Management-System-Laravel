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
                    <a href="/" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="/" class="active">Home</a></li>

                      
                            @auth
                            @if(auth()->user()->usertype === 'admin')
                            <li><a href="{{ route('home') }}">Dashboard</a></li>
                            @endif
                            <x-app-layout>
                            </x-app-layout>
                            @else
                            <li><a href="{{ route('login') }}"> Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @endauth
                        </div>
                       
                    </ul>
    
                    <!-- ***** Menu End ***** -->
                </nav>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
