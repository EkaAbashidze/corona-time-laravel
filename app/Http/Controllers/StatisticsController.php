<?php

namespace App\Http\Controllers;

use App\Models\CountryStatistics;

class StatisticsController extends Controller
{
	public function create()
	{
		$query = CountryStatistics::query();

		if (request('search')) {
			$query->where('country', 'like', '%' . request('search') . '%');
		}

		$data = $query->get();

		return view('landing', ['data' => $data]);
	}
}
