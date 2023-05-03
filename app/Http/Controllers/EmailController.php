<?php

namespace App\Http\Controllers;

class EmailController extends Controller
{
	public function create()
	{
		return view('confirmation');
	}
}
