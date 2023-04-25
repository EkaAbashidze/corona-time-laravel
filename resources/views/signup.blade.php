@extends('components.wrapper')

@section('content')
    <h1 class="text-gray-dark font-bold text-[25px] mt-[60px]">{{ __('messages.welcome') }}</h1>

    <p class="text-gray-light text-[20px] mt-4">{{ __('messages.signup_details') }}</p>

    <div class="mt-4">

      <label class="font-bold text-gray-dark text-[16px]" for="username">{{ __('messages.username') }}</label>

      <input type="text" name="username" id="username" placeholder="Enter unique username" 
      class="block h-[56px] w-full mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 focus:border-brand-green focus:ring-2 focus:ring-brand-green focus:ring-opacity-50">

    </div>

    <div class="mt-4">

      <label class="font-bold text-gray-dark text-[16px]" for="email">{{ __('messages.email') }}</label>

      <input type="email" name="email" id="email" placeholder="Fill in password" 
      class="block h-[56px] w-full mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 focus:border-brand-green focus:ring-2 focus:ring-brand-green focus:ring-opacity-50">

    </div>

    <div class="mt-4">

      <label class="font-bold text-gray-dark text-[16px]" for="password">{{ __('messages.password') }}</label>

      <input type="password" name="password" id="password" placeholder="Fill in password" 
      class="block h-[56px] w-full mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 focus:border-brand-green focus:ring-2 focus:ring-brand-green focus:ring-opacity-50">

    </div>

    <div class="mt-4">

      <label class="font-bold text-gray-dark text-[16px]" for="password_confirmation">{{ __('messages.repeat_password') }}</label>

      <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Fill in password" 
      class="block h-[56px] w-full mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 focus:border-brand-green focus:ring-2 focus:ring-brand-green focus:ring-opacity-50">

    </div>

    <div class="flex items-center mt-8">

        <input type="checkbox" name="remember-device" id="remember-device" class="mr-2">

        <p class="text-gray-light text-sm font-bold">{{ __('messages.remember_device') }}</p>

    </div>

    <div class="flex flex-col mt-8 text-center">

      <button class="h-[56px] bg-brand-green text-white py-2 rounded-md font-bold text-center mb-8">{{ __('messages.signup') }}</button>

      <p class="text-gray-700 text-base">{{ __('messages.have_account') }} <span class="font-bold">{{ __('messages.login') }}</span></p>

    </div>
@endsection
