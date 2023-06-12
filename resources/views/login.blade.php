@extends('components.wrapper')

@section('content')
<form method="POST" action="{{ route('login.login') }}">
 @csrf
<h1 class="text-gray-dark font-bold text-[20px] md:text-[25px] mt-[60px]">{{ __('messages.welcome_back') }}</h1>

<p class="text-gray-light md:text-[20px] tet-base mt-4">{{ __('messages.login_details') }}</p>
<div class="mt-4">
  <label class="font-bold text-gray-dark md:text-[16px] text-[14px]" for="login">{{ __('messages.username') }}</label>
  <input type="text" name="login" id="login" placeholder="Enter unique username or email" class="block h-[56px] w-[343px] md:w-full mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 {{ $errors->has('login') ? 'border-red-500' : '' }}">
  @error('login')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
  @enderror
</div>

<div class="mt-4">
   <label class="font-bold text-gray-dark md:text-[16px] text-[14px]" for="password">{{ __('messages.password') }}</label>
   <input type="password" name="password" id="password" placeholder="Fill in password" 
   class="block h-[56px] w-[343px] md:w-full  mt-2 px-4 py-2 rounded-md bg-white border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} ">
   @error('password')
       <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
   @enderror
</div>


  <div class="flex items-center justify-between mt-8 max-w-[343px] md:max-w-full">
    <div class="flex items-center">
        <input type="checkbox" name="remember_device" id="remember_device" class="mr-2">
        <label for="remember_device" class="text-gray-light text-sm font-bold">{{ __('messages.remember_device') }}</label>
    </div>
    <a href="/reset" class="text-brand-blue text-sm font-bold">{{ __('messages.forgot_password') }}</a>
  </div>

  <div class="flex flex-col mt-8 text-center">
   <button type="submit" class="h-[56px] bg-brand-green text-white py-2 rounded-md font-bold text-center mb-8 w-[343px] md:w-full text-sm md:text-base">LOG IN</button>
   <p class="text-gray-700 text-sm md:text-base w-[343px] md:w-full">{{ __('messages.no_account') }} <a href="{{ route('signup') }}" class="font-bold">{{ __('messages.signup_free') }}</a></p>
  </div>
</form>
@endsection
