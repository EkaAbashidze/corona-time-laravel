<form action="{{ route('language.change', ['locale' => app()->getLocale()]) }}" method="GET">
    @csrf
    <select name="language" class="py-2 font-medium text-gray-700 bg-white rounded-md hover:bg-gray-100 focus:outline-none" onchange="this.form.submit()">
        <option value="en">English</option>
        <option value="ka">Georgian</option>
    </select>
</form>
