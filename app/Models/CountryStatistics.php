<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
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

	public function scopeSearchCountry(EloquentBuilder $query, $searchCountry): void
	{
		$query->where('country', 'like', '%' . $searchCountry . '%');
	}
}
