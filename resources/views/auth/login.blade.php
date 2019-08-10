@extends('layouts.app')

@section('content')
    <div class="flex mt-10">
        <div class="w-1/2 mx-auto">
            <div class="card">
                <form method="POST" action="{{ route('login') }}" class="w-full max-w-lg py-5">
                    @csrf
                    <div class="md:flex md:items-center mb-6">
                        <h1>Login</h1>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                        <label class="input-label md:text-right md:mb-0" for="email">
                                {{ __('E-Mail Address') }}
                        </label>
                        </div>
                        <div class="md:w-2/3">
                        <input class="input-text focus:outline-none focus:bg-white focus:border-blue-500" 
                            name="email" value="{{ old('email') }}" type="text">
                        </div>
                    </div>
                    <div class="md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                        <label class="input-label md:text-right md:mb-0" for="inline-username">
                            Password
                        </label>
                        </div>
                        <div class="md:w-2/3">
                        <input class="input-text focus:outline-none focus:bg-white focus:border-blue-500" 
                            name="password" type="password">
                        </div>
                    </div>
                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <button type="submit" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
@endsection
