<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    </head>

    <body>
      <div class="flex justify-between h-screen">
        <div class="flex flex-col pl-[108px] pt-[40px] w-auto">
          <img class="w-[170px]" src="{{ asset('storage/photos/logo.svg') }}" alt="Photo">
          @yield('content')
        </div>
        <img src="{{ asset('storage/photos/photo.png') }}" alt="Photo" class="">
      </div>
    </body>
</html>
