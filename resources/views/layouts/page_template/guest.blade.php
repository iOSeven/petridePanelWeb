<div class="wrapper wrapper-full-page ">
    @include('layouts.navbars.navs.guest')
    <div class="full-page register-page section-image" filter-color="yellow" data-image="{{ $backgroundImage }}" style="background-image: url('img/background.jpg'); background-size: cover; align-items: center;">
        @yield('content')
        @include('layouts.footer')
    </div>
</div>
