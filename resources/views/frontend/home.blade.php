@extends('layouts.app')

@section('content')
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/slide1.png') }}" class="img-fluid h-96 w-full object-cover d-none d-md-block" alt="Test Image">
            <div class="carousel-caption text-start position-absolute top-50 start-20 translate-middle-y">
                <div class="">
                    <h1 class="font-bold text-gray-100">Computer</h1>
                    <h5 class="text-md md:text-base mt-4 text-gray-200">We have many kinds of computers for customers.
                        <br>
                        We will always provide the best products and ensure
                        <br>
                        that the customer will be satisfied with us.
                    </h5>
                    <a href="{{ url('/computer') }}">
                        <button type="button" class="text-gray-700 mt-4 bg-white focus:ring-4 focus:ring-blue-300 rounded-lg text-md px-4 py-2.5 me-2 font-bold" style="letter-spacing: 1.5px;">
                            <h6 class="mb-0 pb-0.5">Buy Now</h6>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/slide2.png') }}" class="img-fluid h-full w-full object-cover d-none d-md-block" alt="Test Image">
            <div class="carousel-caption text-center position-absolute top-50 start-50 translate-middle">
                <div class="">
                    <h1 class="font-bold  text-white">Laptop</h1>
                    <h5 class="text-md md:text-base mt-4 text-gray-200">Our shop has many brand of laptop.
                        <br>
                        Customers feel free to see and choose to buy any laptop.
                        <br>
                        We are guaranteed that our product are the best for you.
                    </h5>
                    <a href="{{ url('/computer') }}">
                        <button type="button" class="text-gray-700 mt-4 bg-white focus:ring-4 focus:ring-blue-300 rounded-lg text-md px-4 py-2.5 me-2 font-bold" style="letter-spacing: 1.5px;">
                            <h6 class="mb-0 pb-0.5">See More</h6>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/3.png') }}" class="img-fluid h-96 w-full object-cover d-none d-md-block" alt="Test Image">
            <div class="carousel-caption text-start position-absolute top-50 start-50 translate-middle-y ms-36">
                <div class="">
                    <h1 class="font-bold text-white text-center">Repair Service</h1>
                    <h5 class="text-md md:text-base mt-4 text-gray-200 text-center">We have many kinds of computers for customers.
                        <br>
                        We will always provide the best products and ensure
                        <br>
                        that the customer will be satisfied with us.
                    </h5>
                    <div class="d-flex justify-center">
                        <a href="{{ route('repairservice') }}">
                            <button type="button" class="text-gray-700 mt-4 bg-white focus:ring-4 focus:ring-blue-300 rounded-lg text-md px-4 py-2.5 me-2 font-bold" style="letter-spacing: 1.5px;">
                                <h6 class="mb-0 pb-0.5">Get Service</h6>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev d-none d-md-block" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next d-none d-md-block" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container px-4 mt-16" id="featured-3">
    <h2 class="font-bold uppercase text-blue-700 text-center">Services</h2>
    <hr>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="feature col">
            <div class="d-flex justify-center">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 h-16 w-16 rounded-full">
                    <i class="fa-solid fa-desktop"></i>
                </div>
            </div>
            <h4 class="mt-3 font-semibold text-center">Sell Computer</h4>
            <p class="font-semibold text-gray-600 mt-2 text-center">PCSHOP has many kind of computers from the top countries around the world. We will provide the best product for customers. Make customers feeling safe.</p>
        </div>
        <div class="feature col">
            <div class="d-flex justify-center">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 h-16 w-16 rounded-full">
                    <i class="fa-solid fa-keyboard"></i>
                </div>
            </div>
            <h4 class="mt-3 font-semibold text-center">Sell Accessory</h4>
            <p class="font-semibold text-gray-600 mt-2 text-center">Our shop also sell a lot of accessory of any tech. We have many things that cutosmers. We also provide for free if any customer buy computer from our shop.</p>
        </div>
        <div class="feature col">
            <div class="d-flex justify-center">
                <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 h-16 w-16 rounded-full">
                    <i class="fa-solid fa-toolbox"></i>
                </div>
            </div>
            <h4 class="mt-3 font-semibold text-center">Repair Service</h4>
            <p class="font-semibold text-gray-600 mt-2 text-center">Not only selling computer and accessory of texh, we also have the repair service for computer, phone for the customers. We will make the customers feel safety.</p>
        </div>
    </div>
</div>

