<div class="mr-4">
    <form action="{{ route('language.change') }}" method="GET">
        @csrf
        <select name="language" class="py-2 font-medium text-gray-700 bg-white rounded-md hover:bg-gray-100 focus:outline-none" onchange="this.form.submit()">
            <option {{ session('locale') == 'en' ? 'selected ' : '' }} value="en">English</option>
            <option {{ session('locale') == 'ka' ? 'selected ' : '' }} value="ka">Georgian</option>
        </select>
    </form>
</div>
