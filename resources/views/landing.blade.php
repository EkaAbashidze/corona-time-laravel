<x-html/>



<div class="mx-[108px]">



<nav class="flex items-center justify-between h-[80px] border-t-2 border-b-[1px] border-gray-200">
  <!-- Logo -->
  <img src="{{ asset('storage/photos/logo.svg') }}" alt="Photo" class="ml-8">

  <div class="flex items-center">

  
  <x-language/>

    <!-- User name and logout button -->
    <div class="flex items-center ml-4">
      <span class="mr-2">{{$user->username }}</span>
      <div class="border-l border-gray-300 h-[32px] mx-4"></div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="px-4 py-2 font-medium text-gray-700 bg-white rounded-md hover:bg-gray-100 focus:outline-none">Log out</button>
      </form>
    </div>

  </div>
</nav>


  <h1 class="font-inter font-bold text-4xl text-dark-100 my-[40px]">Statistics by country</h1>



    
  <div class="flex gap-x-[72px]">


  <form method="GET" action="{{ route('landing') }}">
      <button type="submit" name="view" value="worldwide" class="h-14 flex py-2 rounded-md font-inter font-bold text-base text-dark-100 mb-8">Worldwide</button>
    </form>

    <form method="GET" action="{{ route('landing') }}">
      <button type="submit" name="view" value="bycountry" class="h-14 flex py-2 rounded-md font-inter font-bold text-base text-dark-100 mb-8">By Country</button>
    </form>

  </div>


  @if (!request('view') || request('view') === 'worldwide')
   

  @php
    $totalConfirmed = $totalDeaths = $totalRecovered = 0;
  @endphp

  @foreach ($data as $country)
      @php
          $totalConfirmed += $country->confirmed;
          $totalDeaths += $country->deaths;
          $totalRecovered += $country->recovered;
      @endphp
  @endforeach



<div class="flex gap-x-6">



<!--  -->


  <div class="relative">
    <div class="w-[392px] h-[255px] left-108 top-265 bg-[#2029F3] opacity-[0.08] shadow-card rounded-2xl flex flex-col items-center justify-center">
      
    </div>
      


    <div class="absolute top-0 left-0 translate-y-10 translate-x-3/4 flex flex-col items-center align-center justify-center">

      <img src="{{ asset('storage/photos/new.svg') }}" alt="Photo" class="w-[90px]">
      
      <p class="font-inter font-medium text-[#010414] text-center text-lg leading-6 mt-6">New cases</p>

      <h2 class="font-inter font-extrabold text-[#2029F3] text-4xl leading-12 mt-4">{{ $totalConfirmed }}</h2>
    
    </div>



    
    
  </div>


  <div class="relative">
    <div class="w-[392px] h-[255px] left-108 top-265 bg-[#0FBA68] opacity-[0.08] shadow-card rounded-2xl flex flex-col items-center justify-center">
      
    </div>
      


    <div class="absolute top-0 left-0 translate-y-12 translate-x-3/4 flex flex-col items-center align-center justify-center">

      <img src="{{ asset('storage/photos/recovered.svg') }}" alt="Photo" class="w-[90px]">
      
      <p class="font-inter font-medium text-[#010414] text-center text-lg leading-6 mt-6">Recovered</p>

      <h2 class="font-inter font-extrabold text-[#0FBA68] text-4xl leading-12 mt-4">{{ $totalRecovered }}</h2>
    
    </div>

    
    
  </div>

  <div class="relative">
    <div class="w-[392px] h-[255px] left-108 top-265 bg-[#EAD621] opacity-[0.08] shadow-card rounded-2xl flex flex-col items-center justify-center">
      
    </div>
      

    <div class="absolute top-0 left-0 translate-y-11 translate-x-3/4 flex flex-col items-center align-center justify-center">

      <img src="{{ asset('storage/photos/deaths.svg') }}" alt="Photo" class="w-[90px]">
      
      <p class="font-inter font-medium text-[#010414] text-center text-lg leading-6 mt-6">Deaths</p>

      <h2 class="font-inter font-extrabold text-[#EAD621] text-4xl leading-12 mt-4">{{ $totalDeaths }}</h2>
    
    </div>



    
    
  </div>

  </div>

  @endif


  @if(request('view') === 'bycountry')


  <form method="GET" action="{{ route('landing') }}" class="mb-5">
  <div class="relative">
    <input type="text" name="search" placeholder="Search by country" value="{{ request('search') }}" class="w-64 h-12 pl-10 pr-4 py-2 font-inter text-dark-FFF bg-dark-20 border border-dark-100 rounded-md">
    <img src="{{ asset('storage/photos/search.svg') }}" alt="Photo" class="absolute left-3 top-3 w-6 h-6 text-gray-400">
    <input type="hidden" name="view" value="bycountry">
    <input type="hidden" name="sort" value="{{ request('sort') }}">
  </div>
</form>




<div class="w-[1224px] bg-white border border-[#F6F6F7] shadow-md rounded-md">
  <table class="w-full border-collapse">
    <thead>
      <tr class="bg-[#F6F6F7] text-gray-600 h-[56px]">
        <th class="px-4 py-2 text-left">
          Location <i class="fas fa-sort"></i>
        </th>
        <th class="px-4 py-2 text-left">
          New Cases <i class="fas fa-sort"></i>
        </th>
        <th class="px-4 py-2 text-left cursor-pointer hover:bg-gray-100">
          <a href="{{ url()->current() }}?sort=deaths">
            Deaths <i class="fas fa-sort"></i>
          </a>
        </th>
        <th class="px-4 py-2 text-left">
          Recovered <i class="fas fa-sort"></i>
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $country)
        <tr class="border-b border-gray-300 h-[49px]">
          <td class="px-4 py-2">{{ $country->country }}</td>
          <td class="px-4 py-2">{{ $country->confirmed }}</td>
          <td class="px-4 py-2">{{ $country->deaths }}</td>
          <td class="px-4 py-2">{{ $country->recovered }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>



@endif



</div>

</body>
</html>
