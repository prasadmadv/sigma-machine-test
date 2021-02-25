<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$user = \App\Models\User::factory()->create();
        //$campaign = \App\Models\Campaign::factory()->create();
        return [
            //failsafe values only when calling ReportFactory direclty probably during test cases
            //if any
            'user_email' => null,//$user->email,
            'campaign_id' => null,//$campaign->id,
            'source_url' => $this->faker->url,
            'destination_url' => $this->faker->url,
            'user_agent' => $this->faker->userAgent,
            'ip' => $this->faker->ipv4,
        ];
    }
}
