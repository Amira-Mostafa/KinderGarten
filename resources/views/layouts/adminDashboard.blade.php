<!DOCTYPE html>
<html lang="en">

@include('includes.head')


<body>

    <div class="container-xxl bg-white p-0">
        @include('includes.navBar')
        <div class="row">


            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    @include('includes.adminSidebar')
                </div>
            </div>
            <div class="col-md-8 right_col">
                <div class="right_col scroll-view">
                    @yield('content')
                </div>
            </div>

        </div>
        @include('includes.Footer')
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    @include('includes.jsFooter')

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>