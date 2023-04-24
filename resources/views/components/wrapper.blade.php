<x-html/>
      <div class="flex justify-between h-screen">
        <div class="flex flex-col pl-[108px] pt-[40px] w-[500px]">
          <img class="w-[170px]" src="{{ asset('storage/photos/logo.svg') }}" alt="Photo">
          @yield('content')
        </div>
        <img src="{{ asset('storage/photos/photo.png') }}" alt="Photo" class="">
      </div>
    </body>
</html>