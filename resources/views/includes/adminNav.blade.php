
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
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('classes') }}" class="nav-item nav-link">Classes</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                                <a href="{{ route('facilities') }}" class="dropdown-item">School Facilities</a>
                                <a href="{{ route('team') }}" class="dropdown-item">Popular Teachers</a>
                                <a href="{{ route('callToAction') }}" class="dropdown-item">Become A Teachers</a>
                                <a href="{{ route('testimonial') }}" class="dropdown-item">Testimonial</a>
                            </div>
                    </div>


                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre="">
                                        admin   
                                    </a>
                                    <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                                            @csrf
                                        </form>                                    
                                    </div>
                                </li>                       
                        </ul>
                    </div>

                </div>
           </div>
        </nav> 
                 <!-- Navbar Start -->


<script>
    anchors = Array.from(document.getElementsByClassName("nav-item nav-link"))

    anchors.forEach(function (anchor) {
        if (anchor.href === window.location.href) {
            anchor.className = "nav-item nav-link active"
        } else {
            anchor.className = "nav-item nav-link"
        }
    })

</script>

       

<!-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                                            @csrf
                                        </form>                                    
                                    </div> -->