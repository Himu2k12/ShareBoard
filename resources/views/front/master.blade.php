@include('front.includes.header')

@include('front.includes.nav-bar')

<main>
    <div class="container">
        <div class="row">
    @yield('content')
        </div>
    </div> <!-- end of /.container -->
</main>

@include('front.includes.footer')