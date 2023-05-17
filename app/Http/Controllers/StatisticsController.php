<?php

namespace App\Http\Controllers;

use App\Models\CountryStatistics;

class StatisticsController extends Controller
{
	public function create()
	{
		$search = request('search');

		$data = CountryStatistics::query()
		->search($search)
		->get();

		return view('landing', ['data' => $data]);
	}
}
