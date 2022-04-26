<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for ($i=1; $i <= 9; $i++) { 
            $data[] = [
                'category_id' => 1,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'status' => 'ACTIVE',
                'image' => $faker->imageUrl(200, 100),
                'description' => $faker->text(100)
            ];
        }

        return $data;
    }
}
