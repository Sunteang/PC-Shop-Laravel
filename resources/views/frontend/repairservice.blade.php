@extends('layouts.app')
@section('content')

<!-- Hero Section -->
<section>
    <img src="{{ asset('images/3.png') }}" class="img-fluid h-96 w-full object-cover d-none d-md-block" alt="Test Image">
    <div class="carousel-caption text-start position-absolute top-50 start-50 translate-middle-y ms-36">
        <div class="mt-40">
            <h1 class="font-bold text-white text-center">Repair Service</h1>
            <h5 class="text-md md:text-base mt-4 text-gray-200 text-center"> We offer fast, reliable, and affordable repair solutions for all types of computers, laptops, tablets, and mobile devices.
            </h5>
            <div class="d-flex justify-center">
                <a href="#booking">
                    <button type="button" class="text-gray-700 mt-4 bg-white focus:ring-4 focus:ring-blue-300 rounded-lg text-md px-4 py-2.5 me-2 font-bold" style="letter-spacing: 1.5px;">
                        <h6 class="mb-0 pb-0.5">Get Service</h6>
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services Offered -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-blue-700">Our Repair Services</h2>
        <hr>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-8">
            <!-- Service 1 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition-shadow duration-300">
                <div class="text-blue-600 text-4xl mb-4 flex justify-center">
                    <i class="fa-solid fa-laptop"></i>
                </div>
                <h3 class="text-xl font-semibold text-center mb-3">Laptop Repair</h3>
                <p class="text-gray-600 text-center">
                    Screen replacement, keyboard issues, overheating, battery problems, and more.
                </p>
            </div>
            <!-- Service 2 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition-shadow duration-300">
                <div class="text-blue-600 text-4xl mb-4 flex justify-center">
                    <i class="fa-solid fa-desktop"></i>
                </div>
                <h3 class="text-xl font-semibold text-center mb-3">Desktop Repair</h3>
                <p class="text-gray-600 text-center">
                    Hardware troubleshooting, software issues, virus removal, and system upgrades.
                </p>
            </div>
            <!-- Service 3 -->
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition-shadow duration-300">
                <div class="text-blue-600 text-4xl mb-4 flex justify-center">
                    <i class="fa-solid fa-mobile-screen-button"></i>
                </div>
                <h3 class="text-xl font-semibold text-center mb-3">Mobile Repair</h3>
                <p class="text-gray-600 text-center">
                    Cracked screen, charging port issues, water damage, and performance optimization.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-blue-700">Why Choose Our Repair Service?</h2>
        <hr>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-8">
            <div class="flex items-start space-x-4">
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fa-solid fa-clock text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-lg">Fast Turnaround</h4>
                    <p class="text-gray-600">Most repairs completed within 24–48 hours.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4">
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fa-solid fa-shield-halved text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-lg">Warranty Guaranteed</h4>
                    <p class="text-gray-600">All repairs come with a 6-month warranty.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4">
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fa-solid fa-user-gear text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-lg">Expert Technicians</h4>
                    <p class="text-gray-600">Certified professionals handling every device with care.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4">
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fa-solid fa-dollar-sign text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-lg">Affordable Pricing</h4>
                    <p class="text-gray-600">Transparent pricing with no hidden fees.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials / Trust Section -->
<section class="py-10 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-blue-700">What Our Customers Say</h2>
        <hr>

        <!-- Carousel Wrapper -->
        <div id="testimonialCarousel" class="carousel slide" data-bs-interval="5000" data-bs-wrap="true" data-bs-ride="carousel">
            <div class="carousel-inner relative w-full overflow-hidden p-4">

                <!-- Slide Group 1 -->
                <div class="carousel-item active">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-white p-6 rounded-lg shadow">
                            <p class="text-gray-600 italic">"I had my laptop repaired here and it was done quickly and professionally."</p>
                            <div class="mt-4 font-semibold text-blue-700">— Sunteang SEREY.</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <p class="text-gray-600 italic">"Excellent customer service and very knowledgeable staff."</p>
                            <div class="mt-4 font-semibold text-blue-700">— Proseth LANG.</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <p class="text-gray-600 italic">"Fair pricing and they explained everything clearly."</p>
                            <div class="mt-4 font-semibold text-blue-700">— MRR. Pheakna</div>
                        </div>
                    </div>
                </div>

                <!-- Slide Group 2 -->
                <div class="carousel-item">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-white p-6 rounded-lg shadow">
                            <p class="text-gray-600 italic">"They fixed my broken screen in less than 24 hours!"</p>
                            <div class="mt-4 font-semibold text-blue-700">— Many SIN.</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <p class="text-gray-600 italic">"Fast and reliable repair service. I'm impressed!"</p>
                            <div class="mt-4 font-semibold text-blue-700">— Samphorsvatta KANG.</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <p class="text-gray-600 italic">"Very polite and helpful staff. Highly recommended."</p>
                            <div class="mt-4 font-semibold text-blue-700">— Anonymous.</div>
                        </div>
                    </div>
                </div>

                <!-- Slide Group 3 -->
                <div class="carousel-item">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-white p-6 rounded-lg shadow">
                            <p class="text-gray-600 italic">"They gave me a fair quote and did the job well."</p>
                            <div class="mt-4 font-semibold text-blue-700">— Anonymous.</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <p class="text-gray-600 italic">"Saved my laptop from water damage – thank you so much!"</p>
                            <div class="mt-4 font-semibold text-blue-700">— Anonymous.</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <p class="text-gray-600 italic">"Warranty included and no hidden charges. Great service."</p>
                            <div class="mt-4 font-semibold text-blue-700">— Anonymous.</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section id="booking" class="bg-blue-200 py-16">
    <div class="container mx-auto px-4 text-center mb-24">
        <h2 class="text-3xl font-bold text-blue-700">Ready to Get Your Device Repaired?</h2>
        <p class="text-lg mb-8 max-w-2xl mx-auto mt-8">
            Fill out our quick booking form or bring your device in today and let us fix it for you.
        </p>
        <a href="{{ route('repair.booking') }}">
            <button class="text-gray-700 mt-4 bg-white focus:ring-4 focus:ring-blue-300 rounded-lg text-md px-4 py-2.5 me-2 font-bold" style="letter-spacing: 1.5px;">
                Book a Repair
            </button>
        </a>
    </div>
    <hr>
</section>

<!-- Track Repair Section -->
<section class="bg-blue-200 pb-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-blue-700">Already Booked a Repair?</h2>
        <p class="text-gray-700 text-lg mb-8 max-w-2xl mx-auto mt-8">
            You can track the progress of your device repair easily using your tracking ID.
        </p>
        <a href="{{ route('repair.track') }}">
            <button class="text-gray-700 mt-4 bg-white focus:ring-4 focus:ring-blue-300 rounded-lg text-md px-4 py-2.5 me-2 font-bold">
                Track Your Repair
            </button>
        </a>
    </div>
</section>


@endsection