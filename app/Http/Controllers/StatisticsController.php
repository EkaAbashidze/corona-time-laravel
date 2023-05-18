<?php

namespace App\Http\Controllers;

use App\Models\CountryStatistics;

class StatisticsController extends Controller
{
	public function create()
	{
		$search = request('search');

		$data = CountryStatistics::searchcountry($search)->get();

		return view('landing', compact('data'));
	}
}
