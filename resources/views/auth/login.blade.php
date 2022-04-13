@extends('homepages/base')

@section('content')
        <div class="container mt-3">
            <div class="row">
                <div class="col-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                    
                                <!-- Email Address -->
                                <div class="mb-3">
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                </div>
                    
                                <!-- Password -->
                                <div class="mb-3">
                                    <x-label for="password" :value="__('Password')" />
                    
                                    <x-input id="password" class="form-control"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="current-password" />
                                </div>
                    
                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                    
                                <div class="flex items-center justify-end ">
                                  
                    
                                    <x-button class="btn btn-success w-100">
                                        {{ __('Log in') }}
                                    </x-button>

                                    @if (Route::has('password.request'))
                                    <a class="underline small text-dark text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

@endsection