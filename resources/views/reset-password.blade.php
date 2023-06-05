<x-html/>
<div class="flex flex-col items-center h-screen mt-[40px]">
 <img class="w-[170px] mb-8" src="{{ asset('storage/photos/logo.svg') }}" alt="Photo">
 <div class="text-start flex flex-col items-start justify-center h-screen">
  <h1 class="self-center mb-[54px] text-3xl font-bold">{{ __('messages.reset') }}</h1>
  <form method="POST" action="{{ route('password.update', [$token, $email]) }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}" >
    <div class="mt-4">
      <label class="font-bold text-gray-dark text-[16px]" for="password">{{ __('messages.new-password') }}</label>
      <input type="password" name="password" id="password" placeholder="Enter your new password" class="block h-[56px] w-[390px] mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 focus:border-brand-green focus:ring-2 focus:ring-brand-green focus:ring-opacity-50" required>
    </div>

    <div class="mt-4">
      <label class="font-bold text-gray-dark text-[16px]" for="password_confirmation">{{ __('messages.confirm-password') }}</label>
      <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your new password" class="block h-[56px] w-[390px] mt-2 px-4 py-2 rounded-md bg-white border border-gray-300 focus:border-brand-green focus:ring-2 focus:ring-brand-green focus:ring-opacity-50" required>
    </div>
    
    <button type="submit" class="h-[56px] mt-[56px] w-[390px] flex justify-center items-center bg-brand-green text-white py-2 rounded-md font-bold text-center mb-8">{{ __('messages.save-changes') }}</button>
  </form>
 </div>
</div>
</body>
</html>
