<?php

namespace App\Console\Commands;

use App\Models\CountryStatistics;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Statistics extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'statistics:fetch';

	protected $description = 'Fetch and save country statistics data to database';

	public function handle()
	{
		$response = Http::get('https://devtest.ge/countries');

		if ($response->ok()) {
			$countriesData = $response->json();

			foreach ($countriesData as $country) {
				$countryCode = $country['code'];
				$countryStatisticsResponse = Http::post('https://devtest.ge/get-country-statistics', [
					'code' => $countryCode,
				]);

				if ($countryStatisticsResponse->ok()) {
					$countryStatistics = $countryStatisticsResponse->json();

					$newCountryStatistics = new CountryStatistics();
					$newCountryStatistics->country = $countryStatistics['country'];
					$newCountryStatistics->code = $countryStatistics['code'];
					$newCountryStatistics->confirmed = $countryStatistics['confirmed'];
					$newCountryStatistics->recovered = $countryStatistics['recovered'];
					$newCountryStatistics->critical = $countryStatistics['critical'];
					$newCountryStatistics->deaths = $countryStatistics['deaths'];
					$newCountryStatistics->save();
				}
			}
		}

		$this->info('Country statistics data fetched and saved successfully!');
	}
}
