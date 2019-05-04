<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 50; $i++){
 
    	    // insert data ke table user menggunakan Faker
    	    DB::table('siswa')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'gender' => $faker->randomElement(['male','female']),
                'status' => $faker->randomElement(['Active', 'Pending','Banned','Loss']),
                'email' => $faker->email,
                'city' => $faker->city,
                'phone' => $faker->phoneNumber,
                'created_at' => $faker->dateTimeBetween('-30 days', '+30 days'),
    	    ]);
 
    	}
    }
} 
