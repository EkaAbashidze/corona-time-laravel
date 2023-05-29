<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
	public function changeLanguage(Request $request)
	{
		$language = $request->input('language');
		if (in_array($language, ['en', 'ka'])) {
			App::setLocale($language);
			session()->put('locale', $language);
		}
		return redirect()->back()->with('success', 'Language changed successfully.');
	}
}
