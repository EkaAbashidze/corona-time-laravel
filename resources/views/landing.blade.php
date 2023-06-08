<x-html/>
<div class="mx-[108px]">
<nav class="flex items-center justify-between h-[80px] border-t-2 border-b-[1px] border-gray-200">
  <img src="{{ asset('images/photos/logo.svg') }}" alt="Photo" class="ml-8 max-[600px]:ml-0 max-[600px]:mr-8">
  <div class="flex items-center">
    <x-language/>
    <div class="flex items-center ml-4">
      <span class="max-[600px]:hidden mr-2">{{$user->username }}</span>
      <div class="max-[600px]:hidden  border-l border-gray-300 h-[32px] mx-4"></div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="px-4 py-2 font-medium text-gray-700 bg-white rounded-md hover:bg-gray-100 focus:outline-none">{{ __('messages.log_out') }}</button>
      </form>
    </div>
  </div>
</nav>

<h1 class="font-inter font-bold text-4xl text-dark-100 my-[40px]">
  {{ Request::query('view') == 'bycountry' ? __('messages.statistics_country') : __('messages.statistics_worldwide') }}
</h1>

<div class="flex gap-x-[72px] border-b-[1px] border-[#F6F6F7] mb-8">
  <form method="GET" action="{{ route('landing') }}">
    <button type="submit" name="view" value="worldwide" class="h-12 flex py-2 font-inter font-bold text-base text-dark-100 {{ Request::query('view') == null || Request::query('view') == 'worldwide' ? 'border-b-[3px] border-[#010414]' : '' }}">{{ __('messages.worldwide') }}</button>
  </form>
  <form method="GET" action="{{ route('landing') }}">
    <button type="submit" name="view" value="bycountry" class="h-12 flex py-2 font-inter font-bold text-base text-dark-100 {{ Request::query('view') == 'bycountry' ? 'border-b-[3px] border-[#010414]' : '' }}">{{ __('messages.by_country') }}</button>
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

<div class="flex gap-6 justify-between max-[600px]:justify-start w-full max-[600px]:flex-col ">

  <div class="">
    <div class="max-[600px]:w-[343px] max-[600px]:h-[192px] w-[392px] h-[255px] left-108 top-265 bg-[#2029F3] bg-opacity-[0.08] shadow-card rounded-2xl flex flex-col items-center justify-center">

    <div class="flex flex-col items-center align-center justify-center">
      <img src="{{ asset('images/photos/new.svg') }}" alt="Photo" class="w-[90px]">
      <p class="font-inter font-medium text-[#010414] text-center text-lg leading-6 mt-6">{{ __('messages.new_cases') }}</p>
      <h2 class="font-inter font-extrabold text-[#2029F3] max-[600px]:text-2xl text-4xl leading-12 mt-4">{{ $totalConfirmed }}</h2>
      </div>
    </div>
 </div>

<div class="flex gap-x-6 flex-row justify-between w-full">

<div class="mx-auto">
  <div class="max-[600px]:w-[164px] max-[600px]:h-[192px] w-[392px] h-[255px] left-108 top-265 bg-[#0FBA68] bg-opacity-[0.08] shadow-card rounded-2xl flex flex-col items-center justify-center">

  
  <div class="flex flex-col items-center align-center justify-center">
    <img src="{{ asset('images/photos/recovered.svg') }}" alt="Photo" class="w-[90px]">
    <p class="font-inter font-medium text-[#010414] text-center text-lg leading-6 mt-6">{{ __('messages.recovered') }}</p>
    <h2 class="font-inter font-extrabold text-[#0FBA68] text-4xl max-[600px]:text-2xl leading-12 mt-4">{{ $totalRecovered }}</h2>
    </div>
  </div>  
