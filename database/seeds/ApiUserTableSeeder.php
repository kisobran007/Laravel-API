<?php

use App\ApiUser;
use Illuminate\Database\Seeder;

class ApiUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        ApiUser::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 1; $i++) {
            ApiUser::create([
                'username' => $faker->userName,
                'password' => $faker->password,
                'token' => $faker->unique()->regexify('[A-Za-z0-9]{60}'),
            ]);
        }
    }
}
