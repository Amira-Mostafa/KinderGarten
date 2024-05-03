<!DOCTYPE html>
<html lang="en">

    @include('includes.head')


<body>
    <div class="container-xxl bg-white p-0">
    @include('includes.adminNav')



    @yield('content')




    @include('includes.Footer')
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    @include('includes.jsFooter')

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
