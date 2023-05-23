<?php

namespace Tests\Feature\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class StatisticsCommandTest extends TestCase
{
	public function it_fetches_and_saves_country_statistics_data_to_database()
	{
		DB::table('country_statistics')->delete();

		Http::fake([
			'https://devtest.ge/countries'              => Http::response([
				[
					'country'   => 'Country A',
					'code'      => 'A',
					'confirmed' => 100,
					'recovered' => 50,
					'critical'  => 10,
					'deaths'    => 5,
				],
				[
					'country'   => 'Country B',
					'code'      => 'B',
					'confirmed' => 200,
					'recovered' => 100,
					'critical'  => 20,
					'deaths'    => 10,
				],
			], 200),
			'https://devtest.ge/get-country-statistics' => Http::response([
				'country'   => 'Country A',
				'code'      => 'A',
				'confirmed' => 100,
				'recovered' => 50,
				'critical'  => 10,
				'deaths'    => 5,
			], 200),
		]);

		$this->artisan('statistics:fetch')
			->expectsOutput('Country statistics data fetched and saved successfully!')
			->assertExitCode(0);

		$this->assertDatabaseCount('country_statistics', 2);

		$response = Http::get('https://devtest.ge/countries');
		$countriesData = $response->json();

		foreach ($countriesData as $country) {
			$countryCode = $country['code'];
			$countryStatisticsResponse = Http::post('https://devtest.ge/get-country-statistics', [
				'code' => $countryCode,
			]);

			if ($countryStatisticsResponse->ok()) {
				$countryStatistics = $countryStatisticsResponse->json();

				$this->assertDatabaseHas('country_statistics', [
					'country'   => $countryStatistics['country'],
					'code'      => $countryStatistics['code'],
					'confirmed' => $countryStatistics['confirmed'],
					'recovered' => $countryStatistics['recovered'],
					'critical'  => $countryStatistics['critical'],
					'deaths'    => $countryStatistics['deaths'],
				]);
			}
		}
	}
}
