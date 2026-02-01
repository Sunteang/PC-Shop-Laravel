@extends('admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>

                <div class="card-body">
                    You are logged in as a User!
                </div>

                <div class="card-body">
                    @if (auth()->check())
                    <h1>{{ auth()->user()->name }}</h1>
                    @else
                    <h1>Guest</h1>
                    @endif

                    <form action="{{ route('user.logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-blue-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-lg xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                <div class="card-body">
                    @if (auth()->check())
                    <h3 class="text-center">Welcome to PCSHOP</h3>
                    <h4 class="text-center">{{ auth()->user()->name }}</h4>
                    @else
                    <h1>Guest</h1>
                    @endif


                </div>
                <div class="flex justify-between">
                    <a href="{{url('/home')}}" class="me-1 font-medium">Back</a>
                    <form action="{{ route('user.logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection