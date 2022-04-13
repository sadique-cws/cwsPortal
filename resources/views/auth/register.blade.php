@extends('homepages/base')


@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body"> 
                        <h6>Register User</h6>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div>
                                <x-label for="name" :value="__('Name')" />
                                <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                            </div>
                
                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                            </div>
                
                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('Password')" />
                                <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                            </div>
                
                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                            </div>
                
                            <div class="flex items-center justify-end mt-4">
                                <x-button class="btn btn-success w-100">{{ __('Register') }}</x-button>
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection