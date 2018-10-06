<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('fr_FR');
        $now = \Carbon\Carbon::now();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        for ($i = 0; $i < 50; ++$i) {
            DB::table('contacts')->insert([
                'user_id' => 1,
                'firstname' => $faker->firstName,
                'lastName' => $faker->lastName,
                'email' => $faker->email,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        for ($i = 1; $i <= 50; ++$i) {
            for ($j = 0; $j < 10; ++$j) {
                DB::table('addresses')->insert([
                    'contact_id' => $i,
                    'street' => $faker->streetAddress,
                    'zip' => (int) str_replace(' ', '', $faker->postcode),
                    'city' => $faker->city,
                    'country' => $faker->country,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
