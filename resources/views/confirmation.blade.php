  <x-html/>
    <div class="flex flex-col items-center h-screen mt-[40px]">
      <img class="w-[170px] mb-8" src="{{ asset('images/photos/logo.svg') }}" alt="Photo">
      <div class="text-center flex flex-col items-center justify-center h-screen gap-y-4">
        <img src="{{ asset('images/gif/checkmark.gif') }}" alt="gif" class="hidden sm:block">
        <h1 class="">{{ __('messages.sent_email') }}!</h1>
      </div>
    </div>
	</body>
</html>