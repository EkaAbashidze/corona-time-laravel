<?php

namespace Tests\Unit;

use App\Models\CountryStatistics;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountryStatisticsTest extends TestCase
{
	use RefreshDatabase, WithFaker;

	public function test_create_country_statistics()
	{
		$data = CountryStatistics::factory()->make()->toArray();

		$countryStatistics = CountryStatistics::create($data);

		$this->assertInstanceOf(CountryStatistics::class, $countryStatistics);
		$this->assertEquals($data['country'], $countryStatistics->country);
		$this->assertEquals($data['code'], $countryStatistics->code);
		$this->assertEquals($data['confirmed'], $countryStatistics->confirmed);
		$this->assertEquals($data['recovered'], $countryStatistics->recovered);
		$this->assertEquals($data['critical'], $countryStatistics->critical);
		$this->assertEquals($data['deaths'], $countryStatistics->deaths);
	}

	public function test_update_country_statistics()
	{
		$countryStatistics = CountryStatistics::factory()->create();

		$newData = CountryStatistics::factory()->make()->toArray();

		$countryStatistics->update($newData);

		$this->assertEquals($newData['country'], $countryStatistics->country);
		$this->assertEquals($newData['code'], $countryStatistics->code);
		$this->assertEquals($newData['confirmed'], $countryStatistics->confirmed);
		$this->assertEquals($newData['recovered'], $countryStatistics->recovered);
		$this->assertEquals($newData['critical'], $countryStatistics->critical);
		$this->assertEquals($newData['deaths'], $countryStatistics->deaths);
	}
}
