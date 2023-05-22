<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CountryStatistics>
 */
class CountryStatisticsFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'country'   => fake()->country,
			'code'      => fake()->countryCode,
			'confirmed' => fake()->randomNumber(),
			'recovered' => fake()->randomNumber(),
			'critical'  => fake()->randomNumber(),
			'deaths'    => fake()->randomNumber(),
		];
	}
}
