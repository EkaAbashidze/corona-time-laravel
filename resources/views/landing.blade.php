<x-html/>

<div class="flex flex-col items-center h-screen mt-[40px]">
  <img class="w-[170px] mb-8" src="{{ asset('storage/photos/logo.svg') }}" alt="Photo">

  <div class="text-center flex flex-col items-center justify-center h-screen gap-y-4">
    <a href="/login" class="h-[56px] mt-[94px] w-[200px] flex justify-center items-center bg-brand-green text-white py-2 rounded-md font-bold text-center mb-8">Worldwide</a>
    <a href="/login" class="h-[56px] mt-[94px] w-[200px] flex justify-center items-center bg-brand-green text-white py-2 rounded-md font-bold text-center mb-8">By country</a>



    <form method="GET" action="#">

      <input type="text" name="search" placeholder="Search by country" value="{{ request('search') }}">

    </form>

    <div class="w-[1000px] overflow-x-scroll">
      <table class="table-auto w-full border-collapse">
        <thead>
          <tr class="bg-gray-200 text-gray-600">
            <th class="px-4 py-2">Location</th>
            <th class="px-4 py-2">New Cases</th>
            <th class="p-2 cursor-pointer hover:bg-gray-100" scope="col">
            <a href="{{ url()->current() }}?sort=deaths">Deaths</a>
          </th>
            <th class="px-4 py-2">Recovered</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $country)
            <tr class="border-b border-gray-300">
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
</div>

</body>
</html>
