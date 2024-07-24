<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
    <a href="{{ route('home') }}" class="navbar-brand">
        <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>Kider</h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
            <a href="{{ route('home') }}" class="nav-item nav-link active">{{__('nav.Home')}}</a>
            <a href="{{ route('aboutUs') }}" class="nav-item nav-link">{{__('nav.About us')}}</a>
            <a href="{{ route('ourClasses') }}" class="nav-item nav-link">{{__('nav.Classes')}}</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{__('nav.Pages')}}</a>
                <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                    <a href="{{ route('facilities') }}" class="dropdown-item">{{__('nav.School Facilities')}}</a>
                    <a href="{{ route('team') }}" class="dropdown-item">{{__('nav.Popular Teachers')}}</a>
                    <a href="{{ route('callToAction') }}" class="dropdown-item">{{__('nav.Become A Teacher')}}</a>
                    <a href="{{ route('appointment') }}" class="dropdown-item">{{__('nav.Make Appointment')}}</a>
                    <a href="{{ route('testimonial') }}" class="dropdown-item">{{__('nav.Testimonial')}}</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="{{ route('teachers') }}" class="nav-item nav-link">Dashboard</a>
            </div>


        </div>
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>

        <div class="ml-auto  d-flex navbar-nav px-4">
            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English / </a>
            <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"> Arablic</a>
        </div>
    </div>
</nav>


<!-- Navbar Start -->


<script>
    anchors = Array.from(document.getElementsByClassName("nav-item nav-link"))

    anchors.forEach(function(anchor) {
        if (anchor.href === window.location.href) {
            anchor.className = "nav-item nav-link active"
        } else {
            anchor.className = "nav-item nav-link"
        }
    })
</script>