<div class="container mt-4">
    <h2 class="font-bold uppercase text-blue-700 text-center">Products</h2>
    <hr>
    <div class="grid gap-4 pt-12">
        <div class="grid grid-cols-1 sm:grid-cols-5 gap-4">
            <div class="shadow rounded-lg h-56">
                <img class="h-56 w-full object-cover rounded-lg" src="https://cdn.arstechnica.net/wp-content/uploads/2023/06/IMG_1134.jpeg" alt="">
            </div>
            <div class="shadow rounded-lg h-56">
                <img class="h-56 w-full object-cover rounded-lg" src="https://www.stuff.tv/wp-content/uploads/sites/2/2023/01/macbook-pro-2023-15.jpg?w=1080" alt="">
            </div>
            <div class="shadow rounded-lg h-56">
                <img class="h-56 w-full object-cover rounded-lg" src="https://cdn.thewirecutter.com/wp-content/media/2021/10/usbcaccessories-2048px-6690-3x2-1.jpg?auto=webp&quality=75&crop=3:2&width=1024" alt="">
            </div>
            <div class="shadow rounded-lg h-56">
                <img class="h-56 w-full object-cover rounded-lg" src="https://www.laserprintsoluciones.com/wp-content/uploads/2022/08/X512JA-211VBGB.png" alt="">
            </div>
            <div class="shadow rounded-lg h-56">
                <img class="h-56 w-full object-cover rounded-lg" src="https://playstoreopal.com/wp-content/uploads/2022/03/Razer-Blackwidow-V3-Pro-2.png" alt="">
            </div>
        </div>
    </div>
    <div class="grid gap-4 mt-4 ">
        <div class="grid grid-cols-1 sm:grid-cols-5 gap-4">
            <div class="shadow rounded-lg h-56">
                <img class="h-56 w-full object-cover rounded-lg" src="https://comstream.com.ng/wp-content/uploads/2021/07/Havit-HV-MS989GT.jpeg" alt="">
            </div>
            <div class="shadow rounded-lg h-56">
                <img class="h-56 w-full object-cover rounded-lg" src="https://shared.cdn.smp.schibsted.com/v2/images/d1054ee4-4eda-4154-9eb7-5e3cbc7f6839?fit=crop&format=auto&h=900&w=1600&s=f63ef693254e35a95a5e0f1a3dd7bb98c5667118" alt="">
            </div>
            <div class="shadow rounded-lg h-56">
                <img class="h-56 w-full object-cover rounded-lg" src="https://static.wixstatic.com/media/bc8b94_4d54dc8af0134464991274166c88797b~mv2.jpg/v1/fill/w_480,h_480,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/bc8b94_4d54dc8af0134464991274166c88797b~mv2.jpg" alt="">
            </div>
            <div class="shadow rounded-lg h-56">
                <img class="h-56 w-full object-cover rounded-lg" src="https://i5.walmartimages.com/asr/5811ca09-1490-4583-97a0-96f7ffd03b91.c8006f5a7b7fd506660bd1e04a20eb07.jpeg?odnHeight=450&odnWidth=450&odnBg=ffffff" alt="">
            </div>
            <div class="shadow rounded-lg h-56">
                <img class="h-56 w-full object-cover rounded-lg" src="https://i.gadgets360cdn.com/large/microsoft_surface_pro11_1716279928677.jpg" alt="">
            </div>
        </div>
    </div>
</div>
<div class=" py-8 bg-blue-200  mt-24">
    <h2 class="font-bold uppercase text-blue-700 text-center mt-4 pt-2">Activities</h2>
    <div class="container">
        <div class="row featurette">
            <div class="col-md-7 d-flex items-center">
                <div class="p-5">
                    <h2 class="featurette-heading fw-normal lh-1">Laptop for students or worker</h2>
                    <p class="lead">New products for any customers who need for their work or study. <br>These computer are the best for you.</p>
                </div>
            </div>
            <div class="col-md-5 d-flex justify-end p-5">
                <img class="rounded-sm" src="https://imageio.forbes.com/specials-images/imageserve/637bb9866b6bba454c817eea/Economic-Photo-Illustrations/960x0.jpg?height=474&width=711&fit=bounds">
            </div>
        </div>
        <div class="row featurette mt-5 p-5">
            <div class="col-md-5">
                <img class="rounded-sm" src="https://christiantechcenter.com/wp-content/uploads/2022/07/IMG-4760-2.jpg">
            </div>
            <div class="col-md-7 d-flex items-center">
                <div class="p-5">
                    <h2 class="featurette-heading fw-normal lh-1">Repairing Compurer</h2>
                    <p class="lead">We are will always give a good reqairing for the customers.</p>
                </div>
            </div>
        </div>
        <div class="row featurette">
            <div class="col-md-7 d-flex items-center">
                <div class="p-5">
                    <h2 class="featurette-heading fw-normal lh-1">Best Collection for Customers</h2>
                    <p class="lead">When any customers would to buy a set of the collection, we always have a special promotion for them.</p>
                </div>
            </div>
            <div class="col-md-5 d-flex justify-end p-5">
                <img class="rounded-sm" src="https://st2.depositphotos.com/1177973/11412/i/450/depositphotos_114127578-stock-photo-laptop-phone-photos-and-cup.jpg">
            </div>
        </div>
    </div>
</div>

@endsection