<x-html/>
<div class="flex flex-col items-center h-screen mt-[40px]">
 <img class="w-[170px] mb-8" src="{{ asset('images/photos/logo.svg') }}" alt="Photo">
 <div class="text-start flex flex-col items-start justify-center h-screen">
  <h1 class="self-center mb-[54px] text-3xl font-bold">{{ __('messages.reset') }}</h1>
  <form method="POST" action="reset">
    @csrf
    <div class="mt-4">
      <label class="font-bold text-gray-dark text-[16px]" for="email">{{ __('messages.email') }}</label>
      <input type="email" name="email" id="email" placeholder="Enter your email" class="block h-[56px] w-[390px] mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 focus:border-brand-green focus:ring-2 focus:ring-brand-green focus:ring-opacity-50" value="{{ old('email') }}" required autocomplete="email">
    </div>
    @error('email')
       <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
    <button type="submit" class="h-[56px] mt-[56px] w-[390px] flex justify-center items-center bg-brand-green text-white py-2 rounded-md font-bold text-center mb-8">{{ __('messages.reset') }}</button>
    </form> 
 </div>
</div>
</body>
</html>