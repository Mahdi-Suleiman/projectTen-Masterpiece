<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Optics-Center Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0" id="app">
        <!-- Spinner Start -->
        {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light" id="navbar">
                <a href="{{ route('admin.index') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Optics Center</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">

                    <div class="ms-3">
                        <span class="badge bg-primary">admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('admin.index') }}" class="nav-item nav-link active"><i
                            class="fas fa-calendar-check me-2"></i>Orders</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fas fa-users me-2"></i>Users</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.users') }}" class="nav-item nav-link">Show Users</a>
                            <a href="{{ route('admin.users.add') }}" class="nav-item nav-link">Add user</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-table me-2"></i>Categories</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.categories.index') }}" class="nav-item nav-link">Show
                                Categories</a>
                            <a href="{{ route('admin.categories.create') }}" class="nav-item nav-link">Add
                                Category</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-table me-2"></i>Products</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.products.index') }}" class="nav-item nav-link">Show
                                Products</a>
                            <a href="{{ route('admin.products.create') }}" class="nav-item nav-link">Add
                                Product</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa fa-table me-2"></i>Rooms</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('admin.rooms.index') }}" class="nav-item nav-link">Show
                                Rooms</a>
                            <a href="{{ route('admin.rooms.create') }}" class="nav-item nav-link">Add
                                Room</a>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </nav>
            <!-- Navbar End -->

            @yield('content')

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="{{ URL::to('/admin/dashboard') }}">Optics center</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> --}}
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('admin/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('admin/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
</body>

</html>


<script>
    // Add active class to the current button (highlight it)
    const header = document.getElementById("navbar");
    const btns = header.getElementsByClassName("nav-link");
    for (let i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            const current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>