</div>

  <div class="">
    <div class="max-[600px]:w-[164px] max-[600px]:h-[192px] w-[392px] h-[255px] left-108 top-265 bg-[#EAD621] bg-opacity-[0.08] shadow-card rounded-2xl flex flex-col items-center justify-center">

    <div class="flex flex-col items-center align-center justify-center">
      <img src="{{ asset('images/photos/deaths.svg') }}" alt="Photo" class="w-[90px]">
      <p class="font-inter font-medium text-[#010414] text-center text-lg leading-6 mt-6">{{ __('messages.deaths') }}</p>
      <h2 class="font-inter font-extrabold text-[#EAD621] text-4xl max-[600px]:text-2xl leading-12 mt-4">{{ $totalDeaths }}</h2>
      </div>
    </div> 
  </div>

  </div>

</div>

@endif
@if(request('view') === 'bycountry')
<form method="GET" action="{{ route('landing') }}" class="mb-5">
<div class="relative">
  <input type="text" name="search" placeholder="Search by country" value="{{ request('search') }}" class="w-64 h-12 pl-10 pr-4 py-2 font-inter text-dark-FFF bg-dark-20 border border-dark-100 rounded-md">
  <img src="{{ asset('images/photos/search.svg') }}" alt="Photo" class="absolute left-3 top-3 w-6 h-6 text-gray-400">
  <input type="hidden" name="view" value="bycountry">

  @if (request('order_by')) 
    <input type="hidden" name="order_by" value='{{request("order_by")}}'>
  @endif

</div>
</form>
<div class="w-full bg-white border border-[#F6F6F7] shadow-md rounded-md mb-4">
  <table class="w-full border-collapse">
    <thead>

      <tr class="bg-[#F6F6F7] text-gray-600 h-[56px]">




      <form action="/" method="GET">
        <input type="hidden" name='view' value="bycountry">
      @if (request('search'))
          <input type="hidden" name="search" value="{{ request('search') }}">
      @endif
      <th class="px-4 py-2 text-left">
          <input type="hidden" name="order_by" value="{{ (request('order_by') == 'country_desc') ? 'country_asc' : 'country_desc' }}">
          {{ __('messages.location') }}
          <button type="submit" class="focus:outline-none">
              <i class="fas fa-sort"></i>
          </button>
      </th>
  </form>

    <th class="px-4 py-2 text-left">
      <form action="/" method="GET">
          <input type="hidden" name="view" value="bycountry">
          @if (request('search'))
              <input type="hidden" name="search" value="{{ request('search') }}">
          @endif
          <input type="hidden" name="order_by" value="{{ (request('order_by') == 'confirmed_desc') ? 'confirmed_asc' : 'confirmed_desc' }}">
          {{ __('messages.new_cases') }}
          <button type="submit" class="focus:outline-none">
              <i class="fas fa-sort"></i>
          </button>
      </form>
  </th>
          
    <th class="px-4 py-2 text-left">
      <form action="/" method="GET">
        <input type="hidden" name="view" value="bycountry">
        @if (request('search'))
        <input type="hidden" name="search" value="{{ request('search') }}">
        @endif
        <input type="hidden" name="order_by" value="{{ (request('order_by') == 'deaths_desc') ? 'deaths_asc' : 'deaths_desc' }}">
        {{ __('messages.deaths') }} <button type="submit" class="focus:outline-none"><i class="fas fa-sort"></i></button>
      </form>
    </th>

    <th class="px-4 py-2 text-left">
      <form action="/" method="GET">
        <input type="hidden" name="view" value="bycountry">
        @if (request('search'))
        <input type="hidden" name="search" value="{{ request('search') }}">
        @endif
        <input type="hidden" name="order_by" value="{{ (request('order_by') == 'recovered_desc') ? 'recovered_asc' : 'recovered_desc' }}">
        {{ __('messages.recovered') }} <button type="submit" class="focus:outline-none"><i class="fas fa-sort"></i></button>
      </form>
    </th>
  </tr>

    </thead>
    <tbody>
      @foreach ($data as $country)
        <tr class="border-b border-gray-300 h-[49px]">
        <td class="px-4 py-2">
        @if(app()->getLocale() === 'ka')
          {{ __("countries.$country->country") }}
        @else
          {{ $country->country }}
        @endif
      </td>
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