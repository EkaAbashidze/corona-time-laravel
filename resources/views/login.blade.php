@extends('components.wrapper')

@section('content')
    <h1 class="text-gray-dark font-bold text-[25px] mt-[60px]">Welcome back</h1>

    <p class="text-gray-light text-[20px] mt-4">Welcome back! Please enter your details</p>

    <div class="mt-4">

      <label class="font-bold text-gray-dark text-[16px]" for="username">Username</label>

      <input type="text" name="username" id="username" placeholder="Enter unique username or email" 
      class="block h-[56px] w-full mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 focus:border-brand-green focus:ring-2 focus:ring-brand-green focus:ring-opacity-50">

    </div>

    <div class="mt-4">

      <label class="font-bold text-gray-dark text-[16px]" for="password">Password</label>

      <input type="password" name="password" id="password" placeholder="Fill in password" 
      class="block h-[56px] w-full mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 focus:border-brand-green focus:ring-2 focus:ring-brand-green focus:ring-opacity-50">

    </div>

    <div class="flex items-center justify-between mt-8">

      <div class="flex items-center">

        <input type="checkbox" name="remember-device" id="remember-device" class="mr-2">

        <p class="text-gray-light text-sm font-bold">Remember this device</p>

      </div>

      <a href="#" class="text-brand-blue text-sm font-bold">Forgot password?</a>

    </div>

    <div class="flex flex-col mt-8 text-center">

      <button class="h-[56px] bg-brand-green text-white py-2 rounded-md font-bold text-center mb-8">LOG IN</button>

      <p class="text-gray-700 text-base">Don’t have an account? <span class="font-bold">Sign up for free</span></p>

    </div>
@endsection
