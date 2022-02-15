<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use  Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        $faker = Faker::create();
        foreach (range(1, 200) as $index) {

            $firstname = $faker->firstname;
                $lastname = $faker->lastname;

            DB::table('students')->insert([
                'name'=> $firstname ." ".$lastname,
                'email' => $faker->unique()->email,
                'dob' => $faker->date($format = 'D-m-y', $max = '2010', $min = '1980'),
            ]);
        }


    }
}
