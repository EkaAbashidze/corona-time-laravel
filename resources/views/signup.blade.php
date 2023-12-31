@extends('components.wrapper')

@section('content')
<h1 class="text-gray-dark font-bold text-[20px] md:text-[25px] mt-[60px]">{{ __('messages.welcome') }}</h1>
<form method="POST" action="{{ route('signup.store') }}" class="mt-8">
  @csrf
  <div class="mt-4">
    <label class="font-bold text-gray-dark text-sm md:text-base " for="username">{{ __('messages.username') }}</label>
    <input type="text" name="username" id="username" placeholder="Enter unique username" class="block h-[56px] w-[343px] md:w-full mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 {{ $errors->has('username') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('username') }}" required autocomplete="username" autofocus>
  </div>

  @error('username')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror

  <div class="mt-4">
    <label class="font-bold text-gray-dark text-sm md:text-base" for="email">{{ __('messages.email') }}</label>
    <input type="email" name="email" id="email" placeholder="Enter your email" class="block h-[56px] w-[343px] md:w-full mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('email') }}" required autocomplete="email">
  </div>

  @error('email')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror

  <div class="mt-4">
    <label class="font-bold text-gray-dark text-sm md:text-base" for="password">{{ __('messages.password') }}</label>
    <input type="password" name="password" id="password" placeholder="Enter your password" class="block h-[56px] w-[343px] md:w-full mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}" required autocomplete="new-password">
  </div>

  <div class="mt-4">
    <label class="font-bold text-gray-dark text-sm md:text-base" for="password_confirmation">{{ __('messages.repeat_password') }}</label>
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" class="block h-[56px] w-[343px] md:w-full mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}" required autocomplete="new-password">
  </div>

  @error('password')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror

  <div class="flex items-center mt-8">
    <input type="checkbox" name="remember_device" id="remember_device" class="mr-2">
    <label for="remember_device" class="text-gray-light text-sm font-bold">{{ __('messages.remember_device') }}</label>
  </div>

  <div class="flex flex-col mt-8 text-center">
    <button type="submit" class="h-[56px] bg-brand-green text-white py-2 rounded-md font-bold text-center mb-8 w-[343px] md:w-full text-sm md:text-base">{{ __('messages.signup') }}</button>
    <p class="text-gray-700 w-[343px] md:w-full text-sm md:text-base">{{ __('messages.have_account') }} <a href="{{ route('login') }}" class="font-bold">
      {{ __('messages.login') }}</a></p>
  </div>
</form>
@endsection
