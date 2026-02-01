@extends('admin')
@section('content')
<div class="bg-blue-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 ">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-blue-800 md:text-2xl flex justify-center">
                    Admin Login
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('admin.check') }}" method="POST">
                    {!! csrf_field() !!}
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                        <input type="text" placeholder="Username" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                    </div>
                    <div class="mb-2">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                    </div>

                    <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-4 text-center bg-blue-600">Sign in</button>
                </form>
                <div class="flex justify-between">
                    <!-- <p class="text-sm font-light text-gray-5000">
                        Don't have an account yet?
                        <a href="{{ route('admin.register') }}" class="font-medium text-primary-600 no-underline hover:underline">Sign up</a>
                    </p> -->
                    <a href="{{url('/')}}" class="me-1 font-medium">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop