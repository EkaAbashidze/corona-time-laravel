<?php

namespace App\Console\Commands;

use App\Models\CountryStatistics;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Statistics extends Command
{
	protected $signature = 'statistics:fetch';

	protected $description = 'Fetch and save country statistics data to the database';

	public function handle()
	{
		$response = Http::get('https://devtest.ge/countries');

		if ($response->ok()) {
			$countriesData = $response->json();
			$statistics = [];

			foreach ($countriesData as $country) {
				$countryCode = $country['code'];
				$countryStatisticsResponse = Http::post('https://devtest.ge/get-country-statistics', [
					'code' => $countryCode,
				]);

				if ($countryStatisticsResponse->ok()) {
					$countryStatistics = $countryStatisticsResponse->json();

					$statistics[] = [
						'country'   => $countryStatistics['country'],
						'code'      => $countryStatistics['code'],
						'confirmed' => $countryStatistics['confirmed'],
						'recovered' => $countryStatistics['recovered'],
						'critical'  => $countryStatistics['critical'],
						'deaths'    => $countryStatistics['deaths'],
					];
				}
			}

			CountryStatistics::insert($statistics);
		}

		$this->info('Country statistics data fetched and saved successfully!');
	}
}
