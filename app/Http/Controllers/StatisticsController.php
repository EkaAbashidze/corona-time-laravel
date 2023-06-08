<?php

namespace App\Http\Controllers;

use App\Models\CountryStatistics;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
	public function create()
	{
		$search = request('search');

		$sort = request('order_by');

		$query = CountryStatistics::query();

		if ($search) {
			$countries = include_once app_path() . '/../resources/lang/ka/countries.php';

			$searchedCountries = preg_match('/^[A-Za-z]+$/', $search) ? $this->searchByKeys($countries, $search) : $this->searchByValues($countries, $search);

			$query = $query->searchcountry($searchedCountries);
		}

		if ($sort) {
			[$order, $direction] = explode('_', $sort);
			$query = $query->orderBy($order, $direction);
		}

		$user = Auth::user();

		$data = $query->get();

		return view('landing', compact('data', 'user'));
	}

	private function searchByValues($array, $search)
	{
		$data = [];

		foreach ($array as $key => $value) {
			if (str_contains(strtolower($value), strtolower($search))) {
				$data[] = $key;
			}
		}
		return $data;
	}

	private function searchByKeys($array, $search)
	{
		$data = [];

		foreach ($array as $key => $value) {
			if (str_contains(strtolower($key), strtolower($search))) {
				$data[] = $key;
			}
		}
		return $data;
	}
}
