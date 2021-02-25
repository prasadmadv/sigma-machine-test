<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	//testing report Factory
    	//dd(\App\Models\Report::factory()->create());
    	//okay working

    	//create campaigns
        $campaigns = \App\Models\Campaign::factory(10)->create();

    	//create users
    	\App\Models\User::factory(10)->create()
    		//foreach users
    		->each(function($user) use($campaigns) {
	    		
	    		//foreach capmaign add clicks for multiple users
	    		foreach ($campaigns as $campaign) {
	    			/*
	    			dd(\App\Models\Report::factory(2)->make([
			    		'user_email' => $user->id,
			    		'campaign_id' => $campaign->id,
			    	]));*/

					//create multiple report records for clicks
			    	\App\Models\Report::factory(mt_rand(2,5))->create([
			    		'user_email' => $user->email,
			    		'campaign_id' => $campaign->id,
			    	]);

	    		}

	    	});
    }
}
