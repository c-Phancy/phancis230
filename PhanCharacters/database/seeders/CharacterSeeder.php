<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Character::query()->delete();

        $faker = \Faker\Factory::create();
        

            foreach(range(1, 50) as $characters) {
            $randomJobs = [];
            for ($i = 1; $i <= rand(1, 5); $i++) {
                array_push($randomJobs, $faker->jobTitle);
            }
            \App\Models\Character::create([
                'name' => $faker->name,
                'birthday' => date_create($faker->date)->format("m-d-Y"),
                'occupation' => join(", ", $randomJobs),
                'status' => array_rand(array_flip(["Presumed dead", "Alive", "Unknown"]), 1),
                'img' => $faker->imageURL
            ]);
        }
    }
}
