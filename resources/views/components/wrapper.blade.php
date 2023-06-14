<x-html/>
      <div class="flex justify-between h-screen">
        <div class="flex flex-col pl-4 md:pl-[108px] pt-[40px] w-[500px]">
          <img class="md:w-[170px] w-[137px]" src="{{ asset('images/photos/logo.svg') }}" alt="Photo">
          @yield('content')
        </div>
        <img src="{{ asset('images/photos/photo.png') }}" alt="Photo" class="hidden lg:block">
      </div>
    </body>
</html>