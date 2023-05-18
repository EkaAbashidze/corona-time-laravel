<?php

namespace App\Http\Controllers;

use App\Models\CountryStatistics;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
	public function create()
	{
		$search = request('search');

		$user = Auth::user();

		$data = CountryStatistics::searchcountry($search)->get();

		return view('landing', compact('data', 'user'));
	}
}
