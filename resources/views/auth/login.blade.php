@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 py-8">
    <div class="flex justify-center">
        <div class="w-full max-w-md bg-white rounded shadow-md p-6">
            <h1 class="text-xl font-bold mb-4">{{ __('Login') }}</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium mb-2">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium mb-2">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-input w-full @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center mb-4">
                    <input type="checkbox" name="remember" id="remember" class="form-checkbox h-5 w-5 text-blue-600" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="text-sm ml-2">{{ __('Remember Me') }}</label>
                </div>

                <button type="submit" class="btn btn-primary w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:text-blue-700 underline block mt-4" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection