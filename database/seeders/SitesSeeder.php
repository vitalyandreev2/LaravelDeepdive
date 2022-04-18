<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class SitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sites')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for ($i=1; $i <= 10; $i++) { 
            $data[] = [
                'title' => $faker->jobTitle(),
                'url' => 'https://path',
                'description' => $faker->text(100)
            ];
        }

        return $data;
    }
}
