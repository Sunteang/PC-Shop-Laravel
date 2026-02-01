@extends('layouts.app')

@section('content')
<main class="container">
    <section>
        <div class="mt-16">
            <div class="tex row m-0 p-0 mt-5">
                <div class="col-md col-sm-12">
                    <div class="text-banner mt-4">
                        <h2 class="text-blue-800 font-semibold">About Us</h2>
                        <h5 class="mt-3">We are here to privide you the best product</h5>
                        <p class="mt-3 text-wrap">Welcome to PCSHOP, your trusted partner in technology solutions. Established with a passion for innovation and a commitment to excellence, PCSHOP has been at the forefront of delivering top-tier technology products and services to a diverse clientele.</p>
                    </div>
                </div>
                <div class="col-md d-flex justify-center">
                    <img class="object-fit-cover rounded-sm" id="fixe-img" src="https://dlcdnimgs.asus.com/websites/MY/aboutasus/08SNSNetwork_01.jpg" alt="banner" width="483" height="428">
                </div>
            </div>
        </div>

        <div class="container-fluid pl-3 pr-3 mt-16">
            <!-- Start vision -->
            <h6 class="bg-white px-4 pt-4 pb-2 mt-3 mb-0 vision">
                <i class="fas fa-eye i-style" style="color: #253c95;"></i>
                Vision
            </h6>
            <p class="bg-white px-4 pt-0 pb-4 vision-titles">Empowering People through Accessible Innovation</p>
            <!-- End vision -->

            <!-- Start mission -->
            <h6 class="bg-white px-4 pt-4 pb-2 mt-3 mb-0 mission">
                <i class="fas fa-bullseye i-style" style="color: #253c95;"></i>
                Mission
            </h6>
            <ul class="mission-titles bg-white pl-5 pr-3 pt-0 pb-4">
                <li>PCshop's commitment to delivering quality products,</li>
                <li> fostering innovation, ensuring accessibility,</li>
                <li> and supporting community growth</li>
            </ul>
            <!-- End mission -->

            <!-- Contact -->
            <h4 class="mt-5 pb-3 text-blue-800 uppercase text-center" style="letter-spacing: 2px;">If you have any questions, feel free to contact us.</h4>

            <div class="contact-container bg-white d-flex flex-wrap mb-24 px-2 py-3">
                <div class="contact-information pr-2">
                    <p class="contact-card pl-3 pt-2"><i class="fas fa-map-marker-alt i-style pr-2" style="color: #253c95;"></i><span>No. 24, St. 562, Sangkat Boeung kak I, Khan Toul Kork, Phnom Penh, Cambodia</span></p>
                    <p class="contact-card pl-3"><i class="fa-solid fa-square-phone pr-2" style="color: #253c95;"></i><span>(+855) 88 888 999 | (+855) 12 112 123 | (+855) 96 88 44 256</span></p>
                    <p class="contact-card pl-3"><i class="fab fa-telegram i-style pr-2" style="color: #253c95;"></i><span><a href="https://t.me/many_sin" target="_blank" class="no-underline text-gray-800">Telegram Channel</a></span></p>
                    <p class="contact-card pl-3"><i class="fab fa-facebook i-style pr-2" style="color: #253c95;"></i><span><a href="https://www.facebook.com/" target="_blank" class="no-underline text-gray-800">Facebook</a></span></p>
                    <p class="contact-card pl-3"><i class="fas fa-envelope i-style pr-2" style="color: #253c95;"></i><span><a href="mailto: manysin43@gmail.com" target="_blank" class="no-underline text-gray-800">info.istad@gmail.com</a></span></p>
                    <p class="contact-card pl-3"><i class="fas fa-globe-europe i-style pr-2" style="color: #253c95;"></i><span><a href="http://localhost/pcshop/public/home" target="_blank" class="no-underline text-gray-800">www.istad.co</a></span></p>
                    <p class="contact-card pl-3 mb-2"><i class="fab fa-youtube i-style pr-2" style="color: #253c95;"></i><span><a href="" target="_blank" class="no-underline text-gray-800">YouTube</a></span></p>
                </div>
            </div>
            <!-- End Contact -->
        </div>
</main>
@endsection