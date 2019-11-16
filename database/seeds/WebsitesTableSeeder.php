<?php

use App\Website;
use Illuminate\Database\Seeder;

class WebsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Website::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 5; $i++) {
            Website::create([
                'name' => $faker->domainName,
                'URL' => $faker->url,
                'is_deleted'=> $faker->boolean,
                'is_suspended'=> $faker->boolean,
            ]);
        }
    }
}
