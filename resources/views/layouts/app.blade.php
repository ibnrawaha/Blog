@include ('inc.header')


    @include('inc.nav')

    
    <header class="masthead">
        @yield('header')
    </header>

    @if (Route::currentRouteName() == "home")
        @include('inc.message')
        @yield('content')
    @else
    
    <div id="app">
        <div class="container">
            @include('inc.message')
            @yield('content')
            <div class="spacer"></div>
        </div>
    </div>
    
    @endif

   



@include ('inc.footer')
