<x-html/>
<div class="flex flex-col items-center h-screen mt-[40px]">
  <img class="self-start md:self-center md:w-[170px] w-[137px] mb-8" src="{{ asset('images/photos/logo.svg') }}" alt="Photo">
  <div class="text-center flex flex-col items-center justify-center h-screen gap-y-4">
    <img src="{{ asset('images/gif/checkmark.gif') }}" alt="gif" class="">
    <h1 class="md:text-base text-sm">{{ __('messages.verified') }}!</h1>
    <a href="/login" class="h-[56px] mt-[56px] w-[343px] md:w-[390px] fixed bottom-10 md:static justify-center items-center bg-brand-green text-white py-2 rounded-md font-bold text-center mb-8 text-sm md:text-base">{{ __('messages.login') }}</a>
  </div>
</div>
</body>
</html>