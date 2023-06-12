  <x-html/>
    <div class="flex md:flex-col items-center h-screen mt-[40px] px-[24px]">
      <img class="self-start md:self-center md:w-[170px] w-[137px] mb-8" src="{{ asset('images/photos/logo.svg') }}" alt="Photo">
      <div class="text-center flex flex-col items-center justify-center h-screen gap-y-4">
        <img src="{{ asset('images/gif/checkmark.gif') }}" alt="gif" class="">
        <h1 class="">{{ __('messages.sent_email') }}!</h1>
      </div>
    </div>
	</body>
</html>