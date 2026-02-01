<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC-SHOP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8012344db9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    @include('libraries.styles')
</head>

<body>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <a href="{{url('/home')}}" class="flex ms-2 md:me-24 no-underline">
                        <span class="self-center text-xl sm:text-2xl mt-0.5 ms-4 ps-2 text-blue-800 font-bold" style="letter-spacing: 3px;">PCSHOP</span>
                    </a>
                </div>
                <div class="relative ms-3">
                    <!-- Avatar Button -->
                    <button type="button"
                        class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        aria-expanded="false"
                        data-dropdown-toggle="dropdown-user">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-9 h-9 rounded-full border border-gray-300 shadow-sm"
                            src="{{ auth()->user()->profile_image ?? 'https://i.pinimg.com/736x/71/5c/9f/715c9f198dea9567698f90c366eaf636.jpg' }}"
                            alt="User photo">
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdown-user"
                        class="absolute right-0 z-50 hidden mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg divide-y divide-gray-100">

                        <!-- User Info -->
                        <div class="px-4 py-3">
                            @if(auth()->check())
                            <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                            <p class="text-sm text-gray-500 truncate">{{ auth()->user()->email }}</p>
                            @else
                            <p class="text-sm font-medium text-gray-900">Guest</p>
                            <p class="text-sm text-gray-500 truncate">guest@example.com</p>
                            @endif
                        </div>

                        <!-- Menu Items -->
                        <div class="py-2">
                            @if(auth()->check())
                            <form action="{{ route('admin.logout') }}" method="POST" id="logout-form">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-800 font-medium transition">
                                    Logout
                                </button>
                            </form>
                            @else
                            <a href="{{ route('login') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                Login
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 " aria-label="Sidebar">
        <a href="{{ route('dashboard')}}" class="no-underline text-white">
            <h5 class="ps-14 py-3 mt-0  text-gray-800">Dashboard</h5>
        </a>
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white ">
            <ul class="space-y-2 font-medium">

                <!-- Computer -->
                <li>
                    <a href="{{ url('/dashboard-admin/computer') }}"
                        class="flex items-center p-2 rounded-lg no-underline {{ request()->is('dashboard-admin/computer') ? 'bg-blue-200 text-blue-800' : 'text-gray-900 hover:bg-gray-100' }}">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Computer</span>
                    </a>
                </li>

                <!-- Accessory -->
                <li>
                    <a href="{{ url('/dashboard-admin/accessary') }}"
                        class="flex items-center p-2 rounded-lg no-underline {{ request()->is('dashboard-admin/accessary') ? 'bg-blue-200 text-blue-800' : 'text-gray-900 hover:bg-gray-100' }}">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Accessory</span>
                    </a>
                </li>


                <!-- Repair Request -->
                <li>
                    <a href="{{ url('/dashboard-admin/repairrequest') }}"
                        class="flex items-center p-2 rounded-lg no-underline {{ request()->is('dashboard-admin/repairrequest') ? 'bg-blue-100 text-blue-800' : 'text-gray-900 hover:bg-gray-100' }}">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75  group-hover:text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Service</span>
                    </a>
                </li>

                <!-- Orders -->
                <li>
                    <a href="{{ url('/dashboard-admin/orders') }}"
                        class="flex items-center p-2 rounded-lg no-underline {{ request()->is('dashboard-admin/orders') ? 'bg-blue-200 text-blue-800' : 'text-gray-900 hover:bg-gray-100' }}">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path d="M6 2a1 1 0 0 0-1 1v1H4a1 1 0 0 0 0 2h1v2H4a1 1 0 0 0 0 2h1v2H4a1 1 0 0 0 0 2h1v1a1 1 0 1 0 2 0v-1h8v1a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-2h1a1 1 0 1 0 0-2h-1V6h1a1 1 0 1 0 0-2h-1V3a1 1 0 0 0-1-1H6Zm1 2h6v2H7V4Zm0 4h6v2H7V8Zm0 4h6v2H7v-2Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Orders</span>
                    </a>
                </li>

                <!-- Customers -->
                <li>
                    <a href="{{ url('/dashboard-admin/customers') }}"
                        class="flex items-center p-2 rounded-lg no-underline {{ request()->is('dashboard-admin/customers') ? 'bg-blue-200 text-blue-800' : 'text-gray-900 hover:bg-gray-100' }}">
                        <i class="fa-solid fa-users w-5 text-gray-500"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Customers</span>
                    </a>
                </li>

                <!-- Payments -->
                <li>
                    <a href="{{ url('/dashboard-admin/payments') }}"
                        class="flex items-center p-2 rounded-lg no-underline {{ request()->is('dashboard-admin/payments') ? 'bg-blue-200 text-blue-800' : 'text-gray-900 hover:bg-gray-100' }}">
                        <i class="fa-solid fa-credit-card w-5 text-gray-500"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Payments</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>

    @yield('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>