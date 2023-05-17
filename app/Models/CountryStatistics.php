<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryStatistics extends Model
{
	use HasFactory;

	protected $fillable = [
		'country',
		'code',
		'confirmed',
		'recovered',
		'critical',
		'deaths',
	];

	public function search($query, $searchCountry)
	{
		if ($searchCountry) {
			$query->where('counry', 'like' . '%' . $searchCountry . '%');
		}
	}
}
