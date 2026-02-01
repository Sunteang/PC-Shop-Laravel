<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC-SHOP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8012344db9.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    @include('libraries.styles')
    <style>
        .top-social-links ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .top-social-links li {
            display: inline-block;
            margin-right: 10px;
        }

        .top-social-links a {
            text-decoration: none;
            color: inherit;
        }

        .header-contact-info ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .header-contact-info li {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .iocn-holder {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border: 2px solid #EEEEEE;
            border-radius: 50%;
            margin-right: 15px;
        }

        .iocn-holder i {
            font-size: 12px;
            color: #000;
        }

        .text-holder {
            display: flex;
            flex-direction: column;
        }

        .text-holder h6,
        .text-holder p {
            margin: 0;
        }

        .text-holder h6 {
            font-weight: bold;
        }

        .text-holder p {
            color: #666;
            font-size: 14px;
        }

        .navbar-nav .nav-item {
            margin-right: 20px;
        }

        .btn-search {
            width: 350px;
        }
    </style>
</head>

<body class="bg-gray-100">
    <header>
        <div class="bg-blue-700 p-3">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="text-gray-200 fw-semibold">
                    Welcome to Computer and Repair Shop Service
                </div>
                <div class="top-social-links">
                    <ul>
                        <li><a href="https://www.facebook.com/"><i class="fab fa-facebook text-gray-950"></i></a></li>
                        <li><a href="https://www.twitter.com/"><i class="fab fa-twitter text-gray-950"></i></a></li>
                        <li><a href="https://plus.google.com/"><i class="fab fa-google-plus text-gray-950"></i></a></li>
                        <li><a href="https://www.linkedin.com/"><i class="fab fa-linkedin text-gray-950"></i></a></li>
                        <i class="fa-sharp fa-solid fa-house-heart"></i>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row py-4 align-items-center">
                <!-- Logo Column -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex align-items-center">
                    <a href="{{ url('/home') }}" class="d-flex align-items-center text-decoration-none">
                        <img src="{{ asset('images/logo.png') }}" width="60" height="60" alt="Logo">
                        <h2 class="mb-0 ms-3 fw-bold text-blue-800" style="letter-spacing: 3px;">PCSHOP</h2>
                    </a>
                </div>

                <!-- Contact Info Column -->
                <div class="col-lg-9 col-md-9 col-sm-6 col-12 d-lg-flex d-none align-items-center justify-content-end px-0">
                    <div class="header-contact-info top-social-links">
                        <ul class="list-unstyled mb-0 d-flex flex-wrap justify-content-start">
                            <li class="me-4 mb-0">
                                <div class="iocn-holder"><i class="fa-solid fa-house-chimney"></i></div>
                                <div class="text-holder ms-2">
                                    <h6 class="fw-bold mb-1">321, Breaking Street</h6>
                                    <p class="fs-sm text-black-50">Phnom Penh, Cambodia
                                </div>
                            </li>
                            <li class="me-4 mb-0">
                                <div class="iocn-holder"><i class="fa-solid fa-clock"></i></div>
                                <div class="text-holder ms-2">
                                    <h6 class="fw-bold mb-1">Opening Time</h6>
                                    <p class="fs-sm text-black-50">Mon - Sat: 09.00 to 18.00</p>
                                </div>
                            </li>
                            <li>
                                <div class="iocn-holder"><i class="fa-solid fa-envelope"></i></div>
                                <div class="text-holder ms-2">
                                    <h6 class="fw-bold mb-1">Mail Us</h6>
                                    <p class="fs-sm text-black-50">pcshopcambodia@gmail.com</p>
                                </div>
                            </li>
                            <a href="{{ route('cart.index') }}" class="position-relative py-2 px-2 rounded text-gray-300 no-underline">
                                <i class="fas fa-shopping-cart fa-lg"></i>

                                @if($cartCount > 0)
                                <span class="position-absolute top-2 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $cartCount }}
                                    <span class="visually-hidden">items in cart</span>
                                </span>
                                @endif
                            </a>


                        </ul>
                    </div>

                    <!-- Avatar Column -->
                    <div class="col-lg-1 col-md-3 col-12 d-flex justify-content-end align-items-center mt-3 mt-md-0">
                        <a href="{{ auth()->check() ? url('/account-info') : url('/login') }}">
                            <button type="button"
                                class="d-flex align-items-center justify-content-center bg-white p-1 rounded-circle border shadow-sm"
                                style="width: 42px; height: 42px;">
                                <img class="rounded-circle w-100 h-100 object-fit-cover"
                                    src="{{ auth()->user()->profile_image ?? 'https://i.pinimg.com/736x/dc/09/08/dc0908fabd4cd245bfc1752cc4782a9d.jpg' }}"
                                    alt="User photo">
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <nav class="bg-slate-800 py-3 ">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto container">
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul class="font-medium flex flex-col md:p-0 mb-0 md:flex-row md:space-x-8 rtl:space-x-reverse md:border-0 md:bg-white0 ">
                        <li>
                            <a href="{{url('/home')}}" class="block py-2 px-2 text-gray-300 bg-blue-700 rounded md:bg-transparent font-semibold no-underline" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('computer.index') }}" class="block py-2 px-2 rounded text-gray-300 no-underline">Computer</a>
                        </li>
                        <li>
                            <a href="{{url('/getaccessary')}}" class="block py-2 px-2 rounded text-gray-300 no-underline">Accessory</a>
                        </li>
                        <li>
                            <a href="{{ route('repairservice') }}" class="block py-2 px-2 rounded text-gray-300 no-underline">Repair Service</a>
                        </li>
                        <li>
                            <a href="{{url('/contact')}}" class="block py-2 px-2 rounded text-gray-300 no-underline">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="px-3 d-none d-md-block">
                    <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-md hover:bg-gray-100 focus:ring-4 focus:outline-none  focus:ring-gray-50 " type="button">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div id="dropdownDotsHorizontal" class="z-10 hidden bg-gray-50 divide-y divide-gray-100 rounded-md w-28 ">
                        <ul class=" text-sm text-gray-700 ps-2 pt-2.5 font-bold" aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                @auth
                                @if(Auth::user()->role == 'admin')
                                <a href="{{ url('/dashboard-admin') }}" class="block px-4 no-underline">Admin</a>
                                @else
                                <a href="{{ url('/admin/login') }}" class="block px-4 no-underline">Admin</a>
                                @endif
                                @else
                                <a href="{{ url('/admin/login') }}" class="block px-4 no-underline">Admin</a>
                                @endauth
                            </li>
                            <!-- <li>
                                <a href="{{ url('/login') }}" class="block px-4 py-2 no-underline font-bold">User</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="">
        @yield('content')
    </main>

    <div class="bg-gray-900">
        <div class="container">
            <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 border-top ">
                <div class="col col-md-4">
                    <a href="{{ url('/home') }}" class="d-flex align-items-center mb-3 link-dark text-decoration-none ms-3">
                        <div class="bg-white rounded-full h-24 w-24 flex items-center justify-center">
                            <img src="{{ asset('images/logo.png') }}" class="h-14 me-1.5" alt="Logo" />
                        </div>
                    </a>
                    <h3 class="mb-0 mt-1.5 font-bold text-white" style="letter-spacing: 3px;">PCSHOP</h3>
                    <p class="text-white mt-2 ms-4" style="letter-spacing: 3px;">© 2024</p>
                </div>

                <div class="col col-md-4">
                    <h5 class="text-blue-600 pb-3 font-bold uppercase" style="letter-spacing: 1.5px;">Menu</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="{{ url('/home') }}" class="nav-link p-0 text-white">Home</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('computer.index') }}" class="nav-link p-0 text-white">Computer</a></li>
                        <li class="nav-item mb-2"><a href="{{ url('/getaccessary') }}" class="nav-link p-0 text-white">Accessory</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('repairservice') }}" class="nav-link p-0 text-white">Service</a></li>
                        <li class="nav-item mb-2"><a href="{{ url('/contact') }}" class="nav-link p-0 text-white">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col col-md-4">
                    <h5 class="text-blue-600 pb-3 font-bold uppercase" style="letter-spacing: 1.5px;">Social</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white"><i class="fab fa-facebook me-3"></i>Facebook</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white"><i class="fab fa-twitter me-3"></i>Twitter</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white"><i class="fa-brands fa-square-instagram me-3"></i>Instagram</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white"><i class="fa-brands fa-linkedin me-3"></i>Linkedin</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white"><i class="fa-brands fa-youtube me-3"></i>YouTube</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/1hb0b8waZ5Cx8vZAXq5SQ3+5tKDI87CKBIiKJn" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>