<x-html/>
<div class="flex flex-col items-center h-screen mt-[40px] px-[24px]">
 <img class="self-start md:self-center md:w-[170px] w-[137px] mb-8" src="{{ asset('images/photos/logo.svg') }}" alt="Photo">
 <div class="text-start md:flex flex-col items-start justify-center h-screen">
  <h1 class="self-center md:mb-[54px] md:text-3xl text-[20px] font-bold w-full flex justify-center my-[40px]">{{ __('messages.reset') }}</h1>
  <form method="POST" action="reset">
    @csrf
    <div class="mt-4">
      <label class="font-bold text-gray-dark text-sm md:text-base" for="email">{{ __('messages.email') }}</label>
      <input type="email" name="email" id="email" placeholder="Enter your email" class="block h-[56px] w-[343px] md:w-[390px] mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}" value="{{ old('email') }}" required autocomplete="email">
    </div>
    @error('email')
       <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
    <button type="submit" class="h-[56px] mt-[56px] w-[343px] md:w-[390px] fixed bottom-10 md:static justify-center items-center bg-brand-green text-white py-2 rounded-md font-bold text-center mb-8 text-sm md:text-base">{{ __('messages.reset') }}</button>
    </form> 
 </div>
</div>
</body>
</html>