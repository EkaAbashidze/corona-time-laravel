<x-html/>



<div class="mx-[108px]">



<nav class="flex items-center justify-between h-[80px] border-t-2 border-b-[1px] border-gray-200">
  <!-- Logo -->
  <img src="{{ asset('storage/photos/logo.svg') }}" alt="Photo" class="ml-8">

  <div class="flex items-center">
    <!-- Dropdown menu for translations -->
    <div class="mr-4">
      <select class="py-2 font-medium text-gray-700 bg-white rounded-md hover:bg-gray-100 focus:outline-none">
        <option value="english">English</option>
        <option value="georgian">Georgian</option>
      </select>
    </div>

    <!-- User name and logout button -->
    <div class="flex items-center ml-4">
      <span class="mr-2">$user->username</span>
      <div class="border-l border-gray-300 h-[32px] mx-4"></div>
      <button class="px-4 py-2 font-medium text-gray-700 bg-white rounded-md hover:bg-gray-100 focus:outline-none">Log out</button>
    </div>
  </div>
</nav>


  <h1 class="font-inter font-bold text-4xl text-dark-100 my-[40px]">Statistics by country</h1>



    
  <div class="flex gap-x-[72px]">
    <a href="/" class="h-14 flex py-2 rounded-md font-inter font-bold text-base text-dark-100 mb-8">Worldwide</a>
    <a href="/" class="h-14 flex py-2 rounded-md font-inter font-bold text-base text-dark-100 mb-8">By country</a>
  </div>



    <form method="GET" action="#" class="mb-5">
      <div class="relative">
        <input type="text" name="search" placeholder="Search by country" value="{{ request('search') }}" class="w-64 h-12 pl-10 pr-4 py-2 font-inter text-dark-FFF bg-dark-20 border border-dark-100 rounded-md">

        <img src="{{ asset('storage/photos/search.svg') }}" alt="Photo" class="absolute left-3 top-3 w-6 h-6 text-gray-400">

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



</div>

</body>
</html>
